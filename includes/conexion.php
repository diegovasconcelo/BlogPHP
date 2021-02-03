<?php

//Conexion
$server='localhost';
$username='root';
$password='';
$database='blog_php';

$db=mysqli_connet($server,$username,$password,$database);

//Comprobar si la conexión es correcta
if(mysqli_connect_errno()){
    echo "La conexión a la base de datos ha fallado: ".mysqli_connect_error();
}
mysqli_query($db,"SET NAME 'utf8'");





?>