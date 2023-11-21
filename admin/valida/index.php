<?php
include("../incBD/inibd.php");
$idclavepage = $_GET["key"];

$query_very = "SELECT nombre, apellido, empresa, login_usuario, password_usuario FROM usuario WHERE keyi='$idclavepage'";
	  /*$resultado_very = pg_query($conexpg,$query_very) or die("Error en la Consulta SQL");
	  $numReg_very = pg_num_rows($resultado_very);
	  if($numReg_very>0){
		  while ($fila_very=pg_fetch_array($resultado_very)) {*/
$query=$conexpg->query($query_very); 
if($query->num_rows>0){ 
while($fila_very=$query->fetch_array()){ 
		  $verycorreo = strtolower($fila_very["login_usuario"]);
		  $nomcorre = $fila_very["nombre"];
		  $apecorre = $fila_very["apellido"];
		  $clacorre = $fila_very["password_usuario"];
		  $empcorre = $fila_very["empresa"];
			  
			  //actualizamos registro
			  $upda = "UPDATE usuario SET very='1' WHERE keyi='$idclavepage'";
			  //$rs = pg_query($upda) or die (pg_last_error()); 
			  $rs = $conexpg->query($upda);
		  }
	  }else{
		 $verycorreo = ""; 
	  }

//enviamos correo con sus datos de acceso
if($verycorreo!=""){
	$destinatario = "$verycorreo"; 
$asunto = " ".$nomcorre." Su cuenta fue Creada AZATRADE - BUSINESS INTELLIGENCE"; 
$cuerpo = ' 
<html> 
<head> 
   <title>Acceso Azatrade</title> 
</head> 
<body> 
<h1>Hola '.$nomcorre.'</h1>
Bienvenidos al Sistema Inteligente de AZATRADE, tu cuenta ya esta activa.<br>
Nombre Completo: '.$nomcorre.' '.$apecorre.'<br>
Empresa: <b>'.$empcorre.'</b><br>
Usuario: <b>'.$verycorreo.'</b><br>
Password: <b>'.$clacorre.'</b><br><br>

<br><br>
<b>ATTE EQUIPO AZATRADE</b>
<br><br>
<font size="1"><b>Aviso:</b>AZATRADE no se responsabiliza si los datos que se te brinda (usuario y clave), los compartes con otros usuarios. Si detectamos que compartiste estos datos, la cuenta se te bloqueara permanentemente sin reclamo alguno por tema de seguridad.</font>
</body> 
</html> 
'; 

//para el envío en formato HTML 
$headers = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=utf-8\r\n"; 

//dirección del remitente 
//$headers .= "From: Miguel Angel Alvarez <pepito@desarrolloweb.com>\r\n"; 
$headers .= "From: Azatrade <azatradeinfo@gmail.com>\r\n"; 

//dirección de respuesta, si queremos que sea distinta que la del remitente 
//$headers .= "Reply-To: mariano@desarrolloweb.com\r\n"; 

//ruta del mensaje desde origen a destino 
//$headers .= "Return-path: holahola@desarrolloweb.com\r\n"; 

//direcciones que recibián copia 
//$headers .= "Cc: maria@desarrolloweb.com\r\n"; 

//direcciones que recibirán copia oculta 
//$headers .= "Bcc: jopedis85@gmail.com,azatradeinfo@gmail.com\r\n";
$headers .= "Bcc: jopedis85@gmail.com\r\n"; 

mail($destinatario,$asunto,$cuerpo,$headers);
	//cerrando conexion
	mysqli_close($conexpg);
}
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
<!--     Fonts and icons     -->
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
<link rel="stylesheet" href="../css/material-dashboard.min.css?v=2.0.1">
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
        </head>

        <body class="off-canvas-sidebar register-page">

    <!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-primary navbar-transparent navbar-absolute" color-on-scroll="500">
	<div class="container">
    <div class="navbar-wrapper">
        <a href="#" class="simple-text logo-mini">
             <img src="../img/logo.png" width="30px" />
        </a>
	        <a class="navbar-brand" href="#azatrade">Azatrade</a>
		</div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
      <span class="sr-only">Toggle navigation</span>
      <span class="navbar-toggler-icon icon-bar"></span>
      <span class="navbar-toggler-icon icon-bar"></span>
      <span class="navbar-toggler-icon icon-bar"></span>
    </button>
	</div>
</nav>
<!-- End Navbar -->


    <div class="wrapper wrapper-full-page">
        <div class="page-header register-page header-filter" filter-color="black" style="background-image: url('../img/plan.jpg'); background-size: cover; background-position: top center;">
  <div class="container">
       <div class="col-md-6 ml-auto mr-auto">
       
		   <h2 class="title" align="center">Validando Tu Cuenta</h2>
		   
<div class="card card-profile text-center card-hidden">
   
    <div class="card-header ">
    
    <div class="card-avatar">
          								<a href="#Azatrade">
          									<img class="img" src="../img/logo.png">
          								</a>
          							</div>
          	<?php if($verycorreo!=""){ ?>
          							   <div class="alert alert-success alert-with-icon" data-notify="container">
                  <i class="material-icons" data-notify="icon">notifications</i>
                    <span data-notify="icon" class="now-ui-icons ui-1_bell-53"></span>
                      <span data-notify="message">Tu cuenta de correo <b><?=$verycorreo;?></b> en AZATRADE acaba de ser validado por nuestro sistema. Ahora ya puedes acceder.</span>
                </div> 
                <a href="../login/">
               <button class="btn btn-info">
                    Ingresar
                    <span class="btn-label">
                        <i class="material-icons">priority_high</i>
                    </span>
                </button>
                    </a>
                    <?php } ?>
                
                <?php if($verycorreo==""){ ?>
                <div class="alert alert-danger alert-with-icon" data-notify="container">
                  <i class="material-icons" data-notify="icon">notifications</i>
                    <span data-notify="icon" class="now-ui-icons ui-1_bell-53"></span>
                      <span data-notify="message">La cuenta de correo no fue validado por nuestro sistema, registrese correctamente con una cuenta real para validar su correo, si el problema persiste contactese con a <b>informes@azatrade.info</b></span>
                </div> 
                <a href="../"> 
                <button class="btn btn-danger">
                    Ir al Portal
                    <span class="btn-label">
                        <i class="material-icons">priority_high</i>
                    </span>
					</button></a>
                                 <?php } ?>
                                  
    </div>
</div>
          </div>
      </div>
       
        </div>
    <footer class="footer ">
    <div class="container">
        <nav class="pull-left">
             <ul>
                <li>
                    <a href="#">
                        Azatrade Business Intelligence
                    </a>
                </li>
            </ul>
        </nav>
        <div class="copyright pull-right">
            &copy; <script>document.write(new Date().getFullYear())</script> | Desarrollado por <a href="https://www.azasof.com" target="_blank"><font color="#2C1BC1">Azasof</font></a>.
        </div>
    </div>
</footer>
</div>

    </div>

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
<script src="../assets-for-demo/js/modernizr.js"></script>




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
</html>