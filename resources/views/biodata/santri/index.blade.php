@extends('layouts.app')

@section('title', 'Biodata siswa')

@section('breadcrumb')



@endsection



@section('content')





 

<div class="box">

    <div class="box-header">

        <h3 class="box-title">

          <i class="fa fa-user-friends"></i> Biodata Santri </h3> 

		  <div class="pull-right">
		</div>
          <p></p>
          <hr>
          <button type="button" class="btn btn-primary mr-5" data-toggle="modal" data-target="#importExcelbiodata">
		 <i class="fa fa-upload"></i>
		 Import Excel
		</button>

 

		<!-- Import Excel -->

		<div class="modal fade" id="importExcelbiodata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<form method="post" action="/biodata/import_excel" enctype="multipart/form-data">
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

					<th>NIS</th>
					<th>NAMA LENGKAP</th>
					<th>NAMA PANGGILAN</th>
					<th>TTL</th>
					<th>JK</th>
					<th>EMAIL</th>
					<th>AKSI</th>
				</tr>

			</thead>

			<tbody>

				@php $i=1 @endphp

				@foreach($biodata as $b)

			

				<tr>

                    <td>{{ $b->no_induk }}</td>
					<td>{{ $b->nm_lengkap }}</td>
					<td>{{ $b->nm_panggilan }}</td>
					<td>{{ $b->tempat_lahir }} , {{ $b->tgl }}</td>
					<td>{{ $b->jk }}</td>
					<td>{{ $b->email }}</td>
					

					<td>
						<button onClick="Delete(this.id)" class="btn btn-xs btn-danger" id="{{ $b->id}}">
							<i class="fa fa-trash"></i> hapus
						</button>

                        <a href="/biodata/santri-show/{{ $b->no_induk }}" class="btn btn-xs btn-info"><i class="fa fa-tag"></i> detail</a> </td>
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
<script>
	//ajax delete
	function Delete(id)
	{
		var id = id;
		var token = $("meta[name='csrf-token']").attr("content");
  
		swal({
			title: 'Yakin akan dihapus?',
			text: "Data yang telah dihapus tidak bisa dikembalikan.",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, delete it!'
		}).then(function(isConfirm) {
			if (isConfirm) {
  
				//ajax delete
				jQuery.ajax({
					url: "/biodata/destroy/"+id,
					data: 	{
						"id": id,
						"_token": token
					},
					type: 'DELETE',
					success: function (response) {
						if (response.status == "success") {
							swal({
								title: 'BERHASIL!',
								text: 'DATA BERHASIL DIHAPUS!',
								type: 'success',
								timer: 1000,
								showConfirmButton: false,
								showCancelButton: false,
								buttons: false,
							}).then(function() {
								location.reload();
							});
						}else{
							swal({
								title: 'GAGAL!',
								text: 'DATA GAGAL DIHAPUS!',
								type: 'error',
								timer: 1000,
								showConfirmButton: false,
								showCancelButton: false,
								buttons: false,
							}).then(function() {
								location.reload();
							});
						}
					}
				});
  
			} else {
				return true;
			}
		})
	}
  </script>

@endpush

