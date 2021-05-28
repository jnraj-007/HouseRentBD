@extends('welcome')
@section('page')



<section no-padding-bottom>

    <table class="table  table-bordered table-hover table  ">
        <thead>

        <th >field</th>
        <th >Data</th>

        </thead>
        <tbody>
              <tr>
                  <h4> User Id:{{$data->userId}} </h4>
                 <h4> User Name:{{$data->viewData->name}}</h4>
              </tr>
              <h1>User Verification data</h1>

         <tr>
                <td scope="row">Name:</td>
                <td>{{$data->name}} </td>
            </tr>
            <tr>
                <td>NId Number:</td>
                <td>{{$data->nIdNumber}} </td>
            </tr>
            <tr>
                <td>Verification Photos:</td>
                <td>
                    <img   style="width: 300px" src="{{url('image/userverification/'.$data->image)}}" alt="">
                    <img style="width: 300px ;margin-left: 20px" src="{{url('image/userverification/'.$data->frontNId)}}" alt="">
                    <img style="width: 300px ;margin-left: 20px" src="{{url('image/userverification/'.$data->backNId)}}" alt="">
                </td>
            </tr>
            <tr>
                <td>Contact:</td>
                <td>{{$data->contact}} </td>
            </tr>

              <tr>
                <td>Action:</td>
                <td>
                    <a href="{{route('verify.user',[$data->id])}}" class="btn btn-success">Verify</a>
                    <a href="{{route('deny.verification',[$data->id])}}" class="btn btn-danger">Deny</a>
                </td>
            </tr>

        </tbody>
    </table>

</section>
@endsection
