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
    <body>
        <?php $this->load->view('view_menu'); ?>        
        <div id="container" class="container space_top">            
            <div class="CuadroMensaje"></div>
            <br>
            <h4>Pre evaluación</h4>
            <hr><br>            
            <div class="container-fluid">
                <div class="row-fluid">
                    <div class="span12">
                        <form class="form-inline">
                            <label class="LabelForm" for=''>Ruc:</label>
                            <input type="text" id="inputSolicitante" autocomplete="on" class="inputSolicitante" value="">                            
                            <button type="button" id="BtnConsultarSolicitante" class="btn btn-primary" onclick="buscar_documento()">Consultar</button>
                        </form>
                    </div>
                    <div class="caja_resul">
                        
                    </div>
                    <!--<table style="border: 1px solid black;" id="" class="table table-hover table-striped table-bordered table-condensed">
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th>Nr. solicitud</th>
                                <th>Fecha ingresdo</th>
                                <th>Asunto</th>
                                <th>Nro. Folios</th>
                                <th>Tipo documento</th>
                                <th>Solicitante Rux</th>
                                <th>Tipo de documento</th>
                            </tr>
                        </thead>
                        <tbody id="CUERPO_CONSULTA">

                        </tbody>
                    </table>-->
                    
                </div>
            </div>
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
        <script src="<?php echo base_url(); ?>js/propio/ventanilla.js"></script>
        <script src="<?php echo base_url(); ?>js/propio/salir.js"></script>
    </body>
</html>

<script type="text/javascript">
    $(document).ready(function(){
        $("#BtnreporteSolicitante").click(function() {
            fd = $('#inputFdesde').val();
            fh = $('#inputFhasta').val();
            param = $('#selectAsunto').val();
            url = $(this).attr("href");
            cadena = '<?php echo base_url(); ?>index.php/c_reporte/solicitante?fd='+fd+'&fh='+fh+'&param='+param;
            window.open(cadena, '_blank');
            return false;
        });
    });
</script>
<style>
    .LabelForm{
        min-width: 30px;
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
<script>

    $(function() {
        $("#inputFdesde").datepicker({
            defaultDate: "+1w",
            numberOfMonths: 1,
            onClose: function(selectedDate) {
                $("#inputFhasta").datepicker("option", "minDate", selectedDate);
            }
        });
        $("#inputFhasta").datepicker({
            defaultDate: "+1w",
            numberOfMonths: 1,
            onClose: function(selectedDate) {
                $("#inputFdesde").datepicker("option", "maxDate", selectedDate);
            }
        });
    });
</script>