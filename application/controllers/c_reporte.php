<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class c_reporte extends CI_Controller {

    function __construct() {
        //llamada al constructor del CI para la clase
        parent::__construct();
    }

    //el index està definida por la priemra pantalla que es la iterfaz de manejo de usuario
    public function index() {}

    public function documento_usuario() {
        $this->load->library(array('fpdf17/PDF_MC_Table.php'));
        $pdf = new PDF_MC_Table();
        $pdf->AddPage();
        $pdf->Image('LogoCOLOR.png', 10, 8, 40);
        $pdf->SetFont('Arial', 'B', 9);
        //$pdf->Cell(47, 3, '', 0, 0);;
        $pdf->Cell(190, 4, utf8_decode('MUNICIPALIDAD DISTRITAL DE LIMA'), 0, 0, 'C');
        $pdf->Ln();
        $pdf->Cell(190, 4, utf8_decode(' - REPORTE EXPEDIENTES POR OPERADOR - '), 0, 0, 'C');
        $pdf->Ln();
        $pdf->SetFont('Arial', 'B', 9);
        $pdf->Cell(190, 4, utf8_decode('Hora de generación: '. date('Y-m-d H:m:s')), 0, 0, 'C');
        $pdf->Cell(190, 4, utf8_decode(''), 0, 0, 'C');
        $pdf->Image('logo-municipalidad-de-lima-metropolitana.jpg', 170, 8, 20);
        $this->load->model('m_main');
        $param = $_GET['param'];//'AJESUSC';
        $fi = $_GET['fd'];//'01/03/2013';
        $fh = $_GET['fh'];//'30/06/2013';
        $pdf->Ln(25);
        $pdf->SetFont('Arial', '', 7);
        $pdf->Cell(10, 4, 'Item', 0, 0, 'R'); //1
        $pdf->Cell(21, 4, utf8_decode('Nr. solicitud'), 0, 0, ''); //2
        $pdf->Cell(40, 4, utf8_decode('Fecha y hora de ingreso'), 0, 0, 'C'); //3
        $pdf->Cell(45, 4, utf8_decode('Asunto'), 0, 0, 'C'); //4
        $pdf->Cell(25, 4, utf8_decode('Nro. Folios'), 0, 0, 'C'); //5
        $pdf->Cell(25, 4, utf8_decode('Tipo documento'), 0, 0, 'C'); //6
        $pdf->Cell(25, 4, utf8_decode('Solicitante RuC'), 0, 0, 'C'); //7
        $pdf->Ln();
        $pdf->Cell(190, 0, '', 1, 0, 'R'); //8
        $resul = $this->m_main->m_Lista_Idusuario_documento($param, $fi, $fh);
        $pdf->SetFont('Arial', '', 9);
        $pdf->SetWidths(array(10, 21, 40, 45, 25, 25, 25));
        $item = 1;
        $pdf->Ln();
        foreach ($resul as $fila) { 
            $asunto = '';
            if($fila->asunto == 0){
                $asunto = 'Autorización de circulación';
            }else if($fila->asunto == 1){
                $asunto = 'Inclusión';
            }else if($fila->asunto == 2){
                $asunto = 'Anexo';
            }else if($fila->asunto == 3){
                $asunto = 'Otros';
            }
            $fecha = explode("-", $fila->fechaIngreso);
            $fecha = $fecha[2] . '-' . $fecha[1] . '-' . $fecha[0];
            $pdf->SetAligns(array('R', 'R', 'R', 'R', 'R', 'R', 'R'));
            $pdf->Row(array($item, $fila->nroDocumento, $fecha, utf8_decode($asunto) , 
                            $fila->numeroFolios, $fila->tipo_de_documento_codTipoDoc, 
                            $fila->solicitante_RUC), 0);
            $item++;
        }
        $pdf->Output('cotizacion.pdf', 'I');
    }
    
    public function solicitante() {
        $this->load->library(array('fpdf17/PDF_MC_Table.php'));
        $pdf = new PDF_MC_Table();
        $pdf->AddPage();
        $pdf->Image('LogoCOLOR.png', 10, 8, 40);
        $pdf->SetFont('Arial', 'B', 9);
        //$pdf->Cell(47, 3, '', 0, 0);;
        $pdf->Cell(190, 4, utf8_decode('MUNICIPALIDAD DISTRITAL DE LIMA'), 0, 0, 'C');
        $pdf->Ln();
        $pdf->Cell(190, 4, utf8_decode(' - REPORTE EXPEDIENTES POR SOLICITANTE - '), 0, 0, 'C');
        $pdf->Ln();
        $pdf->SetFont('Arial', 'B', 9);
        $pdf->Cell(190, 4, utf8_decode('Hora de generación: '. date('Y-m-d H:m:s')), 0, 0, 'C');
        $pdf->Cell(190, 4, utf8_decode(''), 0, 0, 'C');
        $pdf->Image('logo-municipalidad-de-lima-metropolitana.jpg', 170, 8, 20);
        $this->load->model('m_main');
        /*$param = '12453125414';
        $fi = '01/03/2013';
        $fh = '30/06/2013';*/
        $param = $_GET['param'];//'AJESUSC';
        $fi = $_GET['fd'];//'01/03/2013';
        $fh = $_GET['fh'];//'30/06/2013';
        $pdf->Ln(25);
        $pdf->SetFont('Arial', '', 7);
        $pdf->Cell(10, 4, 'Item', 0, 0, 'R'); //1
        $pdf->Cell(21, 4, utf8_decode('Nr. solicitud'), 0, 0, ''); //2
        $pdf->Cell(40, 4, utf8_decode('Fecha y hora de ingreso'), 0, 0, 'C'); //3
        $pdf->Cell(45, 4, utf8_decode('Asunto'), 0, 0, 'C'); //4
        $pdf->Cell(25, 4, utf8_decode('Nro. Folios'), 0, 0, 'C'); //5
        $pdf->Cell(25, 4, utf8_decode('Tipo documento'), 0, 0, 'C'); //6
        $pdf->Cell(25, 4, utf8_decode('Solicitante RuC'), 0, 0, 'C'); //7
        $pdf->Ln();
        /*Item 	Nr. solicitud 	Fecha ingresdo 	Asunto 
         * 	Nro. Folios 	Tipo documento 	Solicitante Rux 	Tipo de documento
         */
        $pdf->Cell(190, 0, '', 1, 0, 'R'); //8
        $resul = $this->m_main->m_Lista_Solicitante_documento($param, $fi, $fh);
        $pdf->SetFont('Arial', '', 9);
        $pdf->SetWidths(array(10, 21, 40, 45, 25, 25, 25));
        $item = 1;
        $pdf->Ln();
        foreach ($resul as $fila) { 
            $asunto = '';
            if($fila->asunto == 0){
                $asunto = 'Autorización de circulación';
            }else if($fila->asunto == 1){
                $asunto = 'Inclusión';
            }else if($fila->asunto == 2){
                $asunto = 'Anexo';
            }else if($fila->asunto == 3){
                $asunto = 'Otros';
            }
            $fecha = explode("-", $fila->fechaIngreso);
            $fecha = $fecha[2] . '-' . $fecha[1] . '-' . $fecha[0];
            $pdf->SetAligns(array('R', 'R', 'R', 'R', 'R', 'R', 'R'));
            $pdf->Row(array($item, $fila->nroDocumento, $fecha, utf8_decode($asunto), 
                            $fila->numeroFolios, $fila->tipo_de_documento_codTipoDoc, 
                            $fila->solicitante_RUC), 0);
            $item++;
        }
        $pdf->Output('cotizacion.pdf', 'I');
    }
    
    public function carga() {
        $this->load->library(array('fpdf17/PDF_MC_Table.php'));
        $pdf = new PDF_MC_Table();
        $pdf->AddPage();
        $pdf->Image('LogoCOLOR.png', 10, 8, 40);
        $pdf->SetFont('Arial', 'B', 9);
        //$pdf->Cell(47, 3, '', 0, 0);;
        $pdf->Cell(190, 4, utf8_decode('MUNICIPALIDAD DISTRITAL DE LIMA'), 0, 0, 'C');
        $pdf->Ln();
        $pdf->Cell(190, 4, utf8_decode(' - REPORTE EXPEDIENTES POR CARGA - '), 0, 0, 'C');
        $pdf->Ln();
        $pdf->SetFont('Arial', 'B', 9);
        $pdf->Cell(190, 4, utf8_decode('Hora de generación: '. date('Y-m-d H:m:s')), 0, 0, 'C');
        $pdf->Cell(190, 4, utf8_decode(''), 0, 0, 'C');
        $pdf->Image('logo-municipalidad-de-lima-metropolitana.jpg', 170, 8, 20);
        $this->load->model('m_main');
        /*$param = '1';
        $fi = '01/03/2013';
        $fh = '30/06/2013';*/
        $param = $_GET['param'];//'AJESUSC';
        $fi = $_GET['fd'];//'01/03/2013';
        $fh = $_GET['fh'];//'30/06/2013';
        $pdf->Ln(25);
        $pdf->SetFont('Arial', '', 7);
        $pdf->Cell(10, 4, 'Item', 0, 0, 'R'); //1
        $pdf->Cell(21, 4, utf8_decode('Nr. solicitud'), 0, 0, ''); //2
        $pdf->Cell(40, 4, utf8_decode('Fecha y hora de ingreso'), 0, 0, 'C'); //3
        $pdf->Cell(45, 4, utf8_decode('Asunto'), 0, 0, 'C'); //4
        $pdf->Cell(25, 4, utf8_decode('Nro. Folios'), 0, 0, 'C'); //5
        $pdf->Cell(25, 4, utf8_decode('Tipo documento'), 0, 0, 'C'); //6
        $pdf->Cell(25, 4, utf8_decode('Solicitante RuC'), 0, 0, 'C'); //7
        $pdf->Ln();
        $pdf->Cell(190, 0, '', 1, 0, 'R'); //8
        $resul = $this->m_main->m_Lista_Carga_documento($param, $fi, $fh);
        $pdf->SetFont('Arial', '', 9);
        $pdf->SetWidths(array(10, 21, 40, 45, 25, 25, 25));
        $item = 1;
        $pdf->Ln();
        foreach ($resul as $fila) { 
            $asunto = '';
            if($fila->asunto == 0){
                $asunto = 'Autorización de circulación';
            }else if($fila->asunto == 1){
                $asunto = 'Inclusión';
            }else if($fila->asunto == 2){
                $asunto = 'Anexo';
            }else if($fila->asunto == 3){
                $asunto = 'Otros';
            }
            $fecha = explode("-", $fila->fechaIngreso);
            $fecha = $fecha[2] . '-' . $fecha[1] . '-' . $fecha[0];
            $pdf->SetAligns(array('R', 'R', 'R', 'R', 'R', 'R', 'R'));
            $pdf->Row(array($item, $fila->nroDocumento, $fecha, utf8_decode($asunto), 
                            $fila->numeroFolios, $fila->tipo_de_documento_codTipoDoc, 
                            $fila->solicitante_RUC), 0);
            $item++;
        }
        $pdf->Output('cotizacion.pdf', 'I');
    }
    
}