<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow expanded" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            {{--Home--}}
            <li class="nav-item {{ (request()->is('/')) || (request()->is('dashboard')) ? 'active' : '' }}">
                <a href="/">
                    <i class="la la-home"></i>
                    <span class="menu-title" data-i18n="">الرئسيه </span>
                </a>
            </li>
            {{--Orders--}}
            <li class="nav-item {{ (request()->is('orders')) ? 'active' : '' }}">
                <a href="/orders">
                    <i class="la la-car"></i>
                    <span class="menu-title" data-i18n="">الطلبيات </span>
                </a>
            </li>
            {{--Reports--}}
            <li class="nav-item {{ (request()->is('reports')) ? 'active' : '' }}">
                <a href="/reports"><i class="la  icon-layers"></i>
                    <span class="menu-title" data-i18n="">التقارير </span>
                </a>
            </li>
        </ul>
    </div>
</div>
