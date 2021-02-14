<?php require_once 'includes/conexion.php'; ?> 
<?php require_once 'includes/helpers.php'; ?> 

<?php 
    $entrada_actual=conseguirEntrada($db,$_GET['id']);
    if(!isset($entrada_actual['id'])){
        header('Location:index.php');
    }   

?>

<?php require_once 'includes/cabecera.php'; ?>       
<!--barra lateral-->
<?php require_once 'includes/lateral.php'; ?>    
<!--FIN barra lateral-->

<!-- caja principal-->
<div id="principal">
    <h1>Entradas de <?=$entrada_actual['titulo']?></h1>
    <a href="categoria.php?id=<?=$entrada_actual['categoria_id']?>">
        <h2><?=$entrada_actual['categoria']?></h2>
    </a>
    <h4><?=date('d/m/Y', strtotime($entrada_actual['fecha']))?></h4>
    <p><?=$entrada_actual['descripcion']?><p>


</div>
<!--FIN caja principal-->

<!--pie de pagina-->
<?php require_once 'includes/pie.php'; ?> 
