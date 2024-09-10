@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">
            <i class="fa fa-pencil-square-o"></i>
           Form Visi dan Misi </h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body">

                    <div class="card-body">
                        <form action="/front/update-visimisi/{{ $visimisi->id }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('patch')

                          
                            <div class="form-group">
                                <label>Visi</label>
                             
                                <textarea class="form-control content @error('visi') is-invalid @enderror" name="visi"
                                    placeholder="Masukkan Konten / Isi Berita" 
                                    rows="10">{!! old('visi', $visimisi->visi) !!}</textarea>
                                @error('visi')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                         

                            <div class="form-group">
                                <label>Misi</label>
                             
                                <textarea class="form-control content @error('misi') is-invalid @enderror" name="misi"
                                    placeholder="Masukkan Konten / Isi Berita" 
                                    rows="10">{!! old('misi', $visimisi->misi) !!}</textarea>
                                @error('misi')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                       

                            <button class="btn btn-primary mr-1 btn-submit" type="submit"><i class="fa fa-paper-plane"></i> SIMPAN</button>
                            <button class="btn btn-warning btn-reset" type="reset"><i class="fa fa-redo"></i> RESET</button>

                        </form>
                    </div>
                </div>
                <div class="box-footer" style="margin: 0; padding: 0 10px">
                  </div>
              </div>
            </div>
            

    
@stop
