<?php
session_start();
if (isset($_SESSION['login_usuario'])){
}else{
	if(!isset($_SESSION["login_usuario"]) || $_SESSION["login_usuario"]==null){
	//print "<script>alert('Acceso invalido! - Inicia Sesion para Acceder');window.location='$enlace_actual';</script>";
		//print "<script>window.location='../../';</script>";
		print "<script>alert('Acceso invalido! - Inicia Sesion para ver los resumenes');window.location='../../';</script>";
}
}
set_time_limit(750);
$paisname = $_POST["namempE"];
$paiscode = $_POST["codempE"];
$nombres2 = $_POST['condiciona'];

//si es un usuario basico y no tiene acceso
if($_SESSION['rol']=="BASICO"){
if($_SESSION['acceso_pago']=="No"){
	print "<script>alert('Acceso invalido! - Para ver los resumenes adquiere uno de nuestros planes Premiun');window.location='../../planes/';</script>";
}
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
       <script>
      window.onload = detectarCarga;
      function detectarCarga(){
         document.getElementById("carga").style.display="none";
      }
    </script>
        </head>
<body>
	<div id="carga" style="width:100%;text-align: center;">
<Center><img class="img-responsive" src="../../img/loading-carga.gif" width="100px"><br><p style="font-size:12px; color:#EC0D36;"> Espere un momento, la consulta puede tardar unos minutos. </p></Center>
     </div>
</body>
        <body class="off-canvas-sidebar register-page" style="background-image: url('../../img/plan.jpg'); background-size: cover; background-position: top center;">

    <div class="wrapper wrapper-full-page">
            <div class='col-md-12'>

            <?php
				include("../../incBD/inibd.php");
				

if(isset($_POST['condiciona'])){//inicia si hay datos

	$nombres2=$_POST['condiciona'];
  
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
	
	$tituradio='Fecha Numeraci&oacute;n';
		$opci1='opcion1';
		$filtrofecha='extract(year from exportacion.fnum)';
		$wherefecha ="extract(year from exportacion.fnum) >= '2012' AND
extract(year from exportacion.fnum) <= '2019'";
	
if($nombres2=="vfobserdol" or $nombres2=="vpesnet" or $nombres2=="vpesbru" or $nombres2=="qunifis" or $nombres2=="qunicom"){
   $sqlyear="SELECT 'vfobserdol' as vfob,
Sum(CASE ".$filtrofecha." WHEN '2012' THEN exportacion.". $nombres2." ELSE 0 END) AS a2012,
Sum(CASE ".$filtrofecha." WHEN '2013' THEN exportacion.". $nombres2." ELSE 0 END) AS a2013,
Sum(CASE ".$filtrofecha." WHEN '2014' THEN exportacion.". $nombres2." ELSE 0 END) AS a2014,
Sum(CASE ".$filtrofecha." WHEN '2015' THEN exportacion.". $nombres2." ELSE 0 END) AS a2015,
Sum(CASE ".$filtrofecha." WHEN '2016' THEN exportacion.". $nombres2." ELSE 0 END) AS a2016,
Sum(CASE ".$filtrofecha." WHEN '2017' THEN exportacion.". $nombres2." ELSE 0 END) AS a2017,
Sum(CASE ".$filtrofecha." WHEN '2018' THEN exportacion.". $nombres2." ELSE 0 END) AS a2018,
Sum(CASE ".$filtrofecha." WHEN '2019' THEN exportacion.". $nombres2." ELSE 0 END) AS a2019
FROM exportacion
WHERE ".$wherefecha." ";
  }
  if($nombres2=="total"){
	   $sqlyear="SELECT 'total' as tot,
Sum(CASE ".$filtrofecha." WHEN '2012' THEN 1 ELSE 0 END) AS a2012,
Sum(CASE ".$filtrofecha." WHEN '2013' THEN 1 ELSE 0 END) AS a2013,
Sum(CASE ".$filtrofecha." WHEN '2014' THEN 1 ELSE 0 END) AS a2014,
Sum(CASE ".$filtrofecha." WHEN '2015' THEN 1 ELSE 0 END) AS a2015,
Sum(CASE ".$filtrofecha." WHEN '2016' THEN 1 ELSE 0 END) AS a2016,
Sum(CASE ".$filtrofecha." WHEN '2017' THEN 1 ELSE 0 END) AS a2017,
Sum(CASE ".$filtrofecha." WHEN '2018' THEN 1 ELSE 0 END) AS a2018,
Sum(CASE ".$filtrofecha." WHEN '2019' THEN 1 ELSE 0 END) AS a2019
FROM exportacion
WHERE ".$wherefecha." ";
}
if($nombres2=="ndcl" or $nombres2=="dnombre" or $nombres2=="part_nandi" or $nombres2=="cpaides" or $nombres2=="cpuedes" or $nombres2=="cadu" or $nombres2=="cage" or $nombres2=="cviatra"){
	 $sqlyear="SELECT 'cuenta' as cuenta,
COUNT(DISTINCT CASE ".$filtrofecha." WHEN '2012' THEN exportacion.". $nombres2." ELSE Null END) AS a2012,
COUNT(DISTINCT CASE ".$filtrofecha." WHEN '2013' THEN exportacion.". $nombres2." ELSE Null END) AS a2013,
COUNT(DISTINCT CASE ".$filtrofecha." WHEN '2014' THEN exportacion.". $nombres2." ELSE Null END) AS a2014,
COUNT(DISTINCT CASE ".$filtrofecha." WHEN '2015' THEN exportacion.". $nombres2." ELSE Null END) AS a2015,
COUNT(DISTINCT CASE ".$filtrofecha." WHEN '2016' THEN exportacion.". $nombres2." ELSE Null END) AS a2016,
COUNT(DISTINCT CASE ".$filtrofecha." WHEN '2017' THEN exportacion.". $nombres2." ELSE Null END) AS a2017,
COUNT(DISTINCT CASE ".$filtrofecha." WHEN '2018' THEN exportacion.". $nombres2." ELSE Null END) AS a2018,
COUNT(DISTINCT CASE ".$filtrofecha." WHEN '2019' THEN exportacion.". $nombres2." ELSE Null END) AS a2019
FROM exportacion
WHERE ".$wherefecha." GROUP BY exportacion.ndoc, exportacion.dnombre";
}
if($nombres2=="diferen"){
	$sqlyear="SELECT
'diferencia' as dife,
Sum(CASE ".$filtrofecha." WHEN '2012' THEN exportacion.vfobserdol ELSE 0 END) AS  a2012,
Sum(CASE ".$filtrofecha." WHEN '2012' THEN exportacion.vpesnet ELSE 0 END) AS  a2012x,
Sum(CASE ".$filtrofecha." WHEN '2013' THEN exportacion.vfobserdol ELSE 0 END) AS a2013,
Sum(CASE ".$filtrofecha." WHEN '2013' THEN exportacion.vpesnet ELSE 0 END) AS a2013x,
Sum(CASE ".$filtrofecha." WHEN '2014' THEN exportacion.vfobserdol ELSE 0 END) AS a2014,
Sum(CASE ".$filtrofecha." WHEN '2014' THEN exportacion.vpesnet ELSE 0 END) AS a2014x,
Sum(CASE ".$filtrofecha." WHEN '2015' THEN exportacion.vfobserdol ELSE 0 END) AS a2015,
Sum(CASE ".$filtrofecha." WHEN '2015' THEN exportacion.vpesnet ELSE 0 END) AS a2015x,
Sum(CASE ".$filtrofecha." WHEN '2016' THEN exportacion.vfobserdol ELSE 0 END) AS a2016,
Sum(CASE ".$filtrofecha." WHEN '2016' THEN exportacion.vpesnet ELSE 0 END) AS a2016x,
Sum(CASE ".$filtrofecha." WHEN '2017' THEN exportacion.vfobserdol ELSE 0 END) AS a2017,
Sum(CASE ".$filtrofecha." WHEN '2017' THEN exportacion.vpesnet ELSE 0 END) AS a2017x,
Sum(CASE ".$filtrofecha." WHEN '2018' THEN exportacion.vfobserdol ELSE 0 END) AS a2018,
Sum(CASE ".$filtrofecha." WHEN '2018' THEN exportacion.vpesnet ELSE 0 END) AS a2018x,
Sum(CASE ".$filtrofecha." WHEN '2019' THEN exportacion.vfobserdol ELSE 0 END) AS a2019,
Sum(CASE ".$filtrofecha." WHEN '2019' THEN exportacion.vpesnet ELSE 0 END) AS a2019x
FROM exportacion
WHERE ".$wherefecha." GROUP BY exportacion.ndoc, exportacion.dnombre";
}
if($nombres2=="depa" or $nombres2=="provi" or $nombres2=="distri"){
	if($nombres2=="depa"){
		  $varia='substring(exportacion.ubigeo,1,2)';
	  }else if($nombres2=="provi"){
		  $varia='substring(exportacion.ubigeo,3,2)';
	  }else{
		  $varia='substring(exportacion.ubigeo,5,2)';
	  }
	$sqlyear="SELECT 'depart' as depart,
COUNT(distinct CASE ".$filtrofecha." WHEN '2012' THEN ".$varia." ELSE NULL END) AS a2012,
COUNT(distinct CASE ".$filtrofecha." WHEN '2013' THEN ".$varia." ELSE NULL END) AS a2013,
COUNT(distinct CASE ".$filtrofecha." WHEN '2014' THEN ".$varia." ELSE NULL END) AS a2014,
COUNT(distinct CASE ".$filtrofecha." WHEN '2015' THEN ".$varia." ELSE NULL END) AS a2015,
COUNT(distinct CASE ".$filtrofecha." WHEN '2016' THEN ".$varia." ELSE NULL END) AS a2016,
COUNT(distinct CASE ".$filtrofecha." WHEN '2017' THEN ".$varia." ELSE NULL END) AS a2017,
COUNT(distinct CASE ".$filtrofecha." WHEN '2018' THEN ".$varia." ELSE NULL END) AS a2018,
COUNT(distinct CASE ".$filtrofecha." WHEN '2019' THEN ".$varia." ELSE NULL END) AS a2019
FROM exportacion
WHERE ".$wherefecha."
GROUP BY exportacion.ndoc, exportacion.dnombre";
}
	  /*$result_year= pg_query($sqlyear) or die("Error en la Consulta SQL Sumatoria Total");
	  $numReg_year = pg_num_rows($result_year);
	  if($numReg_year>0){
		   while ($fila_year=pg_fetch_array($result_year)) {*/
	$result_year=$conexpg->query($sqlyear); 
if($result_year->num_rows>0){ 
while($fila_year=$result_year->fetch_array()){
			  $difere= $fila_year['dife'];
			   $cuenta_x = $fila_year['cuenta'];
			   $depart_x = $fila_year['depart'];
			   
		   if($difere=="diferencia"){
			   
		   $sumatotal2012_x= $fila_year['a2012'];
		   if($sumatotal2012_x=='0'){
		   $sumatotal2012_a="0.00";
		   $sumatotal2012 = $sumatotal2012_a + $sumatotal2012;
		   }else{
			   $sum_totalfob1 = $fila_year['a2012'];
			   $sum_totalnet1 = $fila_year['a2012x'];
		   $sumatotal2012_a= $sum_totalfob1 / $sum_totalnet1;
		   $sumatotal2012= $sumatotal2012_a + $sumatotal2012;
		   }
		   
		   $sumatotal2013_x= $fila_year['a2013'];
		   if($sumatotal2013_x=='0'){
			    $sumatotal2013_a="0.00";
				$sumatotal2013 = $sumatotal2013_a + $sumatotal2013;
		   }else{
			   $sum_totalfob2 = $fila_year['a2013'];
			   $sum_totalnet2 = $fila_year['a2013x'];
		   $sumatotal2013_a= $sum_totalfob2 / $sum_totalnet2;
		   $sumatotal2013= $sumatotal2013_a + $sumatotal2013;
		   }
		   
		   $sumatotal2014_x= $fila_year['a2014'];
		   if($sumatotal2014_x=='0'){
			  $sumatotal2014_a="0.00";
			  $sumatotal2014 = $sumatotal2014_a + $sumatotal2014;
		   }else{
			   $sum_totalfob3 = $fila_year['a2014'];
			   $sum_totalnet3 = $fila_year['a2014x'];
		   $sumatotal2014_a= $sum_totalfob3 / $sum_totalnet3;
		   $sumatotal2014= $sumatotal2014_a + $sumatotal2014;
		   }
		   
		   $sumatotal2015_x= $fila_year['a2015'];
		   if($sumatotal2015_x=='0'){
			   $sumatotal2015_a="0.00";
			   $sumatotal2015 = $sumatotal2015_a + $sumatotal2015;
		   }else{
			   $sum_totalfob4 = $fila_year['a2015'];
			   $sum_totalnet4 = $fila_year['a2015x'];
		   $sumatotal2015_a= $sum_totalfob4 / $sum_totalnet4;
		   $sumatotal2015= $sumatotal2015_a + $sumatotal2015;
		   }
		   
		   $sumatotal2016_x= $fila_year['a2016'];
		   if($sumatotal2016_x=='0'){
			   $sumatotal2016_a="0.00";
			   $sumatotal2016 = $sumatotal2016_a + $sumatotal2016;
		   }else{
			   $sum_totalfob5 = $fila_year['a2016'];
			   $sum_totalnet5 = $fila_year['a2016x'];
		   $sumatotal2016_a= $sum_totalfob5 / $sum_totalnet5;
		   $sumatotal2016= $sumatotal2016_a + $sumatotal2016;
		   }
		   
		   $sumatotal2017_x= $fila_year['a2017'];
		   if($sumatotal2017_x=='0'){
			   $sumatotal2017_a="0.00";
			   $sumatotal2017 = $sumatotal2017_a + $sumatotal2017;
		   }else{
			   $sum_totalfob6 = $fila_year['a2017'];
			   $sum_totalnet6 = $fila_year['a2017x'];
		   $sumatotal2017_a= $sum_totalfob6 / $sum_totalnet6;
		   $sumatotal2017= $sumatotal2017_a + $sumatotal2017;
		   }
			   
		  $sumatotal2018_x= $fila_year['a2018'];
		   if($sumatotal2018_x=='0'){
			   $sumatotal2018_a="0.00";
			   $sumatotal2018 = $sumatotal2018_a + $sumatotal2018;
		   }else{
			   $sum_totalfob7 = $fila_year['a2018'];
			   $sum_totalnet7 = $fila_year['a2018x'];
		   $sumatotal2018_a= $sum_totalfob7 / $sum_totalnet7;
		   $sumatotal2018= $sumatotal2018_a + $sumatotal2018;
		   }
			   
			   $sumatotal2019_x= $fila_year['a2019'];
		   if($sumatotal2019_x=='0'){
			   $sumatotal2019_a="0.00";
			   $sumatotal2019 = $sumatotal2019_a + $sumatotal2019;
		   }else{
			   $sum_totalfob8 = $fila_year['a2019'];
			   $sum_totalnet8 = $fila_year['a2019x'];
		   $sumatotal2019_a= $sum_totalfob8 / $sum_totalnet8;
		   $sumatotal2019= $sumatotal2019_a + $sumatotal2019;
		   }
		   
		}else if($cuenta_x=='cuenta'){
				   $sumc1 =  $fila_year['a2012'];
				   $sumc2 =  $fila_year['a2013'];
				   $sumc3 =  $fila_year['a2014'];
				   $sumc4 =  $fila_year['a2015'];
				   $sumc5 =  $fila_year['a2016'];
				   $sumc6 =  $fila_year['a2017'];
			       $sumc7 =  $fila_year['a2018'];
			       $sumc8 =  $fila_year['a2019'];
		   $sumatotal2012= $sumc1 + $sumatotal2012;
		   $sumatotal2013= $sumc2 + $sumatotal2013;
		   $sumatotal2014= $sumc3 + $sumatotal2014;
		   $sumatotal2015= $sumc4 + $sumatotal2015;
		   $sumatotal2016= $sumc5 + $sumatotal2016;
		   $sumatotal2017= $sumc6 + $sumatotal2017;
		   $sumatotal2018= $sumc7 + $sumatotal2018;
		   $sumatotal2019= $sumc8 + $sumatotal2019;
		   }else if($depart_x=='depart'){
				   $sumc1x =  $fila_year['a2012'];
				   $sumc2x =  $fila_year['a2013'];
				   $sumc3x =  $fila_year['a2014'];
				   $sumc4x =  $fila_year['a2015'];
				   $sumc5x =  $fila_year['a2016'];
				   $sumc6x =  $fila_year['a2017'];
			       $sumc7x =  $fila_year['a2018'];
			       $sumc8x =  $fila_year['a2019'];
		   $sumatotal2012= $sumc1x + $sumatotal2012;
		   $sumatotal2013= $sumc2x + $sumatotal2013;
		   $sumatotal2014= $sumc3x + $sumatotal2014;
		   $sumatotal2015= $sumc4x + $sumatotal2015;
		   $sumatotal2016= $sumc5x + $sumatotal2016;
		   $sumatotal2017= $sumc6x + $sumatotal2017;
		   $sumatotal2018= $sumc7x + $sumatotal2018;
		   $sumatotal2019= $sumc8x + $sumatotal2019;
		   }else{
		   $sumatotal2012= $fila_year['a2012'];
		   $sumatotal2013= $fila_year['a2013'];
		   $sumatotal2014= $fila_year['a2014'];
		   $sumatotal2015= $fila_year['a2015'];
		   $sumatotal2016= $fila_year['a2016'];
		   $sumatotal2017= $fila_year['a2017'];
		   $sumatotal2018= $fila_year['a2018'];
		   $sumatotal2019= $fila_year['a2019'];
		   }
		   
		   if($sumatotal2017=='0'){
			   $varitota="0.00";
		   }else{
		   $varitota= number_format((($sumatotal2018 / $sumatotal2017) - 1) * 100,2);
		   }
		   $parti='100 %';
		   }
	  }else{
		  $sumatotal2012="0";
		  $sumatotal2013="0";
		  $sumatotal2014="0";
		  $sumatotal2015="0";
		  $sumatotal2016="0";
		  $sumatotal2017="0";
		  $sumatotal2018="0";
	      $sumatotal2019="0";
		  $varitota="0.00";
		  $parti="0.00";
	  }

  /* listamos el reporte */
  if($nombres2=="vfobserdol" or $nombres2=="vpesnet" or $nombres2=="vpesbru" or $nombres2=="qunifis" or $nombres2=="qunicom"){
   $query1 = "SELECT exportacion.ndoc,
exportacion.dnombre,
Sum(CASE ".$filtrofecha." WHEN '2012' THEN exportacion.". $nombres2." ELSE 0 END) AS a2012,
Sum(CASE ".$filtrofecha." WHEN '2013' THEN exportacion.". $nombres2." ELSE 0 END) AS a2013,
Sum(CASE ".$filtrofecha." WHEN '2014' THEN exportacion.". $nombres2." ELSE 0 END) AS a2014,
Sum(CASE ".$filtrofecha." WHEN '2015' THEN exportacion.". $nombres2." ELSE 0 END) AS a2015,
Sum(CASE ".$filtrofecha." WHEN '2016' THEN exportacion.". $nombres2." ELSE 0 END) AS a2016,
Sum(CASE ".$filtrofecha." WHEN '2017' THEN exportacion.". $nombres2." ELSE 0 END) AS a2017,
Sum(CASE ".$filtrofecha." WHEN '2018' THEN exportacion.". $nombres2." ELSE 0 END) AS a2018,
Sum(CASE ".$filtrofecha." WHEN '2019' THEN exportacion.". $nombres2." ELSE 0 END) AS a2019
FROM exportacion
WHERE ".$wherefecha."
GROUP BY exportacion.ndoc, exportacion.dnombre";
  }
  
  if($nombres2=="diferen"){
  $query1 = "SELECT exportacion.ndoc,
exportacion.dnombre,
Sum(CASE ".$filtrofecha." WHEN '2012' THEN exportacion.vfobserdol ELSE 0 END) AS a2012,
Sum(CASE ".$filtrofecha." WHEN '2012' THEN exportacion.vpesnet ELSE 0 END) AS a2012x,
Sum(CASE ".$filtrofecha." WHEN '2013' THEN exportacion.vfobserdol ELSE 0 END) AS a2013,
Sum(CASE ".$filtrofecha." WHEN '2013' THEN exportacion.vpesnet ELSE 0 END) AS a2013x,
Sum(CASE ".$filtrofecha." WHEN '2014' THEN exportacion.vfobserdol ELSE 0 END) AS a2014,
Sum(CASE ".$filtrofecha." WHEN '2014' THEN exportacion.vpesnet ELSE 0 END) AS a2014x,
Sum(CASE ".$filtrofecha." WHEN '2015' THEN exportacion.vfobserdol ELSE 0 END) AS a2015,
Sum(CASE ".$filtrofecha." WHEN '2015' THEN exportacion.vpesnet ELSE 0 END) AS a2015x,
Sum(CASE ".$filtrofecha." WHEN '2016' THEN exportacion.vfobserdol ELSE 0 END) AS a2016,
Sum(CASE ".$filtrofecha." WHEN '2016' THEN exportacion.vpesnet ELSE 0 END) AS a2016x,
Sum(CASE ".$filtrofecha." WHEN '2017' THEN exportacion.vfobserdol ELSE 0 END) AS a2017,
Sum(CASE ".$filtrofecha." WHEN '2017' THEN exportacion.vpesnet ELSE 0 END) AS a2017x,
Sum(CASE ".$filtrofecha." WHEN '2018' THEN exportacion.vfobserdol ELSE 0 END) AS a2018,
Sum(CASE ".$filtrofecha." WHEN '2018' THEN exportacion.vpesnet ELSE 0 END) AS a2018x,
Sum(CASE ".$filtrofecha." WHEN '2019' THEN exportacion.vfobserdol ELSE 0 END) AS a2019,
Sum(CASE ".$filtrofecha." WHEN '2019' THEN exportacion.vpesnet ELSE 0 END) AS a2019x
FROM exportacion
WHERE ".$wherefecha."
GROUP BY exportacion.ndoc, exportacion.dnombre";
  }
  
  if($nombres2=="total"){
 $query1 = "SELECT exportacion.ndoc,
exportacion.dnombre,
Sum(CASE ".$filtrofecha." WHEN '2012' THEN 1 ELSE 0 END) AS a2012,
Sum(CASE ".$filtrofecha." WHEN '2013' THEN 1 ELSE 0 END) AS a2013,
Sum(CASE ".$filtrofecha." WHEN '2014' THEN 1 ELSE 0 END) AS a2014,
Sum(CASE ".$filtrofecha." WHEN '2015' THEN 1 ELSE 0 END) AS a2015,
Sum(CASE ".$filtrofecha." WHEN '2016' THEN 1 ELSE 0 END) AS a2016,
Sum(CASE ".$filtrofecha." WHEN '2017' THEN 1 ELSE 0 END) AS a2017,
Sum(CASE ".$filtrofecha." WHEN '2018' THEN 1 ELSE 0 END) AS a2018,
Sum(CASE ".$filtrofecha." WHEN '2019' THEN 1 ELSE 0 END) AS a2019
FROM exportacion
WHERE ".$wherefecha."
GROUP BY exportacion.ndoc, exportacion.dnombre";
  }
  if($nombres2=="ndcl" or $nombres2=="dnombre" or $nombres2=="part_nandi" or $nombres2=="cpaides" or $nombres2=="cpuedes" or $nombres2=="cadu" or $nombres2=="cage" or $nombres2=="cviatra"){
  $query1 = "SELECT exportacion.ndoc,
exportacion.dnombre,
COUNT(DISTINCT CASE ".$filtrofecha." WHEN '2012' THEN exportacion.". $nombres2." ELSE NULL END) AS a2012,
COUNT(DISTINCT CASE ".$filtrofecha." WHEN '2013' THEN exportacion.". $nombres2." ELSE NULL END) AS a2013,
COUNT(DISTINCT CASE ".$filtrofecha." WHEN '2014' THEN exportacion.". $nombres2." ELSE NULL END) AS a2014,
COUNT(DISTINCT CASE ".$filtrofecha." WHEN '2015' THEN exportacion.". $nombres2." ELSE NULL END) AS a2015,
COUNT(DISTINCT CASE ".$filtrofecha." WHEN '2016' THEN exportacion.". $nombres2." ELSE NULL END) AS a2016,
COUNT(DISTINCT CASE ".$filtrofecha." WHEN '2017' THEN exportacion.". $nombres2." ELSE NULL END) AS a2017,
COUNT(DISTINCT CASE ".$filtrofecha." WHEN '2018' THEN exportacion.". $nombres2." ELSE NULL END) AS a2018,
COUNT(DISTINCT CASE ".$filtrofecha." WHEN '2019' THEN exportacion.". $nombres2." ELSE NULL END) AS a2019
FROM exportacion
WHERE ".$wherefecha."
GROUP BY exportacion.ndoc, exportacion.dnombre";
  }
   if($nombres2=="depa" or $nombres2=="provi" or $nombres2=="distri"){
	    if($nombres2=="depa"){
		  $variaA='substring(exportacion.ubigeo,1,2)';
	  }else if($nombres2=="provi"){
		  $variaA='substring(exportacion.ubigeo,3,2)';
	  }else{
		  $variaA='substring(exportacion.ubigeo,5,2)';
	  }
  $query1 = "SELECT exportacion.ndoc,
exportacion.dnombre,
COUNT(distinct CASE ".$filtrofecha." WHEN '2012' THEN ".$variaA." ELSE NULL END) AS a2012,
COUNT(distinct CASE ".$filtrofecha." WHEN '2013' THEN ".$variaA." ELSE NULL END) AS a2013,
COUNT(distinct CASE ".$filtrofecha." WHEN '2014' THEN ".$variaA." ELSE NULL END) AS a2014,
COUNT(distinct CASE ".$filtrofecha." WHEN '2015' THEN ".$variaA." ELSE NULL END) AS a2015,
COUNT(distinct CASE ".$filtrofecha." WHEN '2016' THEN ".$variaA." ELSE NULL END) AS a2016,
COUNT(distinct CASE ".$filtrofecha." WHEN '2017' THEN ".$variaA." ELSE NULL END) AS a2017,
COUNT(distinct CASE ".$filtrofecha." WHEN '2018' THEN ".$variaA." ELSE NULL END) AS a2018,
COUNT(distinct CASE ".$filtrofecha." WHEN '2019' THEN ".$variaA." ELSE NULL END) AS a2019
FROM exportacion
LEFT JOIN departamento ON substring(exportacion.ubigeo,1,2) = departamento.iddepartamento
WHERE ".$wherefecha."
GROUP BY exportacion.ndoc, exportacion.dnombre";
  }

	  /*$resultado1 = pg_query($query1) or die("Error en la Consulta SQL");
	  $numReg = pg_num_rows($resultado1);
	  if($numReg>0){*/
	$resultado1=$conexpg->query($query1); 
if($resultado1->num_rows>0){ 
		  
		  echo"<div class='card'>";
	echo"<div class='card-header card-header-info card-header-icon'>
              <div class='card-icon'>
                <i class='material-icons'>assignment</i>
              </div>
              <h4 class='card-title'><b>Reporte Resumen Anual de Indicadores</b><br> Empresas #: Todos │ Fecha Numeracion │ $combo │ Periodo 2012 - 2019 </b> </h4>
            </div>";
		echo"<div class='card-body'>";
		echo"<div class='toolbar'>";
        echo"</div>";
         echo"<div class='material-datatables'>";
		echo"<table id='datatablese' class='table table-striped table-no-bordered table-hover' cellspacing='0' width='100%' style='width:100%'>";
		echo"<thead>
                          <tr>
                              <th><b> N#. Ruc </b></th>
							  <th><b>Empresas</b></th>
                              <th>2012</th>
                              <th>2013</th>
                              <th>2014</th>
                              <th>2015</th>
							  <th>2016</th>
							  <th>2017</th>
							  <th>2018</th>
							  <th>2019</th>
							  <th>Var.%18/17</th>
							  <th>Var.%18</th>
                          </tr>
                      </thead>";
		 echo"<tfoot>
                          <tr>
                              <th><b> N#. Ruc </b></th>
							  <th><b>Empresas</b></th>
                              <th>2012</th>
                              <th>2013</th>
                              <th>2014</th>
                              <th>2015</th>
							  <th>2016</th>
							  <th>2017</th>
							  <th>2018</th>
							  <th>2019</th>
							  <th>Var.%18/17</th>
							  <th>Var.%18</th>
                          </tr>
                      </tfoot>";
           echo"<tbody>";
		  
		  //while ($fila1=pg_fetch_array($resultado1)) {
			  while($fila1=$resultado1->fetch_array()){
          $cod_emp= $fila1['ndoc'];
		  $nom_empx= $fila1['dnombre'];
		  
		  if($nom_empx==""){
		    $nom_emp="-----";
			  }else{
          $nom_emp= $fila1['dnombre'];
			  }
			  
	      if($nombres2=="diferen"){
			   $dife1A = $fila1["a2012"];
			   $dife1B = $fila1['a2012x'];
			   $dife2A = $fila1['a2013'];
			   $dife2B = $fila1['a2013x'];
			   $dife3A = $fila1['a2014'];
			   $dife3B = $fila1['a2014x'];
			   $dife4A = $fila1['a2015'];
			   $dife4B = $fila1['a2015x'];
			   $dife5A = $fila1['a2016'];
			   $dife5B = $fila1['a2016x'];
			   $dife6A = $fila1['a2017'];
			   $dife6B = $fila1['a2017x'];
			   $dife7A = $fila1['a2018'];
			   $dife7B = $fila1['a2018x'];
			   $dife8A = $fila1['a2019'];
			   $dife8B = $fila1['a2019x'];
			  
			   if($dife1B=='0'){
				   $year1= "0.00";
			   }else{ 
			   $year1= number_format($dife1A / $dife1B,2); 
			   }
			   if($dife2B=='0'){
				   $year2= "0.00";
			   }else{ $year2= number_format($dife2A / $dife2B,2); }
			   
			   if($dife3B=='0'){
				   $year3= "0.00";
			   }else{ $year3= number_format($dife3A / $dife3B,2); }
			   
			   if($dife4B=='0'){
				   $year4= "0.00";
			   }else{ $year4= number_format($dife4A / $dife4B,2); }
			   
			   if($dife5B=='0'){
				   $year5= "0.00";  
			   }else{ $year5= number_format($dife5A / $dife5B,2); }
			   
			   if($dife6B=='0'){
				   $year6= "0.00";  
			   }else{ $year6= number_format($dife6A / $dife6B,2); }
			  
			  if($dife7B=='0'){
				   $year7= "0.00";  
			   }else{ $year7= number_format($dife7A / $dife7B,2); }
			  
			  if($dife8B=='0'){
				   $year8= "0.00";  
			   }else{ $year8= number_format($dife8A / $dife8B,2); }
			   
		   }else{
		  $year1= $fila1['a2012'];
		  $year2= $fila1['a2013'];
		  $year3= $fila1['a2014'];
		  $year4= $fila1['a2015'];
		  $year5= $fila1['a2016'];
		  $year6= $fila1['a2017'];
		  $year7= $fila1['a2018'];
		  $year8= $fila1['a2019'];
		   }
		 
		if($year6=='0'){
		  $var11 ='0';
		  }else{
		  $var11 = number_format((($year7 / $year6) - 1) * 100,2);
		  }
		  
		if($sumatotal2018=="0"){
			  $var22 ="0.00";
		  }else{
		  $var22 = number_format(($year7 / $sumatotal2018) * 100,2);
		  }
		  
		  
		   echo "<tr>";
echo "<td>$cod_emp</td>";
echo "<td>$nom_emp</td>";
echo "<td>$year1</td>";
echo "<td>$year2</td>";
echo "<td>$year3</td>";
echo "<td>$year4</td>";
echo "<td>$year5</td>";
echo "<td>$year6</td>";
echo "<td>$year7</td>";
echo "<td>$year8</td>";
echo "<td>$var11%</td>";
echo "<td>$var22%</td>";
 echo "</tr>";

			  
		  }
echo"<thead>";
		  echo "<tr>";
		   echo "<th> </th>";
		  echo "<th><b>Total:</b></th>";
		  echo "<th><font size='2'><b>".number_format($sumatotal2012,2)."</b></font></th>";
		   echo "<th><font size='2'><b>".number_format($sumatotal2013,2)."</b></font></th>";
		    echo "<th><font size='2'><b>".number_format($sumatotal2014,2)."</b></font></th>";
			 echo "<th><font size='2'><b>".number_format($sumatotal2015,2)."</b></font></th>";
			  echo "<th><font size='2'><b>".number_format($sumatotal2016,2)."</b></font></th>";
			  echo "<th><font size='2'><b>".number_format($sumatotal2017,2)."</b></font></th>";
		       echo "<th><font size='2'><b>".number_format($sumatotal2018,2)."</b></font></th>";
	           echo "<th><font size='2'><b>".number_format($sumatotal2019,2)."</b></font></th>";
			  echo "<th><font size='2'><b>$varitota %</b></font></th>";
			  echo "<th><font size='2'><b>$parti</b></font></th>";
		  echo "</tr>";
		  echo"</thead>";
		  echo"</tbody>";
		echo"</table>";
		echo"</div>";
		echo"</div>";
		echo"</div>";
		echo"</div>";
	  }
	
}//fin inicia si hay datos
				?>
          
          <!-- grafico -->
          <style>
.chart {
  width: 100%; 
  min-height: 450px;
}
</style> 

<?php include("../../footer_pie.php"); ?>
          <!-- fin grafico -->
           
            </div>
            </div>
        </div>
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
    $('#datatablese').DataTable({
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
    var table = $('#datatablese').DataTable();

    $('.card .material-datatablese label').addClass('form-group');
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