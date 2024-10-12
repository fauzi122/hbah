@extends('my-seals.templates.app')

@section('content')
<div class="row page-title page-title-about">
			
</div>

<!-- contact row -->

<div class="row contact-row">
    <div class="container">
<div class="container mt-5">
    @if (session('success'))
    <div class="bg-blue-500 border border-blue-700 text-white px-6 py-2 rounded-lg text-center max-w-lg mx-auto mt-6">
        <h4 class="text-white text-lg font-semibold">
            {{ session('success') }}
        </h4>
    </div>
@endif

@if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4 max-w-lg mx-auto mt-6">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


    <h2>Formulir Pendaftaran Anggota SIPP</h2>
    <form action="/store/form/pendaftaran-sipp" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Field Nama Lengkap -->
        <div class="mb-3">
            <label for="full_name" class="form-label">Nama Lengkap:</label>
            <input type="text" class="form-control @error('full_name') is-invalid @enderror" id="full_name" name="full_name" placeholder="Masukkan Nama Lengkap" value="{{ old('full_name') }}">
            @error('full_name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Masukkan Email" value="{{ old('email') }}">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Field Alamat Rumah -->
        <div class="mb-3">
            <label for="home_address" class="form-label">Alamat Rumah:</label>
            <input type="text" class="form-control @error('home_address') is-invalid @enderror" id="home_address" name="home_address" placeholder="Masukkan Alamat Rumah" value="{{ old('home_address') }}">
            @error('home_address')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Field Alamat Usaha -->
        <div class="mb-3">
            <label for="business_address" class="form-label">Alamat Usaha:</label>
            <input type="text" class="form-control @error('business_address') is-invalid @enderror" id="business_address" name="business_address" placeholder="Masukkan Alamat Usaha" value="{{ old('business_address') }}">
            @error('business_address')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Field Kontribusi Usaha -->
        <div class="mb-3">
            <label for="business_contribution" class="form-label">Kontribusi Usaha:</label>
            <input type="text" class="form-control @error('business_contribution') is-invalid @enderror" id="business_contribution" name="business_contribution" placeholder="Masukkan Kontribusi Usaha" value="{{ old('business_contribution') }}">
            @error('business_contribution')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Field Jenis Usaha -->
        <div class="mb-3">
            <label for="business_type" class="form-label">Jenis Usaha:</label>
            <input type="text" class="form-control @error('business_type') is-invalid @enderror" id="business_type" name="business_type" placeholder="Masukkan Jenis Usaha" value="{{ old('business_type') }}">
            @error('business_type')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Field Tenaga / Skill -->
        <div class="mb-3">
            <label for="skills" class="form-label">Tenaga / Skill:</label>
            <input type="text" class="form-control @error('skills') is-invalid @enderror" id="skills" name="skills" placeholder="Masukkan Tenaga / Skill" value="{{ old('skills') }}">
            @error('skills')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Field Tempat Usaha -->
        <div class="mb-3">
            <label for="business_location" class="form-label">Tempat Usaha:</label>
            <input type="text" class="form-control @error('business_location') is-invalid @enderror" id="business_location" name="business_location" placeholder="Masukkan Tempat Usaha" value="{{ old('business_location') }}">
            @error('business_location')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Field Modal Usaha -->
        <div class="mb-3">
            <label for="business_capital" class="form-label">Modal Usaha:</label>
            <input type="number" class="form-control @error('business_capital') is-invalid @enderror" id="business_capital" name="business_capital" placeholder="Masukkan Modal Usaha" value="{{ old('business_capital') }}">
            @error('business_capital')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Field Kemampuan Produksi -->
        <div class="mb-3">
            <label for="production_capability" class="form-label">Kemampuan Produksi:</label>
            <input type="text" class="form-control @error('production_capability') is-invalid @enderror" id="production_capability" name="production_capability" placeholder="Masukkan Kemampuan Produksi" value="{{ old('production_capability') }}">
            @error('production_capability')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Field Dokumentasi Kegiatan Usaha -->
        <div class="mb-3">
            <label for="business_activity_documentation" class="form-label">Dokumentasi Kegiatan Usaha Link Video Youtube:</label>
            <input type="url" class="form-control @error('business_activity_documentation') is-invalid @enderror" id="business_activity_documentation" name="business_activity_documentation" placeholder="Masukkan Dokumentasi Kegiatan Usaha Link Video Youtube" value="{{ old('business_activity_documentation') }}">
            @error('business_activity_documentation')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        

        <!-- CAPTCHA Calculation -->
        <label for="captcha" class="form-label"><h4>Berapa hasil dari {{ $num1 }} + {{ $num2 }}?</h4></label>
        <input type="text" class="form-control @error('captcha') is-invalid @enderror" id="captcha" name="captcha" placeholder="Jawab Pertanyaan Ini">
        @error('captcha')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        
<BR></BR>
        <button type="submit" class="btn btn-primary">Daftar</button>
    </form>
</div>
</div>
</div>

@endsection
