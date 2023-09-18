<?php

// Include the main TCPDF library (search for installation path).
require_once('../app/templeates/TCPDF-main/tcpdf.php');
include('../app/config.php');

//CARGAR EL ENCABEZADO-Se coloca fuera del foreach para que imprima el ultimo registro
$query_informacions = $pdo->prepare("SELECT * FROM tb_informaciones WHERE estado = '1'");
$query_informacions->execute();
$informacions = $query_informacions->fetchAll(PDO::FETCH_ASSOC);
  foreach($informacions as $informacion){
      $id_informacion = $informacion['id_informacion'];
      $nombre_parqueo = $informacion['nombre_parqueo'];
      $actividad_empresa = $informacion['actividad_empresa'];
      $sucursal = $informacion['sucursal'];
      $direccion = $informacion['direccion'];
      $zona = $informacion['zona'];
      $telefono = $informacion['telefono'];
      $departamento_ciudad = $informacion['departamento_ciudad'];
      $pais = $informacion['pais'];
    }

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, array(79,175), PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor('Sistema de parqueo');
$pdf->setTitle('Sistema de parqueo');
$pdf->setSubject('Sistema de parqueo');
$pdf->setKeywords('TCPDF, PDF, example, test, guide');

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set default monospaced font
$pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->setMargins( 5, 5, 5);

// set auto page breaks
$pdf->setAutoPageBreak(true, 5);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->setFont('Helvetica', '', 7);

// add a page
$pdf->AddPage();

// create some HTML content
$html = '
<div>
    <p style="text-align: center">
        <b>'.$nombre_parqueo.'</b> <br>
        '.$actividad_empresa.' <br>
        SUCURSAL No '.$sucursal.' <br>
        '.$direccion.' <br>
        ZONA: '.$zona.' <br>
        TELÉFONO: '.$telefono.' <br>
        '.$departamento_ciudad.' - '.$pais.' <br>
        ---------------------------------------------------------------------------------
        <b>FACTURA Nro. 000001 </b>
        ---------------------------------------------------------------------------------
        <div style="text-align: left">
       
            <b>DATOS DEL CLIENTE</b><br>
            <b>SEÑOR(A):</b> LETICIA BLANCO COCA <br>
            <b>NIT/CI.:</b> 12345678 <br>
            <b>Fecha de la factura.:</b> Cochabamba, 24 de Mayo de 2023 <br>
        ---------------------------------------------------------------------------------<br>
        <b>De: </b> 24/05/2023 <b>Hora: </b>18:00 <br>
        <b>A: </b> 24/05/2023  <b>Hora: </b>20:00 <br>
        <b>Tiempo: </b> 2 horas en el espacio 10<br>
        ---------------------------------------------------------------------------------<br>
        <table border="1" cellpadding="3">
        <tr>
            <td style="text-align: center" width="99px"><b>Detalle</b></td>
            <td style="text-align: center" width="45px"><b>Precio</b></td>
            <td style="text-align: center" width="45px"><b>Cantidad</b></td>
            <td style="text-align: center" width="45px"><b>Total</b></td>
        </tr>
        <tr>
            <td>Servicio de parqueo de 2 horas</td>
            <td style="text-align: center">Bs. 1</td>
            <td style="text-align: center">10</td>
            <td style="text-align: center">Bs. 10</td>
        </tr>
        </table>        
        <p style="text-align: right">
        <b>Monto Total: </b> Bs. 10
        </p>
        <p class="">
            <b>Son: </b>Diez 00/100 Bs.
        </p>
        <br>
        ---------------------------------------------------------------------------------<br>
        <b>USUARIO:</b> EDDY CONDORI GUZMAN<br><br><br><br><br><br><br><br><br>

        <p style="text-align: center">
            <img src="" width="100px" alt="" >
        </p>
        <p style="text-align: center">"ESTA FACTURA CONTRIBUYE AL DESARROLLO DEL PAIS, EL USO ILICITO DE ESTA SERA SANCIONADO DE ACUERDO A LA LEY"
        </p>
        <p style="text-align: center"><b>GRACIAS POR SU PREFERENCIA</b></p>

   
        </div>

    </p>


</div>
';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// CODIGO QR
$style = array(
    'border' => 0,
    'vpadding' => '3',
    'hpadding' => '3',
    'fgcolor' => array(0, 0, 0),
    'bgcolor' => false, //array(255,255,255)
    'module_width' => 1, // width of a single module in points
    'module_height' => 1 // height of a single module in points
);

$QR = 'Factura realizada por el sistema de parqueo FCYT, al cliente Leticia Blanco Coca con nit: 837737277323 
con el vehiculo con numero de placa 3983FREDD y esta factura se genero en 29 de Mayo de 2023 a hr: 18:00';
$pdf->write2DBarcode($QR,'QRCODE,L',  22,105,35,35, $style);

//Close and output PDF document
$pdf->Output('example_002.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
