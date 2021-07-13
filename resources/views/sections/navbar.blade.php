<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <img src="/images/ui/fist.png" alt="ServiceApp Logo" style="height:32px; display:inline"/>
    <a class="navbar-brand pl-3" href="#">{{config('app.name','job-hub test')}}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            @auth
                @if(Auth::user()->hasAnyRoles(['administrator','manager','user']))
                    <li class="nav-item dropdown {{Request::is('users*') ? 'btn btn-primary btn-sm':''}}">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            Korisnici
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{route('users.index')}}">Prikaz svih korisnika</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                @endif

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        Veštine
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        Poslovi
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        Ponude
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
            @endauth
        </ul>

    {{--        S E A R C H--}}
    {{--        <form class="form-inline my-2 my-lg-0">--}}
    {{--            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">--}}
    {{--            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>--}}
    {{--        </form>--}}

    <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">

            @auth

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="far fa-user fa-1x  pr-2"></i>
                        {{ auth()->user()->firstname}}  {{ auth()->user()->lastname}}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{route('users.show',Auth::user()->id)}}">Profil</a>
                        <div class="dropdown-divider"></div>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button class="dropdown-item" type="submit">Logout</button>
                        </form>

                    </div>
                </li>

            @endauth

            @guest

                <li>

                    <div>
                        <a class='text-white pr-2' href="{{route('register')}}">Registracija</a>
                        <a class='text-white pr-2' href="{{route('login')}}">Prijava</a>
                    </div>
                </li>


            @endguest


        </ul>


        <!-- Authentication Links -->
        {{--            @guest--}}
        {{--                <li class="nav-item">--}}
        {{--                    <a class="nav-link" href="{{ route('auth.login') }}">{{ __('Login') }}</a>--}}
        {{--                </li>--}}
        {{--                @if (Route::has('auth.register'))--}}
        {{--                    <li class="nav-item">--}}
        {{--                        <a class="nav-link" href="{{ route('auth.register') }}">{{ __('Register') }}</a>--}}
        {{--                    </li>--}}
        {{--                @endif--}}
        {{--            @else--}}
        {{--                <li class="nav-item dropdown">--}}
        {{--                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
        {{--                        <i class="far fa-user fa-1x  pr-2"></i><strong style="font-size:15px">{{ Auth::user()->firstname }} </strong><span class="caret"></span>--}}
        {{--                    </a>--}}

        {{--                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">--}}
        {{--                        <a class="dropdown-item" href="{{ route('auth.logout') }}"--}}
        {{--                           onclick="event.preventDefault();--}}
        {{--                                 document.getElementById('logout-form').submit();">--}}
        {{--                            {{ __('Logout') }}--}}
        {{--                        </a>--}}

        {{--                        <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" style="display: none;">--}}
        {{--                            @csrf--}}
        {{--                        </form>--}}
        {{--                    </div>--}}
        {{--                </li>--}}
        {{--            @endguest--}}
        </ul>
    </div>
</nav>
