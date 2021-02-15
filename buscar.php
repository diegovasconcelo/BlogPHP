<?php 
    if(!isset($_POST['busqueda'])){
        header('Location: index.php');
    }
?>

<?php require_once 'includes/cabecera.php'; ?>       
<!--barra lateral-->
<?php require_once 'includes/lateral.php'; ?>    
<!--FIN barra lateral-->

<!-- caja principal-->
<div id="principal">
    <h1>Búsqueda: <?=$_POST['busqueda']?></h1>
    <?php
        $entradas=conseguirEntradas($db,null,null,$_POST['busqueda']);
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
            <div class='alerta'>No hay entradas con estas categorias.</div>
    <?php
         endif;
    ?>


</div>
<!--FIN caja principal-->

<!--pie de pagina-->
<?php require_once 'includes/pie.php'; ?> 
