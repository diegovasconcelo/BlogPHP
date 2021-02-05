<?php 
    session_start();
    
    include('./conexion.php');
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
?>
<!DOCTYPE HTML>

<html lang='es'>
    <head>
        <meta charset='utf-8'>
        <title>DVU Notes</title>
        <link href='./assets/css/styles.css' rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <!--cabecera-->
        <header id='cabecera'>
            <!--logo-->
            <div id='logo'>
                <a href='index.php'>DVU Notes</a>
            </div>

            <!--menu-->
            <nav id='menu'>
                <ul>
                    <li><a href='index.php'>Inicio</a></li>
                    <li><a href='index.php'>Categoria1</a></li>
                    <li><a href='index.php'>Categoria2</a></li>
                    <li><a href='index.php'>Categoria3</a></li>
                    <li><a href='index.php'>Sobre mi</a></li>
                    <li><a href='index.php'>Contacto</a></li>
                </ul>
            </nav>
            <div class="clearfix"></div>
        </header>
        
        <div id='contenedor'>