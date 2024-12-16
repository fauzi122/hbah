@extends('my-seals.templates.app')

@section('content')
    <div class="row">
        <div id="homeSlider" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#homeSlider" data-slide-to="0" class=""></li>
                <li data-target="#homeSlider" data-slide-to="1" class=""></li>
                <li data-target="#homeSlider" data-slide-to="2" class="active"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item">
                    <img src="{{ asset('frontend-assets/images/23.jpg') }}" alt="slide1" />
                    <div class="carousel-caption">
                        {{--  <h4>
                            <i class="fa fa-star-o"></i>MY - SEALS<i class="fa fa-star-o"></i>
                        </h4>  --}}
                        {{-- <h2>
                            YAYASAN <br><span><i class="fa fa"></i>FADILAH ILMI </span> PRATAMA
                           
                        </h2> --}}
                        {{--  <a href="/daftar"><i class="fa fa-paper-plane"></i>DAFTAR SANTRI BARU</a>  --}}
                       
                    </div>
                </div>

                {{-- <div class="item">
                    <img src="{{ asset('frontend-assets/images/slide5.jpg') }}" alt="slide2" />
                    <div class="carousel-caption">
                        <h4>
                            <i class="fa fa-star-o"></i>WE ARE BEST<i class="fa fa-star-o"></i>
                        </h4>
                        <h2>
                            LET YOUR CHILD <span><i class="fa fa-line-chart"></i>GROW</span>
                        </h2>
                        <p>
                            We here at <strong>PATHSHALA</strong> provides best education
                            <br />
                            to your little one
                        </p>
                        
                    </div>
                </div> --}}
                <div class="item active">
                    <img src="{{ asset('frontend-assets/images/slide6.jpg') }}" alt="slide2" />
                    <div class="carousel-caption">
                        <h4>
                            <i class="fa fa-star-o"></i>WE ARE BEST<i class="fa fa-star-o"></i>
                        </h4>
                        <h2>
                            <span><i class="fa fa"></i>FADILAH ILMI </span> PRATAMA
                        </h2>

                        {{--  <a href="/daftar"><i class="fa fa-paper-plane"></i>DAFTAR SANTRI BARU</a>  --}}
                    </div>
                </div>
            </div>

            <!-- Slide Controls -->
            <a class="left carousel-control" href="#homeSlider" role="button" data-slide="prev">
                <span class="fa fa-arrow-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#homeSlider" role="button" data-slide="next">
                <span class="fa fa-arrow-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

{{-- start sambutan --}}
<div class="row principal-intro-row">
    <div class="container">
      <div class="col-sm-5">
          <p></p>
        <img src="{{ Storage::url('public/guru/'.$sambutan->foto) }}" alt="Our Principal"style="width: 400px" height="500px" />

    </div>
      <div class="col-sm-7 principal-intro">
        <h6>
      
        </h6>
        <h3>Sambutan Kepala Sekolah</h3>
        <p class="justify">
            {!! $sambutan->des !!}
        
        </p>
        <p>
       
        </p>
        <h6 class="principal-name"> {{ $sambutan->nm_kep }}</h6>
        <div>
          {{--  <a href="#" class="know-more-btn"
            ><i class="fa fa-paper-plane"></i>KNOW MORE</a
          >  --}}
        </div>
      </div>
    </div>
  </div>
{{-- and sambutan --}}

  

    <!-- Facts section -->
    <div class="row section-row">
        <div class="container">
            <div class="fact-wrapper">
                <div class="col-md-12 fact-item">
                    <p class="lg-icon"><i class="fa fa-home"></i></p>
                    
                    <h1>Sejarah Singkat</h1>
                    <p>
                        {!! $sejarah->des !!}
                      
                    </p>
                </div>
                <div class="col-md-9 fact-item">
                    <div class="fact-item-list">
                        <div class="col-xs-3">
                            <i class="fa fa-check-square-o"></i>
                        </div>
                        <div class="col-xs-9">
                            <h2>VISI</h2>
                            <p>
                                {!! $visi->visi !!}
                            
                            </p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="fact-item-list">
                        <div class="col-xs-3">
                            <i class="fa fa-check-square-o"></i>
                        </div>
                        <div class="col-xs-9">
                            <h2>Misi</h2>
                            <p>
                                {!! $visi->misi !!}
                                {{-- {{ $visi->misi }} --}}
                            </p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    {{-- <div class="fact-item-list">
                        <div class="col-xs-3">
                            <i class="fa fa-graduation-cap"></i>
                        </div>
                        <div class="col-xs-9">
                            <h2>100% <br />SUCCESS RATE</h2>
                            <p>
                                It is a long established fact that a reader will be
                                distracted.
                            </p>
                        </div>
                        <div class="clearfix"></div>
                    </div> --}}
                </div>
                <div class="clearfix"></div>
            </div>
      

    <!-- News Section -->
    <div class="row section-row">
        <div class="container">
            <div class="section-row-header-center">
                {{-- <h6>
                    <i class="fa fa-star-o"></i>WE ARE BEST<i class="fa fa-star-o"></i>
                </h6> --}}
                <h1>LATEST NEWS</h1>
                <p>
                  
                </p>
            </div>
            
            @forelse($berita as $berita)
           
    
            <div class="col-sm-6 col-md-4">
                <div class="news-item-container">
                    <div class="news-img">
                        <img src="{{ Storage::url('public/posts/'.$berita->image) }}"style="width: 350px 
                        alt="Cruise">
                        <div class="news-item-date">
                            <h6><i class="fa fa-calendar"></i>{{ $berita->created_at }}</h6>
                        </div>
                    </div>
                    <div class="news-item">
                        <h5>{{ $berita->title }}</h5>
                      
                        <a href="/berita-detail/{{ $berita->id }}"><i class="fa fa-paper-plane"></i>VIEW DETAILS</a>
                    </div>
                </div>
            </div>
            @empty
            <div class="row">
                <h1 align="center">events masih kosong</h1>
            </div>
        @endforelse
            <div class="clearfix visible-sm-block"></div>
          
            <div class="clearfix visible-lg visible-md visible-sm"></div>
            <div class="view-all-link">
                <a href="/berita-all"><i class="fa fa-paper-plane"></i>VIEW ALL</a>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
