<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- End Required meta tags -->
        <!-- Begin SEO tag -->
        <title> Sign In | {{ env('APP_TITLE') }} </title>
        <meta property="og:title" content="Sign In">
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
              "headline": "Sign In",
              "@context": "http://schema.org"
            }
        </script><!-- End SEO tag -->
        <!-- Favicons -->
        <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('admin_assets/apple-touch-icon.png') }}">
        <link rel="shortcut icon" href="{{ asset('admin_assets/favicon.ico') }}">
        <meta name="theme-color" content="#3063A0">
        <!-- Google font -->
        <link href="https://fonts.googleapis.com/css?family=Fira+Sans:400,500,600" rel="stylesheet">
        <!-- End Google font -->
        <!-- BEGIN PLUGINS STYLES -->
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
    </head>
    <body>
        <!--[if lt IE 10]>
        <div class="page-message" role="alert">You are using an <strong>outdated</strong> browser. Please <a class="alert-link" href="http://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</div>
        <![endif]-->
        <!-- .auth -->
        <main class="auth">
            <header id="auth-header" class="auth-header" style="background-image: url({{ asset('shop-music-baner.jpg')}});">
                <h1>
                    <img height="200" viewbox="0 0 351 100" src="{{ asset('logo-white.png') }}" alt="">
                    <span class="sr-only">Đăng nhập</span>
                </h1>
            </header>
            <!-- form -->
            <form class="auth-form" action="{{ route('admin.auth.login') }}" method="POST">
                @csrf
                @if($errors->has('credentials'))
                    <p class="mb-2 error">{{ $errors->first('credentials') }}</p>
                @endif
                <!-- .form-group -->
                <div class="form-group">
                    <div class="form-label-group">
                        <input type="text" id="inputUser" name="username" class="form-control" placeholder="Username or Email enter" autofocus="">
                        <label for="inputUser">Username or Email</label>
                    </div>
                </div>
                <!-- /.form-group -->
                <!-- .form-group -->
                <div class="form-group">
                    <div class="form-label-group">
                        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password enter">
                        <label for="inputPassword">Password</label>
                    </div>
                </div>
                <!-- /.form-group -->
                <!-- .form-group -->
                <div class="form-group">
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Đăng nhập</button>
                </div>
                <!-- /.form-group -->
                <!-- .form-group -->
                <div class="form-group text-center">
                    <div class="custom-control custom-control-inline custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="remember-me"> <label class="custom-control-label" for="remember-me">Keep me sign in</label>
                    </div>
                </div>
                <!-- /.form-group -->
                <!-- recovery links -->
                <div class="text-center pt-3">
                    <a href="auth-recovery-username.html" class="link">Forgot Username?</a> <span class="mx-2">·</span> <a href="auth-recovery-password.html" class="link">Forgot Password?</a>
                </div>
                <!-- /recovery links -->
            </form>
            <!-- /.auth-form -->
            <!-- copyright -->
            <footer class="auth-footer"> © 2018 All Rights Reserved. <a href="#">Privacy</a> and <a href="#">Terms</a>
            </footer>
        </main>
        <!-- /.auth -->
        <!-- BEGIN BASE JS -->
        <script src="{{ asset('admin_assets/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('admin_assets/vendor/popper.js/umd/popper.min.js') }}"></script>
        <script src="{{ asset('admin_assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script> <!-- END BASE JS -->
        <!-- BEGIN PLUGINS JS -->
        <script src="{{ asset('admin_assets/vendor/particles.js/particles.js') }}"></script>
        <script>
            /**
             * Keep in mind that your scripts may not always be executed after the theme is completely ready,
             * you might need to observe the `theme:load` event to make sure your scripts are executed after the theme is ready.
             */
            $(document).on('theme:init', () =>
            {
              /* particlesJS.load(@dom-id, @path-json, @callback (optional)); */
              particlesJS.load('auth-header', "{{ asset('admin_assets/javascript/pages/particles.json') }}");
            })
        </script> <!-- END PLUGINS JS -->
        <!-- BEGIN THEME JS -->
        <script src="{{ asset('admin_assets/javascript/theme.js') }}"></script> <!-- END THEME JS -->
    </body>
</html>