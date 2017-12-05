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
    <body onload="cargar_lista_usuarios()">
        <?php $this->load->view('view_menu'); ?>        
        <div id="container" class="container space_top">    
            <div class="caja_resul"></div>
            <div class="CuadroMensaje"></div>
            <br>
            <h4>Datos del Documento</h4>
            <hr><br>            
            <div class="container-fluid">
                <div class="row-fluid">
                    <div class="span6">
                        <form class="form-inline">
                            <label class="LabelForm" for="">Usuario:</label>
                            <input type="text" class="" id="inputUsuario" placeholder="" >
                        </form>
                        <form class="form-inline">
                            <label class="LabelForm">DNI:</label>
                            <input type="text" id="inputDni" class="" placeholder="">
                        </form>
                        <form class="form-inline">
                            <label class="LabelForm" for=''>Clave:</label>
                            <input type="password" id="inputClave" />
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
                            <label class="LabelForm">Nombre:</label>
                            <input type="text" class="" id="inputNombre" >
                        </form>
                        <form class="form-inline">
                            <label class="LabelForm">Fecha nacimiento:</label>
                            <input type="text" class="" id="inputNacimiento" >
                        </form> 
                        <form class="form-inline">
                            <label class="LabelForm">Sexo:</label>
                            <select id='sexo'>
                            <option value="M">Masculino</option>
                            <option value="F">Femenino</option>
                            </select>
                        </form> 
                        <form class="form-inline">
                            <label class="LabelForm">teléfono:</label>
                            <input type="text" class="" id="inputTelefono" >
                        </form>  
                        <form class="form-inline">
                            <label class="LabelForm">Ubigueo:</label>
                            <select id='selectTipoUsuario'>
                            <?php echo $SelectTipoUsuario; ?>
                            </select>
                        </form>                     
                    </div>
                </div>
             <form class="form-inline">
                <button type="button" class="btn btn-primary registrar_doc" id="registrar_operador">Registrar operador</button>
                <div id="Editar"></div>
            </form>
            </div>
            <br>
            <h4>Lista de usuarios</h4>
            <hr><br>
            <div class="container-fluid">
                <table style="border: 1px solid black;" id="table_contenedor_cotizacion_total" class="table table-hover table-striped table-bordered table-condensed">
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Nombres y apellidos</th>
                            <th>Usuario</th>
                            <th>Dni</th>
                            <th>Teléfono</th>
                            <th>Fecha registro</th>
                            <th>opciones</th>
                        </tr>
                    </thead>
                    <tbody id="Lista_usuario">
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Item</th>
                            <th>Nombres y apellidos</th>
                            <th>Usuario</th>
                            <th>Dni</th>
                            <th>Teléfono</th>
                            <th>Fecha registro</th>
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

<div style="width: 1000px;margin-left: -498px;" id="ModalEditarUsuario" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Editar operador</h3>
    </div>
    <div class="modal-body" id="cuerpo_editar">
        <div class="container-fluid">
                <div class="row-fluid">
                    <div class="span6">
                        <form class="form-inline">
                            <label class="LabelForm" for="">Usuario:</label>
                            <input type="text" class="" id="inputUsuario1" placeholder="" disabled>
                        </form>
                        <form class="form-inline">
                            <label class="LabelForm">DNI:</label>
                            <input type="text" id="inputDni1" class="" placeholder="">
                        </form>
                        <form class="form-inline">
                            <label class="LabelForm" for=''>Clave:</label>
                            <input type="password" id="inputClave1" />
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
                            <label class="LabelForm">Nombre:</label>
                            <input type="text" class="" id="inputNombre1" >
                        </form>
                        <form class="form-inline">
                            <label class="LabelForm">Fecha nacimiento:</label>
                            <input type="text" class="" id="inputNacimiento1" >
                        </form> 
                        <form class="form-inline">
                            <label class="LabelForm">Sexo:</label>
                            <select id='sexo1'>
                            <option value="M">Masculino</option>
                            <option value="F">Femenino</option>
                            </select>
                        </form> 
                        <form class="form-inline">
                            <label class="LabelForm">teléfono:</label>
                            <input type="text" class="" id="inputTelefono1" >
                        </form>  
                        <form class="form-inline">
                            <label class="LabelForm">Tipo usuario:</label>
                            <select id='selectTipoUsuario1'>
                            <?php echo $SelectTipoUsuario; ?>
                            </select>
                        </form>                     
                    </div>
                </div>
            </div>
    </div>
    <div class="modal-footer">
        <button class="btn" id="ModalEditar"  onclick="update_datos()">Editar</button>
    </div>
</div>