@extends('welcome')
@section('page')
    <form action="{{route('update.package',$edit->id)}}" method="post">
        @method('PUT')
        @csrf
        <div class="modal-body">

            <div class="form-group">
                <label for="exampleInputEmail1">Package Name</label>
                <input name="package_name" required value="{{$edit->name}}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Package name">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail">Package Price</label>
                <input name="package_price" required type="text" value="{{$edit->price}}" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Package price">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail">Number Of Posts</label>
                <input name="postNo" required type="number" min="1" class="form-control" value="{{$edit->numberofposts}}" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Posts Number">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Package Description</label>
                <textarea class="form-control" name="description" id=""  cols="3" rows="5" placeholder="Enter Description"  >{{$edit->description}}</textarea>
            </div>

            <div class="form-group">
                <label for="status" >status</label>
                <select class="dropdown btn-dark" name="status" id="status">
                    <option value="Active" @if($edit->status=='Active') selected @endif>Active</option>
                    <option value="Inactive" @if($edit->status=='Inactive') selected @endif>Inactive</option>
                </select>
            </div>

        </div>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit"  class="btn btn-primary">Save changes</button>

    </form>
@endsection
