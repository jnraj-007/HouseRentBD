@extends('welcome')
@section('page')

    <div class="">
        <table class="table table-striped table-sm table-hover table-bordered ">
            <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Rent</th>
                <th>Region</th>
                <th>Sector NO</th>
                <th>Road No</th>
                <th>House NO</th>
                <th>Photo</th>
                <th>Category</th>
                <th>Author Id</th>
                <th>Author name</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $key=> $post)
            <tr>
                <th scope="row">{{$key+1}}</th>
                <td>{{$post->title}}</td>
                <td>{{$post->rentAmount}}</td>
                <td>{{$post->region}}</td>
                <td>{{$post->sectorNo}}</td>
                <td>{{$post->roadNo}}</td>
                <td>{{$post->houseNo}}</td>
                <td><img style="width: 100px;" src="{{url('/image/posts/',$post->image)}}" alt=" kew nei"></td>
                <td>{{$post->categoryName->title}}</td>
                <td>{{$post->authorId}}</td>
                <td>{{$post->userDetails->name}}</td>
                <td>{{$post->status}}</td>
                <td>
                    <a href="{{route('frontend.view.single.post',[$post->id])}}" class="btn btn-danger">view</a>
                    <a href="{{route('post.delete',$post->id)}}" class="btn btn-success">Delete</a>
                </td>
            </tr>
            @endforeach

            </tbody>
        </table>
        <br><br>
        {{$posts->links()}}
    </div>
@endsection
