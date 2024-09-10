@extends('layouts.app')
@section('title', 'Jadwal Ujian')
@section('breadcrumb')
  <h1>Jadwal Ujian </h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('/home') }}"><i class="fa fa-home"></i> Home</a></li>
    <li><a href="{{ url('/elearning/soal') }}">Soal</a></li>
    <li class="active">Jadwal Ujian</li>
  </ol>
@endsection
@section('content')
<div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">
            <i class="fa fa-pencil-square-o"></i>
           Form Tambah Paket Soal <b> Ujian Tengah Semester </b></h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
  <div class="box-body">
<?php include(app_path().'/functions/myconf.php'); ?>
<form class="form-horizontal"action="/elearning/soal" method="POST">
  @csrf
  <input type="hidden" name="id" value="N">
  <div class="box-body">
    <div class="form-group">
     
      <div class="col-sm-4">
        <input type="number" name="no_induk" value="{{ Auth::user()->id }}" hidden readonly>
        <input type="number" name="jenis" value="1" hidden readonly>
       
      </div>
    </div>
    <div class="form-group">
      <label for="materi" class="col-sm-2 control-label">Materi</label>
      <div class="col-sm-8">
        <select name="materi" class="form-control">
          <option value="">Pilih materi</option>
          @if($materis->count())
          @foreach($materis as $materi)
          <option value="{{ $materi->id_mtk }}">{{ $materi->id_mtk }} - {{ $materi->nm_mtk }}</option>
          @endforeach
          @endif
        </select>
      </div>
    </div>
    <div class="form-group">
      <label for="paket" class="col-sm-2 control-label">Paket Ujian</label>
      <div class="col-sm-8">
        <input type="text" class="form-control  @error('paket') is-invalid @enderror" required
        name="paket" value="UTS" readonly >{!! old('judul') !!}
        @error('paket')
        <div class="invalid-feedback" style="display: block">
            {{ $message }}
        </div>
        @enderror
      </div>
    </div>
    <div class="form-group">
      <label for="paket" class="col-sm-2 control-label">Deskripsi</label>
      <div class="col-sm-8">
        <textarea name="deskripsi" class="form-control  @error('deskripsi') is-invalid @enderror" required
         placeholder="UTS dengan lingkup materi: Mengidentifikasi Informasi dalam Teks Ekplanasi">
         {!! old('deskripsi') !!}</textarea>

         @error('deskripsi')
         <div class="invalid-feedback" style="display: block">
             {{ $message }}
         </div>
         @enderror
      </div>
    </div>
    <div class="form-group">
      <label for="kkm" class="col-sm-2 control-label">KKM</label>
      <div class="col-sm-2">
        <input type="text" class="form-control  @error('kkm') is-invalid @enderror" required data-toggle="tooltip" title="Nilai Kriteria Ketuntasan Minimal (KKM)" name="kkm" placeholder="70">
        {!! old('kkm') !!}  
        @error('kkm')
        <div class="invalid-feedback" style="display: block">
            {{ $message }}
        </div>
        @enderror
    </div>
    </div>
    <div class="form-group">
      <label for="waktu" class="col-sm-2 control-label">Waktu</label>
      <div class="col-sm-2">
        <input type="text" class="form-control  @error('waktu') is-invalid @enderror" required 
        data-toggle="tooltip" title="Masukan waktu ujian dalam satuan menit" name="waktu" placeholder="60">
        {!! old('waktu') !!}  
        @error('waktu')
        <div class="invalid-feedback" style="display: block">
            {{ $message }}
        </div>
        @enderror 
    </div>
    </div>

    <div class="form-group">
      <label for="tgl_ujian" class="col-sm-2 control-label">Waktu Mulai Ujian</label>
      <div class="col-sm-4">
        <input type="date" class="form-control numOnly" data-toggle="tooltip" name="tgl_ujian" required>
      </div>
      <div class="col-sm-3">
        <input type="time" class="form-control numOnly" data-toggle="tooltip" name="jam_mulai_ujian" required>
      </div>
    </div>

    <div class="form-group">
      <label for="tgl_selsai_ujian" class="col-sm-2 control-label">Waktu Selsai Ujian</label>
      <div class="col-sm-4">
        <input type="date" class="form-control numOnly" data-toggle="tooltip" name="tgl_selsai_ujian" required>
      </div>

      <div class="col-sm-3">
        <input type="time" class="form-control numOnly" data-toggle="tooltip" name="jam_selsai_ujian" required>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <div id="wrap-btn">
            <p></p>
          <button type="reset" class="btn btn-danger" >
            <i class="fa fa-reply"></i> Batal</button>
          <button type="submit" class="btn btn-primary">
           <i class="fa fa-send"></i> Simpan Data</button>
        </div>
       
      </div>
    </div>
    <div class="overlay" id="loading" style="display: none;"><i class="fa fa-refresh fa-spin" ></i></div>
  </div>
</form>
  </div>
</div>
</div>
@endsection