<?php
session_start();
if (isset($_SESSION['login_usuario'])){

}else{
	if(!isset($_SESSION["login_usuario"]) || $_SESSION["login_usuario"]==null){
	//print "<script>alert('Acceso invalido! - Inicia Sesion para Acceder');window.location='$enlace_actual';</script>";
	//print "<script>window.location='index.php';</script>";
}
}
include("incBD/inibd.php");
set_time_limit(450);

if($rwma1==""){
	$requeU = "required";
}else{
	$requeU = "readonly";
}

set_time_limit(250);
$activebusdeta ="active";

?>
<!DOCTYPE html>
<html lang="en">
    <head>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<!-- Favicons -->
<link rel="apple-touch-icon" href="../img/logo.png">
<link rel="icon" href="img/logo.png">
<?php include("title.php"); ?>
<?php //require("../css.php"); ?>

<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
<link rel="stylesheet" href="css/material-dashboard.min.css?v=2.0.1">
<link rel="stylesheet" href="css/buttons.dataTables.min.css">
<link href="css/demo.css" rel="stylesheet"/>

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

          <?php if($mensaje=="camvacio"){ ?>
           <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <i class="material-icons">close</i>
            </button>
            <span>
              <b> Alerta - </b> El mensaje no se envio uno o mas campos incorrectos o vacios,vuelva a interntarlo</span>
          </div>
          <?php } ?>
           
           <?php if($mensaje=="envio"){ ?>
           <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <i class="material-icons">close</i>
            </button>
            <span>
              <b> Mensaje - </b> Acabamos de recibir tu mensaje, responderemos a tu mensaje enviado.</span>
          </div>
           <?php } ?>
           
            <div class="col-md-6 ml-auto mr-auto text-center">
       <h2>Contactanos</h2>
       <h5>Si Usted. tiene alguna duda o consulta no dude en contactarnos que nosotros gustosamente le atenderemos, o puede comunicarse a este numero movil +51 978037200</h5>
       </div>

        <!-- form busqueda -->
        <div class="col-md-12">
<div class="card ">
    <div class="card-header card-header-info card-header-icon">
    <div class="card-icon">
                          <i class="material-icons">contact_mail</i>
                        </div>
                        <h4 class="card-title">Ingresa tus datos</h4>
    </div>

<div class="card-body">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="row">
              <div class="col-md-5">
                <div class="form-group">
                  <label class="bmd-label-floating">Nombres</label>
                  <input type="text" name="monu1" value="<?=$rwma1;?>" class="form-control" <?=$requeU;?> >
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label class="bmd-label-floating">Email / Correo</label>
                  <input type="email" name="emaiu2" value="<?=$rwma2;?>" class="form-control" <?=$requeU;?> >
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label class="bmd-label-floating">Celular</label>
                  <input type="number" name="fonou3" class="form-control">
                </div>
              </div>  
            </div>
            
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="bmd-label-floating">Localidad</label>
                  <input type="text" name="localu4" class="form-control" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="bmd-label-floating">Asunto</label>
                  <input type="text" name="asu5" class="form-control" required>
                </div>
              </div>
            </div>
            
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Detalle</label>
                  <div class="form-group">
                    <label class="bmd-label-floating"> Escribenos tus dudas o consultas.</label>
                    <textarea class="form-control" name="detau6" rows="5" required></textarea>
                  </div>
                </div>
              </div>
            </div>
            
            
            <div class="row">
             <p class="col-md-12">Codigo Verifica</p>
              <div class="col-md-2">
                <div class="form-group">
                  <label class=""> <font size="+3"> 4 + 6 = </font></label>
                  <input type="text" class="form-control" disabled>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label class="bmd-label-floating"> Resultado</label>
                  <input type="text" name="codveri"  class="form-control" required>
                </div>
              </div>
            </div>
            
            
            <button type="submit" name="recep" class="btn btn-success pull-right">Enviar</button>
            <div class="clearfix"></div>
          </form>
          </div>

</div>
    </div>
        <!-- fin form busqueda -->
      </div> <!-- end col-md-12 -->
  </div> <!-- end row -->

                      </div>
                    </div>                       
                   <?php include("footer.php"); ?> 
            </div>
        </div>
         
    </body>

<?php include("js.php"); ?>

</html>
