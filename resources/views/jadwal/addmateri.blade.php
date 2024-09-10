<form class="form-horizontal" id="formMateri">
    <div class="box-body">
      <div class="form-group">
        <label for="judul" class="col-sm-2 control-label">Mata Plajaran</label>
        <div class="col-sm-10">
          <input type="hidden" name="id" value="N">
          <input type="hidden" name="sesi" value="{{ $sesi }}">
          <input type="text" class="form-control" id="judul" name="judul" placeholder="Mata Plajaran">
        </div>
      </div>
      <div class="form-group">
        <label for="isi" class="col-sm-2 control-label">Deskripsi</label>
        <div class="col-sm-10">
          <textarea class="textarea" placeholder="Isi materi" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" id="isi" name="isi" placeholder="Isi"></textarea>
        </div>
      </div>
      <div class="form-group">
        <label for="isi" class="col-sm-2 control-label">Status</label>
        <div class="col-sm-10">
          <div class="radio">
            <label>
              <input type="radio" name="status" id="Y" value="Y"> Tampil
            </label>&nbsp;&nbsp;&nbsp;&nbsp;
            <label>
              <input type="radio" name="status" id="Y" value="N"> Tidak tampil
            </label>
          </div>
        </div>
      </div>
      <div class="overlay" id="loading" style="display: none;"><i class="fa fa-refresh fa-spin"></i></div>
    </div>
  </form>

  {{-- gambar --}}
  <div class="form-horizontal">
    <div class="box-body">
      {{--  <div class="form-group">
        <label for="judul" class="col-sm-2 control-label">Gambar</label>
        <div class="col-sm-10">
          <form action="{{ url('/crud/simpan-gambar-materi') }}" class="dropzone">
            {{ csrf_field() }}
            <input type="hidden" name="sesi_gambar" value="{{ $sesi }}">
            <div class="fallback">
              <input name="file" type="file" multiple />
            </div>
          </form>
        </div>
      </div>  --}}
      <div class="form-group">
        <label for="judul" class="col-sm-2 control-label">&nbsp;</label>
        <div class="col-sm-10">
          <div id="wrap-btn">
            <button type="button" id="simpan" class="btn btn-primary btn-md">Simpan</button>
            <button type="button" class="btn btn-danger btn-md" id="batal">Batal</button>
          </div>
          <div id="notif" style="display: none; margin-top: 15px"></div>
        </div>
      </div>
    </div>
  </div>