<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Sistema ARCOI S.A.C</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="jdelgado" >
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
            <br>
            <h4>Datos del documento</h4>
            <hr><br>            
            <div class="container-fluid">
                <div class="row-fluid">
                    <div class="span6">
                        <form class="form-inline">
                            <label class="LabelForm" for="">Número:</label>
                            <input type="text" class="" id="inputnumero" placeholder="" autocomplete="off">
                        </form>
                        <form class="form-inline">
                            <label class="LabelForm">Tipo:</label>
                            <select id="selectTipo" >
                                <option value="1">EXPEDIENTE</option>
                                <option value="2">DOCUMENTO SIMPLE</option>
                            </select>
                        </form>
                        <form class="form-inline">
                            <label class="LabelForm" for='' onchange="hability_option()">Asunto:</label>
                            <select id="selectAsunto"  onchange="hability_option()" >
                                <option value="0">Autorización de circulación</option>
                                <option value="1">Inclusión </option>
                                <option value="2">Anexo</option>
                                <option value="3">Otros</option>
                            </select>
                        </form>
                        <form class="form-inline">
                            <label class="LabelForm">Tipo de carga:</label>
                            <select id="selectTipoCarga" >
                                <?php echo $lista_areas; ?>                                
                            </select>
                        </form>
                    </div>
                    <div class="span6">
                        <form class="form-inline">
                            <label class="LabelForm">Fechade ingreso:</label>
                            <input type="text" class="inputCalendar" id="inputfecha" value="<?php echo date('d/m/Y'); ?>">
                        </form>
                        <form class="form-inline">
                            <label class="LabelForm">Folios:</label>
                            <input type="text" class="" id="inputfolios" >
                        </form>                        
                    </div>
                </div>
            </div>
            <br>
            <h4>Datos del solicitante</h4>
            <hr><br>
            <div class="container-fluid">
                <div class="row-fluid">
                    <div class="span6">
                        <form class="form-inline">
                            <div class="input-append">
                                <label class="LabelForm" for="inputTypeCliente">Buscar RUC::</label>
                                <input type="text" class="input-xlarge" id="inputbuscarRuc" placeholder="" autocomplete="on">
                                <button class="btn" id="btn_buscar_solicitante" type="button"><i class="icon-search"></i></button>
                            </div>
                        </form>
                        <form class="form-inline">
                            <label class="LabelForm">Nom. o Razón social:</label>
                            <input type="text" id="inputRazonSocial" class="" placeholder="" disabled>
                        </form>
                        <!--<form class="form-inline">
                            <label class="LabelForm" for='inputTypeContacto'>Ap. Paterno:</label>
                            <input type="text" class="" id="inputAppaterno" disabled>
                        </form>
                        <form class="form-inline">
                            <label class="LabelForm">Ap. Materno:</label>
                            <input type="text" class="" id="inputApmaterno" disabled>
                        </form>-->
                    </div>
                    <div class="span6">
                        <form class="form-inline">
                            <a target="_blank" href="<?php echo base_url(); ?>index.php/c_principal/ver_mantenimiento_solicitante" >
                            <button type="button" class=" btn btn-success " id="crear_nuevo_solicitante">Nuevo solicitante</button>
                            </a>
                        </form>
                    </div>
                </div>
            </div>
            <br>
            <h4>Datos del recurrente</h4>
            <hr><br>
            <div class="container-fluid">
                <div class="row-fluid">
                    <div class="span6">
                        <form class="form-inline">
                            <div class="input-append">
                                <label class="LabelForm" for="inputTypeBuscarDocumento">Documento:</label>
                                <input type="text" class="input-xlarge" id="inputTypeBuscarRecurrente" placeholder="" autocomplete="on">
                                
                                <button class="btn" id="BuscarDocumentoRecurrente" type="button"><i class="icon-search"></i></button>
                                
                            </div>
                        </form>
                        <!--<form class="form-inline">
                            <label class="LabelForm">Número:</label>
                            <input type="text" id="inputNumeroRecurrente" class="" placeholder="" disabled>
                        </form>-->
                        <form class="form-inline">
                            <label class="LabelForm" for='inputTypeContacto'>Nombre(s):</label>
                            <input type="text" class="" id="inputNombreRecurrente" disabled>
                        </form>
                        <form class="form-inline">
                            <label class="LabelForm">Ape. paterno:</label>
                            <input type="text" class="" id="inputPaternoRecurrente" disabled>
                        </form>
                        <form class="form-inline">
                            <label class="LabelForm">Ape. materno:</label>
                            <input type="text" class="" id="inputMaternocurrente" disabled>
                        </form>
                    </div>
                    <div class="span6">                        
                        <form class="form-inline">
                            <a target="_blank" href="<?php echo base_url(); ?>index.php/c_principal/ver_mantenimiento_recurrente" >
                            <button type="button" class=" btn btn-success " id="crear_nuevo_recurrente">Nuevo recurrente</button>
                            </a>
                        </form>
                    </div>
                </div>
            </div>
            <hr>
            <br>
            <form class="form-inline">
                <button type="button" class="btn btn-primary registrar_doc" id="registrar_documento" onclick="registrar_documento()">Registrar documento</button>
            </form>
            <div id="resul_cuerpo"></div>
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
        <script src="<?php echo base_url(); ?>js/propio/documento.js"></script>
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
