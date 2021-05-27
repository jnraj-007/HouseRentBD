@extends('welcome')
@section('page')

    <div class="wrapper wrapper--w790 ">
        <div class="card card-5 bg-dark">
            <div class="card-body ">
                <form action="{{route('user.add')}}" method="post" enctype="multipart/form-data">
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
                                <input class="input--style-5" type="text" name="name">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="name"style="color: white">Email</div>
                        <div class="value">
                            <div class="input-group">
                                <input class="input--style-5" type="email" name="email">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="name"style="color: white">Password</div>
                        <div class="value">
                            <div class="input-group">
                                <input class="input--style-5" type="password" name="password">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="name" style="color: white">Address</div>
                        <div class="value">
                            <div class="input-group">
                                <input class="input--style-5" type="text" name="address">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="name" style="color: white">Photo</div>
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
                                        <input class="input--style-5" type="text" name="contact">
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
                                        <select name="role">
                                            <option selected="selected"  value="Tenant">Tenant</option>
                                            <option value="Owner">Owner</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div></div>
{{--                    <div class="form-row">--}}
{{--                        <div class="name"style="color: white">Status</div>--}}
{{--                        <div class="value">--}}
{{--                            <div class="input-group">--}}
{{--                                <div class="rs-select2 js-select-simple select--no-search">--}}

{{--                                    <div class="select-dropdown">--}}
{{--                                        <select name="status">--}}
{{--                                            <option selected="selected"  value="General User">No Membership</option>--}}
{{--                                            <option value="Gold User">Gold User</option>--}}
{{--                                            <option value="Platinum User">Platinum User</option>--}}
{{--                                            <option value="Diamond User">Diamond User</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div class="form-row">
                        <div class="name"style="color: white">Package</div>
                        <div class="value">
                            <div class="input-group">
                                <div class="rs-select2 js-select-simple select--no-search">

                                    <div class="select-dropdown">

                                        <select name="package">
                                            <option value="General user">NO package</option>
                                            @foreach($lol as $packages)
                                            <option   value="{{$packages->id}}">{{$packages->name}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <button class="btn btn--radius-2 btn--red" type="submit">Add User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
