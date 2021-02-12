<?php

require_once 'includes/conexion.php';

if (isset($_POST)){
    
    //Borrar error de login antiguo
    if(isset($_SESSION['error_login'])){
        unset($_SESSION['error_login']);
    }

    if(!isset($_SESSION)){
        session_start();
     }

    $email=trim($_POST['email']);
    $password=$_POST['password'];
    
    $sql="SELECT * FROM usuarios WHERE email='$email'";
    $login=mysqli_query($db,$sql);

    if($login && mysqli_num_rows($login) == 1){
        $usuario=mysqli_fetch_assoc($login);

        $verify=password_verify($password,$usuario['password']);


        if ($verify){
            $_SESSION['usuario']=$usuario;
        }else{
            //Fallo la verificacion
            $_SESSION['error_login']='Login incorreto';
        }
        
    }else{
        //mensaje de error
        $_SESSION['error_login']='Login incorreto';
    }


}

header('Location: index.php');
?>