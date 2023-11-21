<?php
session_start();
if (isset($_SESSION['login_usuario'])){
}else{
	if(!isset($_SESSION["login_usuario"]) || $_SESSION["login_usuario"]==null){
	//print "<script>alert('Acceso invalido! - Inicia Sesion para Acceder');window.location='$enlace_actual';</script>";
	//print "<script>window.location='index.php';</script>";
}
}
include("../incBD/inibd.php");
$linkpage = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
set_time_limit(250);
$activehome ="active";
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
    
    <div class="row">
    	<div class="col-md-12">
    		<p align="center" class="card"><?=$rrtt;?></p>
    	</div>
    </div>
    
    <div class="row">
    	<div class="col-md-6 visible-lg visible-md">
    	<style>
	.contenedord
	{
		width:500px;
		height:300px;
		line-height:300px;
		border:0px solid;
		text-align:center;
	}
	.contenedord>h1 {
		display:inline-block;
		vertical-align:middle;
		line-height:normal;
	}
	</style>
    	<div class="contenedord">
    	<h1>Comienza tu prueba gratis hoy !</h1>
    	</div>
    	</div>
    	
    	<div class="col-md-6 visible-sm visible-xs">
    	<h1 align="center">Comienza tu prueba gratis hoy !</h1>
    	<hr style="border:2px solid; color: #2961C4;">
		</div>
    	
    	<div class="col-md-6">
    		<style>.embed-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; } .embed-container iframe, .embed-container object, .embed-container embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }</style><div class='embed-container'><iframe src='https://www.youtube.com/embed/tCII1KXmGEw' frameborder='0' allowfullscreen></iframe></div>
    	</div>
    </div>
    <!--<h2 align="center">Opción buscador de producto</h2>-->
    
    <!-- form busqueda -->
        <div class="col-md-12">
<div class="card ">
    <div class="card-header card-header-info card-header-icon">
    <div class="card-icon">
                          <i class="material-icons">flight</i>
                        </div>
                        <h4 class="card-title">BASE DE DATOS DE IMPORTACIONES PERUANAS</h4><br>
    </div>
</div>
    </div>
        <!-- fin form busqueda -->

    </div>
</div>

<!-- <button type="button" class="btn btn-round btn-default dropdown-toggle btn-link" data-toggle="dropdown">
    7 days
</button> -->

<br>
<div class="row">
    <div class="col-md-4">
        <div class="card card-product">
            <div class="card-header card-header-image" data-header-animation="true">
                <a href="#">
                    <img class="img" src="img/plan1.jpg">
                </a>
            </div>
            <div class="card-body">
                <div class="card-actions text-center">
                    <button type="button" class="btn btn-danger btn-link fix-broken-card">
                        <i class="material-icons">build</i> Cargar!
                    </button>
                    <!--<button type="button" class="btn btn-default btn-link" rel="tooltip" data-placement="bottom" title="View">
                        <i class="material-icons">art_track</i>
                    </button>
                    <button type="button" class="btn btn-success btn-link" rel="tooltip" data-placement="bottom" title="Edit">
                        <i class="material-icons">edit</i>
                    </button>
                    <button type="button" class="btn btn-danger btn-link" rel="tooltip" data-placement="bottom" title="Remove">
                        <i class="material-icons">close</i>
                    </button>-->
                </div>
                <h4 class="card-title">
                    <a href="../planes/">Selecciona un plan</a>
                </h4>
                <div class="card-description">
                    Tenemos 3 planes: Básico, Pro, Empresarial, dependiendo de la cantidad de días que deseas tener disponible el acceso a la data.
                </div>
            </div>
            <div class="card-footer">
                <div class="price">
                    <h4>&nbsp;</h4>
                </div>
                <div class="stats">
                    <p class="card-category">
                    <a href="../planes/" target="_blank" class="btn btn-info"> Ir planes</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-product">
            <div class="card-header card-header-image" data-header-animation="true">
                <a href="#">
                    <img class="img" src="img/plan2.jpg">
                </a>
            </div>
            <div class="card-body">
                <div class="card-actions text-center">
                    <button type="button" class="btn btn-danger btn-link fix-broken-card">
                        <i class="material-icons">build</i> Cargar!
                    </button>
                    <!--<button type="button" class="btn btn-default btn-link" rel="tooltip" data-placement="bottom" title="View">
                        <i class="material-icons">art_track</i>
                    </button>
                    <button type="button" class="btn btn-success btn-link" rel="tooltip" data-placement="bottom" title="Edit">
                        <i class="material-icons">edit</i>
                    </button>
                    <button type="button" class="btn btn-danger btn-link" rel="tooltip" data-placement="bottom" title="Remove">
                        <i class="material-icons">close</i>
                    </button>-->
                </div>
                <h4 class="card-title">
                    <a href="busqueda-detallada.php">Realiza tu consulta</a>
                </h4>
                <div class="card-description">
                    No es necesario que conozcas la partida arancelaria, solo con ingresar la descripción comercial de tu producto para obtener toda la información.
                </div>
            </div>
            <div class="card-footer">
                <div class="price">
                    <h4>&nbsp;</h4>
                </div>
                <div class="stats">
                   <p class="card-category">
                    <a href="busqueda-detallada.php" class="btn btn-info"> Ir a consulta </a>
					</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-product">
            <div class="card-header card-header-image" data-header-animation="true">
                <a href="#">
                    <img class="img" src="img/plan3.jpg">
                </a>
            </div>
            <div class="card-body">
                <div class="card-actions text-center">
                    <button type="button" class="btn btn-danger btn-link fix-broken-card">
                        <i class="material-icons">build</i> Cargar!
                    </button>
                    <!--<button type="button" class="btn btn-default btn-link" rel="tooltip" data-placement="bottom" title="View">
                        <i class="material-icons">art_track</i>
                    </button>
                    <button type="button" class="btn btn-success btn-link" rel="tooltip" data-placement="bottom" title="Edit">
                        <i class="material-icons">edit</i>
                    </button>
                    <button type="button" class="btn btn-danger btn-link" rel="tooltip" data-placement="bottom" title="Remove">
                        <i class="material-icons">close</i>
                    </button>-->
                </div>
                <h4 class="card-title">
                    <a href="Demo_importacion_azatrade(Peru).xlsx">Descarga en Excel</a>
                </h4>
                <div class="card-description">
                    Descarga un archivo en Excel demostrativo y observa toda la información que tendrías al momento de consultar tu producto o tu partida.
                </div>
            </div>
            <div class="card-footer">
                <div class="price">
                    <h4>&nbsp;</h4>
                </div>
                <div class="stats">
                   <p class="card-category">
                    <a href="Demo_importacion_azatrade(Peru).xlsx" class="btn btn-info"> Descarga demo </a>
					</p>
                </div>
            </div>
        </div>
    </div>
</div>
                      
                      <div class="row">
                        
    <!-- form busqueda -->
        <div class="col-md-12">
<div class="card ">
    <div class="card-header card-header-info card-header-icon">
                        <h4 class="card-title" align="center"> <a href="preguntas.php" class="btn btn-raised btn-success">Más información</a> </h4><br>
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

	

<!-- Sharrre libray -->
<script src="../js/jquery.sharrre.js">
</script>
<?php
//cerrando conexion
	mysqli_close($conexpg);
?>
</html>
