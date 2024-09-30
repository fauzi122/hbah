<div class="row nav-row trans-menu">
    <div class="container nav-container">
        <div class="top-navbar">
            <div class="pull-right">
                <div class="top-nav-social pull-left">
                    <a href="{{ $profil->fb }}" target="_blank"><i class="fa fa-facebook"></i></a>
                    <a href="{{ $profil->ig }}" target="_blank"><i class="fa fa-instagram"></i></a>
                    <a href="{{ $profil->tw }}" target="_blank"><i class="fa fa-twitter"></i></a>
                    <a href="{{ $profil->youtube }}" target="_blank"><i class="fa fa-youtube"></i></a>
                </div>
                <div class="top-nav-login-btn pull-right">
                    {{--  <a href="{{ route('login') }}" data-toggle="modal" data-target="#loginModal"><i class="fa fa-sign-in"></i>LOGIN</a>  --}}
                    <a href="/login"><i class="fa fa-sign-in"></i>LOGIN</a>
                </div>
                <!--<div class="top-navbar-search pull-right">
       <i class="fa fa-search"></i>
       <input type = "text" placeholder = "Search"/>
      </div>-->
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
        <nav id="pathshalaNavbar" class="navbar navbar-default" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#pathshalaNavbarCollapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand"
                    href="http://limpidthemes.com/Themeforest/html/Pathshala/Pathshala-HTML/index.html"></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="pathshalaNavbarCollapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="{{ route('beranda') }}"><i class="fa fa-home"></i>HOME</a>
                    </li>
                  
                    <li>
                        <a href="{{ route('events') }}"><i class="fa fa-calendar"></i>EVENT</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                            <i class="fa fa-picture-o"></i>GALLERY
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('video') }}"><i class="fa fa-video-camera"></i> Viddeo</a>
                            </li>
                            <li><a href="{{ route('gallery') }}"><i class="fa fa-photo"></i>Photo</a></li>
                            
                        </ul>
                    </li>
                   
                    <li>
                        <a href="{{ route('berita') }}"><i class="fa fa-file"></i>DONASI</a>
                    </li>
                    <li>
                        <a href="{{ route('daftar') }}"><i class="fa fa-edit"></i>PENDAFTARAN SISWA BARU</a>
                    </li>
                    <li>
                        <a href="{{ route('sipp') }}"><i class="fa fa-edit"></i>PENDAFTARAN ANGGOTA SIPP </a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
    </div>
</div>
