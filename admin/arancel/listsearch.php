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
$activehisto ="active";

set_time_limit(150);
$qx=$_GET["buscar"];
if($qx==""){
$qb=trim($_POST["buscar"]); 
}else{
$qb=trim($_GET["buscar"]);
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
 <style>
	.css-input { font-size:16px; border-style:solid; border-radius:25px; border-width:3px; border-color:#65adeb; padding:7px;  } 
		 .css-input:focus { outline:none; } 
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
<div class="card ">
    <div class="card-header card-header-info card-header-icon">
    <div class="card-icon">
                          <i class="material-icons">search</i>
                        </div>
                        <h4 class="card-title">Encuentra tu partida por numero ó descripción de producto.</h4>
    </div>
    <form method="post" action="listsearch.php" onsubmit="return formulario(this)">
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
 
               	               	<?php if($qb!=""){ ?>
                	               	
 <div class="col-md-12">
<div class="card ">
 
<div class="card-header card-header-info card-header-icon">
    <div class="card-icon"><i class="material-icons">search</i></div>
    <h4 class="card-title" align="center"><b>Resultado de Busqueda <?php echo "$qb"; ?></b></h4>
    </div>                	
       
                      	<?php
	/**si el campo captado en la caja de texto es numero devuelve 1 y si es texto devuelve vacio*/
$v = is_numeric ($qb) ? true : false;
//$cantidad=var_dump ($v);
$resul_num=$v;
//echo "resultado = $resul_num";
/*fin verifica si el caja de texto es numero o texto*/
if ($resul_num==""){// si es texto
		//conatmos cantidad de partidas seleccionados
$sqlcant="SELECT
ara.codigo_arancel,
ara.descripcion_arancel,
ara.cod_capitulo,
ara.descripcion_capitulo,
ara.cod_subcapitulo,
ara.descripcion_subcapitulo,
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
ara.cuenta,
ara.Concatena_texto
FROM
arancel_part_lista_aranceldepu AS ara
WHERE
ara.Concatena_texto LIKE '%".$qb."%'";
	$resc=$conexpg->query($sqlcant) or die(mysqli_error($conexpg)); 
if($resc->num_rows>0){
echo"<div class='table-responsive'>";
echo "<table border='0' class='table table-hover table-striped' align='left' style='font-size:80%'>";
/*echo "<tr>";
echo "<td colspan='4' align='center' bgcolor='#D8D8D8'><b>
Encontrados : $cantidad </b>
</td>";
echo "</tr>";*/
echo "<tr>";
echo "<td class='warning'>&nbsp;</td>";
echo "<td class='warning'><b>Codigo </b></td>";
echo "<td class='warning'><b>Aranacel</b></td>";
echo "<td class='warning'><b>Capitulo</b></td>";
echo "<td class='warning'><b>SubCapitulo</b></td>";
echo "</tr>";
	while($fila=$resc->fetch_array()){
	
$items = $items + 1;
$cod_ara = $fila['codigo_arancel'];
$descri_ara = $fila['descripcion_arancel'];
$descri_capi = $fila['descripcion_capitulo'];
$descri_subcapi = $fila['descripcion_subcapitulo'];
$cuentafila = $fila['cuenta'];

$des5 = $fila['Des_5'];
if($des5<>""){
	$code5 = $fila['Code_5'].' ('.$des5.')  / ';
}else{
	$code5 ="";
}

$des6 = $fila['Des_6'];
if($des6<>""){
	$code6 = $fila['Code_6'].' ('.$des6.')  / ';
}else{
	$code6 ="";
}

$des7 = $fila['Des_7'];
if($des7<>""){
	$code7 = $fila['Code_7'].' ('.$des7.')  / ';
}else{
	$code7 ="";
}

$des8 = $fila['Des_8'];
if($des8<>""){
	$code8 = $fila['Code_8'].' ('.$des8.')  / ';
}else{
	$code8 ="";
}

$des9 = $fila['Des_9'];
if($des9<>""){
	$code9 = $fila['Code_9'].' ('.$des9.')  / ';
}else{
	$code9 ="";
}

$dato = $code5.''.$code6.''.$code7.''.$code8.''.$code9;


echo "<tr>";
if($cuentafila <> '10'){
echo "<td class='warning'><span class='material-icons'>assignment</span></td>";
echo "<td class='warning'><b>$cod_ara</b></td>";
echo "<td class='warning'>$descri_ara</td>";
echo "<td class='warning'>$descri_capi</td>";
echo "<td class='warning'>$descri_subcapi</td>";
}else{
echo"<td colspan='5'> <a href='viewpartida.php?data=$cod_ara&t=$q&d1=$dato'><span class='material-icons'>font_download</span> $cod_ara | $descri_ara</a></td>";
}

echo "</tr>";
} 
echo "</table>"; 
echo"</div>";
}else{
	echo '<br><b>Incidencias no existe !!</b>'; 
}
}else{//fin si es texto la busqueda
$sqlxpp="SELECT
ara.codigo_arancel,
ara.descripcion_arancel,
ara.cod_capitulo,
ara.descripcion_capitulo,
ara.cod_subcapitulo,
ara.descripcion_subcapitulo,
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
ara.cuenta,
ara.Concatena_texto
FROM arancel_part_lista_aranceldepu AS ara
WHERE ara.codigo_arancel LIKE '".$qb."%' ";
	
	$resxpp=$conexpg->query($sqlxpp) or die(mysqli_error($conexpg)); 
if($resxpp->num_rows>0){
	date_default_timezone_set("America/Lima");
//echo '<b>Sugerencias:</b><br />'; 
echo"<div class='table-responsive'>";
//echo '<b>Sugerencias:</b><br />'; 
echo "<table border='0' class='table table-hover table-striped' align='left' style='font-size:80%'>";
/*echo "<tr>";
echo "<td colspan='4' align='center' bgcolor='#D8D8D8'><b>
Encontrados : $cantidad </b>
</td>";
echo "</tr>";*/
echo "<tr>";
echo "<td class='warning'>&nbsp;</td>";
echo "<td class='warning'><b>Codigo </b></td>";
echo "<td class='warning'><b>Aranacel</b></td>";
echo "<td class='warning'><b>Capitulo</b></td>";
echo "<td class='warning'><b>SubCapitulo</b></td>";
echo "</tr>";
while($filaff=$resxpp->fetch_array()){
$items = $items + 1;
$cod_ara = $filaff['codigo_arancel'];
$descri_ara = $filaff['descripcion_arancel'];
$descri_capi = $filaff['descripcion_capitulo'];
$descri_subcapi = $filaff['descripcion_subcapitulo'];
$cuentafila = $filaff['cuenta'];

$des5 = $fila['Des_5'];
if($des5<>""){
	$code5 = $filaff['Code_5'].' ('.$des5.') / ';
}else{
	$code5 ="";
}

$des6 = $fila['Des_6'];
if($des6<>""){
	$code6 = $filaff['Code_6'].' ('.$des6.')  / ';
}else{
	$code6 ="";
}

$des7 = $fila['Des_7'];
if($des7<>""){
	$code7 = $filaff['Code_7'].' ('.$des7.')  / ';
}else{
	$code7 ="";
}

$des8 = $fila['Des_8'];
if($des8<>""){
	$code8 = $filaff['Code_8'].' ('.$des8.')  / ';
}else{
	$code8 ="";
}

$des9 = $fila['Des_9'];
if($des9<>""){
	$code9 = $filaff['Code_9'].' ('.$des9.')  / ';
}else{
	$code9 ="";
}

$dato = $code5.''.$code6.''.$code7.''.$code8.''.$code9;

echo "<tr>";
if($cuentafila <> '10'){
echo "<td class='warning'><span class='material-icons'>assignment</span></td>";
echo "<td class='warning'><b>$cod_ara</b></td>";
echo "<td class='warning'>$descri_ara</td>";
echo "<td class='warning'>$descri_capi</td>";
echo "<td class='warning'>$descri_subcapi</td>";
}else{
echo "<td><span class='material-icons'>font_download</span></td>";
echo"<td> <a href='viewpartida.php?data=$cod_ara&t=$q&d1=$dato'> $cod_ara </a></td>";
echo "<td>$descri_ara</td>";
echo "<td>$descri_capi</td>";
echo "<td>$descri_subcapi</td>";
}

echo "</tr>";
} 
echo "</table>";
echo"</div>";
}else{
	echo '<br><b>Incidencias no existe !!</b>'; 
}

}

?>               	
	          	
	 </div>
    </div>
             <?php } ?>           	
                        </div>


                      </div>
                    </div>
                    <?php include("../footer.php"); ?>
            </div>
        </div>


    </body>


<?php include("js.php"); ?>	

<!-- Sharrre libray -->
<!--<script src="../js/jquery.sharrre.js"></script>-->
<?php
//cerrando conexion
	mysqli_close($conexpg);
?>
  
</html>
