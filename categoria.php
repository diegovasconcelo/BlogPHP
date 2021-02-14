<?php require_once 'includes/conexion.php'; ?> 
<?php require_once 'includes/helpers.php'; ?> 

<?php 
    $categoria_actual=conseguirCategoria($db,$_GET['id']);
    if(!isset($categoria_actual['id'])){
        header('Location:index.php');
    }   

?>

<?php require_once 'includes/cabecera.php'; ?>       
<!--barra lateral-->
<?php require_once 'includes/lateral.php'; ?>    
<!--FIN barra lateral-->

<!-- caja principal-->
<div id="principal">
    <h1>Entradas de <?=$categoria_actual['nombre']?></h1>
    <?php
        $entradas=conseguirEntradas($db, $limit=null, $categoria=$categoria_actual['id']);
        if(!empty($entradas) && mysqli_num_rows($entradas)>=1):
            while ($entrada=mysqli_fetch_assoc($entradas)):
    ?>
                <a href='entrada.php?id=<?=$entrada['id']?>'>
                    <article class="entrada">
                        <h2><?=$entrada['titulo']?></h2>
                        <span class='fecha'><?=$entrada['categoria'] .' | '.$entrada['fecha']?></span>
                        <p><?=substr($entrada['descripcion'],0,200).'...'?></p>
                    </article>
                </a>
    <?php   endwhile;
        else:
    ?>
            <div class='alerta'>No hay entradas en esta categoria</div>
    <?php
         endif;
    ?>


</div>
<!--FIN caja principal-->

<!--pie de pagina-->
<?php require_once 'includes/pie.php'; ?> 
