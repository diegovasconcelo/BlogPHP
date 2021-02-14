<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'includes/conexion.php';

if(isset($_SESSION['usuario']) && isset($_GET['id'])){
    $usuario_id=$_SESSION['usuario']['id'];
    $entrada_id=$_GET['id'];

    $sql="DELETE FROM entradas WHERE id=$entrada_id AND usuario_id=$usuario_id ";
    $borrar=mysqli_query($db,$sql);
}

header('Location: index.php');