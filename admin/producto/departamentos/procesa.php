<?php
session_start();
set_time_limit(500);
$partida1 = $_GET["varipartidaregion"];
$describus = $_GET["nomdescri"];
$filtro = $_GET["unavaria"];
?>

            <div class='col-md-12'>

            <?php
				include("../../incBD/inibd.php");
				
				if($filtro=="vfobserdol"){
					$nomfiltro ="Valor FOB USD";
				}else if($filtro=="vpesnet"){
					$nomfiltro ="Peso Neto (Kg)";
				}else{
					$nomfiltro ="Precio FOB USD x KG";
				}
				
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
FROM exportacion LEFT JOIN departamento ON   ((((SUBSTRING(exportacion.ubigeo,1,2))= departamento.iddepartamento))) WHERE exportacion.part_nandi = ".$partida1." AND extract(YEAR from exportacion.fnum) >= '2012' AND
extract(year from exportacion.fnum) <= '2021' AND CONCAT(exportacion.dcom,exportacion.dmer2,exportacion.dmer3,exportacion.dmer4,exportacion.DMER5) LIKE '%$describus%' GROUP BY departamento.nombre,ubi1 ORDER BY nombre ASC";
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
FROM exportacion LEFT JOIN departamento ON   ((((SUBSTRING(exportacion.ubigeo,1,2))= departamento.iddepartamento))) WHERE exportacion.part_nandi = ".$partida1." AND extract(YEAR from exportacion.fnum) >= '2012' AND
extract(year from exportacion.fnum) <= '2021' AND CONCAT(exportacion.dcom,exportacion.dmer2,exportacion.dmer3,exportacion.dmer4,exportacion.DMER5) LIKE '%$describus%' GROUP BY departamento.nombre,ubi1 ORDER BY nombre ASC";
	}
if($filtro=="diferen"){
	$query1 = "SELECT substring(exportacion.ubigeo,1,2) as ubi1, departamento.nombre,
	sum(CASE extract(year from exportacion.fnum) WHEN '2012' THEN exportacion.vfobserdol ELSE 0 END)  / sum(CASE extract(year from exportacion.fnum) WHEN '2012' THEN exportacion.vpesnet ELSE 0 END) AS y2012,
sum(CASE extract(year from exportacion.fnum) WHEN '2013' THEN exportacion.vfobserdol ELSE 0 END)  / sum(CASE extract(year from exportacion.fnum) WHEN '2013' THEN exportacion.vpesnet ELSE 0 END) AS a2013,
sum(CASE extract(year from exportacion.fnum) WHEN '2014' THEN exportacion.vfobserdol ELSE 0 END)  / sum(CASE extract(year from exportacion.fnum) WHEN '2014' THEN exportacion.vpesnet ELSE 0 END) AS a2014,
sum(CASE extract(year from exportacion.fnum) WHEN '2015' THEN exportacion.vfobserdol ELSE 0 END)  / sum(CASE extract(year from exportacion.fnum) WHEN '2015' THEN exportacion.vpesnet ELSE 0 END) AS a2015,
sum(CASE extract(year from exportacion.fnum) WHEN '2016' THEN exportacion.vfobserdol ELSE 0 END)  / sum(CASE extract(year from exportacion.fnum) WHEN '2016' THEN exportacion.vpesnet ELSE 0 END) AS a2016,
sum(CASE extract(year from exportacion.fnum) WHEN '2017' THEN exportacion.vfobserdol ELSE 0 END)  / sum(CASE extract(year from exportacion.fnum) WHEN '2017' THEN exportacion.vpesnet ELSE 0 END) AS a2017,
sum(CASE extract(year from exportacion.fnum) WHEN '2018' THEN exportacion.vfobserdol ELSE 0 END)  / sum(CASE extract(year from exportacion.fnum) WHEN '2018' THEN exportacion.vpesnet ELSE 0 END) AS a2018,
sum(CASE extract(year from exportacion.fnum) WHEN '2019' THEN exportacion.vfobserdol ELSE 0 END)  / sum(CASE extract(year from exportacion.fnum) WHEN '2019' THEN exportacion.vpesnet ELSE 0 END) AS a2019,
sum(CASE extract(year from exportacion.fnum) WHEN '2020' THEN exportacion.vfobserdol ELSE 0 END)  / sum(CASE extract(year from exportacion.fnum) WHEN '2020' THEN exportacion.vpesnet ELSE 0 END) AS a2020,
sum(CASE extract(year from exportacion.fnum) WHEN '2021' THEN exportacion.vfobserdol ELSE 0 END)  / sum(CASE extract(year from exportacion.fnum) WHEN '2021' THEN exportacion.vpesnet ELSE 0 END) AS a2021 
FROM exportacion LEFT JOIN departamento ON   ((((SUBSTRING(exportacion.ubigeo,1,2))= departamento.iddepartamento))) WHERE exportacion.part_nandi = ".$partida1." AND extract(YEAR from exportacion.fnum) >= '2012' AND
extract(year from exportacion.fnum) <= '2021' AND CONCAT(exportacion.dcom,exportacion.dmer2,exportacion.dmer3,exportacion.dmer4,exportacion.DMER5) LIKE '%$describus%' GROUP BY departamento.nombre,ubi1 ORDER BY nombre ASC";
}
				
				/*
$querya=$conexpg->query($query1); 
if($querya->num_rows>0){ 
while($fila1=$querya->fetch_array()){ 
		  $val1= $fila1['anio'];
		  $val2= $fila1['ubi1'];
		  $val3= $fila1['resultado'];
		 
		 
		  if($val1=='2012'){
  $insert1 = "UPDATE ".$mon_tmp." SET a2012='".$val3."' WHERE codigo='$val2' "; 
 $rs = $conexpg->query($insert1);
//$rs = pg_query($insert1 )or die("Error en la Consulta SQL Update enero");
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
	$preciosqlxx = "SELECT extract(YEAR from exportacion.fnum) AS anio, sum(exportacion.vfobserdol)/sum(exportacion.vpesnet) AS resultado FROM exportacion LEFT JOIN departamento ON   ((((SUBSTRING(exportacion.ubigeo,1,2))= departamento.iddepartamento))) WHERE exportacion.part_nandi = ".$partida1." AND extract(YEAR from exportacion.fnum) >= '2012' AND
extract(year from exportacion.fnum) <= '2021' AND CONCAT(exportacion.dcom,exportacion.dmer2,exportacion.dmer3,exportacion.dmer4,exportacion.DMER5) LIKE '%$describus%' GROUP BY anio ORDER BY anio ASC";
	$rsqlprexx=$conexpg->query($preciosqlxx); 
if($rsqlprexx->num_rows>0){ 
while($rwpreci=$rsqlprexx->fetch_array()){
          $pret1= $rwpreci['anio'];
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
		  
		   echo"<br><br><center><h4><font color='#EC0D36'>No hay Resultados<br>El Numero de Partida $nombres o seleccion $combo Incorrectos</font></h4></center>";
			 
			 			  
	 $delete1 = mysqli_query($conexpg, "DROP TABLE ".$mon_tmp.";");
  if (!$delete1) {
    echo "Query: Un Eerror ha Occurido al Eliminar la Tabla Temporal";
  }else{
	  
  }
  
}
				*/
				
//if($querya!=0){//inicia si hay resultados
/*
	   $sqlyear="SELECT
Sum(".$mon_tmp.".a2012) AS a2012,
Sum(".$mon_tmp.".a2013) AS a2013,
Sum(".$mon_tmp.".a2014) AS a2014,
Sum(".$mon_tmp.".a2015) AS a2015,
Sum(".$mon_tmp.".a2016) AS a2016,
Sum(".$mon_tmp.".a2017) AS a2017,
Sum(".$mon_tmp.".a2018) AS a2018,
Sum(".$mon_tmp.".a2019) AS a2019,
Sum(".$mon_tmp.".a2020) AS a2020,
Sum(".$mon_tmp.".a2021) AS a2021
FROM
".$mon_tmp." $capta ";*/
	$result_year=$conexpg->query($query1); 
if($result_year->num_rows>0){
	while($fila_year=$result_year->fetch_array()){ 
		   $sttl2012= $fila_year['a2012'];
		   $sttl2013= $fila_year['a2013'];
		   $sttl2014= $fila_year['a2014'];
		   $sttl2015= $fila_year['a2015'];
		   $sttl2016= $fila_year['a2016'];
		   $sttl2017= $fila_year['a2017'];
		   $sttl2018= $fila_year['a2018'];
		   $sttl2019= $fila_year['a2019'];
		   $sttl2020= $fila_year['a2020'];
		   $sttl2021= $fila_year['a2021'];
		
		   $sumatotal2012= $sumatotal2012 + $sttl2012;
		   $sumatotal2013= $sumatotal2013 + $sttl2013;
		   $sumatotal2014= $sumatotal2014 + $sttl2014;
		   $sumatotal2015= $sumatotal2015 + $sttl2015;
		   $sumatotal2016= $sumatotal2016 + $sttl2016;
		   $sumatotal2017= $sumatotal2017 + $sttl2017;
		   $sumatotal2018= $sumatotal2018 + $sttl2018;
		   $sumatotal2019= $sumatotal2019 + $sttl2019;
		   $sumatotal2020= $sumatotal2020 + $sttl2020;
		   $sumatotal2021= $sumatotal2021 + $sttl2021;
		
		   }
	$varitota= number_format((($sumatotal2020 / $sumatotal2019) - 1) * 100,2);
		   $parti='100 %';
		   $tota6 =number_format((( $sumatotal2020 / $sumatotal2019) - 1) * 100,2);
	if($sumatotal2012=='0'){
			  $tca3 ='0';
		  }else{
		  $tca3 = (($sumatotal2013 / $sumatotal2012) - 1) * 100;
		  }
			   if($sumatotal2013=='0'){
			  $tca4 ='0';
		  }else{
		  $tca4 = (($sumatotal2014 / $sumatotal2013) - 1) * 100;
		  }
			   if($sumatotal2014=='0'){
			  $tca5 ='0';
		  }else{
		  $tca5 = (($sumatotal2015 / $sumatotal2014) - 1) * 100;
		  }
			   if($sumatotal2015=='0'){
			  $tca6 ='0';
		  }else{
		  $tca6 = (($sumatotal2016 / $sumatotal2015) - 1) * 100;
		  }
			   if($sumatotal2016=='0'){
			  $tca7 ='0';
		  }else{
		  $tca7 = (($sumatotal2017 / $sumatotal2016) - 1) * 100;
		  }
			   if($sumatotal2017=='0'){
			  $tca8 ='0';
		  }else{
		  $tca8 = (($sumatotal2018 / $sumatotal2017) - 1) * 100;
		  }
		if($sumatotal2018=='0'){
			  $tca9 ='0';
		  }else{
		  $tca9 = (($sumatotal2019 / $sumatotal2018) - 1) * 100;
		  }
		
		if($sumatotal2019=='0'){
			  $tca10 ='0';
		  }else{
		  $tca10 = (($sumatotal2020 / $sumatotal2019) - 1) * 100;
		  }

			   $xx= $tca3 + $tca4 + $tca5 + $tca6 + $tca7 + $tca8 + $tca9 + $tca10;
		  $tota7 = number_format($xx / 8,2);
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
	
	//$qresultadosr = "SELECT codigo,nomvariable,a2012,a2013,a2014,a2015,a2016,a2017,a2018,a2019,a2020,a2021 FROM ".$mon_tmp." WHERE codigo<>'dife' ORDER BY ".$mon_tmp.".nomvariable ASC";
	
	$qusr=$conexpg->query($query1); 
if($qusr->num_rows>0){
		  
		  echo"<div class='col-md-12'>";
        echo"<div class='card'>";
	echo"<div class='card-header card-header-info card-header-icon'>
              <div class='card-icon'>
                <i class='material-icons'>assignment</i>
              </div>
              <h4 class='card-title'><b>Reporte de Ubigeo Anual de Exportaciones</b><br> Producto: $describus │ Partida #: $partida1 │ Departamento: Todos │ Fecha Numeración │ $nomfiltro │ Periodo 2012 - 2021 </b> </h4>
            </div>";
		echo"<div class='card-body'>";
		echo"<div class='toolbar'>
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
		  
	while($fila_rpt=$qusr->fetch_array()){ 
		  $cuet = $cuet + 1;
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
		  
		  if($mes8=='0'){
		  $var11 ='0';
		  }else{
		  $var11 = number_format((($mes9 / $mes8) - 1) * 100,2);
		  }
			  
		  if($mes1=='0'){
			  $ca1 ='0';
		  }else{
		  $ca1 = (($mes2 / $mes1) - 1) * 100;
		  }
		  if($mes2=='0'){
			  $ca2 ='0';
		  }else{
		  $ca2 = (($mes3 / $mes2) - 1) * 100;
		  }
		  if($mes3=='0'){
			  $ca3 ='0';
		  }else{
		  $ca3 = (($mes4 / $mes3) - 1) * 100;
		  }
		  if($mes4=='0'){
			  $ca4 ='0';
		  }else{
		  $ca4 = (($mes5 / $mes4) - 1) * 100;
		  }
		  if($mes5=='0'){
			  $ca5 ='0';
		  }else{
		  $ca5 = (($mes6 / $mes5) - 1) * 100;
		  }
		  if($mes6=='0'){
			  $ca6 ='0';
		  }else{
		  $ca6 = (($mes7 / $mes6) - 1) * 100;
		  }
		  if($mes7=='0'){
			  $ca7 ='0';
		  }else{
		  $ca7 = (($mes8 / $mes7) - 1) * 100;
		  }
		  if($mes8=='0'){
			  $ca8 ='0';
		  }else{
		  $ca8 = (($mes9 / $mes8) - 1) * 100;
		  }
		if($mes9=='0'){
			  $ca9 ='0';
		  }else{
		  $ca9 = (($mes10 / $mes9) - 1) * 100;
		  }
		
		  $ca12 = ($ca1 + $ca2 + $ca3 + $ca4 + $ca5 + $ca6 + $ca7 + $ca8);
		  $var22 = number_format($ca12 / 8,2);
		
		if($tota8=='0'){
			  $parti15="0";
		  }else{
			  
			  if($nombres2=="provi" or $nombres2=="distri"){
				  $parti15= number_format(($mes9 / $tota9)*100,2);
			  }else{
		  $parti15=number_format(($mes9 / $sumatotal2020) * 100,2);
			  }
		  }
		
		  
		  echo "<tr>";
echo "<td>$cuet</td>";
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
		  //echo"sssssssssssss";
	  }else{
	echo"<br><br><center><h4><font color='#EC0D36'>No hay Resultados<br>El Numero de Partida $nombres o seleccion $combo Incorrectos</font></h4></center>";
}
	
//}

?>

           
            </div>
            
</body>
 
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
		"order": [[ 11, "desc" ]],
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
//cerrando conexion
	mysqli_close($conexpg);
?>
</html>