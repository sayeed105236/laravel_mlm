<!DOCTYPE html>
<html class="loading dark-layout" lang="en" data-layout="dark-layout" data-textdirection="ltr">
<!-- BEGIN: Head-->

@include('frontend.partials.header')
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="">

  @include('frontend.partials.navbar')


    <!-- BEGIN: Main Menu-->
  @include('frontend.partials.left_sidebar')
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    @yield('frontend.content')
    <!-- END: Content-->

  @include('frontend.partials.footer')
</body>
<!-- END: Body-->

</html>
