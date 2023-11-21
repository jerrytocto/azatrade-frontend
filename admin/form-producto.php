<?php
session_start();
if (isset($_SESSION['login_usuario'])){
	if($_SESSION['rol']<>'ADMIN'){//si no es admin
		print "<script>window.location='https://www.azatrade.info/';</script>";
	}
}else{
	if(!isset($_SESSION["login_usuario"]) || $_SESSION["login_usuario"]==null){
	//print "<script>alert('Acceso invalido! - Inicia Sesion para Acceder');window.location='$enlace_actual';</script>";
	print "<script>window.location='https://www.azatrade.info/';</script>";
}
}
$linkpage = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
include("incBD/inibd.php");
set_time_limit(450);
$activepadm ="active";
$cambiaicons = "aria-expanded='true'";
$activerptprodu ="active";
$actibtn = "show";

$ale = $_GET["if"];

//obtenemos fecha y hora actual
		date_default_timezone_set("America/Lima");
        $fechahoyxx = date("Y-m-d");
        $fechahoysys=date("d/m/Y",strtotime($fechahoyxx));

$codxxid = $_GET["log"];
if($codxxid==""){
	$codxxid = $_POST["log"];
}else{
	$codxxid = $_GET["log"];
}

$nuevo = $_GET["action"];
if($nuevo==""){
	$nuevo = $_POST["action"];
}else{
	$nuevo = $_GET["action"];
}

if($nuevo=="E"){//si es editar
	
$query_resultado= "SELECT p.idcod, p.partida_nandi, p.prod_generico, p.prod_especifico, p.presentacion, p.partida_desc, p.tipo_sec, p.sector, p.subsector, p.detalle_sector, p.imgfoto, p.descri_corto, p.mostrar, p.mostrar2 FROM productos as p WHERE p.idcod='$codxxid' ORDER BY p.idcod DESC";
	$resultado_rpt=$conexpg->query($query_resultado); 
if($resultado_rpt->num_rows>0){ 
while($fila_rpt=$resultado_rpt->fetch_array()){
             $codi= $fila_rpt['idcod'];
		  $datonomp1= $fila_rpt['partida_nandi'];
		  $datonomp2= $fila_rpt['prod_especifico'];
		  $datonomp3= $fila_rpt['prod_generico'];
		  $datonomp4= $fila_rpt['presentacion'];
		  $datonomp5= trim($fila_rpt['partida_desc']);
		  $datonomp6= $fila_rpt['tipo_sec'];
		  $datonomp7= $fila_rpt['sector'];
		  $datonomp8= $fila_rpt['subsector'];
		  $datonomp9= $fila_rpt['detalle_sector'];
		  $datonomp10= $fila_rpt['imgfoto'];
	      $datonomp11= $fila_rpt['descri_corto'];
	$datonomp12= $fila_rpt['mostrar'];
	$datonomp13= $fila_rpt['mostrar2'];
	
	if($datonomp12=="Si"){
		$vsmarca = "checked='checked'";
	}else{
		$vsmarca = "";
	}
	
	if($datonomp13=="Si"){
		$vsmarcados = "checked='checked'";
	}else{
		$vsmarcados = "";
	}
	
	if($datonomp5==""){
	// obtener descripcion de la tabla parti nandi
	$sqlpartina = "SELECT a.partida, a.descrip FROM arancel_part_nandina as a WHERE a.partida='$datonomp1' and finicio<>'19010101' ";
	$rsspt=$conexpg->query($sqlpartina); 
if($rsspt->num_rows>0){ 
while($ffft=$rsspt->fetch_array()){
             $datonomp5= $ffft['descrip'];
	
}
             }else{
	$datonomp5 = "";
}
		}
	
             }
             }

  }else{//si no consulta datos para mostrar y editar

             }


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

<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
<link rel="stylesheet" href="css/material-dashboard.min.css?v=2.0.1" rel="stylesheet">
<link href="css/demo.css" rel="stylesheet"/>

<!-- codigo solo acepta numeros --> 
<script language="javascript" type="text/javascript">
 function justNumbers(e)
{
   var keynum = window.event ? window.event.keyCode : e.which;
   if ((keynum == 8) || (keynum == 46))
        return true;
    return /\d/.test(String.fromCharCode(keynum));
}
</script>

 						
  <script>
      window.onload = detectarCarga;
      function detectarCarga(){
         document.getElementById("carga").style.display="none";
      }
    </script>
      
		<style>
		.select-css {
  display: block;
  font-size: 16px;
  font-family: 'Verdana', sans-serif;
  font-weight: 400;
  color: #444;
  line-height: 1.3;
  padding: .4em 1.4em .3em .8em;
  width: 400px;
  max-width: 100%; 
  box-sizing: border-box;
 margin: 20px auto;
  border: 1px solid #aaa;
  box-shadow: 0 1px 0 1px rgba(0,0,0,.03);
  border-radius: .3em;
  -moz-appearance: none;
  -webkit-appearance: none;
  appearance: none;
  background-color: #fff;
  background-image: url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22292.4%22%20height%3D%22292.4%22%3E%3Cpath%20fill%3D%22%23007CB2%22%20d%3D%22M287%2069.4a17.6%2017.6%200%200%200-13-5.4H18.4c-5%200-9.3%201.8-12.9%205.4A17.6%2017.6%200%200%200%200%2082.2c0%205%201.8%209.3%205.4%2012.9l128%20127.9c3.6%203.6%207.8%205.4%2012.8%205.4s9.2-1.8%2012.8-5.4L287%2095c3.5-3.5%205.4-7.8%205.4-12.8%200-5-1.9-9.2-5.5-12.8z%22%2F%3E%3C%2Fsvg%3E'),
    linear-gradient(to bottom, #ffffff 0%,#f7f7f7 100%);
  background-repeat: no-repeat, repeat;
  background-position: right .7em top 50%, 0 0;
  background-size: .65em auto, 100%;
}
.select-css::-ms-expand {
  display: none;
}
.select-css:hover {
  border-color: #888;
}
.select-css:focus {
  border-color: #aaa;
  box-shadow: 0 0 1px 3px rgba(59, 153, 252, .7);
  box-shadow: 0 0 0 3px -moz-mac-focusring;
  color: #222; 
  outline: none;
}
.select-css option {
  font-weight:normal;
}


.classOfElementToColor:hover {background-color:red; color:black}

.select-css option[selected] {
    background-color: orange;
}


/* OTROS ESTILOS*/
.styled-select { width: 240px; height: 34px; overflow: hidden; background: url(new_arrow.png) no-repeat right #ddd; border: 1px solid #ccc; }

 

.sidebar-box select{
display:block;
padding: 5px 10px;
height:42px;
margin:10px auto;
min-width: 225px;
-webkit-appearance: none;
height: 34px;
/* background-color: #ffffff; */
background-image: url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22292.4%22%20height%3D%22292.4%22%3E%3Cpath%20fill%3D%22%23007CB2%22%20d%3D%22M287%2069.4a17.6%2017.6%200%200%200-13-5.4H18.4c-5%200-9.3%201.8-12.9%205.4A17.6%2017.6%200%200%200%200%2082.2c0%205%201.8%209.3%205.4%2012.9l128%20127.9c3.6%203.6%207.8%205.4%2012.8%205.4s9.2-1.8%2012.8-5.4L287%2095c3.5-3.5%205.4-7.8%205.4-12.8%200-5-1.9-9.2-5.5-12.8z%22%2F%3E%3C%2Fsvg%3E'),
    linear-gradient(to bottom, #ffffff 0%,#f7f7f7 100%);
  background-repeat: no-repeat, repeat;
  background-position: right .7em top 50%, 0 0;
  background-size: .65em auto, 100%;}
		</style>
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
      
                
                 <div id="carga" style="width:100%;text-align: center;">
<Center><img class="img-responsive" src="img/loading-carga.gif" width="100px"><br><p style="font-size:12px; color:#EC0D36;"> Espere un momento, la consulta puede tardar unos minutos. </p></Center>
     </div>


        <?php if($ale=="yes"){ ?>
           <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <i class="material-icons">close</i>
            </button>
            <span>
              <b> Mensaje - </b> El se actualizo correctamente.</span>
          </div>
           <?php } ?>
           
           <?php if($mensajeB=="error2" and isset($_REQUEST['btnsearchbd']) ){ ?>
           <div class="alert alert-warning">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <i class="material-icons">close</i>
            </button>
            <span>
              <b> Mensaje - </b> debe de seleccionar un Año, Mes y Departamento como campos REQUERIDOS</span>
          </div>
           <?php } ?>
        
        <!-- <small><a href="rpt-acceso.php">Permisos Accesos</a> / <a href="buscauser.php">Buscar Ususario</a> / Nuevo Registro</small> -->
        <!-- form busqueda -->
        <div class="col-md-12">
<div class="card ">
    <div class="card-header card-header-info card-header-icon">
    <div class="card-icon">
                          <i class="material-icons">search</i>
                        </div>
                        <h4 class="card-title">Registro de Productos</h4>
    </div>
    <!--<form method="post" action="<?php //echo $_SERVER['PHP_SELF']; ?>">-->
    <form name="formreg" method="post" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <div class="card-body "> 
                              <div class="col-sm-12">
                                        <div class="row">
                                            
                                            
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                   <label for="exampleEmail" class="bmd-label-floating">Numero de Partida</label>
                                                    <input type="text" name="numpartida" class="form-control"  value="<?php echo "$datonomp1"; ?>" autofocus readonly />
                                                    <input type="hidden" name="codeid" class="form-control" value="<?php echo "$codi"; ?>"/>
                                                    
                                                </div>
                                            </div> 
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                   <!-- <label for="exampleEmail" class="bmd-label-floating">Producto Especifico</label>
                                                    <input type="text" name="produespe" class="form-control"  value="<?php echo "$datonomp2"; ?>" required  /> -->
													<select name='produespe' class="select-css" required>";
														<option value=''>Selec. Producto Especifico</option>
<?php
	$sqlnodo1 = "SELECT idprodu, nomprodu FROM producto WHERE estado='A' ORDER BY nomprodu";
	$rsndo1=$conexpg->query($sqlnodo1); 
if($rsndo1->num_rows>0){ 
while($finodo1=$rsndo1->fetch_array()){
             $nomprodu1= $finodo1['idprodu'];
	         $nomprodu2= $finodo1['nomprodu'];
	$giro1="";
	 if ($nomprodu2==$datonomp2){ $giro1='selected="selected"'; }else{$giro1='';}
	echo "<option value='$nomprodu2' $giro1>$nomprodu2</option>";
}
}else{
	echo "<option value=''>Sin Datos</option>";
}
?>
                
                    </select>
                                                    
                                                </div>
                                            </div>
                                            
                                            <!--<div class="col-md-4">
                                                <div class="form-group">
                                                   <label for="exampleEmail" class="bmd-label-floating">Producto Generico</label>
                                                    <input type="text" name="produgene" class="form-control"  value="<?php echo "$datonomp3"; ?>" required />
                                                </div>
                                            </div> -->
											
											<div class="col-md-3">
                                                <div class="form-group">
                                                   <!-- <label for="exampleEmail" class="bmd-label-floating">Presentaci&oacute;n</label>
                                                    <input type="text" name="produprese" class="form-control"  value="<?php echo "$datonomp4"; ?>" required /> -->
													<select name='produprese' class="select-css" required>";
														<option value=''>Selec. Presentaci&oacute;n</option>
													<?php
	$sqlnodo2 = "SELECT idprese, nompresenta FROM presentacion WHERE nompresenta<>'' AND estado='A' ORDER BY nompresenta";
	$rsndo2=$conexpg->query($sqlnodo2); 
if($rsndo2->num_rows>0){ 
while($finodo2=$rsndo2->fetch_array()){
             $nomprese1= $finodo2['idprese'];
	         $nomprese2= $finodo2['nompresenta'];
	$giro2="";
	 if ($nomprese2==$datonomp4){ $giro2='selected="selected"'; }else{$giro2='';}
	echo "<option value='$nomprese2' $giro2>$nomprese2</option>";
}
}else{
	echo "<option value=''>Sin Datos</option>";
}
?>
											</select>		
                                                </div>
                                            </div>
											
											
											<?php
											$query=$conexpg->query("select tipo from sectores group by tipo Order By tipo");
$countries = array();
while($r=$query->fetch_object()){ $countries[]=$r; }
											?>
											<div class="col-md-3">
                                                <div class="form-group">
                                                   <!--<label for="exampleEmail" class="bmd-label-floating">Tipo Sector</label>
                                                    <input type="text" name="tiposec" class="form-control"  value="<?php echo "$datonomp6"; ?>" required /> -->
													<select name='tiposec' class="select-css" id="tiposec"  required>";
														<option value=''>Selec. Tipo Sector</option>
														<?php foreach($countries as $c):?>
														<?php 
														$nomsecc = $c->tipo;
														$giro3="";
	 if ($nomsecc==$datonomp6){ $giro3='selected="selected"'; }else{$giro3='';}
														?>
      <option value="<?php echo $c->tipo; ?>" <?=$giro3;?> > <?php echo $c->tipo; ?></option>
<?php endforeach; ?>
														</select>
                                                </div>
                                            </div>
											
											<div class="col-md-3">
                                                <div class="form-group">
                                                   <!-- <label for="exampleEmail" class="bmd-label-floating">Sector</label> 
                                                    <input type="text" name="sector" class="form-control"  value="<?php echo "$datonomp7"; ?>" required />-->
													<select id="sector" class="select-css" name="sector" required>
														<?php
														if($datonomp7!=""){
														echo "<option value='$datonomp7'>$datonomp7</option>";	
														}else{
														?>
      <option value="">Seleccione Sector</option>
														<?php } ?>
   </select>
                                                </div>
                                            </div>
											
											
											<div class="col-md-3">
                                                <div class="form-group">
                                                   <!-- <label for="exampleEmail" class="bmd-label-floating">Subsector</label>
                                                    <input type="text" name="subsector" class="form-control"  value="<?php echo "$datonomp8"; ?>" required /> -->
													<select id="subsector" class="select-css" name="subsector">
														<?php
														if($datonomp8!=""){
														echo "<option value='$datonomp8'>$datonomp8</option>";	
														}else{
														?>
      <option value="">Seleccione Subsector</option>
														<?php } ?>
   </select>
                                                </div>
                                            </div>
											
											<!-- <div class="col-md-3">
                                                <div class="form-group">
                                                   <label for="exampleEmail" class="bmd-label-floating">Detalle Sector</label>
                                                    <input type="text" name="detasector" class="form-control"  value="<?php echo "$datonomp9"; ?>" required />
                                                </div>
                                            </div> -->
											
											<div class="col-md-4"><br>
                                                <div class="form-group">
                                                   <label for="exampleEmail" class="bmd-label-floating">Detalle Corto</label>
                                                    <input type="text" name="detacorto" class="form-control"  value="<?php echo "$datonomp11"; ?>" required />
                                                </div>
                                            </div>
											<div class="col-md-2"><br>
                                                <div class="form-group">
                                                   <!--<label for="exampleEmail" class="bmd-label-floating">Mostrar En Web</label>-->
                                                    <!--<input type="text" name="detacorto" class="form-control"  value="<?php //echo "$datonomp11"; ?>" required /> -->
													<input type="checkbox" name="vista" <?=$vsmarca;?> value="Si"> Mostrar en la Web Export <br>
													<input type="checkbox" name="vistados" <?=$vsmarcados;?> value="Si"> Mostrar en la Web Import
                                                </div>
                                            </div>
                                            
                                           <div class="col-md-6">
                                                <div class="form-group">
                                                   <!--<label for="exampleEmail" class="bmd-label-floating">Observacion</label>-->
                                                    <textarea name="observa" class="form-control" placeholder="Descripcion de partida" rows="5" required><?php echo "$datonomp5" ;?></textarea>
                                                </div>
                                            </div>
											
											<div class="col-md-3">
                                                   <br><br>
												<label for="exampleEmail" class="bmd-label-floating">Subir Imagen</label>
													<input type="file" name="file" class="form-control css-input" multiple accept="image/x-png, image/gif, image/jpeg, image/jpg" >
												<input type="hidden" name="foto" value="<?php echo "$datonomp10"; ?>">
                                            </div>
											
											<div class="col-md-3">
                                                <div class="form-group">
                                                  <p>Visualizar Imagen</p>
													<?php if($datonomp10!=""){ ?>
													<img class="img-responsive" src="imgproductos/<?=$datonomp10;?>" width="240px" >
													<?php }else{ echo ""; } ?>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-12">
                                            <center>

                                            <button type="submit" name="register" class="btn btn-fill btn-success">Actualizar <i class="material-icons">save</i></button>

                                            </center>
											</div>
                                       
                                        </div>
                                    </div>  
    </div>
    </form>
</div>
    </div>
        <!-- fin form busqueda -->
   <?php
if(isset($_POST['register'])){ 
 
//cargamos archivo 1
$fileTmpPath = $_FILES['file']['tmp_name'];
$fileName = $_FILES['file']['name'];
$fileSize = $_FILES['file']['size'];
$fileType = $_FILES['file']['type'];
$fileNameCmps = explode(".", $fileName);
$fileExtension = strtolower(end($fileNameCmps));
$dato16 = $_FILES['file']['name'];
$dato17 = $_POST["foto"];
	
$allowedfileExtensions = array('jpg', 'jpeg', 'png');
	if($dato16==""){
		$archiadju1 = $dato17;
	}else
if (in_array($fileExtension, $allowedfileExtensions)) {//si esta dentro de las extensiones de archivos permitidos
	
	//adjuntamos archivo
	if($dato16!=""){
		if ($_FILES['file']["error"] > 0){
      $archiadju1 = $dato17;
  }else{
	$carpeta_uploadspdf = 'imgproductos/';
		$nombre_archivopdf = basename($_FILES['file']['name']);
		$nombre_archivopdf = "partida_".uniqid().".".$fileExtension;
		$ruta_archivopdf = $carpeta_uploadspdf . $nombre_archivopdf;
		if (move_uploaded_file($_FILES['file']['tmp_name'], $ruta_archivopdf)) {
		$archiadju1 = $nombre_archivopdf;
			
			//eliminamos archivo
			if($dato17!=""){
    $archivo = $dato17;
    //$directorio = dirname(__FILE__);
	$directorio = $carpeta_uploadspdf;
    if(unlink($directorio.'/'.$archivo)){
        //header("Location: cargarImagen.php?accion=eliminado");
        //exit;
    }
    }
//fin eliminamos archivo
			
		} else {
			$archiadju1 = $dato17;//archivo
		}
  }
	}else{
		$archiadju1 = $dato17;
	}
}else{
	$archiadju1 = $dato17;
}
	
	//FIN cargamos archivo 1
$codeid = $_POST["codeid"];
 $Sql="UPDATE productos 
			SET 
			prod_especifico='".$_POST["produespe"]."',
			prod_generico='".$_POST["produgene"]."',
			presentacion='".$_POST["produprese"]."',
			partida_desc='".$_POST["observa"]."',
			tipo_sec='".$_POST["tiposec"]."',
			sector='".$_POST["sector"]."',
			subsector='".$_POST["subsector"]."',
			detalle_sector='".$_POST["detasector"]."',
			descri_corto='".$_POST["detacorto"]."',
			mostrar='".$_POST["vista"]."',
			mostrar2='".$_POST["vistados"]."',
			imgfoto='".$archiadju1."'
            WHERE idcod ='".$_POST["codeid"]."' ";
// strtoupper convierte a mayusculas
	 $rscrea2 = $conexpg->query($Sql) or die(mysqli_error($conexpg));
	 if (!$rscrea2) {
    echo "Query: Un error ha occurido al actualizar los datos, contactese con el administrador del sistema";
    //exit;
  }
   //pg_query($conexpg,$Sql); 
	 $ediale="yes";
  //echo"<script>location.href='rpt-acceso.php?by=$ediale'</script>";
   echo"<script>location.href='form-producto.php?log=$codeid&action=E&if==yes'</script>";
}
		  ?>
      </div> <!-- end col-md-12 -->
  </div> <!-- end row -->
                     
                      </div>
                    </div>
   
                    <?php include("footer.php"); ?>

            </div>
        </div>
    

<?php include("js.php"); ?>

 <script>
  $(document).ready(function(){
    // initialise Datetimepicker and Sliders
    md.initFormExtendedDatetimepickers();
    if($('.slider').length != 0){
      md.initSliders();
    }
  });
</script>
        
			
			<script type="text/javascript">
	$(document).ready(function(){
		$("#tiposec").change(function(){
			$.get("sql-lista-sector.php","tiposec="+$("#tiposec").val(), function(data){
				$("#sector").html(data);
				console.log(data);
			});
		});

		$("#sector").change(function(){
			$.get("sql-lista-subsectores.php","sector="+$("#sector").val(), function(data){
				$("#subsector").html(data);
				console.log(data);
			});
		});
	});
</script>    
    
<?php //cerrando conexion
	mysqli_close($conexpg); ?>
	


	
	
	</body>
</html>
