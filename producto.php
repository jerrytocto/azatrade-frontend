<?php
/*session_start();
if (isset($_SESSION['login_usuario'])){
}else{
	if(!isset($_SESSION["login_usuario"]) || $_SESSION["login_usuario"]==null){
	//print "<script>alert('Acceso invalido! - Inicia Sesion para Acceder');window.location='$enlace_actual';</script>";
	print "<script>window.location='login/';</script>";
}
}*/
$linkpage = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

$hostloca="localhost";
$usuarioloca="augeperu_trade";
$passwordloca="OYON5pPh1G-5";
$dbloca="augeperu_azatrade";
$conexpg = new mysqli($hostloca,$usuarioloca,$passwordloca,$dbloca);
$conexpg->query("SET NAMES 'utf8'");
if($conexpg === false) { 
 echo 'Ha habido un error <br>'.mysqli_connect_error(); 
}

set_time_limit(250);
$activeprodu ="active";
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

<!--<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
<link rel="stylesheet" href="css/material-dashboard.min.css?v=2.0.1">
<link rel="stylesheet" href="css/buttons.dataTables.min.css">
<link href="css/demo.css" rel="stylesheet"/> -->
<!-- <style>
.css-input { font-size:16px; border-style:solid; border-radius:25px; border-width:3px; border-color:#65adeb; padding:7px;  } 
		 .css-input:focus { outline:none; }
</style> -->
  <script>
      window.onload = detectarCarga;
      function detectarCarga(){
         document.getElementById("carga").style.display="none";
      }
    </script>
  
        </head>
        <body >
        <div class="wrapper">
      <?php //include("menuizquierdo.php"); ?>
            <div class="main-panel">
                <!-- Navbar -->
<?php //include("menusuperior.php"); ?>
<!-- End Navbar -->
                    <div class="content">
                      <div class="container-fluid">
                            <div class="row">   
      <div class="col-md-12">  
      
                <?php if(isset($_POST['btnsearch'])){ ?>
                 <div id="carga" style="width:100%;text-align: center;">
<Center><img class="img-responsive" src="img/loading-carga.gif" width="100px"><br><p style="font-size:12px; color:#EC0D36;"> Espere un momento, la consulta puede tardar unos minutos. </p></Center>
     </div>
               <?php } ?>
                
        <!-- form busqueda -->
        <div class="col-md-12">
<div class="card ">
    <div class="card-header card-header-info card-header-icon">
                        <h4 class="card-title">Seleccionar las opciones e ingresa descripci&oacute;n del producto</h4>
    </div>
    <!--<form method="post" action="<?php //echo $_SERVER['PHP_SELF']; ?>">-->
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <div class="card-body "> 
                              <div class="col-sm-12">
                                        <div class="row">
                                           <div class="col-md-4">
                                                <div class="form-group">
<?php if (isset($_SESSION['login_usuario'])){ //logeado
	if($axepago=="SI" and $axenivel=='BASICO'){//si tiene acceso
	$requiere = "";
	$reselect = "Departamentos Todos";
	}else if($axepago=="NO" and $axenivel=='BASICO'){//si no tiene acceso
	$requiere = "required";
	$reselect = "Departamentos Todos";
}else if($axenivel=='ADMIN'){//si es administrador
	$requiere = "";
	$reselect = "Departamentos Todos";
	}
}else{//sin logearse
	$requiere = "required";
	$reselect = "Departamentos Todos";
} ?>
                                                    <select name='depavalue' class='selectpicker' data-size='7' data-style='btn btn-info btn-round' title='<?=$reselect;?>' >";
                                                    
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
                                                <div class="form-group">
<select name='selecyear' class='selectpicker' data-size='7' data-style='btn btn-info btn-round' title='Selecionar Año' required>";
                <option value="2022" <?php if($_POST['selecyear']=="2022"){echo "selected";}?>>2022</option>
                <option value="2021" <?php if($_POST['selecyear']=="2021"){echo "selected";}?>>2021</option>
                <option value="2020" <?php if($_POST['selecyear']=="2020"){echo "selected";}?>>2020</option>
                <option value="2019" <?php if($_POST['selecyear']=="2019"){echo "selected";}?>>2019</option>
                <option value="2018" <?php if($_POST['selecyear']=="2018"){echo "selected";}?>>2018</option>
                <option value="2017" <?php if($_POST['selecyear']=="2017"){echo "selected";}?>>2017</option>
                <option value="2016" <?php if($_POST['selecyear']=="2016"){echo "selected";}?>>2016</option>
                <option value="2015" <?php if($_POST['selecyear']=="2015"){echo "selected";}?>>2015</option>
                <option value="2014" <?php if($_POST['selecyear']=="2014"){echo "selected";}?>>2014</option>
                <option value="2013" <?php if($_POST['selecyear']=="2013"){echo "selected";}?>>2013</option>
                <option value="2012" <?php if($_POST['selecyear']=="2012"){echo "selected";}?>>2012</option>
                    </select>
                   
                                               
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                               <?php $daa=$_POST['dato']; ?>
                                                <div class="form-group">
                                                    <input type="text" name="dato" class="form-control css-input" placeholder="Ingrese Nombre del Producto" value="<?php echo"$daa";?>" required />
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-2">
                                            <button type="submit" name="btnsearch" class="btn btn-fill btn-success">Consultar</button>
											</div>
                                       
                                        </div>
                                    </div>  
    </div>
    <!--<div class="card-footer ">
       <center>
        <button type="submit" name="btnsearch" class="btn btn-fill btn-success">Consultar <i class="material-icons">search</i></button>
        </center>
    </div>-->
    </form>
</div>
    </div>
        <!-- fin form busqueda -->
   <?php
if(isset($_REQUEST['btnsearch'])){
	
	
	$bus1=trim($_REQUEST['selecyear']);
	$bus2=trim($_REQUEST['dato']);
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
	
	echo"<p align='center'>¿ Que deseas conocer de un producto ?</p>";
		
	if($bus1!="" and $bus2!=""){//si ambos tienen datos realiza la consulta
		
		$sqlparti="SELECT
YEAR(e.fnum) AS anio,
e.part_nandi,
SUM(e.vfobserdol) as vfobx1,
SUM(e.vpesnet) as pnetox1,
SUM(e.vfobserdol) as vfob,
SUM(e.vpesnet) as pneto,
e.part_nandi as partioriginal,
e.part_nandi as parti_arancel,
substr(e.UBIGEO,1,2) AS ubigeo
FROM
exportacion e
WHERE
YEAR(e.fnum) ='$bus1' AND 
CONCAT(e.dcom,' ',e.dmer2,' ',e.dmer3,' ',e.dmer4,' ',e.DMER5) like '%$bus2%' AND
substr(e.UBIGEO,1,2) LIKE '%$bus3'
GROUP BY
anio,e.part_nandi";
		
		$querypar=$conexpg->query($sqlparti); 
if($querypar->num_rows>0){
		  echo"<div class='card'>";
		  echo"<div class='card-header card-header-info card-header-icon'>
              <div class='card-icon'>
                <i class='material-icons'>assignment</i>
              </div>
              <h4 class='card-title badge-info'><font color='#ffffff'>..:: <b>Año Consultado:</b> $bus1 | <b>Producto:</b> $bus2 | <b>Departamento:</b> $nomde  ::.. </font></h4>
            </div>";
		  echo"<div class='card-body'>
                  <div class='toolbar'>
                      <!--  Aquí puede escribir botones / acciones adicionales para la barra de herramientas  -->
                  </div>";
		  echo"<div class='material-datatables'>";
		  echo"<table id='datatables' class='table table-striped table-no-bordered table-hover' cellspacing='0' width='100%' style='width:100%'>";
		  echo"<thead>
                          <tr>
                              <th>Partida</th>
                              <th>Descripcion</th>
                              <th class='text-right'>Valor Fob</th>
                              <th class='text-right'>Peso Neto(Kg)</th>
                              <th class='text-right'>Precio Fob</th>
                              <th class='disabled-sorting text-right'>Acciones</th>
                          </tr>
                      </thead>";
		  echo"<tfoot>
                          <tr>
                              <th>Partida</th>
                              <th>Descripcion</th>
                              <th class='text-right'>Valor Fob</th>
                              <th class='text-right'>Peso Neto(Kg)</th>
                              <th class='text-right'>Precio Fob</th>
                              <th class='text-right'>Acciones</th>
                          </tr>
                      </tfoot>";
		  echo"<tbody>";
	while($fila_parti=$querypar->fetch_array()){
			  $itte = $itte + 1;
		   $originalpartida= $fila_parti['partioriginal'];
		   $partida= $fila_parti['parti_arancel'];
		   $total_vfobxx= number_format($fila_parti['vfobx1'],2);
		   $total_pesoxx= number_format($fila_parti['pnetox1'],2);
			  
		   $totalx_vfob= $fila_parti['vfob'];
		   $totalx_peso= $fila_parti['pneto'];
		   //$preciovfob= number_format($fila_parti['preciofob'],2);
			  if($total_peso == "0"){
				  $preciovfob="0.00";
				  }else{
				  $preciovfob= number_format($totalx_vfob/$totalx_peso,2);
			  }
		   $year = $fila_parti['anio'];
		   $codpartida = $fila_parti['part_nandi'];
		
		//consultanos descripcion de la partida en la tabla arancel
		$pardes = "SELECT descripcion FROM arancel WHERE idarancel='$codpartida' ";
		$querypx=$conexpg->query($pardes); 
if($querypx->num_rows>0){
		while($filapx=$querypx->fetch_array()){
			$descri_partida = $filapx['descripcion'];
		}
}else{
			$descri_partida = "---";
		}
		
		echo"<tr>";
	    echo"<td data-valor='$partida' class='click'>$partida</td>";
		echo"<td>$descri_partida</td>";
		echo "<td align='right'>$total_vfobxx</td>";
        echo "<td align='right'>$total_pesoxx</td>";
        echo "<td align='right'>$preciovfob</td>";
			  
			  if (isset($_SESSION['login_usuario'])){
				  $columnaBu = "<a href='producto/detalle/?anio=$bus1&partida=$originalpartida&descri1=$bus2&ubi=$bus3&local=$nomde' target='_blank' class='btn btn-success btn-sm' rel='tooltip' title='Ver Detalle'>Ver Detalle</a>";

				   $columnoption = "<a href='#' class='btn btn-warning btn-sm' rel='tooltip' title='Mas Opciones' data-toggle='modal' data-target='#myModalopciones$itte'>Mas Opciones</a>";
				  
			  }else{
				  
				  $columnaBu = "<a href='#' class='btn btn-success btn-sm' rel='tooltip' title='Ver Detalle' data-toggle='modal' data-target='#myModalsesionplan'>Ver Detalle</a>";
				  $columnoption = "<a href='#' class='btn btn-warning btn-sm' rel='tooltip' title='Mas Opciones' data-toggle='modal' data-target='#myModalsesionplan'>Mas Opciones</a>";
				  }
			  
		echo "<td class='text-right'>
		$columnaBu
		<!--<a href='#' rel='tooltip' title='Ver Arancel' class='btn btn-info btn-sm' data-toggle='modal' data-target='#myModalarancel$itte'>Ver Arancel</a>-->
		<a href='http://www.azatrade.info/arancel/viewpartida.php?data=$partida&t=$partida&d1=' target='_blank' rel='tooltip' title='Ver Arancel' class='btn btn-info btn-sm'>Ver Arancel</a>
		$columnoption
		
		<!--<a href='#' class='btn btn-link btn-info btn-just-icon like' rel='tooltip' title='Ver Detalle'><i class='material-icons'>favorite</i></a>
         <a href='#' class='btn btn-link btn-warning btn-just-icon edit' rel='tooltip' title='Ver Detalle'><i class='material-icons'>find_in_page</i></a>
                                  <a href='#' class='btn btn-link btn-danger btn-just-icon remove' rel='tooltip' title='Ver Detalle'><i class='material-icons'>find_in_page</i></a>-->
		</td>";
				  
		echo"</tr>";
			  //modal arancel
			  /*echo"<div class='modal fade' id='myModalarancel$itte' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                          <div class='modal-dialog'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                  <h4 class='modal-title'>Partida Arancel: <b>$partida</b></h4>
                                  <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>
                                      <i class='material-icons'>clear</i>
                                  </button>
                                </div>
                                <div class='modal-body'>
                                    <center>Datos Gestión de Partida #$partida</center>
									<p>Para ver mas detalle de esta partida, <a href='http://www.azatrade.info/arancel/viewpartida.php?data=$partida&t=$partida&d1=' target='_blank'><button type='button' class='btn btn-info btn-link'>dale click aqui</button></a>.</p>
									
                                </div>
                                <div class='modal-footer'>
                                    <button type='button'' class='btn btn-danger btn-link' data-dismiss='modal'>Cerrar</button>
                                </div>
                            </div>
                        </div>
                    	</div>";*/
			  
			  //modal mas opciones
			  /*echo"<div class='modal fade' id='myModalopciones$itte' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                          <div class='modal-dialog'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                  <h4 class='modal-title'>¿ Que deseas conocer mas de este producto ?</h4>
                                  <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>
                                      <i class='material-icons'>clear</i>
                                  </button>
                                </div>
                                <div class='modal-body'>
                                    <center>Partida #$partida</center>	
	<center>
                <form method='post' action='producto/indicadores-anuales/' target='_blank'>
				<input type='hidden' name='varipartidanalipart' value='$partida'>
				<input type='hidden' name='codubi' value='$bus3'>
				<input type='hidden' name='nomdescri' value='$bus2'>
				<input type='hidden' name='namedepa' value='$nomde'>
                <button type='submit' class='btn btn-warning'>
                    <span class='btn-label'>
                        <i class='material-icons'>spellcheck</i>
                    </span>
                    INDICADORES ANUALES
                </button>
				</form>
				
				<button class='btn btn-warning' data-toggle='modal' data-target='#estaciona$itte'><span class='btn-label'><i class='material-icons'>spellcheck</i></span> INDICADORES MENSUALES</button>
				
				<button class='btn btn-rose' data-toggle='modal' data-target='#myModalEstacio$itte'><span class='btn-label'><i class='material-icons'>spellcheck</i></span> ESTACIONALIDAD</button>
                
                <!--<form method='post' action='producto/mercados/' target='_blank'>
				<input type='hidden' name='varipartidamerca' value='$partida'>
				<input type='hidden' name='codubi' value='$bus3'>
				<input type='hidden' name='nomdescri' value='$bus2'>
				<input type='hidden' name='namedepa' value='$nomde'>
				<button type='submit' class='btn btn-success'>
                    <span class='btn-label'>
                        <i class='material-icons'>language</i>
                    </span>
                    MERCADOS
                </button>
				</form>-->
				<button class='btn btn-success' data-toggle='modal' data-target='#myModalMercaDos$itte'><span class='btn-label'><i class='material-icons'>language</i></span> MERCADOS </button>
				
				<!--<form method='post' action='producto/departamentos/' target='_blank'>
				<input type='hidden' name='varipartidaregion' value='$partida'>
				<input type='hidden' name='codubi' value='$bus3'>
				<input type='hidden' name='nomdescri' value='$bus2'>
				<input type='hidden' name='namedepa' value='$nomde'>
				<button type='submit' class='btn btn-info'>
                    <span class='btn-label'>
                        <i class='material-icons'>location_on</i>
                    </span>
                    DEPARTAMENTOS
                </button>
				</form>-->
				<button class='btn btn-info' data-toggle='modal' data-target='#myModalRegiDos$itte'><span class='btn-label'><i class='material-icons'>location_on</i></span> DEPARTAMENTOS</button>

				<!--<form method='post' action='producto/empresas/' target='_blank'>
				<input type='hidden' name='varipartidaempre' value='$partida'>
				<input type='hidden' name='codubi' value='$bus3'>
				<input type='hidden' name='nomdescri' value='$bus2'>
				<input type='hidden' name='namedepa' value='$nomde'>
				<button type='submit' class='btn btn-warning'>
                    <span class='btn-label'>
                        <i class='material-icons'>domain</i>
                    </span>
                    EMPRESAS
                </button>
				</form>-->
				<button class='btn btn-warning' data-toggle='modal' data-target='#myModalEmpDos$itte'><span class='btn-label'><i class='material-icons'>domain</i></span> EMPRESAS</button>
				
				<button class='btn btn-rose' data-toggle='modal' data-target='#myModalAgeDos$itte'><span class='btn-label'><i class='material-icons'>domain</i></span> AGENDE DE ADUANAS</button>
				
				<button class='btn btn-success' data-toggle='modal' data-target='#myModalAduDos$itte'><span class='btn-label'><i class='material-icons'>domain</i></span> ADUANAS</button>
				
				<button class='btn btn-info' data-toggle='modal' data-target='#myModalPuerDos$itte'><span class='btn-label'><i class='material-icons'>domain</i></span> PUERTOS DE INGRESO</button>
				
				<!--<a href='producto/evaluacion-de-mercados/' target='_blank' class='btn btn-primary'><span class='btn-label'><i class='material-icons'>language</i></span> EVALUACIÓN DE MERCADOS</a>-->
				
				<form method='post' action='producto/evaluacion-de-mercados/' target='_blank'>
				<input type='hidden' name='varipartidamerca' value='$partida'>
				<input type='hidden' name='codubi' value='$bus3'>
				<input type='hidden' name='nomdescri' value='$bus2'>
				<input type='hidden' name='namedepa' value='$nomde'>
								<center><button type='submit' class='btn btn-primary'> <span class='btn-label'><i class='material-icons'>language</i> EVALUACIÓN DE MERCADOS</button></center>
										</form>
				
				<!--<form method='post' action='producto/' target='_blank'>
				<input type='hidden' name='varipartidasector' value='$partida'>
                <button class='btn btn-warning'>
                    <span class='btn-label'>
                        <i class='material-icons'>flight</i>
                    </span>
                    SECTORES
                </button>
				</form>-->
				</center>
									
                                </div>
                                <div class='modal-footer'>
                                    <button type='button'' class='btn btn-danger btn-link' data-dismiss='modal'>Cerrar</button>
                                </div>
                            </div>
                        </div>
                    	</div>"; */
		
		//indicador mensual
		/*echo"<div class='modal fade modal-mini modal-primary' id='estaciona$itte' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                    		<div class='modal-dialog modal-small'>
                    			<div class='modal-content'>
                            <div class='modal-header'>
                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'><i class='material-icons'>clear</i></button>
                            </div>
                    				<div class='modal-body'>
									<p align='center'><b>Indicadores Mensuales</b><br>Partida #$partida</p>	
                    					<p>
										<form method='post' action='producto/indicador-mensual/' target='_blank'>
										<input type='hidden' name='partidaindimen' value='$partida' >
										<input type='hidden' name='codubi' value='$bus3'>
				                        <input type='hidden' name='namedepa' value='$nomde'>
										<input type='hidden' name='nomdescri' value='$bus2'>
				
										<b>Selecciona Año</b><br>
										<select name='anioim' class='select-css' required>
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
                    	</div>"; */
		
		//estacionalidad
		/* echo"<div class='modal fade modal-mini modal-primary' id='myModalEstacio$itte' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                    		<div class='modal-dialog modal-small'>
                    			<div class='modal-content'>
                            <div class='modal-header'>
                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'><i class='material-icons'>clear</i></button>
                            </div>
                    				<div class='modal-body'>
                    				<p align='center'><b>Estacionalidad</b></p>
                    					<p>
										<form method='post' action='producto/evolucion-mensual/' target='_blank'>
										<input type='hidden' name='partidaevomen' value='$partida' >
										<input type='hidden' name='codubi' value='$bus3'>
				                        <input type='hidden' name='namedepa' value='$nomde'>
										<input type='hidden' name='nomdescri' value='$bus2'>
										<b>Indicador</b><br>
										<select name='unavariaestaci' class='select-css' required>
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
                    	</div>"; */
		//mercados
		/* echo"<div class='modal fade modal-mini modal-primary' id='myModalMercaDos$itte' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                    		<div class='modal-dialog modal-small'>
                    			<div class='modal-content'>
                            <div class='modal-header'>
                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'><i class='material-icons'>clear</i></button>
                            </div>
                    				<div class='modal-body'>
                    				<p align='center'><b>Mercados</b></p>
                    					<p>
										<form method='post' action='producto/mercados/' target='_blank'>
										<input type='hidden' name='varipartidamerca' value='$partida'>
				<input type='hidden' name='codubi' value='$bus3'>
				<input type='hidden' name='nomdescri' value='$bus2'>
				<input type='hidden' name='namedepa' value='$nomde'>
										<b>Indicador</b><br>
										<select name='unavaria' class='select-css' required>
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
                    	</div>"; */
			  
		//departamentos
		/*echo"<div class='modal fade modal-mini modal-primary' id='myModalRegiDos$itte' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                    		<div class='modal-dialog modal-small'>
                    			<div class='modal-content'>
                            <div class='modal-header'>
                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'><i class='material-icons'>clear</i></button>
                            </div>
                    				<div class='modal-body'>
                    				<p align='center'><b>Departamento</b></p>
                    					<p>
										<form method='post' action='producto/departamentos/' target='_blank'>
										<input type='hidden' name='varipartidaregion' value='$partida'>
				<input type='hidden' name='codubi' value='$bus3'>
				<input type='hidden' name='nomdescri' value='$bus2'>
				<input type='hidden' name='namedepa' value='$nomde'>
										<b>Indicador</b><br>
										<select name='unavaria' class='select-css' required>
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
                    	</div>";*/
		//empresas
		/*echo"<div class='modal fade modal-mini modal-primary' id='myModalEmpDos$itte' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                    		<div class='modal-dialog modal-small'>
                    			<div class='modal-content'>
                            <div class='modal-header'>
                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'><i class='material-icons'>clear</i></button>
                            </div>
                    				<div class='modal-body'>
                    				<p align='center'><b>Empresas</b></p>
                    					<p>
										<form method='post' action='producto/empresas/' target='_blank'>
										<input type='hidden' name='varipartidaempre' value='$partida'>
				<input type='hidden' name='codubi' value='$bus3'>
				<input type='hidden' name='nomdescri' value='$bus2'>
				<input type='hidden' name='namedepa' value='$nomde'>
										<b>Indicador</b><br>
										<select name='unavaria' class='select-css' required>
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
                    	</div>";*/
		
		//agente de aduanas
		/*echo"<div class='modal fade modal-mini modal-primary' id='myModalAgeDos$itte' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                    		<div class='modal-dialog modal-small'>
                    			<div class='modal-content'>
                            <div class='modal-header'>
                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'><i class='material-icons'>clear</i></button>
                            </div>
                    				<div class='modal-body'>
                    				<p align='center'><b>Agente de Aduanas</b></p>
                    					<p>
										<form method='post' action='producto/agenteaduanas/' target='_blank'>
										<input type='hidden' name='varipartidaempre' value='$partida'>
				<input type='hidden' name='codubi' value='$bus3'>
				<input type='hidden' name='nomdescri' value='$bus2'>
				<input type='hidden' name='namedepa' value='$nomde'>
										<b>Indicador</b><br>
										<select name='unavaria' class='select-css' required>
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
                    	</div>";*/
		//aduanas
		/*echo"<div class='modal fade modal-mini modal-primary' id='myModalAduDos$itte' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                    		<div class='modal-dialog modal-small'>
                    			<div class='modal-content'>
                            <div class='modal-header'>
                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'><i class='material-icons'>clear</i></button>
                            </div>
                    				<div class='modal-body'>
                    				<p align='center'><b>Aduanas</b></p>
                    					<p>
										<form method='post' action='producto/aduanas/' target='_blank'>
										<input type='hidden' name='varipartidaempre' value='$partida'>
				<input type='hidden' name='codubi' value='$bus3'>
				<input type='hidden' name='nomdescri' value='$bus2'>
				<input type='hidden' name='namedepa' value='$nomde'>
										<b>Indicador</b><br>
										<select name='unavaria' class='select-css' required>
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
                    	</div>";*/
		//puertos de ingreso
		/*echo"<div class='modal fade modal-mini modal-primary' id='myModalPuerDos$itte' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                    		<div class='modal-dialog modal-small'>
                    			<div class='modal-content'>
                            <div class='modal-header'>
                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'><i class='material-icons'>clear</i></button>
                            </div>
                    				<div class='modal-body'>
                    				<p align='center'><b>Puertos de ingreso</b></p>
                    					<p>
										<form method='post' action='producto/puertosingreso/' target='_blank'>
										<input type='hidden' name='varipartidaempre' value='$partida'>
				<input type='hidden' name='codubi' value='$bus3'>
				<input type='hidden' name='nomdescri' value='$bus2'>
				<input type='hidden' name='namedepa' value='$nomde'>
										<b>Indicador</b><br>
										<select name='unavaria' class='select-css' required>
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
                    	</div>";*/
		
		  }
		  echo"</tbody>";
		  echo"</table>";
		  echo"</div>";
		  echo"</div>";
		  echo"</div>";
		  
	  }else{//si no encuentra datos en la busqueda muestra mensaje
echo"<div class='alert alert-danger alert-with-icon' data-notify='container'>
                    <i class='material-icons' data-notify='icon'>notifications</i>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <i class='material-icons'>close</i>
                    </button>
                    <span data-notify='message'>No se encontraron datos en la busqueda realizada. Vuelva a consultar.</span>
                </div>";
	  }
		
	}else{//fin si ambos tienen datos realiza la consulta, si no tiene datos de busqueda muestra mensaje
		echo"<div class='alert alert-warning alert-with-icon' data-notify='container'>
                    <i class='material-icons' data-notify='icon'>notifications</i>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <i class='material-icons'>close</i>
                    </button>
                    <span data-notify='message'>Campos Vacios. Para realizar una busqueda ingrese datos en los campos de consulta.</span>
                </div>";
		}
	
		  }
		  ?>
      </div> <!-- end col-md-12 -->
  </div> <!-- end row -->

                      </div>
                    </div>
<!-- small modal -->
                        <!--<div class="modal fade modal-mini modal-primary" id="myModalalertproduc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    		<div class="modal-dialog modal-small">
                    			<div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
                            </div>
                    				<div class="modal-body">
                    					<p>Para mostrar informacion debes de realiza una consulta y luego selecciona una partida</p>
                    				</div>
                            <div class="modal-footer justify-content-center">
                            </div>
                    			</div>
                    		</div>
                    	</div> -->
                        <!--    end small modal -->
                        
                        
                        <!-- <div class='modal fade' id='myModalsesionplan' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
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
                                    Para ver más opciones <a href="registro/">registrate AQUI</a>, si ya estas registrado <a href="login/">ingresa AQUI</a>.
									
                                </div>
                                <div class='modal-footer'>
                                    <button type='button' class='btn btn-danger btn-link' data-dismiss='modal'>Cerrar</button>
                                </div>
                            </div>
                        </div>
                    	</div> -->

                        
                    <?php include("footer.php"); ?>

            </div>
        </div>
    </body>

<?php //include("js.php"); ?>

<script type="text/javascript">
$(document).ready(function() {
    $('#datatables').DataTable({
		"order": [[ 2, "desc" ]],
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
