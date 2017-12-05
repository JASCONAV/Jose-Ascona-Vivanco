<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="brand" href="<?php echo base_url(); ?>">GESTRA</a>
            <div class="nav-collapse collapse">
                <ul class="nav">
                    <li class="active"><a href="<?php echo base_url(); ?>">Inicio</a></li>
                    <!--<li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">Documento<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url(); ?>">.</a></li>
                        </ul>
                    </li>-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">Documento<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url(); ?>index.php/c_principal/VRegistrarDocumento">Registrar</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">Operador<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url(); ?>index.php/c_principal/VOperador_registrar">Registrar</a></li>
                            <li><a href="<?php echo base_url(); ?>index.php/c_principal/VOperador_CambiarPass">Cambiar contraseña</a></li>
                        </ul>
                    </li>
                    <li><a href="">Mantenimiento</a></li>
                    <li><a href="">Autorización</a></li>
                    <li><a href="">Informes</a></li>
                    <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">Consultas<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url(); ?>index.php/c_principal/v_consultaxoperador">Expedientes por operador</a></li>
                            <li><a href="<?php echo base_url(); ?>index.php/c_principal/v_consultaxsolicitante">Expedientes según solicitante</a></li>
                            <li><a href="<?php echo base_url(); ?>index.php/c_principal/v_consultaxtipocarga">Expedientes por tipo de carga</a></li>
                        </ul>
                    </li>
                    <li><a href="">Ayuda</a></li>
                </ul>
                <ul class="nav  pull-right">
                    <li class="dropdown pull-right">
                        <a href="" data-toggle="dropdown" role="button" id="drop4" class="dropdown-toggle"><i class="icon-user icon-white"></i><b class="caret"></b></a>
                        <ul aria-labelledby="drop4" role="menu" class="dropdown-menu" id="menu1">                                
                            <li role="presentation"><a href="" tabindex="-1" role="menuitem">Salir</a></li>
                        </ul>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</div>