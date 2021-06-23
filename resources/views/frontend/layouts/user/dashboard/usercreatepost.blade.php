
@extends('frontend.layouts.user.dashboard.userDashboardMaster')
@section('dashboard')
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    <div class="block-body">

{{--        @dd($isExist)--}}
        @if(auth('user')->user()->verification!="verified")
            <h1>For posting you have to veriry your profile <strong><a href="{{route('frontend.user.profile')}}">Verify</a></strong></h1>
        @else

        @if($isExist)
            <h1>For posting you have to purchase a <strong>Package</strong></h1>

        @else

        <form class="form-horizontal" method="post" action="{{route('user.create.post')}}" enctype="multipart/form-data"  >
            @csrf

            <div class="form-group row">
                <label class="col-sm-3 form-control-label">Post Title</label>
                <div class="col-sm-9">
                    <input type="text" required name="post_title" class="form-control">
                </div>
            </div>
            <div class="line"></div>
            <div class="form-group row">
                <label class="col-sm-3 form-control-label">Select Category</label>
                <div class="col-sm-9">

                    <select name="catId" required class="form-control mb-3 mb-3 dropdown-toggle">
                        @foreach($category as $cat)
                            <option value="{{$cat->id}}">{{$cat->title}}</option>
                        @endforeach
                    </select>


                </div>
            </div>

            <div class="line"></div>
            <div class="form-group row">
                <label class="col-sm-3 form-control-label">Rent/month</label>
                <div class="col-sm-9">
                    <div class="form-group">
                        <input type="number" required  name="price" min="1" placeholder="enter rent amount" class="form-control form-control-lg">
                    </div>
                </div>
            </div>
            <div class="line"></div>
            <div class="form-group row input-group-prepend">
                <label class="col-sm-3 form-control-label">Details</label>
                <div class="col-sm-9">
                    <div class="row">
                        <div class="col-md-3 from-group">
                            <select name="bed" id="" required class="form-control table-hover">
                                <option value="" selected> Select Rooms</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                            </select>
                        </div>
                        <div class="col-md-3 from-group">
                            <select name="bathroom" id="" required class="form-control table-hover">
                                <option value="" selected>Select Bathroom</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>

                            </select>
                        </div>
                        <div class="col-md-3 from-group" >
                            <input class="form-control" required name="area"  min="1" type="number" placeholder="enter area">
                        </div>

                        <div class="col-md-3 from-group" style="margin-left: -20px;padding-left: 0;">
                            <select name="unit" id="" required class="form-control table-hover">
{{--                                <option value="" >Unit</option>--}}
                                <option value="SQ FT" selected>SQ FOOT</option>
                                <option value="SQ Meter">SQ Meter</option>

                            </select>
                        </div>


                    </div>
                </div>
            </div>

            <div class="line"></div>
            <div class="form-group row input-group-prepend">
                <label class="col-sm-3 form-control-label">Address</label>
                <div class="col-sm-9">
                    <div class="row">
                        <div class="col-md-3 from-group">
                            <select name="region" id="" required class="form-control table-hover">
                                <option value="" selected>Region</option>
                                <option value="uttara">Uttara</option>
                              <option  value="mirpur">Mirpur</option>
                              <option  value="gulshan">Gulshan</option>
                               <option value="bashundhara">Bashundhara</option>
                               <option value="dhanmondi">Dhanmondi</option>

                            </select>
                        </div>
                        <div class="col-md-3">
                            <input class="form-control"  required name="sectorNo" type="text" placeholder="enter sector/block No">
                        </div>
                        <div class="col-md-3">
                            <input type="text" placeholder="Road No" required name="roadNo" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <input type="text" placeholder="House No" required name="houseNo" class="form-control">
                        </div>

                    </div>
                </div>
            </div>

            <div class="line"></div>
            <div class="form-group row">
                <label class="col-sm-3 form-control-label">Photos</label>
                <div class="col-sm-9">

                    <input type="file" name="postimage" required  class="form-control form-control-lg">
                </div>
            </div>

            <div class="line"></div>
            <div class="form-group row">
                <label class="col-sm-3 form-control-label">Description</label>
                <div class="col-sm-9">
                    <div class="input-group">

                        <textarea class="form-control" required placeholder="enter the details of your flat" name="description" id="" ></textarea>

                    </div>
                </div>
            </div>


{{--            <div class="line"></div>--}}
{{--            <div class="form-group row input-group-prepend">--}}
{{--                <label class="col-sm-3 form-control-label">Location</label>--}}
{{--                <div class="col-sm-9">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-md-3">--}}
{{--                            <input class="form-control" required name="latitude" type="text" placeholder="latitude">--}}
{{--                        </div>--}}
{{--                        <div class="col-md-3">--}}
{{--                            <input type="text" placeholder="longitude" required name="longitude" class="form-control">--}}
{{--                        </div>--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}



            <div class="form-group row">
                <div class="col-sm-9 ml-auto">

                    <button type="submit" class="btn btn-primary">Create Post</button>

                </div>
            </div>
        </form>
        @endif
            @endif
    </div>
    </div>

@endsection
