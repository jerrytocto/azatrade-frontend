<?php
session_start();
if (isset($_SESSION['login_usuario'])){
}else{
	if(!isset($_SESSION["login_usuario"]) || $_SESSION["login_usuario"]==null){
	//print "<script>alert('Acceso invalido! - Inicia Sesion para Acceder');window.location='$enlace_actual';</script>";
	//print "<script>window.location='index.php';</script>";
}
}
$linkpage = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
include("../incBD/inibd.php");
set_time_limit(500);
$activemercapbiimpo ="active";
$pago = $_SESSION['acceso_pago'];
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
<link rel="stylesheet" href="../css/material-dashboard.min.css?v=2.0.1">
<link rel="stylesheet" href="../css/buttons.dataTables.min.css">
<link href="../css/demo.css" rel="stylesheet"/>

 
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
        <!-- form busqueda -->
        <div class="col-md-12">
<div class="card ">

<?php if (isset($_SESSION['login_usuario'])){ 
					                         if($pago=="SI"){
                                            $pasopbi ="yes";
                                             }else if($_SESSION['rol']=='ADMIN'){ 
                                            $pasopbi ="yes";
                                             }else{
                                            $pasopbi ="not";
                                             } }else{
                                            $pasopbi ="pbnot";
                                             } 
	?>
	
	<?php if($pasopbi=="yes"){ ?>				                         
<div class="col-md-12">
                           <div class="embed-responsive embed-responsive-4by3">
                           <iframe class="embed-responsive-item" src="https://app.powerbi.com/view?r=eyJrIjoiNjI2NzQ2ZTUtYjY0ZS00MWZhLThiZmMtMWQ2OGJmMGE1YWQ2IiwidCI6ImNiZDg3MzMxLTFlZGUtNDI3YS04MTc1LTBkNWZlNGJiYmRkYyIsImMiOjR9" frameborder="0" allowFullScreen="true"></iframe>
							   </div>
				   </div>
	<?php } ?>
			   
	<?php if($pasopbi=="not"){ ?>
	   
	   <div class="card-body ">
	   <div class="col-lg-12">
		   <center><i class='material-icons banger-info' style="font-size: 56px;color:#FB8C00;">info</i><br>
                                    Para acceder a ver el cuadros estadisticos de resumenes en POWER BI adquiere uno de nuestros PLANES <a href="../planes/">ingresando AQUI</a>.</center>
                                    </div>
                                    </div>
			   <?php } ?>
			
	<?php if($pasopbi=="pbnot"){ ?>
	   <div class="card-body ">
	   <div class="col-lg-12">
		   <center><i class='material-icons banger-info' style="font-size: 56px;color:#FB8C00;">info</i><br>
                                    Para ver el grafico en POWER BI <a href="../registro/">registrate AQUI</a>, si ya estas registrado <a href="../login/">ingresa AQUI</a>.</center>
                                    </div>
                                    </div>
			   <?php } ?>	
				   
</div>
    </div>
        <!-- fin form busqueda -->

        </div>

      </div> <!-- end col-md-12 -->
  </div> <!-- end row -->
                     
                        
                      </div>
                    </div>                       
                   <?php include("footer.php"); ?> 
            </div>
        </div>
         
    </body>

<?php include("js.php"); ?>

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
