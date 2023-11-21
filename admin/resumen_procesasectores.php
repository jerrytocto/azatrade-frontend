<?php
session_start();
if (isset($_SESSION['login_usuario'])){
}else{
	if(!isset($_SESSION["login_usuario"]) || $_SESSION["login_usuario"]==null){
	//print "<script>alert('Acceso invalido! - Inicia Sesion para Acceder');window.location='$enlace_actual';</script>";
//print "<script>window.location='';</script>";
		print "<script>window.location='login/';</script>";
		//print "<script>alert('Acceso invalido! - Inicia Sesion para ver los resumenes');window.location='https://www.azatrade.info/';</script>";
}
}
set_time_limit(990);
$namesec = $_POST["namesectRES"];
$nombres2 = $_POST['condiciona'];

//si es un usuario basico y no tiene acceso
/*if($_SESSION['rol']=="BASICO"){
if($_SESSION['acceso_pago']=="No"){
	print "<script>alert('Acceso invalido! - Para ver los resumenes adquiere uno de nuestros planes Premiun');window.location='planes/';</script>";
}
	}*/

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
<!-- CSS Just for demo purpose, don't include it in your project -->
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
		$filtrofecha='ee.fnum';
		$wherefecha ="extract(year from exportacion.fnum) >= '2012' AND
extract(year from exportacion.fnum) <= '2021'";
	

	 if($nombres2=="vfobserdol"){
  /*suma totales de valor fob*/
$total_suma="SELECT
(SELECT Sum(ee.vfobserdol) FROM exportacion ee WHERE YEAR(ee.fnum)='2012' GROUP BY YEAR(ee.fnum)) as ax2012,
(SELECT Sum(ee.vfobserdol) FROM exportacion ee WHERE YEAR(ee.fnum)='2013' GROUP BY YEAR(ee.fnum)) as ax2013,
(SELECT Sum(ee.vfobserdol) FROM exportacion ee WHERE YEAR(ee.fnum)='2014' GROUP BY YEAR(ee.fnum)) as ax2014,
(SELECT Sum(ee.vfobserdol) FROM exportacion ee WHERE YEAR(ee.fnum)='2015' GROUP BY YEAR(ee.fnum)) as ax2015,
(SELECT Sum(ee.vfobserdol) FROM exportacion ee WHERE YEAR(ee.fnum)='2016' GROUP BY YEAR(ee.fnum)) as ax2016,
(SELECT Sum(ee.vfobserdol) FROM exportacion ee WHERE YEAR(ee.fnum)='2017' GROUP BY YEAR(ee.fnum)) as ax2017,
(SELECT Sum(ee.vfobserdol) FROM exportacion ee WHERE YEAR(ee.fnum)='2018' GROUP BY YEAR(ee.fnum)) as ax2018,
(SELECT Sum(ee.vfobserdol) FROM exportacion ee WHERE YEAR(ee.fnum)='2019' GROUP BY YEAR(ee.fnum)) as ax2019,
(SELECT Sum(ee.vfobserdol) FROM exportacion ee WHERE YEAR(ee.fnum)='2020' GROUP BY YEAR(ee.fnum)) as ax2020,
(SELECT Sum(ee.vfobserdol) FROM exportacion ee WHERE YEAR(ee.fnum)='2021' GROUP BY YEAR(ee.fnum)) as ax2021
FROM exportacion
INNER JOIN sector ON sector.partida = exportacion.part_nandi 
GROUP BY ax2012, ax2013, ax2014, ax2015, ax2016, ax2017, ax2018, ax2019, ax2020";
		 $res_totalfob=$conexpg->query($total_suma); 
if($res_totalfob->num_rows>0){ 
while($fila_tofob=$res_totalfob->fetch_array()){
			  $sumatotal2012 = $fila_tofob['ax2012'];
			  $sumatotal2013 = $fila_tofob['ax2013'];
			  $sumatotal2014 = $fila_tofob['ax2014'];
			  $sumatotal2015 = $fila_tofob['ax2015'];
			  $sumatotal2016 = $fila_tofob['ax2016'];
			  $sumatotal2017 = $fila_tofob['ax2017'];
			  $sumatotal2018 = $fila_tofob['ax2018'];
	          $sumatotal2019 = $fila_tofob['ax2019'];
	$sumatotal2020 = $fila_tofob['ax2020'];
	$sumatotal2021 = $fila_tofob['ax2021'];
		  }
	  }else{
		      $sumatotal2012 = "0.00";
			  $sumatotal2013 = "0.00";
			  $sumatotal2014 = "0.00";
			  $sumatotal2015 = "0.00";
			  $sumatotal2016 = "0.00";
			  $sumatotal2017 = "0.00";
		      $sumatotal2018 = "0.00";
	          $sumatotal2019 = "0.00";
	$sumatotal2020 = "0.00";
	$sumatotal2021 = "0.00";
	  }
 }
 
 /*cantidad totales de partidas, empresas*/
  if($nombres2=="part_nandi"){
 $totaldepa2012="SELECT DISTINCT ee.part_nandi 
 FROM exportacion ee 
 INNER JOIN sector ON sector.partida = ee.part_nandi 
 WHERE YEAR(ee.fnum)='2012'";
	  $res_depa2012=$conexpg->query($totaldepa2012); 
if($res_depa2012->num_rows>0){ 
while($fila_depa12=$res_depa2012->fetch_array()){
			  $sumatotal2012 = $sumatotal2012 + 1;
		  }
	  }else{
		  $sumatotal2012="0";
	  }
	  
$totaldepa2013="SELECT DISTINCT ee.part_nandi
FROM exportacion ee 
INNER JOIN sector ON sector.partida = ee.part_nandi 
WHERE YEAR(ee.fnum)='2013'";
	  $res_depa2013=$conexpg->query($totaldepa2013); 
if($res_depa2013->num_rows>0){ 
while($fila_depa13=$res_depa2013->fetch_array()){
			  $sumatotal2013 = $sumatotal2013 + 1;
		  }
	  }else{
		  $sumatotal2013="0";
	  }
	  
$totaldepa2014="SELECT DISTINCT ee.part_nandi
FROM exportacion ee 
INNER JOIN sector ON sector.partida = ee.part_nandi) 
WHERE YEAR(ee.fnum)='2014'";
	  $res_depa2014=$conexpg->query($totaldepa2014); 
if($res_depa2014->num_rows>0){ 
while($fila_depa14=$res_depa2014->fetch_array()){
			  $sumatotal2014 = $sumatotal2014 + 1;
		  }
	  }else{
		  $sumatotal2014="0";
	  }
	  
$totaldepa2015="SELECT DISTINCT ee.part_nandi 
FROM exportacion ee 
INNER JOIN sector ON sector.partida = ee.part_nandi 
WHERE YEAR(ee.fnum)='2015'";
	  $res_depa2015=$conexpg->query($totaldepa2015); 
if($res_depa2015->num_rows>0){ 
while($fila_depa15=$res_depa2015->fetch_array()){
			  $sumatotal2015 = $sumatotal2015 + 1;
		  }
	  }else{
		  $sumatotal2015="0";
	  }

$totaldepa2016="SELECT DISTINCT ee.part_nandi
FROM exportacion ee 
INNER JOIN sector ON sector.partida = ee.part_nandi 
WHERE YEAR(ee.fnum)='2016'";
	  $res_depa2016=$conexpg->query($totaldepa2016); 
if($res_depa2016->num_rows>0){ 
while($fila_depa16=$res_depa2016->fetch_array()){
			  $sumatotal2016 = $sumatotal2016 + 1;
		  }
	  }else{
		  $sumatotal2016="0";
	  } 
	  
$totaldepa2017="SELECT DISTINCT ee.part_nandi
FROM exportacion ee 
INNER JOIN sector ON sector.partida = ee.part_nandi
WHERE YEAR(ee.fnum)='2017'";
	  $res_depa2017=$conexpg->query($totaldepa2017); 
if($res_depa2017->num_rows>0){ 
while($fila_depa17=$res_depa2017->fetch_array()){
			  $sumatotal2017 = $sumatotal2017 + 1;
		  }
	  }else{
		  $sumatotal2017="0";
	  } 
	  
$totaldepa2018="SELECT DISTINCT ee.part_nandi
FROM exportacion ee 
INNER JOIN sector ON sector.partida = ee.part_nandi
WHERE YEAR(ee.fnum)='2018'";
	  $res_depa2018=$conexpg->query($totaldepa2018); 
if($res_depa2018->num_rows>0){ 
while($fila_depa18=$res_depa2018->fetch_array()){
			  $sumatotal2018 = $sumatotal2018 + 1;
		  }
	  }else{
		  $sumatotal2018="0";
	  }
	  
$totaldepa2019="SELECT DISTINCT ee.part_nandi
FROM exportacion ee 
INNER JOIN sector ON sector.partida = ee.part_nandi
WHERE YEAR(ee.fnum)='2019'";
	  $res_depa2019=$conexpg->query($totaldepa2019); 
if($res_depa2019->num_rows>0){ 
while($fila_depa19=$res_depa2019->fetch_array()){
			  $sumatotal2019 = $sumatotal2019 + 1;
		  }
	  }else{
		  $sumatotal2019="0";
	  }
	  
	  $totaldepa2020="SELECT DISTINCT ee.part_nandi
FROM exportacion ee 
INNER JOIN sector ON sector.partida = ee.part_nandi
WHERE YEAR(ee.fnum)='2020'";
	  $res_depa2020=$conexpg->query($totaldepa2020); 
if($res_depa2020->num_rows>0){ 
while($fila_depa20=$res_depa2020->fetch_array()){
			  $sumatotal2020 = $sumatotal2020 + 1;
		  }
	  }else{
		  $sumatotal2020="0";
	  }
	  
	  $totaldepa2021="SELECT DISTINCT ee.part_nandi
FROM exportacion ee 
INNER JOIN sector ON sector.partida = ee.part_nandi
WHERE YEAR(ee.fnum)='2021'";
	  $res_depa2021=$conexpg->query($totaldepa2021); 
if($res_depa2021->num_rows>0){ 
while($fila_depa21=$res_depa2021->fetch_array()){
			  $sumatotal2021 = $sumatotal2021 + 1;
		  }
	  }else{
		  $sumatotal2021="0";
	  }
	  
 }
 /*cantidad totales de empresas*/
 if($nombres2=="dnombre"){
 $totaldepa2012="SELECT DISTINCT ee.ndoc
 FROM exportacion ee 
 INNER JOIN sector ON sector.partida = ee.part_nandi
 WHERE YEAR(ee.fnum)='2012'";
	 $res_depa2012=$conexpg->query($totaldepa2012); 
if($res_depa2012->num_rows>0){ 
while($fila_depa12=$res_depa2012->fetch_array()){
			  $sumatotal2012 = $sumatotal2012 + 1;
		  }
	  }else{
		  $sumatotal2012="0";
	  }
	  
$totaldepa2013="SELECT DISTINCT ee.ndoc
FROM exportacion ee 
INNER JOIN sector ON sector.partida = ee.part_nandi
WHERE YEAR(ee.fnum)='2013'";
	 $res_depa2013=$conexpg->query($totaldepa2013); 
if($res_depa2013->num_rows>0){ 
while($fila_depa13=$res_depa2013->fetch_array()){
			  $sumatotal2013 = $sumatotal2013 + 1;
		  }
	  }else{
		  $sumatotal2013="0";
	  }
	  
$totaldepa2014="SELECT DISTINCT ee.ndoc
FROM exportacion ee 
INNER JOIN sector ON sector.partida = ee.part_nandi 
WHERE YEAR(ee.fnum)='2014'";
	 $res_depa2014=$conexpg->query($totaldepa2014); 
if($res_depa2014->num_rows>0){ 
while($fila_depa14=$res_depa2014->fetch_array()){
			  $sumatotal2014 = $sumatotal2014 + 1;
		  }
	  }else{
		  $sumatotal2014="0";
	  }
	  
$totaldepa2015="SELECT DISTINCT ee.ndoc
FROM exportacion ee 
INNER JOIN sector ON sector.partida = ee.part_nandi
WHERE YEAR(ee.fnum)='2015'";
	 $res_depa2015=$conexpg->query($totaldepa2015); 
if($res_depa2015->num_rows>0){ 
while($fila_depa15=$res_depa2015->fetch_array()){
			  $sumatotal2015 = $sumatotal2015 + 1;
		  }
	  }else{
		  $sumatotal2015="0";
	  }

$totaldepa2016="SELECT DISTINCT ee.ndoc
FROM exportacion ee 
INNER JOIN sector ON sector.partida = ee.part_nandi
WHERE YEAR(ee.fnum)='2016'";
	 $res_depa2016=$conexpg->query($totaldepa2016); 
if($res_depa2016->num_rows>0){ 
while($fila_depa16=$res_depa2016->fetch_array()){
			  $sumatotal2016 = $sumatotal2016 + 1;
		  }
	  }else{
		  $sumatotal2016="0";
	  } 
	  
$totaldepa2017="SELECT DISTINCT ee.ndoc
FROM exportacion ee 
INNER JOIN sector ON sector.partida = ee.part_nandi 
WHERE YEAR(ee.fnum)='2017'";
	 $res_depa2017=$conexpg->query($totaldepa2017); 
if($res_depa2017->num_rows>0){ 
while($fila_depa17=$res_depa2017->fetch_array()){
			  $sumatotal2017 = $sumatotal2017 + 1;
		  }
	  }else{
		  $sumatotal2017="0";
	  } 
	 
$totaldepa2018="SELECT DISTINCT ee.ndoc
FROM exportacion ee 
INNER JOIN sector ON sector.partida = ee.part_nandi  
WHERE YEAR(ee.fnum)='2018'";
	 $res_depa2018=$conexpg->query($totaldepa2018); 
if($res_depa2018->num_rows>0){ 
while($fila_depa18=$res_depa2018->fetch_array()){
			  $sumatotal2018 = $sumatotal2018 + 1;
		  }
	  }else{
		  $sumatotal2018="0";
	  }
	 
$totaldepa2019="SELECT DISTINCT ee.ndoc
FROM exportacion ee 
INNER JOIN sector ON sector.partida = ee.part_nandi  
WHERE YEAR(ee.fnum)='2019'";
	 $res_depa2019=$conexpg->query($totaldepa2019); 
if($res_depa2019->num_rows>0){ 
while($fila_depa19=$res_depa2019->fetch_array()){
			  $sumatotal2019 = $sumatotal2019 + 1;
		  }
	  }else{
		  $sumatotal2019="0";
	  }
	 
	 $totaldepa2020="SELECT DISTINCT ee.ndoc
FROM exportacion ee 
INNER JOIN sector ON sector.partida = ee.part_nandi  
WHERE YEAR(ee.fnum)='2020'";
	 $res_depa2020=$conexpg->query($totaldepa2020); 
if($res_depa2020->num_rows>0){ 
while($fila_depa20=$res_depa2020->fetch_array()){
			  $sumatotal2020 = $sumatotal2020 + 1;
		  }
	  }else{
		  $sumatotal2020="0";
	  }
	 
	 $totaldepa2021="SELECT DISTINCT ee.ndoc
FROM exportacion ee 
INNER JOIN sector ON sector.partida = ee.part_nandi  
WHERE YEAR(ee.fnum)='2021'";
	 $res_depa2021=$conexpg->query($totaldepa2021); 
if($res_depa2021->num_rows>0){ 
while($fila_depa21=$res_depa2021->fetch_array()){
			  $sumatotal2021 = $sumatotal2021 + 1;
		  }
	  }else{
		  $sumatotal2021="0";
	  }
	  
	  
 }
 
 
 /*cantidad totales de departamentos*/
 if($nombres2=="depa"){
 $totaldepa2012="SELECT DISTINCT substring(ee.ubigeo,1,2)
 FROM exportacion ee 
 INNER JOIN sector ON sector.partida = ee.part_nandi 
 WHERE YEAR(ee.fnum)='2012'";
	 $res_depa2012=$conexpg->query($totaldepa2012); 
if($res_depa2012->num_rows>0){ 
while($fila_depa12=$res_depa2012->fetch_array()){
			  $sumatotal2012 = $sumatotal2012 + 1;
		  }
	  }else{
		  $sumatotal2012="0";
	  }
	  
$totaldepa2013="SELECT DISTINCT substring(ee.ubigeo,1,2)
FROM exportacion ee 
INNER JOIN sector ON sector.partida = ee.part_nandi 
WHERE YEAR(ee.fnum)='2013'";
	 $res_depa2013=$conexpg->query($totaldepa2013); 
if($res_depa2013->num_rows>0){ 
while($fila_depa13=$res_depa2013->fetch_array()){
			  $sumatotal2013 = $sumatotal2013 + 1;
		  }
	  }else{
		  $sumatotal2013="0";
	  }
	  
$totaldepa2014="SELECT DISTINCT substring(ee.ubigeo,1,2)
FROM exportacion ee 
INNER JOIN sector ON sector.partida = ee.part_nandi  
WHERE YEAR(ee.fnum)='2014'";
	 $res_depa2014=$conexpg->query($totaldepa2014); 
if($res_depa2014->num_rows>0){ 
while($fila_depa14=$res_depa2014->fetch_array()){
			  $sumatotal2014 = $sumatotal2014 + 1;
		  }
	  }else{
		  $sumatotal2014="0";
	  }
	  
$totaldepa2015="SELECT DISTINCT substring(ee.ubigeo,1,2)
FROM exportacion ee 
INNER JOIN sector ON sector.partida = ee.part_nandi
WHERE YEAR(ee.fnum)='2015'";
	 $res_depa2015=$conexpg->query($totaldepa2015); 
if($res_depa2015->num_rows>0){ 
while($fila_depa15=$res_depa2015->fetch_array()){
			  $sumatotal2015 = $sumatotal2015 + 1;
		  }
	  }else{
		  $sumatotal2015="0";
	  }

$totaldepa2016="SELECT DISTINCT substring(ee.ubigeo,1,2)
FROM exportacion ee 
INNER JOIN sector ON sector.partida = ee.part_nandi 
WHERE YEAR(ee.fnum)='2016'";
	 $res_depa2016=$conexpg->query($totaldepa2016); 
if($res_depa2016->num_rows>0){ 
while($fila_depa16=$res_depa2016->fetch_array()){
			  $sumatotal2016 = $sumatotal2016 + 1;
		  }
	  }else{
		  $sumatotal2016="0";
	  } 
	  
$totaldepa2017="SELECT DISTINCT substring(ee.ubigeo,1,2)
FROM exportacion ee 
INNER JOIN sector ON sector.partida = ee.part_nandi
WHERE YEAR(ee.fnum)='2017'";
	 $res_depa2017=$conexpg->query($totaldepa2017); 
if($res_depa2017->num_rows>0){ 
while($fila_depa17=$res_depa2017->fetch_array()){
			  $sumatotal2017 = $sumatotal2017 + 1;
		  }
	  }else{
		  $sumatotal2017="0";
	  } 
	 
$totaldepa2018="SELECT DISTINCT substring(ee.ubigeo,1,2)
FROM exportacion ee 
INNER JOIN sector ON sector.partida = ee.part_nandi
WHERE YEAR(ee.fnum)='2018'";
	 $res_depa2018=$conexpg->query($totaldepa2018); 
if($res_depa2018->num_rows>0){ 
while($fila_depa18=$res_depa2018->fetch_array()){
			  $sumatotal2018 = $sumatotal2018 + 1;
		  }
	  }else{
		  $sumatotal2018="0";
	  } 
	 
$totaldepa2019="SELECT DISTINCT substring(ee.ubigeo,1,2)
FROM exportacion ee 
INNER JOIN sector ON sector.partida = ee.part_nandi
WHERE YEAR(ee.fnum)='2019'";
	 $res_depa2019=$conexpg->query($totaldepa2019); 
if($res_depa2019->num_rows>0){ 
while($fila_depa19=$res_depa2019->fetch_array()){
			  $sumatotal2019 = $sumatotal2019 + 1;
		  }
	  }else{
		  $sumatotal2019="0";
	  } 
	  
	  $totaldepa2020="SELECT DISTINCT substring(ee.ubigeo,1,2)
FROM exportacion ee 
INNER JOIN sector ON sector.partida = ee.part_nandi
WHERE YEAR(ee.fnum)='2020'";
	 $res_depa2020=$conexpg->query($totaldepa2020); 
if($res_depa2020->num_rows>0){ 
while($fila_depa20=$res_depa2020->fetch_array()){
			  $sumatotal2020 = $sumatotal2020 + 1;
		  }
	  }else{
		  $sumatotal2020="0";
	  }
	 
	 $totaldepa2021="SELECT DISTINCT substring(ee.ubigeo,1,2)
FROM exportacion ee 
INNER JOIN sector ON sector.partida = ee.part_nandi
WHERE YEAR(ee.fnum)='2021'";
	 $res_depa2021=$conexpg->query($totaldepa2021); 
if($res_depa2021->num_rows>0){ 
while($fila_depa21=$res_depa2021->fetch_array()){
			  $sumatotal2021 = $sumatotal2021 + 1;
		  }
	  }else{
		  $sumatotal2021="0";
	  }
	 
 }
	
	  $query1 = "SELECT tipo, sector FROM sector GROUP BY tipo, sector ORDER BY sector ASC";
		  
		  $resultado1=$conexpg->query($query1); 
if($resultado1->num_rows>0){ 
		  
		  /*echo"<div class='card'>";
	echo"<div class='card-header card-header-info card-header-icon'>
              <div class='card-icon'>
                <i class='material-icons'>assignment</i>
              </div>
              <h4 class='card-title'><b>Reporte Resumen Anual de Indicadores</b><br> Sector #: Todos │ Fecha Numeracion │ $combo │ Periodo 2012 - 2019 </b> </h4>
            </div>";
		echo"<div class='card-body'>";
		echo"<div class='toolbar'>";
        echo"</div>";
         echo"<div class='material-datatables'>";
		echo"<table id='datatablese' class='table table-striped table-no-bordered table-hover' cellspacing='0' width='100%' style='width:100%'>";
		echo"<thead>
                          <tr>
                              <th><b> N#. </b></th>
							  <th><b>Sector</b></th>
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
                              <th><b> N#. </b></th>
							  <th><b>Sector</b></th>
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
           echo"<tbody>";*/
	              //eliminamos registro
				  $Sqldelsecto="DELETE FROM resumen_sectores WHERE varia_filtro ='$nombres2' ";
				  $rs = $conexpg->query($Sqldelsecto);
		  
			  while($fila1=$resultado1->fetch_array()){

			$items_sector = $items_sector + 1;
			  $cod_tipo = $fila1['tipo'];
			  $cod_secto = $fila1['sector'];
			  
			  $query_sector="SELECT se.sector, se.tipo FROM sector se WHERE se.sector = '$cod_secto' and se.tipo='$cod_tipo' GROUP BY sector, tipo";

				  $res_sector=$conexpg->query($query_sector); 
if($res_sector->num_rows>0){ 
while($fila_sector=$res_sector->fetch_array()){
			  $dat1 = $fila_sector['sector'];
			  $dat2 = $fila_sector['tipo'];
			  $nom_sector = $dat1.' | '.$dat2;
		  }
	  }else{
		  $nom_sector ="---";
	  }

		   if($nombres2=="vfobserdol"){

$query_fob2012="SELECT sector.sector, sector.tipo,
sum(CASE WHEN YEAR(exportacion.fnum)='2012' THEN exportacion.vfobserdol ELSE 0 END) AS a2012,
sum(CASE WHEN YEAR(exportacion.fnum)='2013' THEN exportacion.vfobserdol ELSE 0 END) AS a2013,
sum(CASE WHEN YEAR(exportacion.fnum)='2014' THEN exportacion.vfobserdol ELSE 0 END) AS a2014,
sum(CASE WHEN YEAR(exportacion.fnum)='2015' THEN exportacion.vfobserdol ELSE 0 END) AS a2015,
sum(CASE WHEN YEAR(exportacion.fnum)='2016' THEN exportacion.vfobserdol ELSE 0 END) AS a2016,
sum(CASE WHEN YEAR(exportacion.fnum)='2017' THEN exportacion.vfobserdol ELSE 0 END) AS a2017,
sum(CASE WHEN YEAR(exportacion.fnum)='2018' THEN exportacion.vfobserdol ELSE 0 END) AS a2018,
sum(CASE WHEN YEAR(exportacion.fnum)='2019' THEN exportacion.vfobserdol ELSE 0 END) AS a2019,
sum(CASE WHEN YEAR(exportacion.fnum)='2020' THEN exportacion.vfobserdol ELSE 0 END) AS a2020,
sum(CASE WHEN YEAR(exportacion.fnum)='2021' THEN exportacion.vfobserdol ELSE 0 END) AS a2021
FROM exportacion
INNER JOIN sector ON sector.partida = exportacion.part_nandi
WHERE sector.sector = '$cod_secto' AND sector.tipo='$cod_tipo'
GROUP BY sector,tipo";

			   $res_fob2012=$conexpg->query($query_fob2012); 
if($res_fob2012->num_rows>0){ 
while($fila_fob2012=$res_fob2012->fetch_array()){
			  $year1 = $fila_fob2012['a2012'];
			  $year2 = $fila_fob2012['a2013'];
			  $year3 = $fila_fob2012['a2014'];
			  $year4 = $fila_fob2012['a2015'];
			  $year5 = $fila_fob2012['a2016'];
			  $year6 = $fila_fob2012['a2017'];
			  $year7 = $fila_fob2012['a2018'];
	          $year8 = $fila_fob2012['a2019'];
	$year9 = $fila_fob2012['a2020'];
	$year10 = $fila_fob2012['a2021'];
			  
		  }
	  }else{
		  $year1 ="0.00";
		  $year2 ="0.00";
		  $year3 ="0.00";
		  $year4 ="0.00";
		  $year5 ="0.00";
		  $year6 ="0.00";
		  $year7 ="0.00";
	      $year8 ="0.00";
	$year9 ="0.00";
	$year10 ="0.00";
	  }
		   }
		   
  /*consultamos cantidad de partidas, empresas*/
  if($nombres2=="part_nandi" or $nombres2=="dnombre"){
$query_fob2012="SELECT sector.sector, sector.tipo,
count(DISTINCT CASE WHEN YEAR(exportacion.fnum)='2012' THEN exportacion.".$nombres2." ELSE NULL END) AS a2012,
count(DISTINCT CASE WHEN YEAR(exportacion.fnum)='2013' THEN exportacion.".$nombres2." ELSE NULL END) AS a2013,
count(DISTINCT CASE WHEN YEAR(exportacion.fnum)='2014' THEN exportacion.".$nombres2." ELSE NULL END) AS a2014,
count(DISTINCT CASE WHEN YEAR(exportacion.fnum)='2015' THEN exportacion.".$nombres2." ELSE NULL END) AS a2015,
count(DISTINCT CASE WHEN YEAR(exportacion.fnum)='2016' THEN exportacion.".$nombres2." ELSE NULL END) AS a2016,
count(DISTINCT CASE WHEN YEAR(exportacion.fnum)='2017' THEN exportacion.".$nombres2." ELSE NULL END) AS a2017,
count(DISTINCT CASE WHEN YEAR(exportacion.fnum)='2018' THEN exportacion.".$nombres2." ELSE NULL END) AS a2018,
count(DISTINCT CASE WHEN YEAR(exportacion.fnum)='2019' THEN exportacion.".$nombres2." ELSE NULL END) AS a2019,
count(DISTINCT CASE WHEN YEAR(exportacion.fnum)='2020' THEN exportacion.".$nombres2." ELSE NULL END) AS a2020,
count(DISTINCT CASE WHEN YEAR(exportacion.fnum)='2021' THEN exportacion.".$nombres2." ELSE NULL END) AS a2021
FROM exportacion
INNER JOIN sector ON sector.partida = exportacion.part_nandi 
WHERE sector.sector = '$cod_secto' AND sector.tipo='$cod_tipo'
GROUP BY sector,tipo";

	  $res_fob2012=$conexpg->query($query_fob2012); 
if($res_fob2012->num_rows>0){ 
while($fila_fob2012=$res_fob2012->fetch_array()){
			  $year1 = $fila_fob2012['a2012'];
			  $year2 = $fila_fob2012['a2013'];
			  $year3 = $fila_fob2012['a2014'];
			  $year4 = $fila_fob2012['a2015'];
			  $year5 = $fila_fob2012['a2016'];
			  $year6 = $fila_fob2012['a2017'];
			  $year7 = $fila_fob2012['a2018'];
	          $year8 = $fila_fob2012['a2019'];
	$year9 = $fila_fob2012['a2020'];
	$year10 = $fila_fob2012['a2021'];
		  }
	  }else{
		  $year1 ="0.00";
		  $year2 ="0.00";
		  $year3 ="0.00";
		  $year4 ="0.00";
		  $year5 ="0.00";
		  $year6 ="0.00";
		  $year7 ="0.00";
	      $year8 ="0.00";
	$year9 ="0.00";
	$year10 ="0.00";
	  }
		   }
		   
  /*consultamos cantidad de departamentos*/
  if($nombres2=="depa"){
$query_fob2012="SELECT sector.sector, sector.tipo,
count(DISTINCT CASE WHEN YEAR(exportacion.fnum)='2012' THEN substring(exportacion.ubigeo,1,2) ELSE NULL END) AS a2012,
count(DISTINCT CASE WHEN YEAR(exportacion.fnum)='2013' THEN substring(exportacion.ubigeo,1,2) ELSE NULL END) AS a2013,
count(DISTINCT CASE WHEN YEAR(exportacion.fnum)='2014' THEN substring(exportacion.ubigeo,1,2) ELSE NULL END) AS a2014,
count(DISTINCT CASE WHEN YEAR(exportacion.fnum)='2015' THEN substring(exportacion.ubigeo,1,2) ELSE NULL END) AS a2015,
count(DISTINCT CASE WHEN YEAR(exportacion.fnum)='2016' THEN substring(exportacion.ubigeo,1,2) ELSE NULL END) AS a2016,
count(DISTINCT CASE WHEN YEAR(exportacion.fnum)='2017' THEN substring(exportacion.ubigeo,1,2) ELSE NULL END) AS a2017,
count(DISTINCT CASE WHEN YEAR(exportacion.fnum)='2018' THEN substring(exportacion.ubigeo,1,2) ELSE NULL END) AS a2018,
count(DISTINCT CASE WHEN YEAR(exportacion.fnum)='2019' THEN substring(exportacion.ubigeo,1,2) ELSE NULL END) AS a2019,
count(DISTINCT CASE WHEN YEAR(exportacion.fnum)='2020' THEN substring(exportacion.ubigeo,1,2) ELSE NULL END) AS a2020,
count(DISTINCT CASE WHEN YEAR(exportacion.fnum)='2021' THEN substring(exportacion.ubigeo,1,2) ELSE NULL END) AS a2021
FROM exportacion
INNER JOIN sector ON sector.partida = exportacion.part_nandi 
WHERE sector.sector = '$cod_secto' AND sector.tipo='$cod_tipo'
GROUP BY sector,tipo";
	  $res_fob2012=$conexpg->query($query_fob2012); 
if($res_fob2012->num_rows>0){ 
while($fila_fob2012=$res_fob2012->fetch_array()){
			  $year1 = $fila_fob2012['a2012'];
			  $year2 = $fila_fob2012['a2013'];
			  $year3 = $fila_fob2012['a2014'];
			  $year4 = $fila_fob2012['a2015'];
			  $year5 = $fila_fob2012['a2016'];
			  $year6 = $fila_fob2012['a2017'];
			  $year7 = $fila_fob2012['a2018'];
	          $year8 = $fila_fob2012['a2019'];
	$year9 = $fila_fob2012['a2020'];
	$year10 = $fila_fob2012['a2021'];
		  }
	  }else{
		  $year1 ="0.00";
		  $year2 ="0.00";
		  $year3 ="0.00";
		  $year4 ="0.00";
		  $year5 ="0.00";
		  $year6 ="0.00";
		  $year7 ="0.00";
	      $year8 ="0.00";
	$year9 ="0.00";
	$year10 ="0.00";
	  }
		   }

	  
	  if($year1=='0' or $year1=='' or $year1==NULL){
		  $year1 ="0.00";
	  }
	  if($year2=='0' or $year2=='' or $year2==NULL){
		  $year2 ="0.00";
	  }
	  if($year3=='0' or $year3=='' or $year3==NULL){
		  $year3 ="0.00";
	  }
	  if($year4=='0' or $year4=='' or $year4==NULL){
		  $year4 ="0.00";
	  }
	  if($year5=='0' or $year5=='' or $year5==NULL){
		  $year5 ="0.00";
	  }
	  if($year6=='0' or $year6=='' or $year6==NULL){
		  $year6 ="0.00";
	  }
	  if($year7=='0' or $year7=='' or $year7==NULL){
		  $year7 ="0.00";
	  }
      if($year8=='0' or $year8=='' or $year8==NULL){
		  $year8 ="0.00";
	  }
		if($year9=='0' or $year9=='' or $year9==NULL){
		  $year9 ="0.00";
	  }
		if($year10=='0' or $year10=='' or $year10==NULL){
		  $year10 ="0.00";
	  }   
		 
		if($year8=='0' or $year8=='' or $year8==NULL){
		  $var11 ='0';
		  }else{
		  $var11 = (($year9 / $year8) - 1) * 100;
		  }

		if($sumatotal2019=='0' or $sumatotal2019=='' or $sumatotal2019==NULL){
			   $varitota="0.00";
		   }else{
		   $varitota= (($sumatotal2020 / $sumatotal2019) - 1) * 100;
		   }
		  
		if($sumatotal2020=="0" or $sumatotal2020=="" or $sumatotal2020==NULL){
			  $var22 ="0.00";
		  }else{
		  $var22 = ($year9 / $sumatotal2020) * 100;
		  }
		  
		  $parti='100';
		  
		  
		  /* echo "<tr>";
echo "<td>$items_sector</td>";
echo "<td>$nom_sector</td>";
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
 echo "</tr>"; */ 
				  
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
				  
				  $Sql_insersecto="insert into resumen_sectores (varia_filtro, codigo, descripcion, sector, anio1, anio2, anio3, anio4, anio5, anio6, anio7, anio8, anio9, anio10, variauno, variados
)  values (
'$nombres2',
'$items_sector',
'$nom_sector',
'$dat1',
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
	$rscrea2 = $conexpg->query($Sql_insersecto);
			  
		  }
	
	
/*echo"<thead>";
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
			  echo "<th><font size='2'><b>$varitota %</b></th>";
			  echo "<th><font size='2'><b>$parti</b></th>";
		  echo "</tr>";
		  echo"</thead>";
		  echo"</tbody>";
		echo"</table>";
		echo"</div>";
		echo"</div>";
		echo"</div>";
		echo"</div>";*/
	
	//insertamos totales finales
	$total1 = $sumatotal2012;
		$total2 = $sumatotal2013;
		$total3 = $sumatotal2014;
		$total4 = $sumatotal2015;
		$total5 = $sumatotal2016;
		$total6 = $sumatotal2017;
		$total7 = $sumatotal2018;
		$total8 = $sumatotal2019;
	$total9 = $sumatotal2020;
	$total10 = $sumatotal2021;
	
	$Sql_insersectota="insert into resumen_sectores (varia_filtro, codigo, descripcion, sector, anio1, anio2, anio3, anio4, anio5, anio6, anio7, anio8, anio9, anio10, variauno, variados
)  values (
'$nombres2',
'Total',
'Totales',
'',
'$total1',
'$total2',
'$total3',
'$total4',
'$total5',
'$total6',
'$total7',
'$total8',
'$total9',
'$total10',
'$varitota',
'$parti' )";
	$rscreatota = $conexpg->query($Sql_insersectota);
	
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
 
    <!--<script type="text/javascript" src="../js/jsexport/jquery.dataTables.min.js"></script>-->
    <script type="text/javascript" src="js/jsexport/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="js/jsexport/buttons.flash.min.js"></script>
    <script type="text/javascript" src="js/jsexport/jszip.min.js"></script>
    <script type="text/javascript" src="js/jsexport/pdfmake.min.js"></script>
    <script type="text/javascript" src="js/jsexport/vfs_fonts.js"></script>
    <script type="text/javascript" src="js/jsexport/buttons.html5.min.js"></script>
    <script type="text/javascript" src="js/jsexport/buttons.print.min.js"></script>
  
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
echo"<script>location.href='resumen_procesa.php?by=ok&val=Sectores&fit=$combo'</script>";
?>
</html>