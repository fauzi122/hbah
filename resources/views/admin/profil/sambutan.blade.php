@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">
            <i class="fa fa-pencil-square-o"></i>
           Form Sambutan Kepala Sekolah</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body">

                    <div class="card-body">
                        <form action="/front/update/{{ $sambutan->id }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('patch')

                            <div class="form-group">
                                <label>Foto Kepala Sekolah</label>
                                <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror">

                                @error('foto')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Nama Kepala Sekolah</label>
                                <input type="text" name="nm_kep" value="{{ old('nm_kep', $sambutan->nm_kep) }}" placeholder="Masukkan Nama Kepala Sekolah" class="form-control @error('nm_kep') is-invalid @enderror">

                                @error('nm_kep')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                         

                            <div class="form-group">
                                <label>Sambutan</label>
                             
                                <textarea class="form-control content @error('des') is-invalid @enderror" name="des"
                                    placeholder="Masukkan Konten / Isi Berita" 
                                    rows="10" id="summernote">{!! old('des', $sambutan->des) !!}</textarea>
                                @error('des')
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
            

            <script>
                $(document).ready(function() {
                    $('#summernote').summernote({
                        height: 200 // set editor height
                    });
                });
            </script>
            <script>
                $(document).ready(function() {
                    $('#summernote1').summernote({
                        height: 200 // set editor height
                    });
                });
            </script>
@stop
