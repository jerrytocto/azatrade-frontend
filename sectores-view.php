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


$dato = $_REQUEST['data'];
$dato2 = $_REQUEST['year'];



/*
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
$seep = "SELECT CONCAT(DNOMBRE,NDOC) as DNOMBRE1, CONCAT(DNOMBRE,' - ',NDOC) as DNOMBRE2 FROM GranResumenExport_PowerBI WHERE CONCAT(DNOMBRE,NDOC)='$code1' LIMIT 1";
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
*/
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Azatrade - Sectores Detalle</title>

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
				  
			<main class="main banners-page">
			<section class="kenBurns-section mt-5 pt-5" style="padding: 0px 15px 0px;">
				<h3 align="center">Partidas Exportadas por Sectores: <?=$dato;?> -  <?=$dato2;?> </h3>
				
				<div class="table-responsive">
						<table id='datatablese' class='table table-striped table-no-bordered table-hover compact' cellspacing='0' width='100%' style='width:100%'>
							<thead>
                          <tr>
   <th>#</th>
   <th>Partida</th>
   <th>Producto</th>
   <th>Descripci&oacute;n</th>
   <th>Valor FOB USD.</th>
   <th>Peso Neto(Kg)</th>
   <th>Precio FOB USD</th>
   <th>Acciones</th>
							<tfoot>
                          <tr>
   <th>#</th>
   <th>Partida</th>
   <th>Producto</th>
   <th>Descripci&oacute;n</th>
   <th>Valor FOB USD.</th>
   <th>Peso Neto(Kg)</th>
   <th>Precio FOB USD</th>
   <th>Acciones</th>
                          </tr>
                      </tfoot>
							<tbody>
						<?php
								
$sqtrp="SELECT p.idcod, p.partida_nandi, p.prod_especifico, p.presentacion, p.partida_desc, 
	p.tipo_sec, p.sector, p.subsector, p.detalle_sector, p.imgfoto, 
	p.descri_corto, p.vfobusdserdol1, p.vfobusdserdol2, p.vfobusdserdol3, 
	p.vpesnet1, p.vpesnet2, p.vpesnet3, 
	p.precio1, p.precio2, p.precio3, p.mostrar 
	FROM productos AS p 
	WHERE p.tipo_sec='$dato' AND p.sector='$dato2' ";
								
								
						$partslqt = $conexpg -> prepare($sqtrp); 
$partslqt -> execute(); 
$ggts = $partslqt -> fetchAll(PDO::FETCH_OBJ); 
if($partslqt -> rowCount() > 0) { 
foreach($ggts as $dsx) {
	$cuen = $cuen + 1;

	$filaff1 = $dsx -> idcod;
	$filaff2 = $dsx -> partida_nandi;
	$filaff3 = $dsx -> prod_especifico;
	$filaff4 = $dsx -> presentacion;
	$filaff5 = $dsx -> partida_desc;
	$filaff6 = $dsx -> tipo_sec;
	$filaff7 = $dsx -> sector;
	$filaff8 = $dsx -> subsector;
	$filaff9 = $dsx -> detalle_sector;
	$filaff10 = $dsx -> imgfoto;
	$filaff11 = $dsx -> descri_corto;
	$filaff12 = $dsx -> vfobusdserdol1;
	$filaff13 = $dsx -> vfobusdserdol2;
	$filaff14 = $dsx -> vfobusdserdol3;
	$filaff15 = $dsx -> vpesnet1;
	$filaff16 = $dsx -> vpesnet2;
	$filaff17 = $dsx -> vpesnet3;
	$filaff18 = $dsx -> precio1;
	$filaff19 = $dsx -> precio2;
	$filaff20 = $dsx -> precio3;
	
	
	echo"<tr>";
   echo '<td>'.$cuen.'</td>';
   echo '<td>'.$filaff2.'</td>';
   echo '<td>'.$filaff3.'</td>';
   echo '<td>'.$filaff5.'</td>';
   echo '<td>'.$filaff14.'</td>';
   echo '<td>'.$filaff17.'</td>';
   echo '<td>'.$filaff20.'</td>';
   echo "<td><button type='button' class='btn btn-primary btn-sm' data-toggle='modal' data-target='#myModal$cuen'>Acciones</button> </td>";
	
	?>
	
		<div class="modal" id="myModal<?=$cuen;?>">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"> <b>Partida:</b> <?=$filaff2;?> | <?=$filaff5;?> </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
		  
		  <section class="left-section mt-5">
					<h3 class="mb-4	" align="center">¿ De esta partida que más deseas conocer ?</h3>
					<div class="row">
						<div class="col-xl-3 col-md-6">
							<div class="info-box info-box-icon-left">
								<i class="icon-compare"></i>
								<div class="info-box-content">
									<h4>Indicadores Anuales</h4>
									<p><a href="partida-indicador-anual?dat=<?=$filaff2;?>" target="_blank"> <button class="btn btn-outline-primary btn-rounded btn-md">Ver Reporte</button></a></p>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-md-6">
							<div class="info-box info-box-icon-left">
								<i class="icon-chart"></i>
								<div class="info-box-content">
									<h4>Indicadores Mensuales</h4>
									<p><a href="partida-indicador-mensual?dat=<?=$filaff2;?>&year=2022" target="_blank"> <button class="btn btn-outline-primary btn-rounded btn-md">Ver Reporte</button></a></p>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-md-6">
							<div class="info-box info-box-icon-left">
								<i class="icon-direction"></i>
								<div class="info-box-content">
									<h4>Estacionalidad</h4>
									<p><a href="partida-estacionalidad?dat=<?=$filaff2;?>&year=<?=$dato2;?>&var=FOBUSD" target="_blank"> <button class="btn btn-outline-primary btn-rounded btn-md">Ver Reporte</button></a></p>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-md-6">
							<div class="info-box info-box-icon-left">
								<i class="icon-country"></i>
								<div class="info-box-content">
									<h4>Mercados de Destino</h4>
									<p><a href="partida-mercados?dat=<?=$filaff2;?>&year=<?=$dato2;?>&var=FOBUSD" target="_blank"> <button class="btn btn-outline-primary btn-rounded btn-md">Ver Reporte</button></a></p>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-md-6">
							<div class="info-box info-box-icon-left">
								<i class="icon-pin"></i>
								<div class="info-box-content">
									<h4>Departamentos</h4>
									<p><a href="partida-region?dat=<?=$filaff2;?>&year=<?=$dato2;?>&var=FOBUSD" target="_blank"> <button class="btn btn-outline-primary btn-rounded btn-md">Ver Reporte</button></a></p>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-md-6">
							<div class="info-box info-box-icon-left">
								<i class="icon-company"></i>
								<div class="info-box-content">
									<h4>Empresas Exportadoras</h4>
									<p><a href="partida-empresas?dat=<?=$filaff2;?>&year=<?=$dato2;?>&var=FOBUSD" target="_blank"> <button class="btn btn-outline-primary btn-rounded btn-md">Ver Reporte</button></a></p>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-md-6">
							<div class="info-box info-box-icon-left">
								<i class="icon-truck"></i>
								<div class="info-box-content">
									<h4>Agentes Aduanas</h4>
									<p><a href="partida-agente-aduanas?dat=<?=$filaff2;?>&year=<?=$dato2;?>&var=FOBUSD" target="_blank"> <button class="btn btn-outline-primary btn-rounded btn-md">Ver Reporte</button></a></p>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-md-6">
							<div class="info-box info-box-icon-left">
								<i class="icon-shipped"></i>
								<div class="info-box-content">
									<h4>Aduanas</h4>
									<p><a href="partida-aduanas?dat=<?=$filaff2;?>&year=<?=$dato2;?>&var=FOBUSD" target="_blank"> <button class="btn btn-outline-primary btn-rounded btn-md">Ver Reporte</button></a></p>
								</div>
							</div>
						</div>
						
						<div class="col-xl-3 col-md-6">
							<div class="info-box info-box-icon-left">
								<i class="icon--search-2"></i>
								<div class="info-box-content">
									<h4>Ver Detalle</h4>
									<p><a href="ver-resumen-detalle-partida?dat=<?=$filaff2;?>&year=2022&pk=<?=$filaff2;?>" target="_blank"> <button class="btn btn-outline-primary btn-rounded btn-md">Ver Reporte</button></a></p>
								</div>
							</div>
						</div>
						<!--<div class="col-xl-3 col-md-6">
							<div class="info-box info-box-icon-left">
								<i class="icon-percent-circle"></i>
								<div class="info-box-content">
									<h4>Evaluaci&oacute;n de mercados</h4>
									<p><a href="" target="_blank"> <button class="btn btn-outline-primary btn-rounded btn-md">Ver Reporte</button></a></p>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-md-6">
							<div class="info-box info-box-icon-left">
								<i class="icon-search-2"></i>
								<div class="info-box-content">
									<h4>Ver Detalle</h4>
									<p><a href="" target="_blank"> <button class="btn btn-outline-primary btn-rounded btn-md">Ver Reporte</button></a></p>
								</div>
							</div>
						</div> -->
					</div>
				</section>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>

    </div>
  </div>
</div>
								
								<?php
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
		"order": [[ 4, "desc" ]],
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