@extends('layouts.app')


@section('content')
<div class="col-md-12">
    <div class="box box-danger">
      <div class="box-header with-border">
        <h3 class="box-title">
            <i class="fa fa-home"></i>
            Profil Sekolah</h3>
       
      </div>
     
<!-- Custom Tabs -->
<div class="nav-tabs-custom">
  <ul class="nav nav-tabs">
    <li class="active"><a href="#tab_1" data-toggle="tab">Sambutan</a></li>
    <li><a href="#tab_2" data-toggle="tab">Visi & Misi</a></li>
    <li><a href="#tab_3" data-toggle="tab">Sejarah Singkat</a></li>

   
  </ul>
  <div class="tab-content">
    <div class="tab-pane active" id="tab_1">
     
        <div class="box-body">
            @can('sambutan.index')
            <div class="input-group-prepend">
                
                <a href="/front/edit/{{ $sambutan->id }}" class="btn btn-primary" style="padding-top: 10px;">
                    <i class="fa fa-edit"></i> Edit Sambutan</a>
            </div>
            @endcan

    </div>

<p></p>

      {{--  conten 1  --}}
      <div class="table-responsive">
        <table id="example1" class="table table-bordered">
    <thead>
        <th>Creator</th>
        <th>Foto</th>
        <th>Nama Kepala Sekolah</th>
        <th>Isi Sambutan</th>
        <th>Created_at</th>
    </thead>
    
    <tbody>
        <td>{{ $sambutan->no_induk }}</td>
       <td>
            <img src="{{ Storage::url('public/guru/'.$sambutan->foto) }}" style="width: 100px">

        </td>
        <td>{{ $sambutan->nm_kep }}</td>
        <td>{{ $sambutan->des }}</td>
        <td>{{ $sambutan->created_at }}</td>
    </tbody>
</table>
</div>


    </div>
    <!-- /.tab-pane -->
    <div class="tab-pane" id="tab_2">
        <div class="box-body">
            @can('visimisis.index')
            <div class="input-group-prepend">
                <a href="/front/edit-visimisi/{{ $visi->id }}" class="btn btn-primary"
                 style="padding-top: 10px;"><i class="fa fa-pencil-square-o"></i> Edit Visi & Misi</a>
            </div>
        @endcan
           
    </div>

<p></p>

        {{--  conten 2  --}}
        <div class="table-responsive">
            <table id="example1" class="table table-bordered">
        <thead>
            <th>Creator</th>
            <th>Visi</th>
            <th>Misi</th>
            <th>Created_at</th>
        </thead>
        
        <tbody>
            <td>{{ $visi->no_induk }}</td>
            <td>{{ $visi->visi }}</td>
            <td>{{ $visi->misi }}</td>
            <td>{{ $visi->created_at }}</td>
        </tbody>
    </table>
    </div>
    </div>
    <!-- /.tab-pane -->
    <div class="tab-pane" id="tab_3">
     {{--  conten 3  --}}
     <div class="box-body">
        @can('sejarah.index')
        <div class="input-group-prepend">
            <a href="/front/edit-sejarah/{{ $sejarah->id }}" class="btn btn-primary"
             style="padding-top: 10px;"><i class="fa fa-pen"></i> Edit Sejarah</a>
        </div>
        @endcan
</div>

<p></p>
     <div class="table-responsive">
        <table id="example1" class="table table-bordered">
    <thead>
        <th>Creator</th>
        <th>Isi</th>
        <th>Created_at</th>
    </thead>
    
    <tbody>
        <td>{{ $sejarah->no_induk }}</td>
        <td>{{ $sejarah->des }}</td>
        <td>{{ $sejarah->created_at }}</td>
        
    </tbody>
</table>
</div>
    </div>
    <!-- /.tab-pane -->
  </div>
  <!-- /.tab-content -->
</div>
<!-- nav-tabs-custom -->
</div>
<!-- /.col -->
</div>
<div class="box-footer" style="margin: 0; padding: 0 10px">
  </div>
</div>
</div>

@endsection