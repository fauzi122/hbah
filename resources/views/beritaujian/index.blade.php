@extends('layouts.app')
@section('title', 'Brita Acara')
@section('breadcrumb')

@endsection
@section('content')
<?php include(app_path() . '/functions/myconf.php'); ?>
<div class="box">
    <div class="box-header">
      <h3 class="box-title">
        <i class="fa fa-folder-open"></i> Berita Acara Ujian</h3> 
        <p></p>
        <hr>
          <a href="/brita-acara/create" class="btn btn-primary"> <i class="fa fa-plus"></i>
              Buat Berita Acara </a>
   
    </div>
    <!-- /.box-header -->
    

    <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>No</th>
          <th>No Induk</th>
          <th>Kelas</th>
          <th>Nama Pelajaran</th>
          <th><center>Jenis Ujian</center></th>
          <th style="text-align: center; width: 100px" >Created</th>
          <th style="text-align: center; width: 110px">Aksi</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($beritaujian as $no => $bt)
                
           
    <tr>
          <td>{{ ++$no }}</td>
          <td>{{ $bt->no_induk }}</td>
          <td>{{ $bt->kls }}</td>
          <td> {{ $bt->nama_mtk }}</td>
          <td> <center><b class="btn btn-sm btn-warning">{{ $bt->jns_ujian }}</b>  </center></td>
          <td> <center>{{ $bt->created_at }}</center></td>
          <td style="text-align: center; width: 110px">  
            <div class="btn-group">
            <button type="button" class="btn btn-primary btn-flat">
                <i class="fa fa-xs fa-check" title="Lihat Aksi"></i>
            </button>
            <button type="button" class="btn btn-primary btn-flat dropdown-toggle" data-toggle="dropdown">
              <span class="caret"></span>
              <span class="sr-only">Toggle Dropdown</span>
            </button>
            <ul class="dropdown-menu" role="menu">
           
              <li><a href="#">Lihat Data</a></li>
              <li><a href="#">Edit Data</a></li>
             
            </ul>
          </div>
        </td>
    </tr>

        @endforeach
     
        </tbody>
        <tfoot>
        <tr>
            <th>No</th>
            <th>Kelas</th>
            <th> Pelajaran</th>
            <th>Judul</th>
            <th style="text-align: center; width: 100px" >created</th>
            <th style="text-align: center; width: 110px">Aksi</th>
        </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
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
</style>
@endpush
@push('scripts')

<script src="{{URL::asset('assets/plugins/datatables/media/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatables/media/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatables/extensions/Responsive/js/dataTables.responsive.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatables/extensions/FixedHeader/js/dataTables.fixedHeader.js')}}"></script>
<script src="{{ URL::asset('/assets/plugins/summernote/summernote.min.js') }}"></script>
<script src="{{ URL::asset('/assets/plugins/dropzone/dropzone.js') }}"></script>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      dom: 'Blfrtip',
      lengthMenu: [
          [ 10, 25, 50, 10000 ],
          [ '10', '25', '50', 'Show All' ]
      ],
      buttons: [
          'copy', 'csv', 'excel', 'pdf', 'print',
        
      ],  
      "autoWidth": false
     
    });
  });
</script>

@endpush