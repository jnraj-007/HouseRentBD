@extends('frontend.layouts.user.dashboard.userDashboardMaster')
@section('dashboard')

    <div class="row" style="display: inline-block;">


        <a href="{{route('user.package.pending','Approved')}}" style=" margin-left: 20px" class="btn btn-success">Approved Package</a>
        <a href="{{route('user.package.pending','pending')}}" style=" margin-left: 20px" class="btn btn--blue">Pending Package</a>
            <a href="{{route('user.package.pending','Disapproved')}}" style=" margin-left: 20px" class="btn btn-danger">Disapproved Packages</a>
            <a href="{{route('user.package.pending','history')}}" style=" margin-left: 20px" class="btn btn-info">Purchase History</a>

        </div>
        <div class="row">
        <h3 style="padding: 2px; background-color: Green;box-sizing: border-box;margin-bottom:20px;margin-top: 20px">Your Active Packages:</h3>
        <br>
        <br>
        <br>



        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <table class="table  table-bordered table-hover  ">
            <thead>

            <th>Package Name</th>
            <th>No of Posts</th>
            <th>Price</th>
            <th>Paid Amount</th>
            <th>TransactionId</th>
            <th>current_package_status</th>
            <th>status</th>
            <th>Action</th>
            </thead>
            <tbody>
             @foreach($user as $data)
                <tr>
                    <td> {{$data->packageName}}</td>
                    <td> {{$data->numberOfPosts}}</td>
                    <td> {{$data->package_price}}</td>
                    <td> {{$data->amountToPay}}</td>
                    <td> {{$data->transactionId}}</td>
                    <td>{{$data->current_package_status}}</td>
                    <td> {{$data->status}}</td>
                    <td>
                        @if($data->status=='Approved'||$data->current_package_status=='expired')
                            <p style="background-color: red; display: inline-block">no action</p>@else
                        <a class="btn btn-info" href="{{route('cancel.post.interest',$data->id)}}">Cancel</a>
                            @endif
                    </td>
                </tr>
             @endforeach

            </tbody>
        </table>


        @foreach($packages as $data)
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-danger card-img-holder text-white">
                <div class="card-body">
{{--                    <img src="{{asset('frontend')}}/userDashboard/assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />--}}
                    <div class="card-body card-img-absolute "  style="background-image: url('{{asset('frontend')}}/userDashboard/assets/images/dashboard/circle.svg')"></div>
                    <h4 class="font-weight-normal mb-3">{{$data->name}} <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                    </h4>
                   <h2 class="mb-5" style="display: inline" >Price: {{$data->price}}</h2>
                   <h2 class="mb-5"  >Post No: {{$data->numberofposts}}</h2>
                   <p class="mb-5"  > {{$data->description}}</p>
                    <a href="{{route('purchase.form',$data->id)}}" class="btn btn-success hover">Purchase</a>

                </div>
            </div>
        </div>
        @endforeach
    </div>


@endsection
