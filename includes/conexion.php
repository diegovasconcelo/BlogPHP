<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


//Conexion
$server='localhost';
$username='root';
$password='';
$database='blog_php';

$db=mysqli_connect($server,$username,$password,$database);

//Comprobar si la conexión es correcta
if(mysqli_connect_errno()){
    echo ("La conexión a la base de datos ha fallado: ".mysqli_connect_error());
}

mysqli_query($db,"SET NAME 'utf8'");


//INICIAR LA SESION
session_start();





?>