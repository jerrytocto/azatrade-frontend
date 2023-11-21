<?php
session_start();
if (isset($_SESSION['login_usuario'])){
}else{
	if(!isset($_SESSION["login_usuario"]) || $_SESSION["login_usuario"]==null){
	//print "<script>alert('Acceso invalido! - Inicia Sesion para Acceder');window.location='$enlace_actual';</script>";
		print "<script>window.location='../../';</script>";
}
}
set_time_limit(250);
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
extract(year from exportacion.fnum) <= '2016'";
  
  /*if (isset($_POST['IsSmallBusiness'])) {
    //echo '<p>Has elegido el sexo '.$_POST['sex'].'</p>';
	$radio = $_POST['IsSmallBusiness'];
	if($radio=='fnum'){
		$tituradio='Fecha Numeraci&oacute;n';
		$opci1='opcion1';
		$filtrofecha='extract(year from exportacion.fnum)';
		$wherefecha ="extract(year from exportacion.fnum) >= '2012' AND
extract(year from exportacion.fnum) <= '2018'";
	}else{
		$tituradio='Fecha Embarcaci&oacute;n';
		$opci1='opcion2';
		$filtrofecha='extract(year from exportacion.femb)';
		$wherefecha ="extract(year from exportacion.femb) >= '2012' AND
extract(year from exportacion.femb) <= '2018'";
	}
}*/
	
	/*primero hacemos la sumario general segun filtro de seleccion*/
  if($nombres2=="vfobserdol" or $nombres2=="vpesnet" or $nombres2=="vpesbru" or $nombres2=="qunifis" or $nombres2=="qunicom"){
   $sqlyear="SELECT
SUM(resumen_partidas.fob2012) as a2012,
SUM(resumen_partidas.fob2013) as a2013,
SUM(resumen_partidas.fob2014) as a2014,
SUM(resumen_partidas.fob2015) as a2015,
SUM(resumen_partidas.fob2016) as a2016
FROM
resumen_partidas";
  }
  if($nombres2=="total"){
	   $sqlyear="SELECT 'total' as tot,
Sum(CASE ".$filtrofecha." WHEN '2012' THEN 1 ELSE 0 END) AS a2012,
Sum(CASE ".$filtrofecha." WHEN '2013' THEN 1 ELSE 0 END) AS a2013,
Sum(CASE ".$filtrofecha." WHEN '2014' THEN 1 ELSE 0 END) AS a2014,
Sum(CASE ".$filtrofecha." WHEN '2015' THEN 1 ELSE 0 END) AS a2015,
Sum(CASE ".$filtrofecha." WHEN '2016' THEN 1 ELSE 0 END) AS a2016,
FROM exportacion
LEFT JOIN arancel ON (CASE char_length(exportacion.part_nandi::TEXT) WHEN '9' THEN '0' || exportacion.part_nandi ELSE exportacion.part_nandi::TEXT END) = arancel.idarancel
WHERE ".$wherefecha." ";
}
if($nombres2=="ndcl" or $nombres2=="dnombre" or $nombres2=="part_nandi" or $nombres2=="cpuedes" or $nombres2=="cadu" or $nombres2=="cage" or $nombres2=="cviatra"){
	 $sqlyear="SELECT
Sum(resumen_partidas.emp2012) AS a2012,
Sum(resumen_partidas.emp2013) AS a2013,
Sum(resumen_partidas.emp2014) AS a2014,
Sum(resumen_partidas.emp2015) AS a2015,
Sum(resumen_partidas.emp2016) AS a2016
FROM
resumen_partidas";
}
if($nombres2=="cpaides"){
	$sqlyear="SELECT
Sum(resumen_partidas.merca2012) AS a2012,
Sum(resumen_partidas.merca2013) AS a2013,
Sum(resumen_partidas.merca2014) AS a2014,
Sum(resumen_partidas.merca2015) AS a2015,
Sum(resumen_partidas.merca2016) AS a2016
FROM
resumen_partidas";
}
if($nombres2=="diferen"){
	$sqlyear="SELECT
Sum(resumen_partidas.precio2012) AS a2012,
Sum(resumen_partidas.precio2013) AS a2013,
Sum(resumen_partidas.precio2014) AS a2014,
Sum(resumen_partidas.precio2015) AS a2015,
Sum(resumen_partidas.precio2016) AS a2016
FROM
resumen_partidas";
}
if($nombres2=="provi" or $nombres2=="distri"){
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
COUNT(distinct CASE ".$filtrofecha." WHEN '2016' THEN ".$varia." ELSE NULL END) AS a2016
FROM exportacion
LEFT JOIN arancel ON (CASE char_length(exportacion.part_nandi::TEXT) WHEN '9' THEN '0' || exportacion.part_nandi ELSE exportacion.part_nandi::TEXT END) = arancel.idarancel
WHERE ".$wherefecha."
GROUP BY exportacion.part_nandi, arancel.descripcion";
}
if($nombres2=="depa"){
	$sqlyear="SELECT
Sum(resumen_partidas.depa2012) AS a2012,
Sum(resumen_partidas.depa2013) AS a2013,
Sum(resumen_partidas.depa2014) AS a2014,
Sum(resumen_partidas.depa2015) AS a2015,
Sum(resumen_partidas.depa2016) AS a2016
FROM
resumen_partidas";
}
	  $result_year= pg_query($sqlyear) or die("Error en la Consulta SQL Sumatoria Total");
	  $numReg_year = pg_num_rows($result_year);
	  if($numReg_year>0){
		   while ($fila_year=pg_fetch_array($result_year)) {
			   
		   $sumatotal2012= $fila_year['a2012'];
		   $sumatotal2013= $fila_year['a2013'];
		   $sumatotal2014= $fila_year['a2014'];
		   $sumatotal2015= $fila_year['a2015'];
		   $sumatotal2016= $fila_year['a2016'];
		   
		   
		   if($sumatotal2014=='0'){
			   $varitota="0.00";
		   }else{
		   $varitota= number_format((($sumatotal2015 / $sumatotal2014) - 1) * 100,2);
		   }
		   $parti='100 %';
		   }
	  }else{
		  $sumatotal2012="0";
		  $sumatotal2013="0";
		  $sumatotal2014="0";
		  $sumatotal2015="0";
		  $sumatotal2016="0";
		  $varitota="0.00";
		  $parti="0.00";
	  }

  /* listamos el reporte */
  if($nombres2=="vfobserdol" or $nombres2=="vpesnet" or $nombres2=="vpesbru" or $nombres2=="qunifis" or $nombres2=="qunicom"){
   $query1 = "SELECT
resumen_partidas.codi,
resumen_partidas.partida,
resumen_partidas.descripcion,
resumen_partidas.fob2012 as a2012,
resumen_partidas.fob2013 as a2013,
resumen_partidas.fob2014 as a2014,
resumen_partidas.fob2015 as a2015,
resumen_partidas.fob2016 as a2016
FROM
resumen_partidas";
  }
  
  if($nombres2=="diferen"){
  $query1 = "SELECT
resumen_partidas.codi,
resumen_partidas.partida,
resumen_partidas.descripcion,
resumen_partidas.precio2012 AS a2012,
resumen_partidas.precio2013 AS a2013,
resumen_partidas.precio2014 AS a2014,
resumen_partidas.precio2015 AS a2015,
resumen_partidas.precio2016 AS a2016
FROM
resumen_partidas";
  }
  
  if($nombres2=="total"){
 $query1 = "SELECT exportacion.part_nandi,
arancel.descripcion,
Sum(CASE ".$filtrofecha." WHEN '2012' THEN 1 ELSE 0 END) AS a2012,
Sum(CASE ".$filtrofecha." WHEN '2013' THEN 1 ELSE 0 END) AS a2013,
Sum(CASE ".$filtrofecha." WHEN '2014' THEN 1 ELSE 0 END) AS a2014,
Sum(CASE ".$filtrofecha." WHEN '2015' THEN 1 ELSE 0 END) AS a2015,
Sum(CASE ".$filtrofecha." WHEN '2016' THEN 1 ELSE 0 END) AS a2016,
FROM exportacion
LEFT JOIN arancel ON (CASE char_length(exportacion.part_nandi::TEXT) WHEN '9' THEN '0' || exportacion.part_nandi ELSE exportacion.part_nandi::TEXT END) = arancel.idarancel
WHERE ".$wherefecha."
GROUP BY exportacion.part_nandi, arancel.descripcion";
  }
  if($nombres2=="ndcl" or $nombres2=="dnombre" or $nombres2=="part_nandi" or $nombres2=="cpuedes" or $nombres2=="cadu" or $nombres2=="cage" or $nombres2=="cviatra"){
  $query1 = "SELECT
resumen_partidas.codi,
resumen_partidas.partida,
resumen_partidas.descripcion,
resumen_partidas.emp2012 AS a2012,
resumen_partidas.emp2013 AS a2013,
resumen_partidas.emp2014 AS a2014,
resumen_partidas.emp2015 AS a2015,
resumen_partidas.emp2016 AS a2016
FROM
resumen_partidas";
  }
  if($nombres2=="cpaides"){
	  $query1 = "SELECT
resumen_partidas.codi,
resumen_partidas.partida,
resumen_partidas.descripcion,
resumen_partidas.merca2012 AS a2012,
resumen_partidas.merca2013 AS a2013,
resumen_partidas.merca2014 AS a2014,
resumen_partidas.merca2015 AS a2015,
resumen_partidas.merca2016 AS a2016
FROM
resumen_partidas"; 
  }
   if($nombres2=="provi" or $nombres2=="distri"){
	    if($nombres2=="depa"){
		  $variaA='substring(exportacion.ubigeo,1,2)';
	  }else if($nombres2=="provi"){
		  $variaA='substring(exportacion.ubigeo,3,2)';
	  }else{
		  $variaA='substring(exportacion.ubigeo,5,2)';
	  }
  $query1 = "SELECT exportacion.part_nandi,
arancel.descripcion,
COUNT(distinct CASE ".$filtrofecha." WHEN '2012' THEN ".$variaA." ELSE NULL END) AS a2012,
COUNT(distinct CASE ".$filtrofecha." WHEN '2013' THEN ".$variaA." ELSE NULL END) AS a2013,
COUNT(distinct CASE ".$filtrofecha." WHEN '2014' THEN ".$variaA." ELSE NULL END) AS a2014,
COUNT(distinct CASE ".$filtrofecha." WHEN '2015' THEN ".$variaA." ELSE NULL END) AS a2015,
COUNT(distinct CASE ".$filtrofecha." WHEN '2016' THEN ".$variaA." ELSE NULL END) AS a2016
FROM exportacion
LEFT JOIN arancel ON (CASE char_length(exportacion.part_nandi::TEXT) WHEN '9' THEN '0' || exportacion.part_nandi ELSE exportacion.part_nandi::TEXT END) = arancel.idarancel
LEFT JOIN departamento ON substring(exportacion.ubigeo,1,2) = departamento.iddepartamento
WHERE ".$wherefecha."
GROUP BY exportacion.part_nandi, arancel.descripcion";
  }
  if($nombres2=="depa"){
	  $query1 = "SELECT
resumen_partidas.codi,
resumen_partidas.partida,
resumen_partidas.descripcion,
resumen_partidas.depa2012 AS a2012,
resumen_partidas.depa2013 AS a2013,
resumen_partidas.depa2014 AS a2014,
resumen_partidas.depa2015 AS a2015,
resumen_partidas.depa2016 AS a2016
FROM
resumen_partidas";
  }
	
	$resultado1 = pg_query($query1) or die("Error en la Consulta SQL");
	  $numReg = pg_num_rows($resultado1);
	  if($numReg>0){
		  
		  echo"<div class='card'>";
	echo"<div class='card-header card-header-info card-header-icon'>
              <div class='card-icon'>
                <i class='material-icons'>assignment</i>
              </div>
              <h4 class='card-title'><b>Reporte Resumen Anual de Indicadores</b><br> Partida #: Todos │ Fecha Numeracion │ $combo │ Periodo 2012 - 2016 </b> </h4>
            </div>";
		echo"<div class='card-body'>";
		echo"<div class='toolbar'>";
		echo"<a href='#cdro'><button class='btn btn-info btn-sm'> Ver Cuadro Estadístico </button></a>";
        echo"</div>";
         echo"<div class='material-datatables'>";
		echo"<table id='datatablese' class='table table-striped table-no-bordered table-hover' cellspacing='0' width='100%' style='width:100%'>";
		echo"<thead>
                          <tr>
                              <th><b> N#. Partida </b></th>
							  <th><b>Descripcion</b></th>
                              <th>2012</th>
                              <th>2013</th>
                              <th>2014</th>
                              <th>2015</th>
							  <th>2016</th>
							  <th>Var.%15/14</th>
							  <th>Var.%15</th>
                          </tr>
                      </thead>";
		 echo"<tfoot>
                          <tr>
                              <th><b> N#. Partida </b></th>
							  <th><b>Descripcion</b></th>
                              <th>2012</th>
                              <th>2013</th>
                              <th>2014</th>
                              <th>2015</th>
							  <th>2016</th>
							  <th>Var.%15/14</th>
							  <th>Var.%15</th>
                          </tr>
                      </tfoot>";
           echo"<tbody>";
		  
		  while ($fila1=pg_fetch_array($resultado1)) {
			  
			  $cod_part= $fila1['codi'];
		  $nom_partix= $fila1['descripcion'];
		  
		  if($nom_partix==""){
		    $nom_parti="-----";
			  }else{
          $nom_parti= $fila1['descripcion'];
			  }
			  
	      
		  $year1= $fila1['a2012'];
		  $year2= $fila1['a2013'];
		  $year3= $fila1['a2014'];
		  $year4= $fila1['a2015'];
		  $year5= $fila1['a2016'];
		  
		 
		if($year3=='0'){
		  $var11 ='0';
		  }else{
		  $var11 = number_format((($year4 / $year3) - 1) * 100,2);
		  }
		  
		if($sumatotal2015=="0"){
			  $var22 ="0.00";
		  }else{
		  $var22 = number_format(($year4 / $sumatotal2015) * 100,2);
		  }
		  
		  
		   echo "<tr>";
echo "<td>$cod_part</td>";
echo "<td>$nom_parti</td>";
echo "<td>".number_format($year1,2)."</td>";
echo "<td>".number_format($year2,2)."</td>";
echo "<td>".number_format($year3,2)."</td>";
echo "<td>".number_format($year4,2)."</td>";
echo "<td>".number_format($year5,2)."</td>";
echo "<td>$var11%</td>";
echo "<td>$var22%</td>";
 echo "</tr>";
			  
		  }
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
          <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', '2012', '2013', '2014', '2015', '2016'],
<?php
 if($nombres2=="vfobserdol" or $nombres2=="vpesnet" or $nombres2=="vpesbru" or $nombres2=="qunifis" or $nombres2=="qunicom"){
   $query1x = "SELECT
resumen_partidas.codi,
resumen_partidas.partida,
resumen_partidas.descripcion,
resumen_partidas.fob2012 as a2012,
resumen_partidas.fob2013 as a2013,
resumen_partidas.fob2014 as a2014,
resumen_partidas.fob2015 as a2015,
resumen_partidas.fob2016 as a2016
FROM
resumen_partidas ORDER BY resumen_partidas.fob2015 DESC LIMIT 10";
  }
  
  if($nombres2=="diferen"){
  $query1x = "SELECT
resumen_partidas.codi,
resumen_partidas.partida,
resumen_partidas.descripcion,
resumen_partidas.precio2012 AS a2012,
resumen_partidas.precio2013 AS a2013,
resumen_partidas.precio2014 AS a2014,
resumen_partidas.precio2015 AS a2015,
resumen_partidas.precio2016 AS a2016
FROM
resumen_partidas ORDER BY resumen_partidas.precio2015 DESC LIMIT 10";
  }
  
  if($nombres2=="total"){
 $query1x = "SELECT exportacion.part_nandi,
arancel.descripcion,
Sum(CASE ".$filtrofecha." WHEN '2012' THEN 1 ELSE 0 END) AS a2012,
Sum(CASE ".$filtrofecha." WHEN '2013' THEN 1 ELSE 0 END) AS a2013,
Sum(CASE ".$filtrofecha." WHEN '2014' THEN 1 ELSE 0 END) AS a2014,
Sum(CASE ".$filtrofecha." WHEN '2015' THEN 1 ELSE 0 END) AS a2015,
Sum(CASE ".$filtrofecha." WHEN '2016' THEN 1 ELSE 0 END) AS a2016,
FROM exportacion
LEFT JOIN arancel ON (CASE char_length(exportacion.part_nandi::TEXT) WHEN '9' THEN '0' || exportacion.part_nandi ELSE exportacion.part_nandi::TEXT END) = arancel.idarancel
WHERE ".$wherefecha."
GROUP BY exportacion.part_nandi, arancel.descripcion ORDER BY a2015 DESC LIMIT 6";
  }
  if($nombres2=="ndcl" or $nombres2=="dnombre" or $nombres2=="part_nandi" or $nombres2=="cpuedes" or $nombres2=="cadu" or $nombres2=="cage" or $nombres2=="cviatra"){
  $query1x = "SELECT
resumen_partidas.codi,
resumen_partidas.partida,
resumen_partidas.descripcion,
resumen_partidas.emp2012 AS a2012,
resumen_partidas.emp2013 AS a2013,
resumen_partidas.emp2014 AS a2014,
resumen_partidas.emp2015 AS a2015,
resumen_partidas.emp2016 AS a2016
FROM
resumen_partidas ORDER BY resumen_partidas.emp2015 DESC LIMIT 10";
  }
  if($nombres2=="cpaides"){
	  $query1x = "SELECT
resumen_partidas.codi,
resumen_partidas.partida,
resumen_partidas.descripcion,
resumen_partidas.merca2012 AS a2012,
resumen_partidas.merca2013 AS a2013,
resumen_partidas.merca2014 AS a2014,
resumen_partidas.merca2015 AS a2015,
resumen_partidas.merca2016 AS a2016
FROM
resumen_partidas ORDER BY resumen_partidas.merca2015 DESC LIMIT 10"; 
  }
   if($nombres2=="provi" or $nombres2=="distri"){
	    if($nombres2=="depa"){
		  $variaA='substring(exportacion.ubigeo,1,2)';
	  }else if($nombres2=="provi"){
		  $variaA='substring(exportacion.ubigeo,3,2)';
	  }else{
		  $variaA='substring(exportacion.ubigeo,5,2)';
	  }
  $query1x = "SELECT exportacion.part_nandi,
arancel.descripcion,
COUNT(distinct CASE ".$filtrofecha." WHEN '2012' THEN ".$variaA." ELSE NULL END) AS a2012,
COUNT(distinct CASE ".$filtrofecha." WHEN '2013' THEN ".$variaA." ELSE NULL END) AS a2013,
COUNT(distinct CASE ".$filtrofecha." WHEN '2014' THEN ".$variaA." ELSE NULL END) AS a2014,
COUNT(distinct CASE ".$filtrofecha." WHEN '2015' THEN ".$variaA." ELSE NULL END) AS a2015,
COUNT(distinct CASE ".$filtrofecha." WHEN '2016' THEN ".$variaA." ELSE NULL END) AS a2016
FROM exportacion
LEFT JOIN arancel ON (CASE char_length(exportacion.part_nandi::TEXT) WHEN '9' THEN '0' || exportacion.part_nandi ELSE exportacion.part_nandi::TEXT END) = arancel.idarancel
LEFT JOIN departamento ON substring(exportacion.ubigeo,1,2) = departamento.iddepartamento
WHERE ".$wherefecha."
GROUP BY exportacion.part_nandi, arancel.descripcion ORDER BY a2015 DESC LIMIT 6";
  }
  if($nombres2=="depa"){
	  $query1x = "SELECT
resumen_partidas.codi,
resumen_partidas.partida,
resumen_partidas.descripcion,
resumen_partidas.depa2012 AS a2012,
resumen_partidas.depa2013 AS a2013,
resumen_partidas.depa2014 AS a2014,
resumen_partidas.depa2015 AS a2015,
resumen_partidas.depa2016 AS a2016
FROM
resumen_partidas ORDER BY resumen_partidas.depa2015 DESC LIMIT 10";
  }
  
	  $resultado1x = pg_query($query1x) or die("Error en la Consulta SQL");
	  $numRegx = pg_num_rows($resultado1x);
	  if($numRegx>0){
		  while ($fila1x=pg_fetch_array($resultado1x)) {
		  $cod_part= $fila1x['codi'];
		  $nom_partix= $fila1x['descripcion'];
		  
		  if($nom_partix==""){
		    $nom_parti="-----";
			  }else{
          $nom_parti= $fila1x['descripcion'];
			  }

		  $year1= $fila1x['a2012'];
		  $year2= $fila1x['a2013'];
		  $year3= $fila1x['a2014'];
		  $year4= $fila1x['a2015'];
		  $year5= $fila1x['a2016'];
		
?>
['<?php echo $nom_parti; ?>',  <?php echo $year1; ?>, <?php echo $year2; ?>, <?php echo $year3; ?>, <?php echo $year4; ?>, <?php echo $year5; ?>],
<?php
}
}
?>
/*['Texto1', 20.21],
['Texto2', 4.28],
['Texto3', 17.26],
['Texto4', 10.25]*/
]);
var options = {
          title: 'Partidas Resumen Anual de Exportaciones <?=$combo;?> ',
          /*curveType: 'function',
          legend: { position: 'bottom' }*/
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
          
          <div class="col-md-12 ml-auto mr-auto" id="cdro">
       <div class="chart" id="curve_chart"></div>
       </div>
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
	pg_close($conexpg);
?>
</html>