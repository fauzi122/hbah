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
					@forelse($photo as $photo)
					<div class="col-md-4 col-sm-4">
						<div class="image-wrapper">
							{{-- <img src="{{ asset('frontend-assets/images/news-sm1.jpg')}}" alt="Cruise"> --}}
							<img src="{{ Storage::url('public/photos/'.$photo->image) }}" style="width: 350px"
							alt="Cruise">
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
			
		
		

@endsection 