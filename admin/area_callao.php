<?php
session_start();
if (isset($_SESSION['login_usuario'])){
}else{
	if(!isset($_SESSION["login_usuario"]) || $_SESSION["login_usuario"]==null){
	//print "<script>alert('Acceso invalido! - Inicia Sesion para Acceder');window.location='$enlace_actual';</script>";
	print "<script>window.location='login/';</script>";
}
}
include("incBD/inibd.php");
$linkpage = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
set_time_limit(250);
$activebus ="active";
$busarea ="active";
$areashow = "show";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<?php include("title.php"); ?>
<?php include("css.php"); ?>

  <script>
      window.onload = detectarCarga;
      function detectarCarga(){
         document.getElementById("carga").style.display="none";
      }
    </script>
       
        </head>
        <body >
        <div class="wrapper">
         <?php include("menuizquierdo.php"); ?>


            <div class="main-panel">
                <!-- Navbar -->
<?php include("menusuperior.php"); ?>
<!-- End Navbar -->

                    <div class="content">
                      <div class="container-fluid">
                        <div class="row">
                        
    <div class="col-md-12">
    <!--<h2 align="center">Opción buscador de producto</h2>-->
    
    <!-- form busqueda -->
        <div class="col-md-12">
<div class="card ">
    <div class="card-header card-header-info card-header-icon">
    <div class="card-icon">
                          <i class="material-icons">brightness_auto</i>
                        </div>
                        <h4 class="card-title">Aéra del Callao</h4><br>
    </div>
	<iframe src="http://www.aduanet.gob.pe/cl-ad-itconsmanifiesto/manifiestoITS01Alias?accion=cargaConsultaManifiesto&tipoConsulta=numeroManifiesto" height="550"></iframe>
</div>
    </div>
    </div>
</div>


                      </div>
                    </div>
                    <?php include("footer.php"); ?>
            </div>
        </div>


    </body>

<?php include("js.php"); ?>

  <script type="text/javascript">

$(document).ready(function(){
  //init wizard
  demo.initMaterialWizard();
  // Javascript method's body can be found in assets/js/demos.js
  demo.initDashboardPageCharts();
  demo.initCharts();
});
</script>

  <script type="text/javascript">
$(document).ready(function(){

  demo.initVectorMap();
});

</script>

 

<?php
//cerrando conexion
	mysqli_close($conexpg);
?>
</html>
