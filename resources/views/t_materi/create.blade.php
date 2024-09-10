@extends('layouts.app')
@section('title', 'Tambah Materi')

@section('content')
<div class="box box-primary color-palette-box">
    <div class="box-header with-border">
      <h3 class="box-title"><i class="fa fa-pencil"></i> Tambah Materi Pemblajaran - {{ $jadwals->nm_kelas }} </h3>
    </div>
    <div class="box-body">
        <form class="form-horizontal"action="/elearning/addmateri" method="POST" enctype="multipart/form-data">
          @csrf
    <input type="hidden" name="id" value="N">
    <div class="box-body">
      <div class="form-group">
        <label for="no_induk" class="col-sm-2 control-label">NIP</label>
        <div class="col-sm-4">
          <input type="text" class="form-control" name="no_induk" 
          value="{{ Auth::user()->no_induk }}" readonly>
        </div>
      </div>
      <div class="form-group">
        <label for="id_mtk" class="col-sm-2 control-label">Mata Pelajaran</label>
        <div class="col-sm-4">
          <input type="text" class="form-control" name="nm_mtk" 
          placeholder="{{ $jadwals->nm_mtk }}" readonly>
          <input type="hidden" class="form-control" name="id_kelas"  
          value="{{ $jadwals->id_kelas }}" readonly>
          
          <input type="hidden" class="form-control" name="id_mtk" 
          value="{{ $jadwals->id_mtk }}" readonly>
        </div>
      </div>
   
      <div class="form-group">
        <label for="paket" class="col-sm-2 control-label">Judul</label>
        <div class="col-sm-8">
          <textarea class="form-control  @error('judul') is-invalid @enderror" required
          name="judul" placeholder="Masukkan Judul Materi" rows="2">{!! old('judul') !!}</textarea>
         
          @error('judul')
          <div class="invalid-feedback" style="display: block">
              {{ $message }}
          </div>
          @enderror
        </div>
      </div>
      <div class="form-group">
        <label for="paket" class="col-sm-2 control-label">Deskripsi</label>
        <div class="col-sm-8">
          <textarea class="form-control  @error('des') is-invalid @enderror"
           name="des" placeholder="Masukkan des Materi" rows="4">{!! old('des') !!}</textarea>
          @error('des')
          <div class="invalid-feedback" style="display: block">
              {{ $message }}
          </div>
          @enderror
        </div>
      </div>

      <div class="form-group">
      <label for="paket" class="col-sm-2 control-label">Link Google Drive</label>
      <div class="col-sm-8">
        <textarea class="form-control  @error('file') is-invalid @enderror" required
        name="file" placeholder="Masukkan file Materi" rows="2">{!! old('file') !!}</textarea>
       
        @error('file')
        <div class="invalid-feedback" style="display: block">
            {{ $message }}
        </div>
        @enderror
      </div>
      </div>
      
      <p></p>
  
      <hr>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <div id="wrap-btn">
            <button type="submit" class="btn btn-primary" >Simpan Materi</button>
            <button type="reset" class="btn btn-danger" >Batal</button>
           
          </div>
      </div>
         
  </form>
</div>
</div>
</div>

@endsection