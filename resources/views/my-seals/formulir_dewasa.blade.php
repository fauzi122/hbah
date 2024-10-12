
@extends('my-seals.templates.app')

@section('content')
        
		
	
		<!-- contact row -->
		<!-- Page Title Section -->
		<div class="row page-title page-title-about">
			
		</div>
		
		<!-- contact row -->
       
		<div class="row contact-row">
			<div class="container">
                <form action="/form/pendaftaran-dewasa" method="POST"enctype="multipart/form-data">
				@csrf
					<div class="contact-form col-sm-12">
					<div class="col-xs-12">
                        <center>
						<h3><i class="fa fa-edit"></i>Formulir Pendaftaran Siswa Baru</h3>
					</center>
					
                    </div>
					<div class="col-xs-6">
						<label>Nama Lengkap Calon Siswa</label>
						<input type="text" placeholder="Masukan Nama Lengkap" class="form-control @error('nm_lengkap') is-invalid @enderror" 
                        name="nm_lengkap" value="{{ old('nm_lengkap') }}">
						@error('nm_lengkap')
						<div class="invalid-feedback" style="display: block">
							{{ $message }}
						</div>
						@enderror
					</div>
					<div class="col-xs-6">
						<label>Nama Panggilan Calon Siswa</label>
						<input type="text" placeholder="Masukan Nama Panggilan" class="form-control  @error('nm_panggilan') is-invalid @enderror"
                        name="nm_panggilan"value="{{ old('nm_panggilan') }}">
						@error('nm_panggilan')
						<div class="invalid-feedback" style="display: block">
							{{ $message }}
						</div>
						@enderror
					</div>
                    <div class="col-xs-6">
						<label>Tempat Lahir</label>
						<input type="text" placeholder="Masukan Nama Lengkap" class="form-control  @error('tempat_lahir') is-invalid @enderror" 
                        name="tempat_lahir"value="{{ old('tempat_lahir') }}">
						@error('tempat_lahir')
						<div class="invalid-feedback" style="display: block">
							{{ $message }}
						</div>
						@enderror
					</div>
					<div class="col-xs-6">
						<label>Tanggal Lahir</label>
						<input type="date" placeholder="Masukan Nama Panggilan" class="form-control  @error('tgl') is-invalid @enderror"
                        name="tgl" value="{{ old('tgl') }}">
						@error('tgl')
						<div class="invalid-feedback" style="display: block">
							{{ $message }}
						</div>
						@enderror
					</div>
					
					<div class="col-xs-6">
						<label>Jenis Kelamin</label>
						<select class="form-control selectpicker" name="jk">
                            <optgroup label="Jenis Kelamin">
                                <option>Laki-Laki</option>
                                <option>Perempuan</option>
                             
                            </optgroup>
                         
                        </select>
					</div>
					<div class="col-xs-6">
						<label>Email Orang Tua</label>
						<input type="email" placeholder="Masukan Email Anda" class="form-control  @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}">
						@error('email')
						<div class="invalid-feedback" style="display: block">
							{{ $message }}
						</div>
						@enderror
					</div>
					
                    <div class="col-xs-12">
						<label>Alamat</label>
						<input type="text" hidden readonly
						name="id_priode" value="{{ $pecah[0] }}">
						<textarea rows="3" placeholder="Masukan  Alamat" class="form-control  @error('alamat') is-invalid @enderror"
                        name="alamat">{{ old('alamat') }}</textarea>
						@error('alamat')
						<div class="invalid-feedback" style="display: block">
							{{ $message }}
						</div>
						@enderror
					</div>

                    <div class="clearfix"></div>
					{{-- <div class="col-xs-12">
						<label>Status Perkawinan</label>
						<select class="form-control selectpicker" name="status">
                            <optgroup label="Pilih Status Perkawinan">
                                <option>Sudah Menikah</option>
                                <option>Belum Menikah</option>
                             
                            </optgroup>
                         
                        </select>
					</div> --}}
				
                    <div class="col-xs-12">
						<label>Pekerjaan </label>
						<input type="text" placeholder="Masukan Pekerjaan " class="form-control  @error('kerja_ortu') is-invalid @enderror"
                        name="kerja"value="{{ old('kerja') }}">
						@error('kerja')
						<div class="invalid-feedback" style="display: block">
							{{ $message }}
						</div>
						@enderror
					</div>
                    <div class="col-xs-12">
						<label>Alamat Pekerjaan</label>
						<textarea rows="3" placeholder="Masukan  Alamat Pekerjaan" class="form-control  @error('alamat_kerja_ortu') is-invalid @enderror"
                        name="alamat_kerja">{{ old('alamat_kerja') }}</textarea>
						@error('alamat_kerja')
						<div class="invalid-feedback" style="display: block">
							{{ $message }}
						</div>
						@enderror
					</div>
                
                    {{-- <div class="col-xs-12">
						<label>Pendidikan </label>
						<input type="text" placeholder="Masukan  Pendidikan " class="form-control  @error('pendidikan_ortu') is-invalid @enderror"
                        name="pendidikan" value="{{ old('pendidikan') }}"></input>
						@error('pendidikan')
						<div class="invalid-feedback" style="display: block">
							{{ $message }}
						</div>
						@enderror
					</div> --}}
					{{--  <div class="col-xs-12">
						<label>Pendidikan Orang Tua/Wali</label>
						<select class="form-control  @error('file') is-invalid @enderror">
							<option>- Select -</option>
							<option>SD</option>
							<option>SMP/MTS</option>
							<option>SMA/SMA/MA</option>
							<option>S1</option>
							<option>S2</option>
							<option>S3</option>
							<option>Lainnya</option>
						</select>
					</div>  --}}

                    <div class="col-xs-12">
						<label>No Hp Orang Tua</label>
						<input type="number" placeholder="Masukan No Hp " class="form-control  @error('no_hp_ortu') is-invalid @enderror"
                        name="no_hp" value="{{ old('no_hp') }}">
						@error('no_hp')
						<div class="invalid-feedback" style="display: block">
							{{ $message }}
						</div>
						@enderror
					</div>
					<div class="col-xs-12">
					<label for="captcha" class="form-label"><h4>Berapa hasil dari {{ $num1 }} + {{ $num2 }}?</h4></label>
					<input type="text" class="form-control @error('captcha') is-invalid @enderror" id="captcha" name="captcha" placeholder="Jawab Pertanyaan Ini">
					@error('captcha')
						<div class="invalid-feedback">{{ $message }}</div>
					@enderror
				</div>
					<div class="col-xs-12">
						<p></p>
						<button type="submit" class="btn btn-primary" ><i class="fa fa-paper-plane"></i> Kirim Data</button>
						<button type="reset" class="btn btn-danger" ><i class="fa fa-close"></i> Batal</button>
					</div>
					<div class="clearfix"></div>
				</div>
			
			</div>
		</div>
    </center>
</form>
		@endsection