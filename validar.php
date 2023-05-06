<?php
    $user=$_POST['user'];
    $pass=$_POST['pass'];
    session_start();
    $_SESSION['user'] = $user;

    $conexion=mysqli_connect("localhost", "root", "", "login");
    $consulta="SELECT * FROM usuarios WHERE usuario='$user' and contraseña='$pass'";

    $resultado=mysqli_query($conexion, $consulta);

    $filas=mysqli_fetch_array($resultado);

    if($filas>0){
        if($filas['id_cargo']==1){
            header("location:index.php");
        }
        else if($filas['id_cargo']==2){
            header("location:usuario.php");
        }
    }else{
            ?>
            <?php
                include("login.php"); 
            ?>
            <script type="text/javascript">
                alert("error de usuario");
            </script>
            <?php
    }
    mysqli_free_result($resultado);
    mysqli_close($conexion);
?>