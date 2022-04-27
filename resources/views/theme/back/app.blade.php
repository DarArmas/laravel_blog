<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href={{asset("assets/back/images/favicon.png")}}>
    <title>@yield("titulo", "Inicio") - Laravel Blog</title>
    <!-- Custom CSS -->
    <link href="{{asset("assets/back/libs/datatables.net-bs4/css/dataTables.bootstrap4.css")}}" rel="stylesheet">
    <link href="{{asset("assets/back/libs/toastr/build/toastr.min.css")}}" rel="stylesheet">
    <link href="{{asset("assets/back/extra-libs/sweetalert2/sweetalert2.min.css")}}" rel="stylesheet">
    @yield("styles")
    <link href={{asset("assets/back/css/style.min.css")}} rel="stylesheet">
    
    <!--CSS dinamico-->
    
    <link href={{asset("assets/back/css/laravel-blog.css")}} rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
     <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
         <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        @include("theme.back.top_header");
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        @include("theme.back.aside");
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                @yield("contenido")
                <div class="modal fade" id="confirmar-eliminar" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Confirme esta accion</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          ¿Seguro desea eliminar este registro?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-success" data-dismiss="modal">No</button>
                          <button type="button" id="accion-eliminar" class="btn btn-danger">Si</button>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            @include('theme.back.footer')
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
        
    </div><!--fin del main wrapper-->
     <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src={{asset("assets/back/libs/jquery/dist/jquery.min.js")}}></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src={{asset("assets/back/libs/popper.js/dist/umd/popper.min.js")}}></script>
    <script src={{asset("assets/back/libs/bootstrap/dist/js/bootstrap.min.js")}}></script>
    <script src={{asset("assets/back/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js")}}></script>
    <script src={{asset("assets/back/extra-libs/sparkline/sparkline.js")}}></script>
    <!--Wave Effects -->
    <script src={{asset("assets/back/js/waves.js")}}></script>
    <!--Menu sidebar -->
    <script src={{asset("assets/back/js/sidebarmenu.js")}}></script>
    <!--Plugins -->
    <script src={{asset("assets/back/libs/jquery-validation/dist/jquery.validate.min.js")}}></script>
    <script src={{asset("assets/back/libs/jquery-validation/dist/localization/messages_es.js")}}></script>
    <script src="{{asset("assets/back/extra-libs/Datatables/datatables.min.js")}}"></script>
    <script src="{{asset("assets/back/libs/toastr/build/toastr.min.js")}}"></script>
    <script src="{{asset("assets/back/extra-libs/sweetalert2/sweetalert2.min.js")}}"></script>
    <!--Plugins de paginas especificas-->
    @yield("scriptsPlugins")
    <!--Scripts de paginas especificas-->
    @yield("scripts")
    <!--Custom JavaScript -->
    <script src={{asset("assets/back/js/custom.min.js")}}></script>
    <script src={{asset("assets/back/js/laravel-blog.js")}}></script>
</body>
</html>