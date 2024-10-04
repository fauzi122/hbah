<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>FADHILLAH ILMI</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{ url('/assets/bootstrap/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ url('/assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ url('/assets/plugins/ionicons-2.0.1/css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('/assets/dist/css/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ url('/assets/dist/css/skins/_all-skins.min.css') }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="shortcut icon" href="{{ asset('assets/img/logo.jepg') }}" type="image/x-icon">

  <!-- iCheck -->
  <link rel="stylesheet" href="{{ url('/assets/plugins/iCheck/flat/blue.css') }}">
  <!-- Morris chart -->
  <!-- <link rel="stylesheet" href="{{ url('/assets/plugins/morris/morris.css') }}"> -->
  <!-- jvectormap -->
  <!-- <link rel="stylesheet" href="{{ url('/assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}"> -->
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{ url('/assets/plugins/datepicker/datepicker3.css') }}">
  <!-- Daterange picker -->
  <!-- <link rel="stylesheet" href="{{ url('/assets/plugins/daterangepicker/daterangepicker.css') }}"> -->
  <!-- bootstrap Sweetalert -->
  <!-- <link rel="stylesheet" href="{{ url('/assets/plugins/sweetalert-master/dist/sweetalert.css') }}"> -->
  <link rel="stylesheet" type="text/css" href="{{ url('/assets/plugins/sweetalert-master/themes/facebook/facebook.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ url('assets/plugins/sweetalert2-1.0.5/dist/sweetalert2.min.css') }}">
  <link rel="stylesheet" href="{{URL::asset('assets/plugins_tes/fontawesome-free/css/all.min.css')}}">
 
 
  {{--  <link rel="stylesheet" href="{{ asset('assets/dist/select2/dist/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/select2-bootstrap4.css') }}" />  --}}

  

  <style type="text/css">
    .dataTable td{
      font-size: 10pt !important;
    }
    .form-group{
      margin-bottom: 4px;
    }
    .box-header.with-border {border-bottom: thin solid #d0ced8 !important;}
    .col-xs-1, .col-sm-1, .col-md-1, .col-lg-1, .col-xs-2, .col-sm-2, .col-md-2, .col-lg-2, .col-xs-3, .col-sm-3, .col-md-3, .col-lg-3, .col-xs-4, .col-sm-4, .col-md-4, .col-lg-4, .col-xs-5, .col-sm-5, .col-md-5, .col-lg-5, .col-xs-6, .col-sm-6, .col-md-6, .col-lg-6, .col-xs-7, .col-sm-7, .col-md-7, .col-lg-7, .col-xs-8, .col-sm-8, .col-md-8, .col-lg-8, .col-xs-9, .col-sm-9, .col-md-9, .col-lg-9, .col-xs-10, .col-sm-10, .col-md-10, .col-lg-10, .col-xs-11, .col-sm-11, .col-md-11, .col-lg-11, .col-xs-12, .col-sm-12, .col-md-12, .col-lg-12 {
        padding-right: 5px !important;
        padding-left: 5px !important;
    }
    .row {
      margin-right: -5px !important;
      margin-left: -5px !important;
    }
    .box {
      margin-bottom: 10px !important;
    }
  </style>
  @stack('css')
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  {{--  header  --}}

  @include('layouts.header')

  <!-- Left side column. contains the logo and sidebar -->

{{--  navigasi  --}}
@include('layouts.navigasi')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
     <div class="row">
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
        @yield('content')
     </div>
    </section>
  <!-- /.content-wrapper -->
  </div>
 {{--  footer  --}}
 @include('layouts.footer')

  <!-- Control Sidebar -->
{{--  thema  --}}
@include('layouts.thema')


  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<!-- <script src="{{ url('/assets/plugins/jQuery/jquery-2.2.3.min.js') }}"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>

<!-- jQuery UI 1.11.4 -->
<script src="{{ url('/js/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="{{ url('/assets/bootstrap/js/bootstrap.min.js') }}"></script>

<script src="{{ url('/assets/dist/js/moment.min.js') }}"></script>
<script src="{{ url('/assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- datepicker -->
<script src="{{ url('/assets/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
<!-- Bootstrap Sweetalert -->
<!-- <script src="{{ url('/assets/plugins/sweetalert-master/dist/sweetalert.min.js') }}"></script> -->
<script src="{{ url('assets/plugins/sweetalert2-1.0.5/dist/sweetalert2.min.js') }}"></script>
<!-- Slimscroll -->
<script src="{{ url('/assets/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ url('/assets/plugins/fastclick/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ url('/assets/dist/js/app.min.js') }}"></script>
{{--  <script src="{{ asset('assets/dist/select2/dist/js/select2.full.min.js') }}"></script>  --}}

  {{--  <script>
    //active select2
    $(document).ready(function () {
        $('select').select2({
            theme: 'bootstrap4',
            width: 'style',
        });
    });  --}}
<script>
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $(".numOnly").keydown(function (e) {
    if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
      (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
      (e.keyCode >= 35 && e.keyCode <= 40)) {
        return;
    }
    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
      e.preventDefault();
    }
  });
</script>
@stack('scripts')
</body>
</html>

