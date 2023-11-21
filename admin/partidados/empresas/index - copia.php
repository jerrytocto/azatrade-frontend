<?php
session_start();
if (isset($_SESSION['usuario'])){
}else{
	if(!isset($_SESSION["usuario"]) || $_SESSION["usuario"]==null){
	//print "<script>alert('Acceso invalido! - Inicia Sesion para Acceder');window.location='$enlace_actual';</script>";
}
}
set_time_limit(500);
$partida1 = $_POST["varipartidaempre"];
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
        <!--<div class="page-header register-page header-filter" filter-color="black" style="background-image: url('../../img/plan.jpg'); background-size: cover; background-position: top center;">-->
  <!--<div class="container">-->
           <!--<div class="content">
                      <div class="container-fluid">
            <div class="row">-->
            <div class='col-md-12'>

            <?php
				include("../../incBD/inibd.php");
	///echo"$partida1 xx";
				
$filtrofecha ="extract(year from exportacion.fnum)";
$nombres2 = "vfobserdol";
$wherefecha = "extract(year from exportacion.fnum) >= '2012' AND extract(year from exportacion.fnum) <= '2018'";
				
$sqlyear="SELECT 'vfobserdol' as VALOR, 
      SUM(CASE extract(year from exportacion.fnum) WHEN '2012' THEN exportacion.vfobserdol ELSE 0 END) AS a2012, 
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2013' THEN exportacion.vfobserdol ELSE 0 END) AS a2013, 
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2014' THEN exportacion.vfobserdol ELSE 0 END) AS a2014, 
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2015' THEN exportacion.vfobserdol ELSE 0 END) AS a2015, 
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2016' THEN exportacion.vfobserdol ELSE 0 END) AS a2016,
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2017' THEN exportacion.vfobserdol ELSE 0 END) AS a2017,
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2018' THEN exportacion.vfobserdol ELSE 0 END) AS a2018,
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2019' THEN exportacion.vfobserdol ELSE 0 END) AS a2019
FROM exportacion where extract(year from exportacion.fnum) >= '2012' AND extract(year from exportacion.fnum) <= '2019' AND exportacion.part_nandi=".$partida1." ";
/*$result_year= pg_query($sqlyear) or die(pg_last_error());
	  $numReg_year = pg_num_rows($result_year);
	  if($numReg_year>0){
		   while ($fila_year=pg_fetch_array($result_year)) {*/
				$result_year=$conexpg->query($sqlyear); 
if($result_year->num_rows>0){ 
while($fila_year=$result_year->fetch_array()){
			    $dife_precio= $fila_year['diferen'];
				$cuenta_unicos= $fila_year['cuenta'];
				$depart_x= $fila_year['depart'];
				
			if( $dife_precio=="diferen"){
				
				$dife_2012= $fila_year['a2012'];
		        $dife_2012x= $fila_year['a2012x'];
				if($dife_2012x=="0" or  $dife_2012x=="0.00"){
					$sumatotal2012= "0.00";
				}else{
					$sumatotal2012=  number_format($dife_2012 / $dife_2012x,2);
				}
				
				$dife_2013= $fila_year['a2013'];
		        $dife_2013x= $fila_year['a2013x'];
				if($dife_2013x=="0" or  $dife_2013x=="0.00"){
					$sumatotal2013= "0.00";
				}else{
					$sumatotal2013=  number_format($dife_2013 / $dife_2013x,2);
				}
				
				$dife_2014= $fila_year['a2014'];
		        $dife_2014x= $fila_year['a2014x'];
				if($dife_2014x=="0" or  $dife_2014x=="0.00"){
					$sumatotal2014= "0.00";
				}else{
					$sumatotal2014=  number_format($dife_2014 / $dife_2014x,2);
				}
				
				$dife_2015= $fila_year['a2015'];
		        $dife_2015x= $fila_year['a2015x'];
				if($dife_2015x=="0" or  $dife_2015x=="0.00"){
					$sumatotal2015= "0.00";
				}else{
					$sumatotal2015=  number_format($dife_2015 / $dife_2015x,2);
				}
				
				$dife_2016= $fila_year['a2016'];
		        $dife_2016x= $fila_year['a2016x'];
				if($dife_2016x=="0" or  $dife_2016x=="0.00"){
					$sumatotal2016= "0.00";
				}else{
					$sumatotal2016=  number_format($dife_2016 / $dife_2016x,2);
				}
				
				$dife_2017= $fila_year['a2017'];
		        $dife_2017x= $fila_year['a2017x'];
				if($dife_2017x=="0" or  $dife_2017x=="0.00"){
					$sumatotal2017= "0.00";
				}else{
					$sumatotal2017=  number_format($dife_2017 / $dife_2017x,2);
				}
				
				$dife_2018= $fila_year['a2018'];
		        $dife_2018x= $fila_year['a2018x'];
				if($dife_2018x=="0" or  $dife_2018x=="0.00"){
					$sumatotal2018= "0.00";
				}else{
					$sumatotal2018=  number_format($dife_2018 / $dife_2018x,2);
				}
				
				$dife_2019= $fila_year['a2019'];
		        $dife_2019x= $fila_year['a2019x'];
				if($dife_2019x=="0" or  $dife_2019x=="0.00"){
					$sumatotal2019= "0.00";
				}else{
					$sumatotal2019=  number_format($dife_2019 / $dife_2019x,2);
				}
				
			}else if($cuenta_unicos=="cuenta"){
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
			   $varitota='0.00';
		   }else{
		   $varitota= number_format((($sumatotal2018 / $sumatotal2017) - 1) * 100,2);
		   }
		   
		   if($sumatotal2018=='0'){
			   $parti='0.00 %';
		   }else{
		   $parti='100 %';
		   }
		   
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
				 /*generamos codigo aletorio*/				
				
   $query1 = "SELECT exportacion.dnombre, 
   SUM(CASE extract(year from exportacion.fnum) WHEN '2012' THEN exportacion.vfobserdol ELSE 0 END) AS a2012, 
   SUM(CASE extract(year from exportacion.fnum) WHEN '2013' THEN exportacion.vfobserdol ELSE 0 END) AS a2013, 
   SUM(CASE extract(year from exportacion.fnum) WHEN '2014' THEN exportacion.vfobserdol ELSE 0 END) AS a2014, 
   SUM(CASE extract(year from exportacion.fnum) WHEN '2015' THEN exportacion.vfobserdol ELSE 0 END) AS a2015, 
   SUM(CASE extract(year from exportacion.fnum) WHEN '2016' THEN exportacion.vfobserdol ELSE 0 END) AS a2016,
   SUM(CASE extract(year from exportacion.fnum) WHEN '2017' THEN exportacion.vfobserdol ELSE 0 END) AS a2017,
   SUM(CASE extract(year from exportacion.fnum) WHEN '2018' THEN exportacion.vfobserdol ELSE 0 END) AS a2018,
   SUM(CASE extract(year from exportacion.fnum) WHEN '2019' THEN exportacion.vfobserdol ELSE 0 END) AS a2019
   FROM exportacion where extract(year from exportacion.fnum) >= '2012' AND extract(year from exportacion.fnum) <= '2019' AND exportacion.part_nandi=".$partida1." GROUP BY exportacion.dnombre";
  
/*$resultado1 = pg_query($query1) or die(pg_last_error());
	  $numReg = pg_num_rows($resultado1);*/
				$resultado1=$conexpg->query($query1); 
if($resultado1->num_rows>0){ 
				
if($resultado1!=0){//inicia si hay resultados

echo"<div class='col-md-12'>";
        echo"<div class='card'>";
	echo"<div class='card-header card-header-info card-header-icon'>
              <div class='card-icon'>
                <i class='material-icons'>assignment</i>
              </div>
              <h4 class='card-title'><b>Reporte Empresas Exportadoras Evolucion Anual de Exportaciones</b><br> Partida #: $partida1 │ Fecha Numeracion │ Valor FOB USD │ Periodo 2012 - 2019 </b> </h4>
            </div>";
		echo"<div class='card-body'>";
		echo"<div class='toolbar'>
		<a href='#empresa'><button class='btn btn-info btn-sm'> Ver Estadística </button></a>
                  </div>";
         echo"<div class='material-datatables'>";
		echo"<table id='datatables' class='table table-striped table-no-bordered table-hover' cellspacing='0' width='100%' style='width:100%'>";
		  echo"<thead>
                          <tr>
                              <th>Empresa Exportadora</th>
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
                               <th>Empresa Exportadora</th>
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
		  //while ($fila1=pg_fetch_array($resultado1)) {
			  while($fila1=$resultado1->fetch_array()){
		  $dife_deta= $fila1['diferen'];  
		  $codi= $codi + 1;
		  $val1= $fila1['dnombre'];
		  if($dife_deta=="diferen"){
			  
			    $dife2012= $fila1['a2012'];
		        $dife2012x= $fila1['a2012x'];
				if($dife2012x=="0" or  $dife2012x=="0.00"){
					$year3= "0.00";
				}else{
					$year3= number_format($dife2012 / $dife2012x,2);
				}
				
				$dife2013= $fila1['a2013'];
		        $dife2013x= $fila1['a2013x'];
				if($dife2013x=="0" or  $dife2013x=="0.00"){
					$year4= "0.00";
				}else{
					$year4= number_format($dife2013 / $dife2013x,2);
				}
				
				$dife2014= $fila1['a2014'];
		        $dife2014x= $fila1['a2014x'];
				if($dife2014x=="0" or  $dife2014x=="0.00"){
					$year5= "0.00";
				}else{
					$year5= number_format($dife2014 / $dife2014x,2);
				}
				
				$dife2015= $fila1['a2015'];
		        $dife2015x= $fila1['a2015x'];
				if($dife2015x=="0" or  $dife2015x=="0.00"){
					$year6= "0.00";
				}else{
					$year6= number_format($dife2015 / $dife2015x,2);
				}
				
				$dife2016= $fila1['a2016'];
		        $dife2016x= $fila1['a2016x'];
				if($dife2016x=="0" or  $dife2016x=="0.00"){
					$year7= "0.00";
				}else{
					$year7= number_format($dife2016 / $dife2016x,2);
				}
			  
			  $dife2017= $fila1['a2017'];
		      $dife2017x= $fila1['a2017x'];
			  if($dife2017x=="0" or  $dife2017x=="0.00"){
					$year8= "0.00";
				}else{
					$year8= number_format($dife2017 / $dife2017x,2);
				}
			  
			  $dife2018 = $fila1['a2018'];
		      $dife2018x = $fila1['a2018x'];
			  if($dife2018x == "0" or $dife2018x == "0.00"){
					$year9 = "0.00";
				}else{
					$year9 = number_format($dife2018 / $dife2018x,2);
				}
			  
			  $dife2019 = $fila1['a2019'];
		      $dife2019x = $fila1['a2019x'];
			  if($dife2019x == "0" or $dife2019x == "0.00"){
					$year9 = "0.00";
				}else{
					$year9 = number_format($dife2019 / $dife2019x,2);
				}
				
		  }else{
		  $year3= $fila1['a2012'];
		  $year4= $fila1['a2013'];
		  $year5= $fila1['a2014'];
		  $year6= $fila1['a2015'];
		  $year7= $fila1['a2016'];
		  $year8= $fila1['a2017'];
		  $year9= $fila1['a2018'];
		  $year10= $fila1['a2019'];
		  }
		 
		 if($year8=='0'){
		  $var11 ='0';
		  }else{
		  $var11 = number_format((($year9 / $year8) - 1) * 100,2);
		  }
		 
		 if($sumatotal2018=='0'){
			  $var22="0.00";
		  }else{
		  $var22 = number_format(($year9 / $sumatotal2018) * 100,2);
		  }
		  
		  echo "<tr>";
//echo "<td>$codi</td>";
echo "<td>$val1</td>";
echo "<td>$year3</td>";
echo "<td>$year4</td>";
echo "<td>$year5</td>";
echo "<td>$year6</td>";
echo "<td>$year7</td>";
echo "<td>$year8</td>";
echo "<td>$year9</td>";
echo "<td>$year10</td>";
echo "<td>$var11%</td>";
echo "<td>$var22%</td>";
 echo "</tr>";
		  }
		  
		  echo"<thead>";
		  echo "<tr>";
		 echo "<th align='center'><b>Total:</b></th>";
		  echo "<th><b>$sumatotal2012</b></th>";
		   echo "<th><b>$sumatotal2013</b></th>";
		    echo "<th><b>$sumatotal2014</b></th>";
			 echo "<th><b>$sumatotal2015</b></th>";
			  echo "<th><b>$sumatotal2016</b></th>";
	           echo "<th><b>$sumatotal2017</b></th>";
	            echo "<th><b>$sumatotal2018</b></th>";
	             echo "<th><b>$sumatotal2019</b></th>";
			     echo "<th><b>$varitota %</b></th>";
			      echo "<th><b>$parti</b></th>";
		  echo "</tr>";
		  echo"</thead>";
		  echo"</tbody>";
		  echo "</table>";
		  echo"</div>";
		  echo"</div>";
		  echo"</div>";
		  echo"</div>";
		  echo "</div></div></div>";
		   ?>
<?php		   
	}
}
?>

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
        ['Empresas', '2012', '2013', '2014', '2015', '2016', '2017', '2018', '2019'],
<?php
if($nombres2=="vfobserdol" or $nombres2=="vpesnet" or $nombres2=="vpesbru" or $nombres2=="qunifis" or $nombres2=="qunicom"){
   $query1 = "SELECT exportacion.dnombre, SUM(CASE ".$filtrofecha." WHEN '2012' THEN exportacion.$nombres2 ELSE 0 END) AS a2012, 
   SUM(CASE ".$filtrofecha." WHEN '2013' THEN exportacion.".$nombres2." ELSE 0 END) AS a2013, 
   SUM(CASE ".$filtrofecha." WHEN '2014' THEN exportacion.".$nombres2." ELSE 0 END) AS a2014, 
   SUM(CASE ".$filtrofecha." WHEN '2015' THEN exportacion.".$nombres2." ELSE 0 END) AS a2015,
   SUM(CASE ".$filtrofecha." WHEN '2016' THEN exportacion.".$nombres2." ELSE 0 END) AS a2016, 
   SUM(CASE ".$filtrofecha." WHEN '2017' THEN exportacion.".$nombres2." ELSE 0 END) AS a2017,
   SUM(CASE ".$filtrofecha." WHEN '2018' THEN exportacion.".$nombres2." ELSE 0 END) AS a2018,
   SUM(CASE ".$filtrofecha." WHEN '2019' THEN exportacion.".$nombres2." ELSE 0 END) AS a2019
   FROM exportacion where ".$wherefecha." AND exportacion.part_nandi=".$partida1." GROUP BY exportacion.dnombre ORDER BY a2018 DESC LIMIT 5";
  }
  
  if($nombres2=="diferen"){
  $query1 = "SELECT
'diferen' as diferen,
exportacion.dnombre,
SUM(CASE ".$filtrofecha." WHEN '2012' THEN exportacion.vfobserdol ELSE 0 END) AS a2012,
SUM(CASE ".$filtrofecha." WHEN '2012' THEN exportacion.vpesnet ELSE 0 END) AS a2012x,
SUM(CASE ".$filtrofecha." WHEN '2013' THEN exportacion.vfobserdol ELSE 0 END) AS a2013,
SUM(CASE ".$filtrofecha." WHEN '2013' THEN exportacion.vpesnet ELSE 0 END) AS a2013x,
SUM(CASE ".$filtrofecha." WHEN '2014' THEN exportacion.vfobserdol ELSE 0 END) AS a2014,
SUM(CASE ".$filtrofecha." WHEN '2014' THEN exportacion.vpesnet ELSE 0 END) AS a2014x,
SUM(CASE ".$filtrofecha." WHEN '2015' THEN exportacion.vfobserdol ELSE 0 END) AS a2015,
SUM(CASE ".$filtrofecha." WHEN '2015' THEN exportacion.vpesnet ELSE 0 END) AS a2015x,
SUM(CASE ".$filtrofecha." WHEN '2016' THEN exportacion.vfobserdol ELSE 0 END) AS a2016,
SUM(CASE ".$filtrofecha." WHEN '2016' THEN exportacion.vpesnet ELSE 0 END) AS a2016x,
SUM(CASE ".$filtrofecha." WHEN '2017' THEN exportacion.vfobserdol ELSE 0 END) AS a2017,
SUM(CASE ".$filtrofecha." WHEN '2017' THEN exportacion.vpesnet ELSE 0 END) AS a2017x,
SUM(CASE ".$filtrofecha." WHEN '2018' THEN exportacion.vfobserdol ELSE 0 END) AS a2018,
SUM(CASE ".$filtrofecha." WHEN '2018' THEN exportacion.vpesnet ELSE 0 END) AS a2018x,
SUM(CASE ".$filtrofecha." WHEN '2019' THEN exportacion.vfobserdol ELSE 0 END) AS a2019,
SUM(CASE ".$filtrofecha." WHEN '2019' THEN exportacion.vpesnet ELSE 0 END) AS a2019x
FROM exportacion
where ".$wherefecha." AND exportacion.part_nandi=".$partida1."
GROUP BY exportacion.dnombre ORDER BY a2018x DESC LIMIT 5";
  }

  if($nombres2=="total"){
  $query1 = "SELECT exportacion.dnombre,
Sum(CASE ".$filtrofecha." WHEN '2012' THEN 1 ELSE 0 END) AS a2012,
Sum(CASE ".$filtrofecha." WHEN '2013' THEN 1 ELSE 0 END) AS a2013,
Sum(CASE ".$filtrofecha." WHEN '2014' THEN 1 ELSE 0 END) AS a2014,
Sum(CASE ".$filtrofecha." WHEN '2015' THEN 1 ELSE 0 END) AS a2015,
Sum(CASE ".$filtrofecha." WHEN '2016' THEN 1 ELSE 0 END) AS a2016,
Sum(CASE ".$filtrofecha." WHEN '2017' THEN 1 ELSE 0 END) AS a2017,
Sum(CASE ".$filtrofecha." WHEN '2018' THEN 1 ELSE 0 END) AS a2018,
Sum(CASE ".$filtrofecha." WHEN '2019' THEN 1 ELSE 0 END) AS a2019
FROM exportacion
where ".$wherefecha." AND exportacion.part_nandi=".$partida1."
GROUP BY exportacion.dnombre ORDER BY a2018 DESC LIMIT 5";
  }
  if($nombres2=="ndcl" or $nombres2=="dnombre" or $nombres2=="cpaides" or $nombres2=="cpuedes" or $nombres2=="cadu" or $nombres2=="cage" or $nombres2=="cviatra"){
  $query1 = "SELECT exportacion.dnombre,
COUNT(distinct CASE ".$filtrofecha." WHEN '2012' THEN exportacion.".$nombres2." ELSE NULL END) AS a2012,
COUNT(distinct CASE ".$filtrofecha." WHEN '2013' THEN exportacion.".$nombres2." ELSE NULL END) AS a2013,
COUNT(distinct CASE ".$filtrofecha." WHEN '2014' THEN exportacion.".$nombres2." ELSE NULL END) AS a2014,
COUNT(distinct CASE ".$filtrofecha." WHEN '2015' THEN exportacion.".$nombres2." ELSE NULL END) AS a2015,
COUNT(distinct CASE ".$filtrofecha." WHEN '2016' THEN exportacion.".$nombres2." ELSE NULL END) AS a2016,
COUNT(distinct CASE ".$filtrofecha." WHEN '2017' THEN exportacion.".$nombres2." ELSE NULL END) AS a2017,
COUNT(distinct CASE ".$filtrofecha." WHEN '2018' THEN exportacion.".$nombres2." ELSE NULL END) AS a2018,
COUNT(distinct CASE ".$filtrofecha." WHEN '2019' THEN exportacion.".$nombres2." ELSE NULL END) AS a2019
FROM exportacion 
where ".$wherefecha." AND exportacion.part_nandi=".$partida1." 
GROUP BY exportacion.dnombre ORDER BY a2018 DESC LIMIT 5";
  }

if($nombres2=="depa" or $nombres2=="provi" or $nombres2=="distri"){
	if($nombres2=="depa"){
		  $variaA='substring(exportacion.ubigeo,1,2)';
	  }else if($nombres2=="provi"){
		  $variaA='substring(exportacion.ubigeo,3,2)';
	  }else{
		  $variaA='substring(exportacion.ubigeo,5,2)';
	  }
	  
	   $query1 = "SELECT exportacion.dnombre,
COUNT(distinct CASE ".$filtrofecha." WHEN '2012' THEN ".$variaA." ELSE NULL END) AS a2012,
COUNT(distinct CASE ".$filtrofecha." WHEN '2013' THEN ".$variaA." ELSE NULL END) AS a2013,
COUNT(distinct CASE ".$filtrofecha." WHEN '2014' THEN ".$variaA." ELSE NULL END) AS a2014,
COUNT(distinct CASE ".$filtrofecha." WHEN '2015' THEN ".$variaA." ELSE NULL END) AS a2015,
COUNT(distinct CASE ".$filtrofecha." WHEN '2016' THEN ".$variaA." ELSE NULL END) AS a2016,
COUNT(distinct CASE ".$filtrofecha." WHEN '2017' THEN ".$variaA." ELSE NULL END) AS a2017,
COUNT(distinct CASE ".$filtrofecha." WHEN '2018' THEN ".$variaA." ELSE NULL END) AS a2018,
COUNT(distinct CASE ".$filtrofecha." WHEN '2019' THEN ".$variaA." ELSE NULL END) AS a2019
FROM exportacion 
where ".$wherefecha." AND exportacion.part_nandi=".$partida1." 
GROUP BY exportacion.dnombre ORDER BY a2018 DESC LIMIT 5";
}

  
	  /*$resultado1 = pg_query($query1) or die("Error en la Consulta SQL");
	  $numReg = pg_num_rows($resultado1);
	  if($numReg>0){
		  while ($fila1=pg_fetch_array($resultado1)) {*/
		  $resultado1=$conexpg->query($query1); 
if($resultado1->num_rows>0){ 
while($fila1=$resultado1->fetch_array()){
		  $dife_deta= $fila1['diferen'];
			  
		  $codi= $codi + 1;
		  $val1= $fila1['dnombre'];
		  
		  if($dife_deta=="diferen"){
			  
			  $dife2012= $fila1['a2012'];
		        $dife2012x= $fila1['a2012x'];
				if($dife2012x=="0" or  $dife2012x=="0.00"){
					$year3= "0.00";
				}else{
					$year3= number_format($dife2012 / $dife2012x,2);
				}
				
				$dife2013= $fila1['a2013'];
		        $dife2013x= $fila1['a2013x'];
				if($dife2013x=="0" or  $dife2013x=="0.00"){
					$year4= "0.00";
				}else{
					$year4= number_format($dife2013 / $dife2013x,2);
				}
				
				$dife2014= $fila1['a2014'];
		        $dife2014x= $fila1['a2014x'];
				if($dife2014x=="0" or  $dife2014x=="0.00"){
					$year5= "0.00";
				}else{
					$year5= number_format($dife2014 / $dife2014x,2);
				}
				
				$dife2015= $fila1['a2015'];
		        $dife2015x= $fila1['a2015x'];
				if($dife2015x=="0" or  $dife2015x=="0.00"){
					$year6= "0.00";
				}else{
					$year6= number_format($dife2015 / $dife2015x,2);
				}
				
				$dife2016= $fila1['a2016'];
		        $dife2016x= $fila1['a2016x'];
				if($dife2016x=="0" or  $dife2016x=="0.00"){
					$year7= "0.00";
				}else{
					$year7= number_format($dife2016 / $dife2016x,2);
				}
				
				$dife2017= $fila1['a2017'];
		        $dife2017x= $fila1['a2017x'];
				if($dife2017x=="0" or  $dife2017x=="0.00"){
					$year8= "0.00";
				}else{
					$year8= number_format($dife2017 / $dife2017x,2);
				}
			  
			  $dife2018= $fila1['a2018'];
		        $dife2018x= $fila1['a2018x'];
				if($dife2018x=="0" or  $dife2018x=="0.00"){
					$year9= "0.00";
				}else{
					$year9= number_format($dife2018 / $dife2018x,2);
				}
			  
			  $dife2019= $fila1['a2019'];
		        $dife2019x= $fila1['a2019x'];
				if($dife2019x=="0" or  $dife2019x=="0.00"){
					$year9= "0.00";
				}else{
					$year9= number_format($dife2019 / $dife2019x,2);
				}
				
		  }else{
		  $year3= $fila1['a2012'];
		  $year4= $fila1['a2013'];
		  $year5= $fila1['a2014'];
		  $year6= $fila1['a2015'];
		  $year7= $fila1['a2016'];
		  $year8= $fila1['a2017'];
			  $year9= $fila1['a2018'];
			  $year9= $fila1['a2019'];
		  }
		 
		 
?>
['<?php echo $val1 ?>', <?php echo $year3 ?>, <?php echo $year4 ?>, <?php echo $year5 ?>, <?php echo $year6 ?>, <?php echo $year7 ?>, <?php echo $year8 ?>, <?php echo $year9 ?>, <?php echo $year10 ?>],
<?php
		  }
		  
	  }
?>
      ]);

      var options = {
        title: 'Evolucion Anual Valor FOB USD de Exportaciones Periodo 2012 - 2019',
        chartArea: {width: '50%'},
        isStacked: true,
        hAxis: {
          title: 'Ranking 5 Primeros',
          minValue: 0,
        },
        vAxis: {
          title: 'Empresas'
        }
      };
      var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    }
    </script>
          
          <div class="col-md-12 ml-auto mr-auto" id="empresa">
          <div id="chart_div" class="chart"></div>
          </div>
           <br>
          <?php include("../../footer_pie.php"); ?>
           
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

<!--<div class="container">
  <h4>Mapa Geografico │ Partida <?php echo $partida1; ?> │ Evolucion Anual de Exportaciones  │ Valor FOB USD │ Periodo 2017</h4>
  <ul class="nav nav-pills">
    <li class="active"><a data-toggle="pill" href="#home">2017</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <div class="text-center table-responsive">
            <?php
       //include("graficos/grafi_mercado_destino_pais.php");
	   ?>
       </div>
    </div>
  </div>
</div>-->
<?php
//cerrando conexion
	mysqli_close($conexpg);
?>
</html>