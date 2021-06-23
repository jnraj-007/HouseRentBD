@extends('frontend.app')
@section('area')
@include('frontend.partials.loginRegistration.header')
<body>
<div class="login-page">
    <div class="container d-flex align-items-center">
    <div class="container d-flex align-items-center">
        <div class="form-holder has-shadow" >
            <div class="row" >
                <!-- Logo & Information Panel-->
                <div class="col-lg-6">
                    <div class="info d-flex align-items-center" style="background-color: rgba(217, 244, 215, 0.5)" >
                        <div class="content" >
                            <div class="logo">
                                <h1>Registration</h1>
                            </div>
                            <p>Do registration</p>
                        </div>
                    </div>
                </div>
                <!-- Form Panel    -->
                <div class="col-lg-6 ">
                    <div class="form d-flex align-items-center" style="background-color: rgba(255,255,255,0.5)">
                        <div class="content">
                            @if(session()->has('success'))
                                <div class="alert alert-success">
                                    {{ session()->get('success') }}
                                </div>
                            @endif

                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger">{{$error}}</div>
                                @endforeach
                            @endif
                            <form class="text-left form-validate" method="post" action="{{route('frontend.do.user.reg')}}">
                                @csrf
                                <div class="form-group-material">
                                    <label for="register-username" class="label-material">Username</label>
                                    <input id="register-username" type="text" name="name" required data-msg="Please enter your name"  class="input-material">
                                </div>
                                <div class="form-group-material">
                                    <label for="register-email" class="label-material">Email Address      </label>
                                    <input id="register-email" type="email" name="email" required data-msg="Please enter a valid email address" class="input-material">
                                </div>
                                <div class="form-group-material">
                                    <label for="register-password" class="label-material">Password        </label>
                                    <input id="register-password" type="password" name="password" required data-msg="Please enter your password" class="input-material">
                                </div>

                                <div class="form-group text-center">
                                    <input id="register" type="submit" value="Register" class="btn btn-primary">
                                </div>
                            </form><small>Already have an account? </small><a href="{{route('frontend.login.form')}}" class="signup">Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    @include('frontend.partials.loginRegistration.footer')
@endsection
