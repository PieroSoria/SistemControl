<?php

$nombre=$_POST['nombre'];
$correo=$_POST['correo'];
$categoria=$_POST['categoria'];
$fecha=$_POST['fecha'];
$estado=$_POST['estado'];
$consulta=$_POST['consulta']; 
$nivel=$_POST['nivel'];

$conexion=mysqli_connect("localhost","root","", "login");
$conrel="INSERT INTO datos (nombres, correo, categoria, fecha, estado, consulta , nivel) VALUES ('$nombre','$correo','$categoria','$fecha','$estado','$consulta','$nivel')";
$resultado= mysqli_query($conexion, $conrel);

if ($resultado) {
    header("Location:index.php");
}

?>

