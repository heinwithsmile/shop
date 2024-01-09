<!DOCTYPE html>
<html lang="en">

@include('admin.layouts.head')

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        @include('admin.layouts.header')
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        @yield('main-content')
        <!-- /.container-fluid -->

      </div>
    </div>
      <!-- End of Main Content -->
      {{-- @include('admin.layouts.footer') --}}
    
</body>

</html>