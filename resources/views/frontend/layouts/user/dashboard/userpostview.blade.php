@extends('frontend.layouts.user.dashboard.userDashboardMaster')
@section('dashboard')

    <section class=" ">
        <div class="container">
            <div class="row">

                <h1 ><span style="background-color: palegreen;">My Posts Table</span></h1>

                <br>
                <br>

                <h>  @if(session()->has('success'))
                        <div class="alert alert-danger">
                            {{ session()->get('success') }}
                        </div>@endif</h>

                <table  class="table table-hover table-striped  tasks-table  ">
                    <thead>
                    <th>Post Title</th>
                    <th>Post Image</th>
                    <th>Price</th>
                    <th>Location</th>
                    <th>Created Date</th>
                    <th>Expire Date</th>
                    <th>status</th>
                    <th>Action</th>
                    </thead>
                    <tbody>


                       @foreach($posts as $data)


                        <tr>

                            <td>{{$data->title}} </td>
                            <td ><img width="100px"  src="{{url('/image/posts/',$data->image)}}" alt=""> </td>
                            <td>{{$data->rentAmount}} </td>
                            <td >{{$data->region}}</td>
                            <td>{{$data->created_at}}</td>
                            <td>{{$data->expire_at}}</td>
                            <td> {{$data->status}} </td>

                            <td> <a style="font-size: 10px; padding: 0 5px" class="btn btn-info" href="{{route('frontend.view.single.post',$data->id)}}">View Post</a>
                                @if($data->status=='Active')
                                    <a class="btn btn-danger" style="font-size: 10px; padding: 0 5px"  href="{{route('front.delete.user.post',$data->id)}}">Delete</a>

                                @endif

                            </td>
                        </tr>
                    @endforeach

                    </tbody>

                </table>
                {{$posts->links()}}

            </div>
        </div>
    </section>
{{--    <section class="ftco-section bg-light">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                @foreach($posts as $data)--}}
{{--                    <div class="col-md-4 ftco-animate">--}}
{{--                        <div class="properties">--}}
{{--                            <a href="{{route('frontend.view.single.post',$data->id)}}" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url('{{asset('image')}}/posts/{{$data->image}}')">--}}
{{--                                <div class="icon d-flex justify-content-center align-items-center">--}}
{{--                                    <span class="icon-search2"></span>--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                            <div class="text p-3">--}}
{{--                                <span class="status sale">Rent</span>--}}
{{--                                <div class="d-flex">--}}
{{--                                    <div class="one">--}}
{{--                                        <h3><a href="property-single.html"></a></h3>--}}
{{--                                        <p>{{$data->categoryName->title}}</p>--}}
{{--                                    </div>--}}
{{--                                    <div class="two">--}}
{{--                                        <span class="price">{{$data->rentAmount}}</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <br>--}}
{{--                                <p>{{$data->description}}</p>--}}
{{--                                <hr>--}}
{{--                                <p class="bottom-area d-flex">--}}
{{--                                    <span><i class="flaticon-selection"></i> 250sqft</span>--}}
{{--                                    --}}{{--                                <span style="padding-left:50px"><a href="" class="btn btn-success">Interest</a> </span>--}}

{{--                                    <span class="ml-auto"><i class="flaticon-bathtub"></i> 3</span>--}}
{{--                                    <span><i class="flaticon-bed"></i> 4</span>--}}
{{--                                </p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endforeach--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}


@endsection
