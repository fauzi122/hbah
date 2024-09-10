@extends('layouts.app')
@section('title', 'Isi Brita Acara')

@section('content')
<div class="box box-primary color-palette-box">
    <div class="box-header with-border">
      <h3 class="box-title"><i class="fa fa-pencil"></i> Isi Berita Acara</h3>
    </div>
    <div class="box-body">
        <form class="form-horizontal"action="/elearning/tugas" method="POST" enctype="multipart/form-data">
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
          {{--  <select name="id_mtk" class="form-control {!! old('id_mtk') !!}">
            @foreach($jadwals as $j)
            <option value="{{ $j->kd_lokal }} - {{ $j->nm_mtk }}">{{ $j->kd_lokal }} - {{ $j->nm_mtk }} {!! old('id_mtk') !!}</option>
            @endforeach
          
          </select>  --}}
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
        <label for="mulai" class="col-sm-2 control-label">Waktu Mulai</label>
        <div class="col-sm-5">
          <input type="date" class="form-control numOnly" data-toggle="tooltip" name="mulai" required>
        </div>
        <div class="col-sm-3">
          <input type="time" class="form-control numOnly" data-toggle="tooltip" name="jam_mulai" required>
        </div>
      </div>

      <div class="form-group">
        <label for="tgl_selsai_ujian" class="col-sm-2 control-label">Waktu Selsai</label>
        <div class="col-sm-5">
          <input type="date" class="form-control numOnly" data-toggle="tooltip" name="selsai" required>
        </div>

        <div class="col-sm-3">
          <input type="time" class="form-control numOnly" data-toggle="tooltip" name="jam_selsai" required>
        </div>
      </div>



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