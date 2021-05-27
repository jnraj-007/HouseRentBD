
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>HRBD</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{asset("backend")}}/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{asset("backend")}}/vendor/font-awesome/css/font-awesome.min.css">
    <!-- Custom Font Icons CSS-->
    <link rel="stylesheet" href="{{asset("backend")}}/css/font.css">
    <!-- Google fonts - Muli-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{asset("backend")}}/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{asset("backend")}}/css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{asset("backend")}}/img/logo.png">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
{{--    User css and js file--}}
    <link href="{{asset('backend')}}/adduser/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="{{asset('backend')}}/adduser/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="{{asset('backend')}}/adduser/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="{{asset('backend')}}/adduser/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{asset('backend')}}/adduser/css/main.css" rel="stylesheet" media="all">
    <script src="{{asset('backend')}}/adduser/vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="{{asset('backend')}}/adduser/vendor/select2/select2.min.js"></script>
    <script src="{{asset('backend')}}/adduser/vendor/datepicker/moment.min.js"></script>
    <script src="{{asset('backend')}}/adduser/vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="{{asset('backend')}}/adduser/js/global.js"></script>
    {{--end --}}
</head>

<body>
@include("backend.partials.header")
<div class="d-flex align-items-stretch" style="color: #0a0c0d">
    <!-- Sidebar Navigation-->
    @include("backend.partials.sidebar")
    <!-- Sidebar Navigation end-->
    <div class="page-content" style=" background: linear-gradient(90deg, hsla(52, 43%, 55%, 0.5) 0%, hsla(51, 33%, 75%, 0.5) 100%);">
        <div class="page-header" style=" background: linear-gradient(90deg, hsla(122, 19%, 30%, 0.5) 0%, hsla(170, 70%, 25%, 0.5) 100%);">
            <div class="container-fluid" >
                <h2 class="h5 no-margin-bottom" style=" font-family: Roboto, Arial, Helvetica Neue, sans-serif; color: #0e6c5e " >{{$title}}</h2>
            </div>
        </div>
        <div >
        <section class="no-padding-bottom">
        <div class="container-fluid" >
            @yield("page")
        </div>
        </section>
        </div>


        {{--footer start--}}
        @include("backend.partials.footer")
        {{--footer end--}}
    </div>
</div>
<!-- JavaScript files-->
<script src="{{asset("backend")}}/vendor/jquery/jquery.min.js"></script>
<script src="{{asset("backend")}}/vendor/popper.js/umd/popper.min.js"> </script>
<script src="{{asset("backend")}}/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="{{asset("backend")}}/vendor/jquery.cookie/jquery.cookie.js"> </script>
<script src="{{asset("backend")}}/vendor/chart.js/Chart.min.js"></script>
<script src="{{asset("backend")}}/vendor/jquery-validation/jquery.validate.min.js"></script>
<script src="{{asset("backend")}}/js/charts-home.js"></script>
<script src="{{asset("backend")}}/js/front.js"></script>
</body>
</html>
