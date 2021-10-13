@include('admin.partials.header')

  <!-- END: Head-->

  <!-- BEGIN: Body-->

  <body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="">

      <!-- BEGIN: Header-->
      @include('admin.partials.navbar')

      <!-- END: Header-->


      <!-- BEGIN: Main Menu-->
      @include('admin.partials.left_sidebar')
      <!-- END: Main Menu-->

      <!-- BEGIN: Content-->
    @yield('content')
      <!-- END: Content-->

    @include('admin.partials.footer')

  </body>
  <!-- END: Body-->

  </html>
