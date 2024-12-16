@extends('layouts.app')

@section('content')
<div class="col-md-12">
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

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">
                <i class="fa fa-pencil-square-o"></i> Edit Member
            </h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body">
            <form action="{{ route('sipp.update', $member->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="full_name">Nama Lengkap</label>
                    <input type="text" name="full_name" class="form-control" id="full_name" value="{{ $member->full_name }}" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" id="email" value="{{ $member->email }}" required>
                </div>

                <div class="form-group">
                    <label for="home_address">Alamat Rumah</label>
                    <input type="text" name="home_address" class="form-control" id="home_address" value="{{ $member->home_address }}" required>
                </div>

                <div class="form-group">
                    <label for="business_address">Alamat Bisnis</label>
                    <input type="text" name="business_address" class="form-control" id="business_address" value="{{ $member->business_address }}" required>
                </div>

                <div class="form-group">
                    <label for="business_contribution">Kontribusi Bisnis</label>
                    <input type="text" name="business_contribution" class="form-control" id="business_contribution" value="{{ $member->business_contribution }}" required>
                </div>

                <div class="form-group">
                    <label for="business_type">Tipe Bisnis</label>
                    <input type="text" name="business_type" class="form-control" id="business_type" value="{{ $member->business_type }}" required>
                </div>

                <div class="form-group">
                    <label for="skills">Keterampilan</label>
                    <input type="text" name="skills" class="form-control" id="skills" value="{{ $member->skills }}" required>
                </div>

                <div class="form-group">
                    <label for="business_location">Lokasi Bisnis</label>
                    <input type="text" name="business_location" class="form-control" id="business_location" value="{{ $member->business_location }}" required>
                </div>

                <div class="form-group">
                    <label for="business_capital">Modal Bisnis</label>
                    <input type="number" name="business_capital" class="form-control" id="business_capital" value="{{ $member->business_capital }}" required>
                </div>

                <div class="form-group">
                    <label for="production_capability">Kapasitas Produksi</label>
                    <input type="text" name="production_capability" class="form-control" id="production_capability" value="{{ $member->production_capability }}" required>
                </div>

                <div class="form-group">
                    <label for="business_activity_documentation">Dokumentasi Aktivitas</label>
                    <input type="url" name="business_activity_documentation" class="form-control" id="business_activity_documentation" value="{{ $member->business_activity_documentation }}">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('sipp.index') }}" class="btn btn-default">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
