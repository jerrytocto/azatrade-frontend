<?php
include("conex/inibd.php");
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
            <div class="header-top bg-primary text-uppercase">
                <div class="container">
                    <!-- <div class="header-left">
                        <div class="header-dropdown mr-auto mr-sm-3 mr-md-0">
                            <a href="#" class="pl-0"><i class="flag-us flag"></i>ENG</a>
                            <div class="header-menu">
                                <ul>
                                    <li><a href="#"><i class="flag-us flag mr-2"></i>ENG</a>
                                    </li>
                                    <li><a href="#"><i class="flag-fr flag mr-2"></i>FRA</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="header-dropdown ml-3 pl-1">
                            <a href="#">USD</a>
                            <div class="header-menu">
                                <ul>
                                    <li><a href="#">EUR</a></li>
                                    <li><a href="#">USD</a></li>
                                </ul>
                            </div>
                        </div>
                    </div> -->
                    <div class="header-right header-dropdowns ml-0 ml-sm-auto">
                        <p class="top-message mb-0 d-none d-sm-block">Bienvenido a Azatrade</p>
                        <div class="header-dropdown dropdown-expanded mr-3">
                            <a href="#">Links</a>
                            <div class="header-menu">
                                <ul>
                                    <li><a href="./">Exportadores</a></li>
                                    <li><a href="#">Importadores</a></li>
                                    <li><a href="#">Reg&iacute;strate</a></li>
                                    <li><a href="#" class="login-link">Ingresar</a></li>
                                </ul>
                            </div>
                        </div>
                        <span class="separator"></span>

                        <div class="social-icons">
                            <a href="#" class="social-icon social-facebook icon-facebook ml-0" target="_blank"></a>
                            <a href="#" class="social-icon social-twitter icon-twitter ml-0" target="_blank"></a>
                            <a href="#" class="social-icon social-instagram icon-instagram ml-0" target="_blank"></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End .header-top -->

            <div class="header-middle text-dark sticky-header">
				
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
							<li class="nav-item">
								<a class="nav-link" id="color-tab" data-toggle="tab" href="#color-content" role="tab"
									aria-controls="color-content" aria-selected="true">Regiones</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="sect-tab" data-toggle="tab" href="#sect-content" role="tab"
									aria-controls="sect-content" aria-selected="true">Sectores</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="" data-toggle="" href="#" target="_blank" role=""
									aria-controls="" aria-selected="">Avanzada</a>
							</li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane fade show active text-center" id="customer-content" role="tabpanel"
								aria-labelledby="tab-customer">
								
								<div class="container">
                    <div class="header-left col-lg-2 w-auto pl-0">
                        <button class="mobile-menu-toggler mr-2" type="button">
                            <i class="fas fa-bars"></i>
                        </button>
						<a href="./"><img src="assets/images/logo_aza.png" alt="AZATRADE"></a>
                    </div>
					
                    <div class="header-right w-lg-max pl-2">
                        <div class="header-search header-icon header-search-inline header-search-category w-lg-max">
                                <div class="header-search-wrapper">
									<input type="hidden" id="buscasql" name="buscasql" value="produ">
                                    <input type="search" class="form-control" name="q" id="q" placeholder="buscar..." onkeyup="onKeyUp(event)" >
                                    <!--<div class="select-custom">
                                        <select id="cate" name="cate">
                                            <option value="Productos">Productos</option>
                                            <option value="Mercados">Mercados</option>
                                            <option value="Empresas">Empresas</option>
                                            <option value="Regiones">Regiones</option>
                                            <option value="Sectores">Sectores</option>
                                        </select>
                                    </div> -->
									<div class="select-custom">
                                        <select id="year" name="year">
                                            <option value="2023">2023</option>
                                            <option value="2022">2022</option>
                                            <option value="2021">2021</option>
                                            <option value="2020">2020</option>
                                            <option value="2019">2019</option>
                                        </select>
                                    </div>
                                    <button class="btn icon-magnifier" type="button" id="busca" name="busca"></button>
                                </div>
                        </div>
                        <div class="header-contact d-none d-lg-flex align-items-center pr-xl-5 mr-5 mr-xl-3 ml-5">
                            <i class="icon-phone-2"></i>
                            <h6 class="pt-1 line-height-1">LLamanos al<a href="tel:+51978038200" class="d-block text-dark ls-10 pt-1">+51 978 038 200</a></h6>
                        </div>
                        <a href="#" class="header-icon header-icon-user"><i class="icon-user-2"></i></a>
                    </div>
                </div>
								
							</div>
							<div class="tab-pane fade text-center" id="lng-content" role="tabpanel"
								aria-labelledby="lng-tab">
								
								<div class="container">
                    <div class="header-left col-lg-2 w-auto pl-0">
                        <button class="mobile-menu-toggler mr-2" type="button">
                            <i class="fas fa-bars"></i>
                        </button>
						<a href="./"><img src="assets/images/logo_aza.png" alt="AZATRADE"></a>
                    </div>
					
                    <div class="header-right w-lg-max pl-2">
                        <div class="header-search header-icon header-search-inline header-search-category w-lg-max" style="display: flex; justify-content: center;">
                                <div class="header-search-wrapper">
                                    <!-- <input type="search" class="form-control" name="q" id="q" placeholder="buscar..." onkeyup="onKeyUp(event)" disabled style="visibility: hidden;" > -->
									<input type="hidden" id="buscasql2" name="buscasql2" value="merca">
                                    <div class="" >
                                        <!--<select id="cate2" name="cate2" class="" style="border-radius: 80px 20px 5px 90px; background-color:#F4F4F4;">
											<?php
/*$dqwlt = "SELECT p.idpaises, p.espanol FROM paises AS p ORDER BY p.espanol ASC";
$reht = $conexpg -> prepare($dqwlt); 
$reht -> execute(); 
$thhs = $reht -> fetchAll(PDO::FETCH_OBJ); 
if($reht -> rowCount() > 0) { 
foreach($thhs as $ffft) {
	$tdd1 = $ffft -> idpaises;
	$tdd2 = $ffft -> espanol;
	
	echo "<option value='$tdd1'>$tdd2</option>";
	}
}else{ */
									?>
									<option value=''>Sin datos</option>
<?php
	//}
	?>
                                        </select> -->
	<select id='cate2' name="cate2" lang="es" style="border-radius: 80px 20px 5px 90px; background-color:#F4F4F4;">
        <option value=''>- Buscar Mercado -</option>
    </select>
                                   </div>
									<div class="select-custom">
                                        <select id="year2" name="year2">
                                            <option value="2023">2023</option>
                                            <option value="2022">2022</option>
                                            <option value="2021">2021</option>
                                            <option value="2020">2020</option>
                                            <option value="2019">2019</option>
                                        </select>
                                    </div>
                                    <button class="btn icon-magnifier" type="button" id="busca2" name="busca2"></button>
                                </div>
                        </div>
                        <div class="header-contact d-none d-lg-flex align-items-center pr-xl-5 mr-5 mr-xl-3 ml-5">
                            <i class="icon-phone-2"></i>
                            <h6 class="pt-1 line-height-1">LLamanos al<a href="tel:+51978038200" class="d-block text-dark ls-10 pt-1">+51 978 038 200</a></h6>
                        </div>
                        <a href="#" class="header-icon header-icon-user"><i class="icon-user-2"></i></a>
                    </div>
                </d5iv>
								
							</div>
							</div>
					
							<div class="tab-pane fade text-center" id="font-content" role="tabpanel"
								aria-labelledby="font-tab">
								
								<div class="container">
                    <div class="header-left col-lg-2 w-auto pl-0">
                        <button class="mobile-menu-toggler mr-2" type="button">
                            <i class="fas fa-bars"></i>
                        </button>
						<a href="./"><img src="assets/images/logo_aza.png" alt="AZATRADE"></a>
                    </div>
					
                    <div class="header-right w-lg-max pl-2">
                        <div class="header-search header-icon header-search-inline header-search-category w-lg-max" style="display: flex; justify-content: center;">
                                <div class="header-search-wrapper">
									<input type="hidden" id="buscasql3" name="buscasql3" value="empre">
                                    <!-- <input type="search" class="form-control" name="q2" id="q2" placeholder="buscar RUC" onkeyup="onKeyUp2(event)" > -->
									<div class="" >
									<select id='q2' name="q2" lang="es" style="border-radius: 80px 20px 5px 90px; background-color:#F4F4F4;">
        <option value=''>- Buscar Empresa -</option>
     </select>
									</div>
									
                                    <!--<div class="select-custom">
                                        <select id="cate" name="cate">
                                            <option value="Productos">Productos</option>
                                            <option value="Mercados">Mercados</option>
                                            <option value="Empresas">Empresas</option>
                                            <option value="Regiones">Regiones</option>
                                            <option value="Sectores">Sectores</option>
                                        </select>
                                    </div> -->
									<div class="select-custom">
                                        <select id="year3" name="year3">
                                            <option value="2023">2023</option>
                                            <option value="2022">2022</option>
                                            <option value="2021">2021</option>
                                            <option value="2020">2020</option>
                                            <option value="2019">2019</option>
                                        </select>
                                    </div>
                                    <button class="btn icon-magnifier" type="button" id="busca3" name="busca3"></button>
                                </div>
                        </div>
                        <div class="header-contact d-none d-lg-flex align-items-center pr-xl-5 mr-5 mr-xl-3 ml-5">
                            <i class="icon-phone-2"></i>
                            <h6 class="pt-1 line-height-1">LLamanos al<a href="tel:+51978038200" class="d-block text-dark ls-10 pt-1">+51 978 038 200</a></h6>
                        </div>
                        <a href="#" class="header-icon header-icon-user"><i class="icon-user-2"></i></a>
                    </div>
                </div>
								
							</div>
					
					<div class="tab-pane fade text-center" id="parti-content" role="tabpanel"
								aria-labelledby="parti-tab">
								
								<div class="container">
                    <div class="header-left col-lg-2 w-auto pl-0">
                        <button class="mobile-menu-toggler mr-2" type="button">
                            <i class="fas fa-bars"></i>
                        </button>
						<a href="./"><img src="assets/images/logo_aza.png" alt="AZATRADE"></a>
                    </div>
					
                    <div class="header-right w-lg-max pl-2">
                        <div class="header-search header-icon header-search-inline header-search-category w-lg-max" style="display: flex; justify-content: center;">
                                <div class="header-search-wrapper">
									<input type="hidden" id="buscasqlp" name="buscasqlp" value="partida">
                                    <!--<input type="search" class="form-control" name="qp" id="qp" placeholder="buscar por Partida" onkeyup="onKeyUp3(event)" >-->
									<select id='qp' name="qp" lang="es" style="border-radius: 80px 20px 5px 90px; background-color:#F4F4F4;">
        <option value=''>- Buscar Partida -</option>
     </select>
                                    <!--<div class="select-custom">
                                        <select id="cate" name="cate">
                                            <option value="Productos">Productos</option>
                                            <option value="Mercados">Mercados</option>
                                            <option value="Empresas">Empresas</option>
                                            <option value="Regiones">Regiones</option>
                                            <option value="Sectores">Sectores</option>
                                        </select>
                                    </div> -->
									<div class="select-custom">
                                        <select id="yearp" name="yearp">
                                            <option value="2023">2023</option>
                                            <option value="2022">2022</option>
                                            <option value="2021">2021</option>
                                            <option value="2020">2020</option>
                                            <option value="2019">2019</option>
                                        </select>
                                    </div>
                                    <button class="btn icon-magnifier" type="button" id="buscap" name="buscap"></button>
                                </div>
                        </div>
                        <div class="header-contact d-none d-lg-flex align-items-center pr-xl-5 mr-5 mr-xl-3 ml-5">
                            <i class="icon-phone-2"></i>
                            <h6 class="pt-1 line-height-1">LLamanos al<a href="tel:+51978038200" class="d-block text-dark ls-10 pt-1">+51 978 038 200</a></h6>
                        </div>
                        <a href="#" class="header-icon header-icon-user"><i class="icon-user-2"></i></a>
                    </div>
                </div>
								
							</div>
							<div class="tab-pane fade text-center" id="color-content" role="tabpanel"
								aria-labelledby="color-tab">
								
								<div class="container">
                    <div class="header-left col-lg-2 w-auto pl-0">
                        <button class="mobile-menu-toggler mr-2" type="button">
                            <i class="fas fa-bars"></i>
                        </button>
						<a href="./"><img src="assets/images/logo_aza.png" alt="AZATRADE"></a>
                    </div>
					
                    <div class="header-right w-lg-max pl-2">
                        <div class="header-search header-icon header-search-inline header-search-category w-lg-max" style="display: flex; justify-content: center;">
                                <div class="header-search-wrapper">
									<input type="hidden" id="buscasql4" name="buscasql4" value="regio">
                                    <!--<input type="search" class="form-control" name="q3" id="q3" placeholder="buscar..." onkeyup="onKeyUp(event)" > -->
                                    <div class="">
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
									<div class="select-custom">
                                        <select id="year4" name="year4">
                                            <option value="2023">2023</option>
                                            <option value="2022">2022</option>
                                            <option value="2021">2021</option>
                                            <option value="2020">2020</option>
                                            <option value="2019">2019</option>
                                        </select>
                                    </div>
                                    <button class="btn icon-magnifier" type="button" id="busca4" name="busca4"></button>
                                </div>
                        </div>
                        <div class="header-contact d-none d-lg-flex align-items-center pr-xl-5 mr-5 mr-xl-3 ml-5">
                            <i class="icon-phone-2"></i>
                            <h6 class="pt-1 line-height-1">LLamanos al<a href="tel:+51978038200" class="d-block text-dark ls-10 pt-1">+51 978 038 200</a></h6>
                        </div>
                        <a href="#" class="header-icon header-icon-user"><i class="icon-user-2"></i></a>
                    </div>
                </div>
								
							</div>
							<div class="tab-pane fade text-center" id="sect-content" role="tabpanel"
								aria-labelledby="sect-tab">
								
								<div class="container">
                    <div class="header-left col-lg-2 w-auto pl-0">
                        <button class="mobile-menu-toggler mr-2" type="button">
                            <i class="fas fa-bars"></i>
                        </button>
						<a href="./"><img src="assets/images/logo_aza.png" alt="AZATRADE"></a>
                    </div>
					
                    <div class="header-right w-lg-max pl-2">
                        <div class="header-search header-icon header-search-inline header-search-category w-lg-max" style="display: flex; justify-content: center;">
                                <div class="header-search-wrapper">
									<input type="hidden" id="buscasql5" name="buscasql5" value="sector">
                                    <!-- <input type="search" class="form-control" name="q" id="q" placeholder="buscar..." onkeyup="onKeyUp(event)" > -->
                                    <div class="">
                                        <select id="cate5" name="cate5" style="border-radius: 80px 20px 5px 90px; background-color:#F4F4F4;">
											
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
									<div class="select-custom">
                                        <select id="year5" name="year5">
                                            <option value="2023">2023</option>
                                            <option value="2022">2022</option>
                                            <option value="2021">2021</option>
                                            <option value="2020">2020</option>
                                            <option value="2019">2019</option>
                                        </select>
                                    </div>
                                    <button class="btn icon-magnifier" type="button" id="busca5" name="busca5"></button>
                                </div>
                        </div>
                        <div class="header-contact d-none d-lg-flex align-items-center pr-xl-5 mr-5 mr-xl-3 ml-5">
                            <i class="icon-phone-2"></i>
                            <h6 class="pt-1 line-height-1">LLamanos al<a href="tel:+51978038200" class="d-block text-dark ls-10 pt-1">+51 978 038 200</a></h6>
                        </div>
                        <a href="#" class="header-icon header-icon-user"><i class="icon-user-2"></i></a>
                    </div>
                </div>
								
							</div>
						</div>
					</div>

                <!-- <div class="container">
                    <div class="header-left col-lg-2 w-auto pl-0">
                        <button class="mobile-menu-toggler mr-2" type="button">
                            <i class="fas fa-bars"></i>
                        </button>
						<a href="./"><img src="assets/images/logo_aza.png" alt="AZATRADE"></a>
                    </div>
					
                    <div class="header-right w-lg-max pl-2">
                        <div class="header-search header-icon header-search-inline header-search-category w-lg-max">
                                <div class="header-search-wrapper">
                                    <input type="search" class="form-control" name="q" id="q" placeholder="buscar..." onkeyup="onKeyUp(event)" >
                                    <div class="select-custom">
                                        <select id="cate" name="cate">
                                            <option value="Productos">Productos</option>
                                            <option value="Mercados">Mercados</option>
                                            <option value="Empresas">Empresas</option>
                                            <option value="Regiones">Regiones</option>
                                            <option value="Sectores">Sectores</option>
                                        </select>
                                    </div>
									<div class="select-custom">
                                        <select id="year" name="year">
                                            <option value="2023">2023</option>
                                            <option value="2022">2022</option>
                                            <option value="2021">2021</option>
                                            <option value="2020">2020</option>
                                            <option value="2019">2019</option>
                                        </select>
                                    </div>
                                    <button class="btn icon-magnifier" type="button" id="busca" name="busca"></button>
                                </div>
                        </div>
                        <div class="header-contact d-none d-lg-flex align-items-center pr-xl-5 mr-5 mr-xl-3 ml-5">
                            <i class="icon-phone-2"></i>
                            <h6 class="pt-1 line-height-1">LLamanos al<a href="tel:+51978038200" class="d-block text-dark ls-10 pt-1">+51 978 038 200</a></h6>
                        </div>
                        <a href="#" class="header-icon header-icon-user"><i class="icon-user-2"></i></a>
                    </div>
                </div> -->
				
            </div>
            <!-- End .header-middle -->
        </header>
        <!-- End .header -->

        <main class="main home">
			<!-- <p><center><a href="#"><b>CONSULTA AVANZADA</b> <i class="icon-search-3"></i> </a></center></p> -->
            <div class="container mb-2">
                <!-- <div class="info-boxes-container row row-joined mb-2 font2">
                    <div class="info-box info-box-icon-left col-lg-4">
                        <i class="icon-shipping"></i>

                        <div class="info-box-content">
                            <h4>FREE SHIPPING &amp; RETURN</h4>
                            <p class="text-body">Free shipping on all orders over $99</p>
                        </div>
                    </div>
                    <div class="info-box info-box-icon-left col-lg-4">
                        <i class="icon-money"></i>

                        <div class="info-box-content">
                            <h4>MONEY BACK GUARANTEE</h4>
                            <p class="text-body">100% money back guarantee</p>
                        </div>
                    </div>
                    <div class="info-box info-box-icon-left col-lg-4">
                        <i class="icon-support"></i>

                        <div class="info-box-content">
                            <h4>ONLINE SUPPORT 24/7</h4>
                            <p class="text-body">Lorem ipsum dolor sit amet.</p>
                        </div>
                    </div>
                </div> -->
				
                <div class="row">
					
					
                    <div class="col-lg-9">
						<!-- busqueda -->
						<div id="loader" class="text-center"><center><img src="assets/images/loading-carga.gif" width="180px">Procesando Datos, espere un momento por favor...</center></div>

          <!-- AJAX -->
          <div id="outer_div"></div>
          <!-- END AJAX -->
						<!-- fin busqueda -->
						
						<div id="muestra">
                        <div class="home-slider slide-animate owl-carousel owl-theme mb-2" data-owl-options="{
							'loop': false,
							'dots': true,
							'nav': false
						}">
                            <div class="home-slide home-slide1 banner banner-md-vw banner-sm-vw d-flex align-items-center">
                                <img class="slide-bg" style="background-color: #2699D0;" src="assets/images/demoes/demo1/slider/Baner_1.png" width="880" height="428" alt="home-slider">
                                <div class="banner-layer appear-animate" data-animation-name="fadeInUpShorter">
                                    <h4 class="text-white mb-0">Encuentra exportadores en Perú</h4>
                                    <h2 class="text-white mb-0">sistema inteligente </h2>
                                    <h3 class="text-white text-uppercase m-b-3">AZATRADE</h3>
                                    <h5 class="text-white text-uppercase d-inline-block mb-0 ls-n-20 align-text-bottom">
                                        Tu&nbsp;&nbsp;Plan <b class="coupon-sale-text bg-secondary text-white d-inline-block">$<em
                                                class="align-text-top">199</em>99</b></h5>
                                    <a href="" class="btn btn-dark btn-md ls-10">Reg&iacute;strate</a>
                                </div>
                                <!-- End .banner-layer -->
                            </div>
                            <!-- End .home-slide -->

                            <div class="home-slide home-slide2 banner banner-md-vw banner-sm-vw d-flex align-items-center">
                                <img class="slide-bg" style="background-color: #dadada;" src="assets/images/demoes/demo1/slider/Baner_2.png" width="880" height="428" alt="home-slider">
                                <div class="banner-layer text-uppercase appear-animate" data-animation-name="fadeInUpShorter">
                                    <h4 class="m-b-2">Si Asia tiene a ALI-BABA, Perú tiene a</h4>
                                    <h2 class="m-b-3">AZATRADE</h2>
                                    <h5 class="d-inline-block mb-0 align-top mr-5 mb-2">Tu&nbsp;&nbsp;Plan
                                        <b>$<em>299</em>99</b>
                                    </h5>
                                    <a href="" class="btn btn-dark btn-md ls-10">Reg&iacute;strate</a>
                                </div>
                                <!-- End .banner-layer -->
                            </div>
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

                        <!--<div class="banners-container m-b-2 owl-carousel owl-theme" data-owl-options="{
							'dots': false,
							'margin': 20,
							'loop': false,
							'responsive': {
								'480': {
									'items': 2
								},
								'768': {
									'items': 3
								}
							}
						}">
                            <div class="banner banner1 banner-hover-shadow d-flex align-items-center mb-2 w-100 appear-animate" data-animation-name="fadeInLeftShorter" data-animation-delay="500">
                                <figure class="w-100">
                                    <img src="assets/images/demoes/demo1/banners/banner-1.jpg" style="background-color: #dadada;" alt="banner">
                                </figure>
                                <div class="banner-layer">
                                    <h3 class="m-b-2">Porto Watches</h3>
                                    <h4 class="m-b-4 text-primary"><sup class="text-dark"><del>20%</del></sup>30%<sup>OFF</sup></h4>
                                    <a href="demo1-shop.html" class="text-dark text-uppercase ls-10">Shop Now</a>
                                </div>
                            </div>
                            <div class="banner banner2 text-uppercase banner-hover-shadow d-flex align-items-center mb-2 w-100 appear-animate" data-animation-name="fadeInUpShorter" data-animation-delay="200">
                                <figure class="w-100">
                                    <img src="assets/images/demoes/demo1/banners/banner-2.jpg" style="background-color: #dadada;" alt="banner">
                                </figure>
                                <div class="banner-layer text-center">
                                    <h3 class="m-b-1 ls-n-20">Deal Promos</h3>
                                    <h4 class="text-body">Starting at $99</h4>
                                    <a href="demo1-shop.html" class="text-dark text-uppercase ls-10">Shop Now</a>
                                </div>
                            </div>
                            <div class="banner banner3 banner-hover-shadow d-flex align-items-center mb-2 w-100 appear-animate" data-animation-name="fadeInRightShorter" data-animation-delay="500">
                                <figure class="w-100">
                                    <img src="assets/images/demoes/demo1/banners/banner-3.jpg" style="background-color: #dadada;" alt="banner">
                                </figure>
                                <div class="banner-layer text-right">
                                    <h3 class="m-b-2">Handbags</h3>
                                    <h4 class="mb-3 text-secondary text-uppercase">Starting at $99</h4>
                                    <a href="demo1-shop.html" class="text-dark text-uppercase ls-10">Shop Now</a>
                                </div>
                            </div>
                        </div> -->

                        <h2 class="section-title ls-n-10 m-b-4 appear-animate" data-animation-name="fadeInUpShorter">
                            Sector No Tradicional - Agropecuario</h2>

                        <div class="products-slider owl-carousel owl-theme dots-top dots-small m-b-1 pb-1 appear-animate" data-animation-name="fadeInUpShorter">
							
							<?php
$sqllist = "SELECT p.idcod, p.partida_nandi, p.prod_especifico, p.presentacion, p.partida_desc, 
	p.tipo_sec, p.sector, p.subsector, p.detalle_sector, p.imgfoto, 
	p.descri_corto, p.vfobusdserdol1, p.vfobusdserdol2, p.vfobusdserdol3, 
	p.vpesnet1, p.vpesnet2, p.vpesnet3, 
	p.precio1, p.precio2, p.precio3, p.mostrar 
	FROM productos AS p 
	WHERE p.mostrar = 'Si' AND p.tipo_sec='No tradicional' AND p.sector='Agropecuario' LIMIT 10 ";
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
	$filaff12 = $shht -> vfobusdserdol1;
	$filaff13 = $shht -> vfobusdserdol2;
	$filaff14 = $shht -> vfobusdserdol3;
	$filaff15 = $shht -> vpesnet1;
	$filaff16 = $shht -> vpesnet2;
	$filaff17 = $shht -> vpesnet3;
	$filaff18 = $shht -> precio1;
	$filaff19 = $shht -> precio2;
	$filaff20 = $shht -> precio3;
	$filaff6x1 = $shht -> tipo_sec;
	$filaff7x1 = $shht -> sector;
	

	
							?>
							
                            <!--<div class="product-default inner-quickview inner-icon">
                                <figure class="img-effect">
                                    <a href="demo1-product.html">
                                        <img src="admin/imgproductos/<?=$filaff10;?>" width="205" height="205" alt="<?=$filaff2;?>">
                                        <img src="admin/imgproductos/<?=$filaff10;?>" width="205" height="205" alt="<?=$filaff2;?>">
                                    </a>
                                    <div class="label-group">
                                        <div class="product-label label-hot">HOT</div>
                                        <div class="product-label label-sale">-20%</div>
                                    </div>
                                    <div class="btn-icon-group">
                                        <a href="demo1-product.html" class="btn-icon btn-add-cart"><i
                                                class="fa fa-arrow-right"></i>
                                        </a>
                                    </div>
                                    <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick View</a>
                                    <div class="product-countdown-container">
                                        <span class="product-countdown-title">offer ends in:</span>
                                        <div class="product-countdown countdown-compact" data-until="2021, 10, 5" data-compact="true">
                                        </div>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a href="demo1-shop.html" class="product-category">category</a>
                                        </div>
                                        <a href="wishlist.html" title="Add to Wishlist" class="btn-icon-wish"><i
                                                class="icon-heart"></i></a>
                                    </div>
                                    <h3 class="product-title"> <a href="demo1-product.html">Black Grey Headset</a> </h3>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:100%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                    </div>
                                    <div class="price-box">
                                        <span class="product-price">$9.00</span>
                                    </div>
                                </div>
                            </div>-->
							
							<div class="product-default inner-quickview inner-icon">
                                <figure class="img-effect">
                                    <a>
                                        <img src="admin/imgproductos/<?=$filaff10;?>" width="205" height="205" alt="<?=$filaff3;?>" />
                                    </a>
									<div class="label-group">
                                        <div class="product-label label-hot">TOP</div>
                                        <!--<div class="product-label label-sale">-20%</div>-->
                                    </div>
                                    <!-- <div class="btn-icon-group">
                                        <a href="#" title="Add To Cart" class="btn-icon btn-add-cart product-type-simple"><i
                                                class="icon-shopping-cart"></i></a>
                                    </div> -->
                                    <a href="sector-producto?dat=<?=$filaff2;?>&pk=<?=$filaff1;?>" target="_blank" class="btn-quickview" title="VER EMPRESAS">VER EMPRESAS</a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a class="product-category"> <?=$filaff6;?> - <?=$filaff7;?> </a>
                                        </div>
                                    </div>
									<h3 class="product-title"><b> <?=$filaff3;?> - <?=$filaff4;?> </b> </h3>
                                    <h3 class="product-title"> <a href="partida-detalle?dat=<?=$filaff2;?>&year=2022" target="_blank">Partida: <?=$filaff2;?> </a> </h3>
                                    <!-- <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:100%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                    </div> -->
                                    <div class="price-box">
                                        <span class="product-price">Precio FOB <?=$filaff19;?> KG </span>
                                    </div>
                                </div>
                            </div>
							<?php
	}
}
							?>
                             <!--<div class="product-default inner-quickview inner-icon">
                                <figure class="img-effect">
                                    <a href="demo1-product.html">
                                        <img src="assets/images/demoes/demo1/products/product-2.jpg" width="205" height="205" alt="product" />
                                    </a>
                                    <div class="btn-icon-group">
                                        <a href="#" title="Add To Cart" class="btn-icon btn-add-cart product-type-simple"><i
                                                class="icon-shopping-cart"></i></a>
                                    </div>
                                    <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick View</a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a href="demo1-shop.html" class="product-category">category</a>
                                        </div>
                                        <a href="wishlist.html" title="Add to Wishlist" class="btn-icon-wish"><i
                                                class="icon-heart"></i></a>
                                    </div>
                                    <h3 class="product-title"> <a href="demo1-product.html">Battery Charger</a> </h3>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:100%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                    </div>
                                    <div class="price-box">
                                        <span class="product-price">$9.00</span>
                                    </div>
                                </div>
                            </div>
                            <div class="product-default inner-quickview inner-icon">
                                <figure class="img-effect">
                                    <a href="demo1-product.html">
                                        <img src="assets/images/demoes/demo1/products/product-3.jpg" width="205" height="205" alt="product">
                                        <img src="assets/images/demoes/demo1/products/product-3-2.jpg" width="205" height="205" alt="product">
                                    </a>
                                    <div class="label-group">
                                        <div class="product-label label-hot">HOT</div>
                                        <div class="product-label label-sale">-30%</div>
                                    </div>
                                    <div class="btn-icon-group">
                                        <a href="#" title="Add To Cart" class="btn-icon btn-add-cart product-type-simple"><i
                                                class="icon-shopping-cart"></i></a>
                                    </div>

                                    <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick View</a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a href="demo1-shop.html" class="product-category">category</a>
                                        </div>
                                        <a href="wishlist.html" title="Add to Wishlist" class="btn-icon-wish"><i
                                                class="icon-heart"></i></a>
                                    </div>
                                    <h3 class="product-title"> <a href="demo1-product.html">Brown Bag</a> </h3>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:100%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                    </div>
                                    <div class="price-box">
                                        <span class="product-price">$9.00</span>
                                    </div>
                                </div>
                            </div>
                            <div class="product-default inner-quickview inner-icon">
                                <figure class="img-effect">
                                    <a href="demo1-product.html">
                                        <img src="assets/images/demoes/demo1/products/product-4.jpg" width="205" height="205" alt="product">
                                        <img src="assets/images/demoes/demo1/products/product-4-2.jpg" width="205" height="205" alt="product">
                                    </a>
                                    <div class="label-group">
                                        <div class="product-label label-hot">HOT</div>
                                    </div>
                                    <div class="btn-icon-group">
                                        <a href="#" title="Add To Cart" class="btn-icon btn-add-cart product-type-simple"><i
                                                class="icon-shopping-cart"></i></a>
                                    </div>
                                    <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick View</a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a href="demo1-shop.html" class="product-category">category</a>
                                        </div>
                                        <a href="wishlist.html" title="Add to Wishlist" class="btn-icon-wish"><i
                                                class="icon-heart"></i></a>
                                    </div>
                                    <h3 class="product-title"> <a href="demo1-product.html">Casual Note Bag</a> </h3>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:100%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                    </div>
                                    <div class="price-box">
                                        <span class="product-price">$9.00</span>
                                    </div>
                                </div>
                            </div>
                            <div class="product-default inner-quickview inner-icon">
                                <figure class="img-effect">
                                    <a href="demo1-product.html">
                                        <img src="assets/images/demoes/demo1/products/product-5.jpg" width="205" height="205" alt="product">
                                        <img src="assets/images/demoes/demo1/products/product-5-2.jpg" width="205" height="205" alt="product">
                                    </a>
                                    <div class="label-group">
                                        <div class="product-label label-hot">HOT</div>
                                    </div>
                                    <div class="btn-icon-group">
                                        <a href="#" title="Add To Cart" class="btn-icon btn-add-cart product-type-simple"><i
                                                class="icon-shopping-cart"></i></a>
                                    </div>
                                    <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick View</a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a href="demo1-shop.html" class="product-category">category</a>
                                        </div>
                                        <a href="wishlist.html" title="Add to Wishlist" class="btn-icon-wish"><i
                                                class="icon-heart"></i></a>
                                    </div>
                                    <h3 class="product-title"> <a href="demo1-product.html">Porto Extended Camera</a>
                                    </h3>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:100%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                    </div>
                                    <div class="price-box">
                                        <span class="product-price">$9.00</span>
                                    </div>
                                </div>
                            </div> -->
							
                        </div> 
							<p align='right'> <a href='sectores?dat=<?=$filaff6x1;?>&year=<?=$filaff7x1;?>' target="_blank" class='btn btn-primary btn-xs'><b>VER TODOS</b></a> </p>
                        <!-- End .featured-proucts -->

							<h2 class="section-title ls-n-10 m-b-4 appear-animate" data-animation-name="fadeInUpShorter">
                            Sector No Tradicional - Artesanías</h2>
                        <div class="products-slider owl-carousel owl-theme dots-top dots-small m-b-1 pb-1 appear-animate" data-animation-name="fadeInUpShorter">
							
							<?php
$sqllist = "SELECT p.idcod, p.partida_nandi, p.prod_especifico, p.presentacion, p.partida_desc, 
	p.tipo_sec, p.sector, p.subsector, p.detalle_sector, p.imgfoto, 
	p.descri_corto, p.vfobusdserdol1, p.vfobusdserdol2, p.vfobusdserdol3, 
	p.vpesnet1, p.vpesnet2, p.vpesnet3, 
	p.precio1, p.precio2, p.precio3, p.mostrar 
	FROM productos AS p 
	WHERE p.mostrar = 'Si' AND p.tipo_sec='No tradicional' AND p.sector='Artesanías' LIMIT 10 ";
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
	$filaff12 = $shht -> vfobusdserdol1;
	$filaff13 = $shht -> vfobusdserdol2;
	$filaff14 = $shht -> vfobusdserdol3;
	$filaff15 = $shht -> vpesnet1;
	$filaff16 = $shht -> vpesnet2;
	$filaff17 = $shht -> vpesnet3;
	$filaff18 = $shht -> precio1;
	$filaff19 = $shht -> precio2;
	$filaff20 = $shht -> precio3;
	$filaff6x2 = $shht -> tipo_sec;
	$filaff7x2 = $shht -> sector;
	

	
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
                                    <!-- <div class="btn-icon-group">
                                        <a href="#" title="Add To Cart" class="btn-icon btn-add-cart product-type-simple"><i
                                                class="icon-shopping-cart"></i></a>
                                    </div> -->
                                    <a href="sector-producto?dat=<?=$filaff2;?>&pk=<?=$filaff1;?>" target="_blank" class="btn-quickview" title="VER EMPRESAS">VER EMPRESAS</a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a class="product-category"> <?=$filaff6;?> - <?=$filaff7;?> </a>
                                        </div>
                                    </div>
									<h3 class="product-title"><b> <?=$filaff3;?> - <?=$filaff4;?> </b> </h3>
                                    <h3 class="product-title"> <a href="partida-detalle?dat=<?=$filaff2;?>&year=2022" target="_blank">Partida: <?=$filaff2;?> </a> </h3>
                                    <!-- <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:100%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                    </div> -->
                                    <div class="price-box">
                                        <span class="product-price">Precio FOB <?=$filaff19;?> KG </span>
                                    </div>
                                </div>
                            </div>
							
							<?php
	}
}
							?>
							</div> 
							<p align='right'> <a href='sectores?dat=<?=$filaff6x2;?>&year=<?=$filaff7x2;?>' target="_blank" class='btn btn-primary btn-xs'><b>VER TODOS</b></a> </p>
							
							<h2 class="section-title ls-n-10 m-b-4 appear-animate" data-animation-name="fadeInUpShorter">
                            Sector No Tradicional - Maderas y papeles</h2>
                        <div class="products-slider owl-carousel owl-theme dots-top dots-small m-b-1 pb-1 appear-animate" data-animation-name="fadeInUpShorter">
							
							<?php
$sqllist = "SELECT p.idcod, p.partida_nandi, p.prod_especifico, p.presentacion, p.partida_desc, 
	p.tipo_sec, p.sector, p.subsector, p.detalle_sector, p.imgfoto, 
	p.descri_corto, p.vfobusdserdol1, p.vfobusdserdol2, p.vfobusdserdol3, 
	p.vpesnet1, p.vpesnet2, p.vpesnet3, 
	p.precio1, p.precio2, p.precio3, p.mostrar 
	FROM productos AS p 
	WHERE p.mostrar = 'Si' AND p.tipo_sec='No tradicional' AND p.sector='Maderas y papeles' LIMIT 10 ";
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
	$filaff12 = $shht -> vfobusdserdol1;
	$filaff13 = $shht -> vfobusdserdol2;
	$filaff14 = $shht -> vfobusdserdol3;
	$filaff15 = $shht -> vpesnet1;
	$filaff16 = $shht -> vpesnet2;
	$filaff17 = $shht -> vpesnet3;
	$filaff18 = $shht -> precio1;
	$filaff19 = $shht -> precio2;
	$filaff20 = $shht -> precio3;
	$filaff6x3 = $shht -> tipo_sec;
	$filaff7x3 = $shht -> sector;
	

	
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
                                    <!-- <div class="btn-icon-group">
                                        <a href="#" title="Add To Cart" class="btn-icon btn-add-cart product-type-simple"><i
                                                class="icon-shopping-cart"></i></a>
                                    </div> -->
                                    <a href="sector-producto?dat=<?=$filaff2;?>&pk=<?=$filaff1;?>" target="_blank" class="btn-quickview" title="VER EMPRESAS">VER EMPRESAS</a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a class="product-category"> <?=$filaff6;?> - <?=$filaff7;?> </a>
                                        </div>
                                    </div>
									<h3 class="product-title"><b> <?=$filaff3;?> - <?=$filaff4;?> </b> </h3>
                                    <h3 class="product-title"> <a href="partida-detalle?dat=<?=$filaff2;?>&year=2022" target="_blank">Partida: <?=$filaff2;?> </a> </h3>
                                    <!-- <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:100%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                    </div> -->
                                    <div class="price-box">
                                        <span class="product-price">Precio FOB <?=$filaff19;?> KG </span>
                                    </div>
                                </div>
                            </div>
							
							<?php
	}
}
							?>
							</div> 
							<p align='right'> <a href='sectores?dat=<?=$filaff6x3;?>&year=<?=$filaff7x3;?>' target="_blank" class='btn btn-primary btn-xs'><b>VER TODOS</b></a> </p>
							
							
							<h2 class="section-title ls-n-10 m-b-4 appear-animate" data-animation-name="fadeInUpShorter">
                            Sector No Tradicional - Metal mecánico</h2>
                        <div class="products-slider owl-carousel owl-theme dots-top dots-small m-b-1 pb-1 appear-animate" data-animation-name="fadeInUpShorter">
							
							<?php
$sqllist = "SELECT p.idcod, p.partida_nandi, p.prod_especifico, p.presentacion, p.partida_desc, 
	p.tipo_sec, p.sector, p.subsector, p.detalle_sector, p.imgfoto, 
	p.descri_corto, p.vfobusdserdol1, p.vfobusdserdol2, p.vfobusdserdol3, 
	p.vpesnet1, p.vpesnet2, p.vpesnet3, 
	p.precio1, p.precio2, p.precio3, p.mostrar 
	FROM productos AS p 
	WHERE p.mostrar = 'Si' AND p.tipo_sec='No tradicional' AND p.sector='Metal mecánico' LIMIT 10 ";
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
	$filaff12 = $shht -> vfobusdserdol1;
	$filaff13 = $shht -> vfobusdserdol2;
	$filaff14 = $shht -> vfobusdserdol3;
	$filaff15 = $shht -> vpesnet1;
	$filaff16 = $shht -> vpesnet2;
	$filaff17 = $shht -> vpesnet3;
	$filaff18 = $shht -> precio1;
	$filaff19 = $shht -> precio2;
	$filaff20 = $shht -> precio3;
	$filaff6x4 = $shht -> tipo_sec;
	$filaff7x4 = $shht -> sector;
	

	
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
                                    <a href="sector-producto?dat=<?=$filaff2;?>&pk=<?=$filaff1;?>" target="_blank" class="btn-quickview" title="VER EMPRESAS">VER EMPRESAS</a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a class="product-category"> <?=$filaff6;?> - <?=$filaff7;?> </a>
                                        </div>
                                    </div>
									<h3 class="product-title"><b> <?=$filaff3;?> - <?=$filaff4;?> </b> </h3>
                                    <h3 class="product-title"> <a href="partida-detalle?dat=<?=$filaff2;?>&year=2022" target="_blank">Partida: <?=$filaff2;?> </a> </h3>
                                    <div class="price-box">
                                        <span class="product-price">Precio FOB <?=$filaff19;?> KG </span>
                                    </div>
                                </div>
                            </div>
							
							<?php
	}
}
							?>
							</div> 
							<p align='right'> <a href='sectores?dat=<?=$filaff6x4;?>&year=<?=$filaff7x4;?>' target="_blank" class='btn btn-primary btn-xs'><b>VER TODOS</b></a> </p>
							
							<h2 class="section-title ls-n-10 m-b-4 appear-animate" data-animation-name="fadeInUpShorter">
                            Sector No Tradicional - Minería no metálica</h2>
                        <div class="products-slider owl-carousel owl-theme dots-top dots-small m-b-1 pb-1 appear-animate" data-animation-name="fadeInUpShorter">
							
							<?php
$sqllist = "SELECT p.idcod, p.partida_nandi, p.prod_especifico, p.presentacion, p.partida_desc, 
	p.tipo_sec, p.sector, p.subsector, p.detalle_sector, p.imgfoto, 
	p.descri_corto, p.vfobusdserdol1, p.vfobusdserdol2, p.vfobusdserdol3, 
	p.vpesnet1, p.vpesnet2, p.vpesnet3, 
	p.precio1, p.precio2, p.precio3, p.mostrar 
	FROM productos AS p 
	WHERE p.mostrar = 'Si' AND p.tipo_sec='No tradicional' AND p.sector='Minería no metálica' LIMIT 10 ";
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
	$filaff12 = $shht -> vfobusdserdol1;
	$filaff13 = $shht -> vfobusdserdol2;
	$filaff14 = $shht -> vfobusdserdol3;
	$filaff15 = $shht -> vpesnet1;
	$filaff16 = $shht -> vpesnet2;
	$filaff17 = $shht -> vpesnet3;
	$filaff18 = $shht -> precio1;
	$filaff19 = $shht -> precio2;
	$filaff20 = $shht -> precio3;
	$filaff6x5 = $shht -> tipo_sec;
	$filaff7x5 = $shht -> sector;
	

	
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
                                    <a href="sector-producto?dat=<?=$filaff2;?>&pk=<?=$filaff1;?>" target="_blank" class="btn-quickview" title="VER EMPRESAS">VER EMPRESAS</a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a class="product-category"> <?=$filaff6;?> - <?=$filaff7;?> </a>
                                        </div>
                                    </div>
									<h3 class="product-title"><b> <?=$filaff3;?> - <?=$filaff4;?> </b> </h3>
                                    <h3 class="product-title"> <a href="partida-detalle?dat=<?=$filaff2;?>&year=2022" target="_blank">Partida: <?=$filaff2;?> </a> </h3>
                                    <div class="price-box">
                                        <span class="product-price">Precio FOB <?=$filaff19;?> KG </span>
                                    </div>
                                </div>
                            </div>
							
							<?php
	}
}
							?>
							</div>
							<p align='right'> <a href='sectores?dat=<?=$filaff6x5;?>&year=<?=$filaff7x5;?>' target="_blank" class='btn btn-primary btn-xs'><b>VER TODOS</b></a> </p>
							
							
							<h2 class="section-title ls-n-10 m-b-4 appear-animate" data-animation-name="fadeInUpShorter">
                            Sector No Tradicional - No identificado</h2>
                        <div class="products-slider owl-carousel owl-theme dots-top dots-small m-b-1 pb-1 appear-animate" data-animation-name="fadeInUpShorter">
							
							<?php
$sqllist = "SELECT p.idcod, p.partida_nandi, p.prod_especifico, p.presentacion, p.partida_desc, 
	p.tipo_sec, p.sector, p.subsector, p.detalle_sector, p.imgfoto, 
	p.descri_corto, p.vfobusdserdol1, p.vfobusdserdol2, p.vfobusdserdol3, 
	p.vpesnet1, p.vpesnet2, p.vpesnet3, 
	p.precio1, p.precio2, p.precio3, p.mostrar 
	FROM productos AS p 
	WHERE p.mostrar = 'Si' AND p.tipo_sec='No tradicional' AND p.sector='No identificado' LIMIT 10 ";
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
	$filaff12 = $shht -> vfobusdserdol1;
	$filaff13 = $shht -> vfobusdserdol2;
	$filaff14 = $shht -> vfobusdserdol3;
	$filaff15 = $shht -> vpesnet1;
	$filaff16 = $shht -> vpesnet2;
	$filaff17 = $shht -> vpesnet3;
	$filaff18 = $shht -> precio1;
	$filaff19 = $shht -> precio2;
	$filaff20 = $shht -> precio3;
	$filaff6x6 = $shht -> tipo_sec;
	$filaff7x6 = $shht -> sector;
	

	
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
                                    <a href="sector-producto?dat=<?=$filaff2;?>&pk=<?=$filaff1;?>" target="_blank" class="btn-quickview" title="VER EMPRESAS">VER EMPRESAS</a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a class="product-category"> <?=$filaff6;?> - <?=$filaff7;?> </a>
                                        </div>
                                    </div>
									<h3 class="product-title"><b> <?=$filaff3;?> - <?=$filaff4;?> </b> </h3>
                                    <h3 class="product-title"> <a href="partida-detalle?dat=<?=$filaff2;?>&year=2022" target="_blank">Partida: <?=$filaff2;?> </a> </h3>
                                    <div class="price-box">
                                        <span class="product-price">Precio FOB <?=$filaff19;?> KG </span>
                                    </div>
                                </div>
                            </div>
							
							<?php
	}
}
							?>
							</div>
							<p align='right'> <a href='sectores?dat=<?=$filaff6x6;?>&year=<?=$filaff7x6;?>' target="_blank" class='btn btn-primary btn-xs'><b>VER TODOS</b></a> </p>
							
							<h2 class="section-title ls-n-10 m-b-4 appear-animate" data-animation-name="fadeInUpShorter">
                            Sector No Tradicional - Pesquero</h2>
                        <div class="products-slider owl-carousel owl-theme dots-top dots-small m-b-1 pb-1 appear-animate" data-animation-name="fadeInUpShorter">
							
							<?php
$sqllist = "SELECT p.idcod, p.partida_nandi, p.prod_especifico, p.presentacion, p.partida_desc, 
	p.tipo_sec, p.sector, p.subsector, p.detalle_sector, p.imgfoto, 
	p.descri_corto, p.vfobusdserdol1, p.vfobusdserdol2, p.vfobusdserdol3, 
	p.vpesnet1, p.vpesnet2, p.vpesnet3, 
	p.precio1, p.precio2, p.precio3, p.mostrar 
	FROM productos AS p 
	WHERE p.mostrar = 'Si' AND p.tipo_sec='No tradicional' AND p.sector='Pesquero' LIMIT 10 ";
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
	$filaff12 = $shht -> vfobusdserdol1;
	$filaff13 = $shht -> vfobusdserdol2;
	$filaff14 = $shht -> vfobusdserdol3;
	$filaff15 = $shht -> vpesnet1;
	$filaff16 = $shht -> vpesnet2;
	$filaff17 = $shht -> vpesnet3;
	$filaff18 = $shht -> precio1;
	$filaff19 = $shht -> precio2;
	$filaff20 = $shht -> precio3;
	$filaff6x7 = $shht -> tipo_sec;
	$filaff7x7 = $shht -> sector;
	

	
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
                                    <a href="sector-producto?dat=<?=$filaff2;?>&pk=<?=$filaff1;?>" target="_blank" class="btn-quickview" title="VER EMPRESAS">VER EMPRESAS</a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a class="product-category"> <?=$filaff6;?> - <?=$filaff7;?> </a>
                                        </div>
                                    </div>
									<h3 class="product-title"><b> <?=$filaff3;?> - <?=$filaff4;?> </b> </h3>
                                    <h3 class="product-title"> <a href="partida-detalle?dat=<?=$filaff2;?>&year=2022" target="_blank">Partida: <?=$filaff2;?> </a> </h3>
                                    <div class="price-box">
                                        <span class="product-price">Precio FOB <?=$filaff19;?> KG </span>
                                    </div>
                                </div>
                            </div>
							
							<?php
	}
}
							?>
							</div>
							<p align='right'> <a href='sectores?dat=<?=$filaff6x7;?>&year=<?=$filaff7x7;?>' target="_blank" class='btn btn-primary btn-xs'><b>VER TODOS</b></a> </p>
							
							
							<h2 class="section-title ls-n-10 m-b-4 appear-animate" data-animation-name="fadeInUpShorter">
                            Sector No Tradicional - Pieles y cueros</h2>
                        <div class="products-slider owl-carousel owl-theme dots-top dots-small m-b-1 pb-1 appear-animate" data-animation-name="fadeInUpShorter">
							
							<?php
$sqllist = "SELECT p.idcod, p.partida_nandi, p.prod_especifico, p.presentacion, p.partida_desc, 
	p.tipo_sec, p.sector, p.subsector, p.detalle_sector, p.imgfoto, 
	p.descri_corto, p.vfobusdserdol1, p.vfobusdserdol2, p.vfobusdserdol3, 
	p.vpesnet1, p.vpesnet2, p.vpesnet3, 
	p.precio1, p.precio2, p.precio3, p.mostrar 
	FROM productos AS p 
	WHERE p.mostrar = 'Si' AND p.tipo_sec='No tradicional' AND p.sector='Pieles y cueros' LIMIT 10 ";
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
	$filaff12 = $shht -> vfobusdserdol1;
	$filaff13 = $shht -> vfobusdserdol2;
	$filaff14 = $shht -> vfobusdserdol3;
	$filaff15 = $shht -> vpesnet1;
	$filaff16 = $shht -> vpesnet2;
	$filaff17 = $shht -> vpesnet3;
	$filaff18 = $shht -> precio1;
	$filaff19 = $shht -> precio2;
	$filaff20 = $shht -> precio3;
	$filaff6x8 = $shht -> tipo_sec;
	$filaff7x8 = $shht -> sector;
	

	
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
                                    <a href="sector-producto?dat=<?=$filaff2;?>&pk=<?=$filaff1;?>" target="_blank" class="btn-quickview" title="VER EMPRESAS">VER EMPRESAS</a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a class="product-category"> <?=$filaff6;?> - <?=$filaff7;?> </a>
                                        </div>
                                    </div>
									<h3 class="product-title"><b> <?=$filaff3;?> - <?=$filaff4;?> </b> </h3>
                                    <h3 class="product-title"> <a href="partida-detalle?dat=<?=$filaff2;?>&year=2022" target="_blank">Partida: <?=$filaff2;?> </a> </h3>
                                    <div class="price-box">
                                        <span class="product-price">Precio FOB <?=$filaff19;?> KG </span>
                                    </div>
                                </div>
                            </div>
							
							<?php
	}
}
							?>
							</div>
							<p align='right'> <a href='sectores?dat=<?=$filaff6x8;?>&year=<?=$filaff7x8;?>' target="_blank" class='btn btn-primary btn-xs'><b>VER TODOS</b></a> </p>
							
							<h2 class="section-title ls-n-10 m-b-4 appear-animate" data-animation-name="fadeInUpShorter">
                            Sector No Tradicional - Químico</h2>
                        <div class="products-slider owl-carousel owl-theme dots-top dots-small m-b-1 pb-1 appear-animate" data-animation-name="fadeInUpShorter">
							
							<?php
$sqllist = "SELECT p.idcod, p.partida_nandi, p.prod_especifico, p.presentacion, p.partida_desc, 
	p.tipo_sec, p.sector, p.subsector, p.detalle_sector, p.imgfoto, 
	p.descri_corto, p.vfobusdserdol1, p.vfobusdserdol2, p.vfobusdserdol3, 
	p.vpesnet1, p.vpesnet2, p.vpesnet3, 
	p.precio1, p.precio2, p.precio3, p.mostrar 
	FROM productos AS p 
	WHERE p.mostrar = 'Si' AND p.tipo_sec='No tradicional' AND p.sector='Químico' LIMIT 10 ";
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
	$filaff12 = $shht -> vfobusdserdol1;
	$filaff13 = $shht -> vfobusdserdol2;
	$filaff14 = $shht -> vfobusdserdol3;
	$filaff15 = $shht -> vpesnet1;
	$filaff16 = $shht -> vpesnet2;
	$filaff17 = $shht -> vpesnet3;
	$filaff18 = $shht -> precio1;
	$filaff19 = $shht -> precio2;
	$filaff20 = $shht -> precio3;
	$filaff6x9 = $shht -> tipo_sec;
	$filaff7x9 = $shht -> sector;
	

	
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
                                    <a href="sector-producto?dat=<?=$filaff2;?>&pk=<?=$filaff1;?>" target="_blank" class="btn-quickview" title="VER EMPRESAS">VER EMPRESAS</a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a class="product-category"> <?=$filaff6;?> - <?=$filaff7;?> </a>
                                        </div>
                                    </div>
									<h3 class="product-title"><b> <?=$filaff3;?> - <?=$filaff4;?> </b> </h3>
                                    <h3 class="product-title"> <a href="partida-detalle?dat=<?=$filaff2;?>&year=2022" target="_blank">Partida: <?=$filaff2;?> </a> </h3>
                                    <div class="price-box">
                                        <span class="product-price">Precio FOB <?=$filaff19;?> KG </span>
                                    </div>
                                </div>
                            </div>
							
							<?php
	}
}
							?>
							</div>
							<p align='right'> <a href='sectores?dat=<?=$filaff6x9;?>&year=<?=$filaff7x9;?>' target="_blank" class='btn btn-primary btn-xs'><b>VER TODOS</b></a> </p>
							
							<h2 class="section-title ls-n-10 m-b-4 appear-animate" data-animation-name="fadeInUpShorter">
                            Sector No Tradicional - Sidero metalúrgico</h2>
                        <div class="products-slider owl-carousel owl-theme dots-top dots-small m-b-1 pb-1 appear-animate" data-animation-name="fadeInUpShorter">
							
							<?php
$sqllist = "SELECT p.idcod, p.partida_nandi, p.prod_especifico, p.presentacion, p.partida_desc, 
	p.tipo_sec, p.sector, p.subsector, p.detalle_sector, p.imgfoto, 
	p.descri_corto, p.vfobusdserdol1, p.vfobusdserdol2, p.vfobusdserdol3, 
	p.vpesnet1, p.vpesnet2, p.vpesnet3, 
	p.precio1, p.precio2, p.precio3, p.mostrar 
	FROM productos AS p 
	WHERE p.mostrar = 'Si' AND p.tipo_sec='No tradicional' AND p.sector='Sidero metalúrgico' LIMIT 10 ";
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
	$filaff12 = $shht -> vfobusdserdol1;
	$filaff13 = $shht -> vfobusdserdol2;
	$filaff14 = $shht -> vfobusdserdol3;
	$filaff15 = $shht -> vpesnet1;
	$filaff16 = $shht -> vpesnet2;
	$filaff17 = $shht -> vpesnet3;
	$filaff18 = $shht -> precio1;
	$filaff19 = $shht -> precio2;
	$filaff20 = $shht -> precio3;
	$filaff6x10 = $shht -> tipo_sec;
	$filaff7x10 = $shht -> sector;
	

	
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
                                    <a href="sector-producto?dat=<?=$filaff2;?>&pk=<?=$filaff1;?>" target="_blank" class="btn-quickview" title="VER EMPRESAS">VER EMPRESAS</a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a class="product-category"> <?=$filaff6;?> - <?=$filaff7;?> </a>
                                        </div>
                                    </div>
									<h3 class="product-title"><b> <?=$filaff3;?> - <?=$filaff4;?> </b> </h3>
                                    <h3 class="product-title"> <a href="partida-detalle?dat=<?=$filaff2;?>&year=2022" target="_blank">Partida: <?=$filaff2;?> </a> </h3>
                                    <div class="price-box">
                                        <span class="product-price">Precio FOB <?=$filaff19;?> KG </span>
                                    </div>
                                </div>
                            </div>
							
							<?php
	}
}
							?>
							</div>
							<p align='right'> <a href='sectores?dat=<?=$filaff6x10;?>&year=<?=$filaff7x10;?>' target="_blank" class='btn btn-primary btn-xs'><b>VER TODOS</b></a> </p>
							
							<h2 class="section-title ls-n-10 m-b-4 appear-animate" data-animation-name="fadeInUpShorter">
                            Sector No Tradicional - Textil</h2>
                        <div class="products-slider owl-carousel owl-theme dots-top dots-small m-b-1 pb-1 appear-animate" data-animation-name="fadeInUpShorter">
							
							<?php
$sqllist = "SELECT p.idcod, p.partida_nandi, p.prod_especifico, p.presentacion, p.partida_desc, 
	p.tipo_sec, p.sector, p.subsector, p.detalle_sector, p.imgfoto, 
	p.descri_corto, p.vfobusdserdol1, p.vfobusdserdol2, p.vfobusdserdol3, 
	p.vpesnet1, p.vpesnet2, p.vpesnet3, 
	p.precio1, p.precio2, p.precio3, p.mostrar 
	FROM productos AS p 
	WHERE p.mostrar = 'Si' AND p.tipo_sec='No tradicional' AND p.sector='Textil' LIMIT 10 ";
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
	$filaff12 = $shht -> vfobusdserdol1;
	$filaff13 = $shht -> vfobusdserdol2;
	$filaff14 = $shht -> vfobusdserdol3;
	$filaff15 = $shht -> vpesnet1;
	$filaff16 = $shht -> vpesnet2;
	$filaff17 = $shht -> vpesnet3;
	$filaff18 = $shht -> precio1;
	$filaff19 = $shht -> precio2;
	$filaff20 = $shht -> precio3;
	$filaff6x11 = $shht -> tipo_sec;
	$filaff7x11 = $shht -> sector;
	

	
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
                                    <a href="sector-producto?dat=<?=$filaff2;?>&pk=<?=$filaff1;?>" target="_blank" class="btn-quickview" title="VER EMPRESAS">VER EMPRESAS</a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a class="product-category"> <?=$filaff6;?> - <?=$filaff7;?> </a>
                                        </div>
                                    </div>
									<h3 class="product-title"><b> <?=$filaff3;?> - <?=$filaff4;?> </b> </h3>
                                    <h3 class="product-title"> <a href="partida-detalle?dat=<?=$filaff2;?>&year=2022" target="_blank">Partida: <?=$filaff2;?> </a> </h3>
                                    <div class="price-box">
                                        <span class="product-price">Precio FOB <?=$filaff19;?> KG </span>
                                    </div>
                                </div>
                            </div>
							
							<?php
	}
}
							?>
							</div>
							<p align='right'> <a href='sectores?dat=<?=$filaff6x11;?>&year=<?=$filaff7x11;?>' target="_blank" class='btn btn-primary btn-xs'><b>VER TODOS</b></a> </p>
							
							<h2 class="section-title ls-n-10 m-b-4 appear-animate" data-animation-name="fadeInUpShorter">
                            Sector No Tradicional - Varios (Inc. joyería)</h2>
                        <div class="products-slider owl-carousel owl-theme dots-top dots-small m-b-1 pb-1 appear-animate" data-animation-name="fadeInUpShorter">
							
							<?php
$sqllist = "SELECT p.idcod, p.partida_nandi, p.prod_especifico, p.presentacion, p.partida_desc, 
	p.tipo_sec, p.sector, p.subsector, p.detalle_sector, p.imgfoto, 
	p.descri_corto, p.vfobusdserdol1, p.vfobusdserdol2, p.vfobusdserdol3, 
	p.vpesnet1, p.vpesnet2, p.vpesnet3, 
	p.precio1, p.precio2, p.precio3, p.mostrar 
	FROM productos AS p 
	WHERE p.mostrar = 'Si' AND p.tipo_sec='No tradicional' AND p.sector='Varios (Inc. joyería)' LIMIT 10 ";
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
	$filaff12 = $shht -> vfobusdserdol1;
	$filaff13 = $shht -> vfobusdserdol2;
	$filaff14 = $shht -> vfobusdserdol3;
	$filaff15 = $shht -> vpesnet1;
	$filaff16 = $shht -> vpesnet2;
	$filaff17 = $shht -> vpesnet3;
	$filaff18 = $shht -> precio1;
	$filaff19 = $shht -> precio2;
	$filaff20 = $shht -> precio3;
	$filaff6x12 = $shht -> tipo_sec;
	$filaff7x12 = $shht -> sector;
	

	
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
                                    <a href="sector-producto?dat=<?=$filaff2;?>&pk=<?=$filaff1;?>" target="_blank" class="btn-quickview" title="VER EMPRESAS">VER EMPRESAS</a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a class="product-category"> <?=$filaff6;?> - <?=$filaff7;?> </a>
                                        </div>
                                    </div>
									<h3 class="product-title"><b> <?=$filaff3;?> - <?=$filaff4;?> </b> </h3>
                                    <h3 class="product-title"> <a href="partida-detalle?dat=<?=$filaff2;?>&year=2022" target="_blank">Partida: <?=$filaff2;?> </a> </h3>
                                    <div class="price-box">
                                        <span class="product-price">Precio FOB <?=$filaff19;?> KG </span>
                                    </div>
                                </div>
                            </div>
							
							<?php
	}
}
							?>
							</div>
							<p align='right'> <a href='sectores?dat=<?=$filaff6x12;?>&year=<?=$filaff7x12;?>' target="_blank" class='btn btn-primary btn-xs'><b>VER TODOS</b></a> </p>
							
							<h2 class="section-title ls-n-10 m-b-4 appear-animate" data-animation-name="fadeInUpShorter">
                            Sector Tradicional - Agrícolas </h2>
                        <div class="products-slider owl-carousel owl-theme dots-top dots-small m-b-1 pb-1 appear-animate" data-animation-name="fadeInUpShorter">
							
							<?php
$sqllist = "SELECT p.idcod, p.partida_nandi, p.prod_especifico, p.presentacion, p.partida_desc, 
	p.tipo_sec, p.sector, p.subsector, p.detalle_sector, p.imgfoto, 
	p.descri_corto, p.vfobusdserdol1, p.vfobusdserdol2, p.vfobusdserdol3, 
	p.vpesnet1, p.vpesnet2, p.vpesnet3, 
	p.precio1, p.precio2, p.precio3, p.mostrar 
	FROM productos AS p 
	WHERE p.mostrar = 'Si' AND p.tipo_sec='Tradicional' AND p.sector='Agrícolas' LIMIT 10 ";
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
	$filaff12 = $shht -> vfobusdserdol1;
	$filaff13 = $shht -> vfobusdserdol2;
	$filaff14 = $shht -> vfobusdserdol3;
	$filaff15 = $shht -> vpesnet1;
	$filaff16 = $shht -> vpesnet2;
	$filaff17 = $shht -> vpesnet3;
	$filaff18 = $shht -> precio1;
	$filaff19 = $shht -> precio2;
	$filaff20 = $shht -> precio3;
	$filaff6x13 = $shht -> tipo_sec;
	$filaff7x13 = $shht -> sector;
	

	
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
                                    <a href="sector-producto?dat=<?=$filaff2;?>&pk=<?=$filaff1;?>" target="_blank" class="btn-quickview" title="VER EMPRESAS">VER EMPRESAS</a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a class="product-category"> <?=$filaff6;?> - <?=$filaff7;?> </a>
                                        </div>
                                    </div>
									<h3 class="product-title"><b> <?=$filaff3;?> - <?=$filaff4;?> </b> </h3>
                                    <h3 class="product-title"> <a href="partida-detalle?dat=<?=$filaff2;?>&year=2022" target="_blank">Partida: <?=$filaff2;?> </a> </h3>
                                    <div class="price-box">
                                        <span class="product-price">Precio FOB <?=$filaff19;?> KG </span>
                                    </div>
                                </div>
                            </div>
							
							<?php
	}
}
							?>
							</div>
							<p align='right'> <a href='sectores?dat=<?=$filaff6x13;?>&year=<?=$filaff7x13;?>' target="_blank" class='btn btn-primary btn-xs'><b>VER TODOS</b></a> </p>
							
							<h2 class="section-title ls-n-10 m-b-4 appear-animate" data-animation-name="fadeInUpShorter">
                            Sector Tradicional - Mineros </h2>
                        <div class="products-slider owl-carousel owl-theme dots-top dots-small m-b-1 pb-1 appear-animate" data-animation-name="fadeInUpShorter">
							
							<?php
$sqllist = "SELECT p.idcod, p.partida_nandi, p.prod_especifico, p.presentacion, p.partida_desc, 
	p.tipo_sec, p.sector, p.subsector, p.detalle_sector, p.imgfoto, 
	p.descri_corto, p.vfobusdserdol1, p.vfobusdserdol2, p.vfobusdserdol3, 
	p.vpesnet1, p.vpesnet2, p.vpesnet3, 
	p.precio1, p.precio2, p.precio3, p.mostrar 
	FROM productos AS p 
	WHERE p.mostrar = 'Si' AND p.tipo_sec='Tradicional' AND p.sector='Mineros' LIMIT 10 ";
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
	$filaff12 = $shht -> vfobusdserdol1;
	$filaff13 = $shht -> vfobusdserdol2;
	$filaff14 = $shht -> vfobusdserdol3;
	$filaff15 = $shht -> vpesnet1;
	$filaff16 = $shht -> vpesnet2;
	$filaff17 = $shht -> vpesnet3;
	$filaff18 = $shht -> precio1;
	$filaff19 = $shht -> precio2;
	$filaff20 = $shht -> precio3;
	$filaff6x14 = $shht -> tipo_sec;
	$filaff7x14 = $shht -> sector;
	

	
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
                                    <a href="sector-producto?dat=<?=$filaff2;?>&pk=<?=$filaff1;?>" target="_blank" class="btn-quickview" title="VER EMPRESAS">VER EMPRESAS</a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a class="product-category"> <?=$filaff6;?> - <?=$filaff7;?> </a>
                                        </div>
                                    </div>
									<h3 class="product-title"><b> <?=$filaff3;?> - <?=$filaff4;?> </b> </h3>
                                    <h3 class="product-title"> <a href="partida-detalle?dat=<?=$filaff2;?>&year=2022" target="_blank">Partida: <?=$filaff2;?> </a> </h3>
                                    <div class="price-box">
                                        <span class="product-price">Precio FOB <?=$filaff19;?> KG </span>
                                    </div>
                                </div>
                            </div>
							
							<?php
	}
}
							?>
							</div>
							<p align='right'> <a href='sectores?dat=<?=$filaff6x14;?>&year=<?=$filaff7x14;?>' target="_blank" class='btn btn-primary btn-xs'><b>VER TODOS</b></a> </p>
							
							
							<h2 class="section-title ls-n-10 m-b-4 appear-animate" data-animation-name="fadeInUpShorter">
                            Sector Tradicional - Pesquero </h2>
                        <div class="products-slider owl-carousel owl-theme dots-top dots-small m-b-1 pb-1 appear-animate" data-animation-name="fadeInUpShorter">
							
							<?php
$sqllist = "SELECT p.idcod, p.partida_nandi, p.prod_especifico, p.presentacion, p.partida_desc, 
	p.tipo_sec, p.sector, p.subsector, p.detalle_sector, p.imgfoto, 
	p.descri_corto, p.vfobusdserdol1, p.vfobusdserdol2, p.vfobusdserdol3, 
	p.vpesnet1, p.vpesnet2, p.vpesnet3, 
	p.precio1, p.precio2, p.precio3, p.mostrar 
	FROM productos AS p 
	WHERE p.mostrar = 'Si' AND p.tipo_sec='Tradicional' AND p.sector='Pesquero' LIMIT 10 ";
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
	$filaff12 = $shht -> vfobusdserdol1;
	$filaff13 = $shht -> vfobusdserdol2;
	$filaff14 = $shht -> vfobusdserdol3;
	$filaff15 = $shht -> vpesnet1;
	$filaff16 = $shht -> vpesnet2;
	$filaff17 = $shht -> vpesnet3;
	$filaff18 = $shht -> precio1;
	$filaff19 = $shht -> precio2;
	$filaff20 = $shht -> precio3;
	$filaff6x15 = $shht -> tipo_sec;
	$filaff7x15 = $shht -> sector;
	

	
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
                                    <a href="sector-producto?dat=<?=$filaff2;?>&pk=<?=$filaff1;?>" target="_blank" class="btn-quickview" title="VER EMPRESAS">VER EMPRESAS</a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a class="product-category"> <?=$filaff6;?> - <?=$filaff7;?> </a>
                                        </div>
                                    </div>
									<h3 class="product-title"><b> <?=$filaff3;?> - <?=$filaff4;?> </b> </h3>
                                    <h3 class="product-title"> <a href="partida-detalle?dat=<?=$filaff2;?>&year=2022" target="_blank">Partida: <?=$filaff2;?> </a> </h3>
                                    <div class="price-box">
                                        <span class="product-price">Precio FOB <?=$filaff19;?> KG </span>
                                    </div>
                                </div>
                            </div>
							
							<?php
	}
}
							?>
							</div>
							<p align='right'> <a href='sectores?dat=<?=$filaff6x15;?>&year=<?=$filaff7x15;?>' target="_blank" class='btn btn-primary btn-xs'><b>VER TODOS</b></a> </p>
							
							
							<h2 class="section-title ls-n-10 m-b-4 appear-animate" data-animation-name="fadeInUpShorter">
                            Sector Tradicional - Petróleo y gas natural </h2>
                        <div class="products-slider owl-carousel owl-theme dots-top dots-small m-b-1 pb-1 appear-animate" data-animation-name="fadeInUpShorter">
							
							<?php
$sqllist = "SELECT p.idcod, p.partida_nandi, p.prod_especifico, p.presentacion, p.partida_desc, 
	p.tipo_sec, p.sector, p.subsector, p.detalle_sector, p.imgfoto, 
	p.descri_corto, p.vfobusdserdol1, p.vfobusdserdol2, p.vfobusdserdol3, 
	p.vpesnet1, p.vpesnet2, p.vpesnet3, 
	p.precio1, p.precio2, p.precio3, p.mostrar 
	FROM productos AS p 
	WHERE p.mostrar = 'Si' AND p.tipo_sec='Tradicional' AND p.sector='Petróleo y gas natural' LIMIT 10 ";
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
	$filaff12 = $shht -> vfobusdserdol1;
	$filaff13 = $shht -> vfobusdserdol2;
	$filaff14 = $shht -> vfobusdserdol3;
	$filaff15 = $shht -> vpesnet1;
	$filaff16 = $shht -> vpesnet2;
	$filaff17 = $shht -> vpesnet3;
	$filaff18 = $shht -> precio1;
	$filaff19 = $shht -> precio2;
	$filaff20 = $shht -> precio3;
	$filaff6x16 = $shht -> tipo_sec;
	$filaff7x16 = $shht -> sector;

	
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
                                    <a href="sector-producto?dat=<?=$filaff2;?>&pk=<?=$filaff1;?>" target="_blank" class="btn-quickview" title="VER EMPRESAS">VER EMPRESAS</a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a class="product-category"> <?=$filaff6;?> - <?=$filaff7;?> </a>
                                        </div>
                                    </div>
									<h3 class="product-title"><b> <?=$filaff3;?> - <?=$filaff4;?> </b> </h3>
                                    <h3 class="product-title"> <a href="partida-detalle?dat=<?=$filaff2;?>&year=2022" target="_blank">Partida: <?=$filaff2;?> </a> </h3>
                                    <div class="price-box">
                                        <span class="product-price">Precio FOB <?=$filaff19;?> KG </span>
                                    </div>
                                </div>
                            </div>
							
							<?php
	}
}
							?>
							</div>
							<p align='right'> <a href='sectores?dat=<?=$filaff6x16;?>&year=<?=$filaff7x16;?>' target="_blank" class='btn btn-primary btn-xs'><b>VER TODOS</b></a> </p>
							
                        <!--<div class="brands-slider owl-carousel owl-theme images-center appear-animate" data-animation-name="fadeIn" data-animation-duration="700" data-owl-options="{
                            'margin': 0,
							'responsive': {
								'768': {

									'items': 4
                                },
                                '991': {
									'items': 4
                                },
                                '1200': {
									'items': 5
								}
							}
						}">
                            <img src="assets/images/brands/small/brand1.png" width="140" height="60" alt="brand">
                            <img src="assets/images/brands/small/brand2.png" width="140" height="60" alt="brand">
                            <img src="assets/images/brands/small/brand3.png" width="140" height="60" alt="brand">
                            <img src="assets/images/brands/small/brand4.png" width="140" height="60" alt="brand">
                            <img src="assets/images/brands/small/brand5.png" width="140" height="60" alt="brand">
                            <img src="assets/images/brands/small/brand6.png" width="140" height="60" alt="brand">
                        </div> -->
                        <!-- End .brands-slider -->

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
						
						
						<!--<div class="mt-8" id="accordion2">
					<h3>Busquedas por:</h3>
					<div class="card card-accordion accordion-boxed">
						<a class="card-header" href="#" data-toggle="collapse" data-target="#collapse4"
							aria-expanded="true" aria-controls="collapse4"> Departamento </a>
						<div id="collapse4" class="collapse show" data-parent="#accordion2">
							<div style="overflow-y: auto; height:250px;">
							<nav class="side-nav">
                                <ul class="menu menu-vertical sf-arrows">
                                    <li class="active item"><a href="#" class="nombres"><i class="sicon-globe"></i>Todos</a></li>
									<?php
/*$ddlt = "SELECT d.iddepartamento, d.nombre FROM departamento AS d ORDER BY d.nombre ASC";
$retdpt = $conexpg -> prepare($ddlt); 
$retdpt -> execute(); 
$tds = $retdpt -> fetchAll(PDO::FETCH_OBJ); 
if($retdpt -> rowCount() > 0) { 
foreach($tds as $dpt) {
	$dpl1 = $dpt -> iddepartamento;
	$dpl2 = $dpt -> nombre;
	
	echo "<li class='item'><a href='#' class='nombres'><i class='sicon-globe'></i>$dpl2</a></li>";
	}
}else{*/
									?>
									<li><a href="#"><i class="sicon-globe"></i>Sin Datos</a></li>
<?php
	//}
	?>
                                </ul>
                            </nav>
								</div>
						</div>
					</div>

					<div class="card card-accordion accordion-boxed">
						<a class="card-header collapsed" href="#" data-toggle="collapse" data-target="#collapse5"
							aria-expanded="true" aria-controls="collapse5"> Sector Econ&oacute;mico </a>
						<div id="collapse5" class="collapse" data-parent="#accordion2">
							<div style="overflow-y: auto; height:250px;">
							<nav class="side-nav">
                                <ul class="menu menu-vertical sf-arrows">
                                    <li class="active item"><a href="#" class="nombres"><i class="sicon-globe"></i>Todos</a></li>
									<?php
/*$sdlt = "SELECT concat(tipo,sector) as codsec, concat(sector,' - ',tipo) as sector FROM sector GROUP BY tipo, sector ORDER BY sector ASC";
$stdpt = $conexpg -> prepare($sdlt); 
$stdpt -> execute(); 
$sds = $stdpt -> fetchAll(PDO::FETCH_OBJ); 
if($stdpt -> rowCount() > 0) { 
foreach($sds as $spt) {
	$dsl1 = $spt -> codsec;
	$dsl2 = $spt -> sector;
	
	echo "<li class='item'><a href='#' class='nombres'><i class='sicon-globe'></i>$dsl2</a></li>";
	}
}else{*/
									?>
									<li><a href="#"><i class="sicon-globe"></i>Sin Datos</a></li>
<?php
	//}
	?>
                                </ul>
                            </nav>
						</div>
							</div>
					</div>

					<div class="card card-accordion accordion-boxed">
						<a class="card-header collapsed" href="#" data-toggle="collapse" data-target="#collapse6"
							aria-expanded="true" aria-controls="collapse6">Productos</a>
						<div id="collapse6" class="collapse" data-parent="#accordion2">
							<p>Lorem</p>
						</div>
					</div>
							
							<div class="card card-accordion accordion-boxed">
						<a class="card-header collapsed" href="#" data-toggle="collapse" data-target="#collapse7"
							aria-expanded="true" aria-controls="collapse7">Mercado de Destino</a>
						<div id="collapse7" class="collapse" data-parent="#accordion2">
							<div class="side-menu-wrapper text-uppercase mb-2 d-none d-lg-block" style="overflow-y: auto; height:450px;">
							<p class="buscador"> <br>
        <input id="buscador" class="form-control m-b-3" style="border-radius: 40px;" type="input" value="" placeholder="Buscar Mercado">
    </p>
                            <nav class="side-nav">
                                <ul class="menu menu-vertical sf-arrows">
                                    <li class="active item"><a href="#" class="nombres"><i class="sicon-globe"></i>Todos</a></li>
									<?php
/*$dqlt = "SELECT p.idpaises, p.espanol FROM paises AS p ORDER BY p.espanol ASC";
$ret_rpt = $conexpg -> prepare($dqlt); 
$ret_rpt -> execute(); 
$tps = $ret_rpt -> fetchAll(PDO::FETCH_OBJ); 
if($ret_rpt -> rowCount() > 0) { 
foreach($tps as $frpt) {
	$tbl1 = $frpt -> idpaises;
	$tbl2 = $frpt -> espanol;
	
	echo "<li class='item'><a href='#' class='nombres'><i class='sicon-globe'></i>$tbl2</a></li>";
	}
}else{*/
									?>
									<li><a href="#"><i class="sicon-globe"></i>Sin Datos</a></li>
<?php
	//}
	?>
                                </ul>
                            </nav>
								</div>
						</div>
					</div>
							
							<div class="card card-accordion accordion-boxed">
						<a class="card-header collapsed" href="#" data-toggle="collapse" data-target="#collapse8"
							aria-expanded="true" aria-controls="collapse8">Otros Accesos Directos</a>
						<div id="collapse8" class="collapse" data-parent="#accordion2">
							<p>Lorem</p>
						</div>
					</div>
							
				</div> -->
						
                        <!-- <div class="side-menu-wrapper text-uppercase mb-2 d-none d-lg-block" style="overflow-y: auto; height:450px;">
                            <h2 class="side-menu-title bg-gray ls-n-25">Mercado de Destino </h2>
							<p class="buscador"> <br>
        <input id="buscador" class="form-control m-b-3" style="border-radius: 40px;" type="input" value="" placeholder="Buscar Mercado">
    </p>
                            <nav class="side-nav">
                                <ul class="menu menu-vertical sf-arrows">
                                    <li class="active item"><a href="#" class="nombres"><i class="sicon-globe"></i>Todos</a></li>
									<?php
/*$dqlt = "SELECT p.idpaises, p.espanol FROM paises AS p ORDER BY p.espanol ASC";
$ret_rpt = $conexpg -> prepare($dqlt); 
$ret_rpt -> execute(); 
$tps = $ret_rpt -> fetchAll(PDO::FETCH_OBJ); 
if($ret_rpt -> rowCount() > 0) { 
foreach($tps as $frpt) {
	$tbl1 = $frpt -> idpaises;
	$tbl2 = $frpt -> espanol;
	
	echo "<li class='item'><a href='#' class='nombres'><i class='sicon-globe'></i>$tbl2</a></li>";
	}
}else{ */
									?>
									<li><a href="#"><i class="sicon-globe"></i>Sin Datos</a></li>
<?php
	//}
	?>
                                </ul>
                            </nav>
                        </div> -->
                        <!-- End .side-menu-container -->
						
						<div class="widget widget-banners px-3 pb-3 text-center">
                            <div class="owl-carousel owl-theme dots-small">
                               <!-- <div class="banner d-flex flex-column align-items-center">
                                    <h3 class="badge-sale bg-primary d-flex flex-column align-items-center justify-content-center text-uppercase">
                                        <em>Sale</em>Many Item
                                    </h3>

                                    <h4 class="sale-text text-uppercase"><small>UP
                                            TO</small>50<sup>%</sup><sub>off</sub></h4>
                                    <p>Bags, Clothing, T-Shirts, Shoes, Watches and much more...</p>
                                    <a href="demo1-shop.html" class="btn btn-dark btn-md">View Sale</a>
                                </div>

                                <div class="banner banner4">
                                    <figure>
                                        <img src="assets/images/demoes/demo1/banners/banner-7.jpg" alt="banner">
                                    </figure>

                                    <div class="banner-layer">
                                        <div class="coupon-sale-content">
                                            <h4>DRONE + CAMERAS</h4>
                                            <h5 class="coupon-sale-text text-gray ls-n-10 p-0 font1"><i>UP
                                                    TO</i><b class="text-white bg-dark font1">$100</b> OFF</h5>
                                            <p class="ls-0">Top Brands and Models!</p>
                                            <a href="demo1-shop.html" class="btn btn-inline-block btn-dark btn-black ls-0">VIEW
                                                SALE</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="banner banner5">
                                    <h4>HEADPHONES SALE</h4>

                                    <figure class="m-b-3">
                                        <img src="assets/images/demoes/demo1/banners/banner-8.jpg" alt="banner">
                                    </figure>

                                    <div class="banner-layer">
                                        <div class="coupon-sale-content">
                                            <h5 class="coupon-sale-text ls-n-10 p-0 font1"><i>UP
                                                    TO</i><b class="text-white bg-secondary font1">50%</b> OFF</h5>
                                            <a href="demo1-shop.html" class="btn btn-inline-block btn-dark btn-black ls-0">VIEW
                                                SALE</a>
                                        </div>
                                    </div>
                                </div> -->
								
								<div style="overflow-y: auto; height:450px;">
									<h4 align="center"><b><u>Sectores</u></b></h4>
							<nav class="side-nav">
                                <ul class="menu menu-vertical sf-arrows">
									<?php
$sdlt = "SELECT concat(tipo,sector) as codsec, concat(tipo,' - ',sector) as sector, tipo, sector as nomsec FROM sectores GROUP BY tipo, sector ORDER BY sector ASC";
$stdpt = $conexpg -> prepare($sdlt); 
$stdpt -> execute(); 
$sds = $stdpt -> fetchAll(PDO::FETCH_OBJ); 
if($stdpt -> rowCount() > 0) { 
foreach($sds as $spt) {
	$dsl1 = $spt -> codsec;
	$dsl2 = $spt -> sector;
	$dsl3 = $spt -> tipo;
	$dsl4 = $spt -> nomsec;
	
	echo "<li class='item'><a href='sectores?dat=$dsl3&year=$dsl4' target='_blank' class='nombres'><i class='sicon-globe'></i>$dsl2</a></li>";
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

                        <div class="widget widget-banners px-3 pb-3 text-center">
                            <div class="owl-carousel owl-theme dots-small">
                                <div class="banner d-flex flex-column align-items-center">
                                    <h3 class="badge-sale bg-primary d-flex flex-column align-items-center justify-content-center text-uppercase">
                                        <em>Sale</em>Many Item
                                    </h3>

                                    <h4 class="sale-text text-uppercase"><small>UP
                                            TO</small>50<sup>%</sup><sub>off</sub></h4>
                                    <p>Bags, Clothing, T-Shirts, Shoes, Watches and much more...</p>
                                    <a href="demo1-shop.html" class="btn btn-dark btn-md">View Sale</a>
                                </div>
                                <!-- End .banner -->

                                <div class="banner banner4">
                                    <figure>
                                        <img src="assets/images/demoes/demo1/banners/banner-7.jpg" alt="banner">
                                    </figure>

                                    <div class="banner-layer">
                                        <div class="coupon-sale-content">
                                            <h4>DRONE + CAMERAS</h4>
                                            <h5 class="coupon-sale-text text-gray ls-n-10 p-0 font1"><i>UP
                                                    TO</i><b class="text-white bg-dark font1">$100</b> OFF</h5>
                                            <p class="ls-0">Top Brands and Models!</p>
                                            <a href="demo1-shop.html" class="btn btn-inline-block btn-dark btn-black ls-0">VIEW
                                                SALE</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- End .banner -->

                                <div class="banner banner5">
                                    <h4>HEADPHONES SALE</h4>

                                    <figure class="m-b-3">
                                        <img src="assets/images/demoes/demo1/banners/banner-8.jpg" alt="banner">
                                    </figure>

                                    <div class="banner-layer">
                                        <div class="coupon-sale-content">
                                            <h5 class="coupon-sale-text ls-n-10 p-0 font1"><i>UP
                                                    TO</i><b class="text-white bg-secondary font1">50%</b> OFF</h5>
                                            <a href="demo1-shop.html" class="btn btn-inline-block btn-dark btn-black ls-0">VIEW
                                                SALE</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- End .banner -->
                            </div>
                            <!-- End .banner-slider -->
                        </div>
                        <!-- End .widget -->

                        <div class="widget widget-newsletters bg-gray text-center">
                            <h3 class="widget-title text-uppercase m-b-3">Subscribe Newsletter</h3>
                            <p class="mb-2">Get all the latest information on Events, Sales and Offers. </p>
                            <form action="#">
                                <div class="form-group position-relative sicon-envolope-letter">
                                    <input type="email" class="form-control" name="newsletter-email" placeholder="Email address">
                                </div>
                                <!-- Endd .form-group -->
                                <input type="submit" class="btn btn-primary btn-md" value="Subscribe">
                            </form>
                        </div>
                        <!-- End .widget -->

                        <div class="widget widget-testimonials">
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
                                    <!-- End .testimonial-owner -->

                                    <blockquote class="ml-4 pr-0">
                                        <p>Lorem ipsum dolor sit amet, consectetur elitad adipiscing Cras non placerat mi.
                                        </p>
                                    </blockquote>
                                </div>
                                <!-- End .testimonial -->

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
                                    <!-- End .testimonial-owner -->

                                    <blockquote class="ml-4 pr-0">
                                        <p>Lorem ipsum dolor sit amet, consectetur elitad adipiscing Cras non placerat mi.
                                        </p>
                                    </blockquote>
                                </div>
                                <!-- End .testimonial -->

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
                                    <!-- End .testimonial-owner -->

                                    <blockquote class="ml-4 pr-0">
                                        <p>Lorem ipsum dolor sit amet, consectetur elitad adipiscing Cras non placerat mi.
                                        </p>
                                    </blockquote>
                                </div>
                                <!-- End .testimonial -->
                            </div>
                            <!-- End .testimonials-slider -->
                        </div>
                        <!-- End .widget -->

                        <div class="widget widget-posts post-date-in-media media-with-zoom mb-0 mb-lg-2 pb-lg-2">
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
                                        <!-- End .post-date -->

                                        <span class="prod-full-screen">
                                            <i class="fas fa-search"></i>
                                        </span>
                                    </div>
                                    <!-- End .post-media -->

                                    <div class="post-body">
                                        <h2 class="">
                                            <a href="">Post Format Standard</a>
                                        </h2>

                                        <div class="post-content">
                                            <p>Leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with... </p>

                                            <a href="" class="read-more">read more <i
                                                    class="icon-right-open"></i></a>
                                        </div>
                                        <!-- End .post-content -->
                                    </div>
                                    <!-- End .post-body -->
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
                                        <!-- End .post-date -->
                                        <span class="prod-full-screen">
                                            <i class="fas fa-search"></i>
                                        </span>
                                    </div>
                                    <!-- End .post-media -->

                                    <div class="post-body">
                                        <h2 class="post-title">
                                            <a href="">Fashion Trends</a>
                                        </h2>

                                        <div class="post-content">
                                            <p>Leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with... </p>

                                            <a href="" class="read-more">read more <i
                                                    class="icon-right-open"></i></a>
                                        </div>
                                        <!-- End .post-content -->
                                    </div>
                                    <!-- End .post-body -->
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
                                        <!-- End .post-date -->
                                        <span class="prod-full-screen">
                                            <i class="fas fa-search"></i>
                                        </span>
                                    </div>
                                    <!-- End .post-media -->

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
                                        <!-- End .post-content -->
                                    </div>
                                    <!-- End .post-body -->
                                </article>
                            </div>
                            <!-- End .posts-slider -->
                        </div>
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

    <div class="loading-overlay">
        <div class="bounce-loader">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>

    <div class="mobile-menu-overlay"></div>
    <!-- End .mobil-menu-overlay -->

    <div class="mobile-menu-container">
        <div class="mobile-menu-wrapper">
            <span class="mobile-menu-close"><i class="fa fa-times"></i></span>
            <nav class="mobile-nav">
                <ul class="mobile-menu menu-with-icon">
                    <li><a href="./"><i class="icon-home"></i>Inicio</a></li>
                    <!-- <li>
                        <a href="demo1-shop.html" class="sf-with-ul"><i class="sicon-badge"></i>Categories</a>
                        <ul>
                            <li><a href="category.html">Full Width Banner</a></li>
                            <li><a href="category-banner-boxed-slider.html">Boxed Slider Banner</a></li>
                            <li><a href="category-banner-boxed-image.html">Boxed Image Banner</a></li>
                            <li><a href="https://www.portotheme.com/html/porto_ecommerce/category-sidebar-left.html">Left Sidebar</a></li>
                            <li><a href="category-sidebar-right.html">Right Sidebar</a></li>
                            <li><a href="category-off-canvas.html">Off Canvas Filter</a></li>
                            <li><a href="category-horizontal-filter1.html">Horizontal Filter 1</a></li>
                            <li><a href="category-horizontal-filter2.html">Horizontal Filter 2</a></li>
                            <li><a href="#">List Types</a></li>
                            <li><a href="category-infinite-scroll.html">Ajax Infinite Scroll<span
                                        class="tip tip-new">New</span></a></li>
                            <li><a href="category.html">3 Columns Products</a></li>
                            <li><a href="category-4col.html">4 Columns Products</a></li>
                            <li><a href="category-5col.html">5 Columns Products</a></li>
                            <li><a href="category-6col.html">6 Columns Products</a></li>
                            <li><a href="category-7col.html">7 Columns Products</a></li>
                            <li><a href="category-8col.html">8 Columns Products</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="demo1-product.html" class="sf-with-ul"><i class="sicon-basket"></i>Products</a>
                        <ul>
                            <li>
                                <a href="#" class="nolink">PRODUCT PAGES</a>
                                <ul>
                                    <li><a href="product.html">SIMPLE PRODUCT</a></li>
                                    <li><a href="product-variable.html">VARIABLE PRODUCT</a></li>
                                    <li><a href="product.html">SALE PRODUCT</a></li>
                                    <li><a href="product.html">FEATURED & ON SALE</a></li>
                                    <li><a href="product-sticky-info.html">WIDTH CUSTOM TAB</a></li>
                                    <li><a href="product-sidebar-left.html">WITH LEFT SIDEBAR</a></li>
                                    <li><a href="product-sidebar-right.html">WITH RIGHT SIDEBAR</a></li>
                                    <li><a href="product-addcart-sticky.html">ADD CART STICKY</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#" class="nolink">PRODUCT LAYOUTS</a>
                                <ul>
                                    <li><a href="product-extended-layout.html">EXTENDED LAYOUT</a></li>
                                    <li><a href="product-grid-layout.html">GRID IMAGE</a></li>
                                    <li><a href="product-full-width.html">FULL WIDTH LAYOUT</a></li>
                                    <li><a href="product-sticky-info.html">STICKY INFO</a></li>
                                    <li><a href="product-sticky-both.html">LEFT & RIGHT STICKY</a></li>
                                    <li><a href="product-transparent-image.html">TRANSPARENT IMAGE</a></li>
                                    <li><a href="product-center-vertical.html">CENTER VERTICAL</a></li>
                                    <li><a href="#">BUILD YOUR OWN</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li> -->
                    <li>
                        <a href="#" class="sf-with-ul"><i class="sicon-envelope"></i>Pages</a>
                        <ul>
                            <li>
                                <a href="wishlist.html">Wishlist</a>
                            </li>
                            <li>
                                <a href="cart.html">Shopping Cart</a>
                            </li>
                            <li>
                                <a href="checkout.html">Checkout</a>
                            </li>
                            <li>
                                <a href="dashboard.html">Dashboard</a>
                            </li>
                            <li>
                                <a href="login.html">Login</a>
                            </li>
                            <li>
                                <a href="forgot-password.html">Forgot Password</a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="blog.html"><i class="sicon-book-open"></i>Blog</a></li>
                    <li><a href="demo1-about.html"><i class="sicon-users"></i>About Us</a></li>
                </ul>

                <ul class="mobile-menu menu-with-icon mt-2 mb-2">
                    <li class="border-0">
                        <a href="#" target="_blank"><i class="sicon-star"></i>Buy Porto!<span
                                class="tip tip-hot">Hot</span></a>
                    </li>
                </ul>

                <ul class="mobile-menu">
                    <li><a href="login.html">My Account</a></li>
                    <li><a href="demo1-contact.html">Contact Us</a></li>
                    <li><a href="wishlist.html">My Wishlist</a></li>
                    <li><a href="#">Site Map</a></li>
                    <li><a href="#">Reg&iacute;strate</a></li>
                    <li><a href="#" class="login-link">Ingresar</a></li>
                </ul>
            </nav>
            <!-- <form class="search-wrapper mb-2" action="#">
                <input type="text" class="form-control mb-0" placeholder="Search..." required />
                <button class="btn icon-search text-white bg-transparent p-0" type="submit"></button>
            </form> -->

            <div class="social-icons">
                <a href="#" class="social-icon social-facebook icon-facebook" target="_blank">
                </a>
                <a href="#" class="social-icon social-twitter icon-twitter" target="_blank">
                </a>
                <a href="#" class="social-icon social-instagram icon-instagram" target="_blank">
                </a>
            </div>
        </div>
    </div>
    <!-- End .mobile-menu-container -->

    <div class="sticky-navbar">
        <div class="sticky-info">
            <a href="./"><i class="icon-home"></i>Inicio</a>
        </div>
        <div class="sticky-info">
            <a href="#" class=""><i class="icon-bars"></i>Productos</a>
        </div>
		<div class="sticky-info">
            <a href="#" class=""><i class="icon-bars"></i>Partidas</a>
        </div>
        <div class="sticky-info">
            <a href="#" class=""><i class="icon-wishlist-2"></i>Mercado</a>
        </div>
        <div class="sticky-info">
            <a href="#" class=""><i class="icon-user-2"></i>Mi Cuenta</a>
        </div>
        <!-- <div class="sticky-info">
            <a href="cart.html" class="">
                <i class="icon-shopping-cart position-relative">
                    <span class="cart-count badge-circle">3</span>
                </i>Cart
            </a>
        </div> -->
    </div>


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
	<?php //if(isset($_POST['busca'])) { 
	//$key1 = $_POST['q'];
	?>
	
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
        url: "extraer-partida.php",
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
        url: "extraer-empresa.php",
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
          //url : 'busquedainicial.php?data='+product,
		  //url : 'busquedainicial.php?data='+product+'&year='+proyear+'&cat='+cate,
		  url : 'busquedainicial.php?data='+product+'&year='+proyear+'&ptipo1='+ptipo1,
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
          //url : 'busquedainicial.php?data='+product,
		  //url : 'busquedainicial.php?data='+product+'&year='+proyear+'&cat='+cate,
		  url : 'busquedainicial-merca.php?data='+product+'&year='+proyear+'&ptipo1='+ptipo1,
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
		  url : 'busquedainicial-empresas.php?data='+product+'&year='+proyear,
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
		  url : 'busquedainicial-partida.php?data='+product+'&year='+proyear,
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
<?php //} ?>
</body>
</html>