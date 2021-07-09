@extends('frontend.layouts.user.dashboard.userDashboardMaster')
@section('dashboard')
                                    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
                                                            <div class="container" style="background: linear-gradient(90deg, hsla(152, 100%, 50%, 1) 0%, hsla(186, 100%, 69%, 1) 100%);
">
                                                                <div class="wrapper wrapper-content animated fadeInRight">

                                                                    <div class="row">

                                                                        <div class="col-lg-12">

                                                                            <div class="ibox">
                                                                                <div class="ibox-content">

                                                                                    <div class="panel-body">

                                                                                        <div class="row">
                                                                                            <div class="col-md-4">
                                                                                                <p style=" background:orangered border-box 20px">Payment in Bkash number: <strong>01277777777777</strong> </p>
                                                                                                <p style="color: green">User your email as reference</p>
                                                                                                <h2>Summary</h2>
                                                                                                <strong>Package Name:</strong>: {{$data->name}} <br>
                                                                                                <strong>Price:</strong>: <span class="text-navy">{{$data->price}}</span><br>
                                                                                                <strong>Number of Posts:</strong>: <span class="text-navy">{{$data->numberofposts}}</span>

                                                                                                <p class="m-t">
                                                                                                    Package Details:

                                                                                                </p>
                                                                                                <p>
                                                                                                    {{$data->description}}
                                                                                                </p>
                                                                                            </div>
                                                                                            <div class="col-md-8">

                                                                                                <form role="form" id="payment-form" method="post" action="{{route('package.purchase')}}">
                                                                                                    @csrf
                                                                                                    <input type="hidden" name="packageId" value="{{$data->id}}">
                                                                                                    <input type="hidden" name="packagePrice" value="{{$data->price}}">
                                                                                                    <input type="hidden" name="numberofposts" value="{{$data->numberofposts}}">
                                                                                                    <input type="hidden" name="packageName" value="{{$data->name}}">

                                                                                                    <div class="row">
                                                                                                        <div class="col-xs-12">
                                                                                                            <div class="form-group" style="margin-top: 40px">
                                                                                                                <label>Choose Payment Method</label>
                                                                                                                <select class="form-control col-xs-12" required name="paymentMethod" id="" style="width: 259px">
                                                                                                                    <option value="">Select Payment Method</option>
                                                                                                                    <option value="Nagad">Nagad(recommended)</option>
                                                                                                                    <option value="Bkash">Bkash</option>
                                                                                                                    <option value="Rocket">Rocket</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>

                                                                                                    <div class="row">
                                                                                                        <div class="col-xs-12">
                                                                                                            <div class="form-group" >
                                                                                                                <label>Amount paid</label>
                                                                                                                <input type="number" class="form-control" readonly value="{{$data->price}}" name="pricePaid" placeholder="Enter amount you Paid.">
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="row">
                                                                                                        <div class="col-xs-12">
                                                                                                            <div class="form-group">
                                                                                                                <label>Transaction Id</label>
                                                                                                                <div class="input-group">
                                                                                                                    <input type="text" class="form-control" name="transactionId" placeholder="Valid Transaction Number" required>
                                                                                                                    <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                                                                                                                </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <button class="btn btn-primary" type="submit">Make a payment!</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
