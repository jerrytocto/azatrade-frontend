<?php
session_start();
if (isset($_SESSION['login_usuario'])){
}else{
	if(!isset($_SESSION["login_usuario"]) || $_SESSION["login_usuario"]==null){
	//print "<script>alert('Acceso invalido! - Inicia Sesion para Acceder');window.location='$enlace_actual';</script>";
	//print "<script>window.location='index.php';</script>";
}
}
$linkpage = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
include("incBD/inibd.php");
set_time_limit(750);
$activebusdeta ="active";

/*$query = "SELECT * FROM departamento ORDER BY nombre";
	$resultado=pg_query($query);*/

$wv1 = trim($_POST['selecmes']);//mes
$vardepa = trim($_POST["depa"]); //departamento
$wv3 = trim($_POST['pais']);//mercado
$wv4 = trim($_POST['aduana']);//aduana
$wv5 = trim($_POST['ruce']);//ruc
$varche=$_POST['marcacheck'];//check por numero de partida
					  if($varche=="1"){
						  $mar = "checked";
						  $ocu ="";
						  $de2=$_POST['numpar'];
					  }else{
						  $mar = "";
						  $ocu = "style='display:none;'";
						  $de2="";
					  }
$wv6 = trim($_POST['numpar']);//numero partida

if($varche=="1" and $wv6==""){//si esta marcado y es vacio
	$mensajeA="error1";
}else if($varche=="1" and $wv6!=""){
	$siejecuta="si";
}
else if($wv1=="" or $vardepa==""){
	$mensajeB="error2";
}else if($wv1!="" and $vardepa!=""){
	$siejecuta="si";
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
<link rel="stylesheet" href="css/material-dashboard.min.css?v=2.0.1">
<link rel="stylesheet" href="css/buttons.dataTables.min.css">
<link href="css/demo.css" rel="stylesheet"/>

<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.1.min.js"></script>

<!--<script language="javascript">
			$(document).ready(function(){
				$("#cbx_estado").change(function () {
 
					$('#cbx_localidad').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
					
					$("#cbx_estado option:selected").each(function () {
						id_estado = $(this).val();
						$.post("includes/getMunicipio.php", { id_estado: id_estado }, function(data){
							$("#cbx_municipio").html(data);
						});            
					});
				})
			});
			
			$(document).ready(function(){
				$("#cbx_municipio").change(function () {
					$("#cbx_municipio option:selected").each(function () {
						id_municipio = $(this).val();
						$.post("includes/getLocalidades.php", { id_municipio: id_municipio }, function(data){
							$("#cbx_localidad").html(data);
						});            
					});
				})
			});
		</script>-->
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
 
<script language="JavaScript">
function mostrarOcultar(id){
var elemento = document.getElementById(id);
if(!elemento) {
return true;
}
if (elemento.style.display == "none") {
elemento.style.display = "block"
} else {
elemento.style.display = "none"
};
return true;
};
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
      
                <?php if(isset($_REQUEST['btnsearchbd'])){ ?>
                 <div id="carga" style="width:100%;text-align: center;">
<Center><img class="img-responsive" src="img/loading-carga.gif" width="100px"><br><p style="font-size:12px; color:#EC0D36;"> Espere un momento, la consulta puede tardar unos minutos. </p></Center>
     </div>
               <?php } ?>

        <?php if($mensajeA=="error1"){ ?>
           <div class="alert alert-warning">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <i class="material-icons">close</i>
            </button>
            <span>
              <b> Mensaje - </b> debe de seleccionar un Año y ingresar el numero de partida como campos REQUERIDOS</span>
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
        
        <!-- form busqueda -->
        <div class="col-md-12">
<div class="card ">
    <div class="card-header card-header-info card-header-icon">
    <div class="card-icon">
                          <i class="material-icons">search</i>
                        </div>
                        <h4 class="card-title">Seleccionar campos requeridos para realizar una busqueda avanzada</h4>
    </div>
    <!--<form method="post" action="<?php //echo $_SERVER['PHP_SELF']; ?>">-->
    <form name="fvalida" method="post" action="<?php echo "$linkpage"; ?>">
    <div class="card-body "> 
                              <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                <label>Selec. Año <font color="#EF4144">(*)</font></label>
<select name='selecanios' class='selectpicker' data-size='7' data-style='btn btn-info btn-round' required>";
               <option value="">A&ntilde;o</option>
                <option value="2019" <?php if($_POST['selecanios']=="2019"){echo "selected";}?>>2019</option>
                <option value="2018" <?php if($_POST['selecanios']=="2018"){echo "selected";}?>>2018</option>
                <option value="2017" <?php if($_POST['selecanios']=="2017"){echo "selected";}?>>2017</option>
                <option value="2016" <?php if($_POST['selecanios']=="2016"){echo "selected";}?>>2016</option>
                <option value="2015" <?php if($_POST['selecanios']=="2015"){echo "selected";}?>>2015</option>
                <option value="2014" <?php if($_POST['selecanios']=="2014"){echo "selected";}?>>2014</option>
                <option value="2013" <?php if($_POST['selecanios']=="2013"){echo "selected";}?>>2013</option>
                <option value="2012" <?php if($_POST['selecanios']=="2012"){echo "selected";}?>>2012</option>
                    </select>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                <label>Selec. Mes <font color="#EF4144">(*)</font></label>
<select name='selecmes' class='selectpicker' data-size='7' data-style='btn btn-info btn-round'>";
                <option value="" <?php if($_POST['selecmes']==""){echo "selected";}?>>Mes</option>
                <option value="1" <?php if($_POST['selecmes']=="1"){echo "selected";}?>>Enero</option>
                <option value="2" <?php if($_POST['selecmes']=="2"){echo "selected";}?>>Febrero</option>
                <option value="3" <?php if($_POST['selecmes']=="3"){echo "selected";}?>>Marzo</option>
                <option value="4" <?php if($_POST['selecmes']=="4"){echo "selected";}?>>Abril</option>
                <option value="5" <?php if($_POST['selecmes']=="5"){echo "selected";}?>>Mayo</option>
                <option value="6" <?php if($_POST['selecmes']=="6"){echo "selected";}?>>Junio</option>
                <option value="7" <?php if($_POST['selecmes']=="7"){echo "selected";}?>>Julio</option>
                <option value="8" <?php if($_POST['selecmes']=="8"){echo "selected";}?>>Agosto</option>
                <option value="9" <?php if($_POST['selecmes']=="9"){echo "selected";}?>>Septiembre</option>
                <option value="10" <?php if($_POST['selecmes']=="10"){echo "selected";}?>>Octubre</option>
                <option value="11" <?php if($_POST['selecmes']=="11"){echo "selected";}?>>Noviembre</option>
                <option value="12" <?php if($_POST['selecmes']=="12"){echo "selected";}?>>Diciembre</option>
                   
                    </select>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                <label>Selec. Departamento <font color="#EF4144">(*)</font></label>
                                                                               <?php
echo "<select name='depa' class='selectpicker' data-size='7' data-style='btn btn-info btn-round'>"; 
if ($vardepa!=''){
	echo"<option value=''>Todos</option>";
					/*$queryd = "SELECT iddepartamento, nombre FROM departamento ORDER BY nombre";
$resultd = pg_query ($queryd) or die ("Error en la Consulta SQL");
while ($filad = pg_fetch_array ($resultd)) {*/
	$queryd = mysqli_query($conexpg,"SELECT iddepartamento, nombre FROM departamento ORDER BY nombre");
	while($filad=mysqli_fetch_array($queryd))
extract ($filad);

echo '<option value="'.$filad["iddepartamento"].'"';
if($_POST["depa"]==$filad["iddepartamento"]) echo " selected"; //con el espacio antes de "selected"
  echo '>'.$filad["nombre"].'</option>';   
//}
}else{
	
	echo"<option value=''>Todos</option>";
	
	//$sqlxd="SELECT iddepartamento, nombre FROM departamento ORDER BY nombre";
	$sqlxd = mysqli_query($conexpg,"SELECT iddepartamento, nombre FROM departamento ORDER BY nombre");
}
					
					/*$resultadoxd=pg_query($sqlxd); 
					while ($filaxd=pg_fetch_row($resultadoxd))*/
					while($filaxd=mysqli_fetch_array($sqlxd))
					{ 
						echo "<option value='$filaxd[0]'>$filaxd[1]"; 
					}
					echo "</select>";?>                     
                                                
                <!--<select name="cbx_estado" id="cbx_estado" class='selectpicker' data-size='7' data-style='btn btn-info btn-round' title='Departamentos'>
				<option value="">Departamento</option>
				<?php //while($row = pg_fetch_assoc($resultado)) { ?>
					<option value="<?php //echo $row['iddepartamento']; ?>"><?php //echo $row['nombre']; ?></option>
				<?php //} ?>
			</select>-->
            
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="form-group">
                                                   <label>Selec. Pa&iacute;s</label>
                                                   <?php $medx2 = $_POST["pais"]; ?>
                                                    <?php
echo "<select name='pais' class='selectpicker' data-size='7' data-style='btn btn-info btn-round' title='Todos'>"; 
if ($medx2!=''){
	echo"<option value=''>Todo</option>";
	/*$querypro = "SELECT paises.idpaises, paises.espanol FROM paises ORDER BY paises.espanol ASC";
$resultpro = pg_query ($querypro) or die ("Error en la Consulta SQL");
while ($filapro = pg_fetch_array ($resultpro)) {*/
$querypro = mysqli_query($conexpg,"SELECT paises.idpaises, paises.espanol FROM paises ORDER BY paises.espanol ASC");
	while($filapro=mysqli_fetch_array($querypro))
extract ($filapro);

echo '<option value="'.$filapro["idpaises"].'"';
if($_POST["pais"]==$filapro["idpaises"]) echo " selected"; //con el espacio antes de "selected"
  echo '>'.$filapro["espanol"].'</option>';   
//}
}else{
	
	echo"<option value=''>Todos</option>";
	
	//$sqlx="SELECT paises.idpaises, paises.espanol FROM paises ORDER BY paises.espanol ASC";
	$sqlx = mysqli_query($conexpg,"SELECT paises.idpaises, paises.espanol FROM paises ORDER BY paises.espanol ASC");
}
					
					/*$resultadox=pg_query($sqlx); 
					while ($filax=pg_fetch_row($resultadox))*/
					while($filax=mysqli_fetch_array($sqlx))
					{ 
						echo "<option value='$filax[0]'>$filax[1]"; 
					}
					echo "</select>";?>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                <label>Selec. Aduanas</label>
                                                <?php $varadua = $_POST["aduana"]; ?>
<?php
echo "<select name='aduana' class='selectpicker' data-size='7' data-style='btn btn-info btn-round' title='Todos'>"; 
if ($varadua!=''){
	echo"<option value=''>Todo</option>";
/*$querypro = "SELECT aduana.codadu, aduana.descripcion FROM aduana ORDER BY aduana.descripcion ASC";
$resultpro = pg_query ($querypro) or die ("Error en la Consulta SQL");
while ($filapro = pg_fetch_array ($resultpro)) {*/
	$querypro = mysqli_query($conexpg,"SELECT aduana.codadu, aduana.descripcion FROM aduana ORDER BY aduana.descripcion ASC");
	while($filapro=mysqli_fetch_array($querypro))
extract ($filapro);

echo '<option value="'.$filapro["codadu"].'"';
if($_POST["aduana"]==$filapro["codadu"]) echo " selected"; //con el espacio antes de "selected"
  echo '>'.$filapro["descripcion"].'</option>';   
//}
}else{
	
	echo"<option value=''>Todos</option>";
	
	//$sqlx="SELECT aduana.codadu, aduana.descripcion FROM aduana ORDER BY aduana.descripcion ASC";
	$sqlx = mysqli_query($conexpg,"SELECT aduana.codadu, aduana.descripcion FROM aduana ORDER BY aduana.descripcion ASC");
}
					
					//$resultadox=pg_query($sqlx); 
					//while ($filax=pg_fetch_row($resultadox))
					while($filax=mysqli_fetch_array($sqlx))
					{ 
						echo "<option value='$filax[0]'>$filax[1]"; 
					}
					echo "</select>";?>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-3">
                                               <?php $daa=$_POST['ruce']; ?>
                                                <div class="form-group">
                                                   <label for="exampleEmail" class="bmd-label-floating">Ruc Empresa</label>
                                                    <input type="text" name="ruce" class="form-control"  value="<?php echo"$daa";?>"  onKeyPress="return justNumbers(event);" />
                                                </div>
                                            </div> 
                                             <div class="col-md-3">
                                                <div class="form-group">
<div class="form-check">
                  <label class="form-check-label">
                    <input class="form-check-input" name="marcacheck" type="checkbox" value="1" <?=$mar;?> onclick="return mostrarOcultar('ocultable')"> Buscar Por N&uacute;mero Partida
                    <span class="form-check-sign">
                      <span class="check"></span>
                    </span>
                  </label>
                                                </div>
                                            </div>
                                            </div>
                                            
                                            <div class="col-md-3" id="ocultable" <?=$ocu;?> >
                                                <div class="form-group">
                                                <input type="text" name="numpar" class="form-control" placeholder="Numero Partida" value="<?php echo"$de2";?>" onKeyPress="return justNumbers(event);" />
                                                <!--<small><font color="#EC0000"> Si n&uacute;mero de partida empieza con "0" no considerar el "0" adelante.</font></small>-->
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-12">
                                               <?php $de1=$_POST['descri1']; ?>
                                                <div class="form-group">
                                                    <input type="text" name="descri1" class="form-control" placeholder="Descripci&oacute;n del Producto" value="<?php echo"$de1";?>"  />
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-2">
                                            <center>
                                            <?php if (isset($_SESSION['login_usuario'])){ ?>
                                            <button type="submit" name="btnsearchbd" class="btn btn-fill btn-success">Consultar <i class="material-icons">search</i></button>
                                            <?php }else{ ?>
                                            <a class="btn btn-fill btn-success" data-toggle='modal' data-target='#myModalA'><font color="#FFFFFF"> Consultar <i class="material-icons">search</i> </font></a>
                                            <?php } ?>
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
if(isset($_REQUEST['btnsearchbd']) and $siejecuta=="si"){
	
	$condi = $_SESSION['acceso_pago'];
if($condi=='SI' or $condi=='NO' and $_SESSION['rol']=='ADMIN'){//tiene o no pago y es admin visualiza
	$axe = "SI";
	$limite="";
}else if($condi=='NO' and $_SESSION['rol']<>'ADMIN'){//no tiene pago y no es admin limita 5 registros
	$axe = "NO";
	$limite="LIMIT 5";
}else if($condi=='SI' and $_SESSION['rol']<>'ADMIN'){//si tiene pago y no es admin visualiza todo
	$axe = "SI";
	$limite="";
}
$wherefecha1 ="e.FNUM";
$partida = $de2;
$empresa = $wv5;
$provincias = "%";
$distrito = "%"; 
$pais = $wv3;
$aduana = $wv4;
$unitransp = "%";
$vtransp = "%";
$unidmed = "%";
$unidmedcomer = "%";

$year=$_REQUEST['selecanios'];
if($year == trim("")){
	$year="%";
}else{
	$year=$_REQUEST['selecanios'];
}

$depa = $_POST["depa"];

	$mes = $wv1;
if($mes==""){
	$mes="%";
}else{
if($mes=='1'){$des_mes="Mes: Enero";}
if($mes=='2'){$des_mes="Mes: Febrero";}
if($mes=='3'){$des_mes="Mes: Marzo";}
if($mes=='4'){$des_mes="Mes: Abril";}
if($mes=='5'){$des_mes="Mes: Mayo";}
if($mes=='6'){$des_mes="Mes: Junio";}
if($mes=='7'){$des_mes="Mes: Julio";}
if($mes=='8'){$des_mes="Mes: Agosto";}
if($mes=='9'){$des_mes="Mes: Septiembre";}
if($mes=='10'){$des_mes="Mes: Octubre";}
if($mes=='11'){$des_mes="Mes: Noviembre";}
if($mes=='12'){$des_mes="Mes: Diciembre";}
}

if($partida==trim("")){
$partida="%";
}else{
$partida = $partida;
}

if($pais==trim("")){
$pais="%";
}else{
$pais = $wv3;
}
	
if($aduana==trim("")){
$aduana="%";
}else{
$aduana = $wv4;
}
	
if($empresa==trim("")){
$empresa="%";
}else{
$empresa = $wv5;
}

if($depa == trim("")){
	$depa="%";
}else{
		$depa = $vardepa;
}

$provincias="%";
$distrito="%";
$value="%";
$value2="%";
$descri1x = trim($_POST['descri1']);
if($descri1x==""){
	$campode = "%";
}else{
	$campode = $_POST['descri1'];
}
$like="(coalesce(e.dcom,'') ||' '|| coalesce(e.dmer2,'') ||' '|| coalesce(e.dmer3,'') ||' '|| coalesce(e.dmer4,'') ||' '|| coalesce(e.dmer5,'') ilike '".$campode."')";
	
	if($axe=='NO'){ 
          echo"<div class='alert alert-warning alert-with-icon' data-notify='container'>
            <i class='material-icons' data-notify='icon'>notifications</i>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <i class='material-icons'>info</i>
            </button>
            <span data-notify='message'><h3>Versión GRATUITA!. Limitada en solo los 5 primeros registros, si quieres ver toda la información consultada adquiere uno de nuestros <a href='../../planes/' target='_blank'>PLANES AQUI</a></h3></span>
          </div>";
           }
	
	//echo"año:$year - mes:$mes - depa:$depa - Pais:$pais  - Aduana:$aduana  - ruc:$empresa  - partida:$partida  - descri:$campode ";
	
	//if($bus1!="" and $bus2!=""){//si ambos tienen datos realiza la consulta
	
	$sqlgral = "SELECT
YEAR(".$wherefecha1.") as anio,
MONTH(".$wherefecha1.") as mes,
e.FNUM,
e.NDCL,
e.CADU,
e.FEMB,
e.NDOC,
e.DNOMBRE,
e.DDIRPRO,
e.UBIGEO,
e.PART_NANDI,
e.NSER,
e.CPAIDES,
e.CPUEDES,
e.CVIATRA,
e.DMAT,
e.NCON,
e.CAGE,
'aa' as agente,
e.CALM,
e.VFOBSERDOL,
e.VPESNET,
e.VPESBRU,
e.QUNIFIS,
e.TUNIFIS,
e.QUNICOM,
e.TUNICOM,
CONCAT(e.DCOM,' ',e.DMER2,' ',e.DMER3,' ',e.DMER4,' ',e.DMER5) AS dcom,
substring(e.ubigeo,1,2),
substring(e.ubigeo,3,2),
substring(e.ubigeo,5,2),
a.descripcion AS aduana,
em.descripcion AS estmercancia,
p.espanol AS paisdestino,
pu.puerto,
vt.descripcion AS viatransporte,
ba.banco,
'ss' AS sector,
uu.descripcion AS undmedida,
ubi.nombredistrito,
ubi.nombreprov,
ubi.nombredepartamento,
recint_aduaner.razon_social as recinto_aduanero,
(case e.cunitra 
		when '1' then 'BARCO' 
		when '4' then 'AVION' 
		when '6' then 'FERROCARRIL' 
		when '7' then 'CAMION' 
		when '8' then 'POR TUBERIAS' 
	else 'OTRAS' end) as unidadtransporte,
(case e.vpesnet when 0 then 0 else (e.vfobserdol/e.vpesnet) end) as pesounitkg,
	(case e.qunifis when 0 then 0 else (e.vfobserdol/e.qunifis) end) as preciounitxundmedida,
	(case e.qunicom when 0 then 0 else (e.vfobserdol/e.qunicom) end) as preciounitxunidcomercial,
	(case e.vpesnet when 0 then 0 else (e.vpesbru/e.vpesnet) end) as pesoenvaseyembalaje
FROM
exportacion AS e
LEFT JOIN aduana AS a ON e.CADU = a.codadu
LEFT JOIN estmercancia AS em ON e.CEST = em.idestmercancia
LEFT JOIN paises AS p ON e.CPAIDES = p.idpaises
LEFT JOIN puerto AS pu ON e.CPUEDES = pu.idcodigo
LEFT JOIN viastransporte AS vt ON e.CVIATRA = vt.idviastransporte
LEFT JOIN banco AS ba ON substring(e.centfin,2,2)= ba.idbanco
LEFT JOIN unidmedida AS uu ON e.TUNIFIS = uu.idunidmedida
LEFT JOIN ubigeo AS ubi ON e.UBIGEO = ubi.cubigeo
LEFT JOIN (select idrecintaduaner, razon_social from recintaduaner group by idrecintaduaner, razon_social)as recint_aduaner On (recint_aduaner.idrecintaduaner=e.calm)
WHERE

e.PART_NANDI like '%".$partida."%'
  and YEAR(".$wherefecha1.") like '%".$year."%'
  and MONTH(".$wherefecha1.") like '%".$mes."%'
	and e.CADU like '%".$aduana."%'
	and e.NDOC like '%".$empresa."%'
	and substring(e.UBIGEO,1,2) like '%".$depa."%'
	and substring(e.UBIGEO,3,2) like '%'
	and substring(e.UBIGEO,5,2) like '%'
and CONCAT(e.DCOM,' ',e.DMER2,' ',e.DMER3,' ',e.DMER4,' ',e.DMER5) like '%".$campode."%'	
	and e.CPAIDES like '%".$pais."%'
	and e.CPUEDES like '%'
	and e.CUNITRA like '%'
	and e.CVIATRA like '%'
	and e.CAGE like '%'
	and e.TUNIFIS like '%'
	and e.TUNICOM like '%' ".$limite."  ";

	$res_gral=$conexpg->query($sqlgral); 
if($res_gral->num_rows>0){
		  echo"<div class='card'>";
		  echo"<div class='card-header card-header-info card-header-icon'>
              <div class='card-icon'>
                <i class='material-icons'>assignment</i>
              </div>
              <h4 class='card-title badge-info'><font color='#ffffff'>..:: <b>Resultado de la Busqueda</b>  ::.. </font></h4>
            </div>";
		  echo"<div class='card-body'>
                  <div class='toolbar'>
                      <!--  Aquí puede escribir botones / acciones adicionales para la barra de herramientas  -->
                  </div>";
		  echo"<div class='material-datatables'>";
		  echo"<table id='datatables' class='table table-striped table-no-bordered table-hover' cellspacing='0' width='100%' style='width:100%'>";
		  echo"<thead>
                          <tr>
   <th>#</th>
   <th>A&ntilde;o</th>
   <th>Fecha</th>
   <th>Aduana</th>";
if($axe == "SI"){
   echo"<th>Dua</th>";
}
   echo"<th>N#. Doc.</th>
   <th>Empresa</th>
   <th>Direcci&oacute;n</th>
   <th>Departamento</th>
   <th>Provincia</th>
   <th>Distrito</th>
   <th>N#. Partida</th>
   <th>Descrip.&nbsp;Prod.</th>
   <th>Pais</th>
   <th>Puerto</th>
   <th>Via Transp.</th>
   <th>Unid. Transp.</th>
   <th>Descrip. Transp.</th>
   <th>Agente</th>
   <th>Recinto Aduanero</th>
   <th>Banco</th>
   <th>Valor Fob.</th>
   <th>Peso Neto</th>
   <th>Peso Bruto</th>
   <th>Cant. Exportada</th>
   <th>Unid. Medida</th>
   <th>Cant. Comercial(Kg)</th>
   <th>Unid. Comerc.</th>
   <th>Precio Unit.(x Kg)</th>
   <th>Precio Unit. (x Unid.Med.)</th>
   <th>Precio Unit. (x Unid.Comerc.)</th>
   <th>Peso (Envase/Embalaje)</th>
   <th>Sector</th>
                          </tr>
                      </thead>";
		  echo"<tfoot>
                          <tr>
   <th>#</th>
   <th>A&ntilde;o</th>
   <th>Fecha</th>
   <th>Aduana</th>";
	if($axe == "SI"){	  
   echo"<th>Dua</th>";
	}
   echo"<th>N#. Doc.</th>
   <th>Empresa</th>
   <th>Direcci&oacute;n</th>
   <th>Departamento</th>
   <th>Provincia</th>
   <th>Distrito</th>
   <th>N#. Partida</th>
   <th>Descrip.&nbsp;Prod.</th>
   <th>Pais</th>
   <th>Puerto</th>
   <th>Via Transp.</th>
   <th>Unid. Transp.</th>
   <th>Descrip. Transp.</th>
   <th>Agente</th>
   <th>Recinto Aduanero</th>
   <th>Banco</th>
   <th>Valor Fob.</th>
   <th>Peso Neto</th>
   <th>Peso Bruto</th>
   <th>Cant. Exportada</th>
   <th>Unid. Medida</th>
   <th>Cant. Comercial(Kg)</th>
   <th>Unid. Comerc.</th>
   <th>Precio Unit.(x Kg)</th>
   <th>Precio Unit. (x Unid.Med.)</th>
   <th>Precio Unit. (x Unid.Comerc.)</th>
   <th>Peso (Envase/Embalaje)</th>
   <th>Sector</th>
                          </tr>
                      </tfoot>";
		  echo"<tbody>";
		  //while ($fila_parti=pg_fetch_array($res_gral)) {
		 while($fila_parti=$res_gral->fetch_array()){ 
			  $itte = $itte + 1;
		   $annio = $fila_parti['anio'];
	  $fecha = $fila_parti['FNUM'];
	   $adua = $fila_parti['aduana'];
	   $numdua = $fila_parti['NDCL'];
	    $numdoc = $fila_parti['NDOC'];
		 $nomempresa = $fila_parti['DNOMBRE'];
		 $direempresa = $fila_parti['DDIRPRO'];
		 //$ubigeoempresa = $fila_parti['ubigeo2'];
			 $ubigeoempresa = $fila_parti['nombredepartamento'];
			  $ubigeoprovi = $fila_parti['nombreprov'];
			  $ubigeodistri = $fila_parti['nombredistrito'];
		 $num_partida = $fila_parti['PART_NANDI'];
		 $descri_produ = $fila_parti['dcom'];
		 $pais_des = $fila_parti['paisdestino'];
		 $puerto_descri = $fila_parti['puerto'];
		 $via_transp = $fila_parti['viatransporte'];
		 $uni_transp = $fila_parti['unidadtransporte'];
		 
		 $descri_mat = $fila_parti['DMAT'];
	$cod_agente = $fila_parti['CAGE'];
		 //$nom_agente = $fila_parti['agente'];
		 $nom_aduanero = $fila_parti['recinto_aduanero'];
		 $nom_banco = $fila_parti['banco'];
		 $valor_fob = number_format($fila_parti['VFOBSERDOL'],2); 
		 $valor_net = number_format($fila_parti['VPESNET'],2);
		 $valor_bru = number_format($fila_parti['VPESBRU'],2);
		 $valor_A = number_format($fila_parti['QUNIFIS'],2);
		 $nom_unidad = $fila_parti['undmedida'];
		 $valor_B = number_format($fila_parti['QUNICOM'],2);
		 $unid_comer = $fila_parti['TUNIFIS'];
		 $peso_unit = number_format($fila_parti['pesounitkg'],2);
		 $precio_unitmed = number_format($fila_parti['preciounitxundmedida'],2);
		 $precio_unitcomerc = number_format($fila_parti['preciounitxunidcomercial'],2);
		 $peso_envemb = number_format($fila_parti['pesoenvaseyembalaje'],2);
		 //$nom_sector = $fila_parti['sector'];
			 
			 //consultanos sector
	$sqlsecto = "SELECT partida FROM sector where='$num_partida' ";
	$rsce=$conexpg->query($sqlsecto); 
if($rsce->num_rows>0){ 
while($rws=$rsce->fetch_array()){ 
	$nom_sector = $rws['sector'];
}
}else{
	$nom_sector = "---";
}
	//consultanos agente
	$sqlage = "select aa.agencia from agente aa where aa.idagente = '$cod_agente' limit 1";
	$rsage=$conexpg->query($sqlage); 
if($rsage->num_rows>0){ 
while($rwage=$rsage->fetch_array()){ 
	$nom_agente = $rwage['agente'];
}
}else{
	$nom_agente = "---";
}
			  
		echo"<tr>";
	    echo '<td>&nbsp;</td>';
   echo '<td>'.$annio.'</td>';
   echo '<td>'.$fecha.'</td>';
   echo '<td>'.$adua.'</td>';
			  if($axe == "SI"){
   echo '<td>'.$numdua.'</td>';
			  }
   echo '<td>'.$numdoc.'</td>';
   echo '<td>'.$nomempresa.'</td>';
   echo '<td>'.$direempresa.'</td>';
   echo '<td>'.$ubigeoempresa.'</td>';
   echo '<td>'.$ubigeoprovi.'</td>';
   echo '<td>'.$ubigeodistri.'</td>';
   echo '<td>'.$num_partida.'</td>';
   echo '<td>'.$descri_produ.'</td>';
   echo '<td>'.$pais_des.'</td>';
   echo '<td>'.$puerto_descri.'</td>';
   echo '<td>'.$via_transp.'</td>';
   echo '<td>'.$uni_transp.'</td>';
   echo '<td>'.$descri_mat.'</td>';
   echo '<td>'.$nom_agente.'</td>';
   echo '<td>'.$nom_aduanero.'</td>';
   echo '<td>'.$nom_banco.'</td>';
   echo '<td>'.$valor_fob.'</td>';
   echo '<td>'.$valor_net.'</td>';
   echo '<td>'.$valor_bru.'</td>';
   echo '<td>'.$valor_A.'</td>';
   echo '<td>'.$nom_unidad.'</td>';
   echo '<td>'.$valor_B.'</td>';
   echo '<td>'.$unid_comer.'</td>';
   echo '<td>'.$peso_unit.'</td>';
   echo '<td>'.$precio_unitmed.'</td>';
   echo '<td>'.$precio_unitcomerc.'</td>';
   echo '<td>'.$peso_envemb.'</td>';
   echo '<td>'.$nom_sector.'</td>';  
		echo"</tr>";
			  
			  
			  
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

                      </div>
                    </div>
   
                    <?php include("footer.php"); ?>

            </div>
        </div>
    </body>

<?php include("js.php"); ?>

<script type="text/javascript" src="js/jsexport/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="js/jsexport/buttons.flash.min.js"></script>
    <script type="text/javascript" src="js/jsexport/jszip.min.js"></script>
    <script type="text/javascript" src="js/jsexport/pdfmake.min.js"></script>
    <script type="text/javascript" src="js/jsexport/vfs_fonts.js"></script>
    <script type="text/javascript" src="js/jsexport/buttons.html5.min.js"></script>
    <script type="text/javascript" src="js/jsexport/buttons.print.min.js"></script>
    
<script type="text/javascript">
$(document).ready(function() {
    $('#datatables').DataTable({
		"order": [[ 0, "desc" ]],
		dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
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
