<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">
<!-- ==========================head=========================== -->
@include('admin.partial.head')


<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

  <!-- ==========================navbar=========================== -->
  @include('admin.partial.navbar')

  <!-- ==========================sidebar=========================== -->
  @include('admin.partial.sidebar')

  <div class="main-menu-content">
    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">


      <li class=" nav-item"><a href="email-application.html"><i class="la la-home"></i><span class="menu-title" data-i18n="">الرئسيه </span></a>
      </li>

      <li class=" nav-item"><a href="email-application.html"><i class="la la-car"></i><span class="menu-title" data-i18n="">الطالبات </span></a>
      </li>
      <li class=" nav-item"><a href="email-application.html"><i class="la  icon-layers"></i><span class="menu-title" data-i18n="">التقارير </span></a>
      </li>


    </ul>
  </div>
  </div> -->
  <!-- ==========================content=========================== -->
  @yield('content');

  <!-- ==========================footer=========================== -->
  @include('admin.partial.footer')

  <!-- ==========================script=========================== -->
  @include('admin.partial.script')

</body>

</html>