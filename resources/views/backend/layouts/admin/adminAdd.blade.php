@extends('welcome')
@section('page')

    <div class="wrapper wrapper--w790 ">
        <div class="card card-5 bg-dark">
            <div class="card-body ">
                <form action="{{route('admin.create')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">{{$error}}</div>
                        @endforeach
                    @endif
                    <div class="form-row">
                        <div class="name" style="color: white">Name</div>
                        <div class="value">
                            <div class="input-group">
                                <input class="input--style-5" required type="text" name="name">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="name"style="color: white">Email</div>
                        <div class="value">
                            <div class="input-group">
                                <input class="input--style-5" required type="email" name="email">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="name"style="color: white">Password</div>
                        <div class="value">
                            <div class="input-group">
                                <input class="input--style-5" type="password"  required name="password">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="name" style="color: white">Address</div>
                        <div class="value">
                            <div class="input-group">
                                <input class="input--style-5" required type="text" name="address">
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="name" style="color: white">Admin Photo</div>
                        <div class="value">
                            <div class="input-group">
                                <input class="input--style-5" required type="file" name="photo">
                            </div>
                        </div>
                    </div>
                    <div class="form-row m-b-55">
                        <div class="name"style="color: white">Phone</div>
                        <div class="value">
                            <div class="row row-refine">
                                <div class="col-3">
                                    <div class="input-group-desc">
                                        <h1  class="input--style-5"> + 88</h1>
                                    </div>
                                </div>
                                <div class="col-9">
                                    <div class="input-group-desc">
                                        <input class="input--style-5" required type="text" name="contact">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                                        <div class="form-row">
                                            <div class="name"style="color: white">Status</div>
                                            <div class="value">
                                                <div class="input-group">
                                                    <div class="rs-select2 js-select-simple select--no-search">

                                                        <div class="select-dropdown">
                                                            <select required name="status">
                                                                <option selected="selected"  value="Active">Active</option>
                                                                <option value="Inactive">Inactive</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                            <div class="form-row">
                                            <div class="name"style="color: white">Role</div>
                                            <div class="value">
                                                <div class="input-group">
                                                    <div class="rs-select2 js-select-simple select--no-search">

                                                        <div class="select-dropdown">
                                                            <select required name="role">
                                                                <option selected="selected"  value="Admin">Admin</option>
                                                                <option value="SuperAdmin">Super Admin</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                    <div>
                        <button class="btn btn--radius-2 btn--red" type="submit">Add Admin</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
