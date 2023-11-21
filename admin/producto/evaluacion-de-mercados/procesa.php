<?php
session_start();
ini_set("memory_limit", "150M");
set_time_limit(750);
$partida1 = $_GET["partida"];
$namedepa1 = $_GET["namedepa"];
$ubicod1 = $_GET["ubicod"];
$describus = $_GET["describus"];
$filtro = $_GET["unavaria"];
if($ubicod1!=""){
	$flatcod = $ubicod1;
	$sqlconsu = "AND SUBSTRING(exportacion.ubigeo,1,2) = '$flatcod'";
}else{
	$flatcod = "";
	$sqlconsu = "";
}

if($filtro=="vfobserdol"){
					$nomfiltro ="Valor FOB USD";
				}else if($filtro=="vpesnet"){
					$nomfiltro ="Peso Neto (Kg)";
				}else{
					$nomfiltro ="Precio FOB USD x KG";
				}

				include("../../incBD/inibd.php");

//if($filtro=="vfobserdol"){
$query1 = "SELECT exportacion.cpaides, paises.espanol, 
SUM(CASE extract(year from exportacion.fnum) WHEN '2012' THEN exportacion.vfobserdol ELSE 0 END) AS a2012,
SUM(CASE extract(year from exportacion.fnum) WHEN '2013' THEN exportacion.vfobserdol ELSE 0 END) AS a2013,
SUM(CASE extract(year from exportacion.fnum) WHEN '2014' THEN exportacion.vfobserdol ELSE 0 END) AS a2014,
SUM(CASE extract(year from exportacion.fnum) WHEN '2015' THEN exportacion.vfobserdol ELSE 0 END) AS a2015,
SUM(CASE extract(year from exportacion.fnum) WHEN '2016' THEN exportacion.vfobserdol ELSE 0 END) AS a2016,
SUM(CASE extract(year from exportacion.fnum) WHEN '2017' THEN exportacion.vfobserdol ELSE 0 END) AS a2017,
SUM(CASE extract(year from exportacion.fnum) WHEN '2018' THEN exportacion.vfobserdol ELSE 0 END) AS a2018,
SUM(CASE extract(year from exportacion.fnum) WHEN '2019' THEN exportacion.vfobserdol ELSE 0 END) AS a2019,
SUM(CASE extract(year from exportacion.fnum) WHEN '2020' THEN exportacion.vfobserdol ELSE 0 END) AS a2020,
SUM(CASE extract(year from exportacion.fnum) WHEN '2021' THEN exportacion.vfobserdol ELSE 0 END) AS a2021,
SUM(CASE extract(year from exportacion.fnum) WHEN '2012' THEN exportacion.vpesnet ELSE 0 END) AS p2012,
SUM(CASE extract(year from exportacion.fnum) WHEN '2013' THEN exportacion.vpesnet ELSE 0 END) AS p2013,
SUM(CASE extract(year from exportacion.fnum) WHEN '2014' THEN exportacion.vpesnet ELSE 0 END) AS p2014,
SUM(CASE extract(year from exportacion.fnum) WHEN '2015' THEN exportacion.vpesnet ELSE 0 END) AS p2015,
SUM(CASE extract(year from exportacion.fnum) WHEN '2016' THEN exportacion.vpesnet ELSE 0 END) AS p2016,
SUM(CASE extract(year from exportacion.fnum) WHEN '2017' THEN exportacion.vpesnet ELSE 0 END) AS p2017,
SUM(CASE extract(year from exportacion.fnum) WHEN '2018' THEN exportacion.vpesnet ELSE 0 END) AS p2018,
SUM(CASE extract(year from exportacion.fnum) WHEN '2019' THEN exportacion.vpesnet ELSE 0 END) AS p2019,
SUM(CASE extract(year from exportacion.fnum) WHEN '2020' THEN exportacion.vpesnet ELSE 0 END) AS p2020,
SUM(CASE extract(year from exportacion.fnum) WHEN '2021' THEN exportacion.vpesnet ELSE 0 END) AS p2021,
sum(CASE extract(year from exportacion.fnum) WHEN '2012' THEN exportacion.vfobserdol ELSE 0 END)  / sum(CASE extract(year from exportacion.fnum) WHEN '2012' THEN exportacion.vpesnet ELSE 0 END) AS c2012,
sum(CASE extract(year from exportacion.fnum) WHEN '2013' THEN exportacion.vfobserdol ELSE 0 END)  / sum(CASE extract(year from exportacion.fnum) WHEN '2013' THEN exportacion.vpesnet ELSE 0 END) AS c2013,
sum(CASE extract(year from exportacion.fnum) WHEN '2014' THEN exportacion.vfobserdol ELSE 0 END)  / sum(CASE extract(year from exportacion.fnum) WHEN '2014' THEN exportacion.vpesnet ELSE 0 END) AS c2014,
sum(CASE extract(year from exportacion.fnum) WHEN '2015' THEN exportacion.vfobserdol ELSE 0 END)  / sum(CASE extract(year from exportacion.fnum) WHEN '2015' THEN exportacion.vpesnet ELSE 0 END) AS c2015,
sum(CASE extract(year from exportacion.fnum) WHEN '2016' THEN exportacion.vfobserdol ELSE 0 END)  / sum(CASE extract(year from exportacion.fnum) WHEN '2016' THEN exportacion.vpesnet ELSE 0 END) AS c2016,
sum(CASE extract(year from exportacion.fnum) WHEN '2017' THEN exportacion.vfobserdol ELSE 0 END)  / sum(CASE extract(year from exportacion.fnum) WHEN '2017' THEN exportacion.vpesnet ELSE 0 END) AS c2017,
sum(CASE extract(year from exportacion.fnum) WHEN '2018' THEN exportacion.vfobserdol ELSE 0 END)  / sum(CASE extract(year from exportacion.fnum) WHEN '2018' THEN exportacion.vpesnet ELSE 0 END) AS c2018,
sum(CASE extract(year from exportacion.fnum) WHEN '2019' THEN exportacion.vfobserdol ELSE 0 END)  / sum(CASE extract(year from exportacion.fnum) WHEN '2019' THEN exportacion.vpesnet ELSE 0 END) AS c2019,
sum(CASE extract(year from exportacion.fnum) WHEN '2020' THEN exportacion.vfobserdol ELSE 0 END)  / sum(CASE extract(year from exportacion.fnum) WHEN '2020' THEN exportacion.vpesnet ELSE 0 END) AS c2020,
sum(CASE extract(year from exportacion.fnum) WHEN '2021' THEN exportacion.vfobserdol ELSE 0 END)  / sum(CASE extract(year from exportacion.fnum) WHEN '2021' THEN exportacion.vpesnet ELSE 0 END) AS c2021,
count(DISTINCT(CASE extract(year from exportacion.fnum) WHEN '2012' THEN exportacion.dnombre ELSE 0 END)) AS e2012,
count(DISTINCT(CASE extract(year from exportacion.fnum) WHEN '2013' THEN exportacion.dnombre ELSE 0 END)) AS e2013,
count(DISTINCT(CASE extract(year from exportacion.fnum) WHEN '2014' THEN exportacion.dnombre ELSE 0 END)) AS e2014,
count(DISTINCT(CASE extract(year from exportacion.fnum) WHEN '2015' THEN exportacion.dnombre ELSE 0 END)) AS e2015,
count(DISTINCT(CASE extract(year from exportacion.fnum) WHEN '2016' THEN exportacion.dnombre ELSE 0 END)) AS e2016,
count(DISTINCT(CASE extract(year from exportacion.fnum) WHEN '2017' THEN exportacion.dnombre ELSE 0 END)) AS e2017,
count(DISTINCT(CASE extract(year from exportacion.fnum) WHEN '2018' THEN exportacion.dnombre ELSE 0 END)) AS e2018,
count(DISTINCT(CASE extract(year from exportacion.fnum) WHEN '2019' THEN exportacion.dnombre ELSE 0 END)) AS e2019,
count(DISTINCT(CASE extract(year from exportacion.fnum) WHEN '2020' THEN exportacion.dnombre ELSE 0 END)) AS e2020,
count(DISTINCT(CASE extract(year from exportacion.fnum) WHEN '2021' THEN exportacion.dnombre ELSE 0 END)) AS e2021
FROM exportacion LEFT JOIN paises ON exportacion.cpaides = paises.idpaises WHERE exportacion.part_nandi = ".$partida1." $sqlconsu AND extract(year from exportacion.fnum) >= '2012' AND extract(year from exportacion.fnum) <= '2021' AND CONCAT(exportacion.dcom,exportacion.dmer2,exportacion.dmer3,exportacion.dmer4,exportacion.DMER5) LIKE '%$describus%' GROUP BY exportacion.cpaides,paises.espanol ORDER BY a2020 DESC";

$queemp = "SELECT 
count(DISTINCT(CASE extract(year from exportacion.fnum) WHEN '2020' THEN exportacion.dnombre ELSE 0 END)) AS e2020
FROM exportacion LEFT JOIN paises ON exportacion.cpaides = paises.idpaises WHERE exportacion.part_nandi = ".$partida1." $sqlconsu AND extract(year from exportacion.fnum) = '2020' AND CONCAT(exportacion.dcom,exportacion.dmer2,exportacion.dmer3,exportacion.dmer4,exportacion.DMER5) LIKE '%$describus%' ";
				//}
/*if($filtro=="vpesnet"){	
$query1 = "SELECT exportacion.cpaides, paises.espanol, 
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
FROM exportacion LEFT JOIN paises ON exportacion.cpaides = paises.idpaises WHERE exportacion.part_nandi = ".$partida1." $sqlconsu AND extract(year from exportacion.fnum) >= '2012' AND extract(year from exportacion.fnum) <= '2021' AND CONCAT(exportacion.dcom,exportacion.dmer2,exportacion.dmer3,exportacion.dmer4,exportacion.DMER5) LIKE '%$describus%' GROUP BY exportacion.cpaides,paises.espanol ORDER BY paises.espanol ASC";
}
if($filtro=="diferen"){
$query1 = "SELECT exportacion.cpaides, paises.espanol, 
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
FROM exportacion LEFT JOIN paises ON exportacion.cpaides = paises.idpaises WHERE exportacion.part_nandi = ".$partida1." $sqlconsu AND extract(year from exportacion.fnum) >= '2012' AND extract(year from exportacion.fnum) <= '2021' AND CONCAT(exportacion.dcom,exportacion.dmer2,exportacion.dmer3,exportacion.dmer4,exportacion.DMER5) LIKE '%$describus%' GROUP BY exportacion.cpaides,paises.espanol ORDER BY paises.espanol ASC";
}*/

$resultempt=$conexpg->query($queemp); 
if($resultempt->num_rows>0){
	while($filaempt=$resultempt->fetch_array()){ 
		   $sumtoe2020 = $filaempt['e2020'];
		
	}
}else{
	$sumtoe2020 = "0";
}
	
				
	$result_year=$conexpg->query($query1); 
if($result_year->num_rows>0){
	while($fila_year=$result_year->fetch_array()){ 
		   $sumtot2012= $fila_year['a2012'];
		   $sumtot2013= $fila_year['a2013'];
		   $sumtot2014= $fila_year['a2014'];
		   $sumtot2015= $fila_year['a2015'];
		   $sumtot2016= $fila_year['a2016'];
		   $sumtot2017= $fila_year['a2017'];
		   $sumtot2018= $fila_year['a2018'];
		   $sumtot2019= $fila_year['a2019'];
		   $sumtotp2019= $fila_year['p2019'];
		   $sumtot2020= $fila_year['a2020'];
		   $sumtotp2020= $fila_year['p2020'];
		   $sumtot2021= $fila_year['a2021'];
		
		$sumusdtot1= $fila_year['c2019'];
		$sumusdtot2= $fila_year['c2020'];
		$sumusdtot3= $fila_year['c2012'];
		$sumusdtot4= $fila_year['c2013'];
		$sumusdtot5= $fila_year['c2014'];
		$sumusdtot6= $fila_year['c2015'];
		$sumusdtot7= $fila_year['c2016'];
		$sumusdtot8= $fila_year['c2017'];
		$sumusdtot9= $fila_year['c2018'];
		$sumusdtot10= $fila_year['c2021'];
		
		$sumempto = $fila_year['e2012'];
		
		
		   $sumatotal2012 = $sumatotal2012 + $sumtot2012;
		   $sumatotal2013 = $sumatotal2013 + $sumtot2013;
		   $sumatotal2014 = $sumatotal2014 + $sumtot2014;
		   $sumatotal2015 = $sumatotal2015 + $sumtot2015;
		   $sumatotal2016 = $sumatotal2016 + $sumtot2016;
		   $sumatotal2017 = $sumatotal2017 + $sumtot2017;
		   $sumatotal2018 = $sumatotal2018 + $sumtot2018;
		   $sumatotal2019 = $sumatotal2019 + $sumtot2019;
		   $sumatotalp2019 = $sumatotalp2019 + $sumtotp2019;
		   $sumatotal2020 = $sumatotal2020 + $sumtot2020;
		   $sumatotalp2020 = $sumatotalp2020 + $sumtotp2020;
		   $sumatotal2021 = $sumatotal2021 + $sumtot2021;
		
		$sutousd1 = $sutousd1 + $sumusdtot1;
		$sutousd2 = $sutousd2 + $sumusdtot2;
		$sutousd3 = $sutousd3 + $sumusdtot3;
		
		$sumempreg = $sumempreg + $sumempto;

		   }
	
	$varitota= number_format((($sumatotal2020 / $sumatotal2019) - 1) * 100,2);
		   $parti='100 %';
		   $tota6 =number_format((( $sumatotal2020 / $sumatotal2019) - 1) * 100,2);
	
	$tota2012 =number_format((( $sumatotalp2020 / $sumatotalp2019) - 1) * 100,2);
	
	//$totapreciousd =number_format((( $sutousd2 / $sutousd1) - 1) * 100,2);
	
	$totapreciousd12 =number_format((( $sutousd2 / $sutousd3) - 1) * 100,2);
	
	//precio fob usd x kg 2020
	$touskg = $sumatotal2020 / $sumatotalp2020;
	$tous2019kg = $sumatotal2019 / $sumatotalp2019;
	
	$totapreciousd =number_format((( $touskg / $tous2019kg) - 1) * 100,2);
			   
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
	$sumatotalp2020 = "0";
	$sumatotal2021="0";
		  $varitota="0.00";
		  $parti="0.00";
	$touskg = "0.00";
	  }

//si la descripcion del producto esta vacio consultamos la descripcion de la partida{
if($describus==""){
$qua1 = "SELECT idarancel, descripcion FROM arancel WHERE idarancel='$partida1'";
$rsua=$conexpg->query($qua1); 
if($rsua->num_rows>0){
	while($filau=$rsua->fetch_array()){ 
		   $describus = $filau['descripcion'];
	}
}
}
  
  //visualizamos datos en el reporte
	$resultado_rpt=$conexpg->query($query1); 
if($resultado_rpt->num_rows>0){
echo"<div class='col-md-12'>";
        echo"<div class='card'>";
	echo"<div class='card-header card-header-info card-header-icon'>
              <div class='card-icon'>
                <i class='material-icons'>assignment</i>
              </div>
              <h4 class='card-title'><b>Reporte Evalucación Mercado de Destino para las Exportaciones</b><br> Producto: $describus │ Partida #: $partida1 │ Departamento: $namedepa1 │ Fecha Numeracion │ Periodo 2020 </b> </h4>
            </div>";
		echo"<div class='card-body'>";
		echo"<div class='toolbar'>
                  </div>";
         echo"<div class='material-datatables'>";
		echo"<table id='datatables' class='table table-striped table-no-bordered table-hover' cellspacing='0' width='100%' style='width:100%'>";
		  echo"<thead>
                          <tr>
						      <th>#</th>
                              <th>Paises</th>
                              <!--<th>2012</th>
                              <th>2013</th>
                              <th>2014</th>
                              <th>2015</th>
							  <th>2016</th>
							  <th>2017</th>
							  <th>2018</th>
							  <th>2019</th>-->
							  <th>Valor exportado FOB USD 2019</th>
							  <th>Valor exportado FOB USD 2020</th>
							  <th>Peso Neto exportado KG 2020</th>
							  <th>Participación % FOB USD 2020</th>
							  <th>Variación % FOB USD 2020/2019</th>
							  <th>Variación % FOB USD 2020/2012</th>
							  <th>Variación % Peso Neto KG  2020/2019</th>
							  <th>Precio FOB USD x Kg 2019</th>
							  <th>Precio FOB USD x Kg 2020</th>
							  <th>Var. Precio FOB USD 2020/2019</th>
							  <!--<th>Var. Precio FOB USD 2020/2012</th>-->
							  <th>Cantidad de empresas 2020</th>
                          </tr>
                      </thead>";
		 echo"<tfoot>
                          <tr>
						      <th>#</th>
                              <th>Paises</th>
                              <!--<th>2012</th>
                              <th>2013</th>
                              <th>2014</th>
                              <th>2015</th>
							  <th>2016</th>
							  <th>2017</th>
							  <th>2018</th>
							  <th>2019</th>-->
							  <th>Valor exportado FOB USD 2019</th>
							  <th>Valor exportado FOB USD 2020</th>
							  <th>Peso Neto exportado KG 2020</th>
							  <th>Variación % FOB USD 2020/2019</th>
							  <th>Variación % FOB USD 2020/2012</th>
							  <th>Participación % FOB USD 2020</th>
							  <th>Variación % Peso Neto KG  2020/2019</th>
							  <th>Precio FOB USD x Kg 2019</th>
							  <th>Precio FOB USD x Kg 2020</th>
							  <th>Var. Precio FOB USD 2020/2019</th>
							  <!--<th>Var. Precio FOB USD 2020/2012</th>-->
							  <th>Cantidad de empresas 2020</th>
                          </tr>
                      </tfoot>";
           echo"<tbody>";
	while($fila_rpt=$resultado_rpt->fetch_array()){ 
		$cutoy = $cutoy + 1;
		   $nombredesc= $fila_rpt['espanol'];
		  $year3= $fila_rpt['a2012'];
		  $year4= $fila_rpt['a2013'];
		  $year5= $fila_rpt['a2014'];
		  $year6= $fila_rpt['a2015'];
		  $year7= $fila_rpt['a2016'];
		  $year8= $fila_rpt['a2017'];
		  $year9= $fila_rpt['a2018'];
		$year10 = $fila_rpt['a2019'];
		$year11 = $fila_rpt['a2020'];
		$year12= $fila_rpt['a2021'];
		$yearp11= $fila_rpt['p2020'];
		$yearp10= $fila_rpt['p2019'];
		
		$yearp1910= number_format($fila_rpt['p2019'],2);
		
		
		$yearusd1= $fila_rpt['c2012'];
		$yearusd2= $fila_rpt['c2019'];
		$yearusd3= $fila_rpt['c2020'];
		$yearempreg = $fila_rpt['e2020'];
		
		if($yearp10=='0' or $yearp10=='' ){// 2020/2019
		  $varp11 ='0';
		  }else{
		  $varp11 = number_format((($yearp11 / $yearp10) - 1) * 100,2);
		  }
		
		if($year10=='0'){
		  $var11 ='0';
		  }else{
			$var11 =number_format((( $year11 / $year10) - 1) * 100,2);
		  //$var11 = number_format((($year11 / $year10) - 1) * 100,2);
			//$vara11 = ($year11 / $year10) - 1 ;
			//$var11 = ($vara11 * 100) ;
			//$var11 = ((($year11 / $year10) - 1) * 100);
		  }
		
		if($yearusd2=='0' or $yearusd2==''){
		  $varc11 ='0';
		  }else{
		  $varc11 = number_format((($yearusd3 / $yearusd2) - 1) * 100,2);
		  }
		
		if($yearusd1=='0' or $yearusd1==''){
		  $varc12 ='0';
		  }else{
		  $varc12 = number_format((($yearusd3 / $yearusd1) - 1) * 100,2);
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

		  $cax7 = $ca3 + $ca4 + $ca5 + $ca6 + $ca7 + $ca8 + $ca9 + $ca10;
		  $var22 = number_format($cax7 / 8,2);
		  
		if($sumatotal2020=='0' or $year11=='0'){
			$var33= "0.00";
		}else{
		  $var33= number_format(($year11 / $sumatotal2020)*100,2);
			}
		  
		  echo "<tr>";
		echo"<td>$cutoy</td>";
echo "<td>$nombredesc</td>";
/*echo "<td>".number_format($year3,2)."</td>";
echo "<td>".number_format($year4,2)."</td>";
echo "<td>".number_format($year5,2)."</td>";
echo "<td>".number_format($year6,2)."</td>";
echo "<td>".number_format($year7,2)."</td>";
echo "<td>".number_format($year8,2)."</td>";
echo "<td>".number_format($year9,2)."</td>";
echo "<td>".number_format($year10,2)."</td>";*/
echo "<td> ".number_format($year10,2)."</td>";
echo "<td> ".number_format($year11,2)."</td>";
echo "<td>".number_format($yearp11,2)."</td>";
/*echo "<td>".number_format($year12,2)."</td>";*/
echo "<td>$var33 %</td>";
echo "<td>$var11 %</td>";
echo "<td>$var22 %</td>";
echo "<td>$varp11 %</td>";
echo "<td>".number_format($yearusd2,2)."</td>";
echo "<td>".number_format($yearusd3,2)."</td>";
echo "<td>$varc11 % </td>";
//echo "<td>$varc12 %</td>";
echo "<td>$yearempreg</td>";
 echo "</tr>";
		  
		  }
		  
		  //echo"<thead>";
		  echo "<tr>";
	echo "<th></th>";
		  echo "<th><b>Total</b></th>";
		   /*echo "<th><b>".number_format($sumatotal2012,2)."</b></th>";
		    echo "<th><b>".number_format($sumatotal2013,2)."</b></th>";
			echo "<th><b>".number_format($sumatotal2014,2)."</b></th>";
			echo "<th><b>".number_format($sumatotal2015,2)."</b></th>";
			echo "<th><b>".number_format($sumatotal2016,2)."</b></th>";
			echo "<th><b>".number_format($sumatotal2017,2)."</b></th>";
		    echo "<th><b>".number_format($sumatotal2018,2)."</b></th>";
		    echo "<th><b>".number_format($sumatotal2019,2)."</b></th>";*/
	        echo "<th><b>".number_format($sumatotal2019,2)."</b></th>";
	        echo "<th><b>".number_format($sumatotal2020,2)."</b></th>";
	        echo "<th><b>".number_format($sumatotalp2020,2)."</b></th>";
	        /*echo "<th><b>".number_format($sumatotal2021,2)."</b></th>";*/
	         echo "<th><b>$tota8 %</b></th>";
			 echo "<th><b>$tota6 %</b></th>";		 
	echo "<th><b>$tota7 %</b></th>";
	echo "<th><b>$tota2012 %</b></th>";
	echo "<th><b>".number_format($tous2019kg,2)."</b></th>";
	echo "<th><b>".number_format($touskg,2)."</b></th>";
	echo "<th><b>$totapreciousd %</b></th>";
	//echo "<th><b>$totapreciousd12 %</b></th>";
	echo "<th><b>$sumtoe2020</b></th>";
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
		  
		   echo"<center><h4><font color='#EC0D36'>No hay Resultados<br>El Numero de Partida $partida1 o seleccion $combo Incorrectos</font></h4></center>";
	

   }   //fin si hay resultados
				?>
           
            </div>
            </div>
        </div>
        </div>
        </div>
        </div>

</div>

    </div>

</body>

    
<!--<script src="../../js/core/jquery.min.js"></script>
<script src="../../js/core/popper.min.js"></script>
<script src="../../js/bootstrap-material-design.min.js"></script>
<script src="../../js/plugins/perfect-scrollbar.jquery.min.js"></script>
<script src="../../js/plugins/moment.min.js"></script>
<script src="../../js/plugins/bootstrap-datetimepicker.min.js"></script>
<script src="../../js/plugins/nouislider.min.js"></script>
<script src="../../js/plugins/bootstrap-selectpicker.js"></script>
<script src="../../js/plugins/bootstrap-tagsinput.js"></script>
<script src="../../js/plugins/jasny-bootstrap.min.js"></script>
<script src="../../assets-for-demo/js/modernizr.js"></script>
<script src="../../js/material-dashboard.js?v=2.0.1"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
<script src="../../js/plugins/arrive.min.js" type="text/javascript"></script>
<script src="../../js/plugins/jquery.validate.min.js"></script>
<script src="../../js/plugins/chartist.min.js"></script>
<script src="../../js/plugins/jquery.bootstrap-wizard.js"></script>
<script src="../../js/plugins/bootstrap-notify.js"></script>
<script src="../../js/plugins/jquery-jvectormap.js"></script>
<script src="../../js/plugins/nouislider.min.js"></script>
<script src="../../js/plugins/jquery.select-bootstrap.js"></script>
<script src="../../js/plugins/jquery.datatables.js"></script>
<script src="../../js/plugins/sweetalert2.js"></script>
<script src="../../js/plugins/jasny-bootstrap.min.js"></script>
<script src="../../js/plugins/fullcalendar.min.js"></script>
<script src="../../js/plugins/demo.js"></script>-->

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
		"order": [[3, "desc" ]],
		dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        "pagingType": "full_numbers",
        "lengthMenu": [
            [15, 30, 55, -1],
            [15, 30, 55, "Todos"]
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

  <!--<script type="text/javascript">
    $().ready(function(){
        demo.checkFullPageBackgroundImage();

        setTimeout(function(){
            // after 1000 ms we add the class animated to the login/register card
            $('.card').removeClass('card-hidden');
        }, 700)
    });
</script>-->


<?php
	mysqli_close($conexpg);
?>
</html>