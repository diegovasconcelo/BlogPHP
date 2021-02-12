<?php
require_once 'includes/redirecciones.php';
require_once 'includes/cabecera.php';
require_once 'includes/lateral.php';
?>

<!-- caja principal-->
<div id="principal">
    <h1>Crear categorias</h1>
    <p>
        Anade nuevas categorias aqui:
    </p><br/>
    <form action="guardar-categoria.php" method="POST">
        <label for='nombre'>Nombre</label>
        <input type="text" name="nombre"/>

       <input type="submit" value="Guardar"/>
    </form>

</div>
<!--FIN caja principal-->

<!--pie de pagina-->
<?php require_once 'includes/pie.php'; ?> 