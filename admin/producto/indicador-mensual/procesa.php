<?php
session_start();
set_time_limit(250);
$partida1 = $_GET["partidaindimen"];
$anio = $_GET["anioim"];
$namedepa1 = $_GET["namedepa"];
$ubicod1 = $_GET["codubi"];
$describus = trim($_GET["nomdescri"]);
if($ubicod1!=""){
	$flatcod = $ubicod1;
}else{
	$flatcod = "";
}
?>

            <div class='col-md-12'>

            <?php
				include("../../incBD/inibd.php");

/*sumamos valorfob*/
		   $query_vfob = "SELECT 'vfobserdol' as VALOR, 
		   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '1' THEN exportacion.vfobserdol ELSE 0 END) AS m1, 
		   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '2' THEN exportacion.vfobserdol ELSE 0 END) AS m2, 
		   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '3' THEN exportacion.vfobserdol ELSE 0 END) AS m3, 
		   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '4' THEN exportacion.vfobserdol ELSE 0 END) AS m4, 
		   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '5' THEN exportacion.vfobserdol ELSE 0 END) AS m5,
		   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '6' THEN exportacion.vfobserdol ELSE 0 END) AS m6,
		   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '7' THEN exportacion.vfobserdol ELSE 0 END) AS m7,
		   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '8' THEN exportacion.vfobserdol ELSE 0 END) AS m8,
		   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '9' THEN exportacion.vfobserdol ELSE 0 END) AS m9,
		   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '10' THEN exportacion.vfobserdol ELSE 0 END) AS m10,
		   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '11' THEN exportacion.vfobserdol ELSE 0 END) AS m11,
		   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '12' THEN exportacion.vfobserdol ELSE 0 END) AS m12
		   FROM exportacion WHERE extract(year from exportacion.fnum) = '$anio' AND SUBSTRING(exportacion.ubigeo,1,2) like '%$flatcod' AND exportacion.part_nandi='".$partida1."' AND CONCAT(exportacion.dcom,exportacion.dmer2,exportacion.dmer3,exportacion.dmer4,exportacion.DMER5) LIKE '%$describus%' ";
				$resultado_vfob=$conexpg->query($query_vfob); 
if($resultado_vfob->num_rows>0){ 
while($fila_vfob=$resultado_vfob->fetch_array()){

		  $vfob_2012= $fila_vfob['m1'];
		   $vfob_2013=  $fila_vfob['m2'];
		    $vfob_2014=  $fila_vfob['m3'];
			 $vfob_2015=  $fila_vfob['m4'];
			  $vfob_2016=  $fila_vfob['m5'];
			   $vfob_2017=  $fila_vfob['m6'];
			    $vfob_2018=  $fila_vfob['m7'];
			  $vfob_2019=  $fila_vfob['m8'];
	$vfob_2020=  $fila_vfob['m9'];
	$vfob_2021=  $fila_vfob['m10'];
	$vfob_11=  $fila_vfob['m11'];
	$vfob_12=  $fila_vfob['m12'];
			  
			   /*if($vfob_2019=='0'  or $vfob_2019 == null){
				    $var1='0.00';
			   }else{
			   $var1= number_format((($vfob_2020/$vfob_2019) - 1) * 100,2);
			   }
			   
			  if($vfob_2012=='0' or $vfob_2012 == null){
			  $ca1 ='0';
		      }else{
		      $ca1 = (($vfob_2013 / $vfob_2012) - 1) * 100;
		      }
			   if($vfob_2013=='0' or $vfob_2013 == null){
			  $ca2 ='0';
		      }else{
		      $ca2 = (($vfob_2014 / $vfob_2013) - 1) * 100;
		      }
			   if($vfob_2014=='0' or $vfob_2014 == null){
			  $ca3 ='0';
		      }else{
		      $ca3 = (($vfob_2015 / $vfob_2014) - 1) * 100;
		      }
			   if($vfob_2015=='0' or $vfob_2015 == null){
			  $ca4 ='0';
		      }else{
		      $ca4 = (($vfob_2016 / $vfob_2015) - 1) * 100;
		      }
			  if($vfob_2016=='0' or $vfob_2016 == null){
			  $ca5 ='0';
		      }else{
		      $ca5 = (($vfob_2017 / $vfob_2016) - 1) * 100;
		      }
			  if($vfob_2017=='0' or $vfob_2017 == null){
			  $ca6 ='0';
		      }else{
		      $ca6 = (($vfob_2018 / $vfob_2017) - 1) * 100;
		      }
			  if($vfob_2018=='0' or $vfob_2018 == null){
			  $ca7 ='0';
		      }else{
		      $ca7 = (($vfob_2019 / $vfob_2018) - 1) * 100;
		      }
	          if($vfob_2019=='0' or $vfob_2019 == null){
			  $ca8 ='0';
		      }else{
		      $ca8 = (($vfob_2020 / $vfob_2019) - 1) * 100;
		      }
			 if($vfob_2020=='0' or $vfob_2020 == null){
			  $ca9 ='0';
		      }else{
		      $ca9 = (($vfob_2021 / $vfob_2020) - 1) * 100;
		      }
			  
			  $var2= number_format(($ca1 + $ca2 + $ca3 + $ca4 + $ca5 + $ca6 + $ca7 + $ca8)/8,2) ;*/

		  
		  }
	  }else{
		  $vfob_2012= "0.00";
		   $vfob_2013= "0.00";
		    $vfob_2014= "0.00";
			 $vfob_2015= "0.00";
			  $vfob_2016= "0.00";
			  $vfob_2017= "0.00";
		       $vfob_2018= "0.00";
		  $vfob_2019= "0.00";
	$vfob_2020= "0.00";
	$vfob_2021= "0.00";
	$vfob_11 = "0.00";
	$vfob_12 = "0.00";
	  }
				
/* sumamos vpesnet*/
	   $query_vpes = "SELECT 'vpesnet' as VALOR,
	   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '1' THEN exportacion.vpesnet ELSE 0 END) AS m1, 
	   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '2' THEN exportacion.vpesnet ELSE 0 END) AS m2, 
	   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '3' THEN exportacion.vpesnet ELSE 0 END) AS m3, 
	   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '4' THEN exportacion.vpesnet ELSE 0 END) AS m4, 
	   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '5' THEN exportacion.vpesnet ELSE 0 END) AS m5,
	   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '6' THEN exportacion.vpesnet ELSE 0 END) AS m6,
	   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '7' THEN exportacion.vpesnet ELSE 0 END) AS m7,
	   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '8' THEN exportacion.vpesnet ELSE 0 END) AS m8,
	   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '9' THEN exportacion.vpesnet ELSE 0 END) AS m9,
	   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '10' THEN exportacion.vpesnet ELSE 0 END) AS m10,
	   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '11' THEN exportacion.vpesnet ELSE 0 END) AS m11,
	   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '12' THEN exportacion.vpesnet ELSE 0 END) AS m12
	   FROM exportacion where extract(year from exportacion.fnum) = '$anio' AND SUBSTRING(exportacion.ubigeo,1,2) like '%$flatcod' AND exportacion.part_nandi='".$partida1."' AND CONCAT(exportacion.dcom,exportacion.dmer2,exportacion.dmer3,exportacion.dmer4,exportacion.DMER5) LIKE '%$describus%' ";
				$resultado_vpes=$conexpg->query($query_vpes); 
if($resultado_vpes->num_rows>0){ 
while($fila_vpes=$resultado_vpes->fetch_array()){
		  $vpes_2012=  $fila_vpes['m1'];
		   $vpes_2013=  $fila_vpes['m2'];
		    $vpes_2014=  $fila_vpes['m3'];
			 $vpes_2015=  $fila_vpes['m4'];
			  $vpes_2016= $fila_vpes['m5'];
			  $vpes_2017= $fila_vpes['m6'];
			  $vpes_2018= $fila_vpes['m7'];
			  $vpes_2019= $fila_vpes['m8'];
	$vpes_2020= $fila_vpes['m9'];
	$vpes_2021= $fila_vpes['m10'];
	$vpes_11= $fila_vpes['m11'];
	$vpes_12= $fila_vpes['m12'];

	/*
			  if($vpes_2018=='0'){
				 $var3="0"; 
			  }else{
$var3= number_format((($vpes_2020/$vpes_2019) - 1) * 100,2);
				  }
			   
			  if($vpes_2012=='0'){
			  $ca1x ='0';
		      }else{
		      $ca1x = (($vpes_2013 / $vpes_2012) - 1) * 100;
		      }
			   if($vpes_2013=='0'){
			  $ca2x ='0';
		      }else{
		      $ca2x = (($vpes_2014 / $vpes_2013) - 1) * 100;
		      }
			   if($vpes_2014=='0'){
			  $ca3x ='0';
		      }else{
		      $ca3x = (($vpes_2015 / $vpes_2014) - 1) * 100;
		      }
			   if($vpes_2015=='0'){
			  $ca4x ='0';
		      }else{
		      $ca4x = (($vpes_2016 / $vpes_2015) - 1) * 100;
		      }
			  if($vpes_2016=='0'){
			  $ca5x ='0';
		      }else{
		      $ca5x = (($vpes_2017 / $vpes_2016) - 1) * 100;
		      }
			  if($vpes_2017=='0'){
			  $ca6x ='0';
		      }else{
		      $ca6x = (($vpes_2018 / $vpes_2017) - 1) * 100;
		      }
			  if($vpes_2018=='0'){
			  $ca7x ='0';
		      }else{
		      $ca7x = (($vpes_2019 / $vpes_2018) - 1) * 100;
		      }
	if($vpes_2019=='0'){
			  $ca8x ='0';
		      }else{
		      $ca8x = (($vpes_2020 / $vpes_2019) - 1) * 100;
		      }
	if($vpes_2020=='0'){
			  $ca9x ='0';
		      }else{
		      $ca9x = (($vpes_2021 / $vpes_2020) - 1) * 100;
		      }
			 
			  
			  $var4= number_format(($ca1x + $ca2x + $ca3x + $ca4x + $ca5x + $ca6x + $ca7x + $ca8x)/8,2) ;
		  */
		  }
	  }else{
		  $vpes_2012= "0.00";
		   $vpes_2013= "0.00";
		    $vpes_2014= "0.00";
			 $vpes_2015= "0.00";
			  $vpes_2016= "0.00";
			  $vpes_2017= "0.00";
		       $vpes_2018= "0.00";
		  $vpes_2019= "0.00";
	$vpes_2020= "0.00";
	$vpes_2021= "0.00";
	  }
				
/*diferencia Precio FOB USD x KG*/
				if($vpes_2012=="0"){
					$preciofob2012 = "0";
					}else{
		$preciofob2012 = $vfob_2012 / $vpes_2012;
					}
		if($vpes_2013=='0')	{
			$preciofob2013 = "0";
		}else{
		$preciofob2013 = $vfob_2013 / $vpes_2013;
			}
		
		if($vpes_2014=='0'){
			$preciofob2014 = "0";
		}else{
		$preciofob2014 = $vfob_2014 / $vpes_2014;
			}
		
		if($vpes_2015=='0'){
			$preciofob2015 ="0";
		}else{
		$preciofob2015 = $vfob_2015 / $vpes_2015;
			}
		
		if($vpes_2016=='0'){
			$preciofob2016 = "0";
		}else{
		$preciofob2016 = $vfob_2016 / $vpes_2016;
			}
			
		if($vpes_2017=='0'){
			$preciofob2017 = "0";
		}else{
		$preciofob2017 = $vfob_2017 / $vpes_2017;
			}
		
		if($vpes_2018=='0'){
			$preciofob2018 = "0";
		}else{
		$preciofob2018 = $vfob_2018 / $vpes_2018;
			}
				
				if($vpes_2019=='0'){
			$preciofob2019 = "0";
		}else{
		$preciofob2019 = $vfob_2019 / $vpes_2019;
			}
				
				if($vpes_2020=='0'){
			$preciofob2020 = "0";
		}else{
		$preciofob2020 = $vfob_2020 / $vpes_2020;
			}
				
				if($vpes_2021=='0'){
			$preciofob2021 = "0";
		}else{
		$preciofob2021 = $vfob_2021 / $vpes_2021;
			}
				
				if($vpes_11=='0'){
			$preciofob11 = "0";
		}else{
		$preciofob11 = $vfob_11 / $vpes_11;
			}
				
				if($vpes_12=='0'){
			$preciofob12 = "0";
		}else{
		$preciofob12 = $vfob_12 / $vpes_12;
			}
		
				// lista
		/*if($preciofob2019=='0'){
			$var5='0';
		}else{
		$var5= number_format((($preciofob2020/$preciofob2019) - 1) * 100,2);
			}*/
		/*if($preciofob2012=='0'){
			  $ca1_1 ='0';
		      }else{
		      $ca1_1 = (($preciofob2013 / $preciofob2012) - 1) * 100;
		      }
			   if($preciofob2013=='0'){
			  $ca2_1 ='0';
		      }else{
		      $ca2_1 = (($preciofob2014 / $preciofob2013) - 1) * 100;
		      }
			   if($preciofob2014=='0'){
			  $ca3_1 ='0';
		      }else{
		      $ca3_1 = (($preciofob2015 / $preciofob2014) - 1) * 100;
		      }
			   if($preciofob2015=='0'){
			  $ca4_1 ='0';
		      }else{
		      $ca4_1 = (($preciofob2016 / $preciofob2015) - 1) * 100;
		      }
			  if($preciofob2016=='0'){
			  $ca5_1 ='0';
		      }else{
		      $ca5_1 = (($preciofob2017 / $preciofob2016) - 1) * 100;
		      }
			  if($preciofob2017=='0'){
			  $ca6_1 ='0';
		      }else{
		      $ca6_1 = (($preciofob2018 / $preciofob2017) - 1) * 100;
		      }
			  if($preciofob2018=='0'){
			  $ca7_1 ='0';
		      }else{
		      $ca7_1 = (($preciofob2019 / $preciofob2018) - 1) * 100;
		      }
				if($preciofob2019=='0'){
			  $ca8_1 ='0';
		      }else{
		      $ca8_1 = (($preciofob2020 / $preciofob2019) - 1) * 100;
		      }
				if($preciofob2020=='0'){
			  $ca9_1 ='0';
		      }else{
		      $ca9_1 = (($preciofob2021 / $preciofob2020) - 1) * 100;
		      }
				*/
			  
			   //$var6= number_format(($ca1_1 + $ca2_1 + $ca3_1 + $ca4_1 + $ca5_1 + $ca6_1 + $ca7_1 + $ca8_1)/8,2) ;
				
/*suma precio bruto*/
		  $query_vbru = "SELECT 'preciobruto' as VALOR, 
		  SUM(CASE extract(MONTH from exportacion.fnum) WHEN '1' THEN exportacion.vpesbru ELSE 0 END) AS m1, 
		  SUM(CASE extract(MONTH from exportacion.fnum) WHEN '2' THEN exportacion.vpesbru ELSE 0 END) AS m2, 
		  SUM(CASE extract(MONTH from exportacion.fnum) WHEN '3' THEN exportacion.vpesbru ELSE 0 END) AS m3, 
		  SUM(CASE extract(MONTH from exportacion.fnum) WHEN '4' THEN exportacion.vpesbru ELSE 0 END) AS m4, 
		  SUM(CASE extract(MONTH from exportacion.fnum) WHEN '5' THEN exportacion.vpesbru ELSE 0 END) AS m5,
		  SUM(CASE extract(MONTH from exportacion.fnum) WHEN '6' THEN exportacion.vpesbru ELSE 0 END) AS m6,
		  SUM(CASE extract(MONTH from exportacion.fnum) WHEN '7' THEN exportacion.vpesbru ELSE 0 END) AS m7,
		  SUM(CASE extract(MONTH from exportacion.fnum) WHEN '8' THEN exportacion.vpesbru ELSE 0 END) AS m8,
		  SUM(CASE extract(MONTH from exportacion.fnum) WHEN '9' THEN exportacion.vpesbru ELSE 0 END) AS m9,
		  SUM(CASE extract(MONTH from exportacion.fnum) WHEN '10' THEN exportacion.vpesbru ELSE 0 END) AS m10,
		  SUM(CASE extract(MONTH from exportacion.fnum) WHEN '11' THEN exportacion.vpesbru ELSE 0 END) AS m11,
		  SUM(CASE extract(MONTH from exportacion.fnum) WHEN '12' THEN exportacion.vpesbru ELSE 0 END) AS m12
		  FROM exportacion where extract(year from exportacion.fnum) = '$anio' AND SUBSTRING(exportacion.ubigeo,1,2) like '%$flatcod' AND exportacion.part_nandi='".$partida1."' AND CONCAT(exportacion.dcom,exportacion.dmer2,exportacion.dmer3,exportacion.dmer4,exportacion.DMER5) LIKE '%$describus%' ";
				$query_vbru=$conexpg->query($query_vbru); 
if($query_vbru->num_rows>0){ 
while($fila_vbru=$query_vbru->fetch_array()){
		  $vbru_2012= $fila_vbru['m1'];
		   $vbru_2013= $fila_vbru['m2'];
		    $vbru_2014= $fila_vbru['m3'];
			 $vbru_2015= $fila_vbru['m4'];
			  $vbru_2016= $fila_vbru['m5'];
			  $vbru_2017= $fila_vbru['m6'];
			  $vbru_2018= $fila_vbru['m7'];
			  $vbru_2019= $fila_vbru['m8'];
	$vbru_2020= $fila_vbru['m9'];
	$vbru_2021= $fila_vbru['m10'];
	$vbru_11= $fila_vbru['m11'];
	$vbru_12= $fila_vbru['m12'];

	/*
			  if($vbru_2019=='0'){
				$var7="0";  
			  }else{
                $var7= number_format((($vbru_2020/$vbru_2019) - 1) * 100,2);
				  }
			   
			  if($vbru_2012=='0'){
			  $ca1_x ='0';
		      }else{
		      $ca1_x = (($vbru_2013 / $vbru_2012) - 1) * 100;
		      }
			   if($vbru_2013=='0'){
			  $ca2_x ='0';
		      }else{
		      $ca2_x = (($vbru_2014 / $vbru_2013) - 1) * 100;
		      }
			   if($vbru_2014=='0'){
			  $ca3_x ='0';
		      }else{
		      $ca3_x = (($vbru_2015 / $vbru_2014) - 1) * 100;
		      }
			   if($vbru_2015=='0'){
			  $ca4_x ='0';
		      }else{
		      $ca4_x = (($vbru_2016 / $vbru_2015) - 1) * 100;
		      }
			  if($vbru_2016=='0'){
			  $ca5_x ='0';
		      }else{
		      $ca5_x = (($vbru_2017 / $vbru_2016) - 1) * 100;
		      }
			  if($vbru_2017=='0'){
			  $ca6_x ='0';
		      }else{
		      $ca6_x = (($vbru_2018 / $vbru_2017) - 1) * 100;
		      }
			  if($vbru_2018=='0'){
			  $ca7_x ='0';
		      }else{
		      $ca7_x = (($vbru_2019 / $vbru_2018) - 1) * 100;
		      }
	if($vbru_2019=='0'){
			  $ca8_x ='0';
		      }else{
		      $ca8_x = (($vbru_2020 / $vbru_2019) - 1) * 100;
		      }
	
			 if($vbru_2020=='0'){
			  $ca9_x ='0';
		      }else{
		      $ca9_x = (($vbru_2021 / $vbru_2020) - 1) * 100;
		      }
			  
			  $var8= number_format(($ca1_x + $ca2_x + $ca3_x + $ca4_x  + $ca5_x + $ca6_x + $ca7_x + $ca8_x)/8,2) ;
		  */
		  }
	  }else{
		  $vbru_2012= "0.00";
		   $vbru_2013= "0.00";
		    $vbru_2014= "0.00";
			 $vbru_2015= "0.00";
			  $vbru_2016= "0.00";
			  $vbru_2017= "0.00";
		       $vbru_2018= "0.00";
		  $vbru_2019= "0.00";
	$vbru_2020= "0.00";
	$vbru_2021= "0.00";
	$vbru_11= "0.00";
	$vbru_12= "0.00";
	  }
				
/*sumamos cantidad exportada*/  
	  $query_qunifis = "SELECT 'preciobruto' as VALOR, 
	  SUM(CASE extract(MONTH from exportacion.fnum) WHEN '1' THEN exportacion.qunifis ELSE 0 END) AS m1, 
	  SUM(CASE extract(MONTH from exportacion.fnum) WHEN '2' THEN exportacion.qunifis ELSE 0 END) AS m2, 
	  SUM(CASE extract(MONTH from exportacion.fnum) WHEN '3' THEN exportacion.qunifis ELSE 0 END) AS m3, 
	  SUM(CASE extract(MONTH from exportacion.fnum) WHEN '4' THEN exportacion.qunifis ELSE 0 END) AS m4, 
	  SUM(CASE extract(MONTH from exportacion.fnum) WHEN '5' THEN exportacion.qunifis ELSE 0 END) AS m5,
	  SUM(CASE extract(MONTH from exportacion.fnum) WHEN '6' THEN exportacion.qunifis ELSE 0 END) AS m6,
	  SUM(CASE extract(MONTH from exportacion.fnum) WHEN '7' THEN exportacion.qunifis ELSE 0 END) AS m7,
	  SUM(CASE extract(MONTH from exportacion.fnum) WHEN '8' THEN exportacion.qunifis ELSE 0 END) AS m8,
	  SUM(CASE extract(MONTH from exportacion.fnum) WHEN '9' THEN exportacion.qunifis ELSE 0 END) AS m9,
	  SUM(CASE extract(MONTH from exportacion.fnum) WHEN '10' THEN exportacion.qunifis ELSE 0 END) AS m10, 
	  SUM(CASE extract(MONTH from exportacion.fnum) WHEN '11' THEN exportacion.qunifis ELSE 0 END) AS m11, 
	  SUM(CASE extract(MONTH from exportacion.fnum) WHEN '12' THEN exportacion.qunifis ELSE 0 END) AS m12 
	  FROM exportacion where extract(year from exportacion.fnum) = '$anio' AND SUBSTRING(exportacion.ubigeo,1,2) like '%$flatcod' AND exportacion.part_nandi='".$partida1."' AND CONCAT(exportacion.dcom,exportacion.dmer2,exportacion.dmer3,exportacion.dmer4,exportacion.DMER5) LIKE '%$describus%' ";
				$resultado_qunifis=$conexpg->query($query_qunifis); 
if($resultado_qunifis->num_rows>0){ 
while($fila_qunifis=$resultado_qunifis->fetch_array()){
		  $qunifis_2012= $fila_qunifis['m1'];
		   $qunifis_2013= $fila_qunifis['m2'];
		    $qunifis_2014= $fila_qunifis['m3'];
			 $qunifis_2015= $fila_qunifis['m4'];
			  $qunifis_2016= $fila_qunifis['m5'];
			  $qunifis_2017= $fila_qunifis['m6'];
			  $qunifis_2018= $fila_qunifis['m7'];
			  $qunifis_2019= $fila_qunifis['m8'];
	$qunifis_2020= $fila_qunifis['m9'];
	$qunifis_2021= $fila_qunifis['m10'];
	$qunifis_11= $fila_qunifis['m11'];
	$qunifis_12= $fila_qunifis['m12'];
/*
if($qunifis_2019=='0'){
	$var9='0';
}else{
$var9= number_format((($qunifis_2020/$qunifis_2019) - 1) * 100,2);
	}

              if($qunifis_2012=='0'){
			  $ca1_2 ='0';
		      }else{
		      $ca1_2 = (($qunifis_2013 / $qunifis_2012) - 1) * 100;
		      }
			   if($qunifis_2013=='0'){
			  $ca2_2 ='0';
		      }else{
		      $ca2_2 = (($qunifis_2014 / $qunifis_2013) - 1) * 100;
		      }
			   if($qunifis_2014=='0'){
			  $ca3_2 ='0';
		      }else{
		      $ca3_2 = (($qunifis_2015 / $qunifis_2014) - 1) * 100;
		      }
			   if($qunifis_2015=='0'){
			  $ca4_2 ='0';
		      }else{
		      $ca4_2 = (($qunifis_2016 / $qunifis_2015) - 1) * 100;
		      }
			  if($qunifis_2016=='0'){
			  $ca5_2 ='0';
		      }else{
		      $ca5_2 = (($qunifis_2017 / $qunifis_2016) - 1) * 100;
		      }
			  if($qunifis_2017=='0'){
			  $ca6_2 ='0';
		      }else{
		      $ca6_2 = (($qunifis_2018 / $qunifis_2017) - 1) * 100;
		      }
			  if($qunifis_2018=='0'){
			  $ca7_2 ='0';
		      }else{
		      $ca7_2 = (($qunifis_2019 / $qunifis_2018) - 1) * 100;
		      }
	if($qunifis_2019=='0'){
			  $ca8_2 ='0';
		      }else{
		      $ca8_2 = (($qunifis_2020 / $qunifis_2019) - 1) * 100;
		      }
	
	if($qunifis_2020=='0'){
			  $ca9_2 ='0';
		      }else{
		      $ca9_2 = (($qunifis_2021 / $qunifis_2020) - 1) * 100;
		      }
			 
			  
			  $var10= number_format(($ca1_2 + $ca2_2 + $ca3_2 + $ca4_2 + $ca5_2  + $ca6_2 + $ca7_2 + $ca8_2)/8,2) ;
		  */
		  }
	  }else{
		  $qunifis_2012= "0.00";
		   $qunifis_2013= "0.00";
		    $qunifis_2014= "0.00";
			 $qunifis_2015= "0.00";
			  $qunifis_2016= "0.00";
			  $qunifis_2017= "0.00";
		       $qunifis_2018= "0.00";
		  $qunifis_2019= "0.00";
	$qunifis_2020= "0.00";
	$qunifis_2021= "0.00";
	$qunifis_11= "0.00";
	$qunifis_12= "0.00";
	  }
				
/*sumamos unidades comerciales*/
	  $query_qunicom = "SELECT 'preciobruto' as VALOR, 
	  SUM(CASE extract(MONTH from exportacion.fnum) WHEN '1' THEN exportacion.qunicom ELSE 0 END) AS m1, 
	  SUM(CASE extract(MONTH from exportacion.fnum) WHEN '2' THEN exportacion.qunicom ELSE 0 END) AS m2, 
	  SUM(CASE extract(MONTH from exportacion.fnum) WHEN '3' THEN exportacion.qunicom ELSE 0 END) AS m3,
	  SUM(CASE extract(MONTH from exportacion.fnum) WHEN '4' THEN exportacion.qunicom ELSE 0 END) AS m4, 
	  SUM(CASE extract(MONTH from exportacion.fnum) WHEN '5' THEN exportacion.qunicom ELSE 0 END) AS m5,
	  SUM(CASE extract(MONTH from exportacion.fnum) WHEN '6' THEN exportacion.qunicom ELSE 0 END) AS m6,
	  SUM(CASE extract(MONTH from exportacion.fnum) WHEN '7' THEN exportacion.qunicom ELSE 0 END) AS m7,
	  SUM(CASE extract(MONTH from exportacion.fnum) WHEN '8' THEN exportacion.qunicom ELSE 0 END) AS m8,
	  SUM(CASE extract(MONTH from exportacion.fnum) WHEN '9' THEN exportacion.qunicom ELSE 0 END) AS m9,
	  SUM(CASE extract(MONTH from exportacion.fnum) WHEN '10' THEN exportacion.qunicom ELSE 0 END) AS m10,
	  SUM(CASE extract(MONTH from exportacion.fnum) WHEN '11' THEN exportacion.qunicom ELSE 0 END) AS m11,
	  SUM(CASE extract(MONTH from exportacion.fnum) WHEN '12' THEN exportacion.qunicom ELSE 0 END) AS m12
	  FROM exportacion where extract(year from exportacion.fnum) = '$anio' AND SUBSTRING(exportacion.ubigeo,1,2) like '%$flatcod' AND exportacion.part_nandi='".$partida1."' AND CONCAT(exportacion.dcom,exportacion.dmer2,exportacion.dmer3,exportacion.dmer4,exportacion.DMER5) LIKE '%$describus%' ";
$resultado_qunicom=$conexpg->query($query_qunicom); 
if($resultado_qunicom->num_rows>0){ 
while($fila_qunicom=$resultado_qunicom->fetch_array()){
		  $qunicom_2012= $fila_qunicom['m1'];
		   $qunicom_2013= $fila_qunicom['m2'];
		    $qunicom_2014= $fila_qunicom['m3'];
			 $qunicom_2015= $fila_qunicom['m4'];
			  $qunicom_2016= $fila_qunicom['m5'];
			  $qunicom_2017= $fila_qunicom['m6'];
			  $qunicom_2018= $fila_qunicom['m7'];
			  $qunicom_2019= $fila_qunicom['m8'];
	$qunicom_2020= $fila_qunicom['m9'];
	$qunicom_2021= $fila_qunicom['m10'];
	$qunicom_11= $fila_qunicom['m11'];
	$qunicom_12= $fila_qunicom['m12'];
			  
	/*
			  if($qunicom_2019=='0'){
				  $var11='0';
			  }else{
			      $var11= number_format((($qunicom_2020/$qunicom_2019) - 1) * 100,2);
				  }

              if($qunicom_2012=='0'){
			  $ca1_3 ='0';
		      }else{
		      $ca1_3 = (($qunicom_2013 / $qunicom_2012) - 1) * 100;
		      }
			   if($qunicom_2013=='0'){
			  $ca2_3 ='0';
		      }else{
		      $ca2_3 = (($qunicom_2014 / $qunicom_2013) - 1) * 100;
		      }
			   if($qunicom_2014=='0'){
			  $ca3_3 ='0';
		      }else{
		      $ca3_3 = (($qunicom_2015 / $qunicom_2014) - 1) * 100;
		      }
			   if($qunicom_2015=='0'){
			  $ca4_3 ='0';
		      }else{
		      $ca4_3 = (($qunicom_2016 / $qunicom_2015) - 1) * 100;
		      }
			  if($qunicom_2016=='0'){
			  $ca5_3 ='0';
		      }else{
		      $ca5_3 = (($qunicom_2017 / $qunicom_2016) - 1) * 100;
		      }
			  if($qunicom_2017=='0'){
			  $ca6_3 ='0';
		      }else{
		      $ca6_3 = (($qunicom_2018 / $qunicom_2017) - 1) * 100;
		      }
			  if($qunicom_2018=='0'){
			  $ca7_3 ='0';
		      }else{
		      $ca7_3 = (($qunicom_2019 / $qunicom_2018) - 1) * 100;
		      }
	if($qunicom_2019=='0'){
			  $ca8_3 ='0';
		      }else{
		      $ca8_3 = (($qunicom_2020 / $qunicom_2019) - 1) * 100;
		      }
	
	if($qunicom_2020=='0'){
			  $ca9_3 ='0';
		      }else{
		      $ca9_3 = (($qunicom_2021 / $qunicom_2020) - 1) * 100;
		      }
			 
			  
			  $var12= number_format(($ca1_3 + $ca2_3 + $ca3_3 + $ca4_3 + $ca5_3 + $ca6_3 + $ca7_3 + $ca8_3)/8,2) ;
*/
		  
		  }
	  }else{
		  $qunicom_2012= "0.00";
		   $qunicom_2013= "0.00";
		    $qunicom_2014= "0.00";
			 $qunicom_2015= "0.00";
			  $qunicom_2016= "0.00";
			  $qunicom_2017= "0.00";
		       $qunicom_2018= "0.00";
		  $qunicom_2019= "0.00";
	$qunicom_2020= "0.00";
	$qunicom_2021= "0.00";
	$qunicom_11= "0.00";
	$qunicom_12= "0.00";
	  }

/*cuenta cantidad de registros*/
	  $query_creg = "SELECT 'cantidadreg' as VALOR, 
	  SUM(CASE extract(MONTH from exportacion.fnum) WHEN '1' THEN 1 ELSE 0 END) AS m1, 
	  SUM(CASE extract(MONTH from exportacion.fnum) WHEN '2' THEN 1 ELSE 0 END) AS m2, 
	  SUM(CASE extract(MONTH from exportacion.fnum) WHEN '3' THEN 1 ELSE 0 END) AS m3, 
	  SUM(CASE extract(MONTH from exportacion.fnum) WHEN '4' THEN 1 ELSE 0 END) AS m4, 
	  SUM(CASE extract(MONTH from exportacion.fnum) WHEN '5' THEN 1 ELSE 0 END) AS m5,
	  SUM(CASE extract(MONTH from exportacion.fnum) WHEN '6' THEN 1 ELSE 0 END) AS m6,
	  SUM(CASE extract(MONTH from exportacion.fnum) WHEN '7' THEN 1 ELSE 0 END) AS m7,
	  SUM(CASE extract(MONTH from exportacion.fnum) WHEN '8' THEN 1 ELSE 0 END) AS m8,
	  SUM(CASE extract(MONTH from exportacion.fnum) WHEN '9' THEN 1 ELSE 0 END) AS m9,
	  SUM(CASE extract(MONTH from exportacion.fnum) WHEN '10' THEN 1 ELSE 0 END) AS m10,
	  SUM(CASE extract(MONTH from exportacion.fnum) WHEN '11' THEN 1 ELSE 0 END) AS m11,
	  SUM(CASE extract(MONTH from exportacion.fnum) WHEN '12' THEN 1 ELSE 0 END) AS m12
	   FROM exportacion where extract(year from exportacion.fnum) = '$anio' AND SUBSTRING(exportacion.UBIGEO,1,2) like '%$flatcod' AND exportacion.part_nandi='".$partida1."' AND CONCAT(exportacion.dcom,exportacion.dmer2,exportacion.dmer3,exportacion.dmer4,exportacion.DMER5) LIKE '%$describus%' ";
$resultado_creg=$conexpg->query($query_creg); 
if($resultado_creg->num_rows>0){ 
while($fila_creg=$resultado_creg->fetch_array()){
		  $creg_2012= $fila_creg['m1'];
		   $creg_2013= $fila_creg['m2'];
		    $creg_2014= $fila_creg['m3'];
			 $creg_2015= $fila_creg['m4'];
			  $creg_2016= $fila_creg['m5'];
			  $creg_2017= $fila_creg['m6'];
			  $creg_2018= $fila_creg['m7'];
			  $creg_2019= $fila_creg['m8'];
	$creg_2020= $fila_creg['m9'];
	$creg_2021= $fila_creg['m10'];
	$creg_11= $fila_creg['m11'];
	$creg_12= $fila_creg['m12'];
			  /*
			  if($creg_2019=='0'){
				  $var13= "0";
			  }else{
			  $var13= number_format((($creg_2020/$creg_2019) - 1) * 100,2);
				  }

              if($creg_2012=='0'){
			  $ca1_4 ='0';
		      }else{
		      $ca1_4 = (($creg_2013 / $creg_2012) - 1) * 100;
		      }
			   if($creg_2013=='0'){
			  $ca2_4 ='0';
		      }else{
		      $ca2_4 = (($creg_2014 / $creg_2013) - 1) * 100;
		      }
			   if($creg_2014=='0'){
			  $ca3_4 ='0';
		      }else{
		      $ca3_4 = (($creg_2015 / $creg_2014) - 1) * 100;
		      }
			   if($creg_2015=='0'){
			  $ca4_4 ='0';
		      }else{
		      $ca4_4 = (($creg_2016 / $creg_2015) - 1) * 100;
		      }
			  if($creg_2016=='0'){
			  $ca5_4 ='0';
		      }else{
		      $ca5_4 = (($creg_2017 / $creg_2016) - 1) * 100;
		      }
			  if($creg_2017=='0'){
			  $ca6_4 ='0';
		      }else{
		      $ca6_4 = (($creg_2018 / $creg_2017) - 1) * 100;
		      }
			  if($creg_2018=='0'){
			  $ca7_4 ='0';
		      }else{
		      $ca7_4 = (($creg_2019 / $creg_2018) - 1) * 100;
		      }
	if($creg_2019=='0'){
			  $ca8_4 ='0';
		      }else{
		      $ca8_4 = (($creg_2020 / $creg_2019) - 1) * 100;
		      }
			 
			  if($creg_2020=='0'){
			  $ca9_4 ='0';
		      }else{
		      $ca9_4 = (($creg_2021 / $creg_2020) - 1) * 100;
		      }
	
			  $var14= number_format(($ca1_4 + $ca2_4 + $ca3_4 + $ca4_4 + $ca5_4 + $ca6_4 + $ca7_4 + $ca8_4)/8,2) ;
		  */
			  
		  }
	  }else{
		  $creg_2012= "0.00";
		   $creg_2013= "0.00";
		    $creg_2014= "0.00";
			 $creg_2015= "0.00";
			  $creg_2016= "0.00";
			  $creg_2017= "0.00";
		       $creg_2018= "0.00";
		  $creg_2019= "0.00";
	$creg_2020= "0.00";
	$creg_2021= "0.00";
	$creg_11= "0.00";
	$creg_12= "0.00";
	  }
				
/*cuenta cantidad de duas*/
	   $query_dua = "SELECT Count(DISTINCT exportacion.ndcl) as cant_dua, extract(MONTH from exportacion.fnum) as mes FROM exportacion WHERE extract(year from exportacion.fnum) = '$anio' AND SUBSTRING(exportacion.UBIGEO,1,2) like '%$flatcod' AND exportacion.part_nandi='".$partida1."' AND CONCAT(exportacion.dcom,exportacion.dmer2,exportacion.dmer3,exportacion.dmer4,exportacion.DMER5) LIKE '%$describus%' GROUP BY mes order BY mes ASC";
				$resultado_dua=$conexpg->query($query_dua); 
if($resultado_dua->num_rows>0){ 
while($fila_dua=$resultado_dua->fetch_array()){
		  $aniodua= $fila_dua['mes'];
		  
		  if($aniodua=='1'){
			  $rdua2012=$fila_dua['cant_dua'];
		  }
		  if($aniodua=='2'){
			  $rdua2013=$fila_dua['cant_dua'];
		  }
		  if($aniodua=='3'){
			  $rdua2014=$fila_dua['cant_dua'];
		  }
		  if($aniodua=='4'){
			  $rdua2015=$fila_dua['cant_dua'];
		  }
		  if($aniodua=='5'){
			  $rdua2016=$fila_dua['cant_dua'];
		  }
		  if($aniodua=='6'){
			  $rdua2017=$fila_dua['cant_dua'];
		  }
		  if($aniodua=='7'){
			  $rdua2018=$fila_dua['cant_dua'];
		  }
			  if($aniodua=='8'){
			  $rdua2019=$fila_dua['cant_dua'];
		  }
	if($aniodua=='9'){
			  $rdua2020=$fila_dua['cant_dua'];
		  }
	
	if($aniodua=='10'){
			  $rdua2021=$fila_dua['cant_dua'];
		  }
	
	if($aniodua=='11'){
			  $rdua11=$fila_dua['cant_dua'];
		  }
	
	if($aniodua=='12'){
			  $rdua12=$fila_dua['cant_dua'];
		  }
		  
	/*
		   if($rdua2019=='0'  or $rdua2019 == null){
			   $var15='0.00';
		   }else{
		   $var15= number_format((($rdua2020/$rdua2019) - 1) * 100,2);
		   }

              if($rdua2012=='0' or $rdua2012 == null){
			  $ca1_5 ='0';
		      }else{
		      $ca1_5 = (($rdua2013 / $rdua2012) - 1) * 100;
		      }
			   if($rdua2013=='0' or $rdua2013 == null){
			  $ca2_5 ='0';
		      }else{
		      $ca2_5 = (($rdua2014 / $rdua2013) - 1) * 100;
		      }
			   if($rdua2014=='0' or $rdua2014 == null){
			  $ca3_5 ='0';
		      }else{
		      $ca3_5 = (($rdua2015 / $rdua2014) - 1) * 100;
		      }
			   if($rdua2015=='0' or $rdua2015 == null){
			  $ca4_5 ='0';
		      }else{
		      $ca4_5 = (($rdua2016 / $rdua2015) - 1) * 100;
		      }
			  if($rdua2016=='0' or $rdua2016 == null){
			  $ca5_5 ='0';
		      }else{
		      $ca5_5 = (($rdua2017 / $rdua2016) - 1) * 100;
		      }
			  if($rdua2017=='0' or $rdua2017 == null){
			  $ca6_5 ='0';
		      }else{
		      $ca6_5 = (($rdua2018 / $rdua2017) - 1) * 100;
		      }
			 if($rdua2018=='0' or $rdua2018 == null){
			  $ca7_5 ='0';
		      }else{
		      $ca7_5 = (($rdua2019 / $rdua2018) - 1) * 100;
		      }
	if($rdua2019=='0' or $rdua2019 == null){
			  $ca8_5 ='0';
		      }else{
		      $ca8_5 = (($rdua2020 / $rdua2019) - 1) * 100;
		      }
	
	if($rdua2020=='0' or $rdua2020 == null){
			  $ca9_5 ='0';
		      }else{
		      $ca9_5 = (($rdua2021 / $rdua2020) - 1) * 100;
		      }
			  
			  $var16= number_format(($ca1_5 + $ca2_5 + $ca3_5 + $ca4_5 + $ca5_5 + $ca6_5 + $ca7_5 + $ca8_5)/8,2) ;
		   */
		  }
	  }else{
		  $rdua2012= "0.00";
		   $rdua2013= "0.00";
		    $rdua2014= "0.00";
			 $rdua2015= "0.00";
			  $rdua2016= "0.00";
			  $rdua2017= "0.00";
		       $rdua2018= "0.00";
		  $rdua2019= "0.00";
	$rdua2020= "0.00";
	$rdua2021= "0.00";
	$rdua11= "0.00";
	$rdua12= "0.00";
	  }
				
/*cuenta cantidad de empresas*/
	   $query_emp = "SELECT Count(DISTINCT exportacion.dnombre) as cant_nom, extract(MONTH from exportacion.fnum) as mes FROM exportacion WHERE extract(year from exportacion.fnum) = '$anio' AND SUBSTRING(exportacion.UBIGEO,1,2) like '%$flatcod' AND exportacion.part_nandi='".$partida1."' AND CONCAT(exportacion.dcom,exportacion.dmer2,exportacion.dmer3,exportacion.dmer4,exportacion.DMER5) LIKE '%$describus%' GROUP BY mes order BY mes ASC";
				$resultado_emp=$conexpg->query($query_emp); 
if($resultado_emp->num_rows>0){ 
while($fila_emp=$resultado_emp->fetch_array()){
		  $anioemp= $fila_emp['mes'];
		  
		  if($anioemp=='1'){
			  $remp2012=$fila_emp['cant_nom'];
		  }
		  if($anioemp=='2'){
			  $remp2013=$fila_emp['cant_nom'];
		  }
		  if($anioemp=='3'){
			  $remp2014=$fila_emp['cant_nom'];
		  }
		  if($anioemp=='4'){
			  $remp2015=$fila_emp['cant_nom'];
		  }
		  if($anioemp=='5'){
			  $remp2016=$fila_emp['cant_nom'];
		  }
		  if($anioemp=='6'){
			  $remp2017=$fila_emp['cant_nom'];
		  }
		  if($anioemp=='7'){
			  $remp2018=$fila_emp['cant_nom'];
		  }
			  if($anioemp=='8'){
			  $remp2019=$fila_emp['cant_nom'];
		  }
	if($anioemp=='9'){
			  $remp2020=$fila_emp['cant_nom'];
		  }
	
	if($anioemp=='10'){
			  $remp2021=$fila_emp['cant_nom'];
		  }
	
	if($anioemp=='11'){
			  $remp11=$fila_emp['cant_nom'];
		  }
	
	if($anioemp=='12'){
			  $remp12=$fila_emp['cant_nom'];
		  }
		  
	/*
		  if($remp2019=='0'  or $remp2019 == null){
			   $var17='0.00';
		   }else{
		   $var17= number_format((($remp2020/$remp2019) - 1) * 100,2);
		   }

              if($remp2012=='0' or $remp2012 == null){
			  $ca1_6 ='0';
		      }else{
		      $ca1_6 = (($remp2013 / $remp2012) - 1) * 100;
		      }
			   if($remp2013=='0' or $remp2013 == null){
			  $ca2_6 ='0';
		      }else{
		      $ca2_6 = (($remp2014 / $remp2013) - 1) * 100;
		      }
			   if($remp2014=='0' or $remp2014 == null){
			  $ca3_6 ='0';
		      }else{
		      $ca3_6 = (($remp2015 / $remp2014) - 1) * 100;
		      }
			   if($remp2015=='0' or $remp2015 == null){
			  $ca4_6 ='0';
		      }else{
		      $ca4_6 = (($remp2016 / $remp2015) - 1) * 100;
		      }
			  if($remp2016=='0' or $remp2016 == null){
			  $ca5_6 ='0';
		      }else{
		      $ca5_6 = (($remp2017 / $remp2016) - 1) * 100;
		      }
			  if($remp2017=='0' or $remp2017 == null){
			  $ca6_6 ='0';
		      }else{
		      $ca6_6 = (($remp2018 / $remp2017) - 1) * 100;
		      }
			  if($remp2018=='0' or $remp2018 == null){
			  $ca7_6 ='0';
		      }else{
		      $ca7_6 = (($remp2019 / $remp2018) - 1) * 100;
		      }
	if($remp2019=='0' or $remp2019 == null){
			  $ca8_6 ='0';
		      }else{
		      $ca8_6 = (($remp2020 / $remp2019) - 1) * 100;
		      }
	
	if($remp2020=='0' or $remp2020 == null){
			  $ca9_6 ='0';
		      }else{
		      $ca9_6 = (($remp2021 / $remp2020) - 1) * 100;
		      }
			  
			  $var18= number_format(($ca1_6 + $ca2_6 + $ca3_6 + $ca4_6 + $ca5_6 + $ca6_6 + $ca7_6 + $ca8_6)/8,2) ;
		   */
		  }
	  }else{
		  $remp2012= "0.00";
		   $remp2013= "0.00";
		    $remp2014= "0.00";
			 $remp2015= "0.00";
			  $remp2016= "0.00";
			  $remp2017= "0.00";
		       $remp2018= "0.00";
		  $remp2019= "0.00";
	$remp2020= "0.00";
	$remp2021= "0.00";
	$remp11= "0.00";
	$remp12= "0.00";
	  }
				
/*cantidad de mercados*/
	  $query_merca = "SELECT Count(DISTINCT exportacion.cpaides) as cant_mer, extract(MONTH from exportacion.fnum) as mes FROM exportacion WHERE extract(year from exportacion.fnum) = '$anio' AND SUBSTRING(exportacion.UBIGEO,1,2) like '%$flatcod' AND exportacion.part_nandi='".$partida1."' AND CONCAT(exportacion.dcom,exportacion.dmer2,exportacion.dmer3,exportacion.dmer4,exportacion.DMER5) LIKE '%$describus%' GROUP BY mes order BY mes ASC";
				$resultado_merca=$conexpg->query($query_merca); 
if($resultado_merca->num_rows>0){ 
while($fila_merca=$resultado_merca->fetch_array()){
		  $aniomerca= $fila_merca['mes'];
		  
		  if($aniomerca=='1'){
			  $rmer2012=$fila_merca['cant_mer'];
		  }
		  if($aniomerca=='2'){
			  $rmer2013=$fila_merca['cant_mer'];
		  }
		  if($aniomerca=='3'){
			  $rmer2014=$fila_merca['cant_mer'];
		  }
		  if($aniomerca=='4'){
			  $rmer2015=$fila_merca['cant_mer'];
		  }
		  if($aniomerca=='5'){
			  $rmer2016=$fila_merca['cant_mer'];
		  }
		  if($aniomerca=='6'){
			  $rmer2017=$fila_merca['cant_mer'];
		  }
		  if($aniomerca=='7'){
			  $rmer2018=$fila_merca['cant_mer'];
		  }
			  if($aniomerca=='8'){
			  $rmer2019=$fila_merca['cant_mer'];
		  }
	if($aniomerca=='9'){
			  $rmer2020=$fila_merca['cant_mer'];
		  }
	
	if($aniomerca=='10'){
			  $rmer2021=$fila_merca['cant_mer'];
		  }
	
	if($aniomerca=='11'){
			  $rmer11=$fila_merca['cant_mer'];
		  }
	
	if($aniomerca=='12'){
			  $rmer12=$fila_merca['cant_mer'];
		  }
		  
		  /*
		  if($rmer2019=='0'  or $rmer2019 == null){
			   $var19='0.00';
		   }else{
		   $var19= number_format((($rmer2020/$rmer2019) - 1) * 100,2);
		   }

              if($rmer2012=='0' or $rmer2012 == null){
			  $ca1_7 ='0';
		      }else{
		      $ca1_7 = (($rmer2013 / $rmer2012) - 1) * 100;
		      }
			   if($rmer2013=='0' or $rmer2013 == null){
			  $ca2_7 ='0';
		      }else{
		      $ca2_7 = (($rmer2014 / $rmer2013) - 1) * 100;
		      }
			   if($rmer2014=='0' or $rmer2014 == null){
			  $ca3_7 ='0';
		      }else{
		      $ca3_7 = (($rmer2015 / $rmer2014) - 1) * 100;
		      }
			   if($rmer2015=='0' or $rmer2015 == null){
			  $ca4_7 ='0';
		      }else{
		      $ca4_7 = (($rmer2016 / $rmer2015) - 1) * 100;
		      }
			  if($rmer2016=='0' or $rmer2016 == null){
			  $ca5_7 ='0';
		      }else{
		      $ca5_7 = (($rmer2017 / $rmer2016) - 1) * 100;
		      }
			  if($rmer2017=='0' or $rmer2017 == null){
			  $ca6_7 ='0';
		      }else{
		      $ca6_7 = (($rmer2018 / $rmer2017) - 1) * 100;
		      }
			  if($rmer2018=='0' or $rmer2018 == null){
			  $ca7_7 ='0';
		      }else{
		      $ca7_7 = (($rmer2019 / $rmer2018) - 1) * 100;
		      }
	if($rmer2019=='0' or $rmer2019 == null){
			  $ca8_7 ='0';
		      }else{
		      $ca8_7 = (($rmer2020 / $rmer2019) - 1) * 100;
		      }
	
	if($rmer2020=='0' or $rmer2020 == null){
			  $ca9_7 ='0';
		      }else{
		      $ca9_7 = (($rmer2021 / $rmer2020) - 1) * 100;
		      }
			  
			  $var20= number_format(($ca1_7 + $ca2_7 + $ca3_7 + $ca4_7 + $ca5_7 + $ca6_7 + $ca7_7 + $ca8_7)/8,2) ;
		   */
		  }
	  }else{
		  $rmer2012= "0.00";
		   $rmer2013= "0.00";
		    $rmer2014= "0.00";
			 $rmer2015= "0.00";
			  $rmer2016= "0.00";
			  $rmer2017= "0.00";
		       $rmer2018= "0.00";
		  $rmer2019= "0.00";
	$rmer2020= "0.00";
	$rmer2021= "0.00";
	$rmer11= "0.00";
	$rmer12= "0.00";
	  }
				
/*contamos cantidad de puertos*/
	   $query_pue = "SELECT Count(DISTINCT exportacion.cpuedes) as cant_pue, extract(MONTH from exportacion.fnum) as mes FROM exportacion WHERE extract(year from exportacion.fnum) = '$anio' AND SUBSTRING(exportacion.UBIGEO,1,2) like '%$flatcod' AND exportacion.part_nandi='".$partida1."' AND CONCAT(exportacion.dcom,exportacion.dmer2,exportacion.dmer3,exportacion.dmer4,exportacion.DMER5) LIKE '%$describus%' GROUP BY mes order BY mes ASC";
				$resultado_pue=$conexpg->query($query_pue); 
if($resultado_pue->num_rows>0){ 
while($fila_pue=$resultado_pue->fetch_array()){
		  $aniopue= $fila_pue['mes'];
		  
		  if($aniopue=='1'){
			  $rpue2012=$fila_pue['cant_pue'];
		  }
		  if($aniopue=='2'){
			  $rpue2013=$fila_pue['cant_pue'];
		  }
		  if($aniopue=='3'){
			  $rpue2014=$fila_pue['cant_pue'];
		  }
		  if($aniopue=='4'){
			  $rpue2015=$fila_pue['cant_pue'];
		  }
		  if($aniopue=='5'){
			  $rpue2016=$fila_pue['cant_pue'];
		  }
		  if($aniopue=='6'){
			  $rpue2017=$fila_pue['cant_pue'];
		  }
		  if($aniopue=='7'){
			  $rpue2018=$fila_pue['cant_pue'];
		  }
			  if($aniopue=='8'){
			  $rpue2019=$fila_pue['cant_pue'];
		  }
	if($aniopue=='9'){
			  $rpue2020=$fila_pue['cant_pue'];
		  }
	if($aniopue=='10'){
			  $rpue2021=$fila_pue['cant_pue'];
		  }
	
	if($aniopue=='11'){
			  $rpue11=$fila_pue['cant_pue'];
		  }
	
	if($aniopue=='12'){
			  $rpue12=$fila_pue['cant_pue'];
		  }

		  
	/*
		  if($rpue2019=='0'  or $rpue2019 == null){
			   $var21='0.00';
		   }else{
		  $var21= number_format((($rpue2020/$rpue2019) - 1) * 100,2);
		   }

              if($rpue2012=='0' or $rpue2012 == null){
			  $ca1_8 ='0';
		      }else{
		      $ca1_8 = (($rpue2013 / $rpue2012) - 1) * 100;
		      }
			   if($rpue2013=='0' or $rpue2013 == null){
			  $ca2_8 ='0';
		      }else{
		      $ca2_8 = (($rpue2014 / $rpue2013) - 1) * 100;
		      }
			   if($rpue2014=='0' or $rpue2014 == null){
			  $ca3_8 ='0';
		      }else{
		      $ca3_8 = (($rpue2015 / $rpue2014) - 1) * 100;
		      }
			   if($rpue2015=='0' or $rpue2015 == null){
			  $ca4_8 ='0';
		      }else{
		      $ca4_8 = (($rpue2016 / $rpue2015) - 1) * 100;
		      }
			  if($rpue2016=='0' or $rpue2016 == null){
			  $ca5_8 ='0';
		      }else{
		      $ca5_8 = (($rpue2017 / $rpue2016) - 1) * 100;
		      }
			  if($rpue2017=='0' or $rpue2017 == null){
			  $ca6_8 ='0';
		      }else{
		      $ca6_8 = (($rpue2018 / $rpue2017) - 1) * 100;
		      }
			  if($rpue2018=='0' or $rpue2018 == null){
			  $ca7_8 ='0';
		      }else{
		      $ca7_8 = (($rpue2019 / $rpue2018) - 1) * 100;
		      }
			  if($rpue2019=='0' or $rpue2019 == null){
			  $ca8_8 ='0';
		      }else{
		      $ca8_8 = (($rpue2020 / $rpue2019) - 1) * 100;
		      }
	if($rpue2020=='0' or $rpue2020 == null){
			  $ca9_8 ='0';
		      }else{
		      $ca9_8 = (($rpue2021 / $rpue2020) - 1) * 100;
		      }
	
			  $var22= number_format(($ca1_8 + $ca2_8 + $ca3_8 + $ca4_8 + $ca5_8 + $ca6_8 + $ca7_8 + $ca8_8)/8,2) ;
		  */
		   
		  }
	  }else{
		  $rpue2012= "0.00";
		   $rpue2013= "0.00";
		    $rpue2014= "0.00";
			 $rpue2015= "0.00";
			  $rpue2016= "0.00";
			  $rpue2017= "0.00";
		       $rpue2018= "0.00";
		  $rpue2019= "0.00";
	$rpue2020= "0.00";
	$rpue2021= "0.00";
	$rpue11= "0.00";
	$rpue12= "0.00";
	  }
				
/*contamos cantidad de aduanas*/
	   $query_adua = "SELECT Count(DISTINCT exportacion.cadu) as cant_adua, extract(MONTH from exportacion.fnum) as mes FROM exportacion WHERE extract(year from exportacion.fnum) = '$anio' AND SUBSTRING(exportacion.UBIGEO,1,2) like '%$flatcod' AND exportacion.part_nandi='".$partida1."' AND CONCAT(exportacion.dcom,exportacion.dmer2,exportacion.dmer3,exportacion.dmer4,exportacion.DMER5) LIKE '%$describus%' GROUP BY mes order BY mes ASC";
				$resultado_adua=$conexpg->query($query_adua); 
if($resultado_adua->num_rows>0){ 
while($fila_adua=$resultado_adua->fetch_array()){
		  $anioadua= $fila_adua['mes'];
		  
		  if($anioadua=='1'){
			  $radua2012=$fila_adua['cant_adua'];
		  }
		  if($anioadua=='2'){
			  $radua2013=$fila_adua['cant_adua'];
		  }
		  if($anioadua=='3'){
			  $radua2014=$fila_adua['cant_adua'];
		  }
		  if($anioadua=='4'){
			  $radua2015=$fila_adua['cant_adua'];
		  }
		  if($anioadua=='5'){
			  $radua2016=$fila_adua['cant_adua'];
		  }
		  if($anioadua=='6'){
			  $radua2017=$fila_adua['cant_adua'];
		  }
		  if($anioadua=='7'){
			  $radua2018=$fila_adua['cant_adua'];
		  }
			  if($anioadua=='8'){
			  $radua2019=$fila_adua['cant_adua'];
		  }
	if($anioadua=='9'){
			  $radua2020=$fila_adua['cant_adua'];
		  }
	if($anioadua=='10'){
			  $radua2021=$fila_adua['cant_adua'];
		  }
	
	if($anioadua=='11'){
			  $radua11=$fila_adua['cant_adua'];
		  }
	
	if($anioadua=='12'){
			  $radua12=$fila_adua['cant_adua'];
		  }
		  
	/*
		  if($radua2019=='0'  or $radua2019 == null){
			   $var23='0.00';
		   }else{
		   $var23= number_format((($radua2020/$radua2019) - 1) * 100,2);
		   }

              if($radua2012=='0' or $radua2012 == null){
			  $ca1_8 ='0';
		      }else{
		      $ca1_8 = (($radua2013 / $radua2012) - 1) * 100;
		      }
			   if($radua2013=='0' or $radua2013 == null){
			  $ca2_8 ='0';
		      }else{
		      $ca2_8 = (($radua2014 / $radua2013) - 1) * 100;
		      }
			   if($radua2014=='0' or $radua2014 == null){
			  $ca3_8 ='0';
		      }else{
		      $ca3_8 = (($radua2015 / $radua2014) - 1) * 100;
		      }
			   if($radua2015=='0' or $radua2015 == null){
			  $ca4_8 ='0';
		      }else{
		      $ca4_8 = (($radua2016 / $radua2015) - 1) * 100;
		      }
			  if($radua2016=='0' or $radua2016 == null){
			  $ca5_8 ='0';
		      }else{
		      $ca5_8 = (($radua2017 / $radua2016) - 1) * 100;
		      }
			  if($radua2017=='0' or $radua2017 == null){
			  $ca6_8 ='0';
		      }else{
		      $ca6_8 = (($radua2018 / $radua2017) - 1) * 100;
		      }
			  if($radua2018=='0' or $radua2018 == null){
			  $ca7_8 ='0';
		      }else{
		      $ca7_8 = (($radua2019 / $radua2018) - 1) * 100;
		      }
			  if($radua2019=='0' or $radua2019 == null){
			  $ca8_8 ='0';
		      }else{
		      $ca8_8 = (($radua2020 / $radua2019) - 1) * 100;
		      }
	
	if($radua2020=='0' or $radua2020 == null){
			  $ca9_8 ='0';
		      }else{
		      $ca9_8 = (($radua2021 / $radua2020) - 1) * 100;
		      }
	
			  $var24= number_format(($ca1_8 + $ca2_8 + $ca3_8 + $ca4_8 + $ca5_8 + $ca6_8 + $ca7_8 + $ca8_8)/8,2) ;
		   */
		  }
	  }else{
		  $radua2012= "0.00";
		   $radua2013= "0.00";
		    $radua2014= "0.00";
			 $radua2015= "0.00";
			  $radua2016= "0.00";
			  $radua2017= "0.00";
		       $radua2018= "0.00";
		  $radua2019= "0.00";
	$radua2020= "0.00";
	$radua2021= "0.00";
	$radua11= "0.00";
	$radua12= "0.00";
	  }
				
/*contamnos cantidad de departamento*/
	   $query_depa = "SELECT COUNT(DISTINCT departamento.nombre) as departamento, extract(MONTH from exportacion.fnum) as mes FROM exportacion LEFT JOIN departamento ON  ((((SUBSTRING(exportacion.ubigeo,1,2))= departamento.iddepartamento))) WHERE extract(year from exportacion.fnum) = '$anio' AND SUBSTRING(exportacion.UBIGEO,1,2) like '%$flatcod' AND exportacion.part_nandi='".$partida1."' AND CONCAT(exportacion.dcom,exportacion.dmer2,exportacion.dmer3,exportacion.dmer4,exportacion.DMER5) LIKE '%$describus%' GROUP BY mes ORDER BY mes ASC";
				$resultado_depa=$conexpg->query($query_depa); 
if($resultado_depa->num_rows>0){ 
while($fila_depa=$resultado_depa->fetch_array()){
		  $aniodepa= $fila_depa['mes'];
		  
		  if($aniodepa=='1'){
			  $rdepa2012=$fila_depa['departamento'];
		  }
		  if($aniodepa=='2'){
			  $rdepa2013=$fila_depa['departamento'];
		  }
		  if($aniodepa=='3'){
			  $rdepa2014=$fila_depa['departamento'];
		  }
		  if($aniodepa=='4'){
			  $rdepa2015=$fila_depa['departamento'];
		  }
		  if($aniodepa=='5'){
			  $rdepa2016=$fila_depa['departamento'];
		  }
		  if($aniodepa=='6'){
			  $rdepa2017=$fila_depa['departamento'];
		  }
		  if($aniodepa=='7'){
			  $rdepa2018=$fila_depa['departamento'];
		  }
			  if($aniodepa=='8'){
			  $rdepa2019=$fila_depa['departamento'];
		  }
	if($aniodepa=='9'){
			  $rdepa2020=$fila_depa['departamento'];
		  }
	if($aniodepa=='10'){
			  $rdepa2021=$fila_depa['departamento'];
		  }
	
	if($aniodepa=='11'){
			  $rdepa11=$fila_depa['departamento'];
		  }
	
	if($aniodepa=='12'){
			  $rdepa12=$fila_depa['departamento'];
		  }
		  
	/*
		  if($rdepa2019=='0'  or $rdepa2019 == null){
			   $var25='0.00';
		   }else{
		  $var25= number_format((($rdepa2020/$rdepa2019) - 1) * 100,2);
		   }

              if($rdepa2012=='0' or $rdepa2012 == null){
			  $ca1_9 ='0';
		      }else{
		      $ca1_9 = (($rdepa2013 / $rdepa2012) - 1) * 100;
		      }
			   if($rdepa2013=='0' or $rdepa2013 == null){
			  $ca2_9 ='0';
		      }else{
		      $ca2_9 = (($rdepa2014 / $rdepa2013) - 1) * 100;
		      }
			   if($rdepa2014=='0' or $rdepa2014 == null){
			  $ca3_9 ='0';
		      }else{
		      $ca3_9 = (($rdepa2015 / $rdepa2014) - 1) * 100;
		      }
			   if($rdepa2015=='0' or $rdepa2015 == null){
			  $ca4_9 ='0';
		      }else{
		      $ca4_9 = (($rdepa2016 / $rdepa2015) - 1) * 100;
		      }
			  if($rdepa2016=='0' or $rdepa2016 == null){
			  $ca5_9 ='0';
		      }else{
		      $ca5_9 = (($rdepa2017 / $rdepa2016) - 1) * 100;
		      }
			  if($rdepa2017=='0' or $rdepa2017 == null){
			  $ca6_9 ='0';
		      }else{
		      $ca6_9 = (($rdepa2018 / $rdepa2017) - 1) * 100;
		      }
			  if($rdepa2018=='0' or $rdepa2018 == null){
			  $ca7_9 ='0';
		      }else{
		      $ca7_9 = (($rdepa2019 / $rdepa2018) - 1) * 100;
		      }
			  if($rdepa2019=='0' or $rdepa2019 == null){
			  $ca8_9 ='0';
		      }else{
		      $ca8_9 = (($rdepa2020 / $rdepa2019) - 1) * 100;
		      }
	if($rdepa2020=='0' or $rdepa2020 == null){
			  $ca9_9 ='0';
		      }else{
		      $ca9_9 = (($rdepa2021 / $rdepa2020) - 1) * 100;
		      }
	
			  $var26= number_format(($ca1_9 + $ca2_9 + $ca3_9 + $ca4_9 + $ca5_9 + $ca6_9 + $ca7_9 + $ca8_9)/8,2) ;
		   */
		  }
	  }else{
		  $rdepa2012= "0.00";
		   $rdepa2013= "0.00";
		    $rdepa2014= "0.00";
			 $rdepa2015= "0.00";
			  $rdepa2016= "0.00";
			  $rdepa2017= "0.00";
		       $rdepa2018= "0.00";
		  $rdepa2019= "0.00";
	$rdepa2020= "0.00";
	$rdepa2021= "0.00";
	$rdepa11= "0.00";
	$rdepa12= "0.00";
	  }
				
/*contamnos cantidad de agente*/
	   $query_agen = "SELECT Count(DISTINCT exportacion.cage) as cant_agen, extract(MONTH from exportacion.fnum) as mes FROM exportacion WHERE extract(year from exportacion.fnum) = '$anio' AND SUBSTRING(exportacion.UBIGEO,1,2) like '%$flatcod' AND exportacion.part_nandi='".$partida1."' AND CONCAT(exportacion.dcom,exportacion.dmer2,exportacion.dmer3,exportacion.dmer4,exportacion.DMER5) LIKE '%$describus%' GROUP BY mes order BY mes ASC";
				$resultado_agen=$conexpg->query($query_agen); 
if($resultado_agen->num_rows>0){ 
while($fila_agen=$resultado_agen->fetch_array()){
		  $anioagen= $fila_agen['mes'];
		  
		  if($anioagen=='1'){
			  $ragen2012=$fila_agen['cant_agen'];
		  }
		  if($anioagen=='2'){
			  $ragen2013=$fila_agen['cant_agen'];
		  }
		  if($anioagen=='3'){
			  $ragen2014=$fila_agen['cant_agen'];
		  }
		  if($anioagen=='4'){
			  $ragen2015=$fila_agen['cant_agen'];
		  }
		  if($anioagen=='5'){
			  $ragen2016=$fila_agen['cant_agen'];
		  }
		  if($anioagen=='6'){
			  $ragen2017=$fila_agen['cant_agen'];
		  }
		  if($anioagen=='7'){
			  $ragen2018=$fila_agen['cant_agen'];
		  }
			  if($anioagen=='8'){
			  $ragen2019=$fila_agen['cant_agen'];
		  }
	if($anioagen=='9'){
			  $ragen2020=$fila_agen['cant_agen'];
		  }
	if($anioagen=='10'){
			  $ragen2021=$fila_agen['cant_agen'];
		  }
	if($anioagen=='11'){
			  $ragen11=$fila_agen['cant_agen'];
		  }
	if($anioagen=='12'){
			  $ragen12=$fila_agen['cant_agen'];
		  }
		  
	/*
		  if($ragen2019=='0'  or $ragen2019 == null){
			   $var27='0.00';
		   }else{
		  $var27= number_format((($ragen2020/$ragen2019) - 1) * 100,2);
		   }

              if($ragen2012=='0' or $ragen2012 == null){
			  $ca1_10 ='0';
		      }else{
		      $ca1_10 = (($ragen2013 / $ragen2012) - 1) * 100;
		      }
			   if($ragen2013=='0' or $ragen2013 == null){
			  $ca2_10 ='0';
		      }else{
		      $ca2_10 = (($ragen2014 / $ragen2013) - 1) * 100;
		      }
			   if($ragen2014=='0' or $ragen2014 == null){
			  $ca3_10='0';
		      }else{
		      $ca3_10 = (($ragen2015 / $ragen2014) - 1) * 100;
		      }
			   if($ragen2015=='0' or $ragen2015 == null){
			  $ca4_10 ='0';
		      }else{
		      $ca4_10 = (($ragen2016 / $ragen2015) - 1) * 100;
		      }
			  if($ragen2016=='0' or $ragen2016 == null){
			  $ca5_10 ='0';
		      }else{
		      $ca5_10 = (($ragen2017 / $ragen2016) - 1) * 100;
		      }
			  if($ragen2017=='0' or $ragen2017 == null){
			  $ca6_10 ='0';
		      }else{
		      $ca6_10 = (($ragen2018 / $ragen2017) - 1) * 100;
		      }
			  if($ragen2018=='0' or $ragen2018 == null){
			  $ca7_10 ='0';
		      }else{
		      $ca7_10 = (($ragen2019 / $ragen2018) - 1) * 100;
		      }
			  if($ragen2019=='0' or $ragen2019 == null){
			  $ca8_10 ='0';
		      }else{
		      $ca8_10 = (($ragen2020 / $ragen2019) - 1) * 100;
		      }
	if($ragen2020=='0' or $ragen2020 == null){
			  $ca9_10 ='0';
		      }else{
		      $ca9_10 = (($ragen2021 / $ragen2020) - 1) * 100;
		      }
	
			  $var28= number_format(($ca1_10 + $ca2_10 + $ca3_10 + $ca4_10 + $ca5_10 + $ca6_10 + $ca7_10 + $ca8_10)/8,2) ;
		  */
		   
		  }
	  }else{
		  $ragen2012= "0.00";
		   $ragen2013= "0.00";
		    $ragen2014= "0.00";
			 $ragen2015= "0.00";
			  $ragen2016= "0.00";
			  $ragen2017= "0.00";
		       $ragen2018= "0.00";
		  $ragen2019= "0.00";
	$ragen2020= "0.00";
	$ragen2021= "0.00";
	$ragen11= "0.00";
	$ragen12= "0.00";
	  }
				
/*contamos cantidad via de transporte*/
	   $query_via = "SELECT Count(DISTINCT exportacion.cviatra) as cant_via, extract(MONTH from exportacion.fnum) as mes FROM exportacion WHERE extract(year from exportacion.fnum) = '$anio' AND SUBSTRING(exportacion.UBIGEO,1,2) like '%$flatcod' AND exportacion.part_nandi='".$partida1."' AND CONCAT(exportacion.dcom,exportacion.dmer2,exportacion.dmer3,exportacion.dmer4,exportacion.DMER5) LIKE '%$describus%' GROUP BY mes order BY mes ASC";
				$resultado_via=$conexpg->query($query_via); 
if($resultado_via->num_rows>0){ 
while($fila_via=$resultado_via->fetch_array()){
		  $aniovia= $fila_via['mes'];
		  
		  if($aniovia=='1'){
			  $rvia2012=$fila_via['cant_via'];
		  }
		  if($aniovia=='2'){
			  $rvia2013=$fila_via['cant_via'];
		  }
		  if($aniovia=='3'){
			  $rvia2014=$fila_via['cant_via'];
		  }
		  if($aniovia=='4'){
			  $rvia2015=$fila_via['cant_via'];
		  }
		  if($aniovia=='5'){
			  $rvia2016=$fila_via['cant_via'];
		  }
		  if($aniovia=='6'){
			  $rvia2017=$fila_via['cant_via'];
		  }
		  if($aniovia=='7'){
			  $rvia2018=$fila_via['cant_via'];
		  }
			  if($aniovia=='8'){
			  $rvia2019=$fila_via['cant_via'];
		  }
	if($aniovia=='9'){
			  $rvia2020=$fila_via['cant_via'];
		  }
	if($aniovia=='10'){
			  $rvia2021=$fila_via['cant_via'];
		  }
	
	if($aniovia=='11'){
			  $rvia11=$fila_via['cant_via'];
		  }
	if($aniovia=='12'){
			  $rvia12=$fila_via['cant_via'];
		  }
		  
	/*
		  if($rvia2019=='0'  or $rvia2019 == null){
			   $var29='0.00';
		   }else{
		  $var29= number_format((($rvia2020/$rvia2019) - 1) * 100,2);
		   }

              if($rvia2012=='0' or $rvia2012 == null){
			  $ca1_11 ='0';
		      }else{
		      $ca1_11 = (($rvia2013 / $rvia2012) - 1) * 100;
		      }
			   if($rvia2013=='0' or $rvia2013 == null){
			  $ca2_11 ='0';
		      }else{
		      $ca2_11 = (($rvia2014 / $rvia2013) - 1) * 100;
		      }
			   if($rvia2014=='0' or $rvia2014 == null){
			  $ca3_11='0';
		      }else{
		      $ca3_11 = (($rvia2015 / $rvia2014) - 1) * 100;
		      }
			   if($rvia2015=='0' or $rvia2015 == null){
			  $ca4_11 ='0';
		      }else{
		      $ca4_11 = (($rvia2016 / $rvia2015) - 1) * 100;
		      }
			  if($rvia2016=='0' or $rvia2016 == null){
			  $ca5_11 ='0';
		      }else{
		      $ca5_11 = (($rvia2017 / $rvia2016) - 1) * 100;
		      }
			  if($rvia2017=='0' or $rvia2017 == null){
			  $ca6_11 ='0';
		      }else{
		      $ca6_11 = (($rvia2018 / $rvia2017) - 1) * 100;
		      }
			  if($rvia2018=='0' or $rvia2018 == null){
			  $ca7_11 ='0';
		      }else{
		      $ca7_11 = (($rvia2019 / $rvia2018) - 1) * 100;
		      }
			  if($rvia2019=='0' or $rvia2019 == null){
			  $ca8_11 ='0';
		      }else{
		      $ca8_11 = (($rvia2020 / $rvia2019) - 1) * 100;
		      }
	if($rvia2020=='0' or $rvia2020 == null){
			  $ca9_11 ='0';
		      }else{
		      $ca9_11 = (($rvia2021 / $rvia2020) - 1) * 100;
		      }
	
			  $var30= number_format(($ca1_11 + $ca2_11 + $ca3_11 + $ca4_11 + $ca5_11 + $ca6_11 + $ca7_11 + $ca8_11)/8,2) ;
		  */
		   
		  }
	  }else{
		  $rvia2012= "0.00";
		   $rvia2013= "0.00";
		    $rvia2014= "0.00";
			 $rvia2015= "0.00";
			  $rvia2016= "0.00";
			  $rvia2017= "0.00";
		       $rvia2018= "0.00";
		  $rvia2019= "0.00";
	$rvia2020= "0.00";
	$rvia2021= "0.00";
	$rvia11= "0.00";
	$rvia12= "0.00";
}
				
 echo"<div class='col-md-12'>";
        echo"<div class='card'>";
	echo"<div class='card-header card-header-info card-header-icon'>
              <div class='card-icon'>
                <i class='material-icons'>assignment</i>
              </div>
              <h4 class='card-title'><b>Reporte Mensual de Indicadores - Exportaciones</b><br> Producto: $describus │ Partida #: $partida1 │ Departamento: $namedepa1 │ Fecha Numeración │ Periodo $anio </b> </h4>
            </div>";
		echo"<div class='card-body'>";
		echo"<div class='toolbar'>
                  </div>";
         echo"<div class='material-datatables'>";
		echo"<table id='datatables' class='table table-striped table-no-bordered table-hover' cellspacing='0' width='100%' style='width:100%'>";
		  echo"<thead>
                          <tr>
                              <th>#</th>
							  <th>Indicadores</th>
                              <th>Enero</th>
                              <th>Febrero</th>
                              <th>Marzo</th>
                              <th>Abril</th>
							  <th>Mayo</th>
							  <th>Junio</th>
							  <th>Julio</th>
							  <th>Agosto</th>
							  <th>Septiembre</th>
							  <th>Octubre</th>
							  <th>Noviembre</th>
							  <th>Diciembre</th>
                          </tr>
                      </thead>";
		 echo"<tfoot>
                          <tr>
						      <th>#</th>
                              <th>Indicadores</th>
                              <th>Enero</th>
                              <th>Febrero</th>
                              <th>Marzo</th>
                              <th>Abril</th>
							  <th>Mayo</th>
							  <th>Junio</th>
							  <th>Julio</th>
							  <th>Agosto</th>
							  <th>Septiembre</th>
							  <th>Octubre</th>
							  <th>Noviembre</th>
							  <th>Diciembre</th>
                          </tr>
                      </tfoot>";
           echo"<tbody>";
				
			echo "<tr>";
echo "<td>1</td>";
echo "<td>Valor FOB USD</td>";
echo "<td>".number_format($vfob_2012,2)."</td>";
echo "<td>".number_format($vfob_2013,2)."</td>";
echo "<td>".number_format($vfob_2014,2)."</td>";
echo "<td>".number_format($vfob_2015,2)."</td>";
echo "<td>".number_format($vfob_2016,2)."</td>";
echo "<td>".number_format($vfob_2017,2)."</td>";
echo "<td>".number_format($vfob_2018,2)."</td>";
echo "<td>".number_format($vfob_2019,2)."</td>";
echo "<td>".number_format($vfob_2020,2)."</td>";
				echo "<td>".number_format($vfob_2021,2)."</td>";
echo "<td>".number_format($vfob_11,2)."</td>";
echo "<td>".number_format($vfob_12,2)."</td>";
echo "</tr>";
echo "<tr>";
				echo "<td>2</td>";
echo "<td>Peso Neto (Kg)</td>";
echo "<td>".number_format($vpes_2012,2)."</td>";
echo "<td>".number_format($vpes_2013,2)."</td>";
echo "<td>".number_format($vpes_2014,2)."</td>";
echo "<td>".number_format($vpes_2015,2)."</td>";
echo "<td>".number_format($vpes_2016,2)."</td>";
echo "<td>".number_format($vpes_2017,2)."</td>";
echo "<td>".number_format($vpes_2018,2)."</td>";
				echo "<td>".number_format($vpes_2019,2)."</td>";
				echo "<td>".number_format($vpes_2020,2)."</td>";
				echo "<td>".number_format($vpes_2021,2)."</td>";
echo "<td>".number_format($vpes_11,2)."</td>";
echo "<td>".number_format($vpes_12,2)."</td>";
echo "</tr>";
echo "<tr>";
				echo "<td>3</td>";
echo "<td>Precio FOB USD x KG</td>";
echo "<td>".number_format($preciofob2012,2)."</td>";
echo "<td>".number_format($preciofob2013,2)."</td>";
echo "<td>".number_format($preciofob2014,2)."</td>";
echo "<td>".number_format($preciofob2015,2)."</td>";
echo "<td>".number_format($preciofob2016,2)."</td>";
echo "<td>".number_format($preciofob2017,2)."</td>";
echo "<td>".number_format($preciofob2018,2)."</td>";
				echo "<td>".number_format($preciofob2019,2)."</td>";
				echo "<td>".number_format($preciofob2020,2)."</td>";
				echo "<td>".number_format($preciofob2021,2)."</td>";
echo "<td>".number_format($preciofob11,2)."</td>";
echo "<td>".number_format($preciofob12,2)."</td>";
echo "</tr>";
echo "<tr>";
				echo "<td>4</td>";
echo "<td>Peso Bruto (Kg)</td>";
echo "<td>".number_format($vbru_2012,2)."</td>";
echo "<td>".number_format($vbru_2013,2)."</td>";
echo "<td>".number_format($vbru_2014,2)."</td>";
echo "<td>".number_format($vbru_2015,2)."</td>";
echo "<td>".number_format($vbru_2016,2)."</td>";
echo "<td>".number_format($vbru_2017,2)."</td>";
echo "<td>".number_format($vbru_2018,2)."</td>";
				echo "<td>".number_format($vbru_2019,2)."</td>";
				echo "<td>".number_format($vbru_2020,2)."</td>";
				echo "<td>".number_format($vbru_2021,2)."</td>";
echo "<td>".number_format($vbru_11,2)."</td>";
echo "<td>".number_format($vbru_12,2)."</td>";
echo "</tr>";
echo "<tr>";
				echo "<td>5</td>";
echo "<td>Cantidad Exportada</td>";
echo "<td>".number_format($qunifis_2012,2)."</td>";
echo "<td>".number_format($qunifis_2013,2)."</td>";
echo "<td>".number_format($qunifis_2014,2)."</td>";
echo "<td>".number_format($qunifis_2015,2)."</td>";
echo "<td>".number_format($qunifis_2016,2)."</td>";
echo "<td>".number_format($qunifis_2017,2)."</td>";
echo "<td>".number_format($qunifis_2018,2)."</td>";
				echo "<td>".number_format($qunifis_2019,2)."</td>";
				echo "<td>".number_format($qunifis_2020,2)."</td>";
				echo "<td>".number_format($qunifis_2021,2)."</td>";
echo "<td>".number_format($qunifis_11,2)."</td>";
echo "<td>".number_format($qunifis_12,2)."</td>";
echo "</tr>";
echo "<tr>";
				echo "<td>6</td>";
echo "<td>Unidades Comerciales</td>";
echo "<td>".number_format($qunicom_2012,2)."</td>";
echo "<td>".number_format($qunicom_2013,2)."</td>";
echo "<td>".number_format($qunicom_2014,2)."</td>";
echo "<td>".number_format($qunicom_2015,2)."</td>";
echo "<td>".number_format($qunicom_2016,2)."</td>";
echo "<td>".number_format($qunicom_2017,2)."</td>";
echo "<td>".number_format($qunicom_2018,2)."</td>";
				echo "<td>".number_format($qunicom_2019,2)."</td>";
				echo "<td>".number_format($qunicom_2020,2)."</td>";
				echo "<td>".number_format($qunicom_2021,2)."</td>";
echo "<td>".number_format($qunicom_11,2)."</td>";
echo "<td>".number_format($qunicom_12,2)."</td>";
echo "</tr>";
echo "<tr>";
				echo "<td>7</td>";
echo "<td>Cantidad de Registros</td>";
echo "<td>$creg_2012</td>";
echo "<td>$creg_2013</td>";
echo "<td>$creg_2014</td>";
echo "<td>$creg_2015</td>";
echo "<td>$creg_2016</td>";
echo "<td>$creg_2017</td>";
echo "<td>$creg_2018</td>";
				echo "<td>$creg_2019</td>";
				echo "<td>$creg_2020</td>";
				echo "<td>$creg_2021</td>";
echo "<td>$creg_11</td>";
echo "<td>$creg_12</td>";
echo "</tr>";
echo "<tr>";
				echo "<td>8</td>";
echo "<td>Cantidad de DUA</td>";
echo "<td>$rdua2012</td>";
echo "<td>$rdua2013</td>";
echo "<td>$rdua2014</td>";
echo "<td>$rdua2015</td>";
echo "<td>$rdua2016</td>";
echo "<td>$rdua2017</td>";
echo "<td>$rdua2018</td>";
				echo "<td>$rdua2019</td>";
				echo "<td>$rdua2020</td>";
				echo "<td>$rdua2021</td>";
echo "<td>$rdua11</td>";
echo "<td>$rdua12</td>";
echo "</tr>";
echo "<tr>";
				echo "<td>9</td>";
echo "<td>Cantidad de Empresas</td>";
echo "<td>$remp2012</td>";
echo "<td>$remp2013</td>";
echo "<td>$remp2014</td>";
echo "<td>$remp2015</td>";
echo "<td>$remp2016</td>";
echo "<td>$remp2017</td>";
echo "<td>$remp2018</td>";
				echo "<td>$remp2019</td>";
				echo "<td>$remp2020</td>";
				echo "<td>$remp2021</td>";
echo "<td>$remp11</td>";
echo "<td>$remp12</td>";
echo "</tr>";
echo "<tr>";
				echo "<td>10</td>";
echo "<td>Cantidad de Mercados</td>";
echo "<td>$rmer2012</td>";
echo "<td>$rmer2013</td>";
echo "<td>$rmer2014</td>";
echo "<td>$rmer2015</td>";
echo "<td>$rmer2016</td>";
echo "<td>$rmer2017</td>";
echo "<td>$rmer2018</td>";
				echo "<td>$rmer2019</td>";
				echo "<td>$rmer2020</td>";
				echo "<td>$rmer2021</td>";
echo "<td>$rmer11</td>";
echo "<td>$rmer12</td>";
echo "</tr>";
echo "<tr>";
				echo "<td>11</td>";
echo "<td>Cantidad de Puertos</td>";
echo "<td>$rpue2012</td>";
echo "<td>$rpue2013</td>";
echo "<td>$rpue2014</td>";
echo "<td>$rpue2015</td>";
echo "<td>$rpue2016</td>";
echo "<td>$rpue2017</td>";
echo "<td>$rpue2018</td>";
				echo "<td>$rpue2019</td>";
				echo "<td>$rpue2020</td>";
				echo "<td>$rpue2021</td>";
echo "<td>$rpue11</td>";
echo "<td>$rpue12</td>";
echo "</tr>";
echo "<tr>";
				echo "<td>12</td>";
echo "<td>Cantidad de Aduanas</td>";
echo "<td>$radua2012</td>";
echo "<td>$radua2013</td>";
echo "<td>$radua2014</td>";
echo "<td>$radua2015</td>";
echo "<td>$radua2016</td>";
echo "<td>$radua2017</td>";
echo "<td>$radua2018</td>";
				echo "<td>$radua2019</td>";
				echo "<td>$radua2020</td>";
				echo "<td>$radua2021</td>";
echo "<td>$radua11</td>";
echo "<td>$radua12</td>";
echo "</tr>";
echo "<tr>";
				echo "<td>13</td>";
echo "<td>Cantidad de Departamentos</td>";
echo "<td>$rdepa2012</td>";
echo "<td>$rdepa2013</td>";
echo "<td>$rdepa2014</td>";
echo "<td>$rdepa2015</td>";
echo "<td>$rdepa2016</td>";
echo "<td>$rdepa2017</td>";
echo "<td>$rdepa2018</td>";
				echo "<td>$rdepa2019</td>";
				echo "<td>$rdepa2020</td>";
				echo "<td>$rdepa2021</td>";
echo "<td>$rdepa11</td>";
echo "<td>$rdepa12</td>";
echo "</tr>";
echo "<tr>";
				echo "<td>14</td>";
echo "<td>Cantidad de Agentes</td>";
echo "<td>$ragen2012</td>";
echo "<td>$ragen2013</td>";
echo "<td>$ragen2014</td>";
echo "<td>$ragen2015</td>";
echo "<td>$ragen2016</td>";
echo "<td>$ragen2017</td>";
echo "<td>$ragen2018</td>";
				echo "<td>$ragen2019</td>";
				echo "<td>$ragen2020</td>";
				echo "<td>$ragen2021</td>";
echo "<td>$ragen11</td>";
echo "<td>$ragen12</td>";
echo "</tr>";
echo "<tr>";
				echo "<td>15</td>";
echo "<td>Cantidad de Vías de Transporte</td>";
echo "<td>$rvia2012</td>";
echo "<td>$rvia2013</td>";
echo "<td>$rvia2014</td>";
echo "<td>$rvia2015</td>";
echo "<td>$rvia2016</td>";
echo "<td>$rvia2017</td>";
echo "<td>$rvia2018</td>";
				echo "<td>$rvia2019</td>";
				echo "<td>$rvia2020</td>";
				echo "<td>$rvia2021</td>";
echo "<td>$rvia11</td>";
echo "<td>$rvia12</td>";
echo "</tr>";	
				
		  echo"</tbody>";
		  echo "</table>";
		  echo"</div>";
		  echo"</div>";
		  echo"</div>";
		  echo"</div>";
		  echo "</div></div></div>";

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
//cerrando conexion
mysqli_close($conexpg);
?>
</html>