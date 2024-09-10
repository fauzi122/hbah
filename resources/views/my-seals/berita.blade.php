@extends('my-seals.templates.app')

@section('content')

		<!-- Page Title Section -->
		<div class="row page-title page-title-about">
			<div class="container">
				<h2><i class="fa fa-file"></i>DONASI</h2>
			</div>
		</div>
<!-- News Section -->

<div class="row section-row evets-row">
    <div class="container">
        <center>
<div class="col-md-6 right-event-items">
                <div class="event-item">
                    <img src="{{ asset('frontend-assets/images/news-lg3.jpg') }}" alt="event" />
                </div>
                <div class="featured-event">
                    <div class="event-date">
                        {{--  <p><span>10</span> SEP</p>  --}}
                    </div>
                    <h3>YAYASAN MUTIARA AL-QURAN INDONESIA</h3>
                   {{--  <h6><i class="fa fa-map-marker"></i>Playground</h6>  --}}
                    {{-- <p>Rekening Donasi :</p> --}}
                    <img src="{{ asset('frontend-assets/images/a.jpg') }}" height="250" width="450" />
                    {{--  <a href="#"><i class="fa fa-paper-plane"></i> KNOW MORE</a>  --}}
                </div>
                
            </div>
        </center>
        <center>
            <div class="col-md-6 right-event-items">
                            <div class="event-item">
                                <img src="{{ asset('frontend-assets/images/news-lg3.jpg') }}" alt="event" />
                            </div>
                            <div class="featured-event">
                                <div class="event-date">
                                    {{--  <p><span>10</span> SEP</p>  --}}
                                </div>
                                <h3>LEGALITAS YAYASAN</h3>
                               {{--  <h6><i class="fa fa-map-marker"></i>Playground</h6>  --}}
                                {{-- <p>Rekening Donasi :</p> --}}
                                <img src="{{ asset('frontend-assets/images/b.jpg') }}" height="250" width="450" />
                                {{--  <a href="#"><i class="fa fa-paper-plane"></i> KNOW MORE</a>  --}}
                            </div>
                            
                        </div>
                    </center>
   


        </div>
      </div>
    </div>
  </div>

@endsection 
