<?php
session_start();
if (isset($_SESSION['login_usuario'])){
}else{
	if(!isset($_SESSION["login_usuario"]) || $_SESSION["login_usuario"]==null){
	//print "<script>alert('Acceso invalido! - Inicia Sesion para Acceder');window.location='$enlace_actual';</script>";
	//print "<script>window.location='index.php';</script>";
}
}
$linkpage = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
//include("incBD/inibd.php");
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
                        <h4 class="card-title">Ingrese N&uacute;mero de Partida</h4>
    </div>
    <!--<form method="post" action="<?php //echo $_SERVER['PHP_SELF']; ?>">-->
    <form method="post" action="<?php echo "$linkpage"; ?>">
    <div class="card-body "> 
                              <div class="col-sm-12">
                                        <div class="row">

                                            <div class="col-md-5">
                                               <?php $daa=$_POST['datopartida']; ?>
                                                <div class="form-group">
                                                    <input type="text" name="datopartida" class="form-control" placeholder="Ingrese N&uacute;mero de Partida" value="<?php echo"$daa";?>" required />
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-7">
                                            <button type="submit" name="btnsearchpartida" class="btn btn-fill btn-success">Consultar <i class="material-icons">search</i></button>
                                            
                                            <?php if (isset($_SESSION['login_usuario'])){ 
					                         if($pago=="SI"){?>
                                            <a class='btn btn-danger' data-toggle='modal' data-target='#myModalPartR'><span class='btn-label'><i class='material-icons'>spellcheck</i></span>RESUMEN</a>
                                            <?php }else{?>
                                            <a class='btn btn-danger' data-toggle='modal' data-target='#myModalPlan'><span class='btn-label'><i class='material-icons'>spellcheck</i></span>RESUMEN</a>
                                            <?php } }else{ ?>
                                            <a class='btn btn-danger' data-toggle='modal' data-target='#myModalsesionplan'><span class='btn-label'><i class='material-icons'>spellcheck</i></span>RESUMEN</a>
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
										<form method='post' action='partida/resumen/' target='_blank'>
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
	
	include("incBD/inibd.php");
	
	//$bus1=trim($_REQUEST['selecyear']);
	$bus2=trim($_REQUEST['datopartida']);
	
	if($bus2!=""){ //si tiene datos realiza la consulta

		
/*sumamos valorfob*/
		   $query_vfob = "SELECT 'vfobserdol' as VALOR, 
		   SUM(CASE extract(year from exportacion.fnum) WHEN '2012' THEN exportacion.vfobserdol ELSE 0 END) AS ".vfob2012.", 
		   SUM(CASE extract(year from exportacion.fnum) WHEN '2013' THEN exportacion.vfobserdol ELSE 0 END) AS ".vfob2013.", 
		   SUM(CASE extract(year from exportacion.fnum) WHEN '2014' THEN exportacion.vfobserdol ELSE 0 END) AS ".vfob2014.", 
		   SUM(CASE extract(year from exportacion.fnum) WHEN '2015' THEN exportacion.vfobserdol ELSE 0 END) AS ".vfob2015.", 
		   SUM(CASE extract(year from exportacion.fnum) WHEN '2016' THEN exportacion.vfobserdol ELSE 0 END) AS ".vfob2016.",
		   SUM(CASE extract(year from exportacion.fnum) WHEN '2017' THEN exportacion.vfobserdol ELSE 0 END) AS ".vfob2017.",
		   SUM(CASE extract(year from exportacion.fnum) WHEN '2018' THEN exportacion.vfobserdol ELSE 0 END) AS ".vfob2018.",
		   SUM(CASE extract(year from exportacion.fnum) WHEN '2019' THEN exportacion.vfobserdol ELSE 0 END) AS ".vfob2019."
		   FROM exportacion WHERE extract(year from exportacion.fnum) >= '2012' AND
extract(year from exportacion.fnum) <= '2019' AND exportacion.part_nandi='".$bus2."'";
	  /*$resultado_vfob = pg_query($query_vfob) or die("Error en la Consulta SQL");
	  $numReg_vfob = pg_num_rows($resultado_vfob);
	  if($numReg_vfob>0){
		  while ($fila_vfob=pg_fetch_array($resultado_vfob)) {*/
		$resultado_vfob=$conexpg->query($query_vfob); 
if($resultado_vfob->num_rows>0){ 
while($fila_vfob=$resultado_vfob->fetch_array()){
		  $vfob_2012= $fila_vfob['vfob2012'];
		   $vfob_2013=  $fila_vfob['vfob2013'];
		    $vfob_2014=  $fila_vfob['vfob2014'];
			 $vfob_2015=  $fila_vfob['vfob2015'];
			  $vfob_2016=  $fila_vfob['vfob2016'];
			   $vfob_2017=  $fila_vfob['vfob2017'];
			    $vfob_2018=  $fila_vfob['vfob2018'];
			  $vfob_2019=  $fila_vfob['vfob2019'];
			  
			   if($vfob_2017=='0'  or $vfob_2017 == null){
				    $var1='0.00';
			   }else{
			   $var1= number_format((($vfob_2018/$vfob_2017) - 1) * 100,2);
			   }
			   
			  if($vfob_2012=='0' or $vfob_2012 == null){
			  $ca1 ='0';
		      }else{
		      $ca1 = (($vfob_2013 / $vfob_2012) - 1) * 100;
		      }
			   if($vfob_2013=='0' or $vfob_2013 == null){
			  $ca2 ='0';
		      }else{
		      $ca2 = (($vfob_2014 / $vfob_2013) - 1) * 100;
		      }
			   if($vfob_2014=='0' or $vfob_2014 == null){
			  $ca3 ='0';
		      }else{
		      $ca3 = (($vfob_2015 / $vfob_2014) - 1) * 100;
		      }
			   if($vfob_2015=='0' or $vfob_2015 == null){
			  $ca4 ='0';
		      }else{
		      $ca4 = (($vfob_2016 / $vfob_2015) - 1) * 100;
		      }
			  if($vfob_2016=='0' or $vfob_2016 == null){
			  $ca5 ='0';
		      }else{
		      $ca5 = (($vfob_2017 / $vfob_2016) - 1) * 100;
		      }
			  if($vfob_2017=='0' or $vfob_2017 == null){
			  $ca6 ='0';
		      }else{
		      $ca6 = (($vfob_2018 / $vfob_2017) - 1) * 100;
		      }
			  if($vfob_2018=='0' or $vfob_2018 == null){
			  $ca7 ='0';
		      }else{
		      $ca7 = (($vfob_2019 / $vfob_2018) - 1) * 100;
		      }
			 
			  
			  $var2= number_format(($ca1 + $ca2 + $ca3 + $ca4 + $ca5 + $ca6)/6,2) ;

		  
		  }
	  }else{
		  $vfob_2012= "0.00";
		   $vfob_2013= "0.00";
		    $vfob_2014= "0.00";
			 $vfob_2015= "0.00";
			  $vfob_2016= "0.00";
			  $vfob_2017= "0.00";
		       $vfob_2018= "0.00";
		  $vfob_2019= "0.00";
	  }
				
/* sumamos vpesnet*/
	   $query_vpes = "SELECT 'vpesnet' as VALOR,
	   SUM(CASE extract(year from exportacion.fnum) WHEN '2012' THEN exportacion.vpesnet ELSE 0 END) AS ".vpes2012.", 
	   SUM(CASE extract(year from exportacion.fnum) WHEN '2013' THEN exportacion.vpesnet ELSE 0 END) AS ".vpes2013.", 
	   SUM(CASE extract(year from exportacion.fnum) WHEN '2014' THEN exportacion.vpesnet ELSE 0 END) AS ".vpes2014.", 
	   SUM(CASE extract(year from exportacion.fnum) WHEN '2015' THEN exportacion.vpesnet ELSE 0 END) AS ".vpes2015.", 
	   SUM(CASE extract(year from exportacion.fnum) WHEN '2016' THEN exportacion.vpesnet ELSE 0 END) AS ".vpes2016.",
	   SUM(CASE extract(year from exportacion.fnum) WHEN '2017' THEN exportacion.vpesnet ELSE 0 END) AS ".vpes2017.",
	   SUM(CASE extract(year from exportacion.fnum) WHEN '2018' THEN exportacion.vpesnet ELSE 0 END) AS ".vpes2018.",
	   SUM(CASE extract(year from exportacion.fnum) WHEN '2019' THEN exportacion.vpesnet ELSE 0 END) AS ".vpes2019." FROM exportacion where extract(year from exportacion.fnum) >= '2012' AND
extract(year from exportacion.fnum) <= '2019' AND exportacion.part_nandi='".$bus2."'";
	  /*$resultado_vpes = pg_query($query_vpes) or die("Error en la Consulta SQL");
	  $numReg_vpes = pg_num_rows($resultado_vpes);
	  if($numReg_vpes>0){
		  while ($fila_vpes=pg_fetch_array($resultado_vpes)) {*/
		$resultado_vpes=$conexpg->query($query_vpes); 
if($resultado_vpes->num_rows>0){ 
while($fila_vpes=$resultado_vpes->fetch_array()){
		  $vpes_2012=  $fila_vpes['vpes2012'];
		   $vpes_2013=  $fila_vpes['vpes2013'];
		    $vpes_2014=  $fila_vpes['vpes2014'];
			 $vpes_2015=  $fila_vpes['vpes2015'];
			  $vpes_2016= $fila_vpes['vpes2016'];
			  $vpes_2017= $fila_vpes['vpes2017'];
			  $vpes_2018= $fila_vpes['vpes2018'];
			  $vpes_2019= $fila_vpes['vpes2019'];

			  if($vpes_2017=='0' or $vpes_2017== null){
				 $var3="0"; 
			  }else{
$var3= number_format((($vpes_2018/$vpes_2017) - 1) * 100,2);
				  }
			   
			  if($vpes_2012=='0' or $vpes_2012== null){
			  $ca1x ='0';
		      }else{
		      $ca1x = (($vpes_2013 / $vpes_2012) - 1) * 100;
		      }
			   if($vpes_2013=='0' or $vpes_2013==null){
			  $ca2x ='0';
		      }else{
		      $ca2x = (($vpes_2014 / $vpes_2013) - 1) * 100;
		      }
			   if($vpes_2014=='0' or $vpes_2014==null){
			  $ca3x ='0';
		      }else{
		      $ca3x = (($vpes_2015 / $vpes_2014) - 1) * 100;
		      }
			   if($vpes_2015=='0' or $vpes_2015==null){
			  $ca4x ='0';
		      }else{
		      $ca4x = (($vpes_2016 / $vpes_2015) - 1) * 100;
		      }
			  if($vpes_2016=='0' or $vpes_2016==null){
			  $ca5x ='0';
		      }else{
		      $ca5x = (($vpes_2017 / $vpes_2016) - 1) * 100;
		      }
			  if($vpes_2017=='0' or $vpes_2017==null){
			  $ca6x ='0';
		      }else{
		      $ca6x = (($vpes_2018 / $vpes_2017) - 1) * 100;
		      }
			  if($vpes_2018=='0' or $vpes_2018==null){
			  $ca7x ='0';
		      }else{
		      $ca7x = (($vpes_2019 / $vpes_2018) - 1) * 100;
		      }
			 
			  
			  $var4= number_format(($ca1x + $ca2x + $ca3x + $ca4x + $ca5x + $ca6x)/6,2) ;
		  
		  }
	  }else{
		  $vpes_2012= "0.00";
		   $vpes_2013= "0.00";
		    $vpes_2014= "0.00";
			 $vpes_2015= "0.00";
			  $vpes_2016= "0.00";
			  $vpes_2017= "0.00";
		       $vpes_2018= "0.00";
		  $vpes_2019= "0.00";
	  }
				
/*diferencia Precio FOB USD x KG*/
				if($vpes_2012=="0" or $vpes_2012==null or $vpes_2012==""){
					$preciofob2012 = "0";
					}else{
		$preciofob2012 = $vfob_2012 / $vpes_2012;
					}
		if($vpes_2013=='0' or $vpes_2013==null or $vpes_2013=="")	{
			$preciofob2013 = "0";
		}else{
		$preciofob2013 = $vfob_2013 / $vpes_2013;
			}
		
		if($vpes_2014=='0' or $vpes_2014==null or $vpes_2014==''){
			$preciofob2014 = "0";
		}else{
		$preciofob2014 = $vfob_2014 / $vpes_2014;
			}
		
		if($vpes_2015=='0' or $vpes_2015==null or $vpes_2015==''){
			$preciofob2015 ="0";
		}else{
		$preciofob2015 = $vfob_2015 / $vpes_2015;
			}
		
		if($vpes_2016=='0' or $vpes_2016==null or $vpes_2016==''){
			$preciofob2016 = "0";
		}else{
		$preciofob2016 = $vfob_2016 / $vpes_2016;
			}
			
		if($vpes_2017=='0' or $vpes_2017==null or $vpes_2017==''){
			$preciofob2017 = "0";
		}else{
		$preciofob2017 = $vfob_2017 / $vpes_2017;
			}
		
		if($vpes_2018=='0' or $vpes_2018==null or $vpes_2018==''){
			$preciofob2018 = "0";
		}else{
		$preciofob2018 = $vfob_2018 / $vpes_2018;
			}
		
		if($vpes_2019=='0' or $vpes_2019==null or $vpes_2019==''){
			$preciofob2019 = "0";
		}else{
		$preciofob2019 = $vfob_2019 / $vpes_2019;
			}
		
				// lista
		if($preciofob2017=='0'){
			$var5='0';
		}else{
		$var5= number_format((($preciofob2018/$preciofob2017) - 1) * 100,2);
			}
		if($preciofob2012=='0'){
			  $ca1_1 ='0';
		      }else{
		      $ca1_1 = (($preciofob2013 / $preciofob2012) - 1) * 100;
		      }
			   if($preciofob2013=='0'){
			  $ca2_1 ='0';
		      }else{
		      $ca2_1 = (($preciofob2014 / $preciofob2013) - 1) * 100;
		      }
			   if($preciofob2014=='0'){
			  $ca3_1 ='0';
		      }else{
		      $ca3_1 = (($preciofob2015 / $preciofob2014) - 1) * 100;
		      }
			   if($preciofob2015=='0'){
			  $ca4_1 ='0';
		      }else{
		      $ca4_1 = (($preciofob2016 / $preciofob2015) - 1) * 100;
		      }
			  if($preciofob2016=='0'){
			  $ca5_1 ='0';
		      }else{
		      $ca5_1 = (($preciofob2017 / $preciofob2016) - 1) * 100;
		      }
			  if($preciofob2017=='0'){
			  $ca6_1 ='0';
		      }else{
		      $ca6_1 = (($preciofob2018 / $preciofob2017) - 1) * 100;
		      }
		if($preciofob2018=='0'){
			  $ca7_1 ='0';
		      }else{
		      $ca7_1 = (($preciofob2019 / $preciofob2018) - 1) * 100;
		      }
			  
			   $var6= number_format(($ca1_1 + $ca2_1 + $ca3_1 + $ca4_1 + $ca5_1 + $ca6_1)/6,2) ;
				
/*suma precio bruto*/
		  $query_vbru = "SELECT 'preciobruto' as VALOR, 
		  SUM(CASE extract(year from exportacion.fnum) WHEN '2012' THEN exportacion.vpesbru ELSE 0 END) AS ".vpb2012.", 
		  SUM(CASE extract(year from exportacion.fnum) WHEN '2013' THEN exportacion.vpesbru ELSE 0 END) AS ".vpb2013.", 
		  SUM(CASE extract(year from exportacion.fnum) WHEN '2014' THEN exportacion.vpesbru ELSE 0 END) AS ".vpb2014.", 
		  SUM(CASE extract(year from exportacion.fnum) WHEN '2015' THEN exportacion.vpesbru ELSE 0 END) AS ".vpb2015.", 
		  SUM(CASE extract(year from exportacion.fnum) WHEN '2016' THEN exportacion.vpesbru ELSE 0 END) AS ".vpb2016.",
		  SUM(CASE extract(year from exportacion.fnum) WHEN '2017' THEN exportacion.vpesbru ELSE 0 END) AS ".vpb2017.",
		  SUM(CASE extract(year from exportacion.fnum) WHEN '2018' THEN exportacion.vpesbru ELSE 0 END) AS ".vpb2018.",
		  SUM(CASE extract(year from exportacion.fnum) WHEN '2019' THEN exportacion.vpesbru ELSE 0 END) AS ".vpb2019." FROM exportacion where extract(year from exportacion.fnum) >= '2012' AND
extract(year from exportacion.fnum) <= '2019' AND exportacion.part_nandi='".$bus2."'";
	  /*$resultado_vbru = pg_query($query_vbru) or die("Error en la Consulta SQL");
	  $numReg_vbru = pg_num_rows($resultado_vbru);
	  if($numReg_vbru>0){
		  while ($fila_vbru=pg_fetch_array($resultado_vbru)) {*/
		$resultado_vbru=$conexpg->query($query_vbru); 
if($resultado_vbru->num_rows>0){ 
while($fila_vbru=$resultado_vbru->fetch_array()){
		  $vbru_2012= $fila_vbru['vpb2012'];
		   $vbru_2013= $fila_vbru['vpb2013'];
		    $vbru_2014= $fila_vbru['vpb2014'];
			 $vbru_2015= $fila_vbru['vpb2015'];
			  $vbru_2016= $fila_vbru['vpb2016'];
			  $vbru_2017= $fila_vbru['vpb2017'];
			  $vbru_2018= $fila_vbru['vpb2018'];
			  $vbru_2019= $fila_vbru['vpb2019'];

			  if($vbru_2017=='0' or $vbru_2017==null or $vbru_2017==''){
				$var7="0";  
			  }else{
                $var7= number_format((($vbru_2018/$vbru_2017) - 1) * 100,2);
				  }
			   
			  if($vbru_2012=='0' or $vbru_2012==null or $vbru_2012==''){
			  $ca1_x ='0';
		      }else{
		      $ca1_x = (($vbru_2013 / $vbru_2012) - 1) * 100;
		      }
			  
			   if($vbru_2013=='0' or $vbru_2013==null or $vbru_2013==''){
			  $ca2_x ='0';
		      }else{
		      $ca2_x = (($vbru_2014 / $vbru_2013) - 1) * 100;
		      }
			  
			   if($vbru_2014=='0' or $vbru_2014==null or $vbru_2014==''){
			  $ca3_x ='0';
		      }else{
		      $ca3_x = (($vbru_2015 / $vbru_2014) - 1) * 100;
		      }
			  
			   if($vbru_2015=='0' or $vbru_2015==null or $vbru_2015==''){
			  $ca4_x ='0';
		      }else{
		      $ca4_x = (($vbru_2016 / $vbru_2015) - 1) * 100;
		      }
			  
			  if($vbru_2016=='0' or $vbru_2016==null or $vbru_2016==''){
			  $ca5_x ='0';
		      }else{
		      $ca5_x = (($vbru_2017 / $vbru_2016) - 1) * 100;
		      }
			  
			  if($vbru_2017=='0' or $vbru_2017==null or $vbru_2017==''){
			  $ca6_x ='0';
		      }else{
		      $ca6_x = (($vbru_2018 / $vbru_2017) - 1) * 100;
		      }
			  
			  if($vbru_2018=='0' or $vbru_2018==null or $vbru_2018==''){
			  $ca7_x ='0';
		      }else{
		      $ca7_x = (($vbru_2019 / $vbru_2018) - 1) * 100;
		      }
			 
			  
			  $var8= number_format(($ca1_x + $ca2_x + $ca3_x + $ca4_x + $ca5_x + $ca6_x)/6,2) ;
		  
		  }
	  }else{
		  $vbru_2012= "0.00";
		   $vbru_2013= "0.00";
		    $vbru_2014= "0.00";
			 $vbru_2015= "0.00";
			  $vbru_2016= "0.00";
			  $vbru_2017= "0.00";
		       $vbru_2018= "0.00";
		  $vbru_2019= "0.00";
	  }
				
/*sumamos cantidad exportada*/  
	  $query_qunifis = "SELECT 'preciobruto' as VALOR, 
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2012' THEN exportacion.qunifis ELSE 0 END) AS ".quni2012.", 
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2013' THEN exportacion.qunifis ELSE 0 END) AS ".quni2013.", 
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2014' THEN exportacion.qunifis ELSE 0 END) AS ".quni2014.", 
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2015' THEN exportacion.qunifis ELSE 0 END) AS ".quni2015.", 
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2016' THEN exportacion.qunifis ELSE 0 END) AS ".quni2016.",
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2017' THEN exportacion.qunifis ELSE 0 END) AS ".quni2017.",
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2018' THEN exportacion.qunifis ELSE 0 END) AS ".quni2018.",
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2019' THEN exportacion.qunifis ELSE 0 END) AS ".quni2019." FROM exportacion where extract(year from exportacion.fnum) >= '2012' AND
extract(year from exportacion.fnum) <= '2019' AND exportacion.part_nandi='".$bus2."'";
	  /*$resultado_qunifis = pg_query($query_qunifis) or die("Error en la Consulta SQL");
	  $numReg_qunifis = pg_num_rows($resultado_qunifis);
	  if($numReg_qunifis>0){
		  while ($fila_qunifis=pg_fetch_array($resultado_qunifis)) {*/
		$resultado_qunifis=$conexpg->query($query_qunifis); 
if($resultado_qunifis->num_rows>0){ 
while($fila_qunifis=$resultado_qunifis->fetch_array()){
		  $qunifis_2012= $fila_qunifis['quni2012'];
		   $qunifis_2013= $fila_qunifis['quni2013'];
		    $qunifis_2014= $fila_qunifis['quni2014'];
			 $qunifis_2015= $fila_qunifis['quni2015'];
			  $qunifis_2016= $fila_qunifis['quni2016'];
			  $qunifis_2017= $fila_qunifis['quni2017'];
			  $qunifis_2018= $fila_qunifis['quni2018'];
			  $qunifis_2019= $fila_qunifis['quni2019'];

if($qunifis_2017=='0' or $qunifis_2017==null or $qunifis_2017==''){
	$var9='0';
}else{
$var9= number_format((($qunifis_2018/$qunifis_2017) - 1) * 100,2);
	}

              if($qunifis_2012=='0' or $qunifis_2012==null or $qunifis_2012==''){
			  $ca1_2 ='0';
		      }else{
		      $ca1_2 = (($qunifis_2013 / $qunifis_2012) - 1) * 100;
		      }
			   if($qunifis_2013=='0' or $qunifis_2013==null or $qunifis_2013==''){
			  $ca2_2 ='0';
		      }else{
		      $ca2_2 = (($qunifis_2014 / $qunifis_2013) - 1) * 100;
		      }
			   if($qunifis_2014=='0' or $qunifis_2014==null or $qunifis_2014==''){
			  $ca3_2 ='0';
		      }else{
		      $ca3_2 = (($qunifis_2015 / $qunifis_2014) - 1) * 100;
		      }
			   if($qunifis_2015=='0' or $qunifis_2015==null or $qunifis_2015==''){
			  $ca4_2 ='0';
		      }else{
		      $ca4_2 = (($qunifis_2016 / $qunifis_2015) - 1) * 100;
		      }
			  if($qunifis_2016=='0' or $qunifis_2016==null or $qunifis_2016==''){
			  $ca5_2 ='0';
		      }else{
		      $ca5_2 = (($qunifis_2017 / $qunifis_2016) - 1) * 100;
		      }
			  if($qunifis_2017=='0' or $qunifis_2017==null or $qunifis_2017==''){
			  $ca6_2 ='0';
		      }else{
		      $ca6_2 = (($qunifis_2018 / $qunifis_2017) - 1) * 100;
		      }
			 if($qunifis_2018=='0' or $qunifis_2018==null or $qunifis_2018==''){
			  $ca7_2 ='0';
		      }else{
		      $ca7_2 = (($qunifis_2019 / $qunifis_2018) - 1) * 100;
		      }
			  
			  $var10= number_format(($ca1_2 + $ca2_2 + $ca3_2 + $ca4_2 + $ca5_2 + $ca6_2)/6,2) ;
		  
		  }
	  }else{
		  $qunifis_2012= "0.00";
		   $qunifis_2013= "0.00";
		    $qunifis_2014= "0.00";
			 $qunifis_2015= "0.00";
			  $qunifis_2016= "0.00";
			  $qunifis_2017= "0.00";
		       $qunifis_2018= "0.00";
		  $qunifis_2019= "0.00";
	  }
				
/*sumamos unidades comerciales*/
	  $query_qunicom = "SELECT 'preciobruto' as VALOR, 
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2012' THEN exportacion.qunicom ELSE 0 END) AS ".quni2012.", 
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2013' THEN exportacion.qunicom ELSE 0 END) AS ".quni2013.", 
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2014' THEN exportacion.qunicom ELSE 0 END) AS ".quni2014.",
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2015' THEN exportacion.qunicom ELSE 0 END) AS ".quni2015.", 
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2016' THEN exportacion.qunicom ELSE 0 END) AS ".quni2016.",
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2017' THEN exportacion.qunicom ELSE 0 END) AS ".quni2017.",
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2018' THEN exportacion.qunicom ELSE 0 END) AS ".quni2018.",
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2019' THEN exportacion.qunicom ELSE 0 END) AS ".quni2019." FROM exportacion where extract(year from exportacion.fnum) >= '2012' AND
extract(year from exportacion.fnum) <= '2019' AND exportacion.part_nandi='".$bus2."'";
	  /*$resultado_qunicom = pg_query($query_qunicom) or die("Error en la Consulta SQL");
	  $numReg_qunicom = pg_num_rows($resultado_qunicom);
	  if($numReg_qunicom>0){
		  while ($fila_qunicom=pg_fetch_array($resultado_qunicom)) {*/
		$resultado_qunicom=$conexpg->query($query_qunicom); 
if($resultado_qunicom->num_rows>0){ 
while($fila_qunicom=$resultado_qunicom->fetch_array()){
		  $qunicom_2012= $fila_qunicom['quni2012'];
		   $qunicom_2013= $fila_qunicom['quni2013'];
		    $qunicom_2014= $fila_qunicom['quni2014'];
			 $qunicom_2015= $fila_qunicom['quni2015'];
			  $qunicom_2016= $fila_qunicom['quni2016'];
			  $qunicom_2017= $fila_qunicom['quni2017'];
			  $qunicom_2018= $fila_qunicom['quni2018'];
			  $qunicom_2019= $fila_qunicom['quni2019'];
			  
			  if($qunicom_2017=='0' or $qunicom_2017==null or $qunicom_2017==''){
				  $var11='0';
			  }else{
			      $var11= number_format((($qunicom_2018/$qunicom_2017) - 1) * 100,2);
				  }

              if($qunicom_2012=='0' or $qunicom_2012==null or $qunicom_2012==''){
			  $ca1_3 ='0';
		      }else{
		      $ca1_3 = (($qunicom_2013 / $qunicom_2012) - 1) * 100;
		      }
			   if($qunicom_2013=='0' or $qunicom_2013==null or $qunicom_2013==''){
			  $ca2_3 ='0';
		      }else{
		      $ca2_3 = (($qunicom_2014 / $qunicom_2013) - 1) * 100;
		      }
			   if($qunicom_2014=='0' or $qunicom_2014==null or $qunicom_2014==''){
			  $ca3_3 ='0';
		      }else{
		      $ca3_3 = (($qunicom_2015 / $qunicom_2014) - 1) * 100;
		      }
			   if($qunicom_2015=='0' or $qunicom_2015==null or $qunicom_2015==''){
			  $ca4_3 ='0';
		      }else{
		      $ca4_3 = (($qunicom_2016 / $qunicom_2015) - 1) * 100;
		      }
			  if($qunicom_2016=='0' or $qunicom_2016==null or $qunicom_2016==''){
			  $ca5_3 ='0';
		      }else{
		      $ca5_3 = (($qunicom_2017 / $qunicom_2016) - 1) * 100;
		      }
			  if($qunicom_2017=='0' or $qunicom_2017==null or $qunicom_2017==''){
			  $ca6_3 ='0';
		      }else{
		      $ca6_3 = (($qunicom_2018 / $qunicom_2017) - 1) * 100;
		      }
			  if($qunicom_2018=='0' or $qunicom_2018==null or $qunicom_2018==''){
			  $ca7_3 ='0';
		      }else{
		      $ca7_3 = (($qunicom_2019 / $qunicom_2018) - 1) * 100;
		      }
			 
			  
			  $var12= number_format(($ca1_3 + $ca2_3 + $ca3_3 + $ca4_3 + $ca5_3 + $ca6_3)/6,2) ;

		  
		  }
	  }else{
		  $qunicom_2012= "0.00";
		   $qunicom_2013= "0.00";
		    $qunicom_2014= "0.00";
			 $qunicom_2015= "0.00";
			  $qunicom_2016= "0.00";
			  $qunicom_2017= "0.00";
		       $qunicom_2018= "0.00";
		  $qunicom_2019= "0.00";
	  }

/*cuenta cantidad de registros*/
	  $query_creg = "SELECT 'cantidadreg' as VALOR, 
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2012' THEN 1 ELSE 0 END) AS ".cr2012.", 
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2013' THEN 1 ELSE 0 END) AS ".cr2013.", 
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2014' THEN 1 ELSE 0 END) AS ".cr2014.", 
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2015' THEN 1 ELSE 0 END) AS ".cr2015.", 
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2016' THEN 1 ELSE 0 END) AS ".cr2016.",
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2017' THEN 1 ELSE 0 END) AS ".cr2017.",
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2018' THEN 1 ELSE 0 END) AS ".cr2018.",
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2019' THEN 1 ELSE 0 END) AS ".cr2019."
	   FROM exportacion where extract(year from exportacion.fnum) >= '2012' AND
extract(year from exportacion.fnum) <= '2019' AND exportacion.part_nandi='".$bus2."'";
	  /*$resultado_creg = pg_query($query_creg) or die("Error en la Consulta SQL");
	  $numReg_creg = pg_num_rows($resultado_creg);
	  if($numReg_creg>0){
		  while ($fila_creg=pg_fetch_array($resultado_creg)) {*/
		$resultado_creg=$conexpg->query($query_creg); 
if($resultado_creg->num_rows>0){ 
while($fila_creg=$resultado_creg->fetch_array()){
		  $creg_2012= $fila_creg['cr2012'];
		   $creg_2013= $fila_creg['cr2013'];
		    $creg_2014= $fila_creg['cr2014'];
			 $creg_2015= $fila_creg['cr2015'];
			  $creg_2016= $fila_creg['cr2016'];
			  $creg_2017= $fila_creg['cr2017'];
			  $creg_2018= $fila_creg['cr2018'];
			  $creg_2019= $fila_creg['cr2019'];
			  
			  if($creg_2017=='0' or $creg_2017==null or $creg_2017==''){
				  $var13= "0";
			  }else{
			  $var13= number_format((($creg_2018/$creg_2017) - 1) * 100,2);
				  }

              if($creg_2012=='0' or $creg_2012==null or $creg_2012==''){
			  $ca1_4 ='0';
		      }else{
		      $ca1_4 = (($creg_2013 / $creg_2012) - 1) * 100;
		      }
			   if($creg_2013=='0' or $creg_2013==null or $creg_2013==''){
			  $ca2_4 ='0';
		      }else{
		      $ca2_4 = (($creg_2014 / $creg_2013) - 1) * 100;
		      }
			   if($creg_2014=='0' or $creg_2014==null or $creg_2014==''){
			  $ca3_4 ='0';
		      }else{
		      $ca3_4 = (($creg_2015 / $creg_2014) - 1) * 100;
		      }
			   if($creg_2015=='0' or $creg_2015==null or $creg_2015==''){
			  $ca4_4 ='0';
		      }else{
		      $ca4_4 = (($creg_2016 / $creg_2015) - 1) * 100;
		      }
			  if($creg_2016=='0' or $creg_2016==null or $creg_2016==''){
			  $ca5_4 ='0';
		      }else{
		      $ca5_4 = (($creg_2017 / $creg_2016) - 1) * 100;
		      }
			  if($creg_2017=='0' or $creg_2017==null or $creg_2017==''){
			  $ca6_4 ='0';
		      }else{
		      $ca6_4 = (($creg_2018 / $creg_2017) - 1) * 100;
		      }
			  if($creg_2018=='0' or $creg_2018==null or $creg_2018==''){
			  $ca7_4 ='0';
		      }else{
		      $ca7_4 = (($creg_2019 / $creg_2018) - 1) * 100;
		      }
			 
			  
			  $var14= number_format(($ca1_4 + $ca2_4 + $ca3_4 + $ca4_4 + $ca5_4 + $ca6_4)/6,2) ;

		  
		  }
	  }else{
		  $creg_2012= "0.00";
		   $creg_2013= "0.00";
		    $creg_2014= "0.00";
			 $creg_2015= "0.00";
			  $creg_2016= "0.00";
			  $creg_2017= "0.00";
		       $creg_2018= "0.00";
		  $creg_2019= "0.00";
	  }
				
/*cuenta cantidad de duas*/
	   $query_dua = "SELECT Count(DISTINCT exportacion.ndcl) as cant_dua, extract(year from exportacion.fnum) as anio FROM exportacion WHERE extract(year from exportacion.fnum) >= '2012' AND
extract(year from exportacion.fnum) <= '2019' AND exportacion.part_nandi='".$bus2."' GROUP BY anio order BY anio ASC";
	  /*$resultado_dua = pg_query($query_dua) or die("Error en la Consulta SQL");
	  $numReg_dua = pg_num_rows($resultado_dua);
	  if($numReg_dua>0){
		  while ($fila_dua=pg_fetch_array($resultado_dua)) {*/
		$resultado_dua=$conexpg->query($query_dua); 
if($resultado_dua->num_rows>0){ 
while($fila_dua=$resultado_dua->fetch_array()){
		  $aniodua= $fila_dua['anio'];
		  
		  if($aniodua=='2012'){
			  $rdua2012=$fila_dua['cant_dua'];
		  }
		  if($aniodua=='2013'){
			  $rdua2013=$fila_dua['cant_dua'];
		  }
		  if($aniodua=='2014'){
			  $rdua2014=$fila_dua['cant_dua'];
		  }
		  if($aniodua=='2015'){
			  $rdua2015=$fila_dua['cant_dua'];
		  }
		  if($aniodua=='2016'){
			  $rdua2016=$fila_dua['cant_dua'];
		  }
		  if($aniodua=='2017'){
			  $rdua2017=$fila_dua['cant_dua'];
		  }
		  if($aniodua=='2018'){
			  $rdua2018=$fila_dua['cant_dua'];
		  }
			  if($aniodua=='2019'){
			  $rdua2019=$fila_dua['cant_dua'];
		  }
		  
		   if($rdua2017=='0'  or $rdua2017 == null){
			   $var15='0.00';
		   }else{
		   $var15= number_format((($rdua2018/$rdua2017) - 1) * 100,2);
		   }

              if($rdua2012=='0' or $rdua2012 == null){
			  $ca1_5 ='0';
		      }else{
		      $ca1_5 = (($rdua2013 / $rdua2012) - 1) * 100;
		      }
			   if($rdua2013=='0' or $rdua2013 == null){
			  $ca2_5 ='0';
		      }else{
		      $ca2_5 = (($rdua2014 / $rdua2013) - 1) * 100;
		      }
			   if($rdua2014=='0' or $rdua2014 == null){
			  $ca3_5 ='0';
		      }else{
		      $ca3_5 = (($rdua2015 / $rdua2014) - 1) * 100;
		      }
			   if($rdua2015=='0' or $rdua2015 == null){
			  $ca4_5 ='0';
		      }else{
		      $ca4_5 = (($rdua2016 / $rdua2015) - 1) * 100;
		      }
			  if($rdua2016=='0' or $rdua2016 == null){
			  $ca5_5 ='0';
		      }else{
		      $ca5_5 = (($rdua2017 / $rdua2016) - 1) * 100;
		      }
			  if($rdua2017=='0' or $rdua2017 == null){
			  $ca6_5 ='0';
		      }else{
		      $ca6_5 = (($rdua2018 / $rdua2017) - 1) * 100;
		      }
			  if($rdua2018=='0' or $rdua2018 == null){
			  $ca7_5 ='0';
		      }else{
		      $ca7_5 = (($rdua2019 / $rdua2018) - 1) * 100;
		      }
			 
			  
			  $var16= number_format(($ca1_5 + $ca2_5 + $ca3_5 + $ca4_5 + $ca5_5 + $ca6_5)/6,2) ;
		   
		  }
	  }else{
		  $rdua2012= "0.00";
		   $rdua2013= "0.00";
		    $rdua2014= "0.00";
			 $rdua2015= "0.00";
			  $rdua2016= "0.00";
			  $rdua2017= "0.00";
		       $rdua2018= "0.00";
		  $rdua2019= "0.00";
	  }
				
/*cuenta cantidad de empresas*/
	   $query_emp = "SELECT Count(DISTINCT exportacion.dnombre) as cant_nom, extract(year from exportacion.fnum) as anio FROM exportacion WHERE extract(year from exportacion.fnum) >= '2012' AND
extract(year from exportacion.fnum) <= '2019' AND exportacion.part_nandi='".$bus2."' GROUP BY anio order BY anio ASC";
	  /*$resultado_emp = pg_query($query_emp) or die("Error en la Consulta SQL");
	  $numReg_emp = pg_num_rows($resultado_emp);
	  if($numReg_emp>0){
		  while ($fila_emp=pg_fetch_array($resultado_emp)) {*/
		$resultado_emp=$conexpg->query($query_emp); 
if($resultado_emp->num_rows>0){ 
while($fila_emp=$resultado_emp->fetch_array()){
		  $anioemp= $fila_emp['anio'];
		  
		  if($anioemp=='2012'){
			  $remp2012=$fila_emp['cant_nom'];
		  }
		  if($anioemp=='2013'){
			  $remp2013=$fila_emp['cant_nom'];
		  }
		  if($anioemp=='2014'){
			  $remp2014=$fila_emp['cant_nom'];
		  }
		  if($anioemp=='2015'){
			  $remp2015=$fila_emp['cant_nom'];
		  }
		  if($anioemp=='2016'){
			  $remp2016=$fila_emp['cant_nom'];
		  }
		  if($anioemp=='2017'){
			  $remp2017=$fila_emp['cant_nom'];
		  }
		  if($anioemp=='2018'){
			  $remp2018=$fila_emp['cant_nom'];
		  }
			  if($anioemp=='2019'){
			  $remp2019=$fila_emp['cant_nom'];
		  }
		  
		  if($remp2017=='0'  or $remp2017 == null){
			   $var17='0.00';
		   }else{
		   $var17= number_format((($remp2018/$remp2017) - 1) * 100,2);
		   }

              if($remp2012=='0' or $remp2012 == null){
			  $ca1_6 ='0';
		      }else{
		      $ca1_6 = (($remp2013 / $remp2012) - 1) * 100;
		      }
			   if($remp2013=='0' or $remp2013 == null){
			  $ca2_6 ='0';
		      }else{
		      $ca2_6 = (($remp2014 / $remp2013) - 1) * 100;
		      }
			   if($remp2014=='0' or $remp2014 == null){
			  $ca3_6 ='0';
		      }else{
		      $ca3_6 = (($remp2015 / $remp2014) - 1) * 100;
		      }
			   if($remp2015=='0' or $remp2015 == null){
			  $ca4_6 ='0';
		      }else{
		      $ca4_6 = (($remp2016 / $remp2015) - 1) * 100;
		      }
			  if($remp2016=='0' or $remp2016 == null){
			  $ca5_6 ='0';
		      }else{
		      $ca5_6 = (($remp2017 / $remp2016) - 1) * 100;
		      }
			  if($remp2017=='0' or $remp2017 == null){
			  $ca6_6 ='0';
		      }else{
		      $ca6_6 = (($remp2018 / $remp2017) - 1) * 100;
		      }
			  if($remp2018=='0' or $remp2018 == null){
			  $ca7_6 ='0';
		      }else{
		      $ca7_6 = (($remp2019 / $remp2018) - 1) * 100;
		      }
			  
			  $var18= number_format(($ca1_6 + $ca2_6 + $ca3_6 + $ca4_6 + $ca5_6 + $ca6_6)/6,2) ;
		   
		  }
	  }else{
		  $remp2012= "0.00";
		   $remp2013= "0.00";
		    $remp2014= "0.00";
			 $remp2015= "0.00";
			  $remp2016= "0.00";
			  $remp2017= "0.00";
		       $remp2018= "0.00";
		  $remp2019= "0.00";
	  }
				
/*cantidad de mercados*/
	  $query_merca = "SELECT Count(DISTINCT exportacion.cpaides) as cant_mer, extract(year from exportacion.fnum) as anio FROM exportacion WHERE extract(year from exportacion.fnum) >= '2012' AND
extract(year from exportacion.fnum) <= '2019' AND exportacion.part_nandi='".$bus2."' GROUP BY anio order BY anio ASC";
	  /*$resultado_merca = pg_query($query_merca) or die("Error en la Consulta SQL");
	  $numReg_merca = pg_num_rows($resultado_merca);
	  if($numReg_merca>0){
		  while ($fila_merca=pg_fetch_array($resultado_merca)) {*/
		$resultado_merca=$conexpg->query($query_merca); 
if($resultado_merca->num_rows>0){ 
while($fila_merca=$resultado_merca->fetch_array()){
		  $aniomerca= $fila_merca['anio'];
		  
		  if($aniomerca=='2012'){
			  $rmer2012=$fila_merca['cant_mer'];
		  }
		  if($aniomerca=='2013'){
			  $rmer2013=$fila_merca['cant_mer'];
		  }
		  if($aniomerca=='2014'){
			  $rmer2014=$fila_merca['cant_mer'];
		  }
		  if($aniomerca=='2015'){
			  $rmer2015=$fila_merca['cant_mer'];
		  }
		  if($aniomerca=='2016'){
			  $rmer2016=$fila_merca['cant_mer'];
		  }
		  if($aniomerca=='2017'){
			  $rmer2017=$fila_merca['cant_mer'];
		  }
		  if($aniomerca=='2018'){
			  $rmer2018=$fila_merca['cant_mer'];
		  }
			  if($aniomerca=='2019'){
			  $rmer2019=$fila_merca['cant_mer'];
		  }
		  
		  
		  if($rmer2017=='0'  or $rmer2017 == null){
			   $var19='0.00';
		   }else{
		   $var19= number_format((($rmer2018/$rmer2017) - 1) * 100,2);
		   }

              if($rmer2012=='0' or $rmer2012 == null){
			  $ca1_7 ='0';
		      }else{
		      $ca1_7 = (($rmer2013 / $rmer2012) - 1) * 100;
		      }
			   if($rmer2013=='0' or $rmer2013 == null){
			  $ca2_7 ='0';
		      }else{
		      $ca2_7 = (($rmer2014 / $rmer2013) - 1) * 100;
		      }
			   if($rmer2014=='0' or $rmer2014 == null){
			  $ca3_7 ='0';
		      }else{
		      $ca3_7 = (($rmer2015 / $rmer2014) - 1) * 100;
		      }
			   if($rmer2015=='0' or $rmer2015 == null){
			  $ca4_7 ='0';
		      }else{
		      $ca4_7 = (($rmer2016 / $rmer2015) - 1) * 100;
		      }
			  if($rmer2016=='0' or $rmer2016 == null){
			  $ca5_7 ='0';
		      }else{
		      $ca5_7 = (($rmer2017 / $rmer2016) - 1) * 100;
		      }
			  if($rmer2017=='0' or $rmer2017 == null){
			  $ca6_7 ='0';
		      }else{
		      $ca6_7 = (($rmer2018 / $rmer2017) - 1) * 100;
		      }
			  if($rmer2018=='0' or $rmer2018 == null){
			  $ca7_7 ='0';
		      }else{
		      $ca7_7 = (($rmer2019 / $rmer2018) - 1) * 100;
		      }
			  
			  $var20= number_format(($ca1_7 + $ca2_7 + $ca3_7 + $ca4_7 + $ca5_7 + $ca6_7)/6,2) ;
		   
		  }
	  }else{
		  $rmer2012= "0.00";
		   $rmer2013= "0.00";
		    $rmer2014= "0.00";
			 $rmer2015= "0.00";
			  $rmer2016= "0.00";
			  $rmer2017= "0.00";
		       $rmer2018= "0.00";
		  $rmer2019= "0.00";
	  }
				
/*contamos cantidad de puertos*/
	   $query_pue = "SELECT Count(DISTINCT exportacion.cpuedes) as cant_pue, extract(year from exportacion.fnum) as anio FROM exportacion WHERE extract(year from exportacion.fnum) >= '2012' AND
extract(year from exportacion.fnum) <= '2019' AND exportacion.part_nandi='".$bus2."' GROUP BY anio order BY anio ASC";
	  /*$resultado_pue = pg_query($query_pue) or die("Error en la Consulta SQL");
	  $numReg_pue = pg_num_rows($resultado_pue);
	  if($numReg_pue>0){
		  while ($fila_pue=pg_fetch_array($resultado_pue)) {*/
		$resultado_pue=$conexpg->query($query_pue); 
if($resultado_pue->num_rows>0){ 
while($fila_pue=$resultado_pue->fetch_array()){
		  $aniopue= $fila_pue['anio'];
		  
		  if($aniopue=='2012'){
			  $rpue2012=$fila_pue['cant_pue'];
		  }
		  if($aniopue=='2013'){
			  $rpue2013=$fila_pue['cant_pue'];
		  }
		  if($aniopue=='2014'){
			  $rpue2014=$fila_pue['cant_pue'];
		  }
		  if($aniopue=='2015'){
			  $rpue2015=$fila_pue['cant_pue'];
		  }
		  if($aniopue=='2016'){
			  $rpue2016=$fila_pue['cant_pue'];
		  }
		  if($aniopue=='2017'){
			  $rpue2017=$fila_pue['cant_pue'];
		  }
		  if($aniopue=='2018'){
			  $rpue2018=$fila_pue['cant_pue'];
		  }
			  if($aniopue=='2019'){
			  $rpue2019=$fila_pue['cant_pue'];
		  }
		  
		  if($rpue2017=='0'  or $rpue2017 == null){
			   $var21='0.00';
		   }else{
		  $var21= number_format((($rpue2018/$rpue2017) - 1) * 100,2);
		   }

              if($rpue2012=='0' or $rpue2012 == null){
			  $ca1_8 ='0';
		      }else{
		      $ca1_8 = (($rpue2013 / $rpue2012) - 1) * 100;
		      }
			  
			   if($rpue2013=='0' or $rpue2013 == null){
			  $ca2_8 ='0';
		      }else{
		      $ca2_8 = (($rpue2014 / $rpue2013) - 1) * 100;
		      }
			  
			   if($rpue2014=='0' or $rpue2014 == null){
			  $ca3_8 ='0';
		      }else{
		      $ca3_8 = (($rpue2015 / $rpue2014) - 1) * 100;
		      }
			  
			   if($rpue2015=='0' or $rpue2015 == null){
			  $ca4_8 ='0';
		      }else{
		      $ca4_8 = (($rpue2016 / $rpue2015) - 1) * 100;
		      }
			  
			  if($rpue2016=='0' or $rpue2016 == null){
			  $ca5_8 ='0';
		      }else{
		      $ca5_8 = (($rpue2017 / $rpue2016) - 1) * 100;
		      }
			  
			  if($rpue2017=='0' or $rpue2017 == null){
			  $ca6_8 ='0';
		      }else{
		      $ca6_8 = (($rpue2018 / $rpue2017) - 1) * 100;
		      }
			  
			  if($rpue2018=='0' or $rpue2018 == null){
			  $ca7_8 ='0';
		      }else{
		      $ca7_8 = (($rpue2019 / $rpue2018) - 1) * 100;
		      }

			  
			  $var22= number_format(($ca1_8 + $ca2_8 + $ca3_8 + $ca4_8 + $ca5_8 + $ca6_8)/6,2) ;
		  
		   
		  }
	  }else{
		  $rpue2012= "0.00";
		   $rpue2013= "0.00";
		    $rpue2014= "0.00";
			 $rpue2015= "0.00";
			  $rpue2016= "0.00";
			  $rpue2017= "0.00";
		       $rpue2018= "0.00";
		  $rpue2019= "0.00";
	  }
				
/*contamos cantidad de aduanas*/
	   $query_adua = "SELECT Count(DISTINCT exportacion.cadu) as cant_adua, extract(year from exportacion.fnum) as anio FROM exportacion WHERE extract(year from exportacion.fnum) >= '2012' AND
extract(year from exportacion.fnum) <= '2019' AND exportacion.part_nandi='".$bus2."' GROUP BY anio order BY anio ASC";
	  /*$resultado_adua = pg_query($query_adua) or die("Error en la Consulta SQL");
	  $numReg_adua = pg_num_rows($resultado_adua);
	  if($numReg_adua>0){
		  while ($fila_adua=pg_fetch_array($resultado_adua)) {*/
		$resultado_adua=$conexpg->query($query_adua); 
if($resultado_adua->num_rows>0){ 
while($fila_adua=$resultado_adua->fetch_array()){
		  $anioadua= $fila_adua['anio'];
		  
		  if($anioadua=='2012'){
			  $radua2012=$fila_adua['cant_adua'];
		  }
		  if($anioadua=='2013'){
			  $radua2013=$fila_adua['cant_adua'];
		  }
		  if($anioadua=='2014'){
			  $radua2014=$fila_adua['cant_adua'];
		  }
		  if($anioadua=='2015'){
			  $radua2015=$fila_adua['cant_adua'];
		  }
		  if($anioadua=='2016'){
			  $radua2016=$fila_adua['cant_adua'];
		  }
		  if($anioadua=='2017'){
			  $radua2017=$fila_adua['cant_adua'];
		  }
		  if($anioadua=='2018'){
			  $radua2018=$fila_adua['cant_adua'];
		  }
			  if($anioadua=='2019'){
			  $radua2019=$fila_adua['cant_adua'];
		  }
		  
		  if($radua2017=='0'  or $radua2017 == null){
			   $var23='0.00';
		   }else{
		   $var23= number_format((($radua2018/$radua2017) - 1) * 100,2);
		   }

              if($radua2012=='0' or $radua2012 == null){
			  $ca1_8 ='0';
		      }else{
		      $ca1_8 = (($radua2013 / $radua2012) - 1) * 100;
		      }
			   if($radua2013=='0' or $radua2013 == null){
			  $ca2_8 ='0';
		      }else{
		      $ca2_8 = (($radua2014 / $radua2013) - 1) * 100;
		      }
			   if($radua2014=='0' or $radua2014 == null){
			  $ca3_8 ='0';
		      }else{
		      $ca3_8 = (($radua2015 / $radua2014) - 1) * 100;
		      }
			   if($radua2015=='0' or $radua2015 == null){
			  $ca4_8 ='0';
		      }else{
		      $ca4_8 = (($radua2016 / $radua2015) - 1) * 100;
		      }
			  if($radua2016=='0' or $radua2016 == null){
			  $ca5_8 ='0';
		      }else{
		      $ca5_8 = (($radua2017 / $radua2016) - 1) * 100;
		      }
			  if($radua2017=='0' or $radua2017 == null){
			  $ca6_8 ='0';
		      }else{
		      $ca6_8 = (($radua2018 / $radua2017) - 1) * 100;
		      }
			  if($radua2018=='0' or $radua2018 == null){
			  $ca7_8 ='0';
		      }else{
		      $ca7_8 = (($radua2019 / $radua2018) - 1) * 100;
		      }
			  
			  $var24= number_format(($ca1_8 + $ca2_8 + $ca3_8 + $ca4_8 + $ca5_8 + $ca6_8)/6,2) ;
		   
		  }
	  }else{
		  $radua2012= "0.00";
		   $radua2013= "0.00";
		    $radua2014= "0.00";
			 $radua2015= "0.00";
			  $radua2016= "0.00";
			  $radua2017= "0.00";
		       $radua2018= "0.00";
		  $radua2019= "0.00";
	  }
				
/*contamnos cantidad de departamento*/
	   $query_depa = "SELECT COUNT(DISTINCT departamento.nombre) as departamento, extract(year from exportacion.fnum) as anio FROM exportacion LEFT JOIN departamento ON  ((((SUBSTRING(exportacion.ubigeo,1,2))= departamento.iddepartamento))) WHERE extract(year from exportacion.fnum) >= '2012' AND
extract(year from exportacion.fnum) <= '2019' AND exportacion.part_nandi='".$bus2."' GROUP BY anio ORDER BY anio ASC";
	  /*$resultado_depa = pg_query($query_depa) or die("Error en la Consulta SQL");
	  $numReg_depa = pg_num_rows($resultado_depa);
	  if($numReg_depa>0){
		  while ($fila_depa=pg_fetch_array($resultado_depa)) {*/
		$resultado_depa=$conexpg->query($query_depa); 
if($resultado_depa->num_rows>0){ 
while($fila_depa=$resultado_depa->fetch_array()){
		  $aniodepa= $fila_depa['anio'];
		  
		  if($aniodepa=='2012'){
			  $rdepa2012=$fila_depa['departamento'];
		  }
		  if($aniodepa=='2013'){
			  $rdepa2013=$fila_depa['departamento'];
		  }
		  if($aniodepa=='2014'){
			  $rdepa2014=$fila_depa['departamento'];
		  }
		  if($aniodepa=='2015'){
			  $rdepa2015=$fila_depa['departamento'];
		  }
		  if($aniodepa=='2016'){
			  $rdepa2016=$fila_depa['departamento'];
		  }
		  if($aniodepa=='2017'){
			  $rdepa2017=$fila_depa['departamento'];
		  }
		  if($aniodepa=='2018'){
			  $rdepa2018=$fila_depa['departamento'];
		  }
			  if($aniodepa=='2019'){
			  $rdepa2019=$fila_depa['departamento'];
		  }
		  
		  if($rdepa2017=='0'  or $rdepa2017 == null){
			   $var25='0.00';
		   }else{
		  $var25= number_format((($rdepa2018/$rdepa2017) - 1) * 100,2);
		   }

              if($rdepa2012=='0' or $rdepa2012 == null){
			  $ca1_9 ='0';
		      }else{
		      $ca1_9 = (($rdepa2013 / $rdepa2012) - 1) * 100;
		      }
			   if($rdepa2013=='0' or $rdepa2013 == null){
			  $ca2_9 ='0';
		      }else{
		      $ca2_9 = (($rdepa2014 / $rdepa2013) - 1) * 100;
		      }
			   if($rdepa2014=='0' or $rdepa2014 == null){
			  $ca3_9 ='0';
		      }else{
		      $ca3_9 = (($rdepa2015 / $rdepa2014) - 1) * 100;
		      }
			   if($rdepa2015=='0' or $rdepa2015 == null){
			  $ca4_9 ='0';
		      }else{
		      $ca4_9 = (($rdepa2016 / $rdepa2015) - 1) * 100;
		      }
			  if($rdepa2016=='0' or $rdepa2016 == null){
			  $ca5_9 ='0';
		      }else{
		      $ca5_9 = (($rdepa2017 / $rdepa2016) - 1) * 100;
		      }
			  if($rdepa2017=='0' or $rdepa2017 == null){
			  $ca6_9 ='0';
		      }else{
		      $ca6_9 = (($rdepa2018 / $rdepa2017) - 1) * 100;
		      }
			  if($rdepa2018=='0' or $rdepa2018 == null){
			  $ca7_9 ='0';
		      }else{
		      $ca7_9 = (($rdepa2019 / $rdepa2018) - 1) * 100;
		      }
			  
			  $var26= number_format(($ca1_9 + $ca2_9 + $ca3_9 + $ca4_9 + $ca5_9 + $ca6_9)/6,2) ;
		   
		  }
	  }else{
		  $rdepa2012= "0.00";
		   $rdepa2013= "0.00";
		    $rdepa2014= "0.00";
			 $rdepa2015= "0.00";
			  $rdepa2016= "0.00";
			  $rdepa2017= "0.00";
		       $rdepa2018= "0.00";
		  $rdepa2019= "0.00";
	  }
				
/*contamnos cantidad de agente*/
	   $query_agen = "SELECT Count(DISTINCT exportacion.cage) as cant_agen, extract(year from exportacion.fnum) as anio FROM exportacion WHERE extract(year from exportacion.fnum) >= '2012' AND
extract(year from exportacion.fnum) <= '2019' AND exportacion.part_nandi='".$bus2."' GROUP BY anio order BY anio ASC";
	  /*$resultado_agen = pg_query($query_agen) or die("Error en la Consulta SQL");
	  $numReg_agen = pg_num_rows($resultado_agen);
	  if($numReg_agen>0){
		  while ($fila_agen=pg_fetch_array($resultado_agen)) {*/
		$resultado_agen=$conexpg->query($query_agen); 
if($resultado_agen->num_rows>0){ 
while($fila_agen=$resultado_agen->fetch_array()){
		  $anioagen= $fila_agen['anio'];
		  
		  if($anioagen=='2012'){
			  $ragen2012=$fila_agen['cant_agen'];
		  }
		  if($anioagen=='2013'){
			  $ragen2013=$fila_agen['cant_agen'];
		  }
		  if($anioagen=='2014'){
			  $ragen2014=$fila_agen['cant_agen'];
		  }
		  if($anioagen=='2015'){
			  $ragen2015=$fila_agen['cant_agen'];
		  }
		  if($anioagen=='2016'){
			  $ragen2016=$fila_agen['cant_agen'];
		  }
		  if($anioagen=='2017'){
			  $ragen2017=$fila_agen['cant_agen'];
		  }
		  if($anioagen=='2018'){
			  $ragen2018=$fila_agen['cant_agen'];
		  }
			  if($anioagen=='2019'){
			  $ragen2019=$fila_agen['cant_agen'];
		  }
		  
		  if($ragen2017=='0'  or $ragen2017 == null){
			   $var27='0.00';
		   }else{
		  $var27= number_format((($ragen2018/$ragen2017) - 1) * 100,2);
		   }

              if($ragen2012=='0' or $ragen2012 == null){
			  $ca1_10 ='0';
		      }else{
		      $ca1_10 = (($ragen2013 / $ragen2012) - 1) * 100;
		      }
			   if($ragen2013=='0' or $ragen2013 == null){
			  $ca2_10 ='0';
		      }else{
		      $ca2_10 = (($ragen2014 / $ragen2013) - 1) * 100;
		      }
			   if($ragen2014=='0' or $ragen2014 == null){
			  $ca3_10='0';
		      }else{
		      $ca3_10 = (($ragen2015 / $ragen2014) - 1) * 100;
		      }
			   if($ragen2015=='0' or $ragen2015 == null){
			  $ca4_10 ='0';
		      }else{
		      $ca4_10 = (($ragen2016 / $ragen2015) - 1) * 100;
		      }
			  if($ragen2016=='0' or $ragen2016 == null){
			  $ca5_10 ='0';
		      }else{
		      $ca5_10 = (($ragen2017 / $ragen2016) - 1) * 100;
		      }
			  if($ragen2017=='0' or $ragen2017 == null){
			  $ca6_10 ='0';
		      }else{
		      $ca6_10 = (($ragen2018 / $ragen2017) - 1) * 100;
		      }
			  if($ragen2018=='0' or $ragen2018 == null){
			  $ca7_10 ='0';
		      }else{
		      $ca7_10 = (($ragen2019 / $ragen2018) - 1) * 100;
		      }
			  
			  $var28= number_format(($ca1_10 + $ca2_10 + $ca3_10 + $ca4_10 + $ca5_10 + $ca6_10)/6,2) ;
		  
		   
		  }
	  }else{
		  $ragen2012= "0.00";
		   $ragen2013= "0.00";
		    $ragen2014= "0.00";
			 $ragen2015= "0.00";
			  $ragen2016= "0.00";
			  $ragen2017= "0.00";
		       $ragen2018= "0.00";
		  $ragen2019= "0.00";
	  }
				
/*contamos cantidad via de transporte*/
	   $query_via = "SELECT Count(DISTINCT exportacion.cviatra) as cant_via, extract(year from exportacion.fnum) as anio FROM exportacion WHERE extract(year from exportacion.fnum) >= '2012' AND
extract(year from exportacion.fnum) <= '2019' AND exportacion.part_nandi='".$bus2."' GROUP BY anio order BY anio ASC";
	  /*$resultado_via = pg_query($query_via) or die("Error en la Consulta SQL");
	  $numReg_via = pg_num_rows($resultado_via);
	  if($numReg_via>0){
		  while ($fila_via=pg_fetch_array($resultado_via)) {*/
		$resultado_via=$conexpg->query($query_via); 
if($resultado_via->num_rows>0){ 
while($fila_via=$resultado_via->fetch_array()){
		  $aniovia= $fila_via['anio'];
		  
		  if($aniovia=='2012'){
			  $rvia2012=$fila_via['cant_via'];
		  }
		  if($aniovia=='2013'){
			  $rvia2013=$fila_via['cant_via'];
		  }
		  if($aniovia=='2014'){
			  $rvia2014=$fila_via['cant_via'];
		  }
		  if($aniovia=='2015'){
			  $rvia2015=$fila_via['cant_via'];
		  }
		  if($aniovia=='2016'){
			  $rvia2016=$fila_via['cant_via'];
		  }
		  if($aniovia=='2017'){
			  $rvia2017=$fila_via['cant_via'];
		  }
		  if($aniovia=='2018'){
			  $rvia2018=$fila_via['cant_via'];
		  }
			  if($aniovia=='2019'){
			  $rvia2019=$fila_via['cant_via'];
		  }
		  
		  if($rvia2017=='0'  or $rvia2017 == null){
			   $var29='0.00';
		   }else{
		  $var29= number_format((($rvia2018/$rvia2017) - 1) * 100,2);
		   }

              if($rvia2012=='0' or $rvia2012 == null){
			  $ca1_11 ='0';
		      }else{
		      $ca1_11 = (($rvia2013 / $rvia2012) - 1) * 100;
		      }
			   if($rvia2013=='0' or $rvia2013 == null){
			  $ca2_11 ='0';
		      }else{
		      $ca2_11 = (($rvia2014 / $rvia2013) - 1) * 100;
		      }
			   if($rvia2014=='0' or $rvia2014 == null){
			  $ca3_11='0';
		      }else{
		      $ca3_11 = (($rvia2015 / $rvia2014) - 1) * 100;
		      }
			   if($rvia2015=='0' or $rvia2015 == null){
			  $ca4_11 ='0';
		      }else{
		      $ca4_11 = (($rvia2016 / $rvia2015) - 1) * 100;
		      }
			  if($rvia2016=='0' or $rvia2016 == null){
			  $ca5_11 ='0';
		      }else{
		      $ca5_11 = (($rvia2017 / $rvia2016) - 1) * 100;
		      }
			  if($rvia2017=='0' or $rvia2017 == null){
			  $ca6_11 ='0';
		      }else{
		      $ca6_11 = (($rvia2018 / $rvia2017) - 1) * 100;
		      }
			  if($rvia2018=='0' or $rvia2018 == null){
			  $ca7_11 ='0';
		      }else{
		      $ca7_11 = (($rvia2019 / $rvia2018) - 1) * 100;
		      }
			  
			  $var30= number_format(($ca1_11 + $ca2_11 + $ca3_11 + $ca4_11 + $ca5_11 + $ca6_11)/6,2) ;
		  
		   
		  }
	  }else{
		  $rvia2012= "0.00";
		   $rvia2013= "0.00";
		    $rvia2014= "0.00";
			 $rvia2015= "0.00";
			  $rvia2016= "0.00";
			  $rvia2017= "0.00";
		       $rvia2018= "0.00";
		  $rvia2019= "0.00";
}
		
		//$bus2
//descripcion de partida
$nompartides="SELECT descripcion FROM arancel WHERE idarancel='$bus2'";
		/*$rsdesara = pg_query($nompartides) or die("Error en la Consulta SQL");
	  $nr_via = pg_num_rows($rsdesara);
	  if($nr_via>0){
		  while ($flara=pg_fetch_array($rsdesara)) {*/
		$rsdesara=$conexpg->query($nompartides); 
if($rsdesara->num_rows>0){ 
while($flara=$rsdesara->fetch_array()){
			 $desnomara = $flara['descripcion'];
		  }
	  }else{
		 $desnomara ="---"; 
	  }
		
echo"<div class='col-md-12'>";
		
		echo"<div class='col-md-12'>
        <div class='card'>
            <div class='card-body'>
                <h4 class='card-title'>
                    <a href='#'>Datos de la Partida</a>
                </h4>
                <div class='card-description'>
                    <b>Partida :</b> $bus2 <br>
					<b>Descripcion :</b> $desnomara <br>
					<b>Clasificar :</b> <a href='http://www.azatrade.info/arancel/viewpartidas.php?data=$bus2&t=$bus2&d1=' target='_blank'>Ver</a><br>
					<p align='center'>¿ De esta partida que más deseas conocer ?</p>
                </div>
				
				<div class='row'>
				
					<form method='post' action='partida/indicadores-anuales/' target='_blank'>
					<input type='hidden' name='partidaevoanua' value='$bus2' >
					<button type='submit' class='btn btn-warning'>
                    <span class='btn-label'>
                        <i class='material-icons'>language</i>
                    </span>
                    INDICADORES ANUALES
                </button>
				</form>
					
					<button type='submit' class='btn btn-warning' data-toggle='modal' data-target='#myModalPartA'>
                    <span class='btn-label'>
                        <i class='material-icons'>spellcheck</i>
                    </span>
                    INDICADOR MENSUAL
                </button>
				
				<form method='post' action='partida/evolucion-mensual/' target='_blank'>
				<input type='hidden' name='partidaevomen' value='$bus2' >
				<button type='submit' class='btn btn-rose'>
                    <span class='btn-label'>
                        <i class='material-icons'>spellcheck</i>
                    </span>
                    ESTACIONALIDAD
                </button>
				</form>
                
				<form method='post' action='partida/mercados/' target='_blank'>
				<input type='hidden' name='varipartidamerca' value='$bus2' >
                <button type='submit' class='btn btn-success'>
                    <span class='btn-label'>
                        <i class='material-icons'>spellcheck</i>
                    </span>
                    MERCADOS
                </button>
				</form>
                
				<form method='post' action='partida/departamentos/' target='_blank'>
				<input type='hidden' name='varipartidaregion' value='$bus2' >
                <button type='submit' class='btn btn-info'>
                    <span class='btn-label'>
                        <i class='material-icons'>spellcheck</i>
                    </span>
                    REGIONES
                </button>
				</form>
				

				<form method='post' action='partida/empresas/' target='_blank'>
				<input type='hidden' name='varipartidaempre' value='$bus2' >
                <button type='submit' class='btn btn-warning'>
                    <span class='btn-label'>
                        <i class='material-icons'>spellcheck</i>
                    </span>
                    EMPRESAS
                </button>
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
		/*echo"<div class='modal fade modal-mini modal-primary' id='myModalPartA' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                    		<div class='modal-dialog modal-small'>
                    			<div class='modal-content'>
                            <div class='modal-header'>
                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'><i class='material-icons'>clear</i></button>
                            </div>
                    				<div class='modal-body'>
                    					<p>
										<form method='post' action='partida/indicador-mensual/' target='_blank'>
										<input type='hidden' name='partidaindimen' value='$bus2' >
										<b>Selecciona Año</b><br>
										<select name='year' class='selectpicker' data-size='7' data-style='btn btn-info btn-round' required>
                                    <option value='2019'>2019</option>
									<option value='2018'>2018</option>
                                    <option value='2017'>2017</option>
									<option value='2016'>2016</option>
									<option value='2015'>2015</option>
									<option value='2014'>2014</option>
									<option value='2013'>2013</option>
									<option value='2012'>2012</option>
                                </select>
								<center><button type='submit' class='btn btn-info'>Consultar</button></center>
										</form>
										</p>
                    				</div>
                            <div class='modal-footer justify-content-center'>
                            </div>
                    			</div>
                    		</div>
                    	</div>";*/
		//fin ventana modal 1
		
		
		
        /*echo"<div class='card'>";
	echo"<div class='card-header card-header-info card-header-icon'>
              <div class='card-icon'>
                <i class='material-icons'>assignment</i>
              </div>
              <h4 class='card-title'><b>Reporte Anual de Indicadores</b><br> Partida #: $bus2 │ Fecha Numeracion │ Valor FOB USD │ Periodo 2012 - 2019 </b> </h4>
            </div>";
		echo"<div class='card-body'>";
		echo"<div class='toolbar'>";
		echo"<a href='#cdro'><button class='btn btn-info btn-sm'> Ver Cuadro Estadístico </button></a>";
        echo"</div>";
         echo"<div class='material-datatables'>";
		echo"<table id='datatables' class='table table-striped table-no-bordered table-hover' cellspacing='0' width='100%' style='width:100%'>";
		echo"<thead>
                          <tr>
                              <th>Indicadores</th>
                              <th>2012</th>
                              <th>2013</th>
                              <th>2014</th>
                              <th>2015</th>
							  <th>2016</th>
							  <th>2017</th>
							  <th>2018</th>
							  <th>2019</th>
							  <th>Var.%18/17</th>
							  <th>Var.%Total</th>
                          </tr>
                      </thead>";
		 echo"<tfoot>
                          <tr>
                              <th>Indicadores</th>
                              <th>2012</th>
                              <th>2013</th>
                              <th>2014</th>
                              <th>2015</th>
							  <th>2016</th>
							  <th>2017</th>
							  <th>2018</th>
							  <th>2019</th>
							  <th>Var.%18/17</th>
							  <th>Var.%Total</th>
                          </tr>
                      </tfoot>";
           echo"<tbody>";
		//++++++++++++++++++++++
		
		echo "<tr>";
echo "<td>Valor FOB USD</td>";
echo "<td>".number_format($vfob_2012,2)."</td>";
echo "<td>".number_format($vfob_2013,2)."</td>";
echo "<td>".number_format($vfob_2014,2)."</td>";
echo "<td>".number_format($vfob_2015,2)."</td>";
echo "<td>".number_format($vfob_2016,2)."</td>";
echo "<td>".number_format($vfob_2017,2)."</td>";
echo "<td>".number_format($vfob_2018,2)."</td>";
		echo "<td>".number_format($vfob_2019,2)."</td>";
echo "<td>$var1 %</td>";
echo "<td>$var2 %</td>";
echo "</tr>";
echo "<tr>";
echo "<td>Peso Neto (Kg)</td>";
echo "<td>".number_format($vpes_2012,2)."</td>";
echo "<td>".number_format($vpes_2013,2)."</td>";
echo "<td>".number_format($vpes_2014,2)."</td>";
echo "<td>".number_format($vpes_2015,2)."</td>";
echo "<td>".number_format($vpes_2016,2)."</td>";
echo "<td>".number_format($vpes_2017,2)."</td>";
echo "<td>".number_format($vpes_2018,2)."</td>";
		echo "<td>".number_format($vpes_2019,2)."</td>";
echo "<td>$var3 %</td>";
echo "<td>$var4 %</td>";
echo "</tr>";
echo "<tr>";
echo "<td>Precio FOB USD x KG</td>";
echo "<td>".number_format($preciofob2012,2)."</td>";
echo "<td>".number_format($preciofob2013,2)."</td>";
echo "<td>".number_format($preciofob2014,2)."</td>";
echo "<td>".number_format($preciofob2015,2)."</td>";
echo "<td>".number_format($preciofob2016,2)."</td>";
echo "<td>".number_format($preciofob2017,2)."</td>";
echo "<td>".number_format($preciofob2018,2)."</td>";
		echo "<td>".number_format($preciofob2019,2)."</td>";
echo "<td>$var5 %</td>";
echo "<td>$var6 %</td>";
echo "</tr>";
echo "<tr>";
echo "<td>Peso Bruto (Kg)</td>";
echo "<td>".number_format($vbru_2012,2)."</td>";
echo "<td>".number_format($vbru_2013,2)."</td>";
echo "<td>".number_format($vbru_2014,2)."</td>";
echo "<td>".number_format($vbru_2015,2)."</td>";
echo "<td>".number_format($vbru_2016,2)."</td>";
echo "<td>".number_format($vbru_2017,2)."</td>";
echo "<td>".number_format($vbru_2018,2)."</td>";
		echo "<td>".number_format($vbru_2019,2)."</td>";
echo "<td>$var7 %</td>";
echo "<td>$var8 %</td>";
echo "</tr>";
echo "<tr>";
echo "<td>Cantidad Exportada</td>";
echo "<td>".number_format($qunifis_2012,2)."</td>";
echo "<td>".number_format($qunifis_2013,2)."</td>";
echo "<td>".number_format($qunifis_2014,2)."</td>";
echo "<td>".number_format($qunifis_2015,2)."</td>";
echo "<td>".number_format($qunifis_2016,2)."</td>";
echo "<td>".number_format($qunifis_2017,2)."</td>";
echo "<td>".number_format($qunifis_2018,2)."</td>";
		echo "<td>".number_format($qunifis_2019,2)."</td>";
echo "<td>$var9 %</td>";
echo "<td>$var10 %</td>";
echo "</tr>";
echo "<tr>";
echo "<td>Unidades Comerciales</td>";
echo "<td>".number_format($qunicom_2012,2)."</td>";
echo "<td>".number_format($qunicom_2013,2)."</td>";
echo "<td>".number_format($qunicom_2014,2)."</td>";
echo "<td>".number_format($qunicom_2015,2)."</td>";
echo "<td>".number_format($qunicom_2016,2)."</td>";
echo "<td>".number_format($qunicom_2017,2)."</td>";
echo "<td>".number_format($qunicom_2018,2)."</td>";
		echo "<td>".number_format($qunicom_2019,2)."</td>";
echo "<td>$var11 %</td>";
echo "<td>$var12 %</td>";
echo "</tr>";
echo "<tr>";
echo "<td>Cantidad de Registros</td>";
echo "<td>$creg_2012</td>";
echo "<td>$creg_2013</td>";
echo "<td>$creg_2014</td>";
echo "<td>$creg_2015</td>";
echo "<td>$creg_2016</td>";
echo "<td>$creg_2017</td>";
echo "<td>$creg_2018</td>";
		echo "<td>$creg_2019</td>";
echo "<td>$var13 %</td>";
echo "<td>$var14 %</td>";
echo "</tr>";
echo "<tr>";
echo "<td>Cantidad de Duas</td>";
echo "<td>$rdua2012</td>";
echo "<td>$rdua2013</td>";
echo "<td>$rdua2014</td>";
echo "<td>$rdua2015</td>";
echo "<td>$rdua2016</td>";
echo "<td>$rdua2017</td>";
echo "<td>$rdua2018</td>";
		echo "<td>$rdua2019</td>";
echo "<td>$var15 %</td>";
echo "<td>$var16 %</td>";
echo "</tr>";
echo "<tr>";
echo "<td>Cantidad de Empresas</td>";
echo "<td>$remp2012</td>";
echo "<td>$remp2013</td>";
echo "<td>$remp2014</td>";
echo "<td>$remp2015</td>";
echo "<td>$remp2016</td>";
echo "<td>$remp2017</td>";
echo "<td>$remp2018</td>";
		echo "<td>$remp2019</td>";
echo "<td>$var17 %</td>";
echo "<td>$var18 %</td>";
echo "</tr>";
echo "<tr>";
echo "<td>Cantidad de Mercados</td>";
echo "<td>$rmer2012</td>";
echo "<td>$rmer2013</td>";
echo "<td>$rmer2014</td>";
echo "<td>$rmer2015</td>";
echo "<td>$rmer2016</td>";
echo "<td>$rmer2017</td>";
echo "<td>$rmer2018</td>";
		echo "<td>$rmer2019</td>";
echo "<td>$var19 %</td>";
echo "<td>$var20 %</td>";
echo "</tr>";
echo "<tr>";
echo "<td>Cantidad de Puertos</td>";
echo "<td>$rpue2012</td>";
echo "<td>$rpue2013</td>";
echo "<td>$rpue2014</td>";
echo "<td>$rpue2015</td>";
echo "<td>$rpue2016</td>";
echo "<td>$rpue2017</td>";
echo "<td>$rpue2018</td>";
		echo "<td>$rpue2019</td>";
echo "<td>$var21 %</td>";
echo "<td>$var22 %</td>";
echo "</tr>";
echo "<tr>";
echo "<td>Cantidad de Aduanas</td>";
echo "<td>$radua2012</td>";
echo "<td>$radua2013</td>";
echo "<td>$radua2014</td>";
echo "<td>$radua2015</td>";
echo "<td>$radua2016</td>";
echo "<td>$radua2017</td>";
echo "<td>$radua2018</td>";
		echo "<td>$radua2019</td>";
echo "<td>$var23 %</td>";
echo "<td>$var24 %</td>";
echo "</tr>";
echo "<tr>";
echo "<td>Cantidad de Departamentos</td>";
echo "<td>$rdepa2012</td>";
echo "<td>$rdepa2013</td>";
echo "<td>$rdepa2014</td>";
echo "<td>$rdepa2015</td>";
echo "<td>$rdepa2016</td>";
echo "<td>$rdepa2017</td>";
echo "<td>$rdepa2018</td>";
		echo "<td>$rdepa2019</td>";
echo "<td>$var25 %</td>";
echo "<td>$var26 %</td>";
echo "</tr>";
echo "<tr>";
echo "<td>Cantidad de Agentes</td>";
echo "<td>$ragen2012</td>";
echo "<td>$ragen2013</td>";
echo "<td>$ragen2014</td>";
echo "<td>$ragen2015</td>";
echo "<td>$ragen2016</td>";
echo "<td>$ragen2017</td>";
echo "<td>$ragen2018</td>";
		echo "<td>$ragen2019</td>";
echo "<td>$var27 %</td>";
echo "<td>$var28 %</td>";
echo "</tr>";
echo "<tr>";
echo "<td>Cantidad de Vias de Transporte</td>";
echo "<td>$rvia2012</td>";
echo "<td>$rvia2013</td>";
echo "<td>$rvia2014</td>";
echo "<td>$rvia2015</td>";
echo "<td>$rvia2016</td>";
echo "<td>$rvia2017</td>";
echo "<td>$rvia2018</td>";
		echo "<td>$rvia2019</td>";
echo "<td>$var29 %</td>";
echo "<td>$var30 %</td>";
echo "</tr>";
?>
      
			<?php
		echo"</tbody>";
		echo"</table>";
		echo"</div>";
		echo"</div>";
		echo"</div>";
		echo"</div>";*/
				//++++++++++++++++++++++
		//cerrando conexion
	        //pg_close($conexpg);
		
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
     
     
    
    <!-- ******* -->
<?php if(isset($_REQUEST['btnsearchpartida'])){ 
if($bus2!=""){ ?>  

<!--<style>
.chart {
  width: 100%; 
  min-height: 450px;
}
</style>           
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
	google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Valor Fob', 'Peso Neto', 'U. Comerc.', 'Peso Bruto', 'Precio Fob', 'Cant. Export.'],
		['2012',  <?php echo $vfob_2012 ?>, <?php echo $vpes_2012 ?>, <?php echo $qunicom_2012 ?>, <?php echo $vbru_2012 ?>, <?php echo $preciofob2012 ?>, <?php echo $qunifis_2012 ?>],
         ['2013',  <?php echo $vfob_2013 ?>, <?php echo $vpes_2013 ?>, <?php echo $qunicom_2013 ?>, <?php echo $vbru_2013 ?>, <?php echo $preciofob2013 ?>, <?php echo $qunifis_2013 ?>],
         ['2014',  <?php echo $vfob_2014 ?>, <?php echo $vpes_2014 ?>, <?php echo $qunicom_2014 ?>, <?php echo $vbru_2014 ?>, <?php echo $preciofob2014 ?>, <?php echo $qunifis_2014 ?>],
         ['2015',  <?php echo $vfob_2015 ?>, <?php echo $vpes_2015,2 ?>, <?php echo $qunicom_2015 ?>, <?php echo $vbru_2015 ?>, <?php echo $preciofob2015 ?>, <?php echo $qunifis_2015 ?>],
         ['2016',  <?php echo $vfob_2016 ?>, <?php echo $vpes_2016 ?>, <?php echo $qunicom_2016 ?>, <?php echo $vbru_2016 ?>, <?php echo $preciofob2016 ?>, <?php echo $qunifis_2016 ?>],
		  ['2017',  <?php echo $vfob_2017 ?>, <?php echo $vpes_2017 ?>, <?php echo $qunicom_2017 ?>, <?php echo $vbru_2017 ?>, <?php echo $preciofob2017 ?>, <?php echo $qunifis_2017 ?>],
			['2018',  <?php echo $vfob_2018 ?>, <?php echo $vpes_2018 ?>, <?php echo $qunicom_2018 ?>, <?php echo $vbru_2018 ?>, <?php echo $preciofob2018 ?>, <?php echo $qunifis_2018 ?>],
			['2019',  <?php echo $vfob_2019 ?>, <?php echo $vpes_2019 ?>, <?php echo $qunicom_2019 ?>, <?php echo $vbru_2019 ?>, <?php echo $preciofob2019 ?>, <?php echo $qunifis_2019 ?>]
        ]);

        var options = {
          chart: {
            title: 'Azatrade Business Intelligence',
            subtitle: 'Cuadro Estadístico, Partida: <?=$bus2;?> Periodo: 2012-2019',
          },
          bars: 'vertical',
          vAxis: {format: 'decimal'},
          height: 400,
          colors: ['#1b9e77', '#d95f02', '#7570b3', '#FF3383', '#FFD433', '#3374FF']
        };

        var chart = new google.charts.Bar(document.getElementById('chart_div'));

        chart.draw(data, google.charts.Bar.convertOptions(options));

        var btns = document.getElementById('btn-group');

        btns.onclick = function (e) {

          if (e.target.tagName === 'BUTTON') {
            options.vAxis.format = e.target.id === 'none' ? '' : e.target.id;
            chart.draw(data, google.charts.Bar.convertOptions(options));
          }
        }
      }
	</script>-->
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
