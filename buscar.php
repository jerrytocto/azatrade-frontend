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

    <title> Azatrade - Importaciones Buscar </title>

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
	
	<style>
	/*.header-search-wrappep{display:flex;position:absolute;margin-top:10px;border:5px solid #08c}*/
		
	/*.header-search-wrappep{position:absolute;margin-top:10px;border:0px solid #08c} */
	.header-search-wrappep{position:absolute;margin-top:10px;}

/*.header-search-wrappep{display:flex;display:-ms-flexbox;position:absolute;right:-2.3rem;z-index:999;margin-top:10px;color:#8d8d8d;box-sizing:content-box;height:40px;border-radius:5rem;border:5px solid #08c}*/
		
/* .header-search-wrappep{position:absolute;right:-2.3rem;z-index:999;margin-top:10px;color:#8d8d8d;box-sizing:content-box;height:40px;border-radius:0rem;border:0px solid #08c} */
		
/*.header-search-wrappep{position:absolute;right:-2.3rem;z-index:999;margin-top:10px;color:#8d8d8d;box-sizing:content-box;height:40px;}*/
.header-search-wrappep{position:absolute;right:-2.3rem;z-index:999;margin-top:10px;color:#8d8d8d;height:40px;}

/*.header-search-wrappep:after{display:block;clear:both;content:""}*/

/*.header-search-wrappep .select-custom{margin:0;width:12.9rem;flex:0 0 12.9rem}*/ /* ---- */

/*.header-search-wrappep .select-custom:after{font-size:1.4rem;line-height:0;margin-top:1px;right:13px}*/

/*.header-search-wrappep select{width:100%;border-left:1px solid #e7e7e7;padding-left:1rem;padding-right:1.5rem;line-height:36px;letter-spacing:0.005em;color:inherit;-moz-appearance:none;-webkit-appearance:none} */ /* ---- */

.header-search-wrappep select:focus{outline:none}

.header-search-wrappep .btn{position:relative;padding:0 0 3px 0;border:0;border-left:1px solid #e7e7e7;min-width:48px;color:#606669;font-size:16px;background:#f7f7f7}

/*.header-search-wrappep .btn:before{display:inline-block;margin-top:5px;font-weight:800}*/

.header-search-wrappep{display:flex;display:-ms-flex;position:static;margin:0;border-width:0}

.header-search-wrappep{left:15px;right:15px}
		
		/* **************************** estilo nuevo ************************* */
.header-search-inlinep.header-searchp{margin-right:62.3rem}

.header-search-inlinep.header-searchp{margin-right:62.3rem}

.header-bottom.fixed .header-search-inlinep.header-searchp i{font-size:2.3rem}

/*.header-bottom.fixed .header-search-inlinep.header-searchp .header-search-wrappep{display:flex;position:absolute;margin-top:10px;border:5px solid #08c} */
.header-bottom.fixed .header-search-inlinep.header-searchp .header-search-wrappep{position:absolute;margin-top:20px;}

/*.header-bottom.fixed .header-search-inline.header-search:not(.show) .header-search-wrapper_x{display:none}*/

/*.header-bottom.fixed .header-search-inlinep.header-searchp:not(.show) */

/*.header-bottom.fixed .header-search-inlinep.header-searchp .header-search-inlinep .btn:after,.header-bottom.fixed .header-search-inlinep.header-searchp .search-togglep{display:block} */

/*.header-transparent{position:absolute;right:0;left:0;z-index:1040}*/

.header-searchp{position:relative}

.header-searchp form{margin:0}

.header-searchp .form-control,.header-searchp select{margin:0;border:0;color:inherit;font-size:1.3rem;height:100%;box-shadow:none}

.header-searchp .form-control,.header-searchp .select-customp{background:#f7f7f7}
@media (-ms-high-contrast:active),(-ms-high-contrast:none){
	.header-searchp .form-control{flex:1}}
		.header-searchp .form-control::placeholder{color:#a8a8a8}
		.header-searchp:not(.header-search-categoryp) 
		.form-control{border-radius:5rem}
		.header-searchp:not(.header-search-categoryp) 
		.btn{position:absolute;top:0;right:0;bottom:0;background:transparent;border:0;padding:0 0.8em;color:#333}
		.search-togglep:after{position:absolute;right:calc(50% - 10px);bottom:-10px;border:0px solid transparent;border-bottom-color:#08c}
		.header-search-categoryp .form-control{border-radius:5rem 0 0 5rem}
		.header-search-categoryp .btn{border-radius:0 5rem 5rem 0}
		/*.header-search-wrappep{position:absolute;right:-2.3rem;z-index:999;margin-top:10px;color:#8d8d8d;box-sizing:content-box;height:40px;border-radius:5rem;border:0px solid #08c}*/
		.header-search-wrappep{position:absolute;z-index:999;margin-top:10px;color:#8d8d8d;height:40px;border-radius:5rem;border:0px solid #08c}
		.header-search-wrappep:after{clear:both;content:""}
		/*.header-search-wrappep .select-customp{margin:0;width:14.9rem;flex:0 0 12.9rem}
		.header-search-wrappep .select-customp:after{font-size:1.4rem;line-height:0;margin-top:1px;right:13px} */ /* ---- */
		/*.header-search-wrappep select{width:100%;border-left:1px solid #e7e7e7;padding-left:1rem;padding-right:1.5rem;line-height:36px;letter-spacing:0.005em;color:inherit;-moz-appearance:none;-webkit-appearance:none}*/ /* ---- */
		/* .header-search-wrappep select:focus{outline:none} */ /* ---- */
		.header-search-wrapper .btn{position:relative;padding:0 0 3px 0;border:0;border-left:1px solid #e7e7e7;min-width:48px;color:#606669;font-size:16px;background:#f7f7f7}
		.header-search-wrappep .btn:before{margin-top:5px;font-weight:800}
		.header-search-popup .form-control{min-width:266px;padding:4px 22px;font-size:1.4rem;line-height:20px}
		.header-search-popupp .form-control:focus{border:#e7e7e7}
		.header-search-inlinep .form-control{min-width:21rem;padding:1rem 2rem}@media (min-width:992px){.header-search-inlinep .btn:after,.header-search-inlinep .search-togglep{display:none}.header-search-inlinep.header-searchp .header-search-wrappep{display:flex;display:-ms-flex;position:static;margin:0;border-width:0}}@media (max-width:767px){.header-searchp .form-control{min-width:17rem}}@media (max-width:575px){.header-search-wrappep{left:15px;right:15px}}

/* .header-search-wrapperp .select-customp:after{right:10px} */ /* ---- */
		
/*
.header-search-inlinep{margin-right:1.6rem;margin-left:2px}
.header-iconp.header-search-inlinep .form-control{font-family:Poppins,sans-serif}
.header-search-wrapperp .select-customp:after{right:10px}

.header-search-inlinep{margin-right:2.5rem}
@media (max-width:991px){.header-iconp i{font-size:2.8rem}.header-searchp i{font-size:2.4rem}}@media (max-width:767px){.header-iconp.header-search-inlinep{margin-top:2px}}
@media (max-width:576px){.header-iconp.header-search-inlinep,.header-iconp.login-linkp{margin-right:1.2rem}
.header-iconp.header-icon-userp{margin-right:1.3rem;margin-left:0px}}
@media (max-width:480px){.header-iconp.header-search-inlinep{display:none}} */
		/* fin estilo nuevo */

		.header-rightp{padding-right:22.6rem}
	</style>
	
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
			
			<!-- tab -->
			<div class="tabs tabs-simple">
						 <ul class="nav nav-tabs justify-content-center" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="tab-customer" data-toggle="tab" href="#customer-content"
									role="tab" aria-controls="customer-content" aria-selected="true">Productos</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="parti-tab" data-toggle="tab" href="#parti-content" role="tab"
									aria-controls="parti-content" aria-selected="true">Partida</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="lng-tab" data-toggle="tab" href="#lng-content" role="tab"
									aria-controls="lng-content" aria-selected="true">Mercados</a>
							</li>
							
							<li class="nav-item">
								<a class="nav-link" id="font-tab" data-toggle="tab" href="#font-content" role="tab"
									aria-controls="font-content" aria-selected="true">Empresas</a>
							</li>
							<!--<li class="nav-item">
								<a class="nav-link" id="color-tab" data-toggle="tab" href="#color-content" role="tab"
									aria-controls="color-content" aria-selected="true">Regiones</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="sect-tab" data-toggle="tab" href="#sect-content" role="tab"
									aria-controls="sect-content" aria-selected="true">Sectores</a>
							</li> -->
						</ul>
						<div class="tab-content">
							<div class="tab-pane fade show active text-center" id="customer-content" role="tabpanel"
								aria-labelledby="tab-customer">
								
								<div class="container">
                    <div class="header-left col-lg-2 w-auto pl-0">
                        <!--<button class="mobile-menu-toggler mr-2" type="button">
                            <i class="fas fa-bars"></i>
                        </button>
						<a href="./"><img src="assets/images/logo_aza.png" alt="AZATRADE"></a>-->
                    </div>
					
                    <div class="header-right w-lg-max pl-2" >
						<!-- <div class=""> -->
                        <!--<div class="header-search header-icon header-search-inline header-search-category w-lg-max"> -->
						<!--<div class="header-icon header-search-category w-lg-max">-->
						<div class="header-searchp header-iconp header-search-inlinep header-search-categoryp w-lg-max" style="display: flex; justify-content: center;">
                                <div class="header-search-wrappep">
									<!--<div class=""> -->
									<input type="hidden" id="buscasql" name="buscasql" value="produ">
                                    <input type="search" class="form-control" name="q" id="q" placeholder="buscar..." onkeyup="onKeyUp(event)" >
									<!-- <div class="select-custom"> -->
									<div class="select-customp">
                                        <select id="year" name="year">
                                            <option value="2023">2023</option>
                                            <option value="2022">2022</option>
                                            <option value="2021">2021</option>
                                            <option value="2020">2020</option>
                                            <option value="2019">2019</option>
											<option value="2018">2018</option>
											<option value="2017">2017</option>
											<option value="2016">2016</option>
											<option value="2015">2015</option>
											<option value="2014">2014</option>
											<option value="2013">2013</option>
											<option value="2012">2012</option>
                                        </select>
                                    </div>
									<?php if (isset($_SESSION['login_usuario'])){ ?>
                                    <button class="btn icon-magnifier" type="button" id="busca" name="busca"></button>
									<?php }else{ ?>
									<a href="login" class="btn icon-magnifier"></a>
									<?php } ?>
                                </div>
                        </div>
                        <div class="header-contact d-none d-lg-flex align-items-center pr-xl-5 mr-5 mr-xl-3 ml-5">
                           <!--<i class="icon-phone-2"></i>
                            <h6 class="pt-1 line-height-1">LLamanos al<a href="tel:+51978038200" class="d-block text-dark ls-10 pt-1">+51 978 038 200</a></h6> --> 
                        </div>
                        <!--<a href="#" class="header-icon header-icon-user"><i class="icon-user-2"></i></a> -->
                    </div>
                </div>
								
							</div>
							<div class="tab-pane fade text-center" id="lng-content" role="tabpanel"
								aria-labelledby="lng-tab">
								
								<div class="container">
                    <div class="header-left col-lg-2 w-auto pl-0">
                        <!--<button class="mobile-menu-toggler mr-2" type="button">
                            <i class="fas fa-bars"></i>
                        </button>
						<a href="./"><img src="assets/images/logo_aza.png" alt="AZATRADE"></a>-->
                    </div>
					
                    <div class="header-right w-lg-max pl-2">
                        <div class="header-searchp header-iconp header-search-inlinep header-search-categoryp w-lg-max" style="display: flex; justify-content: center;">
							<div class="row">
							<div class="col-lg-12">
                                <div class="header-search-wrappep">
									<input type="hidden" id="buscasql2" name="buscasql2" value="merca">
                                    <div class="" >
	<select id='cate2' name="cate2" lang="es" style="border-radius: 80px 20px 5px 90px; background-color:#F4F4F4;">
        <option value=''>- Buscar Mercado -</option>
    </select>
                                   </div>
									<div class="select-customp">
                                        <select id="year2" name="year2">
                                            <option value="2023">2023</option>
                                            <option value="2022">2022</option>
                                            <option value="2021">2021</option>
                                            <option value="2020">2020</option>
                                            <option value="2019">2019</option>
											<option value="2018">2018</option>
											<option value="2017">2017</option>
											<option value="2016">2016</option>
											<option value="2015">2015</option>
											<option value="2014">2014</option>
											<option value="2013">2013</option>
											<option value="2012">2012</option>
                                        </select>
                                    </div>
									<?php if (isset($_SESSION['login_usuario'])){ ?>
                                    <button class="btn icon-magnifier" type="button" id="busca2" name="busca2"></button>
									<?php }else{ ?>
									<a href="login" class="btn icon-magnifier"></a>
									<?php } ?>
                                </div>
								</div>
								</div>
                        </div>
                        <!--<div class="header-contact d-none d-lg-flex align-items-center pr-xl-5 mr-5 mr-xl-3 ml-5">
                            <i class="icon-phone-2"></i>
                            <h6 class="pt-1 line-height-1">LLamanos al<a href="tel:+51978038200" class="d-block text-dark ls-10 pt-1">+51 978 038 200</a></h6> 
                        </div>
                        <a href="#" class="header-icon header-icon-user"><i class="icon-user-2"></i></a> -->
                    </div>
                </d5iv>
								
							</div>
							</div>
					
							<div class="tab-pane fade text-center" id="font-content" role="tabpanel"
								aria-labelledby="font-tab">
								
								<div class="container">
                    <div class="header-left col-lg-2 w-auto pl-0">
                        <!--<button class="mobile-menu-toggler mr-2" type="button">
                            <i class="fas fa-bars"></i>
                        </button>
						<a href="./"><img src="assets/images/logo_aza.png" alt="AZATRADE"></a> -->
                    </div>
					
                    <div class="header-right w-lg-max pl-2">
                        <div class="header-searchp header-iconp header-search-inlinep header-search-categoryp w-lg-max" style="display: flex; justify-content: center;">
                                <div class="header-search-wrappep">
									<input type="hidden" id="buscasql3" name="buscasql3" value="empre">
									<div class="" >
									<select id='q2' name="q2" lang="es" style="border-radius: 80px 20px 5px 90px; background-color:#F4F4F4;height: 40%;">
        <option value=''>- Buscar Empresa -</option>
     </select>
									</div>
									<div class="select-customp">
                                        <select id="year3" name="year3">
                                            <option value="2023">2023</option>
                                            <option value="2022">2022</option>
                                            <option value="2021">2021</option>
                                            <option value="2020">2020</option>
                                            <option value="2019">2019</option>
											<option value="2018">2018</option>
											<option value="2017">2017</option>
											<option value="2016">2016</option>
											<option value="2015">2015</option>
											<option value="2014">2014</option>
											<option value="2013">2013</option>
											<option value="2012">2012</option>
                                        </select>
                                    </div>
									<?php if (isset($_SESSION['login_usuario'])){ ?>
                                    <button class="btn icon-magnifier" type="button" id="busca3" name="busca3"></button>
									<?php }else{ ?>
									<a href="login" class="btn icon-magnifier"></a>
									<?php } ?>
                                </div>
                        </div>
                        <!--<div class="header-contact d-none d-lg-flex align-items-center pr-xl-5 mr-5 mr-xl-3 ml-5">
                            <i class="icon-phone-2"></i>
                            <h6 class="pt-1 line-height-1">LLamanos al<a href="tel:+51978038200" class="d-block text-dark ls-10 pt-1">+51 978 038 200</a></h6>
                        </div>
                        <a href="#" class="header-icon header-icon-user"><i class="icon-user-2"></i></a> -->
                    </div>
                </div>
								
							</div>
					
					<div class="tab-pane fade text-center" id="parti-content" role="tabpanel"
								aria-labelledby="parti-tab">
								
								<div class="container">
                    <div class="header-left col-lg-2 w-auto pl-0">
                        <!--<button class="mobile-menu-toggler mr-2" type="button">
                            <i class="fas fa-bars"></i>
                        </button>
						<a href="./"><img src="assets/images/logo_aza.png" alt="AZATRADE"></a> -->
                    </div>
					
                    <div class="header-right w-lg-max pl-2">
                        <div class="header-searchp header-iconp header-search-inlinep header-search-categoryp w-lg-max" style="display: flex; justify-content: center;">
                                <div class="header-search-wrappep">
									<input type="hidden" id="buscasqlp" name="buscasqlp" value="partida">
									<!--<select class="form-select" aria-label="Default select example" id='qp' name="qp" lang="es" style="border-radius: 80px 20px 5px 90px; background-color:#F4F4F4; height: 40px;"> -->
										<select class="form-select" aria-label="Default select example" id='qp' name="qp" lang="es" style="border-radius: 80px 20px 5px 90px; background-color:#F4F4F4; height: 40px;">
        <option value=''>- Buscar Partida -</option>
     </select>
									<div class="select-customp">
                                        <select id="yearp" name="yearp">
                                            <option value="2023">2023</option>
                                            <option value="2022">2022</option>
                                            <option value="2021">2021</option>
                                            <option value="2020">2020</option>
                                            <option value="2019">2019</option>
											<option value="2018">2018</option>
											<option value="2017">2017</option>
											<option value="2016">2016</option>
											<option value="2015">2015</option>
											<option value="2014">2014</option>
											<option value="2013">2013</option>
											<option value="2012">2012</option>
                                        </select>
                                    </div>
									<?php if (isset($_SESSION['login_usuario'])){ ?>
                                    <button class="btn icon-magnifier" type="button" id="buscap" name="buscap"></button>
									<?php }else{ ?>
									<a href="login" class="btn icon-magnifier"></a>
									<?php } ?>
                                </div>
                        </div>
                        <!--<div class="header-contact d-none d-lg-flex align-items-center pr-xl-5 mr-5 mr-xl-3 ml-5">
                            <i class="icon-phone-2"></i>
                            <h6 class="pt-1 line-height-1">LLamanos al<a href="tel:+51978038200" class="d-block text-dark ls-10 pt-1">+51 978 038 200</a></h6>
                        </div>
                        <a href="#" class="header-icon header-icon-user"><i class="icon-user-2"></i></a> -->
                    </div>
                </div>
								
							</div>
							<div class="tab-pane fade text-center" id="color-content" role="tabpanel"
								aria-labelledby="color-tab">
								
								<div class="container">
                    <div class="header-left col-lg-2 w-auto pl-0">
                        <!--<button class="mobile-menu-toggler mr-2" type="button">
                            <i class="fas fa-bars"></i>
                        </button>
						<a href="./"><img src="assets/images/logo_aza.png" alt="AZATRADE"></a> -->
                    </div>
					
                    <div class="header-right w-lg-max pl-2">
                        <div class="header-searchp header-iconp header-search-inlinep header-search-categoryp w-lg-max" style="display: flex; justify-content: center;">
                                <div class="header-search-wrappep">
									<input type="hidden" id="buscasql4" name="buscasql4" value="regio">
                                    <div class="select-customp">
                                        <select id="cate4" name="cate4" style="border-radius: 80px 20px 5px 90px; background-color:#F4F4F4;">
											
											<?php
$ddxlt = "SELECT d.iddepartamento, d.nombre FROM departamento AS d ORDER BY d.nombre ASC";
$rxtdpt = $conexpg -> prepare($ddxlt); 
$rxtdpt -> execute(); 
$txxs = $rxtdpt -> fetchAll(PDO::FETCH_OBJ); 
if($rxtdpt -> rowCount() > 0) { 
foreach($txxs as $dxpx) {
	$dcxl1 = $dxpx -> iddepartamento;
	$dcxl2 = $dxpx -> nombre;
	
	echo "<option value='$dcxl1'>$dcxl2</option>";
	}
}else{
									?>
									<option value=''>Sin Datos</option>
<?php
	}
	?>
                                        </select>
                                    </div>
									<div class="select-customp">
                                        <select id="year4" name="year4">
                                            <option value="2023">2023</option>
                                            <option value="2022">2022</option>
                                            <option value="2021">2021</option>
                                            <option value="2020">2020</option>
                                            <option value="2019">2019</option>
											<option value="2018">2018</option>
											<option value="2017">2017</option>
											<option value="2016">2016</option>
											<option value="2015">2015</option>
											<option value="2014">2014</option>
											<option value="2013">2013</option>
											<option value="2012">2012</option>
                                        </select>
                                    </div>
									<?php if (isset($_SESSION['login_usuario'])){ ?>
                                    <button class="btn icon-magnifier" type="button" id="busca4" name="busca4"></button>
									<?php }else{ ?>
									<a href="login" class="btn icon-magnifier"></a>
									<?php } ?>
                                </div>
                        </div>
                        <!--<div class="header-contact d-none d-lg-flex align-items-center pr-xl-5 mr-5 mr-xl-3 ml-5">
                            <i class="icon-phone-2"></i>
                            <h6 class="pt-1 line-height-1">LLamanos al<a href="tel:+51978038200" class="d-block text-dark ls-10 pt-1">+51 978 038 200</a></h6>
                        </div>
                        <a href="#" class="header-icon header-icon-user"><i class="icon-user-2"></i></a> -->
                    </div>
                </div>
								
							</div>
							<div class="tab-pane fade text-center" id="sect-content" role="tabpanel"
								aria-labelledby="sect-tab">
								
								<div class="container">
                    <div class="header-left col-lg-2 w-auto pl-0">
                        <!-- <button class="mobile-menu-toggler mr-2" type="button">
                            <i class="fas fa-bars"></i>
                        </button>
						<a href="./"><img src="assets/images/logo_aza.png" alt="AZATRADE"></a> -->
                    </div>
					
                    <div class="header-right w-lg-max pl-2">
                        <div class="header-searchp header-iconp header-search-inlinep header-search-categoryp w-lg-max" style="display: flex; justify-content: center;">
                                <div class="header-search-wrappep">
									<input type="hidden" id="buscasql5" name="buscasql5" value="sector">
                                    <div class="select-customp">
                                        <select id="cate5" name="cate5" style="border-radius: 80px 20px 5px 90px; background-color:#F4F4F4;" >
											
											<?php
$sflt = "SELECT concat(tipo,sector) as codsec, concat(tipo,' - ',sector) as sector FROM sector GROUP BY tipo, sector ORDER BY sector ASC";
$ggdpt = $conexpg -> prepare($sflt); 
$ggdpt -> execute(); 
$skds = $ggdpt -> fetchAll(PDO::FETCH_OBJ); 
if($ggdpt -> rowCount() > 0) { 
foreach($skds as $sllpt) {
	$dfl1 = $sllpt -> codsec;
	$dfl2 = $sllpt -> sector;
	
	echo "<option value='$dfl1'>$dfl2</option>";
	}
}else{
									?>
									<option value=''>Sin datos</option>
<?php
	}
	?>
                                        </select>
                                    </div>
									<div class="select-customp">
                                        <select id="year5" name="year5">
                                            <option value="2023">2023</option>
                                            <option value="2022">2022</option>
                                            <option value="2021">2021</option>
                                            <option value="2020">2020</option>
                                            <option value="2019">2019</option>
											<option value="2018">2018</option>
											<option value="2017">2017</option>
											<option value="2016">2016</option>
											<option value="2015">2015</option>
											<option value="2014">2014</option>
											<option value="2013">2013</option>
											<option value="2012">2012</option>
                                        </select>
                                    </div>
									<?php if (isset($_SESSION['login_usuario'])){ ?>
                                    <button class="btn icon-magnifier" type="button" id="busca5" name="busca5"></button>
									<?php }else{ ?>
									<a href="login" class="btn icon-magnifier"></a>
									<?php } ?>
                                </div>
                        </div>
                        <!-- <div class="header-contact d-none d-lg-flex align-items-center pr-xl-5 mr-5 mr-xl-3 ml-5">
                            <i class="icon-phone-2"></i>
                            <h6 class="pt-1 line-height-1">LLamanos al<a href="tel:+51978038200" class="d-block text-dark ls-10 pt-1">+51 978 038 200</a></h6>
                        </div>
                        <a href="#" class="header-icon header-icon-user"><i class="icon-user-2"></i></a> -->
                    </div>
                </div>
								
							</div>
						</div>
					</div>
			<!-- fin tab -->
			
        </header>
        <!-- End .header -->

        <main class="main home">
            <div class="container mb-2">
				
                <div class="row">
					
					
                    <div class="col-lg-9">
						<!-- busqueda -->
						<div id="loader" class="text-center"><center><img src="assets/images/loading-carga.gif" width="180px">Procesando Datos, espere un momento por favor...</center></div>

          <!-- AJAX -->
          <div id="outer_div"></div>
          <!-- END AJAX -->
						<!-- fin busqueda -->
						
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
	
	<script src="assets/select2v410/js/select2.min.js"></script>
	<script src="assets/select2v410/js/i18n/es.js"></script>
	
	<script>
	$(document).ready(function(){
  $('#buscador').keyup(function(){
     var nombres = $('.nombres');
     var buscando = $(this).val();
     var item='';
     for( var i = 0; i < nombres.length; i++ ){
         item = $(nombres[i]).html().toLowerCase();
          for(var x = 0; x < item.length; x++ ){
              if( buscando.length == 0 || item.indexOf( buscando ) > -1 ){
                  $(nombres[i]).parents('.item').show(); 
              }else{
                   $(nombres[i]).parents('.item').hide();
              }
          }
     }
  });
});
	</script>
	
	<script type="text/javascript">
  function onKeyUp(event) {
    var keycode = event.keyCode;
    if(keycode == '13'){	
		
		$("#outer_div").empty ();//limpiamos div
			//oculta
		divb = document.getElementById('muestra');
        divb.style.display = 'none';
      $(document).ready(function(){
        load(1);
      });
		
    }
  }
</script>
	
	
	<script>
$(document).ready(function(){

   $("#qp").select2({
      ajax: {
        url: "extraer-partida-import.php",
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
$(document).ready(function(){

   $("#q2").select2({
      ajax: {
        url: "extraer-empresa-import.php",
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
$(document).ready(function(){

   $("#cate2").select2({
      ajax: {
        url: "extraer-mercado.php",
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
			
			//TAB PRODUCTOS
		$('#busca').on('click', function (T){ 
			$("#outer_div").empty ();//limpiamos div
			//oculta
		divb = document.getElementById('muestra');
        divb.style.display = 'none';
			
		//var anios = 30;
		//alert("hola "+anios+" f");
      $(document).ready(function(){
        load(1);
      });
			
			});
			
			//TAB MERCADO
		$('#busca2').on('click', function (T){ 
			$("#outer_div").empty ();//limpiamos div
			//oculta
		divb = document.getElementById('muestra');
        divb.style.display = 'none';
			
		//var anios = 30;
		//alert("hola "+anios+" f");
      $(document).ready(function(){
        load2(1);
      });
			
			});
			
			//TAB EMPRESAS
		$('#busca3').on('click', function (T){ 
			$("#outer_div").empty ();//limpiamos div
			//oculta
		divb = document.getElementById('muestra');
        divb.style.display = 'none';
			
		//var anios = 30;
		//alert("hola "+anios+" f");
      $(document).ready(function(){
        load3(1);
      });
			
			});
			
			//TAB REGIONES
		$('#busca4').on('click', function (T){ 
			$("#outer_div").empty ();//limpiamos div
			//oculta
		divb = document.getElementById('muestra');
        divb.style.display = 'none';
			
		//var anios = 30;
		//alert("hola "+anios+" f");
      $(document).ready(function(){
        load4(1);
      });
			
			});
			
			//TAB SECTORES
		$('#busca5').on('click', function (T){ 
			$("#outer_div").empty ();//limpiamos div
			//oculta
		divb = document.getElementById('muestra');
        divb.style.display = 'none';
			
		//var anios = 30;
		//alert("hola "+anios+" f");
      $(document).ready(function(){
        load5(1);
      });
			
			});
			
			//TAB PARTIDA
		$('#buscap').on('click', function (T){ 
			$("#outer_div").empty ();//limpiamos div
			//oculta
		divb = document.getElementById('muestra');
        divb.style.display = 'none';
			
		//var anios = 30;
		//alert("hola "+anios+" f");
      $(document).ready(function(){
        load6(1);
      });
			
			});
			
			}); 
		
      function load(page){
		  product = document.getElementById("q").value;
		  proyear = document.getElementById("year").value;
		  ptipo1 = document.getElementById("buscasql").value;
		  
        var parametros = {"action" : "ajax", "page" : page};
        $("#loader").fadeIn();
        $.ajax({
		  url : 'busquedainicial-import.php?data='+product+'&year='+proyear+'&ptipo1='+ptipo1,
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
		
		function load2(page){
		  product = document.getElementById("cate2").value;
		  proyear = document.getElementById("year2").value;
		  ptipo1 = document.getElementById("buscasql2").value;
		  
        var parametros = {"action" : "ajax", "page" : page};
        $("#loader").fadeIn();
        $.ajax({
		  url : 'busquedainicial-merca-import.php?data='+product+'&year='+proyear+'&ptipo1='+ptipo1,
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
		
		function load3(page){
		  product = document.getElementById("q2").value;
		  proyear = document.getElementById("year3").value;
		  
        var parametros = {"action" : "ajax", "page" : page};
        $("#loader").fadeIn();
        $.ajax({
		  url : 'busquedainicial-empresas-import.php?data='+product+'&year='+proyear,
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
		
		function load4(page){
		  product = document.getElementById("cate4").value;
		  proyear = document.getElementById("year4").value;
		  
        var parametros = {"action" : "ajax", "page" : page};
        $("#loader").fadeIn();
        $.ajax({
		  url : 'busquedainicial-region.php?data='+product+'&year='+proyear,
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
		
		function load5(page){
		  product = document.getElementById("cate5").value;
		  proyear = document.getElementById("year5").value;
		  
        var parametros = {"action" : "ajax", "page" : page};
        $("#loader").fadeIn();
        $.ajax({
		  url : 'busquedainicial-sector.php?data='+product+'&year='+proyear,
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
		
		function load6(page){
			$("#outer_div").empty ();//limpiamos div
		  product = document.getElementById("qp").value;
		  proyear = document.getElementById("yearp").value;
		  
        var parametros = {"action" : "ajax", "page" : page};
        $("#loader").fadeIn();
        $.ajax({
		  url : 'busquedainicial-partida-uso.php?data='+product+'&year='+proyear,
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