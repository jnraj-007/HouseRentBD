@extends('welcome')
@section('page')


    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    <table class="table  table-bordered table-hover  ">
        <thead>

        <th>Id</th>
        <th>User Id</th>
        <th>User Name</th>
        <th>Package Id</th>
        <th>Package Name</th>
        <th>Package Price</th>
        <th>Amount Paid</th>
        <th>Transaction ID</th>
        <th>Requested at</th>
        <th>Approved at</th>
        <th>status</th>
        <th>Action</th>
        </thead>
        <tbody>
        @foreach($approvedRequests as  $purchase)
            <tr>
                <th scope="row"> {{$purchase->id}}</th>
                <td> {{$purchase->userId}}</td>
                <td>{{$purchase->userdata->name}} </td>
                <td>{{$purchase->package_id}} </td>
                <td> {{$purchase->packageName}}</td>
                <td> {{$purchase->package_price}}</td>
                <td> {{$purchase->amountToPay}}</td>
                <td> {{$purchase->transactionId}}</td>
                <td> {{$purchase->created_at}}</td>
                <td> {{$purchase->updated_at}}</td>
                <td>{{$purchase->status}} </td>
                <td>@if($purchase->status=='expired')
                        no action @else
                    <a class="btn-sm btn--blue" style="text-decoration: none" href="{{route('disapprove.after.approve',[$purchase->id])}}">Disapprove</a>
               @endif </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$approvedRequests->links()}}
@endsection
