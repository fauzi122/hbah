@extends('layouts.app')
@section('title', 'SMA Negeri 1 Ciseeng')

@section('content')
<div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Halaman Tugas Siswa</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">
                <i class="fa fa-list"></i>Data Tugas Siswa</a></li>
              <li><a href="#tab_2" data-toggle="tab"><i class="fa fa-file-excel-o"></i>  Data Nilai Tugas</a></li>
             
              
              <li class="pull-right"><a href="#" class="text-muted"><i class=""></i></a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                </b>  
                  <div class="box-body">
                    <div class="table-responsive">
                <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th style="text-align: center; width: 10px"><center> No</center></th>
                    <th >ID Mapel</th>
                    <th >Kelas</th>
                   
                    <th style="text-align: center; width: 200px">Judul</th>
                    <th style="text-align: center; width: 320px">Deskripsi</th>       
                    <th>Mulai</th>       
                    <th>Selasi</th>        
                    <th>Aksi</th>        
                         
                  </tr>
                </thead>
                <tbody>
                    @foreach ($tugas_siswa as $tugas )  
              <tr>
                 <td>{{ $loop->iteration }}</td>
                 <td>{{ $tugas->id_mtk }}</td>
                 <td>{{ $tugas->nm_kelas }}</td>
                
                 <td>{{ $tugas->judul }}</td>
                 <td >{{ $tugas->des }}</td>
                 <td>{{ $tugas->mulai }}</td>
                 <td>{{ $tugas->selsai }}</td>
                 <td>{{ $tugas->id }}</td>
                 <td>

                  @php
                  $id=Crypt::encryptString($tugas->id_kelas.','.$tugas->id_mtk.','.$tugas->id);                                    
                  @endphp

                  <a href="{{$tugas->file}}" target="blank" title="Link Tugas"
                    class="btn btn-xs btn-primary">
                    <i class="fa fa-link"></i> link tugas</a>

                  <a href="/siswa/send/{{ $id }}"
                   class="btn btn-xs btn-danger" title="Kerjakan Tugas">
                    <i class="fa fa-edit"></i> kerjakan tugas</a>
                  
               </td>
                
             @endforeach
                </tbody>
              </table>
              
                    </div></div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                    <th>No</th>
                    <th>ID Mapel</th>    
                    <th>Kelas</th>    
                    <th>Judul</th>
                    <th>Link Tugas</th>       
                    <th>Komentar Guru</th>
                    <th>Nilai</th>
                    <th>created</th>
                    <th>updated</th>        
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($nilaitugas as $no => $nilai)
                  <tr>
                    <td>{{++$no}}</td>
                    <td>{{$nilai->id_mtk}}</td>
                    <td>{{$nilai->nm_kelas}}</td>
                    <td>{{$nilai->judul}}</td>
                    <td><a href="{{$nilai->isi}}" target="blank">{{$nilai->isi}}</a> </td>
                    <td>{{$nilai->komentar}}</td>
                    <td><h4>{{$nilai->nilai}}</h4></td>
                    <td>{{$nilai->created_at}}</td>
                    <td>{{$nilai->updated_at}}</td>
                  </tr>  
                  @endforeach
                    </tbody>
                  </table>
              </div>  
               
              
            </div>
            
      
      
              </div>
             
              
            </div>
            <!-- /.tab-content -->
          </div>
    </div>
    <div class="box-footer" style="margin: 0; padding: 0 10px">
      </div>
  </div>
</div>

@endsection
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