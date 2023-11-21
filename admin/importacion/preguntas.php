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
$activepregu ="active";
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
              <div class="card">
                <div class="card-header">
                 <h3 class="card-title" align="center">BASE DE DATOS DE IMPORTACIONES PERUANAS</h3><br>
                  <h4 class="card-title">Aprende como utilizar la base de datos de importaciones peruanas:
</h4>
                </div>
                <div class="card-body">
                  <div id="accordion" role="tablist">
                    <div class="card-collapse">
                      <div class="card-header" role="tab" id="headingOne">
                        <h5 class="mb-0">
                          <a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" class="collapsed">
                            ¿ Qué información encuentro en la data de importaciones ?
                            <i class="material-icons">keyboard_arrow_down</i>
                          </a>
                        </h5>
                      </div>
                      <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion" style="">
                        <div class="card-body">
                          Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch.
                          <br><br>
                          <div class="embed-responsive embed-responsive-16by9">
    <iframe class="embed-responsive-item" width="640" height="480" src="https://www.youtube.com/embed/rGr0_VCjhbU" frameborder="0" allowfullscreen></iframe>
</div>
                          
                        </div>
                      </div>
                    </div>
                    <div class="card-collapse">
                      <div class="card-header" role="tab" id="headingTwo">
                        <h5 class="mb-0">
                          <a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            ¿ Qué criterios debo tener en cuenta antes de consultar ?
                            <i class="material-icons">keyboard_arrow_down</i>
                          </a>
                        </h5>
                      </div>
                      <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body">
                          Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. <br><br>
                          <div class="embed-responsive embed-responsive-16by9">
    <iframe class="embed-responsive-item" width="640" height="480" src="https://www.youtube.com/embed/rGr0_VCjhbU" frameborder="0" allowfullscreen></iframe>
</div>
                       
                        </div>
                      </div>
                    </div>
                    <div class="card-collapse">
                      <div class="card-header" role="tab" id="headingThree">
                        <h5 class="mb-0">
                          <a class="collapsed" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            ¿ Es necesario conocer la partida arancelaría ?
                            <i class="material-icons">keyboard_arrow_down</i>
                          </a>
                        </h5>
                      </div>
                      <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
                        <div class="card-body">
                          Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. <br><br>
                          <div class="embed-responsive embed-responsive-16by9">
    <iframe class="embed-responsive-item" width="640" height="480" src="https://www.youtube.com/embed/rGr0_VCjhbU" frameborder="0" allowfullscreen></iframe>
</div>
                       
                        </div>
                      </div>
                    </div>
                    
                    <div class="card-collapse">
                      <div class="card-header" role="tab" id="heading4">
                        <h5 class="mb-0">
                          <a class="collapsed" data-toggle="collapse" href="#collapse4" aria-expanded="false" aria-controls="collapse4">
                            ¿ Cómo realizar una consulta por DESCRIPCIÓN COMERCIAL ?
                            <i class="material-icons">keyboard_arrow_down</i>
                          </a>
                        </h5>
                      </div>
                      <div id="collapse4" class="collapse" role="tabpanel" aria-labelledby="heading4" data-parent="#accordion">
                        <div class="card-body">
                          Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. <br><br>
                          <div class="embed-responsive embed-responsive-16by9">
    <iframe class="embed-responsive-item" width="640" height="480" src="https://www.youtube.com/embed/rGr0_VCjhbU" frameborder="0" allowfullscreen></iframe>
</div>
                       
                        </div>
                      </div>
                    </div>
                    
                    <div class="card-collapse">
                      <div class="card-header" role="tab" id="heading5">
                        <h5 class="mb-0">
                          <a class="collapsed" data-toggle="collapse" href="#collapse5" aria-expanded="false" aria-controls="collapse5">
                            ¿ Cómo descargar información a Excel ?
                            <i class="material-icons">keyboard_arrow_down</i>
                          </a>
                        </h5>
                      </div>
                      <div id="collapse5" class="collapse" role="tabpanel" aria-labelledby="heading5" data-parent="#accordion">
                        <div class="card-body">
                          Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. <br><br>
                          <div class="embed-responsive embed-responsive-16by9">
    <iframe class="embed-responsive-item" width="640" height="480" src="https://www.youtube.com/embed/rGr0_VCjhbU" frameborder="0" allowfullscreen></iframe>
</div>
                       
                        </div>
                      </div>
                    </div>
                    
                    <div class="card-collapse">
                      <div class="card-header" role="tab" id="heading6">
                        <h5 class="mb-0">
                          <a class="collapsed" data-toggle="collapse" href="#collapse6" aria-expanded="false" aria-controls="collapse6">
                            ¿ Cómo realizar reportes personalizados en Excel ?
                            <i class="material-icons">keyboard_arrow_down</i>
                          </a>
                        </h5>
                      </div>
                      <div id="collapse6" class="collapse" role="tabpanel" aria-labelledby="heading6" data-parent="#accordion">
                        <div class="card-body">
                          Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. <br><br>
                          <div class="embed-responsive embed-responsive-16by9">
    <iframe class="embed-responsive-item" width="640" height="480" src="https://www.youtube.com/embed/rGr0_VCjhbU" frameborder="0" allowfullscreen></iframe>
</div>
                       
                        </div>
                      </div>
                    </div>
                    
                    <div class="card-collapse">
                      <div class="card-header" role="tab" id="heading7">
                        <h5 class="mb-0">
                          <a class="collapsed" data-toggle="collapse" href="#collapse7" aria-expanded="false" aria-controls="collapse7">
                            ¿ Como encontrar PROVEEDORES en el exterior ?
                            <i class="material-icons">keyboard_arrow_down</i>
                          </a>
                        </h5>
                      </div>
                      <div id="collapse7" class="collapse" role="tabpanel" aria-labelledby="heading6" data-parent="#accordion">
                        <div class="card-body">
                          Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. <br><br>
                          <div class="embed-responsive embed-responsive-16by9">
    <iframe class="embed-responsive-item" width="640" height="480" src="https://www.youtube.com/embed/rGr0_VCjhbU" frameborder="0" allowfullscreen></iframe>
</div>
                       
                        </div>
                      </div>
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
</div>

<!-- <button type="button" class="btn btn-round btn-default dropdown-toggle btn-link" data-toggle="dropdown">
    7 days
</button> -->

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
