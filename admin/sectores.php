<?php
session_start();
if (isset($_SESSION['login_usuario'])){
}else{
	if(!isset($_SESSION["login_usuario"]) || $_SESSION["login_usuario"]==null){
	//print "<script>alert('Acceso invalido! - Inicia Sesion para Acceder');window.location='$enlace_actual';</script>";
	//print "<script>window.location='index.php';</script>";
		print "<script>window.location='login/';</script>";
}
}
$linkpage = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
include("incBD/inibd.php");
set_time_limit(500);
$activesecto ="active";
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
      
                <?php //if(isset($_REQUEST['btnsearchsecto'])){ ?>
                 <div id="carga" style="width:100%;text-align: center;">
<Center><img class="img-responsive" src="img/loading-carga.gif" width="100px"><br><p style="font-size:12px; color:#EC0D36;"> Espere un momento, la consulta puede tardar unos minutos. </p></Center>
     </div>

       <div class="row">
        <!-- form busqueda -->
        <div class="col-md-12">
<div class="card ">
    <div class="card-header card-header-info card-header-icon">
    <div class="card-icon">
                          <i class="material-icons">search</i>
                        </div>
                        <h4 class="card-title">Seleccione departamento y un sector</h4>
    </div>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
    <div class="card-body "> 
                              <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
<?php if (isset($_SESSION['login_usuario'])){ //logeado
	if($axepago=="SI" and $axenivel=='BASICO'){//si tiene acceso
	$requiere = "";
	$reselect = "Departamentos Todos";
	}else if($axepago=="NO" and $axenivel=='BASICO'){//si no tiene acceso
	$requiere = "required";
	$reselect = "Seleccione Departamento";
}else if($axenivel=='ADMIN'){//si es administrador
	$requiere = "";
	$reselect = "Departamentos Todos";
	}
}else{//sin logearse
	$requiere = "required";
	$reselect = "Seleccione Departamento";
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

                                            <div class="col-md-4">
                                               <?php $daa=$_POST['sect']; ?>
                                                <div class="form-group">
                                                    <select name='sect' class='selectpicker' data-size='7' data-style='btn btn-info btn-round' title='Selecione Sector' required>";
                                                    <?php

														/*if ($daa!=''){
	echo"<option value=''>Seleccione Sector</option>";
//$querypro = "SELECT sector as codsec, sector FROM sector GROUP BY sector ORDER BY sector ASC";
//$resultpro = pg_query($querypro) or die ("Error en la Consulta SQL");
//while ($filapro = pg_fetch_array ($resultpro)) { 
$querypro = mysqli_query($conexpg,"SELECT sector as codsec, sector FROM sector GROUP BY sector ORDER BY sector ASC");
while($filapro=mysqli_fetch_array($querypro))
extract ($filapro);
echo '<option value="'.$filapro["codsec"].'"';
if($_POST["sect"]==$filapro["codsec"]) echo " selected"; //con el espacio antes de "selected"
  echo '>'.$filapro["sector"].'</option>';   
}else{*/
	echo"<option value=''>Seleccione Sector</option>";
	//$sqlx="SELECT sector as codsec, sector FROM sector GROUP BY sector ORDER BY sector ASC";
	//$sqlx = mysqli_query($conexpg,"SELECT sector as codsec, sector FROM sector GROUP BY sector ORDER BY sector ASC");
	$sqlx = mysqli_query($conexpg,"SELECT concat(tipo,sector) as codsec, concat(sector,' - ',tipo) as sector FROM sector GROUP BY tipo, sector ORDER BY sector ASC");
//}
					//$resultadox=pg_query($sqlx); 
					//while ($filax=pg_fetch_row($resultadox))
					while($filax=mysqli_fetch_array($sqlx))
					{ 
						echo "<option value='$filax[0]'>$filax[1]"; 
					}
				?>
                    </select>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-5">
                                            <?php if (isset($_SESSION['login_usuario'])){ 
	
	 echo"<button type='submit' name='btnsearchsecto' class='btn btn-fill btn-success'>Consultar <i class='material-icons'>search</i></button>";
	
												/*if($_SESSION['rol']=='ADMIN'){//si es admin accede
													echo"<button type='submit' name='btnsearchmerca' class='btn btn-fill btn-success'>Consultar <i class='material-icons'>search</i></button>";
												}else{//si es usuario
													
												if($_SESSION['acceso_pago']=='SI'){//si tiene acceso
													echo"<button type='submit' name='btnsearchmerca' class='btn btn-fill btn-success'>Consultar <i class='material-icons'>search</i></button>";
												}else{//si no tiene acceso
													echo"<a class='btn btn-fill btn-success' data-toggle='modal' data-target='#myModalB'><font color='ffffff'>Consultar <i class='material-icons'>search</i></font></a>";
												}
												
												}*/
										       
                                                }else{ ?>
                                                
                                                <!--<button type='submit' name='btnsearchmerca' class='btn btn-fill btn-success'>Consultar <i class='material-icons'>search</i></button>-->
                                                
                                            <a class="btn btn-fill btn-success" data-toggle='modal' data-target='#myModalA'><font color="ffffff">Consultar <i class="material-icons">search</i></font></a>
                                            <?php } ?>
                                            
                                            
                                            <?php if (isset($_SESSION['login_usuario'])){ 
					                         if($pago=="SI"){?>
                                            <a class='btn btn-danger' data-toggle='modal' data-target='#myModalSECT' style="color: #FFFFFF"><span class='btn-label'><i class='material-icons'>language</i></span> RESUMEN</a>
                                            <?php }else if($_SESSION['rol']=='ADMIN'){ ?>
                                            <a class='btn btn-danger' data-toggle='modal' data-target='#myModalSECT' style="color: #FFFFFF"><span class='btn-label'><i class='material-icons'>language</i></span> RESUMEN</a>
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
        
        <!-- form resumen -->
         <!--<div class="col-md-6">
<div class="card ">
    <div class="card-header card-header-warning card-header-icon">
    <div class="card-icon">
                          <i class="material-icons">line_weight</i>
                        </div>
                        <h4 class="card-title">Resumen General de Sectores</h4>
    </div>
    <form method='post' action='sector/resumen/' target='_blank'>
    <div class="card-body "> 
                              <div class="col-sm-12">
                                        <div class="row">

                                            <div class="col-md-7">
                                                <div class="form-group">
                                                  <select name='condiciona' class='selectpicker' data-size='7' data-style='btn btn-info btn-round' required>
                <option value=''>Seleccionar Variable</option>
                <option value='vfobserdol'>Valor FOB USD</option>
                <option value='part_nandi'>Cantidad de Partidas</option>
                <option value='dnombre'>Cantidad de Empresas</option>
                <option value='cpaides'>Cantidad de Mercados</option>
                                </select> 
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-3">
                                            <?php if (isset($_SESSION['login_usuario'])){ 
	
	 echo"<button type='submit' class='btn btn-fill btn-info'>Consultar <i class='material-icons'>search</i></button>";
                                                }else{ ?>
                                            <a class="btn btn-fill btn-info" data-toggle='modal' data-target='#myModalA'><font color="ffffff">Consultar <i class="material-icons">search</i></font></a>
                                            <?php } ?>
                                            
											</div>
                                       
                                        </div>
                                    </div>  
    </div>
    </form>
</div>
    </div>-->
        <!-- fin from resumen -->
        </div>
        
        <div class='modal fade modal-mini modal-primary' id='myModalSECT' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                    		<div class='modal-dialog modal-small'>
                    			<div class='modal-content'>
                            <div class='modal-header'>
                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'><i class='material-icons'>clear</i></button>
                            </div>
                    				<div class='modal-body'>
                    					<p>
                    					<?php if($_SESSION['rol']=='ADMIN'){ ?>
                    					<form method='post' action='sector/resumen/admin_index.php' target='_blank'>
                    					<?php }else{ ?>
										<form method='post' action='sector/resumen/' target='_blank'>
										<?php } ?>
										<input type='hidden' name='namesectRES' value='$nomsec' >
										<b>Selecciona Variable</b><br>
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
if(isset($_REQUEST['btnsearchsecto'])){
	
	//include("incBD/inibd.php");
	
	//$bus1=trim($_REQUEST['selecyear']);
	$secto=trim($_REQUEST['sect']);
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
	
	if($secto!=""){//si tiene datos realiza la consulta

		//++++++++++++++++++++++
	$sqlsect = "SELECT sector, tipo FROM sector where concat(tipo,sector)='".$secto."' ";
	/*$rs_sec = pg_query($sqlsect) or die("Error en la Consulta SQL");
	  $numReg_sec = pg_num_rows($rs_sec);
	  if($numReg_sec>0){
		  while ($filasec=pg_fetch_array($rs_sec)) {*/
		$rs_sec=$conexpg->query($sqlsect); 
if($rs_sec->num_rows>0){ 
while($filasec=$rs_sec->fetch_array()){
			  $nomsecname = $filasec['sector'].' - '.$filasec['tipo'];
	          $nomsec = $filasec['tipo'].''.$filasec['sector']; 
		  }
	  }
		echo"<div class='col-md-12'>
        <div class='card'>
            <div class='card-body'>
                <h4 class='card-title'>
                    <a href='#'>Datos del Sector</a>
                </h4>
                <div class='card-description'>
                    <b>Sector :</b> $nomsecname <br>
					<b>Departamento :</b> $nomde <br>

					<p align='center'>¿ De este sector que más deseas conocer ?</p>
                </div>
				
				<div class='row'>
				
					<form method='post' action='sector/indicadores-anuales/' target='_blank'>
					<input type='hidden' name='namesectA' value='$nomsec' >
					<input type='hidden' name='namesectNAME' value='$nomsecname' >
					<input type='hidden' name='codubi' value='$bus3'>
				    <input type='hidden' name='namedepa' value='$nomde'>
					<button type='submit' class='btn btn-warning'>
                    <span class='btn-label'>
                        <i class='material-icons'>language</i>
                    </span>
                    INDICADORES ANUALES
                </button>
				</form>
				
				
				<button class='btn btn-rose' data-toggle='modal' data-target='#myModalSectMen'>
                    <span class='btn-label'>
                        <i class='material-icons'>language</i>
                    </span>
                    INDICADORES MENSUALES
                </button>

                <button class='btn btn-success' data-toggle='modal' data-target='#myModalSectUna'>
                    <span class='btn-label'>
                        <i class='material-icons'>language</i>
                    </span>
                    ESTACIONALIDAD
                </button>
                
                <!--<button class='btn btn-info' data-toggle='modal' data-target='#myModalSectDos'>
                    <span class='btn-label'>
                        <i class='material-icons'>language</i>
                    </span>
                    REPORTES DE:
                </button>-->
				
				<button class='btn btn-info' data-toggle='modal' data-target='#myModalSectDosA'>
                    <span class='btn-label'>
                        <i class='material-icons'>language</i>
                    </span>
                    PARTIDAS EXPORTADAS
                </button>
				
				<button class='btn btn-warning' data-toggle='modal' data-target='#myModalSectDosB'>
                    <span class='btn-label'>
                        <i class='material-icons'>language</i>
                    </span>
                    PUERTOS DE INGRESO
                </button>
				
				<button class='btn btn-rose' data-toggle='modal' data-target='#myModalSectDosC'>
                    <span class='btn-label'>
                        <i class='material-icons'>language</i>
                    </span>
                    EMPRESAS EXPORTADORAS
                </button>
				
				<button class='btn btn-success' data-toggle='modal' data-target='#myModalSectDosD'>
                    <span class='btn-label'>
                        <i class='material-icons'>language</i>
                    </span>
                    MERCADOS DESTINOS
                </button>
				
				<button class='btn btn-info' data-toggle='modal' data-target='#myModalSectDosE'>
                    <span class='btn-label'>
                        <i class='material-icons'>language</i>
                    </span>
                    DEPARTAMENTOS
                </button>
				
				<button class='btn btn-warning' data-toggle='modal' data-target='#myModalSectDosF'>
                    <span class='btn-label'>
                        <i class='material-icons'>language</i>
                    </span>
                    AGENTES DE ADUANAS
                </button>
				
				<button class='btn btn-rose' data-toggle='modal' data-target='#myModalSectDosG'>
                    <span class='btn-label'>
                        <i class='material-icons'>language</i>
                    </span>
                    ADUANAS
                </button>
				
				
				<!--<button class='btn btn-danger' data-toggle='modal' data-target='#myModalSECT'>
                    <span class='btn-label'>
                        <i class='material-icons'>language</i>
                    </span>
                    RESUMEN
                </button>-->

				</div>
				
            </div>
        </div>
    </div>";
		
		//ventana modal 1
		echo"<div class='modal fade modal-mini modal-primary' id='myModalSectMen' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                    		<div class='modal-dialog modal-small'>
                    			<div class='modal-content'>
                            <div class='modal-header'>
                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'><i class='material-icons'>clear</i></button>
                            </div>
                    				<div class='modal-body'>
									<p align='center'><b>Indicadores Mensuales </b></p>
                    					<p>
										<form method='post' action='sector/indicadores-mensuales/' target='_blank'>
										<input type='hidden' name='namesectB' value='$nomsec' >
										<input type='hidden' name='namesectNAME' value='$nomsecname' >
										<input type='hidden' name='codubi' value='$bus3'>
				                        <input type='hidden' name='namedepa' value='$nomde'>
										<b>Selecciona Año</b><br>
										<select name='years' class='selectpicker' data-size='7' data-style='btn btn-info btn-round' required>
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
		
		//ventana modal 2
		echo"<div class='modal fade modal-mini modal-primary' id='myModalSectUna' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                    		<div class='modal-dialog modal-small'>
                    			<div class='modal-content'>
                            <div class='modal-header'>
                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'><i class='material-icons'>clear</i></button>
                            </div>
                    				<div class='modal-body'>
									<p align='center'><b>Estacionalidad </b></p>
                    					<p>
										<form method='post' action='sector/indicador-anual-una-variable/' target='_blank'>
										<input type='hidden' name='namesectC' value='$nomsec' >
										<input type='hidden' name='namesectNAME' value='$nomsecname' >
										<input type='hidden' name='codubi' value='$bus3'>
				                        <input type='hidden' name='namedepa' value='$nomde'>
										<b>Selecciona Indicador</b><br>
										<select name='unavari' class='selectpicker' data-size='7' data-style='btn btn-info btn-round' required>
                <option value=''>Seleccionar</option>
				<option value='vfobserdol'>Valor FOB USD</option>
				<option value='vpesnet'>Peso Neto (Kg)</option>
                <option value='diferen'>Precio FOB USD x KG</option>
                <!--<option value='vpesbru'>Peso Bruto (Kg)</option>
                <option value='qunifis'>Cantidad Exportada</option>
                <option value='qunicom'>Unidades Comerciales</option>-->
                <option value='part_nandi'>Cantidad de Partidas</option>
                <!--<option value='total'>Cantidad de Registros</option>
                <option value='ndcl'>Cantidad de Duas</option>-->
                <option value='dnombre'>Cantidad de Empresas</option>
				<option value='cpaides'>Cantidad de Mercados</option>
                <!--<option value='cpuedes'>Cantidad de Puertos</option>
				<option value='depa'>Cantidad de Departamentos</option>
                <option value='provi'>Cantidad de Provincias</option>
                <option value='distri'>Cantidad de Distritos</option>
                <option value='cadu'>Cantidad de Aduanas</option>
                <option value='cage'>Cantidad de Agentes</option>
                <option value='cviatra'>Cantidad de vias de Transporte</option>-->
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
		//fin ventana modal 2
		
		//ventana modal 3
		echo"<div class='modal fade modal-mini modal-primary' id='myModalSectDos' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                    		<div class='modal-dialog modal-small'>
                    			<div class='modal-content'>
                            <div class='modal-header'>
                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'><i class='material-icons'>clear</i></button>
                            </div>
                    				<div class='modal-body'>
                    					<p>
										<form method='post' action='sector/evolucion-anual-dos-variables/' target='_blank'>
										<input type='hidden' name='namesectD' value='$nomsec' >
										<input type='hidden' name='namesectNAME' value='$nomsecname' >
										<input type='hidden' name='codubi' value='$bus3'>
				                        <input type='hidden' name='namedepa' value='$nomde'>
										<b>Indicadores</b><br>
										<select name='unavaria' class='selectpicker' data-size='7' data-style='btn btn-info btn-round' required>
                <option value=''>Selecciona Indicador</option>
				<option value='vfobserdol'>Valor FOB USD</option>
				<option value='vpesnet'>Peso Neto (Kg)</option>
                <option value='diferen'>Precio FOB USD x KG</option>
                <option value='vpesbru'>Peso Bruto (Kg)</option>
                <option value='qunifis'>Cantidad Exportada</option>
                <option value='qunicom'>Unidades Comerciales</option>
                <option value='part_nandi'>Cantidad de Partidas</option>
                 <option value='total'>Cantidad de Registros</option>
                <option value='ndcl'>Cantidad de Duas</option>
                <option value='dnombre'>Cantidad de Empresas</option>
				<option value='cpaides'>Cantidad de Mercados</option>
                <option value='cpuedes'>Cantidad de Puertos</option>
				<!--<option value='depa'>Cantidad de Departamentos</option>-->
                <option value='provi'>Cantidad de Provincias</option>
                <option value='distri'>Cantidad de Distritos</option>
                <option value='cadu'>Cantidad de Aduanas</option>
                <option value='cage'>Cantidad de Agentes</option>
                <option value='cviatra'>Cantidad de vias de Transporte</option>
                                </select>
								
								<select name='dosvaria' class='selectpicker' data-size='7' data-style='btn btn-info btn-round' required>
				<option value=''>Selecciona Variable</option>
				<option value='partidaexpo'>Partidas Exportadas</option>
                <option value='puerto'>Puertos de Ingreso</option>
                <option value='empresaexpo'>Empresas Exportadoras</option>
                <option value='pais'>Mercados Destinos</option>
				<option value='ubigeo'>Departamentos</option>
                <option value='agente'>Agente de Aduanas</option>
                <option value='aduanas'>Aduanas</option>
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
		//fin ventana modal 3
		
		//ventana modal a
		echo"<div class='modal fade modal-mini modal-primary' id='myModalSectDosA' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                    		<div class='modal-dialog modal-small'>
                    			<div class='modal-content'>
                            <div class='modal-header'>
                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'><i class='material-icons'>clear</i></button>
                            </div>
                    				<div class='modal-body'>
									<p align='center'><b>Partidas Exportadas</b></p>
                    					<p>
										<form method='post' action='sector/evolucion-anual-dos-variables/' target='_blank'>
										<input type='hidden' name='namesectD' value='$nomsec' >
										<input type='hidden' name='namesectNAME' value='$nomsecname' >
										<input type='hidden' name='codubi' value='$bus3'>
				                        <input type='hidden' name='namedepa' value='$nomde'>
										<input type='hidden' name='dosvaria' value='partidaexpo'>
										<b>Indicador</b><br>
										<select name='unavaria' class='selectpicker' data-size='7' data-style='btn btn-info btn-round' required>
                <option value=''>Selecciona Indicador</option>
				<option value='vfobserdol'>Valor FOB USD</option>
				<option value='vpesnet'>Peso Neto (Kg)</option>
                <option value='diferen'>Precio FOB USD x KG</option>
                <!--<option value='vpesbru'>Peso Bruto (Kg)</option>
                <option value='qunifis'>Cantidad Exportada</option>
                <option value='qunicom'>Unidades Comerciales</option>
                <option value='part_nandi'>Cantidad de Partidas</option>
                <option value='total'>Cantidad de Registros</option>
                <option value='ndcl'>Cantidad de Duas</option>-->
                <option value='dnombre'>Cantidad de Empresas</option>
				<option value='cpaides'>Cantidad de Mercados</option>
                <!--<option value='cpuedes'>Cantidad de Puertos</option>
                <option value='provi'>Cantidad de Provincias</option>
                <option value='distri'>Cantidad de Distritos</option>
                <option value='cadu'>Cantidad de Aduanas</option>
                <option value='cage'>Cantidad de Agentes</option>
                <option value='cviatra'>Cantidad de vias de Transporte</option>-->
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
		//fin ventana modal a
		
		//ventana modal b
		echo"<div class='modal fade modal-mini modal-primary' id='myModalSectDosB' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                    		<div class='modal-dialog modal-small'>
                    			<div class='modal-content'>
                            <div class='modal-header'>
                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'><i class='material-icons'>clear</i></button>
                            </div>
                    				<div class='modal-body'>
									<p align='center'><b>Puertos de Ingreso</b></p>
                    					<p>
										<form method='post' action='sector/evolucion-anual-dos-variables/' target='_blank'>
										<input type='hidden' name='namesectD' value='$nomsec' >
										<input type='hidden' name='namesectNAME' value='$nomsecname' >
										<input type='hidden' name='codubi' value='$bus3'>
				                        <input type='hidden' name='namedepa' value='$nomde'>
										<input type='hidden' name='dosvaria' value='puerto'>
										<b>Indicador</b><br>
										<select name='unavaria' class='selectpicker' data-size='7' data-style='btn btn-info btn-round' required>
                <option value=''>Selecciona Indicador</option>
				<option value='vfobserdol'>Valor FOB USD</option>
				<option value='vpesnet'>Peso Neto (Kg)</option>
                <!--<option value='diferen'>Precio FOB USD x KG</option>
                <option value='vpesbru'>Peso Bruto (Kg)</option>
                <option value='qunifis'>Cantidad Exportada</option>
                <option value='qunicom'>Unidades Comerciales</option>-->
                <option value='part_nandi'>Cantidad de Partidas</option>
                <!--<option value='total'>Cantidad de Registros</option>
                <option value='ndcl'>Cantidad de Duas</option>-->
                <option value='dnombre'>Cantidad de Empresas</option>
				<option value='cpaides'>Cantidad de Mercados</option>
                <!--<option value='cpuedes'>Cantidad de Puertos</option>
                <option value='provi'>Cantidad de Provincias</option>
                <option value='distri'>Cantidad de Distritos</option>
                <option value='cadu'>Cantidad de Aduanas</option>
                <option value='cage'>Cantidad de Agentes</option>
                <option value='cviatra'>Cantidad de vias de Transporte</option>-->
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
		//fin ventana modal b
		
		//ventana modal c
		echo"<div class='modal fade modal-mini modal-primary' id='myModalSectDosC' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                    		<div class='modal-dialog modal-small'>
                    			<div class='modal-content'>
                            <div class='modal-header'>
                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'><i class='material-icons'>clear</i></button>
                            </div>
                    				<div class='modal-body'>
									<p align='center'><b>Empresas Exportadoras</b></p>
                    					<p>
										<form method='post' action='sector/evolucion-anual-dos-variables/' target='_blank'>
										<input type='hidden' name='namesectD' value='$nomsec' >
										<input type='hidden' name='namesectNAME' value='$nomsecname' >
										<input type='hidden' name='codubi' value='$bus3'>
				                        <input type='hidden' name='namedepa' value='$nomde'>
										<input type='hidden' name='dosvaria' value='empresaexpo'>
										<b>Indicador</b><br>
										<select name='unavaria' class='selectpicker' data-size='7' data-style='btn btn-info btn-round' required>
                <option value=''>Selecciona Indicador</option>
				<option value='vfobserdol'>Valor FOB USD</option>
				<option value='vpesnet'>Peso Neto (Kg)</option>
                <option value='diferen'>Precio FOB USD x KG</option>
                <!--<option value='vpesbru'>Peso Bruto (Kg)</option>
                <option value='qunifis'>Cantidad Exportada</option>
                <option value='qunicom'>Unidades Comerciales</option>-->
                <option value='part_nandi'>Cantidad de Partidas</option>
                <!--<option value='total'>Cantidad de Registros</option>
                <option value='ndcl'>Cantidad de Duas</option>-->
                <option value='dnombre'>Cantidad de Empresas</option>
				<option value='cpaides'>Cantidad de Mercados</option>
                <!--<option value='cpuedes'>Cantidad de Puertos</option>
                <option value='provi'>Cantidad de Provincias</option>
                <option value='distri'>Cantidad de Distritos</option>
                <option value='cadu'>Cantidad de Aduanas</option>
                <option value='cage'>Cantidad de Agentes</option>
                <option value='cviatra'>Cantidad de vias de Transporte</option>-->
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
		//fin ventana modal c
		
		//ventana modal d
		echo"<div class='modal fade modal-mini modal-primary' id='myModalSectDosD' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                    		<div class='modal-dialog modal-small'>
                    			<div class='modal-content'>
                            <div class='modal-header'>
                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'><i class='material-icons'>clear</i></button>
                            </div>
                    				<div class='modal-body'>
									<p align='center'><b>Mercados Destino</b></p>
                    					<p>
										<form method='post' action='sector/evolucion-anual-dos-variables/' target='_blank'>
										<input type='hidden' name='namesectD' value='$nomsec' >
										<input type='hidden' name='namesectNAME' value='$nomsecname' >
										<input type='hidden' name='codubi' value='$bus3'>
				                        <input type='hidden' name='namedepa' value='$nomde'>
										<input type='hidden' name='dosvaria' value='pais'>
										<b>Indicador</b><br>
										<select name='unavaria' class='selectpicker' data-size='7' data-style='btn btn-info btn-round' required>
                <option value=''>Selecciona Indicador</option>
				<option value='vfobserdol'>Valor FOB USD</option>
				<option value='vpesnet'>Peso Neto (Kg)</option>
                <option value='diferen'>Precio FOB USD x KG</option>
                <!--<option value='vpesbru'>Peso Bruto (Kg)</option>
                <option value='qunifis'>Cantidad Exportada</option>
                <option value='qunicom'>Unidades Comerciales</option>-->
                <option value='part_nandi'>Cantidad de Partidas</option>
                <!--<option value='total'>Cantidad de Registros</option>
                <option value='ndcl'>Cantidad de Duas</option>-->
                <option value='dnombre'>Cantidad de Empresas</option>
				<!--<option value='cpaides'>Cantidad de Mercados</option>
                <option value='cpuedes'>Cantidad de Puertos</option>
                <option value='provi'>Cantidad de Provincias</option>
                <option value='distri'>Cantidad de Distritos</option>
                <option value='cadu'>Cantidad de Aduanas</option>
                <option value='cage'>Cantidad de Agentes</option>
                <option value='cviatra'>Cantidad de vias de Transporte</option>-->
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
		//fin ventana modal d
		
		//ventana modal e
		echo"<div class='modal fade modal-mini modal-primary' id='myModalSectDosE' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                    		<div class='modal-dialog modal-small'>
                    			<div class='modal-content'>
                            <div class='modal-header'>
                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'><i class='material-icons'>clear</i></button>
                            </div>
                    				<div class='modal-body'>
									<p align='center'><b>Departamentos</b></p>
                    					<p>
										<form method='post' action='sector/evolucion-anual-dos-variables/' target='_blank'>
										<input type='hidden' name='namesectD' value='$nomsec' >
										<input type='hidden' name='namesectNAME' value='$nomsecname' >
										<input type='hidden' name='codubi' value='$bus3'>
				                        <input type='hidden' name='namedepa' value='$nomde'>
										<input type='hidden' name='dosvaria' value='ubigeo'>
										<b>Indicador</b><br>
										<select name='unavaria' class='selectpicker' data-size='7' data-style='btn btn-info btn-round' required>
                <option value=''>Selecciona Indicador</option>
				<option value='vfobserdol'>Valor FOB USD</option>
				<option value='vpesnet'>Peso Neto (Kg)</option>
                <!--<option value='diferen'>Precio FOB USD x KG</option>
                <option value='vpesbru'>Peso Bruto (Kg)</option>
                <option value='qunifis'>Cantidad Exportada</option>
                <option value='qunicom'>Unidades Comerciales</option>-->
                <option value='part_nandi'>Cantidad de Partidas</option>
                <!--<option value='total'>Cantidad de Registros</option>
                <option value='ndcl'>Cantidad de Duas</option>-->
                <option value='dnombre'>Cantidad de Empresas</option>
				<option value='cpaides'>Cantidad de Mercados</option>
                <!--<option value='cpuedes'>Cantidad de Puertos</option>
                <option value='provi'>Cantidad de Provincias</option>
                <option value='distri'>Cantidad de Distritos</option>
                <option value='cadu'>Cantidad de Aduanas</option>
                <option value='cage'>Cantidad de Agentes</option>
                <option value='cviatra'>Cantidad de vias de Transporte</option>-->
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
		//fin ventana modal e
		
		//ventana modal f
		echo"<div class='modal fade modal-mini modal-primary' id='myModalSectDosF' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                    		<div class='modal-dialog modal-small'>
                    			<div class='modal-content'>
                            <div class='modal-header'>
                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'><i class='material-icons'>clear</i></button>
                            </div>
                    				<div class='modal-body'>
									<p align='center'><b>Agente de Aduanas</b></p>
                    					<p>
										<form method='post' action='sector/evolucion-anual-dos-variables/' target='_blank'>
										<input type='hidden' name='namesectD' value='$nomsec' >
										<input type='hidden' name='namesectNAME' value='$nomsecname' >
										<input type='hidden' name='codubi' value='$bus3'>
				                        <input type='hidden' name='namedepa' value='$nomde'>
										<input type='hidden' name='dosvaria' value='agente'>
										<b>Indicador</b><br>
										<select name='unavaria' class='selectpicker' data-size='7' data-style='btn btn-info btn-round' required>
                <option value=''>Selecciona Indicador</option>
				<option value='vfobserdol'>Valor FOB USD</option>
				<option value='vpesnet'>Peso Neto (Kg)</option>
                <option value='diferen'>Precio FOB USD x KG</option>
                <!--<option value='vpesbru'>Peso Bruto (Kg)</option>
                <option value='qunifis'>Cantidad Exportada</option>
                <option value='qunicom'>Unidades Comerciales</option>-->
                <option value='part_nandi'>Cantidad de Partidas</option>
                <!--<option value='total'>Cantidad de Registros</option>
                <option value='ndcl'>Cantidad de Duas</option>-->
                <option value='dnombre'>Cantidad de Empresas</option>
				<option value='cpaides'>Cantidad de Mercados</option>
                <!--<option value='cpuedes'>Cantidad de Puertos</option>
                <option value='provi'>Cantidad de Provincias</option>
                <option value='distri'>Cantidad de Distritos</option>
                <option value='cadu'>Cantidad de Aduanas</option>
                <option value='cage'>Cantidad de Agentes</option>
                <option value='cviatra'>Cantidad de vias de Transporte</option>-->
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
		//fin ventana modal f
		
		//ventana modal g
		echo"<div class='modal fade modal-mini modal-primary' id='myModalSectDosG' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                    		<div class='modal-dialog modal-small'>
                    			<div class='modal-content'>
                            <div class='modal-header'>
                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'><i class='material-icons'>clear</i></button>
                            </div>
                    				<div class='modal-body'>
									<p align='center'><b>Agentes</b></p>
                    					<p>
										<form method='post' action='sector/evolucion-anual-dos-variables/' target='_blank'>
										<input type='hidden' name='namesectD' value='$nomsec' >
										<input type='hidden' name='namesectNAME' value='$nomsecname' >
										<input type='hidden' name='codubi' value='$bus3'>
				                        <input type='hidden' name='namedepa' value='$nomde'>
										<input type='hidden' name='dosvaria' value='aduanas'>
										<b>Indicador</b><br>
										<select name='unavaria' class='selectpicker' data-size='7' data-style='btn btn-info btn-round' required>
                <option value=''>Selecciona Indicador</option>
				<option value='vfobserdol'>Valor FOB USD</option>
				<option value='vpesnet'>Peso Neto (Kg)</option>
                <option value='diferen'>Precio FOB USD x KG</option>
                <!--<option value='vpesbru'>Peso Bruto (Kg)</option>
                <option value='qunifis'>Cantidad Exportada</option>
                <option value='qunicom'>Unidades Comerciales</option>-->
                <option value='part_nandi'>Cantidad de Partidas</option>
                <!--<option value='total'>Cantidad de Registros</option>
                <option value='ndcl'>Cantidad de Duas</option>-->
                <option value='dnombre'>Cantidad de Empresas</option>
				<option value='cpaides'>Cantidad de Mercados</option>
                <!--<option value='cpuedes'>Cantidad de Puertos</option>
                <option value='provi'>Cantidad de Provincias</option>
                <option value='distri'>Cantidad de Distritos</option>
                <option value='cadu'>Cantidad de Aduanas</option>-->
                <option value='cage'>Cantidad de Agentes</option>
                <!--<option value='cviatra'>Cantidad de vias de Transporte</option>-->
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
		//fin ventana modal g
		
		//ventana modal 4
		/*echo"<div class='modal fade modal-mini modal-primary' id='myModalSECT' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                    		<div class='modal-dialog modal-small'>
                    			<div class='modal-content'>
                            <div class='modal-header'>
                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'><i class='material-icons'>clear</i></button>
                            </div>
                    				<div class='modal-body'>
                    					<p>
										<form method='post' action='sector/resumen/' target='_blank'>
										<input type='hidden' name='namesectRES' value='$nomsec' >
										<b>Selecciona Variable</b><br>
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
                    	</div>";*/
		//fin ventana modal 4
		
		//++++++++++++++++++++++
		
	}else{//fin si ambos tienen datos realiza la consulta, si no tiene datos de busqueda muestra mensaje
		echo"<div class='alert alert-warning alert-with-icon' data-notify='container'>
                    <i class='material-icons' data-notify='icon'>notifications</i>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <i class='material-icons'>close</i>
                    </button>
                    <span data-notify='message'>Campo Vacio. Para realizar una busqueda de Departamento seleccione una opcion.</span>
                </div>";
		}
	
		  }
		  ?>
      </div> <!-- end col-md-12 -->
  </div> <!-- end row -->
                     
                     <!-- small modal -->
                        <div class="modal fade modal-mini modal-primary" id="myModalA" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    		<div class="modal-dialog modal-small">
                    			<div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
                            </div>
                    				<div class="modal-body">
                    					<p>Para consultar <a href="registro/">registrate AQUI</a>, si ya estas registrado <a href="login/">ingresa AQUI</a>.</p>
                    				</div>
                            <div class="modal-footer justify-content-center">
                            </div>
                    			</div>
                    		</div>
                    	</div>
                        <!--    end small modal -->
                        
                        <!-- small modal -->
                        <div class="modal fade modal-mini modal-primary" id="myModalB" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    		<div class="modal-dialog modal-small">
                    			<div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
                            </div>
                    				<div class="modal-body">
                    					<p>Para ver el detalle adquiere uno de nuestros <a href='planes/' target='_blank'><button type='button' class='btn btn-info btn-link'>planes aqui</button></a></p>
                    				</div>
                            <div class="modal-footer justify-content-center">
                            </div>
                    			</div>
                    		</div>
                    	</div>
                        <!--    end small modal -->
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

  
<?php //cerrando conexion
	mysqli_close($conexpg); ?>
</html>
