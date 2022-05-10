<html lang="es">
<!--<![endif]-->

<!-- Head BEGIN -->
<head>
  <meta charset="utf-8">
  <title>Movie Zone | Your cinema blog</title>

  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <meta content="Metronic Shop UI description" name="description">
  <meta content="Metronic Shop UI keywords" name="keywords">
  <meta content="keenthemes" name="author">

  <meta property="og:site_name" content="-CUSTOMER VALUE-">
  <meta property="og:title" content="-CUSTOMER VALUE-">
  <meta property="og:description" content="-CUSTOMER VALUE-">
  <meta property="og:type" content="website">
  <meta property="og:image" content="-CUSTOMER VALUE-"><!-- link to image for socio -->
  <meta property="og:url" content="-CUSTOMER VALUE-">

  <link rel="shortcut icon" href="{{asset("favicon2.ico")}}">

  <!-- Fonts START -->
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|PT+Sans+Narrow|Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css">
  <!-- Fonts END -->

  <!-- Global styles START -->
  <link href="{{asset("assets/front/plugins/font-awesome/css/font-awesome.min.css")}}" rel="stylesheet">
  <link href="{{asset("assets/front/plugins/bootstrap/css/bootstrap.min.css")}}" rel="stylesheet">
  <!-- Global styles END -->

  <!-- Page level plugin styles START -->
  <link href="{{asset("assets/front/plugins/fancybox/source/jquery.fancybox.css")}}" rel="stylesheet">
  <!-- Page level plugin styles END -->

  <!-- Theme styles START -->
  <link href="{{asset("assets/front/pages/css/components.css")}}" rel="stylesheet">
  <link href="{{asset("assets/front/corporate/css/style.css")}}" rel="stylesheet">
  <link href="{{asset("assets/front/corporate/css/style-responsive.css")}}" rel="stylesheet">
  <link href="{{asset("assets/front/corporate/css/themes/blue.css")}}" rel="stylesheet" id="style-color">
  <link href="{{asset("assets/front/corporate/css/custom.css")}}" rel="stylesheet">
  <!-- Theme styles END -->
</head>
<!-- Head END -->
<body class="corporate">
@include("theme.front.topbar")
@include("theme.front.header")
<div class="main">
    <div class="container">
        @yield("contenido")
    </div>
</div>
<footer class="footer text-center">
    <p class="pb-2">Desarrollado por Darnell Armas &copy; <?= date('Y'); ?> <a href="https://github.com/DarArmas/laravel_blog">Codigo Fuente</a></p>
</footer>

    <!-- Load javascripts at bottom, this will reduce page load time -->
    <!-- BEGIN CORE PLUGINS (REQUIRED FOR ALL PAGES) -->
    <!--[if lt IE 9]>
    <script src="assets/plugins/respond.min.js"></script>
    <![endif]-->
    <script src="{{asset("assets/front/plugins/jquery.min.js")}}" type="text/javascript"></script>
    <script src="{{asset("assets/front/plugins/jquery-migrate.min.js")}}" type="text/javascript"></script>
    <script src="{{asset("assets/front/plugins/bootstrap/js/bootstrap.min.js")}}" type="text/javascript"></script>
    <script src="{{asset("assets/front/corporate/scripts/back-to-top.js")}}" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->

    <!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->
    <script src="{{asset("assets/front/plugins/fancybox/source/jquery.fancybox.pack.js")}}" type="text/javascript"></script><!-- pop up -->
    <script src="{{asset("assets/front/corporate/scripts/layout.js")}}" type="text/javascript"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            Layout.init();
            Layout.initTwitter();
        });
    </script>
    <!-- scripts de paginas especificas -->
    @yield("scripts")
    <!-- END PAGE LEVEL JAVASCRIPTS -->
</body>