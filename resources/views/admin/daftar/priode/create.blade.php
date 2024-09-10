@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">
            <i class="fa fa-edit"></i>
           Form Input Priode Pendaftaran</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body">

                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="activity">
                              <div class="tab-pane active" id="tabInfo">
                          
                              
                                <form method="POST" action="/front/priode-daftar" class="form-horizontal">
                                    {{ csrf_field() }}
                                  <div class="box-body" style="padding-bottom: 0;">
                                    <div class="form-group">
                                      <label for="nama" class="col-md-3 control-label">Priode/Gelombang Pendaftaran</label>
                                      <div class="col-sm-5">
                                      
                                        <input type="text" placeholder="Maukan Gelombang Pendaftaran"
                                         class="form-control @error('priode') is-invalid @enderror" name="priode"  value="{{ old('priode') }}">
                                      	@error('nm_ortu')
                                      <div class="invalid-feedback" style="display: block">
                                        {{ $message }}
                                      </div>
                                      @enderror
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <label for="no_induk" class="col-md-3 control-label">Tanggal Awal</label>
                                      <div class="col-sm-5">
                                        <input type="date" class="form-control" name="tgl_awal" 
                                        placeholder="Masukan Tanggal"
                                         value="" required>
                                      </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="no_induk" class="col-md-3 control-label">Tanggal Akhir</label>
                                        <div class="col-sm-5">
                                          <input type="date" class="form-control" name="tgl_akhir" 
                                          placeholder="Masukan Tanggal"
                                           value="" required>
                                        </div>
                                      </div>

                                

                                    <div class="form-group">
                                      <label for="ket" class="col-md-3 control-label">Status Pendaftaran</label>
                                      <div class="col-sm-5">
                                        <select class="form-control selectpicker @error('ket') is-invalid @enderror" name="ket">
                                          <optgroup label="Pilih Jenis Infaq">
                                              <option value="1">Aktif</option>
                                              <option value="2">Non Aktif</option>
                                             
                                          </optgroup>
                                        </select>
                                        @error('ket')
                                        <div class="invalid-feedback" style="display: block">
                                          {{ $message }}
                                        </div>
                                        @enderror
                                      </div>
                                    </div>
                                   
                                  
                                 
                                  </div>
                               
                                <div class="form-horizontal">
                                  <div class="box-body">
                                  
                                    <div class="form-group">
                                      <div class="col-sm-9 col-sm-offset-3">
                                        <button type="submit" class="btn btn-primary btn-md" >
                                         <i class="fa fa-save"></i> Simpan Data Infaq</button>
                                        <div id="notif" style="display: none; margin: 15px 0 0 0"></div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </form>
                            <!-- /.tab-pane -->
                  

            {{--  table Data Infaq Siswa  --}}
           
            
@stop
