<?php

class m_main extends CI_Model {

    function __construct() {
        //llamada al constructor del CI para la clase
        parent::__construct();
        //Carga el driver de base de datos del codeigniter màs para usar la librerìa que contiene el mysqli
        $this->load->database();
    }

    public function m_validar_login($user, $pass) {
        $query = $this->db->query("SELECT `nomUsu`, `clave`,tipo_usuario_codTipoUser FROM `usuario` where `nomUsu` = '$user' and clave = '$pass';");
        return $query->result();
    }

    public function lista_tipo_carga() {
        $query = $this->db->query("SELECT `codTipoCarga`, `nomTipoCarga`, `nomSubTipoCarga` FROM `tipo_de_carga`;");
        return $query->result();
    }

    public function m_lista_ubigueo() {
        $query = $this->db->query("SELECT * FROM `ubigeos`;");
        return $query->result();
    }

    public function m_actualizar_pass_usuario($user, $pass) {
        $this->db->query("UPDATE `usuario` SET `clave`='$pass' WHERE nomUsu = '$user' order by fechNac desc;");
    }

    public function m_get_solicitante_rd($param) {
        $query = $this->db->query("SELECT nombreSoli,apePatSoli,apeMatSoli FROM cedess64_municipalidad_nuevo.solicitante
                          where RUC = '$param';");
        return $query->result();
    }

    public function m_lista_tipo_usuario() {
        $query = $this->db->query("SELECT * FROM cedess64_municipalidad_nuevo.tipo_usuario;");
        return $query->result();
    }

    public function m_get_recurrente_rd($param) {
        $query = $this->db->query("SELECT  nomRecu, apePatrecu, apeMatRecu FROM cedess64_municipalidad_nuevo.recurrente
                          where numIdentif = '$param';");
        return $query->result();
    }

    public function m_insertar_documento($nroDocumento, $fechaIngreso, $asunto, $numeroFolios, $recurrente_codRecu, $solicitante_codSoli, $usuario_nomUsu, $tipo_de_documento_codTipoDoc, $tipo_de_carga_codTipoCarga) {
        $splitFecha = explode("/", $fechaIngreso);
        $fechaIngreso = $splitFecha[2] . "-" . $splitFecha[1] . "-" . $splitFecha[0];

        $this->db->query("INSERT INTO  `cedess64_municipalidad_nuevo`.`documento` (
								`nroDocumento` ,
								`fechaIngreso` ,
								`asunto` ,
								`numeroFolios` ,
								`recurrente_numIdentif1` ,
								`solicitante_RUC` ,
								`usuario_nomUsu` ,
								`tipo_de_documento_codTipoDoc` ,
								`tipo_de_carga_codTipoCarga`
								)
								VALUES ('$nroDocumento','$fechaIngreso', '$asunto', '$numeroFolios', 
                                    '$recurrente_codRecu', '$solicitante_codSoli', '$usuario_nomUsu', 
                                    '$tipo_de_documento_codTipoDoc', '$tipo_de_carga_codTipoCarga');");
    }

    public function m_insertar_operador($nomUsu, $DNI, $clave, $apeMat, $apePat, $nombre, $fechNac, $sexo, $telefono, $tipo_usuario_codTipoUser) {
        $splitFecha = explode("/", $fechNac);
        $fechNac = $splitFecha[2] . "-" . $splitFecha[1] . "-" . $splitFecha[0];
        $this->db->query("INSERT INTO `cedess64_municipalidad_nuevo`.`usuario`  (`nomUsu`,
`DNI`,
`clave`,
`apeMat`,
`apePat`,
`nombre`,
`fechNac`,
`sexo`,
`telefono`,
`tipo_usuario_codTipoUser`)
VALUES
( '$nomUsu','$DNI','$clave','$apeMat','$apePat','$nombre',
'$fechNac','$sexo','$telefono','$tipo_usuario_codTipoUser');
");
    }

    public function MListaUsuarios() {
        //Permite que la vista que llame esta función, obtenga la URL del servidor.
        $query = $this->db->query("SELECT usuario.nomUsu,
usuario.DNI,
usuario.clave,
usuario.apeMat,
usuario.apePat,
usuario.nombre,
date(usuario.fechNac) as fechNac,
usuario.sexo,
usuario.telefono,
usuario.tipo_usuario_codTipoUser
FROM
usuario;");
        return $query->result();
    }

    public function m_eliminar_usuario($param) {
        $this->db->query("DELETE FROM `usuario` WHERE nomUsu = '$param';");
    }

    public function m_editar_usuario($param) {
        $query = $this->db->query("SELECT
usuario.nomUsu,
usuario.DNI,
usuario.clave,
usuario.apeMat,
usuario.apePat,
usuario.nombre,
date(usuario.fechNac) as fechNac,
usuario.sexo,
usuario.telefono,
usuario.tipo_usuario_codTipoUser
FROM
usuario
 WHERE nomUsu = '$param';");
        return $query->result();
    }

    public function m_update_datos($nomUsu, $DNI, $clave, $apeMat, $apePat, $nombre, $fechNac, $sexo, $telefono, $tipo_usuario_codTipoUser) {
        $splitFecha = explode("-", $fechNac);
        $fechNac = $splitFecha[2] . "-" . $splitFecha[1] . "-" . $splitFecha[0];
        $this->db->query("UPDATE `cedess64_municipalidad_nuevo`.`usuario`
                            SET
                            `DNI` = '$DNI',
                            `clave` = '$clave',
                            `apeMat` = '$apeMat',
                            `apePat` = '$apePat',
                            `nombre` = '$nombre',
                            `fechNac` = '$fechNac',
                            `sexo` = '$sexo',
                            `telefono` = '$telefono',
                            `tipo_usuario_codTipoUser` = '$tipo_usuario_codTipoUser'
                            WHERE nomUsu = '$nomUsu'");
    }

    public function m_Lista_Idusuario_documento($param, $fi, $fh) {
        $splitFecha = explode("/", $fi);
        $fi = $splitFecha[2] . "-" . $splitFecha[1] . "-" . $splitFecha[0];
        $splitFecha = explode("/", $fh);
        $fh = $splitFecha[2] . "-" . $splitFecha[1] . "-" . $splitFecha[0];
        $query = $this->db->query("SELECT documento.nroDocumento,
date(documento.fechaIngreso) as fechaIngreso,
documento.asunto,
documento.numeroFolios,
documento.usuario_nomUsu,
documento.tipo_de_carga_codTipoCarga,
documento.recurrente_numIdentif1,
documento.solicitante_RUC,
documento.estado_atencion,
tipo_de_documento.nombreTipoDoc as tipo_de_documento_codTipoDoc 
                FROM documento,tipo_de_documento where usuario_nomUsu = '$param'
                                  and date(fechaIngreso) BETWEEN date('$fi') AND date('$fh') 
                and documento.tipo_de_documento_codTipoDoc = tipo_de_documento.codTipoDoc;");
        return $query->result();
    }

    public function m_Lista_Carga_documento($param, $fi, $fh) {
        $splitFecha = explode("/", $fi);
        $fi = $splitFecha[2] . "-" . $splitFecha[1] . "-" . $splitFecha[0];
        $splitFecha = explode("/", $fh);
        $fh = $splitFecha[2] . "-" . $splitFecha[1] . "-" . $splitFecha[0];
        $query = $this->db->query("SELECT documento.nroDocumento,
date(documento.fechaIngreso) as fechaIngreso,
documento.asunto,
documento.numeroFolios,
documento.usuario_nomUsu,
documento.tipo_de_carga_codTipoCarga,
documento.recurrente_numIdentif1,
documento.solicitante_RUC,
documento.estado_atencion,
tipo_de_documento.nombreTipoDoc as tipo_de_documento_codTipoDoc 
                FROM documento,tipo_de_documento where tipo_de_carga_codTipoCarga = '$param'
                                  and date(fechaIngreso) BETWEEN date('$fi') AND date('$fh') 
                and documento.tipo_de_documento_codTipoDoc = tipo_de_documento.codTipoDoc;");
        return $query->result();
    }

    public function m_lista_documentos() {
        $query = $this->db->query("SELECT * FROM `documento`;");
        return $query->result();
    }

    public function lista_TypeHead_solicitante() {
        $query = $this->db->query("SELECT * FROM `solicitante`;");
        return $query->result();
    }

    public function m_Lista_Solicitante_documento($param, $fi, $fh) {
        $splitFecha = explode("/", $fi);
        $fi = $splitFecha[2] . "-" . $splitFecha[1] . "-" . $splitFecha[0];
        $splitFecha = explode("/", $fh);
        $fh = $splitFecha[2] . "-" . $splitFecha[1] . "-" . $splitFecha[0];
        $query = $this->db->query("SELECT documento.nroDocumento,
date(documento.fechaIngreso) as fechaIngreso,
documento.asunto,
documento.numeroFolios,
documento.usuario_nomUsu,
documento.tipo_de_carga_codTipoCarga,
documento.recurrente_numIdentif1,
documento.solicitante_RUC,
documento.estado_atencion,
tipo_de_documento.nombreTipoDoc as tipo_de_documento_codTipoDoc 
                FROM documento,tipo_de_documento where solicitante_RUC = '$param'
                                  and date(fechaIngreso) BETWEEN date('$fi') AND date('$fh')
                and documento.tipo_de_documento_codTipoDoc = tipo_de_documento.codTipoDoc;");
        return $query->result();
    }

    public function m_insertar_solicitante($param, $param1, $param2, $param3, $param4, $param5, $param6, $param7) {
        $this->db->query("INSERT INTO `cedess64_municipalidad_nuevo`.`solicitante`
                        (`RUC`,`nombreSoli`, `apePatSoli`,`apeMatSoli`,
                        `direccionSoli`,
                        `teléfono`,
                        `tipo_de_solicitante_codTipoSoli`,IdUbigueo)
                        VALUES
                        ('$param', '$param1', '$param2', '$param3', '$param4', '$param5', '$param6', '$param7'  );");
    }

    public function MListaSolicitante() {
        //Permite que la vista que llame esta función, obtenga la URL del servidor.
        $query = $this->db->query("SELECT * FROM solicitante;");
        return $query->result();
    }

    public function MListaRecurrent() {
        //Permite que la vista que llame esta función, obtenga la URL del servidor.
        $query = $this->db->query("SELECT * FROM recurrente;");
        return $query->result();
    }

    public function MListaDocumento() {
        //Permite que la vista que llame esta función, obtenga la URL del servidor.
        $query = $this->db->query("SELECT * FROM documento;");
        return $query->result();
    }

    public function m_eliminar_solicitante($param) {
        $this->db->query("DELETE from solicitante WHERE RUC = '$param';");
    }

    public function eliminar_documento($param) {
        $this->db->query("DELETE FROM `usuario` WHERE nomUsu = '$param';");
    }

    public function m_editar_solicitante($param) {
        $query = $this->db->query("SELECT * FROM `solicitante` WHERE RUC = '$param';");
        return $query->result();
    }

    public function m_update_solicitante($param, $param1, $param2, $param3, $param4, $param5, $param6, $param7) {
        $this->db->query("UPDATE `cedess64_municipalidad_nuevo`.`solicitante`
                            SET
                            `nombreSoli` = '$param1',
                            `apePatSoli` = '$param2',
                            `apeMatSoli` = '$param3',
                            `direccionSoli` = '$param4',
                            `teléfono` = '$param5',
                            `tipo_de_solicitante_codTipoSoli` = '$param6',
                            `IdUbigueo` = '$param7'
                            WHERE RUC = '$param';");
    }

    public function MListarecurrente() {
        //Permite que la vista que llame esta función, obtenga la URL del servidor.
        $query = $this->db->query("SELECT * FROM recurrente;");
        return $query->result();
    }

    public function m_eliminar_recurrente($param) {
        $this->db->query("DELETE FROM `recurrente` WHERE numIdentif = '$param';");
    }

    public function m_insertar_recurrente($param, $param1, $param2, $param3, $param4, $param5, $param6, $param7) {
        $this->db->query("INSERT INTO `cedess64_municipalidad_nuevo`.`recurrente`
                        (`nomRecu`,
                        `apePatRecu`,
                        `apeMatRecu`,
                        `numIdentif`,
                        `tipo_de_recurrente_codTipoRecu`,
                        `idUbigueo`)
                        VALUES ('$param', '$param1', '$param2', '$param3', 
                                '$param4', '$param5');");
    }

    public function m_editar_recurrente($param) {
        $query = $this->db->query("SELECT * FROM `recurrente` WHERE numIdentif = '$param';");
        return $query->result();
    }

    public function m_update_recurrente($param, $param1, $param2, $param3, $param4, $param5) {
        $this->db->query("UPDATE `cedess64_municipalidad_nuevo`.`recurrente`
                    SET
                    `nomRecu` = '$param',
                    `apePatRecu` = '$param1',
                    `apeMatRecu` = '$param2',
                    `tipo_de_recurrente_codTipoRecu` = '$param4',
                    `idUbigueo` = '$param5'
                    WHERE numIdentif = '$param3';
                    ");
    }

    public function regitrar_estado_documento($selectuser, $mensaje, $selectEstado, $fecha) {
        $this->db->query("INSERT INTO `cedess64_municipalidad_nuevo`.`Destado`
                            (`idestado`,
                            `comentario`,
                            `fecha`,
                            `id_documento`)
                            VALUES
                            (
                            '$selectEstado',
                            '$mensaje',
                '$fecha',
                '$selectuser'
                
                
                            );
                            ;");
    }
    
    public function m_consultar_preEvaluacion($param) {
        $query = $this->db->query("SELECT
documento.nroDocumento,
date(documento.fechaIngreso) as fechaIngreso,
documento.asunto,
documento.numeroFolios,
documento.recurrente_numIdentif1,
documento.estado_atencion,
solicitante.RUC,
solicitante.nombreSoli,
solicitante.apeMatSoli,
solicitante.apePatSoli,
solicitante.direccionSoli,
solicitante.`teléfono`,
tipo_de_documento.nombreTipoDoc,
tipo_de_carga.nomTipoCarga
FROM
documento ,
solicitante ,
tipo_de_documento ,
tipo_de_carga
WHERE
documento.solicitante_RUC = '$param' AND
solicitante.RUC = '$param' AND
documento.tipo_de_documento_codTipoDoc = tipo_de_documento.codTipoDoc AND
documento.tipo_de_carga_codTipoCarga = tipo_de_carga.codTipoCarga
ORDER BY
documento.fechaIngreso desc;");
        return $query->result();
    }

    public function mm_get_solicitante($param) {
       $query = $this->db->query("SELECT
`documento`.`nroDocumento`,
`documento`.`solicitante_RUC`,
solicitante.nombreSoli
FROM `cedess64_municipalidad_nuevo`.`documento`, `cedess64_municipalidad_nuevo`.`solicitante`
where `solicitante`.RUC = documento.solicitante_RUC
and `documento`.nroDocumento = '$param';;");
        return $query->result();
    }

}

?>
