<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Busca Piezas</title>
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
                    <a class="navbar-brand" href="index.php">Busca Piezas</a>
                </div>
                <!-- Top Menu Items -->
                <ul class="nav navbar-right top-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['username']; ?><b class="caret"></b></a>
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
                            <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Menu</a>
                        </li>
                        <li>
                            <a href="<?= site_url('/Create_parts_control/urlBP'); ?>"><i class="fa fa-wrench"></i> Registro</a>
                        </li>
                        <li>
                            <a href="tables.html"><i class="fa fa-search"></i> Buscar</a>
                        </li>
                        <li>
                            <a href="forms.html"><i class="fa fa-area-chart"></i> Reportes</a>
                        </li>
                        <li>
                            <a href="http://localhost/registerparts/"><i class="fa fa-plus"></i> Administrador</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </nav>

            <div id="page-wrapper">
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                Accesos
                            </h1>
                            <ol class="breadcrumb">
                                <li class="active">
                                    <i class="fa fa-dashboard"></i> Busca Piezas
                                </li>
                            </ol>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-5">
                                            <i class="fa fa-wrench fa-5x"></i>
                                        </div>
                                        <div class="col-xs-12 text-right">
                                            <div class="huge">1</div>
                                            <div>Registro Piezas!</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="<?= site_url('/Create_parts_control/urlBP'); ?>">
                                    <div class="panel-footer">
                                        <span class="pull-left">Ir</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-green">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-5">
                                            <i class="fa fa-search fa-5x"></i>
                                        </div>
                                        <div class="col-xs-12 text-right">
                                            <div class="huge">2</div>
                                            <div>Buscar Piezas!</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="#">
                                    <div class="panel-footer">
                                        <span class="pull-left">Ir</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-yellow">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-5">
                                            <i class="fa fa-area-chart fa-5x"></i>
                                        </div>
                                        <div class="col-xs-12 text-right">
                                            <div class="huge">3</div>
                                            <div>Reportes!</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="#">
                                    <div class="panel-footer">
                                        <span class="pull-left">Ir</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-red">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-5">
                                            <i class="fa fa-plus fa-5x"></i>
                                        </div>
                                        <div class="col-xs-12 text-right">
                                            <div class="huge">4</div>
                                            <div>Administrador!</div>
                                        </div>
                                    </div>
                                </div>
<!--                                http://www.devetechnologies.com/RegisterParts/-->
                                <a href="http://localhost/registerparts/">
                                    <div class="panel-footer">
                                        <span class="pull-left">Ir</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <script src="<?= base_url() ?>js/Jquery-2.1.1.min.js"></script>
        <script src="<?= base_url() ?>js/Bootstrap.min.js"></script>
        <script src="<?= base_url() ?>js/plugins/morris/raphael.min.js"></script>
        <script src="<?= base_url() ?>js/plugins/morris/morris.min.js"></script>
        <script src="<?= base_url() ?>js/plugins/morris/morris-data.js"></script>
        <script src="<?= base_url() ?>js/idleTimer/idle-timer.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>js/funciones.js" type="text/javascript"></script>
    </body>
</html>
