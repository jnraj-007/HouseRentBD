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
