<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">

{{--head section--}}
@include('admin.layout.head')

{{--Start body--}}
<body class="vertical-layout vertical-menu-modern 1-column menu-expanded blank-page blank-page" data-open="click"
      data-menu="vertical-menu-modern" data-col="1-column">

{{--content section--}}
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            @yield('content-header')
        </div>
        <div class="content-body">
            @yield('content-body')
        </div>
    </div>
</div>

{{--scripts section--}}
@include('admin.layout.script')

{{--End body--}}
</body>

</html>
