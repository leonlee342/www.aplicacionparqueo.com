<?php

include('../app/config.php');
include('literal.php');

date_default_timezone_set("America/Caracas");
$fechaHora = date("Y-m-d h:i:s");
$dia = date("d");
$mes = date('m');
if($mes == "1")$mes = "Enero";
if($mes == "2")$mes = "Febrero";
if($mes == "3")$mes = "Marzo";
if($mes == "4")$mes = "Abril";
if($mes == "5")$mes = "Mayo";
if($mes == "6")$mes = "Junio";
if($mes == "7")$mes = "Julio";
if($mes == "8")$mes = "Agosto";
if($mes == "9")$mes = "Septiembre";
if($mes == "10")$mes = "Octubre";
if($mes == "11")$mes = "Noviembre";
if($mes == "12")$mes = "Diciembre";

$ano = date('Y');

$id_informacion = $_GET['id_informacion'];
$nro_factura = $_GET['nro_factura'];
$id_cliente = $_GET['id_cliente'];

///////////RECUPERAR EL DEPARTAMENTO O CIUDAD DE LA TABLA INFORMACIONES//////////////////
$query_info = $pdo->prepare("SELECT * FROM tb_informaciones WHERE id_informacion = '$id_informacion' AND estado = '1'");
$query_info->execute();
$infos = $query_info->fetchAll(PDO::FETCH_ASSOC);
foreach($infos as $info){
  $departamento_ciudad = $info['departamento_ciudad'];                                                                                             
}
$fecha_factura = $departamento_ciudad.", ".$dia." de ".$mes." de ".$ano;
///////////FIN RECUEPERAR EL DEPARTAMENTO 

$fecha_ingreso = $_GET['fecha_ingreso'];
$hora_ingreso = $_GET['hora_ingreso'];
$fecha_salida = date('Y-m-d');
$fecha_salida_para_calcular = date('Y/m/d');
$hora_salida = date('H:i');

///////////CALCULO LOS DIAS EN EL PARQUEO//////////////////////////////////
$dato1 = new DateTime($fecha_ingreso);
$dato2 = new DateTime($fecha_salida_para_calcular);
$dias_calculado = $dato1->diff($dato2);
$dias_calculado->days;
/////////////////////FINAL CALCULO TIEMPO////////////////////////////

$fecha_hora_ingreso = $fecha_ingreso." ".$hora_ingreso;
$fecha_hora_salida = $fecha_salida." ".$hora_salida;

$fecha_hora_ingreso =  new DateTime($fecha_hora_ingreso);
$fecha_hora_salida =  new DateTime($fecha_hora_salida);
$diff = $fecha_hora_ingreso->diff($fecha_hora_salida);

echo $tiempo = $diff->days." dias con ".$diff->h." horas con ".$diff->i." minutos ";




///////////CALCULO DEL TIEMPO DE PARQUEO//////////////////////////////////
$c_hora_ingreso = strtotime($hora_ingreso);
$c_hora_salida = strtotime($hora_salida);
$diferencia_hora = ($c_hora_salida - $c_hora_ingreso)/3600;

//echo round($diferencia_hora,2);
$hora_calculado = (int)$diferencia_hora;
$diferencia_minutos = ($c_hora_salida - $c_hora_ingreso)/60;
$calculando = $hora_calculado * 60;
$minutos_calculado = $diferencia_minutos - $calculando;
    if(($dias_calculado->days)=="0"){
      $tiempo =$hora_calculado." horas con ".$minutos_calculado." minutos";
    }else{
      $tiempo =$dias_calculado->days." dias con ". $hora_calculado." horas con ".$minutos_calculado." minutos";
    }
    
/////////////////////FINAL CALCULO TIEMPO////////////////////////////

$cuviculo = $_GET['cuviculo'];
$detalle = "Servicio de parqueo de ".$tiempo;

/////////////////////CALCULA EL PRECIO DEL CLIENTE EN HORAS//////////////////////
$query_precios = $pdo->prepare("SELECT * FROM tb_precios WHERE cantidad = '$hora_calculado' AND detalle = 'HORAS' AND estado = '1' ");
$query_precios->execute();
$datos_precios = $query_precios->fetchAll(PDO::FETCH_ASSOC);
foreach($datos_precios as $datos_precio){     
   $precio_hora = $datos_precio['precio'];  
}
//////////////////////////////////////////////////////////////////////

/////////////////////CALCULA EL PRECIO DEL CLIENTE EN DIAS//////////////////////
$precio_dia = 0;
$query_precios_dias = $pdo->prepare("SELECT * FROM tb_precios WHERE cantidad = '$dias_calculado->days' AND detalle = 'DIAS' AND estado = '1' ");
$query_precios_dias->execute();
$datos_precios_dias = $query_precios_dias->fetchAll(PDO::FETCH_ASSOC);
foreach($datos_precios_dias as $datos_precios_dia){     
     $precio_dia = $datos_precios_dia['precio'];  
}
//////////////////////////////////////////////////////////////////////

$precio_final = $precio_dia + $precio_hora;

$cantidad = "1";

$total = ($precio_final * $cantidad);

$monto_total = $total;

$monto_literal = numtoletras($monto_total);

$user_sesion = $_GET['user_sesion'];

///////////////////////////RESCATANDO LOS DATOS DEL CLIENTE///////////////////////////////////////////
$query_clientes = $pdo->prepare("SELECT * FROM tb_clientes WHERE id_cliente = '$id_cliente' AND estado = '1' ");
$query_clientes->execute();
$datos_clientes = $query_clientes->fetchAll(PDO::FETCH_ASSOC);
foreach($datos_clientes as $datos_cliente){  
    $id_cliente = $datos_cliente['id_cliente'];
    $nombre_cliente = $datos_cliente['nombre_cliente'];
    $nit_ci_cliente = $datos_cliente['nit_ci_cliente'];
    $placa_auto = $datos_cliente['placa_auto'];   
}  
//////////////////////////////////////////////////////////////////////

$qr = "Factura realizada por el sistema de parqueo, al cliente ".$nombre_cliente." con CI/NIT:
".$nit_ci_cliente." con el vehiculo con número de placa ".$placa_auto." y esta factura se genero en
".$fecha_factura." a hr: ".$hora_salida;
 
$sentencia = $pdo->prepare('INSERT INTO tb_facturaciones
(id_informacion,nro_factura,id_cliente,fecha_factura,fecha_ingreso,hora_ingreso,fecha_salida,hora_salida,tiempo,cuviculo,detalle,precio,cantidad,total,monto_total,monto_literal,user_sesion,qr, fyh_creacion, estado)
VALUES ( :id_informacion,:nro_factura,:id_cliente,:fecha_factura,:fecha_ingreso,:hora_ingreso,:fecha_salida,:hora_salida,:tiempo,:cuviculo,:detalle,:precio,:cantidad,:total,:monto_total,:monto_literal,:user_sesion,:qr,:fyh_creacion,:estado)');

$sentencia->bindParam(':id_informacion',$id_informacion);
$sentencia->bindParam(':nro_factura',$nro_factura);
$sentencia->bindParam(':id_cliente',$id_cliente);
$sentencia->bindParam(':fecha_factura',$fecha_factura);
$sentencia->bindParam(':fecha_ingreso',$fecha_ingreso);
$sentencia->bindParam(':hora_ingreso',$hora_ingreso);
$sentencia->bindParam(':fecha_salida',$fecha_salida);
$sentencia->bindParam(':hora_salida',$hora_salida);
$sentencia->bindParam(':tiempo',$tiempo);
$sentencia->bindParam(':cuviculo',$cuviculo);
$sentencia->bindParam(':detalle',$detalle);
$sentencia->bindParam(':precio',$precio_final);
$sentencia->bindParam(':cantidad',$cantidad);
$sentencia->bindParam(':total',$total);
$sentencia->bindParam(':monto_total',$monto_total);
$sentencia->bindParam(':monto_literal',$monto_literal);
$sentencia->bindParam(':user_sesion',$user_sesion);
$sentencia->bindParam(':qr',$qr);
$sentencia->bindParam('fyh_creacion',$fechaHora);
$sentencia->bindParam('estado',$estado_del_registro);

if($sentencia->execute()){
  echo 'success';

/////INICIO CAMBIAR ESTADO DEL VEHICULO
    $estado_espacio = "LIBRE";

    date_default_timezone_set("America/Caracas");
    $fechaHora = date("Y-m-d h:i:s");

    $sentencia = $pdo->prepare("UPDATE tb_mapeos SET 
    estado_espacio = :estado_espacio, 
    fyh_actualizacion = :fyh_actualizacion
    WHERE nro_espacio = :nro_espacio");

    $sentencia->bindParam(':estado_espacio', $estado_espacio);
    $sentencia->bindParam(':fyh_actualizacion', $fechaHora);
    $sentencia->bindParam(':nro_espacio', $cuviculo);

    $sentencia->execute();

////FIN

  ?>
  <script>location.href = "facturacion/factura.php"; </script>
  <?php

}else{
  echo 'error al registrar a la base de datos';
}


   