@extends('layouts.app')
@section('title', 'Ubah Data')
@section('breadcrumb')
  <h1>Master Data</h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('/home') }}"><i class="fa fa-home"></i> Home</a></li>
    <li class="active">Kartu</li>
  </ol>
@endsection
@section('content')
  <?php include(app_path().'/functions/myconf.php'); ?>
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-edit" aria-hidden="true"></i> Ubah Data Kartu Ujian  <b>
            {{ $kartu->no_induk }}-{{ $kartu->nama }} </b> </h3>
      </div>
      <div class="box-body">
        <div class="col-sm-12">
          <div class="col-sm-12">
            <form id="form-kartu" style="" class="form-horizontal">
                
              
              <div class="form-group">
                <label for="no_induk" class="col-sm-2 control-label">NO Induk</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" name="no_induk" id="no_induk" value="{{ $kartu->no_induk }}" placeholder="Nama Kelas">
                </div>
              </div>

              <div class="form-group">
                <label for="nama" class="col-sm-2 control-label">Nama Siswa</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nama" id="nama" value="{{ $kartu->nama }}" placeholder="Nama Kelas">
                </div>
              </div>
              <div class="form-group">
                <label for="status" class="col-sm-2 control-label">Status</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" name="status" id="status" value="{{ $kartu->status }}" placeholder="Nama Kelas">
                </div>
              </div>
        
              <div class="form-group">
                <label for="kls" class="col-sm-2 control-label">Kelas</label>
                <div class="col-sm-10">
                  <select class="form-control" name="kls" id="kls" placeholder="Wali Kelas">
                    <option value="{{ $kartu->kls ? $kartu->kls : '' }}">{{ $kartu->kls ? $kartu->kls : 'Pilih Wali Kelas' }}</option>
                    @forelse($kelas as $kelas)
                      <option value="{{  $kelas->nama }}">{{  $kelas->nama }}</option>
                    @empty
                    @endforelse
                  </select> 
                </div>
              </div>
              <div class="form-group">
                <label for="save" class="col-sm-2 control-label">&nbsp</label>
                <div class="col-sm-10">
                  <div class="alert alert-danger" id="notif" style="display: none; margin: 0 auto 10px"></div>
                  <button type="button" class="btn btn-primary" id="save">
                    <i class="fa fa-send"></i>
                    Update Data</button>
                </div>
              </div>
              @php
                  $nis=$kartu->no_induk
              @endphp

              {!! QrCode::generate($nis); !!}

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-12">
    <div class="box box-warning">
      <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-warning" aria-hidden="true"></i> Informasi</h3>
      
      </div>
      <div class="box-body">
        <div class="col-sm-12">
          <div class="col-sm-12">
            <ul>
                <li>Admin dapat merubah data <b>kartu ujian siswa</b></li>
                <li>terdapat dua status<p><b> 1 = kartu ujian siswa AKTIF</b></p></li>
                <p><b> 2 = kartu ujian siswa NON AKTIF</b></p>
                <li>Siswa dapat melihat atau mencetak kartu ujian jika status <b>AKTIF</b> </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
{{--  @push('scripts')
  <script>
    $(document).ready(function (){
      $('#save').click(function() {
        $('#notif').hide();
        var formData = $('#form-kartu').serialize();
        $.ajax({
          type: 'POST',
          url: "{{ url('/cetak/update-kartu') }}",
          data: formData,
          success: function(data) {
            if (data == 1) {
              window.location.href = "{{ url('/cetak/kartu-ujian') }}";
            }else{
              $('#notif').html(data).show();
            }
          }
        })
      });
    });
  </script>
@endpush  --}}