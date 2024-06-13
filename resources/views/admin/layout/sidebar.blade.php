<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow expanded" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            {{--Home--}}
            @can('الرئسيه')
                <li class="nav-item {{ (request()->is('/')) || (request()->is('dashboard')) ? 'active' : '' }}">
                    <a href="/">
                        <i class="la la-home"></i>
                        <span class="menu-title" data-i18n="">الرئسيه </span>
                    </a>
                </li>
            @endcan


            {{--Orders--}}
            @can(' الطلبيات')
            <li class="nav-item {{ (request()->is('orders')) ? 'active' : '' }}">
                <a href="/orders">
                    <i class="la la-car"></i>
                    <span class="menu-title" data-i18n="">الطلبيات </span>
                </a>
            </li>
            @endcan

            {{--Reports--}}
            @can(' التقارير')
            <li class="nav-item {{ (request()->is('reports')) ? 'active' : '' }}">
                <a href="/reports"><i class="la  icon-layers"></i>
                    <span class="menu-title" data-i18n="">التقارير </span>
                </a>
            </li>
            @endcan

            {{--Roles--}}
            @can(' القواعد')
            <li class="nav-item {{ (request()->is('roles')) ? 'active' : '' }}">
                <a href="/roles">
                    <i class="la  ft-unlock"></i>
                    <!-- <i class="la  icon-permission"></i> -->
                    <span class="menu-title" data-i18n="">القواعد </span>
                </a>
            </li>
            @endcan

            {{--Users--}}
            @can(' المستخدمين')
            <li class="nav-item {{ (request()->is('users')) ? 'active' : '' }}">
                <a href="/users"><i class="la  icon-users"></i>
                    <span class="menu-title" data-i18n="">المستخدمين </span>
                </a>
            </li>
            @endcan


            @can(' حالات التوصيل')
            <li class="nav-item {{ (request()->is('status')) ? 'active' : '' }}">
                <a href="/status"><i class="la icon-settings"></i>
                    <span class="menu-title" data-i18n="">حالات التوصيل </span>
                </a>
            </li>
            @endcan
        </ul>
    </div>
</div>
