<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">

{{--head section--}}
@include('admin.layout.head')

{{--Start body--}}
<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

{{--navbar section--}}
@include('admin.layout.navbar')

{{--sidebar section--}}
@include('admin.layout.sidebar')

{{--content section--}}
<div class="app-content content mt-0 pt-0">
    <div class="content-wrapper">
        <div class="content-header row">
            @yield('content-header')
        </div>
        <div class="content-body">
            @yield('content-body')
        </div>
    </div>
</div>

{{--footer section--}}
@include('admin.layout.footer')

{{--modals section--}}
@yield('modals')

{{--scripts section--}}
@include('admin.layout.script')

{{--End body--}}
</body>

</html>
