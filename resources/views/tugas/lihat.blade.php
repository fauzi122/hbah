@extends('layouts.app')
@section('title', 'Lihat Tugas')
@section('breadcrumb')

@endsection
@section('content')

<div class="row">
  <div class="col-md-12">
    <!-- Custom Tabs -->
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#tab_1" data-toggle="tab">
          <i class="fa fa-pencil-square-o"></i>
          Form Tugas Siswa</a></li>
        <li><a href="#tab_2" data-toggle="tab">
          <i class="fa fa-download"></i>
          Download Nilai</a></li>
        <li><a href="#tab_3" data-toggle="tab">
          <i class="fa fa-tags"></i>
          Deskripsi Tugas</a></li>
        {{--  <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            Dropdown <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
            <li role="presentation" class="divider"></li>
            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
          </ul>
        </li>  --}}
        {{--  <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>  --}}
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="tab_1">
          @if($usersiswa<>null)
            <form action="/elearning/tugas/send" method="POST" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="id" value="{{ $id }}"/>
              <input type="hidden" name="id_tugas" value="{{ $tugas->id }}"/>
              <div class="box-header">
                  
                          
                            
                <button type="submit" class="btn btn-primary"><b>
                  <i class="fa fa-save"></i> Simpan Nilai Tugas</b> </button>
            </div>
            <table class="table table-bordered table-striped">
              <thead>
                <th><center> No</center></th>
                <th>NIS</th>
                <th>Nama</th>
                <th>Nilai</th>
                <th>Link Tugas</th>       
                <th>Komentar</th>       
                <th>Status</th>
              </thead>
              <tbody>
                @php
                $count=1;
                @endphp
                @foreach ($mahasiswa as $no_induk => $mhs )
                
                <tr>
                  <td>{{$loop->iteration}}</td>
            
                  <td>{{ $no_induk }}
                    <input type="hidden" name="no_urut[{{$count}}]" value="{{$no_induk}}"/>
                  </td>
            
                  <td width="20%">{{ $mhs }}</td>
                 
                  <td width="9%"> <input type="text" maxlength="3"
                    class="form-contro col-sm-10" name="nilai[{{$count}}]" value=
                    @if (isset($nilai[$no_induk]->nilai))
                         {{$nilai[$no_induk]->nilai}}
                     @else
                         {{0}}
                     @endif
                    ></td>
            
                    <td width="20%">
                      @if (isset($nilai[$no_induk]->isi))
                      @if ($nilai[$no_induk]->isi<>null||$nilai[$no_induk]->isi<>'')
                      <a href="{{$nilai[$no_induk]->isi}}" target="blank" class="btn btn-danger btn-sm">
                          Link Tugas Siswa  </a>  
                    @else
                        
                    @endif 
                      @endif
                    </td> 
            
                    <td> 
                      <textarea name="komentar[{{$count}}]" >@if (isset($nilai[$no_induk]->komentar)){{ $nilai[$no_induk]->komentar }}@else @endif</textarea>
                    </td>
            
                    <td>
                      @if (isset($nilai[$no_induk]->created_at))
                      @if (strtotime($nilai[$no_induk]->unix_mhs) > strtotime($nilai[$no_induk]->unix))
                      <span class="badge badge-danger">{{ $nilai[$no_induk]->created_at }}</span>
                      @else
                      <span class="badge badge-primary">{{ $nilai[$no_induk]->created_at }}</span>
                      
                      @endif
                      @else
                      <span class="badge badge-danger">Belum Mengumpulkan</span>
                      
                  @endif
                      </td>
                </tr>
                @php
                $count++;
              @endphp
                @endforeach
                @endif
              </form>
              </tbody>
            </table>
        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane" id="tab_2">
         
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>NO</th>
                <th>NIM</th>
                <th>NAMA</th>
                <th>Nilai Tugas </th>
                
              </tr>
            </thead>
            <tbody>
             
            
                @foreach ($mahasiswa as $no_induk=>$mhs )
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{ $no_induk}}</td>
                    <td>{{ $mhs}}</td>
                    <td>  {{$nilai[$no_induk]->nilai}}</td>
                           
                </tr>
                @endforeach 
           
            </tbody>
          </table>  
        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane" id="tab_3">
          <table class="table no-margin">
            <thead>
             
        
            </thead>
            <tbody>
              <tr>
                <td>Judul</td>
                <td>
                  {{ $tugas->judul }}
                </td>
        
              </tr>
        
              <tr>
                <td>Deskripsi</td>
                <td>
                  {{ $tugas->des }}
                  
                </td>
                
              </tr>
        
              <tr>
              
              </tr>
        
              <tr>
                <td>Waktu Mengerjakan</td>
                <td>
                   <b>
                    Mulai :  {{ $tugas->mulai }}  <p></p>
                    Selsai :  {{ $tugas->selsai }}
                  </b>
                  
                 
                </td> 
              </tr>
          
            </tbody>
          </table>
        </div>
        <!-- /.tab-pane -->
      </div>
      <!-- /.tab-content -->
    </div>
    <!-- nav-tabs-custom -->
  </div>
  <!-- /.col -->
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