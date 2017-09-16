<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Busca Piezas</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="<?= base_url() ?>css/bootstrap.min.css" rel="stylesheet">
<!--        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>css/dataTables.bootstrap.min.css">-->
        <link rel="stylesheet" href="<?= base_url() ?>css/style.css">
    </head>
    <?php include ('menu.php'); ?> 
    <body>
        <div class="container" style="margin-left: 20%; padding-top: 2%;"   >
            <form id="idPartForm">
                <div class="form-group col-xs-6 col-sm-5">
                    <label for="idSelectCategory">Sistemas:</label>
                    <select class="form-control" id="idSelectCategory">
                        <option value="0" saelected>Todos los sistemas</option>
                    </select>
                </div>
                <div class="form-group col-xs-6 col-sm-5">
                    <label for="idSelectVehiMotor">Vehiculos de motor:</label>
                    <select class="form-control" id="idSelectVehiMotor">
                        <option value="0" selected>Todos los vehiculos de motor</option>
                    </select>
                </div>
                <div class="form-group col-xs-6 col-sm-5">
                    <label for="idSelectMake">Marcas:</label>
                    <select class="form-control" id="idSelectMake">
                        <option value="0" selected>Todas las marcas</option>
                    </select>
                </div>
                <div class="form-group col-xs-6 col-sm-5">
                    <label for="idSelectModel">Modelos:</label>
                    <select class="form-control" id="idSelectModel">
                        <option value="0" selected>Todos los modelos</option>
                    </select>
                </div>
                <div class="form-group col-xs-6 col-sm-5">
                    <label for="idSelectGeneration">Generaciones:</label>
                    <select class="form-control" id="idSelectGeneration">
                        <option value="0" selected>Todas las generaciones</option>
                    </select>
                </div>
                <div class="form-group col-xs-6 col-sm-5">
                    <label for="idSelectType">Tipos:</label>
                    <select class="form-control" id="idSelectType">
                        <option value="0" selected>Todos los tipos de vehiculos</option>
                    </select>
                </div>
                <div class="form-group col-xs-6 col-sm-5">
                    <label for="idSelectGas">Combustibles:</label>
                    <select class="form-control" id="idSelectGas">
                        <option value="0" selected>Todos los combustibles</option>
                    </select>
                </div>
                <div class="form-group col-xs-6 col-sm-5">
                    <label for="idSelectPart">Estado:</label>
                    <select class="form-control" id="idSelectType">
                        <option value="1" selected>Nuevo</option>
                        <option value="2" selected>Usado</option>
                    </select>
                </div>
                <div class="form-group col-xs-8 col-sm-8">
                    <button type="button" class="btn btn-primary col-xs-2 " id="idButtonPart">Buscar</button>
                </div>
                <!-- Page Content -->
                <!-- First Featurette -->
                <div id="idContainerlist" style="display: none"> 
                    <div class="featurette" id="about">
                        <!------------------------code---------------start---------------->
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <br>
                                <table id="mytable" class="table table-bordred table-striped table-hover table-responsive">
                                    <thead>
                                    <th>
                                        <input type="checkbox" id="checkall" />
                                    </th>
                                    <th>Piezas</th>
                                    <th>Categorias</th>
                                    <th>Tipos de vehiculos</th>
                                    </thead>
                                    <tbody id="idBodyTable">
                                    </tbody>
                                </table>
                                <div class="clearfix"></div>
                                <ul class="pagination pull-right">
                                    <li class="disabled"><a href="#"><span class="glyphicon glyphicon-chevron-left"></span></a></li>
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li><a href="#"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="form-group col-xs-8 col-sm-8">
                            <button type="button" class="btn btn-primary col-xs-2 " id="idButtonSavePart">Guardar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <script src="<?php echo base_url(); ?>js/Jquery-2.1.1.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>js/Bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>js/Funciones.js" type="text/javascript"></script>
<!--        <script src="<?php echo base_url(); ?>js/jquery.dataTables.min.js" type="text/javascript"></script>-->
        <script src="//oss.maxcdn.com/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"></script>
        <script src="<?php echo base_url(); ?>js/Validate.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>js/createParts.js" type="text/javascript"></script>
<!--        <script src="<?php echo base_url(); ?>js/dataTables.bootstrap.min.js" type="text/javascript"></script>-->
        <script>
            $(document).ready(function () {
                $("#mytable #checkall").click(function () {
                    if ($("#mytable #checkall").is(':checked')) {
                        $("#mytable input[type=checkbox]").each(function () {
                            $(this).prop("checked", true);
                        });

                    } else {
                        $("#mytable input[type=checkbox]").each(function () {
                            $(this).prop("checked", false);
                        });
                    }
                });
                $("[data-toggle=tooltip]").tooltip();
            });
        </script>

        <script>
            $('#mytable').dataTable({
                "paging": true,
                "ordering": true,
                "info": false,
                "language": {
                    "sLengthMenu": "Mostrar _MENU_ registros",
                    "zeroRecords": "Nothing found - sorry",
                    "info": "Showing page _PAGE_ of _PAGES_",
                    "infoEmpty": "No records available",
                    "infoFiltered": "(filtered from _MAX_ total records)",
                    "sSearch": "Buscar:",
                    "oPaginate": {
                        "sFirst": "Primero",
                        "sLast": "Último",
                        "sNext": "Siguiente",
                        "sPrevious": "Anterior"
                    }

                }
            });
        </script>

    </body>
</html>