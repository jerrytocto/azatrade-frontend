<?php
include ("conection/config.php");
$cod= $_GET["cod"];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Azatrade - Gestion de Partidas</title>
<link href="boostrap/css/bootstrap.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<script> 
//creamos la variable ventana_secundaria que contendrá una referencia al popup que vamos a abrir 
//la creamos como variable global para poder acceder a ella desde las distintas funciones 
var ventana_secundaria 
function cerrarVentana(){ 
//window.opener.location.href=window.opener.location.href;
//opener.location.reload(); 
//la referencia de la ventana es el objeto window del popup. Lo utilizo para acceder al método close 
window.close();
} 
</script> 

<body>
<?php
$sqlvista="SELECT
part_lista_arancel.codigo,
SUBSTRING(part_lista_arancel.codigo,1,4) AS codigos,
part_lista_arancel.descripcion
FROM
part_lista_arancel
WHERE
SUBSTRING(part_lista_arancel.codigo,1,4) = '$cod'";
$rsnv = mysql_query($sqlvista) or die(mysql_error());
if (mysql_num_rows($rsnv) > 0){
	echo "<table class='table table-hover'>
<tr>
<td bgcolor='#DDDDDD'><b>Codigo</b></td>
<td bgcolor='#DDDDDD'><b>Descripción</b></td>
</tr>";
	while($rowv= mysql_fetch_array($rsnv)){
		$codix = $rowv["codigo"];
		$codi = strlen($codix);
		$descri = $rowv["descripcion"];
		if($codi=="10"){
		echo "<tr>";
		echo "<td> <a href='viewpartida.php?data=$codix' target='_blank' onclick='cerrarVentana()'>$codix</a> </td>";
		echo "<td> <a href='viewpartida.php?data=$codix' target='_blank' onclick='cerrarVentana()'>$descri</a> </td>";
		echo "</tr>";
	}else{
        echo "<tr>";
		echo "<td>$codix</td>";
		echo "<td>$descri</td>";
		echo "</tr>";
		}

	}
}
echo"</table>";
?>

<!-- <table class="table table-responsive">
<tr>
<td>Codigo</td>
<td>Descripcion</td>
</tr>


</table> -->


</body>
</html>