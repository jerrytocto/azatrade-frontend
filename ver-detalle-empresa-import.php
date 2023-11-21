<?php
session_start();
if (isset($_SESSION['login_usuario'])){
}else{
	if(!isset($_SESSION["login_usuario"]) || $_SESSION["login_usuario"]==null){
	//print "<script>alert('Acceso invalido! - Inicia Sesion para Acceder');window.location='$enlace_actual';</script>";
	//print "<script>window.location='login/';</script>";
}
}
ini_set('memory_limit', '5800M'); // uso de memoria 3.8G
set_time_limit(55000);
include("conex/inibd.php");
$code1 = $_GET["dat"];
$code2 = $_GET["year"];
$code3 = $_GET["pk"];
$code4 = $_GET["flat"];
$aniogen = date("Y");

if($code4=="1"){
	$nommes = "Enero";
}else if($code4=="2"){
	$nommes = "Febrero";
}else if($code4=="3"){
	$nommes = "Marzo";
}else if($code4=="4"){
	$nommes = "Abril";
	}else if($code4=="5"){
	$nommes = "Mayo";
	}else if($code4=="6"){
	$nommes = "Junio";
	}else if($code4=="7"){
	$nommes = "Julio";
	}else if($code4=="8"){
	$nommes = "Agosto";
	}else if($code4=="9"){
	$nommes = "Septiembre";
	}else if($code4=="10"){
	$nommes = "Octubre";
	}else if($code4=="11"){
	$nommes = "Noviembre";
	}else if($code4=="12"){
	$nommes = "Diciembre";
}else{ $nommes = ""; }

// consultamos ruc
/*$seep = "SELECT CONCAT(dnombre,libr_tribu) as DNOMBRE1, CONCAT(dnombre,' - ',libr_tribu) as DNOMBRE2 FROM GranResumenImport_PowerBI WHERE libr_tribu='$code1' LIMIT 1";
$paeeqt = $conexpg -> prepare($seep);
$paeeqt -> execute(); 
$gees = $paeeqt -> fetchAll(PDO::FETCH_OBJ); 
if($paeeqt -> rowCount() > 0) { 
foreach($gees as $dex) {
	$epo1 = $dex -> DNOMBRE1;
	$epo2 = $dex -> DNOMBRE2;
}
}else{
	$epo1 = "";
	$epo2 = "";
}*/

// consultamos partida
$sqtrp = "SELECT prod_especifico,presentacion,partida_desc FROM productos WHERE partida_nandi='$code3' LIMIT 1";
$partslqt = $conexpg -> prepare($sqtrp);
$partslqt -> execute(); 
$ggts = $partslqt -> fetchAll(PDO::FETCH_OBJ); 
if($partslqt -> rowCount() > 0) { 
foreach($ggts as $dsx) {
	$ppo1x = $dsx -> presentacion;
	$ppo2x = $dsx -> prod_especifico;
	$ppo3x = $dsx -> partida_desc;
	$ppo1 = $ppo1x." │ ".$ppo2x." │ ".$ppo3x;
}
}else{
	$ppo1 = "";
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Azatrade - Detalle Importaci&oacute;n</title>

    <meta name="keywords" content="azatrade, exportacion, importacion, arancel, aduana, dua, comercial, inteligencia comercial" />
    <meta name="" content="Azatrade - Sistema de Inteligencia Comercial">
    <meta name="author" content="AZATRADE">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/images/favicon.ico">


    <script>
        WebFontConfig = {
            google: {
                families: ['Open+Sans:300,400,600,700', 'Poppins:300,400,500,600,700,800', 'Oswald:300,400,500,600,700,800', 'Playfair+Display:900', 'Shadows+Into+Light:400']
            }
        };
        (function(d) {
            var wf = d.createElement('script'),
                s = d.scripts[0];
            wf.src = 'assets/js/webfont.js';
            wf.async = true;
            s.parentNode.insertBefore(wf, s);
        })(document);
    </script>

    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- Main CSS File -->
    <link rel="stylesheet" href="assets/css/demo1.min.css?ter=133">
    <link rel="stylesheet" type="text/css" href="assets/vendor/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/simple-line-icons/css/simple-line-icons.min.css">
	
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.dataTables.min.css">
	
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap4.min.css">
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"> -->
	<!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap4.min.css"> -->
	<link rel="stylesheet" href="assets/css/buttons.dataTables.min.css">
	
	
</head>

<body>
    <div class="page-wrapper">
         <!-- <div class="top-notice text-white bg-dark">
            <div class="container text-center">
                <h5 class="d-inline-block mb-0">Get Up to <b>40% OFF</b> New-Season Styles</h5>
                <a href="demo1-shop.html" class="category">MEN</a>
                <a href="demo1-shop.html" class="category">WOMEN</a>
                <small>* Limited time only.</small>
                <button title="Close (Esc)" type="button" class="mfp-close">×</button>
            </div>
        </div> -->

        <header class="header home">
<?php include("menu-superior.php"); ?>
<?php include("menu-flotante.php"); ?>
        </header>
        <!-- End .header -->

        <main class="main home">
			<!-- <p><center><a href="#"><b>CONSULTA AVANZADA</b> <i class="icon-search-3"></i> </a></center></p> -->
             <div class="container mb-2">
                 <div class="info-boxes-container row row-joined mb-2 font2">
                    <!-- <div class="info-box info-box-icon-left col-lg-4">
                        <i class="icon-company"></i>

                        <div class="info-box-content">
                            <h4><?=$epo2;?></h4>
                            <p class="text-body">RUC: <?=$epo1;?></p>
                        </div>
                    </div> -->
                    <div class="info-box info-box-icon-left col-lg-4">
                        <i class="icon-money"></i>

                        <div class="info-box-content">
                            <h4>Partida #: <?=$code3;?> │ </h4>
                            <p class="text-body"><?=$ppo1;?></p> 
                        </div>
                    </div>
                    <div class="info-box info-box-icon-left col-lg-4">
                        <i class="icon-support"></i>

                        <div class="info-box-content">
                            <h4>SOPORTE ONLINE 24/7</h4>
                            <p class="text-body">Escribenos con nuestro soporte en linea por <a href="" target="_blank">WhastApp clic AQUÍ</a></p>
                        </div>
                    </div>
                </div>  
				 </div>
			</main>
				  
			<main class="main banners-page">
			<section class="kenBurns-section mt-5 pt-5">
				<h3 class="text-center">Reporte detallado de Importaciones de la partida y empresa seleccionada - Año: <?=$code2;?> │ Mes: <?=$nommes;?></h3>
				<!--<p class="text-center mx-auto mb-3">Here, you can see Kenburns effect. It adds perspective effect to
					your banner.</p> -->
				<!--<div class="banner ken-banner" style="background: #e2e2e0">
					<figure class="kenBurnsToRight" style="animation-duration: 20s">
						<img class="slide-bg" src="assets/images/elements/banners/slide3.jpg" alt="slider image"
							width="1200" height="575" style="background-color: #ccc;">
					</figure>
					<div class="container">
						<div class="banner-layer banner-layer-middle banner-layer-left">
							<div class="appear-animate animated fadeInLeftShorter appear-animation-visible"
								data-animation-name="fadeInLeftShorter" data-animation-delay="200"
								style="animation-duration: 1000ms;">
								<h2 class="font-weight-light ls-10">Discover our Arrivals!</h2>
								<a href="#" class="btn btn-link">View our Dresses<i class="icon-right-open-big"></i></a>
							</div>
						</div>
					</div>
				</div>-->
				
				<div class="table-responsive" style="padding: 28px;">
						<table id='datatablese' class='table table-striped table-no-bordered table-hover compact' cellspacing='0' width='100%' style='width:100%'>
							<thead>
                          <tr>
   <th>&nbsp;</th>
   <th>Nª</th>
   <th>C&Oacute;DIGO</th>
   <th>ADUANA</th>
   <th>AÑO&nbsp;DUI</th>
   <th>N&Uacute;MERO&nbsp;DUI</th>
   <th>FECHA&nbsp;NUM.&nbsp;DUI</th>
   <th>TIPO&nbsp;DOCU.&nbsp;M.</th>
   <th>RUC</th>
   <th>RAZON&nbsp;SOCIAL&nbsp;IMPORTADOR</th>
   <th>C&Oacute;DIGO</th>
   <th>AGENTE&nbsp;ADUANA</th>
   <th>FECHA&nbsp;LLEGADA DE&nbsp;NAVE</th>
   <th>C&Oacute;DIGO V&Iacute;A&Oacute;TRANSP.</th>
   <th>V&Iacute;A&nbsp;DE&nbsp;TRANSP.</th>
   <th>C&Oacute;DIGO&nbsp;EMPRESA DE&nbsp;TRANSPORTE</th>
   <th>C&Oacute;DIGO&nbsp;ALMAC&Eacute;N</th>
   <th>ADUANA&nbsp;MANIFIESTO</th>
   <th>AÑO&nbsp;MANIFIESTO</th>
   <th>N&Uacute;MERO.&nbsp;MANIFIESTO</th>
   <th>FECHA&nbsp;RECEPCI&Oacute;N DE&nbsp;DUI</th>
   <th>FECHA&nbsp;CANCELACI&Oacute;N</th>
   <th>TIPO&nbsp;CANCELACI&Oacute;N</th>
   <th>C&Oacute;DIGO&nbsp;BANCO CANCELACI&Oacute;N</th>
   <th>C&Oacute;DIGO&nbsp;ENTIDAD FINANCIERA</th>
   <th>INDICADOR&nbsp;TELEDESPACHO</th>
   <th>C&Oacute;DIGO&nbsp;PA&Iacute;S ORIGEN</th>
   <th>PA&Iacute;S&nbsp;ORIGEN</th>
   <th>C&Oacute;DIGO&nbsp;PAIS&nbsp;ADQ</th>
   <th>PA&Iacute;S&nbsp;ADQUISICI&Oacute;N</th>
   <th>C&Oacute;DIGO&nbsp;PUERTO</th>
   <th>PUERTO&nbsp;EMBARQUE</th>
   <th>N&Uacute;MERO&nbsp;SERIE</th>
   <th>PARTIDA</th>
   <!--<th>Descripcion&nbsp;Comercial</th>-->
   <th>DESCRIPCI&Oacute;N&nbsp;COMERCIAL</th>
   <th>MATERIAL&nbsp;DE ELABORACI&Oacute;N</th>
   <th>USO</th>
   <th>PRESENTACI&Oacute;N</th>
   <th>DESCRIPCI&Oacute;N&nbsp;OTROS</th>
   <th>VALOR&nbsp;FOB USD</th>
   <th>VALOR&nbsp;FLETE USD</th>
   <th>VALOR&nbsp;SEGURO USD</th>
   <th>PESO&nbsp;NETO KG</th>
   <th>Peso&nbsp;BRUTO KG</th>
   <th>CANTIDAD IMPORTADA</th>
   <th>UNIDAD DE&nbsp;MEDIDA</th>
   <th>CANTIDAD COMERCIAL</th>
   <th>UNIDAD COMERCIAL</th>
   <th>ESTADO&nbsp;MERCADER&Iacute;A</th>
   <th>ADV&nbsp;USD</th>
   <th>IGV&nbsp;USD</th>
   <th>ISC&nbsp;USD</th>
   <th>IPM&nbsp;USD</th>
   <th>DERECHO&nbsp;ESPEC&Iacute;FICO USD</th>
   <th>IMPUESTO&nbsp;ADICIONAL USD</th>
   <th>SOBRETASA&nbsp;USD</th>
   <th>DERECHO&nbsp;ANTIDUMPING USD</th>
   <th>COMMODITIES</th>
   <th>FECHA&nbsp;MODIFICACI&Oacute;N DUI</th>
   <th>CANTIDAD&nbsp;DE BULTOS</th>
   <th>CLASE&nbsp;DE BULTOS</th>
   <th>TRATO&nbsp;PREFERENCIAL</th>
   <th>TIPO&nbsp;TRATAMIENTO</th>
   <th>C&Oacute;DIGO&nbsp;LIBERTORIO</th>
   <th>INDICADOR&nbsp;DE RELIQUIDACI&Oacute;N</th>
							<tfoot>
                          <tr>
							  <th>&nbsp;</th>
                              <th>Nª</th>
   <th>C&Oacute;DIGO</th>
   <th>ADUANA</th>
   <th>AÑO&nbsp;DUI</th>
   <th>N&Uacute;MERO&nbsp;DUI</th>
   <th>FECHA&nbsp;NUM.&nbsp;DUI</th>
   <th>TIPO&nbsp;DOCU.&nbsp;M.</th>
   <th>RUC</th>
   <th>RAZON&nbsp;SOCIAL&nbsp;IMPORTADOR</th>
   <th>C&Oacute;DIGO</th>
   <th>AGENTE&nbsp;ADUANA</th>
   <th>FECHA&nbsp;LLEGADA DE&nbsp;NAVE</th>
   <th>C&Oacute;DIGO V&Iacute;A&Oacute;TRANSP.</th>
   <th>V&Iacute;A&nbsp;DE&nbsp;TRANSP.</th>
   <th>C&Oacute;DIGO&nbsp;EMPRESA DE&nbsp;TRANSPORTE</th>
   <th>C&Oacute;DIGO&nbsp;ALMAC&Eacute;N</th>
   <th>ADUANA&nbsp;MANIFIESTO</th>
   <th>AÑO&nbsp;MANIFIESTO</th>
   <th>N&Uacute;MERO.&nbsp;MANIFIESTO</th>
   <th>FECHA&nbsp;RECEPCI&Oacute;N DE&nbsp;DUI</th>
   <th>FECHA&nbsp;CANCELACI&Oacute;N</th>
   <th>TIPO&nbsp;CANCELACI&Oacute;N</th>
   <th>C&Oacute;DIGO&nbsp;BANCO CANCELACI&Oacute;N</th>
   <th>C&Oacute;DIGO&nbsp;ENTIDAD FINANCIERA</th>
   <th>INDICADOR&nbsp;TELEDESPACHO</th>
   <th>C&Oacute;DIGO&nbsp;PA&Iacute;S ORIGEN</th>
   <th>PA&Iacute;S&nbsp;ORIGEN</th>
   <th>C&Oacute;DIGO&nbsp;PAIS&nbsp;ADQ</th>
   <th>PA&Iacute;S&nbsp;ADQUISICI&Oacute;N</th>
   <th>C&Oacute;DIGO&nbsp;PUERTO</th>
   <th>PUERTO&nbsp;EMBARQUE</th>
   <th>N&Uacute;MERO&nbsp;SERIE</th>
   <th>PARTIDA</th>
   <!--<th>Descripcion&nbsp;Comercial</th>-->
   <th>DESCRIPCI&Oacute;N&nbsp;COMERCIAL</th>
   <th>MATERIAL&nbsp;DE ELABORACI&Oacute;N</th>
   <th>USO</th>
   <th>PRESENTACI&Oacute;N</th>
   <th>DESCRIPCI&Oacute;N&nbsp;OTROS</th>
   <th>VALOR&nbsp;FOB USD</th>
   <th>VALOR&nbsp;FLETE USD</th>
   <th>VALOR&nbsp;SEGURO USD</th>
   <th>PESO&nbsp;NETO KG</th>
   <th>Peso&nbsp;BRUTO KG</th>
   <th>CANTIDAD IMPORTADA</th>
   <th>UNIDAD DE&nbsp;MEDIDA</th>
   <th>CANTIDAD COMERCIAL</th>
   <th>UNIDAD COMERCIAL</th>
   <th>ESTADO&nbsp;MERCADER&Iacute;A</th>
   <th>ADV&nbsp;USD</th>
   <th>IGV&nbsp;USD</th>
   <th>ISC&nbsp;USD</th>
   <th>IPM&nbsp;USD</th>
   <th>DERECHO&nbsp;ESPEC&Iacute;FICO USD</th>
   <th>IMPUESTO&nbsp;ADICIONAL USD</th>
   <th>SOBRETASA&nbsp;USD</th>
   <th>DERECHO&nbsp;ANTIDUMPING USD</th>
   <th>COMMODITIES</th>
   <th>FECHA&nbsp;MODIFICACI&Oacute;N DUI</th>
   <th>CANTIDAD&nbsp;DE BULTOS</th>
   <th>CLASE&nbsp;DE BULTOS</th>
   <th>TRATO&nbsp;PREFERENCIAL</th>
   <th>TIPO&nbsp;TRATAMIENTO</th>
   <th>C&Oacute;DIGO&nbsp;LIBERTORIO</th>
   <th>INDICADOR&nbsp;DE RELIQUIDACI&Oacute;N</th>
                          </tr>
                      </tfoot>
							<tbody>
						<?php
	
	/*$sqtrp = "SELECT i.*
FROM importacion AS i
WHERE
YEAR(i.fech_ingsi) = '$id' AND
MONTH(i.fech_ingsi) = '$da11' AND
i.part_nandi = '$dat7' AND
i.pais_adqui = '$dat9' AND
i.codi_aduan = '$dat10' AND
CONCAT(i.desc_comer,' ',i.desc_matco,' ',i.desc_usoap,' ',i.desc_fopre,' ',i.desc_otros,' ',i.part_nandi) LIKE '%$dat6%' ";*/
								
//$sqtrp = "SELECT i.* FROM importacion AS i WHERE YEAR(i.fech_ingsi) = '$code2' AND MONTH(i.fech_ingsi) = '$code4' AND libr_tribu ='$code1' AND part_nandi='$code3' ";
$sqtrp = "SELECT i.* FROM importacion AS i WHERE YEAR(i.fech_ingsi) = '$code2' AND MONTH(i.fech_ingsi) = '$code4' AND i.part_nandi='$code3' AND CONCAT(i.dnombre,i.libr_tribu)='$code1'  limit 1000 ";
$partslqt = $conexpg -> prepare($sqtrp); 
$partslqt -> execute(); 
$ggts = $partslqt -> fetchAll(PDO::FETCH_OBJ); 
if($partslqt -> rowCount() > 0) { 
foreach($ggts as $fila_creg) {
	$iteespact = $iteespact + 1;
	       $impor1 = $fila_creg -> codi_aduan;
		   $impor2 = $fila_creg -> descripcion;
	       $impor3 = $fila_creg -> ano_prese;
	       $impor4 = $fila_creg  -> nume_corre;
	       $impor5 = $fila_creg  -> fech_ingsi;
		   $impor6 = $fila_creg -> tipo_docum;
		   $impor7 = $fila_creg -> libr_tribu;
		   $impor8 = $fila_creg -> dnombre;
		   $impor9 = $fila_creg -> codi_agent; //consutar el codigo en la tabla agente
		   $impor10 = $fila_creg -> fech_llega;
		   $impor11 = $fila_creg -> via_transp;
		   $impor12 = $fila_creg -> viatransp;
		   $impor13 = $fila_creg -> empr_trans;
		   $impor14 = $fila_creg -> codi_alma;
		   $impor15 = $fila_creg -> cadu_manif;
		   $impor16 = $fila_creg -> fech_manif;
		   $impor17 = $fila_creg -> nume_manif;
	       $impor18 = $fila_creg -> fech_recep;
		   $impor19 = $fila_creg -> fech_cance;
		   $impor20 = $fila_creg -> tipo_cance;
		 /*$valor_fob = number_format($fila_creg['VFOBSERDOL'],2); 
		 $valor_net = number_format($fila_creg['VPESNET'],2);
		 $valor_bru = number_format($fila_creg['VPESBRU'],2);
		 $valor_A = number_format($fila_creg['QUNIFIS'],2);*/
		  $impor21 = $fila_creg -> banc_cance;
		  $impor22 = $fila_creg -> codi_enfin;
		  $impor23 = $fila_creg -> dk;
		  $impor24 = $fila_creg -> pais_orige;
		  $impor25 = $fila_creg -> pais1;
	      $impor26 = $fila_creg -> pais_adqui;
		  $impor27 = $fila_creg  -> pais2;
		  $impor28 = $fila_creg -> puer_embar;
		  $impor29 = $fila_creg -> puerto;
		  $impor30 = $fila_creg -> nume_serie;
			 $impor31 = $fila_creg -> part_nandi;
	if(strlen($impor31)=='9'){
		$tpartd = '0'.$impor31;
	}else{
		$tpartd = $impor31;
	}
			 $impor32 = $fila_creg -> desc_comer;
			 $impor33 = $fila_creg -> desc_matco;
			 $impor34 = $fila_creg -> desc_usoap;
			 $impor35 = $fila_creg -> desc_fopre;
			 $impor36 = $fila_creg -> desc_otros;
			 $impor37 = number_format($fila_creg -> fob_dolpol,2);
			 $impor38 = number_format($fila_creg -> fle_dolar,2);
			 $impor39 = number_format($fila_creg -> seg_dolar,2);
			 $impor40 = number_format($fila_creg -> peso_neto,2);
			 $impor41 = number_format($fila_creg -> peso_bruto,2);
			 $impor42 = number_format($fila_creg -> unid_fiqty,2);
			 $impor43 = $fila_creg -> unid_fides;
			 $impor44 = number_format($fila_creg -> qunicom,2);//CANTIDAD DE UNIDAD COMERCIAL
			 $impor45 = $fila_creg -> tunicom;
			 $impor46 = $fila_creg -> sest_merca;
			 $impor47 = number_format($fila_creg -> adv_dolar,2);
			 $impor48 = number_format($fila_creg -> igv_dolar,2);
			 $impor49 = number_format($fila_creg -> isc_dolar,2);
			 $impor50 = number_format($fila_creg -> ipm_dolar,2);
			 $impor51 = number_format($fila_creg -> des_dolar,2);
			 $impor52 = number_format($fila_creg -> ipa_dolar,2);
			 $impor53 = number_format($fila_creg -> sad_dolar,2);
			 $impor54 = number_format($fila_creg -> der_adum,2);
			 $impor55 = number_format($fila_creg -> comm,2);
			 $impor56 = $fila_creg -> fmod;
			 $impor57 = number_format($fila_creg -> cant_bulto,2);
			 $impor58 = $fila_creg -> clase;
			 $impor59 = $fila_creg -> trat_prefe;
			 $impor60 = $fila_creg -> tipo_trat;
			 $impor61 = $fila_creg -> codi_liber;
			 $impor62 = $fila_creg -> impr_reliq;
	
	//consultanos agente
	$sqlage = "select aa.agencia from agente aa where aa.idagente = '$impor9' limit 1";
	$rredpt = $conexpg -> prepare($sqlage); 
$rredpt -> execute(); 
$txrr = $rredpt -> fetchAll(PDO::FETCH_OBJ); 
if($rredpt -> rowCount() > 0) { 
foreach($txrr as $dffx) {	
	$nom_agente = $dffxagente;
}
}else{
	$nom_agente = "---";
}
	
	 echo"<tr>";
	  echo"<td></td>";
	echo"<td>$iteespact</td>";
	  echo '<td>'.$impor1.'</td>';
   echo '<td>'.$impor2.'</td>';
   echo '<td>'.$impor3.'</td>';
   echo '<td>'.$impor4.'</td>';
   echo '<td>'.$impor5.'</td>';
   echo '<td>'.$impor6.'</td>';
   echo '<td>'.$impor7.'</td>';
   echo '<td>'.$impor8.'</td>';
   echo '<td>'.$impor9.'</td>';
   echo '<td>'.$nom_agente.'</td>';
   echo '<td>'.$impor10.'</td>';
   echo '<td>'.$impor11.'</td>';
   echo '<td>'.$impor12.'</td>';
   echo '<td>'.$impor13.'</td>';
   echo '<td>'.$impor14.'</td>';
   echo '<td>'.$impor15.'</td>';
   echo '<td>'.$impor16.'</td>';
   echo '<td>'.$impor17.'</td>';
   echo '<td>'.$impor18.'</td>';
   echo '<td>'.$impor19.'</td>';
   echo '<td>'.$impor20.'</td>';
   echo '<td>'.$impor21.'</td>';
   echo '<td>'.$impor22.'</td>';
   echo '<td>'.$impor23.'</td>';
   echo '<td>'.$impor24.'</td>';
   echo '<td>'.$impor25.'</td>';
   echo '<td>'.$impor26.'</td>';
   echo '<td>'.$impor27.'</td>';
   echo '<td>'.$impor28.'</td>';
   echo '<td>'.$impor29.'</td>';
   echo '<td>'.$impor30.'</td>';
			 echo '<td>'.$tpartd.'</td>';
			 echo '<td>'.$impor32.'</td>';
			 echo '<td>'.$impor33.'</td>';
			 echo '<td>'.$impor34.'</td>';
			 echo '<td>'.$impor35.'</td>';
			 echo '<td>'.$impor36.'</td>';
			 echo '<td>'.$impor37.'</td>';
			 echo '<td>'.$impor38.'</td>';
			 echo '<td>'.$impor39.'</td>';
			 echo '<td>'.$impor40.'</td>';
			 echo '<td>'.$impor41.'</td>';
			 echo '<td>'.$impor42.'</td>';
			 echo '<td>'.$impor43.'</td>';
			 echo '<td>'.$impor44.'</td>';
			 echo '<td>'.$impor45.'</td>';
			 echo '<td>'.$impor46.'</td>';
			 echo '<td>'.$impor47.'</td>';
			 echo '<td>'.$impor48.'</td>';
			 echo '<td>'.$impor49.'</td>';
			 echo '<td>'.$impor50.'</td>';
			 echo '<td>'.$impor51.'</td>';
			 echo '<td>'.$impor52.'</td>';
			 echo '<td>'.$impor53.'</td>';
			 echo '<td>'.$impor54.'</td>';
			 echo '<td>'.$impor55.'</td>';
			 echo '<td>'.$impor56.'</td>';
			 echo '<td>'.$impor57.'</td>';
			 echo '<td>'.$impor58.'</td>';
			 echo '<td>'.$impor59.'</td>';
			 echo '<td>'.$impor60.'</td>';
			 echo '<td>'.$impor61.'</td>';
			 echo '<td>'.$impor62.'</td>'; 
	  echo"</tr>";
}
}else{
	
}
						?>
								</tbody>
						</table> 
							</div>
					<?php if($iteespact>='1000'){ ?> <br>  <p align="center">Hay mas registros encontrados <a href="descargar_excel_merca_import.php?year=<?=$code2;?>&pk=<?=$code3;?>&flat=<?=$code4;?>&dat=<?=$code1;?>" class="btn btn-dark btn-outline-dark" >Descargar todo en excel</a> </p> <?php  } ?>
				
			</section>
				
                <div class="row">
					
					
                    <div class="col-lg-12">
						<br><br><br>
                    </div>
                    <!-- End .col-lg-9 -->
                </div>
                <!-- End .row -->
            <!--</div> -->
            <!-- End .container -->
        </main>
        <!-- End .main -->

<?php include("footer.php"); ?>
				
    </div>
    <!-- End .page-wrapper -->
<?php include("menu-movil.php"); ?>
<?php include("menu-pie.php"); ?>

    <a id="scroll-top" href="#top" title="Top" role="button"><i class="icon-angle-up"></i></a>

    <!-- Plugins JS File -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/plugins.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.appear.min.js"></script>
    <script src="assets/js/jquery.plugin.min.js"></script>
    <script src="assets/js/jquery.countdown.min.js"></script>

    <!-- Main JS File -->
    <script src="assets/js/main.min.js"></script>
	
	<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
		
<script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>
		
    <script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap4.min.js"></script>
	
	<script type="text/javascript" src="assets/js/jsexport/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="assets/js/jsexport/buttons.flash.min.js"></script>
    <script type="text/javascript" src="assets/js/jsexport/jszip.min.js"></script>
    <script type="text/javascript" src="assets/js/jsexport/pdfmake.min.js"></script>
    <script type="text/javascript" src="assets/js/jsexport/vfs_fonts.js"></script>
    <script type="text/javascript" src="assets/js/jsexport/buttons.html5.min.js"></script>
    <script type="text/javascript" src="assets/js/jsexport/buttons.print.min.js"></script>
	
	<script>		
	$(document).ready(function() {
    $('#datatablese').DataTable({
		"order": [[ 0, "asc" ]],
		dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        "pagingType": "full_numbers",
        "lengthMenu": [
            [20, 25, 50, -1],
            [20, 25, 50, "Todos"]
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
</body>
</html>