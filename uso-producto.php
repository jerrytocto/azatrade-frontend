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

//consultamos producto
$drt = "SELECT p.idcod, p.partida_nandi, p.prod_especifico, p.presentacion, p.partida_desc, 
	p.tipo_sec, p.sector, p.subsector, p.detalle_sector, p.imgfoto, 
	p.descri_corto, p.impo_vfobusdserdol1, p.impo_vfobusdserdol2, p.impo_vfobusdserdol3, 
	p.impo_vpesnet1, p.impo_vpesnet2, p.impo_vpesnet3, 
	p.impo_precio1, p.impo_precio2, p.impo_precio3, p.mostrar2, p.cuode, p.clasificacion4 
	FROM productos AS p 
	WHERE p.idcod = '$code3'";
$grrt = $conexpg -> prepare($drt); 
$grrt -> execute(); 
$ggds = $grrt -> fetchAll(PDO::FETCH_OBJ); 
if($grrt -> rowCount() > 0) { 
foreach($ggds as $s4t) {
	$pprof1 = $s4t -> prod_especifico;
	$pprof2 = $s4t -> presentacion;
	$pprof3 = $s4t -> partida_desc;
	$pprof4 = $s4t -> tipo_sec;
	$pprof5 = $s4t -> sector;
	$pprof6x = $s4t -> imgfoto;
	$pprof7 = $s4t -> impo_vfobusdserdol2;
	$pprof8 = $s4t -> impo_vpesnet2;
	$pprof9 = $s4t -> impo_precio2;
	$pprof10 = $s4t -> cuode;
	$pprof11 = $s4t -> clasificacion4;
	}
}else{
	$pprof1 = "";
}

if($pprof6x!=""){
		$pprof6=$pprof6x;
		}else{
		 $pprof6="producto-sin-imagen.png";
		}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Azatrade</title>

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

		<main class="main">
            <div class="container">
				<div class="cta-border cta-bg cyan mt-6">
						<div class="row cta-simple">
							<div class="col-md-3" style="filter:drop-shadow(8px 8px 10px gray);
-webkit-filter:drop-shadow(8px 8px 10px gray);">
								<!--<div class="btn btn-light btn-lg mt-2 mt-md-0">Buy Now!</div>-->
								<center><img src="admin/imgproductos/<?=$pprof6;?>" width="205" height="205" /></center>
							</div>
							<div class="col-md-9"> <br>
								<h3 class="font-weight-normal">Producto <b><?=$pprof1;?></b> - presentaci&oacute;n 
									<b><?=$pprof10;?></b> <br> <?=$pprof11;?> </h3>
								<p>Detalle del producto <b><?=$pprof1;?>:</b> <?=$pprof3;?></p> <br>
							</div>
							<!--<div class="col-md-12">
								<hr>
							</div>-->
							
						</div>
					</div>
			</div>
		</main>
        <main class="main home">
            <div class="container mb-2">
                 <!--<div class="info-boxes-container row row-joined mb-2 font2">
                    <div class="info-box info-box-icon-left col-lg-4">
                        <i class="icon-shipping"></i>

                        <div class="info-box-content">
                            <h4>Reporte Mensual de Indicadores</h4>
                            <p class="text-body">Azatrade - Consulta en Linea</p>
                        </div>
                    </div>
                    <div class="info-box info-box-icon-left col-lg-4">
                        <i class="icon-money"></i>

                        <div class="info-box-content">
                            <h4>Partida #: <?=$code1;?> │ Año: <?=$code2;?> </h4>
                            <p class="text-body">Departamento: Todos │ Fecha Numeración │ Valor FOB USD │ Mensual</p>
                        </div>
                    </div>
                    <div class="info-box info-box-icon-left col-lg-4">
                        <i class="icon-support"></i>

                        <div class="info-box-content">
                            <h4>SOPORTE ONLINE 24/7</h4>
                            <p class="text-body">Escribenos con nuestro soporte en linea por <a href="" target="_blank">WhastApp clic AQUÍ</a></p>
                        </div>
                    </div>
                </div> -->
				
				
				
                <div class="row">
					
					
                    <div class="col-lg-12">						
						<input type="hidden" name="q" id="q" value="<?=$code1;?>" >
						
						<!--<button name="busca" id="busca" class="btn btn-primary">Buscar</button> -->
						<!-- busqueda -->
						<div id="loader" class="text-center"><center><img src="assets/images/loading-carga.gif" width="180px">Procesando Datos, espere un momento por favor...</center></div>

          <!-- AJAX -->
          <div id="outer_div"></div>
          <!-- END AJAX -->
						<!-- fin busqueda -->
						
						<br><br><br>
						<!-- fin busqueda -->
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
	
	<script>
		
		$(function(){			
		$("#loader").fadeOut(); //ocultamos div

		/*$('#busca').on('click', function (T){ 
			$("#outer_div").empty ();//limpiamos div
			//oculta
		//divb = document.getElementById('muestra');
        //divb.style.display = 'none';
			
		//var anios = 30;
		//alert("hola "+anios+" f");
      $(document).ready(function(){
        load(1);
      });
			
			}); */
			
			$(document).ready(function(){
        load(1);
      });
			
			}); 
		
      function load(page){
		  product = document.getElementById("q").value;
		  //proyear = document.getElementById("year").value;
		  //ptipo1 = document.getElementById("buscasql").value;
		  
        var parametros = {"action" : "ajax", "page" : page};
        $("#loader").fadeIn();
        $.ajax({
          url : 'rst-uso.php?data='+product,
		  //url : 'busquedainicial.php?data='+product+'&year='+proyear+'&cat='+cate,
		  //url : 'busquedainicial.php?data='+product+'&year='+proyear+'&ptipo1='+ptipo1,
          data : parametros,
          beforeSend:function(objeto){
            $("#loader").fadeIn();
          },
          success:function(data){
            $("#loader").fadeOut();
            $("#outer_div").html(data).fadeIn();
          }
        });
      }
		
    </script> 
</body>
</html>