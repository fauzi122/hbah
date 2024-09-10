@extends('layouts.app')
@section('title', 'Tambah Materi')
@section('breadcrumb')

@endsection

@section('content')


 
<div class="box">
    <div class="box-header">
        <h3 class="box-title">
          <i class="fa fa-file-o"></i> Data Mapel</h3> 
          
          <p></p>
          <hr>
   
          <button type="button" class="btn btn-info mr-5" data-toggle="modal" data-target="#importExcel1">
            <i class="fa fa-upload"></i>
                   Tambah Data
           </button>
          <!-- create data -->
         @include('mapel.create')
         
          <button type="button" class="btn btn-info mr-5" data-toggle="modal" data-target="#importExcel">
		 <i class="fa fa-upload"></i>
            IMPORT EXCEL
		</button>
 
		<!-- Import Excel -->
		<div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<form method="post" action="/mapel/import_excel" enctype="multipart/form-data">
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
 
 
		
		<a href="/mapel/export_excel" class="btn btn-success my-3" target="_blank">
            <i class="fa fa-download"></i> 
            EXPORT EXCEL</a>
 
     
      </div>
      <!-- /.box-header -->
		
      <div class="box-body">

        <table id="example1" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>No</th>
					<th>Kode Mapel</th>
					<th>Nama Mapel</th>
					
					<th>Created</th>
					<th>Aksi</th>
				
					
				</tr>
			</thead>
			<tbody>
				@php $i=1 @endphp
     
				@foreach($materi as $mtk)
       {{--  @php
         if ($mtk->status == 'Y') {
          $status_mtk = 'Tampil';
        }else{
          $status_mtk = 'Tidak tampil';
        } 
        @endphp  --}}
				<tr>
					<td>{{ $i++ }}</td>
					<td>{{$mtk->id_mtk}}</td>
					<td>{{$mtk->nm_mtk}}</td>
					<td>{{$mtk->created_at}}</td>
					<td>
            <center>
             {{--  @can('posts.delete')  --}}
             <button onClick="Delete(this.id)" class="btn btn-xs btn-danger" id="{{ $mtk->id}}">
              <i class="fa fa-trash"></i> Hapus
          </button>
        </center>
      {{--  @endcan  --}}
           
          </td>
				</tr>
				@endforeach
			</tbody>
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
                  url: "/mapel/destroy/"+id,
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