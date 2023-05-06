<?php
    
    session_start();
	$vali= $_SESSION['user'];
	if ($vali == null || $vali == ''){
		header("Location:login.php");
		die();
	}


    $nombre=$_POST['nombre'];
    $correo=$_POST['correo'];
    $categoria=$_POST['categoria'];
    $fecha=$_POST['fecha'];
    $estado=$_POST['estado'];
    $consulta=$_POST['consulta']; 
    $nivel=$_POST['nivel'];
    $retraso=$_POST['retraso'];
    $perdidas=$_POST['perdidas'];

    $conexion=mysqli_connect("localhost","root","", "login");
    $conrel="INSERT INTO datos (nombres, correo, categoria, fecha, estado, consulta , nivel, retraso, perdidas) VALUES ('$nombre','$correo','$categoria','$fecha','$estado','$consulta','$nivel','$retraso','$perdidas')";
    $resultado= mysqli_query($conexion, $conrel);

    if ($resultado) {
        header("Location:index.php");
    }

?>

