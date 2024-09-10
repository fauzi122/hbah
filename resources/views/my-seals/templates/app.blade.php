<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="" />
    <title>FADILAH ILMI PRATAMA</title>

    <!-- Styles -->
    <link href="{{ asset('frontend-assets/css/bootstrap.css') }}" rel="stylesheet" media="screen" />
    <link href="{{ asset('frontend-assets/css/owl.css') }}" rel="stylesheet" media="screen" />
    <link href="{{ asset('frontend-assets/css/owl_002.css') }}" rel="stylesheet" media="screen" />
    <link href="{{ asset('frontend-assets/css/style.css') }}" rel="stylesheet" media="screen" />
    <link rel="shortcut icon" href="{{ asset('assets/img/logo_ymai.png') }}" type="image/x-icon">

    <!-- Fonts -->
    <link href="{{ asset('frontend-assets/css/css.css') }}" rel="stylesheet" type="text/css" />
    <!-- <link href="{{ asset('frontend-assets/css/font-awesome.css') }}" rel="stylesheet" media="text/css"> -->
    <link href="{{ asset('frontend-assets/css/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet"
        type="text/css" />
</head>

<body>
    @include('my-seals/templates/menu')

    @yield('content')

    @include('my-seals/templates/footer')

    <!-- Scripts -->
    <script src="{{ asset('frontend-assets/js/jQuery_v3_2_0.js') }}"></script>
    <script src="{{ asset('frontend-assets/js/bootstrap.js') }}"></script>
    <script src="{{ asset('frontend-assets/js/owl.js') }}"></script>
    <script src="{{ asset('frontend-assets/js/js.js') }}"></script>

    <script>
        "undefined" === typeof _trfq || (window._trfq = []);
        "undefined" === typeof _trfd && (window._trfd = []),
            _trfd.push({
                "tccl.baseHost": "secureserver.net"
            }),
            _trfd.push({
                ap: "cpsh-oh"
            }, {
                server: "sg2plzcpnl466829"
            }, {
                id: "7770191"
            }); // Monitoring performance to make your website faster. If you want to opt-out, please contact web hosting support.
    </script>
    <script src="{{ asset('frontend-assets/js/tcc_l.js') }}"></script>
</body>

</html>
