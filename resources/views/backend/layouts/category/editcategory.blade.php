@extends('welcome')
@section('page')
<form action="{{route('update.category',$edit->id)}}" method="post">
@method('PUT')
    @csrf
    <div class="modal-body">

        <div class="form-group">
            <label for="exampleInputEmail1">Category Name</label>
            <input  name="category_name" value="{{$edit->title}}" required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Category name">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Category Description</label>
            <textarea class="form-control"  name="description" id=""  cols="3" rows="5" placeholder="Enter Description"  >{{$edit->description}}</textarea>
        </div>

        <div class="form-group">
            <label for="status" >Status</label>
            <select  name="status" required id="status">
                <option @if($edit->status=='Active')selected @endif value="Active" selected>Active</option>
                <option @if($edit->status=='Inactive')selected @endif value="Inactive">Inactive</option>
            </select>
        </div>

    </div>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit"  class="btn btn-primary">Save changes</button>

</form>
@endsection
