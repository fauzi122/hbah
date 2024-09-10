@extends('layouts.app')
@section('title', 'Biodata siswa')
@section('breadcrumb')

@endsection

@section('content')


 
<div class="box">
    <div class="box-header">
        <h3 class="box-title">
          <i class="fa fa-users"></i> Detail Biodata Calon Santri Baru
        </h3> 
    </div>
    <div class="box-body">
    <table id="example1" class="table table-bordered table-striped">
    <tr>
        <th>Nama Lengkap</th>
        <td>{{ $formank->nm_lengkap }}</td>
    </tr>
   <tr>
       <th>Nama Pnggilan</th>
       <td>{{ $formank->nm_panggilan }}</td>
   </tr>
   <tr>
    <th>Tempat Lahir</th>
    <td>{{ $formank->tempat_lahir }} , {{ $formank->tgl }}</td>
</tr>
    <tr>
       <th>Jenis Kelamin</th>
       <td>{{ $formank->jk }} </td>
   </tr>
   <tr>
    <th>Email</th>
    <td>{{ $formank->email }} </td>
</tr>

   <tr>
    <th>Alamat</th>
    <td>{{ $formank->alamat }}</td>
</tr>
<tr>
    <th>Nama Orang Tua/Wali</th>
    <td>{{ $formank->nm_ortu }}</td>
</tr>
<tr>
    <th>Pekerjaan Orang Tua/Wali</th>
    <td>{{ $formank->kerja_ortu }}</td>
</tr>
<tr>
    <th>Alamat Pekerjaan Orang Tua/Wali</th>
    <td>{{ $formank->alamat_kerja_ortu }}</td>
</tr>
<tr>
    <th>Pendidikan Pekerjaan Orang Tua/Wali</th>
    <td>{{ $formank->pendidikan_ortu }}</td>
</tr>
<tr>
    <th>No Hp Pekerjaan Orang Tua/Wali</th>
    <td>{{ $formank->no_hp_ortu }}</td>
</tr>





</table>
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