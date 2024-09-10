
  {{-- import excel start --}}
  <div class="well" style="display: none;" id="wrap-upload-siswa">
    <form class="form-horizontal" action="{{ url('/cetak/import_excel') }}" enctype="multipart/form-data" method="POST" id="form-upload-siswa">
      {{ csrf_field() }}
      <div class="box-body">
        <div class="form-group">
          <input type="file" name="file" id="file" class="inputfile" required="required"/>
          <label for="file"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Pilih file excel</label>
          <p class="help-block">Silahkan pilih file format soal dalam bentuk excel yang telah diisi dengan benar.<b> xls,xlsx</b></p>
        </div>
        <div class="box-footer">
          <input class="btn btn-danger" id="batal-upload" type="button" value="Batal" />
          <input class="btn btn-primary" name="upload" type="submit" value="Import" />
        </div>
      </div>
    </form>
    <hr>
  </div>
  {{-- import excel and --}}