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
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title> Azatrade -Importaciones </title>

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
    <link rel="stylesheet" href="assets/css/demo1.min.css?ter=13c3">
    <link rel="stylesheet" type="text/css" href="assets/vendor/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/simple-line-icons/css/simple-line-icons.min.css">
	
	<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	
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
				
                <div class="row">
					
					
                    <div class="col-lg-9">
						<h3 align="right"><a href="buscar">B&uacute;squeda</a></h3>
						<div id="muestra"> <br><br>
                        <div class="home-slider slide-animate owl-carousel owl-theme mb-2" data-owl-options="{
							'loop': false,
							'dots': true,
							'nav': false
						}">
                            <div class="home-slide home-slide1 banner banner-md-vw banner-sm-vw d-flex align-items-center">
                                <img class="slide-bg" style="background-color: #2699D0;" src="assets/images/demoes/demo1/slider/img-import.jpg" width="880" height="428" alt="home-slider">
                                <div class="banner-layer appear-animate" data-animation-name="fadeInUpShorter">
                                    <h4 class="text-white mb-0">Encuentra Importadores en Perú</h4>
                                    <h2 class="text-white mb-0">sistema inteligente </h2>
                                    <h3 class="text-white text-uppercase m-b-3">AZATRADE</h3>
                                    <h5 class="text-white text-uppercase d-inline-block mb-0 ls-n-20 align-text-bottom">
                                        Tu&nbsp;&nbsp;Plan <b class="coupon-sale-text bg-secondary text-white d-inline-block"> <em
                                                class="align-text-top">GRATIS</em> </b></h5>
									<?php if (isset($_SESSION['login_usuario'])){ ?>
                                    
									<?php }else{ ?>
                                    <a href="registro" class="btn btn-dark btn-md ls-10">Reg&iacute;strate</a>
									<?php } ?>
                                </div>
                                
                            </div>
                            <!-- End .home-slide -->

                            <!-- <div class="home-slide home-slide2 banner banner-md-vw banner-sm-vw d-flex align-items-center">
                                <img class="slide-bg" style="background-color: #dadada;" src="assets/images/demoes/demo1/slider/Baner_2.png" width="880" height="428" alt="home-slider">
                                <div class="banner-layer text-uppercase appear-animate" data-animation-name="fadeInUpShorter">
                                    <h4 class="m-b-2">Si Asia tiene a ALI-BABA, Perú tiene a</h4>
                                    <h2 class="m-b-3">AZATRADE</h2>
                                    <h5 class="d-inline-block mb-0 align-top mr-5 mb-2">Tu&nbsp;&nbsp;Plan
                                        <b>$<em>299</em>99</b>
                                    </h5>
                                    <a href="" class="btn btn-dark btn-md ls-10">Reg&iacute;strate</a>
                                </div>
                                
                            </div> -->
                            <!-- End .home-slide -->

                            <!--<div class="home-slide home-slide3 banner banner-md-vw banner-sm-vw  d-flex align-items-center">
                                <img class="slide-bg" style="background-color: #e5e4e2;" src="assets/images/demoes/demo1/slider/slide-3.jpg" width="880" height="428" alt="home-slider" />
                                <div class="banner-layer text-uppercase appear-animate" data-animation-name="fadeInUpShorter">
                                    <h4 class="m-b-2">Up to 70% off</h4>
                                    <h2 class="m-b-3">New Arrivals</h2>
                                    <h5 class="d-inline-block mb-0 align-top mr-5 mb-2">Starting At
                                        <b>$<em>299</em>99</b>
                                    </h5>
                                    <a href="demo1-shop.html" class="btn btn-dark btn-md ls-10">Get Yours!</a>
                                </div>
                            </div> -->
                            <!-- End .home-slide -->
                        </div>
                        <!-- End .home-slider -->

							
	<?php
$sqluso = "SELECT c.clasificacion4, c.clasificacion3, c.idcuode FROM cuode AS c WHERE c.clasificacion4 <> '' GROUP BY c.clasificacion4, c.clasificacion3";
$gluso = $conexpg -> prepare($sqluso); 
$gluso -> execute(); 
$guus = $gluso -> fetchAll(PDO::FETCH_OBJ); 
if($gluso -> rowCount() > 0) { 
foreach($guus as $sut) {
	$fiuso1 = $sut -> idcuode;
	$fiuso2 = $sut -> clasificacion4;
	$fiuso3 = $sut -> clasificacion3;
	
	echo "<h2 class='section-title ls-n-10 m-b-4 appear-animate' data-animation-name='fadeInUpShorter'> <a href='uso-view?data=$fiuso1&year=$fiuso2-$fiuso3' target='_blank'> $fiuso2 - $fiuso3 </a> </h2>";
							?>

                        <div class="products-slider owl-carousel owl-theme dots-top dots-small m-b-1 pb-1 appear-animate" data-animation-name="fadeInUpShorter">
							
							<?php
$sqllist = "SELECT p.idcod, p.partida_nandi, p.prod_especifico, p.presentacion, p.partida_desc, 
	p.tipo_sec, p.sector, p.subsector, p.detalle_sector, p.imgfoto, 
	p.descri_corto, p.impo_vfobusdserdol1, p.impo_vfobusdserdol2, p.impo_vfobusdserdol3, 
	p.impo_vpesnet1, p.impo_vpesnet2, p.impo_vpesnet3, 
	p.impo_precio1, p.impo_precio2, p.impo_precio3, p.mostrar2, p.cuode, p.clasificacion4
	FROM productos AS p 
	WHERE p.mostrar2 = 'Si' AND cuode='$fiuso1' LIMIT 10 ";
$gllit = $conexpg -> prepare($sqllist); 
$gllit -> execute(); 
$glds = $gllit -> fetchAll(PDO::FETCH_OBJ); 
if($gllit -> rowCount() > 0) { 
foreach($glds as $shht) {
	$filaff1 = $shht -> idcod;
	$filaff2 = $shht -> partida_nandi;
	$filaff3 = $shht -> prod_especifico;
	$filaff4 = $shht -> presentacion;
	$filaff5 = $shht -> partida_desc;
	$filaff6 = $shht -> tipo_sec;
	$filaff7 = $shht -> sector;
	$filaff8 = $shht -> subsector;
	$filaff9 = $shht -> detalle_sector;
	$filaff10 = $shht -> imgfoto;
	$filaff11 = $shht -> descri_corto;
	$filaff12 = $shht -> impo_vfobusdserdol1;
	$filaff13 = $shht -> impo_vfobusdserdol2;
	$filaff14 = $shht -> impo_vfobusdserdol3;
	$filaff15 = $shht -> impo_vpesnet1;
	$filaff16 = $shht -> impo_vpesnet2;
	$filaff17 = $shht -> impo_vpesnet3;
	$filaff18 = $shht -> impo_precio1;
	$filaff19 = $shht -> impo_precio2;
	$filaff20 = $shht -> impo_precio3;
	$filaff6x1 = $shht -> cuode;
	$filaff7x1 = $shht -> clasificacion4;
	

	
							?>
							
							
							<div class="product-default inner-quickview inner-icon">
                                <figure class="img-effect">
                                    <a>
                                        <img src="admin/imgproductos/<?=$filaff10;?>" width="205" height="205" alt="<?=$filaff3;?>" />
                                    </a>
									<div class="label-group">
                                        <div class="product-label label-hot">TOP</div>
                                        <!--<div class="product-label label-sale">-20%</div>-->
                                    </div>
                                    <a href="uso-producto?dat=<?=$filaff2;?>&pk=<?=$filaff1;?>" target="_blank" class="btn-quickview" title="VER EMPRESAS">VER EMPRESAS</a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a class="product-category"> <?=$filaff6;?> - <?=$filaff7;?> </a>
                                        </div>
                                    </div>
									<h3 class="product-title"><b> <?=$filaff3;?> - <?=$filaff4;?> </b> </h3>
                                    <h3 class="product-title"> <a href="partida-detalle-uso-general?dat=<?=$filaff2;?>&year=2022" target="_blank">Partida: <?=$filaff2;?> </a> </h3>
                                    <div class="price-box">
                                        <span class="product-price">Precio FOB <?=$filaff19;?> KG </span>
                                    </div>
                                </div>
                            </div>
							<?php
	}
	
}else{
	$filaff1 = "";
	}						?>
							
                        </div> 
							<?php if($filaff1!=""){ ?>
							<p align='right'> <a href='uso_importacion?dat=<?=$filaff6x1;?>&year=<?=$filaff7x1;?>' target='_blank' class='btn btn-primary btn-xs'><b>VER M&Aacute;S</b></a> </p>
							<?php } ?>
                        <!-- End .featured-proucts -->

							<?php
	}
}
							?>

                        <hr class="mt-1 mb-3 pb-2">

                        <div class="feature-boxes-container">
                            <div class="row">
								
                                <div class="col-md-4 appear-animate" data-animation-name="fadeInRightShorter" data-animation-delay="200">
									<a href="https://app.powerbi.com/view?r=eyJrIjoiZTgzYTY3YjgtNmQ5Yi00MTdiLWI5NDAtOTY0OTE0MzNjMzZkIiwidCI6ImNiZDg3MzMxLTFlZGUtNDI3YS04MTc1LTBkNWZlNGJiYmRkYyIsImMiOjR9&pageName=ReportSection13aeb9e3303ff7ba5bd9" target="_blank"><img class="img-fluid" src="assets/images/Mercado.png"></a>
								<a href="https://app.powerbi.com/view?r=eyJrIjoiZTgzYTY3YjgtNmQ5Yi00MTdiLWI5NDAtOTY0OTE0MzNjMzZkIiwidCI6ImNiZDg3MzMxLTFlZGUtNDI3YS04MTc1LTBkNWZlNGJiYmRkYyIsImMiOjR9&pageName=ReportSection13aeb9e3303ff7ba5bd9" class="btn btn-dark btn-block" target="_blank">Ver Perfil</a>
                                </div>
								
								<div class="col-md-4 appear-animate" data-animation-name="fadeInRightShorter" data-animation-delay="200">
                                    <div class="feature-box  feature-box-simple text-center">
                                        <i class="icon-earphones-alt"></i>
                                        <div class="feature-box-content p-0">
                                            <h3 class="mb-0 pb-1">ATENCIÓN AL CLIENTE</h3>
                                            <h5 class="mb-1 pb-1">¿Necesita ayuda?</h5>
                                            <p>Un asesor en ventas te ayudara a resolver todas tus preguntas, consultas o dudas.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 appear-animate" data-animation-name="fadeInRightShorter" data-animation-delay="400">
                                    <div class="feature-box feature-box-simple text-center">
                                        <i class="icon-credit-card"></i>
                                        <div class="feature-box-content p-0">
                                            <h3 class="mb-0 pb-1">PAGO SEGURO</h3>
                                            <h5 class="mb-1 pb-1">Seguro y Rápido</h5>
                                            <p>Contamos con diferentes medios de pagos seguros.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 appear-animate" data-animation-name="fadeInRightShorter" data-animation-delay="600">
                                    <div class="feature-box feature-box-simple text-center">
                                        <i class="sicon-bar-chart"></i>

                                        <div class="feature-box-content p-0">
                                            <h3 class="mb-0 pb-1">Reportes</h3>
                                            <h5 class="mb-1 pb-1">100% Online</h5>

                                            <p>Realiza sus reportes segun como se mueve en el mercado mundial.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
							</div>
                    </div>
                    <!-- End .col-lg-9 -->

                    <div class="sidebar-overlay"></div>
                    <div class="sidebar-toggle custom-sidebar-toggle"><i class="fas fa-sliders-h"></i></div>
					
                    <aside class="sidebar-home col-lg-3 order-lg-first mobile-sidebar">
						
					
						
						<div class="widget widget-banners px-3 pb-3 text-center">
                            <div class="owl-carousel owl-theme dots-small">
								
								<div style="overflow-y: auto; height:950px;">
									<h4 align="center"><b><u>USO ECON&Oacute;MICO</u></b></h4>
							<nav class="side-nav">
                                <ul class="menu menu-vertical sf-arrows">
									<?php
$sdlt = "SELECT c.clasificacion4, c.clasificacion3, c.idcuode FROM cuode AS c WHERE c.clasificacion4 <> '' GROUP BY c.clasificacion4, c.clasificacion3";
$stdpt = $conexpg -> prepare($sdlt); 
$stdpt -> execute(); 
$sds = $stdpt -> fetchAll(PDO::FETCH_OBJ); 
if($stdpt -> rowCount() > 0) { 
foreach($sds as $spt) {
	$dsl1 = $spt -> idcuode;
	$dsl2 = $spt -> clasificacion4;
	$dsl3 = $spt -> clasificacion3;
	
	echo "<li class='item'><a href='uso_importacion?dat=$dsl1&year=$dsl2' target='_blank' class='nombres'><i class='sicon-globe'></i>$dsl2 - $dsl3</a></li>";
	}
}else{
									?>
									<li><a target="_blank"><i class="sicon-globe"></i>Sin Datos</a></li>
<?php
	}
	?>
                                </ul>
                            </nav>
						</div>
								
                            </div>
                        </div>

                        <<div class="widget widget-banners px-3 pb-3 text-center">
                            <div class="owl-carousel owl-theme dots-small">
                                <div class="banner d-flex flex-column align-items-center">
									<a href="https://app.powerbi.com/view?r=eyJrIjoiZTgzYTY3YjgtNmQ5Yi00MTdiLWI5NDAtOTY0OTE0MzNjMzZkIiwidCI6ImNiZDg3MzMxLTFlZGUtNDI3YS04MTc1LTBkNWZlNGJiYmRkYyIsImMiOjR9&pageName=ReportSection13aeb9e3303ff7ba5bd9" target="_blank"><img class="img-fluid" src="assets/images/Mercado.png"></a>
								<a href="https://app.powerbi.com/view?r=eyJrIjoiZTgzYTY3YjgtNmQ5Yi00MTdiLWI5NDAtOTY0OTE0MzNjMzZkIiwidCI6ImNiZDg3MzMxLTFlZGUtNDI3YS04MTc1LTBkNWZlNGJiYmRkYyIsImMiOjR9&pageName=ReportSection13aeb9e3303ff7ba5bd9" class="btn btn-dark btn-block" target="_blank">Ver Perfil</a>
									<!--<a href="perfiles"><img class="img-fluid" src="assets/images/Perfiles.png"></a><br>
									<a href="perfiles" class="btn btn-dark">Ver Perfiles</a> -->
                                </div>
                            </div>
                        </div> 
                        <!-- End .widget -->

                        <div class="widget widget-newsletters bg-gray text-center">
                            <h3 class="widget-title text-uppercase m-b-3">Conversa con Nosotros</h3>
                            <p class="mb-2">Estamos en linea para atender tus requerimientos.</p>
							<p align="center"><a href="https://wa.link/tp206k" target="_blank"><img class="img-fluid" src="assets/images/boton-whatsapp.png"></a></p>
                           <!-- <form action="#">
                                <div class="form-group position-relative sicon-envolope-letter">
                                    <input type="email" class="form-control" name="newsletter-email" placeholder="Email address">
                                </div>
                                <input type="submit" class="btn btn-primary btn-md" value="Subscribe">
                            </form>-->
                        </div>
                        <!-- End .widget -->

                        <!--<div class="widget widget-testimonials">
                            <div class="owl-carousel owl-theme dots-left dots-small">
                                <div class="testimonial">
                                    <div class="testimonial-owner">
                                        <figure>
                                            <img src="assets/images/clients/client-1.jpg" alt="client">
                                        </figure>

                                        <div>
                                            <h4 class="testimonial-title">john Smith</h4>
                                            <span>CEO &amp; Founder</span>
                                        </div>
                                    </div>
                                    

                                    <blockquote class="ml-4 pr-0">
                                        <p>Lorem ipsum dolor sit amet, consectetur elitad adipiscing Cras non placerat mi.
                                        </p>
                                    </blockquote>
                                </div>
                                

                                <div class="testimonial">
                                    <div class="testimonial-owner">
                                        <figure>
                                            <img src="assets/images/clients/client-2.jpg" alt="client">
                                        </figure>

                                        <div>
                                            <h4 class="testimonial-title">Dae Smith</h4>
                                            <span>CEO &amp; Founder</span>
                                        </div>
                                    </div>
                                    

                                    <blockquote class="ml-4 pr-0">
                                        <p>Lorem ipsum dolor sit amet, consectetur elitad adipiscing Cras non placerat mi.
                                        </p>
                                    </blockquote>
                                </div>
                                

                                <div class="testimonial">
                                    <div class="testimonial-owner">
                                        <figure>
                                            <img src="assets/images/clients/client-3.jpg" alt="client">
                                        </figure>

                                        <div>
                                            <h4 class="testimonial-title">John Doe</h4>
                                            <span>CEO &amp; Founder</span>
                                        </div>
                                    </div>
                                    

                                    <blockquote class="ml-4 pr-0">
                                        <p>Lorem ipsum dolor sit amet, consectetur elitad adipiscing Cras non placerat mi.
                                        </p>
                                    </blockquote>
                                </div>
                                
                            </div>
                            
                        </div> -->
                        <!-- End .widget -->

                        <!--<div class="widget widget-posts post-date-in-media media-with-zoom mb-0 mb-lg-2 pb-lg-2">
                            <div class="owl-carousel owl-theme dots-left dots-m-0 dots-small" data-owl-options="
                                { 'margin' : 20,
                                  'loop': false }">
                                <article class="post">
                                    <div class="post-media">
                                        <a href="">
                                            <img src="assets/images/blog/home/post-1.jpg" data-zoom-image="assets/images/blog/home/post-1.jpg" width="280" height="209" alt="Post">
                                        </a>
                                        <div class="post-date">
                                            <span class="day">29</span>
                                            <span class="month">Jun</span>
                                        </div>
                                        

                                        <span class="prod-full-screen">
                                            <i class="fas fa-search"></i>
                                        </span>
                                    </div>
                                    

                                    <div class="post-body">
                                        <h2 class="">
                                            <a href="">Post Format Standard</a>
                                        </h2>

                                        <div class="post-content">
                                            <p>Leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with... </p>

                                            <a href="" class="read-more">read more <i
                                                    class="icon-right-open"></i></a>
                                        </div>
                                        
                                    </div>
                                    
                                </article>

                                <article class="post">
                                    <div class="post-media">
                                        <a href="">
                                            <img src="assets/images/blog/home/post-2.jpg" data-zoom-image="assets/images/blog/home/post-2.jpg" width="280" height="209" alt="Post">
                                        </a>
                                        <div class="post-date">
                                            <span class="day">29</span>
                                            <span class="month">Jun</span>
                                        </div>
                                        
                                        <span class="prod-full-screen">
                                            <i class="fas fa-search"></i>
                                        </span>
                                    </div>
                                    

                                    <div class="post-body">
                                        <h2 class="post-title">
                                            <a href="">Fashion Trends</a>
                                        </h2>

                                        <div class="post-content">
                                            <p>Leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with... </p>

                                            <a href="" class="read-more">read more <i
                                                    class="icon-right-open"></i></a>
                                        </div>
                                        
                                    </div>
                                    
                                </article>

                                <article class="post">
                                    <div class="post-media">
                                        <a href="">
                                            <img src="assets/images/blog/home/post-3.jpg" data-zoom-image="assets/images/blog/home/post-3.jpg" width="280" height="209" alt="Post">
                                        </a>
                                        <div class="post-date">
                                            <span class="day">29</span>
                                            <span class="month">Jun</span>
                                        </div>
                                        
                                        <span class="prod-full-screen">
                                            <i class="fas fa-search"></i>
                                        </span>
                                    </div>
                                    

                                    <div class="post-body">
                                        <h2 class="post-title">
                                            <a href="">
                                                Post Format Video</a>
                                        </h2>

                                        <div class="post-content">
                                            <p>Leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with... </p>

                                            <a href="" class="read-more">read more <i
                                                    class="icon-right-open"></i></a>
                                        </div>
                                        
                                    </div>
                                    
                                </article>
                            </div>
                            
                        </div> -->
                        <!-- End .widget -->
                    </aside>
                    <!-- End .col-lg-3 -->
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
	<script src="assets/js/plugins/jquery-numerator.min.js"></script>
    <script src="assets/js/jquery.appear.min.js"></script>
    <script src="assets/js/jquery.plugin.min.js"></script>
    <script src="assets/js/jquery.countdown.min.js"></script>
	<script src="assets/js/nouislider.min.js"></script>

    <!-- Main JS File -->
    <script src="assets/js/main.min.js?pit=789"></script>	

</body>
</html>