<?php

include('../app/config.php');

$id_user = $_GET['id_user'];
$estado_inactivo = "0";

date_default_timezone_set("America/Caracas");
$fechaHora = date("Y-m-d h:i:s");

$sentencia = $pdo->prepare("UPDATE tb_usuarios SET 
estado = :estado, 
fyh_eliminacion = :fyh_eliminacion
WHERE id = :id");

$sentencia->bindParam(':estado', $estado_inactivo);
$sentencia->bindParam(':fyh_eliminacion', $fechaHora);
$sentencia->bindParam(':id', $id_user);

if($sentencia->execute()){
    echo "SE ELIMINO EL REGISTRO DE MANERA CORRECTA";
    ?>
    <script>location.href = "../usuarios/"; </script>
    <?php
}else{
    echo "ERROR AL ELIMINAR EL REGISTRO";
}


?>