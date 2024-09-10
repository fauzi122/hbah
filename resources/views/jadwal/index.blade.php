@extends('layouts.app')
@section('title', 'jadwal mengajar')
@section('breadcrumb')

@endsection
@section('content')
<?php $sesi = md5(rand(0000000000, mt_getrandmax())); ?>
<?php include(app_path().'/functions/myconf.php'); ?>
@php
$tanggal = date('Y-m-d');
$day = date('D', strtotime($tanggal));
$dayList = array(
    'Sun' => 'Minggu',
    'Mon' => 'Senin',
    'Tue' => 'Selasa',
    'Wed' => 'Rabu',
    'Thu' => 'Kamis',
    'Fri' => 'Jumat',
    'Sat' => 'Sabtu'
);
$time=date('H:i');
@endphp

  <!-- Content Header (Page header) -->
  

  <!-- Main content -->
  <section class="content">
    <div class="row">
     
      <!-- /.col -->
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-calendar"></i> Jadwal Mengajar - {{ Auth::user()->no_induk }} {{ Auth::user()->nama }}</h3>
           
            <div class="box-tools pull-right">
               <a href="" class="btn btn-xs btn-default"><i class="fa fa-refresh"></i> refresh </a>
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="table-responsive">
        <div class="box-header">
          
          <!-- /.box-header -->
          <div class="box-body no-padding">
            <div class="mailbox-controls">
              <!-- Check all button -->
            
            
                <!-- /.btn-group -->
              </div>
              <!-- /.pull-right -->
            </div>
         
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Waktu Mengajar</th>
                  <th>Kelas</th>
                  <th>ID Mapel - Nama Mapel</th>
                  <th>Ruang </th>
                  <th>Aksi</th>
                  <th>Mengajar </th>
                 
                  
                </tr>
              </thead>
              <tbody>
                
                @foreach ($jadwal as $jad)
                @php
                $id=Crypt::encryptString($jad->id_kelas.','.$jad->id_mtk.','.$jad->no_induk);                                    
                @endphp
                  <tr>
                     
                    <td> <a href="">{{$jad->hari}},  {{$jad->mulai}} - {{$jad->selsai}}</a></td>
                    <td> {{$jad->nm_kelas}}</td>
                    <td><b>{{$jad->id_mtk}}</b> - {{$jad->nm_mtk}} </td>
                    <td><b>{{$jad->ruang}}</td>
                  
                    
                    <td>
                         {{--  <a href="{{ url('/elearning/tugas/'.$id) }}"class="btn btn-sm btn-danger" title="Ruang Quis">
                          <i class="fa fa-th-large"></i> </a>       --}}
                         <a href="{{ url('/elearning/tugas/'.$id) }}"class="btn btn-sm btn-soundcloud" title="Ruang Tugas">
                          <i class="fa fa-inbox"></i> </a> 
                         <a href="{{ url('/elearning/addmateri/'.$id) }}"class="btn btn-sm btn-primary"title="Ruang Materi">
                          <i class="fa fa-file-pdf-o"></i> </a> 
                    </td>
                           
                    <td>
                      <form action="/elearning/jadwal/store"method="POST" enctype="multipart/form-data">
                        @csrf
                       

                        <input type="hidden" name="id_mtk" value="{{$jad->id_mtk}}">
                        <input type="hidden" name="nm_mtk" value="{{$jad->nm_mtk}}">
                        <input type="hidden" name="no_induk" value="{{$jad->no_induk}}">
              
                        <input type="hidden" name="id_kelas" value="{{$jad->id_kelas}}">
                        <input type="hidden" name="hari" value="{{$jad->hari}}">
                        <input type="hidden" name="jam" value="{{$jad->jam}}">
                        <input type="hidden" name="jam_t" value="{{$jad->jam_t}}">
                        <input type="hidden" name="ruang" value="{{$jad->ruang}}">
                        <input type="hidden" name="mulai" value="{{$jad->mulai}}">
                        <input type="hidden" name="selesai" value="{{$jad->selesai}}">
                        
                     
                        @if ($dayList[$day]==$jad->hari )
                         
                          <button type='submit' class="btn btn-sm btn-success"title="Masuk Mengajar">
                            Masuk Mengajar </button>   
                        @else
                        <button type='submit' class="btn btn-sm btn-default disabled"title="Belum Waktunya">
                          Masuk Mengajar </button>
                        @endif
                  
                        
                       
                  
          
                      </td>
                  </form>
                  </tr>
                  @endforeach
             
              </tbody>
            </table>  
            <!-- /.mail-box-messages -->
          </div>
          <!-- /.box-body -->
       
          </div>
        </div>
        <!-- /. box -->
      </div>
      <!-- /.col -->
    </div>
  </div>
    <!-- /.row -->
  </section>

<!-- /.content-wrapper -->
@endsection
@push('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{URL::asset('assets/plugins_tes/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{URL::asset('assets/plugins_tes/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{URL::asset('assets/plugins_tes/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

@endpush
@push('scripts')

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

<!-- Page specific script -->
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