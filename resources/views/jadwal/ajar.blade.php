@extends('layouts.app')
@section('title', 'masuk mengajar')
@section('breadcrumb')

@endsection
@section('content')
@php
    $tanggal = date('Y-m-d');
    $tgl = date('M d, Y');
    $time=date('H:i:s');
    @endphp

<div class="row">
  <div class="col-md-12">
    
  <div class="callout callout-info">
    <h4><b>{{ Auth::user()->nama }}</b>
    <li>Untuk melakukan absen siswa dari sisi guru silahkan beralih ke halaman <a href="/rekap-absen" class="alert-link">Rekap Absen</a></li>
  </h4>
  </div>
    <!-- Custom Tabs -->
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#tab_1" data-toggle="tab">
          <i class="fa fa-user-edit"></i> Absensi Siswa</a></li>
        <li><a href="#tab_2" data-toggle="tab"><i class="fa fa-pen"></i> Form Berita Acara</a></li>
       
        
        <li class="pull-right"><a href="#" class="text-muted"><i class="">
          <span >Jumlah Siswa :
            <span class="badge badge-success"> {{ $jml_mhs }}</span></span>
          
          <span>Siswa Hadir :
          <span class="badge badge-success"> {{ $jml_hadir }}</span></span>
         </span></i></a></li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="tab_1">
   
          <div class="box-header">
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
                
            </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <form action="/absen-mhs-teori" method="post">
              @csrf
                    {{--  <button type="submit" class="btn btn-success">
                      <i class="fa fa-save"></i> Simpan Absen </button>  --}}
                    
       
                      <div class="pull-right"> 
                      <a href="#">
                        
                        @foreach ($jadwal as $jd)
                        {{$jd->jam_t}} || {{$jd->nm_kelas}}
                        @endforeach
                        || Pertemuan :    
                        @foreach ($temu_ajar as $temu)
                       {{$temu->pertemuan}}
                        @endforeach || {{$tgl}}<div id="clock"></div>
                        <span class="range-text"></span>
                    </a>
                      </div>
                    
          </div>
       
          @if (!isset($mahasiswa))
          <div class="subscribe-form">
              <form action="/absen-keluar-praktek" method="POST">
                  <h3 class="text-center mb-3">!! INFO !!</h3>
                  <p class="text-center mb-3">
                  <center> <h4> Data siswa tidak tersedia, Harap konfirmasi ke pihak terkait</h4></p>
                  </center>
              </form>
              <!-- Subscribe Form ends -->
          </div>
          @else

          <hr>
        
          <div class="row">

            @php
            $count=1;
        @endphp
        @foreach ($mahasiswa as $nim=>$mhs)

          <div class="col-md-3">
            <div class="box box-primary">
              <div class="box-body box-profile">
            </div>
            <span class="badge badge-info">  {{$loop->iteration}}</span>
                <img class="profile-user-img img-responsive img-circle" src="{{ asset('img_user/default.png') }}" alt="User profile picture">
  
                <h3 class="profile-username text-center">{{ $mhs}}</h3>
  
                <p class="text-muted text-center">{{ $nim }}</p>
  
                <ul class="list-group list-group-unbordered">
                  <li class="list-group-item">
                    <input type="hidden" name="tgl_hadir[{{$count}}]" value="
                    @php
                    if(isset($mhs_hadir[$nim]->tgl_hadir)){
                       echo $mhs_hadir[$nim]->tgl_hadir;
                     }else{
                       echo "$tanggal";
                     }   
                    @endphp
                    ">  
                    <input type="hidden" name="jam_t[{{$count}}]" value="@php
                    if(isset($mhs_hadir[$nim]->jam_hadir)){
                       echo $mhs_hadir[$nim]->jam_hadir;
                    }else{
                       echo "$time";
                    }   
                   @endphp">
                   <input type="hidden" name="no_urut[{{$count}}]" value="{{$nim}}"/>             
                    <center>
                     
                      <input type="radio" id="radio[{{$count}}]" name="nama_radio[{{$count}}]" class="custom-control-input" value="1"@php
                      if(isset($mhs_hadir[$nim]->status_hadir)){
                          echo ' checked="checked"';
                      }
                  @endphp>
                      <label class="custom-control-label" for="radio[{{$count}}]">Hadir</label>
                 
                      <input type="radio" id="radio3[{{$count}}]" name="nama_radio[{{$count}}]" 
                      class="custom-control-input" value="2" @php
                      if(!isset($mhs_hadir[$nim]->status_hadir)){
                          echo ' checked="checked"';
                      }
                  @endphp>
                      <label class="custom-control-label" 
                      for="radio3[{{$count}}]">Izin</label>

                      <input type="radio" id="radio4[{{$count}}]" name="nama_radio[{{$count}}]" 
                      class="custom-control-input" value="3" @php
                      if(!isset($mhs_hadir[$nim]->status_hadir)){
                          echo ' checked="checked"';
                      }
                  @endphp>
                      <label class="custom-control-label" 
                      for="radio4[{{$count}}]">Sakit</label>
                      
                      <input type="radio" id="radio2[{{$count}}]" name="nama_radio[{{$count}}]" 
                      class="custom-control-input" value="0" @php
                      if(!isset($mhs_hadir[$nim]->status_hadir)){
                          echo ' checked="checked"';
                      }
                  @endphp>
                      <label class="custom-control-label" 
                      for="radio2[{{$count}}]">Alpa</label>
                      
                      
                  
                  </center>
                  </li>
                  
                </ul>
  
               
              </div>
              
            </div>
           @php
                $count++;
                @endphp
           @endforeach
            
          </div>
          <input type="hidden" name="id" value="{{$id}}">
          <input type="hidden" name="temuke" value="{{$temu->pertemuan}}">
          <input type="hidden" name="id_mtk" value="{{$jd->id_mtk}}">
          <input type="hidden" name="id_kelas" value="{{$jd->id_kelas}}">

      </form>
      @endif
        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane" id="tab_2">
        
          <div class="card">
            <div class="card-header">
              {{-- <div class="card-title">Textarea</div> --}}
                            </div>
                            <form method="post" action="/elearning/jadwal/bap-store" enctype="multipart/form-data">
                           
                                @csrf
            <div class="card-body">
              <div class="form-group">
               
                <label for="bap">Berita Acara*</label>
                                    <textarea class="form-control @error('bap') is-invalid @enderror" id="bap" rows="3" name="bap">{{ old('bap') }}</textarea>
                                    @error('bap')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label class="label">File Bukti Ajar*</label>
                                    <div class="custom-date-input">
                                        <input type="file" name="file" id="file" class="form-control @error('file') is-invalid @enderror">
                                        <h5><code>File PDF,JPG,JPEG,DOC,DOCX Max 2MB</code></h5>
                                        @error('file')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
              
                            </div>

                            <div class=" box-header">
                            <button type="submit" class="btn btn-success btn-rounded"> Simpan</button>
                            </div>
                            <hr>
                            
                             <input type="hidden" name="id" value="{{$id}}">
                            <input type="hidden" name="id_kelas" value="{{$jd->id_kelas}}"> 
                        </form>
                        </div>

                        <div class="card">
                          <div class="card-body">
                            <div class="table-responsive">
                              <table id="example1"class="table table-hover table-bordered">
                                <thead>
                                  <tr>
                                    <th>#</th>
                                   
                                    <th>Berita Acara</th>
                                    <th>File</th>
                                    <th>Pertemuan</th>
                                    
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach ($berita_acara as $bap)
                                 <tr>
                                  <td>{{$loop->iteration}}</td>
                                  <td>{{$bap->berita_acara}}</td>
                                  <td>
                                    @if (isset($bap->file_ajar))
                                    <form action="/download-file-ajar" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$id}}">
                                        <input type="hidden" name="file" value="{{$bap->file_ajar}}">
                                        <center><button type="submit" class="btn btn-xs btn-default">
                                          <i class="fa fa-download"></i> Unduh</button></center>
                                    </form>  
                                    @endif
                                  </td>
                                  <td>
                                    <center>
                                    <span class="badge badge-success">{{$bap->pertemuan}}</span>
                                    <p></p>
                                    {{$bap->tgl_ajar}}
                                  
                                  </center>
                                  </td>
                                </tr>
                                @endforeach                   
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>

        </div>  
         
        
      </div>
      


        </div>
       
        
      </div>
      <!-- /.tab-content -->
    </div>
    <!-- nav-tabs-custom -->
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