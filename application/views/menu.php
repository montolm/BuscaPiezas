<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- Bootstrap Core CSS -->
        <link href="<?= base_url() ?>css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="<?= base_url() ?>css/sb-admin.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="<?= base_url() ?>css/plugins/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="<?= base_url() ?>font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
    <body>
        <div id="wrapper">
            <!-- Navigation -->

            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->

                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="form-group col-md-1">
                    <img src="<?= base_url() ?>images/Logo_busca_piezas.png" class="img-circle img-responsive" width="40" height="50">
                </div>
                <a class="navbar-brand" href="index.php" style="margin-left: -100px">Busca Piezas</a>
                <!-- Top Menu Items -->
                <ul class="nav navbar-right top-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><?php echo $_SESSION['username']; ?><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="#"><i class="fa fa-fw fa-user"></i> Perfil</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-fw fa-envelope"></i> Mensaje</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-fw fa-gear"></i>Ajustes</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="<?= site_url('/User_control/urlLogin'); ?>"><i class="fa fa-fw fa-power-off"></i> Salir</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav">
                        <li class="active">
                            <a href="<?= site_url('/User_control/urlMenu'); ?>"><i class="fa fa-fw fa-dashboard"></i> Menu</a>
                        </li>
                        <li>
                            <a href="<?= site_url('/Create_parts_control/urlBP'); ?>"><i class="fa fa-wrench"></i> Registro</a>
                        </li>
                        <li>
                            <a href="<?= site_url('/Search_parts_control/index'); ?>"><i class="fa fa-search"></i> Buscar</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-area-chart"></i> Reportes</a>
                        </li>
                        <li>
                            <a href="http://localhost/registerparts/" target="_blank"><i class="fa fa-plus"></i> Administrador</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <script src="<?= base_url() ?>js/plugins/morris/raphael.min.js"></script>
        <script src="<?= base_url() ?>js/plugins/morris/morris.min.js"></script>
        <script src="<?= base_url() ?>js/plugins/morris/morris-data.js"></script>
    </body>
</html>
