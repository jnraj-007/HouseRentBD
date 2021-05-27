@extends('frontend.layouts.user.dashboard.userDashboardMaster')
@section('dashboard')


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
    <div class="row">
        <div class="profile-nav col-md-3">
            <div class="panel">
                <div class="user-heading round">
                    <a href="#">
                        <img @if(auth('user')->user()->image!=null) src="{{url('image/users/',auth('user')->user()->image)}}"@else src="https://bootdey.com/img/Content/avatar/avatar3.png" @endif alt="">
                    </a>
                    <h1>{{auth('user')->user()->name}}</h1>
                    <p>{{auth('user')->user()->role}}</p>
                </div>

                <ul class="nav nav-pills nav-stacked">
                    <li><a href="{{route('user.edit.profile.form')}}"> <i class="fa fa-edit"></i>Edit profile</a></li>
                </ul>
            </div>
        </div>
        <div class="profile-info col-md-9">

            <div class="panel">
                <div class="panel-body bio-graph-info">
                    <h1>Bio Graph</h1>
                    <div class="row">
                        <div class="bio-row">
                            <p><span> Name: </span>: {{auth('user')->user()->name}}</p>
                        </div>

                        <div class="bio-row">
                            <p><span> Email: </span>: {{auth('user')->user()->email}} <button class="btn-primary btn-success">@if(auth('user')->user()->email_verified_at==null) Not Verified <a  href="">verify</a> @else  Verified @endif</button> </p>
                        </div>
                        <div class="bio-row">
                            <p><span>Role: </span>: {{auth('user')->user()->role}}</p>
                        </div>
                        <div class="bio-row">
                            <p><span>Address:</span>:@if(auth('user')->user()->address!=null) {{auth('user')->user()->address}}@else N/A @endif </p>
                        </div>
                        <div class="bio-row">
                            <p><span>Contact:</span>: @if(auth('user')->user()->contact!=null) {{auth('user')->user()->contact}}@else N/A @endif</p>
                        </div>
                    </div>
                </div>
            </div>
            <div>
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
