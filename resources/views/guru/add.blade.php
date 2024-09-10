<div class="well" style="margin-top: 15px; display: none;" id="wrap-guru">
    <form class="form-horizontal" id="form-guru">
      <div class="box-body">
        <div class="form-group">
          <label for="nama" class="col-sm-3 control-label">Nama</label>
          <div class="col-sm-9">
            <input type="hidden" name="id" value="N">
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
          </div>
        </div>
        <div class="form-group">
          <label for="no_induk" class="col-sm-3 control-label">NIP</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="no_induk" name="no_induk" placeholder="NIP">
          </div>
        </div>
        <div class="form-group">
          <label for="email" class="col-sm-3 control-label">Email</label>
          <div class="col-sm-9">
            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
          </div>
        </div>
        <div class="form-group">
          <label for="password" class="col-sm-3 control-label">Password</label>
          <div class="col-sm-9">
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">Jenis kelamin</label>
          <div class="col-sm-9">
            <div class="radio">
              <label><input type="radio" name="jk" id="l" value="L"> Laki-laki</label> &nbsp;&nbsp;&nbsp;
              <label><input type="radio" name="jk" id="p" value="P"> Perempuan</label>
            </div>
          </div>
        </div>
        <div class="form-group" style="margin-top: 20px">
          <div class="col-sm-offset-3 col-sm-9">
            <div id="notif" style="display: none;"></div>
            <img src="{{ url('/assets/images/facebook.gif') }}" style="display: none;" id="loading">
            <div id="wrap-btn">
              <button type="button" class="btn btn-success" id="simpan-guru">Simpan</button>
              <button type="button" class="btn btn-danger" id="batal">Batal</button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>