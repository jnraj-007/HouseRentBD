@extends('frontend.layouts.user.dashboard.userDashboardMaster')
@section('dashboard')




    <section class="bg-blue-gradient  ">
        <div class="container">
            <div class="row">

                <h1 ><span style="background-color: palegreen;">Request Table</span></h1>

                <br>
                <br>

                <h>  @if(session()->has('success'))
                        <div class="alert alert-danger">
                            {{ session()->get('success') }}
                        </div>@endif</h>

                <table  class="table  table-bordered table-hover">
                    <thead>

                    <th>Author Name</th>
                    <th>Post Title</th>
                    <th>Remarks</th>
                    <th>Request Date</th>
                    <th>My Contact</th>
                    <th>Author Contact</th>
                    <th>status</th>
                    <th>Action</th>
                    </thead>
                    <tbody>


                    @foreach($interestedPosts as $interests)


                        <tr>
                            <td>{{$interests->interestPosts->authorName}} </td>
                            <td>{{$interests->interestPosts->title}} </td>
                            <td>{{$interests->remarks}} </td>
                            <td>{{$interests->created_at}} </td>
                            <td>@if(!auth('user')->user()->contact) Pleas add you contact
                                @else {{auth('user')->user()->contact}}
                                @endif </td>
                            <td>@if($interests->status=='pending'||$interests->status=='Disapproved')
                                                    You will get Author contact,if approved @else{{$interests->postAuthorContact}}
                                                @endif</td>
                            </td>
                            <td> {{$interests->status}} </td>

                            <td> <a style="font-size: 10px; padding: 0 5px" class="btn btn-info" href="{{route('frontend.view.single.post',$interests->postId)}}">View Post</a>
                            @if($interests->status=='pending')
                                <a class="btn btn-danger" style="font-size: 10px; padding: 0 5px"  href="{{route('delete.request',$interests->id)}}">Delete</a>

                                    @endif

                            </td>
                        </tr>
                    @endforeach

                    </tbody>

                </table>
                {{$interestedPosts->links()}}

            </div>
            <br><br>
            <div class="row">

                <h1 style="background-color: green">Approved Request Table</h1>

                <table class="table  table-bordered table-hover  ">
                    <thead>

                    <th>Author Name</th>
                    <th>Post Title</th>
                    <th>Remarks</th>
                    <th>Request Date</th>
                    <th>My Contact</th>
                    <th>Author Contact</th>
                    <th>status</th>
                    <th>Action</th>
                    </thead>
                    <tbody>


                    @foreach($interestedPo as $inter)


                        <tr>
                            <td>{{$inter->interestPosts->authorName}} </td>
                            <td>{{$inter->interestPosts->title}} </td>
                            <td>{{$inter->remarks}} </td>
                            <td>{{$inter->created_at}} </td>
                            <td>@if(!auth('user')->user()->contact) Pleas add you contact
                                @else {{auth('user')->user()->contact}}
                                @endif </td>
                            <td>@if($inter->status=='pending'||$inter->status=='Disapproved')
                                    You will get Author contact,if approved @else{{$inter->postAuthorContact}}
                                @endif</td>
                            </td>
                            <td> {{$inter->status}} </td>

                            <td> <a class="btn btn-info" style="font-size: 10px; padding: 0 5px"  href="{{route('frontend.view.single.post',$inter->id)}}">View Post</a>
                                    <a class="btn-sm btn-primary" style="color: white"  href="{{route('frontend.message.form',[$inter->postId,$inter->postAuthorId])}}">Message</a>

                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                {{$interestedPo->links()}}
            </div>

            <br><br>
            <div class="row">

                <h1 style="background-color: red">Disapproved Request Table</h1>
                <br>

                <table class="table  table-bordered table-hover  ">
                    <thead>

                    <th>Author Name</th>
                    <th>Post Title</th>
                    <th>Remarks</th>
                    <th>Request Date</th>
                    <th>My Contact</th>
                    <th>Author Contact</th>
                    <th>status</th>
                    <th>Action</th>
                    </thead>
                    <tbody>


                    @foreach($interestedPost as $interests)


                        <tr>
                            <td>{{$interests->interestPosts->authorName}} </td>
                            <td>{{$interests->interestPosts->title}} </td>
                            <td>{{$interests->remarks}} </td>
                            <td>{{$interests->created_at}} </td>
                            <td>@if(!auth('user')->user()->contact) Pleas add you contact
                                @else {{auth('user')->user()->contact}}
                                @endif </td>
                            <td>@if($interests->status=='pending'||$interests->status=='Disapproved')
                                    You will get Author contact,if approved @else{{$interests->postAuthorContact}}
                                @endif</td>
                            </td>
                            <td> {{$interests->status}} </td>

                            <td> <a class="btn btn-info" style="font-size: 10px; padding: 0 5px"  href="{{route('frontend.view.single.post',$interests->id)}}">View Post</a>
                                @if($interests->status=='pending')


                                @endif

                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                {{$interestedPost->links()}}
            </div>


        </div>


    </section>
@endsection

{{--for showing interested  posts  using pluk() function for post "ids" --}}
{{--                @foreach($posts as $data)--}}
{{--                    <div class="col-md-4 ftco-animate">--}}
{{--                        <div class="properties">--}}
{{--                            <a href="{{route('frontend.view.single.post',$data->id)}}" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url('{{asset('image')}}/posts/{{$data->image}}')">--}}
{{--                            <div class="icon d-flex justify-content-center align-items-center">--}}
{{--                                <span class="icon-search2"></span>--}}
{{--                            </div>--}}
{{--                            </a>--}}
{{--                            <div class="text p-3">--}}
{{--                                <span class="status sale">Rent</span>--}}
{{--                                <div class="d-flex">--}}
{{--                                    <div class="one">--}}
{{--                                        <h3><a href="property-single.html"></a></h3>--}}
{{--                                        <p>{{$data->title}}</p>--}}
{{--                                    </div>--}}
{{--                                    <div class="two">--}}
{{--                                        <span class="price">{{$data->rentAmount}}</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <p>{{$data->description}}</p>--}}
{{--                                <hr>--}}
{{--                                <p class="bottom-area d-flex">--}}
{{--                                    <span><i class="flaticon-selection"></i> 250sqft</span>--}}
{{--                                                                    <span style="padding-left:50px"><a href="" class="btn btn-success">Interest</a> </span>--}}

{{--                                    <span class="ml-auto"><i class="flaticon-bathtub"></i> 3</span>--}}
{{--                                    <span><i class="flaticon-bed"></i> 4</span>--}}
{{--                                </p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endforeach--}}

{{--            </div>--}}
{{--        </div>--}}
