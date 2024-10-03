@extends('layouts.app')

@section('content')

      
        {{-- <?php include(app_path().'/functions/myconf.php'); ?> --}}
        @if(Auth::user()->status == 'A')
          <div class="callout callout-info">
            <h4>Selamat Datang, <b>{{ Auth::user()->nama }} (Admin)</b></h4>
            
          </div>
        @endif
        @if(Auth::user()->status == 'G')
        <div class="callout callout-info">
          <h4>Selamat Datang, <b>{{ Auth::user()->nama }} </b></h4>
          
        </div>
      @endif
        @if(Auth::user()->status == 'A' || Auth::user()->status == 'G')

              <div class="row">
                <div class="col-md-3">
        
                  <!-- Profile Image -->
                  <div class="box box-primary">
                    <div class="box-body box-profile">
                      <center>
                      @if(Auth::user()->gambar != "")
                        <img src="{{ Storage::url('public/guru/'.Auth::user()->gambar) }}" 
                        alt="user img" width="200px" class="img img-thumbnail" style="margin-bottom: px">
                        @else
                          <img src="{{ url('/assets/img/download.png') }}" 
                          class="profile-user-img img-responsive img-circle" alt="User Image">
                        @endif  
                      </center>
                      {{--  <img class="profile-user-img img-responsive img-circle" src="{{asset ('assets/dist/img/avatar.png') }}" alt="User profile picture">  --}}
        
                      {{-- <h3 class="profile-username text-center"> {{ Auth::user()->no_induk }}</h3> --}}
        
                      {{-- <p class="text-muted text-center"> {{ Auth::user()->nama }}
                      <p class="text-muted text-center"> {{ Auth::user()->email }}</p>
                       --}}
        
                     <hr>
                     
                       
                          <center>
                            <h4 class="box-title">Panduan Penggunaan</h4><p></p>
                          <a class="btn btn-social-icon btn-secondary"><i class="fa fa-file-download"></i></a>
                          <a class="btn btn-social-icon btn-secondary"><i class="fa fa-video-camera"></i></a>
                        </center> 
                          
                  
                     
                     
                    </div>
                    <!-- /.box-body -->
                  </div>
            
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                  <div class="nav-tabs-custom">
                    <div class="box box-primary">
                      <div class="box-header">
                        <h3 class="box-title">Pengumuman</h3>
                        <hr>
                      </div>
  
                        <div class="box-body">
                          <table id="example2" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                              <th>Judul </th>
                             
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                              <td><a href="">
                                <h4><i class="fa fa-file-pdf-o"></i>
                                  Libur Akhir Tahun 2021-05-10</h4>
                              </a>
  
                              </td>
                              
                            </tr>
  
                            <tr>
                              <td><a href="">
                                <h4><i class="fa fa-file-pdf-o"></i>
                                  Pelaksanaan Ujian Akhir Semester 2021-07-10</h4>
                              </a>
  
                              </td>
                              
                            </tr>
                       
                            </tfoot>
                          </table>
                        </div>
                        <!-- /.box-body -->
                  
             
          <!-- /.content-wrapper -->
       
        </div> 
          </div>
        @else
         
      
        {{--  siswa home  --}}
            <div class="col-md-12">
             
                <!-- Content Header (Page header) -->
      
                <!-- Main content -->
                <section class="content">
            
                  <div class="row">
                    <div class="col-md-3">
            
                      <!-- Profile Image -->
                      <div class="box box-primary">
                        <div class="box-body box-profile">
      
                          <center>
                            @if(Auth::user()->gambar != "")
                              <img src="{{ Storage::url('public/guru/'.Auth::user()->gambar) }}" 
                              alt="user img" width="200px" class="img img-thumbnail" style="margin-bottom: px">
                              @else
                                <img src="{{ url('/assets/img/download.png') }}" 
                                class="profile-user-img img-responsive img-circle" alt="User Image">
                              @endif  
                            </center>
      
                          {{--  <img class="profile-user-img img-responsive img-circle" src="{{asset ('assets/dist/img/avatar.png') }}" alt="User profile picture">  --}}
            
                          <h3 class="profile-username text-center"> {{ Auth::user()->no_induk }}</h3>
            
                          <p class="text-muted text-center"> {{ Auth::user()->nama }}
                          <p class="text-muted text-center"> {{ Auth::user()->email }}</p>
                          
            
                         <hr>
                         
                           
                              <center>
                                <h4 class="box-title">Panduan Penggunaan</h4><p></p>
                              <a class="btn btn-social-icon btn-secondary"><i class="fa fa-file-download"></i></a>
                              <a class="btn btn-social-icon btn-secondary"><i class="fa fa-video-camera"></i></a>
                            </center> 
                              
                      
                         
                         
                        </div>
                        <!-- /.box-body -->
                      </div>
                
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                      <div class="nav-tabs-custom">
                        <div class="box box-primary">
                          <div class="box-header">
                            <h3 class="box-title">Pengumuman</h3>
                            <hr>
                          </div>
      
                            <div class="box-body">
                              <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                  <th>Judul </th>
                                 
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                  <td><a href="">
                                    <h4><i class="fa fa-file-pdf-o"></i>
                                      Libur Akhir Tahun 2021-05-10</h4>
                                  </a>
      
                                  </td>
                                  
                                </tr>
      
                                <tr>
                                  <td><a href="">
                                    <h4><i class="fa fa-file-pdf-o"></i>
                                      Pelaksanaan Ujian Akhir Semester 2021-07-10</h4>
                                  </a>
      
                                  </td>
                                  
                                </tr>
                           
                                </tfoot>
                              </table>
                            </div>
                            <!-- /.box-body -->
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
              <!-- /.content-wrapper -->
           
            </div> 
          </div>
        @endif
      

        
   
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