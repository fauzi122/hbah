@extends('my-seals.templates.app')

@section('content')
<!-- Page Title Section -->
<div class="row page-title page-title-about">
	<div class="container">
		<h2><i class="fa fa-calendar"></i>NEWS DETAILS</h2>
	</div>
</div>
		<!-- Events Section -->
		<div class="row section-row evets-row">
			<div class="container">
				<div class="col-md-8 left-event-items">
					<div class="col-xs-12 event-single-wrapper">
						<h3>{{ $berita->title }}</h3>
						<h5>
							<span><i class="fa fa-calendar"></i>{{ $berita->created_at }}</span>
							
							
						</h5>
						<p>{{ $berita->content }}</p>
						<img src="{{ Storage::url('public/posts/'.$berita->image) }}">
						

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
						<h3>Yayasan Fadhillah llmi Pratama</h3>
						 {{--  <h6><i class="fa fa-map-marker"></i> Jalan Cibeuteung Muara, Kp. Bojong Indah Rt 02/06, Putat Nutug, Ciseeng, Bogor, West Java 16120</h6>  --}}
						<p> jl Jinjing RT 006 RW 002 Kel. Pasir Putih Kec. Sawangan Kota Depok Jawa Barat. HP: 08568037779</p>
						{{--  <a href="#"><i class="fa fa-paper-plane"></i> KNOW MORE</a>  --}}
					</div>
				
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		@endsection