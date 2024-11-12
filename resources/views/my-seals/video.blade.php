@extends('my-seals.templates.app')

@section('content')

   
 
		
		<!-- Page Title Section -->
		<div class="row page-title page-title-about">
			<div class="container">
				<h2><i class="fa fa-picture-o"></i>CAMPUS GALLERY</h2>
			</div>
		</div>
		
		<!-- START: GALLERY -->
		<div class="row gallery-row">
			<div class="container clear-padding">
			
				<div class="image-set">
					@forelse($video as $video)
					<div class="col-md-6 col-sm-6">
						<div class="image-wrapper">
							{{--  <iframe width="510" height="330" src="{{ $video->embed }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>  --}}
							<iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $video->embed }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
						
							 <p></p>
							<h4><i class="fa fa-angle-double-right"></i> {{ $video->title }}</h4>
							<p></p><i class="fa fa-calendar"></i> {{ $video->created_at }} 
							
						</div>
					</div>
					@empty
				<div class="row">
					<h1 align="center">events masih kosong</h1>
				</div>
			@endforelse

				</div>
			
				<div class="clearfix"></div>
			</div>
		</div>
		<!-- END: GALLERY -->
			
		<!-- Know More Info & Admission apply row -->
		{{-- <div class="row apply-know-row">
			<div class="container">
				<div class="col-sm-6 admission-row">
					<h3>ADMISSIONS ARE OPEN</h3>
					<p>It is a long established fact that a reader will be distracted by the content of a page when looking at its layout.</p>
					<a href="#"><i class="fa fa-edit"></i>APPLY NOW</a>
				</div>
				<div class="col-sm-6 info-row">
					<h3>HAVE ANY QUERIES?</h3>
					<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
					<div class="input-wrapper">
						<input type="text" placeholder="e.g. email@pathshala.com"/><a href="#"><i class="fa fa-paper-plane"></i></a>
					</div>
				</div>
			</div>
		</div> --}}
		

@endsection 