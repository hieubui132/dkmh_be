<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- End Required meta tags -->
        <!-- Begin SEO tag -->
        <title> Starter Template | Looper - Bootstrap 4 Admin Theme </title>
        <meta property="og:title" content="Starter Template">
        <meta name="author" content="Beni Arisandi">
        <meta property="og:locale" content="en_US">
        <meta name="description" content="Responsive admin theme build on top of Bootstrap 4">
        <meta property="og:description" content="Responsive admin theme build on top of Bootstrap 4">
        <link rel="canonical" href="https://uselooper.com">
        <meta property="og:url" content="https://uselooper.com">
        <meta property="og:site_name" content="Looper - Bootstrap 4 Admin Theme">
        <script type="application/ld+json">
            {
              "name": "Looper - Bootstrap 4 Admin Theme",
              "description": "Responsive admin theme build on top of Bootstrap 4",
              "author":
              {
                "@type": "Person",
                "name": "Beni Arisandi"
              },
              "@type": "WebSite",
              "url": "",
              "headline": "Starter Template",
              "@context": "http://schema.org"
            }
        </script><!-- End SEO tag -->
        <!-- FAVICONS -->
        <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('apple-touch-icon.png') }}">
        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
        <meta name="theme-color" content="#3063A0">
        <!-- End FAVICONS -->
        <!-- GOOGLE FONT -->
        <link href="https://fonts.googleapis.com/css?family=Fira+Sans:400,500,600" rel="stylesheet">
        <!-- End GOOGLE FONT -->
        <!-- BEGIN PLUGINS STYLES -->
        <link rel="stylesheet" href="{{ asset('admin_assets/vendor/open-iconic/font/css/open-iconic-bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('admin_assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}">
        <!-- END PLUGINS STYLES -->
        <!-- BEGIN THEME STYLES -->
        <link rel="stylesheet" href="{{ asset('admin_assets/stylesheets/theme.min.css') }}" data-skin="default">
        <link rel="stylesheet" href="{{ asset('admin_assets/stylesheets/theme-dark.min.css') }}" data-skin="dark">
        <link rel="stylesheet" href="{{ asset('admin_assets/stylesheets/custom.css') }}">
        <script>
            var skin = localStorage.getItem('skin') || 'default';
            var isCompact = JSON.parse(localStorage.getItem('hasCompactMenu'));
            var disabledSkinStylesheet = document.querySelector('link[data-skin]:not([data-skin="' + skin + '"])');
            // Disable unused skin immediately
            disabledSkinStylesheet.setAttribute('rel', '');
            disabledSkinStylesheet.setAttribute('disabled', true);
            // add flag class to html immediately
            if (isCompact == true) document.querySelector('html').classList.add('preparing-compact-menu');
        </script><!-- END THEME STYLES -->
        @stack('stylesheets')
    </head>
    <body>
        <!-- .app -->
        <div class="app">
            <!--[if lt IE 10]>
            <div class="page-message" role="alert">You are using an <strong>outdated</strong> browser. Please <a class="alert-link" href="http://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</div>
            <![endif]-->
            <!-- .app-header -->
            @include('admin.layouts.app-header')
            <!-- /.app-header -->
            <!-- .app-aside -->
            @include('admin.layouts.app-aside')
            <!-- /.app-aside -->
            <!-- .app-main -->
            <main class="app-main">
                <!-- .wrapper -->
                <div class="wrapper">
                    <!-- .page -->
                    @yield('content')
                    <!-- /.page -->
                </div>
                <!-- /.wrapper -->
            </main>
            <!-- /.app-main -->
        </div>
        <!-- /.app -->
        <!-- BEGIN BASE JS -->
        <script src="{{ asset('admin_assets/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('admin_assets/vendor/popper.js/umd/popper.min.js') }}"></script>
        <script src="{{ asset('admin_assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script> <!-- END BASE JS -->
        <!-- BEGIN PLUGINS JS -->
        <script src="{{ asset('admin_assets/vendor/pace-progress/pace.min.js') }}"></script>
        <script src="{{ asset('admin_assets/vendor/stacked-menu/js/stacked-menu.min.js') }}"></script>
        <script src="{{ asset('admin_assets/vendor/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script> <!-- END PLUGINS JS -->
        <!-- BEGIN THEME JS -->
        <script src="{{ asset('admin_assets/javascript/theme.min.js') }}"></script> <!-- END THEME JS -->
        @stack('javascripts')
    </body>
</html>