<section class="home-slider owl-carousel">


    <div class="slider-item" style="background-image:url({{asset('frontend')}}/master/images/bg_1.jpg);">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a style="font-size: 500%">Home</a></span> </p>
                    <h1 class="mb-3 mr-2 bread" style="font-size: 300%;color: white">House Rent BD</h1>
                </div>
            </div>
        </div>
    </div>
@foreach($bannerPosts as $banner)
    <div class="slider-item" style="background-image:url('{{asset('image')}}/posts/{{$banner->image}}');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-md-end align-items-center justify-content-end">
                <div class="col-md-6 text p-4 ftco-animate">
                    <h1 class="mb-3">Sector :{{$banner->sectorNo}} Road:{{$banner->roadNo}}</h1>
                    <span class="location d-block mb-3"><i class="icon-my_location"></i> {{$banner->region}}</span>
                    <p>{{substr($banner->description,0,50)}}</p>
                    <span class="price">{{$banner->rentAmount}}</span>
                    <a href="{{route('frontend.view.single.post',$banner->id)}}" class="btn-custom p-3 px-4 bg-primary">View Details <span class="icon-plus ml-1"></span></a>
                </div>
            </div>
        </div>
    </div>
    @endforeach

</section>
