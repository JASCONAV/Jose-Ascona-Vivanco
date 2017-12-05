<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Sistema GESTRA</title>
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
    <body>
        <?php $this->load->view('view_menu'); ?>
        <div id="contenido" class="container space_top">
            <div class="row-fluid">
                <fieldset>
                    <legend>Datos del documento</legend>
                    <br>
                    <form class="form-inline">
                        <label>Número:</label>
                        <div class="input-append">
                            <input type="text" class="numero" placeholder="">                        
                            <span class="add-on">-2013</span>
                        </div>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <label>Fecha de ingreso</label>
                        <input type="text" class="input-small fecha" placeholder="">
                    </form>
                    <form class="form-inline">
                        <label>Tipo:</label>
                        <select>
                            <option> - SELECCIONE - </option>
                        </select>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <label>Folios</label>
                        <input type="text" class="input-small" placeholder="">
                    </form>
                    <form class="form-inline">
                        <label>Asunto:</label>
                        <select class="span5">
                            <option> - SELECCIONE - </option>
                        </select>
                    </form>
                </fieldset>
                <fieldset>
                    <legend>Datos del solicitante</legend>
                    <br>
                    <form class="form-inline">
                        <label>Tipo Soli:</label>
                        <select>
                            <option> - SELECCIONE - </option>
                        </select>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <label>RUC:</label>
                        <input type="text" class="" placeholder="">
                    </form>
                    <form class="form-inline">
                        <label>Nombre Soli:</label>
                        <div class="input-append">
                            <input type="text" class="input-large" placeholder="">                        
                        </div>
                    </form>
                    <form class="form-inline">
                        <label>Ape Pat Soli:</label>
                        <div class="input-append">
                            <input type="text" class="input-large" placeholder="">                        
                        </div>
                    </form>
                    <form class="form-inline">
                        <label>Ape Mat Soli:</label>
                        <div class="input-append">
                            <input type="text" class="input-large" placeholder="">                        
                        </div>
                    </form>
                </fieldset>
                <fieldset>
                    <legend>Datos del Recurrente</legend>
                    <br>
                    <form class="form-inline">
                        <label>Documento:</label>
                        <select>
                            <option> - SELECCIONE - </option>
                        </select>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <label>Número:</label>
                        <input type="text" class="input-small" placeholder="">
                    </form>
                    <form class="form-inline">
                        <label>Nombre Recu:</label>
                        <div class="input-append">
                            <input type="text" class="input-large" placeholder="">                        
                        </div>
                    </form>
                    <form class="form-inline">
                        <label>Ape Pat Recu:</label>
                        <div class="input-append">
                            <input type="text" class="input-large" placeholder="">                        
                        </div>
                    </form>
                    <form class="form-inline">
                        <label>Ape Mat Recu:</label>
                        <div class="input-append">
                            <input type="text" class="input-large" placeholder="">                        
                        </div>
                    </form>
                </fieldset>
                <hr>
                <p>
                    <button class="btn btn-large btn-primary" type="button">Guardar</button>
                </p>
            </div>
            <hr>
            <footer>
                <p><a id="sesion_login_user" href="">BIENVENIDO USUARIO: JUAN SILVA</a></p>
            </footer>
        </div> <!-- /container -->

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
        <script src="<?php echo base_url(); ?>js/propio/calendar_es.js"></script>
        <script src="<?php echo base_url(); ?>js/propio/salir.js"></script>

    </body>
</html>
<script>
    $(document).ready(function() {
        $(".fecha").datepicker({
            numberOfMonths: 1
        });
    });
</script>
<style>
    label{
        width: 100px;
        text-align: right;
    }
    .numero{
        width: 164px;;
    }
    inputasa{
        width: 164px;;
    }
</style>