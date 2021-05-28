@extends('welcome')
@section('page')

    <center><a href="{{route('user.form')}}"><button class="btn btn-success">Add User</button></a></center>
    <br>
    <br>
    <br>

    <table class="table table-responsive-lg  table-bordered table-hover">
        <thead>

            <th>Id</th>
            <th>Name</th>
            <th>Photo</th>
            <th>Email</th>
            <th>Contact</th>
            <th>Role</th>
            <th>Verification</th>
            <th>Action</th>
        </thead>
        <tbody>
        @foreach($list as $key=> $lol)
        <tr>
            <td scope="row">{{$key+1}}</td>
            <td>{{$lol->name}}</td>
            <td><img style="width: 50px" src="{{url('image/users',$lol->image)}}" alt=""></td>
            <td>{{$lol->email}}</td>
            <td>@if($lol->contact==null) no contact @else {{$lol->contact}}@endif</td>
            <td>{{$lol->role}}</td>
            <td>{{$lol->verification}}</td>
            <td>
                <a  href="#"><button class="btn btn-success">View</button></a>
{{--                <a class="btn btn--red " href="{{route('backend.user.delete')}}">Delete</a>--}}
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <br>
    <br>
{{$list-> links()}}

@endsection
