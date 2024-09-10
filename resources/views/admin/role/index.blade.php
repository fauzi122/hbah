@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-folder-open"></i>
           Permission
        </h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body">
        <a href="/akses/role-create" class="btn btn-primary">
            <i class="fa fa-plus"></i> Tambah Data</a>
        <P></P>
                
                    
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col" style="text-align: center;width: 6%">NO.</th>
                                <th scope="col" style="width: 15%">NAMA ROLE</th>
                                <th scope="col">PERMISSIONS</th>
                                <th scope="col" style="width: 15%;text-align: center">AKSI</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                @foreach ($roles as $no => $role)
                                <tr>
                                    <th scope="row" style="text-align: center">{{ ++$no}}</th>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        @foreach($role->getPermissionNames() as $permission)
                                            <button class="btn btn-sm btn-success">{{ $permission }}</button>
                                        @endforeach
                                    </td>
                                    <td class="text-center">
                                        {{--  @can('roles.edit')  --}}
                                            <a href="/akses/role/edit/{{ $role->id }}" class="btn btn-sm btn-primary">
                                                <i class="fa fa-pencil-square-o"></i>
                                            </a>
                                        {{--  @endcan  --}}
                                        
                                         @can('roles.delete') 
                                            <button onClick="Delete(this.id)" class="btn btn-sm btn-danger" id="{{ $role->id }}">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                         @endcan 
                                    </td>
                                </tr>
                            @endforeach
                            </tr>
                            </tbody>
                        </table>
                        <div style="text-align: center">
                            {{--  {{$roles->links("vendor.pagination.bootstrap-4")}}  --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-footer" style="margin: 0; padding: 0 10px">
          </div>
      </div>
     

<script>
    //ajax delete
    function Delete(id)
        {
            var id = id;
            var token = $("meta[name='csrf-token']").attr("content");

            swal({
                title: "APAKAH KAMU YAKIN ?",
                text: "INGIN MENGHAPUS DATA INI!",
                icon: "warning",
                buttons: [
                    'TIDAK',
                    'YA'
                ],
                dangerMode: true,
            }).then(function(isConfirm) {
                if (isConfirm) {

                    //ajax delete
                    jQuery.ajax({
                        url: "",
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
                                    icon: 'success',
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
                                    icon: 'error',
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



@stop