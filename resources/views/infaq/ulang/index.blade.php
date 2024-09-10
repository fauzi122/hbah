@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">
            <i class="fa fa-edit"></i>
           Form Input Infaq Santri</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body">

                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="activity">
                              <div class="tab-pane active" id="tabInfo">

                                <form method="POST" action="/infaq/ulang" class="form-horizontal">
                                    {{ csrf_field() }}
                                  <div class="box-body" style="padding-bottom: 0;">
                                    <div class="form-group">
                                      <label for="nama" class="col-md-3 control-label">NIS</label>
                                      <div class="col-sm-5">
                                       
                                        <input type="hidden" name="id_priode" value="{{ $posts->id_priode }}">
                                       
                                        <input type="text" readonly class="form-control" name="no_induk"  value="{{ $posts->no_induk }}">
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <label for="nama" class="col-md-3 control-label">Nama Lengkap</label>
                                      <div class="col-sm-5">
                                        <input type="text" readonly class="form-control" name="nm_santri"  value="{{ $posts->nm_siswa }}">
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label for="no_induk" class="col-md-3 control-label">Tanggal Bayar</label>
                                      <div class="col-sm-5">
                                        <input type="date" class="form-control" name="tgl_bayar" 
                                        placeholder="Masukan Tanggal"
                                         value="" required>
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <label for="no_induk" class="col-md-3 control-label">Jenis Infaq</label>
                                      <div class="col-sm-5">
                                        <input type="number" class="form-control" name="nominal" 
                                        placeholder="Masukan Nominal contoh : 50000"
                                         value="" required>
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <label for="no_induk" class="col-md-3 control-label">Jenis Infaq</label>
                                      <div class="col-sm-5">
                                        <select class="form-control selectpicker" name="jns_bayar">
                                          <optgroup label="Pilih Jenis Infaq">
                                              <option>Infaq Daftar Ulang</option>
                                              <option>Infaq Buku</option>
                                              <option>Infaq QR</option>
                                          </optgroup>
                                        </select>
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
           
              <hr>
              
                <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                  <th scope="col" style="text-align: center;width: 6%">NO.</th>
                  <th scope="col">Nama Lengkap</th>
                  <th scope="col">Jenis Infaq</th>
                  <th scope="col">Tgl Infaq</th>
                  <th scope="col">Jml</th>
                  <th scope="col">Petugas</th>
                  <th scope="col">Created</th>
                
                  
              </tr>
              </thead>
              <tbody>
              	@php
			if (! function_exists('moneyFormat')) {
				/**
				* moneyFormat
				*
				* @param mixed $str
				* @return void
				*/
				function moneyFormat($str) {
				return 'Rp. ' . number_format($str, '0', '', '.');
				}
			}
			@endphp
             @foreach ($bayar as $no => $post)
                 
             <td>{{  ++$no}}</td>
             <td>{{ $post->nm_santri }}</td>
             <td>{{ $post->jns_bayar }}</td>
             <td>{{ $post->tgl_bayar }}</td>
             <td>{{ moneyFormat($post->nominal) }}</td>
             <td>{{ $post->petugas }}</td>
             <td>{{ $post->created_at }}</td>
             
                @endforeach
              </tbody>
          </table>
                </div>

              </div>
            </div>
        </div>
        <div class="box-footer" style="margin: 0; padding: 0 10px">
          </div>
      </div>
    </div>
@stop
@push('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{URL::asset('assets/plugins_tes/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{URL::asset('assets/plugins_tes/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{URL::asset('assets/plugins_tes/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

@endpush
@push('scripts')

<script src="{{URL::asset('assets/plugins_tes/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins_tes/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins_tes/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins_tes/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins_tes/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins_tes/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins_tes/jszip/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins_tes/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins_tes/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins_tes/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins_tes/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins_tes/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print"]
	
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
	 
    });
  });
</script>

@endpush