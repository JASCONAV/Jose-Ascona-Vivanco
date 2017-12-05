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
    <body onload="cargar_lista_recurrente()">
        <?php $this->load->view('view_menu'); ?>        
        <div id="container" class="container space_top">    
            <div class="caja_resul"></div>
            <div class="CuadroMensaje"></div>
            <br>
            <h4>Datos del Recurrente</h4>
            <hr><br>            
            <div class="container-fluid">
                <div class="row-fluid">
                    <div class="span6">
                        <form class="form-inline">
                            <label class="LabelForm" for=''>Nombre:</label>
                            <input type="text" id="inputNombre" />
                        </form>
                        <form class="form-inline">
                            <label class="LabelForm">Ape. Materno:</label>
                            <input type="text" class="" id="inputApMaterno" >
                        </form>
                        <form class="form-inline">
                            <label class="LabelForm">Ape. Paterno:</label>
                            <input type="text" class="" id="inputAppaterno">
                        </form>
                    </div>
                    <div class="span6">
                        <form class="form-inline">
                            <label class="LabelForm">Nr. Identificación</label>
                            <input type="text" class="" id="inputIdentificacio" >
                        </form> 
                        <form class="form-inline">
                            <label class="LabelForm">Tipo recurrente:</label>
                            <select id='selectTipoRecurrente'>
                                <option value="1">'TRAMITADOR'</option>
                                <option value="2">APODERADO</option>
                                <option value="3">CONYUGE</option>
                            </select>
                        </form>  
                        <form class="form-inline">
                            <label class="LabelForm">Ubigueo:</label>
                            <select id='selectUbigueo'>
                            <?php echo $lista_ubigueo; ?>
                            </select>
                        </form>
                    </div>
                </div>
             <form class="form-inline">
                 <button type="button" class="btn btn-primary" onclick="registrar_recurrente();">Registrar solicitante</button>
            </form>
            </div>
            <br>
            <h4>Lista de recurrentes</h4>
            <hr><br>
            <div class="container-fluid">
                <table style="border: 1px solid black;" id="table_contenedor_cotizacion_total" onclick='' class="table table-hover table-striped table-bordered table-condensed">
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Nombres y apellidos</th>
                            <th>Nr. Identificación</th>
                            <th>Tipo recurrente</th>
                            <th>Ubigueo</th>
                            <th>opciones</th>
                        </tr>
                    </thead>
                    <tbody id="ListaSolicitante">
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Item</th>
                            <th>Nombres y apellidos</th>
                            <th>Nr. Identificación</th>
                            <th>Tipo recurrente</th>
                            <th>Ubigueo</th>
                            <th>opciones</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <hr>
            <br>            
            <div class="caja_resul"></div>
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
        <script src="<?php echo base_url(); ?>js/propio/recurrente.js"></script>
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

<div style="width: 1000px;margin-left: -498px;" id="ModalEditarUsuario" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Editar recurrente</h3>
    </div>
    <div class="modal-body" id="cuerpo_editar">
        <div class="container-fluid">
                <div class="row-fluid">
                    <div class="span6">
                        <form class="form-inline">
                            <label class="LabelForm" for=''>Nombre:</label>
                            <input type="text" id="inputNombre1" />
                        </form>
                        <form class="form-inline">
                            <label class="LabelForm">Ape. Materno:</label>
                            <input type="text" class="" id="inputApMaterno1" >
                        </form>
                        <form class="form-inline">
                            <label class="LabelForm">Ape. Paterno:</label>
                            <input type="text" class="" id="inputAppaterno1">
                        </form>
                    </div>
                    <div class="span6">
                        <form class="form-inline">
                            <label class="LabelForm">Nr. Identificación</label>
                            <input type="text" class="" id="inputIdentificacio1" >
                        </form> 
                        <form class="form-inline">
                            <label class="LabelForm">Tipo recurrente:</label>
                            <select id='selectTipoRecurrente1'>
                                <option value="1">'TRAMITADOR'</option>
                                <option value="2">APODERADO</option>
                                <option value="3">CONYUGE</option>
                            </select>
                        </form>  
                        <form class="form-inline">
                            <label class="LabelForm">Ubigueo:</label>
                            <select id='selectUbigueo1'>
                            <?php echo $lista_ubigueo; ?>
                            </select>
                        </form>
                    </div>
                </div>
            </div>
    </div>
    <div class="modal-footer">
        <button class="btn" id="ModalEditar"  onclick="update_recurrente()">Editar</button>
    </div>
</div>