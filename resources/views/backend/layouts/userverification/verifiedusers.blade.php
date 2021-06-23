@extends('welcome')
@section('page')

    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    <table class="table table-responsive-lg  table-bordered table-hover">
        <thead>

        <th>Id</th>
        <th>Name</th>
        <th>Photo</th>
        <th>NTd Number</th>
        <th>Email</th>
        <th>Contact</th>
        <th>Verification</th>
        <th>Role</th>
        <th>Action</th>
        </thead>
        <tbody>
        @foreach($list as $key=> $lol)
            <tr>
                <td scope="row">{{$key+1}}</td>
                <td>{{$lol->name}}</td>
                <td><img style="width: 50px" src="{{url('image/users',$lol->image)}}" alt=""></td>
                <td>{{$lol->nIdNumber}}</td>
                <td>{{$lol->email}}</td>
                <td>@if($lol->contact==null) no contact @else {{$lol->contact}}@endif</td>
                <td>{{$lol->verification}}</td>
                <td>{{$lol->role}}</td>
                <td>
                    <a  href="{{route('view.user.profile',$lol->id)}}"><button class="btn-sm btn-success">Profile</button></a>
                     <a  href="{{route('user.verification.information',$lol->id)}}"><button class="btn-sm btn-light">Verified Data</button></a>
                    {{-- <a class="btn btn--red " href="{{route('backend.user.delete')}}">Delete</a>--}}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <br>
    <br>
    {{$list-> links()}}

@endsection
