@extends('frontend.layouts.user.dashboard.userDashboardMaster')
@section('dashboard')



    <div class="card card-5  bg-blue-gradient">
        <div class="card-body ">
            <form action="{{route('submit.for.verification')}}" method="post" enctype="multipart/form-data">
                @csrf
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">{{$error}}</div>
                    @endforeach
                @endif

                <div class="form-row">
                    <div class="name" style="color: white">Name</div>
                    <div class="value">
                        <div class="input-group">
                            <input class="input--style-5" placeholder="Enter Your Name" value="{{auth('user')->user()->name}}" required type="text" name="name">
                        </div>
                    </div>
                </div>
                <div class="form-row">

                    <div class="name" style="color: white">User NId Number</div>
                    <div class="value">
                        <div class="input-group">
                            <input class="input--style-5" min="1"  placeholder="Enter NId Number" maxlength="10" minlength="10"  required type="number" name="nIdNumber">
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="name" style="color: white">User Photo</div>
                    <div class="value">
                        <div class="input-group">
                            <input class="input--style-5"  required type="file" name="photo">
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="name" style="color: white">NId Front Photo</div>
                    <div class="value">
                        <div class="input-group">
                            <input class="input--style-5"  required type="file" name="frontNId">
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="name" style="color: white">NId Back Photo</div>
                    <div class="value">
                        <div class="input-group">
                            <input class="input--style-5"   required  type="file" name="backNId">
                        </div>
                    </div>
                </div>
                <div class="form-row m-b-55">
                    <div class="name"style="color: white">Phone</div>
                    <div class="value">
                        <div class="row row-refine">
                            <div class="col-3">
                                <div class="input-group-desc">
                                    <h1  class="input--style-5"> + 88</h1>
                                </div>
                            </div>
                            <div class="col-9">
                                <div class="input-group-desc">
                                    <input class="input--style-5" placeholder="Enter Contact No" min="1" minlength="11" maxlength="11" required type="number" name="contact">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <button class="btn btn--radius-2 btn--red" type="submit">Submit for verification</button>
                </div>
            </form>
        </div>
    </div>
@endsection
