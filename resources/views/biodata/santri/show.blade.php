@extends('layouts.app')
@section('title', 'Biodata siswa')
@section('breadcrumb')

@endsection

@section('content')


 
<div class="box">
    <div class="box-header">
        <h3 class="box-title">
          <i class="fa fa-user"></i> Detail Biodata Siswa 
        </h3> 
    </div>
    <div class="box-body">
    <table id="example1" class="table table-bordered table-striped">
        <tr>
            <th>NIS</th>
            <td>{{ $biodata->no_induk }}</td>
        </tr>
        <tr>
        <th>NAMA LENGKAP</th>
        <td>{{ $biodata->nm_lengkap }}</td>
    </tr>
   <tr>
       <th>NAMA PANGGILAN</th>
       <td>{{ $biodata->nm_panggilan }}</td>
   </tr>
    <tr>
       <th>TEMPAT LAHIR</th>
       <td>{{ $biodata->tempat_lahir }}</td>
   </tr>
   <tr>
    <th>TANGGAL LAHIR</th>
    <td>{{ $biodata->tgl }}</td>
</tr>
<tr>
    <th>JENIS KELAMIN</th>
    <td>{{ $biodata->jk }}</td>
</tr>
<tr>
    <th>EMAIL</th>
    <td>{{ $biodata->email }}</td>
</tr>
<tr>
    <th>STATUS</th>
    <td>{{ $biodata->status }}</td>
</tr>
<tr>
    <th>PEKERJAAN</th>
    <td>{{ $biodata->kerja }}</td>
</tr>
<tr>
    <th>ALAMAT KERJA</th>
    <td>{{ $biodata->alamat_kerja }}</td>
</tr>
<tr>
    <th>PENDIDIKAN TERAKHIR</th>
    <td>{{ $biodata->pendidikan }}</td>
</tr>
<tr>
    <th>NO HP</th>
    <td>{{ $biodata->no_hp }}</td>
</tr>


    <th colspan="2">
   

        @if(Auth::user()->gambar != "")
        <img src="{{ Storage::url('public/guru/'.Auth::user()->gambar) }}" 
        alt="user img" width="200px" class="img img-thumbnail" style="margin-bottom: px">
        @else
          <img src="{{ url('/assets/img/download.png') }}" 
          class="profile-user-img img-responsive img-circle" alt="User Image">
        @endif  
    </th>


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