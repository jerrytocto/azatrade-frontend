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
$activerptacc ="active";
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

if($nuevo=="n"){/*si es nuevo*/
$query_resultado = "SELECT usuario.codusuario, usuario.login_usuario, usuario.nombre, usuario.apellido, usuario.direccion, usuario.empresa, usuario.fecha FROM usuario WHERE usuario.codusuario = '$codxxid'";
 /*$resultado_rpt = pg_query($query_resultado) or die("Error en la Consulta SQL datos del usuario de pago");
      $numReg_rpt = pg_num_rows($resultado_rpt);
      if($numReg_rpt>0){
         while ($fila_rpt=pg_fetch_array($resultado_rpt)) {*/
	$resultado_rpt=$conexpg->query($query_resultado); 
if($resultado_rpt->num_rows>0){ 
while($fila_rpt=$resultado_rpt->fetch_array()){
             $codi= $fila_rpt['codusuario'];
             $user1= $fila_rpt['login_usuario'];
             $nomb= $fila_rpt['nombre'];
             $apel= $fila_rpt['apellido'];
             $nomcomp= $nomb." ".$apel;
             }
             }

             }else{/*si no consulta datos para mostrar y editar*/
			 $q_resultado = "SELECT id_acceso, id_user, nom_user, nombres, monto, tipo_pago, fecha_pago, modo_pago, num_operacion, observacion, fe_activa, fe_vence, estado, fe_registro FROM pagos_acceso WHERE id_acceso = $codxxid ";
			 /*$r_rpt = pg_query($q_resultado) or die("Error en la Consulta SQL datos del usuario consultado");
      $n_rpt = pg_num_rows($r_rpt);
      if($n_rpt>0){
         while ($fila_r=pg_fetch_array($r_rpt)) {*/
	$r_rpt=$conexpg->query($q_resultado); 
if($r_rpt->num_rows>0){ 
while($fila_r=$r_rpt->fetch_array()){
             $id= $fila_r['id_acceso'];
			 $codi= $fila_r['id_user'];
             $user1x= $fila_r['id_user'];
             $user1= $fila_r['nom_user'];
             $nomcomp= $fila_r['nombres'];
             $monto_pag= $fila_r['monto'];
			 $tip_promo= $fila_r['tipo_pago'];
			 
			 $fe_pa= $fila_r['fecha_pago'];
			 $f_pago=date("d/m/Y",strtotime($fe_pa));
			 
			 $tipo_pag= $fila_r['modo_pago'];
			 $num_op= $fila_r['num_operacion'];
			 $obse= $fila_r['observacion'];
			 
			 $fe_ac= $fila_r['fe_activa'];
			 $f_acti=date("d/m/Y",strtotime($fe_ac));
			 
			 $fe_ve= $fila_r['fe_vence'];
			 $f_vence=date("d/m/Y",strtotime($fe_ve));
			 
             }
             }

             }
//fecha pago
/*if($fe_pa!=""){
	$fe_pa = $fe_pa;
}else{

$fec1=explode("/",$fechahoysys);
                    $fec1[0];//dato del año
                    $fec1[1];//dato del mes
                    $fec1[2];//dato del dia
	
	//$fe_pa = $fec1[0]."/".$fec1[1]."/".$fec1[2];
	//$fe_pa = "26/06/2018";
	$fe_pa = $fechahoysys;
}
//fecha activa
if($fe_ac!=""){
	$fe_ac = $fe_ac;
}else{
	$fe_ac = $fechahoysys;
}
//fecha vence
if($fe_ve!=""){
	$fe_ve = $fe_ve;
}else{
	$fe_ve = $fechahoysys;
}*/
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


        <?php if($ale=="ok"){ ?>
           <div class="alert alert-warning">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <i class="material-icons">close</i>
            </button>
            <span>
              <b> Mensaje - </b> El Usuario <b><?php echo "$nomb"; ?></b> ya tiene cuenta Activada.</span>
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
        
        <small><a href="rpt-acceso.php">Permisos Accesos</a> / <a href="buscauser.php">Buscar Ususario</a> / Nuevo Registro</small>
        <!-- form busqueda -->
        <div class="col-md-12">
<div class="card ">
    <div class="card-header card-header-info card-header-icon">
    <div class="card-icon">
                          <i class="material-icons">search</i>
                        </div>
                        <h4 class="card-title">Ingresar datos para dar acceso a este usuario</h4>
    </div>
    <!--<form method="post" action="<?php //echo $_SERVER['PHP_SELF']; ?>">-->
    <form name="formreg" method="post" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <div class="card-body "> 
                              <div class="col-sm-12">
                                        <div class="row">
                                            
                                            
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                   <label for="exampleEmail" class="bmd-label-floating">Codigo User</label>
                                                    <input type="text" name="codigo_user" class="form-control"  value="<?php echo "$codi"; ?>" readonly />
                                                    <input type="hidden" name="accion" class="form-control" value="<?php echo "$nuevo"; ?>"/>
                                                    <input type="hidden" name="log" class="form-control" value="<?php echo "$codxxid"; ?>"/>
                                                    <input type="hidden" name="action" class="form-control" value="<?php echo "$nuevo"; ?>"/>
                                                </div>
                                            </div> 
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                   <label for="exampleEmail" class="bmd-label-floating">Usuario</label>
                                                    <input type="text" name="usuari" class="form-control"  value="<?php echo "$user1"; ?>" autofocus readonly />
                                                    
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                   <label for="exampleEmail" class="bmd-label-floating">Nombres</label>
                                                    <input type="text" name="Nombre" class="form-control"  value="<?php echo "$nomcomp"; ?>" autofocus readonly />
                                                </div>
                                            </div>
                                             
                                            
                                           
                                            
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                   <!--<label for="exampleEmail" class="bmd-label-floating">Tipo Pan</label>-->
                                                    <select name='tipo_promo' class='selectpicker' data-size='7' data-style='btn btn-info btn-round' required>";
                <?php if($tip_promo!=""){ ?>
               <option value="<?=$tip_promo;?>"><?=$tip_promo;?></option>
                <?php }else{ ?>
                <option value="">Selec. Plan</option>
                <?php } ?>
                <option value="Plan Basico">Plan Basico</option>
                <option value="Plan Pro">Plan Pro</option>
                <option value="Plan Premiun">Plan Premiun</option>
                <option value="Cortesia">Cortesia</option>
                    </select>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                   <!--<label for="exampleEmail" class="bmd-label-floating">Num. Operacion</label>-->
                                                    <select name='tpago' class='selectpicker' data-size='7' data-style='btn btn-info btn-round' required>";
                <?php if($tipo_pag!=""){ ?>
               <option value="<?=$tipo_pag;?>"><?=$tipo_pag;?></option>
                <?php }else{ ?>
                <option value="">Selec. Pago</option>
                <?php } ?>
                <option value="Deposito">Deposito</option>
                <option value="Efectivo">Efectivo</option>
                <option value="Transferencia">Transferencia</option>
                <option value="Cortesia">Cortesia</option>
                    </select>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                   <label for="exampleEmail" class="bmd-label-floating">Monto S/.</label>
                                                    <input type="text" name="monto" class="form-control"  value="<?php echo "$monto_pag"; ?>" onKeyPress="return justNumbers(event);" />
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                   <label for="exampleEmail" class="bmd-label-floating">Num. Operacion</label>
                                                    <input type="text" name="numoperacion" class="form-control"  value="<?php echo "$num_op"; ?>" onKeyPress="return justNumbers(event);" />
                                                </div>
                                            </div>
                                            
                                            
                                            
                                            <div class="col-md-3">
                                               <label for="exampleEmail" class="bmd-label-floating">Fecha Pago</label>
                                                <div class="form-group">
                                                    <input type="date" name="Fecha_pago" class="form-control" value="<?=$fe_pa;?>" required />
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-3">
                                               <label for="exampleEmail" class="bmd-label-floating">Fecha Activacion</label>
                                                <div class="form-group">
                                                    <input type="date" name="Fecha_acti" class="form-control" value="<?php echo "$fe_ac"; ?>" required />
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-3">
                                               <label for="exampleEmail" class="bmd-label-floating">Fecha Vencimiento</label>
                                                <div class="form-group">
                                                    <input type="date" name="Fecha_ven" class="form-control" value="<?=$fe_ve;?>" required />
                                                </div>
                                            </div>
                                            
                                           <div class="col-md-12">
                                                <div class="form-group">
                                                   <!--<label for="exampleEmail" class="bmd-label-floating">Observacion</label>-->
                                                    <textarea name="observa" class="form-control" placeholder="Ingrese algun comentario" rows="3"><?php echo "$obse" ;?></textarea>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-2">
                                            <center>

                                            <button type="submit" name="register" class="btn btn-fill btn-success">Registrar <i class="material-icons">save</i></button>

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
 
 $accion = $_POST["accion"];

 $cuser_u = $_POST["codigo_user"];
 $user_u = $_POST["usuari"];
 $correousuen = strtolower($_POST["usuari"]);
 $nom_u = $_POST["Nombre"];
 $tpro_u  =$_POST["tipo_promo"];
 $mon_u = $_POST["monto"];
 $numopera_u = $_POST["numoperacion"];
 $tp_u = $_POST["tpago"];
 $fp_u = $_POST["Fecha_pago"];
 $fa_u = $_POST["Fecha_acti"];
 $fv_u = $_POST["Fecha_ven"];
 $obse_u = $_POST["observa"];
 
  if($accion=="n"){/*si es N = nuevo registro*/
 
 /*verificamos si usuario ya esta registrado con pago*/
 $sql_r="SELECT id_acceso, id_user, nom_user, nombres, estado FROM pagos_acceso WHERE id_user = '$cuser_u' AND nom_user = '$user_u' AND estado='Activo' ";
 /*$resu_r = pg_query($conexpg,$sql_r) or die("Error en la Consulta SQL Reporte");
      $num_r = pg_num_rows($resu_r);
	  if($num_r>0){
		   while ($fila_r=pg_fetch_array($resu_r)) {*/
	  $resu_r=$conexpg->query($sql_r); 
if($resu_r->num_rows>0){ 
while($fila_r=$resu_r->fetch_array()){
			   $usu_con= $fila_r['id_user'];
			   $nom_con= $fila_r['nom_user'];
			   $nom_con2= $fila_r['nombres'];
			    //echo "$usu_con $nom_con";
			  echo"<script>location.href='form-acceso.php?log=$cuser_u&action=n&if=ok'</script>";
		   }
	  }else{/*si no hay usuario activo lo registramos como nuevo*/
	  
	 $Sql_inser="insert into pagos_acceso (id_user, nom_user, nombres, monto, tipo_pago, fecha_pago, modo_pago, num_operacion, observacion, fe_activa, fe_vence, estado, fe_registro
)  values (
'".$_POST["codigo_user"]."',
'".$_POST["usuari"]."',
'".$_POST["Nombre"]."',
'".$_POST["monto"]."',
'".$_POST["tipo_promo"]."',
'".$_POST["Fecha_pago"]."',
'".$_POST["tpago"]."',
'".$_POST["numoperacion"]."',
'".$_POST["observa"]."',
'".$_POST["Fecha_acti"]."',
'".$_POST["Fecha_ven"]."',
'Activo',
now())";
	$rscrea2 = $conexpg->query($Sql_inser);
   //pg_query($conexpg,$Sql_inser); 
   
   //para mandar correo de registro de confirmacion
      //include("avisa_acceso_correo.php");
   $regale="ok";
   echo"<script>location.href='rpt-acceso.php?by=$regale'</script>";
		  
	  }
	  
 }/*fin si es N*/
 
 /*modificacion de registro*/
 if($accion==""){

 $Sql="UPDATE pagos_acceso 
			SET 
			monto='".$_POST["monto"]."',
			fecha_pago='".$_POST["Fecha_pago"]."',
			modo_pago='".$_POST["tpago"]."',
			num_operacion='".$_POST["numoperacion"]."',
			observacion='".$_POST["observa"]."',
			fe_activa='".$_POST["Fecha_acti"]."',
			fe_vence='".$_POST["Fecha_ven"]."'
            WHERE id_acceso ='".$_POST["log"]."' ";
// strtoupper convierte a mayusculas
	 $rscrea2 = $conexpg->query($Sql) or die(mysqli_error($conexpg));
	 if (!$rscrea2) {
    echo "Query: Un error ha occurido al crear insercion  tabla Temporal";
    //exit;
  }
   //pg_query($conexpg,$Sql); 
	 $ediale="yes";
  echo"<script>location.href='rpt-acceso.php?by=$ediale'</script>";
   
 /*fin modificacion de registro*/
 }
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
        
        
    
<?php //cerrando conexion
	mysqli_close($conexpg); ?>
	


	
	
	</body>
</html>
