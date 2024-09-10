
<li class="treeview">
  <a href="#">
    <i class="fa fa-calendar"></i>
    <span>Jadwal Sekolah</span>
    <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu">

    <li><a href="{{ url('/siswa/jadwal') }}"><i class="fa fa-circle-o"></i> Jadwal</a></li>
    <li><a href="{{ url('/siswa/ujian') }}"><i class="fa fa-circle-o"></i> Latihan Ujian</a></li>
   
  </ul>
</li>

<li class="treeview">
  <a href="#">
    <i class="fa fa-desktop"></i>
    <span>Ujian Sekolah</span>
    <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu">

    <li><a href="{{ url('/siswa/uts') }}"><i class="fa fa-circle-o"></i> Ujian Tengah Semester</a></li>
    <li><a href="{{ url('/siswa/uas') }}"><i class="fa fa-circle-o"></i> Ujian Akhir Semester</a></li>
   
  </ul>
</li>

<li class="treeview">
  <a href="#">
    <i class="fa fa-edit"></i>
    <span>Daftar Ulang</span>
    <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu">

    <li><a href="{{ url('/siswa/daftar-ulang') }}"><i class="fa fa-circle-o"></i> Verifikasi Daftar Ulang</a></li>
   
  </ul>
</li>


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

