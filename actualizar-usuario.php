<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



if (isset($_POST)){
    //conexion a la bd
    include_once 'includes/conexion.php';
    

                #operador ternario.. ?(si) existe le asigno a la vble el valor de POST[campo] : (sino) el valor de la vble sera false
    $nombre=isset($_POST['nombre']) ? mysqli_real_escape_string($db,$_POST['nombre']): false;
    $apellidos=isset($_POST['apellidos']) ? mysqli_real_escape_string($db,$_POST['apellidos']) : false;
    $email=isset($_POST['email']) ? mysqli_real_escape_string($db,trim($_POST['email'])) : false;
    $usuario=$_SESSION['usuario']['id'];
    //Array de errores
    $errores=[];
    //Validar antes de guardar
    if (!empty($nombre) && !is_numeric($nombre) && !preg_match('/[0-9]/',$nombre)){
        $nombre_validado=true;
    }else{
        $nombre_validado=false;
        $errores['nombre']='El nombre no es válido';
    }

    if (!empty($apellidos) && !is_numeric($apellidos) && !preg_match('/[0-9]/',$apellidos)){
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


    if (count($errores) == 0){
        //Consultar email
        $consultar_email="SELECT * FROM usuarios where email='$email'";
        $isset_email=mysqli_query($db,$consultar_email);
        $isset_user=mysqli_fetch_assoc($isset_email);

        if($isset_user['id']==$usuario || empty($isset_user)){
            
            //insert
            $sql="UPDATE usuarios SET 
                        nombre='$nombre',
                        apellido='$apellidos',
                        email='$email'
                    WHERE id='$usuario'";
            $guardar=mysqli_query($db,$sql);

            if($guardar){
                $_SESSION['usuario']['nombre']=$nombre;
                $_SESSION['usuario']['apellido']=$apellidos;
                $_SESSION['usuario']['email']=$email;


                $_SESSION['completado']='Tus datos se han actualizado con éxito';
            }else{
                $_SESSION['errores']['general']='Fallo al actualizar tus datos.';
            }
        }else{
            $_SESSION['errores']['general']='El usuario ya existe';
        }
    }else{
        $_SESSION['errores']=$errores;
    }
}
header('Location: mis-datos.php');

?>