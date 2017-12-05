<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Sistema ARCOI S.A.C</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- Le styles -->
        <link href="<?php echo base_url(); ?>css/bootstrap.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>css/bootstrap-responsive.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>css/bootstrap-responsive.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>css/main.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>css/jquery-ui.css" rel="stylesheet">
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="../assets/js/html5shiv.js"></script>
        <![endif]-->
    </head>
    <body onload="">
        <?php $this->load->view('view_menu'); ?>        
        <div id="container" class="container space_top">            
            <div class="caja_resul"></div>
            <h4>Cambiar contraseña</h4>
            <hr><br>            
            <div class="container-fluid">
                <div class="row-fluid">
                    <div class="span6">
                        <form class="form-inline">
                            <label class="LabelForm" for="">Usuario:</label>
                            <input type="text" class="" id="usuario" placeholder="" autocomplete="off">
                        </form>
                        <form class="form-inline">
                            <label class="LabelForm">Nueva contraseña:</label>
                            <input type="text" id="Npass" class="" placeholder="">
                        </form>
                        <form class="form-inline">
                            <label class="LabelForm" for=''>Repetir contraseña:</label>
                            <input type="text" id="Rpass" class="" placeholder="">
                        </form>
                        <button id="BtnCambiarPass" class="btn btn-primary" >Guardar</button>
                    </div>
                </div>
            </div>
            <br>
        </div>
        <!-- CONTENEDOR DE PIE DE COTIZACIÓN -->
        <div class="container-fluid">
            <hr>
            <footer>
                <p><a id="">BIENVENIDO USUARIO: <?php echo $_SESSION['LOGIN_USER']; ?></a></p>
            </footer>
        </div>
        <!-- fin de ventanas modales -->
        <!-- Le javascript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
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
        <script src="<?php echo base_url(); ?>js/jquery-ui.js"></script>
        <script src="<?php echo base_url(); ?>js/jquery-ui.min.js"></script>
        <script src="<?php echo base_url(); ?>js/jquery_calendar_es.js"></script>
        <script src="<?php echo base_url(); ?>js/propio/operador.js"></script>
        <script src="<?php echo base_url(); ?>js/propio/salir.js"></script>
    </body>
</html>
<style>
    .LabelForm{
        min-width: 120px;
    }

    #TablaMontoTotal{
        border: 1px solid black;
        width: 240px;
        max-width: 240px; 
    }

    .contenido_pie_importante{
        margin: 0px;
        padding: 0px;
    }

    hr{
        margin-bottom: 0px; 
    }
</style>
