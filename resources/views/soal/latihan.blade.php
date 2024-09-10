@extends('layouts.app')
@section('title', 'Soal Latihan')
@section('breadcrumb')
 
@endsection
@section('content')
<div class="col-md-12">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Paket Soal Latihan</h3>
      <a href="/elearning/soal" class="btn btn-xs btn-info"> <i class="fa fa-undo"></i> Kembali</a>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div>
    </div>
    <div class="box-body">
    	{{--  <button type="button" id="btn-soal" class="btn btn-primary btn-md"><i class="fa fa-pencil-square-o"></i> &nbsp;Tulis Soal</button>
    	<a href="{{ url('/download-file-format/soal') }}" class="btn btn-success btn-md"><i class="fa fa-file-excel-o"></i> &nbsp;Download Format Exel</a>
    	<button type="button" id="btn-upload-soal" class="btn btn-info btn-md"><i class="fa fa-cloud-upload"></i> &nbsp;Upload Exel</button>
   
@include('soal.addsoal')  --}}


      <div class="well" style="margin-top: 15px; display: none;" id="wrap-upload-soal">
        <form class="form-horizontal" action="{{ url('/crud/simpan-detail-soal-via-excel') }}" enctype="multipart/form-data" method="POST">
          {{ csrf_field() }}
          <div class="box-body">
            <div class="form-group">
              <input type="file" name="file" id="file" class="inputfile" />
              <label for="file"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Pilih file excel</label>
              <p class="help-block">Silahkan pilih file format soal dalam bentuk excel yang telah diisi dengan benar.</p>
            </div>
            <div class="box-footer">
              <input class="btn btn-danger" id="batal-upload" type="button" value="Batal" />
              <input class="btn btn-primary" name="upload" type="submit" value="Import" />
            </div>
          </div>
        </form>
      </div>
    	{{--  <hr style="margin: 10px 0 15px 0">  --}}
      <table class="table table-hover table-striped" id="table_soal">
      	@if (Auth::user()->status == 'G')
	        <caption>Data paket soal yang Anda buat</caption>
        @else
        	<caption>Data paket soal</caption>
        @endif
        <thead>
          <tr>
            <th>ID Soal</th>
            <th>Nama Paket</th>
            <th>Deskripsi</th>
            <th style="text-align: center;">Jenis Soal</th>
            <th style="text-align: center;">KKM</th>
            <th style="text-align: center; width: 70px">Waktu</th>
            <th style="text-align: center;"> Mulai Ujian</th>
            <th style="text-align: center;"> Selsai Ujian</th>
            <th style="text-align: center; width: 100px">Aksi</th>
          </tr>
        </thead>
      </table>
    </div>
  </div>
</div>
@endsection
@push('css')
  <link rel="stylesheet" href="{{URL::asset('assets/plugins/datatables/media/css/dataTables.bootstrap.css')}}">
  <link rel="stylesheet" href="{{URL::asset('assets/plugins/datatables/extensions/Responsive/css/responsive.dataTables.css')}}">
  <link rel="stylesheet" href="{{URL::asset('assets/plugins/datatables/extensions/FixedHeader/css/fixedHeader.bootstrap.css')}}">
  <style type="text/css">
    .panel {
      margin-bottom: 5px !important;
    }
    .form-group {
      margin-bottom: 5px;
    }
    .inputfile {
      width: 0.1px;
      height: 0.1px;
      opacity: 0;
      overflow: hidden;
      position: absolute;
      z-index: -1;
    }
    .inputfile + label {
      font-size: 1.25em;
      font-weight: 700;
      color: white;
      background-color: green;
      display: inline-block;
      padding: 10px;
    }
    .inputfile:focus + label,.inputfile + label:hover {
      background-color: darkgreen;
    }
    .inputfile + label {
      cursor: pointer;
    }
    .inputfile:focus + label {
      outline: 1px dotted #000;
      outline: -webkit-focus-ring-color auto 5px;
    }
    .inputfile + label * {
      pointer-events: none;
    }
  </style>
@endpush
@push('scripts')
<script src="{{URL::asset('assets/plugins/datatables/media/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatables/media/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatables/extensions/Responsive/js/dataTables.responsive.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatables/extensions/FixedHeader/js/dataTables.fixedHeader.js')}}"></script>
<script>
$(document).ready(function (){
  table_soal = $('#table_soal').DataTable({
    processing: true,
    serverSide: true,
    responsive: true,
    lengthChange: true,
    ajax: {
      url: '{!! route('elearning.get-soallatihan') !!}',
      
    },
    columns: [
      {data: 'id', name: 'id', orderable: true, searchable: true },
      {data: 'paket', name: 'paket', orderable: true, searchable: true },
      {data: 'deskripsi', name: 'deskripsi', orderable: true, searchable: true },
      {data: 'jenis', name: 'jenis', orderable: true, searchable: true },
      {data: 'kkm', name: 'kkm', orderable: true, searchable: true },
      {data: 'waktu', name: 'waktu', orderable: true, searchable: true },
      {data: 'tgl_ujian', name: 'tgl_ujian', orderable: true, searchable: true },
      {data: 'tgl_selsai_ujian', name: 'tgl_selsai_ujian', orderable: true, searchable: true },
      {data: 'action', name: 'action', orderable: false, searchable: false, },
    ],
    "drawCallback": function (setting) {}
  });
  $("#btn-upload-soal").click(function() {
    $("#wrap-soal").hide();
    $("#wrap-upload-soal").slideToggle();
  })
  $("#batal-upload").click(function() {
    $("#wrap-upload-soal").slideToggle();
  })
  $("#btn-soal").click(function() {
    $("#wrap-upload-soal").hide();
    $("#wrap-soal").slideToggle();
  })
  $("#btnbatal").click(function() {
    $("#wrap-soal").slideToggle();
  })
  $("#btnSimpan").click(function(){
    $("#wrap-btn").hide();
    $("#loading").show();
    var dataString = $("#formSoal").serialize();
    $.ajax({
      type: "POST",
      url: "{{ url('/crud/simpan-soal') }}",
      data: dataString,
      success: function(data){
        console.log(data);
        if (data == 'ok') {
          $("#loading").hide();
          $("#wrap-btn").show();
          $("#notif").removeClass('alert alert-danger').addClass('alert alert-info').html("<i class='fa fa-info-circle'></i> Data berhasil disimpan.").fadeIn(350);
          window.location.href = "{{ url('/elearning/soal') }}";
        }else{
          $("#loading").hide();
          $("#wrap-btn").show();
          $("#notif").removeClass('alert alert-info').addClass('alert alert-danger').html(data).fadeIn(350);
        }
      }
    })
  });
});
</script>
@endpush