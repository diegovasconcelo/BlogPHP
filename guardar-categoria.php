<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



if (isset($_POST)){
    //conexion a la bd
    include_once 'includes/conexion.php';
    
    //Iniciar session si no existe
    if (!isset($_SESSION)){
        session_start();
    }

                #operador ternario.. ?(si) existe le asigno a la vble el valor de POST[campo] : (sino) el valor de la vble sera false
    $nombre=isset($_POST['nombre']) ? mysqli_real_escape_string($db,$_POST['nombre']): false;
    $errores=array();

    if (!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/",$nombre)){
        $nombre_validado=$nombre;
    }else{
        $nombre_validado=false;
        $errores['nombre']='El nombre de la categoria no es válido';
    }

    if (count($errores)==0){
        $sql="INSERT INTO categorias VALUES (null, '$nombre_validado')";
        $guardar=mysqli_query($db,$sql);
    }

}

header('Location:index.php');