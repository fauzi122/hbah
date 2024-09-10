@extends('layouts.app')
@section('title', 'SMA Negeri 1 Ciseeng')

@section('content')
<div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-folder-open"></i>
            Materi Pemblajaran</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">
                <i class="fa fa-list"></i> Materi Pemblajaran</a></li>
              <li><a href="#tab_2" data-toggle="tab"><i class="fa fa-video-camera"></i> Video Pemblajaran</a></li>
             
              
              <li class="pull-right"><a href="#" class="text-muted"><i class=""></i></a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
               
                  <div class="card-body">
                    <div class="card-body table-responsive p-0">
                      <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <th>NO</th>
                     
                        <th>KELAS</th>
                        <th>ID MAPEL</th>
                        <th style="text-align: center; width: 120px">JUDUL</th>
                        <th>DESKRIPSI</th>
                      
                        <th style="text-align: center; width: 90px">CREATED</th>
                        <th style="text-align: center; width: 100px">AKSI</th>
                    </thead>
                    <tbody>
                      @foreach ($materimhs as $no => $materi)
                        
                     
                      <tr>
                        <td>{{++$no}}</td>
                        <td>{{$materi->nm_kelas}}</td>
                      
                        <td>{{$materi->id_mtk}}</td>
                        <td>{{$materi->judul}}</td>
                        <td>{{$materi->des}}</td>
                        
                        
                            <td>{{$materi->created_at}}</td>
                        <td>
                          <a href="{{$materi->file}}" target="blank" class="btn btn-xs btn-primary">
                            <i class="fa fa-link"></i> Link</a>
                          </td>
                      </tr>
                      @endforeach
                    </tbody>
                </table>
                    </div></div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
      
      
                
                <div class="card-body">
                  
             
                  <div class="card-body table-responsive p-0">
                    @foreach ($videomhs as $no => $datavideo)
              <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card-deck">
                  <div class="card">
                    <div class="embed-responsive embed-responsive-16by9">
                   
                      <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $datavideo->link }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <div class="card-body">
                     
                      <div class="col-md-12">
                       
                        <div class="box box-default collapsed-box">
                        
                          <div class="box-header with-border">
                            <h3 class="box-title">Lihat Detail -
                              {{ $datavideo->created_at }}
                            </h3>
              
                            <div class="box-tools pull-right">
                              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-chevron-down"></i>
                              </button>
                            </div>
                            <!-- /.box-tools -->
                          </div>
                      
                          <!-- /.box-header -->
                          <div class="box-body">
                            <b>{{ $datavideo->judul }}</b> <p></p>
                            {{ $datavideo->des }}                           
                            <hr>                  
                          </div>
                          <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach         
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