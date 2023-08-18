<?php
session_start();
if (isset($_SESSION['login_usuario'])){//si es logeado
	if($_SESSION['rol']=='ADMIN'){//si es admin no hace nada
		
	}else{//si es usuario
		if($_SESSION['acceso_pago']=='NO'){
			//print "<script>alert('Acceso Denegado! - Para tener acceso adquiere uno de nuestros planes');window.location='../../planes/';</script>";
		}
		
	}
}else{//si no esta logeado
	if(!isset($_SESSION["login_usuario"]) || $_SESSION["login_usuario"]==null){
	//print "<script>alert('Acceso invalido! - Inicia Sesion para Acceder');window.location='$enlace_actual';</script>";
	print "<script>window.location='../../';</script>";
		exit();
}
}
date_default_timezone_set("America/Lima");
$fechahoy = date("Y-m-d");

set_time_limit(500);
$paisname = $_POST["namepaisE"];
$paiscode = $_POST["codepaisE"];
$nombres2 = $_POST["unavaria"];
$nombres3 = $_POST["dosvaria"];

$namedepa1 = $_POST["namedepa"];
$ubicod1 = $_POST["codubi"];
if($ubicod1!=""){
	$flatcod = $ubicod1;
}else{
	$flatcod = "";
}

if($nombres2=="vfobserdol"){
	 $combo = "Valor FOB USD";
 }else if($nombres2=="vpesnet"){
	  $combo = "Peso Neto (Kg)";
 }else if($nombres2=="diferen"){
	  $combo = "Precio FOB USD x KG";
 }else if($nombres2=="vpesbru"){
	  $combo = "Peso Bruto (Kg)";
 }else if($nombres2=="qunifis"){
	  $combo = "Cantidad Exportada";
 }else if($nombres2=="qunicom"){
	  $combo = "Unidades Comerciales";
 }else if($nombres2=="part_nandi"){
	  $combo = "Cantidad de Partidas";
}else if($nombres2=="total"){
	  $combo = "Cantidad de Registros";
 }else if($nombres2=="ndcl"){
	  $combo = "Cantidad de Duas";
 }else if($nombres2=="dnombre"){
	  $combo = "Cantidad de Empresas";
 }else if($nombres2=="cpaides"){
	  $combo = "Cantidad de Mercados";
 }else if($nombres2=="cpuedes"){
	  $combo = "Cantidad de Puertos";
 }else if($nombres2=="cadu"){
	  $combo = "Cantidad de Aduanas";
 }else if($nombres2=="depa"){
	  $combo = "Cantidad de Departamentos";
 }else if($nombres2=="provi"){
	  $combo = "Cantidad de Provincias";
 }else if($nombres2=="distri"){
	  $combo = "Cantidad de Distritos";
 }else if($nombres2=="cage"){
	  $combo = "Cantidad de Agentes";
 }else if($nombres2=="cviatra"){
	  $combo = "Cantidad de vias de Transporte";
 }

if($nombres3=="partidaexpo"){
	 $combo2 = "Partidas Exportadas";
 }else if($nombres3=="puerto"){
	  $combo2 = "Puertos de Ingreso";
 }else if($nombres3=="empresaexpo"){
	  $combo2 = "Empresas Exportadoras";
 }else if($nombres3=="ubigeo"){
	  $combo2 = "Ubigeo";
 }else if($nombres3=="agente"){
	  $combo2 = "Agente de Aduanas";
 }else if($nombres3=="aduanas"){
	  $combo2 = "Aduanas";
 }

$filtrofecha='extract(year from exportacion.fnum)';
$wherefecha ="extract(year from exportacion.fnum) >= '2012' AND
extract(year from exportacion.fnum) <= '2019'";

$condi = $_SESSION['acceso_pago'];
if($condi=='SI' or $condi=='NO' and $_SESSION['rol']=='ADMIN'){//tiene o no pago y es admin visualiza
	$axe = "SI";
}else if($condi=='NO' and $_SESSION['rol']<>'ADMIN'){//no tiene pago y no es admin limita 5 registros
	$axe = "NO";
}else if($condi=='SI' and $_SESSION['rol']<>'ADMIN'){//si tiene pago y no es admin visualiza todo
	$axe = "SI";
}
?>
<!doctype html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<!-- Favicons -->
<link rel="apple-touch-icon" href="../../img/logo.png">
<link rel="icon" href="../../img/logo.png">
<title>
   ..: Azatrade :..
</title>

<!--     Fonts and icons     -->
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
<link rel="stylesheet" href="../../css/material-dashboard.min.css?v=2.0.1">
<link rel="stylesheet" href="../../css/buttons.dataTables.min.css">
<!-- CSS Just for demo purpose, don't include it in your project -->
<link href="../../css/demo.css" rel="stylesheet"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
      <style>
		.loader {
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background: url('../../img/loading-carga.gif') 50% 50% no-repeat rgb(249,249,249);
    opacity: .8;
}
	</style>
      <script type="text/javascript">
$(window).load(function() {
    $(".loader").fadeOut("slow");
});
</script>
       
        </head>
        
        <body class="off-canvas-sidebar register-page" style="background-image: url('../../img/plan.jpg'); background-size: cover; background-position: top center;">
     
<div class="loader"></div>
   
    <!--<div class="wrapper wrapper-full-page">-->
          <div class="wrapper">
           <div class="content">
                      <div class="container-fluid">
                            <div class="row"> 
                            
            <div class='col-md-12'>
          
          <?php if($axe=='NO'){ ?>
          <div class="alert alert-warning alert-with-icon" data-notify="container">
            <i class="material-icons" data-notify="icon">notifications</i>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <i class="material-icons">info</i>
            </button>
            <span data-notify="message"><h3>Versión GRATUITA!. Limitada en solo los 5 primeros registros, si quieres ver toda la información consultada adquiere uno de nuestros <a href="../../planes/" target="_blank">PLANES AQUI</a></h3></span>
          </div>
           <?php } ?>
           
            <?php
				include("../../incBD/inibd.php");
 
if($nombres3=="partidaexpo"){//consulta como variable partidas exportadas
//if($numReg!=0){//inicia si hay resultados
//echo"$nombres3 <br>";
//echo"$nombres2 <br>";
//echo"$paiscode";
	/*primero consultamos la suma total general de cada ano*/
  if($nombres2=="vfobserdol" or $nombres2=="vpesnet" or $nombres2=="vpesbru" or $nombres2=="qunifis" or $nombres2=="qunicom"){
	  $sqlyear="SELECT
Sum(CASE extract(year from exportacion.fnum) WHEN '2012' THEN ".$nombres2." ELSE 0 END) AS a2012,
Sum(CASE extract(year from exportacion.fnum) WHEN '2013' THEN ".$nombres2." ELSE 0 END) AS a2013,
Sum(CASE extract(year from exportacion.fnum) WHEN '2014' THEN ".$nombres2." ELSE 0 END) AS a2014,
Sum(CASE extract(year from exportacion.fnum) WHEN '2015' THEN ".$nombres2." ELSE 0 END) AS a2015,
Sum(CASE extract(year from exportacion.fnum) WHEN '2016' THEN ".$nombres2." ELSE 0 END) AS a2016,
Sum(CASE extract(year from exportacion.fnum) WHEN '2017' THEN ".$nombres2." ELSE 0 END) AS a2017,
Sum(CASE extract(year from exportacion.fnum) WHEN '2018' THEN ".$nombres2." ELSE 0 END) AS a2018,
Sum(CASE extract(year from exportacion.fnum) WHEN '2019' THEN ".$nombres2." ELSE 0 END) AS a2019
FROM exportacion
/*LEFT JOIN arancel ON exportacion.part_nandi = arancel.idarancel */
WHERE exportacion.cpaides = '".$paiscode."' AND extract(year from exportacion.fnum) >= '2012' AND
extract(year from exportacion.fnum) <= '2019' AND SUBSTRING(exportacion.ubigeo,1,2) like '%$flatcod' ";
  }
  if($nombres2=="diferen"){
	  $sqlyear="SELECT
Sum(CASE extract(year from exportacion.fnum) WHEN '2012' THEN exportacion.vfobserdol ELSE 0 END) / SUM(CASE extract(year from exportacion.fnum) WHEN '2012' THEN exportacion.vpesnet ELSE 0 END) AS a2012,
Sum(CASE extract(year from exportacion.fnum) WHEN '2013' THEN exportacion.vfobserdol ELSE 0 END) / SUM(CASE extract(year from exportacion.fnum) WHEN '2013' THEN exportacion.vpesnet ELSE 0 END) AS a2013,
Sum(CASE extract(year from exportacion.fnum) WHEN '2014' THEN exportacion.vfobserdol ELSE 0 END) / SUM(CASE extract(year from exportacion.fnum) WHEN '2014' THEN exportacion.vpesnet ELSE 0 END) AS a2014,
Sum(CASE extract(year from exportacion.fnum) WHEN '2015' THEN exportacion.vfobserdol ELSE 0 END) / SUM(CASE extract(year from exportacion.fnum) WHEN '2015' THEN exportacion.vpesnet ELSE 0 END) AS a2015,
Sum(CASE extract(year from exportacion.fnum) WHEN '2016' THEN exportacion.vfobserdol ELSE 0 END) / SUM(CASE extract(year from exportacion.fnum) WHEN '2016' THEN exportacion.vpesnet ELSE 0 END) AS a2016,
Sum(CASE extract(year from exportacion.fnum) WHEN '2017' THEN exportacion.vfobserdol ELSE 0 END) / SUM(CASE extract(year from exportacion.fnum) WHEN '2017' THEN exportacion.vpesnet ELSE 0 END) AS a2017,
Sum(CASE extract(year from exportacion.fnum) WHEN '2018' THEN exportacion.vfobserdol ELSE 0 END) / SUM(CASE extract(year from exportacion.fnum) WHEN '2018' THEN exportacion.vpesnet ELSE 0 END) AS a2018,
Sum(CASE extract(year from exportacion.fnum) WHEN '2019' THEN exportacion.vfobserdol ELSE 0 END) / SUM(CASE extract(year from exportacion.fnum) WHEN '2019' THEN exportacion.vpesnet ELSE 0 END) AS a2019
FROM exportacion
/*LEFT JOIN arancel ON exportacion.part_nandi = arancel.idarancel */
WHERE exportacion.cpaides = '".$paiscode."' AND extract(year from exportacion.fnum) >= '2012' AND
extract(year from exportacion.fnum) <= '2019' AND SUBSTRING(exportacion.ubigeo,1,2) like '%$flatcod' ";
  }
  
  if($nombres2=="total"){
	  $sqlyear="SELECT
Sum(CASE extract(year from exportacion.fnum) WHEN '2012' THEN 1 ELSE 0 END) AS a2012,
Sum(CASE extract(year from exportacion.fnum) WHEN '2013' THEN 1 ELSE 0 END) AS a2013,
Sum(CASE extract(year from exportacion.fnum) WHEN '2014' THEN 1 ELSE 0 END) AS a2014,
Sum(CASE extract(year from exportacion.fnum) WHEN '2015' THEN 1 ELSE 0 END) AS a2015,
Sum(CASE extract(year from exportacion.fnum) WHEN '2016' THEN 1 ELSE 0 END) AS a2016,
Sum(CASE extract(year from exportacion.fnum) WHEN '2017' THEN 1 ELSE 0 END) AS a2017,
Sum(CASE extract(year from exportacion.fnum) WHEN '2018' THEN 1 ELSE 0 END) AS a2018,
Sum(CASE extract(year from exportacion.fnum) WHEN '2019' THEN 1 ELSE 0 END) AS a2019
FROM
exportacion
/*LEFT JOIN arancel ON exportacion.part_nandi = arancel.idarancel*/
WHERE exportacion.cpaides = '".$paiscode."' AND extract(year from exportacion.fnum) >= '2012' AND
extract(year from exportacion.fnum) <= '2019' AND SUBSTRING(exportacion.ubigeo,1,2) like '%$flatcod' ";
  }
  
  if($nombres2=="part_nandi" or $nombres2=="ndcl" or $nombres2=="dnombre" or $nombres2=="cpaides" or $nombres2=="cpuedes" or  $nombres2=="cadu" or $nombres2=="cage" or $nombres2=="cviatra"){
	 $sqlyear="SELECT
COUNT(DISTINCT CASE extract(year from exportacion.fnum) WHEN '2012' THEN exportacion.".$nombres2." ELSE NULL END) AS a2012,
COUNT(DISTINCT CASE extract(year from exportacion.fnum) WHEN '2013' THEN exportacion.".$nombres2." ELSE NULL END) AS a2013,
COUNT(DISTINCT CASE extract(year from exportacion.fnum) WHEN '2014' THEN exportacion.".$nombres2." ELSE NULL END) AS a2014,
COUNT(DISTINCT CASE extract(year from exportacion.fnum) WHEN '2015' THEN exportacion.".$nombres2." ELSE NULL END) AS a2015,
COUNT(DISTINCT CASE extract(year from exportacion.fnum) WHEN '2016' THEN exportacion.".$nombres2." ELSE NULL END) AS a2016,
COUNT(DISTINCT CASE extract(year from exportacion.fnum) WHEN '2017' THEN exportacion.".$nombres2." ELSE NULL END) AS a2017,
COUNT(DISTINCT CASE extract(year from exportacion.fnum) WHEN '2018' THEN exportacion.".$nombres2." ELSE NULL END) AS a2018,
COUNT(DISTINCT CASE extract(year from exportacion.fnum) WHEN '2019' THEN exportacion.".$nombres2." ELSE NULL END) AS a2019
FROM
exportacion
/*LEFT JOIN arancel ON exportacion.part_nandi = arancel.idarancel*/
WHERE exportacion.cpaides = '".$paiscode."' AND extract(year from exportacion.fnum) >= '2012' AND
extract(year from exportacion.fnum) <= '2019' AND SUBSTRING(exportacion.ubigeo,1,2) like '%$flatcod' "; 
  }
  if($nombres2=="depa" or $nombres2=="provi" or $nombres2=="distri"){
	  if($nombres2=="depa"){
		  $varia='substring(exportacion.ubigeo,1,2)';
	  }else if($nombres2=="provi"){
		  $varia='substring(exportacion.ubigeo,3,2)';
	  }else{
		  $varia='substring(exportacion.ubigeo,5,2)';
	  }
	  $sqlyear="SELECT
COUNT(DISTINCT CASE extract(year from exportacion.fnum) WHEN '2012' THEN ".$varia." ELSE NULL END) AS a2012,
COUNT(DISTINCT CASE extract(year from exportacion.fnum) WHEN '2013' THEN ".$varia." ELSE NULL END) AS a2013,
COUNT(DISTINCT CASE extract(year from exportacion.fnum) WHEN '2014' THEN ".$varia." ELSE NULL END) AS a2014,
COUNT(DISTINCT CASE extract(year from exportacion.fnum) WHEN '2015' THEN ".$varia." ELSE NULL END) AS a2015,
COUNT(DISTINCT CASE extract(year from exportacion.fnum) WHEN '2016' THEN ".$varia." ELSE NULL END) AS a2016,
COUNT(DISTINCT CASE extract(year from exportacion.fnum) WHEN '2017' THEN ".$varia." ELSE NULL END) AS a2017,
COUNT(DISTINCT CASE extract(year from exportacion.fnum) WHEN '2018' THEN ".$varia." ELSE NULL END) AS a2018,
COUNT(DISTINCT CASE extract(year from exportacion.fnum) WHEN '2019' THEN ".$varia." ELSE NULL END) AS a2019
FROM
exportacion
/*LEFT JOIN arancel ON exportacion.part_nandi = arancel.idarancel*/
WHERE exportacion.cpaides = '".$paiscode."' AND extract(year from exportacion.fnum) >= '2012' AND
extract(year from exportacion.fnum) <= '2019' AND SUBSTRING(exportacion.ubigeo,1,2) like '%$flatcod' ";
	  
  }
	  /*$result_year= pg_query($sqlyear) or die("Error en la Consulta SQL Sumatoria Total");
	  $numReg_year = pg_num_rows($result_year);
	  if($numReg_year>0){
		   while ($fila_year=pg_fetch_array($result_year)) {*/
	$result_year=$conexpg->query($sqlyear); 
if($result_year->num_rows>0){ 
while($fila_year=$result_year->fetch_array()){
		   $sumatotal2012= $fila_year['a2012'];
		   $sumatotal2013= $fila_year['a2013'];
		   $sumatotal2014= $fila_year['a2014'];
		   $sumatotal2015= $fila_year['a2015'];
		   $sumatotal2016= $fila_year['a2016'];
		   $sumatotal2017= $fila_year['a2017'];
		   $sumatotal2018= $fila_year['a2018'];
			   $sumatotal2019= $fila_year['a2019'];
		   
		   if($sumatotal2017=='0'){
			   $varitota="0.00";
		   }else{
		   $varitota= number_format((($sumatotal2018 / $sumatotal2017) - 1) * 100,2);
		   }
		   $parti='100 %';
			   
		   }
	  }else{
		  $sumatotal2012="0.00";
		  $sumatotal2013="0.00";
		  $sumatotal2014="0.00";
		  $sumatotal2015="0.00";
		  $sumatotal2016="0.00";
		  $sumatotal2017="0.00";
		  $sumatotal2018="0.00";
		  $sumatotal2019="0.00";
		  $varitota="0.00";
		  $parti="0.00";
	  }
	
  /*visualizamos datos en el reporte*/
  if($nombres2=="vfobserdol" or $nombres2=="vpesnet" or $nombres2=="vpesbru" or $nombres2=="qunifis" or $nombres2=="qunicom"){
   $query_resultado = "SELECT
exportacion.part_nandi,
/*arancel.descripcion,*/
Sum(CASE extract(year from exportacion.fnum) WHEN '2012' THEN ".$nombres2." ELSE 0 END) AS a2012,
Sum(CASE extract(year from exportacion.fnum) WHEN '2013' THEN ".$nombres2." ELSE 0 END) AS a2013,
Sum(CASE extract(year from exportacion.fnum) WHEN '2014' THEN ".$nombres2." ELSE 0 END) AS a2014,
Sum(CASE extract(year from exportacion.fnum) WHEN '2015' THEN ".$nombres2." ELSE 0 END) AS a2015,
Sum(CASE extract(year from exportacion.fnum) WHEN '2016' THEN ".$nombres2." ELSE 0 END) AS a2016,
Sum(CASE extract(year from exportacion.fnum) WHEN '2017' THEN ".$nombres2." ELSE 0 END) AS a2017,
Sum(CASE extract(year from exportacion.fnum) WHEN '2018' THEN ".$nombres2." ELSE 0 END) AS a2018,
Sum(CASE extract(year from exportacion.fnum) WHEN '2019' THEN ".$nombres2." ELSE 0 END) AS a2019
FROM exportacion
/*LEFT JOIN arancel ON exportacion.part_nandi = arancel.idarancel*/
WHERE exportacion.cpaides = '".$paiscode."' AND extract(year from exportacion.fnum) >= '2012' AND
extract(year from exportacion.fnum) <= '2019' AND SUBSTRING(exportacion.ubigeo,1,2) like '%$flatcod'
GROUP BY exportacion.part_nandi/*,arancel.descripcion*/ ";
  }else if ($nombres2=="diferen"){
	  $query_resultado = "SELECT
exportacion.part_nandi,
7*arancel.descripcion,*/
Sum(CASE extract(year from exportacion.fnum) WHEN '2012' THEN exportacion.vfobserdol ELSE 0 END) AS x2012,
Sum(CASE extract(year from exportacion.fnum) WHEN '2012' THEN exportacion.vpesnet ELSE 0 END) AS xx2012,
Sum(CASE extract(year from exportacion.fnum) WHEN '2013' THEN exportacion.vfobserdol ELSE 0 END) AS x2013,
Sum(CASE extract(year from exportacion.fnum) WHEN '2013' THEN exportacion.vpesnet ELSE 0 END) AS xx2013,
Sum(CASE extract(year from exportacion.fnum) WHEN '2014' THEN exportacion.vfobserdol ELSE 0 END) AS x2014,
Sum(CASE extract(year from exportacion.fnum) WHEN '2014' THEN exportacion.vpesnet ELSE 0 END) AS xx2014,
Sum(CASE extract(year from exportacion.fnum) WHEN '2015' THEN exportacion.vfobserdol ELSE 0 END) AS x2015,
Sum(CASE extract(year from exportacion.fnum) WHEN '2015' THEN exportacion.vpesnet ELSE 0 END) AS xx2015,
Sum(CASE extract(year from exportacion.fnum) WHEN '2016' THEN exportacion.vfobserdol ELSE 0 END) AS x2016,
Sum(CASE extract(year from exportacion.fnum) WHEN '2016' THEN exportacion.vpesnet ELSE 0 END) AS xx2016,
Sum(CASE extract(year from exportacion.fnum) WHEN '2017' THEN exportacion.vfobserdol ELSE 0 END) AS x2017,
Sum(CASE extract(year from exportacion.fnum) WHEN '2017' THEN exportacion.vpesnet ELSE 0 END) AS xx2017,
Sum(CASE extract(year from exportacion.fnum) WHEN '2018' THEN exportacion.vfobserdol ELSE 0 END) AS x2018,
Sum(CASE extract(year from exportacion.fnum) WHEN '2018' THEN exportacion.vpesnet ELSE 0 END) AS xx2018,
Sum(CASE extract(year from exportacion.fnum) WHEN '2019' THEN exportacion.vfobserdol ELSE 0 END) AS x2019,
Sum(CASE extract(year from exportacion.fnum) WHEN '2019' THEN exportacion.vpesnet ELSE 0 END) AS xx2019
FROM exportacion
LEFT JOIN arancel ON exportacion.part_nandi = arancel.idarancel*/
WHERE exportacion.cpaides = '".$paiscode."' AND extract(year from exportacion.fnum) >= '2012' AND
extract(year from exportacion.fnum) <= '2019' AND SUBSTRING(exportacion.ubigeo,1,2) like '%$flatcod' GROUP BY exportacion.part_nandi/*,arancel.descripcion*/";
  }else if($nombres2=="total"){
	  $query_resultado = "SELECT
exportacion.part_nandi,
/*arancel.descripcion,*/
Sum(CASE extract(year from exportacion.fnum) WHEN '2012' THEN 1 ELSE 0 END) AS a2012,
Sum(CASE extract(year from exportacion.fnum) WHEN '2013' THEN 1 ELSE 0 END) AS a2013,
Sum(CASE extract(year from exportacion.fnum) WHEN '2014' THEN 1 ELSE 0 END) AS a2014,
Sum(CASE extract(year from exportacion.fnum) WHEN '2015' THEN 1 ELSE 0 END) AS a2015,
Sum(CASE extract(year from exportacion.fnum) WHEN '2016' THEN 1 ELSE 0 END) AS a2016,
Sum(CASE extract(year from exportacion.fnum) WHEN '2017' THEN 1 ELSE 0 END) AS a2017,
Sum(CASE extract(year from exportacion.fnum) WHEN '2018' THEN 1 ELSE 0 END) AS a2018,
Sum(CASE extract(year from exportacion.fnum) WHEN '2019' THEN 1 ELSE 0 END) AS a2019
FROM exportacion
/*LEFT JOIN arancel ON exportacion.part_nandi = arancel.idarancel*/
WHERE exportacion.cpaides = '".$paiscode."' AND
extract(year from exportacion.fnum) >= '2012' AND
extract(year from exportacion.fnum) <= '2019' AND SUBSTRING(exportacion.ubigeo,1,2) like '%$flatcod' GROUP BY exportacion.part_nandi/*,arancel.descripcion*/ ";
  } else if($nombres2=="part_nandi" or $nombres2=="ndcl" or $nombres2=="dnombre" or $nombres2=="cpaides" or $nombres2=="cpuedes" or  $nombres2=="cadu" or $nombres2=="cage" or $nombres2=="cviatra"){
	  $query_resultado = "SELECT
exportacion.part_nandi,
/*arancel.descripcion,*/
COUNT(distinct CASE extract(year from exportacion.fnum) WHEN '2012' THEN  exportacion.".$nombres2." ELSE NULL END) AS a2012,
COUNT(distinct CASE extract(year from exportacion.fnum) WHEN '2013' THEN  exportacion.".$nombres2." ELSE NULL END) AS a2013,
COUNT(distinct CASE extract(year from exportacion.fnum) WHEN '2014' THEN  exportacion.".$nombres2." ELSE NULL END) AS a2014,
COUNT(distinct CASE extract(year from exportacion.fnum) WHEN '2015' THEN  exportacion.".$nombres2." ELSE NULL END) AS a2015,
COUNT(distinct CASE extract(year from exportacion.fnum) WHEN '2016' THEN  exportacion.".$nombres2." ELSE NULL END) AS a2016,
COUNT(distinct CASE extract(year from exportacion.fnum) WHEN '2017' THEN  exportacion.".$nombres2." ELSE NULL END) AS a2017,
COUNT(distinct CASE extract(year from exportacion.fnum) WHEN '2018' THEN  exportacion.".$nombres2." ELSE NULL END) AS a2018,
COUNT(distinct CASE extract(year from exportacion.fnum) WHEN '2019' THEN  exportacion.".$nombres2." ELSE NULL END) AS a2019
FROM
exportacion
/*LEFT JOIN arancel ON exportacion.part_nandi = arancel.idarancel*/
WHERE exportacion.cpaides = '".$paiscode."' AND extract(year from exportacion.fnum) >= '2012' AND
extract(year from exportacion.fnum) <= '2019' AND SUBSTRING(exportacion.ubigeo,1,2) like '%$flatcod' GROUP BY exportacion.part_nandi/*,arancel.descripcion*/";
  }else{
	  if($nombres2=="depa"){
		  $variaA='substring(exportacion.ubigeo,1,2)';
	  }else if($nombres2=="provi"){
		  $variaA='substring(exportacion.ubigeo,3,2)';
	  }else{
		  $variaA='substring(exportacion.ubigeo,5,2)';
	  }
	  $query_resultado = "SELECT
exportacion.part_nandi,
/*arancel.descripcion,*/
COUNT(distinct CASE extract(year from exportacion.fnum) WHEN '2012' THEN  ".$variaA." ELSE NULL END) AS a2012,
COUNT(distinct CASE extract(year from exportacion.fnum) WHEN '2013' THEN  ".$variaA." ELSE NULL END) AS a2013,
COUNT(distinct CASE extract(year from exportacion.fnum) WHEN '2014' THEN  ".$variaA." ELSE NULL END) AS a2014,
COUNT(distinct CASE extract(year from exportacion.fnum) WHEN '2015' THEN  ".$variaA." ELSE NULL END) AS a2015,
COUNT(distinct CASE extract(year from exportacion.fnum) WHEN '2016' THEN  ".$variaA." ELSE NULL END) AS a2016,
COUNT(distinct CASE extract(year from exportacion.fnum) WHEN '2017' THEN  ".$variaA." ELSE NULL END) AS a2017,
COUNT(distinct CASE extract(year from exportacion.fnum) WHEN '2018' THEN  ".$variaA." ELSE NULL END) AS a2018,
COUNT(distinct CASE extract(year from exportacion.fnum) WHEN '2019' THEN  ".$variaA." ELSE NULL END) AS a2019
FROM exportacion
/*LEFT JOIN arancel ON exportacion.part_nandi = arancel.idarancel*/
WHERE exportacion.cpaides = '".$paiscode."' AND
extract(year from exportacion.fnum) >= '2012' AND
extract(year from exportacion.fnum) <= '2019' AND SUBSTRING(exportacion.ubigeo,1,2) like '%$flatcod' GROUP BY exportacion.part_nandi/*,arancel.descripcion*/ ";
  }
	
/*$resultado_rpt = pg_query($query_resultado) or die("Error en la Consulta SQL Reporte");
	  $numReg_rpt = pg_num_rows($resultado_rpt);
	  if($numReg_rpt>0){*/
	$resultado_rpt=$conexpg->query($query_resultado); 
if($resultado_rpt->num_rows>0){ 
		  
echo"<div class='col-md-12'>";
        echo"<div class='card'>";
	echo"<div class='card-header card-header-info card-header-icon'>
              <div class='card-icon'>
                <i class='material-icons'>assignment</i>
              </div>
              <h4 class='card-title'><b>Reporte Mercado Evolucion Mensual de Exportaciones</b><br> Mercado: $paisname │ Departamento: $namedepa1 │ Indicador #1: $combo - Variable #2: $combo2 │ Fecha Numeracion │ Periodo 2012 - 2019 </b> </h4>
            </div>";
		echo"<div class='card-body'>";
		echo"<div class='toolbar'>
		<a href='#mer'><button class='btn btn-info btn-sm'> Ver Cuadro Estadístico </button></a>
                  </div>";
         echo"<div class='material-datatables'>";
		echo"<table id='datatables' class='table table-striped table-no-bordered table-hover' cellspacing='0' width='100%' style='width:100%'>";
		  echo"<thead>
                          <tr>
                              <th>Partida</th>
							  <th>Detalle</th>
							  <th>2012</th>
                              <th>2013</th>
                              <th>2014</th>
                              <th>2015</th>
                              <th>2016</th>
							  <th>2017</th>
							  <th>2018</th>
							  <th>2019</th>
							  <th>Var.%18/17</th>
							  <th>Par.%18</th>
                          </tr>
                      </thead>";
		 echo"<tfoot>
                          <tr>
						      <th>Partida</th>
							  <th>Detalle</th>
							  <th>2012</th>
                              <th>2013</th>
                              <th>2014</th>
                              <th>2015</th>
                              <th>2016</th>
							  <th>2017</th>
							  <th>2018</th>
							  <th>2019</th>
							  <th>Var.%18/17</th>
							  <th>Par.%18</th>
                          </tr>
                      </tfoot>";
           echo"<tbody>";
//while ($fila_rpt=pg_fetch_array($resultado_rpt)) {
	while($fila_rpt=$resultado_rpt->fetch_array()){
	$cuenta = $cuenta + 1;
		   $codigotemp= $fila_rpt['part_nandi'];
		//$nombredesc= $fila_rpt['descripcion'];
		
		$cupar = strlen($codigotemp);
		if($cupar=='9'){
			$codigotemp= '0'.$fila_rpt['part_nandi'];
		}else{
			$codigotemp= $fila_rpt['part_nandi'];
		}
		
		//consultamos ARANCEL descripcion de la partida
		$sqlu="select descripcion from arancel where idarancel='$codigotemp' "; 
$queryu=$conexpg->query($sqlu); 
if($queryu->num_rows>0){ 
while($ruu=$queryu->fetch_array()){ 
	$nombredesc= $ruu['descripcion'];
}
}else{
	$nombredesc= "";
}

		   
		   if($nombres2=="diferen"){
			   $dife1A = $fila_rpt["x2012"];
			   $dife1B = $fila_rpt['xx2012'];
			   $dife2A = $fila_rpt['x2013'];
			   $dife2B = $fila_rpt['xx2013'];
			   $dife3A = $fila_rpt['x2014'];
			   $dife3B = $fila_rpt['xx2014'];
			   $dife4A = $fila_rpt['x2015'];
			   $dife4B = $fila_rpt['xx2015'];
			   $dife5A = $fila_rpt['x2016'];
			   $dife5B = $fila_rpt['xx2016'];
			   $dife6A = $fila_rpt['x2016'];
			   $dife6B = $fila_rpt['xx2016'];
			   $dife7A = $fila_rpt['x2017'];
			   $dife7B = $fila_rpt['xx2017'];
			   $dife8A = $fila_rpt['x2018'];
			   $dife8B = $fila_rpt['xx2018'];
			   if($dife1B=='0'){
				   $year3= "0.00";
			   }else{ 
			   $year3= number_format($dife1A / $dife1B,2); 
			   }
			   if($dife2B=='0'){
				   $year4= "0.00";
			   }else{ $year4= number_format($dife2A / $dife2B,2); }
			   
			   if($dife3B=='0'){
				   $year5= "0.00";
			   }else{ $year5= number_format($dife3A / $dife3B,2); }
			   
			   if($dife4B=='0'){
				   $year6= "0.00";
			   }else{ $year6= number_format($dife4A / $dife4B,2); }
			   
			   if($dife5B=='0'){
				   $year7= "0.00";  
			   }else{ $year7= number_format($dife5A / $dife5B,2); }
			   if($dife6B=='0'){
				   $year8= "0.00";  
			   }else{ $year8= number_format($dife6A / $dife6B,2); }
			   if($dife7B=='0'){
				   $year9= "0.00";  
			   }else{ $year9= number_format($dife7A / $dife7B,2); }
			   if($dife8B=='0'){
				   $year10= "0.00";  
			   }else{ $year10= number_format($dife8A / $dife8B,2); }
			   
		   }else{
		  $year3= $fila_rpt['a2012'];
		  $year4= $fila_rpt['a2013'];
		  $year5= $fila_rpt['a2014'];
		  $year6= $fila_rpt['a2015'];
		  $year7= $fila_rpt['a2016'];
		  $year8= $fila_rpt['a2017'];
		  $year9= $fila_rpt['a2018'];
			   $year10= $fila_rpt['a2019'];
		   }
		  
		  if($year8=='0'){
		  $var11 ='0.00';
		  }else{
		  $var11 = number_format((($year9 / $year8) - 1) * 100,2);
		  }
	
	$var33= number_format(($year9 / $sumatotal2018)*100,2);

	if($axe=='SI' and $_SESSION['rol']=='ADMIN'){//si es administrador
		  echo "<tr>";
echo "<td>$codigotemp</td>";
echo "<td>$nombredesc</td>";
echo "<td>$year3</td>";
echo "<td>$year4</td>";
echo "<td>$year5</td>";
echo "<td>$year6</td>";
echo "<td>$year7</td>";
echo "<td>$year8</td>";
echo "<td>$year9</td>";
		echo "<td>$year10</td>";
echo "<td>$var11%</td>";
		echo "<td>$var33%</td>";
 echo "</tr>";
		}else if($axe=='NO' and $_SESSION['rol']<>'ADMIN'){//No tiene pago y no es admin
		if($cuenta<='5'){
		 echo "<tr>";
echo "<td>$codigotemp</td>";
echo "<td>$nombredesc</td>";
echo "<td>$year3</td>";
echo "<td>$year4</td>";
echo "<td>$year5</td>";
echo "<td>$year6</td>";
echo "<td>$year7</td>";
echo "<td>$year8</td>";
echo "<td>$year9</td>";
			echo "<td>$year10</td>";
echo "<td>$var11%</td>";
			echo "<td>$var33%</td>";
 echo "</tr>";
			}
	}else if($axe=='SI' and $_SESSION['rol']<>'ADMIN'){//Si tiene pago y no es admin
		echo "<tr>";
echo "<td>$codigotemp</td>";
echo "<td>$nombredesc</td>";
echo "<td>$year3</td>";
echo "<td>$year4</td>";
echo "<td>$year5</td>";
echo "<td>$year6</td>";
echo "<td>$year7</td>";
echo "<td>$year8</td>";
echo "<td>$year9</td>";
		echo "<td>$year10</td>";
echo "<td>$var11%</td>";
		echo "<td>$var33%</td>";
 echo "</tr>";
	}
		  
		  }
		  if($axe=='SI'){
		  echo"<thead>";
		  echo "<tr>";
		   echo "<th align='center' colspan='2'><b>Total:</b></th>";
		  echo "<th><b>".number_format($sumatotal2012,2)."</b></th>";
		   echo "<th><b>".number_format($sumatotal2013,2)."</b></th>";
		    echo "<th><b>".number_format($sumatotal2014,2)."</b></th>";
			 echo "<th><b>".number_format($sumatotal2015,2)."</b></th>";
			  echo "<th><b>".number_format($sumatotal2016,2)."</b></th>";
			  echo "<th><b>".number_format($sumatotal2017,2)."</b></th>";
		       echo "<th><b>".number_format($sumatotal2018,2)."</b></th>";
			  echo "<th><b>".number_format($sumatotal2019,2)."</b></th>";
			  echo "<th><b>$varitota %</b></th>";
			  echo "<th><b>$parti</b></th>";
		  echo "</tr>";
		   echo"</thead>";
			  }
	
		  echo"</tbody>";
		  echo"</table>";
		  echo"</div>";
		  echo"</div>";
		  echo"</div>";
		  echo"</div>";
		  
		   //echo "<a class='btn btn-success' href='rpt_excel/rpt_mdestino_Aanual_excel.php?dato=$partida1&option=$radiox&varia2=$anio'>Exportar Excel <img src='images/Excel-icon.png'></a>";
		   echo "</div></div></div>";
		   
		   ?>



<?php
		   
	  }
?>

<!-- cuadro estadistico -->
<style>
.chart {
  width: 100%; 
  min-height: 450px;
}
</style>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawStacked);

function drawStacked() {
      var data = google.visualization.arrayToDataTable([
        ['City', '2012', '2013', '2014', '2015', '2016', '2017', '2018', '2019'],
<?php 
if($nombres2=="vfobserdol" or $nombres2=="vpesnet" or $nombres2=="vpesbru" or $nombres2=="qunifis" or $nombres2=="qunicom"){
   $query_resultado = "SELECT
exportacion.part_nandi,
/*arancel.descripcion,*/
Sum(CASE ".$filtrofecha." WHEN '2012' THEN ".$nombres2." ELSE 0 END) AS a2012,
Sum(CASE ".$filtrofecha." WHEN '2013' THEN ".$nombres2." ELSE 0 END) AS a2013,
Sum(CASE ".$filtrofecha." WHEN '2014' THEN ".$nombres2." ELSE 0 END) AS a2014,
Sum(CASE ".$filtrofecha." WHEN '2015' THEN ".$nombres2." ELSE 0 END) AS a2015,
Sum(CASE ".$filtrofecha." WHEN '2016' THEN ".$nombres2." ELSE 0 END) AS a2016,
Sum(CASE ".$filtrofecha." WHEN '2017' THEN ".$nombres2." ELSE 0 END) AS a2017,
Sum(CASE ".$filtrofecha." WHEN '2018' THEN ".$nombres2." ELSE 0 END) AS a2018,
Sum(CASE ".$filtrofecha." WHEN '2019' THEN ".$nombres2." ELSE 0 END) AS a2019
FROM exportacion
/*LEFT JOIN arancel ON exportacion.part_nandi = arancel.idarancel*/
WHERE exportacion.cpaides = '".$paiscode."' AND ".$wherefecha." AND SUBSTRING(exportacion.ubigeo,1,2) like '%$flatcod'
GROUP BY exportacion.part_nandi/*,arancel.descripcion*/ ORDER BY a2018 DESC LIMIT 5";
  }else if ($nombres2=="diferen"){
	  $query_resultado = "SELECT
exportacion.part_nandi,
/*arancel.descripcion,*/
Sum(CASE ".$filtrofecha." WHEN '2012' THEN exportacion.vfobserdol ELSE 0 END) AS x2012,
Sum(CASE ".$filtrofecha." WHEN '2012' THEN exportacion.vpesnet ELSE 0 END) AS xx2012,
Sum(CASE ".$filtrofecha." WHEN '2013' THEN exportacion.vfobserdol ELSE 0 END) AS x2013,
Sum(CASE ".$filtrofecha." WHEN '2013' THEN exportacion.vpesnet ELSE 0 END) AS xx2013,
Sum(CASE ".$filtrofecha." WHEN '2014' THEN exportacion.vfobserdol ELSE 0 END) AS x2014,
Sum(CASE ".$filtrofecha." WHEN '2014' THEN exportacion.vpesnet ELSE 0 END) AS xx2014,
Sum(CASE ".$filtrofecha." WHEN '2015' THEN exportacion.vfobserdol ELSE 0 END) AS x2015,
Sum(CASE ".$filtrofecha." WHEN '2015' THEN exportacion.vpesnet ELSE 0 END) AS xx2015,
Sum(CASE ".$filtrofecha." WHEN '2016' THEN exportacion.vfobserdol ELSE 0 END) AS x2016,
Sum(CASE ".$filtrofecha." WHEN '2016' THEN exportacion.vpesnet ELSE 0 END) AS xx2016
Sum(CASE ".$filtrofecha." WHEN '2017' THEN exportacion.vfobserdol ELSE 0 END) AS x2017,
Sum(CASE ".$filtrofecha." WHEN '2017' THEN exportacion.vpesnet ELSE 0 END) AS xx2017,
Sum(CASE ".$filtrofecha." WHEN '2018' THEN exportacion.vfobserdol ELSE 0 END) AS x2018,
Sum(CASE ".$filtrofecha." WHEN '2018' THEN exportacion.vpesnet ELSE 0 END) AS xx2018,
Sum(CASE ".$filtrofecha." WHEN '2019' THEN exportacion.vfobserdol ELSE 0 END) AS x2019,
Sum(CASE ".$filtrofecha." WHEN '2019' THEN exportacion.vpesnet ELSE 0 END) AS xx2019
FROM exportacion
/*LEFT JOIN arancel ON exportacion.part_nandi = arancel.idarancel*/
WHERE exportacion.cpaides = '".$paiscode."' AND ".$wherefecha." AND SUBSTRING(exportacion.ubigeo,1,2) like '%$flatcod' GROUP BY exportacion.part_nandi/*,arancel.descripcion*/ ORDER BY xx2018 DESC LIMIT 5";
  }else if($nombres2=="total"){
	  $query_resultado = "SELECT
exportacion.part_nandi,
/*arancel.descripcion,*/
Sum(CASE ".$filtrofecha." WHEN '2012' THEN 1 ELSE 0 END) AS a2012,
Sum(CASE ".$filtrofecha." WHEN '2013' THEN 1 ELSE 0 END) AS a2013,
Sum(CASE ".$filtrofecha." WHEN '2014' THEN 1 ELSE 0 END) AS a2014,
Sum(CASE ".$filtrofecha." WHEN '2015' THEN 1 ELSE 0 END) AS a2015,
Sum(CASE ".$filtrofecha." WHEN '2016' THEN 1 ELSE 0 END) AS a2016,
Sum(CASE ".$filtrofecha." WHEN '2017' THEN 1 ELSE 0 END) AS a2017,
Sum(CASE ".$filtrofecha." WHEN '2018' THEN 1 ELSE 0 END) AS a2018,
Sum(CASE ".$filtrofecha." WHEN '2019' THEN 1 ELSE 0 END) AS a2019
FROM exportacion
/*LEFT JOIN arancel ON exportacion.part_nandi = arancel.idarancel*/
WHERE exportacion.cpaides = '".$paiscode."' AND
".$wherefecha." AND SUBSTRING(exportacion.ubigeo,1,2) like '%$flatcod' GROUP BY exportacion.part_nandi/*,arancel.descripcion*/ ORDER BY a2018 DESC LIMIT 5";
  } else if($nombres2=="part_nandi" or $nombres2=="ndcl" or $nombres2=="dnombre" or $nombres2=="cpaides" or $nombres2=="cpuedes" or  $nombres2=="cadu" or $nombres2=="cage" or $nombres2=="cviatra"){
	  $query_resultado = "SELECT
exportacion.part_nandi,
/*arancel.descripcion,*/
COUNT(distinct CASE ".$filtrofecha." WHEN '2012' THEN  exportacion.".$nombres2." ELSE NULL END) AS a2012,
COUNT(distinct CASE ".$filtrofecha." WHEN '2013' THEN  exportacion.".$nombres2." ELSE NULL END) AS a2013,
COUNT(distinct CASE ".$filtrofecha." WHEN '2014' THEN  exportacion.".$nombres2." ELSE NULL END) AS a2014,
COUNT(distinct CASE ".$filtrofecha." WHEN '2015' THEN  exportacion.".$nombres2." ELSE NULL END) AS a2015,
COUNT(distinct CASE ".$filtrofecha." WHEN '2016' THEN  exportacion.".$nombres2." ELSE NULL END) AS a2016,
COUNT(distinct CASE ".$filtrofecha." WHEN '2017' THEN  exportacion.".$nombres2." ELSE NULL END) AS a2017,
COUNT(distinct CASE ".$filtrofecha." WHEN '2018' THEN  exportacion.".$nombres2." ELSE NULL END) AS a2018,
COUNT(distinct CASE ".$filtrofecha." WHEN '2019' THEN  exportacion.".$nombres2." ELSE NULL END) AS a2019
FROM
exportacion
/*LEFT JOIN arancel ON exportacion.part_nandi = arancel.idarancel*/
WHERE exportacion.cpaides = '".$paiscode."' AND ".$wherefecha." AND SUBSTRING(exportacion.ubigeo,1,2) like '%$flatcod' GROUP BY exportacion.part_nandi/*,arancel.descripcion*/ ORDER BY a2018 DESC LIMIT 5";
  }else{
	  if($nombres2=="depa"){
		  $variaA='substring(exportacion.ubigeo,1,2)';
	  }else if($nombres2=="provi"){
		  $variaA='substring(exportacion.ubigeo,3,2)';
	  }else{
		  $variaA='substring(exportacion.ubigeo,5,2)';
	  }
	  $query_resultado = "SELECT
exportacion.part_nandi,
/*arancel.descripcion,*/
COUNT(distinct CASE ".$filtrofecha." WHEN '2012' THEN  ".$variaA." ELSE NULL END) AS a2012,
COUNT(distinct CASE ".$filtrofecha." WHEN '2013' THEN  ".$variaA." ELSE NULL END) AS a2013,
COUNT(distinct CASE ".$filtrofecha." WHEN '2014' THEN  ".$variaA." ELSE NULL END) AS a2014,
COUNT(distinct CASE ".$filtrofecha." WHEN '2015' THEN  ".$variaA." ELSE NULL END) AS a2015,
COUNT(distinct CASE ".$filtrofecha." WHEN '2016' THEN  ".$variaA." ELSE NULL END) AS a2016,
COUNT(distinct CASE ".$filtrofecha." WHEN '2017' THEN  ".$variaA." ELSE NULL END) AS a2017,
COUNT(distinct CASE ".$filtrofecha." WHEN '2018' THEN  ".$variaA." ELSE NULL END) AS a2018,
COUNT(distinct CASE ".$filtrofecha." WHEN '2019' THEN  ".$variaA." ELSE NULL END) AS a2019
FROM exportacion
/*LEFT JOIN arancel ON exportacion.part_nandi = arancel.idarancel*/
WHERE exportacion.cpaides = '".$paiscode."' AND
".$wherefecha." AND SUBSTRING(exportacion.ubigeo,1,2) like '%$flatcod' GROUP BY exportacion.part_nandi/*,arancel.descripcion*/ ORDER BY a2018 DESC LIMIT 5";
  }
	$resultado_rpt=$conexpg->query($query_resultado); 
if($resultado_rpt->num_rows>0){ 
while($fila_rpt=$resultado_rpt->fetch_array()){
		   $codigotemp= $fila_rpt['part_nandi'];
		   //$nombredesc= $fila_rpt['descripcion'];
	
	//consultamos ARANCEL descripcion de la partida
		$sqlux="select descripcion from arancel where idarancel='$codigotemp' "; 
$queryux=$conexpg->query($sqlux); 
if($queryux->num_rows>0){ 
while($ruux=$queryux->fetch_array()){ 
	$nombredesc= $ruux['descripcion'];
}
}else{
	$nombredesc= "";
}
		   
		   if($nombres2=="diferen"){
			   $dife1A = $fila_rpt["x2012"];
			   $dife1B = $fila_rpt['xx2012'];
			   $dife2A = $fila_rpt['x2013'];
			   $dife2B = $fila_rpt['xx2013'];
			   $dife3A = $fila_rpt['x2014'];
			   $dife3B = $fila_rpt['xx2014'];
			   $dife4A = $fila_rpt['x2015'];
			   $dife4B = $fila_rpt['xx2015'];
			   $dife5A = $fila_rpt['x2016'];
			   $dife5B = $fila_rpt['xx2016'];
			   $dife6A = $fila_rpt['x2017'];
			   $dife6B = $fila_rpt['xx2017'];
			   $dife7A = $fila_rpt['x2018'];
			   $dife7B = $fila_rpt['xx2018'];
			   $dife8A = $fila_rpt['x2019'];
			   $dife8B = $fila_rpt['xx2019'];
			   
			   if($dife1B=='0'){
				   $year3= "0.00";
			   }else{ 
			   $year3= number_format($dife1A / $dife1B,2); 
			   }
			   if($dife2B=='0'){
				   $year4= "0.00";
			   }else{ $year4= number_format($dife2A / $dife2B,2); }
			   
			   if($dife3B=='0'){
				   $year5= "0.00";
			   }else{ $year5= number_format($dife3A / $dife3B,2); }
			   
			   if($dife4B=='0'){
				   $year6= "0.00";
			   }else{ $year6= number_format($dife4A / $dife4B,2); }
			   
			   if($dife5B=='0'){
				   $year7= "0.00";  
			   }else{ $year7= number_format($dife5A / $dife5B,2); }
			   
			   if($dife6B=='0'){
				   $year8= "0.00";  
			   }else{ $year8= number_format($dife6A / $dife6B,2); }
			   
			   if($dife7B=='0'){
				   $year9= "0.00";  
			   }else{ $year9= number_format($dife7A / $dife7B,2); }
			   
			   if($dife8B=='0'){
				   $year10= "0.00";  
			   }else{ $year10= number_format($dife8A / $dife8B,2); }
			   
		   }else{
		  $year3= $fila_rpt['a2012'];
		  $year4= $fila_rpt['a2013'];
		  $year5= $fila_rpt['a2014'];
		  $year6= $fila_rpt['a2015'];
		  $year7= $fila_rpt['a2016'];
		  $year8= $fila_rpt['a2017'];
		  $year9= $fila_rpt['a2018'];
		  $year10= $fila_rpt['a2019'];
		   }	 
?>
['<?php echo $nombredesc ?>', <?php echo $year3 ?>, <?php echo $year4 ?>, <?php echo $year5 ?>, <?php echo $year6 ?>, <?php echo $year7 ?>, <?php echo $year8 ?>, <?php echo $year9 ?>, <?php echo $year10 ?>],
<?php
		  }
		  
	  }
?>

      ]);

      var options = {
        title: 'Empresa: <?php echo $paisname ?> -Departamento: <?=$namedepa1;?> - Evolución Mensual <?php echo $combo ?> - <?php echo $combo2 ?> de Exportaciones',
        chartArea: {width: '50%'},
        isStacked: true,
        hAxis: {
          title: 'Ranking 5 Primeros',
          minValue: 0,
        },
        vAxis: {
          title: 'Partidas'
        }
      };
      var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    }
    </script>
    
    <div class="col-md-12 ml-auto mr-auto" id="mer">
    <div id="chart_div" class="chart"></div>
    <br>
          
          </div>
    <?php include("../../footer_pie.php"); ?>
<!-- fin cuadro estadistico -->

<?php

}//fin consulta como variable partidas exportadas
				
if($nombres3=="puerto"){//consulta como variable puertos de ingreso
include("mercado_evoanualA.php");
}

if($nombres3=="empresaexpo"){//consulta como variable empresas exportadoras
include("mercado_evoanualB.php");
}

if($nombres3=="ubigeo"){//consulta como variable pais
include("mercado_evoanualC.php");
}

if($nombres3=="agente"){
	include("mercado_evoanualD.php");
}
  
  if($nombres3=="aduanas"){
 include("mercado_evoanualE.php");
  }
				?>
           
            </div>
            </div>
        </div>
        </div>
        </div>


</body>

    <!--   Core JS Files   -->
<script src="../../js/core/jquery.min.js"></script>
<script src="../../js/core/popper.min.js"></script>


<script src="../../js/bootstrap-material-design.min.js"></script>


<script src="../../js/plugins/perfect-scrollbar.jquery.min.js"></script>



<!--  Google Maps Plugin  -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2Yno10-YTnLjjn_Vtk0V8cdcY5lC4plU"></script>


<!--  Plugin for Date Time Picker and Full Calendar Plugin  -->
<script src="../../js/plugins/moment.min.js"></script>

<!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
<script src="../../js/plugins/bootstrap-datetimepicker.min.js"></script>

<!--	Plugin for the Sliders, full documentation here: https://refreshless.com/nouislider/ -->
<script src="../../js/plugins/nouislider.min.js"></script>



<!--	Plugin for Select, full documentation here: https://silviomoreto.github.io/bootstrap-select -->
<script src="../../js/plugins/bootstrap-selectpicker.js"></script>

<!--	Plugin for Tags, full documentation here: https://xoxco.com/projects/code/tagsinput/  -->
<script src="../../js/plugins/bootstrap-tagsinput.js"></script>

<!--	Plugin for Fileupload, full documentation here: https://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="../../js/plugins/jasny-bootstrap.min.js"></script>

<!-- Plugins for presentation and navigation  -->
<script src="../../assets-for-demo/js/modernizr.js"></script>




<!-- Material Kit Core initialisations of plugins and Bootstrap Material Design Library -->

<script src="../../js/material-dashboard.js?v=2.0.1"></script>



<!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>

<!-- Library for adding dinamically elements -->
<script src="../../js/plugins/arrive.min.js" type="text/javascript"></script>

<!-- Forms Validations Plugin -->
<script src="../../js/plugins/jquery.validate.min.js"></script>

<!--  Charts Plugin, full documentation here: https://gionkunz.github.io/chartist-js/ -->
<script src="../../js/plugins/chartist.min.js"></script>

<!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
<script src="../../js/plugins/jquery.bootstrap-wizard.js"></script>

<!--  Notifications Plugin, full documentation here: https://bootstrap-notify.remabledesigns.com/    -->
<script src="../../js/plugins/bootstrap-notify.js"></script>

<!-- Vector Map plugin, full documentation here: https://jvectormap.com/documentation/ -->
<script src="../../js/plugins/jquery-jvectormap.js"></script>

<!-- Sliders Plugin, full documentation here: https://refreshless.com/nouislider/ -->
<script src="../../js/plugins/nouislider.min.js"></script>

<!--  Plugin for Select, full documentation here: https://silviomoreto.github.io/bootstrap-select -->
<script src="../../js/plugins/jquery.select-bootstrap.js"></script>

<!--  DataTables.net Plugin, full documentation here: https://datatables.net/    -->
<script src="../../js/plugins/jquery.datatables.js"></script>

<!-- Sweet Alert 2 plugin, full documentation here: https://limonte.github.io/sweetalert2/ -->
<script src="../../js/plugins/sweetalert2.js"></script>

<!-- Plugin for Fileupload, full documentation here: https://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="../../js/plugins/jasny-bootstrap.min.js"></script>

<!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
<script src="../../js/plugins/fullcalendar.min.js"></script>

<!-- demo init -->
<script src="../../js/plugins/demo.js"></script>
 
    <!--<script type="text/javascript" src="../js/jsexport/jquery.dataTables.min.js"></script>-->
    <script type="text/javascript" src="../../js/jsexport/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="../../js/jsexport/buttons.flash.min.js"></script>
    <script type="text/javascript" src="../../js/jsexport/jszip.min.js"></script>
    <script type="text/javascript" src="../../js/jsexport/pdfmake.min.js"></script>
    <script type="text/javascript" src="../../js/jsexport/vfs_fonts.js"></script>
    <script type="text/javascript" src="../../js/jsexport/buttons.html5.min.js"></script>
    <script type="text/javascript" src="../../js/jsexport/buttons.print.min.js"></script>
  
  <script type="text/javascript">
$(document).ready(function() {
    $('#datatables').DataTable({
		"order": [[ 0, "asc" ]],
		dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        "pagingType": "full_numbers",
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "Todos"]
        ],
        responsive: true,
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Buscar resultados",
        }

    });
    var table = $('#datatables').DataTable();

    $('.card .material-datatables label').addClass('form-group');
});

</script>

  <script type="text/javascript">
    $().ready(function(){
        demo.checkFullPageBackgroundImage();

        setTimeout(function(){
            // after 1000 ms we add the class animated to the login/register card
            $('.card').removeClass('card-hidden');
        }, 700)
    });
</script>

<?php
//cerrando conexion
	mysqli_close($conexpg);
?>
</html>