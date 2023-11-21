<?php
session_start();
if (isset($_SESSION['usuario'])){
}else{
	if(!isset($_SESSION["usuario"]) || $_SESSION["usuario"]==null){
	//print "<script>alert('Acceso invalido! - Inicia Sesion para Acceder');window.location='$enlace_actual';</script>";
}
}
set_time_limit(500);
$partida1 = $_POST["partidaevomen"];
$namedepa1 = $_POST["namedepa"];
$ubicod1 = $_POST["codubi"];
$indica = $_POST["unavariaestaci"];
if($ubicod1!=""){
	$flatcod = $ubicod1;
	//$query = "AND SUBSTRING(exportacion.ubigeo,1,2) LIKE '%$flatcod'";
	$query1var = "AND SUBSTRING(exportacion.ubigeo,1,2) = '$flatcod'";
}else{
	$flatcod = "";
	$query1var = "";
}

if($indica=="vfobserdol"){
	 $combo = "Valor FOB USD";
 }else if($indica=="vpesnet"){
	  $combo = "Peso Neto (Kg)";
 }else if($indica=="diferen"){
	  $combo = "Precio FOB USD x KG";
 }else if($indica=="vpesbru"){
	  $combo = "Peso Bruto (Kg)";
 }else if($indica=="qunifis"){
	  $combo = "Cantidad Exportada";
 }else if($indica=="qunicom"){
	  $combo = "Unidades Comerciales";
 }else if($indica=="part_nandi"){
	  $combo = "Cantidad de Partidas";
}else if($indica=="total"){
	  $combo = "Cantidad de Registros";
 }else if($indica=="ndcl"){
	  $combo = "Cantidad de Duas";
 }else if($indica=="cantemp"){
	  $combo = "Cantidad de Empresas";
 }else if($indica=="cantmerca"){
	  $combo = "Cantidad de Mercados";
 }else if($indica=="cpuedes"){
	  $combo = "Cantidad de Puertos";
 }else if($indica=="cadu"){
	  $combo = "Cantidad de Aduanas";
 }else if($indica=="depa"){
	  $combo = "Cantidad de Departamentos";
 }else if($indica=="provi"){
	  $combo = "Cantidad de Provincias";
 }else if($indica=="distri"){
	  $combo = "Cantidad de Distritos";
 }else if($indica=="cage"){
	  $combo = "Cantidad de Agentes";
 }else if($indica=="cviatra"){
	  $combo = "Cantidad de vias de Transporte";
 }
?>
<!doctype html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<!-- Favicons -->
<link rel="apple-touch-icon" href="../img/logo.png">
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

//seleccionamos y del resultado insertamos a la tabla temporal*/
				if($indica=="vfobserdol"){
  $query1 = "SELECT extract(MONTH from exportacion.fnum) as mes,
(case extract(MONTH from exportacion.fnum)
		when '1' then 'Enero' 
		when '2' then 'Febrero' 
		when '3' then 'Marzo' 
		when '4' then 'Abril' 
		when '5' then 'Mayo'
		when '6' then 'Junio'
		when '7' then 'Julio'
		when '8' then 'Agosto'
		when '9' then 'Septiembre'
		when '10' then 'Octubre'
		when '11' then 'Noviembre'
		when '12' then 'Diciembre' 
	else '-' end) as txtmes,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2012' THEN exportacion.vfobserdol ELSE 0 END ) AS a2012,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2013' THEN exportacion.vfobserdol ELSE 0 END ) AS a2013,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2014' THEN exportacion.vfobserdol ELSE 0 END ) AS a2014,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2015' THEN exportacion.vfobserdol ELSE 0 END ) AS a2015,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2016' THEN exportacion.vfobserdol ELSE 0 END ) AS a2016,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2017' THEN exportacion.vfobserdol ELSE 0 END ) AS a2017,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2018' THEN exportacion.vfobserdol ELSE 0 END ) AS a2018,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2019' THEN exportacion.vfobserdol ELSE 0 END ) AS a2019,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2020' THEN exportacion.vfobserdol ELSE 0 END ) AS a2020,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2021' THEN exportacion.vfobserdol ELSE 0 END ) AS a2021 
FROM exportacion WHERE exportacion.part_nandi = ".$partida1." $query1var AND extract(year from exportacion.fnum) >= '2012' AND extract(year from exportacion.fnum) <= '2021' GROUP BY mes ORDER BY mes";
					}
				if($indica=="vpesnet"){
  $query1 = "SELECT extract(MONTH from exportacion.fnum) as mes,
(case extract(MONTH from exportacion.fnum)
		when '1' then 'Enero' 
		when '2' then 'Febrero' 
		when '3' then 'Marzo' 
		when '4' then 'Abril' 
		when '5' then 'Mayo'
		when '6' then 'Junio'
		when '7' then 'Julio'
		when '8' then 'Agosto'
		when '9' then 'Septiembre'
		when '10' then 'Octubre'
		when '11' then 'Noviembre'
		when '12' then 'Diciembre' 
	else '-' end) as txtmes,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2012' THEN exportacion.vpesnet ELSE 0 END ) AS a2012,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2013' THEN exportacion.vpesnet ELSE 0 END ) AS a2013,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2014' THEN exportacion.vpesnet ELSE 0 END ) AS a2014,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2015' THEN exportacion.vpesnet ELSE 0 END ) AS a2015,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2016' THEN exportacion.vpesnet ELSE 0 END ) AS a2016,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2017' THEN exportacion.vpesnet ELSE 0 END ) AS a2017,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2018' THEN exportacion.vpesnet ELSE 0 END ) AS a2018,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2019' THEN exportacion.vpesnet ELSE 0 END ) AS a2019,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2020' THEN exportacion.vpesnet ELSE 0 END ) AS a2020,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2021' THEN exportacion.vpesnet ELSE 0 END ) AS a2021 
FROM exportacion WHERE exportacion.part_nandi = ".$partida1." $query1var AND extract(year from exportacion.fnum) >= '2012' AND extract(year from exportacion.fnum) <= '2021' GROUP BY mes ORDER BY mes";
					}
				if($indica=="diferen"){
  $query1 = "SELECT extract(MONTH from exportacion.fnum) as mes,
(case extract(MONTH from exportacion.fnum)
		when '1' then 'Enero' 
		when '2' then 'Febrero' 
		when '3' then 'Marzo' 
		when '4' then 'Abril' 
		when '5' then 'Mayo'
		when '6' then 'Junio'
		when '7' then 'Julio'
		when '8' then 'Agosto'
		when '9' then 'Septiembre'
		when '10' then 'Octubre'
		when '11' then 'Noviembre'
		when '12' then 'Diciembre' 
	else '-' end) as txtmes,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2012' THEN exportacion.vfobserdol ELSE 0 END ) / sum(CASE extract(YEAR from exportacion.fnum) WHEN '2012' THEN exportacion.vpesnet ELSE 0 END ) AS a2012,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2013' THEN exportacion.vfobserdol ELSE 0 END ) / sum(CASE extract(YEAR from exportacion.fnum) WHEN '2013' THEN exportacion.vpesnet ELSE 0 END ) AS a2013,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2014' THEN exportacion.vfobserdol ELSE 0 END ) / sum(CASE extract(YEAR from exportacion.fnum) WHEN '2014' THEN exportacion.vpesnet ELSE 0 END ) AS a2014,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2015' THEN exportacion.vfobserdol ELSE 0 END ) / sum(CASE extract(YEAR from exportacion.fnum) WHEN '2015' THEN exportacion.vpesnet ELSE 0 END ) AS a2015,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2016' THEN exportacion.vfobserdol ELSE 0 END ) / sum(CASE extract(YEAR from exportacion.fnum) WHEN '2016' THEN exportacion.vpesnet ELSE 0 END ) AS a2016,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2017' THEN exportacion.vfobserdol ELSE 0 END ) / sum(CASE extract(YEAR from exportacion.fnum) WHEN '2017' THEN exportacion.vpesnet ELSE 0 END ) AS a2017,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2018' THEN exportacion.vfobserdol ELSE 0 END ) / sum(CASE extract(YEAR from exportacion.fnum) WHEN '2018' THEN exportacion.vpesnet ELSE 0 END ) AS a2018,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2019' THEN exportacion.vfobserdol ELSE 0 END ) / sum(CASE extract(YEAR from exportacion.fnum) WHEN '2019' THEN exportacion.vpesnet ELSE 0 END ) AS a2019,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2020' THEN exportacion.vfobserdol ELSE 0 END ) / sum(CASE extract(YEAR from exportacion.fnum) WHEN '2020' THEN exportacion.vpesnet ELSE 0 END ) AS a2020,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2021' THEN exportacion.vfobserdol ELSE 0 END ) / sum(CASE extract(YEAR from exportacion.fnum) WHEN '2021' THEN exportacion.vpesnet ELSE 0 END ) AS a2021 
FROM exportacion WHERE exportacion.part_nandi = ".$partida1." $query1var AND extract(year from exportacion.fnum) >= '2012' AND extract(year from exportacion.fnum) <= '2021' GROUP BY mes ORDER BY mes";
					}
				if($indica=="cantemp"){
  $query1 = "SELECT extract(MONTH from exportacion.fnum) as mes,
(case extract(MONTH from exportacion.fnum)
		when '1' then 'Enero' 
		when '2' then 'Febrero' 
		when '3' then 'Marzo' 
		when '4' then 'Abril' 
		when '5' then 'Mayo'
		when '6' then 'Junio'
		when '7' then 'Julio'
		when '8' then 'Agosto'
		when '9' then 'Septiembre'
		when '10' then 'Octubre'
		when '11' then 'Noviembre'
		when '12' then 'Diciembre' 
	else '-' end) as txtmes,
count(DISTINCT (CASE extract(YEAR from exportacion.fnum) WHEN '2012' THEN exportacion.ndoc ELSE 0 END )) AS a2012,
count(DISTINCT (CASE extract(YEAR from exportacion.fnum) WHEN '2013' THEN exportacion.ndoc ELSE 0 END )) AS a2013,
count(DISTINCT (CASE extract(YEAR from exportacion.fnum) WHEN '2014' THEN exportacion.ndoc ELSE 0 END )) AS a2014,
count(DISTINCT (CASE extract(YEAR from exportacion.fnum) WHEN '2015' THEN exportacion.ndoc ELSE 0 END )) AS a2015,
count(DISTINCT (CASE extract(YEAR from exportacion.fnum) WHEN '2016' THEN exportacion.ndoc ELSE 0 END )) AS a2016,
count(DISTINCT (CASE extract(YEAR from exportacion.fnum) WHEN '2017' THEN exportacion.ndoc ELSE 0 END )) AS a2017,
count(DISTINCT (CASE extract(YEAR from exportacion.fnum) WHEN '2018' THEN exportacion.ndoc ELSE 0 END )) AS a2018,
count(DISTINCT (CASE extract(YEAR from exportacion.fnum) WHEN '2019' THEN exportacion.ndoc ELSE 0 END )) AS a2019,
count(DISTINCT (CASE extract(YEAR from exportacion.fnum) WHEN '2020' THEN exportacion.ndoc ELSE 0 END )) AS a2020,
count(DISTINCT (CASE extract(YEAR from exportacion.fnum) WHEN '2021' THEN exportacion.ndoc ELSE 0 END )) AS a2021 
FROM exportacion WHERE exportacion.part_nandi = ".$partida1." $query1var AND extract(year from exportacion.fnum) >= '2012' AND extract(year from exportacion.fnum) <= '2021' GROUP BY mes ORDER BY mes";
					}
				if($indica=="cantmerca"){
  $query1 = "SELECT extract(MONTH from exportacion.fnum) as mes,
(case extract(MONTH from exportacion.fnum)
		when '1' then 'Enero' 
		when '2' then 'Febrero' 
		when '3' then 'Marzo' 
		when '4' then 'Abril' 
		when '5' then 'Mayo'
		when '6' then 'Junio'
		when '7' then 'Julio'
		when '8' then 'Agosto'
		when '9' then 'Septiembre'
		when '10' then 'Octubre'
		when '11' then 'Noviembre'
		when '12' then 'Diciembre' 
	else '-' end) as txtmes,
count(DISTINCT (CASE extract(YEAR from exportacion.fnum) WHEN '2012' THEN exportacion.cpaides ELSE 0 END )) AS a2012,
count(DISTINCT (CASE extract(YEAR from exportacion.fnum) WHEN '2013' THEN exportacion.cpaides ELSE 0 END )) AS a2013,
count(DISTINCT (CASE extract(YEAR from exportacion.fnum) WHEN '2014' THEN exportacion.cpaides ELSE 0 END )) AS a2014,
count(DISTINCT (CASE extract(YEAR from exportacion.fnum) WHEN '2015' THEN exportacion.cpaides ELSE 0 END )) AS a2015,
count(DISTINCT (CASE extract(YEAR from exportacion.fnum) WHEN '2016' THEN exportacion.cpaides ELSE 0 END )) AS a2016,
count(DISTINCT (CASE extract(YEAR from exportacion.fnum) WHEN '2017' THEN exportacion.cpaides ELSE 0 END )) AS a2017,
count(DISTINCT (CASE extract(YEAR from exportacion.fnum) WHEN '2018' THEN exportacion.cpaides ELSE 0 END )) AS a2018,
count(DISTINCT (CASE extract(YEAR from exportacion.fnum) WHEN '2019' THEN exportacion.cpaides ELSE 0 END )) AS a2019,
count(DISTINCT (CASE extract(YEAR from exportacion.fnum) WHEN '2020' THEN exportacion.cpaides ELSE 0 END )) AS a2020,
count(DISTINCT (CASE extract(YEAR from exportacion.fnum) WHEN '2021' THEN exportacion.cpaides ELSE 0 END )) AS a2021 
FROM exportacion WHERE exportacion.part_nandi = ".$partida1." $query1var AND extract(year from exportacion.fnum) >= '2012' AND extract(year from exportacion.fnum) <= '2021' GROUP BY mes ORDER BY mes";
					}
				
				
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
			   
			   if($sumatotal2019=='0'){
				   $varitota="0";
			   }else{
		   $varitota= number_format((($sumatotal2020 / $sumatotal2019) - 1) * 100,2);
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
              <h4 class='card-title'><b>Reporte Evolucion Mensual de Exportaciones</b><br> Partida #: $partida1 │ Departamento: $namedepa1 │ Fecha Numeracion │ $combo │ Periodo 2012 - 2021 </b> </h4>
            </div>";
		echo"<div class='card-body'>";
		echo"<div class='toolbar'>
                  </div>";
         echo"<div class='material-datatables'>";
		echo"<table id='datatablese' class='table table-striped table-no-bordered table-hover' cellspacing='0' width='100%' style='width:100%'>";
		  echo"<thead>
                          <tr>
                              <th>#</th>
							  <th>Mes</th>
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
							  <th>Par.%20</th>
                          </tr>
                      </thead>";
		 echo"<tfoot>
                          <tr>
						      <th>#</th>
                              <th>Mes</th>
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
							  <th>Par.%20</th>
                          </tr>
                      </tfoot>";
           echo"<tbody>";
			  while($fila_rpt=$resultado_rpt->fetch_array()){
				  $itecod = $itecod + 1; 
		  $ft = $fila_rpt['mes'];
		  $nombredesc= $fila_rpt['txtmes'];
		  $year3= $fila_rpt['a2012'];
		  $year4= $fila_rpt['a2013'];
		  $year5= $fila_rpt['a2014'];
		  $year6= $fila_rpt['a2015'];
		  $year7= $fila_rpt['a2016'];
		  $year8= $fila_rpt['a2017'];
		  $year9= $fila_rpt['a2018'];
			  $year10= $fila_rpt['a2019'];
				  $year11= $fila_rpt['a2020'];
				  $year12= $fila_rpt['a2021'];
		  
		  if($year10=='0'){
		  $var11 ='0';
		  }else{
		  $var11 = number_format((($year11 / $year10) - 1) * 100,2);
		  }
		if($sumatotal2020=='0' or $sumatotal2020 == '0.00' or $sumatotal2020 == ''){
			$var22 = "0.00";
		  }else{
			$var22 = number_format(($year11 / $sumatotal2020) * 100,2);
		}
		  echo "<tr>";
echo "<td></td>";
echo "<td>$nombredesc</td>";
echo "<td>".number_format($year3,2)."</td>";
echo "<td>".number_format($year4,2)."</td>";
echo "<td>".number_format($year5,2)."</td>";
echo "<td>".number_format($year6,2)."</td>";
echo "<td>".number_format($year7,2)."</td>";
echo "<td>".number_format($year8,2)."</td>";
echo "<td>".number_format($year9,2)."</td>";
echo "<td>".number_format($year10,2)."</td>";
				  echo "<td>".number_format($year11,2)."</td>";
				  echo "<td>".number_format($year12,2)."</td>";
echo "<td>$var11%</td>";
echo "<td>$var22%</td>";
 echo "</tr>";
		  
		  }
		  
		  //echo"<thead>";
		  echo "<tr>";
		  echo "<th>&nbsp;</th>";
		  echo "<th><b>Total</b></th>";
		   echo "<th><b>".number_format($sumatotal2012,2)."</b></th>";
		   echo "<th><b>".number_format($sumatotal2013,2)."</b></th>";
		    echo "<th><b>".number_format($sumatotal2014,2)."</b></th>";
			 echo "<th><b>".number_format($sumatotal2015,2)."</b></th>";
			  echo "<th><b>".number_format($sumatotal2016,2)."</b></th>";
			   echo "<th><b>".number_format($sumatotal2017,2)."</b></th>";
		        echo "<th><b>".number_format($sumatotal2018,2)."</b></th>";
		  echo "<th><b>".number_format($sumatotal2019,2)."</b></th>";
	echo "<th><b>".number_format($sumatotal2020,2)."</b></th>";
	echo "<th><b>".number_format($sumatotal2021,2)."</b></th>";
			  echo "<th><b>$varitota %</b></th>";
			  echo "<th><b>$parti</b></th>";
		  echo "</tr>";
		  //echo"</thead>";
		  echo"</tbody>";
		  echo"</table>";
		  echo"</div>";
		  echo"</div>";
		  echo"</div>";
		  echo"</div>";
		  
		   //echo "<a class='btn btn-success' href='rpt_excel/rpt_mdestino_Aanual_excel.php?dato=$nombres&option=$radiox&varia2=$nombres2'>Exportar Excel <img src='images/Excel-icon.png'></a>";
		   echo "</div></div></div>";
		   
		   ?>



<?php
		   
	  }else{
		  
		   echo"<center><h4><font color='#EC0D36'>No hay Resultados<br>No se encontraron datos con el numero de partida $partida1 </font></h4></center>";

	  }

				?>
          

         <div class="col-md-12 ml-auto mr-auto">

    <br>
          <?php include("../../footer_pie.php"); ?>
  </div>
           
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
            [15, 25, 50, -1],
            [15, 25, 50, "Todos"]
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