@extends('layouts.app')


@section('content')
<div class="col-md-12">
    <div class="box box-danger">
      <div class="box-header with-border">
        <h3 class="box-title">
            <i class="fa fa-file-excel"></i>
            List Infaq Santri</h3>
       
      </div>
     
<!-- Custom Tabs -->
<div class="nav-tabs-custom">
  <ul class="nav nav-tabs">
    <li class="active"><a href="#tab_1" data-toggle="tab">Infaq Pendaftaran</a></li>
    <li><a href="#tab_2" data-toggle="tab">Infaq Buku</a></li>
    <li><a href="#tab_3" data-toggle="tab">Infaq QR</a></li>
   

   
  </ul>
  <div class="tab-content">
    <div class="tab-pane active" id="tab_1">
     
        <div class="box-body">
            @can('sambutan.index')
            <div class="input-group-prepend">
                
             
            </div>
            @endcan

    </div>

<p></p>

      {{--  conten 1  --}}
      <div class="table-responsive">
		<table id="example1" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Santri</th>
					<th>Jenis Bayar</th>
					<th>Tgl Bayar</th>
					<th>Jml Bayar</th>
					
					<th>Petugas</th>
					<th>Updated</th>
					<th>Kategori</th>
					
					
					
				</tr>
			</thead>
			{{-- <tbody>
				@php $i=1 @endphp
				@foreach($ulang as $s)
			
				<tr>
					<td>{{ $i++ }}</td>
					<td>{{$s->nim}}</td>
					<td>{{$s->nama}}</td>
					<td>{{$s->nm_kls}}</td>
					<td>
						@if ($s->status == 1)
						<small class="label label-info">Verifikasi</small> </td>
							
						@endif
						
					
					<td>{{$s->created_at}}</td>
					
					<td>
						@php
							$id=Crypt::encryptString($s->id_priode.','.$s->no_induk);                                      
							@endphp
						<a href="{{ url('/infaq/ulang/'.$id) }}" class="btn btn-sm btn-primary" title="pembayaran">
							<i class="fa fa-dollar"></i> </a>
						<a href="" class="btn btn-sm btn-success" title="Detail siswa">
							<i class="fa fa-tag"></i> </a>
						

					</td>
					
				</tr>
				@endforeach
			</tbody> --}}
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
				@foreach ($infaq_buku as $no => $post)
				
				<tr>
				  <td>{{  ++$no}}</td>
				  <td>{{ $post->nm_santri }}</td>
				  <td>{{ $post->jns_bayar }}</td>
				  <td>{{ $post->tgl_bayar }}</td>
				  <td>{{ moneyFormat($post->nominal) }}</td>
				  
				  <td>{{ $post->petugas }}</td>
				  <td>{{ $post->created_at }}</td>
				  <td>
					  @if ($post->id_level == 1)
					  <center><span class="label label-success">Anak</label></center>
					  @else
					  <center><span class="label label-info">Dewasa</label></center>

					  @endif
				  </td>
				
				</tr>
				  @endforeach
            </tbody>
		</table>
</div>


    </div>
    <!-- /.tab-pane -->
    <div class="tab-pane" id="tab_2">
        <div class="box-body">
         
           
    </div>

        {{--  conten 2  --}}
        <div class="table-responsive">
			<table id="example2" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Santri</th>
						<th>Jenis Bayar</th>
						<th>Tgl Bayar</th>
						<th>Jml Bayar</th>
						
						<th>Petugas</th>
						<th>Updated</th>
						<th>Kategori</th>
	
					</tr>
				</thead>
				
                <tbody>
					@foreach ($infaq_daftar as $no => $post)
					<tr>
					  <td>{{  ++$no}}</td>
					  <td>{{ $post->nm_santri }}</td>
					  <td>{{ $post->jns_bayar }}</td>
					  <td>{{ $post->tgl_bayar }}</td>
					  <td>{{ moneyFormat($post->nominal) }}</td>
					  
					  <td>{{ $post->petugas }}</td>
					  <td>{{ $post->created_at }}</td>
					  <td>
						  @if ($post->id_level == 1)
						  <center><span class="label label-success">Anak</label></center>
						  @else
						  <center><span class="label label-info">Dewasa</label></center>
	
						  @endif
					  </td>
					
					</tr>
					  @endforeach
                </tbody>
			</table>
    </div>
    </div>
    <!-- /.tab-pane -->
    <div class="tab-pane" id="tab_3">
        <div class="box-body">
         
           
    </div>

        {{--  conten 3  --}}
        <div class="table-responsive">
			<table id="example3" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
					<th>Nama Santri</th>
					<th>Jenis Bayar</th>
					<th>Tgl Bayar</th>
					<th>Jml Bayar</th>
					
					<th>Petugas</th>
					<th>Updated</th>
					<th>Kategori</th>
						
					</tr>
				</thead>
				<tbody>
					@foreach ($infaq_qr as $no => $post)
					<tr>
					  <td>{{  ++$no}}</td>
					  <td>{{ $post->nm_santri }}</td>
					  <td>{{ $post->jns_bayar }}</td>
					  <td>{{ $post->tgl_bayar }}</td>
					  <td>{{ moneyFormat($post->nominal) }}</td>
					  
					  <td>{{ $post->petugas }}</td>
					  <td>{{ $post->created_at }}</td>
					  <td>
						  @if ($post->id_level == 1)
						  <center><span class="label label-success">Anak</label></center>
						  @else
						  <center><span class="label label-info">Dewasa</label></center>
	
						  @endif
					  </td>
					
					</tr>
					  @endforeach
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
   
  });

  $(function () {
    $("#example2").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print"]
	
    }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
   
  });

  $(function () {
    $("#example3").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print"]
	
    }).buttons().container().appendTo('#example3_wrapper .col-md-6:eq(0)');
   
  });
</script>

@endpush