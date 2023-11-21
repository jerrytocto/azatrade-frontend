<?php
session_start();
set_time_limit(500);
$partida1 = $_GET["varipartidaempre"];
$namedepa1 = $_GET["namedepa"];
$filtro = $_GET["unavaria"];
$ubicod1 = $_GET["codubi"];
$describus = $_GET["nomdescri"];
if($ubicod1!=""){
	$flatcod = $ubicod1;
}else{
	$flatcod = "";
}
?>
           
            <div class='col-md-12'>

            <?php
				include("../../incBD/inibd.php");
	///echo"$partida1 xx";
				if($filtro=="vfobserdol"){
					$nomfiltro ="Valor FOB USD";
				}else if($filtro=="vpesnet"){
					$nomfiltro ="Peso Neto (Kg)";
				}else{
					$nomfiltro ="Precio FOB USD x KG";
				}
				
$filtrofecha ="extract(year from exportacion.fnum)";
$nombres2 = "vfobserdol";
$wherefecha = "extract(year from exportacion.fnum) >= '2012' AND extract(year from exportacion.fnum) <= '2021'";
		
				if($filtro=="vfobserdol"){	
$sqlyear="SELECT 'vfobserdol' as VALOR, 
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
FROM exportacion LEFT JOIN agente ON exportacion.CAGE = agente.idagente where extract(year from exportacion.fnum) >= '2012' AND extract(year from exportacion.fnum) <= '2021' AND SUBSTRING(exportacion.ubigeo,1,2) like '%$flatcod' AND exportacion.part_nandi=".$partida1." AND CONCAT(exportacion.dcom,exportacion.dmer2,exportacion.dmer3,exportacion.dmer4,exportacion.DMER5) LIKE '%$describus%' ";
				}
	if($filtro=="vpesnet"){
		$sqlyear="SELECT 'vpesnet' as VALOR, 
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
FROM exportacion LEFT JOIN agente ON exportacion.CAGE = agente.idagente where extract(year from exportacion.fnum) >= '2012' AND extract(year from exportacion.fnum) <= '2021' AND SUBSTRING(exportacion.ubigeo,1,2) like '%$flatcod' AND exportacion.part_nandi=".$partida1." AND CONCAT(exportacion.dcom,exportacion.dmer2,exportacion.dmer3,exportacion.dmer4,exportacion.DMER5) LIKE '%$describus%' ";
		}
	if($filtro=="diferen"){
		$sqlyear="SELECT 'diferen' as diferen,
      SUM(CASE extract(year from exportacion.fnum) WHEN '2012' THEN exportacion.vfobserdol ELSE 0 END) AS a2012,
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2012' THEN exportacion.vpesnet ELSE 0 END) AS a2012x, 
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2013' THEN exportacion.vfobserdol ELSE 0 END) AS a2013,
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2013' THEN exportacion.vpesnet ELSE 0 END) AS a2013x, 
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2014' THEN exportacion.vfobserdol ELSE 0 END) AS a2014,
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2014' THEN exportacion.vpesnet ELSE 0 END) AS a2014x,
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2015' THEN exportacion.vfobserdol ELSE 0 END) AS a2015,
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2015' THEN exportacion.vpesnet ELSE 0 END) AS a2015x,
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2016' THEN exportacion.vfobserdol ELSE 0 END) AS a2016,
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2016' THEN exportacion.vpesnet ELSE 0 END) AS a2016x,
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2017' THEN exportacion.vfobserdol ELSE 0 END) AS a2017,
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2017' THEN exportacion.vpesnet ELSE 0 END) AS a2017x,
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2018' THEN exportacion.vfobserdol ELSE 0 END) AS a2018,
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2018' THEN exportacion.vpesnet ELSE 0 END) AS a2018x,
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2019' THEN exportacion.vfobserdol ELSE 0 END) AS a2019,
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2019' THEN exportacion.vpesnet ELSE 0 END) AS a2019x,
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2020' THEN exportacion.vfobserdol ELSE 0 END) AS a2020,
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2020' THEN exportacion.vpesnet ELSE 0 END) AS a2020x,
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2021' THEN exportacion.vfobserdol ELSE 0 END) AS a2021,
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2021' THEN exportacion.vpesnet ELSE 0 END) AS a2021x
FROM exportacion LEFT JOIN agente ON exportacion.CAGE = agente.idagente where extract(year from exportacion.fnum) >= '2012' AND extract(year from exportacion.fnum) <= '2021' AND SUBSTRING(exportacion.ubigeo,1,2) like '%$flatcod' AND exportacion.part_nandi=".$partida1." AND CONCAT(exportacion.dcom,exportacion.dmer2,exportacion.dmer3,exportacion.dmer4,exportacion.DMER5) LIKE '%$describus%' GROUP BY diferen ";
	}
				$qyaa=$conexpg->query($sqlyear); 
if($qyaa->num_rows>0){ 
while($fila_year=$qyaa->fetch_array()){ 
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
				
				$dife_2020= $fila_year['a2020'];
		        $dife_2020x= $fila_year['a2020x'];
				if($dife_2020x=="0" or  $dife_2020x=="0.00"){
					$sumatotal2020= "0.00";
				}else{
					$sumatotal2020=  number_format($dife_2020 / $dife_2020x,2);
				}
				
				$dife_2021= $fila_year['a2021'];
		        $dife_2021x= $fila_year['a2021x'];
				if($dife_2021x=="0" or  $dife_2021x=="0.00"){
					$sumatotal2021= "0.00";
				}else{
					$sumatotal2021=  number_format($dife_2021 / $dife_2021x,2);
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
			   $varitota='0.00';
		   }else{
		   $varitota= number_format((($sumatotal2020 / $sumatotal2019) - 1) * 100,2);
		   }
		   
		   if($sumatotal2020=='0'){
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
	$sumatotal2020="0";
	$sumatotal2021="0";
		  $varitota="0.00";
		  $parti="0.00";
	  }
				 /*generamos codigo aletorio*/				
	if($filtro=="vfobserdol"){	
   $query1 = "SELECT agente.agencia, 
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
   FROM exportacion LEFT JOIN agente ON exportacion.CAGE = agente.idagente where extract(year from exportacion.fnum) >= '2012' AND extract(year from exportacion.fnum) <= '2021' AND SUBSTRING(exportacion.ubigeo,1,2) like '%$flatcod' AND exportacion.part_nandi=".$partida1." AND CONCAT(exportacion.dcom,exportacion.dmer2,exportacion.dmer3,exportacion.dmer4,exportacion.DMER5) LIKE '%$describus%' GROUP BY agente.agencia";
}
				if($filtro=="vpesnet"){
					$query1 = "SELECT agente.agencia, 
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
   FROM exportacion LEFT JOIN agente ON exportacion.CAGE = agente.idagente where extract(year from exportacion.fnum) >= '2012' AND extract(year from exportacion.fnum) <= '2021' AND SUBSTRING(exportacion.ubigeo,1,2) like '%$flatcod' AND exportacion.part_nandi=".$partida1." AND CONCAT(exportacion.dcom,exportacion.dmer2,exportacion.dmer3,exportacion.dmer4,exportacion.DMER5) LIKE '%$describus%' GROUP BY agente.agencia";
					}
				if($filtro=="diferen"){
					$query1 = "SELECT 'diferen' as diferen, agente.agencia, 
   SUM(CASE extract(year from exportacion.fnum) WHEN '2012' THEN exportacion.vfobserdol ELSE 0 END) AS a2012,
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2012' THEN exportacion.vpesnet ELSE 0 END) AS a2012x, 
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2013' THEN exportacion.vfobserdol ELSE 0 END) AS a2013,
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2013' THEN exportacion.vpesnet ELSE 0 END) AS a2013x, 
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2014' THEN exportacion.vfobserdol ELSE 0 END) AS a2014,
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2014' THEN exportacion.vpesnet ELSE 0 END) AS a2014x,
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2015' THEN exportacion.vfobserdol ELSE 0 END) AS a2015,
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2015' THEN exportacion.vpesnet ELSE 0 END) AS a2015x,
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2016' THEN exportacion.vfobserdol ELSE 0 END) AS a2016,
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2016' THEN exportacion.vpesnet ELSE 0 END) AS a2016x,
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2017' THEN exportacion.vfobserdol ELSE 0 END) AS a2017,
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2017' THEN exportacion.vpesnet ELSE 0 END) AS a2017x,
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2018' THEN exportacion.vfobserdol ELSE 0 END) AS a2018,
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2018' THEN exportacion.vpesnet ELSE 0 END) AS a2018x,
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2019' THEN exportacion.vfobserdol ELSE 0 END) AS a2019,
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2019' THEN exportacion.vpesnet ELSE 0 END) AS a2019x,
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2020' THEN exportacion.vfobserdol ELSE 0 END) AS a2020,
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2020' THEN exportacion.vpesnet ELSE 0 END) AS a2020x,
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2021' THEN exportacion.vfobserdol ELSE 0 END) AS a2021,
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2021' THEN exportacion.vpesnet ELSE 0 END) AS a2021x 
   FROM exportacion LEFT JOIN agente ON exportacion.CAGE = agente.idagente where extract(year from exportacion.fnum) >= '2012' AND extract(year from exportacion.fnum) <= '2021' AND SUBSTRING(exportacion.ubigeo,1,2) like '%$flatcod' AND exportacion.part_nandi=".$partida1." AND CONCAT(exportacion.dcom,exportacion.dmer2,exportacion.dmer3,exportacion.dmer4,exportacion.DMER5) LIKE '%$describus%' GROUP BY diferen,agente.agencia";
				}
$qu1a=$conexpg->query($query1); 
if($qu1a->num_rows>0){ 

//if($numReg!=0){//inicia si hay resultados
if($qu1a!=0){//inicia si hay resultados

echo"<div class='col-md-12'>";
        echo"<div class='card'>";
	echo"<div class='card-header card-header-info card-header-icon'>
              <div class='card-icon'>
                <i class='material-icons'>assignment</i>
              </div>
              <h4 class='card-title'><b>Reporte Agente de Aduanas Evolucion Anual de Exportaciones</b><br> Producto: $describus │ Partida #: $partida1 │ Departamento: $namedepa1 │ Fecha Numeracion │ $nomfiltro │ Periodo 2012 - 2021 </b> </h4>
            </div>";
		echo"<div class='card-body'>";
		echo"<div class='toolbar'>
                  </div>";
         echo"<div class='material-datatables'>";
		echo"<table id='datatables' class='table table-striped table-no-bordered table-hover' cellspacing='0' width='100%' style='width:100%'>";
		  echo"<thead>
                          <tr>
						  <th>#</th>
                              <th>Agente de Aduanas</th>
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
                               <th>Agente de Aduanas</th>
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
		  //while ($fila1=pg_fetch_array($resultado1)) {
	while($fila1=$qu1a->fetch_array()){ 
		  $dife_deta= $fila1['diferen'];  
		  $codi= $codi + 1;
		  $val1= $fila1['agencia'];
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
					$year10 = "0.00";
				}else{
					$year10 = number_format($dife2019 / $dife2019x,2);
				}
			  
			  $dife2020 = $fila1['a2020'];
		      $dife2020x = $fila1['a2020x'];
			  if($dife2020x == "0" or $dife2020x == "0.00"){
					$year11 = "0.00";
				}else{
					$year11 = number_format($dife2020 / $dife2020x,2);
				}
			  
			  $dife2021 = $fila1['a2021'];
		      $dife2021x = $fila1['a2021x'];
			  if($dife2021x == "0" or $dife2021x == "0.00"){
					$year12 = "0.00";
				}else{
					$year12 = number_format($dife2021 / $dife2021x,2);
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
			  $year11= $fila1['a2020'];
			  $year12= $fila1['a2021'];
		  }
		 
		 if($year10=='0'){
		  $var11 ='0';
		  }else{
		  $var11 = number_format((($year11 / $year10) - 1) * 100,2);
		  }
		 
		 if($sumatotal2020=='0'){
			  $var22="0.00";
		  }else{
		  $var22 = number_format(($year11 / $sumatotal2020) * 100,2);
		  }
		  
		  echo "<tr>";
echo "<td>$codi</td>";
echo "<td>$val1</td>";
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
		 echo "<th align='center'></th>";
	echo "<th align='center'><b>Total:</b></th>";
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

           
            </div>
 
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
		"order": [[11, "desc" ]],
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