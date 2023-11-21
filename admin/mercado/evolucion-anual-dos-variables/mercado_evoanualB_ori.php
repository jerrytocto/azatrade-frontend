<?php
/*primero consultamos la suma total general de cada ano*/
  if($nombres2=="vfobserdol" or $nombres2=="vpesnet" or $nombres2=="vpesbru" or $nombres2=="qunifis" or $nombres2=="qunicom"){
	  $sqlyear="SELECT
Sum(CASE ".$filtrofecha." WHEN '2012' THEN ".$nombres2." ELSE 0 END) AS a2012,
Sum(CASE ".$filtrofecha." WHEN '2013' THEN ".$nombres2." ELSE 0 END) AS a2013,
Sum(CASE ".$filtrofecha." WHEN '2014' THEN ".$nombres2." ELSE 0 END) AS a2014,
Sum(CASE ".$filtrofecha." WHEN '2015' THEN ".$nombres2." ELSE 0 END) AS a2015,
Sum(CASE ".$filtrofecha." WHEN '2016' THEN ".$nombres2." ELSE 0 END) AS a2016,
Sum(CASE ".$filtrofecha." WHEN '2017' THEN ".$nombres2." ELSE 0 END) AS a2017,
Sum(CASE ".$filtrofecha." WHEN '2018' THEN ".$nombres2." ELSE 0 END) AS a2018,
Sum(CASE ".$filtrofecha." WHEN '2019' THEN ".$nombres2." ELSE 0 END) AS a2019
FROM exportacion 
WHERE exportacion.cpaides = '".$paiscode."' AND ".$wherefecha." AND SUBSTRING(exportacion.ubigeo,1,2) like '%$flatcod' ";
  }
  if($nombres2=="diferen"){
	  $sqlyear="SELECT
Sum(CASE ".$filtrofecha." WHEN '2012' THEN exportacion.vfobserdol ELSE 0 END) / SUM(CASE ".$filtrofecha." WHEN '2012' THEN exportacion.vpesnet ELSE 0 END) AS a2012,
Sum(CASE ".$filtrofecha." WHEN '2013' THEN exportacion.vfobserdol ELSE 0 END) / SUM(CASE ".$filtrofecha." WHEN '2013' THEN exportacion.vpesnet ELSE 0 END) AS a2013,
Sum(CASE ".$filtrofecha." WHEN '2014' THEN exportacion.vfobserdol ELSE 0 END) / SUM(CASE ".$filtrofecha." WHEN '2014' THEN exportacion.vpesnet ELSE 0 END) AS a2014,
Sum(CASE ".$filtrofecha." WHEN '2015' THEN exportacion.vfobserdol ELSE 0 END) / SUM(CASE ".$filtrofecha." WHEN '2015' THEN exportacion.vpesnet ELSE 0 END) AS a2015,
Sum(CASE ".$filtrofecha." WHEN '2016' THEN exportacion.vfobserdol ELSE 0 END) / SUM(CASE ".$filtrofecha." WHEN '2016' THEN exportacion.vpesnet ELSE 0 END) AS a2016,
Sum(CASE ".$filtrofecha." WHEN '2017' THEN exportacion.vfobserdol ELSE 0 END) / SUM(CASE ".$filtrofecha." WHEN '2017' THEN exportacion.vpesnet ELSE 0 END) AS a2017,
Sum(CASE ".$filtrofecha." WHEN '2018' THEN exportacion.vfobserdol ELSE 0 END) / SUM(CASE ".$filtrofecha." WHEN '2018' THEN exportacion.vpesnet ELSE 0 END) AS a2018,
Sum(CASE ".$filtrofecha." WHEN '2019' THEN exportacion.vfobserdol ELSE 0 END) / SUM(CASE ".$filtrofecha." WHEN '2019' THEN exportacion.vpesnet ELSE 0 END) AS a2019
FROM exportacion 
WHERE exportacion.cpaides = '".$paiscode."' AND ".$wherefecha." AND SUBSTRING(exportacion.ubigeo,1,2) like '%$flatcod' ";
  }
  
  if($nombres2=="total"){
	  $sqlyear="SELECT
Sum(CASE ".$filtrofecha." WHEN '2012' THEN 1 ELSE 0 END) AS a2012,
Sum(CASE ".$filtrofecha." WHEN '2013' THEN 1 ELSE 0 END) AS a2013,
Sum(CASE ".$filtrofecha." WHEN '2014' THEN 1 ELSE 0 END) AS a2014,
Sum(CASE ".$filtrofecha." WHEN '2015' THEN 1 ELSE 0 END) AS a2015,
Sum(CASE ".$filtrofecha." WHEN '2016' THEN 1 ELSE 0 END) AS a2016,
Sum(CASE ".$filtrofecha." WHEN '2017' THEN 1 ELSE 0 END) AS a2017,
Sum(CASE ".$filtrofecha." WHEN '2018' THEN 1 ELSE 0 END) AS a2018,
Sum(CASE ".$filtrofecha." WHEN '2019' THEN 1 ELSE 0 END) AS a2019
FROM exportacion 
WHERE exportacion.cpaides = '".$paiscode."' AND ".$wherefecha." AND SUBSTRING(exportacion.ubigeo,1,2) like '%$flatcod' ";
  }
  
  if($nombres2=="part_nandi" or $nombres2=="ndcl" or $nombres2=="dnombre" or $nombres2=="cpaides" or $nombres2=="cpuedes" or  $nombres2=="cadu" or $nombres2=="cage" or $nombres2=="cviatra"){
	 $sqlyear="SELECT
COUNT(DISTINCT CASE ".$filtrofecha." WHEN '2012' THEN exportacion.".$nombres2." ELSE NULL END) AS a2012,
COUNT(DISTINCT CASE ".$filtrofecha." WHEN '2013' THEN exportacion.".$nombres2." ELSE NULL END) AS a2013,
COUNT(DISTINCT CASE ".$filtrofecha." WHEN '2014' THEN exportacion.".$nombres2." ELSE NULL END) AS a2014,
COUNT(DISTINCT CASE ".$filtrofecha." WHEN '2015' THEN exportacion.".$nombres2." ELSE NULL END) AS a2015,
COUNT(DISTINCT CASE ".$filtrofecha." WHEN '2016' THEN exportacion.".$nombres2." ELSE NULL END) AS a2016,
COUNT(DISTINCT CASE ".$filtrofecha." WHEN '2017' THEN exportacion.".$nombres2." ELSE NULL END) AS a2017,
COUNT(DISTINCT CASE ".$filtrofecha." WHEN '2018' THEN exportacion.".$nombres2." ELSE NULL END) AS a2018,
COUNT(DISTINCT CASE ".$filtrofecha." WHEN '2019' THEN exportacion.".$nombres2." ELSE NULL END) AS a2019
FROM exportacion 
WHERE exportacion.cpaides = '".$paiscode."' AND ".$wherefecha." AND SUBSTRING(exportacion.ubigeo,1,2) like '%$flatcod' "; 
  }
  if($nombres2=="provi" or $nombres2=="distri" or $nombres2=="depa"){
	  if($nombres2=="depa"){
		  $varia='substring(exportacion.ubigeo,1,2)';
	  }else if($nombres2=="provi"){
		  $varia='substring(exportacion.ubigeo,3,2)';
	  }else{
		  $varia='substring(exportacion.ubigeo,5,2)';
	  }
	  $sqlyear="SELECT
COUNT(DISTINCT CASE ".$filtrofecha." WHEN '2012' THEN ".$varia." ELSE NULL END) AS a2012,
COUNT(DISTINCT CASE ".$filtrofecha." WHEN '2013' THEN ".$varia." ELSE NULL END) AS a2013,
COUNT(DISTINCT CASE ".$filtrofecha." WHEN '2014' THEN ".$varia." ELSE NULL END) AS a2014,
COUNT(DISTINCT CASE ".$filtrofecha." WHEN '2015' THEN ".$varia." ELSE NULL END) AS a2015,
COUNT(DISTINCT CASE ".$filtrofecha." WHEN '2016' THEN ".$varia." ELSE NULL END) AS a2016,
COUNT(DISTINCT CASE ".$filtrofecha." WHEN '2017' THEN ".$varia." ELSE NULL END) AS a2017,
COUNT(DISTINCT CASE ".$filtrofecha." WHEN '2018' THEN ".$varia." ELSE NULL END) AS a2018,
COUNT(DISTINCT CASE ".$filtrofecha." WHEN '2019' THEN ".$varia." ELSE NULL END) AS a2019
FROM exportacion 
WHERE
exportacion.cpaides = '".$paiscode."' AND ".$wherefecha." AND SUBSTRING(exportacion.ubigeo,1,2) like '%$flatcod' ";
	  
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
exportacion.dnombre,
Sum(CASE ".$filtrofecha." WHEN '2012' THEN ".$nombres2." ELSE 0 END) AS a2012,
Sum(CASE ".$filtrofecha." WHEN '2013' THEN ".$nombres2." ELSE 0 END) AS a2013,
Sum(CASE ".$filtrofecha." WHEN '2014' THEN ".$nombres2." ELSE 0 END) AS a2014,
Sum(CASE ".$filtrofecha." WHEN '2015' THEN ".$nombres2." ELSE 0 END) AS a2015,
Sum(CASE ".$filtrofecha." WHEN '2016' THEN ".$nombres2." ELSE 0 END) AS a2016,
Sum(CASE ".$filtrofecha." WHEN '2017' THEN ".$nombres2." ELSE 0 END) AS a2017,
Sum(CASE ".$filtrofecha." WHEN '2018' THEN ".$nombres2." ELSE 0 END) AS a2018,
Sum(CASE ".$filtrofecha." WHEN '2019' THEN ".$nombres2." ELSE 0 END) AS a2019
FROM exportacion
WHERE exportacion.cpaides = '".$paiscode."' AND ".$wherefecha." AND SUBSTRING(exportacion.ubigeo,1,2) like '%$flatcod'
GROUP BY exportacion.dnombre ORDER BY exportacion.dnombre ASC";
  }else if ($nombres2=="diferen"){
	  $query_resultado = "SELECT
exportacion.dnombre,
Sum(CASE ".$filtrofecha." WHEN '2012' THEN exportacion.vfobserdol ELSE 0 END) AS x2012,
Sum(CASE ".$filtrofecha." WHEN '2012' THEN exportacion.vpesnet ELSE 0 END) AS xx2012,
Sum(CASE ".$filtrofecha." WHEN '2013' THEN exportacion.vfobserdol ELSE 0 END) AS x2013,
Sum(CASE ".$filtrofecha." WHEN '2013' THEN exportacion.vpesnet ELSE 0 END) AS xx2013,
Sum(CASE ".$filtrofecha." WHEN '2014' THEN exportacion.vfobserdol ELSE 0 END) AS x2014,
Sum(CASE ".$filtrofecha." WHEN '2014' THEN exportacion.vpesnet ELSE 0 END) AS xx2014,
Sum(CASE ".$filtrofecha." WHEN '2015' THEN exportacion.vfobserdol ELSE 0 END) AS x2015,
Sum(CASE ".$filtrofecha." WHEN '2015' THEN exportacion.vpesnet ELSE 0 END) AS xx2015,
Sum(CASE ".$filtrofecha." WHEN '2016' THEN exportacion.vfobserdol ELSE 0 END) AS x2016,
Sum(CASE ".$filtrofecha." WHEN '2016' THEN exportacion.vpesnet ELSE 0 END) AS xx2016,
Sum(CASE ".$filtrofecha." WHEN '2017' THEN exportacion.vfobserdol ELSE 0 END) AS x2017,
Sum(CASE ".$filtrofecha." WHEN '2017' THEN exportacion.vpesnet ELSE 0 END) AS xx2017,
Sum(CASE ".$filtrofecha." WHEN '2018' THEN exportacion.vfobserdol ELSE 0 END) AS x2018,
Sum(CASE ".$filtrofecha." WHEN '2018' THEN exportacion.vpesnet ELSE 0 END) AS xx2018,
Sum(CASE ".$filtrofecha." WHEN '2019' THEN exportacion.vfobserdol ELSE 0 END) AS x2019,
Sum(CASE ".$filtrofecha." WHEN '2019' THEN exportacion.vpesnet ELSE 0 END) AS xx2019
FROM exportacion
WHERE exportacion.cpaides = '".$paiscode."' AND ".$wherefecha." AND SUBSTRING(exportacion.ubigeo,1,2) like '%$flatcod' GROUP BY exportacion.dnombre ORDER BY exportacion.dnombre ASC";
  }else if($nombres2=="total"){
	  $query_resultado = "SELECT
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
WHERE exportacion.cpaides = '".$paiscode."' AND
".$wherefecha." AND SUBSTRING(exportacion.ubigeo,1,2) like '%$flatcod' GROUP BY exportacion.dnombre ORDER BY exportacion.dnombre ASC";
  } else if($nombres2=="part_nandi" or $nombres2=="ndcl" or $nombres2=="dnombre" or $nombres2=="cpaides" or $nombres2=="cpuedes" or  $nombres2=="cadu" or $nombres2=="cage" or $nombres2=="cviatra"){
	  $query_resultado = "SELECT
exportacion.dnombre,
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
WHERE exportacion.cpaides = '".$paiscode."' AND ".$wherefecha." AND SUBSTRING(exportacion.ubigeo,1,2) like '%$flatcod' GROUP BY exportacion.dnombre ORDER BY exportacion.dnombre ASC";
  }else{
	  if($nombres2=="depa"){
		  $variaA='substring(exportacion.ubigeo,1,2)';
	  }else if($nombres2=="provi"){
		  $variaA='substring(exportacion.ubigeo,3,2)';
	  }else{
		  $variaA='substring(exportacion.ubigeo,5,2)';
	  }
	  $query_resultado = "SELECT
exportacion.dnombre,
COUNT(distinct CASE ".$filtrofecha." WHEN '2012' THEN  ".$variaA." ELSE NULL END) AS a2012,
COUNT(distinct CASE ".$filtrofecha." WHEN '2013' THEN  ".$variaA." ELSE NULL END) AS a2013,
COUNT(distinct CASE ".$filtrofecha." WHEN '2014' THEN  ".$variaA." ELSE NULL END) AS a2014,
COUNT(distinct CASE ".$filtrofecha." WHEN '2015' THEN  ".$variaA." ELSE NULL END) AS a2015,
COUNT(distinct CASE ".$filtrofecha." WHEN '2016' THEN  ".$variaA." ELSE NULL END) AS a2016,
COUNT(distinct CASE ".$filtrofecha." WHEN '2017' THEN  ".$variaA." ELSE NULL END) AS a2017,
COUNT(distinct CASE ".$filtrofecha." WHEN '2018' THEN  ".$variaA." ELSE NULL END) AS a2018,
COUNT(distinct CASE ".$filtrofecha." WHEN '2019' THEN  ".$variaA." ELSE NULL END) AS a2019
FROM exportacion
WHERE exportacion.cpaides = '".$paiscode."' AND
".$wherefecha." AND SUBSTRING(exportacion.ubigeo,1,2) like '%$flatcod' GROUP BY exportacion.dnombre ORDER BY exportacion.dnombre ASC ";
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
              <h4 class='card-title'><b>Reporte Mercado Evoluci&oacute;n Mensual de Exportaciones</b><br> Mercado: $paisname │ Departamento: $namedepa1 │ Variable #1: $combo - Variable #2: $combo2 │ Fecha Numeracion │ Periodo 2012 - 2019 </b> </h4>
            </div>";
		echo"<div class='card-body'>";
		echo"<div class='toolbar'>
		<a href='#mer'><button class='btn btn-info btn-sm'> Ver Cuadro Estadístico </button></a>
                  </div>";
         echo"<div class='material-datatables'>";
		echo"<table id='datatables' class='table table-striped table-no-bordered table-hover' cellspacing='0' width='100%' style='width:100%'>";
		  echo"<thead>
                          <tr>
                              <th>#</th>
							  <th>Empresas Exportadoras</th>
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
						      <th>#</th>
							  <th>Empresas Exportadoras</th>
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
           $codigotemp= $codigotemp + 1;
		   $nombredesc= $fila_rpt['dnombre'];
		   if($nombredesc==""){
			   $nombredesc="---";
		   }else{
			   $nombredesc= $fila_rpt['dnombre'];
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
		if($codigotemp<='5'){
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

		   echo "</div></div></div>";
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
        ['City', '2012', '2013', '2014', '2015', '2016', '2017', '2018', '2019'],
<?php
if($nombres2=="vfobserdol" or $nombres2=="vpesnet" or $nombres2=="vpesbru" or $nombres2=="qunifis" or $nombres2=="qunicom"){
   $query_resultado = "SELECT
exportacion.dnombre,
Sum(CASE ".$filtrofecha." WHEN '2012' THEN ".$nombres2." ELSE 0 END) AS a2012,
Sum(CASE ".$filtrofecha." WHEN '2013' THEN ".$nombres2." ELSE 0 END) AS a2013,
Sum(CASE ".$filtrofecha." WHEN '2014' THEN ".$nombres2." ELSE 0 END) AS a2014,
Sum(CASE ".$filtrofecha." WHEN '2015' THEN ".$nombres2." ELSE 0 END) AS a2015,
Sum(CASE ".$filtrofecha." WHEN '2016' THEN ".$nombres2." ELSE 0 END) AS a2016,
Sum(CASE ".$filtrofecha." WHEN '2017' THEN ".$nombres2." ELSE 0 END) AS a2017,
Sum(CASE ".$filtrofecha." WHEN '2018' THEN ".$nombres2." ELSE 0 END) AS a2018,
Sum(CASE ".$filtrofecha." WHEN '2019' THEN ".$nombres2." ELSE 0 END) AS a2019
FROM exportacion
WHERE exportacion.cpaides = '".$paiscode."' AND ".$wherefecha." AND SUBSTRING(exportacion.ubigeo,1,2) like '%$flatcod'
GROUP BY exportacion.dnombre ORDER BY a2018 DESC LIMIT 5";
  }else if ($nombres2=="diferen"){
	  $query_resultado = "SELECT
exportacion.dnombre,
Sum(CASE ".$filtrofecha." WHEN '2012' THEN exportacion.vfobserdol ELSE 0 END) AS x2012,
Sum(CASE ".$filtrofecha." WHEN '2012' THEN exportacion.vpesnet ELSE 0 END) AS xx2012,
Sum(CASE ".$filtrofecha." WHEN '2013' THEN exportacion.vfobserdol ELSE 0 END) AS x2013,
Sum(CASE ".$filtrofecha." WHEN '2013' THEN exportacion.vpesnet ELSE 0 END) AS xx2013,
Sum(CASE ".$filtrofecha." WHEN '2014' THEN exportacion.vfobserdol ELSE 0 END) AS x2014,
Sum(CASE ".$filtrofecha." WHEN '2014' THEN exportacion.vpesnet ELSE 0 END) AS xx2014,
Sum(CASE ".$filtrofecha." WHEN '2015' THEN exportacion.vfobserdol ELSE 0 END) AS x2015,
Sum(CASE ".$filtrofecha." WHEN '2015' THEN exportacion.vpesnet ELSE 0 END) AS xx2015,
Sum(CASE ".$filtrofecha." WHEN '2016' THEN exportacion.vfobserdol ELSE 0 END) AS x2016,
Sum(CASE ".$filtrofecha." WHEN '2016' THEN exportacion.vpesnet ELSE 0 END) AS xx2016,
Sum(CASE ".$filtrofecha." WHEN '2017' THEN exportacion.vfobserdol ELSE 0 END) AS x2017,
Sum(CASE ".$filtrofecha." WHEN '2017' THEN exportacion.vpesnet ELSE 0 END) AS xx2017,
Sum(CASE ".$filtrofecha." WHEN '2018' THEN exportacion.vfobserdol ELSE 0 END) AS x2018,
Sum(CASE ".$filtrofecha." WHEN '2018' THEN exportacion.vpesnet ELSE 0 END) AS xx2018,
Sum(CASE ".$filtrofecha." WHEN '2019' THEN exportacion.vfobserdol ELSE 0 END) AS x2019,
Sum(CASE ".$filtrofecha." WHEN '2019' THEN exportacion.vpesnet ELSE 0 END) AS xx2019
FROM exportacion
WHERE exportacion.cpaides = '".$paiscode."' AND ".$wherefecha." AND SUBSTRING(exportacion.ubigeo,1,2) like '%$flatcod' GROUP BY exportacion.dnombre ORDER BY xx2018 DESC LIMIT 5";
  }else if($nombres2=="total"){
	  $query_resultado = "SELECT
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
WHERE exportacion.cpaides = '".$paiscode."' AND
".$wherefecha." AND SUBSTRING(exportacion.ubigeo,1,2) like '%$flatcod' GROUP BY exportacion.dnombre ORDER BY a2018 DESC LIMIT 5";
  } else if($nombres2=="part_nandi" or $nombres2=="ndcl" or $nombres2=="dnombre" or $nombres2=="cpaides" or $nombres2=="cpuedes" or  $nombres2=="cadu" or $nombres2=="cage" or $nombres2=="cviatra"){
	  $query_resultado = "SELECT
exportacion.dnombre,
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
WHERE exportacion.cpaides = '".$paiscode."' AND ".$wherefecha." AND SUBSTRING(exportacion.ubigeo,1,2) like '%$flatcod' GROUP BY exportacion.dnombre ORDER BY a2018 DESC LIMIT 5";
  }else{
	  if($nombres2=="depa"){
		  $variaA='substring(exportacion.ubigeo,1,2)';
	  }else if($nombres2=="provi"){
		  $variaA='substring(exportacion.ubigeo,3,2)';
	  }else{
		  $variaA='substring(exportacion.ubigeo,5,2)';
	  }
	  $query_resultado = "SELECT
exportacion.dnombre,
COUNT(distinct CASE ".$filtrofecha." WHEN '2012' THEN  ".$variaA." ELSE NULL END) AS a2012,
COUNT(distinct CASE ".$filtrofecha." WHEN '2013' THEN  ".$variaA." ELSE NULL END) AS a2013,
COUNT(distinct CASE ".$filtrofecha." WHEN '2014' THEN  ".$variaA." ELSE NULL END) AS a2014,
COUNT(distinct CASE ".$filtrofecha." WHEN '2015' THEN  ".$variaA." ELSE NULL END) AS a2015,
COUNT(distinct CASE ".$filtrofecha." WHEN '2016' THEN  ".$variaA." ELSE NULL END) AS a2016,
COUNT(distinct CASE ".$filtrofecha." WHEN '2017' THEN  ".$variaA." ELSE NULL END) AS a2017,
COUNT(distinct CASE ".$filtrofecha." WHEN '2018' THEN  ".$variaA." ELSE NULL END) AS a2018,
COUNT(distinct CASE ".$filtrofecha." WHEN '2019' THEN  ".$variaA." ELSE NULL END) AS a2019
FROM exportacion
WHERE exportacion.cpaides = '".$paiscode."' AND
".$wherefecha." AND SUBSTRING(exportacion.ubigeo,1,2) like '%$flatcod' GROUP BY exportacion.dnombre ORDER BY a2018 DESC LIMIT 5";
  }
  
  
	  /*$resultado_rpt = pg_query($query_resultado) or die("Error en la Consulta SQL Reporte");
	  $numReg_rpt = pg_num_rows($resultado_rpt);
	  if($numReg_rpt>0){
		  while ($fila_rpt=pg_fetch_array($resultado_rpt)) {*/
		  $resultado_rpt=$conexpg->query($query_resultado); 
if($resultado_rpt->num_rows>0){ 
while($fila_rpt=$resultado_rpt->fetch_array()){
		   $codigotemp= $codigotemp + 1;
		   $nombredesc= $fila_rpt['dnombre'];
		   if($nombredesc==""){
			   $nombredesc="---";
		   }else{
			   $nombredesc= $fila_rpt['dnombre'];
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
        title: 'Empresa: <?php echo $paisname ?> - Departamento: <?=$namedepa1;?> - Evolución Mensual <?php echo $combo ?> - <?php echo $combo2 ?> de Exportaciones',
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
    
   <div class="col-md-12 ml-auto mr-auto" id="mer">
	<div id="chart_div" class="chart"></div>
	<br>
          <?php include("../../footer_pie.php"); ?>
          </div>