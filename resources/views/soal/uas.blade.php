<?php use Carbon\Carbon; ?>
@extends('layouts.app')
@section('title', 'SMA Negeri 1 Ciseeng')
@section('breadcrumb')
  {{--  <h1> Paket Soal <b> Ujian Tengah Semester </b></h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
    <li class="active">Jadwal Ujian</li>
  </ol>
@endsection  --}}

@section('content')
<div class="col-md-12">
  @if (session('success'))
  <div class="alert alert-success">
      {{ session('success') }}
    
  </div>
  @endif

  @if (session('error'))
      <div class="alert alert-success">
          {{ session('error') }}
      </div>
  @endif
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">
        <i class="fa fa-folder-open"></i>
        Paket Soal <b> Ujian Akhir Semester</b> </h3>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div>
    </div>
<div class="box-body">
  <a href="/elearning/soal/create-uas" class="btn btn-success">
    <i class="fa fa-pencil-square-o"></i> Tambah Data
  </a>
  <p></p>
  <table class="table table-hover table-striped" id="table_soal">
    @if (Auth::user()->status == 'G')
      <caption>Data paket soal yang Anda buat</caption>
    @else
      <caption>Data paket soal</caption>
    @endif
    <thead>
      <tr>
        <th>ID Mapel</th>
        <th>Nama Mapel</th>
        <th>Paket </th>
       
        <th>Mulai</th>
        <th>Selsai</th>
        <th style="text-align: center;">KKM</th>
        <th style="text-align: center; width: 70px">Waktu</th>
        <th style="text-align: center; width: 110px">Aksi</th>
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
        url: '{!! route('elearning.get-soaluas') !!}',
        
      },
      columns: [
        {data: 'id_mtk', name: 'id_mtk', orderable: true, searchable: true },
        {data: 'nm_mtk', name: 'nm_mtk', orderable: true, searchable: true },
        {data: 'paket', name: 'paket', orderable: true, searchable: true },
        
        {data: 'tgl_ujian', name: 'tgl_ujian', orderable: true, searchable: true },
        {data: 'tgl_selsai_ujian', name: 'tgl_selsai_ujian', orderable: true, searchable: true },
        {data: 'kkm', name: 'kkm', orderable: true, searchable: true },
        {data: 'waktu', name: 'waktu', orderable: true, searchable: true },
        {data: 'action', name: 'action', orderable: false, searchable: false, },
      ],
      "drawCallback": function (setting) {}
    });
    $("#btn-wrap-info").click(function() {
      $(this).hide();
      $("#wrap-info").show();
    });
  });
  </script>
@endpush