<?php
session_start();
if (isset($_SESSION['login_usuario'])){
	if($_SESSION['rol']<>'ADMIN'){//si no es admin
		print "<script>window.location='https://www.azatrade.info/';</script>";
	}
}else{
	if(!isset($_SESSION["login_usuario"]) || $_SESSION["login_usuario"]==null){
	//print "<script>alert('Acceso invalido! - Inicia Sesion para Acceder');window.location='$enlace_actual';</script>";
	print "<script>window.location='https://www.azatrade.info/';</script>";
}
}
$linkpage = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
include("incBD/inibd.php");
set_time_limit(450);
$activepadm ="active";
$cambiaicons = "aria-expanded='true'";
$activemensa ="active";
$actibtn = "show";
$mensajeA = $_GET["by"];

							if(isset($_POST['sube1'])){
								$varme1 = $_POST["mensaexpo"];
								
								$up1 = "update mensajes set alerta='$varme1' where idme='1'";
								$conexpg->query($up1);
								
							}

                              if(isset($_POST['sube2'])){
								$varme2 = $_POST["mensaimpo"];
								
								$up2 = "update mensajes set alerta='$varme2' where idme='2'";
								$conexpg->query($up2);
								
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

<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
<link rel="stylesheet" href="css/material-dashboard.min.css?v=2.0.1">
<link rel="stylesheet" href="css/buttons.dataTables.min.css">
<link href="css/demo.css" rel="stylesheet"/>

<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.1.min.js"></script>

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
      
                 <div id="carga" style="width:100%;text-align: center;">
<Center><img class="img-responsive" src="img/loading-carga.gif" width="100px"><br><p style="font-size:12px; color:#EC0D36;"> Espere un momento, la consulta puede tardar unos minutos. </p></Center>
     </div>
     
     <?php if($mensajeA=="ok"){ ?>
           <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <i class="material-icons">close</i>
            </button>
            <span>
              <b> Mensaje - </b> Se registro satisfactoriamente al usuario</span>
          </div>
           <?php } ?>
           
       <?php if($mensajeA=="yes"){ ?>
           <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <i class="material-icons">close</i>
            </button>
            <span>
              <b> Mensaje - </b> Se modifico el registro del usuario satisfactoriamente</span>
          </div>
           <?php } ?>
        <?php if($mensajeA=="an"){ ?>
           <div class="alert alert-warning">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <i class="material-icons">close</i>
            </button>
            <span>
              <b> Mensaje - </b> Se anulo el registro de acceso al usuario satisfactoriamente</span>
          </div>
           <?php } ?>
        <?php if($mensajeA=="del"){ ?>
           <div class="alert alert-delete">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <i class="material-icons">close</i>
            </button>
            <span>
              <b> Mensaje - </b> Se elimino el registro de acceso al usuario satisfactoriamente</span>
          </div>
           <?php } ?>
           
        <!-- form busqueda -->
        <div class="col-md-12">
<div class="card ">
    <div class="card-header card-header-info card-header-icon">
    <div class="card-icon">
                          <i class="material-icons">search</i>
                        </div>
                        <h4 class="card-title">Mensajes de ultima actualizacion de Base de Datos</h4>
                        <?php
		$men1="SELECT alerta FROM mensajes WHERE idme='1'";
	  $rsmen1=$conexpg->query($men1); 
if($rsmen1->num_rows>0){ 
while($rwme=$rsmen1->fetch_array()){
			  $rrtt = $rwme['alerta'];
		  }
	  }else{
		  $rrtt="";
	  }
		?>
                        <div class="row">
                        <div class="col-md-6">
                        <p class="card">Mensaje Exportaciones</p>
                        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <input type="text" name="mensaexpo" class="form-control" maxlength="35" value="<?=$rrtt;?>" required>
                        <p><strong><font color="#C51B1E">Maximo 35 caracteres</font></strong></p>
                        <button type="submit" name="sube1" class="btn btn-raised">Actualizar</button>
							</form>
		</div>
		
		<div class="col-md-6">
                       <?php
		$men2="SELECT alerta FROM mensajes WHERE idme='2'";
	  $rsmen2=$conexpg->query($men2); 
if($rsmen2->num_rows>0){ 
while($rwme2=$rsmen2->fetch_array()){
			  $rrtt2 = $rwme2['alerta'];
		  }
	  }else{
		  $rrtt2="";
	  }
		?>
                        <p class="card">Mensaje Importaciones</p>
                        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <input type="text" name="mensaimpo" class="form-control" maxlength="35" value="<?=$rrtt2;?>" required>
                        <p><strong><font color="#C51B1E">Maximo 35 caracteres</font></strong></p>
                        <button type="submit" name="sube2" class="btn btn-raised">Actualizar</button>
							</form>
		</div>
		</div>
   
    </div>

</div>
    </div>
        <!-- fin form busqueda -->
   <?php

		  ?>
      </div> <!-- end col-md-12 -->
  </div> <!-- end row -->

                      </div>
                    </div>
   
                    <?php include("footer.php"); ?>

            </div>
        </div>
    </body>

<?php include("js.php"); ?>

<!-- mensaje de anulacion de registro -->
<script>
function confirmar()
{
	if(confirm('¿Estas seguro que desea ANULAR registro?'))
		return true;
	else
		return false;
}
</script>

<!-- mensaje de anulacion de registro -->
<script>
function confirmar2()
{
	if(confirm('¿Estas seguro que desea ELIMINAR registro?'))
		return true;
	else
		return false;
}
</script>

<script>
	$(function(){
    $(".click").click(function(e) {
        e.preventDefault();
        var data = $(this).attr("data-valor");
        //alert(data);    
		var pasa1 = document.getElementById("idfilpart").value = data;
    });
});
</script>

  
<?php //cerrando conexion
	mysqli_close($conexpg); ?>
</html>
