
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>House Rent BD</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('frontend')}}/userDashboard/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/userDashboard/assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/userDashboard/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{asset('frontend')}}/userDashboard/assets/images/favicon.ico" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('frontend')}}/master/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/master/css/animate.css">

    <link rel="stylesheet" href="{{asset('frontend')}}/master/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/master/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/master/css/magnific-popup.css">

    <link rel="stylesheet" href="{{asset('frontend')}}/master/css/aos.css">

    <link rel="stylesheet" href="{{asset('frontend')}}/master/css/ionicons.min.css">

    <link rel="stylesheet" href="{{asset('frontend')}}/master/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/master/css/jquery.timepicker.css">


    <link rel="stylesheet" href="{{asset('frontend')}}/master/css/flaticon.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/master/css/icomoon.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/master/css/style.css">

{{--    userprofile1 form css start--}}

    <link href="{{asset('backend')}}/adduser/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="{{asset('backend')}}/adduser/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="{{asset('backend')}}/adduser/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="{{asset('backend')}}/adduser/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{asset('backend')}}/adduser/css/main.css" rel="stylesheet" media="all">
{{--    userprofile1 form css end--}}


</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            <a class="navbar-brand brand-logo" href="{{route('user.dashboard')}}"><img src="{{asset('frontend')}}/userDashboard/assets/images/logo.svg" alt="logo" /></a>
            <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{asset('frontend')}}/userDashboard/assets/images/logo-mini.svg" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="mdi mdi-menu"></span>
            </button>
            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item nav-profile dropdown">
                    <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                        <div class="nav-profile-img">
                            <img src="{{asset('image')}}/users/{{auth('user')->user()->image}}" alt="image">
                            <span class="availability-status online"></span>
                        </div>
                        <div class="nav-profile-text">
                            <p class="mb-1 text-black">{{auth('user')->user()->name}}</p>
                        </div>
                    </a>
                    <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
{{--                        <div class="dropdown-divider"></div>--}}
                        <a class="dropdown-item" href="{{route('frontend.user.logout')}}">
                            <i class="mdi mdi-logout mr-2 text-primary"></i> Signout </a>
                    </div>
                </li>
                <li class="nav-item d-none d-lg-block full-screen-link">
                    <a class="nav-link">
                        <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
                    </a>
                </li>
{{--                <li class="nav-item dropdown">--}}
{{--                    <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">--}}
{{--                        <i class="mdi mdi-email-outline"></i>--}}
{{--                        <span class="count-symbol bg-warning"></span>--}}
{{--                    </a>--}}
{{--                </li>--}}
                @php
use \App\Models\Interest;
                    $interestPost =Interest::with(['userinterest','interestPosts'])->where('postAuthorId',auth('user')->user()->id)->
                    where('status','pending')->paginate('5');

                @endphp
                @php $purchase=\App\Models\Userpackage::where('userId',auth('user')->user()->id)->where(function ($query){
        $query->where('status','Approved')->orWhere('status','Disapprove');
})->orderBy('created_at','DESC')->paginate(2);
                @endphp

@php $response= \App\Models\Interest::with(['authordetails','interestPosts'])->where('userId',auth('user')->user()->id)->where('status','!=','pending')->paginate(3);

 @endphp
@if(count($interestPost)==null&&count($purchase)==null&&count($response)==null)
                <li class="nav-item dropdown">
                    <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                        <i class="mdi mdi-bell-outline"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                        <h6 class="p-3 mb-0"> No Notifications</h6></div></li>
                @else


                <li class="nav-item dropdown">
                    <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                        <i class="mdi mdi-bell-outline"></i>
                        <span class="count-symbol bg-danger"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">

                        @if($interestPost)
                        @foreach($interestPost as $interest)

                                <div class="dropdown-divider"></div>

                        <a class="dropdown-item preview-item" href='{{route('view.interested.users')}}'>
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-success">
                                    <i class="mdi mdi-calendar"></i>
                                </div>
                            </div>
                            <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                <h6 class="preview-subject font-weight-normal mb-1"></h6>
                                <p class="text-gray ellipsis mb-0"> {{ $interest->userinterest->name}} is interested your {{$interest->interestPosts->title}} post </p>
                            </div>
                        </a>
                        @endforeach
                        @endif


                         @if($purchase)
                            @foreach($purchase as $pur)
                            <div class="dropdown-divider"></div>

                            <a class="dropdown-item preview-item" href="{{route('user.package.view')}}">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-success">
                                        <i class="mdi mdi-calendar"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                    <h6 class="preview-subject font-weight-normal mb-1"></h6>
                                    <p class="text-gray ellipsis mb-0">your request for {{ $pur->packageName}} Purchase has  {{$pur->status}} </p>
                                </div>
                            </a>
                            @endforeach
                        @endif

                            @if($response)
                            @foreach($response as $pur)
                            <div class="dropdown-divider"></div>

                            <a class="dropdown-item preview-item" style="width: 400px" href="{{route('interested.posts')}}">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-success">
                                        <i class="mdi mdi-calendar"></i>
                                    </div>
                                </div>
                                <div class="d-flex align-items-start flex-column justify-content-center">
                                    <h6 class="preview-subject font-weight-normal mb-1"></h6>
                                    <p class="text-gray  mb-0">your Interest in {{$pur->interestPosts->title}} has  {{$pur->status}} </p>
                                </div>
                            </a>
                            @endforeach
                        @endif

                    </div>
                </li>
@endif





                <li class="nav-item nav-logout d-none d-lg-block">
                    <a class="nav-link" href="{{route('home.view')}}">
                        <i class="mdi mdi-power"></i>
                    </a>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                <span class="mdi mdi-menu"></span>
            </button>
        </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">



        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                <li class="nav-item nav-profile">
                    <a href="{{route('home.view')}}" class="nav-link">
                        <div class="nav-profile-image">
                            <img src="{{asset('frontend')}}/userDashboard/assets/images/faces/face1.jpg" alt="profile">
                            <span class="login-status online"></span>
                            <!--change to offline or busy as needed-->
                        </div>
                        <div class="nav-profile-text d-flex flex-column">
                            <span class="font-weight-bold mb-2">{{auth('user')->user()->name}}</span>
                            <span class="text-secondary text-small">{{auth('user')->user()->role}}</span>
                        </div>
                        <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('user.dashboard')}}">
                        <span class="menu-title">Dashboard</span>
                        <i class="mdi mdi-home menu-icon"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('frontend.user.profile')}}">
                        <span class="menu-title">Profile</span>
                        <i class="mdi mdi-contacts menu-icon"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('user.posts.view')}}">
                        <span class="menu-title">My Posts</span>
                        <i class="mdi mdi-format-list-bulleted menu-icon"></i>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('interested.posts')}}">
                        <span class="menu-title">Interested Posts</span>
                        <i class="mdi mdi-chart-bar menu-icon"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('view.interested.users')}}">
                        <span class="menu-title">Interested User</span>
                        <i class="mdi mdi-chart-bar menu-icon"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('user.package.view')}}">
                        <span class="menu-title">Packages</span>
                        <i class="mdi mdi-table-large menu-icon"></i>
                    </a>
                </li>
                <li class="nav-item sidebar-actions">
              <span class="nav-link">
                <div class="border-bottom">
                  <h6 class="font-weight-normal mb-3">Create Post</h6>
                </div>
                <a href="{{route('user.post.form')}}"><button class="btn btn-block btn-lg btn-gradient-primary mt-4">Create a Post</button></a>
              </span>
                </li>

            </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="page-header">
                    <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-home"></i>
                </span> Dashboard
                    </h3>
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">
                                <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                            </li>
                        </ul>
                    </nav>
                </div>

                @yield('dashboard')




{{--                <div class="row">--}}
{{--                    <div class="col-md-7 grid-margin stretch-card">--}}
{{--                        <div class="card">--}}
{{--            <!-- content-wrapper ends -->--}}
{{--            <!-- partial:partials/_footer.html -->--}}
{{--            <!-- partial -->--}}
{{--        </div>--}}
{{--        <!-- main-panel ends -->--}}
{{--    </div>--}}
{{--    <!-- page-body-wrapper ends -->--}}
{{--</div>--}}
</div>
</div>
</div>
</div>
@php
    $updateuserpackage=\App\Models\Userpackage::where('userId',auth('user')->user()->id)->where('numberOfPosts','=',0)->update(['current_package_status'=>'expired', 'status'=>'expired']);

    @endphp





<!-- container-scroller -->
<!-- plugins:js -->
<script src="{{asset('frontend')}}/userDashboard/assets/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="{{asset('frontend')}}/userDashboard/assets/vendors/chart.js/Chart.min.js"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{asset('frontend')}}/userDashboard/assets/js/off-canvas.js"></script>
<script src="{{asset('frontend')}}/userDashboard/assets/js/hoverable-collapse.js"></script>
<script src="{{asset('frontend')}}/userDashboard/assets/js/misc.js"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="{{asset('frontend')}}/userDashboard/assets/js/dashboard.js"></script>
<script src="{{asset('frontend')}}/userDashboard/assets/js/todolist.js"></script>
                <script src="{{asset('frontend')}}/master/js/jquery.min.js"></script>
                <script src="{{asset('frontend')}}/master/js/jquery-migrate-3.0.1.min.js"></script>
                <script src="{{asset('frontend')}}/master/js/popper.min.js"></script>
                <script src="{{asset('frontend')}}/master/js/bootstrap.min.js"></script>
                <script src="{{asset('frontend')}}/master/js/jquery.easing.1.3.js"></script>
                <script src="{{asset('frontend')}}/master/js/jquery.waypoints.min.js"></script>
                <script src="{{asset('frontend')}}/master/js/jquery.stellar.min.js"></script>
                <script src="{{asset('frontend')}}/master/js/owl.carousel.min.js"></script>
                <script src="{{asset('frontend')}}/master/js/jquery.magnific-popup.min.js"></script>
                <script src="{{asset('frontend')}}/master/js/aos.js"></script>
                <script src="{{asset('frontend')}}/master/js/jquery.animateNumber.min.js"></script>
                <script src="{{asset('frontend')}}/master/js/bootstrap-datepicker.js"></script>
                <script src="{{asset('frontend')}}/master/js/jquery.timepicker.min.js"></script>
                <script src="{{asset('frontend')}}/master/js/scrollax.min.js"></script>
                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
                <script src="{{asset('frontend')}}/master/js/google-map.js"></script>
                <script src="{{asset('frontend')}}/master/js/main.js"></script>
<!-- End custom js for this page -->
{{--user profile js start--}}
<script src="{{asset('backend')}}/adduser/vendor/jquery/jquery.min.js"></script>
<!-- Vendor JS-->
<script src="{{asset('backend')}}/adduser/vendor/select2/select2.min.js"></script>
<script src="{{asset('backend')}}/adduser/vendor/datepicker/moment.min.js"></script>
<script src="{{asset('backend')}}/adduser/vendor/datepicker/daterangepicker.js"></script>

<!-- Main JS-->
<script src="{{asset('backend')}}/adduser/js/global.js"></script>
{{--user profile js end--}}



 </body>
</html>
