@extends('my-seals.templates.app')

@section('content')
<!-- Page Title Section -->
<div class="row page-title page-title-events">
	<div class="container">
		<h2><i class="fa fa-calendar"></i>EVENTS DETAILS</h2>
	</div>
</div>
		<!-- Events Section -->
		<div class="row section-row evets-row">
			<div class="container">
				<div class="col-md-8 left-event-items">
					<div class="col-xs-12 event-single-wrapper">
						<h3>{{ $events->title }}</h3>
						<h5>
							<span><i class="fa fa-calendar"></i>{{ $events->date }}</span>
							
							<span><i class="fa fa-map-marker"></i>{{ $events->location }}</span>
						</h5>
						<p>{{ $events->content }}</p>
						
						<img src="{{ Storage::url('public/events/'.$events->image) }}">


					</div>
					<div class="clearfix"></div>
				</div>
				<div class="col-md-4 right-event-items">
					<div class="event-item">
						<img src="{{ asset('frontend-assets/images/news-lg3.jpg') }}" alt="event" />
			
					</div>
					<div class="featured-event">
						<div class="event-date">
							{{--  <p><span>10</span> SEP</p>  --}}
						</div>
						<h3>SMA NEGERI 1 CISEENG</h3>
						 {{--  <h6><i class="fa fa-map-marker"></i> Jalan Cibeuteung Muara, Kp. Bojong Indah Rt 02/06, Putat Nutug, Ciseeng, Bogor, West Java 16120</h6>  --}}
						<p>Jalan Cibeuteung Muara, Kp. Bojong Indah Rt 02/06, Putat Nutug, Ciseeng, Bogor, West Java 16120</p>
						{{--  <a href="#"><i class="fa fa-paper-plane"></i> KNOW MORE</a>  --}}
					</div>
				
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		@endsection