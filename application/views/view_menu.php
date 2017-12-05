<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="brand" href="<?php echo base_url(); ?>">Municipalidad</a>
            <div class="nav-collapse collapse">
                <ul class="nav">
                    <li class="active"><a href="<?php echo base_url(); ?>">Inicio</a></li>
                    <?php
                    if ($_SESSION['NIVEL_ACCESO'] == 3
                            || $_SESSION['NIVEL_ACCESO'] == 4
                            || $_SESSION['NIVEL_ACCESO'] == 5
                            || $_SESSION['NIVEL_ACCESO'] == 6) {
                    ?>
                        <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">Documento<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url(); ?>index.php/c_principal/VRegistrarDocumento">Registrar</a></li>
                                <!--<li><a href="<?php echo base_url(); ?>index.php/c_principal/VAnexarDocumento">Anexar</a></li>-->
                            </ul>
                        </li>
                    <?php } ?>
                    <?php
                    if ($_SESSION['NIVEL_ACCESO'] == 3
                            || $_SESSION['NIVEL_ACCESO'] == 4
                            || $_SESSION['NIVEL_ACCESO'] == 5
                            || $_SESSION['NIVEL_ACCESO'] == 6) {
                    ?>
                        <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">Operador<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url(); ?>index.php/c_principal/VOperador_registrar">Registrar</a></li>
                                <li><a href="<?php echo base_url(); ?>index.php/c_principal/VOperador_CambiarPass">Cambiar contraseña</a></li>
                            </ul>
                        </li>
                    <?php } ?>
                    <?php
                    if ($_SESSION['NIVEL_ACCESO'] == 3
                            || $_SESSION['NIVEL_ACCESO'] == 2
                            || $_SESSION['NIVEL_ACCESO'] == 4
                            || $_SESSION['NIVEL_ACCESO'] == 5
                            || $_SESSION['NIVEL_ACCESO'] == 6) {
                    ?>
                        <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">Mantenimiento<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url(); ?>index.php/c_principal/ver_mantenimiento_solicitante">Solicitante</a></li>
                                <!--<li><a href="<?php echo base_url(); ?>index.php/c_principal/ver_mantenimiento_documento">Documento</a></li>-->
                                <li><a href="<?php echo base_url(); ?>index.php/c_principal/ver_mantenimiento_recurrente">Recurrente</a></li>
                            </ul>
                        </li>
<?php } ?>
<?php
                    if ($_SESSION['NIVEL_ACCESO'] == 1
                            || $_SESSION['NIVEL_ACCESO'] == 2
                            || $_SESSION['NIVEL_ACCESO'] == 4
                            || $_SESSION['NIVEL_ACCESO'] == 5
                            || $_SESSION['NIVEL_ACCESO'] == 6) {
?>
                        <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">Evaluación<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url(); ?>index.php/c_principal/ver_registrar_operacion">Estado documento</a></li>
                                <li><a href="<?php echo base_url(); ?>index.php/c_principal/ver_ventanilla">Pre evaluación</a></li>
                            </ul>
                        </li>
<?php } ?>
<?php
                    if ($_SESSION['NIVEL_ACCESO'] == 2
                            || $_SESSION['NIVEL_ACCESO'] == 4
                            || $_SESSION['NIVEL_ACCESO'] == 5
                            || $_SESSION['NIVEL_ACCESO'] == 6) {
?>
                        <!--<li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">Informes<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url(); ?>index.php/c_principal/ver_expediente_segun_operador">Expedientes según operador</a></li>
                                <li><a href="<?php echo base_url(); ?>index.php/c_principal/ver_expedientes_ingresados">Expedientes ingresados</a></li>
                            </ul>
                        </li>-->
                        <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">Consultas<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url(); ?>index.php/c_principal/v_consultaxoperador">Expedientes por operador</a></li>
                                <li><a href="<?php echo base_url(); ?>index.php/c_principal/v_consultaxsolicitante">Expedientes según solicitante</a></li>
                                <li><a href="<?php echo base_url(); ?>index.php/c_principal/v_consultaxtipocarga">Expedientes por tipo de carga</a></li>
                            </ul>
                        </li>
<?php } ?>
                    <li><a href="<?php echo base_url(); ?>MANUAL.pdf" target="blank">Ayuda</a></li>
                </ul>
                <ul class="nav  pull-right">
                    <li class="dropdown pull-right">
                        <a href="" data-toggle="dropdown" role="button" id="drop4" class="dropdown-toggle"><i class="icon-user icon-white"></i><b class="caret"></b></a>
                        <ul aria-labelledby="drop4" role="menu" class="dropdown-menu" id="menu1">                                
                            <li role="presentation"><a tabindex="-1" role="menuitem" href='http://cedessi.com/tesis/index.php/c_principal/salir_sistema'>Salir</a></li>
                        </ul>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</div>
<?php
                    if (isset($_SESSION["LOGIN_USER"])) {
                        
                    } else {
                        $url = base_url();
                        header("Location: $url");
                    }
?>