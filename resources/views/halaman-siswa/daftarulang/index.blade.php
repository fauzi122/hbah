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
            <i class="fa fa-user-check"></i>
            Verifikasi Daftar Ulang</h3>
            
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body">

                <div class="card-body">
                    <form action="{{ url('admin.post.index') }}" method="GET">
                        <div class="form-group">
                            <div class="input-group mb-3">
                            
                               
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col" style="width: 23%;text-align: center">AKSI</th>
                                <th scope="col">Nomer Induk</th>
                                <th scope="col">Nama Siswa</th>
                                <th scope="col">Status Daftar Ulang</th>
                                <th scope="col">Tgl Daftar Ulang </th>
                               
                            </tr>
                            </thead>
                            <tbody>
                           <tr>
                            <td>
                                @if (isset($priode->ket))
                                @php
                                $id=Crypt::encryptString($priode->id); 
                                @endphp

                                <a href="{{ url('/siswa/verifikasi-ulang/'.$id) }}" class="btn btn-primary">Daftar Ulang</a>
                                <a href="" class="btn btn-success">Lengkapi Biodata</a>
                                @else

                                <center>
                                    <a href="" class="btn btn-lg btn-danger">
                                        Pendaftaran sudah ditutup</a>
                                <a href="" class="btn btn-success">Lengkapi Biodata</a>
                                        
                                    </center>
                                   @endif
                              
                            </td>
                               <td>{{ Auth::user()->no_induk }}</td>
                               <td>{{ Auth::user()->nama }}</td>
                               <td>@if (isset($status->status))
                                <small class="label label-info">
                                Verifikasi</small>  
                               @else
                                  -
                               @endif</td>
                               <td>
                                @if (isset($status->created_at))
                                {{ $status->created_at }}
                            @else
                                -
                            @endif
                               </td>
                               

                           </tr>
			
                            </tbody>
                        </table>
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><i class="icon fa fa-warning"></i> Catatan!</h4>
                            
                            <p> <b> Tombol Daftar Ulang</b> : Untuk melakukan verifikasi</p>
                            <p> <b> Tombol Lengkapi Biodata</b> : Untuk melakukan melengkapi biodata yang belum terisi lengkap</p>

                            <p> <b>Status daftar ulang</b></p>
                                <p>   <b>- null/kosong </b>: belum terverivikasi/belum melakukan daftar ulang</p>
                                <p>  <b> - sudah terverifikasi</b>: anda sudah melakukan daftar ulang</p>
                          </div>
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
            




@stop