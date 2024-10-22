
@extends('layouts.app')
@section('title', 'Tambah Materi')
@section('breadcrumb')

@endsection

@section('content')

<div class="col-md-12">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title"><i class="fa fa-folder-open"></i>
         Materi Pemblajaran
      </h3>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div>
    </div>
    <div class="box-body">
    <!-- Custom Tabs -->
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#tab_1" data-toggle="tab">
          <i class="fa fa-list"></i> Materi Pemblajaran</a></li>
        <li><a href="#tab_2" data-toggle="tab"><i class="fa fa-video-camera"></i> Video Pemblajaran</a></li>
       
        
        <li class="pull-right"><a href="#" class="text-muted"><i class=""></i></a></li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="tab_1">
          <b> <a href="/elearning/addmateri/create/{{$id}}" class="btn btn-primary" id="btn-siswa"><i class="fa fa-plus"></i> Tambah Materi</a>
          </b>

          <p>
            <div class="card-body">
              <div class="card-body table-responsive p-0">
                <table id="example1" class="table table-bordered table-striped">
              <thead>
                  <th>NO</th>
               
                  <th>KELAS</th>
                  <th>ID MAPEL</th>
                  <th style="text-align: center; width: 120px">JUDUL</th>
                  <th>DESKRIPSI</th>
                
                  <th style="text-align: center; width: 90px">CREATED</th>
                  <th style="text-align: center; width: 100px">AKSI</th>
              </thead>
              <tbody>
                @foreach ($addmateri as $no => $materi)
                  
               
                <tr>
                  <td>{{++$no}}</td>
                  <td>{{$materi->nm_kelas}}</td>
                
                  <td>{{$materi->id_mtk}}</td>
                  <td>{{$materi->judul}}</td>
                  <td>{{$materi->des}}</td>
                  
                  
                      <td>{{$materi->created_at}}</td>
                  <td>
                    <a href="{{$materi->file}}" target="blank" class="btn btn-xs btn-primary">
                      <i class="fa fa-link"></i> Link</a>
                      <button onClick="Delete(this.id)" class="btn btn-xs btn-danger" id="{{ $materi->id}}">
                        <i class="fa fa-trash"></i> hapus
                      </button>
                    </td>
                </tr>
                @endforeach
              </tbody>
          </table>
              </div></div>
        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane" id="tab_2">


          
          <div class="card-body">
            <b> <a href="/elearning/addmateri/create-video/{{ $id }}" class="btn btn-primary" id="btn-siswa"><i class="fa fa-plus"></i> Tambah Video</a>
            </b>
            <hr>
            <div class="card-body table-responsive p-0">
              @foreach ($datavideo as $no => $datavideo)
        <div class="col-lg-4 col-md-4 col-sm-12">
          <div class="card-deck">
            <div class="card">
              <div class="embed-responsive embed-responsive-16by9">
             
                <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $datavideo->link }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              </div>
              <div class="card-body">
               
                <div class="col-md-12">
                 
                  <div class="box box-default collapsed-box">
                  
                    <div class="box-header with-border">
                      <h3 class="box-title">Lihat Detail -
                        {{ $datavideo->created_at }}
                      </h3>
        
                      <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-chevron-down"></i>
                        </button>
                      </div>
                      <!-- /.box-tools -->
                    </div>
                
                    <!-- /.box-header -->
                    <div class="box-body">
                      <b>{{ $datavideo->judul }}</b> <p></p>
                      {{ $datavideo->des }}
                      
                      <hr>
                  
                    <center>
                      <button onClick="Delete(this.id)" class="btn btn-xs btn-danger" id="{{ $datavideo->id}}">
                        <i class="fa fa-trash"></i> hapus
                      </button>
                    </center>
                    </div>
                    <!-- /.box-body -->
                  </div>

                  
              
                  <!-- /.box -->
                </div>
        
             
                
        
              
              </div>
            </div>
          </div>
        </div>
        @endforeach
        
      </div>
      


        </div>
       
        
      </div>
      <!-- /.tab-content -->
    </div>
    <!-- nav-tabs-custom -->
  </div>
  <div class="box-footer" style="margin: 0; padding: 0 10px">
    </div>
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
					url: "/elearning/addmateri/destroy-video/"+id,
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
            url: "/elearning/addmateri/destroy/"+id,
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