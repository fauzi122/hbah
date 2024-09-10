@extends('layouts.app')
@section('title', 'Tambah Materi')
@section('breadcrumb')

@endsection

@section('content')


 
<div class="box">
    <div class="box-header">
        <h3 class="box-title">
          <i class="fa fa-calendar-check-o"></i> Data Jadwal</h3> 
		  <div class="pull-right">
			<form action="/datajawal/tran" method="POST">
				@csrf
				<button class="btn btn-danger" type="submit">
					<i class="fa fa-trash"></i> Kosongkan Jadwal </button>  
			</form>
			
		</div>
          <p></p>
          <hr>
	
          <button type="button" class="btn btn-primary mr-5" data-toggle="modal" data-target="#importExcel">
		 <i class="fa fa-upload"></i>
		 Import Excel
		</button>
 
		<!-- Import Excel -->
		<div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<form method="post" action="/datajawal/import_excel" enctype="multipart/form-data">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">
                                
                                Import Excel</h5>
						</div>
						<div class="modal-body">
 
							{{ csrf_field() }}
 
							<label>Pilih file excel</label>
							<div class="form-group">
								<input type="file" name="file" required="required">
							</div>
 
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Import</button>
						</div>
					</div>
				</form>
			</div>
		</div>
 
 
		
		<a href="{{ asset('file/jadwalok.xlsx') }}" class="btn btn-info my-3">
			<i class="fa fa-file"></i> 
			Format Upload</a>
		
     
      </div>

      <!-- /.box-header -->
		
      <div class="box-body">

        <table id="example1" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>No</th>
					<th>NIP</th>
					<th>Kelas</th>
					<th>ID Mapel</th>
					<th>Nama Mapel</th>
					<th>Hari</th>
					<th>Jam Mulai</th>
					<th>Jam Selsai</th>
					<th>Ruang</th>
					
					
				</tr>
			</thead>
			<tbody>
				@php $i=1 @endphp
				@foreach($jadwal as $s)
			
				<tr>
					<td>{{ $i++ }}</td>
					<td>{{$s->no_induk}}</td>
					<td>{{$s->id_kelas}}</td>
					<td>{{$s->id_mtk}}</td>
					<td>{{$s->nm_mtk}}</td>
					<td>{{$s->hari}}</td>
					<td>{{$s->mulai}}</td>
					<td>{{$s->selsai}}</td>
					<td>{{$s->ruang}}</td>
					{{--  <td><a href="" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Hapus</a></td>  --}}
				</tr>
				@endforeach
			</tbody>
		</table>

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
