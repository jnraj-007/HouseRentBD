@extends('welcome')
@section('page')

    <center><a href="{{route('admin.form')}}"><button class="btn btn-success">Add Admin</button></a></center>
    <br>
    <br>
    <br>

    <table class="table  table-bordered table-hover">
        <thead>

        <th>Id</th>
        <th>Photo</th>
        <th>Name</th>
        <th>Email</th>
        <th>Contact</th>
        <th>status</th>
        <th>Role</th>
        <th>Action</th>
        </thead>
        <tbody>
        @foreach($adminList as $key=> $admins )
            <tr>
                <td scope="row">{{$key+1}}</td>
                <td><img style="width: 100px;" src="{{url('/image/admins/',$admins->image)}}" alt=" kew nei"></td>
                <td>{{$admins->name}}</td>
                <td>{{$admins->email}} </td>
                <td>{{$admins->contact}} </td>
                <td>{{$admins->status}} </td>
                <td>{{$admins->role}} </td>
                <td>
                    <a class="btn btn-info" href="{{route('admin.profile',$admins->id)}}">View</a>
                    <a class="btn btn-danger" href="{{route('admin.delete',$admins->id)}}">Delete</a>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>


@endsection
