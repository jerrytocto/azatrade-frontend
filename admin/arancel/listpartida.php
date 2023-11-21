<?php
session_start();
if (isset($_SESSION['login_usuario'])){
}else{
	if(!isset($_SESSION["login_usuario"]) || $_SESSION["login_usuario"]==null){
	//print "<script>alert('Acceso invalido! - Inicia Sesion para Acceder');window.location='$enlace_actual';</script>";
	//print "<script>window.location='index.php';</script>";
}
}
include("../incBD/inibd.php");
$linkpage = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
set_time_limit(250);
$activehome ="active";

set_time_limit(150);
$qx=$_GET["buscar"];
if($qx==""){
$qb=$_POST["buscar"]; 
}else{
$qb=$_GET["buscar"];
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<?php include("title.php"); ?>
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
<link rel="stylesheet" href="../css/material-dashboard.min.css?v=2.0.1">
<link rel="stylesheet" href="../css/buttons.dataTables.min.css">
<link href="../css/demo.css" rel="stylesheet"/>
 <style>
	.css-input { font-size:16px; border-style:solid; border-radius:25px; border-width:3px; border-color:#65adeb; padding:7px;  } 
		 .css-input:focus { outline:none; } 
		</style>
  <script>
      window.onload = detectarCarga;
      function detectarCarga(){
         document.getElementById("carga").style.display="none";
      }
    </script>
<script>function formulario(form) { 
/*if (form.nombre.value   == '') { alert ('El nombre esta vacío');  
f.nombre.focus(); return false; } */
var txtbuscar = document.getElementById('buscar').value;
if (txtbuscar == null || txtbuscar.length == 0 || /^\s+$/.test(txtbuscar)) { 
	alert ('Campo Vacio y  ingrese partida o Descripcion a consultar !!'); 
form.buscar.focus(); return false; } 
return true; } 
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
<div class="card ">
    <div class="card-header card-header-info card-header-icon">
    <div class="card-icon">
                          <i class="material-icons">search</i>
                        </div>
                        <h4 class="card-title">Encuentra tu partida por numero ó descripción de producto. (Búsqueda en descripción de partida a 10 dígitos)</h4>
    </div>
    <form method="post" action="listpartida.php" onsubmit="return formulario(this)">
    <div class="card-body "> 
                              <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="text" id="buscar" name="buscar" class="form-control css-input" placeholder="Ingrese partida ó descripción" value="<?php echo"$qb";?>" required />
                                                    <input type="hidden" name="btnsearch">
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-2">
                                            <button type="submit" name="btnsearch" class="btn btn-fill btn-success">Consultar <i class="material-icons">search</i></button>
											</div>
                                       
                                        </div>
                                    </div>  
    </div>
    </form>
</div>
    </div>
                       	
 <div class="col-md-12">
<div class="card ">
 
<div class="card-header card-header-info card-header-icon">
    <div class="card-icon"><i class="material-icons">search</i></div>
    <h4 class="card-title" align="center"><b>Resultado de Busqueda <?php echo "$qb"; ?></b></h4>
    <hr>
              <p style="color: #000;"><font size="2">Registros: <button type="button" class="btn btn-success btn-xs"><span class='glyphicon glyphicon-ok' aria-hidden='true'></span></button> Vigentes <button type="button" class="btn btn-danger btn-xs"><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></button> Vencidos</font></p>
    </div>                	
       
                      	<?php
		//conatmos cantidad de partidas seleccionados
$sqlcant="SELECT
nan.partida,
nan.descrip,
nan.adval,
nan.igv,
nan.isc,
nan.seguro,
nan.cuode,
nan.ciiu,
nan.finicio,
nan.ffin,
CONCAT(nan.partida,' ',nan.descrip) as vars
FROM arancel_part_nandina AS nan
WHERE
CONCAT(nan.partida,' ',nan.descrip) LIKE '%".$qb."%' ";
	$resc=$conexpg->query($sqlcant) or die(mysqli_error($conexpg)); 
if($resc->num_rows>0){
	while($filac=$resc->fetch_array()){
	$itemscant = $itemscant + 1;
	$cantidad = $itemscant;
		//echo "paso $qb <br>";
} 
}else{
	//echo "no paso";
}

$sqlpp="SELECT
nan.partida,
nan.descrip,
nan.finicio,
nan.ffin,
ara.descripcion_arancel,
ara.descripcion_capitulo,
ara.descripcion_subcapitulo,
ara.Concatena_texto,
ara.Code_5,
ara.Des_5,
ara.Code_6,
ara.Des_6,
ara.Code_7,
ara.Des_7,
ara.Code_8,
ara.Des_8,
ara.Code_9,
ara.Des_9,
ara.cuenta
FROM arancel_part_nandina AS nan
LEFT OUTER JOIN arancel_part_lista_aranceldepu AS ara ON nan.partida = ara.codigo_arancel
WHERE concat(nan.partida,'',nan.descrip) LIKE '%".$qb."%' OR ara.Concatena_texto LIKE '%".$qb."%' ";
	
	$respp=$conexpg->query($sqlpp) or die(mysqli_error($conexpg)); 
if($respp->num_rows>0){
	date_default_timezone_set("America/Lima");
//echo '<b>Sugerencias:</b><br />'; 
echo"<div class='table-responsive'>";
echo "<table border='0' class='table table-hover table-striped' align='left' style='font-size:80%'>";
echo "<tr>";
echo "<td colspan='5' align='center' bgcolor='#D8D8D8'><b>
Encontrados : $cantidad </b>
</td>";
echo "</tr>";
echo "<tr>";
echo "<td bgcolor='#F1F1F1' width='10'><b>#</b></td>";
echo "<td bgcolor='#F1F1F1' width='10'><b>Cod. Partida</b></td>";
echo "<td bgcolor='#F1F1F1' align='center'><b>Descripci&oacute;n de la Partida</b></td>";
echo "<td bgcolor='#F1F1F1' width='80'><b>F. Inicio</b></td>";
echo "<td bgcolor='#F1F1F1' width='80'><b>F. Final</b></td>";
echo "</tr>";
while($fila=$respp->fetch_array()){
$items = $items + 1;
$codp = $fila['partida'];
//$nomte = $nomte.' | '. $fila['descrip'];
$descri = $fila['descrip'];
$finix = $fila['finicio'];
$ffinx = $fila['ffin'];

$fini=date("d/m/Y",strtotime($finix));
if($ffinx=='0000-00-00'){
	$ffin="00/00/0000";
	$colo = substr($ffin, -4);
}else{
$ffin=date("d/m/Y",strtotime($ffinx));
$colo = substr($ffin, -4);
}

$des5 = $fila['Des_5'];
if($des5<>""){
	$code5 = $fila['Code_5'].' ('.$des5.') / ';
}else{
	$code5 ="";
}

$des6 = $fila['Des_6'];
if($des6<>""){
	$code6 = $fila['Code_6'].' ('.$des6.') / ';
}else{
	$code6 ="";
}

$des7 = $fila['Des_7'];
if($des7<>""){
	$code7 = $fila['Code_7'].' ('.$des7.') / ';
}else{
	$code7 ="";
}

$des8 = $fila['Des_8'];
if($des8<>""){
	$code8 = $fila['Code_8'].' ('.$des8.') / ';
}else{
	$code8 ="";
}

$des9 = $fila['Des_9'];
if($des9<>""){
	$code9 = $fila['Code_9'].' ('.$des9.') / ';
}else{
	$code9 ="";
}

$dato = $code5.''.$code6.''.$code7.''.$code8.''.$code9;

echo "<tr>";
if($colo=="9999" or $colo=="1969"){
echo"<td style='background-color: #5CC067;color: #fff;'>$items</td>";
echo "<td width='100' style='background-color: #5CC067;'><a href='viewpartida.php?data=$codp&fi=$finix&ff=$ffinx&d1=$dato' style='color: #fff;'>$codp</a></td>";
echo "<td style='background-color: #5CC067;'><a href='viewpartida.php?data=$codp&fi=$finix&ff=$ffinx&d1=$dato' style='color: #fff;'>$descri</a></td>";
echo "<td width='80' style='background-color: #5CC067;'><a href='viewpartida.php?data=$codp&fi=$finix&ff=$ffinx&d1=$dato' style='color: #fff;'>$fini</a></td>";
echo "<td width='80' style='background-color: #5CC067;'><a href='viewpartida.php?data=$codp&fi=$finix&ff=$ffinx&d1=$dato' style='color: #fff;'>$ffin</a></td>";
}else{
echo"<td style='background-color: #DB4A4C;color: #fff;'>$items</td>";
echo "<td width='100' style='background-color: #DB4A4C;'><a href='viewpartida.php?data=$codp&fi=$finix&ff=$ffinx&d1=$dato' style='color: #fff;'>$codp</a></td>";
echo "<td style='background-color: #DB4A4C;'><a href='viewpartida.php?data=$codp&fi=$finix&ff=$ffinx&d1=$dato' style='color: #fff;'>$descri</a></td>";
echo "<td width='80' style='background-color: #DB4A4C;'><a href='viewpartida.php?data=$codp&fi=$finix&ff=$ffinx&d1=$dato' style='color: #fff;'>$fini</a></td>";
echo "<td width='80' style='background-color: #DB4A4C;'><a href='viewpartida.php?data=$codp&fi=$finix&ff=$ffinx&d1=$dato' style='color: #fff;'>$ffin</a></td>";

}
echo "</tr>";
} 
echo "</table>";
echo"</div>";
}else{
	echo '<br><b>Incidencias no existe !!</b>'; 
}


?>               	
	          	
	 </div>
    </div>
                        	
                        </div>


                      </div>
                    </div>
                    <?php include("../footer.php"); ?>
            </div>
        </div>


    </body>


<?php include("../js.php"); ?>	

<!-- Sharrre libray -->
<!--<script src="../js/jquery.sharrre.js"></script>-->
<?php
//cerrando conexion
	mysqli_close($conexpg);
?>
  
</html>
