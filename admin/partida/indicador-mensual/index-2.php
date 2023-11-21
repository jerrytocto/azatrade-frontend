<?php
session_start();
if (isset($_SESSION['usuario'])){
}else{
	if(!isset($_SESSION["usuario"]) || $_SESSION["usuario"]==null){
	//print "<script>alert('Acceso invalido! - Inicia Sesion para Acceder');window.location='$enlace_actual';</script>";
}
}
//include("../../incBD/inibd.php");
date_default_timezone_set("America/Lima");
$fechahoy = date("Y-m-d");

set_time_limit(500);
$partida1 = $_POST["partidaindimen"];
$anio = $_POST["year"];
$namedepa1 = $_POST["namedepa"];
$ubicod1 = $_POST["codubi"];
if($ubicod1!=""){
	$flatcod = $ubicod1;
	//$query1 = "AND SUBSTRING(exportacion.ubigeo,1,2) LIKE '%$flatcod'";
	$query1fil = "AND SUBSTRING(exportacion.ubigeo,1,2) = '$flatcod'";
}else{
	$flatcod = "";
    $query1fil = "";
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
      <style>
		.loader {
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background: url('../../img/loading-carga.gif') 50% 50% no-repeat rgb(249,249,249);
    opacity: .8;
}
	</style>
      <script type="text/javascript">
$(window).load(function() {
    $(".loader").fadeOut("slow");
});
</script>
       
        </head>
        <body class="off-canvas-sidebar register-page" style="background-image: url('../../img/plan.jpg'); background-size: cover; background-position: top center;">
     
<div class="loader"></div>

          <div class="wrapper">
           <div class="content">
                      <div class="container-fluid">
                            <div class="row"> 
                            
            <div class='col-md-12'>

            <?php
				include("../../incBD/inibd.php");
				
				if($anio!="" or $partida1!=""){ //si tiene datos realiza la consulta

		
//sumamos valorfob
		   $query_vfob = "SELECT 'vfobserdol' as VALOR, 
		   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '1' THEN exportacion.vfobserdol ELSE 0 END) AS mes1, 
		   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '2' THEN exportacion.vfobserdol ELSE 0 END) AS mes2, 
		   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '3' THEN exportacion.vfobserdol ELSE 0 END) AS mes3, 
		   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '4' THEN exportacion.vfobserdol ELSE 0 END) AS mes4, 
		   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '5' THEN exportacion.vfobserdol ELSE 0 END) AS mes5,
		   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '6' THEN exportacion.vfobserdol ELSE 0 END) AS mes6,
		   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '7' THEN exportacion.vfobserdol ELSE 0 END) AS mes7,
		   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '8' THEN exportacion.vfobserdol ELSE 0 END) AS mes8,
		   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '9' THEN exportacion.vfobserdol ELSE 0 END) AS mes9,
		   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '10' THEN exportacion.vfobserdol ELSE 0 END) AS mes10,
			 SUM(CASE extract(MONTH from exportacion.fnum) WHEN '11' THEN exportacion.vfobserdol ELSE 0 END) AS mes11,
			 SUM(CASE extract(MONTH from exportacion.fnum) WHEN '12' THEN exportacion.vfobserdol ELSE 0 END) AS mes12
		   FROM exportacion WHERE extract(year from exportacion.fnum) = '$anio' $query1fil AND exportacion.part_nandi='$partida1' ";
		$resultado_vfob=$conexpg->query($query_vfob); 
if($resultado_vfob->num_rows>0){ 
while($fila_vfob=$resultado_vfob->fetch_array()){
		  $vfob_2012= $fila_vfob['mes1'];
		   $vfob_2013=  $fila_vfob['mes2'];
		    $vfob_2014=  $fila_vfob['mes3'];
			 $vfob_2015=  $fila_vfob['mes4'];
			  $vfob_2016=  $fila_vfob['mes5'];
			   $vfob_2017=  $fila_vfob['mes6'];
			    $vfob_2018=  $fila_vfob['mes7'];
			  $vfob_2019=  $fila_vfob['mes8'];
	$vfob_2020=  $fila_vfob['mes9'];
	$vfob_2021=  $fila_vfob['mes10'];
	$vfobmes11=  $fila_vfob['mes11'];
	$vfobmes12=  $fila_vfob['mes12'];
			  
			   $sumtota = $vfob_2012 + $vfob_2013 + $vfob_2014 + $vfob_2015 + $vfob_2016 + $vfob_2017 + $vfob_2018 + $vfob_2019 + $vfob_2020 + $vfob_2021 + $vfobmes11 + $vfobmes12;

		  
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
	$vfobmes11=  "0.00";
	$vfobmes12=  "0.00";
	$sumtota = "0.00";
	  }
				
//sumamos vpesnet
	   $query_vpes = "SELECT 'vpesnet' as VALOR,
	   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '1' THEN exportacion.vpesnet ELSE 0 END) AS mes1, 
		   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '2' THEN exportacion.vpesnet ELSE 0 END) AS mes2, 
		   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '3' THEN exportacion.vpesnet ELSE 0 END) AS mes3, 
		   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '4' THEN exportacion.vpesnet ELSE 0 END) AS mes4, 
		   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '5' THEN exportacion.vpesnet ELSE 0 END) AS mes5,
		   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '6' THEN exportacion.vpesnet ELSE 0 END) AS mes6,
		   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '7' THEN exportacion.vpesnet ELSE 0 END) AS mes7,
		   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '8' THEN exportacion.vpesnet ELSE 0 END) AS mes8,
		   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '9' THEN exportacion.vpesnet ELSE 0 END) AS mes9,
		   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '10' THEN exportacion.vpesnet ELSE 0 END) AS mes10,
			 SUM(CASE extract(MONTH from exportacion.fnum) WHEN '11' THEN exportacion.vpesnet ELSE 0 END) AS mes11,
			 SUM(CASE extract(MONTH from exportacion.fnum) WHEN '12' THEN exportacion.vpesnet ELSE 0 END) AS mes12
	   FROM exportacion where extract(year from exportacion.fnum) = '$anio' $query1fil AND exportacion.part_nandi='$partida1'";
		$resultado_vpes=$conexpg->query($query_vpes); 
if($resultado_vpes->num_rows>0){ 
while($fila_vpes=$resultado_vpes->fetch_array()){
		  $vpes_2012=  $fila_vpes['mes1'];
		   $vpes_2013=  $fila_vpes['mes2'];
		    $vpes_2014=  $fila_vpes['mes3'];
			 $vpes_2015=  $fila_vpes['mes4'];
			  $vpes_2016= $fila_vpes['mes5'];
			  $vpes_2017= $fila_vpes['mes6'];
			  $vpes_2018= $fila_vpes['mes7'];
			  $vpes_2019= $fila_vpes['mes8'];
	$vpes_2020= $fila_vpes['mes9'];
	$vpes_2021= $fila_vpes['mes10'];
	$vpesmes11= $fila_vpes['mes11'];
	$vpesmes12= $fila_vpes['mes12'];
			  
			  $var4= number_format(($vpes_2012 + $vpes_2013 + $vpes_2014 + $vpes_2015 + $vpes_2016 + $vpes_2017 + $vpes_2018 + $vpes_2019 + $vpes_2020 + $vpes_2021 + $vpesmes11 + $vpesmes12),2);
		  
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
	$vpesmes11= "0.00";
	$vpesmes12= "0.00";
	$var4 = "0.00";
	  }
				
//diferencia Precio FOB USD x KG
$query_preciousd = "SELECT 'preciousdxkg' as VALOR,
	   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '1' THEN exportacion.vfobserdol ELSE 0 END) / SUM(CASE extract(MONTH from exportacion.fnum) WHEN '1' THEN exportacion.vpesnet ELSE 0 END) AS mes1, 
		   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '2' THEN exportacion.vfobserdol ELSE 0 END) / SUM(CASE extract(MONTH from exportacion.fnum) WHEN '2' THEN exportacion.vpesnet ELSE 0 END) AS mes2, 
		   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '3' THEN exportacion.vfobserdol ELSE 0 END) / SUM(CASE extract(MONTH from exportacion.fnum) WHEN '3' THEN exportacion.vpesnet ELSE 0 END) AS mes3, 
		   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '4' THEN exportacion.vfobserdol ELSE 0 END) / SUM(CASE extract(MONTH from exportacion.fnum) WHEN '4' THEN exportacion.vpesnet ELSE 0 END) AS mes4, 
		   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '5' THEN exportacion.vfobserdol ELSE 0 END) / SUM(CASE extract(MONTH from exportacion.fnum) WHEN '5' THEN exportacion.vpesnet ELSE 0 END) AS mes5,
		   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '6' THEN exportacion.vfobserdol ELSE 0 END) / SUM(CASE extract(MONTH from exportacion.fnum) WHEN '6' THEN exportacion.vpesnet ELSE 0 END) AS mes6,
		   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '7' THEN exportacion.vfobserdol ELSE 0 END) / SUM(CASE extract(MONTH from exportacion.fnum) WHEN '7' THEN exportacion.vpesnet ELSE 0 END) AS mes7,
		   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '8' THEN exportacion.vfobserdol ELSE 0 END) / SUM(CASE extract(MONTH from exportacion.fnum) WHEN '8' THEN exportacion.vpesnet ELSE 0 END) AS mes8,
		   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '9' THEN exportacion.vfobserdol ELSE 0 END) / SUM(CASE extract(MONTH from exportacion.fnum) WHEN '9' THEN exportacion.vpesnet ELSE 0 END) AS mes9,
		   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '10' THEN exportacion.vfobserdol ELSE 0 END) / SUM(CASE extract(MONTH from exportacion.fnum) WHEN '10' THEN exportacion.vpesnet ELSE 0 END) AS mes10,
			 SUM(CASE extract(MONTH from exportacion.fnum) WHEN '11' THEN exportacion.vfobserdol ELSE 0 END) / SUM(CASE extract(MONTH from exportacion.fnum) WHEN '11' THEN exportacion.vpesnet ELSE 0 END) AS mes11,
			 SUM(CASE extract(MONTH from exportacion.fnum) WHEN '12' THEN exportacion.vfobserdol ELSE 0 END) / SUM(CASE extract(MONTH from exportacion.fnum) WHEN '12' THEN exportacion.vpesnet ELSE 0 END) AS mes12
	   FROM exportacion where extract(year from exportacion.fnum) = '$anio' $query1fil AND exportacion.part_nandi='$partida1'";
		$resultado_preusd=$conexpg->query($query_preciousd); 
if($resultado_preusd->num_rows>0){ 
while($fila_preciousd=$resultado_preusd->fetch_array()){
		  $vpreusd_2012=  $fila_preciousd['mes1'];
		   $vpreusd_2013=  $fila_preciousd['mes2'];
		    $vpreusd_2014=  $fila_preciousd['mes3'];
			 $vpreusd_2015=  $fila_preciousd['mes4'];
			  $vpreusd_2016= $fila_preciousd['mes5'];
			  $vpreusd_2017= $fila_preciousd['mes6'];
			  $vpreusd_2018= $fila_preciousd['mes7'];
			  $vpreusd_2019= $fila_preciousd['mes8'];
	$vpreusd_2020= $fila_preciousd['mes9'];
	$vpreusd_2021= $fila_preciousd['mes10'];
	$vpreusdmes11= $fila_preciousd['mes11'];
	$vpreusdmes12= $fila_preciousd['mes12'];
			  
			  $var4precio= number_format(($vpreusd_2012 + $vpreusd_2013 + $vpreusd_2014 + $vpreusd_2015 + $vpreusd_2016 + $vpreusd_2017 + $vpreusd_2018 + $vpreusd_2019 + $vpreusd_2020 + $vpreusd_2021 + $vpreusdmes11 + $vpreusdmes12),2);
		  
		  }
	  }else{
		  $vpreusd_2012= "0.00";
		   $vpreusd_2013= "0.00";
		    $vpreusd_2014= "0.00";
			 $vpreusd_2015= "0.00";
			  $vpreusd_2016= "0.00";
			  $vpreusd_2017= "0.00";
		       $vpreusd_2018= "0.00";
		  $vpreusd_2019= "0.00";
	$vpreusd_2020= "0.00";
	$vpreusd_2021= "0.00";
	$vpreusdmes11= "0.00";
	$vpreusdmes12= "0.00";
	$var4precio = "0.00";
	  }
				
//suma peso bruto
		  $query_vbru = "SELECT 'preciobruto' as VALOR, 
		  SUM(CASE extract(MONTH from exportacion.fnum) WHEN '1' THEN exportacion.vpesbru ELSE 0 END) AS mes1, 
		   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '2' THEN exportacion.vpesbru ELSE 0 END) AS mes2, 
		   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '3' THEN exportacion.vpesbru ELSE 0 END) AS mes3, 
		   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '4' THEN exportacion.vpesbru ELSE 0 END) AS mes4, 
		   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '5' THEN exportacion.vpesbru ELSE 0 END) AS mes5,
		   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '6' THEN exportacion.vpesbru ELSE 0 END) AS mes6,
		   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '7' THEN exportacion.vpesbru ELSE 0 END) AS mes7,
		   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '8' THEN exportacion.vpesbru ELSE 0 END) AS mes8,
		   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '9' THEN exportacion.vpesbru ELSE 0 END) AS mes9,
		   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '10' THEN exportacion.vpesbru ELSE 0 END) AS mes10,
			 SUM(CASE extract(MONTH from exportacion.fnum) WHEN '11' THEN exportacion.vpesbru ELSE 0 END) AS mes11,
			 SUM(CASE extract(MONTH from exportacion.fnum) WHEN '12' THEN exportacion.vpesbru ELSE 0 END) AS mes12
		  FROM exportacion where extract(year from exportacion.fnum) = '$anio' $query1fil AND exportacion.part_nandi='$partida1' ";
		$resultado_vbru=$conexpg->query($query_vbru); 
if($resultado_vbru->num_rows>0){ 
while($fila_vbru=$resultado_vbru->fetch_array()){
		  $vbru_2012= $fila_vbru['mes1'];
		   $vbru_2013= $fila_vbru['mes2'];
		    $vbru_2014= $fila_vbru['mes3'];
			 $vbru_2015= $fila_vbru['mes4'];
			  $vbru_2016= $fila_vbru['mes5'];
			  $vbru_2017= $fila_vbru['mes6'];
			  $vbru_2018= $fila_vbru['mes7'];
			  $vbru_2019= $fila_vbru['mes8'];
	$vbru_2020= $fila_vbru['mes9'];
	$vbru_2021= $fila_vbru['mes10'];
	$vbrumes11= $fila_vbru['mes11'];
	$vbrumes12= $fila_vbru['mes12'];
			  
			  $var8= number_format(($vbru_2012 + $vbru_2013 + $vbru_2014 + $vbru_2015 + $vbru_2016 + $vbru_2017 + $vbru_2018 + $vbru_2019 + $vbru_2020 + $vbru_2021 + $vbrumes11 + $vbrumes12 ),2) ;
		  
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
	$vbrumes11= "0.00";
	$vbrumes12= "0.00";
	
	  }
				
/*sumamos cantidad exportada*/  
	  $query_qunifis = "SELECT 'preciobruto' as VALOR, 
	  SUM(CASE extract(MONTH from exportacion.fnum) WHEN '1' THEN exportacion.qunifis ELSE 0 END) AS mes1, 
		   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '2' THEN exportacion.qunifis ELSE 0 END) AS mes2, 
		   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '3' THEN exportacion.qunifis ELSE 0 END) AS mes3, 
		   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '4' THEN exportacion.qunifis ELSE 0 END) AS mes4, 
		   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '5' THEN exportacion.qunifis ELSE 0 END) AS mes5,
		   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '6' THEN exportacion.qunifis ELSE 0 END) AS mes6,
		   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '7' THEN exportacion.qunifis ELSE 0 END) AS mes7,
		   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '8' THEN exportacion.qunifis ELSE 0 END) AS mes8,
		   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '9' THEN exportacion.qunifis ELSE 0 END) AS mes9,
		   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '10' THEN exportacion.qunifis ELSE 0 END) AS mes10,
			 SUM(CASE extract(MONTH from exportacion.fnum) WHEN '11' THEN exportacion.qunifis ELSE 0 END) AS mes11,
			 SUM(CASE extract(MONTH from exportacion.fnum) WHEN '12' THEN exportacion.qunifis ELSE 0 END) AS mes12
	  FROM exportacion where extract(year from exportacion.fnum) = '$anio' $query1fil AND exportacion.part_nandi='$partida1' ";
		$resultado_qunifis=$conexpg->query($query_qunifis); 
if($resultado_qunifis->num_rows>0){ 
while($fila_qunifis=$resultado_qunifis->fetch_array()){
		  $qunifis_2012= $fila_qunifis['mes1'];
		   $qunifis_2013= $fila_qunifis['mes2'];
		    $qunifis_2014= $fila_qunifis['mes3'];
			 $qunifis_2015= $fila_qunifis['mes4'];
			  $qunifis_2016= $fila_qunifis['mes5'];
			  $qunifis_2017= $fila_qunifis['mes6'];
			  $qunifis_2018= $fila_qunifis['mes7'];
			  $qunifis_2019= $fila_qunifis['mes8'];
	$qunifis_2020= $fila_qunifis['mes9'];
	$qunifis_2021= $fila_qunifis['mes10'];
	$qunifismes11= $fila_qunifis['mes11'];
	$qunifismes12= $fila_qunifis['mes12'];
	
			  $var10= number_format(($qunifis_2012 + $qunifis_2013 + $qunifis_2014 + $qunifis_2015 + $qunifis_2016 + $qunifis_2017 + $qunifis_2018 + $qunifis_2019 + $qunifis_2020 + $qunifis_2021 + $qunifismes11 + $qunifismes12 ),2) ;
		  
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
	$qunifismes11= "0.00";
	$qunifismes12= "0.00";
	$var10="0.00";
	  }
				
/*sumamos unidades comerciales*/
	  $query_qunicom = "SELECT 'preciobruto' as VALOR, 
	  SUM(CASE extract(MONTH from exportacion.fnum) WHEN '1' THEN exportacion.qunicom ELSE 0 END) AS mes1, 
		   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '2' THEN exportacion.qunicom ELSE 0 END) AS mes2, 
		   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '3' THEN exportacion.qunicom ELSE 0 END) AS mes3, 
		   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '4' THEN exportacion.qunicom ELSE 0 END) AS mes4, 
		   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '5' THEN exportacion.qunicom ELSE 0 END) AS mes5,
		   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '6' THEN exportacion.qunicom ELSE 0 END) AS mes6,
		   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '7' THEN exportacion.qunicom ELSE 0 END) AS mes7,
		   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '8' THEN exportacion.qunicom ELSE 0 END) AS mes8,
		   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '9' THEN exportacion.qunicom ELSE 0 END) AS mes9,
		   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '10' THEN exportacion.qunicom ELSE 0 END) AS mes10,
			 SUM(CASE extract(MONTH from exportacion.fnum) WHEN '11' THEN exportacion.qunicom ELSE 0 END) AS mes11,
			 SUM(CASE extract(MONTH from exportacion.fnum) WHEN '12' THEN exportacion.qunicom ELSE 0 END) AS mes12
	  FROM exportacion where extract(year from exportacion.fnum) = '$anio' $query1fil AND exportacion.part_nandi='$partida1'";
		$resultado_qunicom=$conexpg->query($query_qunicom); 
if($resultado_qunicom->num_rows>0){ 
while($fila_qunicom=$resultado_qunicom->fetch_array()){
		  $qunicom_2012= $fila_qunicom['mes1'];
		   $qunicom_2013= $fila_qunicom['mes2'];
		    $qunicom_2014= $fila_qunicom['mes3'];
			 $qunicom_2015= $fila_qunicom['mes4'];
			  $qunicom_2016= $fila_qunicom['mes5'];
			  $qunicom_2017= $fila_qunicom['mes6'];
			  $qunicom_2018= $fila_qunicom['mes7'];
			  $qunicom_2019= $fila_qunicom['mes8'];
	$qunicom_2020= $fila_qunicom['mes9'];
	$qunicom_2021= $fila_qunicom['mes10'];
	$qunicommes11= $fila_qunicom['mes11'];
	$qunicommes12= $fila_qunicom['mes12'];
			  
			  $var12= number_format(($qunicom_2012 + $qunicom_2013 + $qunicom_2014 + $qunicom_2015 + $qunicom_2016 + $qunicom_2017 + $qunicom_2018 + $qunicom_2019 + $qunicom_2020 + $qunicom_2021 + $qunicommes11 + $qunicommes12),2) ;

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
	$qunicommes11= "0.00";
	$qunicommes12= "0.00";
	$var12="0.00";
	  }

/*cuenta cantidad de registros*/
	  $query_creg = "SELECT 'cantidadreg' as VALOR, 
	       SUM(CASE extract(MONTH from exportacion.fnum) WHEN '1' THEN 1 ELSE 0 END) AS mes1, 
		   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '2' THEN 1 ELSE 0 END) AS mes2, 
		   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '3' THEN 1 ELSE 0 END) AS mes3, 
		   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '4' THEN 1 ELSE 0 END) AS mes4, 
		   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '5' THEN 1 ELSE 0 END) AS mes5,
		   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '6' THEN 1 ELSE 0 END) AS mes6,
		   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '7' THEN 1 ELSE 0 END) AS mes7,
		   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '8' THEN 1 ELSE 0 END) AS mes8,
		   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '9' THEN 1 ELSE 0 END) AS mes9,
		   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '10' THEN 1 ELSE 0 END) AS mes10,
		   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '11' THEN 1 ELSE 0 END) AS mes11,
		   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '12' THEN 1 ELSE 0 END) AS mes12
	   FROM exportacion where extract(year from exportacion.fnum) = '$anio' $query1fil AND exportacion.part_nandi='$partida1'";
		$resultado_creg=$conexpg->query($query_creg); 
if($resultado_creg->num_rows>0){ 
while($fila_creg=$resultado_creg->fetch_array()){
		  $creg_2012= $fila_creg['mes1'];
		   $creg_2013= $fila_creg['mes2'];
		    $creg_2014= $fila_creg['mes3'];
			 $creg_2015= $fila_creg['mes4'];
			  $creg_2016= $fila_creg['mes5'];
			  $creg_2017= $fila_creg['mes6'];
			  $creg_2018= $fila_creg['mes7'];
			  $creg_2019= $fila_creg['mes8'];
	$creg_2020= $fila_creg['mes9'];
	$creg_2021= $fila_creg['mes10'];
	$cregmes11= $fila_creg['mes11'];
	$cregmes12= $fila_creg['mes12'];
			  
			  $var14= number_format(($creg_2012 + $creg_2013 + $creg_2014 + $creg_2015 + $creg_2016 + $creg_2017 + $creg_2018 + $creg_2019 + $creg_2020 + $creg_2021 + $cregmes11 + $cregmes12 ),2) ;

		  }
	  }else{
		  $creg_2012 = "0.00";
		   $creg_2013 = "0.00";
		    $creg_2014 = "0.00";
			 $creg_2015 = "0.00";
			  $creg_2016 = "0.00";
			  $creg_2017 = "0.00";
		       $creg_2018 = "0.00";
		  $creg_2019 = "0.00";
	$creg_2020 = "0.00";
	$creg_2021 = "0.00";
	$cregmes11 = "0.00";
	$cregmes12 = "0.00";
	  }
				
/*cuenta cantidad de duas*/
	   $query_dua = "SELECT 'cantdua' as VALOR, 
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '1' THEN exportacion.ndcl ELSE 0 END )) AS mes1,
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '2' THEN exportacion.ndcl ELSE 0 END )) AS mes2,
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '3' THEN exportacion.ndcl ELSE 0 END )) AS mes3,
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '4' THEN exportacion.ndcl ELSE 0 END )) AS mes4,
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '5' THEN exportacion.ndcl ELSE 0 END )) AS mes5,
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '6' THEN exportacion.ndcl ELSE 0 END )) AS mes6,
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '7' THEN exportacion.ndcl ELSE 0 END )) AS mes7,
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '8' THEN exportacion.ndcl ELSE 0 END )) AS mes8,
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '9' THEN exportacion.ndcl ELSE 0 END )) AS mes9,
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '10' THEN exportacion.ndcl ELSE 0 END )) AS mes10,
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '11' THEN exportacion.ndcl ELSE 0 END )) AS mes11,
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '12' THEN exportacion.ndcl ELSE 0 END )) AS mes12
FROM exportacion WHERE extract(year from exportacion.fnum) = '$anio' $query1fil AND exportacion.part_nandi='$partida1'";
		$resultado_dua=$conexpg->query($query_dua); 
if($resultado_dua->num_rows>0){ 
while($fila_dua=$resultado_dua->fetch_array()){
		  $aniodua1= $fila_dua['mes1'];
	$aniodua2= $fila_dua['mes2'];
	$aniodua3= $fila_dua['mes3'];
	$aniodua4= $fila_dua['mes4'];
	$aniodua5= $fila_dua['mes5'];
	$aniodua6= $fila_dua['mes6'];
	$aniodua7= $fila_dua['mes7'];
	$aniodua8= $fila_dua['mes8'];
	$aniodua9= $fila_dua['mes9'];
	$aniodua10= $fila_dua['mes10'];
	$aniodua11= $fila_dua['mes11'];
	$aniodua12= $fila_dua['mes12'];
		  
			  $var16= number_format(($aniodua1 + $aniodua2 + $aniodua3 + $aniodua4 + $aniodua5 + $aniodua6 + $aniodua7 + $aniodua8 + $aniodua9 + $aniodua10 + $aniodua11 + $aniodua12),2) ;
		   
		  }
	  }else{
		  $aniodua1= "0.00";
		   $aniodua2= "0.00";
		    $aniodua3= "0.00";
			 $aniodua4= "0.00";
			  $aniodua5= "0.00";
			  $aniodua6= "0.00";
		       $aniodua7= "0.00";
		  $aniodua8= "0.00";
	$aniodua9= "0.00";
	$aniodua10= "0.00";
	$aniodua11= "0.00";
	$aniodua12= "0.00";
	$var16 = "0.00";
	  }
				
/*cuenta cantidad de empresas*/
	   $query_emp = "SELECT 'cantemp' as VALOR, 
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '1' THEN exportacion.dnombre ELSE 0 END )) AS mes1,
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '2' THEN exportacion.dnombre ELSE 0 END )) AS mes2,
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '3' THEN exportacion.dnombre ELSE 0 END )) AS mes3,
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '4' THEN exportacion.dnombre ELSE 0 END )) AS mes4,
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '5' THEN exportacion.dnombre ELSE 0 END )) AS mes5,
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '6' THEN exportacion.dnombre ELSE 0 END )) AS mes6,
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '7' THEN exportacion.dnombre ELSE 0 END )) AS mes7,
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '8' THEN exportacion.dnombre ELSE 0 END )) AS mes8,
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '9' THEN exportacion.dnombre ELSE 0 END )) AS mes9,
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '10' THEN exportacion.dnombre ELSE 0 END )) AS mes10,
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '11' THEN exportacion.dnombre ELSE 0 END )) AS mes11,
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '12' THEN exportacion.dnombre ELSE 0 END )) AS mes12 
FROM exportacion WHERE extract(year from exportacion.fnum) = '$anio' $query1fil AND exportacion.part_nandi='$partida1' ";
		$resultado_emp=$conexpg->query($query_emp); 
if($resultado_emp->num_rows>0){ 
while($fila_emp=$resultado_emp->fetch_array()){
		  $anioemp1 = $fila_emp['mes1'];
	$anioemp2 = $fila_emp['mes2'];
	$anioemp3 = $fila_emp['mes3'];
	$anioemp4 = $fila_emp['mes4'];
	$anioemp5 = $fila_emp['mes5'];
	$anioemp6 = $fila_emp['mes6'];
	$anioemp7 = $fila_emp['mes7'];
	$anioemp8 = $fila_emp['mes8'];
	$anioemp9 = $fila_emp['mes9'];
	$anioemp10 = $fila_emp['mes10'];
	$anioemp11 = $fila_emp['mes11'];
	$anioemp12 = $fila_emp['mes12'];
	
	
			  $var18= number_format(($anioemp1 + $anioemp2 + $anioemp3 + $anioemp4 + $anioemp5 + $anioemp6 + $anioemp7 + $anioemp8 + $anioemp9 + $anioemp10 + $anioemp11 + $anioemp12),2) ;
		   
		  }
	  }else{
		  $anioemp1= "0.00";
		   $anioemp2= "0.00";
		    $anioemp3= "0.00";
			 $anioemp4= "0.00";
			  $anioemp5= "0.00";
			  $anioemp6= "0.00";
		       $anioemp7= "0.00";
		  $anioemp8= "0.00";
	$anioemp9= "0.00";
	$anioemp10= "0.00";
	$anioemp11= "0.00";
	$anioemp12= "0.00";
	$var18= "0.00";
	  }
				
/*cantidad de mercados*/
	  $query_merca = "SELECT 'cantpais' as VALOR, 
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '1' THEN exportacion.cpaides ELSE 0 END )) AS mes1,
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '2' THEN exportacion.cpaides ELSE 0 END )) AS mes2,
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '3' THEN exportacion.cpaides ELSE 0 END )) AS mes3,
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '4' THEN exportacion.cpaides ELSE 0 END )) AS mes4,
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '5' THEN exportacion.cpaides ELSE 0 END )) AS mes5,
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '6' THEN exportacion.cpaides ELSE 0 END )) AS mes6,
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '7' THEN exportacion.cpaides ELSE 0 END )) AS mes7,
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '8' THEN exportacion.cpaides ELSE 0 END )) AS mes8,
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '9' THEN exportacion.cpaides ELSE 0 END )) AS mes9,
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '10' THEN exportacion.cpaides ELSE 0 END )) AS mes10,
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '11' THEN exportacion.cpaides ELSE 0 END )) AS mes11,
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '12' THEN exportacion.cpaides ELSE 0 END )) AS mes12 
FROM exportacion WHERE extract(year from exportacion.fnum) = '$anio' $query1fil AND exportacion.part_nandi='$partida1' ";
		$resultado_merca=$conexpg->query($query_merca); 
if($resultado_merca->num_rows>0){ 
while($fila_merca=$resultado_merca->fetch_array()){
		  $aniomerca1 = $fila_merca['mes1'];
	$aniomerca2 = $fila_merca['mes2'];
	$aniomerca3 = $fila_merca['mes3'];
	$aniomerca4 = $fila_merca['mes4'];
	$aniomerca5 = $fila_merca['mes5'];
	$aniomerca6 = $fila_merca['mes6'];
	$aniomerca7 = $fila_merca['mes7'];
	$aniomerca8 = $fila_merca['mes8'];
	$aniomerca9 = $fila_merca['mes9'];
	$aniomerca10 = $fila_merca['mes10'];
	$aniomerca11 = $fila_merca['mes11'];
	$aniomerca12 = $fila_merca['mes12'];

			  $var20= number_format(($aniomerca1 + $aniomerca2 + $aniomerca3 + $aniomerca4 + $aniomerca5 + $aniomerca6 + $aniomerca7 + $aniomerca9 + $aniomerca10 + $aniomerca11 + $aniomerca12),2) ;
		   
		  }
	  }else{
		  $aniomerca1= "0.00";
		   $aniomerca2= "0.00";
		    $aniomerca3= "0.00";
			 $aniomerca4= "0.00";
			  $aniomerca5= "0.00";
			  $aniomerca6= "0.00";
		       $aniomerca7= "0.00";
		  $aniomerca8= "0.00";
	$aniomerca9= "0.00";
	$aniomerca10= "0.00";
	$aniomerca11= "0.00";
	$aniomerca12= "0.00";
	$var20= "0.00";
	  }
				
/*contamos cantidad de puertos*/
	   $query_pue = "SELECT 'cantpuertos' as VALOR, 
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '1' THEN exportacion.cpuedes ELSE 0 END )) AS mes1,
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '2' THEN exportacion.cpuedes ELSE 0 END )) AS mes2,
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '3' THEN exportacion.cpuedes ELSE 0 END )) AS mes3,
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '4' THEN exportacion.cpuedes ELSE 0 END )) AS mes4,
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '5' THEN exportacion.cpuedes ELSE 0 END )) AS mes5,
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '6' THEN exportacion.cpuedes ELSE 0 END )) AS mes6,
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '7' THEN exportacion.cpuedes ELSE 0 END )) AS mes7,
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '8' THEN exportacion.cpuedes ELSE 0 END )) AS mes8,
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '9' THEN exportacion.cpuedes ELSE 0 END )) AS mes9,
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '10' THEN exportacion.cpuedes ELSE 0 END )) AS mes10,
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '11' THEN exportacion.cpuedes ELSE 0 END )) AS mes11,
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '12' THEN exportacion.cpuedes ELSE 0 END )) AS mes12
FROM exportacion WHERE extract(year from exportacion.fnum) = '$anio' $query1fil AND exportacion.part_nandi='$partida1' ";
		$resultado_pue=$conexpg->query($query_pue); 
if($resultado_pue->num_rows>0){ 
while($fila_pue=$resultado_pue->fetch_array()){
		  $aniopue1 = $fila_pue['mes1'];
	$aniopue2 = $fila_pue['mes2'];
	$aniopue3 = $fila_pue['mes3'];
	$aniopue4 = $fila_pue['mes4'];
	$aniopue5 = $fila_pue['mes5'];
	$aniopue6 = $fila_pue['mes6'];
	$aniopue7 = $fila_pue['mes7'];
	$aniopue8 = $fila_pue['mes8'];
	$aniopue9 = $fila_pue['mes9'];
	$aniopue10 = $fila_pue['mes10'];
	$aniopue11 = $fila_pue['mes11'];
	$aniopue12 = $fila_pue['mes12'];
			  
			  $var22= number_format(($aniopue1 + $aniopue2 + $aniopue3 + $aniopue4 + $aniopue5 + $aniopue6 + $aniopue7 + $aniopue8 + $aniopue9 + $aniopue10 + $aniopue11 + $aniopue12 ),2) ;

		  }
	  }else{
		  $aniopue1= "0.00";
		   $aniopue2= "0.00";
		    $aniopue3= "0.00";
			 $aniopue4= "0.00";
			  $aniopue5= "0.00";
			  $aniopue6= "0.00";
		       $aniopue7= "0.00";
		  $aniopue8= "0.00";
	$aniopue9= "0.00";
	$aniopue10= "0.00";
	$aniopue11 = "0.00";
	$aniopue12 = "0.00";
	$var22="0.00";
	  }
				
/*contamos cantidad de aduanas*/
	   $query_adua = "SELECT 'cantaduanas' as VALOR, 
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '1' THEN exportacion.cadu ELSE 0 END )) AS mes1,
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '2' THEN exportacion.cadu ELSE 0 END )) AS mes2,
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '3' THEN exportacion.cadu ELSE 0 END )) AS mes3,
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '4' THEN exportacion.cadu ELSE 0 END )) AS mes4,
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '5' THEN exportacion.cadu ELSE 0 END )) AS mes5,
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '6' THEN exportacion.cadu ELSE 0 END )) AS mes6,
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '7' THEN exportacion.cadu ELSE 0 END )) AS mes7,
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '8' THEN exportacion.cadu ELSE 0 END )) AS mes8,
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '9' THEN exportacion.cadu ELSE 0 END )) AS mes9,
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '10' THEN exportacion.cadu ELSE 0 END )) AS mes10,
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '11' THEN exportacion.cadu ELSE 0 END )) AS mes11,
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '12' THEN exportacion.cadu ELSE 0 END )) AS mes12 
FROM exportacion WHERE extract(year from exportacion.fnum) = '$anio' $query1fil AND exportacion.part_nandi='$partida1' ";
		$resultado_adua=$conexpg->query($query_adua); 
if($resultado_adua->num_rows>0){ 
while($fila_adua=$resultado_adua->fetch_array()){
		  $anioadua1 = $fila_adua['mes1'];
	$anioadua2 = $fila_adua['mes2'];
	$anioadua3 = $fila_adua['mes3'];
	$anioadua4 = $fila_adua['mes4'];
	$anioadua5 = $fila_adua['mes5'];
	$anioadua6 = $fila_adua['mes6'];
	$anioadua7 = $fila_adua['mes7'];
	$anioadua8 = $fila_adua['mes8'];
	$anioadua9 = $fila_adua['mes9'];
	$anioadua10 = $fila_adua['mes10'];
	$anioadua11 = $fila_adua['mes11'];
	$anioadua12 = $fila_adua['mes12'];
			  
			  $var24= number_format(($anioadua1 + $anioadua2 + $anioadua3 + $anioadua4 + $anioadua5 + $anioadua6 + $anioadua7 + $anioadua8 + $anioadua9 + $anioadua10 + $anioadua11 + $anioadua12),2) ;
		   
		  }
	  }else{
		  $anioadua1= "0.00";
		   $anioadua2= "0.00";
		    $anioadua3= "0.00";
			 $anioadua4= "0.00";
			  $anioadua5= "0.00";
			  $anioadua6= "0.00";
		       $anioadua7= "0.00";
		  $anioadua8= "0.00";
	$anioadua9= "0.00";
	$anioadua10= "0.00";
	$anioadua11= "0.00";
	$anioadua12= "0.00";
	$var24="0.00";
	  }
				
/*contamnos cantidad de departamento*/
	   $query_depa = "SELECT 'cantdepa' as VALOR, 
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '1' THEN departamento.nombre ELSE 0 END )) AS mes1,
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '2' THEN departamento.nombre ELSE 0 END )) AS mes2,
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '3' THEN departamento.nombre ELSE 0 END )) AS mes3,
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '4' THEN departamento.nombre ELSE 0 END )) AS mes4,
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '5' THEN departamento.nombre ELSE 0 END )) AS mes5,
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '6' THEN departamento.nombre ELSE 0 END )) AS mes6,
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '7' THEN departamento.nombre ELSE 0 END )) AS mes7,
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '8' THEN departamento.nombre ELSE 0 END )) AS mes8,
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '9' THEN departamento.nombre ELSE 0 END )) AS mes9,
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '10' THEN departamento.nombre ELSE 0 END )) AS mes10,
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '11' THEN departamento.nombre ELSE 0 END )) AS mes11,
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '12' THEN departamento.nombre ELSE 0 END )) AS mes12 
FROM exportacion LEFT JOIN departamento ON  ((((SUBSTRING(exportacion.ubigeo,1,2))= departamento.iddepartamento))) WHERE extract(year from exportacion.fnum) = '$anio' $query1fil AND exportacion.part_nandi='$partida1' ";
		$resultado_depa=$conexpg->query($query_depa); 
if($resultado_depa->num_rows>0){ 
while($fila_depa=$resultado_depa->fetch_array()){
		  $aniodepa1= $fila_depa['mes1'];
	$aniodepa2= $fila_depa['mes2'];
	$aniodepa3= $fila_depa['mes3'];
	$aniodepa4= $fila_depa['mes4'];
	$aniodepa5= $fila_depa['mes5'];
	$aniodepa6= $fila_depa['mes6'];
	$aniodepa7= $fila_depa['mes7'];
	$aniodepa8= $fila_depa['mes8'];
	$aniodepa9= $fila_depa['mes9'];
	$aniodepa10= $fila_depa['mes10'];
	$aniodepa11= $fila_depa['mes11'];
	$aniodepa12= $fila_depa['mes12'];

			  $var26= number_format(($aniodepa1 + $aniodepa2 + $aniodepa3 + $aniodepa4 + $aniodepa5 + $aniodepa6 + $aniodepa7 + $aniodepa8 + $aniodepa9 + $aniodepa10 + $aniodepa11 + $aniodepa12),2) ;
		   
		  }
	  }else{
		  $aniodepa1= "0.00";
		   $aniodepa2= "0.00";
		    $aniodepa3= "0.00";
			 $aniodepa4= "0.00";
			  $aniodepa5= "0.00";
			  $aniodepa6= "0.00";
		       $aniodepa7= "0.00";
		  $aniodepa8= "0.00";
	$aniodepa9= "0.00";
	$aniodepa10= "0.00";
	$aniodepa11= "0.00";
	$aniodepa12= "0.00";
	  }
				
/*contamnos cantidad de agente*/
	   $query_agen = "SELECT 'cantagentes' as VALOR, 
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '1' THEN exportacion.cage ELSE 0 END )) AS mes1,
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '2' THEN exportacion.cage ELSE 0 END )) AS mes2,
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '3' THEN exportacion.cage ELSE 0 END )) AS mes3,
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '4' THEN exportacion.cage ELSE 0 END )) AS mes4,
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '5' THEN exportacion.cage ELSE 0 END )) AS mes5,
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '6' THEN exportacion.cage ELSE 0 END )) AS mes6,
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '7' THEN exportacion.cage ELSE 0 END )) AS mes7,
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '8' THEN exportacion.cage ELSE 0 END )) AS mes8,
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '9' THEN exportacion.cage ELSE 0 END )) AS mes9,
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '10' THEN exportacion.cage ELSE 0 END )) AS mes10,
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '11' THEN exportacion.cage ELSE 0 END )) AS mes11,
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '12' THEN exportacion.cage ELSE 0 END )) AS mes12 
FROM exportacion WHERE extract(year from exportacion.fnum) = '$anio' $query1fil AND exportacion.part_nandi='$partida1' ";
		$resultado_agen=$conexpg->query($query_agen); 
if($resultado_agen->num_rows>0){ 
while($fila_agen=$resultado_agen->fetch_array()){
		  $anioagen1 = $fila_agen['mes1'];
	$anioagen2 = $fila_agen['mes2'];
	$anioagen3 = $fila_agen['mes3'];
	$anioagen4 = $fila_agen['mes4'];
	$anioagen5 = $fila_agen['mes5'];
	$anioagen6 = $fila_agen['mes6'];
	$anioagen7 = $fila_agen['mes7'];
	$anioagen8 = $fila_agen['mes8'];
	$anioagen9 = $fila_agen['mes9'];
	$anioagen10 = $fila_agen['mes10'];
	$anioagen11 = $fila_agen['mes11'];
	$anioagen12 = $fila_agen['mes12'];
		  
			  
			  $var28= number_format(($anioagen1 + $anioagen2 + $anioagen3 + $anioagen4 + $anioagen5 + $anioagen6 + $anioagen7 + $anioagen8 + $anioagen9 + $anioagen10 + $anioagen11),2) ;
		  
		   
		  }
	  }else{
		  $anioagen1= "0.00";
		   $anioagen2= "0.00";
		    $anioagen3= "0.00";
			 $anioagen4= "0.00";
			  $anioagen5= "0.00";
			  $anioagen6= "0.00";
		       $anioagen7= "0.00";
		  $anioagen8= "0.00";
	$anioagen9= "0.00";
	$anioagen10= "0.00";
	$anioagen11= "0.00";
	$anioagen12= "0.00";
	$var28 = "0.00";
	  }
				
/*contamos cantidad via de transporte*/
	   $query_via = "SELECT 'cantrasnp' as VALOR, 
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '1' THEN exportacion.cviatra ELSE 0 END )) AS mes1,
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '2' THEN exportacion.cviatra ELSE 0 END )) AS mes2,
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '3' THEN exportacion.cviatra ELSE 0 END )) AS mes3,
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '4' THEN exportacion.cviatra ELSE 0 END )) AS mes4,
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '5' THEN exportacion.cviatra ELSE 0 END )) AS mes5,
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '6' THEN exportacion.cviatra ELSE 0 END )) AS mes6,
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '7' THEN exportacion.cviatra ELSE 0 END )) AS mes7,
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '8' THEN exportacion.cviatra ELSE 0 END )) AS mes8,
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '9' THEN exportacion.cviatra ELSE 0 END )) AS mes9,
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '10' THEN exportacion.cviatra ELSE 0 END )) AS mes10,
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '11' THEN exportacion.cviatra ELSE 0 END )) AS mes11,
count(DISTINCT(CASE extract(MONTH from exportacion.fnum) WHEN '12' THEN exportacion.cviatra ELSE 0 END )) AS mes12 
FROM exportacion WHERE extract(year from exportacion.fnum) = '$anio' $query1fil AND exportacion.part_nandi='$partida1' ";
		$resultado_via=$conexpg->query($query_via); 
if($resultado_via->num_rows>0){ 
while($fila_via=$resultado_via->fetch_array()){
		  $aniovia1 = $fila_via['mes1'];
	$aniovia2 = $fila_via['mes2'];
	$aniovia3 = $fila_via['mes3'];
	$aniovia4 = $fila_via['mes4'];
	$aniovia5 = $fila_via['mes5'];
	$aniovia6 = $fila_via['mes6'];
	$aniovia7 = $fila_via['mes7'];
	$aniovia8 = $fila_via['mes8'];
	$aniovia9 = $fila_via['mes9'];
	$aniovia10 = $fila_via['mes10'];
	$aniovia11 = $fila_via['mes11'];
	$aniovia12 = $fila_via['mes12'];

			  $var30= number_format(($aniovia1 + $aniovia2 + $aniovia3 + $aniovia4 + $aniovia5 + $aniovia6 + $aniovia7 + $aniovia8 + $aniovia9 + $aniovia10 + $aniovia11 + $aniovia12),2) ;
		  
		   
		  }
	  }else{
		  $aniovia1= "0.00";
		   $aniovia2= "0.00";
		    $aniovia3= "0.00";
			 $aniovia4= "0.00";
			  $aniovia5= "0.00";
			  $aniovia6= "0.00";
		       $aniovia7= "0.00";
		  $aniovia8= "0.00";
	$aniovia9= "0.00";
	$aniovia10= "0.00";
	$aniovia11= "0.00";
	$aniovia12= "0.00";
	$var30="0.00";
}

		
echo"<div class='col-md-12'>";

        echo"<div class='card'>";
	echo"<div class='card-header card-header-info card-header-icon'>
              <div class='card-icon'>
                <i class='material-icons'>assignment</i>
              </div>
              <h4 class='card-title'><b>Reporte Mensual de Indicadores - Exportaciones</b><br> Partida #: $partida1 │ Departamento: $namedepa1 │ Fecha Numeracion │ Periodo $anio </b> </h4>
            </div>";
		echo"<div class='card-body'>";
		//echo"<div class='toolbar'>";
		//echo"<a href='#cdro'><button class='btn btn-info btn-sm'> Ver Cuadro Estadístico </button></a>";
        //echo"</div>";
         echo"<div class='material-datatables'>";
		echo"<table id='datatablese' class='table table-striped table-no-bordered table-hover' cellspacing='0' width='100%' style='width:100%'>";
		echo"";
		  echo"<thead>
		  <tr class='visible-lg visible-md'><td>&nbsp;</td><td>&nbsp;</td>
		  <td><a href='../../producto/detalle/?anio=$anio&partida=$partida1&mes=1&ubi=&local=Todos' class='btn-link' target='_blank'>Ver detalle</a></td>
		  <td><a href='../../producto/detalle/?anio=$anio&partida=$partida1&mes=2&ubi=&local=Todos' class='btn-link' target='_blank'>Ver detalle</a></td>
		  <td><a href='../../producto/detalle/?anio=$anio&partida=$partida1&mes=3&ubi=&local=Todos' class='btn-link' target='_blank'>Ver detalle</a></td>
		  <td><a href='../../producto/detalle/?anio=$anio&partida=$partida1&mes=4&ubi=&local=Todos' class='btn-link' target='_blank'>Ver detalle</a></td>
		  <td><a href='../../producto/detalle/?anio=$anio&partida=$partida1&mes=5&ubi=&local=Todos' class='btn-link' target='_blank'>Ver detalle</a></td>
		  <td><a href='../../producto/detalle/?anio=$anio&partida=$partida1&mes=6&ubi=&local=Todos' class='btn-link' target='_blank'>Ver detalle</a></td>
		  <td><a href='../../producto/detalle/?anio=$anio&partida=$partida1&mes=7&ubi=&local=Todos' class='btn-link' target='_blank'>Ver detalle</a></td>
		  <td><a href='../../producto/detalle/?anio=$anio&partida=$partida1&mes=8&ubi=&local=Todos' class='btn-link' target='_blank'>Ver detalle</a></td>
		  <td><a href='../../producto/detalle/?anio=$anio&partida=$partida1&mes=9&ubi=&local=Todos' class='btn-link' target='_blank'>Ver detalle</a></td>
		  <td><a href='../../producto/detalle/?anio=$anio&partida=$partida1&mes=10&ubi=&local=Todos' class='btn-link' target='_blank'>Ver detalle</a></td>
		  <td><a href='../../producto/detalle/?anio=$anio&partida=$partida1&mes=11&ubi=&local=Todos' class='btn-link' target='_blank'>Ver detalle</a></td>
		  <td><a href='../../producto/detalle/?anio=$anio&partida=$partida1&mes=12&ubi=&local=Todos' class='btn-link' target='_blank'>Ver detalle</a></td><td>&nbsp;</td></tr>
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
							  <th>Total</th>
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
							  <th>Total</th>
                          </tr>
                      </tfoot>";
           echo"<tbody>";
		//++++++++++++++++++++++
		
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
echo "<td>".number_format($vfobmes11,2)."</td>";
echo "<td>".number_format($vfobmes12,2)."</td>";
echo "<td>$sumtota</td>";
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
echo "<td>".number_format($vpesmes11,2)."</td>";
echo "<td>".number_format($vpesmes12,2)."</td>";
echo "<td>$var4</td>";
echo "</tr>";
echo "<tr>";
					echo "<td>3</td>";
echo "<td>Precio FOB USD x KG</td>";
echo "<td>".number_format($vpreusd_2012,2)."</td>";
echo "<td>".number_format($vpreusd_2013,2)."</td>";
echo "<td>".number_format($vpreusd_2014,2)."</td>";
echo "<td>".number_format($vpreusd_2015,2)."</td>";
echo "<td>".number_format($vpreusd_2016,2)."</td>";
echo "<td>".number_format($vpreusd_2017,2)."</td>";
echo "<td>".number_format($vpreusd_2018,2)."</td>";
echo "<td>".number_format($vpreusd_2019,2)."</td>";
echo "<td>".number_format($vpreusd_2020,2)."</td>";
echo "<td>".number_format($vpreusd_2021,2)."</td>";
echo "<td>".number_format($vpreusdmes11,2)."</td>";
echo "<td>".number_format($vpreusdmes12,2)."</td>";
echo "<td>$var4precio</td>";
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
echo "<td>".number_format($vbrumes11,2)."</td>";
echo "<td>".number_format($vbrumes12,2)."</td>";
echo "<td>$var8</td>";
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
echo "<td>".number_format($qunifismes11,2)."</td>";
echo "<td>".number_format($qunifismes12,2)."</td>";
echo "<td>$var10</td>";
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
echo "<td>".number_format($qunicommes11,2)."</td>";
echo "<td>".number_format($qunicommes12,2)."</td>";
echo "<td>$var12</td>";
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
echo "<td>$cregmes11</td>";
echo "<td>$cregmes12</td>";
echo "<td>$var14</td>";
echo "</tr>";
echo "<tr>";
					echo "<td>8</td>";
echo "<td>Cantidad de Duas</td>";
echo "<td>$aniodua1</td>";
echo "<td>$aniodua2</td>";
echo "<td>$aniodua3</td>";
echo "<td>$aniodua4</td>";
echo "<td>$aniodua5</td>";
echo "<td>$aniodua6</td>";
echo "<td>$aniodua7</td>";
echo "<td>$aniodua8</td>";
echo "<td>$aniodua9</td>";
echo "<td>$aniodua10</td>";
echo "<td>$aniodua11</td>";
echo "<td>$aniodua12</td>";
echo "<td>$var16</td>";
echo "</tr>";
echo "<tr>";
					echo "<td>9</td>";
echo "<td>Cantidad de Empresas</td>";
echo "<td>$anioemp1</td>";
echo "<td>$anioemp2}</td>";
echo "<td>$anioemp3</td>";
echo "<td>$anioemp4</td>";
echo "<td>$anioemp5</td>";
echo "<td>$anioemp6</td>";
echo "<td>$anioemp7</td>";
echo "<td>$anioemp8</td>";
echo "<td>$anioemp9</td>";
echo "<td>$anioemp10</td>";
echo "<td>$anioemp11</td>";
echo "<td>$anioemp12</td>";
echo "<td>$var18</td>";
echo "</tr>";
echo "<tr>";
					echo "<td>10</td>";
echo "<td>Cantidad de Mercados</td>";
echo "<td>$aniomerca1</td>";
echo "<td>$aniomerca2</td>";
echo "<td>$aniomerca3</td>";
echo "<td>$aniomerca4</td>";
echo "<td>$aniomerca5</td>";
echo "<td>$aniomerca6</td>";
echo "<td>$aniomerca7</td>";
echo "<td>$aniomerca8</td>";
echo "<td>$aniomerca9</td>";
echo "<td>$aniomerca10</td>";
echo "<td>$aniomerca11</td>";
echo "<td>$aniomerca12</td>";
echo "<td>$var20</td>";
echo "</tr>";
echo "<tr>";
					echo "<td>11</td>";
echo "<td>Cantidad de Puertos</td>";
echo "<td>$aniopue1</td>";
echo "<td>$aniopue2</td>";
echo "<td>$aniopue3</td>";
echo "<td>$aniopue4</td>";
echo "<td>$aniopue5</td>";
echo "<td>$aniopue6</td>";
echo "<td>$aniopue7</td>";
echo "<td>$aniopue8</td>";
echo "<td>$aniopue9</td>";
echo "<td>$aniopue10</td>";
echo "<td>$aniopue11</td>";
echo "<td>$aniopue12</td>";
echo "<td>$var22</td>";
echo "</tr>";
echo "<tr>";
					echo "<td>12</td>";
echo "<td>Cantidad de Aduanas</td>";
echo "<td>$anioadua1</td>";
echo "<td>$anioadua2</td>";
echo "<td>$anioadua3</td>";
echo "<td>$anioadua4</td>";
echo "<td>$anioadua5</td>";
echo "<td>$anioadua6</td>";
echo "<td>$anioadua7</td>";
echo "<td>$anioadua8</td>";
echo "<td>$anioadua9</td>";
echo "<td>$anioadua10</td>";
echo "<td>$anioadua11</td>";
echo "<td>$anioadua12</td>";
echo "<td>$var24</td>";
echo "</tr>";
echo "<tr>";
					echo "<td>13</td>";
echo "<td>Cantidad de Departamentos</td>";
echo "<td>$aniodepa1</td>";
echo "<td>$aniodepa2</td>";
echo "<td>$aniodepa3</td>";
echo "<td>$aniodepa4</td>";
echo "<td>$aniodepa5</td>";
echo "<td>$aniodepa6</td>";
echo "<td>$aniodepa7</td>";
echo "<td>$aniodepa8</td>";
echo "<td>$aniodepa9</td>";
echo "<td>$aniodepa10</td>";
echo "<td>$aniodepa11</td>";
echo "<td>$aniodepa12</td>";
echo "<td>$var26</td>";
echo "</tr>";
echo "<tr>";
					echo "<td>14</td>";
echo "<td>Cantidad de Agentes</td>";
echo "<td>$anioagen1</td>";
echo "<td>$anioagen2</td>";
echo "<td>$anioagen3</td>";
echo "<td>$anioagen4</td>";
echo "<td>$anioagen5</td>";
echo "<td>$anioagen6</td>";
echo "<td>$anioagen7</td>";
echo "<td>$anioagen8</td>";
echo "<td>$anioagen9</td>";
echo "<td>$anioagen10</td>";
echo "<td>$anioagen11</td>";
echo "<td>$anioagen12</td>";
echo "<td>$var28</td>";
echo "</tr>";
echo "<tr>";
					echo "<td>15</td>";
echo "<td>Cantidad de Vias de Transporte</td>";
echo "<td>$aniovia1</td>";
echo "<td>$aniovia2</td>";
echo "<td>$aniovia3</td>";
echo "<td>$aniovia4</td>";
echo "<td>$aniovia5</td>";
echo "<td>$aniovia6</td>";
echo "<td>$aniovia7</td>";
echo "<td>$aniovia8</td>";
echo "<td>$aniovia9</td>";
echo "<td>$aniovia10</td>";
echo "<td>$aniovia11</td>";
echo "<td>$aniovia12</td>";
echo "<td>$var30</td>";
echo "</tr>";
?>
      
			<?php
		echo"</tbody>";
		echo"</table>";
		echo"</div>";
		echo"</div>";
		echo"</div>";
		echo"</div>";
				//++++++++++++++++++++++
		//cerrando conexion
	        //pg_close($conexpg);
		
	}else{//fin si ambos tienen datos realiza la consulta, si no tiene datos de busqueda muestra mensaje
		echo"<div class='alert alert-warning alert-with-icon' data-notify='container'>
                    <i class='material-icons' data-notify='icon'>notifications</i>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <i class='material-icons'>close</i>
                    </button>
                    <span data-notify='message'>Campo Vacio. Para realizar una busqueda de una partida ingrese un numero de partida.</span>
                </div>";
		}
	

?>

    <div class="col-md-12 ml-auto mr-auto" id="mer">

          <br>
          <?php include("../../footer_pie.php"); ?>
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