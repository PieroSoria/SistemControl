<?php
    session_start();
	$vali= $_SESSION['user'];
	if ($vali == null || $vali == ''){
		header("Location:login.php");
		die();
	}

    require('PDF/fpdf.php');

    class PDF extends FPDF
    {
        // Cabecera de página
        function header()
        {
            // Logo
            // $this->Image('sistema.png', 10, 8, 33);
            // Arial bold 15
            $this->SetFont('Arial', 'B', 18);
            // Movernos a la derecha
            $this->Cell(80);
            // Título
            $this->Cell(30, 10, 'REGISTRO DE GESTION DE SISTEMA', 0, 0, 'C');
            // Salto de línea
            $this->Ln(20);
        }

        // Pie de página
        function Footer()
        {
            // Posición: a 1,5 cm del final
            $this->SetY(-15);
            // Arial italic 8
            $this->SetFont('Arial', 'I', 8);
            
            
            
        }
    }

    $conexion = mysqli_connect("localhost","root","","login");

    $consulta = "SELECT * FROM datos";
    $resultado = mysqli_query($conexion, $consulta);

    $pdf = new PDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',16);
    $pdf->Ln();
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(10,7,'id',1);
    $pdf->Cell(25,7,'nombres',1);

    $pdf->Cell(25,7,'categoria',1);
    $pdf->Cell(25,7,'fecha',1);
    $pdf->Cell(75,7,'consulta',1);

    $pdf->Cell(25,7,'estado',1);
    $pdf->Ln();
    while($fila = $resultado->fetch_assoc()){
        $pdf->Cell(10,7,$fila['id'],1);
        $pdf->Cell(25,7,$fila['nombres'],1);
        $pdf->Cell(25,7,$fila['categoria'],1);
        $pdf->Cell(25,7,$fila['fecha'],1);
        $pdf->Cell(75,7,$fila['consulta'],1);
        $pdf->Cell(25,7,$fila['estado'],1);
        $pdf->Ln();
    }

    $pdf->Output()

?>