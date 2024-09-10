@extends('my-seals.templates.app')

@section('content')
    <!-- Page Title Section -->
    <div class="row page-title page-title-about">
        <div class="container">
            <h2><i class="fa fa-users"></i>DATA STAFF</h2>
        </div>
    </div>

    <!-- Events Section -->
    <div class="row section-row evets-row">
        <div class="container">
            @forelse($gurus as $guru)
                <div class="col-md-4 left-event-items">
                    <div class="event-item">
                        <div class="col-sm-5 event-item-img">
                            <div class="event-img">
                                <img src="{{ asset('frontend-assets/images/principal1.jpg') }}" alt="" />
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <h3>{{ $guru->name }}</h3>
                            <h5>{{ $guru->jabatan }}</h5>
                            <h5>{{ $guru->email }}</h5>
                            <h5>{{ $guru->fb }}</h5>
                            <h5>{{ $guru->ig }}</h5>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            @empty
                <div class="row">
                    <h1 align="center">Data Masih Kosong</h1>
                </div>
            @endforelse

            <div class="clearfix"></div>
            {{-- <div class="event-control-box">
                <div class="pull-left">
                    <a href="#">
                        <i class="fa fa-arrow-left"></i>
                        PREVIOUS
                    </a>
                </div>
                <div class="pull-right">
                    <a href="#">
                        NEXT
                        <i class="fa fa-arrow-right"></i>
                    </a>
                </div>
                <div class="clearfix"></div>
            </div> --}}
        </div>
    </div>
@endsection
