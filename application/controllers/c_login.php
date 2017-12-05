<?php

/* En esta clase controlador C_login uso exclusivamente método POST
 * el motivo es porque me permite una mayor seguridad en el envío de datos.
 * El contructor que es la primera función que se ha creado, permite la ejecución de cualquier tipo de dato o función
 * al solo iniciar la clase.
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class c_login extends CI_Controller {

    function __construct() {
        //llamada al constructor del CI para la clase
        parent::__construct();
        //llamada a la función de inicio de sesión, registra el usuario en el servidor
        session_start();
    }

    public function index() {
        //Permite que la vista que llame esta función, obtenga la URL del servidor.
        $this->load->helper('url');
        $data['mensaje'] = '';
        if (isset($_SESSION['LOGIN_USER'])) {
            header("location: index.php/c_principal");
        } else {
            if (isset($_GET['label_direccion_cambiar'])) {
                $user = $this->Validar_Usuario($_GET['inputUsuario'], $_GET['inputPass']);
                if($user == '')
                {$data['mensaje'] = "<div class='alert alert-error'><strong>Oh error!</strong> Usuario no válido.....!</div>";
                $this->load->view('v_login', $data);
                
                }else{
                    header("location: index.php/c_principal");
                }
            } else {
                $this->load->view('v_login', $data);
            }
        }
    }

    //Esta función recibe dos parámetros: El usuario y contraseña a través del método POST
    public function Validar_Usuario($user, $pass) {
        $this->load->model('m_main');
        $resul = $this->m_main->m_validar_login($user, $pass);
        $usuario = '';$nivelAcceso = '';
        foreach ($resul as $fila) {
            $usuario = $fila->nomUsu;
            $nivelAcceso = $fila->tipo_usuario_codTipoUser;
        }
        if ($usuario != '') {
            $_SESSION['LOGIN_USER'] = $usuario;
            $_SESSION['NIVEL_ACCESO'] = $nivelAcceso;
        }
        return $usuario;
    }

}

?>