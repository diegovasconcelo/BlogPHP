<?php

function mostrarError($errores,$campo){
    $alerta='';
    if (isset($errores[$campo]) && !empty($campo)){
        $alerta="<div class='alerta alerta-error'>".$errores[$campo]."</div>";
    }

    return $alerta;
}

function borrarErrores(){
    $resultado=false;

    if (isset($_SESSION['errores'])){
        $_SESSION['errores']= null;
        unset($_SESSION['errores']);
        $resultado=true;
    }


    if (isset($_SESSION['errores_entradas'])){
        $_SESSION['errores_entradas']= null;
        unset($_SESSION['errores_entradas']);
        $resultado=true;
    }

    if (isset($_SESSION['completado'])){
        $_SESSION['completado']= null;
        unset($_SESSION['completado']);
        $resultado=true;
    }

    return $resultado;

}

function conseguirCategorias($conexion){
    
    $resultado=array();

    $sql="SELECT * FROM categorias ORDER BY nombre ASC";
    $categorias = mysqli_query($conexion,$sql);
    

    if($categorias && mysqli_num_rows($categorias)>=1){
        $resultado=$categorias;
    }

    return $resultado;

}

function conseguirUltimasEntradas($conexion){
    $resultado=array();

    $sql="SELECT e.*, c.nombre AS 'categoria' FROM entradas e 
            INNER JOIN categorias c ON e.categoria_id=c.id
            ORDER BY e.id DESC";

    $entradas=mysqli_query($conexion,$sql);

    if ($entradas && mysqli_num_rows($entradas)>=1){
        $resultado=$entradas;
    }

    return $resultado;
}


?>