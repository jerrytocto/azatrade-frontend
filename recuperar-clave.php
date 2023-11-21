<?php
//include("conex/inibd.php");
//$code1 = $_GET["dat"];
//$aniogen = date("Y");
$mesrc = $_GET["msrc"]
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Azatrade - Recuperar Contraseña </title>

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

        <main class="main">
			
				<div class="page-header">
				<div class="container d-flex flex-column align-items-center">
					<!--<nav aria-label="breadcrumb" class="breadcrumb-nav">
						<div class="container">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="./">Inicio</a></li>
								<li class="breadcrumb-item active" aria-current="page">
									Nuevo Registro
								</li>
							</ol>
						</div>
					</nav>-->

					<h1>Recuperar Contraseña</h1>
				</div>
			</div>
			
			<div class="container login-container">
				
				<div class="row">
					<div class="col-lg-6 mx-auto">
						
						<?php if($mesrc=="recook"){ ?>
							<div class="alert alert-rounded alert-success alert-dismissible">
						<i class="fa fa-check" style="color: #9ad36a;"></i>
						<span><strong>Procesado!</strong> Le acabamos de enviar un correo electronico a su cuenta con los datos de acceso. <br> El mensaje lo encontrara en su bandeja de entrada o como correo no deseado o SPAM.</span>
								
								<p><center><a href="login" class="forget-password form-footer-right btn btn-outline-info btn-ellipse btn-md">Iniciar Sesi&oacute;n</a></center></p>
					</div>
						<?php } if($mesrc=="not"){ ?>
						<div class="alert alert-rounded alert-danger alert-dismissible">
						<i class="fa fa-exclamation-circle" style="color: #ef8495;"></i>
						<span><strong>Alerta!</strong> El correo electronico no se encuentra registrado. <br> verifique e intentelo nuevamente.</span>
					</div>
						<?php } ?>
						
						<div class="row">
							<!-- <div class="col-md-6">
								<div class="heading mb-1">
									<h2 class="title">Login</h2>
								</div>

								<form action="#">
									<label for="login-email">
										Username or email address
										<span class="required">*</span>
									</label>
									<input type="email" class="form-input form-wide" id="login-email" required />

									<label for="login-password">
										Password
										<span class="required">*</span>
									</label>
									<input type="password" class="form-input form-wide" id="login-password" required />

									<div class="form-footer">
										<div class="custom-control custom-checkbox mb-0">
											<input type="checkbox" class="custom-control-input" id="lost-password" />
											<label class="custom-control-label mb-0" for="lost-password">Remember
												me</label>
										</div>

										<a href="forgot-password.html"
											class="forget-password text-dark form-footer-right">Forgot
											Password?</a>
									</div>
									<button type="submit" class="btn btn-dark btn-md w-100">
										LOGIN
									</button>
								</form>
							</div> -->
							<div class="col-md-12">
								<!-- <div class="heading mb-1">
									<h2 class="title">Register</h2>
								</div> -->

								<form method="post" action="recovery/">
									<label for="register-email">
										Ingresa tu Correo Electr&oacute;nico de registro.
										<span class="required">*</span>
									</label>
									<input type="email" class="form-input form-wide" id="emailrecoing" name="emailrecoing" required />
									
									<div class="form-footer mb-2">
										<button type="submit" class="btn btn-dark btn-md w-100 mr-0">Enviar</button>
									</div>
									
									<div class="row">
									<div class="col-lg-6">
										<p align="center" style="padding: 15px;">Ya eres parte de azatrade, ahora inicia sesi&oacute;n.<br> </p>
										<center><a href="login" class="forget-password form-footer-right btn btn-outline-info btn-ellipse btn-md">Iniciar Sesi&oacute;n</a></center>
										</div>
									<div class="col-lg-6" style="text-align: center;">
										<p align="center" style="padding: 15px;">Eres nuevo, registrate totalmente GRATIS y empieza con nosotros</p>
										<center><a href="registro" class="forget-password form-footer-right btn btn-outline-primary btn-ellipse btn-md">Reg&iacute;strate</a></center>
										</div>
										<div class="col-lg-12">
										<hr>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>

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
	
</body>
</html>