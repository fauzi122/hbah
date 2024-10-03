@extends('layouts.app')
@section('title', 'Kartu Ujian')
@section('breadcrumb')

@endsection
@section('content')
{{-- <?php include(app_path() . '/functions/myconf.php'); ?> --}}
<div class="col-md-12">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Master Data Kartu Ujian</h3>
      @if(Auth::user()->status == "A")
      <div class="pull-right">
        <a href="{{ url('/cetak/create-data') }}" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>Tambah Siswa</a>
        <button type="button" class="btn btn-success" id="btn-upload"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Upload via Excel</button>
        <a href="{{ url('/cetak/export_excel') }}" class="btn btn-info"><i class="fa fa-download" aria-hidden="true"></i> Export Data</a>
        <a href="{{ url('master/siswa/delete') }}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Hapus Semua Siswa</a>
      </div>
      @endif
    </div>
    <div class="box-body">
      @if(Auth::user()->status == "A")
      
      @include('kartu.create')

      @endif
     
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>NO</th>
            <th>Nama</th>
            <th>NIS</th>
            <th>Kelas</th>
            <th>Status</th>
            <th>Ceated</th>
            <th style="width: 130px; text-align: center;">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($kartu as $no=>$kartu )
            
        
          <tr>
            <td>{{ ++$no }}</td>
            <td>{{ $kartu->no_induk }}</td>
            <td>{{ $kartu->nama }}</td>
            <td>{{ $kartu->kls }}</td>
            <td>{{ $kartu->status }}</td>
            <td>{{ $kartu->created_at }}</td>
            <td>
              <a href="" class="btn btn-xs btn-danger">
                Hapus
              </a>
              <a href="/cetak/ubah/{{ $kartu->no_induk }}" class="btn btn-xs btn-primary">
                Detail
              </a>
            </td>
          </tr>
          @endforeach

        </tbody>
      </table>
     
    </div>
  </div>
</div>
@endsection
@push('css')
<link rel="stylesheet" href="{{URL::asset('assets/plugins/datatables/media/css/dataTables.bootstrap.css')}}">
<link rel="stylesheet" href="{{URL::asset('assets/plugins/datatables/extensions/Responsive/css/responsive.dataTables.css')}}">
<link rel="stylesheet" href="{{URL::asset('assets/plugins/datatables/extensions/FixedHeader/css/fixedHeader.bootstrap.css')}}">
<link rel="stylesheet" href="{{URL::asset('assets/plugins/select2/select2.min.css')}}">

<style type="text/css">
  .select2-container--default .select2-selection--single {
    height: 33px;
  }

  .inputfile {
    width: 0.1px;
    height: 0.1px;
    opacity: 0;
    overflow: hidden;
    position: absolute;
    z-index: -1;
  }

  .inputfile+label {
    font-size: 1.25em;
    font-weight: 700;
    color: white;
    background-color: green;
    display: inline-block;
    padding: 10px;
  }

  .inputfile:focus+label,
  .inputfile+label:hover {
    background-color: darkgreen;
  }

  .inputfile+label {
    cursor: pointer;
  }

  .inputfile:focus+label {
    outline: 1px dotted #000;
    outline: -webkit-focus-ring-color auto 5px;
  }

  .inputfile+label * {
    pointer-events: none;
  }
</style>
@endpush
@push('scripts')
<script src="{{ url('assets/dist/js/sweetalert2.all.min.js') }}"></script>
<script src="{{URL::asset('assets/plugins/select2/select2.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatables/media/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatables/media/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatables/extensions/Responsive/js/dataTables.responsive.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatables/extensions/FixedHeader/js/dataTables.fixedHeader.js')}}"></script>


<script src="{{URL::asset('assets/plugins_tes/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins_tes/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins_tes/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins_tes/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins_tes/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins_tes/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins_tes/jszip/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins_tes/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins_tes/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins_tes/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins_tes/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins_tes/datatables-buttons/js/buttons.colVis.min.js')}}"></script>



<script>
  $(document).ready(function() {
    $('.select2Class').select2();



    $("#btn-siswa").click(function() {
      $("#wrap-siswa").slideToggle();
    });

    $("#batal").click(function() {
      $("#wrap-siswa").slideToggle();
    });

    $("#btn-upload").click(function() {
      $("#wrap-upload-siswa").slideToggle();
    });
    
    $("#batal-upload").click(function() {
      $("#wrap-upload-siswa").slideToggle();
    });

    $('#no_induk').keyup(function() {
      $('#email').val($(this).val() + '@ayosinau.com');
    });

    $("#simpan-siswa").click(function() {
      $("#wrap-btn").hide();
      $("#loading").show();
      var dataString = $("#form-siswa").serialize();
      $.ajax({
        type: "POST",
        url: "{{ url('/crud/simpan-siswa') }}",
        data: dataString,
        success: function(data) {
          $("#loading").hide();
          $("#wrap-btn").show();
          if (data == '1') {
            $("#notif").removeClass('alert alert-danger').addClass('alert alert-info').html("Siswa berhasil ditambahkan.").show();
            window.location.href = "{{ url('master/siswa') }}";
          } else {
            $("#notif").removeClass('alert alert-info').addClass('alert alert-danger').html(data).show();
          }
        }
      })
    });
  });
</script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print"]
	
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
	 
    });
  });
</script>
@endpush