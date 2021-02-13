<?php require_once 'includes/redirecciones.php'; ?> 
<?php require_once 'includes/cabecera.php'; ?>       
<?php require_once 'includes/lateral.php'; ?>    


<!-- caja principal-->
<div id="principal">
    <h1>Mis datos</h1>
    
    <!-- Mostrar errores -->
    <?php if (isset($_SESSION['completado'])):?>
        <div class='alerta alerta-exito'>
            <?= $_SESSION['completado']?>
        </div>
    <?php elseif (isset($_SESSION['errores']['general'])): ?>
        <div class='alerta alerta-error'>
            <?=$_SESSION['errores']['general']?>
        </div>
    <?php endif; ?>

    <form action='actualizar-usuario.php' method='POST'>
        <label name='nombre'>Nombre</label>
        <input type="text" name='nombre' value="<?=$_SESSION['usuario']['nombre']?>">
        <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre'):'';?>

        <label name='apellidos'>Apellido</label>
        <input type="text" name='apellidos' value="<?=$_SESSION['usuario']['apellido']?>">
        <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellidos') : ''; ?>

        <label name='email'>Email</label>
        <input type="email" name='email'value="<?=$_SESSION['usuario']['email']?>">
        <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email') : '' ; ?>

        <input type="submit" name='submit' value='Actualizar'>
    </form>
    <?php borrarErrores();?>



</div>
<!--FIN caja principal-->

<!--pie de pagina-->
<?php require_once 'includes/pie.php'; ?> 

