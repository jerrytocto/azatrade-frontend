<?php
session_start();
set_time_limit(500);
$partida1 = $_GET["varipartidamerca"];
$filtro = $_GET["unavaria"];
$namedepa1 = $_GET["namedepa"];
$ubicod1 = $_GET["codubi"];
if($ubicod1!=""){
	$flatcod = $ubicod1;
	//$query1 = "AND SUBSTRING(exportacion.ubigeo,1,2) LIKE '%$flatcod'";
	$query1var = "AND SUBSTRING(exportacion.ubigeo,1,2) = '$flatcod'";
}else{
	$flatcod = "";
	$query1var = "";
}

if($filtro=="vfobserdol"){
					$nomfiltro ="Valor FOB USD";
				}else if($filtro=="vpesnet"){
					$nomfiltro ="Peso Neto (Kg)";
				}else{
					$nomfiltro ="Precio FOB USD x KG";
				}
?>

            <div class='col-md-12'>

            <?php
				include("../../incBD/inibd.php");	
				
if($filtro=="vfobserdol"){
$query1 = "SELECT exportacion.cpaides, paises.espanol,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2012' THEN exportacion.vfobserdol ELSE 0 END ) as a2012,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2013' THEN exportacion.vfobserdol ELSE 0 END ) as a2013,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2014' THEN exportacion.vfobserdol ELSE 0 END ) as a2014,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2015' THEN exportacion.vfobserdol ELSE 0 END ) as a2015,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2016' THEN exportacion.vfobserdol ELSE 0 END ) as a2016,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2017' THEN exportacion.vfobserdol ELSE 0 END ) as a2017,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2018' THEN exportacion.vfobserdol ELSE 0 END ) as a2018,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2019' THEN exportacion.vfobserdol ELSE 0 END ) as a2019,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2020' THEN exportacion.vfobserdol ELSE 0 END ) as a2020,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2021' THEN exportacion.vfobserdol ELSE 0 END ) as a2021
FROM exportacion LEFT JOIN paises ON exportacion.cpaides = paises.idpaises WHERE exportacion.part_nandi = ".$partida1." $query1var AND extract(year from exportacion.fnum) >= '2012' AND extract(year from exportacion.fnum) <= '2021' GROUP BY exportacion.cpaides,paises.espanol ORDER BY a2021 DESC";
}
if($filtro=="vpesnet"){
	$query1 = "SELECT exportacion.cpaides, paises.espanol,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2012' THEN exportacion.vpesnet ELSE 0 END ) as a2012,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2013' THEN exportacion.vpesnet ELSE 0 END ) as a2013,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2014' THEN exportacion.vpesnet ELSE 0 END ) as a2014,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2015' THEN exportacion.vpesnet ELSE 0 END ) as a2015,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2016' THEN exportacion.vpesnet ELSE 0 END ) as a2016,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2017' THEN exportacion.vpesnet ELSE 0 END ) as a2017,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2018' THEN exportacion.vpesnet ELSE 0 END ) as a2018,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2019' THEN exportacion.vpesnet ELSE 0 END ) as a2019,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2020' THEN exportacion.vpesnet ELSE 0 END ) as a2020,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2021' THEN exportacion.vpesnet ELSE 0 END ) as a2021 
FROM exportacion LEFT JOIN paises ON exportacion.cpaides = paises.idpaises WHERE exportacion.part_nandi = ".$partida1." $query1var AND extract(year from exportacion.fnum) >= '2012' AND extract(year from exportacion.fnum) <= '2021' GROUP BY exportacion.cpaides,paises.espanol ORDER BY a2021 DESC";
}
if($filtro=="diferen"){
	$query1 = " SELECT exportacion.cpaides, paises.espanol,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2012' THEN exportacion.vfobserdol ELSE 0 END ) / sum(CASE extract(YEAR from exportacion.fnum) WHEN '2012' THEN exportacion.vpesnet ELSE 0 END ) as a2012,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2013' THEN exportacion.vfobserdol ELSE 0 END ) / sum(CASE extract(YEAR from exportacion.fnum) WHEN '2013' THEN exportacion.vpesnet ELSE 0 END ) as a2013,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2014' THEN exportacion.vfobserdol ELSE 0 END ) / sum(CASE extract(YEAR from exportacion.fnum) WHEN '2014' THEN exportacion.vpesnet ELSE 0 END ) as a2014,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2015' THEN exportacion.vfobserdol ELSE 0 END ) / sum(CASE extract(YEAR from exportacion.fnum) WHEN '2015' THEN exportacion.vpesnet ELSE 0 END ) as a2015,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2016' THEN exportacion.vfobserdol ELSE 0 END ) / sum(CASE extract(YEAR from exportacion.fnum) WHEN '2016' THEN exportacion.vpesnet ELSE 0 END ) as a2016,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2017' THEN exportacion.vfobserdol ELSE 0 END ) / sum(CASE extract(YEAR from exportacion.fnum) WHEN '2017' THEN exportacion.vpesnet ELSE 0 END ) as a2017,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2018' THEN exportacion.vfobserdol ELSE 0 END ) / sum(CASE extract(YEAR from exportacion.fnum) WHEN '2018' THEN exportacion.vpesnet ELSE 0 END ) as a2018,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2019' THEN exportacion.vfobserdol ELSE 0 END ) / sum(CASE extract(YEAR from exportacion.fnum) WHEN '2019' THEN exportacion.vpesnet ELSE 0 END ) as a2019,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2020' THEN exportacion.vfobserdol ELSE 0 END ) / sum(CASE extract(YEAR from exportacion.fnum) WHEN '2020' THEN exportacion.vpesnet ELSE 0 END ) as a2020,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2021' THEN exportacion.vfobserdol ELSE 0 END ) / sum(CASE extract(YEAR from exportacion.fnum) WHEN '2021' THEN exportacion.vpesnet ELSE 0 END ) as a2021 
FROM exportacion LEFT JOIN paises ON exportacion.cpaides = paises.idpaises WHERE exportacion.part_nandi = ".$partida1." $query1var AND extract(year from exportacion.fnum) >= '2012' AND extract(year from exportacion.fnum) <= '2021' GROUP BY exportacion.cpaides,paises.espanol ORDER BY a2021 DESC";
}
				
				/*$resultado1=$conexpg->query($query1); 
if($resultado1->num_rows>0){ 
while($fila1=$resultado1->fetch_array()){
		  $val1= $fila1['fano'];
		  $val2= $fila1['cpaides'];
		  $val3= $fila1['resultado'];
		 
		 
		  if($val1=='2012'){
  $insert1 = "UPDATE ".$mon_tmp." SET a2012='".$val3."' WHERE codigo='$val2' "; 
 $rs = $conexpg->query($insert1);
		 }
		  if($val1=='2013'){
  $insert1 = "UPDATE ".$mon_tmp." SET a2013='".$val3."' WHERE codigo='$val2' "; 
 $rs = $conexpg->query($insert1);
		 }
		  if($val1=='2014'){
  $insert1 = "UPDATE ".$mon_tmp." SET a2014='".$val3."' WHERE codigo='$val2' "; 
 $rs = $conexpg->query($insert1);
		 }
		  if($val1=='2015'){
  $insert1 = "UPDATE ".$mon_tmp." SET a2015='".$val3."' WHERE codigo='$val2' "; 
 $rs = $conexpg->query($insert1);
		 }
		  if($val1=='2016'){
  $insert1 = "UPDATE ".$mon_tmp." SET a2016='".$val3."' WHERE codigo='$val2' "; 
$rs = $conexpg->query($insert1);
		 }
		 if($val1=='2017'){
  $insert1 = "UPDATE ".$mon_tmp." SET a2017='".$val3."' WHERE codigo='$val2' "; 
 $rs = $conexpg->query($insert1);
		 }
	     if($val1=='2018'){
  $insert1 = "UPDATE ".$mon_tmp." SET a2018='".$val3."' WHERE codigo='$val2' "; 
 $rs = $conexpg->query($insert1);
		 }
			  if($val1=='2019'){
  $insert1 = "UPDATE ".$mon_tmp." SET a2019='".$val3."' WHERE codigo='$val2' "; 
 $rs = $conexpg->query($insert1);
		 }
	if($val1=='2020'){
  $insert1 = "UPDATE ".$mon_tmp." SET a2020='".$val3."' WHERE codigo='$val2' "; 
 $rs = $conexpg->query($insert1);
		 }
	if($val1=='2021'){
  $insert1 = "UPDATE ".$mon_tmp." SET a2021='".$val3."' WHERE codigo='$val2' "; 
 $rs = $conexpg->query($insert1);
		 }
		 
		 
		  }
	if($filtro=="diferen"){//precio suma totales por año
	$preciosqlxx = "SELECT exportacion.fano, sum(exportacion.vfobserdol)/sum(exportacion.vpesnet) AS resultado  FROM exportacion LEFT JOIN paises ON exportacion.cpaides = paises.idpaises  WHERE exportacion.part_nandi = ".$partida1." $query1var AND  extract(year from exportacion.fnum) >= '2012' AND  extract(year from exportacion.fnum) <= '2021'  GROUP BY exportacion.fano  ORDER BY exportacion.fano ASC";
	$rsqlprexx=$conexpg->query($preciosqlxx); 
if($rsqlprexx->num_rows>0){ 
while($rwpreci=$rsqlprexx->fetch_array()){
          $pret1= $rwpreci['fano'];
		  $pret2= $rwpreci['resultado'];
	if($pret1=='2012'){
  $instotpre = "UPDATE ".$mon_tmp." SET a2012='".$pret2."' WHERE codigo='dife' "; 
 $tprs = $conexpg->query($instotpre);
		 }
	if($pret1=='2013'){
  $instotpre = "UPDATE ".$mon_tmp." SET a2013='".$pret2."' WHERE codigo='dife' "; 
 $tprs = $conexpg->query($instotpre);
		 }
	if($pret1=='2014'){
  $instotpre = "UPDATE ".$mon_tmp." SET a2014='".$pret2."' WHERE codigo='dife' "; 
 $tprs = $conexpg->query($instotpre);
		 }
	if($pret1=='2015'){
  $instotpre = "UPDATE ".$mon_tmp." SET a2015='".$pret2."' WHERE codigo='dife' "; 
 $tprs = $conexpg->query($instotpre);
		 }
	if($pret1=='2016'){
  $instotpre = "UPDATE ".$mon_tmp." SET a2016='".$pret2."' WHERE codigo='dife' "; 
 $tprs = $conexpg->query($instotpre);
		 }
	if($pret1=='2017'){
  $instotpre = "UPDATE ".$mon_tmp." SET a2017='".$pret2."' WHERE codigo='dife' "; 
 $tprs = $conexpg->query($instotpre);
		 }
	if($pret1=='2018'){
  $instotpre = "UPDATE ".$mon_tmp." SET a2018='".$pret2."' WHERE codigo='dife' "; 
 $tprs = $conexpg->query($instotpre);
		 }
	if($pret1=='2019'){
  $instotpre = "UPDATE ".$mon_tmp." SET a2019='".$pret2."' WHERE codigo='dife' "; 
 $tprs = $conexpg->query($instotpre);
		 }
	if($pret1=='2020'){
  $instotpre = "UPDATE ".$mon_tmp." SET a2020='".$pret2."' WHERE codigo='dife' "; 
 $tprs = $conexpg->query($instotpre);
		 }
	if($pret1=='2021'){
  $instotpre = "UPDATE ".$mon_tmp." SET a2021='".$pret2."' WHERE codigo='dife' "; 
 $tprs = $conexpg->query($instotpre);
		 }

}
}else{ }
}
	
	  }else{
		  
		   echo"<center><h4><font color='#EC0D36'>No hay Resultados<br>El Numero de Partida $nombres o seleccion $combo Incorrectos</font></h4></center>";
			 		  
	 $delete1 = mysqli_query($conexpg, "DROP TABLE ".$mon_tmp.";");
  if (!$delete1) {
    echo "Query: Un error ha ocurido al Eliminar la Tabla Temporal";
  }else{
	  
  }
  
}*/

/*
	  if($filtro=="diferen"){//precio suma totales por año
		$capta ="WHERE codigo='dife' ";
	}else{ $capta ="";}
*/
	  /* $sqlyear="SELECT
Sum(".$mon_tmp.".a2012) AS a2012,
Sum(".$mon_tmp.".a2013) AS a2013,
Sum(".$mon_tmp.".a2014) AS a2014,
Sum(".$mon_tmp.".a2015) AS a2015,
Sum(".$mon_tmp.".a2016) AS a2016,
Sum(".$mon_tmp.".a2017) AS a2017,
Sum(".$mon_tmp.".a2018) AS a2018,
Sum(".$mon_tmp.".a2019) AS a2019,
Sum(".$mon_tmp.".a2020) AS a2020,
Sum(".$mon_tmp.".a2020) AS a2021
FROM ".$mon_tmp." $capta ";*/
				
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
			   
		   if($sumatotal2019=='0.00'){
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
	
		   $xx=$sumatotal2012 + $sumatotal2013 + $sumatotal2014 + $sumatotal2015 + $sumatotal2016 + $sumatotal2017 + $sumatotal2018 + $sumatotal2019 + $sumatotal2020;
		  //$tota7 = number_format($xx / 9,2);
	      $tota7 = number_format($xx / $sumatotal2020,2);
	
		  $tota8 = "100.00";
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
  

				/*
   $query_resultado = "SELECT
".$mon_tmp.".codigo,
".$mon_tmp.".nomvariable,
".$mon_tmp.".a2012,
".$mon_tmp.".a2013,
".$mon_tmp.".a2014,
".$mon_tmp.".a2015,
".$mon_tmp.".a2016,
".$mon_tmp.".a2017,
".$mon_tmp.".a2018,
".$mon_tmp.".a2019,
".$mon_tmp.".a2020,
".$mon_tmp.".a2021
FROM ".$mon_tmp." WHERE codigo<>'dife'
ORDER BY ".$mon_tmp.".nomvariable ASC";
				*/
	$resultado_rpt=$conexpg->query($query1); 
if($resultado_rpt->num_rows>0){ 

echo"<div class='col-md-12'>";
        echo"<div class='card'>";
	echo"<div class='card-header card-header-info card-header-icon'>
              <div class='card-icon'>
                <i class='material-icons'>assignment</i>
              </div>
              <h4 class='card-title'><b>Reporte Anual de Mercado de Destino para las Exportaciones</b><br> Partida #: $partida1 │ Departamento: $namedepa1 │ Fecha Numeración │ $nomfiltro │ Periodo 2012 - 2021 </b> </h4>
            </div>";
		echo"<div class='card-body'>";
		echo"<div class='toolbar'>";
		echo"<a href='#mapa'><button class='btn btn-info btn-sm'> Ver Mapa Estadístico </button></a>";
                  echo"</div>";
         echo"<div class='material-datatables'>";
		echo"<table id='datatables' class='table table-striped table-no-bordered table-hover' cellspacing='0' width='100%' style='width:100%'>";
		  echo"<thead>
                          <tr>
                              <th>#</th>
							  <th>Países</th>
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
							   <th>Países</th>
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
		  //while ($fila_rpt=pg_fetch_array($resultado_rpt)) {
			  while($fila_rpt=$resultado_rpt->fetch_array()){
		   $nombredesc= $fila_rpt['espanol'];
				  $cuen = $cuen + 1;
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
		  
		  
		  if($year3=='0'){
			  $ca3 ='0';
		  }else{
		  $ca3 = (($year4 / $year3) - 1) * 100;
		  }
		  if($year4=='0'){
			  $ca4 ='0';
		  }else{
		  $ca4 = (($year5 / $year4) - 1) * 100;
		  }
		  if($year5=='0'){
			  $ca5 ='0';
		  }else{
		  $ca5 = (($year6 / $year5) - 1) * 100;
		  }
		  if($year6=='0'){
			  $ca6 ='0';
		  }else{
		  $ca6 = (($year7 / $year6) - 1) * 100;
		  }
		  if($year7=='0'){
			  $ca7 ='0';
		  }else{
		  $ca7 = (($year8 / $year7) - 1) * 100;
		  }
		  if($year8=='0'){
			  $ca8 ='0';
		  }else{
		  $ca8 = (($year9 / $year8) - 1) * 100;
		  }
			  if($year9=='0'){
			  $ca9 ='0';
		  }else{
		  $ca9 = (($year10 / $year9) - 1) * 100;
		  }
				  if($year10=='0'){
			  $ca10 ='0';
		  }else{
		  $ca10 = (($year11 / $year10) - 1) * 100;
		  }
				  if($year11=='0'){
			  $ca11 ='0';
		  }else{
		  $ca11 = (($year12 / $year11) - 1) * 100;
		  }
		  $catot = $ca3 + $ca4 + $ca5 + $ca6 + $ca7 + $ca8 + $ca9 + $ca10 + $ca11;
				  if($catot!="0" and $ca10!="0"){
		  $var22 = number_format($catot / 9,2);
		  //$var22 = number_format($catot / $ca10,2);
					  }else{
					 $var22 = "0.00"; 
				  }
		  
		  $var33= number_format(($year11 / $sumatotal2020)*100,2);
		  
		  echo "<tr>";
echo"<td>$cuen</td>";
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
echo "<td>$var33%</td>";
 echo "</tr>";
		  
		  }
		  
		  //echo"<thead>";
		  echo "<tr>";
		  echo "<th></th>";
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
			 echo "<th><b>$tota6%</b></th>";
			 echo "<th><b>$tota7%</b></th>";
			 echo "<th><b>$tota8</b></th>";
		  echo "</tr>";
		  //echo"</thead>";
		  echo"</tbody>";
		  echo"</table>";
		  echo"</div>";
		  echo"</div>";
		  echo"</div>";
		  echo"</div>";

		   echo "</div></div></div>";
		   
		   ?>



<?php
		   
	  }else{
	echo"<center><h4><font color='#EC0D36'>No hay Resultados<br>El Numero de Partida $nombres o seleccion $combo Incorrectos</font></h4></center>";
}

				?>
				
<style>
.chart {
  width: 100%; 
  min-height: 450px;
}
</style>
          <!--<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>-->
    <script type="text/javascript">
      google.charts.load('current', {'packages':['geochart']});
      google.charts.setOnLoadCallback(drawRegionsMap);

      function drawRegionsMap() {

        var data = google.visualization.arrayToDataTable([
          ['Country', 'Valor FOB USD'],
<?php
		if($filtro=="vfobserdol"){
			$query_mapa = "SELECT exportacion.cpaides, paises.espanol,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2020' THEN exportacion.vfobserdol ELSE 0 END ) as a2020
FROM exportacion LEFT JOIN paises ON exportacion.cpaides = paises.idpaises WHERE exportacion.part_nandi = ".$partida1." $query1var AND extract(year from exportacion.fnum) = '2020' GROUP BY exportacion.cpaides,paises.espanol ORDER BY paises.espanol ASC";
		}
		if($filtro=="vpesnet"){
			$query_mapa = "SELECT exportacion.cpaides, paises.espanol,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2020' THEN exportacion.vpesnet ELSE 0 END ) as a2020
FROM exportacion LEFT JOIN paises ON exportacion.cpaides = paises.idpaises WHERE exportacion.part_nandi = ".$partida1." $query1var AND extract(year from exportacion.fnum) = '2020' GROUP BY exportacion.cpaides,paises.espanol ORDER BY paises.espanol ASC";
			}
		if($filtro=="diferen"){
			$query_mapa = "SELECT exportacion.cpaides, paises.espanol,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2020' THEN exportacion.vfobserdol ELSE 0 END ) / sum(CASE extract(YEAR from exportacion.fnum) WHEN '2020' THEN exportacion.vpesnet ELSE 0 END ) as a2020
FROM exportacion LEFT JOIN paises ON exportacion.cpaides = paises.idpaises WHERE exportacion.part_nandi = ".$partida1." $query1var AND extract(year from exportacion.fnum) = '2020' GROUP BY exportacion.cpaides,paises.espanol ORDER BY paises.espanol ASC";
		}
			$mapa_rpt=$conexpg->query($query_mapa); 
if($mapa_rpt->num_rows>0){ 
while($fila_ma=$mapa_rpt->fetch_array()){
		   $nombredesc= $fila_ma['cpaides'];
		  $year8= $fila_ma['a2020']; 
	?>	
	['<?php echo $nombredesc; ?>', <?php echo $year8; ?>],
	<?php
		   }
	  }
	?>
        ]);

        var options = {};
        var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));

        chart.draw(data, options);
      }
    </script>
       <center>
        <h3 class="title" id="mapa"><font color="#FFFFFF">Mapa Geografico │ Partida <?=$partida1;?> │ Departamento: <?=$namedepa1;?> │ Evolucion Anual de Exportaciones │ <?=$nomfiltro;?> │ Periodo 2020</font></h3></center>
         <div class="col-md-12 ml-auto mr-auto">
          <div id="regions_div" class="chart"></div>
          <br>
          <?php //include("../../footer_pie.php"); ?>
         
          </div>
          <!-- ******* -->

            </div>
  
   
    
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
            [15, 25, 50, -1],
            [15, 25, 50, "Todos"]
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

<?php
	mysqli_close($conexpg);
?>
