@extends('welcome')
@section('page')


    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    <center style="margin-bottom: 30px"><a href="{{route('report.generate.form')}}" class="btn btn-primary">Generate Report</a></center>
    <div class="table-responsive">
    <table class="table  table-bordered table-hover  " style="display: block;overflow: auto; height: 400px;position: sticky">
        <thead style="overflow: scroll">

        <th>Id</th>
        <th>User Id</th>
        <th>User Name</th>
        <th>Package Id</th>
        <th>Package Name</th>
        <th>Package Price</th>
        <th>Transaction ID</th>
        <th>Request Date</th>
        <th>Approved At</th>
        <th>Approved By</th>
        </thead>
        <tbody>
        @foreach($paymentHistory as $key=> $payment)
            <tr>
                <td scope="row"> {{$payment->id}}</td>
                <td> {{$payment->userId}}</td>
                <td>{{$payment->userName}} </td>
                <td>{{$payment->packageId}} </td>
                <td> {{$payment->packageName}}</td>
                <td> {{$payment->amount}}</td>
                <td> {{$payment->transactionId}}</td>
                <td> {{$payment->paymentDate}}</td>
                <td> {{$payment->created_at}}</td>
                <td> {{$payment->approvedBy}}</td>

            </tr>
        @endforeach
        </tbody>
    </table>
    </div>

@endsection
