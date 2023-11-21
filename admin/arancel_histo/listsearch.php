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
              <center><h6 class="w3-opacity"><b>Resultado de Busqueda "<font color="#06437C"> <?php echo "$q"; ?> </font>"</b></h6></center>
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

$sql="SELECT
ara.codigo_arancel,
ara.descripcion_arancel,
ara.cod_capitulo,
ara.descripcion_capitulo,
ara.cod_subcapitulo,
ara.descripcion_subcapitulo,
ara.Code_5,
ara.Des_5,
ara.Code_6,
ara.Des_6,
ara.Code_7,
ara.Des_7,
ara.Code_8,
ara.Des_8,
ara.Code_9,
ara.Des_9,
ara.cuenta,
ara.Concatena_texto
FROM
part_lista_aranceldepu AS ara
WHERE
ara.Concatena_texto LIKE '%".$q."%' ";

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
$cod_ara = $fila['codigo_arancel'];
$descri_ara = $fila['descripcion_arancel'];
$descri_capi = $fila['descripcion_capitulo'];
$descri_subcapi = $fila['descripcion_subcapitulo'];
$cuentafila = $fila['cuenta'];

$des5 = $fila['Des_5'];
if($des5<>""){
	$code5 = $fila['Code_5'].' ('.$des5.')  / ';
}else{
	$code5 ="";
}

$des6 = $fila['Des_6'];
if($des6<>""){
	$code6 = $fila['Code_6'].' ('.$des6.')  / ';
}else{
	$code6 ="";
}

$des7 = $fila['Des_7'];
if($des7<>""){
	$code7 = $fila['Code_7'].' ('.$des7.')  / ';
}else{
	$code7 ="";
}

$des8 = $fila['Des_8'];
if($des8<>""){
	$code8 = $fila['Code_8'].' ('.$des8.')  / ';
}else{
	$code8 ="";
}

$des9 = $fila['Des_9'];
if($des9<>""){
	$code9 = $fila['Code_9'].' ('.$des9.')  / ';
}else{
	$code9 ="";
}

$dato = $code5.''.$code6.''.$code7.''.$code8.''.$code9;


echo "<tr>";
if($cuentafila <> '10'){
echo "<td class='warning'><span class='glyphicon glyphicon-th-list' aria-hidden='true'></span></td>";
echo "<td class='warning'><b>$cod_ara</b></td>";
echo "<td class='warning'>$descri_ara</td>";
echo "<td class='warning'>$descri_capi</td>";
echo "<td class='warning'>$descri_subcapi</td>";
}else{
echo"<td colspan='5'> <a href='viewpartidas.php?data=$cod_ara&t=$q&d1=$dato'><span class='glyphicon glyphicon-ok' aria-hidden='true'></span> $cod_ara | $descri_ara</a></td>";
}

echo "</tr>";
} 
echo "</table>";
}
 
}else{//fin si es texto la busqueda

$sql="SELECT
ara.codigo_arancel,
ara.descripcion_arancel,
ara.cod_capitulo,
ara.descripcion_capitulo,
ara.cod_subcapitulo,
ara.descripcion_subcapitulo,
ara.Code_5,
ara.Des_5,
ara.Code_6,
ara.Des_6,
ara.Code_7,
ara.Des_7,
ara.Code_8,
ara.Des_8,
ara.Code_9,
ara.Des_9,
ara.cuenta,
ara.Concatena_texto
FROM
part_lista_aranceldepu AS ara
WHERE
ara.codigo_arancel LIKE '".$q."%' ";

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
$cod_ara = $fila['codigo_arancel'];
$descri_ara = $fila['descripcion_arancel'];
$descri_capi = $fila['descripcion_capitulo'];
$descri_subcapi = $fila['descripcion_subcapitulo'];
$cuentafila = $fila['cuenta'];

$des5 = $fila['Des_5'];
if($des5<>""){
	$code5 = $fila['Code_5'].' ('.$des5.') / ';
}else{
	$code5 ="";
}

$des6 = $fila['Des_6'];
if($des6<>""){
	$code6 = $fila['Code_6'].' ('.$des6.')  / ';
}else{
	$code6 ="";
}

$des7 = $fila['Des_7'];
if($des7<>""){
	$code7 = $fila['Code_7'].' ('.$des7.')  / ';
}else{
	$code7 ="";
}

$des8 = $fila['Des_8'];
if($des8<>""){
	$code8 = $fila['Code_8'].' ('.$des8.')  / ';
}else{
	$code8 ="";
}

$des9 = $fila['Des_9'];
if($des9<>""){
	$code9 = $fila['Code_9'].' ('.$des9.')  / ';
}else{
	$code9 ="";
}

$dato = $code5.''.$code6.''.$code7.''.$code8.''.$code9;

echo "<tr>";
if($cuentafila <> '10'){
echo "<td class='warning'><span class='glyphicon glyphicon-th-list' aria-hidden='true'></span></td>";
echo "<td class='warning'><b>$cod_ara</b></td>";
echo "<td class='warning'>$descri_ara</td>";
echo "<td class='warning'>$descri_capi</td>";
echo "<td class='warning'>$descri_subcapi</td>";
}else{
echo "<td><span class='glyphicon glyphicon-ok' aria-hidden='true'></span></td>";
echo"<td> <a href='viewpartidas.php?data=$cod_ara&t=$q&d1=$dato'> $cod_ara </a></td>";
echo "<td>$descri_ara</td>";
echo "<td>$descri_capi</td>";
echo "<td>$descri_subcapi</td>";
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

