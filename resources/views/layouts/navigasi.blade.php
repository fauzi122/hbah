<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          @if(Auth::user()->gambar != "")
          <img src="{{ Storage::url('public/guru/'.Auth::user()->gambar) }}" style=" vertical-align: middle;
          width: 50px;
          height: 50px;
          border-radius: 50%;">
        @else
          <img src="{{ url('/assets/img/download.png') }}" class="img-circle" alt="User Image">
        @endif
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->nama }}</p>
       
          <a href=""><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
     
      <!-- sidebar menu: : style can be found in sidebar.less -->

      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active">
          <a href="/home"><i class="fa fa-home"></i> <span>Dashboard</span></a>
        </li>
        <li><a href="/pengaturan"><i class="fa fa-user"></i> <span>Profil</span></a></li>
        @if(Auth::user()->status == 'G' or Auth::user()->status == 'A')
       
        @include('layouts.menu.guru')

        @elseif(Auth::user()->status == 'S')
       
        @include('layouts.menu.siswa')
       
        @endif

      
    </section>
    <!-- /.sidebar -->
  </aside>