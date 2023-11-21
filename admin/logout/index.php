<?php
session_start();
$no1 = $_SESSION["nombreaza"];
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<?php
echo("<META http-equiv= 'refresh'content = '5;URL=../'>");
	?>

<!-- Favicons -->
<link rel="apple-touch-icon" href="../img/logo.png">
<link rel="icon" href="../img/logo.png">
<title>
   ..: Azatrade :..
</title>
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
       <script>
      window.onload = detectarCarga;
      function detectarCarga(){
         document.getElementById("carga").style.display="none";
      }
    </script>
        </head>
          <body class="off-canvas-sidebar pricing-page">
    <!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-primary navbar-transparent navbar-absolute" color-on-scroll="500">
	<div class="container">
    <div class="navbar-wrapper">
        <a href="#" class="simple-text logo-mini">
             <img src="../img/logo.png" width="30px" />
        </a>
	        <a class="navbar-brand" href="#">Azatrade</a>
		</div>
	</div>
</nav>
<!-- End Navbar -->
    <div class="wrapper wrapper-full-page">
            <div class="page-header pricing-page header-filter" style="background-image: url('../img/plan.jpg'); background-size: cover; background-position: top center;">
          <div class="container">
        		<div class="row">
        		
        		<div id="" style="width:100%;text-align: center;">
<Center><img class="img-responsive" src="../img/loading-carga.gif" width="100px"></Center>
     </div>
        		
        			<div class="col-md-6 ml-auto mr-auto text-center">
        			<p>&nbsp;</p>
                                
        				<h4 class="title">Espere un momento estamos cerrando la plataforma....<br>Gracias por tu visita <b><?=$no1;?></b> y vuelva pronto</h4>
        			</div>
        		</div>
                <div class="row">

                </div>
        	</div>
        	
          
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
 <?php
	session_destroy();
session_unset();
	?>
</html>