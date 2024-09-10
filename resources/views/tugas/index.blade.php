@extends('layouts.app')
@section('title', 'Tambah Tugas')
@section('breadcrumb')

@endsection
@section('content')
<?php include(app_path() . '/functions/myconf.php'); ?>
<div class="box">
    <div class="box-header">
      <h3 class="box-title">
        <i class="fa fa-folder-open"></i> Data Tugas</h3> 
        <p></p>
        <hr>
          <a href="/elearning/tugas/create/{{ $id }}" 
          class="btn btn-primary"> <i class="fa fa-plus"></i>
              Tambah Tugas </a>
    </div>
    <!-- /.box-header -->
    

    <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>No</th>
          <th>Kelas</th>
          <th>Mapel</th>
          <th>Judul</th>
          <th style="text-align: center; width: 100px" >created</th>
          <th style="text-align: center; width: 110px">Aksi</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($tugas as $no => $tugas)
                
            
    <tr>
          <td>{{ ++$no }}</td>
          <td>{{ $tugas->nm_kelas }}</td>
          <td>{{ $tugas->nm_mtk }} - <b>{{ $tugas->id_mtk }}</b></td>
          <td> {{ $tugas->judul }}</td>
          <td> <center>{{ $tugas->created_at }}</center></td>
          <td style="text-align: center; width: 110px">  
            <div class="btn-group">
            <button type="button" class="btn btn-primary btn-flat">
                <i class="fa fa-xs fa-check" title="Lihat Aksi"></i>
            </button>
            <button type="button" class="btn btn-primary btn-flat dropdown-toggle" data-toggle="dropdown">
              <span class="caret"></span>
              <span class="sr-only">Toggle Dropdown</span>
            </button>
            <ul class="dropdown-menu" role="menu">
              <li><a href="{{ $tugas->file }}" target="_blank">Link Tugas</a></li>

             @php
                          
              $show=Crypt::encryptString($tugas->id.','.$tugas->id_kelas.','.$tugas->id_mtk);                                    
              @endphp  

              <li><a href="{{ url('/elearning/tugas/lihat/'.$show) }}">lihat tugas</a></li>
              
              <li class="divider"></li>
              <li>
               <center>
                <button onClick="Delete(this.id)" id="{{ $tugas->id}}">
                  <i class="fa fa-trash"></i> Hapus Tugas
                </button>
              </center>
              </li>
            </ul>
          </div>
        </td>
    </tr>

        @endforeach
     
        </tbody>
        <tfoot>
        <tr>
            <th>No</th>
            <th>Kelas</th>
            <th> Pelajaran</th>
            <th>Judul</th>
            <th style="text-align: center; width: 100px" >created</th>
            <th style="text-align: center; width: 110px">Aksi</th>
        </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
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

<script src="{{URL::asset('assets/plugins/datatables/media/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatables/media/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatables/extensions/Responsive/js/dataTables.responsive.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatables/extensions/FixedHeader/js/dataTables.fixedHeader.js')}}"></script>
<script src="{{ URL::asset('/assets/plugins/summernote/summernote.min.js') }}"></script>
<script src="{{ URL::asset('/assets/plugins/dropzone/dropzone.js') }}"></script>
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
					url: "/elearning/tugas/destroy/"+id,
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