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
/*$drt = "SELECT p.razonsocial
	FROM empresas AS p 
	WHERE p.ruc = '$code1'";
$grrt = $conexpg -> prepare($drt); 
$grrt -> execute(); 
$ggds = $grrt -> fetchAll(PDO::FETCH_OBJ); 
if($grrt -> rowCount() > 0) { 
foreach($ggds as $s4t) {
	$pprof1 = $s4t -> razonsocial;
	}
}else{
	$pprof1 = "";
}*/

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Azatrade - Partida Detalle Importacion</title>

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
						<h5 align="center"> Realizar nueva busqueda </h5>						
						<div class="header-search header-icon header-search-inline header-search-category w-lg-max" style="display: flex; justify-content: center;">
                                <div class="header-search-wrapper">
									<input type="hidden" id="buscasqlp" name="buscasqlp" value="partida">
                                    <!--<input type="search" class="form-control" name="qp" id="qp" placeholder="buscar por Partida" onkeyup="onKeyUp3(event)" >-->
									<select id='qp' name="qp" lang="es" style="border-radius: 80px 20px 5px 90px; background-color:#F4F4F4;">
										<?php
										if($code1!=""){
										echo "<option value='$code1'> $code1 </option> ";	
										}else{
										?>
        <option value=''>- Buscar Partida -</option>
										<?php } ?>
     </select>
									<div class="select-custom">
                                        <select id="yearp" name="yearp">
                                            <option value="2023" <?php if ("2023"==$code1){ echo "selected"; } ?> >2023</option>
                                            <option value="2022" <?php if ("2022"==$code2){ echo "selected"; } ?> >2022</option>
                                            <option value="2021" <?php if ("2021"==$code2){ echo "selected"; } ?> >2021</option>
                                            <option value="2020" <?php if ("2020"==$code2){ echo "selected"; } ?> >2020</option>
                                            <option value="2019" <?php if ("2019"==$code2){ echo "selected"; } ?> >2019</option>
											<option value="2018" <?php if ("2018"==$code2){ echo "selected"; } ?> >2018</option>
											<option value="2017" <?php if ("2017"==$code2){ echo "selected"; } ?> >2017</option>
											<option value="2016" <?php if ("2016"==$code2){ echo "selected"; } ?> >2016</option>
											<option value="2015" <?php if ("2015"==$code2){ echo "selected"; } ?> >2015</option>
											<option value="2014" <?php if ("2014"==$code2){ echo "selected"; } ?> >2014</option>
											<option value="2013" <?php if ("2013"==$code2){ echo "selected"; } ?> >2013</option>
											<option value="2012" <?php if ("2012"==$code2){ echo "selected"; } ?> >2012</option>
                                        </select>
                                    </div>
                                    <button class="btn icon-magnifier" type="button" id="buscap" name="buscap"></button>
                                </div>
                        </div>
						
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
	
	<script src="assets/select2v410/js/select2.min.js"></script>
	<script src="assets/select2v410/js/i18n/es.js"></script>
	
	<script>
$(document).ready(function(){

   $("#qp").select2({
      ajax: {
        url: "extraer-partida-impor.php",
        type: "post",
        dataType: 'json',
        delay: 250,
        data: function (params) {
           return {
              searchTerm: params.term // search term
           };
        },
        processResults: function (response) {
           return {
              results: response
           };
        },
        cache: true
      }
   });
});
</script>
	
	<script>
		
		$(function(){			
		$("#loader").fadeOut(); //ocultamos div

		$('#buscap').on('click', function (T){ 
			$("#outer_div").empty ();//limpiamos div
			//oculta
		//divb = document.getElementById('muestra');
        //divb.style.display = 'none';
			
		//var anios = 30;
		//alert("hola "+anios+" f");
      $(document).ready(function(){
        load(1);
      });
			
			}); 
			
			$(document).ready(function(){
        load(1);
      });
			
			}); 
		
      function load(page){
		  product = document.getElementById("qp").value;
		  proyear = document.getElementById("yearp").value;
		  //ptipo1 = document.getElementById("buscasql").value;
		  
        var parametros = {"action" : "ajax", "page" : page};
        $("#loader").fadeIn();
        $.ajax({
          //url : 'rst-sector.php?data='+product,
		  url : 'busquedainicial-partida-uso-general.php?data='+product+'&year='+proyear,
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