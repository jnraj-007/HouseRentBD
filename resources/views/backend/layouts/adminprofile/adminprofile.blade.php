@extends('welcome')
@section('page')


    <!DOCTYPE html>
<html>
<head>
    <title>PROFILE</title>



    <link rel="stylesheet" href="{{asset('frontend')}}/Userprofile/custom.css">

    <link rel="stylesheet" href="{{asset('frontend')}}/Userprofile/font-awesome.min.css">
    {{--    <link rel="stylesheet" href="{{asset('frontend')}}/Userprofile/bootstrap.min.css">--}}


</head>

<body>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container" style="background:ghostwhite">
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>@endif

        @if(session()->has('danger'))
        <div class="alert alert-danger">
            {{ session()->get('danger') }}
        </div>@endif
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">{{$error}}</div>
            @endforeach
        @endif

    <div class="row">
        <div class="profile-nav col-md-3">
            <div class="panel">
                <div class="user-heading round">
                    <a href="#">
                        <img  src="{{url('image/admins/',auth('admin')->user()->image)}}" alt="">
                    </a>
                    <h1>{{$admin->name}}</h1>
                    <p>{{$admin->role}}</p>
                </div>

{{-- --}}
            </div>
        </div>
        <div class="profile-info col-md-9">

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">User Profile</h4>
                            <!-- Nav tabs -->
                            <div class="default-tab">
                                <ul class="nav nav-tabs mb-3" role="tablist">
                                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#message">Bio Graph</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link " data-toggle="tab" href="#home">Update Profile</a>
                                    {{--                                            </li>--}}
                                    {{--                                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#profile">Profile</a>--}}
                                    {{--                                            </li>--}}
                                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#contact">Update password</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#photo">Update Profile Photo</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade" id="home" role="tabpanel">
                                        <!DOCTYPE html>
                                        <html lang="en">

                                        <head>
                                            <!-- Required meta tags-->
                                            <meta charset="UTF-8">
                                            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                                            <meta name="description" content="Colorlib Templates">
                                            <meta name="author" content="Colorlib">
                                            <meta name="keywords" content="Colorlib Templates">

                                            <!-- Title Page-->

                                            <!-- Icons font CSS-->
                                            <link href="{{asset('backend')}}/adminprofile/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
                                            <link href="{{asset('backend')}}/adminprofile/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
                                            <!-- Font special for pages-->
                                            <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

                                            <!-- Vendor CSS-->
                                            <link href="{{asset('backend')}}/adminprofile/vendor/select2/select2.min.css" rel="stylesheet" media="all">
                                            <link href="{{asset('backend')}}/adminprofile/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

                                            <!-- Main CSS-->
                                            <link href="{{asset('backend')}}/adminprofile/css/main.css" rel="stylesheet" media="all">
                                        </head>

                                        <body>
                                        {{--                                                <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">--}}
                                        <div class="wrapper wrapper--w790">
                                            <div class="card card-5">


                                                @if(session()->has('success'))

                                                    <div class="alert alert-success">
                                                        {{ session()->get('success') }}
                                                    </div>
                                                @endif

                                                @if(session()->has('danger'))

                                                    <div class="alert alert-danger">
                                                        {{ session()->get('danger') }}
                                                    </div>
                                                @endif
                                                    @if ($errors->any())
                                                        @foreach ($errors->all() as $error)
                                                            <div class="alert alert-danger">{{$error}}</div>
                                                        @endforeach
                                                    @endif

                                                <div class="card-body">
                                                    <form action="{{route('update.admin.profile',$admin->id)}}" method="post" >
                                                        @method('PUT')
                                                        @csrf
                                                        <div class="form-row m-b-55">
                                                            <div class="name">User Name</div>&nbsp;
                                                            <div class="value">
                                                                <div class="row row-space">
                                                                    <div class="col-12">
                                                                        <div class="input-group-desc">
                                                                            <input required class="input--style-5" type="text" @if(auth('admin')->user()->role!='superAdmin') readonly @endif value="{{$admin->name}}" name="name" placeholder="Your current username is {{$admin->name}} ">
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>

                                                        <input type="text" hidden name="email" value="{{$admin->email}}">

                                                        <div class="form-row">
                                                            <div class="name">Address</div>&nbsp;
                                                            <div class="value">
                                                                <div class="input-group">
                                                                    <input required class="input--style-5" type="text" name="address" placeholder="Your current address  {{$admin->address}}">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-row">
                                                            <div class="name">Password</div>&nbsp;
                                                            <div class="value">
                                                                <div class="input-group">
                                                                    <input required class="input--style-5" type="password" name="password" placeholder="Enter current Password">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div>
                                                            <button class="btn btn--radius-2 btn--red" type="submit">Update Profile</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        {{--                                                </div>--}}

                                        <!-- Jquery JS-->
                                        <script src="{{asset('backend')}}/adminprofile/vendor/jquery/jquery.min.js"></script>
                                        <!-- Vendor JS-->
                                        <script src="{{asset('backend')}}/adminprofile/vendor/select2/select2.min.js"></script>
                                        <script src="{{asset('backend')}}/adminprofile/vendor/datepicker/moment.min.js"></script>
                                        <script src="{{asset('backend')}}/adminprofile/vendor/datepicker/daterangepicker.js"></script>

                                        <!-- Main JS-->
                                        <script src="{{asset('backend')}}/adminprofile/js/global.js"></script>

                                        </body><!-- This templates was made by Colorlib (https://colorlib.com) -->

                                        </html>
                                    </div>
                                    {{--                                            <div class="tab-pane fade" id="profile">--}}
                                    {{--                                                <div class="p-t-15">--}}
                                    {{--                                                    <h4>This is profile title</h4>--}}
                                    {{--                                                    <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor.</p>--}}
                                    {{--                                                    <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor.</p>--}}
                                    {{--                                                </div>--}}
                                    {{--                                            </div>--}}
                                    <div class="tab-pane fade" id="contact">
                                        <div class="p-t-15">

                                            <div class="wrapper wrapper--w790">
                                                <div class="card card-5">


                                                    @if(session()->has('successwallet'))

                                                        <div class="alert alert-success">
                                                            {{ session()->get('successwallet') }}
                                                        </div>
                                                    @endif

                                                    @if(session()->has('CanceledWallet'))

                                                        <div class="alert alert-danger">
                                                            {{ session()->get('CanceledWallet') }}
                                                        </div>
                                                    @endif

                                                    <div class="card-body">
                                                        <form action="{{route('update.admin.password',$admin->id)}}" method="post" >
                                                            @method('PUT')
                                                            @csrf
                                                            <center>

                                                                <div class="name"><h2>Enter Old Password</h2></div>&nbsp;
                                                                <div class="value">
                                                                    <div class="row row-space">
                                                                        <div class="col-12">
                                                                            <div class="input-group-desc">
                                                                                <input type="email" hidden required value="{{$admin->email}}">
                                                                                <input required class="input--style-5" value="" type="text" name="password" placeholder="Enter old password">
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <input type="text" hidden name="email" value="{{$admin->email}}">

                                                                <div class="name"><h2>Re-enter New Password</h2></div>&nbsp;
                                                                <div class="value">
                                                                    <div class="row row-space">
                                                                        <div class="col-12">
                                                                            <div class="input-group-desc">
                                                                                <input required class="input--style-5"  type="password" name="newPassword1" placeholder="Re-enter new password ">
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>


                                                                <div class="name"><h2>Enter New Password</h2></div>&nbsp;
                                                                <div class="value">
                                                                    <div class="row row-space">
                                                                        <div class="col-12">
                                                                            <div class="input-group-desc">
                                                                                <input required class="input--style-5"  type="password" name="newPassword2" placeholder="Enter new password ">
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <br>
                                                            </center>




                                                            <div>
                                                                <center><button class="btn btn--radius-2 btn--red" type="submit">Update Password</button></center>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        {{--                                                </div>--}}

                                        <!-- Jquery JS-->
                                            <script src="{{asset('backend')}}/adminprofile/vendor/jquery/jquery.min.js"></script>
                                            <!-- Vendor JS-->
                                            <script src="{{asset('backend')}}/adminprofile/vendor/select2/select2.min.js"></script>
                                            <script src="{{asset('backend')}}/adminprofile/vendor/datepicker/moment.min.js"></script>
                                            <script src="{{asset('backend')}}/adminprofile/vendor/datepicker/daterangepicker.js"></script>

                                            <!-- Main JS-->
                                            <script src="{{asset('backend')}}/adminprofile/js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>

</div>
</div>

<div class="tab-pane fade" id="photo">
    <div class="p-t-15">

        <div class="wrapper wrapper--w790">
            <div class="card card-5">


                @if(session()->has('successPhoto'))

                    <div class="alert alert-success">
                        {{ session()->get('successPhoto') }}
                    </div>
                @endif

                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <center>

                            <div class="name"><h2>Upload Photo:</h2></div>&nbsp;
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-12">
                                        <div class="input-group-desc">
                                            <input required class="input--style-5" type="file" name="image" >
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <br>
                        </center>

                        <div>
                            <center><button class="btn btn--radius-2 btn--red" type="submit">Update Photo</button></center>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    {{--                                                </div>--}}

    <!-- Jquery JS-->
        <script src="{{asset('backend')}}/adminprofile/vendor/jquery/jquery.min.js"></script>
        <!-- Vendor JS-->
        <script src="{{asset('backend')}}/adminprofile/vendor/select2/select2.min.js"></script>
        <script src="{{asset('backend')}}/adminprofile/vendor/datepicker/moment.min.js"></script>
        <script src="{{asset('backend')}}/adminprofile/vendor/datepicker/daterangepicker.js"></script>

        <!-- Main JS-->
        <script src="{{asset('backend')}}/adminprofile/js/global.js"></script>

        </body><!-- This templates was made by Colorlib (https://colorlib.com) -->

        </html>

    </div>
</div>


<div class="tab-pane fade show active" id="message">
    <div class="p-t-15">

            <div class="panel">
                <div class="panel-body bio-graph-info">
                    <div class="row">
                        <div class="bio-row">
                            <p><span> Name: </span>: {{$admin->name}}</p>
                        </div>

                        <div class="bio-row">
                            <p><span> Email: </span>: {{$admin->email}} </p>
                        </div>
                        <div class="bio-row">
                            <p><span>Role: </span>: {{$admin->role}}</p>
                        </div>
                        <div class="bio-row">
                            <p><span>Address:</span>: {{$admin->address}} </p>
                        </div>
                        <div class="bio-row">
                            <p><span>Contact:</span>: @if($admin->contact!=null) {{$admin->contact}}@else N/A @endif</p>
                        </div>
                    </div>
                </div>
            </div>


    </div>
</div>
</div>
</div>
</div>
</div>
</div>





</div>

        </div>
    </div>

</div>
</body>
<footer>
    <script src="{{asset('frontend')}}/Userprofile/bootstrap.min.js"></script>
    <script src="{{asset('frontend')}}/Userprofile/min.js"></script>


</footer>
</html>
@endsection
{{--<div class="panel">--}}
{{--    <div class="panel-body bio-graph-info">--}}
{{--        <h1 style="display: inline-block">Bio Graph </h1>--}}
{{--        <div class="row">--}}
{{--            <div class="bio-row">--}}
{{--                <p><span> Name: </span>: {{auth('admin')->user()->name}}</p>--}}
{{--            </div>--}}

{{--            <div class="bio-row">--}}
{{--                <p><span> Email: </span>: {{auth('admin')->user()->email}} </p>--}}
{{--            </div>--}}
{{--            <div class="bio-row">--}}
{{--                <p><span>Role: </span>: {{auth('admin')->user()->role}}</p>--}}
{{--            </div>--}}
{{--            <div class="bio-row">--}}
{{--                <p><span>Address:</span>: {{auth('admin')->user()->address}} </p>--}}
{{--            </div>--}}
{{--            <div class="bio-row">--}}
{{--                <p><span>Contact:</span>: @if(auth('admin')->user()->contact!=null) {{auth('admin')->user()->contact}}@else N/A @endif</p>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
