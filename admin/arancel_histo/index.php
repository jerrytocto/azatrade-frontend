<?php
session_start();
include ("conection/config.php");
set_time_limit(150);

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

<script type="text/javascript">
/*mostrar y  oculatr caja div*/
 $(function()
{

$("#mostrar1").click(function(event) {
event.preventDefault();
$("#caja1").slideToggle();
});

$("#mostrar2").click(function(event) {
event.preventDefault();
$("#caja2").slideToggle();
});


$("#mostrar3").click(function(event) {
event.preventDefault();
$("#caja3").slideToggle();
});

$("#mostrar4").click(function(event) {
event.preventDefault();
$("#caja4").slideToggle();
});

$("#mostrar5").click(function(event) {
event.preventDefault();
$("#caja5").slideToggle();
});

$("#mostrar6").click(function(event) {
event.preventDefault();
$("#caja6").slideToggle();
});

$("#mostrar7").click(function(event) {
event.preventDefault();
$("#caja7").slideToggle();
});

$("#mostrar8").click(function(event) {
event.preventDefault();
$("#caja8").slideToggle();
});

$("#mostrar9").click(function(event) {
event.preventDefault();
$("#caja9").slideToggle();
});

$("#mostrar10").click(function(event) {
event.preventDefault();
$("#caja10").slideToggle();
});

$("#mostrar11").click(function(event) {
event.preventDefault();
$("#caja11").slideToggle();
});

$("#mostrar12").click(function(event) {
event.preventDefault();
$("#caja12").slideToggle();
});

$("#mostrar13").click(function(event) {
event.preventDefault();
$("#caja13").slideToggle();
});

$("#mostrar14").click(function(event) {
event.preventDefault();
$("#caja14").slideToggle();
});

$("#mostrar15").click(function(event) {
event.preventDefault();
$("#caja15").slideToggle();
});

$("#mostrar16").click(function(event) {
event.preventDefault();
$("#caja16").slideToggle();
});

$("#mostrar17").click(function(event) {
event.preventDefault();
$("#caja17").slideToggle();
});

$("#mostrar18").click(function(event) {
event.preventDefault();
$("#caja18").slideToggle();
});

$("#mostrar19").click(function(event) {
event.preventDefault();
$("#caja19").slideToggle();
});

$("#mostrar20").click(function(event) {
event.preventDefault();
$("#caja20").slideToggle();
});

$("#mostrar21").click(function(event) {
event.preventDefault();
$("#caja21").slideToggle();
});

$("#mostrar22").click(function(event) {
event.preventDefault();
$("#caja22").slideToggle();
});

$("#mostrar23").click(function(event) {
event.preventDefault();
$("#caja23").slideToggle();
});

$("#mostrar24").click(function(event) {
event.preventDefault();
$("#caja24").slideToggle();
});

$("#mostrar25").click(function(event) {
event.preventDefault();
$("#caja25").slideToggle();
});

$("#mostrar26").click(function(event) {
event.preventDefault();
$("#caja26").slideToggle();
});

$("#mostrar27").click(function(event) {
event.preventDefault();
$("#caja27").slideToggle();
});

$("#mostrar28").click(function(event) {
event.preventDefault();
$("#caja28").slideToggle();
});

$("#mostrar29").click(function(event) {
event.preventDefault();
$("#caja29").slideToggle();
});

$("#mostrar30").click(function(event) {
event.preventDefault();
$("#caja30").slideToggle();
});

$("#mostrar31").click(function(event) {
event.preventDefault();
$("#caja31").slideToggle();
});

$("#mostrar32").click(function(event) {
event.preventDefault();
$("#caja32").slideToggle();
});

$("#mostrar33").click(function(event) {
event.preventDefault();
$("#caja33").slideToggle();
});

$("#mostrar34").click(function(event) {
event.preventDefault();
$("#caja34").slideToggle();
});

$("#mostrar35").click(function(event) {
event.preventDefault();
$("#caja35").slideToggle();
});




$("#caja1 b").click(function(event) {
event.preventDefault();
$("#caja1").slideUp();
});

$("#caja2 b").click(function(event) {
event.preventDefault();
$("#caja2").slideUp();
});

$("#caja3 b").click(function(event) {
event.preventDefault();
$("#caja3").slideUp();
});

$("#caja4 b").click(function(event) {
event.preventDefault();
$("#caja4").slideUp();
});

$("#caja5 b").click(function(event) {
event.preventDefault();
$("#caja5").slideUp();
});

$("#caja6 b").click(function(event) {
event.preventDefault();
$("#caja6").slideUp();
});

$("#caja7 b").click(function(event) {
event.preventDefault();
$("#caja7").slideUp();
});

$("#caja8 b").click(function(event) {
event.preventDefault();
$("#caja8").slideUp();
});

$("#caja9 b").click(function(event) {
event.preventDefault();
$("#caja9").slideUp();
});

$("#caja10 b").click(function(event) {
event.preventDefault();
$("#caja10").slideUp();
});

$("#caja11 b").click(function(event) {
event.preventDefault();
$("#caja11").slideUp();
});

$("#caja12 b").click(function(event) {
event.preventDefault();
$("#caja12").slideUp();
});

$("#caja13 b").click(function(event) {
event.preventDefault();
$("#caja13").slideUp();
});

$("#caja14 b").click(function(event) {
event.preventDefault();
$("#caja14").slideUp();
});

$("#caja15 b").click(function(event) {
event.preventDefault();
$("#caja15").slideUp();
});

$("#caja16 b").click(function(event) {
event.preventDefault();
$("#caja16").slideUp();
});

$("#caja17 b").click(function(event) {
event.preventDefault();
$("#caja17").slideUp();
});

$("#caja18 b").click(function(event) {
event.preventDefault();
$("#caja18").slideUp();
});

$("#caja19 b").click(function(event) {
event.preventDefault();
$("#caja19").slideUp();
});

$("#caja20 b").click(function(event) {
event.preventDefault();
$("#caja20").slideUp();
});

$("#caja21 b").click(function(event) {
event.preventDefault();
$("#caja21").slideUp();
});

$("#caja22 b").click(function(event) {
event.preventDefault();
$("#caja22").slideUp();
});

$("#caja23 b").click(function(event) {
event.preventDefault();
$("#caja23").slideUp();
});

$("#caja24 b").click(function(event) {
event.preventDefault();
$("#caja24").slideUp();
});

$("#caja25 b").click(function(event) {
event.preventDefault();
$("#caja25").slideUp();
});

$("#caja26 b").click(function(event) {
event.preventDefault();
$("#caja26").slideUp();
});

$("#caja27 b").click(function(event) {
event.preventDefault();
$("#caja27").slideUp();
});

$("#caja28 b").click(function(event) {
event.preventDefault();
$("#caja28").slideUp();
});

$("#caja29 b").click(function(event) {
event.preventDefault();
$("#caja29").slideUp();
});

$("#caja30 b").click(function(event) {
event.preventDefault();
$("#caja30").slideUp();
});

$("#caja31 b").click(function(event) {
event.preventDefault();
$("#caja31").slideUp();
});

$("#caja32 b").click(function(event) {
event.preventDefault();
$("#caja32").slideUp();
});

$("#caja33 b").click(function(event) {
event.preventDefault();
$("#caja33").slideUp();
});

$("#caja34 b").click(function(event) {
event.preventDefault();
$("#caja34").slideUp();
});

$("#caja35 b").click(function(event) {
event.preventDefault();
$("#caja35").slideUp();
});




}); 
</script>
    


<style type="text/css">
body {
  /*font-family: Verdana, Arial, Helvetica, sans-serif;
  font-size: 11px;
  color: #666666; */
}
a{color:#000000; text-decoration:none;}
#caja1 {
width:100%;
display: none;
padding:5px;
border:2px solid #00CCFF;
background-color:#FFFFFF;
}
#caja_n1 {
width:100%;
display: none;
padding:5px;
border:2px solid #00CCFF;
background-color:#FFFFFF;
}
#mostrar1{
display:block;
width:100%;
padding:5px;
border:2px solid #D0E8F4;
background-color:#80C8F1;
}
#mostrar_n1{
display:block;
width:100%;
padding:5px;
border:2px solid #D0E8F4;
background-color:#80C8F1;
}
#caja2 {
width:100%;
display: none;
padding:5px;
border:2px solid #00CCFF;
background-color:#FFFFFF;
}
#caja_n2 {
width:100%;
display: none;
padding:5px;
border:2px solid #00CCFF;
background-color:#FFFFFF;
}
#mostrar2{
display:block;
width:100%;
padding:5px;
border:2px solid #D0E8F4;
background-color:#80C8F1;
}
#mostrar_n2{
display:block;
width:100%;
padding:5px;
border:2px solid #D0E8F4;
background-color:#80C8F1;
}
#caja3 {
width:100%;
display: none;
padding:5px;
border:2px solid #00CCFF;
background-color:#FFFFFF;
}
#mostrar3{
display:block;
width:100%;
padding:5px;
border:2px solid #D0E8F4;
background-color:#80C8F1;
}
#caja4 {
width:100%;
display: none;
padding:5px;
border:2px solid #00CCFF;
background-color:#FFFFFF;
}
#mostrar4{
display:block;
width:100%;
padding:5px;
border:2px solid #D0E8F4;
background-color:#80C8F1;
}
#caja5 {
width:100%;
display: none;
padding:5px;
border:2px solid #00CCFF;
background-color:#FFFFFF;
}
#mostrar5{
display:block;
width:100%;
padding:5px;
border:2px solid #D0E8F4;
background-color:#80C8F1;
}
#caja6 {
width:100%;
display: none;
padding:5px;
border:2px solid #00CCFF;
background-color:#FFFFFF;
}
#mostrar6{
display:block;
width:100%;
padding:5px;
border:2px solid #D0E8F4;
background-color:#80C8F1;
}
#caja7 {
width:100%;
display: none;
padding:5px;
border:2px solid #00CCFF;
background-color:#FFFFFF;
}
#mostrar7{
display:block;
width:100%;
padding:5px;
border:2px solid #D0E8F4;
background-color:#80C8F1;
}
#caja8 {
width:100%;
display: none;
padding:5px;
border:2px solid #00CCFF;
background-color:#FFFFFF;
}
#mostrar8{
display:block;
width:100%;
padding:5px;
border:2px solid #D0E8F4;
background-color:#80C8F1;
}
#caja9 {
width:100%;
display: none;
padding:5px;
border:2px solid #00CCFF;
background-color:#FFFFFF;
}
#mostrar9{
display:block;
width:100%;
padding:5px;
border:2px solid #D0E8F4;
background-color:#80C8F1;
}
#caja10 {
width:100%;
display: none;
padding:5px;
border:2px solid #00CCFF;
background-color:#FFFFFF;
}
#mostrar10{
display:block;
width:100%;
padding:5px;
border:2px solid #D0E8F4;
background-color:#80C8F1;
}
#caja11 {
width:100%;
display: none;
padding:5px;
border:2px solid #00CCFF;
background-color:#FFFFFF;
}
#mostrar11{
display:block;
width:100%;
padding:5px;
border:2px solid #D0E8F4;
background-color:#80C8F1;
}
#caja12 {
width:100%;
display: none;
padding:5px;
border:2px solid #00CCFF;
background-color:#FFFFFF;
}
#mostrar12{
display:block;
width:100%;
padding:5px;
border:2px solid #D0E8F4;
background-color:#80C8F1;
}
#caja13 {
width:100%;
display: none;
padding:5px;
border:2px solid #00CCFF;
background-color:#FFFFFF;
}
#mostrar13{
display:block;
width:100%;
padding:5px;
border:2px solid #D0E8F4;
background-color:#80C8F1;
}
#caja14 {
width:100%;
display: none;
padding:5px;
border:2px solid #00CCFF;
background-color:#FFFFFF;
}
#mostrar14{
display:block;
width:100%;
padding:5px;
border:2px solid #D0E8F4;
background-color:#80C8F1;
}
#caja15 {
width:100%;
display: none;
padding:5px;
border:2px solid #00CCFF;
background-color:#FFFFFF;
}
#mostrar15{
display:block;
width:100%;
padding:5px;
border:2px solid #D0E8F4;
background-color:#80C8F1;
}
#caja16 {
width:100%;
display: none;
padding:5px;
border:2px solid #00CCFF;
background-color:#FFFFFF;
}
#mostrar16{
display:block;
width:100%;
padding:5px;
border:2px solid #D0E8F4;
background-color:#80C8F1;
}
#caja17 {
width:100%;
display: none;
padding:5px;
border:2px solid #00CCFF;
background-color:#FFFFFF;
}
#mostrar17{
display:block;
width:100%;
padding:5px;
border:2px solid #D0E8F4;
background-color:#80C8F1;
}
#caja18 {
width:100%;
display: none;
padding:5px;
border:2px solid #00CCFF;
background-color:#FFFFFF;
}
#mostrar18{
display:block;
width:100%;
padding:5px;
border:2px solid #D0E8F4;
background-color:#80C8F1;
}
#caja19 {
width:100%;
display: none;
padding:5px;
border:2px solid #00CCFF;
background-color:#FFFFFF;
}
#mostrar19{
display:block;
width:100%;
padding:5px;
border:2px solid #D0E8F4;
background-color:#80C8F1;
}
#caja20 {
width:100%;
display: none;
padding:5px;
border:2px solid #00CCFF;
background-color:#FFFFFF;
}
#mostrar20{
display:block;
width:100%;
padding:5px;
border:2px solid #D0E8F4;
background-color:#80C8F1;
}
#caja21 {
width:100%;
display: none;
padding:5px;
border:2px solid #00CCFF;
background-color:#FFFFFF;
}
#mostrar21{
display:block;
width:100%;
padding:5px;
border:2px solid #D0E8F4;
background-color:#80C8F1;
}
#caja22 {
width:100%;
display: none;
padding:5px;
border:2px solid #00CCFF;
background-color:#FFFFFF;
}
#mostrar22{
display:block;
width:100%;
padding:5px;
border:2px solid #D0E8F4;
background-color:#80C8F1;
}
#caja23 {
width:100%;
display: none;
padding:5px;
border:2px solid #00CCFF;
background-color:#FFFFFF;
}
#mostrar23{
display:block;
width:100%;
padding:5px;
border:2px solid #D0E8F4;
background-color:#80C8F1;
}
#caja24 {
width:100%;
display: none;
padding:5px;
border:2px solid #00CCFF;
background-color:#FFFFFF;
}
#mostrar24{
display:block;
width:100%;
padding:5px;
border:2px solid #D0E8F4;
background-color:#80C8F1;
}
#caja25 {
width:100%;
display: none;
padding:5px;
border:2px solid #00CCFF;
background-color:#FFFFFF;
}
#mostrar25{
display:block;
width:100%;
padding:5px;
border:2px solid #D0E8F4;
background-color:#80C8F1;
}
#caja26 {
width:100%;
display: none;
padding:5px;
border:2px solid #00CCFF;
background-color:#FFFFFF;
}
#mostrar26{
display:block;
width:100%;
padding:5px;
border:2px solid #D0E8F4;
background-color:#80C8F1;
}
#caja27 {
width:100%;
display: none;
padding:5px;
border:2px solid #00CCFF;
background-color:#FFFFFF;
}
#mostrar27{
display:block;
width:100%;
padding:5px;
border:2px solid #D0E8F4;
background-color:#80C8F1;
}
#caja28 {
width:100%;
display: none;
padding:5px;
border:2px solid #00CCFF;
background-color:#FFFFFF;
}
#mostrar28{
display:block;
width:100%;
padding:5px;
border:2px solid #D0E8F4;
background-color:#80C8F1;
}
#caja29 {
width:100%;
display: none;
padding:5px;
border:2px solid #00CCFF;
background-color:#FFFFFF;
}
#mostrar29{
display:block;
width:100%;
padding:5px;
border:2px solid #D0E8F4;
background-color:#80C8F1;
}
#caja30 {
width:100%;
display: none;
padding:5px;
border:2px solid #00CCFF;
background-color:#FFFFFF;
}
#mostrar30{
display:block;
width:100%;
padding:5px;
border:2px solid #D0E8F4;
background-color:#80C8F1;
}
#caja31 {
width:100%;
display: none;
padding:5px;
border:2px solid #00CCFF;
background-color:#FFFFFF;
}
#mostrar31{
display:block;
width:100%;
padding:5px;
border:2px solid #D0E8F4;
background-color:#80C8F1;
}
#caja32 {
width:100%;
display: none;
padding:5px;
border:2px solid #00CCFF;
background-color:#FFFFFF;
}
#mostrar32{
display:block;
width:100%;
padding:5px;
border:2px solid #D0E8F4;
background-color:#80C8F1;
}
#caja33 {
width:100%;
display: none;
padding:5px;
border:2px solid #00CCFF;
background-color:#FFFFFF;
}
#mostrar33{
display:block;
width:100%;
padding:5px;
border:2px solid #D0E8F4;
background-color:#80C8F1;
}
#caja34 {
width:100%;
display: none;
padding:5px;
border:2px solid #00CCFF;
background-color:#FFFFFF;
}
#mostrar34{
display:block;
width:100%;
padding:5px;
border:2px solid #D0E8F4;
background-color:#80C8F1;
}
#caja35 {
width:100%;
display: none;
padding:5px;
border:2px solid #00CCFF;
background-color:#FFFFFF;
}
#mostrar35{
display:block;
width:100%;
padding:5px;
border:2px solid #D0E8F4;
background-color:#80C8F1;
}
</style>

<script language='JavaScript'>
/*ventana emergente*/
var newwindow;
function popup(url)
{ newwindow=window.open(url,'name','width=750,height =450,left=200,top=90,scrollbars=NO,menubar=NO,titlebar= NO,status=NO,toolbar=NO');
if (window.focus) {newwindow.focus()}
}
</script>

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
<div id="navDemo" class="w3-hide w3-hide-large w3-hide-medium w3-top" style="margin-top:51px">
  <ul class="w3-navbar w3-left-align w3-large w3-theme">
    <li><a class="w3-padding-large" href="<?php echo $_SERVER['PHP_SELF']; ?>">Inicio</a></li>
    <li><a class="w3-padding-large" href="#"><label class="btn btn-success"><i class="fa fa-lock"></i>     Acceder</label></a></li>
    <!--<li><a class="w3-padding-large" href="#">Link 3</a></li>
    <li><a class="w3-padding-large" href="#">My Profile</a></li>-->
  </ul>
</div>

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
            <p>Encuentra tu partida por numero ó descripción de producto.</p>
            <hr>
            <!--<form name="form" method="post" action="listsearch.php" onsubmit="return formulario(this)">-->
            <form name="form" method="post" action="listsearch.php" onsubmit="return formulario(this)">
            <div class="col-md-6">
<input class="form-control" id="buscar" name="buscar" type="text" placeholder="Ingresa Partida  / Descripción"> 
            </div>
            <div class="col-md-6">
            <button class="btn btn-primary col-lg-4">Consultar</button>
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
              <center><h6 class="w3-opacity">Lista de Clasificaciones Arancelarias.</h6></center>
              <hr>
		<?php

// consultamos la seccion
$sqlsec="SELECT CONCAT(part_capitulo.idseccion,' :     ',part_capitulo.descripcion_seccion) AS seccion, part_capitulo.idseccion, part_capitulo.descripcion_seccion FROM part_capitulo GROUP BY part_capitulo.idseccion, part_capitulo.descripcion_seccion ORDER BY part_capitulo.idcapitulo ASC ";
  $rsnsec = mysql_query($sqlsec) or die(mysql_error());
if (mysql_num_rows($rsnsec) > 0){
  while($rowsec= mysql_fetch_array($rsnsec)){
    $codigo_capi = $rowsec["idcapitulo"];
    $items = $items + 1;
    $nomsec = $rowsec["idseccion"];
    $desc_sec = $rowsec["descripcion_seccion"];
    $sec_desc = $rowsec["seccion"];
    
    $mostrar= "mostrar".$items;
    $caja= "caja".$items;
    
    echo "<a href='#' id='$mostrar' style='font-size: 11px;'>$items $sec_desc </a>";
      
    // mostramos caja que contiene capitulo
    echo "<div id='$caja'>";
$sqlcapi="SELECT cpai1.idseccion, cpai1.idcapitulo, cpai1.descripcion FROM part_capitulo AS cpai1 WHERE cpai1.idseccion = '$nomsec' AND cpai1.descripcion_seccion = '$desc_sec' ORDER BY cpai1.idcapitulo ASC ";
  $rsncapi = mysql_query($sqlcapi) or die(mysql_error());
if (mysql_num_rows($rsncapi) > 0){
  while($rowcapi= mysql_fetch_array($rsncapi)){
    $cod_capix = $rowcapi["idseccion"];
      $items_w = $items_w + 1;
    $cod_capi = $rowcapi["idcapitulo"];
    $desc_capi = $rowcapi["descripcion"];
 
    echo "&nbsp;&nbsp;<div style='background-color: rgba(255, 0, 0, 0, 2); border:1px solid green; font-size: 11px;'><b>$cod_capi  $desc_capi </b></div>"; 

// mostramos caja que contiene Subcapitulo
$sqlsubcapi="SELECT subcap.idcodigo, subcap.idsubcapitulo, subcap.descripcion, subcap.idcapitulo FROM part_subcapitulo AS subcap WHERE subcap.idcapitulo = '$cod_capi' ORDER BY subcap.idsubcapitulo ASC";
  $rsnsubcapi = mysql_query($sqlsubcapi) or die(mysql_error());
if (mysql_num_rows($rsnsubcapi) > 0){
  while($rowsubcapi= mysql_fetch_array($rsnsubcapi)){
    //$itemsx = $itemsx + 1;
    $items_wx = $items_wx + 1;
    
    $desc_subcapi = $rowsubcapi["descripcion"];
    $codigo_subcapi = $rowsubcapi["idsubcapitulo"];
    
    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href='detalleviuw.php?cod=$codigo_subcapi' title='Ver detalle' onClick=\"popup('detalleviuw.php?cod=$codigo_subcapi'); return false;\"><em style='font-size: 11px;'>$codigo_subcapi  $desc_subcapi </a></em><br>";
}
}
// fin mostramos caja que contiene Subcapitulo
    
}
}
    echo"</div>";
    // fin de mostramos caja que contiene capitulo
    }
    }
    
?>
     
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

