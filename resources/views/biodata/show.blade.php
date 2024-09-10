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
        <th>Nama</th>
        <td>{{ $biodata->nama }}</td>
    </tr>
   <tr>
       <th>NIS</th>
       <td>{{ $biodata->nis }}</td>
   </tr>
    <tr>
       <th>Jenis Kelamain</th>
       <td>{{ $biodata->jk }}</td>
   </tr>
   <tr>
    <th>NISN</th>
    <td>{{ $biodata->nisn }}</td>
</tr>
<tr>
    <th>Tempat Lahir</th>
    <td>{{ $biodata->tampat_lahir }}</td>
</tr>
<tr>
    <th>Tanggal Lahir</th>
    <td>{{ $biodata->tanggal_lahir }}</td>
</tr>
<tr>
    <th>NIK</th>
    <td>{{ $biodata->nik }}</td>
</tr>
<tr>
    <th>Agama</th>
    <td>{{ $biodata->agama }}</td>
</tr>
<tr>
    <th>Alamat</th>
    <td>{{ $biodata->alamat }}</td>
</tr>
<tr>
    <th>RT</th>
    <td>{{ $biodata->rt }}</td>
</tr>
<tr>
    <th>RW</th>
    <td>{{ $biodata->rw }}</td>
</tr><tr>
    <th>Kelurahan</th>
    <td>{{ $biodata->kelurahan }}</td>
</tr>
<tr>
    <th>Kecamatan</th>
    <td>{{ $biodata->kecamatan }}</td>
</tr>
<tr>
    <th>Kode Pos</th>
    <td>{{ $biodata->kode_pos }}</td>
</tr>
<tr>
    <th>Nomer HP</th>
    <td>{{ $biodata->hp }}</td>
</tr>
<tr>
    <th>Email</th>
    <td>{{ $biodata->email }}</td>
</tr>
<tr>
    <th>SKHUN</th>
    <td>{{ $biodata->skhun }}</td>
</tr>
<tr>
    <th>Nama Ayah</th>
    <td>{{ $biodata->nama_ayah }}</td>
</tr>
<tr>
    <th>Tahun Lahir Ayah</th>
    <td>{{ $biodata->tahun_lahir_ayah }}</td>
</tr>
<tr>
    <th>Pendidikan Ayah</th>
    <td>{{ $biodata->jenjang_pendidikan_ayah }}</td>
</tr><tr>
    <th>Pekerjaan Ayah</th>
    <td>{{ $biodata->pekerjaan_ayah }}</td>
</tr>
<tr>
    <th>NIK Ayah</th>
    <td>{{ $biodata->nik_ayah }}</td>
</tr>
<tr>
    <th>Nama Ibu</th>
    <td>{{ $biodata->nama_ibu }}</td>
</tr>
<tr>
    <th>Tahun Lahir Ibu</th>
    <td>{{ $biodata->tahun_lahir_ibu }}</td>
</tr>
<tr>
    <th>Pendidikan Inu</th>
    <td>{{ $biodata->jenjang_pendidikan_ibu }}</td>
</tr>
<tr>
    <th>Pendidikan Ibu</th>
    <td>{{ $biodata->pekerjaan_ibu }}</td>
</tr>
<tr>
    <th>NIK Ibu</th>
    <td>{{ $biodata->nik_ibu }}</td>
</tr>
<tr>
    <th>Rombel</th>
    <td>{{ $biodata->rombel }}</td>
</tr>
<tr>
    <th>No Peserta UN</th>
    <td>{{ $biodata->no_peserta_ujian_nasional }}</td>
</tr>
<tr>
    <th>No Seri Ijazah</th>
    <td>{{ $biodata->no_seri_ijazah }}</td>
</tr>
<tr>
    <th>Asal Sekolah</th>
    <td>{{ $biodata->sekolah_asal }}</td>
</tr>
<tr>
    <th>Anak Ke</th>
    <td>{{ $biodata->anak_ke_berapa }}</td>
</tr>
<tr>
    <th>No KK</th>
    <td>{{ $biodata->no_kk }}</td>
</tr>
<tr>
    <th>Berat Badan</th>
    <td>{{ $biodata->berat_badan }}</td>
</tr>
<tr>
    <th>Tinggi Badan</th>
    <td>{{ $biodata->tinggi_badan }}</td>
</tr>
<tr>
    <th>Lingkar Kepala</th>
    <td>{{ $biodata->lingkar_kepala }}</td>
</tr>
<tr>
    <th>Jumlah Saudara Kandung</th>
    <td>{{ $biodata->jumlah_saudara_kandung }}</td>
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