<section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url({{asset('frontend')}}/master/images/bg_1.jpg);">
    <div class="container">
        <div class="row justify-content-center mb-3 pb-3">
            <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
                <h2 class="mb-4">Some Interesting Facts About Us </h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="row">
                    @php use App\Models\User; use App\Models\Post;
                        $customer=User::all();

                    $totalPost=Post::all();
                    @endphp
                    <div class="col-md-6 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center">
                            <div class="text">
                                <strong class="number" data-number="{{count($customer)+200}}">0</strong>
                                <span>Happy Customers</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center">
                            <div class="text">
                                <strong class="number" data-number="{{count($totalPost)+100}}">0</strong>
                                <span>Total Rent Advertisement</span>
                            </div>
                        </div>
                    </div>
{{--                    <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">--}}
{{--                        <div class="block-18 text-center">--}}
{{--                            <div class="text">--}}
{{--                                <strong class="number" data-number="1000">0</strong>--}}
{{--                                <span></span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">--}}
{{--                        <div class="block-18 text-center">--}}
{{--                            <div class="text">--}}
{{--                                <strong class="number" data-number="100">0</strong>--}}
{{--                                <span>Awards</span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </div>
</section>
