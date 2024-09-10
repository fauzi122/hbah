@extends('layouts.app')
@section('title', 'SMA Negeri 1 Ciseeng')

@section('content')
<div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Jadwal Sekolah {{ Auth::user()->nama }} </h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body">
 <table id="example1" class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Guru</th>
        <th>Waktu Pelajaran</th>
        <th>Kelas</th>
        <th>ID Mapel - Nama Mapel</th>
        <th>Ruang </th>
        <th><center>Aksi</center></th>
       
        
      </tr>
    </thead>
    <tbody>
      
      @foreach ($jadwal_siswa as $jad)
      @php
      $id=Crypt::encryptString($jad->id_kelas.','.$jad->id_mtk); 
      $jadwal=Crypt::encryptString($jad->id_mtk.','.$jad->nm_mtk.','.$jad->no_induk.',
      '.$jad->id_kelas.','.$jad->hari.','.$jad->jam_t.','.$jad->ruang);                                  

      @endphp
        <tr>
          <td>{{$loop->iteration}}</td>
          <td> {{$jad->nm_guru}}</td>
          <td> <a href="">{{$jad->hari}},  {{$jad->mulai}} - {{$jad->selsai}}</a></td>
          <td> {{$jad->nm_kelas}}</td>
          <td><b>{{$jad->id_mtk}}</b> - {{$jad->nm_mtk}} </td>
          <td><b>{{$jad->ruang}}</td>
          
          <td>
            <div class="button-group">
              
               {{--  <a href="{{ url('/elearning/tugas/'.$id) }}"class="btn btn-sm btn-danger" title="Ruang Quis">
                <i class="fa fa-th-large"></i> </a>       --}}
               <a href="{{ url('/siswa/tugas/'.$id) }}"class="btn btn-sm btn-soundcloud" title="Ruang Tugas">
                <i class="fa fa-inbox"></i> </a> 
               <a href="{{ url('/siswa/materi-belajar/'.$id) }}"class="btn btn-sm btn-primary"title="Ruang Materi">
                <i class="fa fa-file-pdf-o"></i> </a>
                <a href="{{ url('/siswa/absen/'.$jadwal) }}"class="btn btn-sm btn-success"title="Masuk Kelas">
                  Masuk Kelas </a> 
                </div> 
          </td>
                 
          
        @endforeach
   
    </tbody>
  </table> 
</div>
<div class="box-footer" style="margin: 0; padding: 0 10px">
  </div>
</div>
</div>

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