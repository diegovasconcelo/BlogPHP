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
    $titulo=isset($_POST['titulo']) ? mysqli_real_escape_string($db,$_POST['titulo']): false;
    $descripcion=isset($_POST['descripcion']) ? mysqli_real_escape_string($db,$_POST['descripcion']): false;
    $categoria=isset($_POST['categoria']) ? (int)$_POST['categoria']: false;
    $usuario=$_SESSION['usuario']['id'];


   
    $errores=array();

    if (empty($titulo)){
        $errores['titulo']='El titulo no es válido';
    }

    if (empty($descripcion)){
        $errores['descripcion']='La descripcion no es válida';
    }

    if (empty($categoria) && !is_numeric($categoria)){
        $errores['categoria']='La categoria no es válida';
    }

    if (count($errores)==0){
        $sql="INSERT INTO entradas VALUES(null, $usuario, $categoria, '$titulo', '$descripcion', CURDATE())";
        $guardar=mysqli_query($db,$sql);
        
        header('Location:index.php');

    }else{
        $_SESSION['errores_entradas']=$errores;
        header('Location:crear-entradas.php');
    }

}
