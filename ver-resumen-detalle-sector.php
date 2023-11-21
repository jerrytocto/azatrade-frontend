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
$aniogen = date("Y");

// consultamos
$seep = "SELECT tipo, sector FROM sectores WHERE concat(tipo,sector)='$code1' LIMIT 1";
$paeeqt = $conexpg -> prepare($seep);
$paeeqt -> execute(); 
$gees = $paeeqt -> fetchAll(PDO::FETCH_OBJ); 
if($paeeqt -> rowCount() > 0) { 
foreach($gees as $dex) {
	$epo1 = $dex -> tipo;
	$epo2 = $dex -> sector;
}
}else{
	$epo1 = "";
	$epo2 = "";
}

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

    <title>Azatrade -Resumen</title>

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
            <div class="container mb-2">
                 <div class="info-boxes-container row row-joined mb-2 font2">
                    <div class="info-box info-box-icon-left col-lg-4">
                        <i class="icon-company"></i>

                        <div class="info-box-content">
                            <h4>Sector: <?=$epo2;?></h4>
                            <p class="text-body">Tipo: <?=$epo1;?></p>
                        </div>
                    </div>
                    <div class="info-box info-box-icon-left col-lg-4">
                        <i class="icon-money"></i>

                        <div class="info-box-content">
                            <h4>Partida #: <?=$code3;?> │ Año: <?=$code2;?> </h4>
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
				
				
				
                <div class="row">
					
					
                    <div class="col-lg-12">						
						<!--<input type="hidden" name="q" id="q" value="<?=$code1;?>" >
						<div id="loader" class="text-center"><center><img src="assets/images/loading-carga.gif" width="180px">Procesando Datos, espere un momento por favor...</center></div>
          <div id="outer_div"></div>
						<br><br><br> -->
						
						<section class="left-section mt-5">
			  <div class="row mt-2 divide-line row-joined up-effect">
				  
				  <?php				  
$sqllist= "SELECT r.aniofn,  r.PART_NANDI, CONVERT(r.mesfn,UNSIGNED INTEGER) AS mesfn, sum(r.VFOBSERDOL) AS VFOBSERDOL,  sum(r.cantreg) AS cantreg 
            FROM GranResumenExport_PowerBI AS r 
			INNER JOIN sector AS s ON r.PART_NANDI = s.partida 
			WHERE concat(s.tipo,s.sector) = '$code1' AND r.aniofn = '$code2' AND r.PART_NANDI = '$code3' 
			GROUP BY r.aniofn, r.mesfn 
			ORDER BY mesfn ASC";
		$gllit = $conexpg -> prepare($sqllist); 
$gllit -> execute(); 
$glds = $gllit -> fetchAll(PDO::FETCH_OBJ); 
if($gllit -> rowCount() > 0) { 
foreach($glds as $shht) {
	$filaff1 = $shht -> mesfn;
	$filaff2 = $shht -> VFOBSERDOL;
	$filaff3 = $shht -> cantreg;
 if($filaff1=="1"){
	 $mesnom = "Enero";
 }else if($filaff1=="2"){
	 $mesnom = "Febrero";
 }else if($filaff1=="3"){
	 $mesnom = "Marzo";
 }else if($filaff1=="4"){
	 $mesnom = "Abril";
 }else if($filaff1=="5"){
	 $mesnom = "Mayo";
	 }else if($filaff1=="6"){
	 $mesnom = "Junio";
	 }else if($filaff1=="7"){
	 $mesnom = "Julio";
	 }else if($filaff1=="8"){
	 $mesnom = "Agosto";
	 }else if($filaff1=="9"){
	 $mesnom = "Septiembre";
	 }else if($filaff1=="10"){
	 $mesnom = "Octubre";
	 }else if($filaff1=="11"){
	 $mesnom = "Noviembre";
	 }else if($filaff1=="12"){
	 $mesnom = "Diciembre";
	 }else{
	 $mesnom = "-";
	 }

		?>
                    <div class="col-6 col-sm-4 col-lg-3">
                        <div class="product-default">
                            <div class="product-details">
                                <h3 class="product-price"> <?=$mesnom;?> </h3>
                                <div class="price-box">
                                    <span class="product-title"><b>FOBUSD</b></span>
                                    <span class="product-title"><?=number_format($filaff2,2);?></span>
                                </div>
								<div class="price-box">
                                    <span class="product-title"><b>Cant. Reg.:</b> </span>
                                    <span class="product-title"><?=$filaff3;?> </span>
                                </div>
                                <div class="product-action">
                                    <!--<a href="wishlist.html" class="btn-icon-wish" title="wishlist"><i
											class="icon-heart"></i></a> -->
                                    <a href="ver-detalle-sector?dat=<?=$code1;?>&year=<?=$code2;?>&pk=<?=$code3;?>&flat=<?=$filaff1;?>" target="_blank" class="btn btn-dark product-type-simple btn-sm" title="ver Detalle" style="color: white;"><i class="fa fa-eye"></i> <span>VER</span></a> 
									<!--<a href="" target="_blank" class="btn btn-dark product-type-simple btn-sm" style="color: white;" title="Descargar"><i class="fa fa-download"></i> </a> -->
                                    <!--<a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i
											class="fas fa-external-link-alt"></i></a> -->
                                </div>
                            </div>
                        </div>
                    </div>
				  <?php
	}
}
		?>
				  
                </div>
				</section>
						
                    </div>
                    <!-- End .col-lg-9 -->
                </div>
                <!-- End .row -->
            </div>
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
	<script src="assets/js/nouislider.min.js"></script>

    <!-- Main JS File -->
    <script src="assets/js/main.min.js"></script>

</body>
</html>