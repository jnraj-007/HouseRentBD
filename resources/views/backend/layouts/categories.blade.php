@extends('welcome')
@section("page")

    <!-- Button trigger modal -->
   <center> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Create Category
    </button></center>
    <br>
    <br>
    @if (Session::has('danger'))
        <div class="alert alert-danger">
            <ul>
                <li>{{ Session::get('danger') }}</li>
            </ul>
        </div>
    @endif
    <table class="table table-bordered table-hover "  >
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Category Name</th>
            <th scope="col" >Description</th>
            <th scope="col">Status</th>
            <th scope="col">Handle</th>
        </tr>
        </thead>
        <tbody>

        {{--@foreach($categories as $data)
            <tr>
                <th scope="row">{{$data->id}}</th>
                <td>{{$data->name}}</td>
                <td>{{$data->description}}</td>
                <td>
                    <a class="btn btn-success" href="">View</a>
                    <a class="btn btn-danger" href="">Delete</a>
                </td>
            </tr>
        @endforeach--}}
        @foreach($categories as $key=> $data)
        <tr>
            <td style="width: auto">{{$key+1}}</td>
            <td style="width: auto">{{$data->title}}</td>
            <td style="width:30%">{{$data->description}}</td>
{{--            <td class="text-body" style="width: 25%"; ><textarea style="background: #1a202c; color: white; " class="text-info" cols="50%" rows="3">{{$data->description}}</textarea></td>--}}
            <td style="width: auto">{{$data->status}}</td>
            <td style="width: auto" ><a href="#" class="btn btn-info">view</a>
                <a href="{{route('delete',$data->id)}}"   class="btn btn-danger">Delete</a>
                <a href="#"   class="btn btn-success">Edit</a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>




    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create New Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>




                <form action="{{route('category.create')}}" method="post">

                  @csrf
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="exampleInputEmail1">Category Name</label>
                            <input name="category_name" required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Category name">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Category Description</label>
                            <textarea class="form-control" name="description" id=""  cols="3" rows="5" placeholder="Enter Description"  ></textarea>
                        </div>

                        <div class="form-group">
                            <label for="status" >Status</label>
                            <select class="dropdown btn-dark" name="status" id="status">
                                <option value="Active" selected>Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                        </div>

                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit"  class="btn btn-primary">Save changes</button>
                    </div>
                </form>


            </div>
        </div>
    </div>
@stop
