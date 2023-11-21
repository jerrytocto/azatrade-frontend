<?php
session_start();
if (isset($_SESSION['usuario'])){
}else{
	if(!isset($_SESSION["usuario"]) || $_SESSION["usuario"]==null){
	//print "<script>alert('Acceso invalido! - Inicia Sesion para Acceder');window.location='$enlace_actual';</script>";
}
}
set_time_limit(500);
$partida1 = $_POST["varipartidaregion"];
$filtro = $_POST["unavaria"];
$namedepa1 = $_POST["namedepa"];
$ubicod1 = $_POST["codubi"];
if($ubicod1!=""){
	$flatcod = $ubicod1;
	//$query1 = "AND SUBSTRING(exportacion.ubigeo,1,2) LIKE '%$flatcod'";
	$varquery1 = "AND SUBSTRING(exportacion.ubigeo,1,2) = '$flatcod'";
}else{
	$flatcod = "";
	$varquery1 = "";
}

if($filtro=="vfobserdol"){
					$nomfiltro ="Valor FOB USD";
				}else if($filtro=="vpesnet"){
					$nomfiltro ="Peso Neto (Kg)";
				}else{
					$nomfiltro ="Precio FOB USD x KG";
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
				
if($filtro=="vfobserdol"){
$query1 = "SELECT substring(exportacion.ubigeo,1,2) as ubi1, departamento.nombre, 
SUM(CASE extract(year from exportacion.fnum) WHEN '2012' THEN exportacion.vfobserdol ELSE 0 END) AS a2012,
SUM(CASE extract(year from exportacion.fnum) WHEN '2013' THEN exportacion.vfobserdol ELSE 0 END) AS a2013,
SUM(CASE extract(year from exportacion.fnum) WHEN '2014' THEN exportacion.vfobserdol ELSE 0 END) AS a2014,
SUM(CASE extract(year from exportacion.fnum) WHEN '2015' THEN exportacion.vfobserdol ELSE 0 END) AS a2015,
SUM(CASE extract(year from exportacion.fnum) WHEN '2016' THEN exportacion.vfobserdol ELSE 0 END) AS a2016,
SUM(CASE extract(year from exportacion.fnum) WHEN '2017' THEN exportacion.vfobserdol ELSE 0 END) AS a2017,
SUM(CASE extract(year from exportacion.fnum) WHEN '2018' THEN exportacion.vfobserdol ELSE 0 END) AS a2018,
SUM(CASE extract(year from exportacion.fnum) WHEN '2019' THEN exportacion.vfobserdol ELSE 0 END) AS a2019,
SUM(CASE extract(year from exportacion.fnum) WHEN '2020' THEN exportacion.vfobserdol ELSE 0 END) AS a2020,
SUM(CASE extract(year from exportacion.fnum) WHEN '2021' THEN exportacion.vfobserdol ELSE 0 END) AS a2021
FROM exportacion LEFT JOIN departamento ON   ((((SUBSTRING(exportacion.ubigeo,1,2))= departamento.iddepartamento))) WHERE exportacion.part_nandi = ".$partida1." $varquery1 AND extract(YEAR from exportacion.fnum) >= '2012' AND
extract(year from exportacion.fnum) <= '2021' GROUP BY departamento.nombre ORDER BY nombre ASC";
}
if($filtro=="vpesnet"){
$query1 = "SELECT substring(exportacion.ubigeo,1,2) as ubi1, departamento.nombre, 
SUM(CASE extract(year from exportacion.fnum) WHEN '2012' THEN exportacion.vpesnet ELSE 0 END) AS a2012,
SUM(CASE extract(year from exportacion.fnum) WHEN '2013' THEN exportacion.vpesnet ELSE 0 END) AS a2013,
SUM(CASE extract(year from exportacion.fnum) WHEN '2014' THEN exportacion.vpesnet ELSE 0 END) AS a2014,
SUM(CASE extract(year from exportacion.fnum) WHEN '2015' THEN exportacion.vpesnet ELSE 0 END) AS a2015,
SUM(CASE extract(year from exportacion.fnum) WHEN '2016' THEN exportacion.vpesnet ELSE 0 END) AS a2016,
SUM(CASE extract(year from exportacion.fnum) WHEN '2017' THEN exportacion.vpesnet ELSE 0 END) AS a2017,
SUM(CASE extract(year from exportacion.fnum) WHEN '2018' THEN exportacion.vpesnet ELSE 0 END) AS a2018,
SUM(CASE extract(year from exportacion.fnum) WHEN '2019' THEN exportacion.vpesnet ELSE 0 END) AS a2019,
SUM(CASE extract(year from exportacion.fnum) WHEN '2020' THEN exportacion.vpesnet ELSE 0 END) AS a2020,
SUM(CASE extract(year from exportacion.fnum) WHEN '2021' THEN exportacion.vpesnet ELSE 0 END) AS a2021 
FROM exportacion LEFT JOIN departamento ON   ((((SUBSTRING(exportacion.ubigeo,1,2))= departamento.iddepartamento))) WHERE exportacion.part_nandi = ".$partida1." $varquery1 AND extract(YEAR from exportacion.fnum) >= '2012' AND
extract(year from exportacion.fnum) <= '2021' GROUP BY departamento.nombre ORDER BY nombre ASC";
}
if($filtro=="diferen"){
	$query1 = "SELECT substring(exportacion.ubigeo,1,2) as ubi1, departamento.nombre,
	SUM(CASE extract(year from exportacion.fnum) WHEN '2012' THEN exportacion.vfobserdol ELSE 0 END) / SUM(CASE extract(year from exportacion.fnum) WHEN '2012' THEN exportacion.vpesnet ELSE 0 END) AS a2012,
SUM(CASE extract(year from exportacion.fnum) WHEN '2013' THEN exportacion.vfobserdol ELSE 0 END) / SUM(CASE extract(year from exportacion.fnum) WHEN '2013' THEN exportacion.vpesnet ELSE 0 END) AS a2013,
SUM(CASE extract(year from exportacion.fnum) WHEN '2014' THEN exportacion.vfobserdol ELSE 0 END) / SUM(CASE extract(year from exportacion.fnum) WHEN '2014' THEN exportacion.vpesnet ELSE 0 END) AS a2014,
SUM(CASE extract(year from exportacion.fnum) WHEN '2015' THEN exportacion.vfobserdol ELSE 0 END) / SUM(CASE extract(year from exportacion.fnum) WHEN '2015' THEN exportacion.vpesnet ELSE 0 END) AS a2015,
SUM(CASE extract(year from exportacion.fnum) WHEN '2016' THEN exportacion.vfobserdol ELSE 0 END) / SUM(CASE extract(year from exportacion.fnum) WHEN '2016' THEN exportacion.vpesnet ELSE 0 END) AS a2016,
SUM(CASE extract(year from exportacion.fnum) WHEN '2017' THEN exportacion.vfobserdol ELSE 0 END) / SUM(CASE extract(year from exportacion.fnum) WHEN '2017' THEN exportacion.vpesnet ELSE 0 END) AS a2017,
SUM(CASE extract(year from exportacion.fnum) WHEN '2018' THEN exportacion.vfobserdol ELSE 0 END) / SUM(CASE extract(year from exportacion.fnum) WHEN '2018' THEN exportacion.vpesnet ELSE 0 END) AS a2018,
SUM(CASE extract(year from exportacion.fnum) WHEN '2019' THEN exportacion.vfobserdol ELSE 0 END) / SUM(CASE extract(year from exportacion.fnum) WHEN '2019' THEN exportacion.vpesnet ELSE 0 END) AS a2019,
SUM(CASE extract(year from exportacion.fnum) WHEN '2020' THEN exportacion.vfobserdol ELSE 0 END) / SUM(CASE extract(year from exportacion.fnum) WHEN '2020' THEN exportacion.vpesnet ELSE 0 END) AS a2020,
SUM(CASE extract(year from exportacion.fnum) WHEN '2021' THEN exportacion.vfobserdol ELSE 0 END) / SUM(CASE extract(year from exportacion.fnum) WHEN '2021' THEN exportacion.vpesnet ELSE 0 END) AS a2021
	FROM exportacion LEFT JOIN departamento ON   ((((SUBSTRING(exportacion.ubigeo,1,2))= departamento.iddepartamento))) WHERE exportacion.part_nandi = ".$partida1." $varquery1 AND extract(YEAR from exportacion.fnum) >= '2012' AND
extract(year from exportacion.fnum) <= '2021' GROUP BY departamento.nombre ORDER BY nombre ASC";
}
				
				
	
	if($filtro=="diferen"){//precio suma totales por año
		$capta ="WHERE codigo='dife' ";
	}else{ $capta ="";}
	
	$result_year=$conexpg->query($query1); 
if($result_year->num_rows>0){ 
while($fila_year=$result_year->fetch_array()){
		   $sumatotal2012= $sumatotal2012 + $fila_year['a2012'];
		   $sumatotal2013= $sumatotal2013 + $fila_year['a2013'];
		   $sumatotal2014= $sumatotal2014 + $fila_year['a2014'];
		   $sumatotal2015= $sumatotal2015 + $fila_year['a2015'];
		   $sumatotal2016= $sumatotal2016 + $fila_year['a2016'];
		   $sumatotal2017= $sumatotal2017 + $fila_year['a2017'];
		   $sumatotal2018= $sumatotal2018 + $fila_year['a2018'];
		   $sumatotal2019= $sumatotal2019 + $fila_year['a2019'];
	       $sumatotal2020= $sumatotal2020 + $fila_year['a2020'];
	       $sumatotal2021= $sumatotal2021 + $fila_year['a2021'];
			   
		   
		   }
	if($sumatotal2020=='0.00'){
			   $varitota='0';
		   }else{
		   $varitota= number_format((($sumatotal2020 / $sumatotal2019) - 1) * 100,2);
			   }
		   $parti='100 %';
		   if($sumatotal2019=='0'){
			  $tota6 ="0"; 
		   }else{
		   $tota6 =number_format((( $sumatotal2020 / $sumatotal2019) - 1) * 100,2);
			   }
		   $xx=$sumatotal2012 + $sumatotal2013 + $sumatotal2014 + $sumatotal2015 + $sumatotal2016 + $sumatotal2017 + $sumatotal2018 + $sumatotal2019 + $sumatotal2020 + $sumatotal2021;
	
		  $tota7 = number_format($xx / $sumatotal2020,2);
	
		  $tota8 = "100.00";
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

	$resultado_rpt=$conexpg->query($query1); 
if($resultado_rpt->num_rows>0){ 
		  
		  echo"<div class='col-md-12'>";
        echo"<div class='card'>";
	echo"<div class='card-header card-header-info card-header-icon'>
              <div class='card-icon'>
                <i class='material-icons'>assignment</i>
              </div>
              <h4 class='card-title'><b>Reporte de Ubigeo Anual de Exportaciones</b><br> Partida #: $partida1 │ Departamento: $namedepa1 │ Fecha Numeracion │ $nomfiltro │ Periodo 2012 - 2021 </b> </h4>
            </div>";
		echo"<div class='card-body'>";
		echo"<div class='toolbar'>
		<a href='#mapa'><button class='btn btn-info btn-sm'> Ver Ubigeo Estadístico </button></a>
                  </div>";
         echo"<div class='material-datatables'>";
		echo"<table id='datatables' class='table table-striped table-no-bordered table-hover' cellspacing='0' width='100%' style='width:100%'>";
		  echo"<thead>
                          <tr>
                              <th>#</th>
							  <th>Departamentos</th>
                              <th>2012</th>
                              <th>2013</th>
                              <th>2014</th>
                              <th>2015</th>
							  <th>2016</th>
							  <th>2017</th>
							  <th>2018</th>
							  <th>2019</th>
							  <th>2020</th>
							  <th>2021</th>
							  <th>Var.%20/19</th>
							  <th>Var.% Total</th>
							  <th>Par.%20</th>
                          </tr>
                      </thead>";
		 echo"<tfoot>
                          <tr>
                              <th>#</th>
							  <th>Departamentos</th>
                              <th>2012</th>
                              <th>2013</th>
                              <th>2014</th>
                              <th>2015</th>
							  <th>2016</th>
							  <th>2017</th>
							  <th>2018</th>
							  <th>2019</th>
							  <th>2020</th>
							  <th>2021</th>
							  <th>Var.%20/19</th>
							  <th>Var.% Total</th>
							  <th>Par.%20</th>
                          </tr>
                      </tfoot>";
           echo"<tbody>";

			  while($fila_rpt=$resultado_rpt->fetch_array()){
				  $cuen = $cuen +1;
		   $nombredesc= $fila_rpt['nombre'];
		  $mes1= $fila_rpt['a2012'];
		  $mes2= $fila_rpt['a2013'];
		  $mes3= $fila_rpt['a2014'];
		  $mes4= $fila_rpt['a2015'];
		  $mes5= $fila_rpt['a2016'];
		  $mes6= $fila_rpt['a2017'];
		  $mes7= $fila_rpt['a2018'];
		  $mes8= $fila_rpt['a2019'];
				  $mes9= $fila_rpt['a2020'];
				  $mes10= $fila_rpt['a2021'];
		  
		  if($mes7=='0' or $mes7 == isnull or $mes7 ==''){
		  $var11 ='0';
		  }else{
		  $var11 = number_format((($mes8 / $mes7) - 1) * 100,2);
		  }
		  if($mes1=='0' or $mes1 == isnull or $mes1 ==''){
			  $ca1 ='0';
		  }else{
		  $ca1 = (($mes2 / $mes1) - 1) * 100;
		  }
		  if($mes2=='0' or $mes2 == isnull or $mes2 ==''){
			  $ca2 ='0';
		  }else{
		  $ca2 = (($mes3 / $mes2) - 1) * 100;
		  }
		  if($mes3=='0' or $mes3 == isnull or $mes3 ==''){
			  $ca3 ='0';
		  }else{
		  $ca3 = (($mes4 / $mes3) - 1) * 100;
		  }
		  if($mes4=='0' or $mes4 == isnull or $mes4 ==''){
			  $ca4 ='0';
		  }else{
		  $ca4 = (($mes5 / $mes4) - 1) * 100;
		  }
		  if($mes5=='0' or $mes5 == isnull or $mes5 ==''){
			  $ca5 ='0';
		  }else{
		  $ca5 = (($mes6 / $mes5) - 1) * 100;
		  }
		  if($mes6=='0' or $mes6 == isnull or $mes6 ==''){
			  $ca6 ='0';
		  }else{
		  $ca6 = (($mes7 / $mes6) - 1) * 100;
		  }
			  if($mes7=='0' or $mes7 == isnull or $mes7 ==''){
			  $ca7 ='0';
		  }else{
		  $ca7 = (($mes8 / $mes7) - 1) * 100;
		  }
				  if($mes8=='0' or $mes8 == isnull or $mes8 ==''){
			  $ca8 ='0';
		  }else{
		  $ca8 = (($mes9 / $mes8) - 1) * 100;
		  }
				  
				  if($mes9=='0' or $mes9 == isnull or $mes9 ==''){
			  $ca9 ='0';
		  }else{
		  $ca9 = (($mes10 / $mes9) - 1) * 100;
		  }
		  
		  $ca12 = $ca1 + $ca2 + $ca3 + $ca4 + $ca5 + $ca6 + $ca7 + $ca8 ;
		  $var22 = number_format($ca12 / $ca8,2);
		  
		  echo "<tr>";
echo"<td>$cuen</td>";
echo "<td>$nombredesc</td>";
echo "<td>".number_format($mes1,2)."</td>";
echo "<td>".number_format($mes2,2)."</td>";
echo "<td>".number_format($mes3,2)."</td>";
echo "<td>".number_format($mes4,2)."</td>";
echo "<td>".number_format($mes5,2)."</td>";
echo "<td>".number_format($mes6,2)."</td>";
echo "<td>".number_format($mes7,2)."</td>";
echo "<td>".number_format($mes8,2)."</td>";
echo "<td>".number_format($mes9,2)."</td>";
echo "<td>".number_format($mes10,2)."</td>";
echo "<td>$var11%</td>";
echo "<td>$var22%</td>";
echo "<td>$parti15%</td>";
echo "</tr>";
		  
		  }

 //echo"<thead>";
		  echo "<tr>";
         echo"<td></td>";
		  echo "<th><b>Total</b></th>";
		   echo "<th><b>".number_format($sumatotal2012,2)."</b></th>";
		    echo "<th><b>".number_format($sumatotal2013,2)."</b></th>";
			 echo "<th><b>".number_format($sumatotal2014,2)."</b></th>";
			 echo "<th><b>".number_format($sumatotal2015,2)."</b></th>"; 
			 echo "<th><b>".number_format($sumatotal2016,2)."</b></th>";
			 echo "<th><b>".number_format($sumatotal2017,2)."</b></th>";
		     echo "<th><b>".number_format($sumatotal2018,2)."</b></th>";
		     echo "<th><b>".number_format($sumatotal2019,2)."</b></th>";
	         echo "<th><b>".number_format($sumatotal2019,2)."</b></th>";
	         echo "<th><b>".number_format($sumatotal2020,2)."</b></th>";
			 echo "<th><b>$tota6</b></th>";
			 echo "<th><b>$tota7</b></th>";
			 echo "<th><b>$tota8</b></th>";
		  echo "</tr>";
		  //echo"</thead>";
		  echo"</tbody>";
		  echo "</table>";
		  echo"</div>";
		  echo"</div>";
		  echo"</div>";
		  echo"</div>";
		  echo "</div></div></div>";
		  
	  }else{
	echo"<br><br><center><h4><font color='#EC0D36'>No hay Resultados<br>El Numero de Partida $nombres o seleccion $combo Incorrectos</font></h4></center>";
}
	

?>

<style>
.chart {
  width: 100%; 
  min-height: 450px;
}
</style>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
google.charts.load('current', {
        'packages':['geochart'],
        // Note: you will need to get a mapsApiKey for your project.
        // See: https://developers.google.com/chart/interactive/docs/basic_load_libs#load-settings
        'mapsApiKey': 'AIzaSyD-9tSrke72PouQMnMX-a7eZSW0jkFMBWY'
      });
      google.charts.setOnLoadCallback(drawRegionsMap);

      function drawRegionsMap() {
        var data = google.visualization.arrayToDataTable([
          ['Country',   '<?=$nomfiltro;?>'],
			
			<?php
			
			if($filtro=="vfobserdol"){
$mapubi = "SELECT substring(exportacion.ubigeo,1,2) as ubi1, departamento.nombre, 
SUM(CASE extract(year from exportacion.fnum) WHEN '2020' THEN exportacion.vfobserdol ELSE 0 END) AS a2020,
SUM(CASE extract(year from exportacion.fnum) WHEN '2021' THEN exportacion.vfobserdol ELSE 0 END) AS a2021
FROM exportacion LEFT JOIN departamento ON   ((((SUBSTRING(exportacion.ubigeo,1,2))= departamento.iddepartamento))) WHERE exportacion.part_nandi = ".$partida1." $varquery1 AND extract(YEAR from exportacion.fnum) >= '2012' AND
extract(year from exportacion.fnum) <= '2021' GROUP BY departamento.nombre ORDER BY nombre ASC";
}
if($filtro=="vpesnet"){
$mapubi = "SELECT substring(exportacion.ubigeo,1,2) as ubi1, departamento.nombre, 
SUM(CASE extract(year from exportacion.fnum) WHEN '2020' THEN exportacion.vpesnet ELSE 0 END) AS a2020,
SUM(CASE extract(year from exportacion.fnum) WHEN '2021' THEN exportacion.vpesnet ELSE 0 END) AS a2021 
FROM exportacion LEFT JOIN departamento ON   ((((SUBSTRING(exportacion.ubigeo,1,2))= departamento.iddepartamento))) WHERE exportacion.part_nandi = ".$partida1." $varquery1 AND extract(YEAR from exportacion.fnum) >= '2012' AND
extract(year from exportacion.fnum) <= '2021' GROUP BY departamento.nombre ORDER BY nombre ASC";
}
if($filtro=="diferen"){
	$mapubi = "SELECT substring(exportacion.ubigeo,1,2) as ubi1, departamento.nombre,
SUM(CASE extract(year from exportacion.fnum) WHEN '2020' THEN exportacion.vfobserdol ELSE 0 END) / SUM(CASE extract(year from exportacion.fnum) WHEN '2020' THEN exportacion.vpesnet ELSE 0 END) AS a2020,
SUM(CASE extract(year from exportacion.fnum) WHEN '2021' THEN exportacion.vfobserdol ELSE 0 END) / SUM(CASE extract(year from exportacion.fnum) WHEN '2021' THEN exportacion.vpesnet ELSE 0 END) AS a2021
	FROM exportacion LEFT JOIN departamento ON   ((((SUBSTRING(exportacion.ubigeo,1,2))= departamento.iddepartamento))) WHERE exportacion.part_nandi = ".$partida1." $varquery1 AND extract(YEAR from exportacion.fnum) >= '2012' AND
extract(year from exportacion.fnum) <= '2021' GROUP BY departamento.nombre ORDER BY nombre ASC";
}

			$mapa_rpt=$conexpg->query($mapubi); 
if($mapa_rpt->num_rows>0){ 
while($fila_ma=$mapa_rpt->fetch_array()){
			   $nombredesc= $fila_ma['nombre'];
		  $year8= $fila_ma['a2020']; 
			   ?>
			['<?=$nombredesc;?>', <?=$year8;?>],
			<?php
			}
			}
			?>
        ]);

        var options = {
          region: 'PE', // Peru
			resolution: 'provinces',
          colorAxis: {colors: ['#00853f', 'yellow', '#e31b23']},
          backgroundColor: '#ffffff',
          datalessRegionColor: '#ffffff',
          defaultColor: '#f5f5f5',
        };

        var chart = new google.visualization.GeoChart(document.getElementById('geochart-colors'));
        chart.draw(data, options);
      };
				</script>
        <center>
        <h3 class="title" id="mapa"><font color="#FFFFFF">Mapa Geografico │ Partida <?=$partida1;?> │ Departamento: <?=$namedepa1;?> │ Ubigeo Anual de Exportaciones │ <?=$nomfiltro;?> │ Periodo 2020</font></h3></center>
         <div class="col-md-12 ml-auto mr-auto">
          <div id="geochart-colors" class="chart"></div>
          </div>
           <br>
          <?php include("../../footer_pie.php"); ?>
            </div>
            </div>
            
        <!--</div>
        </div>
        </div>
        </div>
    
</div>

    </div>-->

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