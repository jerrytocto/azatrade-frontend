<?php
session_start();
if (isset($_SESSION['login_usuario'])){
}else{
	if(!isset($_SESSION["login_usuario"]) || $_SESSION["login_usuario"]==null){
	//print "<script>alert('Acceso invalido! - Inicia Sesion para Acceder');window.location='$enlace_actual';</script>";
	//print "<script>window.location='login/';</script>";
}
}
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
	$nommes = "Dicie,bre";
}else{ $nommes = ""; }

//consultamos
$seep = "SELECT espanol, siglas FROM paises WHERE idpaises='$code1' LIMIT 1";
$paeeqt = $conexpg -> prepare($seep);
$paeeqt -> execute(); 
$gees = $paeeqt -> fetchAll(PDO::FETCH_OBJ); 
if($paeeqt -> rowCount() > 0) { 
foreach($gees as $dex) {
	$epo1 = $dex -> siglas;
	$epo2 = $dex -> espanol;
}
}else{
	$epo1 = "";
	$epo2 = "";
}

//consultamos partida
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

    <title>Azatrade - Detalle</title>

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
                    <div class="info-box info-box-icon-left col-lg-4">
                        <i class="icon-company"></i>

                        <div class="info-box-content">
                            <h4><?=$epo2;?></h4>
                            <p class="text-body">Siglas: <?=$epo1;?></p>
                        </div>
                    </div>
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
				<h3 class="text-center">Reporte detallado de exportaciones de la partida y mercado seleccionada - Año: <?=$code2;?> │ Mes: <?=$nommes;?></h3>
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
   <th>N°</th>
   <th>A&ntilde;o</th>
   <th>Fecha</th>
   <th>Aduana</th>
   <th>DUA</th>
   <th>Documento</th>
   <th>Empresa</th>
   <th>Direcci&oacute;n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
   <th>Departamento</th>
   <th>Provincia</th>
   <th>Distrito</th>
   <th>Partida</th>
   <th>Descripci&oacute;n&nbsp;Producto&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
   <th>Pa&iacute;s</th>
   <th>Puerto</th>
   <th>V&iacute;a Transp.</th>
   <th>Unid. Transp.</th>
   <th>Descrip. Transp.</th>
   <th>Agente</th>
   <th>Recinto Aduanero</th>
   <th>Banco</th>
   <th>Valor FOB USD.</th>
   <th>Peso Neto</th>
   <th>Peso Bruto</th>
   <th>Cant. Exportada</th>
   <th>Unid. Medida</th>
   <th>Cant. Comercial(Kg)</th>
   <th>Unid. Comerc.</th>
   <th>Precio Unit.(x Kg)</th>
   <th>Precio Unit. (x Unid.Med.)</th>
   <th>Precio Unit. (x Unid.Comerc.)</th>
   <th>Peso (Envase/Embalaje)</th>
   <th>Sector</th>
							<tfoot>
                          <tr>
							  <th>&nbsp;</th>
   <th>N°</th>
   <th>A&ntilde;o</th>
   <th>Fecha</th>
   <th>Aduana</th>
   <th>DUA</th>
   <th>Documento</th>
   <th>Empresa</th>
   <th>Direcci&oacute;n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
   <th>Departamento</th>
   <th>Provincia</th>
   <th>Distrito</th>
   <th>Partida</th>
   <th>Descripci&oacute;n&nbsp;Producto&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
   <th>Pa&iacute;s</th>
   <th>Puerto</th>
   <th>V&iacute;a Transp.</th>
   <th>Unid. Transp.</th>
   <th>Descrip. Transp.</th>
   <th>Agente</th>
   <th>Recinto Aduanero</th>
   <th>Banco</th>
   <th>Valor FOB USD.</th>
   <th>Peso Neto</th>
   <th>Peso Bruto</th>
   <th>Cant. Exportada</th>
   <th>Unid. Medida</th>
   <th>Cant. Comercial(Kg)</th>
   <th>Unid. Comerc.</th>
   <th>Precio Unit.(x Kg)</th>
   <th>Precio Unit. (x Unid.Med.)</th>
   <th>Precio Unit. (x Unid.Comerc.)</th>
   <th>Peso (Envase/Embalaje)</th>
   <th>Sector</th>
                          </tr>
                      </tfoot>
							<tbody>
						<?php
								
$sqtrp="SELECT
YEAR(e.FNUM) as anio,
MONTH(e.FNUM) as mes,
e.FNUM,
e.NDCL,
e.CADU,
e.FEMB,
e.NDOC,
e.DNOMPRO,
e.DDIRPRO,
e.UBIGEO,
e.PART_NANDI,
e.NSER,
e.CPAIDES,
e.CPUEDES,
e.CVIATRA,
e.DMAT,
e.NCON,
e.CAGE,
'aa' as agente,
e.CALM,
e.VFOBSERDOL,
e.VPESNET,
e.VPESBRU,
e.QUNIFIS,
e.TUNIFIS,
e.QUNICOM,
e.TUNICOM,
CONCAT(e.DCOM,' ',e.DMER2,' ',e.DMER3,' ',e.DMER4,' ',e.DMER5) AS dcom,
substring(e.ubigeo,1,2),
substring(e.ubigeo,3,2),
substring(e.ubigeo,5,2),
a.descripcion AS aduana,
em.descripcion AS estmercancia,
p.espanol AS paisdestino,
pu.puerto,
vt.descripcion AS viatransporte,
ba.banco,
'ss' AS sector,
uu.descripcion AS undmedida,
ubi.nombredistrito,
ubi.nombreprov,
ubi.nombredepartamento,
recint_aduaner.razon_social as recinto_aduanero,
(case e.cunitra 
		when '1' then 'BARCO' 
		when '4' then 'AVION' 
		when '6' then 'FERROCARRIL' 
		when '7' then 'CAMION' 
		when '8' then 'POR TUBERIAS' 
	else 'OTRAS' end) as unidadtransporte,
(case e.vpesnet when 0 then 0 else (e.vfobserdol/e.vpesnet) end) as pesounitkg,
	(case e.qunifis when 0 then 0 else (e.vfobserdol/e.qunifis) end) as preciounitxundmedida,
	(case e.qunicom when 0 then 0 else (e.vfobserdol/e.qunicom) end) as preciounitxunidcomercial,
	(case e.vpesnet when 0 then 0 else (e.vpesbru/e.vpesnet) end) as pesoenvaseyembalaje
FROM
exportacion AS e
LEFT JOIN aduana AS a ON e.CADU = a.codadu
LEFT JOIN estmercancia AS em ON e.CEST = em.idestmercancia
LEFT JOIN paises AS p ON e.CPAIDES = p.idpaises
LEFT JOIN puerto AS pu ON e.CPUEDES = pu.idcodigo
LEFT JOIN viastransporte AS vt ON e.CVIATRA = vt.idviastransporte
LEFT JOIN banco AS ba ON substring(e.centfin,2,2)= ba.idbanco
LEFT JOIN unidmedida AS uu ON e.TUNIFIS = uu.idunidmedida
LEFT JOIN ubigeo AS ubi ON e.UBIGEO = ubi.cubigeo
LEFT JOIN (select idrecintaduaner, razon_social from recintaduaner group by idrecintaduaner, razon_social)as recint_aduaner On (recint_aduaner.idrecintaduaner=e.calm)
WHERE

e.PART_NANDI = '$code3'
  and YEAR(e.FNUM) = '$code2'
  and MONTH(e.FNUM) = '$code4'
	/*and e.CADU like '%".$aduana."%'*/
	and e.cpaides = '$code1'
	/*and substring(e.UBIGEO,1,2) like '%".$depa."%'
	and substring(e.UBIGEO,3,2) like '%'
	and substring(e.UBIGEO,5,2) like '%'
and CONCAT(e.DCOM,' ',e.DMER2,' ',e.DMER3,' ',e.DMER4,' ',e.DMER5) like '%".$campode."%'	
	and e.CPAIDES like '%".$pais."%'
	and e.CPUEDES like '%'
	and e.CUNITRA like '%'
	and e.CVIATRA like '%'
	and e.CAGE like '%'
	and e.TUNIFIS like '%'
	and e.TUNICOM like '%'*/ ";
								
								
						$partslqt = $conexpg -> prepare($sqtrp); 
$partslqt -> execute(); 
$ggts = $partslqt -> fetchAll(PDO::FETCH_OBJ); 
if($partslqt -> rowCount() > 0) { 
foreach($ggts as $dsx) {
	$cuen = $cuen + 1;

	$annio = $dsx ->anio;
	  $fecha = $dsx ->FNUM ;
	   $adua = $dsx ->aduana;
	   $numdua = $dsx ->NDCL;
	    $numdoc = $dsx ->NDOC;
		 $nomempresa = $dsx ->DNOMPRO;
		 $direempresa = $dsx ->DDIRPRO;
		 //$ubigeoempresa = $fila_parti['ubigeo2'];
			 $ubigeoempresa = $dsx ->nombredepartamento;
			  $ubigeoprovi = $dsx ->nombreprov;
			  $ubigeodistri = $dsx ->nombredistrito;
		 $num_partida = $dsx ->PART_NANDI;
		 $descri_produ = $dsx ->dcom;
		 $pais_des = $dsx ->paisdestino;
		 $puerto_descri = $dsx ->puerto;
		 $via_transp = $dsx ->viatransporte;
		 $uni_transp = $dsx ->unidadtransporte;
		 
		 $descri_mat = $dsx ->DMAT;
	$cod_agente = $dsx ->CAGE;
		 //$nom_agente = $fila_parti['agente'];
		 $nom_aduanero = $dsx ->recinto_aduanero;
		 $nom_banco = $dsx ->banco;
		 $valor_fob = number_format($dsx ->VFOBSERDOL,2); 
		 $valor_net = number_format($dsx ->VPESNET,2);
		 $valor_bru = number_format($dsx ->VPESBRU,2);
		 $valor_A = number_format($dsx ->QUNIFIS,2);
		 $nom_unidad = $dsx ->undmedida;
		 $valor_B = number_format($dsx ->QUNICOM,2);
		 $unid_comer = $dsx ->TUNIFIS;
		 $peso_unit = number_format($dsx ->pesounitkg,2);
		 $precio_unitmed = number_format($dsx ->preciounitxundmedida,2);
		 $precio_unitcomerc = number_format($dsx ->preciounitxunidcomercial,2);
		 $peso_envemb = number_format($dsx ->pesoenvaseyembalaje,2);
		 //$nom_sector = $fila_parti['sector'];
			 
			 //consultanos sector
	$sqlsecto = "SELECT partida FROM sector where='$num_partida' ";
	$rxtdpt = $conexpg -> prepare($sqlsecto); 
$rxtdpt -> execute(); 
$txxs = $rxtdpt -> fetchAll(PDO::FETCH_OBJ); 
if($rxtdpt -> rowCount() > 0) { 
foreach($txxs as $dxpx) {
	$nom_sector = $dsxsector;
}
}else{
	$nom_sector = "---";
}
	//consultanos agente
	$sqlage = "select aa.agencia from agente aa where aa.idagente = '$cod_agente' limit 1";
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
	echo '<td>&nbsp;</td>';
   echo '<td>'.$cuen.'</td>';
   echo '<td>'.$annio.'</td>';
   echo '<td>'.$fecha.'</td>';
   echo '<td>'.$adua.'</td>';
   echo '<td>'.$numdua.'</td>';
   echo '<td>'.$numdoc.'</td>';
   echo '<td>'.$nomempresa.'</td>';
   echo '<td>'.$direempresa.'</td>';
   echo '<td>'.$ubigeoempresa.'</td>';
   echo '<td>'.$ubigeoprovi.'</td>';
   echo '<td>'.$ubigeodistri.'</td>';
   echo '<td>'.$num_partida.'</td>';
   echo '<td>'.$descri_produ.'</td>';
   echo '<td>'.$pais_des.'</td>';
   echo '<td>'.$puerto_descri.'</td>';
   echo '<td>'.$via_transp.'</td>';
   echo '<td>'.$uni_transp.'</td>';
   echo '<td>'.$descri_mat.'</td>';
   echo '<td>'.$nom_agente.'</td>';
   echo '<td>'.$nom_aduanero.'</td>';
   echo '<td>'.$nom_banco.'</td>';
   echo '<td>'.$valor_fob.'</td>';
   echo '<td>'.$valor_net.'</td>';
   echo '<td>'.$valor_bru.'</td>';
   echo '<td>'.$valor_A.'</td>';
   echo '<td>'.$nom_unidad.'</td>';
   echo '<td>'.$valor_B.'</td>';
   echo '<td>'.$unid_comer.'</td>';
   echo '<td>'.$peso_unit.'</td>';
   echo '<td>'.$precio_unitmed.'</td>';
   echo '<td>'.$precio_unitcomerc.'</td>';
   echo '<td>'.$peso_envemb.'</td>';
   echo '<td>'.$nom_sector.'</td>';
			
		echo"</tr>";
}
}else{
	
}
						?>
								</tbody>
						</table> 
							</div>
				
			</section>
				
                <div class="row">
					
					
                    <div class="col-lg-12">
						<!-- busqueda -->
						<!--<div class="table-responsive">
						<table id='datatablese' class='table table-striped table-no-bordered table-hover' cellspacing='0' width='100%' style='width:100%'>
							<thead>
								<tr>
                              <th>#</th>
							  <th>Regi&oacute;n</th>
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
									<th>2022</th>
									<th>2023</th>
									
                          </tr>
                      </thead>
							<tfoot>
                          <tr>
                              <th>#</th>
							  <th>Regi&oacute;n</th>
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
									<th>2022</th>
									<th>2023</th>
                          </tr>
                      </tfoot>
							<tbody>
						<?php
								
$sqtrp="SELECT substring(e.UBIGEO,1,2) as ubi1,
SUM(CASE e.aniofn WHEN '2012' THEN $varianom ELSE 0 END) AS a2012,
SUM(CASE e.aniofn WHEN '2013' THEN $varianom ELSE 0 END) AS a2013,
SUM(CASE e.aniofn WHEN '2014' THEN $varianom ELSE 0 END) AS a2014,
SUM(CASE e.aniofn WHEN '2015' THEN $varianom ELSE 0 END) AS a2015,
SUM(CASE e.aniofn WHEN '2016' THEN $varianom ELSE 0 END) AS a2016,
SUM(CASE e.aniofn WHEN '2017' THEN $varianom ELSE 0 END) AS a2017,
SUM(CASE e.aniofn WHEN '2018' THEN $varianom ELSE 0 END) AS a2018,
SUM(CASE e.aniofn WHEN '2019' THEN $varianom ELSE 0 END) AS a2019,
SUM(CASE e.aniofn WHEN '2020' THEN $varianom ELSE 0 END) AS a2020,
SUM(CASE e.aniofn WHEN '2021' THEN $varianom ELSE 0 END) AS a2021,
SUM(CASE e.aniofn WHEN '2022' THEN $varianom ELSE 0 END) AS a2022,
SUM(CASE e.aniofn WHEN '2023' THEN $varianom ELSE 0 END) AS a2023
FROM GranResumenExport_PowerBI as e WHERE e.PART_NANDI = '$code1' AND aniofn >= '2012' AND aniofn <= '$aniogen' GROUP BY ubi1 ORDER BY ubi1 ASC";
								
								
						$partslqt = $conexpg -> prepare($sqtrp); 
$partslqt -> execute(); 
$ggts = $partslqt -> fetchAll(PDO::FETCH_OBJ); 
if($partslqt -> rowCount() > 0) { 
foreach($ggts as $dsx) {
	$cuen = $cuen + 1;
	$listval1 = $dsx -> ubi1;
	//$mesname = $dsx -> ubi1;
	$listval2 = $dsx -> a2012;
	$listval3 = $dsx -> a2013;
	$listval4 = $dsx -> a2014;
	$listval5 = $dsx -> a2015;
	$listval6 = $dsx -> a2016;
	$listval7 = $dsx -> a2017;
	$listval8 = $dsx -> a2018;
	$listval9 = $dsx -> a2019;
	$listval10 = $dsx -> a2020;
	$listval11 = $dsx -> a2021;
	$listval12 = $dsx -> a2022;
	$listval13 = $dsx -> a2023;
	
	$ddxlt = "SELECT d.iddepartamento, d.nombre FROM departamento AS d WHERE d.iddepartamento='$listval1' ";
$rxtdpt = $conexpg -> prepare($ddxlt); 
$rxtdpt -> execute(); 
$txxs = $rxtdpt -> fetchAll(PDO::FETCH_OBJ); 
if($rxtdpt -> rowCount() > 0) { 
foreach($txxs as $dxpx) {
	$mesname1 = $dxpx -> iddepartamento;
	$mesname = $dxpx -> nombre;
}
}else{
	$mesname = "-";
}
	
	echo "<tr>";
	echo "<td>$cuen</td>";
	echo "<td>$mesname</td>";
	echo "<td>".number_format($listval2,2)."</td>";
	echo "<td>".number_format($listval3,2)."</td>";
	echo "<td>".number_format($listval4,2)."</td>";
	echo "<td>".number_format($listval5,2)."</td>";
	echo "<td>".number_format($listval6,0)."</td>";
	echo "<td>".number_format($listval7,0)."</td>";
	echo "<td>".number_format($listval8,0)."</td>";
	echo "<td>".number_format($listval9,0)."</td>";
	echo "<td>".number_format($listval10,0)."</td>";
	echo "<td>".number_format($listval11,0)."</td>";
	echo "<td>".number_format($listval12,0)."</td>";
	echo "<td>".number_format($listval13,0)."</td>";
	echo "</tr>";
}
}else{
	
}
						?>
								</tbody>
						</table> 
							</div> -->
						<br><br><br>
						<!-- fin busqueda -->
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
		/*$(document).ready(function () {
    $('#datatablese').DataTable();
}); */
		
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