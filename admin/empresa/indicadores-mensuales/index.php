<?php
session_start();
if (isset($_SESSION['login_usuario'])){//si es logeado
	if($_SESSION['rol']=='ADMIN'){//si es admin no hace nada
		
	}else{//si es usuario
		if($_SESSION['acceso_pago']=='NO'){
			//print "<script>alert('Acceso Denegado! - Para tener acceso adquiere uno de nuestros planes');window.location='../../planes/';</script>";
		}
		
	}
}else{//si no esta logeado
	if(!isset($_SESSION["login_usuario"]) || $_SESSION["login_usuario"]==null){
	//print "<script>alert('Acceso invalido! - Inicia Sesion para Acceder');window.location='$enlace_actual';</script>";
	print "<script>window.location='../../';</script>";
		exit();
}
}
date_default_timezone_set("America/Lima");
$fechahoy = date("Y-m-d");

set_time_limit(500);
$paisname = $_POST["namempB"];
$paiscode = $_POST["codempB"];
$anio = $_POST["years"];

$namedepa1 = $_POST["namedepa"];
$ubicod1 = $_POST["codubi"];
if($ubicod1!=""){
	$flatcod = $ubicod1;
	//$querytu = "AND SUBSTRING(exportacion.ubigeo,1,2) like '%$flatcod'";
	$querytu = "AND SUBSTRING(exportacion.ubigeo,1,2) = '$flatcod'";
}else{
	$flatcod = "";
	$querytu = "";
}

$condi = $_SESSION['acceso_pago'];
if($condi=='SI' or $condi=='NO' and $_SESSION['rol']=='ADMIN'){//tiene o no pago y es admin visualiza
	$axe = "SI";
}else if($condi=='NO' and $_SESSION['rol']<>'ADMIN'){//no tiene pago y no es admin limita 5 registros
	$axe = "NO";
}else if($condi=='SI' and $_SESSION['rol']<>'ADMIN'){//si tiene pago y no es admin visualiza todo
	$axe = "SI";
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
   
    <!--<div class="wrapper wrapper-full-page">-->
          <div class="wrapper">
           <div class="content">
                      <div class="container-fluid">
                            <div class="row"> 
                            
            <div class='col-md-12'>
          
          <?php if($axe=='NO'){ ?>
          <div class="alert alert-warning alert-with-icon" data-notify="container">
            <i class="material-icons" data-notify="icon">notifications</i>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <i class="material-icons">info</i>
            </button>
            <span data-notify="message"><h3>Versión GRATUITA!. Limitada en solo los 5 primeros registros, si quieres ver toda la información consultada adquiere uno de nuestros <a href="../../planes/" target="_blank">PLANES AQUI</a></h3></span>
          </div>
           <?php } ?>
           
            <?php
				include("../../incBD/inibd.php");

/*sumamos valorfob*/
		   $query_vfob = "SELECT 'vfobserdol' as VALOR, 
		   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '01' THEN exportacion.vfobserdol ELSE 0 END) AS enero, 
		   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '02' THEN exportacion.vfobserdol ELSE 0 END) AS febrero, 
		   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '03' THEN exportacion.vfobserdol ELSE 0 END) AS marzo, 
		   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '04' THEN exportacion.vfobserdol ELSE 0 END) AS abril, 
		   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '05' THEN exportacion.vfobserdol ELSE 0 END) AS mayo,
		    SUM(CASE extract(MONTH from exportacion.fnum) WHEN '06' THEN exportacion.vfobserdol ELSE 0 END) AS junio,
			SUM(CASE extract(MONTH from exportacion.fnum) WHEN '07' THEN exportacion.vfobserdol ELSE 0 END) AS julio,
			SUM(CASE extract(MONTH from exportacion.fnum) WHEN '08' THEN exportacion.vfobserdol ELSE 0 END) AS agosto,
			SUM(CASE extract(MONTH from exportacion.fnum) WHEN '09' THEN exportacion.vfobserdol ELSE 0 END) AS septiembre,
			SUM(CASE extract(MONTH from exportacion.fnum) WHEN '10' THEN exportacion.vfobserdol ELSE 0 END) AS octubre,
			SUM(CASE extract(MONTH from exportacion.fnum) WHEN '11' THEN exportacion.vfobserdol ELSE 0 END) AS noviembre,
			SUM(CASE extract(MONTH from exportacion.fnum) WHEN '12' THEN exportacion.vfobserdol ELSE 0 END) AS diciembre
		   FROM exportacion WHERE extract(year from exportacion.fnum)= '$anio' $querytu AND exportacion.ndoc='$paiscode'";
				$resultado_vfob=$conexpg->query($query_vfob); 
if($resultado_vfob->num_rows>0){ 
while($fila_vfob=$resultado_vfob->fetch_array()){
		  $vfob_01= $fila_vfob['enero'];
		  $vfob_02=  $fila_vfob['febrero'];
		  $vfob_03=  $fila_vfob['marzo'];
		  $vfob_04=  $fila_vfob['abril'];
		  $vfob_05=  $fila_vfob['mayo'];
		  $vfob_06=  $fila_vfob['junio'];
		  $vfob_07=  $fila_vfob['julio'];
		  $vfob_08=  $fila_vfob['agosto'];
		  $vfob_09=  $fila_vfob['septiembre'];
		  $vfob_10=  $fila_vfob['octubre'];
		  $vfob_11=  $fila_vfob['noviembre'];
		  $vfob_12=  $fila_vfob['diciembre'];
			  
			   $totafob = $vfob_01 + $vfob_02 + $vfob_03 + $vfob_04 + $vfob_05 + $vfob_06 + $vfob_07 + $vfob_08 + $vfob_09 + $vfob_10 + $vfob_11 + $vfob_12;
		  }
	  }else{
		  $vfob_01= "0.00";
		  $vfob_02= "0.00";
		  $vfob_03= "0.00";
		  $vfob_04= "0.00";
		  $vfob_05= "0.00";
		  $vfob_06= "0.00";
		  $vfob_07= "0.00";
		  $vfob_08= "0.00";
		  $vfob_09= "0.00";
		  $vfob_10= "0.00";
		  $vfob_11= "0.00";
		  $vfob_12= "0.00";
		  $totafob = "0.00";
	  }
	  
	  /* sumamos vpesnet*/
	   $query_vpes = "SELECT 'vpesnet' as VALOR,
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '01' THEN exportacion.vpesnet ELSE 0 END) AS enero,
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '02' THEN exportacion.vpesnet ELSE 0 END) AS febrero, 
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '03' THEN exportacion.vpesnet ELSE 0 END) AS marzo,
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '04' THEN exportacion.vpesnet ELSE 0 END) AS abril,
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '05' THEN exportacion.vpesnet ELSE 0 END) AS mayo, 
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '06' THEN exportacion.vpesnet ELSE 0 END) AS junio, 
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '07' THEN exportacion.vpesnet ELSE 0 END) AS julio, 
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '08' THEN exportacion.vpesnet ELSE 0 END) AS agosto, 
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '09' THEN exportacion.vpesnet ELSE 0 END) AS septiembre, 
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '10' THEN exportacion.vpesnet ELSE 0 END) AS octubre, 
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '11' THEN exportacion.vpesnet ELSE 0 END) AS noviembre, 
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '12' THEN exportacion.vpesnet ELSE 0 END) AS diciembre
FROM exportacion where extract(year from exportacion.fnum)= '$anio' $querytu AND exportacion.ndoc='$paiscode' ";
				$resultado_vpes=$conexpg->query($query_vpes); 
if($resultado_vpes->num_rows>0){ 
while($fila_vpes=$resultado_vpes->fetch_array()){
		  $vpes_01 = $fila_vpes['enero'];
		  $vpes_02 = $fila_vpes['febrero'];
		  $vpes_03 = $fila_vpes['marzo'];
		  $vpes_04 = $fila_vpes['abril'];
		  $vpes_05 = $fila_vpes['mayo'];
		  $vpes_06 = $fila_vpes['junio'];
		  $vpes_07 = $fila_vpes['julio'];
		  $vpes_08 = $fila_vpes['agosto'];
		  $vpes_09 = $fila_vpes['septiembre'];
		  $vpes_10 = $fila_vpes['octubre'];
		  $vpes_11 = $fila_vpes['noviembre'];
		  $vpes_12 = $fila_vpes['diciembre'];
		  $totalvpes = $vpes_01 + $vpes_02 + $vpes_03 + $vpes_04 + $vpes_05 + $vpes_06 + $vpes_07 + $vpes_08 + $vpes_09 + $vpes_10 + $vpes_11 + $vpes_12;
		  
		  }
	  }else{
		  $vpes_01= "0.00";
		  $vpes_02= "0.00";
		  $vpes_03= "0.00";
		  $vpes_04= "0.00";
		  $vpes_05= "0.00";
		  $vpes_06= "0.00";
		  $vpes_07= "0.00";
		  $vpes_08= "0.00";
		  $vpes_09= "0.00";
		  $vpes_10= "0.00";
		  $vpes_11= "0.00";
		  $vpes_12= "0.00";
		  $totalvpes = "0.00";

	  }
		
		/*diferencia Precio FOB USD x KG*/
		if( $vpes_01=='0' or  $vpes_01=='0.00' or $vpes_01 == null){
		$preciofob01 ='0.00';
		}else{
		$preciofob01 = $vfob_01 / $vpes_01;
		}
		
		if( $vpes_02=='0' or  $vpes_02=='0.00' or $vpes_02 == null){
		$preciofob02 ='0.00';
		}else{
		$preciofob02 = $vfob_02 / $vpes_02;
		}
		
		if( $vpes_03=='0' or  $vpes_03=='0.00' or $vpes_03 == null){
		$preciofob03 ='0.00';
		}else{
		$preciofob03 = $vfob_03 / $vpes_03;
		}
		
		if( $vpes_04=='0' or  $vpes_04=='0.00' or $vpes_04 == null){
		$preciofob04 ='0.00';
		}else{
		$preciofob04 = $vfob_04 / $vpes_04;
		}
		
		if( $vpes_05=='0' or  $vpes_05=='0.00' or $vpes_05 == null){
		$preciofob05 ='0.00';
		}else{
		$preciofob05 = $vfob_05 / $vpes_05;
		}
		
		if( $vpes_06=='0' or  $vpes_06=='0.00' or $vpes_06 == null){
		$preciofob06 ='0.00';
		}else{
		$preciofob06 = $vfob_06 / $vpes_06;
		}
		
		if( $vpes_07=='0' or  $vpes_07=='0.00' or $vpes_07 == null){
		$preciofob07 ='0.00';
		}else{
		$preciofob07 = $vfob_07 / $vpes_07;
		}
		
		if( $vpes_08=='0' or  $vpes_08=='0.00' or $vpes_08 == null){
		$preciofob08 ='0.00';
		}else{
		$preciofob08 = $vfob_08 / $vpes_08;
		}
		
		if( $vpes_09=='0' or  $vpes_09=='0.00' or $vpes_09 == null){
		$preciofob09 ='0.00';
		}else{
		$preciofob09 = $vfob_09 / $vpes_09;
		}
		
		if( $vpes_10=='0' or  $vpes_10=='0.00' or $vpes_10 == null){
		$preciofob10 ='0.00';
		}else{
		$preciofob10 = $vfob_10 / $vpes_10;
		}
		
		if( $vpes_11=='0' or  $vpes_11=='0.00' or $vpes_11 == null){
		$preciofob11 ='0.00';
		}else{
		$preciofob11 = $vfob_11 / $vpes_11;
		}
		
		if( $vpes_12=='0' or  $vpes_12=='0.00' or $vpes_12 == null){
		$preciofob12 ='0.00';
		}else{
		$preciofob12 = $vfob_12 / $vpes_12;
		}
		
		$promediotota = $totafob / $totalvpes;
				
		 /*suma precio bruto*/
		  $query_vbru = "SELECT 'preciobruto' as VALOR, 
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '01' THEN exportacion.vpesbru ELSE 0 END) AS enero,
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '02' THEN exportacion.vpesbru ELSE 0 END) AS febrero, 
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '03' THEN exportacion.vpesbru ELSE 0 END) AS marzo, 
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '04' THEN exportacion.vpesbru ELSE 0 END) AS abril, 
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '05' THEN exportacion.vpesbru ELSE 0 END) AS mayo, 
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '06' THEN exportacion.vpesbru ELSE 0 END) AS junio, 
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '07' THEN exportacion.vpesbru ELSE 0 END) AS julio, 
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '08' THEN exportacion.vpesbru ELSE 0 END) AS agosto, 
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '09' THEN exportacion.vpesbru ELSE 0 END) AS septiembre, 
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '10' THEN exportacion.vpesbru ELSE 0 END) AS octubre, 
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '11' THEN exportacion.vpesbru ELSE 0 END) AS noviembre, 
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '12' THEN exportacion.vpesbru ELSE 0 END) AS diciembre FROM exportacion where extract(year from exportacion.fnum)= '$anio' $querytu AND exportacion.ndoc='$paiscode' ";
				$resultado_vbru=$conexpg->query($query_vbru); 
if($resultado_vbru->num_rows>0){ 
while($fila_vbru=$resultado_vbru->fetch_array()){
		  $vbru_01= $fila_vbru['enero'];
		  $vbru_02= $fila_vbru['febrero'];
		  $vbru_03= $fila_vbru['marzo'];
		  $vbru_04= $fila_vbru['abril'];
		  $vbru_05= $fila_vbru['mayo'];
		  $vbru_06= $fila_vbru['junio'];
		  $vbru_07= $fila_vbru['julio'];
		  $vbru_08= $fila_vbru['agosto'];
		  $vbru_09= $fila_vbru['septiembre'];
		  $vbru_10= $fila_vbru['octubre'];
		  $vbru_11= $fila_vbru['noviembre'];
		  $vbru_12= $fila_vbru['diciembre'];
		  $totapesob = $vbru_01 + $vbru_02 + $vbru_03 + $vbru_04 + $vbru_05 + $vbru_06 + $vbru_07 + $vbru_08 + $vbru_09 + $vbru_10 + $vbru_11 + $vbru_12;
		  
		  }
	  }else{
		  $vbru_01= "0.00";
		  $vbru_02= "0.00";
		  $vbru_03= "0.00";
		  $vbru_04= "0.00";
		  $vbru_05= "0.00";
		  $vbru_06= "0.00";
		  $vbru_07= "0.00";
		  $vbru_08= "0.00";
		  $vbru_09= "0.00";
		  $vbru_10= "0.00";
		  $vbru_11= "0.00";
		  $vbru_12= "0.00";
		  $totapesob = "0.00";
	  }
	  
	  /*sumamos cantidad exportada*/
	  
	  $query_qunifis = "SELECT 'preciobruto' as VALOR, 
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '01' THEN exportacion.qunifis ELSE 0 END) AS enero, 
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '02' THEN exportacion.qunifis ELSE 0 END) AS febrero, 
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '03' THEN exportacion.qunifis ELSE 0 END) AS marzo, 
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '04' THEN exportacion.qunifis ELSE 0 END) AS abril,
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '05' THEN exportacion.qunifis ELSE 0 END) AS mayo,
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '06' THEN exportacion.qunifis ELSE 0 END) AS junio,
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '07' THEN exportacion.qunifis ELSE 0 END) AS julio,
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '08' THEN exportacion.qunifis ELSE 0 END) AS agosto,
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '09' THEN exportacion.qunifis ELSE 0 END) AS septiembre,
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '10' THEN exportacion.qunifis ELSE 0 END) AS octubre,
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '11' THEN exportacion.qunifis ELSE 0 END) AS noviembre, 
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '12' THEN exportacion.qunifis ELSE 0 END) AS diciembre
	  FROM exportacion where extract(year from exportacion.fnum)= '$anio' $querytu AND exportacion.ndoc='$paiscode' ";
				$resultado_qunifis=$conexpg->query($query_qunifis); 
if($resultado_qunifis->num_rows>0){ 
while($fila_qunifis=$resultado_qunifis->fetch_array()){
		$qunifis_01= $fila_qunifis['enero'];
		$qunifis_02= $fila_qunifis['febrero'];
		$qunifis_03= $fila_qunifis['marzo'];
		$qunifis_04= $fila_qunifis['abril'];
		$qunifis_05= $fila_qunifis['mayo'];
		$qunifis_06= $fila_qunifis['junio'];
		$qunifis_07= $fila_qunifis['julio'];
		$qunifis_08= $fila_qunifis['agosto'];
		$qunifis_09= $fila_qunifis['septiembre'];
		$qunifis_10= $fila_qunifis['octubre'];
		$qunifis_11= $fila_qunifis['noviembre'];
		$qunifis_12= $fila_qunifis['diciembre'];
		$totaqunifis = $qunifis_01 + $qunifis_02 + $qunifis_03 + $qunifis_04 + $qunifis_05 + $qunifis_06 + $qunifis_07 + $qunifis_08 + $qunifis_09 + $qunifis_10 + $qunifis_11 + $qunifis_12;
		  
		  }
	  }else{
		  $qunifis_01= "0.00";
		  $qunifis_02= "0.00";
		  $qunifis_03= "0.00";
	      $qunifis_04= "0.00";
		  $qunifis_05= "0.00";
		  $qunifis_06= "0.00";
		  $qunifis_07= "0.00";
		  $qunifis_08= "0.00";
		  $qunifis_09= "0.00";
		  $qunifis_10= "0.00";
		  $qunifis_11= "0.00";
		  $qunifis_12= "0.00";
		  $totaqunifis = "0.00";
	  }
	  
	  
	  /*sumamos unidades comerciales*/
	  $query_qunicom = "SELECT 'preciobruto' as VALOR, 
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '01' THEN exportacion.qunicom ELSE 0 END) AS enero, 
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '02' THEN exportacion.qunicom ELSE 0 END) AS febrero, 
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '03' THEN exportacion.qunicom ELSE 0 END) AS marzo,
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '04' THEN exportacion.qunicom ELSE 0 END) AS abril,
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '05' THEN exportacion.qunicom ELSE 0 END) AS mayo,
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '06' THEN exportacion.qunicom ELSE 0 END) AS junio,
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '07' THEN exportacion.qunicom ELSE 0 END) AS julio,
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '08' THEN exportacion.qunicom ELSE 0 END) AS agosto,
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '09' THEN exportacion.qunicom ELSE 0 END) AS septiembre,
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '10' THEN exportacion.qunicom ELSE 0 END) AS octubre,
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '11' THEN exportacion.qunicom ELSE 0 END) AS noviembre, 
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '12' THEN exportacion.qunicom ELSE 0 END) AS diciembre
	   FROM exportacion where extract(year from exportacion.fnum)= '$anio' $querytu AND exportacion.ndoc='$paiscode' ";
				$resultado_qunicom=$conexpg->query($query_qunicom); 
if($resultado_qunicom->num_rows>0){ 
while($fila_qunicom=$resultado_qunicom->fetch_array()){
		  $qunicom_01= $fila_qunicom['enero'];
		  $qunicom_02= $fila_qunicom['febrero'];
		  $qunicom_03= $fila_qunicom['marzo'];
		  $qunicom_04= $fila_qunicom['abril'];
		  $qunicom_05= $fila_qunicom['mayo'];
		  $qunicom_06= $fila_qunicom['junio'];
		  $qunicom_07= $fila_qunicom['julio'];
		  $qunicom_08= $fila_qunicom['agosto'];
		  $qunicom_09= $fila_qunicom['septiembre'];
		  $qunicom_10= $fila_qunicom['octubre'];
		  $qunicom_11= $fila_qunicom['noviembre'];
		  $qunicom_12= $fila_qunicom['diciembre'];
		  $totaqunicom = $qunicom_01 + $qunicom_02 + $qunicom_03 + $qunicom_04 + $qunicom_05 + $qunicom_06 + $qunicom_07 + $qunicom_08 + $qunicom_09 + $qunicom_10 + $qunicom_11 + $qunicom_12;
		  }
	  }else{
		  $qunicom_01= "0.00";
		  $qunicom_02= "0.00";
		  $qunicom_03= "0.00";
		  $qunicom_04= "0.00";
		  $qunicom_05= "0.00";
		  $qunicom_06= "0.00";
		  $qunicom_07= "0.00";
		  $qunicom_08= "0.00";
		  $qunicom_09= "0.00";
		  $qunicom_10= "0.00";
		  $qunicom_11= "0.00";
		  $qunicom_12= "0.00";
		  $totaqunicom = "0.00";
	  }
	  
	  /*cuenta cantidad de partidas*/
	  $query_parti = "SELECT Count(DISTINCT exportacion.part_nandi) as cant_parti, extract(MONTH from exportacion.fnum) as mes FROM exportacion WHERE extract(year from exportacion.fnum)= '$anio' $querytu AND exportacion.ndoc='$paiscode' GROUP BY mes order BY mes ASC";
				$resultado_parti=$conexpg->query($query_parti); 
if($resultado_parti->num_rows>0){ 
while($fila_parti=$resultado_parti->fetch_array()){
		  $anioparti= $fila_parti['mes'];
		  
		  if($anioparti=='01'){
			  $rparti01=$fila_parti['cant_parti'];
		  }/*else{
			  $rparti01='0.00';
		  }*/
		  if($anioparti=='02'){
			  $rparti02=$fila_parti['cant_parti'];
		  }/*else{
			  $rparti02='0.00';
		  }*/
		  if($anioparti=='03'){
			  $rparti03=$fila_parti['cant_parti'];
		  }/*else{
			  $rparti03='0.00';
		  }*/
		  if($anioparti=='04'){
			  $rparti04=$fila_parti['cant_parti'];
		  }/*else{
			  $rparti04='0.00';
		  }*/
		  if($anioparti=='05'){
			  $rparti05=$fila_parti['cant_parti'];
		  }/*else{
			  $rparti05='0.00';
		  }*/
		  if($anioparti=='06'){
			  $rparti06=$fila_parti['cant_parti'];
		  }
		  if($anioparti=='07'){
			  $rparti07=$fila_parti['cant_parti'];
		  }/*else{
			  $rparti07='0.00';
		  }*/
		  if($anioparti=='08'){
			  $rparti08=$fila_parti['cant_parti'];
		  }/*else{
			  $rparti08='0.00';
		  }*/
		  if($anioparti=='09'){
			  $rparti09=$fila_parti['cant_parti'];
		  }/*else{
			  $rparti09='0.00';
		  }*/
		  if($anioparti=='10'){
			  $rparti10=$fila_parti['cant_parti'];
		  }/*else{
			  $rparti10='0.00';
		  }*/
		  if($anioparti=='11'){
			  $rparti11=$fila_parti['cant_parti'];
		  }/*else{
			  $rparti11='0.00';
		  }*/
		  if($anioparti=='12'){
			  $rparti12=$fila_parti['cant_parti'];
		  }/*else{
			  $rparti12='0.00';
		  }*/

		  }
	  }else{
		  $rparti01= "0.00";
		  $rparti02= "0.00";
		  $rparti03= "0.00";
		  $rparti04= "0.00";
		  $rparti05= "0.00";
		  $rparti06= "0.00";
		  $rparti07= "0.00";
		  $rparti08= "0.00";
		  $rparti09= "0.00";
		  $rparti10= "0.00";
		  $rparti11= "0.00";
		  $rparti12= "0.00"; 
	  }
	  
	  /*total general de partidas*/
	  $generalA = "SELECT Count(DISTINCT exportacion.part_nandi) as cant_parti FROM exportacion WHERE extract(year from exportacion.fnum)= '$anio' $querytu AND exportacion.ndoc='$paiscode' ";
				$res_generaA=$conexpg->query($generalA); 
if($res_generaA->num_rows>0){ 
while($fila_generaA=$res_generaA->fetch_array()){
			  $totapartida = $fila_generaA['cant_parti'];
		  }
	  }else{
		  $totapartida = "0.00";
	  }
	  
	  /*cuenta cantidad de registros*/
	  $query_creg = "SELECT 'cantidadreg' as VALOR, 
	  SUM(CASE extract(MONTH from exportacion.fnum) WHEN '01' THEN 1 ELSE 0 END) AS enero, 
	  SUM(CASE extract(MONTH from exportacion.fnum) WHEN '02' THEN 1 ELSE 0 END) AS febrero, 
	  SUM(CASE extract(MONTH from exportacion.fnum) WHEN '03' THEN 1 ELSE 0 END) AS marzo, 
	  SUM(CASE extract(MONTH from exportacion.fnum) WHEN '04' THEN 1 ELSE 0 END) AS abril,
	  SUM(CASE extract(MONTH from exportacion.fnum) WHEN '05' THEN 1 ELSE 0 END) AS mayo,
	  SUM(CASE extract(MONTH from exportacion.fnum) WHEN '06' THEN 1 ELSE 0 END) AS junio,
	  SUM(CASE extract(MONTH from exportacion.fnum) WHEN '07' THEN 1 ELSE 0 END) AS julio,
	  SUM(CASE extract(MONTH from exportacion.fnum) WHEN '08' THEN 1 ELSE 0 END) AS agosto,
	  SUM(CASE extract(MONTH from exportacion.fnum) WHEN '09' THEN 1 ELSE 0 END) AS septiembre,
	  SUM(CASE extract(MONTH from exportacion.fnum) WHEN '10' THEN 1 ELSE 0 END) AS octubre,
	  SUM(CASE extract(MONTH from exportacion.fnum) WHEN '11' THEN 1 ELSE 0 END) AS noviembre, 
	  SUM(CASE extract(MONTH from exportacion.fnum) WHEN '12' THEN 1 ELSE 0 END) AS diciembre
	   FROM exportacion where extract(year from exportacion.fnum)= '$anio' $querytu AND exportacion.ndoc= '$paiscode' ";
				$resultado_creg=$conexpg->query($query_creg); 
if($resultado_creg->num_rows>0){ 
while($fila_creg=$resultado_creg->fetch_array()){
		  $creg_01= $fila_creg['enero'];
		  $creg_02= $fila_creg['febrero'];
		  $creg_03= $fila_creg['marzo'];
		  $creg_04= $fila_creg['abril'];
		  $creg_05= $fila_creg['mayo'];
		  $creg_06= $fila_creg['junio'];
		  $creg_07= $fila_creg['julio'];
		  $creg_08= $fila_creg['agosto'];
		  $creg_09= $fila_creg['septiembre'];
		  $creg_10= $fila_creg['octubre'];
		  $creg_11= $fila_creg['noviembre'];
		  $creg_12= $fila_creg['diciembre'];
		  
		  if($creg_03=="0"){
			   $creg_03="0.00";
		  }
		  if($creg_04=="0"){
			   $creg_04="0.00";
		  }
		  if($creg_05=="0"){
			   $creg_05="0.00";
		  }
		  if($creg_06=="0"){
			   $creg_06="0.00";
		  }
		  if($creg_07=="0"){
			   $creg_07="0.00";
		  }
		  if($creg_08=="0"){
			   $creg_08="0.00";
		  }
		  if($creg_09=="0"){
			   $creg_09="0.00";
		  }
		  if($creg_10=="0"){
			   $creg_10="0.00";
		  }
		  if($creg_11=="0"){
			   $creg_11="0.00";
		  }
		  if($creg_12=="0"){
			   $creg_12="0.00";
		  }
		
		$totaregistro = $creg_01 + $creg_02 + $creg_03 + $creg_04 + $creg_05 + $creg_06 + $creg_07 + $creg_08 + $creg_09 + $creg_10 + $creg_11 + $creg_12;
		  }
	  }else{
		  $creg_01= "0.00";
		  $creg_02= "0.00";
		  $creg_03= "0.00";
		  $creg_04= "0.00";
		  $creg_05= "0.00";
		  $creg_06= "0.00";
		  $creg_07= "0.00";
		  $creg_08= "0.00";
		  $creg_09= "0.00";
		  $creg_10= "0.00";
		  $creg_11= "0.00";
		  $creg_12= "0.00";
		  $totaregistro = "0.00";
	  }
	  
	  /*cuenta cantidad de duas*/
	   $query_dua = "SELECT Count(DISTINCT exportacion.ndcl) as cant_dua, extract(MONTH from exportacion.fnum) as mes FROM exportacion WHERE extract(year from exportacion.fnum)= '$anio' $querytu AND exportacion.ndoc='$paiscode' GROUP BY mes order BY mes ASC";
				$resultado_dua=$conexpg->query($query_dua); 
if($resultado_dua->num_rows>0){ 
while($fila_dua=$resultado_dua->fetch_array()){
		  $aniodua= $fila_dua['mes'];
		  
		  if($aniodua=='01'){
			  $rdua01=$fila_dua['cant_dua']; 
		  }
		  if($aniodua=='02'){
			  $rdua02=$fila_dua['cant_dua'];
		  }
		  if($aniodua=='03'){
			  $rdua03=$fila_dua['cant_dua'];
		  }
		  
		  if($aniodua=='04'){
			 $rdua04=$fila_dua['cant_dua'];
		  }

		  if($aniodua=='05'){
			  $rdua05=$fila_dua['cant_dua'];
		  }
		  
		   if($aniodua=='06'){
			  $rdua06=$fila_dua['cant_dua'];
		  }
		  
		   if($aniodua=='07'){
			  $rdua07=$fila_dua['cant_dua'];
		  }
		  
		   if($aniodua=='08'){
			  $rdua08=$fila_dua['cant_dua'];
		  }
		  
		   if($aniodua=='09'){
			  $rdua09=$fila_dua['cant_dua'];
		  }
		  
		   if($aniodua=='10'){
			  $rdua10=$fila_dua['cant_dua'];
		  }
		  
		   if($aniodua=='11'){
			  $rdua11=$fila_dua['cant_dua'];
		  }
		  
		   if($aniodua=='12'){
			  $rdua12=$fila_dua['cant_dua'];
		  }
		  
		  }
	  }else{
		  $rdua01= "0.00";
		  $rdua02= "0.00";
		  $rdua03= "0.00";
		  $rdua04= "0.00";
		  $rdua05= "0.00";
		  $rdua06= "0.00";
		  $rdua07= "0.00";
		  $rdua08= "0.00";
		  $rdua09= "0.00";
		  $rdua10= "0.00";
		  $rdua11= "0.00";
		  $rdua12= "0.00";
	  }
	  
	  /*total general de duas*/
	  $generalB = "SELECT Count(DISTINCT exportacion.ndcl) as cant_dua FROM exportacion WHERE extract(year from exportacion.fnum)= '$anio' $querytu AND exportacion.ndoc='$paiscode' ";
				$res_generaB=$conexpg->query($generalB); 
if($res_generaB->num_rows>0){ 
while($fila_generaB=$res_generaB->fetch_array()){
			  $totadua = $fila_generaB['cant_dua'];
		  }
	  }else{
		  $totadua = "0.00";
	  }
	  
	  /*cuenta cantidad de empresas*/
	   /*$query_emp = "SELECT Count(DISTINCT exportacion.dnombre) as cant_nom, extract(MONTH from exportacion.fnum) as mes FROM exportacion WHERE extract(year from exportacion.fnum)= '$anio' AND exportacion.ndoc='$paiscode' GROUP BY mes order BY mes ASC";
	  $resultado_emp = pg_query($query_emp) or die("Error en la Consulta SQL");
	  $numReg_emp = pg_num_rows($resultado_emp);
	  if($numReg_emp>0){
		  while ($fila_emp=pg_fetch_array($resultado_emp)) {
		  $anioemp= $fila_emp['mes'];
		  
		  if($anioemp=='01'){
			  $remp01=$fila_emp['cant_nom'];
		  }
		  if($anioemp=='02'){
			  $remp02=$fila_emp['cant_nom'];
		  }
		  if($anioemp=='03'){
			  $remp03=$fila_emp['cant_nom'];
		  }
		  if($anioemp=='04'){
			  $remp04=$fila_emp['cant_nom'];
		  }
			  
		  if($anioemp=='05'){
			  $remp05=$fila_emp['cant_nom'];
		  }
		  
		  if($anioemp=='06'){
			  $remp06=$fila_emp['cant_nom'];
		  }
		  
		  if($anioemp=='07'){
			  $remp07=$fila_emp['cant_nom'];
		  }
		  
		  if($anioemp=='08'){
			  $remp08=$fila_emp['cant_nom'];
		  }
		  
		  if($anioemp=='09'){
			  $remp09=$fila_emp['cant_nom'];
		  }
		  
		  if($anioemp=='10'){
			  $remp10=$fila_emp['cant_nom'];
		  }
		  
		  if($anioemp=='11'){
			  $remp11=$fila_emp['cant_nom'];
		  }
		  
		  if($anioemp=='12'){
			  $remp12=$fila_emp['cant_nom'];
		  }

		  }
	  }else{
		  $remp01= "0.00";
		  $remp02= "0.00";
		  $remp03= "0.00";
	      $remp04= "0.00";
		  $remp05= "0.00";
		  $remp06= "0.00";
		  $remp07= "0.00";
		  $remp08= "0.00";
		  $remp09= "0.00";
		  $remp10= "0.00";
		  $remp11= "0.00";
		  $remp12= "0.00";
	  }*
	  
	  /*total general de emepresas*/
	  /*$generalC = "SELECT Count(DISTINCT exportacion.dnombre) as cant_nom FROM exportacion WHERE extract(year from exportacion.fnum)= '$anio' AND exportacion.ndoc='$paiscode' ";
	  $res_generaC = pg_query($generalC) or die("Error en la Consulta SQL");
	  $numReg_geneC = pg_num_rows($res_generaC);
	  if($numReg_geneC > 0){
		  while ($fila_generaC=pg_fetch_array($res_generaC)) {
			  $totaempre = $fila_generaC['cant_nom'];
		  }
	  }else{
		  $totaempre = "0.00";
	  }*/
	  
	  /*cantidad de mercados*/
	 $query_merca = "SELECT Count(DISTINCT exportacion.cpaides) as cant_mer, extract(MONTH from exportacion.fnum) as mes FROM exportacion WHERE extract(year from exportacion.fnum)= '$anio' $querytu AND exportacion.ndoc='$paiscode' GROUP BY mes order BY mes ASC";
				$resultado_merca=$conexpg->query($query_merca); 
if($resultado_merca->num_rows>0){ 
while($fila_merca=$resultado_merca->fetch_array()){
		  $aniomerca= $fila_merca['mes'];
		  
		  if($aniomerca=='01'){
			  $rmer01=$fila_merca['cant_mer'];
		  }
		  if($aniomerca=='02'){
			  $rmer02=$fila_merca['cant_mer'];
		  }
		  if($aniomerca=='03'){
			  $rmer03=$fila_merca['cant_mer'];
		  }
		  if($aniomerca=='04'){
			  $rmer04=$fila_merca['cant_mer'];
		  }
		  
		  if($aniomerca=='05'){
			  $rmer05=$fila_merca['cant_mer'];
		  }
		  
		  if($aniomerca=='06'){
			  $rmer06=$fila_merca['cant_mer'];
		  }
		  
		  if($aniomerca=='07'){
			  $rmer07=$fila_merca['cant_mer'];
		  }
		  
		  if($aniomerca=='08'){
			  $rmer08=$fila_merca['cant_mer'];
		  }
		  
		  if($aniomerca=='09'){
			  $rmer09=$fila_merca['cant_mer'];
		  }
		  
		  if($aniomerca=='10'){
			  $rmer10=$fila_merca['cant_mer'];
		  }
		  
		  if($aniomerca=='11'){
			  $rmer11=$fila_merca['cant_mer'];
		  }
		  
		  if($aniomerca=='12'){
			  $rmer12=$fila_merca['cant_mer'];
		  }
		  
		  
		  if($rmer2014=='0'  or $rmer2014 == null){
			   $var19='0.00';
		   }else{
		   $var19= number_format((($rmer2015/$rmer2014) - 1) * 100,2);
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
			 
			  
			  $var20= number_format(($ca1_7 + $ca2_7 + $ca3_7 + $ca4_7)/4,2) ;
		   
		 }
	  }else{
		  $rmer01= "0.00";
		  $rmer02= "0.00";
		  $rmer03= "0.00";
		  $rmer04= "0.00";
		  $rmer05= "0.00";
		  $rmer06= "0.00";
		  $rmer07= "0.00";
		  $rmer08= "0.00";
		  $rmer09= "0.00";
		  $rmer10= "0.00";
		  $rmer11= "0.00";
		  $rmer12= "0.00";
	  }
				
	/*total general de mercados*/
	  $generalC = "SELECT Count(DISTINCT exportacion.cpaides) as cant_mer FROM exportacion WHERE extract(year from exportacion.fnum) = '$anio' $querytu AND exportacion.ndoc='$paiscode' ";
				$res_generaC=$conexpg->query($generalC); 
if($res_generaC->num_rows>0){ 
while($fila_generaC=$res_generaC->fetch_array()){
			  $totamerca = $fila_generaC['cant_mer'];
		  }
	  }else{
		  $totamerca = "0.00";
	  }
	  
	  /*contamos cantidad de puertos*/
	   $query_pue = "SELECT Count(DISTINCT exportacion.cpuedes) as cant_pue, extract(MONTH from exportacion.fnum) as mes FROM exportacion WHERE extract(year from exportacion.fnum)= '$anio' $querytu AND exportacion.ndoc='$paiscode' GROUP BY mes order BY mes ASC";
				$resultado_pue=$conexpg->query($query_pue); 
if($resultado_pue->num_rows>0){ 
while($fila_pue=$resultado_pue->fetch_array()){
		  $aniopue= $fila_pue['mes'];
		  
		  if($aniopue=='01'){
			  $rpue01=$fila_pue['cant_pue'];
		  }
		  if($aniopue=='02'){
			  $rpue02=$fila_pue['cant_pue'];
		  }
		  if($aniopue=='03'){
			  $rpue03=$fila_pue['cant_pue'];
		  }
		  if($aniopue=='04'){
			  $rpue04=$fila_pue['cant_pue'];
		  }
		  
		  if($aniopue=='05'){
			  $rpue05=$fila_pue['cant_pue'];
		  }
		  
		  if($aniopue=='06'){
			  $rpue06=$fila_pue['cant_pue'];
		  }
		  
		  if($aniopue=='07'){
			  $rpue07=$fila_pue['cant_pue'];
		  }
		  
		  if($aniopue=='08'){
			  $rpue08=$fila_pue['cant_pue'];
		  }
		  
		  if($aniopue=='09'){
			  $rpue09=$fila_pue['cant_pue'];
		  }
		  
		  if($aniopue=='10'){
			  $rpue10=$fila_pue['cant_pue'];
		  }
		  
		  if($aniopue=='11'){
			  $rpue11=$fila_pue['cant_pue'];
		  }
		  
		  if($aniopue=='12'){
			  $rpue12=$fila_pue['cant_pue'];
		  }
		  
		  }
	  }else{
		  $rpue01= "0.00";
		  $rpue02= "0.00";
		  $rpue03= "0.00";
		  $rpue04= "0.00";
		  $rpue05= "0.00";
		  $rpue06= "0.00";
		  $rpue07= "0.00";
		  $rpue08= "0.00";
		  $rpue09= "0.00";
		  $rpue10= "0.00";
		  $rpue11= "0.00";
		  $rpue12= "0.00";
	  }
	  
	   /*total general de puertos*/
	  $generalD = "SELECT Count(DISTINCT exportacion.cpuedes) as cant_pue FROM exportacion WHERE extract(year from exportacion.fnum)= '$anio' $querytu AND exportacion.ndoc='$paiscode' ";
				$res_generaD=$conexpg->query($generalD); 
if($res_generaD->num_rows>0){ 
while($fila_generaD=$res_generaD->fetch_array()){
			  $totapuerto = $fila_generaD['cant_pue'];
		  }
	  }else{
		  $totapuerto = "0.00";
	  }
	  
	  /*contamos cantidad de aduanas*/
	   $query_adua = "SELECT Count(DISTINCT exportacion.cadu) as cant_adua, extract(MONTH from exportacion.fnum) as mes FROM exportacion WHERE extract(year from exportacion.fnum)= '$anio' $querytu AND exportacion.ndoc='$paiscode' GROUP BY mes order BY mes ASC";
				$resultado_adua=$conexpg->query($query_adua); 
if($resultado_adua->num_rows>0){ 
while($fila_adua=$resultado_adua->fetch_array()){
		  $anioadua= $fila_adua['mes'];
		  
		  if($anioadua=='01'){
			  $radua01=$fila_adua['cant_adua'];
		  }
		  if($anioadua=='02'){
			  $radua02=$fila_adua['cant_adua'];
		  }
		  if($anioadua=='03'){
			  $radua03=$fila_adua['cant_adua'];
		  }
		  if($anioadua=='04'){
			  $radua04=$fila_adua['cant_adua'];
		  }
		  
		  if($anioadua=='05'){
			  $radua05=$fila_adua['cant_adua'];
		  }
		  
		  if($anioadua=='06'){
			  $radua06=$fila_adua['cant_adua'];
		  }
		  
		  if($anioadua=='07'){
			  $radua07=$fila_adua['cant_adua'];
		  }
		  
		  if($anioadua=='08'){
			  $radua08=$fila_adua['cant_adua'];
		  }
		  
		  if($anioadua=='09'){
			  $radua09=$fila_adua['cant_adua'];
		  }
		  
		  if($anioadua=='10'){
			  $radua10=$fila_adua['cant_adua'];
		  }
		  
		  if($anioadua=='11'){
			  $radua11=$fila_adua['cant_adua'];
		  }
		  
		  if($anioadua=='12'){
			  $radua12=$fila_adua['cant_adua'];
		  }

		  }
	  }else{
		  $radua01= "0.00";
		  $radua02= "0.00";
		  $radua03= "0.00";
	      $radua04= "0.00";
		  $radua05= "0.00";
		  $radua06= "0.00";
		  $radua07= "0.00";
		  $radua08= "0.00";
		  $radua09= "0.00";
		  $radua10= "0.00";
		  $radua11= "0.00";
		  $radua12= "0.00";
	  }
	  
	  /*total general de aduanas*/
	  $generalE = "SELECT Count(DISTINCT exportacion.cadu) as cant_adua FROM exportacion WHERE extract(year from exportacion.fnum)= '$anio' $querytu AND exportacion.ndoc='$paiscode' ";
				$res_generaE=$conexpg->query($generalE); 
if($res_generaE->num_rows>0){ 
while($fila_generaE=$res_generaE->fetch_array()){
			  $totaduana = $fila_generaE['cant_adua'];
		  }
	  }else{
		  $totaduana = "0.00";
	  }
	  
	  /*contamnos cantidad de departamento*/
	   $query_merca = "SELECT COUNT(DISTINCT departamento.nombre) as departamento, extract(MONTH from exportacion.fnum) as mes FROM exportacion LEFT JOIN departamento ON  ((((SUBSTRING(exportacion.ubigeo,1,2))= departamento.iddepartamento))) WHERE extract(year from exportacion.fnum)= '$anio' $querytu AND exportacion.ndoc='$paiscode' GROUP BY mes ORDER BY mes ASC";
				$resultado_merca=$conexpg->query($query_merca); 
if($resultado_merca->num_rows>0){ 
while($fila_merca=$resultado_merca->fetch_array()){
		  $aniomerca= $fila_merca['mes'];
		  
		  if($aniomerca=='01'){
			  $rdepa01=$fila_merca['departamento'];
		  }
		  if($aniomerca=='02'){
			  $rdepa02=$fila_merca['departamento'];
		  }
		  if($aniomerca=='03'){
			  $rdepa03=$fila_merca['departamento'];
		  }
		  if($aniomerca=='04'){
			  $rdepa04=$fila_merca['departamento'];
		  }
		  if($aniomerca=='05'){
			  $rdepa05=$fila_merca['departamento'];
		  }
		  if($aniomerca=='06'){
			  $rdepa06=$fila_merca['departamento'];
		  }
		  if($aniomerca=='07'){
			  $rdepa07=$fila_merca['departamento'];
		  }
		  if($aniomerca=='08'){
			  $rdepa08=$fila_merca['departamento'];
		  }
		  if($aniomerca=='09'){
			  $rdepa09=$fila_merca['departamento'];
		  }
		  if($aniomerca=='10'){
			  $rdepa10=$fila_merca['departamento'];
		  }
		  if($aniomerca=='11'){
			  $rdepa11=$fila_merca['departamento'];
		  }
		  if($aniomerca=='12'){
			  $rdepa12=$fila_merca['departamento'];
		  }
		   
		  }
	  }else{
		  $rdepa01= "0.00";
		  $rdepa02= "0.00";
		  $rdepa03= "0.00";
		  $rdepa04= "0.00";
		  $rdepa05= "0.00";
		  $rdepa06= "0.00";
		  $rdepa07= "0.00";
		  $rdepa08= "0.00";
		  $rdepa09= "0.00";
		  $rdepa10= "0.00";
		  $rdepa11= "0.00";
		  $rdepa12= "0.00";
	  }
	  
	  /*total general de departamentos*/
	  $generalF = "SELECT COUNT(DISTINCT departamento.nombre) as departamento FROM exportacion LEFT JOIN departamento ON  ((((SUBSTRING(exportacion.ubigeo,1,2))= departamento.iddepartamento))) WHERE extract(year from exportacion.fnum)= '$anio' $querytu AND exportacion.ndoc='$paiscode' ";
				$res_generaF=$conexpg->query($generalF); 
if($res_generaF->num_rows>0){ 
while($fila_generaF=$res_generaF->fetch_array()){
			  $totaldepa = $fila_generaF['departamento'];
		  }
	  }else{
		  $totaldepa = "0.00";
	  }
	  
	  /*contamnos cantidad de provincia*/
	   $query_prov = "SELECT count(DISTINCT provincia.nombre) as provincia, extract(MONTH from exportacion.fnum) as mes FROM exportacion LEFT JOIN departamento ON  (((SUBSTRING(exportacion.ubigeo,1,2))= departamento.iddepartamento))  INNER JOIN provincia ON provincia.iddepartamento = departamento.iddepartamento WHERE extract(year from exportacion.fnum)= '$anio' $querytu AND exportacion.ndoc='$paiscode' GROUP BY mes ORDER BY mes ASC";
				$resultado_prov=$conexpg->query($query_prov); 
if($resultado_prov->num_rows>0){ 
while($fila_prov=$resultado_prov->fetch_array()){
		  $anioprov= $fila_prov['mes'];
		  
		  if($anioprov=='01'){
			  $rprov01=$fila_prov['provincia'];
		  }
		  if($anioprov=='02'){
			  $rprov02=$fila_prov['provincia'];
		  }
		  if($anioprov=='03'){
			  $rprov03=$fila_prov['provincia'];
		  }
		  if($anioprov=='04'){
			  $rprov04=$fila_prov['provincia'];
		  }
		  if($anioprov=='05'){
			  $rprov05=$fila_prov['provincia'];
		  }
		  if($anioprov=='06'){
			  $rprov06=$fila_prov['provincia'];
		  }
		  if($anioprov=='07'){
			  $rprov07=$fila_prov['provincia'];
		  }
		  if($anioprov=='08'){
			  $rprov08=$fila_prov['provincia'];
		  }
		  if($anioprov=='09'){
			  $rprov09=$fila_prov['provincia'];
		  }
		  if($anioprov=='10'){
			  $rprov10=$fila_prov['provincia'];
		  }
		  if($anioprov=='11'){
			  $rprov11=$fila_prov['provincia'];
		  }
		  if($anioprov=='12'){
			  $rprov12=$fila_prov['provincia'];
		  }
		  
		   
		  }
	  }else{
		  $rprov01= "0.00";
		  $rprov02= "0.00";
		  $rprov03= "0.00";
		  $rprov04= "0.00";
		  $rprov05= "0.00";
		  $rprov06= "0.00";
		  $rprov07= "0.00";
		  $rprov08= "0.00";
		  $rprov09= "0.00";
		  $rprov10= "0.00";
		  $rprov11= "0.00";
		  $rprov12= "0.00";
		  
	 }
	 
	  /*total general de provincias*/
	  $generalG = "SELECT count(DISTINCT provincia.nombre) as provincia FROM exportacion LEFT JOIN departamento ON  (((SUBSTRING(exportacion.ubigeo,1,2))= departamento.iddepartamento))  INNER JOIN provincia ON provincia.iddepartamento = departamento.iddepartamento WHERE extract(year from exportacion.fnum)= '$anio' $querytu AND exportacion.ndoc='$paiscode' ";
				$res_generaG=$conexpg->query($generalG); 
if($res_generaG->num_rows>0){ 
while($fila_generaG=$res_generaG->fetch_array()){
			  $totalprovi = $fila_generaG['provincia'];
		  }
	  }else{
		  $totalprovi = "0.00";
	  }
	  
	  /*contamnos cantidad de distrito*/
	   $query_dist = "SELECT count(DISTINCT distrito.nombre) AS distrito, extract(MONTH from exportacion.fnum) AS mes FROM exportacion LEFT JOIN distrito ON exportacion.ubigeo= distrito.iddistrito WHERE extract(year from exportacion.fnum)= '$anio' $querytu AND exportacion.ndoc='$paiscode' GROUP BY mes ORDER BY mes ASC";
				$resultado_dist=$conexpg->query($query_dist); 
if($resultado_dist->num_rows>0){ 
while($fila_dist=$resultado_dist->fetch_array()){
			  $aniodist= $fila_dist['mes'];
			  
			  if($aniodist=='01'){
			  $distri01=$fila_dist['distrito'];
		       }
			   if($aniodist=='02'){
			  $distri02=$fila_dist['distrito'];
		       }
			   if($aniodist=='03'){
			  $distri03=$fila_dist['distrito'];
		       }
			   if($aniodist=='04'){
			  $distri04=$fila_dist['distrito'];
		       }
			   if($aniodist=='05'){
			  $distri05=$fila_dist['distrito'];
		       }
			    if($aniodist=='06'){
			  $distri06=$fila_dist['distrito'];
		       }
			    if($aniodist=='07'){
			  $distri07=$fila_dist['distrito'];
		       }
			    if($aniodist=='08'){
			  $distri08=$fila_dist['distrito'];
		       }
			    if($aniodist=='09'){
			  $distri09=$fila_dist['distrito'];
		       }
			    if($aniodist=='10'){
			  $distri10=$fila_dist['distrito'];
		       }
			    if($aniodist=='11'){
			  $distri11=$fila_dist['distrito'];
		       }
			    if($aniodist=='12'){
			  $distri12=$fila_dist['distrito'];
		       }
			   
				 
		  }
	  }else{
		  $distri01="0.00";
		  $distri02="0.00";
		  $distri03="0.00";
		  $distri04="0.00";
		  $distri05="0.00";
		  $distri06="0.00";
		  $distri07="0.00";
		  $distri08="0.00";
		  $distri09="0.00";
		  $distri10="0.00";
		  $distri11="0.00";
		  $distri12="0.00";
	  }
	  
	   /*total general de distrito*/
	  $generalH = "SELECT count(DISTINCT distrito.nombre) AS distrito FROM exportacion LEFT JOIN distrito ON exportacion.ubigeo= distrito.iddistrito WHERE extract(year from exportacion.fnum)= '$anio' $querytu AND exportacion.ndoc='$paiscode' ";
				$res_generaH=$conexpg->query($generalH); 
if($res_generaH->num_rows>0){ 
while($fila_generaH=$res_generaH->fetch_array()){
			  $totaldist = $fila_generaH['distrito'];
		  }
	  }else{
		  $totaldist = "0.00";
	  }
	  
	  
	  /*contamnos cantidad de agente*/
	   $query_agen = "SELECT Count(DISTINCT exportacion.cage) as cant_agen, extract(MONTH from exportacion.fnum) as mes FROM exportacion WHERE extract(year from exportacion.fnum)= '$anio' $querytu AND exportacion.ndoc='$paiscode' GROUP BY mes order BY mes ASC";
				$resultado_agen=$conexpg->query($query_agen); 
if($resultado_agen->num_rows>0){ 
while($fila_agen=$resultado_agen->fetch_array()){
		  $anioagen= $fila_agen['mes'];
		  
		  if($anioagen=='01'){
			  $ragen01=$fila_agen['cant_agen'];
		  }
		  if($anioagen=='02'){
			  $ragen02=$fila_agen['cant_agen'];
		  }
		  if($anioagen=='03'){
			  $ragen03=$fila_agen['cant_agen'];
		  }
		  if($anioagen=='04'){
			  $ragen04=$fila_agen['cant_agen'];
		  }
		  
		  if($anioagen=='05'){
			  $ragen05=$fila_agen['cant_agen'];
		  }
		  
		  if($anioagen=='06'){
			  $ragen06=$fila_agen['cant_agen'];
		  }
		  
		  if($anioagen=='07'){
			  $ragen07=$fila_agen['cant_agen'];
		  }
		  
		  if($anioagen=='08'){
			  $ragen08=$fila_agen['cant_agen'];
		  }
		  
		  if($anioagen=='09'){
			  $ragen09=$fila_agen['cant_agen'];
		  }
		  
		  if($anioagen=='10'){
			  $ragen10=$fila_agen['cant_agen'];
		  }
		  
		  if($anioagen=='11'){
			  $ragen11=$fila_agen['cant_agen'];
		  }
		  
		  if($anioagen=='12'){
			  $ragen12=$fila_agen['cant_agen'];
		  }
 
		  }
	  }else{
		  $ragen01= "0.00";
		  $ragen02= "0.00";
		  $ragen03= "0.00";
		  $ragen04= "0.00";
		  $ragen05= "0.00";
		  $ragen06= "0.00";
		  $ragen07= "0.00";
		  $ragen08= "0.00";
		  $ragen09= "0.00";
		  $ragen10= "0.00";
		  $ragen11= "0.00";
		  $ragen12= "0.00";
	  }
	  
	   /*total general de agentes*/
	  $generalI = "SELECT Count(DISTINCT exportacion.cage) as cant_agen FROM exportacion WHERE extract(year from exportacion.fnum)= '$anio' $querytu AND exportacion.ndoc='$paiscode' ";
				$res_generaI=$conexpg->query($generalI); 
if($res_generaI->num_rows>0){ 
while($fila_generaI=$res_generaI->fetch_array()){
			  $totagente = $fila_generaI['cant_agen'];
		  }
	  }else{
		  $totagente = "0.00";
	  }
	  
	  /*contamos cantidad via de transporte*/
	   $query_via = "SELECT Count(DISTINCT exportacion.cviatra) as cant_via, extract(MONTH from exportacion.fnum) as mes FROM exportacion WHERE extract(year from exportacion.fnum)= '$anio' $querytu AND exportacion.ndoc='$paiscode' GROUP BY mes order BY mes ASC";
				$resultado_via=$conexpg->query($query_via); 
if($resultado_via->num_rows>0){ 
while($fila_via=$resultado_via->fetch_array()){
		  $aniovia= $fila_via['mes'];
		  
		  if($aniovia=='01'){
			  $rvia01=$fila_via['cant_via'];
		  }
		  if($aniovia=='02'){
			  $rvia02=$fila_via['cant_via'];
		  }
		  if($aniovia=='03'){
			  $rvia03=$fila_via['cant_via'];
		  }
		  if($aniovia=='04'){
			  $rvia04=$fila_via['cant_via'];
		  }
		  if($aniovia=='05'){
			  $rvia05=$fila_via['cant_via'];
		  }
		  
		  if($aniovia=='06'){
			  $rvia06=$fila_via['cant_via'];
		  }
		  
		  if($aniovia=='07'){
			  $rvia07=$fila_via['cant_via'];
		  }
		  
		  if($aniovia=='08'){
			  $rvia08=$fila_via['cant_via'];
		  }
		  
		  if($aniovia=='09'){
			  $rvia09=$fila_via['cant_via'];
		  }
		  
		  if($aniovia=='10'){
			  $rvia10=$fila_via['cant_via'];
		  }
		  
		  if($aniovia=='11'){
			  $rvia11=$fila_via['cant_via'];
		  }
		  
		  if($aniovia=='12'){
			  $rvia12=$fila_via['cant_via'];
		  }

		  }
	  }else{
		  $rvia01= "0.00";
		  $rvia02= "0.00";
		  $rvia03= "0.00";
		  $rvia04= "0.00";
		  $rvia05= "0.00";
		  $rvia06= "0.00";
		  $rvia07= "0.00";
		  $rvia08= "0.00";
		  $rvia09= "0.00";
		  $rvia10= "0.00";
		  $rvia11= "0.00";
		  $rvia12= "0.00";
	  }
	  
	  /*total general de via de transporte*/
	  $generalJ = "SELECT Count(DISTINCT exportacion.cviatra) as cant_via FROM exportacion WHERE extract(year from exportacion.fnum)= '$anio' $querytu AND exportacion.ndoc='$paiscode' ";
				$res_generaJ=$conexpg->query($generalJ); 
if($res_generaJ->num_rows>0){ 
while($fila_generaJ=$res_generaJ->fetch_array()){
			  $totalvia = $fila_generaJ['cant_via'];
		  }
	  }else{
		  $totalvia = "0.00";
	  }

//if($numReg!=0){//inicia si hay resultados
echo"<div class='col-md-12'>";
        echo"<div class='card'>";
	echo"<div class='card-header card-header-info card-header-icon'>
              <div class='card-icon'>
                <i class='material-icons'>assignment</i>
              </div>
              <h4 class='card-title'><b>Reporte Analisis Empresa Indicador Mensual - Exportaciones </b><br> Mercado: $paisname │ Ruc: $paiscode │ Departamento: $namedepa1 │ Fecha Numeracion │ Periodo $anio </b> </h4>
            </div>";
		echo"<div class='card-body'>";
		echo"<div class='toolbar'>
		<a href='#emp'><button class='btn btn-info btn-sm'> Ver Cuadro Estadístico </button></a>
                  </div>";
         echo"<div class='material-datatables'>";
		echo"<table id='datatablese' class='table table-striped table-no-bordered table-hover' cellspacing='0' width='100%' style='width:100%'>";
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

echo "<tr>";
echo "<td>1</td>";
echo "<td>Valor FOB USD </td>";
echo "<td>".number_format($vfob_01,2)."</td>";
echo "<td>".number_format($vfob_02,2)."</td>";
echo "<td>".number_format($vfob_03,2)."</td>";
echo "<td>".number_format($vfob_04,2)."</td>";
echo "<td>".number_format($vfob_05,2)."</td>";
echo "<td>".number_format($vfob_06,2)."</td>";
echo "<td>".number_format($vfob_07,2)."</td>";
echo "<td>".number_format($vfob_08,2)."</td>";
echo "<td>".number_format($vfob_09,2)."</td>";
echo "<td>".number_format($vfob_10,2)."</td>";
echo "<td>".number_format($vfob_11,2)."</td>";
echo "<td>".number_format($vfob_12,2)."</td>";
echo "<td>".number_format($totafob,2)."</td>";
echo "</tr>";
echo "<tr>";
echo "<td>2</td>";
echo "<td>Peso Neto (Kg) </td>";
echo "<td>".number_format($vpes_01,2)."</td>";
echo "<td>".number_format($vpes_02,2)."</td>";
echo "<td>".number_format($vpes_03,2)."</td>";
echo "<td>".number_format($vpes_04,2)."</td>";
echo "<td>".number_format($vpes_05,2)."</td>";
echo "<td>".number_format($vpes_06,2)."</td>";
echo "<td>".number_format($vpes_07,2)."</td>";
echo "<td>".number_format($vpes_08,2)."</td>";
echo "<td>".number_format($vpes_09,2)."</td>";
echo "<td>".number_format($vpes_10,2)."</td>";
echo "<td>".number_format($vpes_11,2)."</td>";
echo "<td>".number_format($vpes_12,2)."</td>";
echo "<td>".number_format($totalvpes,2)."</td>";
echo "</tr>";
echo "<tr>";
echo "<td>3</td>";
echo "<td>Precio FOB USD x KG </td>";
echo "<td>".number_format($preciofob01,2)."</td>";
echo "<td>".number_format($preciofob02,2)."</td>";
echo "<td>".number_format($preciofob03,2)."</td>";
echo "<td>".number_format($preciofob04,2)."</td>";
echo "<td>".number_format($preciofob05,2)."</td>";
echo "<td>".number_format($preciofob06,2)."</td>";
echo "<td>".number_format($preciofob07,2)."</td>";
echo "<td>".number_format($preciofob08,2)."</td>";
echo "<td>".number_format($preciofob09,2)."</td>";
echo "<td>".number_format($preciofob10,2)."</td>";
echo "<td>".number_format($preciofob11,2)."</td>";
echo "<td>".number_format($preciofob12,2)."</td>";
echo "<td>".number_format($promediotota,2)."</td>";
echo "</tr>";
echo "<tr>";
echo "<td>4</td>";
echo "<td>Peso Bruto (Kg) </td>";
echo "<td>".number_format($vbru_01,2)."</td>";
echo "<td>".number_format($vbru_02,2)."</td>";
echo "<td>".number_format($vbru_03,2)."</td>";
echo "<td>".number_format($vbru_04,2)."</td>";
echo "<td>".number_format($vbru_05,2)."</td>";
echo "<td>".number_format($vbru_06,2)."</td>";
echo "<td>".number_format($vbru_07,2)."</td>";
echo "<td>".number_format($vbru_08,2)."</td>";
echo "<td>".number_format($vbru_09,2)."</td>";
echo "<td>".number_format($vbru_10,2)."</td>";
echo "<td>".number_format($vbru_11,2)."</td>";
echo "<td>".number_format($vbru_12,2)."</td>";
echo "<td>".number_format($totapesob,2)."</td>";
echo "</tr>";
echo "<tr>";
echo "<td>5</td>";
echo "<td>Cantidad Exportada </td>";
echo "<td>".number_format($qunifis_01,2)."</td>";
echo "<td>".number_format($qunifis_02,2)."</td>";
echo "<td>".number_format($qunifis_03,2)."</td>";
echo "<td>".number_format($qunifis_04,2)."</td>";
echo "<td>".number_format($qunifis_05,2)."</td>";
echo "<td>".number_format($qunifis_06,2)."</td>";
echo "<td>".number_format($qunifis_07,2)."</td>";
echo "<td>".number_format($qunifis_08,2)."</td>";
echo "<td>".number_format($qunifis_09,2)."</td>";
echo "<td>".number_format($qunifis_10,2)."</td>";
echo "<td>".number_format($qunifis_11,2)."</td>";
echo "<td>".number_format($qunifis_12,2)."</td>";
echo "<td>".number_format($totaqunifis,2)."</td>";
echo "</tr>";
if($axe=='SI'){//si es pagado o es admin
echo "<tr>";
echo "<td>6</td>";
echo "<td>Unidades Comerciales </td>";
echo "<td>".number_format($qunicom_01,2)."</td>";
echo "<td>".number_format($qunicom_02,2)."</td>";
echo "<td>".number_format($qunicom_03,2)."</td>";
echo "<td>".number_format($qunicom_04,2)."</td>";
echo "<td>".number_format($qunicom_05,2)."</td>";
echo "<td>".number_format($qunicom_06,2)."</td>";
echo "<td>".number_format($qunicom_07,2)."</td>";
echo "<td>".number_format($qunicom_08,2)."</td>";
echo "<td>".number_format($qunicom_09,2)."</td>";
echo "<td>".number_format($qunicom_10,2)."</td>";
echo "<td>".number_format($qunicom_11,2)."</td>";
echo "<td>".number_format($qunicom_12,2)."</td>";
echo "<td>".number_format($totaqunicom,2)."</td>";
echo "</tr>";
echo "<tr>";
echo "<td>7</td>";
echo "<td>Cantidad de Partidas</td>";
echo "<td>$rparti01</td>";
echo "<td>$rparti02</td>";
echo "<td>$rparti03</td>";
echo "<td>$rparti04</td>";
echo "<td>$rparti05</td>";
echo "<td>$rparti06</td>";
echo "<td>$rparti07</td>";
echo "<td>$rparti08</td>";
echo "<td>$rparti09</td>";
echo "<td>$rparti10</td>";
echo "<td>$rparti11</td>";
echo "<td>$rparti12</td>";
echo "<td>$totapartida</td>";
echo "</tr>";
echo "<tr>";
echo "<td>8</td>";
echo "<td>Cantidad de Registros</td>";
echo "<td>$creg_01</td>";
echo "<td>$creg_02</td>";
echo "<td>$creg_03</td>";
echo "<td>$creg_04</td>";
echo "<td>$creg_05</td>";
echo "<td>$creg_06</td>";
echo "<td>$creg_07</td>";
echo "<td>$creg_08</td>";
echo "<td>$creg_09</td>";
echo "<td>$creg_10</td>";
echo "<td>$creg_11</td>";
echo "<td>$creg_12</td>";
echo "<td>$totaregistro</td>";
echo "</tr>";
echo "<tr>";
echo "<td>9</td>";
echo "<td>Cantidad de Duas</td>";
echo "<td>$rdua01</td>";
echo "<td>$rdua02</td>";
echo "<td>$rdua03</td>";
echo "<td>$rdua04</td>";
echo "<td>$rdua05</td>";
echo "<td>$rdua06</td>";
echo "<td>$rdua07</td>";
echo "<td>$rdua08</td>";
echo "<td>$rdua09</td>";
echo "<td>$rdua10</td>";
echo "<td>$rdua11</td>";
echo "<td>$rdua12</td>";
echo "<td>$totadua</td>";
echo "</tr>";
/*echo "<tr>";
echo "<td>10</td>";
echo "<td>Cantidad de Empresas</td>";
echo "<td>$remp01</td>";
echo "<td>$remp02</td>";
echo "<td>$remp03</td>";
echo "<td>$remp04</td>";
echo "<td>$remp05</td>";
echo "<td>$remp06</td>";
echo "<td>$remp07</td>";
echo "<td>$remp08</td>";
echo "<td>$remp09</td>";
echo "<td>$remp10</td>";
echo "<td>$remp11</td>";
echo "<td>$remp12</td>";
echo "<td>$totaempre</td>";
echo "</tr>";*/
echo "<tr>";
echo "<td>10</td>";
echo "<td>Cantidad de Mercados</td>";
echo "<td>$rmer01</td>";
echo "<td>$rmer02</td>";
echo "<td>$rmer03</td>";
echo "<td>$rmer04</td>";
echo "<td>$rmer05</td>";
echo "<td>$rmer06</td>";
echo "<td>$rmer07</td>";
echo "<td>$rmer08</td>";
echo "<td>$rmer09</td>";
echo "<td>$rmer10</td>";
echo "<td>$rmer11</td>";
echo "<td>$rmer12</td>";
echo "<td>$totamerca</td>";
echo "</tr>";
echo "<tr>";
echo "<td>11</td>";
echo "<td>Cantidad de Puertos</td>";
echo "<td>$rpue01</td>";
echo "<td>$rpue02</td>";
echo "<td>$rpue03</td>";
echo "<td>$rpue04</td>";
echo "<td>$rpue05</td>";
echo "<td>$rpue06</td>";
echo "<td>$rpue07</td>";
echo "<td>$rpue08</td>";
echo "<td>$rpue09</td>";
echo "<td>$rpue10</td>";
echo "<td>$rpue11</td>";
echo "<td>$rpue12</td>";
echo "<td>$totapuerto</td>";
echo "</tr>";
echo "<tr>";
echo "<td>12</td>";
echo "<td>Cantidad de Aduanas</td>";
echo "<td>$radua01</td>";
echo "<td>$radua02</td>";
echo "<td>$radua03</td>";
echo "<td>$radua04</td>";
echo "<td>$radua05</td>";
echo "<td>$radua06</td>";
echo "<td>$radua07</td>";
echo "<td>$radua08</td>";
echo "<td>$radua09</td>";
echo "<td>$radua10</td>";
echo "<td>$radua11</td>";
echo "<td>$radua12</td>";
echo "<td>$totaduana</td>";
echo "</tr>";
echo "<tr>";
echo "<td>13</td>";
echo "<td>Cantidad de departamentos</td>";
echo "<td>$rdepa01</td>";
echo "<td>$rdepa02</td>";
echo "<td>$rdepa03</td>";
echo "<td>$rdepa04</td>";
echo "<td>$rdepa05</td>";
echo "<td>$rdepa06</td>";
echo "<td>$rdepa07</td>";
echo "<td>$rdepa08</td>";
echo "<td>$rdepa09</td>";
echo "<td>$rdepa10</td>";
echo "<td>$rdepa11</td>";
echo "<td>$rdepa12</td>";
echo "<td>$totaldepa</td>";
echo "</tr>";
echo "<tr>";
echo "<td>14</td>";
echo "<td>Cantidad de provincias</td>";
echo "<td>$rprov01</td>";
echo "<td>$rprov02</td>";
echo "<td>$rprov03</td>";
echo "<td>$rprov04</td>";
echo "<td>$rprov05</td>";
echo "<td>$rprov06</td>";
echo "<td>$rprov07</td>";
echo "<td>$rprov08</td>";
echo "<td>$rprov09</td>";
echo "<td>$rprov10</td>";
echo "<td>$rprov11</td>";
echo "<td>$rprov12</td>";
echo "<td>$totalprovi</td>";
echo "</tr>";
echo "<tr>";
echo "<td>15</td>";
echo "<td>Cantidad de distritos</td>";
echo "<td>$distri01</td>";
echo "<td>$distri02</td>";
echo "<td>$distri03</td>";
echo "<td>$distri04</td>";
echo "<td>$distri05</td>";
echo "<td>$distri06</td>";
echo "<td>$distri07</td>";
echo "<td>$distri08</td>";
echo "<td>$distri09</td>";
echo "<td>$distri10</td>";
echo "<td>$distri11</td>";
echo "<td>$distri12</td>";
echo "<td>$totaldist</td>";
echo "</tr>";
echo "<tr>";
echo "<td>16</td>";
echo "<td>Cantidad de Agentes</td>";
echo "<td>$ragen01</td>";
echo "<td>$ragen02</td>";
echo "<td>$ragen03</td>";
echo "<td>$ragen04</td>";
echo "<td>$ragen05</td>";
echo "<td>$ragen06</td>";
echo "<td>$ragen07</td>";
echo "<td>$ragen08</td>";
echo "<td>$ragen09</td>";
echo "<td>$ragen10</td>";
echo "<td>$ragen11</td>";
echo "<td>$ragen12</td>";
echo "<td>$totagente</td>";
echo "</tr>";
echo "<tr>";
echo "<td>17</td>";
echo "<td>Cantidad de Vías de Transporte</td>";
echo "<td>$rvia01</td>";
echo "<td>$rvia02</td>";
echo "<td>$rvia03</td>";
echo "<td>$rvia04</td>";
echo "<td>$rvia05</td>";
echo "<td>$rvia06</td>";
echo "<td>$rvia07</td>";
echo "<td>$rvia08</td>";
echo "<td>$rvia09</td>";
echo "<td>$rvia10</td>";
echo "<td>$rvia11</td>";
echo "<td>$rvia12</td>";
echo "<td>$totalvia</td>";
echo "</tr>";
}
				
		  echo"</tbody>";
		  echo"</table>";
		  echo"</div>";
		  echo"</div>";
		  echo"</div>";
		  echo"</div>";
		  
		   //echo "<a class='btn btn-success' href='rpt_excel/rpt_mdestino_Aanual_excel.php?dato=$partida1&option=$radiox&varia2=$anio'>Exportar Excel <img src='images/Excel-icon.png'></a>";
		   echo "</div></div></div>";
		   
		   ?>
		   
<style>
.chart {
  width: 100%; 
  min-height: 450px;
}
</style>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['<?php echo $nombres2 ?>', 'Valor Fob', 'Peso Neto(Kg)', 'Peso Bruto(Kg)'],
          ['Ene', <?php echo $vfob_01 ?>, <?php echo $vpes_01 ?>, <?php echo $vbru_01 ?>],
          ['Febr', <?php echo $vfob_02 ?>, <?php echo $vpes_02 ?>, <?php echo $vbru_02 ?>],
          ['Mar', <?php echo $vfob_03 ?>, <?php echo $vpes_03 ?>, <?php echo $vbru_03 ?>],
          ['Abr', <?php echo $vfob_04 ?>, <?php echo $vpes_04 ?>, <?php echo $vbru_04 ?>],
		  ['May', <?php echo $vfob_05 ?>, <?php echo $vpes_05 ?>, <?php echo $vbru_05 ?>],
		  ['Jun', <?php echo $vfob_06 ?>, <?php echo $vpes_06 ?>, <?php echo $vbru_06 ?>],
		  ['Jul', <?php echo $vfob_07 ?>, <?php echo $vpes_07 ?>, <?php echo $vbru_07 ?>],
		  ['Agos', <?php echo $vfob_08 ?>, <?php echo $vpes_08 ?>, <?php echo $vbru_08 ?>],
		  ['Sept', <?php echo $vfob_09 ?>, <?php echo $vpes_09 ?>, <?php echo $vbru_09 ?>],
		  ['Oct', <?php echo $vfob_10 ?>, <?php echo $vpes_10 ?>, <?php echo $vbru_10 ?>],
		  ['Nov', <?php echo $vfob_11 ?>, <?php echo $vpes_11 ?>, <?php echo $vbru_11 ?>],
		  ['Dic', <?php echo $vfob_12 ?>, <?php echo $vpes_12 ?>, <?php echo $vbru_12 ?>]
        ]);

        var options = {
          chart: {
            title: 'Reporte Analisis Empresa Mensual <?php echo $paisname ?> - Departamento: <?=$namedepa1;?> - Exportaciones',
            subtitle: 'Valor Fob, Peso Neto(Kg), y Peso Bruto(Kg): Enero - Diciembre <?php echo $anio ?>',
          },
          bars: 'vertical',
          vAxis: {format: 'decimal'},
          height: 400,
          colors: ['#e73827', '#feb645', '#54b345']
        };

        var chart = new google.charts.Bar(document.getElementById('chart_div'));

        chart.draw(data, google.charts.Bar.convertOptions(options));

        var btns = document.getElementById('btn-group');

        btns.onclick = function (e) {

          if (e.target.tagName === 'BUTTON') {
            options.vAxis.format = e.target.id === 'none' ? '' : e.target.id;
            chart.draw(data, google.charts.Bar.convertOptions(options));
          }
        }
      }
    </script>
           <div class="col-md-12 ml-auto mr-auto" id="emp">
	<div id="chart_div" class="chart"></div>
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
    $('#datatablese').DataTable({
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