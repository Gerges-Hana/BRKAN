<nav
    class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-dark navbar-shadow">
    <div class="navbar-wrapper">
        {{-- Main header --}}
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                {{-- Mobile sidebar button --}}
                <li class="nav-item mobile-menu d-md-none mr-auto">
                    <a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#">
                        <i class="ft-menu font-large-1"></i>
                    </a>
                </li>
                {{-- Logo & Company name --}}
                <li class="nav-item mr-auto">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img class="brand-logo" alt="modern admin logo"
                            src="{{ asset('/app-assets/images/logo/logo.png') }}">
                        <h3 class="brand-text">لوحة التحكم</h3>
                    </a>
                </li>
                {{-- Toggle sidebar button --}}
                <li class="nav-item d-none d-md-block float-right">
                    <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
                        <i class="toggle-icon ft-toggle-right font-medium-3 white" data-ticon="ft-toggle-right"></i>
                    </a>
                </li>
                {{-- Mobile navebar button --}}
                <li class="nav-item d-md-none">
                    <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile">
                        <i class="la la-ellipsis-v"></i>
                    </a>
                </li>
            </ul>
        </div>
        {{-- Navbar Content --}}
        <div class="navbar-container content">
            <div class="collapse navbar-collapse" id="navbar-mobile">
                {{-- Left Navbar --}}
                <ul class="nav navbar-nav mr-auto float-left">
                    {{-- Maximize screen --}}
                    <!-- <li class="nav-item d-none d-md-block">
                        <a class="nav-link nav-link-expand" href="#">
                            <i class="ficon ft-maximize"></i>
                        </a>
                    </li> -->
                    {{-- Search --}}
                    <!-- <li class="nav-item nav-search">
                        <a class="nav-link nav-link-search" href="#">
                            <i class="ficon ft-search"></i>
                        </a>
                        <div class="search-input">
                            <input class="input" type="text" placeholder="Explore Modern...">
                        </div>
                    </li> -->
                </ul>
                {{-- Right Navbar --}}
                <ul class="nav navbar-nav float-right">
                    {{-- Admin --}}
                    <li class="dropdown dropdown-user nav-item">
                        {{-- Hello Admin --}}
                        <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                            <span class="mr-1">مرحبا,
                                <span class="user-name text-bold-700">{{ auth()->user()?->name }}</span>
                            </span>
                            <span class="avatar avatar-online">
                                <img src="{{ asset('/app-assets/images/portrait/small/avatar-s-19.png') }}"
                                    alt="avatar">
                                <i></i>
                            </span>
                        </a>


                        {{-- Admin Profile --}}
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#"><i class="ft-user"></i> صفحتى الشخصية</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="ft-power"></i> تسجيل الخروج
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>


                    {{-- Notifications --}}
                    <li class="dropdown dropdown-notification nav-item">
                        <a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon ft-bell"></i>
                            <span id="orderCount"
                                class="badge badge-pill badge-default badge-danger badge-default badge-up badge-glow">0</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                            <li class="dropdown-menu-header">
                                <h6 class="dropdown-header m-0">
                                    <span class="grey darken-2">الاشعارات</span>
                                </h6>
                                <span class="notification-tag badge badge-default badge-danger float-right m-0">
                                    <span id="orderCount"></span> جديدة
                                </span>
                            </li>
                            <li class="scrollable-container media-list w-100">

                                <div id="notificationList" class="list-group">
                                </div>

                            </li>
                            <li class="dropdown-menu-footer">
                                <a class="dropdown-item text-muted text-center" href="{{url('/orders')}}">
                                    عرض كل الطلبيات
                                </a>
                            </li>
                        </ul>
                    </li>




                </ul>
            </div>
        </div>
    </div>
</nav>