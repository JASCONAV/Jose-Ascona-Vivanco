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
    <body onload="consultaxSegunSolicitante()">
        <?php $this->load->view('view_menu'); ?>        
        <div id="container" class="container space_top">            
            <div class="CuadroMensaje"></div>
            <br>
            <h4>Expedientes por solicitante</h4>
            <hr><br>            
            <div class="container-fluid">
                <div class="row-fluid">
                    <div class="span6">
                        <?php
                        $fechad = new DateTime();
                        $fechad->modify('first day of this month');
                        $fechad->format('d/m/Y'); // imprime por ejemplo: 01/12/2012
                        $fechah = new DateTime();
                        $fechah->modify('last day of this month');
                        $fechah->format('d/m/Y'); // imprime por ejemplo: 31/12/2012
                        ?>
                        <form class="form-inline">
                            <label class="LabelForm" for="">Fecha inicio:</label>
                            <input type="text" class="" id="inputFdesde" value="<?php echo $fechad->format('d/m/Y'); ; ?>" autocomplete="off">
                        </form>
                        <form class="form-inline">
                            <label class="LabelForm">Fecha hasta:</label>
                            <input type="text" id="inputFhasta" class="" value="<?php echo $fechah->format('d/m/Y'); ?>">
                        </form>
                        <form class="form-inline">
                            <label class="LabelForm" for=''>Solicitante:</label>
                            <input type="text" id="inputSolicitante" autocomplete="off" class="inputSolicitante" value="">                            
                            <button type="button" id="BtnConsultarSolicitante" class="btn btn-primary" onclick="consultaxSegunSolicitante()">Consultar</button>
                        </form>
                    </div>
                    <table style="border: 1px solid black;" id="" class="table table-hover table-striped table-bordered table-condensed">
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th>Nr. solicitud</th>
                                <th>Fecha de ingreso</th>
                                <th>Asunto</th>
                                <th>Nro. Folios</th>
                                <th>Tipo documento</th>
                                <th>Solicitante Ruc</th>
                            </tr>
                        </thead>
                        <tbody id="CUERPO_CONSULTA">
                            
                        </tbody>
                    </table>
                    <form class="form-inline">
                        <button type="button" id="BtnreporteSolicitante" class="btn">Generar reporte</button>
                    </form>
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
        <script src="<?php echo base_url(); ?>js/propio/consulta.js"></script>
        <script src="<?php echo base_url(); ?>js/propio/salir.js"></script>
    </body>
</html>

<script type="text/javascript">
    $(document).ready(function(){
        $("#BtnreporteSolicitante").click(function() {
            fd = $('#inputFdesde').val();
            fh = $('#inputFhasta').val();
            param = $('#inputSolicitante').val();
            url = $(this).attr("href");
            cadena = '<?php echo base_url(); ?>index.php/c_reporte/solicitante?fd='+fd+'&fh='+fh+'&param='+param;
            window.open(cadena, '_blank');
            return false;
        });
    });
</script>
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