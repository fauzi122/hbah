@extends('layouts.app')

@section('title', 'Data Guru')
@section('breadcrumb')
<h1>Master Data</h1>
<ol class="breadcrumb">
    <li><a href="{{ url('/home') }}"><i class="fa fa-home"></i> Home</a></li>
    <li><a href="{{ url('/master/guru') }}">Guru</a></li>
    <li class="active">Ubah Data Guru</li>
</ol>
@endsection

@section('content')
<div class="col-md-8">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Ubah Data Guru</h3>
        </div>
        <div class="box-body">
            <form class="form-horizontal" id="form-guru" action="{{ url('/master/guru/update', $guru->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <input type="hidden" name="id" value="{{ $guru->id }}">
                <div class="form-group">
                    <label for="nama" class="col-sm-2 control-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="{{ $guru->nama }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="no_induk" class="col-sm-2 control-label">NIP</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="no_induk" name="no_induk" placeholder="NIP" value="{{ $guru->no_induk }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ $guru->email }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Jenis Kelamin</label>
                    <div class="col-sm-10">
                        <div class="radio">
                            <label><input type="radio" name="jk" id="l" value="L" @if($guru->jk == 'L') checked @endif> Laki-laki</label>
                            <label><input type="radio" name="jk" id="p" value="P" @if($guru->jk == 'P') checked @endif> Perempuan</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-success">Simpan</button>
                        <button type="button" class="btn btn-danger" onclick="history.back()">Kembali</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
