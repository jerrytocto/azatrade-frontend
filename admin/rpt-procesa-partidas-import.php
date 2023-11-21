<?php
session_start();
if (isset($_SESSION['login_usuario'])){
	if($_SESSION['rol']<>'ADMIN'){//si no es admin
		print "<script>window.location='login/';</script>";
		//print "<script>window.location='https://www.azatrade.info/';</script>";
	}
}else{
	if(!isset($_SESSION["login_usuario"]) || $_SESSION["login_usuario"]==null){
	//print "<script>alert('Acceso invalido! - Inicia Sesion para Acceder');window.location='$enlace_actual';</script>";
		print "<script>window.location='login/';</script>";
	//print "<script>window.location='https://www.azatrade.info/';</script>";
}
}
$linkpage = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
include("incBD/inibd.php");
set_time_limit(450);
$activepadm ="active";
$cambiaicons = "aria-expanded='true'";
$activerptprodu ="active";
$actibtn = "show";
$mensajeA = $_GET["by"];
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

  <script>
      window.onload = detectarCarga;
      function detectarCarga(){
         document.getElementById("carga").style.display="none";
      }
    </script>
      
        </head>
        <body >
        <div class="wrapper">
            <div class="main-panel">
                <!-- Navbar -->
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
           
    <!--<a href='form-producto.php'><p><button class="btn btn-info"><i class="material-icons">perm_identity</i> Nuevo Registro</button></p></a> -->

   <?php

		$sqlgral="SELECT e.part_nandi FROM GranResumenImport_PowerBI as e  GROUP BY e.part_nandi ORDER BY e.part_nandi ASC";
		  $res_gral=$conexpg->query($sqlgral); 
if($res_gral->num_rows>0){ 
			  while($fila_rpt=$res_gral->fetch_array()){
	
		  $itte = $itte + 1;
		  $codi= htmlspecialchars($fila_rpt['part_nandi']);
				  
				  //consultamos si la partida existe
				  $sqlyyt = "SELECT partida_nandi FROM productos WHERE partida_nandi='$codi' ";
				   $rety=$conexpg->query($sqlyyt); 
                      if($rety->num_rows>0){ 
			            while($fiff=$rety->fetch_array()){
				        $codiy= $fiff['partida_nandi'];
							echo "$codiy <br>";
			                 }
                         }else{
	                        $codiy = "";
                          }
				  
				  //actualizamos en la tabla productos CUODE
				  $sqqqd = "SELECT n.partida, c.clasificacion4, c.clasificacion3, CONCAT(c.clasificacion4,' - ',c.clasificacion3 ) AS nomcla, c.idcuode 
				  FROM arancel_part_nandina AS n INNER JOIN cuode AS c ON n.cuode = c.idcuode 
				  WHERE n.partida = '$codi' 
				  GROUP BY n.partida,  c.clasificacion4,  c.clasificacion3,  nomcla";
				  $rfral=$conexpg->query($sqqqd); 
if($rfral->num_rows>0){ 
			  while($f55_rpt=$rfral->fetch_array()){
		  $codeuno1= $f55_rpt['idcuode'];
				  $codeuno2= $f55_rpt['nomcla'];
				  
				  }
	}else{
	$codeuno1= "";
	$codeuno2= "";
	 }
				  
				  //echo "$codi <br>";
				  
				  //insertamos registro nuevo
				  if($codiy==""){
					  $numcue = $numcue + 1;
					  
			$sqlinsert="INSERT INTO productos(partida_nandi, prod_especifico, prod_generico, presentacion, partida_desc, tipo_sec, sector, subsector, detalle_sector, imgfoto, estado, descri_corto, vfobusdserdol1, vfobusdserdol2, vfobusdserdol3, vpesnet1, vpesnet2, vpesnet3, precio1, precio2, precio3, mostrar, origen_expor, origen_impor, impo_vfobusdserdol1, impo_vfobusdserdol2, impo_vfobusdserdol3, impo_vpesnet1, impo_vpesnet2, impo_vpesnet3, impo_precio1, impo_precio2, impo_precio3, cuode, clasificacion4,mostrar2)values('$codi','','','', '','','','','','','A','','','','','','','','','','','','','SI','','','','','','','','','','$codeuno1','$codeuno2','')";
	$stmt = $conexpg->prepare($sqlinsert);
    $stmt->execute();

				  }
		
		  }
	
	$difeactu = $itte - $numcue;
		  echo"<div class='alert alert-danger alert-with-icon' data-notify='container'>
                    <span data-notify='message'><b>Proceso Terminado. Nuevo: $numcue - Existentes: $difeactu  </b></span>
                </div>";
		  
	  }else{//si no encuentra datos en la busqueda muestra mensaje
echo"<div class='alert alert-danger alert-with-icon' data-notify='container'>
                    <span data-notify='message'>No se encontraron datos para procesar.</span>
                </div>";
	  }
		
		  ?>
      </div> <!-- end col-md-12 -->
  </div> <!-- end row -->

                      </div>
                    </div>

            </div>
        </div>
    </body>



  
<?php //cerrando conexion
	mysqli_close($conexpg); ?>
	
	<!--<script languaje='javascript' type='text/javascript'>window.close();</script> -->
</html>
