<?php
session_start();
if (isset($_SESSION['login_usuario'])){
	$rwma1 = $_SESSION['nombreaza'];
	$rwma2 = $_SESSION['login_usuario'];
}else{
	if(!isset($_SESSION["login_usuario"]) || $_SESSION["login_usuario"]==null){
	//print "<script>alert('Acceso invalido! - Inicia Sesion para Acceder');window.location='$enlace_actual';</script>";
	print "<script>window.location='login/';</script>";
}
}
$linkpage = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

include("incBD/inibd.php");
set_time_limit(450);

if($rwma1==""){
	$requeU = "required";
}else{
	$requeU = "readonly";
}

$ss1 = $_POST["claveA"];
$ss2 = $_POST["claveB"];

$men = $_GET["ok"];

set_time_limit(250);
$activepf ="active";
$cambiapf = "aria-expanded='true'";
$activeperfil ="active";
$actibtnpf = "show";

$ver="select * from usuario where login_usuario='$rwma2'";
/*$resultado_rpt = pg_query($ver) or die("Error en la Consulta SQL vista usuario");
	  $numReg_rpt = pg_num_rows($resultado_rpt);
	  if($numReg_rpt>0){
		   while ($fila_rpt=pg_fetch_array($resultado_rpt)) {*/
$resultado_rpt=$conexpg->query($ver); 
if($resultado_rpt->num_rows>0){ 
while($fila_rpt=$resultado_rpt->fetch_array()){
		   $nom1= $fila_rpt['nombre'];
		   $nom2= $fila_rpt['apellido'];
		   $nom3= $fila_rpt['celular'];
		   $nom4= $fila_rpt['direccion'];
		   $nom5= $fila_rpt['empresa'];
		   $nom6= $fila_rpt['fecha'];
		   $nom7= $fila_rpt['profesion'];
		   $nom8= $fila_rpt['formacion'];
		   $nom9= $fila_rpt['institucion_laboral'];
		   $nom10= $fila_rpt['tipo_institucion'];
		   $nom11= $fila_rpt['cargo'];

		   }
	  }

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

          <?php if($men=="nop"){ ?>
           <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <i class="material-icons">close</i>
            </button>
            <span>
              <b> Alerta - </b> No se cambio su clave, las claves no son iguales, verifique nuevamente. </span>
          </div>
          <?php } ?>
          
          <?php if($men=="vp"){ ?>
           <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <i class="material-icons">close</i>
            </button>
            <span>
              <b> Alerta - </b> uno o mas campos vacios, verifique nuevamente. </span>
          </div>
          <?php } ?>
          
          <?php if($men=="ok"){ ?>
           <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <i class="material-icons">close</i>
            </button>
            <span>
              <b> Alerta - </b> Tus datos se modificaron</span>
          </div>
          <?php } ?>
          
          <?php if($men=="sip"){ ?>
           <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <i class="material-icons">close</i>
            </button>
            <span>
              <b> Alerta - </b> tu clave se cambio satisfactoriamente</span>
          </div>
          <?php } ?>


      <div class="container-fluid">
  <div class="row">
       <!-- datos -->
       <div class="col-md-8">
      <div class="card">
        <div class="card-header card-header-icon card-header-info">
          <div class="card-icon">
            <i class="material-icons">perm_identity</i>
          </div>
          <h4 class="card-title">Mis Datos -
            <small class="category">personales</small>
          </h4>
        </div>
        <div class="card-body">
          <form method="post" action="<?=$linkpage;?>">
            <div class="row">
              <div class="col-md-5">
                <div class="form-group">
                  <label class="bmd-label-floating">Usuario</label>
                  <input type="text" class="form-control" disabled value="<?=$rwma2;?> ">
                  <input type='hidden' class='form-control' name='uuser' value='<?= $rwma2; ?>' readonly/>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label class="bmd-label-floating">Nombres</label>
                  <input type="text" name='nombre' class="form-control" value="<?=$nom1;?>" required>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label class="bmd-label-floating">apellidos</label>
                  <input type="text" name='apellido' class="form-control" value="<?=$nom2;?>" >
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="bmd-label-floating">Nivel</label>
                  <input type="text" class="form-control" value="Acceso a Nuestro Web" disabled>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="bmd-label-floating">Empresa</label>
                  <input type="text" class="form-control" name='empresa' value="<?=$nom5;?> ">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="bmd-label-floating">Direccion</label>
                  <input type="text" class="form-control" name='dire' value="<?=$nom4;?> ">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label class="bmd-label-floating">Celular</label>
                  <input type="text" name='cel' class="form-control" value="<?=$nom3;?>">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label class="bmd-label-floating">Profesion</label>
                  <input type="text" class="form-control" name='profesion' value="<?=$nom7;?> ">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label class="bmd-label-floating">Institucion Formativa</label>
                  <input type="text" class="form-control" name='instituto' value="<?=$nom8;?> ">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label class="bmd-label-floating">Institucion que labora</label>
                  <input type="text" class="form-control" name='trabajo' value="<?=$nom9;?> ">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label class="bmd-label-floating">Tipo Institucion</label>
                  <input type="text" class="form-control" name='tipo_inst' value="<?=$nom10;?> ">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label class="bmd-label-floating">Cargo</label>
                  <input type="text" class="form-control" name='cargo' value="<?=$nom11;?>">
                </div>
              </div>
            </div>

            <button type="submit" name="actuadato" class="btn btn-info pull-right">Actualizar Datos</button>
            <div class="clearfix"></div>
          </form>
        </div>
      </div>
    </div>
       <!-- fin datos >
       
       <!-- clave -->
       <div class="col-md-4">
      <div class="card card-profile">
        <div class="card-avatar">
          <a href="#">
            <img class="img" src="img/faces/user-org.png" />
          </a>
        </div>
        <div class="card-body">
          <h6 class="card-category text-gray"><?=$nom7;?></h6>
          <h4 class="card-title"><?=$nom2.' '.$nom1;?></h4>
          <!--<p class="card-description">
            Eres parte de nuestra comunida AZATRADE, que esta desprendiendo un crecimiento con nuestro aplicativo de consultas en comercio internacional.
          </p>-->
          <button class="btn btn-info btn-round" data-toggle="modal" data-target="#myModal">Cambiar Clave</button>
        </div>
      </div>
    </div>
       <!-- fin clave -->
		  </div>
       </div>
        <?php
if(isset($_POST['actuadato'])){ 
$dato1 = $_POST["uuser"];
$dato2 = $_POST["nombre"];
$dato3 = $_POST["apellido"];
$dato4 = $_POST["cel"];
$dato5 = $_POST["empresa"];
//$dato6 = $_POST["fecha"];
$dato7 = $_POST["dire"];
/*$dato8 = $_POST["depa"];
$dato9 = $_POST["prov"];
$dato10 = $_POST["dist"];*/
$dato11 = $_POST["profesion"];
$dato12 = $_POST["instituto"];
$dato13 = $_POST["trabajo"];
$dato14 = $_POST["tipo_inst"];
$dato15 = $_POST["cargo"];
//$dir = $dato7.' / '.$dato8.' / '.$dato9.' / '.$dato10;

$insert1 = "UPDATE usuario SET nombre='$dato2', apellido='$dato3', celular='$dato4', direccion='$dato7', empresa='$dato5', profesion='$dato11', formacion='$dato12', institucion_laboral='$dato13', tipo_institucion='$dato14', cargo='$dato15' WHERE login_usuario='$dato1'"; 
	$rs = $conexpg->query($insert1);
 //$rs = pg_query($insert1 )or die("Error en la Consulta SQL actualiza usuario");
$mensaje = "ok";
echo"<script>location.href='$linkpage?ok=$mensaje'</script>";
}
		  ?>
      </div> <!-- end col-md-12 -->
  </div> <!-- end row -->
                      
                      <!-- Classic Modal -->
              <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Cambiar Clave de Seguridad</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <i class="material-icons">clear</i>
                      </button>
                    </div>
                    <div class="modal-body">
                     <form method="post" action="<?=$linkpage;?>">
                     	<div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="bmd-label-floating">Contraseña Nueva</label>
                  <input type="password" class="form-control" name='claveA' required>
                  <input type="hidden" class="form-control" name='uuserp' value="<?=$rwma2;?>" >
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="bmd-label-floating">Contraseña Nueva Nuevamente</label>
                  <input type="password" class="form-control" name='claveB' required>
                </div>
              </div>
              
              <div class="col-md-12">
                <div class="form-group">
                  <button type="submit" name="cambclave" class="btn btn-info">Cambiar Clave</button>
                </div>
              </div>
              
            </div>
                     </form>
                      <p><small>Recuerda siempre la contraseña que cambias</small></p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Cerrar</button>
                    </div>
                  </div>
                </div>
              </div>
              <!--  End Modal -->
                      
                      <?php
if(isset($_POST['cambclave'])){ 
$dato1x = trim($_POST["uuserp"]);
$pasAx = trim($_POST["claveA"]);
$pasBx = trim($_POST["claveB"]);
	//echo " $pasAx $pasBx";
	
	if($pasAx=="" and $pasBx==""){
		$alem="vp";
		echo"<script>location.href='perfil.php?ok=$alem'</script>";
	}
	if($pasAx != $pasBx){
		$alem="nop";
		echo"<script>location.href='perfil.php?ok=$alem'</script>";
	}
	
	if($pasAx==$pasBx and $pasAx!="" and $pasBx!=""){//si ambos campos son iguales
		$insert1 = "UPDATE usuario SET password_usuario='$pasBx' WHERE login_usuario='$dato1x'"; 
		$rs = $conexpg->query($insert1);
 //$rs = pg_query($insert1 )or die("Error en la Consulta SQL actualiza usuario");
	 $alem="sip";
		echo"<script>location.href='perfil.php?ok=$alem'</script>";
	}
	
	}
	
						  ?>

                      </div>
                    </div>                       
                   <?php include("footer.php"); ?> 
            </div>
        </div>
         
    </body>

<?php include("js.php"); ?>

</html>
