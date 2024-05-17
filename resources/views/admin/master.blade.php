<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">

{{--head section--}}
@include('admin.partial.head')

{{--Start body--}}
<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar" data-open="click"
      data-menu="vertical-menu-modern" data-col="2-columns">

{{--navbar section--}}
@include('admin.partial.navbar')

{{--sidebar section--}}
@include('admin.partial.sidebar')

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
@include('admin.partial.footer')

{{--scripts section--}}
@include('admin.partial.script')

{{--End body--}}
</body>

</html>
