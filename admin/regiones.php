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
$activeregion ="active";
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
      
                <?php //if(isset($_REQUEST['btnsearchdepa'])){ ?>
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
                          <i class="material-icons">search</i>
                        </div>
                        <h4 class="card-title">Seleccionar Departamento</h4>
    </div>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
    <div class="card-body "> 
                              <div class="col-sm-12">
                                        <div class="row">

                                            <div class="col-md-3">
                                               <?php $daa=$_POST['depa']; ?>
                                                <div class="form-group">
                                                    <select name='depa' class='selectpicker' data-size='7' data-style='btn btn-info btn-round' title='Selecionar Departamento' required>";
                                                    <?php

														/*if ($daa!=''){
	echo"<option value=''>Seleccione Departamento</option>";
//$querypro = "SELECT iddepartamento, departamento.nombre FROM departamento ORDER BY departamento.nombre ASC";
$querypro = mysqli_query($conexpg,"SELECT iddepartamento, departamento.nombre FROM departamento ORDER BY departamento.nombre ASC");
while($filapro=mysqli_fetch_array($querypro))
//$resultpro = pg_query ($querypro) or die ("Error en la Consulta SQL");
//while ($filapro = pg_fetch_array ($resultpro)) {
extract ($filapro);
echo '<option value="'.$filapro["iddepartamento"].'"';
if($_POST["depa"]==$filapro["iddepartamento"]) echo " selected"; //con el espacio antes de "selected"
  echo '>'.$filapro["nombre"].'</option>';   
}else{*/
	echo"<option value=''>Seleccione Departamento</option>";
	//$sqlx="SELECT iddepartamento, departamento.nombre FROM departamento ORDER BY departamento.nombre ASC";
	$sqlx = mysqli_query($conexpg,"SELECT iddepartamento, departamento.nombre FROM departamento ORDER BY departamento.nombre ASC");
//}
					/*$resultadox=pg_query($sqlx); 
					while ($filax=pg_fetch_row($resultadox))*/
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
	
	 echo"<button type='submit' name='btnsearchdepa' class='btn btn-fill btn-success'>Consultar <i class='material-icons'>search</i></button>";
	
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
                                            <a class='btn btn-danger' data-toggle='modal' data-target='#myModalREG' style="color: #FFFFFF"><span class='btn-label'><i class='material-icons'>language</i></span> RESUMEN</a>
                                            <?php }else if($_SESSION['rol']=='ADMIN'){ ?>
                                            <a class='btn btn-danger' data-toggle='modal' data-target='#myModalREG' style="color: #FFFFFF"><span class='btn-label'><i class='material-icons'>language</i></span> RESUMEN</a>
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
                        <h4 class="card-title">Resumen General de Departamentos</h4>
    </div>
    <form method='post' action='departamentos/resumen/' target='_blank'>
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
        <!-- fin form resumen -->
        </div>
        
        <div class='modal fade modal-mini modal-primary' id='myModalREG' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                    		<div class='modal-dialog modal-small'>
                    			<div class='modal-content'>
                            <div class='modal-header'>
                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'><i class='material-icons'>clear</i></button>
                            </div>
                    				<div class='modal-body'>
                    					<p>
                    					<?php if($_SESSION['rol']=='ADMIN'){ ?>
                    					<form method='post' action='departamentos/resumen/admin_index.php' target='_blank'>
                    					<?php }else{ ?>
										<form method='post' action='departamentos/resumen/' target='_blank'>
										<?php } ?>
										<input type='hidden' name='namedepaRE' value='$nomdepa' >
					                    <input type='hidden' name='codedepaRE' value='$codidepa' >
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
if(isset($_REQUEST['btnsearchdepa'])){
	
	//include("incBD/inibd.php");
	
	//$bus1=trim($_REQUEST['selecyear']);
	$depa=trim($_REQUEST['depa']);
	
	if($depa!=""){//si tiene datos realiza la consulta

		//++++++++++++++++++++++
	$sqldepar = "SELECT iddepartamento, departamento.nombre FROM departamento where iddepartamento='".$depa."' ";
	/*$rs_dep = pg_query($sqldepar) or die("Error en la Consulta SQL");
	  $numReg_depa = pg_num_rows($rs_dep);
	  if($numReg_depa>0){
		  while ($filadepa=pg_fetch_array($rs_dep)) {*/
		$rs_dep=$conexpg->query($sqldepar); 
if($rs_dep->num_rows>0){ 
while($filadepa=$rs_dep->fetch_array()){
			  $codidepa = $filadepa['iddepartamento'];
			  $nomdepa = $filadepa['nombre'];
		  }
	  }
		echo"<div class='col-md-12'>
        <div class='card'>
            <div class='card-body'>
                <h4 class='card-title'>
                    <a href='#'>Datos del Departamento</a>
                </h4>
                <div class='card-description'>
                    <b>Departamento :</b> $nomdepa <br>

					<p align='center'>¿ De este departamento que más deseas conocer ?</p>
                </div>
				
				<div class='row'>
				
					<form method='post' action='departamentos/indicadores-anuales/' target='_blank'>
					<input type='hidden' name='namedepaA' value='$nomdepa' >
					<input type='hidden' name='codedepaA' value='$codidepa' >
					<button type='submit' class='btn btn-warning'>
                    <span class='btn-label'>
                        <i class='material-icons'>language</i>
                    </span>
                    INDICADORES ANUALES
                </button>
				</form>
				
				
				<button class='btn btn-rose' data-toggle='modal' data-target='#myModalDepaMen'>
                    <span class='btn-label'>
                        <i class='material-icons'>language</i>
                    </span>
                    INDICADORES MENSUALES
                </button>

                <button class='btn btn-success' data-toggle='modal' data-target='#myModalDepaUna'>
                    <span class='btn-label'>
                        <i class='material-icons'>language</i>
                    </span>
                    ESTACIONALIDAD
                </button>
                
                <!--<button class='btn btn-info' data-toggle='modal' data-target='#myModalDepaDos'>
                    <span class='btn-label'>
                        <i class='material-icons'>language</i>
                    </span>
                    REPORTES DE:
                </button>-->
				
				<button class='btn btn-info' data-toggle='modal' data-target='#myModalDepaDosA'>
                    <span class='btn-label'>
                        <i class='material-icons'>language</i>
                    </span>
                    PARTIDAS EXPORTADAS
                </button>
				
				<button class='btn btn-warning' data-toggle='modal' data-target='#myModalDepaDosB'>
                    <span class='btn-label'>
                        <i class='material-icons'>language</i>
                    </span>
                    PUERTOS DE INGRESO
                </button>
				
				<button class='btn btn-rose' data-toggle='modal' data-target='#myModalDepaDosC'>
                    <span class='btn-label'>
                        <i class='material-icons'>language</i>
                    </span>
                    EMPRESAS EXPORTADORAS
                </button>
				
				<button class='btn btn-success' data-toggle='modal' data-target='#myModalDepaDosD'>
                    <span class='btn-label'>
                        <i class='material-icons'>language</i>
                    </span>
                    MERCADOS DE DESTINO
                </button>
				
				<button class='btn btn-info' data-toggle='modal' data-target='#myModalDepaDosE'>
                    <span class='btn-label'>
                        <i class='material-icons'>language</i>
                    </span>
                    AGENTES DE ADUANAS
                </button>
				
				<button class='btn btn-warning' data-toggle='modal' data-target='#myModalDepaDosF'>
                    <span class='btn-label'>
                        <i class='material-icons'>language</i>
                    </span>
                    ADUANAS
                </button>
				
				<!--<button class='btn btn-danger' data-toggle='modal' data-target='#myModalREG'>
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
		echo"<div class='modal fade modal-mini modal-primary' id='myModalDepaMen' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                    		<div class='modal-dialog modal-small'>
                    			<div class='modal-content'>
                            <div class='modal-header'>
                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'><i class='material-icons'>clear</i></button>
                            </div>
                    				<div class='modal-body'>
									<p align='center'><b>Indicadores Mensuales</b></p>
                    					<p>
										<form method='post' action='departamentos/indicadores-mensuales/' target='_blank'>
										<input type='hidden' name='namedepaB' value='$nomdepa' >
					                    <input type='hidden' name='codedepaB' value='$codidepa' >
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
		echo"<div class='modal fade modal-mini modal-primary' id='myModalDepaUna' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                    		<div class='modal-dialog modal-small'>
                    			<div class='modal-content'>
                            <div class='modal-header'>
                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'><i class='material-icons'>clear</i></button>
                            </div>
                    				<div class='modal-body'>
									<p align='center'><b>Estacionalidad</b></p>
                    					<p>
										<form method='post' action='departamentos/indicador-anual-una-variable/' target='_blank'>
										<input type='hidden' name='namedepaC' value='$nomdepa' >
					                    <input type='hidden' name='codedepaC' value='$codidepa' >
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
				<!--<option value='cpaides'>Cantidad de Mercados</option>
                <option value='cpuedes'>Cantidad de Puertos</option>
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
		echo"<div class='modal fade modal-mini modal-primary' id='myModalDepaDos' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                    		<div class='modal-dialog modal-small'>
                    			<div class='modal-content'>
                            <div class='modal-header'>
                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'><i class='material-icons'>clear</i></button>
                            </div>
                    				<div class='modal-body'>
                    					<p>
										<form method='post' action='departamentos/evolucion-anual-dos-variables/' target='_blank'>
										<input type='hidden' name='namedepaD' value='$nomdepa' >
					                    <input type='hidden' name='codedepaD' value='$codidepa' >
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
                <option value='cadu'>Cantidad de Aduanas</option>
                <option value='provi'>Cantidad de Provincias</option>
                <option value='distri'>Cantidad de Distritos</option>
                <option value='cage'>Cantidad de Agentes</option>
                <option value='cviatra'>Cantidad de vias de Transporte</option>
                                </select>
								
								<select name='dosvaria' class='selectpicker' data-size='7' data-style='btn btn-info btn-round' required>
				<option value=''>Selecciona Variable</option>
				<option value='partidaexpo'>Partidas Exportadas</option>
                <option value='puerto'>Puertos de Ingreso</option>
                <option value='empresaexpo'>Empresas Exportadoras</option>
                <option value='pais'>Mercados Destinos</option>
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
		
		//ventana modal A
		echo"<div class='modal fade modal-mini modal-primary' id='myModalDepaDosA' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                    		<div class='modal-dialog modal-small'>
                    			<div class='modal-content'>
                            <div class='modal-header'>
                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'><i class='material-icons'>clear</i></button>
                            </div>
                    				<div class='modal-body'>
									<p align='center'><b>Partidas Exportadas</b></p>
                    					<p>
										<form method='post' action='departamentos/evolucion-anual-dos-variables/' target='_blank'>
										<input type='hidden' name='namedepaD' value='$nomdepa' >
					                    <input type='hidden' name='codedepaD' value='$codidepa' >
										<input type='hidden' name='dosvaria' value='partidaexpo' >
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
                <option value='cadu'>Cantidad de Aduanas</option>
                <option value='provi'>Cantidad de Provincias</option>
                <option value='distri'>Cantidad de Distritos</option>
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
		//fin ventana modal A
		
		//ventana modal B
		echo"<div class='modal fade modal-mini modal-primary' id='myModalDepaDosB' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                    		<div class='modal-dialog modal-small'>
                    			<div class='modal-content'>
                            <div class='modal-header'>
                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'><i class='material-icons'>clear</i></button>
                            </div>
                    				<div class='modal-body'>
									<p align='center'><b>Puertos de Ingreso</b></p>
                    					<p>
										<form method='post' action='departamentos/evolucion-anual-dos-variables/' target='_blank'>
										<input type='hidden' name='namedepaD' value='$nomdepa' >
					                    <input type='hidden' name='codedepaD' value='$codidepa' >
										<input type='hidden' name='dosvaria' value='puerto' >
										<b>Indicador</b><br>
										<select name='unavaria' class='selectpicker' data-size='7' data-style='btn btn-info btn-round' required>
                <option value=''>Selecciona Indicador</option>
				<option value='vfobserdol'>Valor FOB USD</option>
				<option value='vpesnet'>Peso Neto (Kg)</option>
                <!--<option value='diferen'>Precio FOB USD x KG</option>
                <option value='vpesbru'>Peso Bruto (Kg)</option>
                <option value='qunifis'>Cantidad Exportada</option>
                <option value='qunicom'>Unidades Comerciales</option>
                <option value='part_nandi'>Cantidad de Partidas</option>
                <option value='total'>Cantidad de Registros</option>
                <option value='ndcl'>Cantidad de Duas</option>
                <option value='dnombre'>Cantidad de Empresas</option>
				<option value='cpaides'>Cantidad de Mercados</option>
                <option value='cpuedes'>Cantidad de Puertos</option>
                <option value='cadu'>Cantidad de Aduanas</option>
                <option value='provi'>Cantidad de Provincias</option>
                <option value='distri'>Cantidad de Distritos</option>
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
		//fin ventana modal B
		
		//ventana modal C
		echo"<div class='modal fade modal-mini modal-primary' id='myModalDepaDosC' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                    		<div class='modal-dialog modal-small'>
                    			<div class='modal-content'>
                            <div class='modal-header'>
                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'><i class='material-icons'>clear</i></button>
                            </div>
                    				<div class='modal-body'>
									<p align='center'><b>Empresas Exportadoras</b></p>
                    					<p>
										<form method='post' action='departamentos/evolucion-anual-dos-variables/' target='_blank'>
										<input type='hidden' name='namedepaD' value='$nomdepa' >
					                    <input type='hidden' name='codedepaD' value='$codidepa' >
										<input type='hidden' name='dosvaria' value='empresaexpo' >
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
                <option value='ndcl'>Cantidad de Duas</option>
                <option value='dnombre'>Cantidad de Empresas</option>
				<option value='cpaides'>Cantidad de Mercados</option>
                <option value='cpuedes'>Cantidad de Puertos</option>
                <option value='cadu'>Cantidad de Aduanas</option>
                <option value='provi'>Cantidad de Provincias</option>
                <option value='distri'>Cantidad de Distritos</option>
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
		//fin ventana modal C
		
		//ventana modal D
		echo"<div class='modal fade modal-mini modal-primary' id='myModalDepaDosD' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                    		<div class='modal-dialog modal-small'>
                    			<div class='modal-content'>
                            <div class='modal-header'>
                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'><i class='material-icons'>clear</i></button>
                            </div>
                    				<div class='modal-body'>
									<p align='center'><b>Mercados de Destino</b></p>
                    					<p>
										<form method='post' action='departamentos/evolucion-anual-dos-variables/' target='_blank'>
										<input type='hidden' name='namedepaD' value='$nomdepa' >
					                    <input type='hidden' name='codedepaD' value='$codidepa' >
										<input type='hidden' name='dosvaria' value='pais' >
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
                <option value='cadu'>Cantidad de Aduanas</option>
                <option value='provi'>Cantidad de Provincias</option>
                <option value='distri'>Cantidad de Distritos</option>
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
		//fin ventana modal D
		
		//ventana modal E
		echo"<div class='modal fade modal-mini modal-primary' id='myModalDepaDosE' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                    		<div class='modal-dialog modal-small'>
                    			<div class='modal-content'>
                            <div class='modal-header'>
                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'><i class='material-icons'>clear</i></button>
                            </div>
                    				<div class='modal-body'>
									<p align='center'><b>Agente de Aduanas</b></p>
                    					<p>
										<form method='post' action='departamentos/evolucion-anual-dos-variables/' target='_blank'>
										<input type='hidden' name='namedepaD' value='$nomdepa' >
					                    <input type='hidden' name='codedepaD' value='$codidepa' >
										<input type='hidden' name='dosvaria' value='agente' >
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
                <option value='cadu'>Cantidad de Aduanas</option>
                <option value='provi'>Cantidad de Provincias</option>
                <option value='distri'>Cantidad de Distritos</option>
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
		//fin ventana modal E
		
		//ventana modal F
		echo"<div class='modal fade modal-mini modal-primary' id='myModalDepaDosF' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                    		<div class='modal-dialog modal-small'>
                    			<div class='modal-content'>
                            <div class='modal-header'>
                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'><i class='material-icons'>clear</i></button>
                            </div>
                    				<div class='modal-body'>
									<p align='center'><b>Aduanas</b></p>
                    					<p>
										<form method='post' action='departamentos/evolucion-anual-dos-variables/' target='_blank'>
										<input type='hidden' name='namedepaD' value='$nomdepa' >
					                    <input type='hidden' name='codedepaD' value='$codidepa' >
										<input type='hidden' name='dosvaria' value='aduanas' >
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
                <option value='cadu'>Cantidad de Aduanas</option>
                <option value='provi'>Cantidad de Provincias</option>
                <option value='distri'>Cantidad de Distritos</option>-->
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
		//fin ventana modal F
		
		//ventana modal 4
		/*echo"<div class='modal fade modal-mini modal-primary' id='myModalREG' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                    		<div class='modal-dialog modal-small'>
                    			<div class='modal-content'>
                            <div class='modal-header'>
                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'><i class='material-icons'>clear</i></button>
                            </div>
                    				<div class='modal-body'>
                    					<p>
										<form method='post' action='departamentos/resumen/' target='_blank'>
										<input type='hidden' name='namedepaRE' value='$nomdepa' >
					                    <input type='hidden' name='codedepaRE' value='$codidepa' >
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
