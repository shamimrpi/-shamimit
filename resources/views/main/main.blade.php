  @include('main.header')
  @include('main.aside')

  <!-- =============================================== -->
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
        @yield('body_content')
  </div>
  <!-- /.content-wrapper -->

  @include('main.footer')
