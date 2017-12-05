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
        <div id="contenido" class="container space_top">
            <div class="container-fluid">
                <div class="row-fluid">
                    <div class="span2">
                        <img src="<?php echo base_url(); ?>logo-municipalidad-de-lima-metropolitana.jpg" width="120" height="40" alt="logo_munilima_gtu"/>
                    </div>
                    <div class="span8">
                        <center><h4>SUB-GERENERCIA DE REGULACIÓN DE TRANSPORTE</h4></center>
                    </div>
                    <div class="span2">
                        <img src="<?php echo base_url(); ?>logo_munilima_gtu.jpg" width="120" height="40" alt="logo_munilima_gtu"/>
                    </div>
                </div>                
                <div class="row-fluid">
                    <div class="span6">
                        <h3>DIVISIÓN DE TRANSPORTE DE CARGA</h3>
                        <br><br>
                        Iniciar trásmites de acuerdo al área que pertenece.<br>
                        Ver la lista de trámites pendientes, mostrando fecha de envío, última persona encargada, última <br>
                        acción tomada, historial del expediente.<br>
                        Ver la lista de expedientes ya procesados y su estado actual.<br>
                        Procesar los trámites pendientes de manera automática. Buscar expedientes por contenido o <br>
                        número de expediente.<br>
                        Generar, exportar e imprimir reportes mostrándole aquellos a los que tiene acceso.<br>
                        Configurar la informaciòn personal.
                    </div>
                    <div class="span6">
                        <h3></h3><br><br><br><br>
                        <br><br>
                        Esta encarga de la autorización de circulación de los vehiculos de transporte de carga, en la proviencia de Lima.
                        <p><a href="">[Consulta el estado de tu tramite aqui]</a></p>
                        Documentos a tomar en cuenta para la autorización de circulación:<br><br>
                        <ul>
                            <li>Ordenanza 1282</li>
                            <li>D.S 017-2009</li>
                            <li>Formato de solicitud</li>
                            <li>Formato de incremento de flota</li>
                            <li>Requisitos para el tranporte de carga 2013</li>
                        </ul> 
                    </div>
                </div>
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
        <script src="<?php echo base_url(); ?>js/propio/salir.js"></script>
    </body>
</html>