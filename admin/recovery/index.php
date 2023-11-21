<?php
$mesrc = $_GET["msrc"]
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
        <div class="collapse navbar-collapse justify-content-end" id="navbar">
            <ul class="navbar-nav">
                <!--<li class="nav-item">
                    <a href="../" class="nav-link">
                        <i class="material-icons">dashboard</i>
                        Inicio
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../planes/" class="nav-link">
                        <i class="material-icons">view_week</i>
                        Planes
                    </a>
                </li>
                <li class= "nav-item">
                    <a href="../registro/" class="nav-link">
                        <i class="material-icons">person_add</i>
                        Registrate
                    </a>
                </li> -->
                <li class= "nav-item">
                    <a href="../login/" class="nav-link">
                        <i class="material-icons">fingerprint</i>
                        Ingresar
                    </a>
                </li>
            </ul>
        </div>
	</div>
</nav>
<!-- End Navbar -->


    <div class="wrapper wrapper-full-page">
        <div class="page-header register-page header-filter" filter-color="black" style="background-image: url('../img/plan.jpg'); background-size: cover; background-position: top center;">
  <div class="container">
       <div class="col-md-5 ml-auto mr-auto">
       
		   <h2 class="title" align="center">Recuperar Contraseña</h2>
		   
<div class="card card-profile text-center card-hidden">
   
    <div class="card-header ">
    
    <div class="card-avatar">
          								<a href="#Azatrade">
          									<img class="img" src="../img/logo.png">
          								</a>
          							</div>
    </div>
    
    <div class="col-md-12 hidden">
<div class="card ">
    <div class="card-body text-center">
        <h5 class="card-text">mensaje <?=$mesrc; echo"gg"; ?></h5>
            <button class="btn btn-rose btn-fill" id="mserror" onclick=demo.showSwal('msjemailerror')>Enviar</button>
    </div>
</div>
</div>
   
   <div class="col-md-12 hidden">
<div class="card ">
    <div class="card-body text-center">
        <h5 class="card-text">mensaje <?=$mesrc; echo"gg"; ?></h5>
            <button class="btn btn-rose btn-fill" id="msrcok" onclick=demo.showSwal('msjemailcorreo')>Enviar</button>
    </div>
</div>
</div>
    
    <form method="post" action="envia/procesa.php" accept-charset="">
    <div class="card-body ">
        <h4 class="card-title">Ingresa tu Email</h4>
            <div class="form-group">
   <label for="exampleInput1" class="bmd-label-floating">Ingresar Email</label>
   <input type="email" class="form-control" name="emailinput" id="exampleInput1" required>

</div>
    </div>
    
    <div class="card-footer justify-content-center">
       <button type="submit" class="btn btn-info btn-round">Enviar</button>
    </div>
    </form>
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

<!--visualiza mensaje automaticamente -->
     <?php
	if($mesrc=="not"){
     ?>
 <script>
	 jQuery(function(){
   jQuery('#mserror').click();
});
    </script>
    <?php
	}
	 ?>
	 
	 <?php
	if($mesrc=="recook"){
     ?>
 <script>
	 jQuery(function(){
   jQuery('#msrcok').click();
});
    </script>
    <?php
	}
	 ?>
	 
 <!-- fin visualiza mensaje automaticamente -->

</html>