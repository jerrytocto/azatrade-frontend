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

    <title>Azatrade Perfiles</title>

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
	
	
	<!-- select2 css -->
	<!--<link href="assets/select2v410/css/select2.min.css?yu=4ii7" rel="stylesheet" type="text/css">-->
	<link href="assets/select2v410/css/select2.css?yu=4gf57" rel="stylesheet" type="text/css">
	
	
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
					
					
                    <div class="col-lg-12">

						<!-- fin busqueda -->
						
						<div id="muestra"> <br><br>
                  

                        <h2 class="section-title ls-n-10 m-b-4 appear-animate" data-animation-name="fadeInUpShorter">
                            Perfiles </h2>
							<p align="center">Es un diagn&oacute;stico hist&oacute;rico del flujo de exportaciones, agrupados en indicadores, gr&aacute;ficos y tablas. Puedes acceder a los siguientes perfiles:</p>
							
							<div class="row">
							<div class="col-lg-4" style="padding: 10px;">
								<a href="https://app.powerbi.com/view?r=eyJrIjoiMGJmMjUxMmQtNDVkNS00MmY3LWI3NjgtNmU4M2U0YTg3YzJkIiwidCI6ImNiZDg3MzMxLTFlZGUtNDI3YS04MTc1LTBkNWZlNGJiYmRkYyIsImMiOjR9" target="_blank"><img class="img-fluid" src="assets/images/Producto.png"></a>
								<a href="https://app.powerbi.com/view?r=eyJrIjoiMGJmMjUxMmQtNDVkNS00MmY3LWI3NjgtNmU4M2U0YTg3YzJkIiwidCI6ImNiZDg3MzMxLTFlZGUtNDI3YS04MTc1LTBkNWZlNGJiYmRkYyIsImMiOjR9" class="btn btn-dark btn-block" target="_blank">Ver Perfil</a>
							</div>
							<div class="col-lg-4" style="padding: 10px;">
								<a href="https://app.powerbi.com/view?r=eyJrIjoiNjU0NjQ0MjMtYjljNS00ODBiLTkwZjAtNmNlZWQyYzE5YjIxIiwidCI6ImNiZDg3MzMxLTFlZGUtNDI3YS04MTc1LTBkNWZlNGJiYmRkYyIsImMiOjR9" target="_blank"><img class="img-fluid" src="assets/images/Empresa.png"></a>
								<a href="https://app.powerbi.com/view?r=eyJrIjoiNjU0NjQ0MjMtYjljNS00ODBiLTkwZjAtNmNlZWQyYzE5YjIxIiwidCI6ImNiZDg3MzMxLTFlZGUtNDI3YS04MTc1LTBkNWZlNGJiYmRkYyIsImMiOjR9" class="btn btn-dark btn-block" target="_blank">Ver Perfil</a>
							</div>
							<div class="col-lg-4" style="padding: 10px;">
								<a href="https://app.powerbi.com/view?r=eyJrIjoiNjkwNWQ0NDMtYjE5OS00ZGY4LTk3NjItOGNhOGVmNWUzYzg5IiwidCI6ImNiZDg3MzMxLTFlZGUtNDI3YS04MTc1LTBkNWZlNGJiYmRkYyIsImMiOjR9" target="_blank"><img class="img-fluid" src="assets/images/Sector.png"></a>
								<a href="https://app.powerbi.com/view?r=eyJrIjoiNjkwNWQ0NDMtYjE5OS00ZGY4LTk3NjItOGNhOGVmNWUzYzg5IiwidCI6ImNiZDg3MzMxLTFlZGUtNDI3YS04MTc1LTBkNWZlNGJiYmRkYyIsImMiOjR9" class="btn btn-dark btn-block" target="_blank">Ver Perfil</a>
							</div>
							<div class="col-lg-4" style="padding: 10px;">
								<a href="https://app.powerbi.com/view?r=eyJrIjoiMjgxMzY5MjctOTcxNS00YTI0LWI3NGUtNWM4MzJkZDE4OWU1IiwidCI6ImNiZDg3MzMxLTFlZGUtNDI3YS04MTc1LTBkNWZlNGJiYmRkYyIsImMiOjR9&pageName=ReportSection13aeb9e3303ff7ba5bd9" target="_blank"><img class="img-fluid" src="assets/images/Departamento.png"></a>
								<a href="https://app.powerbi.com/view?r=eyJrIjoiMjgxMzY5MjctOTcxNS00YTI0LWI3NGUtNWM4MzJkZDE4OWU1IiwidCI6ImNiZDg3MzMxLTFlZGUtNDI3YS04MTc1LTBkNWZlNGJiYmRkYyIsImMiOjR9&pageName=ReportSection13aeb9e3303ff7ba5bd9" class="btn btn-dark btn-block" target="_blank">Ver Perfil</a>
							</div>
							<div class="col-lg-4" style="padding: 10px;">
								<a href="https://app.powerbi.com/view?r=eyJrIjoiY2NjODkwMjAtMTcwNy00NzI0LWFhOTAtZjZjNzYxMzliYjZjIiwidCI6ImNiZDg3MzMxLTFlZGUtNDI3YS04MTc1LTBkNWZlNGJiYmRkYyIsImMiOjR9&pageName=ReportSection13aeb9e3303ff7ba5bd9" target="_blank"><img class="img-fluid" src="assets/images/Mercado.png"></a>
								<a href="https://app.powerbi.com/view?r=eyJrIjoiY2NjODkwMjAtMTcwNy00NzI0LWFhOTAtZjZjNzYxMzliYjZjIiwidCI6ImNiZDg3MzMxLTFlZGUtNDI3YS04MTc1LTBkNWZlNGJiYmRkYyIsImMiOjR9&pageName=ReportSection13aeb9e3303ff7ba5bd9" class="btn btn-dark btn-block" target="_blank">Ver Perfil</a>
							</div>
								
								<!-- <div class="col-lg-4" style="padding: 10px;">
								<a href="https://app.powerbi.com/view?r=eyJrIjoiZTgzYTY3YjgtNmQ5Yi00MTdiLWI5NDAtOTY0OTE0MzNjMzZkIiwidCI6ImNiZDg3MzMxLTFlZGUtNDI3YS04MTc1LTBkNWZlNGJiYmRkYyIsImMiOjR9&pageName=ReportSection13aeb9e3303ff7ba5bd9" target="_blank"><img class="img-fluid" src="assets/images/Mercado.png"></a>
								<a href="https://app.powerbi.com/view?r=eyJrIjoiZTgzYTY3YjgtNmQ5Yi00MTdiLWI5NDAtOTY0OTE0MzNjMzZkIiwidCI6ImNiZDg3MzMxLTFlZGUtNDI3YS04MTc1LTBkNWZlNGJiYmRkYyIsImMiOjR9&pageName=ReportSection13aeb9e3303ff7ba5bd9" class="btn btn-dark btn-block" target="_blank">Ver Perfil</a>
							</div> -->
								
								<div class="col-lg-12"> <hr>
								<h3 class="widget-title text-uppercase m-b-3" align="center">Conversa con Nosotros</h3>
                            <p class="mb-2" align="center">Estamos en linea para atender tus requerimientos.</p>
							<p align="center"><a href="https://wa.link/tp206k" target="_blank"><img class="img-fluid" src="assets/images/boton-whatsapp.png" width="220px"></a></p>
								</div>
								
								</div>
							
							

                        <hr class="mt-1 mb-3 pb-2">

                        <div class="feature-boxes-container">
                            <div class="row">
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
	
	<script src="assets/select2v410/js/select2.min.js"></script>
	<script src="assets/select2v410/js/i18n/es.js"></script>
	
	
</body>
</html>