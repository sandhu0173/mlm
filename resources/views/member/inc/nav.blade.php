<div class="navbar-custom">
    <ul class="list-unstyled topnav-menu float-right mb-0">
        
        
        
        <li class="dropdown notification-list topbar-dropdown">
            <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#"
               role="button" aria-haspopup="false" aria-expanded="false">
               @if(Auth::user()->image)
               <img src="{{ asset(Auth::user()->image) }}" alt="user-image" class="rounded-circle">
               @else
                <img src="{{ asset('img/avatar.svg') }}" alt="user-image" class="rounded-circle">
                @endif
                <span class="pro-user-name ml-1">
                    {{ Auth::user()->name }} <i class="mdi mdi-chevron-down"></i>
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                <div class="dropdown-header noti-title">
                    <h6 class="text-overflow m-0">Welcome !</h6>
                </div>
                <a href="{{ url('member/profile') }}" class="dropdown-item notify-item">
                    <i class="fa fa-user"></i>
                    <span>Profile</span>
                </a>
                <div class="dropdown-divider"></div>
                @if(Auth::user()->isImpersonating())
            <a class="dropdown-item notify-item" href="{{ url('admin/member/logout') }}" >
                <i class="fa fa-log-out"></i>                        
                {{ __('Logout') }}
                                    </a>
                
            @else
            <a class="dropdown-item notify-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fa fa-log-out"></i>                        
                {{ __('Logout') }}
                                    </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
            @endif
            </div>
        </li>
            </ul>
    <div class="logo-box">
        <a href="{{ url('member') }}" class="logo text-center">
            <span class="logo-lg">
                <img src="{{ asset(Helper::setting('logo')) }}" alt="">
            </span>
            <span class="logo-sm">
                <img src="{{ asset(Helper::setting('logo')) }}" alt="favicon" height="32" width="32">
            </span>
        </a>
    </div>

    <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
        <li>
            <button class="button-menu-mobile waves-effa fact waves-light">
                <i class="fa fa-bars"></i>
            </button>
        </li>
        <li>
            <a class="navbar-toggle nav-link" data-toggle="collapse" data-target="#topnav-menu-content">
                <div class="lines">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </a>
        </li>
    </ul>
</div>