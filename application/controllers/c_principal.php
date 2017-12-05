<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class c_principal extends CI_Controller {

    function __construct() {
        //llamada al constructor del CI para la clase
        parent::__construct();
        session_start();
    }

    public function salir_sistema() {
        //Permite que la vista que llame esta función, obtenga la URL del servidor.
        //$this->load->helper('url');
        //$url = base_url();
        unset($_SESSION["LOGIN_USER"]);
        unset($_SESSION["NIVEL_ACCESO"]);
		session_unset(); 
        session_destroy();
        //echo $url;
        header("Location: http://cedessi.com/tesis");
    }

    public function index() {
        //Permite que la vista que llame esta función, obtenga la URL del servidor.
        $this->load->helper('url');
        $this->load->view('v_principal');
    }

    public function VRegistrarDocumento() {
        //Permite que la vista que llame esta función, obtenga la URL del servidor.
        $this->load->helper('url');
        $this->load->model('m_main');
        $data['lista_areas'] = $this->cargar_areas();
        $this->load->view('v_registrardocumento', $data);
    }

    public function VAnexarDocumento() {
        //Permite que la vista que llame esta función, obtenga la URL del servidor.
        $this->load->helper('url');
        $this->load->view('v_anexar_documento');
    }

    public function VOperador_registrar() {
        //Permite que la vista que llame esta función, obtenga la URL del servidor.
        $this->load->helper('url');
        $this->load->model('m_main');
        $data['SelectTipoUsuario'] = $this->cargar_tipo_usuario();
        $this->load->view('v_registrar_operador', $data);
    }

    public function VOperador_CambiarPass() {
        //Permite que la vista que llame esta función, obtenga la URL del servidor.
        $this->load->helper('url');
        $this->load->view('v_cambiar_pass');
    }

    public function v_consultaxoperador() {
        //Permite que la vista que llame esta función, obtenga la URL del servidor.
        $this->load->helper('url');
        $data['LIdUsuarios'] = $this->lista_IDusuarios();
        $this->load->view('v_consultaxoperador', $data);
    }

    public function Lista_Idusuario_documento() {
        //Permite que la vista que llame esta función, obtenga la URL del servidor.
        $this->load->model('m_main');
        $param = $_POST['param'];
        $fi = $_POST['fd'];
        $fh = $_POST['fh'];
        $resul = $this->m_main->m_Lista_Idusuario_documento($param, $fi, $fh);
        $item = 1;
        /* <select id="selectAsunto">
          <option value="Autorización de circulación">Autorización de circulación</option>
          <option value="Inclusión">Inclusión </option>
          <option value="Anexo">Anexo</option>
          <option value="Otros">Otros</option>
          </select> */
        foreach ($resul as $fila) {
            $asunto = '';
            if ($fila->asunto == 0) {
                $asunto = 'Autorización de circulación';
            } else if ($fila->asunto == 1) {
                $asunto = 'Inclusión';
            } else if ($fila->asunto == 2) {
                $asunto = 'Anexo';
            } else if ($fila->asunto == 3) {
                $asunto = 'Otros';
            }
            $fecha = explode("-", $fila->fechaIngreso);
            $fecha = $fecha[2] . '-' . $fecha[1] . '-' . $fecha[0];
            echo "<tr><td>$item</td><td>" . $fila->nroDocumento . '</td><td> ' . $fecha . '</td><td>' . $asunto . "</td><td>" .
            $fila->numeroFolios . "</td><td>" . $fila->tipo_de_documento_codTipoDoc . "</td><td>" .
            $fila->solicitante_RUC . "</td></tr>";
            $item++;
        }
    }

    public function Lista_Carga_documento() {
        //Permite que la vista que llame esta función, obtenga la URL del servidor.
        $this->load->model('m_main');
        $param = $_POST['param'];
        $fi = $_POST['fd'];
        $fh = $_POST['fh'];
        $resul = $this->m_main->m_Lista_Carga_documento($param, $fi, $fh);
        $item = 1;
        foreach ($resul as $fila) {
            $asunto = '';
            if ($fila->asunto == 0) {
                $asunto = 'Autorización de circulación';
            } else if ($fila->asunto == 1) {
                $asunto = 'Inclusión';
            } else if ($fila->asunto == 2) {
                $asunto = 'Anexo';
            } else if ($fila->asunto == 3) {
                $asunto = 'Otros';
            }
            $fecha = explode("-", $fila->fechaIngreso);
            $fecha = $fecha[2] . '-' . $fecha[1] . '-' . $fecha[0];
            echo "<tr><td>$item</td><td>" . $fila->nroDocumento . '</td><td> ' . $fecha . '</td><td>' . $asunto . "</td><td>" .
            $fila->numeroFolios . "</td><td>" . $fila->tipo_de_documento_codTipoDoc . "</td><td>" .
            $fila->solicitante_RUC . "</td></tr>";
            $item++;
        }
    }

    public function Lista_Solicitante_documento() {
        //Permite que la vista que llame esta función, obtenga la URL del servidor.
        $this->load->model('m_main');
        $param = $_POST['param'];
        $fi = $_POST['fd'];
        $fh = $_POST['fh'];
        $param = explode(" - ", $param);
        $resul = $this->m_main->m_Lista_Solicitante_documento($param[0], $fi, $fh);
        $item = 1;
        foreach ($resul as $fila) {
            $asunto = '';
            if ($fila->asunto == 0) {
                $asunto = 'Autorización de circulación';
            } else if ($fila->asunto == 1) {
                $asunto = 'Inclusión';
            } else if ($fila->asunto == 2) {
                $asunto = 'Anexo';
            } else if ($fila->asunto == 3) {
                $asunto = 'Otros';
            }
            $fecha = explode("-", $fila->fechaIngreso);
            $fecha = $fecha[2] . '-' . $fecha[1] . '-' . $fecha[0];
            echo "<tr><td>$item</td><td>" . $fila->nroDocumento . '</td><td> ' . $fecha . '</td><td>' . $asunto . "</td><td>" .
            $fila->numeroFolios . "</td><td>" . $fila->tipo_de_documento_codTipoDoc . "</td><td>" .
            $fila->solicitante_RUC . "</td></tr>";
            $item++;
        }
    }

    public function v_consultaxsolicitante() {
        //Permite que la vista que llame esta función, obtenga la URL del servidor.
        $this->load->helper('url');
        $this->load->view('v_consultaxsolicitante');
    }

    public function typeHeadlista_solicitante() {
        $this->load->model('m_main');
        //$dato = $_GET['term'];
        $result = $this->m_main->lista_TypeHead_solicitante();
        $select = '';
        foreach ($result as $fila) {
            $select[] = $fila->RUC . ' - ' . $fila->nombreSoli . ' ' . $fila->apePatSoli . ' ' . $fila->apeMatSoli;
        }
        echo json_encode($select);
    }

    public function v_consultaxtipocarga() {
        //Permite que la vista que llame esta función, obtenga la URL del servidor.
        $this->load->helper('url');
        $data['lista_areas'] = $this->cargar_areas();
        $this->load->view('v_consultaxtipocarga', $data);
    }

    public function ver_mantenimiento_solicitante() {
        //Permite que la vista que llame esta función, obtenga la URL del servidor.
        $this->load->helper('url');
        $this->load->model('m_main');
        $data['lista_ubigueo'] = $this->cargar_ubigueo();
        $this->load->view('v_mantenimiento_solicitante', $data);
    }

    public function ver_mantenimiento_documento() {
        $this->load->helper('url');
        $this->load->view('v_mantenimiento_documento');
    }

    public function ver_autorizacion_aprobada() {
        $this->load->helper('url');
        $this->load->view('v_autorizacion_aprobada');
    }

    public function ver_expediente_segun_operador() {
        $this->load->helper('url');
        $this->load->view('v_expediente_segun_operador');
    }

    public function ver_expedientes_ingresados() {
        $this->load->helper('url');
        $this->load->view('v_expedientes_ingresados');
    }

    public function ver_ventanilla() {
        $this->load->helper('url');
        $this->load->view('v_ventanilla');
    }

    public function ver_registrar_operacion() {
        //Permite que la vista que llame esta función, obtenga la URL del servidor.
        $this->load->helper('url');
        $this->load->model('m_main');
        $result = $this->m_main->m_lista_documentos();
        $select = '';
        foreach ($result as $fila) {
            $select .= "<option value='$fila->nroDocumento'>" . $fila->nroDocumento . "</option>";
        }
        $data['select'] = $select;
        $this->load->view('v_registrar_operacion', $data);
    }

    public function ver_mantenimiento_recurrente() {
        //Permite que la vista que llame esta función, obtenga la URL del servidor.
        $this->load->helper('url');
        $data['lista_ubigueo'] = $this->cargar_ubigueo();
        $this->load->view('v_mantenimiento_recurrente', $data);
    }

    public function cargar_ubigueo() {
        $this->load->model('m_main');
        $result = $this->m_main->m_lista_ubigueo();
        $select = '';
        foreach ($result as $fila) {
            $select .= "<option value='$fila->UBIGEO'>" . $fila->Departamento . " - " . $fila->Provincia . " - " . $fila->Distrito . "</option>";
        }
        return $select;
    }

    public function cargar_areas() {
        $this->load->model('m_main');
        $result = $this->m_main->lista_tipo_carga();
        $select = '';
        foreach ($result as $fila) {
            $select .= "<option value='$fila->codTipoCarga'>" . $fila->nomTipoCarga . " - " . $fila->nomSubTipoCarga . "</option>";
        }
        return $select;
    }

    public function cargar_tipo_usuario() {
        $this->load->model('m_main');
        $result = $this->m_main->m_lista_tipo_usuario();
        $select = '';
        foreach ($result as $fila) {
            $select .= "<option value='$fila->codTipoUser'>" . $fila->tipoUsuario . "</option>";
        }
        return $select;
    }

    public function actualizarPassOperador() {
        $this->load->model('m_main');
        $user = $_POST['usuario'];
        $pass = $_POST['Npass'];
        $result = $this->m_main->m_actualizar_pass_usuario($user, $pass);
    }

    public function get_solicitante_documento() {
        $this->load->model('m_main');
        $result = $this->m_main->m_get_solicitante_rd($_POST['param']);
        $data = '';
        foreach ($result as $fila) {
            $data .= "<input type='hidden' id='inputSoliciNomb' value='$fila->nombreSoli'>";
            $data .= "<input type='hidden' id='inputSoliciApep' value='$fila->apePatSoli'>";
            $data .= "<input type='hidden' id='inputSoliciAma' value='$fila->apeMatSoli'>";
        }
        echo $data;
    }

    public function get_solicitante() {
        $this->load->model('m_main');
        $result = $this->m_main->mm_get_solicitante($_POST['param']);
        //print_r($result);
        foreach ($result as $fila) {
            echo $fila->nombreSoli;
        }
    }

    public function m_get_recurrente_rd() {
        $this->load->model('m_main');
        $result = $this->m_main->m_get_recurrente_rd($_POST['param']);
        $data = '';
        foreach ($result as $fila) {
            $data .= "<input type='hidden' id='inputSoliciNomb' value='$fila->nomRecu'>";
            $data .= "<input type='hidden' id='inputSoliciApep' value='$fila->apePatrecu'>";
            $data .= "<input type='hidden' id='inputSoliciAma' value='$fila->apeMatRecu'>";
        }
        echo $data;
    }

    public function insertar_documento() {
        $this->load->model('m_main');
        $this->m_main->m_insertar_documento($_POST['nroDocumento'], $_POST['fechaIngreso'], $_POST['asunto'], $_POST['numeroFolios'], $_POST['recurrente_codRecu'], $_POST['solicitante_codSoli'], $_SESSION['LOGIN_USER'], $_POST['tipo_de_documento_codTipoDoc'], $_POST['tipo_de_carga_codTipoCarga']);
        /* nroDocumento, $fechaIngreso, $asunto, $numeroFolios, 
          $recurrente_codRecu, $solicitante_codSoli, $usuario_nomUsu,
          $tipo_de_documento_codTipoDoc, $tipo_de_carga_codTipoCarga ) { */
    }

    public function insertar_operador() {
        $this->load->model('m_main');
        $this->m_main->m_insertar_operador($_POST['inputUsuario'], $_POST['inputDni'], $_POST['inputClave'], $_POST['inputApMaterno'], $_POST['inputAppaterno'], $_POST['inputNombre'], $_POST['inputNacimiento'], $_POST['sexo'], $_POST['inputTelefono'], $_POST['selectTipoUsuario']);
        //$nomUsu,$DNI,$clave,$apeMat,$apePat,$nombre,$fechNac,$sexo,$telefono,$tipoUsuario,$codTipoUser,$tipo_usuario_codTipoUser
    }

    public function ListaUsuarios() {
        //Permite que la vista que llame esta función, obtenga la URL del servidor.
        $this->load->model('m_main');
        $resul = $this->m_main->MListaUsuarios();
        $item = 1;
        foreach ($resul as $fila) {
            $fecha = explode("-", $fila->fechNac);
            $fecha = $fecha[2] . '-' . $fecha[1] . '-' . $fecha[0];
            echo "<tr><td>$item</td><td>" . $fila->nombre . ' ' . $fila->apePat . ' ' . $fila->apeMat . "</td><td>" .
            $fila->nomUsu . "</td><td>" . $fila->DNI . "</td><td>" .
            $fila->telefono . "</td><td>" . $fecha .
            "<td><a href='#ModalEditarUsuario' data-toggle='modal' onclick=\"editar_usuario('$fila->nomUsu')\">Editar</a> - <a onclick=\"eliminar_usuario('$fila->nomUsu')\">Eliminar</a></td></tr>";
            $item++;
        }
    }

    public function ListaRecurrent() {
        //Permite que la vista que llame esta función, obtenga la URL del servidor.
        $this->load->model('m_main');
        $resul = $this->m_main->MListaRecurrent();
        $item = 1;
        foreach ($resul as $fila) {
            echo "<tr><td>$item</td><td>" . $fila->nombre . ' ' . $fila->apePat . ' ' . $fila->apeMat . "</td><td>" .
            $fila->nomUsu . "</td><td>" . $fila->DNI . "</td><td>" .
            $fila->telefono . "</td><td>" . $fila->fechNac .
            "<td><a href='#ModalEditarUsuario' data-toggle='modal' onclick=\"editar_usuario('$fila->nomUsu')\">Editar</a> - <a onclick=\"eliminar_usuario('$fila->nomUsu')\">Eliminar</a></td></tr>";
            $item++;
        }
    }

    public function eliminar_operador() {
        //Permite que la vista que llame esta función, obtenga la URL del servidor.
        $this->load->model('m_main');
        $this->m_main->m_eliminar_usuario($_POST['idUsuario']);
    }

    public function editar_usuario() {
        //Permite que la vista que llame esta función, obtenga la URL del servidor.
        $this->load->model('m_main');
        $resul = $this->m_main->m_editar_usuario($_POST['idUsuario']);
        foreach ($resul as $fila) {
            $fecha = explode("-", $fila->fechNac);
            $fecha = $fecha[2] . '-' . $fecha[1] . '-' . $fecha[0];
            //AJESUSC$#wer#$48823409$#wer#$AJESUSC1$#wer#$ALBERTO$#wer#$JESUS$#wer#$
            //CUENCA$#wer#$0000-00-00 00:00:00$#wer#$M$#wer#$$#wer#$6
            echo "$fila->nomUsu$#wer#$$fila->DNI$#wer#$$fila->clave$#wer#$$fila->apeMat";
            echo "$#wer#$$fila->apePat$#wer#$$fila->nombre$#wer#$$fecha$#wer#$$fila->sexo";
            echo "$#wer#$$fila->telefono$#wer#$$fila->tipo_usuario_codTipoUser";
        }
    }

    public function update_datos() {
        $this->load->model('m_main');
        $this->m_main->m_update_datos($_POST['inputUsuario'], $_POST['inputDni'], $_POST['inputClave'], $_POST['inputApMaterno'], $_POST['inputAppaterno'], $_POST['inputNombre'], $_POST['inputNacimiento'], $_POST['sexo'], $_POST['inputTelefono'], $_POST['selectTipoUsuario']);
        //$nomUsu,$DNI,$clave,$apeMat,$apePat,$nombre,$fechNac,$sexo,$telefono,$tipoUsuario,$codTipoUser,$tipo_usuario_codTipoUser
    }

    public function lista_IDusuarios() {
        //Permite que la vista que llame esta función, obtenga la URL del servidor.
        $this->load->model('m_main');
        $resul = $this->m_main->MListaUsuarios();
        $select = "";
        foreach ($resul as $fila) {
            $select .= "<option value='$fila->nomUsu'>$fila->nomUsu</option>";
        }

        return $select;
    }

    public function ListaSolicitante() {
        //Permite que la vista que llame esta función, obtenga la URL del servidor.
        $this->load->model('m_main');
        $resul = $this->m_main->MListaSolicitante();
        $item = 1;
        foreach ($resul as $fila) {
            echo "<tr><td>$item</td><td>" . $fila->nombreSoli . ' ' . $fila->apePatSoli . ' ' . $fila->apeMatSoli . "</td><td>" .
            $fila->RUC . "</td><td>" . $fila->direccionSoli . "</td><td>" .
            $fila->teléfono . "</td>" .
            "<td><a href='#ModalEditarUsuario' data-toggle='modal' onclick=\"editar_solicitante('$fila->RUC')\">Editar</a> - <a onclick=\"eliminar_solicitante('$fila->RUC')\">Eliminar</a></td></tr>";
            $item++;
        }
    }

    public function insertar_solicitane() {
        $this->load->model('m_main');
        $this->m_main->m_insertar_solicitante($_POST['inputruc'], $_POST['inputNombre'], $_POST['inputApMaterno'], $_POST['inputAppaterno'], $_POST['inputdireccion'], $_POST['inputTelefono'], $_POST['tipo_solicitante'], $_POST['selectUbigueo']);
    }

    public function eliminar_solicitante() {
        //Permite que la vista que llame esta función, obtenga la URL del servidor.
        $this->load->model('m_main');
        $this->m_main->m_eliminar_solicitante($_POST['id']);
    }

    public function editar_solicitante() {
        //Permite que la vista que llame esta función, obtenga la URL del servidor.
        $this->load->model('m_main');
        $resul = $this->m_main->m_editar_solicitante($_POST['id']);
        foreach ($resul as $fila) {
            //AJESUSC$#wer#$48823409$#wer#$AJESUSC1$#wer#$ALBERTO$#wer#$JESUS$#wer#$
            //CUENCA$#wer#$0000-00-00 00:00:00$#wer#$M$#wer#$$#wer#$6
            echo "$fila->RUC$#wer#$$fila->nombreSoli$#wer#$$fila->apePatSoli$#wer#$$fila->apeMatSoli";
            echo "$#wer#$$fila->direccionSoli$#wer#$$fila->teléfono$#wer#$$fila->tipo_de_solicitante_codTipoSoli$#wer#$$fila->IdUbigueo";
        }
    }

    public function update_solicitante() {
        $this->load->model('m_main');
        $this->m_main->m_update_solicitante($_POST['inputruc'], $_POST['inputNombre'], $_POST['inputApMaterno'], $_POST['inputAppaterno'], $_POST['inputdireccion'], $_POST['inputTelefono'], $_POST['tipo_solicitante'], $_POST['selectUbigueo']);
        //$nomUsu,$DNI,$clave,$apeMat,$apePat,$nombre,$fechNac,$sexo,$telefono,$tipoUsuario,$codTipoUser,$tipo_usuario_codTipoUser
    }

    public function eliminar_documento() {
        //Permite que la vista que llame esta función, obtenga la URL del servidor.
        $this->load->model('m_main');
        $this->m_main->m_eliminar_documento($_POST['idUsuario']);
    }

    public function ListaRecurrente() {
        //Permite que la vista que llame esta función, obtenga la URL del servidor.
        $this->load->model('m_main');
        $resul = $this->m_main->MListarecurrente();
        $item = 1;
        foreach ($resul as $fila) {
            echo "<tr><td>$item</td><td>" . $fila->nomRecu . ' ' . $fila->apePatRecu . ' ' . $fila->apeMatRecu . "</td><td>" .
            $fila->numIdentif . "</td><td>" . $fila->tipo_de_recurrente_codTipoRecu . "</td><td>" .
            $fila->idUbigueo . "</td>" .
            "<td><a href='#ModalEditarUsuario' data-toggle='modal' onclick=\"editar_recurrente('$fila->numIdentif')\">Editar</a> - <a onclick=\"eliminar_recurrente('$fila->numIdentif')\">Eliminar</a></td></tr>";
            $item++;
        }
    }

    public function insertar_recurrente() {
        $this->load->model('m_main');
        $this->m_main->m_insertar_recurrente($_POST['inputNombre'], $_POST['inputApMaterno'], $_POST['inputAppaterno'], $_POST['inputIdentificacio'], $_POST['selectTipoRecurrente'], $_POST['selectUbigueo']);
    }

    public function editar_recurrente() {
        //Permite que la vista que llame esta función, obtenga la URL del servidor.
        $this->load->model('m_main');
        $resul = $this->m_main->m_editar_recurrente($_POST['id']);
        foreach ($resul as $fila) {
            //AJESUSC$#wer#$48823409$#wer#$AJESUSC1$#wer#$ALBERTO$#wer#$JESUS$#wer#$
            //CUENCA$#wer#$0000-00-00 00:00:00$#wer#$M$#wer#$$#wer#$6
            echo "$fila->nomRecu$#wer#$$fila->apePatRecu$#wer#$$fila->apeMatRecu";
            echo "$#wer#$$fila->numIdentif$#wer#$$fila->tipo_de_recurrente_codTipoRecu$#wer#$$fila->idUbigueo";
        }
    }

    public function eliminar_recurrente() {
        //Permite que la vista que llame esta función, obtenga la URL del servidor.
        $this->load->model('m_main');
        $this->m_main->m_eliminar_recurrente($_POST['id']); //2910609
    }

    public function update_recurrente() {
        $this->load->model('m_main');
        $this->m_main->m_update_recurrente($_POST['inputNombre'], $_POST['inputApMaterno'], $_POST['inputAppaterno'], $_POST['inputIdentificacio'], $_POST['selectTipoRecurrente'], $_POST['selectUbigueo']);
    }

    public function registrar_estado_documento() {
        $this->load->model('m_main');
        $this->m_main->regitrar_estado_documento($_POST['selectuser'], $_POST['mensaje'], $_POST['selectEstado'], date('Y-m-d'));
    }

    public function consultar_PreEvaluacion() {
        $this->load->model('m_main');
        $resul = $this->m_main->m_consultar_preEvaluacion($_POST['id']);
        $styleFondo = "background:red;";
        $color = "color:white;";
        $r = 0;
        $tr=0;

        foreach ($resul as $fila) {
            $fecha = explode("-", $fila->fechaIngreso);
            $fecha = $fecha[0] . '-' . $fecha[1] . '-' . $fecha[2];
            $dato = $this->diferencia_fechas($fecha);
            if ($dato >= 12) {
                $styleFondo = "background:red;";
                $color = "color:white;";
            }else if ($dato >= 7 && $dato <= 11) {
                $styleFondo = "background:green;";
                $color = "color:white;";
            }else if ($dato <= 7) {
                $styleFondo = "background: #D0D0D0";
                $color = "";
            }
            

            $asunto = '';
            if ($fila->asunto == 0) {
                $asunto = 'Autorización de circulación';
            } else if ($fila->asunto == 1) {
                $asunto = 'Inclusión';
            } else if ($fila->asunto == 2) {
                $asunto = 'Anexo';
            } else if ($fila->asunto == 3) {
                $asunto = 'Otros';
            }
            //echo "<hr><h5>$dato</h5>";
            if ($r == 0) {
                echo "<hr><table style=' border: 1px solid black;width:300px; $color' id='' class='table table-hover table-striped table-bordered table-condensed'>
                        <thead>
                            <tr>
                                <th colspan=2><center><h4>Datos del solicitante</h4></center></th>
                            </tr>
                        </thead>
                        <tbody id='CUERPO_CONSULTA'>";
                echo "<tr style='  ';><td style=' ';>RUC:</td><td style=' ';>$fila->RUC</td></tr>
                    <tr style=' ';><td style=' ';>Nombre:</td><td style=' ';>$fila->nombreSoli</td></tr>
                    <tr style=' ';><td style=' ';>Ape. Paterno</td><td style=' ';>$fila->apePatSoli</td></tr>
                    <tr style=' ';><td style=' ';>Ape. Materno</td><td style=' ';>$fila->apeMatSoli</td></tr></tr>";
                echo "</tbody>
                    </table><hr><table> '<tr>'                ";
                $r++;
            }
           // if (($tr%3) == 0 || $tr == 0) {
                //echo "<div class = 'row-fluid'>";<div class = 'row-fluid' style='max-height:140px; 120px; width:900px'>
            //}
            echo "<td><table style=' $styleFondo border: 1px solid black;width:300px; $color' id='' class='table table-hover table-striped table-bordered table-condensed'>
                        <thead>
                            <tr>
                                <th colspan=2><center><h4>Datos del documento</h4></center></th>
                            </tr>
                        </thead>
                        <tbody id='CUERPO_CONSULTA'>";
            echo "<tr style=' $styleFondo ';><td style=' $styleFondo ';>Nr. Documento:</td><td style=' $styleFondo ';>$fila->nroDocumento</td></tr>
                    <tr style=' $styleFondo ';><td style=' $styleFondo ';>Fecha ingreso:</td><td style=' $styleFondo ';>$fecha</td></tr>
                    <tr style=' $styleFondo ';><td style=' $styleFondo ';>Asunto</td><td style=' $styleFondo ';>$asunto</td></tr>
                    <tr style=' $styleFondo ';><td style=' $styleFondo ';>Tipo de documento</td><td style=' $styleFondo ';>$fila->nombreTipoDoc</td></tr>
                    <tr style=' $styleFondo ';><td style=' $styleFondo ';>Tipo de carga</td><td style=' $styleFondo ';>$fila->nomTipoCarga</td>
                    <tr style=' $styleFondo';><td style=' $styleFondo';>Total Folios</td><td style=' $styleFondo';>$fila->numeroFolios</td></tr>";
            echo "</tbody>
                    </table></td>";
            //if (($tr%3) == 0 && $tr > 2) {
              
            //}
            $r++;$tr++;
            
        }  echo "</tr>"; echo "</table>";
            
            
    }
    

    public function diferencia_fechas($param) {
        $date = date("Y/n/d");
        $fechaDeOperacion = '2013-02-03';
        $activationdate = date("Y/n/d", strtotime("$param"));
        $years = date("Y", strtotime("now")) - date("Y", strtotime($activationdate));
        if (date("Y", strtotime($date)) == date("Y", strtotime($activationdate))) {
            $months = date("m", strtotime($date)) - date("m", strtotime($activationdate));
        } elseif ($years == "1") {
            $months = (date("m", strtotime("December")) - date("m", strtotime($activationdate))) + (date("m"));
        } elseif ($years >= "2") {
            $months = ($years * 12) + (date("m", strtotime("now")) - date("m", strtotime($activationdate)));
        }
        // echo $months . ' months ' . $years . ' --- ' . date("Y/n/d");
        return $months . "---" . $param;
    }

}

?>