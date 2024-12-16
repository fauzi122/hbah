@extends('layouts.app')

@section('content')
<div class="col-md-12">
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if (session('error'))
    <div class="alert alert-success">
        {{ session('error') }}
    </div>
    @endif
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">
                <i class="fa fa-calendar-o"></i> Data Pendaftar SIPP
            </h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body">
            <div class="card-body">
                <form action="{{ url('admin.event.index') }}" method="GET">
                    <div class="form-group">
                    </div>
                </form>
                <div class="table-responsive">
                    <!-- DataTables CSS and JS -->
                    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

                    <table id="example1" class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col" style="text-align: center;width: 6%">NO.</th>
                                <th scope="col">Nama Lengkap</th>
                                <th scope="col">Email</th>
                                <th scope="col" style="text-align: center;width: 5%">Detail</th>
                                <th scope="col" style="text-align: center;width: 5%">Edit</th>
                                <th scope="col" style="text-align: center;width: 5%">Hapus</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($members as $no => $member)
                            <tr>
                                <th scope="row" style="text-align: center">{{ ++$no + ($members->currentPage()-1) * $members->perPage() }}</th>
                                <td>{{ $member->full_name }}</td>
                                <td>{{ $member->email }}</td>
                                <td class="text-center">
                                    <button class="btn btn-info btn-sm" data-toggle="collapse" data-target="#details-{{ $no }}" aria-expanded="false">
                                        +
                                    </button>
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('sipp.edit', $member->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                </td>
                                <td class="text-center">
                                    <form action="{{ route('sipp.destroy', $member->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            <tr id="details-{{ $no }}" class="collapse">
                                <td colspan="6">
                                    <strong>Alamat Rumah:</strong> {{ $member->home_address }}<br>
                                    <strong>Alamat Bisnis:</strong> {{ $member->business_address }}<br>
                                    <strong>Kontribusi Bisnis:</strong> {{ $member->business_contribution }}<br>
                                    <strong>Tipe Bisnis:</strong> {{ $member->business_type }}<br>
                                    <strong>Keterampilan:</strong> {{ $member->skills }}<br>
                                    <strong>Lokasi Bisnis:</strong> {{ $member->business_location }}<br>
                                    <strong>Modal Bisnis:</strong> {{ number_format($member->business_capital, 0, ',', '.') }}<br>
                                    <strong>Kapasitas Produksi:</strong> {{ $member->production_capability }}<br>
                                    @if($member->business_activity_documentation)
                                    <a href="{{ $member->business_activity_documentation }}" target="_blank">Tonton Video di YouTube</a>
                                    @else
                                    <p>Dokumentasi Aktivitas tidak tersedia</p>
                                    @endif
                                    <br><strong>Dibuat pada:</strong> {{ $member->created_at->format('d-m-Y') }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <script>
                        $(document).ready(function() {
                            $('#example1').DataTable();
                        });
                    </script>

                    <div style="text-align: center">
                        {{ $members->links("vendor.pagination.bootstrap-4") }}
                    </div>
                </div>
            </div>
            <div class="box-footer" style="margin: 0; padding: 0 10px">
            </div>
        </div>
    </div>
</div>

@push('css')
<link rel="stylesheet" href="{{ URL::asset('assets/plugins/datatables/media/css/dataTables.bootstrap.css') }}">
<link rel="stylesheet" href="{{ URL::asset('assets/plugins/datatables/extensions/Responsive/css/responsive.dataTables.css') }}">
<link rel="stylesheet" href="{{ URL::asset('assets/plugins/datatables/extensions/FixedHeader/css/fixedHeader.bootstrap.css') }}">

<style type="text/css">
    .panel {
        margin-bottom: 5px !important;
    }

    .form-group {
        margin-bottom: 5px;
    }
</style>
@endpush
@push('scripts')

<script src="{{ URL::asset('assets/plugins/datatables/media/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/media/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/extensions/Responsive/js/dataTables.responsive.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/extensions/FixedHeader/js/dataTables.fixedHeader.js') }}"></script>
<script src="{{ URL::asset('/assets/plugins/summernote/summernote.min.js') }}"></script>
<script src="{{ URL::asset('/assets/plugins/dropzone/dropzone.js') }}"></script>
<script>
    $(function() {
        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            dom: 'Blfrtip',
            lengthMenu: [
                [10, 25, 50, 10000],
                ['10', '25', '50', 'Show All']
            ],
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print',

            ],
            "autoWidth": false

        });
    });

    $('#example1').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        dom: 'Blfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
</script>

@endpush
@stop
