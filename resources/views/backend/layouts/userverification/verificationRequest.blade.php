@extends('welcome')
@section('page')


    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    @if(session()->has('danger'))
        <div class="alert alert-danger">
            {{ session()->get('danger') }}
        </div>
    @endif
    <table class="table  table-bordered table-hover  ">
        <thead>

        <th>Id</th>
        <th>User Id</th>
        <th>User Name</th>
        <th>role</th>
        <th>status</th>
        <th>Request Date</th>
        <th>Action</th>
        </thead>
        <tbody>
        @foreach($verificationRequests as $key=> $request)
            <tr>
                <th scope="row"> {{$request->id}}</th>
                <td> {{$request->userId}}</td>
                <td>{{$request->viewData->name}} </td>
                <td>{{$request->viewData->role}} </td>
                <td>{{$request->status}} </td>
                <td> {{$request->created_at}}</td>
                <td>
                    <a class="btn-sm btn-info"  href="{{route('backend.view.verification.data',[$request->id])}}">View</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
