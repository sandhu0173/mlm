<div class="navbar-custom">
    <ul class="list-unstyled topnav-menu float-right mb-0">
        <li class="notification-list d-none d-sm-block">
            <div class="mt-1" id="google_translate_element"></div>
        </li>
        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle  waves-effect" data-toggle="dropdown" href="#" role="button"
               aria-haspopup="false" aria-expanded="false">
                <i class="fa fa-bell noti-icon"></i>
                <span class="badge badge-danger rounded-circle noti-icon-badge">
                0
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-lg">
                <div class="dropdown-item noti-title">
                    <h5 class="m-0 text-dark">
                        <span class="float-right">
                            <a href="{{ url('admin/support-ticket/clear') }}"
                               class="text-dark"><small>Clear All</small></a>
                        </span>
                        Notification
                    </h5>
                </div>
                <div class="slimscroll noti-scroll">
                                    </div>
                <a href="{{ url('admin/support-ticket') }}"
                   class="dropdown-item text-center text-primary notify-item notify-all">View all
                    <i class="fa fa-arrow-right"></i>
                </a>
            </div>
        </li>
        <li class="dropdown d-none d-lg-inline-block">
            <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-toggle="fullscreen" href="#">
                <i class="fas fa-compress noti-icon"></i>
            </a>
        </li>
        <li class="dropdown notification-list topbar-dropdown">
            <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#"
               role="button" aria-haspopup="false" aria-expanded="false">
                <img src="{{ asset('img/avatar.svg') }}" alt="user-image" class="rounded-circle">
                <span class="pro-user-name ml-1">
                    Admin <i class="mdi mdi-chevron-down"></i>
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                <div class="dropdown-header noti-title">
                    <h6 class="text-overflow m-0">Welcome !</h6>
                </div>
                <a href="{{ url('admin/password/edit') }}" class="dropdown-item notify-item">
                    <i class="fe-user"></i>
                    <span>Change Password</span>
                </a>
               <!-- <a href="{{ url('admin/support-ticket') }}" class="dropdown-item notify-item">
                    <i class="fe-bell"></i>
                    <span>Support Tickets</span>
                </a>
                <a href="{{ url('admin/contact-inquiries') }}" class="dropdown-item notify-item">
                    <i class="fe-phone-forwarded"></i>
                    <span>Contact Inquiries</span>
                </a>-->
                <div class="dropdown-divider"></div>
                
                <a class="dropdown-item notify-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fe-log-out"></i>                        
                {{ __('Logout') }}
                                    </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
            </div>
        </li>
            </ul>
    <div class="logo-box">
        <a href="{{ url('admin/dashboard') }}" class="logo text-center">
            <span class="logo-lg">
                <img src="{{ asset(Helper::setting('logo')) }}" alt="">
            </span>
            <span class="logo-sm">
                <img src="https://d3oormgpearxmk.cloudfront.net/f0f657fd-c979-4e74-9ed6-dd5a95b960bf/images/favicon.png" alt="favicon" height="32" width="32">
            </span>
        </a>
    </div>

    <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
        <li>
            <button class="button-menu-mobile waves-effect waves-light">
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