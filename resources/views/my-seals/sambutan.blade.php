@extends('my-seals.templates.app')

@section('content')
    <!-- Page Title Section -->
    <div class="row page-title page-title-about">
        <div class="container">
            <h2><i class="fa fa-trophy"></i>SAMBUTAN</h2>
        </div>
    </div>

    <!-- Events Section -->
    <div class="row section-row evets-row">
        <div class="container">
            <div class="col-md-12">
                {{-- <h1 align="center">Sejarah</h1> --}}
                @forelse($sambutan as $sambutan)
                    <h4 align="justify">{{ $sambutan->ket }}</h4>
                @empty
                    <div class="row">
                        <h1 align="center">Sambutan masih kosong</h1>
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
