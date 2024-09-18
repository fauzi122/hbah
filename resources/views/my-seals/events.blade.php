@extends('my-seals.templates.app')

@section('content')

    <!-- Page Title Section -->
    <div class="row page-title page-title-events">
        <div class="container">
            <h2><i class="fa fa-calendar"></i>EVENTS</h2>
        </div>
    </div>

    <!-- Events Section -->
    <div class="row section-row evets-row">
        <div class="container">
            <div class="col-md-8 left-event-items">
                @forelse($events as $events)
                
            
            
                <div class="event-item">
                    <div class="col-sm-7">
                      
                        {{-- <div class="event-date">
                            <p><span>{{ $events->date }}</p>
                        </div> --}}
                        <p></p>
                        <p></p>
                        <h3></h3>
                        
                       <a href=""> <h4 align="justify"><b>{{ $events->title }}</b></h4></a>
                        <p></p>
                        <h4 align="justify"><i class="fa fa-calendar"></i> 
                            Tanggal Kegiatan :{{ $events->date }}</h4><p></p>
                        <h4><i class="fa fa-map-marker"></i>
                            Lokasi Kegiatan : {{ $events->location }}</h4>
                    </div>
                    <div class="col-sm-5 event-item-img">
                        <div class="event-img">
                            <img src="{{ Storage::url('public/events/'.$events->image) }}">

                            <div class="event-detail-link">
                                <a href="/events-detail/{{ $events->id }}">VIEW DETAILS</a>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                @empty
                <div class="row">
                    <h1 align="center">events masih kosong</h1>
                </div>
            @endforelse
            
            </div>
            <div class="col-md-4 right-event-items">
                <div class="event-item">
                    <img src="{{ asset('frontend-assets/images/news-lg3.jpg') }}" alt="event" />
                </div>
                <div class="featured-event">
                    <div class="event-date">
                        {{--  <p><span>10</span> SEP</p>  --}}
                    </div>
                    <h3>YAYASAN FADILAH ILMI PRATAMA</h3>
                   {{--  <h6><i class="fa fa-map-marker"></i>Playground</h6>  --}}
                    {{-- <p>Rekening Donasi :</p> --}}
                    {{-- <img src="{{ asset('frontend-assets/images/a.jpg') }}" height="150" width="450" /> --}}
                    {{--  <a href="#"><i class="fa fa-paper-plane"></i> KNOW MORE</a>  --}}
                </div>
                
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
@endsection