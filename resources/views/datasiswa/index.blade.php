@extends('layouts.app')
@section('title', 'Tambah Materi')
@section('breadcrumb')

@endsection

@section('content')


 
<div class="box">
    <div class="box-header">
        <h3 class="box-title">
          <i class="fa fa-list"></i> Data Siswa Import</h3> 
          <p></p>
          <hr>
		  @if (session('success'))
		  <div class="alert alert-success">
			  {{ session('success') }}
			  {{--  <a href="/lecturer/schedule" class="btn btn-info">  Lihat Jadwal Dosen</a>  --}}
		  </div>
		  @endif

		  @if (session('error'))
			  <div class="alert alert-success">
				  {{ session('error') }}
			  </div>
		  @endif
          <button type="button" class="btn btn-primary mr-5" data-toggle="modal" data-target="#importExcel">
		 <i class="fa fa-upload"></i>
            IMPORT EXCEL
		</button>
 
		<!-- Import Excel -->
		<div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<form method="post" action="/data/import_excel" enctype="multipart/form-data">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">
                                
                                Import Excel</h5>
						</div>
						<div class="modal-body">
 
							{{ csrf_field() }}
 
							<label>Pilih file excel</label>
							<div class="form-group">
								<input type="file" name="file" required="required" class="inputfile">
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
 
 
		
		<a href="/data/export_excel" class="btn btn-success my-3" target="_blank">
            <i class="fa fa-download"></i> 
            EXPORT EXCEL</a>
		<a href="{{ asset('file/siswa_baru.xlsx') }}" class="btn btn-info my-3">
				<i class="fa fa-file"></i> 
				Format Upload</a>

				<div class="pull-right">
				{{-- <form action="/data/singkron-user" method="POST">
					@csrf
					<button class="btn btn-danger my-3" type="submit">
						<i class="fa fa-spinner"></i> Singkron User </button>   
			   
				</form> --}}
				</div>
			
      </div>
      <!-- /.box-header -->
		
      <div class="box-body">

        <table id="example1" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th>NIS</th>
					{{--  <th>NISN</th>  --}}
					<th>Jenis Kelamin</th>
					<th><center>ID Kelas</center></th>
					<th>Nama Kelas</th>
					<th>Email</th>
					
				</tr>
			</thead>
			<tbody>
				@php $i=1 @endphp
				@foreach($datasiswa as $s)
			
				<tr>
					<td>{{ $i++ }}</td>
					<td>{{$s->nm_siswa}}</td>
					<td>{{$s->no_induk}}</td>
					{{--  <td>{{$s->nisn}}</td>  --}}
					<td><center><b>{{$s->jk}}</b></center></td>
					<td><center><b>{{$s->id_kelas}}</b></center></td>
					<td> {{$s->nama}}</td>
					<td>{{$s->email}}</td>
				</tr>
				@endforeach
			</tbody>
		</table>

    </div>
</div>
 

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

<script src="{{asset('assets/plugins/datatables/media/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables/media/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables/extensions/Responsive/js/dataTables.responsive.js')}}"></script>
<script src="{{asset('assets/plugins/datatables/extensions/FixedHeader/js/dataTables.fixedHeader.js')}}"></script>
<script src="{{ asset('/assets/plugins/summernote/summernote.min.js') }}"></script>
<script src="{{ asset('/assets/plugins/dropzone/dropzone.js') }}"></script>
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