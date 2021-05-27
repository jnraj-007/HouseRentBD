@extends('frontend.frontmaster')


@section('page')

    {{--search bar end--}}
    <section class="ftco-section bg-light">

        <div class="col-md align-items-end">
            <div class="form-group">
                <label for="#">Property Type</label>
                <div class="form-field">
                    <div class="select-wrap" style=": 200px">
                        <select name="" id="" class="form-control">
                            <option value="">Type</option>
                            <option value="">Commercial</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">


                @foreach($posts as $data)

                    <div class="col-md-4 ftco-animate">
                        <div class="properties">

                            <a href="{{route('frontend.view.single.post',$data->id)}}" class="img img-2 d-flex justify-content-center align-items-center" style="background-image:url('{{asset('image')}}/posts/{{$data->image}}');">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <span class="icon-search2"></span>
                                </div>
                            </a>
                            <div class="text p-3">
                                <span class="status sale">Rent</span>
                                <div class="d-flex">
                                    <div class="one">
                                        <h3><a href="property-single.html">{{$data->region}}</a></h3>
                                        <p>{{$data->categoryName->title}}</p>
                                    </div>
                                    <div class="two">
                                        <span class="price">{{$data->rentAmount}}</span>
                                    </div>
                                </div>
                                <p>{{substr($data->description,0,50)}}...</p>
                                <hr>
                                <p class="bottom-area d-flex">
                                    <span><i class="flaticon-selection"></i> 250sqft</span>
                                    {{--                                <span style="padding-left:50px"><a href="" class="btn btn-success">Interest</a> </span>--}}

                                    <span class="ml-auto"><i class="flaticon-bathtub"></i> 3</span>
                                    <span><i class="flaticon-bed"></i> 4</span>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row mt-5">
                <div class="col text-center">
                    <div class="block-27">
                        <ul>
                            <li><li>{{$posts->links()}}</li></li>


                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
