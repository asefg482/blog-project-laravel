<!-- ======= Header ======= -->
<header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

        <a href="{{url('/')}}" class="logo d-flex align-items-center">
            <img src="{{asset('assets/img/logo.png')}}" alt="">
            <span>FlexStart</span>
        </a>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto " href="{{url('/')}}">Home</a></li>
                <li><a class="nav-link scrollto" href="{{url('/about/')}}">About</a></li>
                {{--                <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>--}}
                {{--                    <ul>--}}
                {{--                        <li><a href="#">Drop Down 1</a></li>--}}
                {{--                        <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>--}}
                {{--                            <ul>--}}
                {{--                                <li><a href="#">Deep Drop Down 1</a></li>--}}
                {{--                                <li><a href="#">Deep Drop Down 2</a></li>--}}
                {{--                                <li><a href="#">Deep Drop Down 3</a></li>--}}
                {{--                                <li><a href="#">Deep Drop Down 4</a></li>--}}
                {{--                                <li><a href="#">Deep Drop Down 5</a></li>--}}
                {{--                            </ul>--}}
                {{--                        </li>--}}
                {{--                        <li><a href="#">Drop Down 2</a></li>--}}
                {{--                        <li><a href="#">Drop Down 3</a></li>--}}
                {{--                        <li><a href="#">Drop Down 4</a></li>--}}
                {{--                    </ul>--}}
                {{--                </li>--}}
                <li><a class="nav-link scrollto" href="{{url('/contact')}}">Contact</a></li>
                @if(auth()->check())
                    <li><a class="getstarted scrollto" href="{{url('/admin/')}}">Admin panel</a></li>
                    <form method="post" action="{{route('logout')}}">
                        @csrf
                        <li><button class="getstarted scrollto" type="submit">Logout</button></li>
                    </form>
                @else
                    <li><a class="getstarted scrollto" href="{{url('/admin/')}}">Login admin panel</a></li>
                @endif
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->
