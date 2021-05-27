@include('frontend.partials.header')
@include('frontend.partials.social')

@include('frontend.partials.navbar')
<!-- END nav -->

@include('frontend.partials.banner')



@yield('page')



{{--footer start--}}
@include('frontend.partials.footer')
