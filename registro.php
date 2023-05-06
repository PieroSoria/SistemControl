<?php
//Conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "login");

//Comprobación de la conexión
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

//Comprobación del envío del formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //Obtener los valores del formulario

    $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
    $usuario = mysqli_real_escape_string($conexion, $_POST['usuario']);
    $password = mysqli_real_escape_string($conexion, $_POST['password']);
    $id_cargo = isset($_POST["id_cargo"]) ? $_POST["id_cargo"] : "";


    //Comprobar si se ha seleccionado una imagen de perfil
    if ($_FILES['imagen']['error'] == 0) {
        $imagen_nombre = uniqid() . "-" . $_FILES['imagen']['name'];
        $imagen_ruta = './' . $imagen_nombre;
        move_uploaded_file($_FILES['imagen']['tmp_name'], $imagen_ruta);
    } else {
        $imagen_nombre = null;
    }

    //Insertar los datos en la base de datos
    $query = "INSERT INTO usuarios (nombre, usuario, contraseña, id_cargo, foto) VALUES ('$nombre', '$usuario', '$password','$id_cargo' '$imagen_nombre')";
    if (mysqli_query($conexion, $query)) {
        echo "Usuario registrado correctamente.";
    } else {
        echo "Error al registrar el usuario: " . mysqli_error($conexion);
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Registro de usuario</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffffff;
            background-image: linear-gradient(rgb(66, 66, 234), pink);
            background-size: 200% 200%;

        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            margin: 0 auto;
            width: 400px;
            background-color: #fff;
            padding: 50px;
            border-radius: 5px;
            box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.25);
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #333;
        }

        input[type=text],
        input[type=email],
        input[type=password],
        input[type=file] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: none;
            box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.25);
            font-size: 16px;
            color: #333;
        }

        input[type=submit] {
            background-color: green;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            border: none;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.2s ease-in-out;
        }

        input[type=submit]:hover {
            background-color: #222;
        }
        select{
            background-color: green;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            border: none;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.2s ease-in-out;
        }
        select:hover {
            background-color: #222;
        }
    </style>
</head>

<body>
    <h1>Registro de usuario</h1>
    <form action="registro.php" method="post" enctype="multipart/form-data">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" required>
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>
        <label for="imagen">Imagen de perfil:</label>
        <input type="file" id="imagen" name="imagen">
        <input type="hidden" id="id_cargo" name="id_cargo" value="2">
        <input type="submit" value="Registrarse"><br><br>
        <a href="login.html">Volver</a>
    </form>
</body>

</html>