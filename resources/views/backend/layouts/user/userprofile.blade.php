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
        </div>@endif  @if(session()->has('danger'))
        <div class="alert alert-success">
            {{ session()->get('danger') }}
        </div>@endif
    <div class="row">
        <div class="profile-nav col-md-3">
            <div class="panel">
                <div class="user-heading round">
                    <a href="#">
                        <img @if($userData->image!=null) src="{{url('image/users/',$userData->image)}}"@else src="https://bootdey.com/img/Content/avatar/avatar3.png" @endif alt="">
                    </a>
                    <h1>{{$userData->name}}</h1>
                    <p>{{$userData->role}}</p>
                </div>

                <ul class="nav nav-pills nav-stacked">
                    <li><a href="{{route('user.edit.profile.form')}}"> <i class="fa fa-edit"></i>Edit profile</a></li>
                </ul>
            </div>
        </div>
        <div class="profile-info col-md-9">

            <div class="panel">
                <div class="panel-body bio-graph-info">
                    <h1 style="display: inline-block">Bio Graph </h1><h1 style="display:inline-block;float:right">User status: @if($userData->verification=='not verified') <span style="background:red;color: whitesmoke">Not Verified</span><span><a
                                href="{{route('user.verification.form')}}">Request User verification</a></span> @elseif($userData->verification=='processing')<span style="background:red;color: whitesmoke">Not Verified</span> <span style="color: #0e6c5e">Processing</span> @else <span style="background:green;color: whitesmoke">Verified</span> @endif</h1>
                    <div class="row">
                        <div class="bio-row">
                            <p><span> Name: </span>: {{$userData->name}}</p>
                        </div>

                        <div class="bio-row">
                            <p><span> Email: </span>: {{$userData->email}}@if($userData->email_verified_at==null) <button class="btn-primary btn-success" style="background-color: #98F6FF"> Not Verified</button> <a style="padding-left: 5px;color: blue;background-color: whitesmoke"  href="{{route('send.verification.link')}}">verify</a> @else <span style="background-color: green; color: white">  Verified </span> @endif </p>
                        </div>
                        <div class="bio-row">
                            <p><span>Role: </span>: {{$userData->role}}</p>
                        </div>
                        <div class="bio-row">
                            <p><span>Address:</span>:@if($userData->address!=null) {{$userData->address}}@else N/A @endif </p>
                        </div>
                        <div class="bio-row">
                            <p><span>Contact:</span>: @if($userData->contact!=null) {{$userData->contact}}@else N/A @endif</p>
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
