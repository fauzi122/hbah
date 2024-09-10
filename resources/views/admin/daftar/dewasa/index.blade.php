@extends('layouts.app')

@section('content')
<div class="col-md-12">
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
      
    </div>
    @endif

    @if (session('error'))
        <div class="alert alert-success">
            {{ session('error') }}
        </div>
    @endif
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">
            <i class="fa fa-list-ul"></i>
            Calon Santri Kategori Dewasa</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body">

                <div class="card-body">
                    <form action="{{ url('admin.post.index') }}" method="GET">
                        <div class="form-group">
                            <div class="input-group mb-3">
                                @can('posts.create')
                                    {{--  <div class="input-group-prepend">
                                        <a href="/front/post/create" class="btn btn-primary" style="padding-top: 10px;">
                                            <i class="fa fa-plus"></i> TAMBAH</a>
                                    </div>  --}}
                                @endcan
                               
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">

                            <thead>
                            <tr>
                                <th scope="col" style="text-align: center;width: 6%">NO.</th>
                                <th scope="col">Nama Lengkap</th>
                                <th scope="col">Nama Panggilan</th>
                                <th scope="col">TTL</th>
                                <th scope="col">Status</th>
                                <th scope="col">No HP</th>
                                <th scope="col">Tgl Daftar</th>
                              
                                <th scope="col" style="width: 15%;text-align: center">AKSI</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($posts as $no => $post)
                                <tr>
                                    <th scope="row" style="text-align: center">{{ ++$no}}</th>
                                    <td>{{ $post->nm_lengkap }}</td>
                                    <td>{{ $post->nm_panggilan }}</td>
                                   
                                    <td>{{ $post->tempat_lahir }},{{ $post->tgl }}</td>
                                    <td>{{ $post->status }}</td>
                                    <td>{{ $post->no_hp }}</td>
                                    <td>{{ $post->created_at }}</td>
                                        
                                    
                                    <td class="text-center">
                                        @php
                                        $id=Crypt::encryptString($post->id.','.$post->id_level);                                    
                                        @endphp
                                        
                                        @can('posts.edit')
                                        <a href="/infaq/daftar/dewasa/{{$id}}" class="btn btn-sm btn-primary">
                                            <i class="fa fa-dollar" title="Pembayaran"></i>
                                        </a>
                                        @endcan
                                        @can('posts.edit')
                                            <a href="/front/daftar-dewasa/{{ $post->id}}/show" class="btn btn-sm btn-success">
                                                <i class="fa fa-user-tag" title="detail"></i>
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
                            {{--  {{$posts->links("vendor.pagination.bootstrap-4")}}  --}}
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
  $(function () {
   
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