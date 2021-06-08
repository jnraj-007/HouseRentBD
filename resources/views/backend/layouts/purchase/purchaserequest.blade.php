@extends('welcome')
@section('page')


    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4"></div>
    <div class="col-md-4">
    <form action="{{route('search.payments')}}" method="post" class="form-group">
@csrf
    <div class="input-group " >
        <input type="text" class="form-control " value="" placeholder="Search" aria-label="Search" aria-describedby="search-addon" name="search" style="margin-right: 20px;margin-top: 10px"/>
        <button type="submit" style="margin-bottom: 10px" class="btn btn-primary">search</button>
    </div>

        </form>
    </div>
</div>
    <table class="table  table-bordered table-hover  ">
        <thead>

        <th>Id</th>
        <th>User Id</th>
        <th>User Email</th>
        <th>User Name</th>
        <th>Package Id</th>
        <th>Package Name</th>
        <th>Package Price</th>
        <th>Amount Paid</th>
        <th>Transaction ID</th>
        <th>Request Date</th>
        <th>status</th>
        <th>Action</th>
        </thead>
        <tbody>
        @if($purchaseRequest->count()>0)
        @foreach($purchaseRequest as $key=> $package)
            <tr>
                <th scope="row"> {{$package->id}}</th>
                <td> {{$package->userId}}</td>
                <td> {{$package->userdata->email}}</td>
                <td>{{$package->userdata->name}} </td>
                <td>{{$package->package_id}} </td>
                <td> {{$package->packageName}}</td>
                <td> {{$package->package_price}}</td>
                <td> {{$package->amountToPay}}</td>
                <td> {{$package->transactionId}}</td>
                <td> {{$package->created_at}}</td>
                <td>{{$package->status}} </td>
                <td>
                    <a class="btn-sm btn-info" style="text-decoration: none" href="{{route('approve.purchase.request',[$package->id])}}">Approve</a>
                    <a class="btn-sm btn--blue" style="text-decoration: none" href="{{route('disapprove.purchase.request',[$package->id])}}">Disapprove</a>
                      </td>
            </tr>
        @endforeach
        @else
        <tr>
            <td style="color: red">no data found!</td>
        </tr>
            @endif

        </tbody>
    </table>
@endsection
