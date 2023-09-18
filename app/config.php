<?php

define('SERVIDOR','localhost');
define('USUARIO','root');
define('PASSWORD','');
define('BD','aplicacionparqueo');

$servidor = "mysql:dbname=".BD."; host=".SERVIDOR;

try{
    $pdo = new PDO($servidor,USUARIO, PASSWORD,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
    //echo "La conexion a la base de datos fue exitosa";
}catch(PDOException $e){
    //echo "Error a la base de datos";
    echo "<script>alert('Error a la conexion a la base de datos');</script>";
}
//CREACION DE LA VARIABLE GLOBAL URL
$URL ="http://localhost:8080/www.aplicacionparqueo.com";

$estado_del_registro = "1";


?>