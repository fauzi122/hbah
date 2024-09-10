@extends('layouts.app')

@section('content')


 
<div class="box">
    <div class="box-header">
        <h3 class="box-title">
          <i class="fa fa-calendar-check-o"></i> List Calon Santri Baru</h3> 
		  <div class="pull-right">
			{{--  <form action="" method="POST">
				@csrf
				<button class="btn btn-danger" type="submit">
					<i class="fa fa-trash"></i> Kosongkan data </button>  
			</form>  --}}
			
		</div>
          <p></p>
          <hr>

      </div>

      <!-- /.box-header -->
		
      <div class="box-body">

        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th scope="col" style="text-align: center;width: 6%">NO.</th>
                <th scope="col">Nama Lengkap</th>
                <th scope="col">TTL</th>
                <th scope="col">NM Orang Tua/Wali</th>
                <th scope="col">No HP</th>
                <th scope="col">Tgl Daftar</th>
              
                <th scope="col" style="width: 15%;text-align: center">AKSI</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($posts as $no => $post)
                <tr>
                    <th scope="row" style="text-align: center">{{ ++$no}}</th>
                    <td>{{ $post->nm_lengkap }}</td>
                    <td>{{ $post->tempat_lahir }},{{ $post->tgl }}</td>
                    <td>{{ $post->nm_ortu }}</td>
                    <td>{{ $post->no_hp_ortu }}</td>
                    <td>{{ $post->created_at }}</td>
                        
                    
                    <td class="text-center">
                        @php
                        $id=Crypt::encryptString($post->id.','.$post->id_level);                                    
                        @endphp
        
                        @can('posts.edit')
                        <a href="/infaq/daftar/anak/{{$id}}" class="btn btn-sm btn-primary">
                            <i class="fa fa-dollar" title="Pembayaran"></i>
                        </a>
                        @endcan
        
                        @can('posts.edit')
                            <a href="/front/daftar-anak/{{ $post->id}}/show" class="btn btn-sm btn-success">
                                <i class="fa fa-user-tag" title="detail"></i>
                            </a>
                        @endcan
        
                        {{--  @can('posts.delete')  --}}
                            {{--  <button onClick="Delete(this.id)" class="btn btn-sm btn-danger" id="{{ $post->id }}">
                                <i class="fa fa-trash" title="hapus"></i>
                            </button>  --}}
                        {{--  @endcan  --}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

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
