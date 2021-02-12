
<aside id='sidebar'>
    <?php if(isset($_SESSION['usuario'])):?>
        <div id='usuario-logueado' class='bloque'>
            <h3>Bienvenido, <?= $_SESSION['usuario']['nombre'].' '.$_SESSION['usuario']['apellido'];?>!</h3>
        
            <!-- Botones-->
            <a href="crear-categoria.php" class='boton'>Crear categoria</a>
            <a href="crear-entradas.php" class=' boton boton-naranja'>Crear entrada</a>
            <a href="configuracion.php" class='boton boton-verde'>Configuración</a>
            <a href="cerrar.php" class='boton boton-rojo '>Salir</a>
        </div>
    <?php endif;?>

    
    <?php if(!isset($_SESSION['usuario'])):?>
        <div id='login' class='bloque'>
            <h3>Identificate</h3>
            
            <?php if(isset($_SESSION['error_login'])):?>
                <div class='alerta alerta-error'>
                    <?= $_SESSION['error_login'];?>
                </div>
            <?php endif;?>

            <form action='login.php' method='POST'>
                <label name='email'>Email</label>
                <input type="email" name='email'>

                <label name='password'>Contraseña</label>
                <input type="password" name='password'>

                <input type="submit" value='Ingresar'>
            </form>
        </div>


        <div id='register' class='bloque'>
            
            <h3>Registrate</h3>

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

            <form action='registro.php' method='POST'>
                <label name='nombre'>Nombre</label>
                <input type="text" name='nombre'>
                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre'):'';?>

                <label name='apellidos'>Apellido</label>
                <input type="text" name='apellidos'>
                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellidos') : ''; ?>

                <label name='email'>Email</label>
                <input type="email" name='email'>
                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email') : '' ; ?>

                <label name='password'>Contraseña</label>
                <input type="password" name='password'>
                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'password') : '' ; ?>

                <input type="submit" name='submit' value='Registrar'>
            </form>
            <?php borrarErrores();?>
        </div>
    <?php endif; ?>
    </aside>