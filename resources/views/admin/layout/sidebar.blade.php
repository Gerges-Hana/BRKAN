<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow expanded" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            {{--Home--}}
            {{-- @can('الرئسيه') --}}
                <li class="nav-item {{ (request()->is('/')) || (request()->is('dashboard')) ? 'active' : '' }}">
                    <a href="/">
                        <i class="la la-home"></i>
                        <span class="menu-title" data-i18n="">الرئسيه </span>
                    </a>
                </li>
            {{-- @endcan --}}

            {{-- Orders
            @can(' الطلبيات')
                <li class=" nav-item {{ (request()->is('orders') || request()->is('orders/OldPurchaseOrders') || request()->is('orders/todayPurchaseOrders') || request()->is('orders/commingPurchaseOrders')) ? 'open' : '' }}">
                    <a href="#">
                        <i class="la la-car"></i>
                        <span class="menu-title" data-i18n="nav.dash.main">الطلبيات</span>
                    </a>
                    <ul class="menu-content">
                        <li class="nav-item {{ (request()->is('orders')) ? 'active' : '' }}">
                            <a class="" href="/orders" data-i18n="nav.dash.ecommerce">جميع الطلبيات</a>
                        </li>
                        <li class="nav-item {{ (request()->is('orders/OldPurchaseOrders')) ? 'active' : '' }}">
                            <a href="/orders/OldPurchaseOrders" data-i18n="nav.dash.sales">الطلبيات السابقه</a>
                        </li>
                        <li class="nav-item {{ (request()->is('orders/todayPurchaseOrders')) ? 'active' : '' }}">
                            <a href="/orders/todayPurchaseOrders" data-i18n="nav.dash.crypto">طلبيات اليوم </a>
                        </li>
                        <li class="nav-item {{ (request()->is('orders/commingPurchaseOrders')) ? 'active' : '' }}">
                            <a href="/orders/commingPurchaseOrders" data-i18n="nav.dash.sales">الطلبيات القادمه</a>
                        </li>
                    </ul>
                </li>
            @endcan --}}

            {{--Reports--}}
            {{-- @can(' التقارير')
                <li class="nav-item {{ (request()->is('reports*')) ? 'active' : '' }}">
                    <a href="/reports"><i class="la  icon-layers"></i>
                        <span class="menu-title" data-i18n="">التقارير </span>
                    </a>
                </li>
            @endcan --}}

            {{--Roles--}}
            {{-- @can(' القواعد') --}}
                <li class="nav-item {{ (request()->is('roles*')) ? 'active' : '' }}">
                    <a href="/roles">
                        <i class="la  ft-unlock"></i>
                        <!-- <i class="la  icon-permission"></i> -->
                        <span class="menu-title" data-i18n="">الصالحيات </span>
                    </a>
                </li>
            {{-- @endcan --}}

            {{--Users--}}
            {{-- @can('الشركات') --}}
                <li class="nav-item {{ (request()->is('company*')) ? 'active' : '' }}">
                    <a href="/company"><i class="la  icon-users"></i>
                        <span class="menu-title" data-i18n="">الشركات </span>
                    </a>
                </li>
            {{-- @endcan --}}
            
            {{-- @can('طلبات المنشئه') --}}
                <li class="nav-item {{ (request()->is('users*')) ? 'active' : '' }}">
                    <a href="/users"><i class="la  icon-users"></i>
                        <span class="menu-title" data-i18n="">طلبات المنشئه </span>
                    </a>
                </li>
            {{-- @endcan --}}


            {{-- @can('المستخدمين') --}}
                <li class="nav-item {{ (request()->is('users*')) ? 'active' : '' }}">
                    <a href="/users"><i class="la  icon-users"></i>
                        <span class="menu-title" data-i18n="">المستخدمين </span>
                    </a>
                </li>
            {{-- @endcan --}}

            {{-- @can('المستخدمين') --}}
                <li class="nav-item {{ (request()->is('users*')) ? 'active' : '' }}">
                    <a href="{{ route('admin.activation_requests.index') }}"><i class="la la-check-circle"></i>
                        <span class="menu-title" data-i18n="">طلبات التفعيل</span>
                    </a>
                </li>
            {{-- @endcan --}}


            {{-- @can(' حالات التوصيل')
                <li class="nav-item {{ (request()->is('status*')) ? 'active' : '' }}">
                    <a href="/status"><i class="la icon-settings"></i>
                        <span class="menu-title" data-i18n="">حالات التوصيل </span>
                    </a>
                </li>
            @endcan --}}

            {{-- <li class="nav-item {{ (request()->is('orders/updates/list')) ? 'active' : '' }}">
                <a href="/orders/updates/list"><i class="ficon ft-bell"></i>
                    <span class="menu-title" data-i18n="">التحديثات </span>
                </a>
            </li> --}}
        </ul>
    </div>
</div>
