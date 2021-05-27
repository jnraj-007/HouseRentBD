<!DOCTYPE html>
<html lang="en">
<head>
    <title>HRB</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('frontend')}}/master/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/master/css/animate.css">

    <link rel="stylesheet" href="{{asset('frontend')}}/master/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/master/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/master/css/magnific-popup.css">

    <link rel="stylesheet" href="{{asset('frontend')}}/master/css/aos.css">

    <link rel="stylesheet" href="{{asset('frontend')}}/master/css/ionicons.min.css">

    <link rel="stylesheet" href="{{asset('frontend')}}/master/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/master/css/jquery.timepicker.css">


    <link rel="stylesheet" href="{{asset('frontend')}}/master/css/flaticon.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/master/css/icomoon.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/master/css/style.css">
</head>
@php  \App\Models\Post::where('expire_at','<',now()->format('Y-m-d'))->update(['status'=>'expired']); @endphp
<body>

