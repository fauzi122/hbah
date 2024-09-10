<div class="modal fade" id="importExcel1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form method="post" action="/mapel" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">
                            
                           Tambah Data</h5>
        </div>
        <div class="modal-body">

          @csrf

          
          <div class="form-group">
          <label for="">Kode Mapel</label>
              <input type="text" class="form-control" id="id_mtk" name="id_mtk" placeholder="Masukan Kode Mata Plajaran">
            
          </div>
          <p></p>
          
          <div class="form-group">
            <label for="">Nama Mapel</label>
              <input type="text" class="form-control" id="nm_mtk" name="nm_mtk" placeholder="Masukan Nama Mata Plajaran">
          
          </div>

       
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </div>
    </form>
  </div>
</div>


