@extends('layouts.app')
@section('title', 'Pengaturan')
@section('breadcrumb')
  <h1>Pengaturan</h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('/home') }}"><i class="fa fa-home"></i> Home</a></li>
    <li class="active">Pengarutan</li>
  </ol>
@endsection
@section('content')


<div class="row">
  <div class="col-md-3">

    <!-- Profile Image -->
    <div class="box box-primary">
      <div class="box-body box-profile">
        <center>
        @if($user->gambar != "")
        <img src="{{ Storage::url('public/guru/'.$user->gambar) }}" 
        alt="user img" width="200px" class="img img-thumbnail" style="margin-bottom: 6px">
        @else
        <img src="{{ url('/assets/img/download.png') }}" alt="user img" width="120px" class="img img-circle" style="margin-bottom: 10px">
        @endif
      </center>

        <ul class="list-group list-group-unbordered">
          <form action="/crud/update/{{ $user->id }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('patch')
            <input type="hidden" name="id" value="{{ $user->id }}">
            <input type="hidden" class="form-control" name="nama" id="nama" placeholder="Nama Lengkap" value="{{ $user->nama }}">
            <div class="form-group">
              <label>Upload Foto Profil</label>
              <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror">
          </div>
         
        </ul>
        <button class="btn btn-primary btn-block" type="submit"><i class="fa fa-paper-plane"></i>
          Update Foto</button>
      
      </div>
    </form>
      <!-- /.box-body -->
    </div>
 
    <!-- /.box -->
  </div>
  <!-- /.col -->
  <div class="col-md-9">
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#activity" data-toggle="tab">Update Profil</a></li>
       
      </ul>
      <div class="tab-content">
        <div class="active tab-pane" id="activity">
          <div class="tab-pane active" id="tabInfo">
        
            <h3 class="btn btn-danger" > <i class="fa fa-warning"></i>
              Demi Keamanan Segera Lakukan Perubahan Pada Password Anda</h3>
          
            <form method="post" id="form_profil" class="form-horizontal">
                {{ csrf_field() }}
              <div class="box-body" style="padding-bottom: 0;">
                <div class="form-group">
                  <label for="nama" class="col-md-3 control-label">Nama Lengkap</label>
                  <div class="col-sm-5">
                    <input type="hidden" name="id" value="{{ $user->id }}">
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Lengkap" value="{{ $user->nama }}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="no_induk" class="col-md-3 control-label">No Induk</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" name="no_induk" id="no_induk" placeholder="NIP" value="{{ $user->no_induk }}" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="no_induk" class="col-md-3 control-label">Jenis Kelamin</label>
                  <div class="col-sm-5">
                    <div class="radio">
                      <label>
                        <input type="radio" name="jk" id="laki_laki" value="L" <?php if ($user->jk == 'L') { echo "checked"; } ?>> Laki-laki
                      </label>
                      &nbsp;&nbsp;&nbsp;&nbsp;
                      <label>
                        <input type="radio" name="jk" id="perempuan" value="P" <?php if ($user->jk == 'P') { echo "checked"; } ?>> Perempuan
                      </label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="email" class="col-md-3 control-label">Email</label>
                  <div class="col-sm-5">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{ $user->email }}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="password" class="col-md-3 control-label">Password</label>
                  <div class="col-sm-5">
                    <input type="password" class="form-control" data-toggle="tooltip" title="Kosongkan field ini jika tidak ingin merubah password Anda." name="password" id="password" placeholder="Password" value="">
                  </div>
                </div>
              </div>
            </form>
            <div class="form-horizontal">
              <div class="box-body">
              
                <div class="form-group">
                  <div class="col-sm-9 col-sm-offset-3">
                    <button type="button" class="btn btn-primary btn-md" id="update_profil">Update</button>
                    <div id="notif" style="display: none; margin: 15px 0 0 0"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    
        <!-- /.tab-pane -->
      </div>
      <!-- /.tab-content -->
    </div>
    <!-- /.nav-tabs-custom -->
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->

@endsection
@push('css')
<link rel="stylesheet" href="{{ url('/assets/plugins/dropzone/dropzone.css') }}">
<style type="text/css">
  .panel {
    margin-bottom: 5px !important;
  }
  .form-group {
    margin-bottom: 5px;
  }
  .wrap-is {
    cursor: pointer;
  }
</style>
@endpush
@push('scripts')
<script src="{{ url('/assets/plugins/dropzone/dropzone.js') }}"></script>
<script>
$(document).ready(function(){
  $("#update_profil").click(function(){
    $(this).hide();
    $("#notif").hide();
    $("#loading").show();
    var formData = $("#form_profil").serialize();
    $.ajax({
      type: "POST",
      url: "{{ url('/crud/update-profil') }}",
      data: formData,
      success: function(data){
        $("#loading").hide();
        if(data == 'ok'){
          $("#notif").removeClass('alert alert-danger').addClass('alert alert-info').html("Data berhasil diperbaharui.").fadeIn(350);
          location.href = "{{ url('/pengaturan') }}";
        }else{
          $("#notif").removeClass('alert alert-info').addClass('alert alert-danger').html(data).fadeIn(350);
          $("#update_profil").show();
        }
      }
    })
  });
  $(".wrap-is").click(function() {
    $(this).hide();
    $(this).closest('td').find('.info-sekolah').show().focus();
    var jenis = $(this).closest('td').find('.info-sekolah').attr('name');
    $('.jenisInfo').val(jenis);
  });
  $(".info-sekolah").blur(function() {
    var formInfoSekolah = $("#formInfoSekolah").serialize();
    var jenisInfo = $('.jenisInfo').val();
    $.ajax({
      type: "POST",
      url: "{{ url('/crud/update-profil-sekolah') }}",
      data: formInfoSekolah+'&jenisInfo='+jenisInfo,
      context: this,
      success: function(data){
        $(this).hide();
        $(this).closest('td').find('.wrap-is').html(data).show()
      }
    })
  });
})
</script>
@endpush