<?php
include("incBD/inibd.php");

if ($_GET[buscar]=="hijos")
{
	$consulta="SELECT * FROM provincia WHERE iddepartamento='".$_GET["idpadre"]."' order by nombre";
	//pg_select_db($dbname);
	$todos=pg_query($consulta);
	
	// Comienzo a imprimir el select
	echo "<label>Hijo:</label><select name='provincia' id='idhijo'>";
	echo "<option value=''>Provincia</option>";
	while($registro=pg_fetch_array($todos))
	{
		// Convierto los caracteres conflictivos a sus entidades HTML correspondientes para su correcta visualizacion
		// Imprimo las opciones del select
		echo "<option value='".$registro["idprovincia"]."'";
		if ($registro["idprovincia"]==$valoractual) echo " selected";
		echo ">".utf8_encode($registro["nombre"])."</option>";
	}
	echo "</select>";
}

if ($_GET[buscar]=="nietos")
{
	$consulta="SELECT * FROM distrito WHERE idprovincia='".$_GET["idhijo"]."' order by nombre";
	//pg_select_db($dbname);
	$todos=pg_query($consulta);
	
	// Comienzo a imprimir el select
	echo "<label>Nieto:</label><select name='distrito' id='idnieto'>";
	echo "<option value=''>Distrito</option>";
	while($registro=pg_fetch_array($todos))
	{
		// Convierto los caracteres conflictivos a sus entidades HTML correspondientes para su correcta visualizacion
		// Imprimo las opciones del select
		echo "<option value='".$registro["iddistrito"]."'";
		if ($registro["iddistrito"]==$valoractual) echo " selected";
		echo ">".utf8_encode($registro["nombre"])."</option>";
	}
	echo "</select>";
}
?>