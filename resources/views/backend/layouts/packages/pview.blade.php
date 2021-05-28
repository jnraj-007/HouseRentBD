@extends('welcome')
@section('page')

    <center> <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
            Create Packages
        </button></center>
    <br>
    <br>
    <br>

    <table class="table  table-bordered table-hover  ">
        <thead>

        <th>Id</th>
        <th>Package Name</th>
        <th>Price</th>
        <th>No of Posts</th>
        <th>Package Details</th>
        <th>status</th>
        <th>Action</th>
        </thead>
        <tbody>
 @foreach($packages as $key=> $package)
            <tr>
                <th scope="row">{{$key+1}} </th>
                <td> {{$package->name}}</td>
                <td>{{$package->price}} </td>
                <td>{{$package->numberofposts}} </td>
                <td> {{$package->description}}</td>
                <td>{{$package->status}} </td>


                <td>
                    <a class="btn-sm btn--blue" style="text-decoration: none" href="#">Edit</a>
                    <a class="btn-sm btn-danger" style="text-decoration: none" href="{{route('package.delete',$package->id)}}">Delete</a>
                </td>
            </tr>
 @endforeach
        </tbody>
    </table>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create New Package</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>




                <form action="{{route('package.add')}}" method="post">

                    @csrf


                    <div class="modal-body">

                        <div class="form-group">
                            <label for="exampleInputEmail1">Package Name</label>
                            <input name="package_name" required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Package name">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail">Package Price</label>
                            <input name="package_price" required type="text" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Package price">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail">Number Of Posts</label>
                            <input name="postNo" required type="number" min="1" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Posts Number">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Package Description</label>
                            <textarea class="form-control" name="description" id=""  cols="3" rows="5" placeholder="Enter Description"  ></textarea>
                        </div>

                        <div class="form-group">
                            <label for="status" >status</label>
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

@endsection

