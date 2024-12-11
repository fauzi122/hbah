@extends('my-seals.templates.app')

@section('content')

    <!-- Page Title Section -->
    <div class="row page-title page-title-events">
        <div class="container">
            <h2><i class="fa fa-calendar"></i>News All</h2>
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
                            Tanggal  :{{ $events->created_at }}</h4><p></p>
                       
                    </div>
                    <div class="col-sm-5 event-item-img">
                        <div class="event-img">
                            <img src="{{ Storage::url('public/posts/'.$events->image) }}">

                            <div class="event-detail-link">
                                <a href="/berita-detail/{{ $events->id }}">VIEW DETAILS</a>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                @empty
                <div class="row">
                    <h1 align="center">berita masih kosong</h1>
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
                    <center>
                    <h3>YAYASAN FADILAH ILMI <br>PRATAMA</h3>
                   <br>
                    <h3> Infaq (Bank BJB) <BR> 0138265366100 <BR> </h3>
                    </center>
                    {{-- <h3> Infaq : BSI : - Yayasan Fadhillah Ilmi : 0138265366100 </h3> --}}
                
                </div>
                
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
@endsection
