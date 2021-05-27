@extends('welcome')
@section('page')

    <center><a href="{{route('user.form')}}"><button class="btn btn-success">Add User</button></a></center>
    <br>
    <br>
    <br>

    <table class="table  table-bordered table-hover">
        <thead>

            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Contact</th>
            <th>Role</th>
            <th>package</th>
            <th>Action</th>
        </thead>
        <tbody>
        @foreach($list as $key=> $lol)
        <tr>
            <td scope="row">{{$key+1}}</td>
            <td>{{$lol->name}}</td>
            <td>{{$lol->email}}</td>
            <td>{{$lol->contact}}</td>
            <td>{{$lol->role}}</td>
            <td>{{$lol->packageId}}</td>
            <td>
                <a  href="#"><button class="btn btn-success">View</button></a>
                <a class="btn btn--red " href="#">Delete</a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <br>
    <br>
{{$list-> links()}}

@endsection
