<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet' type='text/css'/>
    <link type="text/css" rel="stylesheet" href="/css/bootstrap.css" />
    <link type="text/css" rel="stylesheet" href="/css/materialadmin.css" />
    <link type="text/css" rel="stylesheet" href="/css/font-awesome.css" />
    <link type="text/css" rel="stylesheet" href="/css/material-design-iconic-font.css" />

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

    <!-- BEGIN JAVASCRIPT -->
    <script src="/js/modules/materialadmin/libs/jquery/jquery-1.11.2.min.js"></script>
    <script src="/js/modules/materialadmin/libs/jquery/jquery-migrate-1.2.1.min.js"></script>
    <script src="/js/modules/materialadmin/libs/spin.js/spin.min.js"></script>
    <script src="/js/modules/materialadmin/libs/autosize/jquery.autosize.min.js"></script>
    <script src="/js/modules/materialadmin/libs/nanoscroller/jquery.nanoscroller.min.js"></script>
    <script src="/js/modules/materialadmin/core/cache/63d0445130d69b2868a8d28c93309746.js"></script>
    <script src="/js/modules/materialadmin/core/demo/Demo.js"></script>
    <!-- END JAVASCRIPT -->

</head>

<body class="menubar-hoverable header-fixed ">  
    <section class="section-account">
        <div class="img-backdrop" style="background-image: url('/backgrounds/background-login.jpg')"></div>
        <div class="spacer"></div>
        <div class="card contain-sm style-transparent">
            <div class="card-body">
                <div class="row">

                    @yield('content')
                    
                </div><!--end .row -->
            </div><!--end .card-body -->
        </div><!--end .card -->
    </section>

</body> 

</html>