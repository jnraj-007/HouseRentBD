


<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{route('home.view')}}">House Rent<span>BD</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item  "><a href="{{route('home.view')}}" class="nav-link">Home</a></li>
                <li class="nav-item "><a href="{{route('frontend.post.view')}}" class="nav-link">Property</a></li>
{{--                <li class="nav-item "><a href="{{asset('frontend')}}/master/agents.html" class="nav-link">Agents</a></li>--}}
                <li class="nav-item "><a href="{{route('frontend.about')}}" class="nav-link">About</a></li>
{{--                <li class="nav-item "><a href="{{asset('frontend')}}/master/blog.html" class="nav-link">Blog</a></li>--}}
                <li class="nav-item "><a href="{{route('frontend.contact')}}" class="nav-link">Contact</a></li>
                @auth('user')
                    <li class="nav-item cta"><a href="{{route('user.dashboard')}}" class="nav-link"><span class="icon-dashboard"></span>Dashboard</a></li>
                    <br><br>
                    <li class="nav-item cta cta-colored"><a href="{{route('frontend.user.logout')}}" class="nav-link"><span class=" icon-sign-out"></span>Logout</a></li>
                @else
                <li class="nav-item cta"><a href="{{route('frontend.login.form')}}" class="nav-link ml-lg-2"><span class="icon-user"></span> Sign-In</a></li>
                <li class="nav-item cta cta-colored"><a href="{{route('frontend.user.reg')}}" class="nav-link"><span class="icon-pencil"></span> Sign-Up</a></li>

                @endauth
            </ul>
        </div>
    </div>
</nav>
