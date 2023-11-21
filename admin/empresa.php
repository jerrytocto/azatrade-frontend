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
$activeempre ="active";
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
<script type="text/javascript">
var parametro;
function popup()
{
parametro = window.open("buscarempresa.php","","width=500, height=450 top=150,left=450,directories=NO,location=no,addressbar=NO,scrollbars=NO,menubar=NO,titlebar= NO,status=NO,toolbar=NO");
parametro.document.getelementbyid('1').value= "num";
parametro.document.getelementbyid('2').value= "nome";
}
</script>
 
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
        
        <div class="row">
        <!-- form busqueda -->
        <div class="col-md-12">
<div class="card ">
    <div class="card-header card-header-info card-header-icon">
    <div class="card-icon">
                          <i class="material-icons">search</i>
                        </div>
                        <h4 class="card-title">Datos de la Empresa</h4>
    </div>
    <!--<form method="post" name="data" action="<?php echo "$linkpage"; ?>">-->
    <form method="post" name="data" action="<?php echo $_SERVER['PHP_SELF'] ?>">
    <div class="card-body "> 
                              <div class="col-sm-12">
                                        <div class="row">
                                         
                                         <div class="col-md-12">
                    <div class="form-group">
                      <?php if (isset($_SESSION['login_usuario'])){ ?>
                      <a class="btn btn-info" rel="tooltip" title="Buscar Empresa" onClick="popup()"><i class='material-icons'>find_in_page</i> Buscar por Nomnbre/Ruc</a>
                      <?php }else{ ?>
                      <a class="btn btn-info" rel="tooltip" title="Buscar Empresa" data-toggle='modal' data-target='#myModalA'><i class='material-icons'>find_in_page</i> Buscar por Nombre/Ruc </a>
                      <?php } ?>
                    </div>
                  </div>
                                         
                                          <div class="col-md-3">
                                                <div class="form-group">
<?php if (isset($_SESSION['login_usuario'])){ //logeado
	if($axepago=="SI" and $axenivel=='BASICO'){//si tiene acceso
	$requiere = "";
	$reselect = "Seleccione Todos";
	}else if($axepago=="NO" and $axenivel=='BASICO'){//si no tiene acceso
	$requiere = "required";
	$reselect = "Seleccione Departamento";
}else if($axenivel=='ADMIN'){//si es administrador
	$requiere = "";
	$reselect = "Seleccione Todos";
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
                                            
                                            <div class="col-md-2">
                    <div class="form-group">
                      <input type="text" name="empresa" class="form-control css-input" placeholder="Ingrese N# Ruc" required>
                    </div>
                  </div>
                                            <div class="col-md-3">
                    <div class="form-group">
                      <input type="text" name="nomempresa" class="form-control css-input" placeholder="Razon Social" readonly>
                    </div>
                  </div>
                                           
                                           
                                            
                                            <div class="col-md-4">
                                            <?php if (isset($_SESSION['login_usuario'])){ 
	
	 echo"<button type='submit' name='btnsearchempre' class='btn btn-fill btn-success'>Consultar <i class='material-icons'>search</i></button>";
	
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
                                            <a class='btn btn-danger' data-toggle='modal' data-target='#myModalEMP' style="color: #FFFFFF"><span class='btn-label'><i class='material-icons'>language</i></span> RESUMEN</a>
                                            <?php }else if($_SESSION['rol']=='ADMIN'){ ?>
                                            <a class='btn btn-danger' data-toggle='modal' data-target='#myModalEMP' style="color: #FFFFFF"><span class='btn-label'><i class='material-icons'>language</i></span> RESUMEN</a>
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
        
        <!-- form resumen empresa -->
        <!--<div class="col-md-6">
<div class="card ">
    <div class="card-header card-header-warning card-header-icon">
    <div class="card-icon">
                          <i class="material-icons">line_weight</i>
                        </div>
                        <h4 class="card-title">Resumen General de Empresas</h4>
    </div>
    <form method='post' action='empresa/resumen/' target='_blank'>
    <div class="card-body "> 
                              <div class="col-sm-12">
                                        <div class="row">
                                            
                                            <div class="col-md-7">
                    <div class="form-group">
                      <select name='condiciona' class='selectpicker' data-size='7' data-style='btn btn-info btn-round' required>
                <option value=''>Seleccionar Variable</option>
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
        <!-- fin form resumen empresa -->
        </div>
        
        <div class='modal fade modal-mini modal-primary' id='myModalEMP' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                    		<div class='modal-dialog modal-small'>
                    			<div class='modal-content'>
                            <div class='modal-header'>
                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'><i class='material-icons'>clear</i></button>
                            </div>
                    				<div class='modal-body'>
                    					<p>
                    					<?php if($_SESSION['rol']=='ADMIN'){ ?>
                    					<form method='post' action='empresa/resumen/admin_index.php' target='_blank'>
                    					<?php }else{ ?>
										<form method='post' action='empresa/resumen/' target='_blank'>
										<?php } ?>
										<input type='hidden' name='namempE' value='$nom_empre' >
					                    <input type='hidden' name='codempE' value='$codruc' >
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
if(isset($_REQUEST['btnsearchempre'])){
	
	$empresa=trim($_REQUEST['empresa']);
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
	
	if($empresa!=""){//si tiene datos realiza la consulta

		//++++++++++++++++++++++
	$sqlpais = "SELECT exportacion.ndoc, exportacion.dnombre FROM exportacion  WHERE exportacion.dnombre <> '' AND exportacion.ndoc ='".$empresa."' GROUP BY exportacion.ndoc, exportacion.dnombre";
	/*$rs_me = pg_query($sqlpais) or die("Error en la Consulta SQL");
	  $numReg_pais = pg_num_rows($rs_me);
	  if($numReg_pais>0){
		  while ($filapais=pg_fetch_array($rs_me)) {*/
		$rs_me=$conexpg->query($sqlpais); 
if($rs_me->num_rows>0){ 
while($filapais=$rs_me->fetch_array()){
	
			  $codruc = $filapais['ndoc'];
			  $nom_empre = $filapais['dnombre'];
		  }
	  }
		echo"<div class='col-md-12'>
        <div class='card'>
            <div class='card-body'>
                <h4 class='card-title'>
                    <a href='#'>Datos de la Empresa</a>
                </h4>
                <div class='card-description'>
                    <b>RUC :</b> $codruc <br>
					<b>EMPRESA :</b> $nom_empre <br>
					<b>DEPARTAMENTO :</b> $nomde <br>
					<p align='center'>¿ De esta empresa que más deseas conocer ?</p>
                </div>
				
				<div class='row'>
				
					<form method='post' action='empresa/indicadores-anuales/' target='_blank'>
					<input type='hidden' name='namempA' value='$nom_empre' >
					<input type='hidden' name='codempA' value='$codruc' >
					<input type='hidden' name='codubi' value='$bus3'>
				    <input type='hidden' name='namedepa' value='$nomde'>
					<button type='submit' class='btn btn-warning'>
                    <span class='btn-label'>
                        <i class='material-icons'>language</i>
                    </span>
                    INDICADORES ANUALES
                </button>
				</form>
				
				
				<button class='btn btn-rose' data-toggle='modal' data-target='#myModalEmpreMen'>
                    <span class='btn-label'>
                        <i class='material-icons'>language</i>
                    </span>
                    INDICADORES MENSUALES
                </button>

                <button class='btn btn-success' data-toggle='modal' data-target='#myModalEmpreUna'>
                    <span class='btn-label'>
                        <i class='material-icons'>language</i>
                    </span>
                    ESTACIONALIDAD
                </button>
                
                <!--<button class='btn btn-info' data-toggle='modal' data-target='#myModalEmpreDos'>
                    <span class='btn-label'>
                        <i class='material-icons'>language</i>
                    </span>
                    REPORTES DE:
                </button>-->
				
				<button class='btn btn-info' data-toggle='modal' data-target='#myModalEmpre3'>
                    <span class='btn-label'>
                        <i class='material-icons'>language</i>
                    </span>
                    PARTIDAS EXPORTADAS
                </button>
				
				<button class='btn btn-warning' data-toggle='modal' data-target='#myModalEmpre4'>
                    <span class='btn-label'>
                        <i class='material-icons'>language</i>
                    </span>
                    PUERTOS DE INGRESO
                </button>
				
				<button class='btn btn-rose' data-toggle='modal' data-target='#myModalEmpre5'>
                    <span class='btn-label'>
                        <i class='material-icons'>language</i>
                    </span>
                    MERCADOS DESTINOS
                </button>
				
				<button class='btn btn-success' data-toggle='modal' data-target='#myModalEmpre6'>
                    <span class='btn-label'>
                        <i class='material-icons'>language</i>
                    </span>
                    DEPARTAMENTOS
                </button>
				
				<button class='btn btn-info' data-toggle='modal' data-target='#myModalEmpre7'>
                    <span class='btn-label'>
                        <i class='material-icons'>language</i>
                    </span>
                    AGENTE DE ADUANAS
                </button>
				
				<button class='btn btn-warning' data-toggle='modal' data-target='#myModalEmpre8'>
                    <span class='btn-label'>
                        <i class='material-icons'>language</i>
                    </span>
                    ADUANAS
                </button>
				
				<!--<button class='btn btn-danger' data-toggle='modal' data-target='#myModalEMP'>
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
		echo"<div class='modal fade modal-mini modal-primary' id='myModalEmpreMen' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                    		<div class='modal-dialog modal-small'>
                    			<div class='modal-content'>
                            <div class='modal-header'>
                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'><i class='material-icons'>clear</i></button>
                            </div>
                    				<div class='modal-body'>
									<p align='center'><b>Indicadores Mensuales</b></p>
                    					<p>
										<form method='post' action='empresa/indicadores-mensuales/' target='_blank'>
										<input type='hidden' name='namempB' value='$nom_empre' >
					                    <input type='hidden' name='codempB' value='$codruc' >
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
		echo"<div class='modal fade modal-mini modal-primary' id='myModalEmpreUna' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                    		<div class='modal-dialog modal-small'>
                    			<div class='modal-content'>
                            <div class='modal-header'>
                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'><i class='material-icons'>clear</i></button>
                            </div>
                    				<div class='modal-body'>
									<p align='center'><b>Estacionalidad</b></p>
                    					<p>
										<form method='post' action='empresa/indicador-anual-una-variable/' target='_blank'>
										<input type='hidden' name='namempC' value='$nom_empre' >
					                    <input type='hidden' name='codempC' value='$codruc' >
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
                <option value='cpaides'>Cantidad de Mercados</option>
                <!--<option value='cpuedes'>Cantidad de Puertos</option>
                <option value='cadu'>Cantidad de Aduanas</option>
                <option value='depa'>Cantidad de Departamentos</option>
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
		//fin ventana modal 2
		
		//ventana modal 3
		echo"<div class='modal fade modal-mini modal-primary' id='myModalEmpreDos' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                    		<div class='modal-dialog modal-small'>
                    			<div class='modal-content'>
                            <div class='modal-header'>
                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'><i class='material-icons'>clear</i></button>
                            </div>
                    				<div class='modal-body'>
                    					<p>
										<form method='post' action='empresa/evolucion-anual-dos-variables/' target='_blank'>
										<input type='hidden' name='namempD' value='$nom_empre' >
					                    <input type='hidden' name='codempD' value='$codruc' >
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
                <option value='cpuedes'>Cantidad de Puertos</option>
                <option value='cadu'>Cantidad de Aduanas</option>
                <option value='depa'>Cantidad de Departamentos</option>
                <option value='provi'>Cantidad de Provincias</option>
                <option value='distri'>Cantidad de Distritos</option>
                <option value='cage'>Cantidad de Agentes</option>
                <option value='cviatra'>Cantidad de vias de Transporte</option>
                                </select>
								
								<select name='dosvaria' class='selectpicker' data-size='7' data-style='btn btn-info btn-round' required>
				<option value=''>Selecciona Variable</option>
				<option value='partidaexpo'>Partidas Exportadas</option>
                <option value='puerto'>Puertos de Ingreso</option>
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
		
		//ventana modal 3
		echo"<div class='modal fade modal-mini modal-primary' id='myModalEmpre3' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                    		<div class='modal-dialog modal-small'>
                    			<div class='modal-content'>
                            <div class='modal-header'>
                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'><i class='material-icons'>clear</i></button>
                            </div>
                    				<div class='modal-body'>
									<p align='center'><b>Partidas Exporadas</b></p>
                    					<p>
										<form method='post' action='empresa/evolucion-anual-dos-variables/' target='_blank'>
										<input type='hidden' name='namempD' value='$nom_empre' >
					                    <input type='hidden' name='codempD' value='$codruc' >
										<input type='hidden' name='codubi' value='$bus3'>
				                        <input type='hidden' name='namedepa' value='$nomde'>
										<input type='hidden' name='dosvaria' value='partidaexpo'>
										<b>Indicadores</b><br>
										<select name='unavaria' class='selectpicker' data-size='7' data-style='btn btn-info btn-round' required>
                <option value=''>Selecciona Indicador</option>
				<option value='vfobserdol'>Valor FOB USD</option>
				<option value='vpesnet'>Peso Neto (Kg)</option>
                <option value='diferen'>Precio FOB USD x KG</option>
                <!--<option value='vpesbru'>Peso Bruto (Kg)</option>
                <option value='qunifis'>Cantidad Exportada</option>
                <option value='qunicom'>Unidades Comerciales</option>-->
                <!--<option value='part_nandi'>Cantidad de Partidas</option>-->
				<option value='cpaides'>Cantidad de Mercados</option>
                 <!--<option value='total'>Cantidad de Registros</option>
                <option value='ndcl'>Cantidad de Duas</option>
                <option value='dnombre'>Cantidad de Empresas</option>
                <option value='cpuedes'>Cantidad de Puertos</option>
                <option value='cadu'>Cantidad de Aduanas</option>
                <option value='depa'>Cantidad de Departamentos</option>
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
		//fin ventana modal 3
		
		//ventana modal 4
		echo"<div class='modal fade modal-mini modal-primary' id='myModalEmpre4' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                    		<div class='modal-dialog modal-small'>
                    			<div class='modal-content'>
                            <div class='modal-header'>
                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'><i class='material-icons'>clear</i></button>
                            </div>
                    				<div class='modal-body'>
									<p align='center'><b>Puertos de Ingreso</b></p>
                    					<p>
										<form method='post' action='empresa/evolucion-anual-dos-variables/' target='_blank'>
										<input type='hidden' name='namempD' value='$nom_empre' >
					                    <input type='hidden' name='codempD' value='$codruc' >
										<input type='hidden' name='codubi' value='$bus3'>
				                        <input type='hidden' name='namedepa' value='$nomde'>
										<input type='hidden' name='dosvaria' value='puerto'>
										<b>Indicadores</b><br>
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
                <option value='dnombre'>Cantidad de Empresas</option>-->
                <!--<option value='cpuedes'>Cantidad de Puertos</option>-->
                <!--<option value='cadu'>Cantidad de Aduanas</option>
                <option value='depa'>Cantidad de Departamentos</option>
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
		//fin ventana modal 4
		
		//ventana modal 5
		echo"<div class='modal fade modal-mini modal-primary' id='myModalEmpre5' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                    		<div class='modal-dialog modal-small'>
                    			<div class='modal-content'>
                            <div class='modal-header'>
                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'><i class='material-icons'>clear</i></button>
                            </div>
                    				<div class='modal-body'>
									<p align='center'><b>Mercados de Destinos</b></p>
                    					<p>
										<form method='post' action='empresa/evolucion-anual-dos-variables/' target='_blank'>
										<input type='hidden' name='namempD' value='$nom_empre' >
					                    <input type='hidden' name='codempD' value='$codruc' >
										<input type='hidden' name='codubi' value='$bus3'>
				                        <input type='hidden' name='namedepa' value='$nomde'>
										<input type='hidden' name='dosvaria' value='pais'>
										<b>Indicadores</b><br>
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
                <option value='cpuedes'>Cantidad de Puertos</option>
                <option value='cadu'>Cantidad de Aduanas</option>
                <option value='depa'>Cantidad de Departamentos</option>
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
		//fin ventana modal 5
		
		//ventana modal 6
		echo"<div class='modal fade modal-mini modal-primary' id='myModalEmpre6' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                    		<div class='modal-dialog modal-small'>
                    			<div class='modal-content'>
                            <div class='modal-header'>
                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'><i class='material-icons'>clear</i></button>
                            </div>
                    				<div class='modal-body'>
									<p align='center'><b>Departamentos</b></p>
                    					<p>
										<form method='post' action='empresa/evolucion-anual-dos-variables/' target='_blank'>
										<input type='hidden' name='namempD' value='$nom_empre' >
					                    <input type='hidden' name='codempD' value='$codruc' >
										<input type='hidden' name='codubi' value='$bus3'>
				                        <input type='hidden' name='namedepa' value='$nomde'>
										<input type='hidden' name='dosvaria' value='ubigeo'>
										<b>Indicadores</b><br>
										<select name='unavaria' class='selectpicker' data-size='7' data-style='btn btn-info btn-round' required>
                <option value=''>Selecciona Indicador</option>
				<option value='vfobserdol'>Valor FOB USD</option>
				<option value='vpesnet'>Peso Neto (Kg)</option>
                <option value='diferen'>Precio FOB USD x KG</option>
                <!--<option value='vpesbru'>Peso Bruto (Kg)</option>
                <option value='qunifis'>Cantidad Exportada</option>
                <option value='qunicom'>Unidades Comerciales</option>-->
                <option value='part_nandi'>Cantidad de Partidas</option>
				<option value='cpaides'>Cantidad de Mercados</option>
                <!--<option value='total'>Cantidad de Registros</option>
                <option value='ndcl'>Cantidad de Duas</option>
                <option value='dnombre'>Cantidad de Empresas</option>
                <option value='cpuedes'>Cantidad de Puertos</option>
                <option value='cadu'>Cantidad de Aduanas</option>-->
                <!--<option value='depa'>Cantidad de Departamentos</option>
                <option value='provi'>Cantidad de Provincias</option>
                <option value='distri'>Cantidad de Distritos</option>-->
                <!--<option value='cage'>Cantidad de Agentes</option>
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
		//fin ventana modal 6
		
		//ventana modal 7
		echo"<div class='modal fade modal-mini modal-primary' id='myModalEmpre7' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                    		<div class='modal-dialog modal-small'>
                    			<div class='modal-content'>
                            <div class='modal-header'>
                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'><i class='material-icons'>clear</i></button>
                            </div>
                    				<div class='modal-body'>
									<p align='center'><b>Agente de Aduanas</b></p>
                    					<p>
										<form method='post' action='empresa/evolucion-anual-dos-variables/' target='_blank'>
										<input type='hidden' name='namempD' value='$nom_empre' >
					                    <input type='hidden' name='codempD' value='$codruc' >
										<input type='hidden' name='codubi' value='$bus3'>
				                        <input type='hidden' name='namedepa' value='$nomde'>
										<input type='hidden' name='dosvaria' value='agente'>
										<b>Indicadores</b><br>
										<select name='unavaria' class='selectpicker' data-size='7' data-style='btn btn-info btn-round' required>
                <option value=''>Selecciona Indicador</option>
				<option value='vfobserdol'>Valor FOB USD</option>
				<option value='vpesnet'>Peso Neto (Kg)</option>
                <option value='diferen'>Precio FOB USD x KG</option>
                <!--<option value='vpesbru'>Peso Bruto (Kg)</option>
                <option value='qunifis'>Cantidad Exportada</option>
                <option value='qunicom'>Unidades Comerciales</option>-->
                <option value='part_nandi'>Cantidad de Partidas</option>
				<option value='cpaides'>Cantidad de Mercados</option>
                <!--<option value='total'>Cantidad de Registros</option>
                <option value='ndcl'>Cantidad de Duas</option>
                <option value='dnombre'>Cantidad de Empresas</option>
                <option value='cpuedes'>Cantidad de Puertos</option>
                <option value='cadu'>Cantidad de Aduanas</option>
                <option value='depa'>Cantidad de Departamentos</option>
                <option value='provi'>Cantidad de Provincias</option>
                <option value='distri'>Cantidad de Distritos</option>-->
                <!--<option value='cage'>Cantidad de Agentes</option>-->
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
		//fin ventana modal 7
		
		//ventana modal 8
		echo"<div class='modal fade modal-mini modal-primary' id='myModalEmpre8' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                    		<div class='modal-dialog modal-small'>
                    			<div class='modal-content'>
                            <div class='modal-header'>
                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'><i class='material-icons'>clear</i></button>
                            </div>
                    				<div class='modal-body'>
									<p align='center'><b>Agente de Aduanas</b></p>
                    					<p>
										<form method='post' action='empresa/evolucion-anual-dos-variables/' target='_blank'>
										<input type='hidden' name='namempD' value='$nom_empre' >
					                    <input type='hidden' name='codempD' value='$codruc' >
										<input type='hidden' name='codubi' value='$bus3'>
				                        <input type='hidden' name='namedepa' value='$nomde'>
										<input type='hidden' name='dosvaria' value='aduanas'>
										<b>Indicadores</b><br>
										<select name='unavaria' class='selectpicker' data-size='7' data-style='btn btn-info btn-round' required>
                <option value=''>Selecciona Indicador</option>
				<option value='vfobserdol'>Valor FOB USD</option>
				<option value='vpesnet'>Peso Neto (Kg)</option>
                <option value='diferen'>Precio FOB USD x KG</option>
                <!--<option value='vpesbru'>Peso Bruto (Kg)</option>
                <option value='qunifis'>Cantidad Exportada</option>
                <option value='qunicom'>Unidades Comerciales</option>-->
                <option value='part_nandi'>Cantidad de Partidas</option>
				<option value='cpaides'>Cantidad de Mercados</option>
                <!--<option value='total'>Cantidad de Registros</option>
                <option value='ndcl'>Cantidad de Duas</option>
                <option value='dnombre'>Cantidad de Empresas</option>
                <option value='cpuedes'>Cantidad de Puertos</option>-->
                <!--<option value='cadu'>Cantidad de Aduanas</option>
                <option value='depa'>Cantidad de Departamentos</option>
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
		//fin ventana modal 8
		
		//ventana modal 4
		/*echo"<div class='modal fade modal-mini modal-primary' id='myModalEMP' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                    		<div class='modal-dialog modal-small'>
                    			<div class='modal-content'>
                            <div class='modal-header'>
                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'><i class='material-icons'>clear</i></button>
                            </div>
                    				<div class='modal-body'>
                    					<p>
										<form method='post' action='empresa/resumen/' target='_blank'>
										<input type='hidden' name='namempE' value='$nom_empre' >
					                    <input type='hidden' name='codempE' value='$codruc' >
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
                    	</div>";*/
		//fin ventana modal 4
		
		//++++++++++++++++++++++
		
	}else{//fin si ambos tienen datos realiza la consulta, si no tiene datos de busqueda muestra mensaje
		echo"<div class='alert alert-warning alert-with-icon' data-notify='container'>
                    <i class='material-icons' data-notify='icon'>notifications</i>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <i class='material-icons'>close</i>
                    </button>
                    <span data-notify='message'>Campo Vacio. Para realizar una busqueda de una empresa ingrese datos correctos.</span>
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
