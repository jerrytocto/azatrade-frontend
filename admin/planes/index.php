<?php
session_start();
$msgerror = $_GET["mss"]
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<!-- Favicons -->
<link rel="apple-touch-icon" href="../img/logo.png">
<link rel="icon" href="../img/logo.png">
<title>
   ..: Azatrade :..
</title>

<!--  Social tags      -->
<meta name="keywords" content="azatrade, negocios internacionales, comercio, international Business, negocios internacionales, comercio y negocios, comercio y negocios internacionales, business, inteligencia comercial, azatrade negocios, negocios, mercado internacional, mercados internacionales, comercio internacional, internacional">
<meta name="description" content="Azatrade te ofrece uno de nuestros planes para una consultoria avanzada y tengas acceso total a la informacion. Azatrade es un sistema de Inteligencia de Negocios (Business Intelligence) para la gestión de la información comercial.">

<!-- Schema.org markup for Google+ -->
<meta itemprop="name" content="Azatrade - Planes">
<meta itemprop="description" content="Azatrade te ofrece uno de nuestros planes para una consultoria avanzada y tengas acceso total a la informacion. Azatrade es un sistema de Inteligencia de Negocios (Business Intelligence) para la gestión de la información comercial.">
<!--<meta itemprop="image" content="https://s3.amazonaws.com/creativetim_bucket/products/51/original/opt_mdp_thumbnail.jpg">-->

<!-- Twitter Card data -->
<meta name="twitter:card" content="Azatrade - Planes">
<meta name="twitter:site" content="@azatradeperu">
<meta name="twitter:title" content="Compra tu PLAN en AZATRADE">
<meta name="twitter:description" content="Azatrade te ofrece uno de nuestros planes para una consultoria avanzada y tengas acceso total a la informacion. Azatrade es un sistema de Inteligencia de Negocios (Business Intelligence) para la gestión de la información comercial.">
<meta name="twitter:creator" content="@azatradeperu">
<!--<meta name="twitter:image" content="https://s3.amazonaws.com/creativetim_bucket/products/51/original/opt_mdp_thumbnail.jpg">-->
<meta name="twitter:data1" content="Azatrade Business Intelligence">
<meta name="twitter:label1" content="Plan Azatrade">
<meta name="twitter:data2" content="S/.30">
<meta name="twitter:label2" content="Precio">

<!-- Open Graph data -->
<meta property="fb:app_id" content="208373292586713">
<meta property="og:title" content="Azatrade Compra Tu Plan" />
<meta property="og:type" content="Azatrade Planes" />
<meta property="og:url" content="http://www.azatrade.info/planes/" />
<!--<meta property="og:image" content="https://s3.amazonaws.com/creativetim_bucket/products/51/original/opt_mdp_thumbnail.jpg"/>-->
<meta property="og:description" content="Azatrade te ofrece uno de nuestros planes para una consultoria avanzada y tengas acceso total a la informacion. Azatrade es un sistema de Inteligencia de Negocios (Business Intelligence) para la gestión de la información comercial." />
<meta property="og:site_name" content="Azatrade" />
<!--     Fonts and icons     -->
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
<link rel="stylesheet" href="../css/material-dashboard.min.css?v=2.0.1">
<!-- Documentation extras -->
<!-- CSS Just for demo purpose, don't include it in your project -->
<link href="../css/demo.css" rel="stylesheet"/>
<!-- iframe removal -->
  <script type="text/javascript">
    if (document.readyState === 'complete') {
        if (window.location != window.parent.location) {
          const elements = document.getElementsByClassName("iframe-extern");
          while (elemnts.lenght > 0) elements[0].remove();
            // $(".iframe-extern").remove();
        }
    };
  </script>
     
      <!-- Google Tag Manager -->
      <!--<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
      new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
      j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
      'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
      })(window,document,'script','dataLayer','GTM-NKDMSK6');</script>-->
      <!-- End Google Tag Manager -->
        </head>
          <body class="off-canvas-sidebar pricing-page">
          <!-- Google Tag Manager (noscript) -->
    <!--<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>-->
    <!-- End Google Tag Manager (noscript) -->
    <!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-primary navbar-transparent navbar-absolute" color-on-scroll="500">
	<div class="container">
    <div class="navbar-wrapper">
        <a href="#" class="simple-text logo-mini">
             <img src="../img/logo.png" width="30px" />
        </a>
	        <a class="navbar-brand" href="#">Azatrade</a>
		</div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
      <span class="sr-only">Toggle navigation</span>
      <span class="navbar-toggler-icon icon-bar"></span>
      <span class="navbar-toggler-icon icon-bar"></span>
      <span class="navbar-toggler-icon icon-bar"></span>
    </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="../" class="nav-link">
                        <i class="material-icons">dashboard</i>
                        Inicio
                    </a>
                </li>
                <li class="nav-item active">
                    <a href="#" class="nav-link">
                        <i class="material-icons">view_week</i>
                        Planes
                    </a>
                </li>
                <?php if($_SESSION['login_usuario']==""){ ?>
                <li class= "nav-item ">
                    <a href="../registro/" class="nav-link">
                        <i class="material-icons">person_add</i>
                        Registrate
                    </a>
                </li>
                <li class= "nav-item ">
                    <a href="../login/" class="nav-link">
                        <i class="material-icons">fingerprint</i>
                        Ingresar
                    </a>
                </li>
                <?php }else{ ?>
                <?php $uA1f =$_SESSION['nombre']; ?>
				<li class="nav-item">
				<a href="#" class="nav-link">
                        <i class="material-icons">assignment_ind</i>
                        <?=$uA1f;?>
                    </a>
				</li>
               <li class="nav-item">
				<a href="../logout/" class="nav-link">
                        <i class="material-icons" style="color: #EF0105">power_settings_new</i>
                        Cerrar Sesion
                    </a>
				</li>
                
                <?php } ?>
                
            </ul>
        </div>
	</div>
</nav>
<!-- End Navbar -->
    <div class="wrapper wrapper-full-page">
            <div class="page-header pricing-page header-filter" style="background-image: url('../img/plan.jpg'); background-size: cover; background-position: top center;">
          <div class="container">
        		<div class="row">
        			<div class="col-md-6 ml-auto mr-auto text-center">
        			<p>&nbsp;</p>
        			
        			<div class="col-md-3 hidden">
<div class="card ">
    <div class="card-body text-center">
        <h5 class="card-text">mensaje</h5>
            <button class="btn btn-rose btn-fill" id="mensajes" onclick=demo.showSwal('okplan')>Enviar</button>
    </div>
</div>
</div>
                      <br>          
        				<h2 class="title">Elija el mejor plan a su medida</h2>
        				<h5 class="description">4 opciones diferentes al alcance de sus requerimientos, medidos en término de cantidad de opciones habilitadas y el tiempo de acceso.</h5>
        			</div>
        		</div>
                <div class="row">
                    <div class="col-lg-3 col-md-6">
<div class="card card-pricing card-plain">
    <h6 class="card-category"> Gratis</h6>
    <div class="card-body">
        <div class="card-icon icon-white ">
            <i class="material-icons">weekend</i>
        </div>
        <h3 class="card-title">S/.00</h3>
        <h4 class="card-title">&nbsp;</h4>
        <p class="card-description">Acceso gratis a opción PRODUCTOS y PARTIDAS, acceso restringido a opción: MERCADOS, EMPRESAS, REGIONES, SECTORES y  BUSQUEDA DETALLADA.</p>
    </div>
    <div class="card-footer justify-content-center ">
        <a href="#planGratis" data-toggle="modal" data-target="#ModalLibre" class="btn btn-round btn-success">Mas Detalle</a>
    </div>
    <div class="card-footer justify-content-center ">
        <a href="../" class="btn btn-round btn-white"> Plan Gratis</a>
    </div>
</div>
                    </div>
                    <div class="col-lg-3 col-md-6">
<div class="card card-pricing ">
    <h6 class="card-category"> Plan Basico</h6>
    <div class="card-body">
        <div class="card-icon icon-info">
            <i class="material-icons">home</i>
        </div>
        <h3 class="card-title">S/.50</h3>
        <h4 class="card-title">1 Mes</h4>
        <p class="card-description">Acceso ILIMITADO a todas las opciones de PRODUCTOS, PARTIDAS, MERCADOS, EMPRESAS, REGIONES, SECTORES y  BUSQUEDA DETALLADA.</p>
    </div>
    <div class="card-footer justify-content-center ">
        <a href="#planBasico" data-toggle="modal" data-target="#ModalBasico" class="btn btn-round btn-success">Mas Detalle</a>
    </div>
    <div class="card-footer justify-content-center ">
        <a href="#planBasicoCompra" data-toggle="modal" data-target="#ModalBasicoCompra" class="btn btn-round btn-info">Comprar Plan</a>
    </div>
    <!--<a class="card-title" data-toggle="modal" data-target="#pagoModal"><u> Forma de pago</u></a>-->
</div>
                    </div>
                    <div class="col-lg-3 col-md-6">
<div class="card card-pricing card-plain">
    <h6 class="card-category"> Plan PRO</h6>
    <div class="card-body">
        <div class="card-icon icon-white ">
            <i class="material-icons">business</i>
        </div>
        <h3 class="card-title">S/.300</h3>
        <h4 class="card-title">Anual</h4>
        <p class="card-description">Acceso ILIMITADO a todas las opciones de PRODUCTOS, PARTIDAS, MERCADOS, EMPRESAS, REGIONES, SECTORES y  BUSQUEDA DETALLADA.</p>
    </div>
    <div class="card-footer justify-content-center ">
        <a href="#planpro" data-toggle="modal" data-target="#ModalPro" class="btn btn-round btn-success">Mas Detalle</a>
    </div>
    <div class="card-footer justify-content-center ">
        <a href="#planpro" data-toggle="modal" data-target="#ModalProCompra" class="btn btn-round btn-white">Comprar Plan</a>
    </div>
    <!--<a class="card-title" data-toggle="modal" data-target="#pagoModal"><u> Forma de pago</u></a>-->
</div>
                    </div>
                    <div class="col-lg-3 col-md-6">
<div class="card card-pricing card-plain">
    <h6 class="card-category"> Plan Empresarial</h6>
    <div class="card-body">
        <div class="card-icon icon-white ">
            <i class="material-icons">account_balance</i>
        </div>
        <h3 class="card-title">S/.500</h3>
        <h4 class="card-title">Anual</h4>
        <p class="card-description">Acceso ILIMITADO a todas las opciones de PRODUCTOS, PARTIDAS, MERCADOS, EMPRESAS, REGIONES, SECTORES y  BUSQUEDA DETALLADA.</p>
    </div>
    <div class="card-footer justify-content-center ">
        <a href="#planpremiun" data-toggle="modal" data-target="#ModalPremiun" class="btn btn-round btn-success">Mas Detalle</a>
    </div>
    <div class="card-footer justify-content-center ">
        <a href="#planpremiun" data-toggle="modal" data-target="#ModalPremiunCompra" class="btn btn-round btn-white">Comprar Plan</a>
    </div>
    <!--<a class="card-title" data-toggle="modal" data-target="#pagoModal"><u> Forma de pago</u></a>-->
</div>
                    </div>
                </div>
                
                <div class="row">
									<div class="col-md-12">
									<div class="col-md-6 ml-auto mr-auto text-center">
									<h2 class="title">Modalidad de pago</h2>
        				<h5 class="description">Puedes realizar el pago en deposito en estas entidades financieras.</h5>
        				</div>
									<center>
                    	       <img class="image-responsive" src="../img/logo_bnacion.jpg" width="200px">
<img class="image-responsive" src="../img/logo_bcp.jpg" width="200px">
<img class="image-responsive" src="../img/logo_bbva.jpg" width="200px" height="93px"></center>
										
										<br><br>

<h4>Puede pagar en una de las siguientes cuentas:</h4>
* BANCO DE LA NACIÓN Soles 04301177408<br>
* BCP Soles: 41521396625050<br>
* BBVA Soles: 0011-0796-0200120794 <br>
<b>Titular:</b> Ramiro Azañero Díaz<br><br>

<p>Una vez realizado el depósito o la transferencia, enviar voucher de pago a informes@azatrade.info o a nuestros datos de contacto</p>
<img src="../img/logo_wasap.png" width="40px"> +51 974915400 <br><br>
<p>Puedes escribirnos a nuestro WhatsApp para:<br>
 - Solicitar mas información<br>
 - Solicitar orientación de pago, registro y acceso<br>
 - Enviar voucher de pago </p>

									</div>
									
									</div>
									
        	</div>
        	
        
    </div>
    
    </div>  
<!-- pago modal -->
                        <div class="modal fade" id="pagoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    	  <div class="modal-dialog modal-notice">
                    	    <div class="modal-content">
                    	      <div class="modal-header">
                              <h5 class="modal-title" id="myModalLabel">Medios de pagos</h5>
                    	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                <i class="material-icons">close</i>
                    			    </button>
                    	      </div>
                    	      <div class="modal-body">
                    	        <center>
                    	       <img class="image-responsive" src="../img/logo_bnacion.jpg" width="150px">
<img class="image-responsive" src="../img/logo_bcp.jpg" width="150px">
<img class="image-responsive" src="../img/logo_bbva.jpg" width="150px"></center><br><br>

<h4>Puede pagar en las siguientes cuentas:</h4>
* BANCO DE LA NACIÓN Soles 04301177408<br>
* BCP Soles: 41521396625050<br>
* BBVA Soles: 0011-0796-0200120794 <br>
<b>Titular:</b> Ramiro Azañero Díaz<br><br>

<p>Una vez realizado el depósito o la transferencia, enviar voucher de pago a informes@azatrade.info o a nuestros datos de contacto</p>

<b>ATTE. Equipo Azatrade</b>
                   	      
                    	      </div>
                    	      <div class="modal-footer justify-content-center">
                    	            <button type="button" class="btn btn-danger btn-round" data-dismiss="modal">Cerrar</button>
                    	      </div>
                    	    </div>
                    	  </div>
                    	</div>
                        <!-- end pago -->
      <!-- Classic Modal libre-->
                        <div class="modal fade" id="ModalLibre" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title">Plan Gratis / Free</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                      <i class="material-icons">clear</i>
                                  </button>
                                </div>
                                <div class="modal-body">
                                
              <font color="#0F981E"><i class="material-icons">done</i></font> Consulta partida bolsa<br>
              <font color="#0F981E"><i class="material-icons">done</i></font> An&aacute;lisis de partidas<br>
              <font color="#E51317"><i class="material-icons">clear</i></font> An&aacute;lisis de mercados<br>
              <font color="#E51317"><i class="material-icons">clear</i></font> An&aacute;lisis de departamentos<br>
              <font color="#E51317"><i class="material-icons">clear</i></font> An&aacute;lisis de empresas<br>
              <font color="#E51317"><i class="material-icons">clear</i></font> Gr&aacute;ficos y mapas<br>
              <font color="#E51317"><i class="material-icons">clear</i></font> Consultas avanzadas<br>
              <font color="#E51317"><i class="material-icons">clear</i></font> Consultas ilimitadas<br>
              <font color="#E51317"><i class="material-icons">clear</i></font> Descargas en Excel ilimitadas<br>
              <font color="#E51317"><i class="material-icons">clear</i></font> Acceso a data de importaciones<br>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    	</div>
                    	<!--  End Modal libre-->
<!-- Classic Modal basico-->
                        <div class="modal fade" id="ModalBasico" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title">Plan Basico / 1 Mes <br> S/. 50</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                      <i class="material-icons">clear</i>
                                  </button>
                                </div>
                                <div class="modal-body">
                                
                                <p><b>Beneficios:</b></p>
              <font color="#0F981E"><i class="material-icons">done</i></font> Consulta partida bolsa<br>
              <font color="#0F981E"><i class="material-icons">done</i></font> An&aacute;lisis de partidas<br>
              <font color="#0F981E"><i class="material-icons">done</i></font> An&aacute;lisis de mercados<br>
              <font color="#0F981E"><i class="material-icons">done</i></font> An&aacute;lisis de departamentos<br>
              <font color="#0F981E"><i class="material-icons">done</i></font> An&aacute;lisis de empresas<br>
              <font color="#0F981E"><i class="material-icons">done</i></font> Gr&aacute;ficos y mapas<br>
              <font color="#0F981E"><i class="material-icons">done</i></font> Consultas avanzadas<br>
              <font color="#0F981E"><i class="material-icons">done</i></font> Consultas ilimitadas<br>
              <font color="#0F981E"><i class="material-icons">done</i></font> Descargas en Excel ilimitadas<br>
              <font color="#E51317"><i class="material-icons">clear</i></font> Acceso a data de importaciones<br>
									
                               
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    	</div>
                    	<!--  End Modal basico-->
<!-- Classic Modal compra basico-->
                        <div class="modal fade" id="ModalBasicoCompra" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title">Plan Basico / 1 Mes <br> S/.50 </h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                      <i class="material-icons">clear</i>
                                  </button>
                                </div>
                                <div class="modal-body">     
<form class="form-horizontal" method="post" action="envio/envio.php">  
                             <div class="col-md-12">
<div class="card ">
    <div class="card-header card-header-info card-header-icon">
    <div class="card-icon">
                          <i class="material-icons">home</i>
                        </div>
                        <h4 class="card-title">Ingresa tus datos en el formulario</h4>
    </div>
    <div class="card-body ">
                              <div class="form-group">
                                 <label for="exampleEmail" class="bmd-label-floating">Nombres Completos</label>
                                 <input type="text" name="nombres" class="form-control" id="exampleEmail" required>
                                 <input id="textinput" name="plan" type="hidden" class="form-control input-md" value="PLAN BASICO - 1 Mes">
                              </div>
                              <div class="form-group">
                                 <label for="exampleEmail" class="bmd-label-floating">Celular</label>
                                 <input type="number" name="celu" class="form-control" id="exampleEmail" required>
                              </div>
                              <div class="form-group">
                                 <label for="exampleEmail" class="bmd-label-floating">Email Address</label>
                                 <input type="email" name="correo" class="form-control" id="exampleEmail" required>
                              </div>
                             <div class="form-group">
                                 <label for="exampleEmail" class="bmd-label-floating">Solicitud</label>
                                 <textarea  class="form-control" name="textarea" rows="5" required>Estoy Interesado en el PLAN BÁSICO, y deseo adquirirlo. Saludos cordiales.</textarea>
                              </div>
    </div>
    <div class="card-footer ">
        <button type="submit" class="btn btn-fill btn-success">Enviar Solicitud</button>
    </div>
</div>
    </div>
									</form>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    	</div>
                    	<!--  End Modal compra basico-->
                    	
<!-- Classic Modal  detalle pro-->
                        <div class="modal fade" id="ModalPro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title">Plan Pro / Anual <br> S/.300 </h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                      <i class="material-icons">clear</i>
                                  </button>
                                </div>
                                <div class="modal-body">
                                
              <font color="#0F981E"><i class="material-icons">done</i></font> Consulta partida bolsa<br>
              <font color="#0F981E"><i class="material-icons">done</i></font> An&aacute;lisis de partidas<br>
              <font color="#0F981E"><i class="material-icons">done</i></font> An&aacute;lisis de mercados<br>
              <font color="#0F981E"><i class="material-icons">done</i></font> An&aacute;lisis de departamentos<br>
              <font color="#0F981E"><i class="material-icons">done</i></font> An&aacute;lisis de empresas<br>
              <font color="#0F981E"><i class="material-icons">done</i></font> Gr&aacute;ficos y mapas<br>
              <font color="#0F981E"><i class="material-icons">done</i></font> Consultas avanzadas<br>
              <font color="#0F981E"><i class="material-icons">done</i></font> Consultas ilimitadas<br>
              <font color="#0F981E"><i class="material-icons">done</i></font> Descargas en Excel ilimitadas<br>
              <font color="#0F981E"><i class="material-icons">done</i></font> Acceso a data de importaciones<br>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    	</div>
                    	<!--  End Modal detalle pro-->
                    	
<!-- Classic Modal compra pro-->
                        <div class="modal fade" id="ModalProCompra" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title">Plan Pro / Anual <br> S/.300 </h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                      <i class="material-icons">clear</i>
                                  </button>
                                </div>
                                <div class="modal-body">     
<form class="form-horizontal" method="post" action="envio/envio.php">  
                             <div class="col-md-12">
<div class="card ">
    <div class="card-header card-header-info card-header-icon">
    <div class="card-icon">
                          <i class="material-icons">home</i>
                        </div>
                        <h4 class="card-title">Ingresa tus datos en el formulario</h4>
    </div>
    <div class="card-body ">
                              <div class="form-group">
                                 <label for="exampleEmail" class="bmd-label-floating">Nombres Completos</label>
                                 <input type="text" name="nombres" class="form-control" id="exampleEmail" required>
                                 <input id="textinput" name="plan" type="hidden" class="form-control input-md" value="PLAN PRO - Anual">
                              </div>
                              <div class="form-group">
                                 <label for="exampleEmail" class="bmd-label-floating">Celular</label>
                                 <input type="number" name="celu" class="form-control" id="exampleEmail" required>
                              </div>
                              <div class="form-group">
                                 <label for="exampleEmail" class="bmd-label-floating">Email Address</label>
                                 <input type="email" name="correo" class="form-control" id="exampleEmail" required>
                              </div>
                             <div class="form-group">
                                 <label for="exampleEmail" class="bmd-label-floating">Solicitud</label>
                                 <textarea  class="form-control" name="textarea" rows="5" required>Estoy Interesado en el PLAN PRO, y deseo adquirirlo. Saludos cordiales.</textarea>
                              </div>
    </div>
    <div class="card-footer ">
        <button type="submit" class="btn btn-fill btn-success">Enviar Solicitud</button>
    </div>
</div>
    </div>
									</form>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    	</div>
                    	<!--  End Modal compra pro-->

 <!-- Classic Modal detalle premiun-->
                        <div class="modal fade" id="ModalPremiun" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title">Plan Empresarial / Anual <br> S/.500 </h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                      <i class="material-icons">clear</i>
                                  </button>
                                </div>
                                <div class="modal-body">
                                
              <font color="#0F981E"><i class="material-icons">done</i></font> Consulta partida bolsa<br>
              <font color="#0F981E"><i class="material-icons">done</i></font> An&aacute;lisis de partidas<br>
              <font color="#0F981E"><i class="material-icons">done</i></font> An&aacute;lisis de mercados<br>
              <font color="#0F981E"><i class="material-icons">done</i></font> An&aacute;lisis de departamentos<br>
              <font color="#0F981E"><i class="material-icons">done</i></font> An&aacute;lisis de empresas<br>
              <font color="#0F981E"><i class="material-icons">done</i></font> Gr&aacute;ficos y mapas<br>
              <font color="#0F981E"><i class="material-icons">done</i></font> Consultas avanzadas<br>
              <font color="#0F981E"><i class="material-icons">done</i></font> Consultas ilimitadas<br>
              <font color="#0F981E"><i class="material-icons">done</i></font> Descargas en Excel ilimitadas<br>
              <font color="#0F981E"><i class="material-icons">done</i></font> Acceso a data de importaciones<br>
              <font color="#0F981E"><i class="material-icons">done</i></font> Reportería personalizada <br>
              <font color="#0F981E"><i class="material-icons">done</i></font> Soporte en línea<br>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    	</div>
                    	<!--  End Modal detalle premiun-->

<!-- Classic Modal compra premiun-->
                        <div class="modal fade" id="ModalPremiunCompra" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title">Plan Empresarial / Anual <br> S/.500</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                      <i class="material-icons">clear</i>
                                  </button>
                                </div>
                                <div class="modal-body">     
<form class="form-horizontal" method="post" action="envio/envio.php">  
                             <div class="col-md-12">
<div class="card ">
    <div class="card-header card-header-info card-header-icon">
    <div class="card-icon">
                          <i class="material-icons">home</i>
                        </div>
                        <h4 class="card-title">Ingresa tus datos en el formulario</h4>
    </div>
    <div class="card-body ">
                              <div class="form-group">
                                 <label for="exampleEmail" class="bmd-label-floating">Nombres Completos</label>
                                 <input type="text" name="nombres" class="form-control" id="exampleEmail" required>
                                 <input id="textinput" name="plan" type="hidden" class="form-control input-md" value="PLAN EMPRESARIAL - ANUAL">
                              </div>
                              <div class="form-group">
                                 <label for="exampleEmail" class="bmd-label-floating">Celular</label>
                                 <input type="number" name="celu" class="form-control" id="exampleEmail" required>
                              </div>
                              <div class="form-group">
                                 <label for="exampleEmail" class="bmd-label-floating">Email Address</label>
                                 <input type="email" name="correo" class="form-control" id="exampleEmail" required>
                              </div>
                             <div class="form-group">
                                 <label for="exampleEmail" class="bmd-label-floating">Solicitud</label>
                                 <textarea  class="form-control" name="textarea" rows="5" required>Estoy Interesado en el PLAN EMPRESARIAL, y deseo adquirirlo. Saludos cordiales.</textarea>
                              </div>
    </div>
    <div class="card-footer ">
        <button type="submit" class="btn btn-fill btn-success">Enviar Solicitud</button>
    </div>
</div>
    </div>
									</form>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    	</div>
                    	<!--  End Modal compra pro-->
</body>

    <!--   Core JS Files   -->
<script src="../js/core/jquery.min.js"></script>
<script src="../js/core/popper.min.js"></script>
<script src="../js/bootstrap-material-design.min.js"></script>
<script src="../js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!--  Google Maps Plugin  -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2Yno10-YTnLjjn_Vtk0V8cdcY5lC4plU"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin  -->
<script src="../js/plugins/moment.min.js"></script>
<!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
<script src="../js/plugins/bootstrap-datetimepicker.min.js"></script>
<!--	Plugin for the Sliders, full documentation here: https://refreshless.com/nouislider/ -->
<script src="../js/plugins/nouislider.min.js"></script>
<!--	Plugin for Select, full documentation here: https://silviomoreto.github.io/bootstrap-select -->
<script src="../js/plugins/bootstrap-selectpicker.js"></script>
<!--	Plugin for Tags, full documentation here: https://xoxco.com/projects/code/tagsinput/  -->
<script src="../js/plugins/bootstrap-tagsinput.js"></script>
<!--	Plugin for Fileupload, full documentation here: https://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="../js/plugins/jasny-bootstrap.min.js"></script>
<!-- Plugins for presentation and navigation  -->
<script src="../js/modernizr.js"></script>
<!-- Material Kit Core initialisations of plugins and Bootstrap Material Design Library -->
<script src="../js/material-dashboard.js?v=2.0.1"></script>
<!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
<!-- Library for adding dinamically elements -->
<script src="../js/plugins/arrive.min.js" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="../js/plugins/jquery.validate.min.js"></script>
<!--  Charts Plugin, full documentation here: https://gionkunz.github.io/chartist-js/ -->
<script src="../js/plugins/chartist.min.js"></script>
<!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
<script src="../js/plugins/jquery.bootstrap-wizard.js"></script>
<!--  Notifications Plugin, full documentation here: https://bootstrap-notify.remabledesigns.com/    -->
<script src="../js/plugins/bootstrap-notify.js"></script>
<!-- Vector Map plugin, full documentation here: https://jvectormap.com/documentation/ -->
<script src="../js/plugins/jquery-jvectormap.js"></script>
<!-- Sliders Plugin, full documentation here: https://refreshless.com/nouislider/ -->
<script src="../js/plugins/nouislider.min.js"></script>
<!--  Plugin for Select, full documentation here: https://silviomoreto.github.io/bootstrap-select -->
<script src="../js/plugins/jquery.select-bootstrap.js"></script>
<!--  DataTables.net Plugin, full documentation here: https://datatables.net/    -->
<script src="../js/plugins/jquery.datatables.js"></script>
<!-- Sweet Alert 2 plugin, full documentation here: https://limonte.github.io/sweetalert2/ -->
<script src="../js/plugins/sweetalert2.js"></script>
<!-- Plugin for Fileupload, full documentation here: https://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="../js/plugins/jasny-bootstrap.min.js"></script>
<!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
<script src="../js/plugins/fullcalendar.min.js"></script>
<!-- demo init -->
<script src="../js/plugins/demo.js"></script>
 
  <script type="text/javascript">
    $().ready(function(){
        demo.checkFullPageBackgroundImage();
        setTimeout(function(){
            // after 1000 ms we add the class animated to the login/register card
            $('.card').removeClass('card-hidden');
        }, 700)
    });
</script>
    
 <!--visualiza mensaje automaticamente -->
     <?php
	if($msgerror!=""){
     ?>
 <script>
	 jQuery(function(){
   jQuery('#mensajes').click();
});
    </script>
    <?php
	}
	 ?>
 <!-- fin visualiza mensaje automaticamente -->
 
</html>