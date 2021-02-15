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

function conseguirCategoria($conexion, $id){
    
    $resultado=array();

    $sql="SELECT * FROM categorias WHERE id=$id";
    $categorias = mysqli_query($conexion,$sql);
    

    if($categorias && mysqli_num_rows($categorias)>=1){
        $resultado=mysqli_fetch_assoc($categorias);
    }

    return $resultado;

}


function conseguirEntradas($conexion, $limit=null, $categoria=null, $busqueda=null){

    $sql="SELECT e.*, c.nombre as 'categoria' FROM entradas e
        INNER JOIN categorias c ON e.categoria_id=c.id";
    
    if(!empty($categoria) ){
        $sql.=" WHERE e.categoria_id=$categoria";
    }

    if(!empty($busqueda) ){
        $sql.=" WHERE e.titulo LIKE '%$busqueda%'";
    }
    
    $sql.=" ORDER BY e.id DESC";

    if($limit){
        $sql.=" LIMIT 4";
    }

    $entradas=mysqli_query($conexion,$sql);

    $resultado=array();
    if ($entradas && mysqli_num_rows($entradas)>=1){
        $resultado=$entradas;
    }


    return $resultado;
}

function conseguirEntrada($conexion, $id){

    $sql="SELECT e.*, c.nombre AS 'categoria', CONCAT (u.nombre,' ', u.apellido) AS usuario FROM entradas e
        INNER JOIN categorias c ON e.categoria_id=c.id
        INNER JOIN usuarios u ON e.usuario_id=u.id 
        WHERE e.id=$id";
    
    $entradas=mysqli_query($conexion,$sql);

    $resultado=array();
    if ($entradas && mysqli_num_rows($entradas)>=1){
        $resultado=mysqli_fetch_assoc($entradas);
    }


    return $resultado;
}

?>