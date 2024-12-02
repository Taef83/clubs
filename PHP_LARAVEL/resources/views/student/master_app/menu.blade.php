<nav class="navbar navbar-expand-lg navbar-light shadowe">
        <div class="container d-flex justify-content-between align-items-center">

            <a class="navbar-brand text-success logo h1 align-self-center" href="{{route('student.home')}}">
                <img src="{{asset('logo.png')}}" height="50px">
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                        <li class="nav-item {{Route::is('student.home') ? 'active' : ''}}">
                            <a class="nav-link " href="{{route('student.home')}}">Home</a>
                        </li>
                        <li class="nav-item {{request()->is('*about*') ? 'active' : ''}}">
                            <a class="nav-link" href="{{route('student.about')}}">About</a>
                        </li>
                        <li class="nav-item {{request()->is('*clubs*') ? 'active' : ''}}">
                            <a class="nav-link" href="{{route('student.clubs')}}">Clubs</a>
                        </li>
                        <li class="nav-item {{request()->is('*contact*') ? 'active' : ''}}">
                            <a class="nav-link" href="{{route('student.contact')}}">Contact</a>
                        </li>
                    </ul>
                </div>
                <div class="navbar align-self-center d-flex">
                    <div class="d-lg-none flex-sm-fill mt-3 mb-4 col-7 col-sm-auto pr-3">
                        <div class="input-group">
                            <input type="text" class="form-control" id="inputMobileSearch" placeholder="Search ...">
                            <div class="input-group-text">
                                <i class="fa fa-fw fa-search"></i>
                            </div>
                        </div>
                    </div>
                    <a class="nav-icon d-none d-lg-inline" href="#" data-bs-toggle="modal" data-bs-target="#templatemo_search">
                        <i class="fa fa-fw fa-search text-white mr-2"></i>
                    </a>

                    @if(auth('students')->check())
                    <a class="nav-icon position-relative text-decoration-none" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">

                        Logout <i class="fa fa-fw fa-lock text-white mr-3"></i>
                    </a>
                    <a class="nav-icon position-relative text-decoration-none {{request()->is('*account') ? 'active2' : ''}}" href="{{route('student.account')}}">
                        Profile <i class="fa fa-fw fa-user text-white mr-1"></i>

                    </a>

                    <form id="logout-form" action="{{ route('student.logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    @else

                    <a class="nav-icon position-relative text-decoration-none {{request()->is('*login*') ? 'active2' : ''}}" href="{{route('student.login.options')}}">
                        Login
                    </a>
                    <a class="nav-icon position-relative text-decoration-none {{request()->is('*register*') ? 'active2' : ''}}" href="{{route('student.register.options')}}">
                        Register
                    </a>
                    @endif
                </div>
            </div>

        </div>
    </nav>
