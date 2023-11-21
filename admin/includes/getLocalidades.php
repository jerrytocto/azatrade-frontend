<?php
include("../incBD/inibd.php");
	
	$id_municipio = $_POST['id_municipio'];
	
	$query = "SELECT * FROM distrito WHERE idprovincia = '$id_municipio' ORDER BY nombre";
	$resultado=pg_query($query);
	
	while($row = pg_fetch_assoc($resultado))
	{
		$html.= "<option value='".$row['iddistrito']."'>".$row['nombre']."</option>";
	}
	echo $html;
?>