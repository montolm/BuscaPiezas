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
        <div class="container" style="margin-left: 20%; padding-top: 2%;">
            <div id="idMesage_succes" class="alert alert-success alert-dismissable" style="display: none" >
                <button type="button" id="idClose" class="close" data-dismiss="alert">&times;</button>
                <strong>¡Listo! </strong>actualizado exitosamente.
            </div>
            <div id="idMesage_sesion" class="alert alert-danger alert-dismissable" style="display: none" >
                <button type="button" id="idCloseSesion" class="close" data-dismiss="alert">&times;</button>
                <strong>¡Sesion!</strong> Su sesion a caducado.
            </div>
            <div id="idMesage_error" class="alert alert-danger alert-dismissable" style="display: none" >
                <button type="button" id="idClose_error" class="close" data-dismiss="alert">&times;</button>
                <strong>¡Error!</strong> Error favor verificar.
            </div>
            <br>
            <form id="idSearchPartForm">
                <div class="form-group hidden">
                    <input class="form-control " type="text" id="idPartReplacement" name="partReplacement">
                </div>
                <div class="form-group col-xs-6 col-sm-5">
                    <label for="idSelectCategory">Sistemas:</label>
                    <select class="form-control" id="idSelectCategory" name="selectCategory">
                        <option value="0" saelected>Todos los sistemas</option>
                    </select>
                </div>
                <div class="form-group col-xs-6 col-sm-5">
                    <label for="idSelectMake">Marcas:</label>
                    <select class="form-control" id="idSelectMake" name="selectMake">
                        <option value="0" selected>Todas las marcas</option>
                    </select>
                </div>
                <div class="form-group col-xs-6 col-sm-5">
                    <label for="idSelectVehiMotor">Vehiculos de motor:</label>
                    <select class="form-control" id="idSelectVehiMotor" name="selectVehiMotor">
                        <option value="0" selected>Todos los vehiculos de motor</option>
                    </select>
                </div>
                <div class="form-group col-xs-6 col-sm-5">
                    <label for="idSelectModel">Modelos:</label>
                    <select class="form-control" id="idSelectModel" name="selectModel">
                        <option value="0" selected>Todos los modelos</option>
                    </select>
                </div>
                <div class="form-group hidden">
                    <input class="form-control " type="text" id="idVehiclePart" name="vehiclePart">
                </div>
                <div class="form-group col-xs-8 col-sm-8">
                    <button type="button" class="btn btn-primary col-xs-2 " id="idButtonPartForUserReplacement">Buscar</button>
                </div>
                <div id="idContainerlist" style="display: none"> 
                    <div class="featurette" id="about">
                        <!------------------------code---------------start---------------->
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <br>
                                <table id="mytable" class="table table-bordred table-striped table-hover table-responsive">
                                    <thead>
<!--                                    <th>
                                        <input type="checkbox" id="checkall" />
                                    </th>-->
                                    <th>Seleccionar</th>
                                    <th>Vehiculos</th>
                                    <th>Marcas</th>
                                    <th>Modelos</th>
                                    <th>Generaciones</th>
                                    <th>Sistemas</th>
                                    <th>Piezas</th>
                                    <th>Estados</th>
                                    <th>Combustibles</th>
                                    <th>Repuestos</th>
                                    <th>Precios</th>
                                    <th>Comentarios</th>
                                    </thead>
                                    <tbody id="idBodyTable">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="form-group col-xs-8 col-sm-8">
                            <button type="button" class="btn btn-danger col-xs-2 " id="idButtonUpdateParts">Actualizar</button>
                        </div>
                        <div class="form-group hidden">
                            <input class="form-control " type="text" id="idInputUser" name="inputUser" value="<?php echo $_SESSION['id_user']; ?>">
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <script src="<?= base_url() ?>js/Jquery-2.1.1.min.js"></script>
        <script src="<?= base_url() ?>js/Bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>js/idleTimer/idle-timer.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>js/Funciones.js"></script>
        <script src="//oss.maxcdn.com/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"></script>
        <script src="<?= base_url() ?>js/Validate.js"></script>
        <script src="<?= base_url() ?>js/createParts.js"></script>
    </body>
</html>