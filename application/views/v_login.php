<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Bienvenido Sistema ARCOI SAC</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- Los estilos -->
        <link href="<?php echo base_url(); ?>css/bootstrap.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>css/bootstrap-responsive.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>css/bootstrap-responsive.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>css/main.css" rel="stylesheet">
        <style type="text/css">
            body {
                padding-top: 0px;
                padding-bottom: 0px;
                background-color: #f5f5f5;
            }

            .form-signin {
                width: 300px;
                max-width: 300px;
                padding: 19px 19px 19px 19px;
                background-color: #fff;
                border: 1px solid #e5e5e5;
                -webkit-border-radius: 5px;
                -moz-border-radius: 5px;
                border-radius: 5px;
                -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
                overflow: hidden;
                position: absolute;
                height: 300px;
                left: 50%;
                top: 50%;
                margin-left: -170px;
                margin-top: -170px;
            }


        </style>
    </head>
    <body>

        <form class="form-signin" method="GET" action="">
            <h4>Login</h4><hr>
            <h5 class="form-signin-heading">Usuario:</h5>
            <input type="text" class="input-block-level" name="inputUsuario" placeholder="Escriba su Usuario">
            <h5 class="form-signin-heading">Contraseña:</h5>
            <input type="password" class="input-block-level" name="inputPass" placeholder="Escriba su contraseña">
            <hr>
            <button name="label_direccion_cambiar" class="btn btn-primary" type="submit">Ingresar</button>
        </form>
        <!-- Este div va a contener el resultado al presionar la tecla enter o botòn ingresar -->
        <div class="container">
            <div id="resultado">
                <?php echo $mensaje; ?>
            </div>
        </div>
        <script src="<?php echo base_url(); ?>js/jquery-1.9.1.js"></script>
        <script src="<?php echo base_url(); ?>js/bootstrap-transition.js"></script>
        <script src="<?php echo base_url(); ?>js/bootstrap-alert.js"></script>
        <script src="<?php echo base_url(); ?>js/bootstrap-modal.js"></script>
        <script src="<?php echo base_url(); ?>js/bootstrap-dropdown.js"></script>
        <script src="<?php echo base_url(); ?>js/bootstrap-scrollspy.js"></script>
        <script src="<?php echo base_url(); ?>js/bootstrap-tab.js"></script>
        <script src="<?php echo base_url(); ?>js/bootstrap-tooltip.js"></script>
        <script src="<?php echo base_url(); ?>js/bootstrap-popover.js"></script>
        <script src="<?php echo base_url(); ?>js/bootstrap-button.js"></script>
        <script src="<?php echo base_url(); ?>js/bootstrap-collapse.js"></script>
        <script src="<?php echo base_url(); ?>js/bootstrap-carousel.js"></script>
        <script src="<?php echo base_url(); ?>js/bootstrap-typeahead.js"></script>
        <script src="<?php echo base_url(); ?>js/login.js"></script>
    </body>
</html>