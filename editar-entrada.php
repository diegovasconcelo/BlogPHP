<?php require_once 'includes/redirecciones.php';?>
<?php require_once 'includes/conexion.php'; ?> 
<?php require_once 'includes/helpers.php'; ?> 

<?php 
    $entrada_actual=conseguirEntrada($db,$_GET['id']);
    if(!isset($entrada_actual['id'])){
        header('Location:index.php');
    }   

?>

<?php require_once 'includes/cabecera.php'; ?>       
<?php require_once 'includes/lateral.php'; ?>    

<!-- caja principal-->
<div id="principal">
    <h1>Editar entrada</h1>
    <p>
        Estas a punto de editar: <strong><?=$entrada_actual['titulo']?></strong>
    </p><br/>



    <form action="guardar-entrada.php?editar=<?=$entrada_actual['id']?>" method="POST">
        <label for='titulo'>Titulo</label>
        <input type="text" name="titulo" value="<?=$entrada_actual['titulo']?>"/>
        <?php echo isset($_SESSION['errores_entradas']) ? mostrarError($_SESSION['errores_entradas'], 'titulo'):'';?>

        <label for='descripcion'>Descripción</label>
        <textarea name="descripcion"><?=$entrada_actual['descripcion']?></textarea>
        <?php echo isset($_SESSION['errores_entradas']) ? mostrarError($_SESSION['errores_entradas'], 'descripcion'):'';?>
        
        <label for='categoria'>Categoria</label>
        <select name="categoria">
            <?php
                $categorias=conseguirCategorias($db);
                if(!empty($categorias)):
                    while($categoria=mysqli_fetch_assoc($categorias)):  
            ?>         
                        <option value="<?=$categoria['id']?>" <?= $categoria['id'] == $entrada_actual['categoria_id'] ? "selected='selected'": '' ?> ><?=$categoria['nombre']?> </option>
            <?php  
                    endwhile;
                endif;
            ?>
        </select>
        <?php echo isset($_SESSION['errores_entradas']) ? mostrarError($_SESSION['errores_entradas'], 'categoria'):'';?>

       <input type="submit" value="Editar"/>
    </form>
    <?php borrarErrores()?>

</div>
<!--FIN caja principal-->

<!--pie de pagina-->
<?php require_once 'includes/pie.php'; ?> 
