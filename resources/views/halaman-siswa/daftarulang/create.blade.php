@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">
            <i class="fa fa-check-circle"></i>
           Form Verifikasi Daftar Ulang</h3>

           
           <a href="/siswa/daftar-ulang" class="btn btn-xs btn-info"> <i class="fa fa-reply"></i> kembali</a>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body">

                    <div class="card-body">
                        <form action="/siswa/daftar-ulang" method="POST" enctype="multipart/form-data">
                            @csrf

                       

                            <div class="form-group">
                                <input type="text" hidden readonly
						name="id_priode" value="{{ $pecah[0] }}">
                                <label>NIM SANTRI</label>
                                <input type="text" readonly name="no_induk" value="{{Auth::user()->no_induk }}"  class="form-control @error('no_induk') is-invalid @enderror">

                                @error('no_induk')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>NAMA SANTRI</label>
                                <input type="text" readonly name="nm_siswa" value="{{ Auth::user()->nama }}"  class="form-control @error('nm_siswa') is-invalid @enderror">

                                @error('nm_siswa')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            
                          
                            <P></P>
                         

                           

                            <button class="btn btn-primary mr-1 btn-submit" type="submit"><i class="fa fa-paper-plane"></i> VERIFIKASI</button>
                          
                        </form>
                    </div>
                </div>
                <div class="box-footer" style="margin: 0; padding: 0 10px">
                  </div>
              </div>
            </div>
            

    
@stop
