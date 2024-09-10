
@extends('my-seals.templates.app')

@section('content')
        
		
		<!-- Page Title Section -->
		<div class="row page-title page-title-about">
			<div class="container">
				<h2><i class="fa fa-edit"></i>Pendaftaran Santri Baru</h2>
			</div>
		</div>
		
		<!-- contact row -->
		<div class="row contact-row">
			<div class="container">
				<div class="col-sm-12 address-box">
					<div class="col-xs-12">
						<center>
							<div class="col-md-12">
						
						<h3><i class="fa fa-edit"></i>Pendaftaran Santri Baru</h3>
								@if (session('success'))
								<div class="alert alert-success">
									{{ session('success') }}
								  
								</div>
								@endif
							
								@if (session('error'))
									<div class="alert alert-success">
										{{ session('error') }}
									</div>
								@endif
						</center>
					</div>

					@if (isset($priodeank->ket))
					<center>
						@php
						$id=Crypt::encryptString($priodeank->id); 
						@endphp
					
						<a href="{{ url('/form/pendaftaran-dewasa/'.$id) }}" class="btn btn-lg btn-primary">
						Formulir Kelas Dewasa</a>
							<p></p>
						
						<a href="{{ url('/form/pendaftaran-anak/'.$id) }}" class="btn btn-lg btn-success">
							Formulir Kelas Anak-Anak</a>
<hr>
							<p></p>
							Informasi Pendaftaran : <b>{{ $priodeank->priode }}</b><p></p>
							Tanggal Pendaftaran   : <b>{{ $priodeank->tgl_awal }} - {{ $priodeank->tgl_akhir }}

							</b>
						</center> 
				   @else
				   <center>
					<a href="" class="btn btn-lg btn-danger">
						Pendaftaran sudah ditutup</a>
					</center>
				   @endif

					

					
					
				</div>

				<div class="col-sm-12 address-box">
				
					
					<div class="address-item">
					
						
						
						<div class="clearfix"></div>
					</div>
				

					<div class="address-body">
						<div class="address-item">
							<div class="col-xs-1">
								<i class="fa fa-map-marker"></i>
							</div>
							<div class="col-xs-11">
								<p>Jl. Johar Baru Gg. UU No. 9B.RT 10 / RW 004 kel.Johar Baru,kec.Johar Baru Kota Jakarta Pusat</p>
							</div>
							<div class="clearfix"></div>
						</div>
						<div class="address-item">
							<div class="col-xs-1">
								<i class="fa fa-envelope-o"></i>
							</div>
							<div class="col-xs-11">
								<p>yayasan.mutqin@gmail.com</p>
							</div>
							<div class="clearfix"></div>
						</div>
						<div class="address-item">
							<div class="col-sm-1">
								<i class="fa fa-phone"></i>
							</div>
							<div class="col-xs-11">
								<p>081511628787</p>
							</div>
							<div class="clearfix"></div>
						</div>
						{{-- <div class="address-item no-border">
							<div class="col-xs-1">
								<i class="fa fa-clock-o"></i>
							</div>
							<div class="col-xs-11">
								<p>MON to FRI: 09:00 AM - 03:00 PM </p>
							</div>
							<div class="clearfix"></div>
						</div> --}}
						<div class="clearfix"></div>
					</div>
				</div>
				
			</div>
		</div>
		
	
		
		
		@endsection