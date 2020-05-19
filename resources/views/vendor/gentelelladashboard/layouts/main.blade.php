<!DOCTYPE html>
<html lang="en">
  <head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('head-title', config('gentelelladashboard.head-title', 'DASHBOARD'))</title>

    <!-- Bootstrap -->
    <link href="{{ asset('vendor/gentelelladashboard/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('vendor/gentelelladashboard/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

    @yield('head-assets')

    <!-- Custom Theme Style -->
    <link href="{{ asset('vendor/gentelelladashboard/css/custom.min.css') }}" rel="stylesheet">

    {!! Html::style('css/admin.css') !!}

    @yield('head-custom-assets')

  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">

            @include('gentelelladashboard::includes.menu-title')

            <div class="clearfix"></div>

            @include('gentelelladashboard::includes.profile-quick-info')

            <br />

            @include('gentelelladashboard::structure.menu')

            @include('gentelelladashboard::includes.menu-footer-buttons')

          </div>

        </div>

        @include('gentelelladashboard::structure.top-nav')

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          @yield('content')

        </div>
        <!-- /page content -->

        @include('gentelelladashboard::structure.footer')

      </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('vendor/gentelelladashboard/vendors/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('vendor/gentelelladashboard/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>

    {{ Html::script('vendor/bootbox/bootbox.min.js') }}

    <script>
        window.APP = {
            base_url: "{{ url('/') }}"
        }
    </script>

    @include('js-vars')
    @include('notifications.toastr-messages')

    @yield('footer-assets')

    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{ asset('vendor/gentelelladashboard/js/custom.min.js') }}"></script>

    {!! Html::script('js/admin.js') !!}

    @yield('footer-custom-asses')

  </body>
</html>
