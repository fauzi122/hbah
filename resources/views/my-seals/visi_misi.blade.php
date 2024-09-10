@extends('my-seals.templates.app')

@section('content')
    <!-- Page Title Section -->
    <div class="row page-title page-title-about">
        <div class="container">
            <h2><i class="fa fa-flask"></i>VISI dan MISI</h2>
        </div>
    </div>

    <!-- Events Section -->
    <div class="row section-row evets-row">
        <div class="container">
            <div class="col-md-6">
                <h1 align="center">Visi</h1>
                @forelse($visi as $visi)
                    <h2 align="justify">- {{ $visi->visi }}</h2>
                @empty
                    <div class="row">
                        <h1 align="center">Visi masih kosong</h1>
                    </div>
                @endforelse
            </div>

            <div class="col-md-6">
                <h1 align="center">Misi</h1>
                @forelse($misi as $misi)
                    <h5 align="justify">{{ $misi->misi }}</h5>
                @empty
                    <div class="row">
                        <h1 align="center">Misi masih kosong</h1>
                    </div>
                @endforelse

            </div>
            {{-- <div class="clearfix"></div> --}}
        </div>
    </div>
    <div class="clearfix"></div>
    </div>
    </div>
@endsection
