<nav class="navbar navbar-expand-sm no-gutters d-flex justify-content-md-center py-xl-3 py-0">
    <div class="row no-gutters container-fluid d-flex flex-md-wrap">
        <div class="col-xl-4 col-md-12 col-12 d-flex">
            <button aria-controls="collapsibleNavbar" aria-expanded="false" aria-label="Toggle navigation" class="btn-header navbar-toggler" data-target="#collapsibleNavbar" data-toggle="collapse" type="button"><span class="fa fa-bars btn-icon"></span></button>
            <div class="img-header d-flex ml-xl-5 mx-auto"><img alt="" class="img-fluid" src="/images/HapoLearnLogo.png"></div>
        </div>
        <div class="col-xl-8 col-12 col-md-12 justify-content-xl-end collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="menu-header navbar-nav mr-xl-4">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('course') }}">all&nbsp;courses</a>
                </li>
                @if (Auth::check())
                @csrf
                <li class="nav-item">
                    <a class="nav-link" href="#">list&nbsp;lesson</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">lesson&nbsp;detail</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">profile</a>
                </li>
                <li class="nav-item logout">
                    <a class="nav-link" href="#">
                        <form action="{{ route('logout') }}" method="post" class="form-logout">
                            @csrf
                            <input type="submit" class="d-none">logout
                        </form>
                    </a>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" data-target="#myModal" data-toggle="modal" href="#">login/register</a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
@include('auth.login-register')
