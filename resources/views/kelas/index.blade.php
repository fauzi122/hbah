@extends('layouts.app')

@section('title', 'Data Kelas')

@section('breadcrumb')
  <h1>Data Utama</h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('/home') }}"><i class="fa fa-home"></i> Beranda</a></li>
    <li class="active">Data Kelas</li>
  </ol>
@endsection

@section('content')
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-address-card" aria-hidden="true"></i> Data Kelas.</h3>
        @can('kelas.create')
        <div class="pull-right">
          <button type="button" class="btn btn-primary" id="btn-create"><i class="fa fa-plus"></i> Buat Kelas</button>
        </div>
        @endcan
      </div>
      <div class="box-body">
        <form id="form-kelas" style="display: none;" class="form-horizontal well">
          @csrf
          <div class="form-group">
            <label for="nama" class="col-sm-2 control-label">Nama Kelas</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama Kelas">
            </div>
          </div>
          <div class="form-group">
            <label for="id_wali" class="col-sm-2 control-label">Wali Kelas</label>
            <div class="col-sm-10">
              <select class="form-control" name="id_wali" id="id_wali">
                <option value="">Pilih Wali Kelas</option>
                @foreach($gurus as $guru)
                  <option value="{{ $guru->id }}">{{ $guru->nama }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-primary" id="save">Simpan</button>
            </div>
          </div>
        </form>
        <table id="tabel_kelas" class="table table-hover table-condensed">
          <thead>
            <tr>
              <th>ID Kelas</th>
              <th>Nama Kelas</th>
              <th style="text-align: center;">Jumlah Siswa</th>
              <th style="text-align: center;">Wali Kelas</th>
              <th style="width: 130px; text-align: center;">Aksi</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>
@endsection

@push('css')
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables/media/css/dataTables.bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables/extensions/Responsive/css/responsive.dataTables.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables/extensions/FixedHeader/css/fixedHeader.bootstrap.css') }}">
@endpush

@push('scripts')
  <script src="{{ asset('assets/plugins/datatables/media/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatables/media/js/dataTables.bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatables/extensions/Responsive/js/dataTables.responsive.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatables/extensions/FixedHeader/js/dataTables.fixedHeader.js') }}"></script>
  <script>
   $(document).ready(function (){
  var tabel_kelas = $('#tabel_kelas').DataTable({
    processing: true,
    serverSide: true,
    responsive: true,
    ajax: '{{ route('master.data_kelas') }}',
    columns: [
      {data: 'id', name: 'id'},
      {data: 'nama', name: 'nama'},
      {data: 'siswa', name: 'siswa', searchable: false, orderable: false},
      {data: 'wali', name: 'wali', searchable: false, orderable: false},
      {data: 'action', name: 'action', searchable: false, orderable: false}
    ]
  });

  $('#btn-create').click(function() {
    $('#form-kelas').slideToggle();
  });

  $('#form-kelas').on('submit', function(e) {
    e.preventDefault();
    $.ajax({
      type: 'POST',
      url: '{{ url("crud/simpan-kelas") }}',
      data: $(this).serialize(),
      success: function(response) {
        if (response.success) {
          $('#tabel_kelas').DataTable().ajax.reload();
          $('#form-kelas').find('input[type=text], select').val('');
          $('#form-kelas').slideUp();
          alert('Kelas berhasil disimpan.');
        } else {
          alert(response.message);
        }
      }
    });
  });

  // Delegated event untuk tombol hapus yang mungkin ditambahkan setelah load
  $(document).on('click', '.del-kelas', function() {
    var id_kelas = $(this).attr('data-id');
    var $this = $(this);
    swal({
      title: 'Yakin akan dihapus?',
      text: "Data yang telah dihapus tidak bisa dikembalikan.",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, hapus saja!'
    }).then((result) => {
      if (result.value) {
        $.ajax({
          type: 'POST',
          url: '{{ url('crud/delete-kelas') }}',
          data: {id_kelas: id_kelas},
          success: function(data) {
            if (data.success) {
              swal(
                'Dihapus!',
                'Data kelas berhasil dihapus.',
                'success'
              );
              tabel_kelas.row($this.parents('tr')).remove().draw();
            } else {
              swal(
                'Gagal!',
                'Kelas gagal dihapus. ' + data.message,
                'error'
              );
            }
          }
        });
      }
    });
  });
});

  </script>
@endpush
