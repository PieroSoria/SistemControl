<?php
    $user=$_POST['user'];
    $pass=$_POST['pass'];
    session_start();
    $_SESSION['user'] = $user;

    $conexion=mysqli_connect("localhost", "root", "", "login");
    $consulta="SELECT * FROM usuarios WHERE usuario='$user' and contraseña='$pass'";

    $resultado=mysqli_query($conexion, $consulta);

    $filas=mysqli_fetch_array($resultado);

    if($filas['id_cargo']==1){
        header("location:index.php");
    }
    else if($filas['id_cargo']==2){
        header("location:usuario.php");
    }
    else{
        ?>
        <?php
        include "login.php";
        ?>
        <h1>Error de autenticacion</h1>
        <?php
    }
    mysqli_free_result($resultado);
    mysqli_close($conexion);
?>