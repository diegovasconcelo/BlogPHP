<aside id='sidebar'>
    <div id='login' class='bloque'>
        <h3>Identificate</h3>
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
        <form action='registro.php' method='POST'>
            <label name='nombre'>Nombre</label>
            <input type="text" name='nombre'>

            <label name='apellido'>Apellido</label>
            <input type="text" name='apellido'>

            <label name='email'>Email</label>
            <input type="email" name='email'>

            <label name='password'>Contraseña</label>
            <input type="password" name='password'>

            <input type="submit" value='Registrar'>
        </form>
    </div>
    </aside>