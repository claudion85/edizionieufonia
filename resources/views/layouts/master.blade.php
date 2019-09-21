<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Edizioni Eufonia - Admin</title>
        
        @include('layouts.head')
  </head>
<body>
          <!-- Begin page -->
          <div id="wrapper">
      @include('layouts.topbar')
      @if(Auth::user()->isAdmin==1)
      {
      @include('layouts.sidebar')
      }
      @else{
        @include('layouts.sidebar-vendor')
      }
      @endif
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
      @yield('content')
                </div> <!-- content -->
    @include('layouts.footer')    
            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->
    </div>
    <!-- END wrapper -->
    @include('layouts.footer-script')    
    </body>
</html>