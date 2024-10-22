
@extends('layouts.app')
@section('title', 'Gallery')
@section('breadcrumb')

@endsection

@section('content')
{{-- <?php include(app_path() . '/functions/myconf.php'); ?> --}}

<div class="col-md-12">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">
        <i class="fa fa-video-camera"></i>
        Gallery Video</h3>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div>
    </div>
    <div class="box-body">
      
    <div class="card-body">
      @can('videos.edit')
            <b>
               <a href="/front/video/create" class="btn btn-primary" id="btn-siswa"><i class="fa fa-plus"></i> Tambah Video</a>
            </b>
            @endcan
            <hr>
            <div class="card-body table-responsive p-0">
                @foreach ($videos as $no => $video)   
        <div class="col-lg-4 col-md-4 col-sm-12">
          <div class="card-deck">
            <div class="card">
              <div class="embed-responsive embed-responsive-16by9">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $video->embed }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
             
                </div>
              <div class="card-body">
               
                <div class="col-md-12">
                 
                  <div class="box box-default collapsed-box">
                  
                    <div class="box-header with-border">
                      <h3 class="box-title">Lihat Detail -
                        
                      </h3>
        
                      <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-chevron-down"></i>
                        </button>
                      </div>
                      <!-- /.box-tools -->
                    </div>
               
                    <!-- /.box-header -->
                    <div class="box-body">
                        {{ $video->title }} 
                      
                      <hr>
                  
                    <center>
                      @can('videos.edit')
                      <a href="/front/video/{{ $video->id }}/edit" title="Edit" class="btn btn-sm btn-primary">
                          <i class="fa fa-edit"></i>
                      </a>
                  @endcan
                      @can('videos.delete')
                      <button onClick="Delete(this.id)" title="Hapus" class="btn btn-sm btn-danger" id="{{ $video->id }}">
                          <i class="fa fa-trash"></i>
                      </button>
                  @endcan
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
                        url: "/front/video/"+id,
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