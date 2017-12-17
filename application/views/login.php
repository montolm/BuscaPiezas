<!DOCTYPE html>
<html lang="en">
    <head>
        <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">   
        <link href="<?php echo base_url(); ?>css/login.css" rel="stylesheet">  

        <script src="<?php echo base_url(); ?>js/Jquery-2.1.1.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>js/Bootstrap.min.js" type="text/javascript"></script>
<!--        <script src="<?php echo base_url(); ?>js/idleTimer/idle-timer.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>js/funciones.js" type="text/javascript"></script>-->
        <script src="https://use.typekit.net/ayg4pcz.js"></script>
        <script>try {
                Typekit.load({async: true});
            } catch (e) {
            }</script>
        <!--webServices googleMap-->
        <!--http://maps.google.com/maps/api/geocode/json?address=$direccion&sensor=false-->
    </head>
</body>
<div class="container">
    <h2 class="welcome text-center"> <br> </h2>
    <div class="card card-container">
        <h2 class='login_title text-center'>Inicio de Sesión</h2>
        <hr>
        <form class="form-signin" action="<?= site_url('/login_control/validateLogin'); ?>" method="post">
            <span id="reauth-email" class="reauth-email"></span>
            <p class="input_title">Correo</p>
            <input type="text" id="inputEmail" name="email" class="login_box" placeholder="buscapiezas@buscapiezas.com">
            <p class="input_title">Clave</p>
            <input type="password" id="inputPassword" name="password" class="login_box" placeholder="******">
            <div id="remember" class="checkbox">
                <label>
                </label>
            </div>
            <button class="btn btn-lg btn-primary" type="submit">Acetar</button>
            <span class="pull-right"><a href="<?= site_url('/User_control/urlUser'); ?>">Registrate</a></span>
            <span><a href="<?= site_url('/User_control/urlUser'); ?>">Olvide contraseña?</a></span>
        </form><!-- /form -->
    </div><!-- /card-container -->
</div><!-- /container -->
</html>
</body>