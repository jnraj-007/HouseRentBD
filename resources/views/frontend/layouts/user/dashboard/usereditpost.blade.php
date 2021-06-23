
@extends('frontend.layouts.user.dashboard.userDashboardMaster')
@section('dashboard')
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    <div class="block-body">

                <form class="form-horizontal" method="post" action="{{route('update.post.submit',[$post->id])}}" enctype="multipart/form-data"  >
                    @csrf
                    @method('PUT')

                    <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Post Title</label>
                        <div class="col-sm-9">
                            <input type="text" value="{{$post->title}}" required name="post_title" class="form-control">
                        </div>
                    </div>
                    <div class="line"></div>
                    <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Select Category</label>
                        <div class="col-sm-9">

                            <select name="catId" required class="form-control mb-3 mb-3 dropdown-toggle">
                                @foreach($category as $cat)
                                    <option @if($post->categoryId==$cat->id) selected @endif value="{{$cat->id}}">{{$cat->title}}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>

                    <div class="line"></div>
                    <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Rent/month</label>
                        <div class="col-sm-9">
                            <div class="form-group">
                                <input type="number" required value="{{$post->rentAmount}}"  name="price" min="1" placeholder="enter rent amount" class="form-control form-control-lg">
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
                                        <option value="" > Select Rooms</option>
                                        <option @if($post->bedroom==1) selected @endif value="1">1</option>
                                        <option @if($post->bedroom==2) selected @endif value="2">2</option>
                                        <option @if($post->bedroom==3) selected @endif value="3">3</option>
                                        <option @if($post->bedroom==4) selected @endif value="4">4</option>
                                        <option @if($post->bedroom==5) selected @endif value="5">5</option>
                                        <option @if($post->bedroom==6) selected @endif value="6">6</option>
                                        <option @if($post->bedroom==7) selected @endif value="7">7</option>
                                        <option @if($post->bedroom==8) selected @endif value="8">8</option>
                                    </select>
                                </div>
                                <div class="col-md-3 from-group">
                                    <select name="bathroom" id="" required class="form-control table-hover">
                                        <option value="" >Select Bathroom</option>
                                        <option @if($post->bathroom==1) selected @endif value="1">1</option>
                                        <option @if($post->bathroom==2) selected @endif value="2">2</option>
                                        <option @if($post->bathroom==3) selected @endif value="3">3</option>
                                        <option @if($post->bathroom==4) selected @endif value="4">4</option>
                                        <option @if($post->bathroom==5) selected @endif value="5">5</option>
                                        <option @if($post->bathroom==6) selected @endif value="6">6</option>
                                        <option @if($post->bathroom==7) selected @endif value="7">7</option>
                                        <option @if($post->bathroom==8) selected @endif value="8">8</option>

                                    </select>
                                </div>
                                <div class="col-md-3 from-group" >
                                    <input class="form-control" value="{{$post->area}}" required name="area"  min="1" type="number" placeholder="enter area">
                                </div>

                                <div class="col-md-3 from-group" style="margin-left: -20px;padding-left: 0;">
                                    <select name="unit" id="" required class="form-control table-hover">
                                        {{--                                <option value="" >Unit</option>--}}
                                        <option @if($post->unit=="SQ FT") selected @endif  value="SQ FT" >SQ FOOT</option>
                                        <option @if($post->unit=="SQ Meter") selected @endif value="SQ Meter">SQ Meter</option>

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
                                        <option value="">Region</option>
                                        <option @if($post->region=="uttara") selected @endif  value="uttara">Uttara</option>
                                        <option @if($post->region=="mirpur") selected @endif  value="mirpur">Mirpur</option>
                                        <option @if($post->region=="gulshan") selected @endif  value="gulshan">Gulshan</option>
                                        <option @if($post->region=="bashundhara") selected @endif  value="bashundhara">Bashundhara</option>
                                        <option @if($post->region=="dhanmondi") selected @endif  value="dhanmondi">Dhanmondi</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <input class="form-control"  value="{{$post->sectorNo}}" required name="sectorNo" type="text" placeholder="enter sector no/block No">
                                </div>
                                <div class="col-md-3">
                                    <input type="text" placeholder="Road No"  value="{{$post->roadNo}}" required name="roadNo" class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <input type="text" placeholder="House No"  value="{{$post->houseNo}}" required name="houseNo" class="form-control">
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

                                <textarea class="form-control" required placeholder="enter the details of your flat" name="description" id="" > {{$post->description}}</textarea>

                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-9 ml-auto">

                            <button type="submit" class="btn btn-primary">Update Post</button>

                        </div>
                    </div>
                </form>

    </div>
    </div>

@endsection
