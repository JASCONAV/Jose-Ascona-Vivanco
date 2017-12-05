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
                    <legend>Establecer estado de documento</legend>
                    <br>
                    <div class="span12">
                        <form class="form-inline">
                            <label class="LabelForm">Nro. Expediente:</label>
                            <select id="selectuser">
                                <?php echo $select; ?>
                            </select>
                            <button class="btn" type="button" onclick="buscar_solicitante()">Buscar</button>
                        </form>
                        <form class="form-inline">
                            <label class="LabelForm">Solicitante:</label>
                            <input type="text" value="" id="Solicitante" class="input-xxlarge " disabled>
                        </form>
                        <form class="form-inline">
                            <label class="LabelForm">Comentario:</label>
                            <input type="text" value="" id="mensaje" class="input-xxlarge "> 
                        </form>
                        <form class="form-inline">
                            <label for="" class="LabelForm">Estado:</label>
                            <select id="selectEstado">
                                <option value="Aprobado">Aprobado </option>
                                <option value="Desaprobado">Desaprobado</option>
                                <option value="Pendiente">Pendiente</option>
                            </select>
                        </form>
                    </div>
                    <button CLASS="btn btn-primary" onclick="registrar_estado()" >Registrar</button>
                </fieldset>
                <hr>
            </div>
            <hr>
            <footer>
                <p><a id="">BIENVENIDO USUARIO: <?php echo $_SESSION['LOGIN_USER']; ?></a></p>
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
<script>
    function registrar_estado(){
        var parametros = {
            "selectuser": $('#selectuser').val(),
            "mensaje": $('#mensaje').val(),
            "selectEstado" : $('#selectEstado').val()
        };
        $.ajax({
            data: parametros,
            url: 'registrar_estado_documento',
            type: 'post',
            async: false,
            beforeSend: function() {
            },
            success: function(data) {
                $(".caja_resul").html("<div class='alert alert-info'><strong>Listo!</strong> Usuaario eliminado correctamente.....!</div>");location.reload();
            },
            error: function() {
            }
        });
    }

    function buscar_solicitante(){
        var parametros = {
            "param": $('#selectuser').val()
        };
        $.ajax({
            data: parametros,
            url: 'get_solicitante',
            type: 'post',
            async: true,
            beforeSend: function() {
            },
            success: function(data) {
                $('#Solicitante').val(data);
                
            },
            error: function() {
            }
        });
    }
</script>