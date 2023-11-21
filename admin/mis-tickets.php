<?php
session_start();
if (isset($_SESSION['login_usuario'])){
}else{
	if(!isset($_SESSION["login_usuario"]) || $_SESSION["login_usuario"]==null){
	//print "<script>alert('Acceso invalido! - Inicia Sesion para Acceder');window.location='$enlace_actual';</script>";
	print "<script>window.location='login/';</script>";
}
}
$linkpage = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
include("incBD/inibd.php");
set_time_limit(500);
$activemercapbi ="active";
$pago = $_SESSION['acceso_pago'];
$nomvar1 = $_SESSION['mail'];
$nomvar2 = $_SESSION['nombreaza'];
$nomvar3 = $_SESSION['apellido'];
$nomvar4 = $_SESSION['codusuario'];

$varmsn = $_GET['var'];

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
	<div class="row">
		<div class="col-lg-6">  </div>
		<div class="col-lg-6">
		<p align="right"><a href="pb" class="btn btn-info"><b> << Regresar </b></a></p>
		</div>
		<div class="col-lg-12">
		<h3 align="center"><b>Mis Solicitudes</b></h3><br>
		</div>
	</div>

			                         		                     		                         
<div class="col-md-12">

		   <?php
							  $sqlgral="SELECT s.idsoli, s.asunto, s.detalle, s.fechareg, s.atendido, s.estado, s.archivo, s.respuesta, s.fecharespu, s.origendata, u.nombre, u.apellido, u.mail 
FROM solicitudes AS s 
	INNER JOIN usuario AS u ON s.idusu = u.codusuario 
WHERE s.estado = 'A' AND s.idusu='$nomvar4' 
ORDER BY s.idsoli DESC";
		  $res_gral=$conexpg->query($sqlgral); 
if($res_gral->num_rows>0){ 
			  while($fila_rpt=$res_gral->fetch_array()){
			  $itte = $itte + 1;
		  $codi = $fila_rpt['idsoli'];
		  $varfe1 = $fila_rpt['asunto'];
		  $varfe2 = $fila_rpt['detalle'];
		  $varfe3 = $fila_rpt['fechareg'];
		  $varfe4 = $fila_rpt['atendido'];
		  $varfe5 = $fila_rpt['origendata'];
		  $varfe6 = $fila_rpt['nombre'].' '.$fila_rpt['apellido'];
		  $varfe7 = $fila_rpt['mail'];
				  
				  $varfe8 = $fila_rpt['archivo'];
				  $varfe9 = trim($fila_rpt['respuesta']);
				  $varfe10 = $fila_rpt['fecharespu'];
				  
				  if($varfe5=="Expo"){ $tori = "Exportacion"; }else{ $tori = "Importacion"; }
				  if($varfe4=="P"){ $teste = "<span class='badge badge-info'>Pendiente</span>"; }else{ $teste = "<span class='badge badge-success'>Atendido</span>"; }
							  ?>
			   <div class="col-xl-12 col-12">
				<div class="box">
				  <div class="box-header with-border">
					<h4 class="box-title"><b><?=$itte;?>.-</b> Asunto: <strong><?=$varfe1;?></strong> <?=$teste;?>  </h4>
				  </div>
				  <div class="box-body">
					<div class="callout callout-warning mb-0" role="alert"><?=$varfe2;?> <br> <b>Fecha registro:</b> <?=$varfe3;?> <br> <b>Data Solicitado:</b> <?=$tori;?> <br> </div>
					
					<?php if($varfe4!="P"){ ?>
					<div class="box-body" style="background-color: #E3E3E3;">
					  <p><strong>Respuesta:</strong> <?=$varfe10;?> <br> <?=$varfe9;?></p>
					  <p><strong>Archivo:</strong> <a href="archive/<?=$varfe8;?>" target="_blank"><b>Descargar Archivo</b></a></p>
					</div>
					<?php }else{ } ?>
					<hr>
				  </div>
				</div>
			  </div>
			   <?php
			  }
}else{
	echo "<br><h2 align='center'>Sin Registro</h2>";
}
				  ?>
				   </div>
	<?php } ?>
			   
	<?php if($pasopbi=="not"){ ?>
	   
	   <div class="card-body ">
	   <div class="col-lg-12">
		   <center><i class='material-icons banger-info' style="font-size: 56px;color:#FB8C00;">info</i><br>
                                    Para acceder a ver el cuadros estadisticos de resumenes adquiere uno de nuestros PLANES <a href="planes/">ingresando AQUI</a>.</center>
                                    </div>
                                    </div>
			   <?php } ?>
			
	<?php if($pasopbi=="pbnot"){ ?>
	   <div class="card-body ">
	   <div class="col-lg-12">
		   <center><i class='material-icons banger-info' style="font-size: 56px;color:#FB8C00;">info</i><br>
                                    Para ver el grafico <a href="registro/">registrate AQUI</a>, si ya estas registrado <a href="login/">ingresa AQUI</a>.</center>
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
