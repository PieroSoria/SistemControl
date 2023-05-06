<?php
    session_start();
	$vali= $_SESSION['user'];
	if ($vali == null || $vali == ''){
		header("Location:login.php");
		die();
	}


    $con= new mysqli('localhost','root','','login');
    $column=['nombres','correo','categoria','fecha','nivel','estado','retraso','perdidas'];
    $table='datos';

    $campo =isset($_POST['campo']) ? $con -> real_escape_string($_POST['campo']) : null;
    $where = '';

    if($campo != null){
        $where = " WHERE (";

        $cont = count($column);
        for($i = 0; $i < $cont; $i++){
            $where .= $column[$i] . " LIKE '%".$campo."%' OR ";
        }
        $where = substr_replace($where, "", -3);
        $where .= ")";
    }
    
    $sql = "SELECT ". implode(", ",$column). " FROM .$table $where";   

    $resultado = $con->query($sql);
    $num_rows = $resultado->num_rows;

    $html = '';


    if ($num_rows > 0) {
        while ($row = $resultado->fetch_assoc()) {
            $html .= '<tr>';
            $html .= '<td class="try">'.$row['nombres'].'</td>';
            $html .= '<td class="try">'.$row['correo'].'</td>';
            $html .= '<td class="try">'.$row['categoria'].'</td>';
            $html .= '<td class="try">'.$row['fecha'].'</td>';
            $html .= '<td class="try">'.$row['nivel'].'</td>';
            $html .= '<td class="try">'.$row['retraso'].'</td>';
            $html .= '<td class="try">'.$row['perdidas'].'</td>';
            $html .= '</tr>';
        }
    }else {
        $html .= '<tr>';
        $html .= '<td colspan="5">Sin Resultados</td>';
        $html .= '</tr>';
    }

    echo json_encode($html, JSON_UNESCAPED_UNICODE);


?>