@extends('frontend.layouts.user.dashboard.userDashboardMaster')
@section('dashboard')

    <h>Request Table</h>

    <table class="table  table-bordered table-hover  ">
        <thead>

        <th>User Id</th>
        <th>Post Id</th>
        <th>Remarks</th>
        <th>User Contact</th>
        <th>Your Contact</th>
        <th>status</th>
        <th>Action</th>
        </thead>
        <tbody>





        @foreach($interestedUsers as $data)
            <tr>
                <td> {{$data->userinterest->name}}</td>
                <td> {{$data->postinterest->title}}</td>
                <td> {{$data->remarks}}</td>
                <td>@if($data->status=='pending'||$data->status=='Disapproved')
        Accept to see contact @else{{$data->userContact}}
                @endif</td>
                <td>@if(!auth('user')->user()->contact)
                        Please Add contact
                    @else {{auth('user')->user()->contact}} @endif
                </td>
                <td> {{$data->status}}</td>
                <td>
                    <a class="btn btn-info" href="{{route('approve.request',[$data->id,$approve='approve'])}}">Approve</a>
                    <a class="btn btn-info" href="{{route('approve.request',[$data->id,$approve='disapprove'])}}">Disapprove</a>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>



    <h>Approved Users Table</h>

    <table class="table  table-bordered table-hover  ">
        <thead>

        <th>User Id</th>
        <th>Post Id</th>
        <th>Remarks</th>
        <th>User Contact</th>

        <th>status</th>
        <th>Action</th>
        </thead>
        <tbody>




  @if($approvedUsers)
        @foreach($approvedUsers as $dat)
            <tr>
                <td> {{$dat->userinterest->name}}</td>
                <td> {{$dat->postinterest->title}}</td>
                <td> {{$dat->remarks}}</td>
                <td>@if($dat->status=='pending'||$dat->status=='Disapproved')
                        Accept to see contact @else{{$dat->userContact}}
                    @endif</td>

                <td> {{$dat->status}}</td>
                <td>
                    <a class="btn btn-info" href="{{route('approve.request',[$dat->id,$approve='disapprove'])}}">Disapprove</a>
                    <a class="btn-sm btn-primary" style="color: white"  href="{{route('frontend.message.form',[$dat->postId,$dat->userId])}}">Message</a>
                </td>
            </tr>
        @endforeach

  @else

        <h style="background: red; text-align: center; font-size: 2rem;">No Disapproved User</h>
        @endif
        </tbody>
    </table>


    <h>Disapproved Users Table</h>

    <table class="table  table-bordered table-hover  ">
        <thead>

        <th>User Id</th>
        <th>Post Id</th>
        <th>Remarks</th>
        <th>User Contact</th>

        <th>status</th>
        <th>Action</th>
        </thead>
        <tbody>




        @if($disapprovedUsers)
            @foreach($disapprovedUsers as $da)
                <tr>
                    <td> {{$da->userinterest->name}}</td>
                    <td> {{$da->postinterest->title}}</td>
                    <td> {{$da->remarks}}</td>
                    <td>@if($da->status=='pending'||$da->status=='Disapproved')
                            Accept to see contact @else{{$da->userContact}}
                        @endif</td>

                    <td> {{$da->status}}</td>
                    <td>
                        <a class="btn btn-info" href="{{route('approve.request',[$da->id,$approve='approve'])}}">Approve</a>
                    </td>
                </tr>
            @endforeach

        @else

            <h style="background: red; text-align: center; font-size: 2rem;">No approved User</h>
        @endif
        </tbody>
    </table>

@endsection
