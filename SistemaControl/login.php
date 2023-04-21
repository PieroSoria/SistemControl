

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login del SGFM</title>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>

    <div class="contenedor-formulario contenedor">
        <div class="imagen-formulario">

        </div>

        <form class="formulario" action="validar.php" method="POST">
            <div class="texto-formulario">
                <h2>Bienvenido El Sistema GFM</h2>
                <p>Ingrese los datos como usuario del sistema</p>
            </div>
            <div class="input">
                <label for="usuario">Usuario</label>
                <input placeholder="Ingresa tu nombre" type="text" parent="[A-Za-z0-9-]{1,15}" id="usuario" name="user" required>
            </div>
            <div class="input">
                <label for="contraseña">Contraseña</label>
                <input placeholder="Ingresa tu contraseña" type="password" parent="[A-Za-z0-9-]{1,15}" id="contraseña" name="pass" required>
            </div>
            <div class="password-olvidada">
                <a href="#">¿Olvidaste tu contraseña?</a>
            </div>
            <div class="input">
                <input type="submit" value="Iniciar Sesion">
            </div>
        </form>
    </div>
</body>

</html>