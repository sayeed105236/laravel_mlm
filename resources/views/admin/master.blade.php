@include('admin.layouts.header')

  <!-- END: Head-->

  <!-- BEGIN: Body-->

  <body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="">

      <!-- BEGIN: Header-->
      @include('admin.layouts.navbar')

      <!-- END: Header-->


      <!-- BEGIN: Main Menu-->
      @include('admin.layouts.left_sidebar')
      <!-- END: Main Menu-->

      <!-- BEGIN: Content-->
    @yield('content')
      <!-- END: Content-->

    @include('admin.layouts.footer')

  </body>
  <!-- END: Body-->

  </html>
