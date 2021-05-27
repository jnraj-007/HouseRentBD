@extends('frontend.layouts.user.dashboard.userDashboardMaster')
@section('dashboard')



                    <div class="card card-5  bg-blue-gradient">
                        <div class="card-body ">
                            <form action="{{route('user.profile.update')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <div class="alert alert-danger">{{$error}}</div>
                                    @endforeach
                                @endif
                                <div class="form-row">
                                    <div class="name" style="color: white">Name</div>
                                    <div class="value">
                                        <div class="input-group">
                                            <input class="input--style-5" placeholder="{{auth('user')->user()->name}}" required type="text" name="name">
                                            <input class="input--style-5" hidden required type="email" value="{{auth('user')->user()->email}}"  name="email">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="name" style="color: white">Address</div>
                                    <div class="value">
                                        <div class="input-group">
                                            <input class="input--style-5" @if(auth('user')->user()->address!=null) placeholder="{{auth('user')->user()->address}}"@else placeholder="N/A"@endif required type="text" name="address">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="name" style="color: white">Photo</div>
                                    <div class="value">
                                        <div class="input-group">
                                            <input class="input--style-5" @if(auth('user')->user()->image!=null)placeholder="{{auth('user')->user()->image}}"@else placeholder="N/A" @endif  required required type="file" name="photo">
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
                                                    <input class="input--style-5" placeholder="{{auth('user')->user()->contact}}" required type="number" name="contact">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="name"style="color: white">Old Password</div>
                                    <div class="value">
                                        <div class="input-group">
                                            @if(session()->has('success'))
                                                <div class="alert alert-danger">
                                                    {{ session()->get('success') }}
                                                </div>@endif
                                            <input class="input--style-5" required type="password" name="password">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="name"style="color: white">New Password</div>
                                    <div class="value">
                                        <div class="input-group">
                                            <input class="input--style-5" required type="password" name="newPassword">
                                        </div>
                                    </div>d
                                </div>
                                <div class="form-row">
                                    <div class="name"style="color: white; ">Role</div>
                                    <div class="value">
                                        <div class="input-group">
                                            <div class="rs-select2 js-select-simple select--no-search">

                                                <div class="select-dropdown">
                                                    <select name="role"  required >
                                                        <option style="color: white; background:grey" selected="selected"  value="Tenant">Tenant</option>
                                                        <option style="color: white; background:grey" value="Owner">Owner</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div>
                                    <button class="btn btn--radius-2 btn--red" type="submit">Update Profile</button>
                                </div>
                            </form>
                        </div>
                    </div>
@endsection
