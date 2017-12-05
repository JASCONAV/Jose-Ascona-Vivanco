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
            <ul class="nav nav-tabs" id="myTab">
                <li class="active"><a data-toggle="" href="<?php echo base_url(); ?>c_ventas">Crear orden de pedido</a></li>
                <li class=""><a data-toggle="" href="<?php echo base_url(); ?>c_ventas/v_lista_cotizacion">Lista ordenes de pedido</a></li>
            </ul>
            <input type="hidden" id="inputHiddenRuc">
            <div id="session_ruc" STYLE=" visibility: hidden; "></div>
            <fieldset>
                <legend>Orden de pedido</legend>
                <br>
                <div class="container">
                    <div class="row-fluid">
                        <div class="span10">
                            <input class="btn btn-primary" id="GuardarCotizacion" type="button" value="Guardar">
                            <a id="enlaceIDCotizacionGnerado" class="btn btn-link" href="<?php echo base_url(); ?>c_reporte?id=" target="_blank" >
                                <input class="btn" id="GuardarCotizacion" type="button" value="Imprimir">
                            </a>
                            <input type="hidden" id="cod_button_imprimir" value="">
                        </div>
                        <div class="span2">
                            <b id="IdCotizacionGenerado" class="text-info" style=" font-size: 14px; ">ID Nuevo: CT/---------------</b>
                        </div>
                    </div>
                </div>
                <hr>
                <p class="text-info">Tipo cambio. Compra:<?php echo $_SESSION['TIPO_CAMBIO_COMPRA']; ?>, Venta:<?php echo $_SESSION['TIPO_CAMBIO_VENTA']; ?>.</p>
                <br>
                <div class="container-fluid">
                        <div class="row-fluid">
                        <div class="span6">
                            <form class="form-inline">
                                <div class="input-append">
                                    <label class="LabelForm" for="inputTypeCliente">Cliente:</label>
                                    <input type="text" class="input-xlarge" id="inputTypeCliente" placeholder="" autocomplete="off">
                                    <button class="btn" id="ButtonBuscarCliente" type="button"><i class="icon-search"></i></button>
                                </div>
                            </form>
                            <form class="form-inline">
                                <label class="LabelForm">Dirección:</label>
                                <input type="text" id="inputTypeDireccion" class="" placeholder="" disabled>
                            </form>
                            <form class="form-inline">
                                <div class="input-append">
                                    <label class="LabelForm" for='inputTypeContacto'>Contacto:</label>
                                    <input type="text" class="" id="inputTypeContacto">
                                    <button class="btn" href="#ModalListaContactos" data-toggle="modal" id="ButtonBuscarCliente" type="button"><i class="icon-list-alt"></i></button>
                                </div>
                            </form>
                            <form class="form-inline">
                                <label class="LabelForm">Fecha Emisión:</label>
                                <input type="text" class="" id="inputTypeFechaEmision" disabled>
                            </form>
                        </div>
                        <div class="span6">
                            <form class="form-inline">
                                <label class="LabelForm">Teléfonos:</label>
                                <input type="text" class="" id="inputTypeTelefono" disabled>
                            </form>
                            <form class="form-inline">
                                <label class="LabelForm">Fax:</label>
                                <input type="text" class="" id="inputTypeFax" disabled>
                            </form>
                            <form class="form-inline">
                                <label class="LabelForm">eMail:</label>
                                <input type="text" class="" id="inputTypeEmail" disabled>
                            </form>
                            <form class="form-inline">
                                <label class="LabelForm" for="inputTypeRef">Ref./:</label>
                                <input type="text" class="" id="inputTypeRef">
                            </form>
                        </div>
                    </div>
                </div>  
            </fieldset>
            <div class="container">
                <a class="agregar" href="#ModalAgregarArticulo" data-toggle="modal"><i class="icon-plus"></i>  Agregar artículo</a>
            </div>
            <table class="table table-hover table-striped table-bordered table-condensed" id="table_contenedor_cotizacion_total" style="border: 1px solid black;" >
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Código</th>
                        <th>Descripción</th>
                        <th>Um</th>
                        <th style='background-color: #FFCC33;' >Cantidad</th>
                        <th style='background-color: #CBCACA;'>Costo</th>
                        <th>% Dscto</th>
                        <th style='background-color: #CCFF33;'>Precio</th>
                        <th style='background-color: #FFB0B0;'>Total</th>
                        <th>Tiempo de entrega</th>
                        <th>Observaciones</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody id="cotizacion_cuerpo">
                </tbody>
            </table>
            
            <table id="TablaMontoTotal" class="table table-hover table-striped table-bordered table-condensed" align='right' style="">
                <tbody id="">
                    <tr>
                        <td>Sub-Total S/.:</td>
                        <td id="Celda_subTotal">0.00</td>
                    </tr>
                    <tr>
                        <td>I.G.V.:(18%)</td>
                        <td id="Celda_igv">0.00</td>
                    </tr>
                    <tr>
                        <td>TOTAL S/.:</td>
                        <td id="Celda_total">0.00</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <br><br><br>
        <!-- CONTENEDOR DE PIE DE COTIZACIÓN -->
        <div class="container-fluid">
            <hr>
            <footer>
                <p><a id="">BIENVENIDO USUARIO: <?php echo $_SESSION['LOGIN_VALIDATION']; ?></a></p>
            </footer>
        </div>
        <div id="contenedor_combobox_tentrega" style="visibility: hidden;">asd</div>
        <div id="contenedor_valores_retorno"></div>

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
        <script src="<?php echo base_url(); ?>js/ventas/orden_pedido.js"></script>
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

<!-- href="#ModalCliente" data-toggle="modal"  -->

<div style="width: 1200px;margin-left: -598px; " id="ModalAgregarArticulo" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 id="myModalLabel">Agregar artículo</h4>
    </div>
    <div class="modal-body"> 
        <u><h5 id="">Lista Cotizaciones</h5></u>
        <table class="table table-hover table-striped table-bordered table-condensed">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Nro. CT</th>
                    <th>Fecha</th>
                    <th>Razón Social</th>
                    <th>Moneda</th>
                    <th>Inc. IGV</th>
                    <th>Observaciones</th>
                </tr>
            </thead>
            <tbody id="table_modal_articulos"></tbody>
        </table>
        <u><h5 id="">Lista artículos</h5></u>
        <table class="table table-hover table-striped table-bordered table-condensed">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>ID Artículo</th>
                    <th>Descrip. Artículo</th>
                    <th>Unidad</th>
                    <th>Cantidad</th>
                    <th>Precio unitario</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody id="table_modal_articulos"></tbody>
        </table>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
        <!--<button class="btn btn-primary">Aceptar</button>-->
    </div>
</div>

<div style="width: 1000px;margin-left: -498px;" id="ModalListaContactos" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Seleccionar contacto</h3>
    </div>
    <div class="modal-body">
        <table class="table table-hover table-striped table-bordered table-condensed">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Contacto</th>
                    <th>Cargo</th>
                    <th>Teléfono</th>
                    <th>Fax:</th>
                    <th>eMail</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody id="table_modal_contacto_cotizacion">

            </tbody>
        </table>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
        <!--<button class="btn btn-primary">Aceptar</button>-->
    </div>
</div>