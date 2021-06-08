<header class="header">
    <nav class="navbar navbar-expand-lg" style="background:  linear-gradient(135deg, hsla(332, 53%, 82%, 1) 0%, hsla(176, 57%, 89%, 1) 100%);">
        <div class="search-panel">
            <div class="search-inner d-flex align-items-center justify-content-center">
                <div class="close-btn">Close <i class="fa fa-close"></i></div>
                <form id="searchForm" action="#">
                    <div class="form-group">
                        <input type="search" name="search" placeholder="What are you searching for...">
                        <button type="submit" class="submit">Search</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="container-fluid d-flex align-items-center justify-content-between">
            <div class="navbar-header">
                <!-- Navbar Header--><a href="{{route('home')}}" class="navbar-brand">
                    <div class="brand-text brand-big visible text-uppercase"><strong class="text-primary">House rent</strong><strong>BD</strong></div>
                    <div class="brand-text brand-sm"><strong class="text-primary">H</strong><strong>R</strong><strong>B</strong></div></a>
                <!-- Sidebar Toggle Btn-->
                <button class="sidebar-toggle"><i class="fa fa-long-arrow-left"></i></button>
            </div>



{{--   notification--}}
                @php $purchaseNotifications=\App\Models\Userpackage::with('userdata')->where('status','pending')->paginate(4); @endphp
@php   $verification=\App\Models\Userverification::with('viewData')->where('status','pending')->paginate(3); @endphp
{{--end notification--}}



                <div class="right-menu list-inline no-margin-bottom">
                    <div class="list-inline-item"><a href="#" class="search-open nav-link"><i class="icon-magnifying-glass-browser"></i></a></div>

                    <div class="list-inline-item dropdown">
                        <a id="navbarDropdownMenuLink1" href="http://example.com" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link messages-toggle">
                            <i class="icon-email"></i><span class="badge dashbg-1">{{count($purchaseNotifications)+count($verification)}}</span>
                        </a>
                        <div aria-labelledby="navbarDropdownMenuLink1" class="dropdown-menu messages">
@if(count($purchaseNotifications)==null&&count($verification)==null)
                            <a href="#" class="dropdown-item message d-flex align-items-center">
                                <div class="content">
                                    <span class="d-block">No notification</span>
                                </div>
                            </a>
                            @else

                           @foreach($purchaseNotifications as $purchase)
                            <a href="{{route('purchase.request.list')}}" class="dropdown-item message d-flex align-items-center">
                                <div class="profile"><img src="{{url('image/users/'.$purchase->userdata->image)}}" alt="..." class="img-fluid">
                                    <div class="status away"></div>
                                </div>
                                <div class="content">
                                    <strong class="d-block">{{$purchase->userdata->name}}</strong><span class="d-block">Purchase Request for {{$purchase->packageName}} package</span><small class="date d-block">10:30pm</small>
                                </div>
                            </a>
                            @endforeach


                                  @foreach($verification as $verify)
                                   <a href="{{route('user.verification.requests')}}" class="dropdown-item message d-flex align-items-center">
                                       <div class="profile"><img src="{{url('image/users/'.$verify->viewData->image)}}" alt="..." class="img-fluid">
                                           <div class="status away"></div>
                                       </div>
                                       <div class="content">
                                           <strong class="d-block">{{$verify->viewData->name}}</strong><span class="d-block">Account verification Request</span><small class="date d-block">{{$verify->created_at}}</small>
                                       </div>
                                   </a>
                               @endforeach
    @endif


                        </div>
                    </div>





{{--     end notification           --}}





                <!-- Log out               -->
                <div class="list-inline-item logout"> <a id="logout" href="{{route('admin.logout')}}" class="nav-link">Logout <i class="icon-logout"></i></a></div>
            </div>
        </div>
    </nav>
</header>
