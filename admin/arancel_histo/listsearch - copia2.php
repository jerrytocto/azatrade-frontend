<?php
session_start();
include ("conection/config.php");
set_time_limit(150);
$qx=$_GET["buscar"];
if($qx==""){
$q=$_POST["buscar"]; 
}else{
$q=$_GET["buscar"];
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Partidas azatrade,buscador de partidas arancelarias">
<meta name="author" content="Partidas azatrade">
<meta name="keywords" content="Azatrade">
<title>Azatrade ..::Partidas::..</title>
<link rel="shortcut icon" href="../img/azatrade.ico">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="boostrap/css/bootstrap.css">
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="css/w3-theme-blue-grey.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">

<script src="boostrap/js/jquery.min.js"></script>
<script src="boostrap/js/bootstrap.min.js"></script>

<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Open Sans", sans-serif}
</style>

<script>function formulario(form) { 
/*if (form.nombre.value   == '') { alert ('El nombre esta vacío');  
f.nombre.focus(); return false; } */
var txtbuscar = document.getElementById('buscar').value;
if (txtbuscar == null || txtbuscar.length == 0 || /^\s+$/.test(txtbuscar)) { 
	alert ('Campo Vacio y  ingrese partida o Descripcion a consultar !!'); 
form.buscar.focus(); return false; } 
return true; } 
</script>

</head>
<body class="w3-theme-l5">

<!-- Navbar -->
<?php
include("menu.php");
?>

<!-- Navbar on small screens -->
<!--<div id="navDemo" class="w3-hide w3-hide-large w3-hide-medium w3-top" style="margin-top:51px">
  <ul class="w3-navbar w3-left-align w3-large w3-theme">
    <li><a class="w3-padding-large" href="<?php //echo $_SERVER['PHP_SELF']; ?>">Inicio</a></li>
    <li><a class="w3-padding-large" href="#"><label class="btn btn-success"><i class="fa fa-lock"></i>     Acceder</label></a></li>
    <li><a class="w3-padding-large" href="#">Link 3</a></li>
    <li><a class="w3-padding-large" href="#">My Profile</a></li>
  </ul>
</div>-->

<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <?php
	/*panel izquierdo*/
	include("lateral_izquierdo.php");
    ?>
    <!-- End Left Column -->
    </div>
    
    <!-- Middle Column -->
    <div class="w3-col m7">
    
      <div class="w3-row-padding">
        <div class="w3-col m12">
          <div class="w3-card-2 w3-round w3-white">
            <div class="w3-container w3-padding">
            <p>Encuentra tu partida por numero ó descripción de producto. <span class="w3-right "><a href="index.php"><input class="w3-btn w3-margin-bottom" style="background:#EA6F31" type="button" value="Atrás" name="volver atrás2" /></a></span></p>
            <hr>
            <form name="form" method="post" action="listsearch.php" onsubmit="return formulario(this)">
            <div class="col-md-6">
            <input class="form-control" id="buscar" name="buscar" type="text" placeholder="Ingresa Partida  / Descripción" >
            </div>
            <div class="col-md-6">
            <button type="submit" class="btn btn-primary col-lg-4">Consultar</button>
            </div>
            </form>
            <br>
            <hr>
              <!--<h6 class="w3-opacity"><?php //echo "$paisx2 $instx2 $idiox2 $taccex2 $alcax2 $sectox2 $temax2 $tdatox2 $incix2"; ?></h6>-->
              <!--<p contenteditable="true" class="w3-border w3-padding">Status: Feeling Blue</p>
              <button type="button" class="w3-btn w3-theme"><i class="fa fa-pencil"></i>  Post</button>-->
              
            </div>
          </div>
        </div>
      </div>

<br>
<!-- lista -->
<div class="w3-row-padding">
        <div class="w3-col m12">
          <div class="w3-card-2 w3-round w3-white">
            <div class="w3-container w3-padding">
              <center><h6 class="w3-opacity"><b>Resultado de Busqueda <?php echo "$q"; ?></b></h6></center>
              <hr>
		<!-- muestra consulta -->
    <div class='table-responsive'>
		<?php

/**si el campo captado en la caja de texto es numero devuelve 1 y si es texto devuelve vacio*/
$v = is_numeric ($q) ? true : false;
//$cantidad=var_dump ($v);
$resul_num=$v;
//echo "resultado = $resul_num";
/*fin verifica si el caja de texto es numero o texto*/
if ($resul_num==""){// si es texto
		//conatmos cantidad de partidas seleccionados

/*$sql="SELECT
part_capitulo.idcapitulo,
part_capitulo.descripcion as descripcion_capi,
part_subcapitulo.idcodigo,
part_subcapitulo.idsubcapitulo,
part_subcapitulo.descripcion as descripcion_subca,
part_subcapitulo.idcapitulo,
part_lista_arancel.codigo,
SUBSTRING(part_lista_arancel.codigo,1,4) AS codigos,
part_lista_arancel.descripcion as descripcion_ara,
CONCAT(part_lista_arancel.codigo,' - ',part_lista_arancel.descripcion) AS busqueda
FROM
part_capitulo
INNER JOIN part_subcapitulo ON part_capitulo.idcapitulo = part_subcapitulo.idcapitulo
INNER JOIN part_lista_arancel ON part_subcapitulo.idsubcapitulo = SUBSTRING(part_lista_arancel.codigo,1,4)
WHERE CONCAT(part_lista_arancel.codigo,' - ',part_lista_arancel.descripcion,' - ',part_capitulo.descripcion,' - ',part_subcapitulo.descripcion) LIKE '%".$q."%' ";*/

/*$sql="SELECT
part_lista_arancel.codigo AS cod_arancel,
part_lista_arancel.descripcion AS descri_arancel,
CHARACTER_LENGTH(part_lista_arancel.codigo) AS cuenta,
part_capitulo.descripcion AS descri_capitulo,
part_subcapitulo.idcapitulo,
part_subcapitulo.descripcion as descri_subcapi
FROM
part_lista_arancel
LEFT JOIN part_subcapitulo ON SUBSTRING(part_lista_arancel.codigo,1,4) = SUBSTRING(part_subcapitulo.idsubcapitulo,1,4)
LEFT JOIN part_capitulo ON part_subcapitulo.idcapitulo= part_capitulo.idcapitulo
WHERE
CHARACTER_LENGTH(part_lista_arancel.codigo) <>'10' AND
CONCAT(part_lista_arancel.descripcion,'',part_capitulo.descripcion, part_subcapitulo.descripcion) like '%".$q."%'
order by codigo ASC";*/
$sql="SELECT
part_lista_arancel.codigo AS cod_arancel,
part_lista_arancel.descripcion AS descri_arancel,
CHARACTER_LENGTH(part_lista_arancel.codigo) AS cuenta,
part_capitulo.descripcion AS descri_capitulo,
part_subcapitulo.idcapitulo,
part_subcapitulo.descripcion as descri_subcapi,
CASE CHARACTER_LENGTH(part_lista_arancel.codigo)
WHEN 5 THEN part_lista_arancel.codigo
WHEN 6 THEN part_lista_arancel.codigo
WHEN 7 THEN part_lista_arancel.codigo
WHEN 8 THEN part_lista_arancel.codigo
ELSE '0' END as codcapi
FROM
part_lista_arancel
LEFT JOIN part_subcapitulo ON SUBSTRING(part_lista_arancel.codigo,1,4) = SUBSTRING(part_subcapitulo.idsubcapitulo,1,4)
LEFT JOIN part_capitulo ON part_subcapitulo.idcapitulo= part_capitulo.idcapitulo
WHERE
/*CHARACTER_LENGTH(part_lista_arancel.codigo) <>'10' AND*/
CONCAT(part_lista_arancel.descripcion,'', part_subcapitulo.descripcion) like '%".$q."%'
order by codigo ASC";

$res=mysql_query($sql,$link); 

if(mysql_num_rows($res)==0){ 

echo '<br><b>Incidencias no existe !!</b>'; 

}else{ 

//echo '<b>Sugerencias:</b><br />'; 
echo "<table border='0' class='table table-hover table-striped' align='left' style='font-size:80%'>";
/*echo "<tr>";
echo "<td colspan='4' align='center' bgcolor='#D8D8D8'><b>
Encontrados : $cantidad </b>
</td>";
echo "</tr>";*/
echo "<tr>";
echo "<td class='warning'>&nbsp;</td>";
echo "<td class='warning'><b>Codigo</b></td>";
echo "<td class='warning'><b>Aranacel</b></td>";
echo "<td class='warning'><b>Capitulo</b></td>";
echo "<td class='warning'><b>SubCapitulo</b></td>";
echo "</tr>";
while($fila=mysql_fetch_array($res)){ 
$items = $items + 1;
$cod_ara = $fila['cod_arancel'];
$descri_ara = $fila['descri_arancel'];
$descri_capi = $fila['descri_capitulo'];
$descri_subcapi = $fila['descri_subcapi'];
$cuentafila = $fila['cuenta'];
$cuentafila2 = $fila['codcapi'];

echo "<tr>";
if($cuentafila <> '10'){
echo "<td class='warning'><span class='glyphicon glyphicon-th-list' aria-hidden='true'></span></td>";
echo "<td class='warning'><b><u> $cod_ara </u></b></td>";
echo "<td class='warning'>$descri_ara</td>";
echo "<td class='warning'>$descri_capi</td>";
echo "<td class='warning'>$descri_subcapi</td>";
}

/*$sql_1="SELECT part_lista_arancel.codigo, SUBSTRING(part_lista_arancel.codigo,1,4) AS codigos, part_lista_arancel.descripcion, CHARACTER_LENGTH(part_lista_arancel.codigo) as cuenta1
FROM part_lista_arancel
WHERE
part_lista_arancel.codigo LIKE '$cod_ara%' and part_lista_arancel.codigo<>'$cod_ara'
LIMIT 1";
$res1=mysql_query($sql_1,$link); 

if(mysql_num_rows($res1)==0){ 
}else{ 
while($fila1=mysql_fetch_array($res1)){
	$cuentafilax = $fila1['cuenta1'];
}
}*/



if($cuentafila=='10'){
/*consultanos si tiene partidas (10 digitos)*/
$sql_A="SELECT part_lista_arancel.codigo, SUBSTRING(part_lista_arancel.codigo,1,4) AS codigos, part_lista_arancel.descripcion, CHARACTER_LENGTH(part_lista_arancel.codigo) as cuenta
FROM part_lista_arancel
WHERE CHARACTER_LENGTH(part_lista_arancel.codigo) ='10' AND part_lista_arancel.codigo like '$cod_ara%' ";
$res_A=mysql_query($sql_A,$link); 
if(mysql_num_rows($res_A)==0){
	echo "---";
}else{
	while($fila_A=mysql_fetch_array($res_A)){ 
	$cod_1 = $fila_A['codigo'];
	$nom_1 = $fila_A['descripcion'];
	$dato= $cod_ara.' / '.$descri_ara;
	echo "</tr><tr>
	<td colspan='5'> 
	<a href='viewpartidas.php?data=$cod_1&t=$q&d1=$dato'><span class='glyphicon glyphicon-ok' aria-hidden='true'></span> $cod_1 / $nom_1</a>
	</td>";
	}
}
/*fin consultanos si tiene partidas (10 digitos)*/
}

echo "</tr>";
} 
echo "</table>";
} 
}else{// fin si es texto entonces es numero

$sql="SELECT
part_lista_arancel.codigo AS cod_arancel,
part_lista_arancel.descripcion AS descri_arancel,
CHARACTER_LENGTH(part_lista_arancel.codigo) AS cuenta,
part_capitulo.descripcion AS descri_capitulo,
part_subcapitulo.idcapitulo,
part_subcapitulo.descripcion as descri_subcapi
FROM
part_lista_arancel
LEFT JOIN part_subcapitulo ON SUBSTRING(part_lista_arancel.codigo,1,4) = SUBSTRING(part_subcapitulo.idsubcapitulo,1,4)
LEFT JOIN part_capitulo ON part_subcapitulo.idcapitulo= part_capitulo.idcapitulo
WHERE
part_lista_arancel.codigo like '".$q."%'
order by codigo ASC";

$res=mysql_query($sql,$link); 

if(mysql_num_rows($res)==0){ 

echo '<br><b>Incidencias no existe !!</b>'; 

}else{ 

//echo '<b>Sugerencias:</b><br />'; 
echo "<table border='0' class='table table-hover table-striped' align='left' style='font-size:80%'>";
/*echo "<tr>";
echo "<td colspan='4' align='center' bgcolor='#D8D8D8'><b>
Encontrados : $cantidad </b>
</td>";
echo "</tr>";*/
echo "<tr>";
echo "<td>&nbsp;</td>";
echo "<td><b>Codigo</b></td>";
echo "<td><b>Aranacel</b></td>";
echo "<td><b>Capitulo</b></td>";
echo "<td><b>SubCapitulo</b></td>";
echo "</tr>";
while($fila=mysql_fetch_array($res)){ 
$items = $items + 1;
$cod_ara = $fila['cod_arancel'];
$descri_ara = $fila['descri_arancel'];
$descri_capi = $fila['descri_capitulo'];
$descri_subcapi = $fila['descri_subcapi'];
$cuenta = $fila['cuenta'];

echo "<tr>";
if($cuenta=='10'){
echo "<td><span class='glyphicon glyphicon-ok' aria-hidden='true'></span></td>";
echo "<td><a href='viewpartidas.php?data=$cod_ara&t=$q'><b><u> $cod_ara </u></b></a></td>";
echo "<td>$descri_ara</td>";
echo "<td>$descri_capi</td>";
echo "<td>$descri_subcapi</td>";
}else{
echo "<td><span class='glyphicon glyphicon-ok' aria-hidden='true'></span></td>";
echo "<td><b>$cod_ara</b></td>";
echo "<td><b>$descri_ara</b></td>";
echo "<td><b>$descri_capi</b></td>";
echo "<td><b>$descri_subcapi</b></td>";
}
echo "</tr>";
} 
echo "</table>";
} 
}

?>
</div>
		<!-- fin muestra consulta -->
     
            </div>
          </div>
        </div>
      </div>
       
  <!-- fin lista -->    
      
      
    <!-- End Middle Column -->
    </div>
    
    <!-- Right Column -->
    <?php
	/*panel derecho*/
	include("lateral_derecho.php");
      ?>
    <!-- End Right Column -->
    </div>
    
  <!-- End Grid -->
  </div>
  
<!-- End Page Container -->
</div>
<br>

<?php
include("modal_acceder.php");
?>

<!-- Footer -->
<footer class="w3-container w3-theme-d3 w3-padding-16">
  <?php
  include("footer.php");
  ?>
</footer>

 
<script>
// Accordion
function myFunction(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
        x.previousElementSibling.className += " w3-theme-d1";
    } else {
        x.className = x.className.replace("w3-show", "");
        x.previousElementSibling.className =
        x.previousElementSibling.className.replace(" w3-theme-d1", "");
    }
}

// Used to toggle the menu on smaller screens when clicking on the menu button
function openNav() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else {
        x.className = x.className.replace(" w3-show", "");
    }
}
</script>

</body>
</html>

