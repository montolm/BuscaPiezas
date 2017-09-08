<!DOCTYPE html>
<html lang="en">
    <head> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Website CSS style -->
        <link href="<?= base_url() ?>css/bootstrap.min.css" rel="stylesheet">
        <title>Registro Usuario</title>
    </head>
    <body>
        <div class="container" id="wrap">
            <div class="row">
                <div class="btn-link" style="margin-left: 90%">
                    <a href="<?= site_url('/User_control/urlLogin'); ?>">Iniciar Sesión</a>
                </div>
                <div class="col-md-6 col-md-offset-3">

                    <form action="<?= site_url('/user_control/createUser'); ?>" id="formUser" method="post" accept-charset="utf-8">   
                        <div class="form-group">
                            <legend>Informacion Cliente</legend>
                        </div>
                        <div class="form-group"> 
                            <input type="text" name="firstname" value="" class="form-control input-lg" placeholder="Nombre"  /> 
                        </div>
                        <div class="row">
                            <div class="col-xs-4 form-group">
                                <input type="text" class="form-control input-lg" placeholder="Telefono" name="phone">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" name="directionstreet" value="" class="form-control input-lg" placeholder="Dirección/calle"  />  
                        </div>
                        <div class="form-group">
                            <input type="text" name="directionNumber" value="" class="form-control input-lg" placeholder="Dirección/numero"/>
                        </div>
                        <div class="form-group">
                            <input type="text" name="identification" value="" class="form-control input-lg" placeholder="Identificacion" />
                        </div>
                        <div class="form-group">
                            <input type="text" name="email" value="" class="form-control input-lg" placeholder="Correo"  />
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" value="" class="form-control input-lg" placeholder="Clave"/>
                        </div>
                        <div class="form-group">
                            <input type="password" name="confirm_password" value="" class="form-control input-lg" placeholder="Confirmar Clave"  />
                        </div>
                        <div class="form-group hidden">
                            <input class="form-control " type="text" id="idNameCountry" name="nameCountry">
                        </div>
                        <div class="form-group hidden">
                            <input class="form-control " type="text" id="idNameCity" name="nameCity">
                        </div>
                        <label>Pais/Ciudad</label>                  
                        <div class="row">
                            <div class="col-xs-6 col-md-6 form-group">
                                <select class = "form-control input-lg" name="selectCountry" id="idSelectCountry">
                                    <option value="1">Republica Dominicana</option>
                                    <!--                                    <option value="2">Estados Unidos</option>
                                                                        <option value="3">Puerto Rico</option>
                                                                        <option value="4">Mexico</option>-->
                                </select>                       
                            </div>
                            <div class="col-xs-6 col-md-6 form-group">
                                <select class = "form-control input-lg" name="selectCity" id="idSelectCity">
                                    <option value="1">Santo Domingo</option>
                                    <option value="2">Santo Domingo Oeste</option>
                                    <option value="3">Santo Domingo Este</option>
                                    <option value="4">Santiago</option>
                                    <option value="5">Duarte</option>
                                    <option value="6">San Cristóbal</option>
                                    <option value="7">San Pedro de Macorís</option>
                                    <option value="8">Puerto Plata</option>
                                    <option value="9">La Vega</option>
                                    <option value="10">Barahona</option>
                                    <option value="11">Peravia</option>
                                    <option value="12">San Juan</option>
                                </select>
                            </div>
                        </div>
                        <span class="help-block">Al hacer clic en Crear mi cuenta, acepta nuestros Términos y ha leído nuestra Política de uso de datos, incluyendo nuestro uso de cookies.</span>
                        <button class="btn btn-lg btn-primary btn-block signup-btn" type="submit" id="btnCreateAccount">Crear mi cuenta</button>
                        <br>
                    </form>          
                </div>
            </div>            
        </div>
        <script src="<?php echo base_url(); ?>js/Jquery-2.1.1.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>js/Bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>js/Funciones.js" type="text/javascript"></script>
        <script src="//oss.maxcdn.com/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"></script>
        <script src="<?php echo base_url(); ?>js/Validate.js" type="text/javascript"></script>
    </body>
</html>