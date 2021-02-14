<?php require_once 'includes/cabecera.php'; ?>       
<!--barra lateral-->
<?php require_once 'includes/lateral.php'; ?>    
<!--FIN barra lateral-->

<!-- caja principal-->
<div id="principal">
    <h1>Todas las entradas</h1>
    <?php
        $entradas=conseguirEntradas($db);
        if(!empty($entradas)):
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
        endif;
    ?>


</div>
<!--FIN caja principal-->

<!--pie de pagina-->
<?php require_once 'includes/pie.php'; ?> 
