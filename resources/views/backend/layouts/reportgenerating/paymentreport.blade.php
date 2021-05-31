@extends('welcome')
@section('page')


    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    <h1>Booking Report</h1>

    <form action="{{route('generate.report')}}" method="GET">

        <div class="row" style="margin-bottom: 40px">
            <div class="col-md-8">
                <div class="row">

                    <div class="form-group col-md-6">
                        <label for="from"> Date from:</label>
                        <input @if(isset($fromDate)) value="{{$fromDate}}" @endif id="from" type="date" class="form-control" name="from_date">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="to"> Date to:</label>
                        <input @if(isset($fromDate)) value="{{$toDate}}" @endif  id="to" type="date" class="form-control" name="to_date">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div style="margin-top: 20px">
                    <button type="submit" class="btn btn-primary">Search</button>
                    <button type="button" onclick="printDiv()" class="btn btn-success">Print</button>
                </div>
            </div>

        </div>
    </form>
    <div id="printArea">
      @if(isset($payments))  <h4>Booking Report from {{$fromDate}} to {{$toDate}}</h4>@endif
          <br><br>
    <table class="table  table-bordered table-hover  ">
        <thead>

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
@if(isset($payments))
        @foreach($payments as $key=> $payment)
            <tr>
                <th scope="row"> {{$payment->id}}</th>
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
    @endif

        </tbody>
    </table>
    </div>
    <script type="text/javascript">
        function printDiv(){
            var printContents = document.getElementById("printArea").innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;
            window.print();

            document.body.innerHTML = originalContents;

        }
    </script>
@endsection
