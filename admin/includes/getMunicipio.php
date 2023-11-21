
<?php
include("../incBD/inibd.php");
	
	$id_estado = $_POST['id_estado'];
	
	$queryM = "SELECT * FROM provincia WHERE iddepartamento = '$id_estado' ORDER BY nombre";
	$resultadoM = pg_query($queryM);
	
	$html= "<option value=''>Provincia</option>";
	
	while($rowM = pg_fetch_assoc($resultadoM))
	{
		$html.= "<option value='".$rowM['idprovincia']."'>".$rowM['nombre']."</option>";
	}
	
	echo $html;
?>