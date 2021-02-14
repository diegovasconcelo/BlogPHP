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
    <h1><?=$entrada_actual['titulo']?></h1>
    <a href="categoria.php?id=<?=$entrada_actual['categoria_id']?>">
        <h2><?=$entrada_actual['categoria']?></h2>
    </a>
    <h4><?=date('d/m/Y', strtotime($entrada_actual['fecha']))?> | Escrito por <?=$entrada_actual['usuario']?><p></h4>
    <p><?=$entrada_actual['descripcion']?>
    
    <?php if (isset($_SESSION['usuario']) && $_SESSION['usuario']['id'] == $entrada_actual['usuario_id']):?>
        <br/>
        <a href="editar-entrada.php?id=<?=$entrada_actual['id']?>" class='boton'>Editar entrada</a>
        <a href="borrar-entrada.php?id=<?=$entrada_actual['id']?>" class=' boton boton-naranja'>Eliminar entrada</a>
    <?php endif;?>


</div>
<!--FIN caja principal-->

<!--pie de pagina-->
<?php require_once 'includes/pie.php'; ?> 
