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
$activeparti ="active";
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
<link rel="stylesheet" href="css/material-dashboard.min.css?v=2.0.1">
<link rel="stylesheet" href="css/buttons.dataTables.min.css">
<link href="css/demo.css" rel="stylesheet"/>
<style>
/* estilo caja input */
.css-input { font-size:16px; border-style:solid; border-radius:25px; border-width:3px; border-color:#65adeb; padding:7px;  } 
		 .css-input:focus { outline:none; }
</style>
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
      
                <?php if(isset($_REQUEST['btnsearchpartida'])){ ?>
                 <div id="carga" style="width:100%;text-align: center;">
<Center><img class="img-responsive" src="img/loading-carga.gif" width="100px"><br><p style="font-size:12px; color:#EC0D36;"> Espere un momento, la consulta puede tardar unos minutos. </p></Center>
     </div>
               <?php } ?>
                
    <!--<p align="center">¿ Que partida deseas conocer ?</p>-->
       

        <div class="row">
        <!-- form busqueda -->
        <div class="col-md-12">
<div class="card ">
    <div class="card-header card-header-info card-header-icon">
    <div class="card-icon">
                          <i class="material-icons">search</i>
                        </div>
                        <h4 class="card-title">Consulte por N&uacute;mero de Partida</h4>
    </div>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <!--<form method="post" action="<?php echo "$linkpage"; ?>">-->
    <div class="card-body "> 
                              <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
<?php if (isset($_SESSION['login_usuario'])){ //logeado
	if($axepago=="SI" and $axenivel=='BASICO'){//si tiene acceso
	$requiere = "";
	$reselect = "Seleccione Todos";
	}else if($axepago=="NO" and $axenivel=='BASICO'){//si no tiene acceso
	$requiere = "required";
	$reselect = "Departamento Todos";
}else if($axenivel=='ADMIN'){//si es administrador
	$requiere = "";
	$reselect = "Seleccione Todos";
	}
}else{//sin logearse
	$requiere = "required";
	$reselect = "Departamento Todos";
} ?>

                                                    <select name='depavalue' class='selectpicker' data-size='7' data-style='btn btn-info btn-round' title='<?=$reselect;?>' <?=$requiere;?> >";
                                                    
                                                    <?php
	echo"<option value=''>$reselect</option>";
	$sqlx = mysqli_query($conexpg,"SELECT iddepartamento, departamento.nombre FROM departamento ORDER BY departamento.nombre ASC");
					while($filax=mysqli_fetch_array($sqlx))
					{ 
						echo "<option value='$filax[0]'>$filax[1]"; 
					}
				?>
                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                               <?php 
												$daa=$_POST['datopartida']; 
												if($daa==""){
													$daa=$_GET['datopartida']; 
												}else{
													$daa=$_POST['datopartida']; 
												}
												?>
                                                <div class="form-group">
                                                    <input type="text" name="datopartida" class="form-control css-input" placeholder="Ingrese N&uacute;mero de Partida" value="<?php echo"$daa";?>" required />
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                            <button type="submit" name="btnsearchpartida" class="btn btn-fill btn-success">Consultar <i class="material-icons">search</i></button>
                                            
                                            <?php if (isset($_SESSION['login_usuario'])){ 
					                         if($pago=="SI"){?>
                                            <a class='btn btn-danger' data-toggle='modal' data-target='#myModalPartR' style="color: #FFFFFF"><span class='btn-label'><i class='material-icons'>language</i></span> RESUMEN</a>
                                            <?php }else if($_SESSION['rol']=='ADMIN'){ ?>
                                            <a class='btn btn-danger' data-toggle='modal' data-target='#myModalPartR' style="color: #FFFFFF"><span class='btn-label'><i class='material-icons'>language</i></span> RESUMEN</a>
                                            <?php }else{?>
                                            <a class='btn btn-danger' data-toggle='modal' data-target='#myModalPlan' style="color: #FFFFFF"><span class='btn-label'><i class='material-icons'>language</i></span> RESUMEN</a>
                                            <?php } }else{ ?>
                                            <a class='btn btn-danger' data-toggle='modal' data-target='#myModalsesionplan' style="color: #FFFFFF"><span class='btn-label'><i class='material-icons'>language</i></span> RESUMEN</a>
                                            <?php } ?>
											</div>
                                       
                                        </div>
                                    </div>  
    </div>
    </form>
</div>
    </div>
        <!-- fin form busqueda -->
        </div>
        
        <div class='modal fade modal-mini modal-primary' id='myModalPartR' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                    		<div class='modal-dialog modal-small'>
                    			<div class='modal-content'>
                            <div class='modal-header'>
                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'><i class='material-icons'>clear</i></button>
                            </div>
                    				<div class='modal-body'>
                    					<p>
                    					<?php if($_SESSION['rol']=='ADMIN'){ ?>
                    					<form method='post' action='partida/resumen/admin_index.php' target='_blank'>
                    					<?php }else{ ?>
										<form method='post' action='partida/resumen/' target='_blank'>
										<?php } ?>
										<!--<input type='hidden' name='namempE' value='$nom_empre' >
					                    <input type='hidden' name='codempE' value='$codruc' >-->
										<b>Selecciona Variable</b><br>
										<select name='condiciona' class='selectpicker' data-size='7' data-style='btn btn-info btn-round' required>
                <option value='vfobserdol'>Valor FOB USD</option>
                <option value='vpesnet'>Peso Neto (Kg)</option>
                <option value='diferen'>Precio FOB USD x KG</option>
                <option value='vpesbru'>Peso Bruto (Kg)</option>
                <option value='qunifis'>Cantidad Exportada</option>
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
                    	
   <?php
if(isset($_REQUEST['btnsearchpartida'])){
	
	//$bus1=trim($_REQUEST['selecyear']);
	$bus2=trim($_REQUEST['datopartida']);
	$bus3 = $_REQUEST['depavalue'];
	
	if($bus3!=""){
		$fibus = "SUBSTRING(e.ubigeo,1,2) = '$bus3' AND";
		//consultamos departamento
		$sqldepardf = "SELECT iddepartamento, departamento.nombre FROM departamento where iddepartamento='".$bus3."' ";
		$rs_depdf=$conexpg->query($sqldepardf); 
if($rs_depdf->num_rows>0){ 
while($filadf=$rs_depdf->fetch_array()){
			  $nomdecodi = $filadf['iddepartamento'];
			  $nomde = $filadf['nombre'];
		  }
	  }
		
	}else{
		$fibus = "";
		$nomde = "Todos";
	}
	
	if($bus2!=""){ //si tiene datos realiza la consulta				
		
echo"<div class='col-md-12'>";
		
		echo"<div class='col-md-12'>
        <div class='card'>
            <div class='card-body'>
                <h4 class='card-title'>
                    <a href='#'>Datos de la Partida</a>
                </h4>
                <div class='card-description'>
				    <b>Departamento :</b> $nomde <br>
                    <b>Partida :</b> $bus2 <br>
					<!--<b>Descripcion :</b> $desnomara <br>-->
					<b>Clasificar :</b> <a href='https://www.azatrade.info/arancel/viewpartida.php?data=$bus2&t=$bus2&d1=' target='_blank'>Ver</a><br>
					<p align='center'>¿ De esta partida que más deseas conocer ?</p>
                </div>
				
				<div class='row'>
				
					<form method='post' action='partida/indicadores-anuales/' target='_blank'>
					<input type='hidden' name='partidaevoanua' value='$bus2' >
					<input type='hidden' name='codubi' value='$bus3'>
				    <input type='hidden' name='namedepa' value='$nomde'>
					<button type='submit' class='btn btn-warning'>
                    <span class='btn-label'>
                        <i class='material-icons'>spellcheck</i>
                    </span>
                    INDICADORES ANUALES
                </button>
				</form>
					
					<button type='submit' class='btn btn-warning' data-toggle='modal' data-target='#myModalPartA'>
                    <span class='btn-label'>
                        <i class='material-icons'>spellcheck</i>
                    </span>
                    INDICADORES MENSUALES
                </button>
				
				<!--<form method='post' action='partida/evolucion-mensual/' target='_blank'>
				<input type='hidden' name='partidaevomen' value='$bus2' >
				<input type='hidden' name='codubi' value='$bus3'>
				<input type='hidden' name='namedepa' value='$nomde'>
				<button type='submit' class='btn btn-rose'>
                    <span class='btn-label'>
                        <i class='material-icons'>spellcheck</i>
                    </span>
                    ESTACIONALIDAD
                </button>
				</form>-->
				<button class='btn btn-rose' data-toggle='modal' data-target='#myModalEstacio'>
                    <span class='btn-label'>
                        <i class='material-icons'>spellcheck</i>
                    </span>
                    ESTACIONALIDAD
                </button>
                
				<!--<form method='post' action='partida/mercados/' target='_blank'>
				<input type='hidden' name='varipartidamerca' value='$bus2' >
                <button type='submit' class='btn btn-success'>
                    <span class='btn-label'>
                        <i class='material-icons'>spellcheck</i>
                    </span>
                    MERCADOS
                </button>
				</form>-->
				

                <button type='submit' class='btn btn-success' data-toggle='modal' data-target='#myModalMercaDos'>
                    <span class='btn-label'>
                        <i class='material-icons'>spellcheck</i>
                    </span>
                    MERCADOS
                </button>
                
				<!--<form method='post' action='partida/departamentos/' target='_blank'>
				<input type='hidden' name='varipartidaregion' value='$bus2' >
                <button type='submit' class='btn btn-info'>
                    <span class='btn-label'>
                        <i class='material-icons'>spellcheck</i>
                    </span>
                    REGIONES
                </button>
				</form>-->

                <button type='submit' class='btn btn-info' data-toggle='modal' data-target='#myModalRegiDos'>
                    <span class='btn-label'>
                        <i class='material-icons'>spellcheck</i>
                    </span>
                    DEPARTAMENTOS
                </button>
				

				<!--<form method='post' action='partida/empresas/' target='_blank'>
				<input type='hidden' name='varipartidaempre' value='$bus2' >
                <button type='submit' class='btn btn-warning'>
                    <span class='btn-label'>
                        <i class='material-icons'>spellcheck</i>
                    </span>
                    EMPRESAS
                </button>
				</form>-->

                <button type='submit' class='btn btn-warning' data-toggle='modal' data-target='#myModalEmpDos'>
                    <span class='btn-label'>
                        <i class='material-icons'>spellcheck</i>
                    </span>
                    EMPRESAS
                </button>
				
				<button type='submit' class='btn btn-rose' data-toggle='modal' data-target='#myModalAgeAdu'>
                    <span class='btn-label'>
                        <i class='material-icons'>spellcheck</i>
                    </span>
                    AGENTE DE ADUANAS
                </button>
				
				<button type='submit' class='btn btn-success' data-toggle='modal' data-target='#myModalAdu'>
                    <span class='btn-label'>
                        <i class='material-icons'>spellcheck</i>
                    </span>
                    ADUANAS
                </button>
				
				<form method='post' action='producto/evaluacion-de-mercados/' target='_blank'>
				<input type='hidden' name='varipartidamerca' value='$bus2'>
				<input type='hidden' name='codubi' value='$bus3'>
				<input type='hidden' name='nomdescri' value=''>
				<input type='hidden' name='namedepa' value='$nomde'>
								<center><button type='submit' class='btn btn-primary'> <span class='btn-label'><i class='material-icons'>language</i> EVALUACIÓN DE MERCADOS</button></center>
										</form>
				
                <!--<button class='btn btn-danger' data-toggle='modal' data-target='#myModalPartR'>
                    <span class='btn-label'>
                        <i class='material-icons'>spellcheck</i>
                    </span>
                    RESUMEN
                </button>-->
				
				</div>
				
            </div>
        </div>
    </div>";
		
		//ventana modal 1
		echo"<div class='modal fade modal-mini modal-primary' id='myModalPartA' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                    		<div class='modal-dialog modal-small'>
                    			<div class='modal-content'>
                            <div class='modal-header'>
                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'><i class='material-icons'>clear</i></button>
                            </div>
                    				<div class='modal-body'>
									<p align='center'><b>Indicadores Mensuales</b></p>
                    					<p>
										<form method='post' action='partida/indicador-mensual/' target='_blank'>
										<input type='hidden' name='partidaindimen' value='$bus2' >
										<input type='hidden' name='codubi' value='$bus3'>
				                        <input type='hidden' name='namedepa' value='$nomde'>
										<b>Selecciona Año</b><br>
										<select name='year' class='selectpicker' data-size='7' data-style='btn btn-info btn-round' required>
                                    <option value='2021'>2021</option>
									<option value='2020'>2020</option>
									<option value='2019'>2019</option>
									<option value='2018'>2018</option>
                                    <option value='2017'>2017</option>
									<option value='2016'>2016</option>
									<option value='2015'>2015</option>
									<option value='2014'>2014</option>
									<option value='2013'>2013</option>
									<option value='2012'>2012</option>
                                </select>
								<center><button type='submit' class='btn btn-success'>Consultar</button></center>
										</form>
										</p>
                    				</div>
                            <div class='modal-footer justify-content-center'>
                            </div>
                    			</div>
                    		</div>
                    	</div>";
		//fin ventana modal 1
		
	}else{//fin si ambos tienen datos realiza la consulta, si no tiene datos de busqueda muestra mensaje
		echo"<div class='alert alert-warning alert-with-icon' data-notify='container'>
                    <i class='material-icons' data-notify='icon'>notifications</i>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <i class='material-icons'>close</i>
                    </button>
                    <span data-notify='message'>Campo Vacio. Para realizar una busqueda de una partida ingrese un numero de partida.</span>
                </div>";
		}
	
		  }
		  
		  
		  ?>
		  
		  <!-- modal mercado -->
		  <div class='modal fade modal-mini modal-primary' id='myModalMercaDos' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                    		<div class='modal-dialog modal-small'>
                    			<div class='modal-content'>
                            <div class='modal-header'>
                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'><i class='material-icons'>clear</i></button>
                            </div>
                    				<div class='modal-body'>
                    				<p align="center"><b>Mercados</b></p>
                    					<p>
										<form method='post' action='partida/mercados/' target='_blank'>
										<input type='hidden' name='varipartidamerca' value='<?=$bus2;?>' >
										<input type='hidden' name='codubi' value='<?=$bus3;?>'>
				                        <input type='hidden' name='namedepa' value='<?=$nomde;?>'>
										<b>Indicador</b><br>
										<select name='unavaria' class='selectpicker' data-size='7' data-style='btn btn-info btn-round' required>
                <option value=''>Selecciona Indicador</option>
				<option value='vfobserdol'>Valor FOB USD</option>
				<option value='vpesnet'>Peso Neto (Kg)</option>
                <option value='diferen'>Precio FOB USD x KG</option>
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
                    	
                    	<!-- modal estacionalidad -->
		  <div class='modal fade modal-mini modal-primary' id='myModalEstacio' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                    		<div class='modal-dialog modal-small'>
                    			<div class='modal-content'>
                            <div class='modal-header'>
                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'><i class='material-icons'>clear</i></button>
                            </div>
                    				<div class='modal-body'>
                    				<p align="center"><b>Estacionalidad</b></p>
                    					<p>
										<form method='post' action='partida/evolucion-mensual/' target='_blank'>
										<input type='hidden' name='partidaevomen' value='<?=$bus2;?>' >
				<input type='hidden' name='codubi' value='<?=$bus3;?>'>
				<input type='hidden' name='namedepa' value='<?=$nomde;?>'>
										<b>Indicador</b><br>
										<select name='unavariaestaci' class='selectpicker' data-size='7' data-style='btn btn-info btn-round' required>
                <option value=''>Selecciona Indicador</option>
				<option value='vfobserdol'>Valor FOB USD</option>
				<option value='vpesnet'>Peso Neto (Kg)</option>
                <option value='diferen'>Precio FOB USD x KG</option>
                               <option value='cantemp'>Cantidad Empresas</option>
                               <option value='cantmerca'>Cantidad Mercados</option>
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
		  <div class='modal fade modal-mini modal-primary' id='myModalRegiDos' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                    		<div class='modal-dialog modal-small'>
                    			<div class='modal-content'>
                            <div class='modal-header'>
                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'><i class='material-icons'>clear</i></button>
                            </div>
                    				<div class='modal-body'>
                    				<p align="center"><b>Departamento</b></p>
                    					<p>
										<form method='post' action='partida/departamentos/' target='_blank'>
										<input type='hidden' name='varipartidaregion' value='<?=$bus2;?>' >
										<input type='hidden' name='codubi' value='<?=$bus3;?>'>
				                        <input type='hidden' name='namedepa' value='<?=$nomde;?>'>
										<b>Indicador</b><br>
										<select name='unavaria' class='selectpicker' data-size='7' data-style='btn btn-info btn-round' required>
                <option value=''>Selecciona Indicador</option>
				<option value='vfobserdol'>Valor FOB USD</option>
				<option value='vpesnet'>Peso Neto (Kg)</option>
                <option value='diferen'>Precio FOB USD x KG</option>
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
                    	<div class='modal fade modal-mini modal-primary' id='myModalEmpDos' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                    		<div class='modal-dialog modal-small'>
                    			<div class='modal-content'>
                            <div class='modal-header'>
                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'><i class='material-icons'>clear</i></button>
                            </div>
                    				<div class='modal-body'>
                    				<p align="center"><b>Empresas</b></p>
                    					<p>
										<form method='post' action='partida/empresas/' target='_blank'>
										<input type='hidden' name='varipartidaempre' value='<?=$bus2;?>' >
										<input type='hidden' name='codubi' value='<?=$bus3;?>'>
				                        <input type='hidden' name='namedepa' value='<?=$nomde;?>'>
										<b>Indicador</b><br>
										<select name='unavaria' class='selectpicker' data-size='7' data-style='btn btn-info btn-round' required>
                <option value=''>Selecciona Indicador</option>
				<option value='vfobserdol'>Valor FOB USD</option>
				<option value='vpesnet'>Peso Neto (Kg)</option>
                <option value='diferen'>Precio FOB USD x KG</option>
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
                    	
                    	<!-- modal Agente Aduanas -->
                    	<div class='modal fade modal-mini modal-primary' id='myModalAgeAdu' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                    		<div class='modal-dialog modal-small'>
                    			<div class='modal-content'>
                            <div class='modal-header'>
                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'><i class='material-icons'>clear</i></button>
                            </div>
                    				<div class='modal-body'>
                    				<p align="center"><b>Agente de Aduanas</b></p>
                    					<p>
										<form method='post' action='partida/agenteaduanas/' target='_blank'>
										<input type='hidden' name='varipartidaempre' value='<?=$bus2;?>' >
										<input type='hidden' name='codubi' value='<?=$bus3;?>'>
				                        <input type='hidden' name='namedepa' value='<?=$nomde;?>'>
										<b>Indicador</b><br>
										<select name='unavaria' class='selectpicker' data-size='7' data-style='btn btn-info btn-round' required>
                <option value=''>Selecciona Indicador</option>
				<option value='vfobserdol'>Valor FOB USD</option>
				<option value='vpesnet'>Peso Neto (Kg)</option>
                <option value='diferen'>Precio FOB USD x KG</option>
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
                    	
                    	<!-- modal Aduanas -->
                    	<div class='modal fade modal-mini modal-primary' id='myModalAdu' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                    		<div class='modal-dialog modal-small'>
                    			<div class='modal-content'>
                            <div class='modal-header'>
                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'><i class='material-icons'>clear</i></button>
                            </div>
                    				<div class='modal-body'>
                    				<p align="center"><b>Aduanas</b></p>
                    					<p>
										<form method='post' action='partida/aduanas/' target='_blank'>
										<input type='hidden' name='varipartidaempre' value='<?=$bus2;?>' >
										<input type='hidden' name='codubi' value='<?=$bus3;?>'>
				                        <input type='hidden' name='namedepa' value='<?=$nomde;?>'>
										<b>Indicador</b><br>
										<select name='unavaria' class='selectpicker' data-size='7' data-style='btn btn-info btn-round' required>
                <option value=''>Selecciona Indicador</option>
				<option value='vfobserdol'>Valor FOB USD</option>
				<option value='vpesnet'>Peso Neto (Kg)</option>
                <option value='diferen'>Precio FOB USD x KG</option>
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
     
     
    
    <!-- ******* -->
<?php if(isset($_REQUEST['btnsearchpartida'])){ 
if($bus2!=""){ ?>  

<label id="cdro">&nbsp;</label>
      <div class="col-md-12 ml-auto mr-auto">
       <div class="chart" id="chart_div"></div>
       </div>
       <?php } } ?>
    <!-- ***** -->
     
     
     
     
      </div> <!-- end col-md-12 -->
  </div> <!-- end row -->
                      </div>
                    </div>                       
                   <?php include("footer.php"); ?> 
            </div>
        </div>
         
    </body>

<?php include("js.php"); ?>

<script type="text/javascript">
$(document).ready(function() {
    $('#datatables').DataTable({
		"order": [[ 0, "desc" ]],
        "pagingType": "full_numbers",
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "Todos"]
        ],
        responsive: true,
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Buscar resultados",
        }

    });


    var table = $('#datatables').DataTable();

    // Edit record
    table.on('click', '.edit', function() {
        $tr = $(this).closest('tr');

        var data = table.row($tr).data();
        alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
    });

    // Delete a record
    table.on('click', '.remove', function(e) {
        $tr = $(this).closest('tr');
        table.row($tr).remove().draw();
        e.preventDefault();
    });

    //Like record
    table.on('click', '.like', function() {
        alert('You clicked on Like button');
    });

    $('.card .material-datatables label').addClass('form-group');
});

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
<?php
//cerrando conexion
mysqli_close($conexpg);
?>
</html>
