@extends('layouts.app')
@section('title', 'Tambah Kartu Ujian')

@section('content')
<div class="box box-primary color-palette-box">
    <div class="box-header with-border">
      <h3 class="box-title"><i class="fa fa-pencil"></i> Tambah Kartu Ujian Siswa</h3>
    </div>
    <div class="box-body">
        <form class="form-horizontal"action="/cetak/simpan" method="POST" enctype="multipart/form-data">
          @csrf
   
    <div class="box-body">
      <div class="form-group">
        <label for="nama" class="col-sm-2 control-label">NIP</label>
        <div class="col-sm-6">
          <input type="number" class="form-control  @error('no_induk') is-invalid @enderror" required
          name="no_induk" placeholder="Masukkan no induk siswa"{!! old('no_induk') !!}>
          @error('no_induk')
          <div class="invalid-feedback" style="display: block">
              {{ $message }}
          </div>
          @enderror
        </div>
      </div>

      <div class="form-group">
        <label for="nama" class="col-sm-2 control-label">Nama</label>
        <div class="col-sm-6">
          <input type="text" class="form-control  @error('nama') is-invalid @enderror" required
          name="nama" placeholder="Masukkan no induk siswa"{!! old('nama') !!}>
          @error('nama')
          <div class="invalid-feedback" style="display: block">
              {{ $message }}
          </div>
          @enderror
        </div>
      </div>

      <div class="form-group">
        <label for="kls" class="col-sm-2 control-label">Kelas</label>
        <div class="col-sm-6">
          <select name="kls" class="form-control {!! old('nama') !!}">
            @foreach($kelas as $j)
            <option value="{{ $j->nama }}">{{ $j->nama }} {!! old('nama') !!}</option>
            @endforeach
          
          </select>
        </div>
      </div>

      <div class="form-group">
        <label for="status" class="col-sm-2 control-label">Status</label>
        <div class="col-sm-6">
          <select name="status" class="form-control {!! old('status') !!}">
           
            <option value="1">1 - Aktif</option>
            <option value="2">2 - Non Aktif</option>
            
          
          </select>
        </div>
      </div>
   
  

      <div class="form-group">
    
      
      <p></p>
  
      <hr>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <div id="wrap-btn">
            <button type="submit" class="btn btn-success" >Simpan</button>
            <button type="reset" class="btn btn-danger" >Batal</button>
           
          </div>
      </div>
         
  </form>
</div>
</div>
</div>

@endsection