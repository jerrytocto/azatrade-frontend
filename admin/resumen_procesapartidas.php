<?php
session_start();
if (isset($_SESSION['login_usuario'])){
}else{
	if(!isset($_SESSION["login_usuario"]) || $_SESSION["login_usuario"]==null){
	//print "<script>alert('Acceso invalido! - Inicia Sesion para Acceder');window.location='$enlace_actual';</script>";
		print "<script>window.location='login/';</script>";
		//print "<script>alert('Acceso invalido! - Inicia Sesion para ver los resumenes');window.location='https://www.azatrade.info/';</script>";
}
}

set_time_limit(950);
$partida1 = $_POST["partidares"];
$nombres2 = $_POST['condiciona'];

?>
<!doctype html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<!-- Favicons -->
<link rel="apple-touch-icon" href="img/logo.png">
<link rel="icon" href="img/logo.png">
<title>
   ..: Azatrade :..
</title>

<!--     Fonts and icons     -->
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
<link rel="stylesheet" href="css/material-dashboard.min.css?v=2.0.1">
<link rel="stylesheet" href="css/buttons.dataTables.min.css">
<link href="css/demo.css" rel="stylesheet"/>
       <script>
      window.onload = detectarCarga;
      function detectarCarga(){
         document.getElementById("carga").style.display="none";
      }
    </script>
        </head>
<body>
	<div id="carga" style="width:100%;text-align: center;">
<Center><img class="img-responsive" src="img/loading-carga.gif" width="100px"><br><p style="font-size:12px; color:#EC0D36;"> Espere un momento, la consulta puede tardar unos minutos. </p></Center>
     </div>
</body>
        <body class="off-canvas-sidebar register-page" style="background-image: url('img/plan.jpg'); background-size: cover; background-position: top center;">

    <div class="wrapper wrapper-full-page">
            <div class='col-md-12'>

            <?php
				include("incBD/inibd.php");
				

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
extract(year from exportacion.fnum) <= '2021'";
	
  /*primero hacemos la sumario general segun filtro de seleccion*/
  if($nombres2=="vfobserdol" or $nombres2=="vpesnet" or $nombres2=="vpesbru" or $nombres2=="qunifis" or $nombres2=="qunicom"){
   $sqlyear="SELECT 'vfobserdol' as vfob,
Sum(CASE ".$filtrofecha." WHEN '2012' THEN exportacion.". $nombres2." ELSE 0 END) AS a2012,
Sum(CASE ".$filtrofecha." WHEN '2013' THEN exportacion.". $nombres2." ELSE 0 END) AS a2013,
Sum(CASE ".$filtrofecha." WHEN '2014' THEN exportacion.". $nombres2." ELSE 0 END) AS a2014,
Sum(CASE ".$filtrofecha." WHEN '2015' THEN exportacion.". $nombres2." ELSE 0 END) AS a2015,
Sum(CASE ".$filtrofecha." WHEN '2016' THEN exportacion.". $nombres2." ELSE 0 END) AS a2016,
Sum(CASE ".$filtrofecha." WHEN '2017' THEN exportacion.". $nombres2." ELSE 0 END) AS a2017,
Sum(CASE ".$filtrofecha." WHEN '2018' THEN exportacion.". $nombres2." ELSE 0 END) AS a2018,
Sum(CASE ".$filtrofecha." WHEN '2019' THEN exportacion.". $nombres2." ELSE 0 END) AS a2019,
Sum(CASE ".$filtrofecha." WHEN '2020' THEN exportacion.". $nombres2." ELSE 0 END) AS a2020,
Sum(CASE ".$filtrofecha." WHEN '2021' THEN exportacion.". $nombres2." ELSE 0 END) AS a2021
FROM exportacion
/*LEFT JOIN arancel ON (CASE char_length(exportacion.part_nandi::TEXT) WHEN '9' THEN '0' || exportacion.part_nandi ELSE exportacion.part_nandi::TEXT END) = arancel.idarancel*/
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
Sum(CASE ".$filtrofecha." WHEN '2019' THEN 1 ELSE 0 END) AS a2019,
Sum(CASE ".$filtrofecha." WHEN '2020' THEN 1 ELSE 0 END) AS a2020,
Sum(CASE ".$filtrofecha." WHEN '2021' THEN 1 ELSE 0 END) AS a2021
FROM exportacion
/*LEFT JOIN arancel ON (CASE char_length(exportacion.part_nandi::TEXT) WHEN '9' THEN '0' || exportacion.part_nandi ELSE exportacion.part_nandi::TEXT END) = arancel.idarancel*/
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
COUNT(DISTINCT CASE ".$filtrofecha." WHEN '2019' THEN exportacion.". $nombres2." ELSE Null END) AS a2019,
COUNT(DISTINCT CASE ".$filtrofecha." WHEN '2020' THEN exportacion.". $nombres2." ELSE Null END) AS a2020,
COUNT(DISTINCT CASE ".$filtrofecha." WHEN '2021' THEN exportacion.". $nombres2." ELSE Null END) AS a2021
FROM exportacion
/*LEFT JOIN arancel ON (CASE char_length(exportacion.part_nandi::TEXT) WHEN '9' THEN '0' || exportacion.part_nandi ELSE exportacion.part_nandi::TEXT END) = arancel.idarancel*/
WHERE ".$wherefecha." GROUP BY exportacion.part_nandi/*, arancel.descripcion*/";
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
Sum(CASE ".$filtrofecha." WHEN '2019' THEN exportacion.vpesnet ELSE 0 END) AS a2019x,
Sum(CASE ".$filtrofecha." WHEN '2020' THEN exportacion.vfobserdol ELSE 0 END) AS a2020,
Sum(CASE ".$filtrofecha." WHEN '2020' THEN exportacion.vpesnet ELSE 0 END) AS a2020x,
Sum(CASE ".$filtrofecha." WHEN '2021' THEN exportacion.vfobserdol ELSE 0 END) AS a2021,
Sum(CASE ".$filtrofecha." WHEN '2021' THEN exportacion.vpesnet ELSE 0 END) AS a2021x
FROM exportacion
/*LEFT JOIN arancel ON (CASE char_length(exportacion.part_nandi::TEXT) WHEN '9' THEN '0' || exportacion.part_nandi ELSE exportacion.part_nandi::TEXT END) = arancel.idarancel*/
WHERE ".$wherefecha." GROUP BY exportacion.part_nandi/*, arancel.descripcion*/";
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
COUNT(distinct CASE ".$filtrofecha." WHEN '2019' THEN ".$varia." ELSE NULL END) AS a2019,
COUNT(distinct CASE ".$filtrofecha." WHEN '2020' THEN ".$varia." ELSE NULL END) AS a2020,
COUNT(distinct CASE ".$filtrofecha." WHEN '2021' THEN ".$varia." ELSE NULL END) AS a2021
FROM exportacion
/*LEFT JOIN arancel ON (CASE char_length(exportacion.part_nandi::TEXT) WHEN '9' THEN '0' || exportacion.part_nandi ELSE exportacion.part_nandi::TEXT END) = arancel.idarancel*/
WHERE ".$wherefecha."
GROUP BY exportacion.part_nandi/*, arancel.descripcion*/";
}
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
			
			   $sumatotal2020_x= $fila_year['a2020'];
		   if($sumatotal2020_x=='0'){
			   $sumatotal2020_a="0.00";
			   $sumatotal2020 = $sumatotal2020_a + $sumatotal2020;
		   }else{
			   $sum_totalfob9 = $fila_year['a2020'];
			   $sum_totalnet9 = $fila_year['a2020x'];
		   $sumatotal2020_a= $sum_totalfob9 / $sum_totalnet9;
		   $sumatotal2020= $sumatotal2020_a + $sumatotal2020;
		   }
			   
			   $sumatotal2021_x= $fila_year['a2021'];
		   if($sumatotal2021_x=='0'){
			   $sumatotal2021_a="0.00";
			   $sumatotal2021 = $sumatotal2021_a + $sumatotal2021;
		   }else{
			   $sum_totalfob10 = $fila_year['a2021'];
			   $sum_totalnet10 = $fila_year['a2021x'];
		   $sumatotal2021_a= $sum_totalfob10 / $sum_totalnet10;
		   $sumatotal2021= $sumatotal2021_a + $sumatotal2021;
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
			   $sumc9 =  $fila_year['a2020'];
			   $sumc10 =  $fila_year['a2021'];
		   $sumatotal2012= $sumc1 + $sumatotal2012;
		   $sumatotal2013= $sumc2 + $sumatotal2013;
		   $sumatotal2014= $sumc3 + $sumatotal2014;
		   $sumatotal2015= $sumc4 + $sumatotal2015;
		   $sumatotal2016= $sumc5 + $sumatotal2016;
		   $sumatotal2017= $sumc6 + $sumatotal2017;
		   $sumatotal2018= $sumc7 + $sumatotal2018;
		   $sumatotal2019= $sumc8 + $sumatotal2019;
		   $sumatotal2020= $sumc9 + $sumatotal2020;
		   $sumatotal2021= $sumc10 + $sumatotal2021;
		   }else if($depart_x=='depart'){
				   $sumc1x =  $fila_year['a2012'];
				   $sumc2x =  $fila_year['a2013'];
				   $sumc3x =  $fila_year['a2014'];
				   $sumc4x =  $fila_year['a2015'];
				   $sumc5x =  $fila_year['a2016'];
			       $sumc6x =  $fila_year['a2017'];
			       $sumc7x =  $fila_year['a2018'];
			       $sumc8x =  $fila_year['a2019'];
			   $sumc9x =  $fila_year['a2020'];
			   $sumc10x =  $fila_year['a2021'];
		   $sumatotal2012= $sumc1x + $sumatotal2012;
		   $sumatotal2013= $sumc2x + $sumatotal2013;
		   $sumatotal2014= $sumc3x + $sumatotal2014;
		   $sumatotal2015= $sumc4x + $sumatotal2015;
		   $sumatotal2016= $sumc5x + $sumatotal2016;
		   $sumatotal2017= $sumc6x + $sumatotal2017;
		   $sumatotal2018= $sumc7x + $sumatotal2018;
		   $sumatotal2019= $sumc8x + $sumatotal2019;
			   $sumatotal2020= $sumc9x + $sumatotal2020;
			   $sumatotal2021= $sumc10x + $sumatotal2021;
		   }else{
		   $sumatotal2012= $fila_year['a2012'];
		   $sumatotal2013= $fila_year['a2013'];
		   $sumatotal2014= $fila_year['a2014'];
		   $sumatotal2015= $fila_year['a2015'];
		   $sumatotal2016= $fila_year['a2016'];
		   $sumatotal2017= $fila_year['a2017'];
		   $sumatotal2018= $fila_year['a2018'];
		   $sumatotal2019= $fila_year['a2019'];
			   $sumatotal2020= $fila_year['a2020'];
			   $sumatotal2021= $fila_year['a2021'];
		   }
		   
		   if($sumatotal2019=='0'){
			   $varitota="0.00";
		   }else{
		   $varitota= (($sumatotal2020 / $sumatotal2019) - 1) * 100;
		   }
		   $parti='100';
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
	$sumatotal2020="0";
	$sumatotal2021="0";
		  $varitota="0.00";
		  $parti="0.00";
	  }

  // listamos el reporte 
  if($nombres2=="vfobserdol" or $nombres2=="vpesnet" or $nombres2=="vpesbru" or $nombres2=="qunifis" or $nombres2=="qunicom"){
   $query1 = "SELECT exportacion.part_nandi,
/*arancel.descripcion,*/
Sum(CASE ".$filtrofecha." WHEN '2012' THEN exportacion.". $nombres2." ELSE 0 END) AS a2012,
Sum(CASE ".$filtrofecha." WHEN '2013' THEN exportacion.". $nombres2." ELSE 0 END) AS a2013,
Sum(CASE ".$filtrofecha." WHEN '2014' THEN exportacion.". $nombres2." ELSE 0 END) AS a2014,
Sum(CASE ".$filtrofecha." WHEN '2015' THEN exportacion.". $nombres2." ELSE 0 END) AS a2015,
Sum(CASE ".$filtrofecha." WHEN '2016' THEN exportacion.". $nombres2." ELSE 0 END) AS a2016,
Sum(CASE ".$filtrofecha." WHEN '2017' THEN exportacion.". $nombres2." ELSE 0 END) AS a2017,
Sum(CASE ".$filtrofecha." WHEN '2018' THEN exportacion.". $nombres2." ELSE 0 END) AS a2018,
Sum(CASE ".$filtrofecha." WHEN '2019' THEN exportacion.". $nombres2." ELSE 0 END) AS a2019,
Sum(CASE ".$filtrofecha." WHEN '2020' THEN exportacion.". $nombres2." ELSE 0 END) AS a2020,
Sum(CASE ".$filtrofecha." WHEN '2021' THEN exportacion.". $nombres2." ELSE 0 END) AS a2021
FROM exportacion
/*LEFT JOIN arancel ON exportacion.part_nandi = arancel.idarancel*/
WHERE ".$wherefecha."
GROUP BY exportacion.part_nandi/*, arancel.descripcion*/";
  }
  
  if($nombres2=="diferen"){
  $query1 = "SELECT exportacion.part_nandi,
/*arancel.descripcion,*/
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
Sum(CASE ".$filtrofecha." WHEN '2019' THEN exportacion.vpesnet ELSE 0 END) AS a2019x,
Sum(CASE ".$filtrofecha." WHEN '2020' THEN exportacion.vfobserdol ELSE 0 END) AS a2020,
Sum(CASE ".$filtrofecha." WHEN '2020' THEN exportacion.vpesnet ELSE 0 END) AS a2020x,
Sum(CASE ".$filtrofecha." WHEN '2021' THEN exportacion.vfobserdol ELSE 0 END) AS a2021,
Sum(CASE ".$filtrofecha." WHEN '2021' THEN exportacion.vpesnet ELSE 0 END) AS a2021x
FROM exportacion
/*LEFT JOIN arancel ON exportacion.part_nandi = arancel.idarancel*/
WHERE ".$wherefecha."
GROUP BY exportacion.part_nandi/*, arancel.descripcion*/";
  }
  
  if($nombres2=="total"){
 $query1 = "SELECT exportacion.part_nandi,
/*arancel.descripcion,*/
Sum(CASE ".$filtrofecha." WHEN '2012' THEN 1 ELSE 0 END) AS a2012,
Sum(CASE ".$filtrofecha." WHEN '2013' THEN 1 ELSE 0 END) AS a2013,
Sum(CASE ".$filtrofecha." WHEN '2014' THEN 1 ELSE 0 END) AS a2014,
Sum(CASE ".$filtrofecha." WHEN '2015' THEN 1 ELSE 0 END) AS a2015,
Sum(CASE ".$filtrofecha." WHEN '2016' THEN 1 ELSE 0 END) AS a2016,
Sum(CASE ".$filtrofecha." WHEN '2017' THEN 1 ELSE 0 END) AS a2017,
Sum(CASE ".$filtrofecha." WHEN '2018' THEN 1 ELSE 0 END) AS a2018,
Sum(CASE ".$filtrofecha." WHEN '2019' THEN 1 ELSE 0 END) AS a2019,
Sum(CASE ".$filtrofecha." WHEN '2020' THEN 1 ELSE 0 END) AS a2020,
Sum(CASE ".$filtrofecha." WHEN '2021' THEN 1 ELSE 0 END) AS a2021
FROM exportacion
/*LEFT JOIN arancel ON exportacion.part_nandi = arancel.idarancel*/
WHERE ".$wherefecha."
GROUP BY exportacion.part_nandi/*, arancel.descripcion*/";
  }
  if($nombres2=="ndcl" or $nombres2=="dnombre" or $nombres2=="part_nandi" or $nombres2=="cpaides" or $nombres2=="cpuedes" or $nombres2=="cadu" or $nombres2=="cage" or $nombres2=="cviatra"){
  $query1 = "SELECT exportacion.part_nandi,
/*arancel.descripcion,*/
COUNT(DISTINCT CASE ".$filtrofecha." WHEN '2012' THEN exportacion.". $nombres2." ELSE NULL END) AS a2012,
COUNT(DISTINCT CASE ".$filtrofecha." WHEN '2013' THEN exportacion.". $nombres2." ELSE NULL END) AS a2013,
COUNT(DISTINCT CASE ".$filtrofecha." WHEN '2014' THEN exportacion.". $nombres2." ELSE NULL END) AS a2014,
COUNT(DISTINCT CASE ".$filtrofecha." WHEN '2015' THEN exportacion.". $nombres2." ELSE NULL END) AS a2015,
COUNT(DISTINCT CASE ".$filtrofecha." WHEN '2016' THEN exportacion.". $nombres2." ELSE NULL END) AS a2016,
COUNT(DISTINCT CASE ".$filtrofecha." WHEN '2017' THEN exportacion.". $nombres2." ELSE NULL END) AS a2017,
COUNT(DISTINCT CASE ".$filtrofecha." WHEN '2018' THEN exportacion.". $nombres2." ELSE NULL END) AS a2018,
COUNT(DISTINCT CASE ".$filtrofecha." WHEN '2019' THEN exportacion.". $nombres2." ELSE NULL END) AS a2019,
COUNT(DISTINCT CASE ".$filtrofecha." WHEN '2020' THEN exportacion.". $nombres2." ELSE NULL END) AS a2020,
COUNT(DISTINCT CASE ".$filtrofecha." WHEN '2021' THEN exportacion.". $nombres2." ELSE NULL END) AS a2021
FROM exportacion
/*LEFT JOIN arancel ON exportacion.part_nandi = arancel.idarancel*/
WHERE ".$wherefecha."
GROUP BY exportacion.part_nandi/*, arancel.descripcion*/";
  }
   if($nombres2=="depa" or $nombres2=="provi" or $nombres2=="distri"){
	    if($nombres2=="depa"){
		  $variaA='substring(exportacion.ubigeo,1,2)';
	  }else if($nombres2=="provi"){
		  $variaA='substring(exportacion.ubigeo,3,2)';
	  }else{
		  $variaA='substring(exportacion.ubigeo,5,2)';
	  }
  $query1 = "SELECT exportacion.part_nandi,
/*arancel.descripcion,*/
COUNT(distinct CASE ".$filtrofecha." WHEN '2012' THEN ".$variaA." ELSE NULL END) AS a2012,
COUNT(distinct CASE ".$filtrofecha." WHEN '2013' THEN ".$variaA." ELSE NULL END) AS a2013,
COUNT(distinct CASE ".$filtrofecha." WHEN '2014' THEN ".$variaA." ELSE NULL END) AS a2014,
COUNT(distinct CASE ".$filtrofecha." WHEN '2015' THEN ".$variaA." ELSE NULL END) AS a2015,
COUNT(distinct CASE ".$filtrofecha." WHEN '2016' THEN ".$variaA." ELSE NULL END) AS a2016,
COUNT(distinct CASE ".$filtrofecha." WHEN '2017' THEN ".$variaA." ELSE NULL END) AS a2017,
COUNT(distinct CASE ".$filtrofecha." WHEN '2018' THEN ".$variaA." ELSE NULL END) AS a2018,
COUNT(distinct CASE ".$filtrofecha." WHEN '2019' THEN ".$variaA." ELSE NULL END) AS a2019,
COUNT(distinct CASE ".$filtrofecha." WHEN '2020' THEN ".$variaA." ELSE NULL END) AS a2020,
COUNT(distinct CASE ".$filtrofecha." WHEN '2021' THEN ".$variaA." ELSE NULL END) AS a2021
FROM exportacion
/*LEFT JOIN arancel ON exportacion.part_nandi = arancel.idarancel*/
LEFT JOIN departamento ON substring(exportacion.ubigeo,1,2) = departamento.iddepartamento
WHERE ".$wherefecha."
GROUP BY exportacion.part_nandi/*, arancel.descripcion*/";
  }
	$resultado1=$conexpg->query($query1) or die(mysqli_error($conexpg));
if($resultado1->num_rows>0){ 
	
	              //eliminamos registro
				  $Sqldel="DELETE FROM resumen_partidas WHERE varia_filtro ='$nombres2' ";
				  $rs = $conexpg->query($Sqldel);
	
	//echo "$nombres2 <br>";
			  while($fila1=$resultado1->fetch_array()){

			$cod_part= $fila1['part_nandi'];
		     $nom_partix= $fila1['descripcion'];
				 
		  //consultamos descripcion de partida
				  $descriparti = "Select descripcion from arancel where idarancel='$cod_part' ";
				  $rsparti=$conexpg->query($descriparti) or die(mysqli_error($conexpg));
if($rsparti->num_rows>0){
	while($rwpa1=$rsparti->fetch_array()){
		$nom_parti= $rwpa1['descripcion'];
	}
}else{
	 $nom_parti="-----";
}
	
		  /*if($nom_partix==""){
		    $nom_parti="-----";
			  }else{
          $nom_parti= $fila1['descripcion'];
			  }*/
			  
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
			  $dife9A = $fila1['a2020'];
			   $dife9B = $fila1['a2020x'];
			  $dife10A = $fila1['a2021'];
			   $dife10B = $fila1['a2021x'];
			  
			   if($dife1B=='0'){
				   $year1= "0.00";
			   }else{ 
			   $year1= $dife1A / $dife1B; 
			   }
			   if($dife2B=='0'){
				   $year2= "0.00";
			   }else{ $year2= $dife2A / $dife2B; }
			   
			   if($dife3B=='0'){
				   $year3= "0.00";
			   }else{ $year3= $dife3A / $dife3B; }
			   
			   if($dife4B=='0'){
				   $year4= "0.00";
			   }else{ $year4= $dife4A / $dife4B; }
			   
			   if($dife5B=='0'){
				   $year5= "0.00";  
			   }else{ $year5= $dife5A / $dife5B; }
			  
			  if($dife6B=='0'){
				   $year6= "0.00";  
			   }else{ $year6= $dife6A / $dife6B; }
			  
			  if($dife7B=='0'){
				   $year7= "0.00";  
			   }else{ $year7= $dife7A / $dife7B; }
			  
			  if($dife8B=='0'){
				   $year8= "0.00";  
			   }else{ $year8= $dife8A / $dife8B; }
			  
			  if($dife9B=='0'){
				   $year9= "0.00";  
			   }else{ $year9= $dife9A / $dife9B; }
			  
			  if($dife10B=='0'){
				   $year10= "0.00";  
			   }else{ $year10= $dife10A / $dife10B; }
			   
		   }else{
		  $year1= $fila1['a2012'];
		  $year2= $fila1['a2013'];
		  $year3= $fila1['a2014'];
		  $year4= $fila1['a2015'];
		  $year5= $fila1['a2016'];
		  $year6= $fila1['a2017'];
		  $year7= $fila1['a2018'];
		  $year8= $fila1['a2019'];
		  $year9= $fila1['a2020'];
			  $year10= $fila1['a2021'];
		  
		   }
		 
		if($year8=='0'){
		  $var11 ='0';
		  }else{
		  $var11 = (($year9 / $year8) - 1) * 100;
		  }
		  
		if($sumatotal2020=="0"){
			  $var22 ="0.00";
		  }else{
		  $var22 = ($year9 / $sumatotal2020) * 100;
		  }
		  
		  
		   /*echo "<tr>";
echo "<td>$cod_part</td>";
echo "<td>$nom_parti</td>";
echo "<td>".number_format($year1,2)."</td>";
echo "<td>".number_format($year2,2)."</td>";
echo "<td>".number_format($year3,2)."</td>";
echo "<td>".number_format($year4,2)."</td>";
echo "<td>".number_format($year5,2)."</td>";
echo "<td>".number_format($year6,2)."</td>";
echo "<td>".number_format($year7,2)."</td>";
echo "<td>".number_format($year8,2)."</td>";
echo "<td>$var11%</td>";
echo "<td>$var22%</td>";
 echo "</tr>";*/
				  $uno1 = $year1;
				  $uno2 = $year2;
				  $uno3 = $year3;
				  $uno4 = $year4;
				  $uno5 = $year5;
				  $uno6 = $year6;
				  $uno7 = $year7;
				  $uno8 = $year8;
				  $uno9 = $year9;
				  $uno10 = $year10;
				  
				  //echo "<h1>PROCESO ...$uno1</h1>";
				  
				  
				  //insertamos detalle
				$Sql_inserparti="insert into resumen_partidas (varia_filtro, codigo, descripcion, anio1, anio2, anio3, anio4, anio5, anio6, anio7, anio8, anio9, anio10, variauno, variados
)  values (
'$nombres2',
'$cod_part',
'$nom_parti',
'$uno1',
'$uno2',
'$uno3',
'$uno4',
'$uno5',
'$uno6',
'$uno7',
'$uno8',
'$uno9',
'$uno10',
'$var11',
'$var22' )";
	$rscrea2 = $conexpg->query($Sql_inserparti) or die(mysqli_error($conexpg));

		  }
	//echo "$sumatotal2012 - $sumatotal2013 - $sumatotal2014 - $sumatotal2015 - $sumatotal2016 - $sumatotal2017 - $sumatotal2018 - $sumatotal2019";
	
	//insertamos totales finales
	/*$total1 = $sumatotal2012;
		$total2 = $sumatotal2013;
		$total3 = $sumatotal2014;
		$total4 = $sumatotal2015;
		$total5 = $sumatotal2016;
		$total6 = $sumatotal2017;
		$total7 = $sumatotal2018;
		$total8 = $sumatotal2019;
	
	echo"$total1 - $total2 - $total3 - $total4 - $total5 - $total6 - $total7 - $total8 xx";
	
	$Sql_xinserpartitota="insert into resumen_partidas (varia_filtro, codigo, descripcion, anio1, anio2, anio3, anio4, anio5, anio6, anio7, anio8, variauno, variados) values (
'$nombres2',
'Total',
'Totales',
'$total1',
'$total2',
'$total3',
'$total4',
'$total5',
'$total6',
'$total7',
'$total8',
'$varitota',
'$parti')";
	$rscreatota = $conexpg->query($Sql_xinserpartitota) or die(mysqli_error($conexpg));*/
	
	
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

         <?php include("footer_pie.php"); ?>
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
<script src="js/core/jquery.min.js"></script>
<script src="js/core/popper.min.js"></script>


<script src="js/bootstrap-material-design.min.js"></script>


<script src="js/plugins/perfect-scrollbar.jquery.min.js"></script>



<!--  Google Maps Plugin  -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2Yno10-YTnLjjn_Vtk0V8cdcY5lC4plU"></script>


<!--  Plugin for Date Time Picker and Full Calendar Plugin  -->
<script src="js/plugins/moment.min.js"></script>

<!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
<script src="js/plugins/bootstrap-datetimepicker.min.js"></script>

<!--	Plugin for the Sliders, full documentation here: https://refreshless.com/nouislider/ -->
<script src="js/plugins/nouislider.min.js"></script>



<!--	Plugin for Select, full documentation here: https://silviomoreto.github.io/bootstrap-select -->
<script src="js/plugins/bootstrap-selectpicker.js"></script>

<!--	Plugin for Tags, full documentation here: https://xoxco.com/projects/code/tagsinput/  -->
<script src="js/plugins/bootstrap-tagsinput.js"></script>

<!--	Plugin for Fileupload, full documentation here: https://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="js/plugins/jasny-bootstrap.min.js"></script>

<!-- Plugins for presentation and navigation  -->
<script src="assets-for-demo/js/modernizr.js"></script>




<!-- Material Kit Core initialisations of plugins and Bootstrap Material Design Library -->

<script src="js/material-dashboard.js?v=2.0.1"></script>



<!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>

<!-- Library for adding dinamically elements -->
<script src="js/plugins/arrive.min.js" type="text/javascript"></script>

<!-- Forms Validations Plugin -->
<script src="js/plugins/jquery.validate.min.js"></script>

<!--  Charts Plugin, full documentation here: https://gionkunz.github.io/chartist-js/ -->
<script src="js/plugins/chartist.min.js"></script>

<!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
<script src="js/plugins/jquery.bootstrap-wizard.js"></script>

<!--  Notifications Plugin, full documentation here: https://bootstrap-notify.remabledesigns.com/    -->
<script src="js/plugins/bootstrap-notify.js"></script>

<!-- Vector Map plugin, full documentation here: https://jvectormap.com/documentation/ -->
<script src="js/plugins/jquery-jvectormap.js"></script>

<!-- Sliders Plugin, full documentation here: https://refreshless.com/nouislider/ -->
<script src="js/plugins/nouislider.min.js"></script>

<!--  Plugin for Select, full documentation here: https://silviomoreto.github.io/bootstrap-select -->
<script src="js/plugins/jquery.select-bootstrap.js"></script>

<!--  DataTables.net Plugin, full documentation here: https://datatables.net/    -->
<script src="js/plugins/jquery.datatables.js"></script>

<!-- Sweet Alert 2 plugin, full documentation here: https://limonte.github.io/sweetalert2/ -->
<script src="js/plugins/sweetalert2.js"></script>

<!-- Plugin for Fileupload, full documentation here: https://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="js/plugins/jasny-bootstrap.min.js"></script>

<!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
<script src="js/plugins/fullcalendar.min.js"></script>

<!-- demo init -->
<script src="js/plugins/demo.js"></script>
 

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
echo"<script>location.href='resumen_procesa.php?by=ok&val=Partidas&fit=$combo'</script>";
?>
</html>