@extends('layouts.app')

@section('content')
<div class="col-md-12">

    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">
            <i class="fa fa-list-ol"></i>
            Priode Pendaftaran Siswa Baru</h3>

          
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body">

                <div class="card-body">
                    <form action="{{ url('admin.post.index') }}" method="GET">
                        <div class="form-group">
                            <div class="input-group mb-3">
                                {{-- @can('posts.create')
                                    <div class="input-group-prepend">
                                        <a href="/front/priode-daftar/create" class="btn btn-primary" style="padding-top: 10px;">
                                            <i class="fa fa-plus"></i> Priode Daftar</a>
                                    </div>
                                @endcan --}}
                               
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col" style="text-align: center;width: 6%">NO.</th>
                                <th scope="col">Priode</th>
                                <th scope="col">Tanggal Awal</th>
                                <th scope="col">Tanggal Akhir</th>
                                <th scope="col">Status</th>
                                <th scope="col">Created</th>
                                <th scope="col">Updated</th>
                              
                                <th scope="col" style="width: 15%;text-align: center">AKSI</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($priode as $no => $post)
                                <tr>
                                    <th scope="row" style="text-align: center">{{ ++$no}}</th>
                                    <td><a href=""><b>{{ $post->priode }}</b></a></td>
                                    <td>{{ $post->tgl_awal }}</td>
                                    <td>{{ $post->tgl_akhir }}</td>
                                    <td>
                                   
                                         
                                   @if ($post->ket == 1)
                                   <center><span class="label label-warning">AKTIF</label></center>  

                                   @else
                                   <center><span class="label label-danger">TIDAK AKTIF</label></center>  

                                   @endif
                                    </td>
                                    <td>{{ $post->no_induk }}</td>
                                    <td>{{ $post->updated_at }}</td>
                                        
                                    
                                    <td class="text-center">
                                        @php
                                        $id=Crypt::encryptString($post->id);                                    
                                        @endphp

                                        @can('posts.edit')
                                        <a href="{{ url('/infaq/pendaftaran/'.$id) }}" class="btn btn-sm btn-primary">
                                            <i class="fa fa-user-check"title="List infaq siswa" ></i>
                                        </a>
                                        @endcan

                                      

                                        {{--  @can('posts.delete')  --}}
                                            {{--  <button onClick="Delete(this.id)" class="btn btn-sm btn-danger" id="{{ $post->id }}">
                                                <i class="fa fa-trash" title="hapus"></i>
                                            </button>  --}}
                                        {{--  @endcan  --}}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div style="text-align: center">
                           
                        </div>
                    </div>
                </div>
                </div>
                
                <div class="box-footer" style="margin: 0; padding: 0 10px">
                  </div>
              </div>
              
            </div>
         

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
                        url: "/front/post/"+id,
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
@stop