
 
  {{-- <li class="treeview">
    <a href="#">
      <i class="fa fa-calendar"></i>
      <span>Jadwal Mengajar</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">

      <li><a href="{{ url('/elearning/jadwal') }}"><i class="fa fa-circle-o"></i> Jadwal</a></li>
      <li><a href="{{ url('/elearning/latihan') }}"><i class="fa fa-circle-o"></i> Latihan Ujian</a></li>
      <li><a href="{{ url('/elearning/jadwal') }}"><i class="fa fa-circle-o"></i> Rekap Absem</a></li>
  
    </ul>
  </li> --}}



  <li class="treeview">
    <a href="#">
      <i class="fa fa-files-o"></i>
      <span>Data Master</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      
      @can('guru.index')
        <li><a href="{{ url('/master/guru') }}"><i class="fa fa-circle-o"></i> Guru</a></li>
      @endcan
        <li><a href="{{ url('/master/kelas') }}"><i class="fa fa-circle-o"></i> Kelas</a></li>
        @can('siswa.index')
        <li><a href="{{ url('/master/siswa') }}"><i class="fa fa-circle-o"></i> Siswa</a></li>
        @endcan
    </ul>
  </li>
 

  @can('Master Soal')
  {{-- <li class="treeview">
    <a href="#">
      <i class="fa fa-laptop"></i>
      <span>Master Soal</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
        <li><a href="{{ url('/elearning/soal') }}"><i class="fa fa-circle-o"></i> Soal UTS</a></li>
        <li><a href="{{ url('/elearning/soal/uas') }}"><i class="fa fa-circle-o"></i> Soal UAS</a></li>
        <li><a href="{{ url('/elearning/laporan') }}"><i class="fa fa-circle-o"></i> Laporan</a></li>
     

    </ul>
  </li> --}}
  @endcan

  {{--  @can('Menu Cetak')
  <li class="treeview">
    <a href="#">
        <i class="fa fa-print"></i> <span>Cetak</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
        <li><a href="{{ url('/cetak/kartu-ujian') }}"><i class="fa fa-circle-o"></i> Kartu Ujian</a></li>
        <li><a href="{{ url('/brita-acara') }}"><i class="fa fa-circle-o"></i> Berita Acara</a></li>
       
    </ul>
  </li>
  @endcan  --}}

  @can('Manajemen Data')
  <li class="treeview">
    <a href="#">
        <i class="fa fa-list"></i> <span>Manajemen Data</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      
        {{-- <li><a href="{{ url('/mapel') }}"><i class="fa fa-circle-o"></i> Import Mapel</a></li>
        <li><a href="{{ url('/datajawal') }}"><i class="fa fa-circle-o"></i> Import Jadwal</a></li> --}}
        <li><a href="{{ url('/data') }}"><i class="fa fa-circle-o"></i> Import Siswa</a></li>
        <li><a href="{{ url('/biodata') }}"><i class="fa fa-circle-o"></i> Import Biodata Siswa</a></li>
   
    </ul>
  </li>
  @endcan

  {{--  @can('User Management')  --}}
  <li class="treeview">
    <a href="#">
       <i class="fa fa-cog"></i> <span>User Management</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
       
        <li><a href="{{ url('/akses/user') }}"><i class="fa fa-circle-o"></i> Akun Staff</a></li>
        <li><a href="{{ url('/akses/permission') }}"><i class="fa fa-circle-o"></i> Permisson</a></li>
        <li><a href="{{ url('/akses/role') }}"><i class="fa fa-circle-o"></i> Akun Setting</a></li>
        
    </ul>
  </li>
  @can('spp')
  <li class="treeview">
    <a href="#">
        <i class="fa fa-dollar-sign"></i> <span>SPP</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
     
       
    <li><a href="{{ url('/front/post') }}"><i class="fa fa-circle-o"></i> Data Kelas</a></li>
    <li><a href="{{ url('/front/post') }}"><i class="fa fa-circle-o"></i> Data Bulan</a></li>
    <li><a href="{{ url('/front/post') }}"><i class="fa fa-circle-o"></i> Telat Bayar SPP</a></li>

             
    </ul>
  </li>
  @endcan
  @can('Sumber Data')

  <li class="treeview">
    <a href="#">
        <i class="fa fa-folder-open"></i> <span>Sumber Data</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
     
       
    <li><a href="{{ url('/front/post') }}"><i class="fa fa-circle-o"></i> Bentuk Kelas</a></li>
    <li><a href="{{ url('/front/post') }}"><i class="fa fa-circle-o"></i> Data Calon Siswa</a></li>
    <li><a href="{{ url('/front/post') }}"><i class="fa fa-circle-o"></i> Formulir & Berkas</a></li>
    <li><a href="{{ url('/front/post') }}"><i class="fa fa-circle-o"></i> Data Cuti</a></li>
    <li><a href="{{ url('/front/post') }}"><i class="fa fa-circle-o"></i> Data Alumni</a></li>
   
             
    </ul>
  </li>
  @endcan

  <li class="treeview">
    <a href="#">
      <i class="fa fa-folder-open"></i> <span>Pendaftaran & Infaq</span>
    <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
    <ul class="treeview-menu">
    <li><a href="{{ url('/front/priode-daftar') }}"><i class="fa fa-circle-o"></i>Priode Pendaftaran</a></li>
   
    <li><a href="{{ url('/front/priode-ulang') }}"><i class="fa fa-circle-o"></i>Priode Daftar Ulang</a></li>
   
             
    </ul>
  </li>

  <li class="treeview">
    <a href="#">
        <i class="fa fa-dollar"></i> <span>Infaq Siswa</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
     
    <li><a href="{{ url('/front/priode/pendaftaran') }}"><i class="fa fa-circle-o"></i>infaq Pendaftaran</a></li>
    <li><a href="{{ url('/front/priode-daftar') }}"><i class="fa fa-circle-o"></i>infaq Daftar Ulang</a></li>
    <li><a href="{{ url('/front/priode-daftar') }}"><i class="fa fa-circle-o"></i>Infaq Bulanan</a></li>
      
  
             
    </ul>
  </li>

  {{--  @endcan  --}}
  @can('Front Menu')
  <li class="treeview">
    <a href="#">
        <i class="fa fa-th"></i> <span>Front Menu</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
     
       
    <li><a href="{{ url('/front/post') }}"><i class="fa fa-circle-o"></i> Berita</a></li>
    <li><a href="{{ url('/front/event') }}"><i class="fa fa-circle-o"></i> Kegiatan </a></li>
    <li><a href="{{ url('/front/photo') }}"><i class="fa fa-circle-o"></i> Gallery Foto</a></li>
    <li><a href="{{ url('/front/video') }}"><i class="fa fa-circle-o"></i> Gallery Video</a></li>
    <li><a href="{{ url('/front/profil') }}"><i class="fa fa-circle-o"></i> Profil Sekolah</a></li>
             
    </ul>
  </li>
  @endcan    
  <li>
    <a href="{{ route('logout') }}" onclick="event.preventDefault();
    document.getElementById('logout-form').submit();">
      <i class="fa fa-minus-circle"></i> <span> {{ __('Logout') }}</span>
    </a>
  </li>


</li>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>  
  {{--  <li class="treeview">
    <a href="#">
      <i class="fa fa-share"></i> <span>Multilevel</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
      <li class="treeview">
        <a href="#"><i class="fa fa-circle-o"></i> Level One
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
          <li class="treeview">
            <a href="#"><i class="fa fa-circle-o"></i> Level Two
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
              <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
            </ul>
          </li>
        </ul>
      </li>
      <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
    </ul>
  </li>  --}}


  {{--  <li class="active treeview menu-open">
    <a href="{{ route('logout') }}" onclick="event.preventDefault();
    document.getElementById('logout-form').submit();">
      <i class="fa fa-minus-circle"></i> <span>{{ __('Logout') }}</span>
    </a>
  </li>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>  --}}

</ul>