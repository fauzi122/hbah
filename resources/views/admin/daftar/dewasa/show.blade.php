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
       <th>Nama Panggilan</th>
       <td>{{ $formank->nm_panggilan }}</td>
   </tr>
    <tr>
       <th>Tempat Tanggal Lahir</th>
       <td>{{ $formank->tempat_lahir }} , {{ $formank->tgl }}</td>
   </tr>
   <tr>
    <th>Alamat</th>
    <td>{{ $formank->alamat }}</td>
</tr>
<tr>
    <th>Status</th>
    <td>{{ $formank->status }}</td>
</tr>
<tr>
    <th>Pekerjaan</th>
    <td>{{ $formank->kerja }}</td>
</tr>
<tr>
    <th>Alamat Kerja</th>
    <td>{{ $formank->alamat_kerja }}</td>
</tr>
<tr>
    <th>Pendidikan </th>
    <td>{{ $formank->pendidikan }}</td>
</tr>
<tr>
    <th>No HP</th>
    <td>{{ $formank->no_hp }}</td>
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