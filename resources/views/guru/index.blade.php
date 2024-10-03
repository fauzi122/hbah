@extends('layouts.app')
@section('title', 'Data guru')
@section('breadcrumb')

@endsection
@section('content')
{{-- <?php include(app_path() . '/functions/myconf.php'); ?> --}}
<div class="col-md-12">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title" ><i class="fa fa-user" aria-hidden="true"></i> Master Data Guru</h3>
      @if(auth()->user()->status == "A")
      <div class="pull-right">
        <button type="button" class="btn btn-primary" id="btn-guru"><i class="fa fa-user-plus"></i> Tambah Guru</button>
      </div>
      @endif
    </div>
    <div class="box-body">
      @if(auth()->user()->status == "A")
    
@include('guru.add')

      <hr>
      @endif
      <table id="tabel_guru" class="table table-hover table-condensed">
        <thead>
          <tr>
            <th>Nama</th>
            <th>NIP</th>
            <th>Jenis kelamin</th>
            <th style="width: 130px; text-align: center;">Aksi</th>
          </tr>
        </thead>
      </table>
    </div>
  </div>
</div>
{{--  <div class="col-md-4">
  <div class="box box-warning">
    <div class="box-header with-border">
      <h3 class="box-title" style="color: darkorange"><i class="fa fa-info-circle"></i> Informasi</h3>
    </div>
    <div class="box-body">
      <p>Daftarkan seluruh guru malalui halaman ini. Guru memiliki akses untuk membuat dan menerbitkan soal serta materi.</p>
      <p>Jika terdapat data guru yang belum valid atau guru yang belum terdaftar, hubungi operator sekolah untuk merubah atau mendaftarkan guru yang bersangkutan.</p>
    </div>
  </div>
</div>  --}}
@endsection
@push('css')
<link rel="stylesheet" href="{{URL::asset('assets/plugins/datatables/media/css/dataTables.bootstrap.css')}}">
<link rel="stylesheet" href="{{URL::asset('assets/plugins/datatables/extensions/Responsive/css/responsive.dataTables.css')}}">
<link rel="stylesheet" href="{{URL::asset('assets/plugins/datatables/extensions/FixedHeader/css/fixedHeader.bootstrap.css')}}">
@endpush
@push('scripts')
<script src="{{ url('assets/dist/js/sweetalert2.all.min.js') }}"></script>
<script src="{{URL::asset('assets/plugins/datatables/media/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatables/media/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatables/extensions/Responsive/js/dataTables.responsive.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatables/extensions/FixedHeader/js/dataTables.fixedHeader.js')}}"></script>
<script>
  $(document).ready(function() {
    tabel_guru = $('#tabel_guru').DataTable({
      processing: true,
      serverSide: true,
      responsive: true,
      lengthChange: true,
      ajax: '{{ route("master.data_guru") }}',
      columns: [{
          data: 'nama',
          name: 'nama',
          orderable: true,
          searchable: true
        },
        {
          data: 'no_induk',
          name: 'no_induk',
          orderable: true,
          searchable: true
        },
        {
          data: 'jk',
          name: 'jk',
          orderable: false,
          searchable: false
        },
        {
          data: 'action',
          name: 'action',
          orderable: false,
          searchable: false
        },
      ],
      "drawCallback": function(setting) {
        $('.del-guru').on('click', function() {
          var id_guru = $(this).attr('id');
          var $this = $(this);
          swal({
            title: 'Yakin akan dihapus?',
            text: "Data yang telah dihapus tidak bisa dikembalikan.",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.value) {
              $.ajax({
                type: 'POST',
                url: "{{ url('crud/delete-guru') }}",
                data: {
                  id_guru: id_guru
                },
                success: function(data) {
                  swal(
                    'Berhasil!',
                    'Data guru berhasil dihapus.',
                    'success'
                  )
                  $this.closest('tr').hide();
                }
              })
            }
          })
        });
      }
    });

    $("#btn-guru").click(function() {
      $("#wrap-guru").slideToggle();
    });

    $("#batal").click(function() {
      $("#wrap-guru").slideToggle();
    });

    $("#simpan-guru").click(function() {
      var dataString = $("#form-guru").serialize();
      $.ajax({
        type: "POST",
        url: "{{ url('/crud/simpan-guru') }}",
        data: dataString,
        beforeSend: function() {
          $("#wrap-btn").hide();
          $("#loading").show();
        },
        complete: function() {
          $("#loading").hide();
          $("#wrap-btn").show();
        },
        success: function(data) {
          if (data == 'ok') {
            $("#notif").removeClass('alert alert-danger').addClass('alert alert-info').html("Guru berhasil ditambahkan.").show();
            window.location.href = "{{ url('master/guru') }}";
          } else {
            $("#notif").removeClass('alert alert-info').addClass('alert alert-danger').html(data).show();
          }
        }
      })
    });
  });
</script>
@endpush