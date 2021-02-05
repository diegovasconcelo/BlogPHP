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
    $apellidos=isset($_POST['apellidos']) ? mysqli_real_escape_string($db,$_POST['apellidos']) : false;
    $email=isset($_POST['email']) ? mysqli_real_escape_string($db,trim($_POST['email'])) : false;
    $password=isset($_POST['password']) ? mysqli_real_escape_string($db,$_POST['password']) : false;

    //Array de errores
    $errores=[];
    //Validar antes de guardar
    if (!empty($nombre) && !is_numeric($nombre) && !preg_match('/[0-9]',$nombre)){
        $nombre_validado=true;
    }else{
        $nombre_validado=false;
        $errores['nombre']='El nombre no es válido';
    }

    if (!empty($apellidos) && !is_numeric($apellidos) && !preg_match('/[0-9]',$apellidos)){
        $apellidos_validado=true;
    }else{
        $apellidos_validado=false;
        $errores['apellidos']='El apellido no es válido';
    }

    if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
        $email_validado=true;
    }else{
        $email_validado=false;
        $errores['email']='El email no es válido';
    }

    if (!empty($password)){
        $password_validado=true;
    }else{
        $password_validado=false;
        $errores['password']='La contraseña no es válida';
    }
    
    var_dump($errores);

    if (count($errores) == 0){
        //cifrar contraseña
        $password_segura=password_hash($password, PASSWORD_BCRYPT,['cost'=>4]);
        
        //var_dump(password_verify($password,$password_segura));
        

        //insert
        $sql="INSERT INTO usuarios VALUES (null,'$nombre','$apellidos','$email','$password_segura',CURDATE());";
        $guardar=mysqli_query($db,$sql);

        if($guardar){
            $_SESSION['completado']='El registro se ha completado con éxito';
        }else{
            $_SESSION['errores']['general']='Fallo al guardar el usuario.';
        }

    }else{
        $_SESSION['errores']=$errores;
    }
}
header('Location: index.php');

?>