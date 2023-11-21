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
$activeresu ="active";
$flat = $_SESSION['acceso_pago'];
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
      
                <?php //if(isset($_REQUEST['btnsearchmerca'])){ ?>
                 <div id="carga" style="width:100%;text-align: center;">
<Center><img class="img-responsive" src="img/loading-carga.gif" width="100px"><br><p style="font-size:12px; color:#EC0D36;"> Espere un momento, la consulta puede tardar unos minutos. </p></Center>
     </div>
               <?php //} ?>
                
         <div class="row">
        <!-- form busqueda -->
        <div class="col-md-12">
<div class="card ">
    <div class="card-header card-header-info card-header-icon">
    <div class="card-icon">
                          <i class="material-icons">cached</i>
                        </div>
                        <h4 class="card-title">Resumen de exportaciones peruanas</h4>
    </div>

</div>
    </div>
        <!-- fin form busqueda -->

        </div>
        
        <div class="row">
    <!--<div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                  <i class="material-icons">work</i>
              </div>
              <p class="card-category">Productos</p>
              <h3 class="card-title">13,258</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons text-info">
search</i>
                    <a href="producto.php">Encuentra tu producto AQUI</a>
                </div>
            </div>
        </div>
    </div>-->
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-rose card-header-icon">
              <div class="card-icon">
                <i class="material-icons">spellcheck</i>
              </div>
              <p class="card-category">Partidas</p>
              <h3 class="card-title">5,909</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                   <?php if (isset($_SESSION['login_usuario'])){ 
					if($flat=="SI"){?>
                    <i class="material-icons text-info">search</i> <a href="#" data-toggle='modal' data-target='#myModalPartR'>Ver reporte</a>
                    <?php }else if($_SESSION['rol']=='ADMIN'){ ?>
                    <i class="material-icons text-info">search</i> <a href="#" data-toggle='modal' data-target='#myModalPartR'>Ver reporte</a>
                    <?php }else{?>
                   <i class="material-icons text-info">search</i> <a href="#" data-toggle='modal' data-target='#myModalPlan'>Ver reporte</a>
                    <?php } 
                     }else{ ?>
                    <i class="material-icons text-info">search</i> <a href="#" data-toggle='modal' data-target='#myModalsesionplan'>Ver reporte</a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">language</i>
              </div>
              <p class="card-category">Mercados</p>
              <h3 class="card-title">205</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                   <?php if (isset($_SESSION['login_usuario'])){ 
					if($flat=="SI"){?>
                    <i class="material-icons text-info">search</i> <a href="#" data-toggle='modal' data-target='#myModalMER'>Ver reporte</a>
                    <?php }else if($_SESSION['rol']=='ADMIN'){ ?>
                    <i class="material-icons text-info">search</i> <a href="#" data-toggle='modal' data-target='#myModalMER'>Ver reporte</a>
                    <?php }else{?>
                    <i class="material-icons text-info">search</i> <a href="#" data-toggle='modal' data-target='#myModalPlan'>Ver reporte</a>
                    <?php } 
                     }else{ ?>
                     <i class="material-icons text-info">search</i> <a href="#" data-toggle='modal' data-target='#myModalsesionplan'>Ver reporte</a>
                     <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
              <div class="card-icon">
                <i class="material-icons">domain</i>
              </div>
              <p class="card-category">Empresas</p>
              <h3 class="card-title">18,903</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                   <?php if (isset($_SESSION['login_usuario'])){ 
					if($flat=="SI"){?>
                    <i class="material-icons text-info">search</i> <a href="#" data-toggle='modal' data-target='#myModalEMP'>Ver reporte</a>
                    <?php }else if($_SESSION['rol']=='ADMIN'){ ?>
                    <i class="material-icons text-info">search</i> <a href="#" data-toggle='modal' data-target='#myModalEMP'>Ver reporte</a>
                    <?php }else{?>
                    <i class="material-icons text-info">search</i> <a href="#" data-toggle='modal' data-target='#myModalPlan'>Ver reporte</a>
                    <?php } 
                     }else{ ?>
                     <i class="material-icons text-info">search</i> <a href="#" data-toggle='modal' data-target='#myModalsesionplan'>Ver reporte</a>
                     <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-rose card-header-icon">
              <div class="card-icon">
                <i class="material-icons">spellcheck</i>
              </div>
              <p class="card-category">Departamentos</p>
              <h3 class="card-title">25</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                   <?php if (isset($_SESSION['login_usuario'])){ 
					if($flat=="SI"){?>
                    <i class="material-icons text-info">search</i> <a href="#" data-toggle='modal' data-target='#myModalREG'>Ver reporte</a>
                    <?php }else if($_SESSION['rol']=='ADMIN'){ ?>
                    <i class="material-icons text-info">search</i> <a href="#" data-toggle='modal' data-target='#myModalREG'>Ver reporte</a>
                    <?php }else{?>
                    <i class="material-icons text-info">search</i> <a href="#" data-toggle='modal' data-target='#myModalPlan'>Ver reporte</a>
                    <?php } 
                     }else{ ?>
                     <i class="material-icons text-info">search</i> <a href="#" data-toggle='modal' data-target='#myModalsesionplan'>Ver reporte</a>
                     <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">language</i>
              </div>
              <p class="card-category">Sectores</p>
              <h3 class="card-title">16</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                   <?php if (isset($_SESSION['login_usuario'])){ 
					if($flat=="SI"){?>
                    <i class="material-icons text-info">search</i> <a href="#" data-toggle='modal' data-target='#myModalSECT'>Ver reporte</a>
                    <?php }else if($_SESSION['rol']=='ADMIN'){ ?>
                    <i class="material-icons text-info">search</i> <a href="#" data-toggle='modal' data-target='#myModalSECT'>Ver reporte</a>
                    <?php }else{?>
                    <i class="material-icons text-info">search</i> <a href="#" data-toggle='modal' data-target='#myModalPlan'>Ver reporte</a>
                    <?php } 
                     }else{ ?>
                     <i class="material-icons text-info">search</i> <a href="#" data-toggle='modal' data-target='#myModalsesionplan'>Ver reporte</a>
                     <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
        
      </div> 
  </div> 
                  
                  <!-- modal loge -->
                  <div class='modal fade' id='myModalsesionplan' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                          <div class='modal-dialog'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                  <h4 class='modal-title'>Alerta !</h4>
                                  <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>
                                      <i class='material-icons'>clear</i>
                                  </button>
                                </div>
                                <div class='modal-body'>
								<center><i class='material-icons banger-info' style="font-size: 56px;color:#FB8C00;">info</i></center>
                                    Para ver el resumen <a href="registro/">registrate AQUI</a>, si ya estas registrado <a href="login/">ingresa AQUI</a>.
									
                                </div>
                                <div class='modal-footer'>
                                    <button type='button' class='btn btn-danger btn-link' data-dismiss='modal'>Cerrar</button>
                                </div>
                            </div>
                        </div>
                    	</div>
                    	
                    	<!-- modal plan -->
                    	<div class='modal fade' id='myModalPlan' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                          <div class='modal-dialog'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                  <h4 class='modal-title'>Alerta !</h4>
                                  <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>
                                      <i class='material-icons'>clear</i>
                                  </button>
                                </div>
                                <div class='modal-body'>
								<center><i class='material-icons banger-info' style="font-size: 56px;color:#FB8C00;">info</i></center>
                                    Para acceder a ver nuestros cuadros estadisticos de resumenes adquiere uno de nuestros planes <a href="planes/">ingresando AQUI</a>.
									
                                </div>
                                <div class='modal-footer'>
                                    <button type='button' class='btn btn-danger btn-link' data-dismiss='modal'>Cerrar</button>
                                </div>
                            </div>
                        </div>
                    	</div>
                   <!-- modal partida -->
                   <div class='modal fade modal-mini modal-primary' id='myModalPartR' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                    		<div class='modal-dialog modal-small'>
                    			<div class='modal-content'>
                            <div class='modal-header'>
                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'><i class='material-icons'>clear</i></button>
                            </div>
                    				<div class='modal-body'>
                    				<p align="center"><b>Partidas</b></p>
                    					<p>
                    					<?php //if($_SESSION['rol']=='ADMIN'){ ?>
                    					<!--<form method='post' action='partida/resumen/admin_index.php' target='_blank'>-->
                    					<?php //}else{ ?>
										<form method='post' action='partida/resumen/' target='_blank'>
										<?php //} ?>
										<!--<input type='hidden' name='namempE' value='$nom_empre' >
					                    <input type='hidden' name='codempE' value='$codruc' >-->
										<b>Selecciona un Indicador</b><br>
										<select name='condiciona' class='selectpicker' data-size='7' data-style='btn btn-info btn-round' required>
                <option value='vfobserdol'>Valor FOB USD</option>
                <option value='vpesnet'>Peso Neto (Kg)</option>
                <option value='diferen'>Precio FOB USD x KG</option>
                <!--<option value='vpesbru'>Peso Bruto (Kg)</option>
                <option value='qunifis'>Cantidad Exportada</option>-->
                <option value='qunicom'>Unidades Comerciales</option>
                <!--<option value='part_nandi'>Cantidad de Partidas</option>-->
                <option value='total'>Cantidad de Registros</option>
                <option value='ndcl'>Cantidad de Duas</option>
                <option value='cpaides'>Cantidad de Mercados</option>
                <option value='cpuedes'>Cantidad de Puertos</option>
                <option value='cadu'>Cantidad de Aduanas</option>
                <option value='depa'>Cantidad de Departamentos</option> 
                <option value='provi'>Cantidad de Provincias</option>
                <option value='distri'>Cantidad de Distritos</option>
                <option value='cage'>Cantidad de Agentes</option>
                <option value='cviatra'>Cantidad de vias de Transporte</option>
                                </select>
								<center><button type='submit' class='btn btn-success'>Consultar</button></center>
										</form>
										</p>
                    				</div>
                            <div class='modal-footer justify-content-center'>
                            </div>
                    			</div>
                    		</div>
                    	</div>
                    
                    <!-- modal mercado -->
                    <div class='modal fade modal-mini modal-primary' id='myModalMER' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                    		<div class='modal-dialog modal-small'>
                    			<div class='modal-content'>
                            <div class='modal-header'>
                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'><i class='material-icons'>clear</i></button>
                            </div>
                    				<div class='modal-body'>
                    				<p align="center"><b>Mercados</b></p>
                    					<p>
                    					<?php //if($_SESSION['rol']=='ADMIN'){ ?>
                    					<!--<form method='post' action='mercado/resumen/admin_index.php' target='_blank'>-->
                    					<?php //}else{ ?>
										<form method='post' action='mercado/resumen/' target='_blank'>
										<?php //} ?>
										<input type='hidden' name='namepaisR' value='$nompais' >
					                    <input type='hidden' name='codepaisR' value='$codipais' >
										<b>Selecciona un Indicador</b><br>
										<select name='condiciona' class='selectpicker' data-size='7' data-style='btn btn-info btn-round' required>
                                    <option value='vfobserdol'>Valor FOB USD</option>
                                    <option value='part_nandi'>Cantidad de Partidas</option>
                                    <option value='dnombre'>Cantidad de Empresas</option>
                                    <option value='depa'>Cantidad de Departamentos</option>
                                </select>
								<center><button type='submit' class='btn btn-success'>Consultar</button></center>
										</form>
										</p>
                    				</div>
                            <div class='modal-footer justify-content-center'>
                            </div>
                    			</div>
                    		</div>
                    	</div>
                     
<!-- modal empresas -->
                      <div class='modal fade modal-mini modal-primary' id='myModalEMP' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                    		<div class='modal-dialog modal-small'>
                    			<div class='modal-content'>
                            <div class='modal-header'>
                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'><i class='material-icons'>clear</i></button>
                            </div>
                    				<div class='modal-body'>
                    				<p align="center"><b>Empresas</b></p>
                    					<p>
                    					<?php //if($_SESSION['rol']=='ADMIN'){ ?>
                    					<!--<form method='post' action='empresa/resumen/admin_index.php' target='_blank'>-->
                    					<?php //}else{ ?>
										<form method='post' action='empresa/resumen/' target='_blank'>
										<?php //} ?>
										<input type='hidden' name='namempE' value='$nom_empre' >
					                    <input type='hidden' name='codempE' value='$codruc' >
										<b>Selecciona un Indicador</b><br>
										<select name='condiciona' class='selectpicker' data-size='7' data-style='btn btn-info btn-round' required>
                <option value='vfobserdol'>Valor FOB USD</option>
                <option value='vpesnet'>Peso Neto (Kg)</option>
                <option value='diferen'>Precio FOB USD x KG</option>
                <!--<option value='vpesbru'>Peso Bruto (Kg)</option>
                <option value='qunifis'>Cantidad Exportada</option>-->
                <option value='qunicom'>Unidades Comerciales</option>
                <option value='part_nandi'>Cantidad de Partidas</option>
                <option value='total'>Cantidad de Registros</option>
                <option value='ndcl'>Cantidad de Duas</option>
                <option value='cpaides'>Cantidad de Mercados</option>
                <option value='cpuedes'>Cantidad de Puertos</option>
                <option value='cadu'>Cantidad de Aduanas</option>
                <option value='depa'>Cantidad de Departamentos</option> 
                <option value='provi'>Cantidad de Provincias</option>
                <option value='distri'>Cantidad de Distritos</option>
                <option value='cage'>Cantidad de Agentes</option>
                <option value='cviatra'>Cantidad de vias de Transporte</option>
                                </select>
								<center><button type='submit' class='btn btn-success'>Consultar</button></center>
										</form>
										</p>
                    				</div>
                            <div class='modal-footer justify-content-center'>
                            </div>
                    			</div>
                    		</div>
                    	</div>
          <!-- modal regiones -->
                      <div class='modal fade modal-mini modal-primary' id='myModalREG' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                    		<div class='modal-dialog modal-small'>
                    			<div class='modal-content'>
                            <div class='modal-header'>
                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'><i class='material-icons'>clear</i></button>
                            </div>
                    				<div class='modal-body'>
                    				<p align="center"><b>Departamentos</b></p>
                    					<p>
                    					<?php //if($_SESSION['rol']=='ADMIN'){ ?>
                    					<!--<form method='post' action='departamentos/resumen/admin_index.php' target='_blank'>-->
                    					<?php //}else{ ?>
										<form method='post' action='departamentos/resumen/' target='_blank'>
										<?php //} ?>
										<input type='hidden' name='namedepaRE' value='$nomdepa' >
					                    <input type='hidden' name='codedepaRE' value='$codidepa' >
										<b>Selecciona un Indicador</b><br>
										<select name='condiciona' class='selectpicker' data-size='7' data-style='btn btn-info btn-round' required>
                <option value='vfobserdol'>Valor FOB USD</option>
                <option value='part_nandi'>Cantidad de Partidas</option>
                <option value='dnombre'>Cantidad de Empresas</option>
                <option value='cpaides'>Cantidad de Mercados</option>
                                </select>
								<center><button type='submit' class='btn btn-success'>Consultar</button></center>
										</form>
										</p>
                    				</div>
                            <div class='modal-footer justify-content-center'>
                            </div>
                    			</div>
                    		</div>
                    	</div>
                    	
                    	<!-- modal sectores -->
                    	<div class='modal fade modal-mini modal-primary' id='myModalSECT' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                    		<div class='modal-dialog modal-small'>
                    			<div class='modal-content'>
                            <div class='modal-header'>
                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'><i class='material-icons'>clear</i></button>
                            </div>
                    				<div class='modal-body'>
                    				<p align="center"><b>Sectores</b></p>
                    					<p>
                    					<?php //if($_SESSION['rol']=='ADMIN'){ ?>
                    					<!--<form method='post' action='sector/resumen/admin_index.php' target='_blank'>-->
                    					<?php //}else{ ?>
										<form method='post' action='sector/resumen/' target='_blank'>
										<?php //} ?>
										<input type='hidden' name='namesectRES' value='$nomsec' >
										<b>Selecciona un Indicador</b><br>
										<select name='condiciona' class='selectpicker' data-size='7' data-style='btn btn-info btn-round' required>
                <option value='vfobserdol'>Valor FOB USD</option>
                <option value='part_nandi'>Cantidad de Partidas</option>
                <option value='dnombre'>Cantidad de Empresas</option>
                <option value='depa'>Cantidad de Regiones</option>
                                </select>
								<center><button type='submit' class='btn btn-success'>Consultar</button></center>
										</form>
										</p>
                    				</div>
                            <div class='modal-footer justify-content-center'>
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

  
<?php //cerrando conexion
	mysqli_close($conexpg); ?>
</html>
