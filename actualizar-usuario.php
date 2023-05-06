<?php
    $con = mysqli_connect('localhost','root','','login');
    $id = $_POST['id'];
    $nom = $_POST['nombre'];
    $user = $_POST['usuario'];
    $contra = $_POST['clave'];
    $n_foto = $_FILES['foto']['name'];
    $foto = $_FILES['foto']['tmp_name'];
    $rol = $_POST['rol'];

    $ruta = "img/".$n_foto;
    $bad = "img/".$n_foto;
    move_uploaded_file($foto,$ruta);

    $sql = "UPDATE usuarios SET nombre = '".$nom."', usuario = '".$user."', contraseña = '".$contra."', id_cargo = '".$rol."', foto = '".$bad."' WHERE id = '".$id."'"; 
    $rel = mysqli_query($con,$sql);

    if ($rol == 1) {
        header("Location:index.php");
    }else if ($rol == 2) {
        header("Location:usuario.php");
    }



?>