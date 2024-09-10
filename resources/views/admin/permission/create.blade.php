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
    <div class="card-body">
                        <form action="/akses/permission" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>NAMA Permission</label>
                                <input type="text" name="name" value="{{ old('name') }}" placeholder="Masukkan Nama Role"
                                    class="form-control @error('title') is-invalid @enderror">
    
                                @error('name')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <button class="btn btn-primary mr-1 btn-submit" type="submit"><i class="fa fa-paper-plane"></i>
                                SIMPAN</button>
                            <button class="btn btn-warning btn-reset" type="reset"><i class="fa fa-redo"></i> RESET</button>
                        </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-footer" style="margin: 0; padding: 0 10px">
        </div>
    </div>
    </div>


  
    @endsection