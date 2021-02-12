<?php
require_once 'includes/redirecciones.php';
require_once 'includes/cabecera.php';
require_once 'includes/lateral.php';
?>

<!-- caja principal-->
<div id="principal">
    <h1>Crear entrada</h1>
    <p>
        Anade una nueva entrada aqui:
    </p><br/>



    <form action="guardar-entrada.php" method="POST">
        <label for='titulo'>Titulo</label>
        <input type="text" name="titulo"/>
        <?php echo isset($_SESSION['errores_entradas']) ? mostrarError($_SESSION['errores_entradas'], 'titulo'):'';?>

        <label for='descripcion'>Descripción</label>
        <textarea name="descripcion"></textarea>
        <?php echo isset($_SESSION['errores_entradas']) ? mostrarError($_SESSION['errores_entradas'], 'descripcion'):'';?>
        
        <label for='categoria'>Categoria</label>
        <select name="categoria">
            <?php
                $categorias=conseguirCategorias($db);
                if(!empty($categorias)):
                    while($categoria=mysqli_fetch_assoc($categorias)):  
            ?>         
                        <option value=<?=$categoria['id']?>><?=$categoria['nombre']?> </option>
            <?php  
                    endwhile;
                endif;
            ?>
        </select>
        <?php echo isset($_SESSION['errores_entradas']) ? mostrarError($_SESSION['errores_entradas'], 'categoria'):'';?>

       <input type="submit" value="Guardar"/>
    </form>
    <?php borrarErrores()?>

</div>
<!--FIN caja principal-->

<!--pie de pagina-->
<?php require_once 'includes/pie.php'; ?> 