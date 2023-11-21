<?php
session_start();
if (isset($_SESSION['usuario'])){
}else{
	if(!isset($_SESSION["usuario"]) || $_SESSION["usuario"]==null){
	//print "<script>alert('Acceso invalido! - Inicia Sesion para Acceder');window.location='$enlace_actual';</script>";
}
}
set_time_limit(500);
$partida1 = $_POST["partidaindimen"];
$anio = $_POST["year"];
$namedepa1 = $_POST["namedepa"];
$ubicod1 = $_POST["codubi"];
if($ubicod1!=""){
	$flatcod = $ubicod1;
	$codex = "AND SUBSTRING(exportacion.ubigeo,1,2) = '$flatcod'";
}else{
	$flatcod = "";
	$codex = "";
}

?>
<!doctype html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<!-- Favicons -->
<link rel="apple-touch-icon" href="../../img/logo.png">
<link rel="icon" href="../../img/logo.png">
<title>
   ..: Azatrade :..
</title>

<!--     Fonts and icons     -->
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
<link rel="stylesheet" href="../../css/material-dashboard.min.css?v=2.0.1">
<link rel="stylesheet" href="../../css/buttons.dataTables.min.css">
<!-- CSS Just for demo purpose, don't include it in your project -->
<link href="../../css/demo.css" rel="stylesheet"/>
       <script>
      window.onload = detectarCarga;
      function detectarCarga(){
         document.getElementById("carga").style.display="none";
      }
    </script>
        </head>
<body>
	<div id="carga" style="width:100%;text-align: center;">
<Center><img class="img-responsive" src="../../img/loading-carga.gif" width="100px"><br><p style="font-size:12px; color:#EC0D36;"> Espere un momento, la consulta puede tardar unos minutos. </p></Center>
     </div>
</body>
        <body class="off-canvas-sidebar register-page" style="background-image: url('../../img/plan.jpg'); background-size: cover; background-position: top center;">

    <div class="wrapper wrapper-full-page">
            <div class='col-md-12'>

            <?php
				include("../../incBD/inibd.php");
				 /*generamos codigo aletorio*/
  function generaPass(){
    //Se define una cadena de caractares. Te recomiendo que uses esta.
    $cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
    //Obtenemos la longitud de la cadena de caracteres
    $longitudCadena=strlen($cadena);
     
    //Se define la variable que va a contener la contrasena
    $pass = "";
    //Se define la longitud de la contrasena, en mi caso 10, pero puedes poner la longitud que quieras
    $longitudPass=10;
     
    //Creamos la contrasena
    for($i=1 ; $i<=$longitudPass ; $i++){
        //Definimos numero aleatorio entre 0 y la longitud de la cadena de caracteres-1
        $pos=rand(0,$longitudCadena-1);
     
        //Vamos formando la contrasena en cada iteraccion del bucle, anadiendo a la cadena $pass la letra correspondiente a la posicion $pos en la cadena de caracteres definida.
        $pass .= substr($cadena,$pos,1);
    }
    return $pass;
}
$mon_tmp = "tmp_".generaPass();
 /*creamos tabla temporal datos*/
 $createsql = "CREATE TABLE $mon_tmp (
codigo numeric(5) NOT NULL,
nomvariable varchar(300),
a01 numeric(30,2),
a02 numeric(30,2),
a03 numeric(30,2),
a04 numeric(30,2),
a05 numeric(30,2),
a06 numeric(30,2),
a07 numeric(30,2),
a08 numeric(30,2),
a09 numeric(30,2),
a10 numeric(30,2),
a11 numeric(30,2),
a12 numeric(30,2),
atota numeric(30,2) )"; 
				$rscrea = $conexpg->query($createsql);
 //$rscrea = pg_query($createsql)or die("Error en la Consulta SQL Crear Tabla Temporal"); 
 if (!$rscrea) {
    echo "Query: Un error ha occurido al crear tabla Temporal";
    exit;
  }else{
	  // echo "<center><b>Data Actualizado hasta Marzo-2016 </b></center>";
  }
				
  /*insertamos registro*/
  $sqlinsert1="INSERT INTO ".$mon_tmp."  (codigo,nomvariable,a01,a02,a03,a04,a05,a06,a07,a08,a09,a10,a11,a12,atota) VALUES ('1','Valor FOB USD','0','0','0','0','0','0','0','0','0','0','0','0','0'),
  ('2','Peso Neto (Kg)','0','0','0','0','0','0','0','0','0','0','0','0','0'),
  ('3','Precio FOB USD x KG','0','0','0','0','0','0','0','0','0','0','0','0','0'),
  ('4','Peso Bruto (Kg)','0','0','0','0','0','0','0','0','0','0','0','0','0'),
  ('5','Cantidad Exportada','0','0','0','0','0','0','0','0','0','0','0','0','0'),
  ('6','Unidades Comerciales','0','0','0','0','0','0','0','0','0','0','0','0','0'),
  ('7','Cantidad de Registros','0','0','0','0','0','0','0','0','0','0','0','0','0'),
  ('8','Cantidad de Duas','0','0','0','0','0','0','0','0','0','0','0','0','0'),
  ('9','Cantidad de Empresas','0','0','0','0','0','0','0','0','0','0','0','0','0'),
  ('10','Cantidad de Mercados','0','0','0','0','0','0','0','0','0','0','0','0','0'),
  ('11','Cantidad de Puertos','0','0','0','0','0','0','0','0','0','0','0','0','0'),
  ('12','Cantidad de Aduanas','0','0','0','0','0','0','0','0','0','0','0','0','0'),
  ('13','Cantidad de Departamentos','0','0','0','0','0','0','0','0','0','0','0','0','0'),
  ('14','Cantidad de Provincias','0','0','0','0','0','0','0','0','0','0','0','0','0'),
  ('15','Cantidad de Distritos','0','0','0','0','0','0','0','0','0','0','0','0','0'),
  ('16','Cantidad de Agentes','0','0','0','0','0','0','0','0','0','0','0','0','0'),
  ('17','Cantidad Vías de Transporte','0','0','0','0','0','0','0','0','0','0','0','0','0'); ";
$rscrea2 = $conexpg->query($sqlinsert1);
//$rscrea2 = pg_query($sqlinsert1)or die("Error en la Consulta SQL Insertar Registro Tabla Temporal");
if (!$rscrea2) {
    echo "Query: Un error ha occurido al crear insercion  tabla Temporal";
    exit;
  }else{
	  // echo "<center><b>Datos Insertados !! </b></center>";
  }
				
 /*realizamos consulta del reporte selecionado y  actualizamos en la tabla temporal crada*/
   $query1 = "SELECT
exportacion.fano,
extract(MONTH from exportacion.fnum) as mes,
Sum(exportacion.vfobserdol) as vfobserdol,
Sum(exportacion.vpesnet) as vpesnet,
Sum(exportacion.vfobserdol) / Sum(exportacion.vpesnet) as diferen,
Sum(exportacion.vpesbru) as vpesbru,
Sum(exportacion.qunifis) as qunifis,
Sum(exportacion.qunicom) as qunicom,
count(*) as total FROM
exportacion WHERE
exportacion.part_nandi = ".$partida1." $codex AND extract(year from exportacion.fnum) = ".$anio."
GROUP BY
exportacion.fano,mes
ORDER BY
exportacion.fano,mes";
	  /*$resultado1 = pg_query($query1) or die("Error en la Consulta SQL");
	  $numReg = pg_num_rows($resultado1);
	  if($numReg>0){
		  while ($fila1=pg_fetch_array($resultado1)) {*/
				$resultado1=$conexpg->query($query1); 
if($resultado1->num_rows>0){ 
while($fila1=$resultado1->fetch_array()){
		  $val1= $fila1['mes'];
		  $val2= $fila1['vfobserdol'];
		  $val3= $fila1['vpesnet'];
		  $val4= $fila1['diferen'];
		  $val5= $fila1['vpesbru'];
		  $val6= $fila1['qunifis'];
		  $val7= $fila1['qunicom'];
		  $val8= $fila1['total'];
		  
		  if($val1=='1'){
	   $insert1 = "UPDATE ".$mon_tmp." SET a01='".$val2."' WHERE codigo='1' "; 
		$rs = $conexpg->query($insert1);
       //$rs = $conexpg->query($insert1);
	   $insert1 = "UPDATE ".$mon_tmp." SET a01='".$val3."' WHERE codigo='2' "; 
       $rs = $conexpg->query($insert1);
	   $insert1 = "UPDATE ".$mon_tmp." SET a01='".$val4."' WHERE codigo='3' "; 
       $rs = $conexpg->query($insert1);
	    $insert1 = "UPDATE ".$mon_tmp." SET a01='".$val5."' WHERE codigo='4' "; 
       $rs = $conexpg->query($insert1);
	    $insert1 = "UPDATE ".$mon_tmp." SET a01='".$val6."' WHERE codigo='5' "; 
       $rs = $conexpg->query($insert1);
	    $insert1 = "UPDATE ".$mon_tmp." SET a01='".$val7."' WHERE codigo='6' "; 
       $rs = $conexpg->query($insert1);
	    $insert1 = "UPDATE ".$mon_tmp." SET a01='".$val8."' WHERE codigo='7' "; 
       $rs = $conexpg->query($insert1);
		  }
	   if($val1=='2'){
	   $insert1 = "UPDATE ".$mon_tmp." SET a02='".$val2."' WHERE codigo='1' "; 
       $rs = $conexpg->query($insert1);
	   $insert1 = "UPDATE ".$mon_tmp." SET a02='".$val3."' WHERE codigo='2' "; 
       $rs = $conexpg->query($insert1);
	   $insert1 = "UPDATE ".$mon_tmp." SET a02='".$val4."' WHERE codigo='3' "; 
       $rs = $conexpg->query($insert1);
	    $insert1 = "UPDATE ".$mon_tmp." SET a02='".$val5."' WHERE codigo='4' "; 
       $rs = $conexpg->query($insert1);
	    $insert1 = "UPDATE ".$mon_tmp." SET a02='".$val6."' WHERE codigo='5' "; 
       $rs = $conexpg->query($insert1);
	    $insert1 = "UPDATE ".$mon_tmp." SET a02='".$val7."' WHERE codigo='6' "; 
       $rs = $conexpg->query($insert1);
	    $insert1 = "UPDATE ".$mon_tmp." SET a02='".$val8."' WHERE codigo='7' "; 
       $rs = $conexpg->query($insert1);
		  }
	   if($val1=='3'){
	   $insert1 = "UPDATE ".$mon_tmp." SET a03='".$val2."' WHERE codigo='1' "; 
       $rs = $conexpg->query($insert1);
	   $insert1 = "UPDATE ".$mon_tmp." SET a03='".$val3."' WHERE codigo='2' "; 
      $rs = $conexpg->query($insert1);
	   $insert1 = "UPDATE ".$mon_tmp." SET a03='".$val4."' WHERE codigo='3' "; 
       $rs = $conexpg->query($insert1);
	   $insert1 = "UPDATE ".$mon_tmp." SET a03='".$val5."' WHERE codigo='4' "; 
       $rs = $conexpg->query($insert1);
	   $insert1 = "UPDATE ".$mon_tmp." SET a03='".$val6."' WHERE codigo='5' "; 
       $rs = $conexpg->query($insert1);
	   $insert1 = "UPDATE ".$mon_tmp." SET a03='".$val7."' WHERE codigo='6' "; 
       $rs = $conexpg->query($insert1);
	   $insert1 = "UPDATE ".$mon_tmp." SET a03='".$val8."' WHERE codigo='7' "; 
       $rs = $conexpg->query($insert1);
		  } 
		  if($val1=='4'){
	   $insert1 = "UPDATE ".$mon_tmp." SET a04='".$val2."' WHERE codigo='1' "; 
       $rs = $conexpg->query($insert1);
	   $insert1 = "UPDATE ".$mon_tmp." SET a04='".$val3."' WHERE codigo='2' "; 
       $rs = $conexpg->query($insert1);
	   $insert1 = "UPDATE ".$mon_tmp." SET a04='".$val4."' WHERE codigo='3' "; 
       $rs = $conexpg->query($insert1);
	   $insert1 = "UPDATE ".$mon_tmp." SET a04='".$val5."' WHERE codigo='4' "; 
       $rs = $conexpg->query($insert1);
	   $insert1 = "UPDATE ".$mon_tmp." SET a04='".$val6."' WHERE codigo='5' "; 
       $rs = $conexpg->query($insert1);
	   $insert1 = "UPDATE ".$mon_tmp." SET a04='".$val7."' WHERE codigo='6' "; 
       $rs = $conexpg->query($insert1);
	   $insert1 = "UPDATE ".$mon_tmp." SET a04='".$val8."' WHERE codigo='7' "; 
       $rs = $conexpg->query($insert1);
		  }
		   if($val1=='5'){
	   $insert1 = "UPDATE ".$mon_tmp." SET a05='".$val2."' WHERE codigo='1' "; 
       $rs = $conexpg->query($insert1);
	   $insert1 = "UPDATE ".$mon_tmp." SET a05='".$val3."' WHERE codigo='2' "; 
       $rs = $conexpg->query($insert1);
	   $insert1 = "UPDATE ".$mon_tmp." SET a05='".$val4."' WHERE codigo='3' "; 
      $rs = $conexpg->query($insert1);
	   $insert1 = "UPDATE ".$mon_tmp." SET a05='".$val5."' WHERE codigo='4' "; 
       $rs = $conexpg->query($insert1);
	   $insert1 = "UPDATE ".$mon_tmp." SET a05='".$val6."' WHERE codigo='5' "; 
       $rs = $conexpg->query($insert1);
	   $insert1 = "UPDATE ".$mon_tmp." SET a05='".$val7."' WHERE codigo='6' "; 
       $rs = $conexpg->query($insert1);
	   $insert1 = "UPDATE ".$mon_tmp." SET a05='".$val8."' WHERE codigo='7' "; 
       $rs = $conexpg->query($insert1);
		  }
		   if($val1=='6'){
	   $insert1 = "UPDATE ".$mon_tmp." SET a06='".$val2."' WHERE codigo='1' "; 
       $rs = $conexpg->query($insert1);
	   $insert1 = "UPDATE ".$mon_tmp." SET a06='".$val3."' WHERE codigo='2' "; 
       $rs = $conexpg->query($insert1);
	   $insert1 = "UPDATE ".$mon_tmp." SET a06='".$val4."' WHERE codigo='3' "; 
       $rs = $conexpg->query($insert1);
	   $insert1 = "UPDATE ".$mon_tmp." SET a06='".$val5."' WHERE codigo='4' "; 
       $rs = $conexpg->query($insert1);
	   $insert1 = "UPDATE ".$mon_tmp." SET a06='".$val6."' WHERE codigo='5' "; 
       $rs = $conexpg->query($insert1);
	   $insert1 = "UPDATE ".$mon_tmp." SET a06='".$val7."' WHERE codigo='6' "; 
       $rs = $conexpg->query($insert1);
	   $insert1 = "UPDATE ".$mon_tmp." SET a06='".$val8."' WHERE codigo='7' "; 
       $rs = $conexpg->query($insert1);
		  }
		  if($val1=='7'){
	   $insert1 = "UPDATE ".$mon_tmp." SET a07='".$val2."' WHERE codigo='1' "; 
       $rs = $conexpg->query($insert1);
	   $insert1 = "UPDATE ".$mon_tmp." SET a07='".$val3."' WHERE codigo='2' "; 
       $rs = $conexpg->query($insert1);
	   $insert1 = "UPDATE ".$mon_tmp." SET a07='".$val4."' WHERE codigo='3' "; 
       $rs = $conexpg->query($insert1);
	   $insert1 = "UPDATE ".$mon_tmp." SET a07='".$val5."' WHERE codigo='4' "; 
       $rs = $conexpg->query($insert1);
	   $insert1 = "UPDATE ".$mon_tmp." SET a07='".$val6."' WHERE codigo='5' "; 
       $rs = $conexpg->query($insert1);
	   $insert1 = "UPDATE ".$mon_tmp." SET a07='".$val7."' WHERE codigo='6' "; 
       $rs = $conexpg->query($insert1);
	   $insert1 = "UPDATE ".$mon_tmp." SET a07='".$val8."' WHERE codigo='7' "; 
       $rs = $conexpg->query($insert1);
		  }
		  if($val1=='8'){
	   $insert1 = "UPDATE ".$mon_tmp." SET a08='".$val2."' WHERE codigo='1' "; 
       $rs = $conexpg->query($insert1);
	   $insert1 = "UPDATE ".$mon_tmp." SET a08='".$val3."' WHERE codigo='2' "; 
       $rs = $conexpg->query($insert1);
	   $insert1 = "UPDATE ".$mon_tmp." SET a08='".$val4."' WHERE codigo='3' "; 
       $rs = $conexpg->query($insert1);
	   $insert1 = "UPDATE ".$mon_tmp." SET a08='".$val5."' WHERE codigo='4' "; 
       $rs = $conexpg->query($insert1);
	   $insert1 = "UPDATE ".$mon_tmp." SET a08='".$val6."' WHERE codigo='5' "; 
       $rs = $conexpg->query($insert1);
	   $insert1 = "UPDATE ".$mon_tmp." SET a08='".$val7."' WHERE codigo='6' "; 
       $rs = $conexpg->query($insert1);
	   $insert1 = "UPDATE ".$mon_tmp." SET a08='".$val8."' WHERE codigo='7' "; 
       $rs = $conexpg->query($insert1);
		  }
		  if($val1=='9'){
	   $insert1 = "UPDATE ".$mon_tmp." SET a09='".$val2."' WHERE codigo='1' "; 
       $rs = $conexpg->query($insert1);
	   $insert1 = "UPDATE ".$mon_tmp." SET a09='".$val3."' WHERE codigo='2' "; 
       $rs = $conexpg->query($insert1);
	   $insert1 = "UPDATE ".$mon_tmp." SET a09='".$val4."' WHERE codigo='3' "; 
       $rs = $conexpg->query($insert1);
	   $insert1 = "UPDATE ".$mon_tmp." SET a09='".$val5."' WHERE codigo='4' "; 
       $rs = $conexpg->query($insert1);
	   $insert1 = "UPDATE ".$mon_tmp." SET a09='".$val6."' WHERE codigo='5' "; 
       $rs = $conexpg->query($insert1);
	   $insert1 = "UPDATE ".$mon_tmp." SET a09='".$val7."' WHERE codigo='6' "; 
       $rs = $conexpg->query($insert1);
	   $insert1 = "UPDATE ".$mon_tmp." SET a09='".$val8."' WHERE codigo='7' "; 
       $rs = $conexpg->query($insert1);
		  }
		  if($val1=='10'){
	   $insert1 = "UPDATE ".$mon_tmp." SET a10='".$val2."' WHERE codigo='1' "; 
       $rs = $conexpg->query($insert1);
	   $insert1 = "UPDATE ".$mon_tmp." SET a10='".$val3."' WHERE codigo='2' "; 
       $rs = $conexpg->query($insert1);
	   $insert1 = "UPDATE ".$mon_tmp." SET a10='".$val4."' WHERE codigo='3' "; 
       $rs = $conexpg->query($insert1);
	   $insert1 = "UPDATE ".$mon_tmp." SET a10='".$val5."' WHERE codigo='4' "; 
       $rs = $conexpg->query($insert1);
	   $insert1 = "UPDATE ".$mon_tmp." SET a10='".$val6."' WHERE codigo='5' "; 
       $rs = $conexpg->query($insert1);
	   $insert1 = "UPDATE ".$mon_tmp." SET a10='".$val7."' WHERE codigo='6' "; 
       $rs = $conexpg->query($insert1);
	   $insert1 = "UPDATE ".$mon_tmp." SET a10='".$val8."' WHERE codigo='7' "; 
       $rs = $conexpg->query($insert1);
		  }
		  if($val1=='11'){
	   $insert1 = "UPDATE ".$mon_tmp." SET a11='".$val2."' WHERE codigo='1' "; 
       $rs = $conexpg->query($insert1);
	   $insert1 = "UPDATE ".$mon_tmp." SET a11='".$val3."' WHERE codigo='2' "; 
       $rs = $conexpg->query($insert1);
	   $insert1 = "UPDATE ".$mon_tmp." SET a11='".$val4."' WHERE codigo='3' "; 
       $rs = $conexpg->query($insert1);
	   $insert1 = "UPDATE ".$mon_tmp." SET a11='".$val5."' WHERE codigo='4' "; 
       $rs = $conexpg->query($insert1);
	   $insert1 = "UPDATE ".$mon_tmp." SET a11='".$val6."' WHERE codigo='5' "; 
       $rs = $conexpg->query($insert1);
	   $insert1 = "UPDATE ".$mon_tmp." SET a11='".$val7."' WHERE codigo='6' "; 
       $rs = $conexpg->query($insert1);
	   $insert1 = "UPDATE ".$mon_tmp." SET a11='".$val8."' WHERE codigo='7' "; 
       $rs = $conexpg->query($insert1);
		  }
		  if($val1=='12'){
	   $insert1 = "UPDATE ".$mon_tmp." SET a12='".$val2."' WHERE codigo='1' "; 
       $rs = $conexpg->query($insert1);
	   $insert1 = "UPDATE ".$mon_tmp." SET a12='".$val3."' WHERE codigo='2' "; 
       $rs = $conexpg->query($insert1);
	   $insert1 = "UPDATE ".$mon_tmp." SET a12='".$val4."' WHERE codigo='3' "; 
       $rs = $conexpg->query($insert1);
	   $insert1 = "UPDATE ".$mon_tmp." SET a12='".$val5."' WHERE codigo='4' "; 
       $rs = $conexpg->query($insert1);
	   $insert1 = "UPDATE ".$mon_tmp." SET a12='".$val6."' WHERE codigo='5' "; 
       $rs = $conexpg->query($insert1);
	   $insert1 = "UPDATE ".$mon_tmp." SET a12='".$val7."' WHERE codigo='6' "; 
       $rs = $conexpg->query($insert1);
	   $insert1 = "UPDATE ".$mon_tmp." SET a12='".$val8."' WHERE codigo='7' "; 
       $rs = $conexpg->query($insert1);
		  }
		  
		  }
		 }else{
			 echo"<center><h4><font color='#EC0D36'>No hay Resultados<br>El Numero de Partida $partida1 o el Periodo $anio Incorrectos</font></h4></center>";
			 /*eliminamos tabla temporal creada*/			  
	 $delete1 = mysqli_query($conex, "DROP TABLE ".$mon_tmp.";");
  if (!$delete1) {
    echo "Query: Un Eerror ha Occurido al Eliminar la Tabla Temporal";
  }else{  
  }	 
		 }

if($resultado1!=0){//inicia si hay resultados

/*contamos duas*/
$query_dua = "SELECT exportacion.fano,
extract(MONTH from exportacion.fnum) as mes,
COUNT(DISTINCT exportacion.ndcl) as ndcl
FROM exportacion
WHERE
exportacion.part_nandi = ".$partida1." $codex AND extract(year from exportacion.fnum) = ".$anio."
GROUP BY exportacion.fano,mes
ORDER BY exportacion.fano ASC";
	  /*$resultado_dua = pg_query($query_dua) or die("Error en la Consulta SQL");
	  $numReg_dua = pg_num_rows($resultado_dua);
	  if($numReg_dua>0){
		  while ($fila_dua=pg_fetch_array($resultado_dua)) {*/
	$resultado_dua=$conexpg->query($query_dua); 
if($resultado_dua->num_rows>0){ 
while($fila_dua=$resultado_dua->fetch_array()){
		  $c_aduana= $fila_dua['mes'];
		  $canti_aduana= $fila_dua['ndcl'];
		  if($c_aduana=='1'){
$insert1 = "UPDATE ".$mon_tmp." SET a01='".$canti_aduana."' WHERE codigo='8' "; 
$rs = $conexpg->query($insert1);
		  } else if($c_aduana=='2'){
$insert1 = "UPDATE ".$mon_tmp." SET a02='".$canti_aduana."' WHERE codigo='8' "; 
$rs = $conexpg->query($insert1);
		  } else if($c_aduana=='3'){
$insert1 = "UPDATE ".$mon_tmp." SET a03='".$canti_aduana."' WHERE codigo='8' "; 
$rs = $conexpg->query($insert1);
		  } else if($c_aduana=='4'){
$insert1 = "UPDATE ".$mon_tmp." SET a04='".$canti_aduana."' WHERE codigo='8' "; 
$rs = $conexpg->query($insert1);
		  } else if($c_aduana=='5'){
$insert1 = "UPDATE ".$mon_tmp." SET a05='".$canti_aduana."' WHERE codigo='8' "; 
$rs = $conexpg->query($insert1);
		  } else if($c_aduana=='6'){
$insert1 = "UPDATE ".$mon_tmp." SET a06='".$canti_aduana."' WHERE codigo='8' "; 
$rs = $conexpg->query($insert1);
		  } else if($c_aduana=='7'){
$insert1 = "UPDATE ".$mon_tmp." SET a07='".$canti_aduana."' WHERE codigo='8' "; 
$rs = $conexpg->query($insert1);
		  } else if($c_aduana=='8'){
$insert1 = "UPDATE ".$mon_tmp." SET a08='".$canti_aduana."' WHERE codigo='8' "; 
$rs = $conexpg->query($insert1);
		  } else if($c_aduana=='9'){
$insert1 = "UPDATE ".$mon_tmp." SET a09='".$canti_aduana."' WHERE codigo='8' "; 
$rs = $conexpg->query($insert1);
		  } else if($c_aduana=='10'){
$insert1 = "UPDATE ".$mon_tmp." SET a10='".$canti_aduana."' WHERE codigo='8' "; 
$rs = $conexpg->query($insert1);
		  } else if($c_aduana=='11'){
$insert1 = "UPDATE ".$mon_tmp." SET a11='".$canti_aduana."' WHERE codigo='8' "; 
$rs = $conexpg->query($insert1);
		  } else if($c_aduana=='12'){
$insert1 = "UPDATE ".$mon_tmp." SET a12='".$canti_aduana."' WHERE codigo='8' "; 
$rs = $conexpg->query($insert1);
		  }
		  
		  }
	  }
	  //total general duas
	   $distintoA="SELECT exportacion.fano, COUNT(DISTINCT exportacion.ndcl) as ndcl FROM exportacion WHERE exportacion.part_nandi = ".$partida1." $codex AND extract(year from exportacion.fnum) = ".$anio." GROUP BY exportacion.fano ORDER BY exportacion.fano ASC";
	/*$resu_distiA = pg_query($distintoA) or die("Error en la Consulta SQL Reporte");
	  $numReg_rA = pg_num_rows($resu_distiA);
	   if($numReg_rA > 0){
		   while ($distiA_row=pg_fetch_array($resu_distiA)) {*/
	$resu_distiA=$conexpg->query($distintoA); 
if($resu_distiA->num_rows>0){ 
while($distiA_row=$resu_distiA->fetch_array()){
		   $totax1= $distiA_row['ndcl'];
		   //actualizamos dato
		   $insert1 = "UPDATE ".$mon_tmp." SET atota='".$totax1."' WHERE codigo='8' "; 
$rs = $conexpg->query($insert1);
		   } 
		   }
		  
		  /*cantida empresa*/
		  $query_emp = "SELECT exportacion.fano,
extract(MONTH from exportacion.fnum) as mes,
COUNT(DISTINCT exportacion.dnombre) as dnombre
FROM exportacion
WHERE
exportacion.part_nandi = '".$partida1."' $codex AND extract(year from exportacion.fnum) = '".$anio."'
GROUP BY exportacion.fano,mes
ORDER BY exportacion.fano ASC ";
	  /*$resultado_emp = pg_query($query_emp) or die("Error en la Consulta SQL");
	  $numReg_emp = pg_num_rows($resultado_emp);
	  if($numReg_emp>0){
		  while ($fila_emp=pg_fetch_array($resultado_emp)) {*/
	$resultado_emp=$conexpg->query($query_emp); 
if($resultado_emp->num_rows>0){ 
while($fila_emp=$resultado_emp->fetch_array()){
		  $f_emp= $fila_emp['mes'];
		  $canti_emp= $fila_emp['dnombre'];
		  
		  if($f_emp=='1'){
$insert1 = "UPDATE ".$mon_tmp." SET a01='".$canti_emp."' WHERE codigo='9' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_emp=='2'){
$insert1 = "UPDATE ".$mon_tmp." SET a02='".$canti_emp."' WHERE codigo='9' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_emp=='3'){
$insert1 = "UPDATE ".$mon_tmp." SET a03='".$canti_emp."' WHERE codigo='9' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_emp=='4'){
$insert1 = "UPDATE ".$mon_tmp." SET a04='".$canti_emp."' WHERE codigo='9' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_emp=='5'){
$insert1 = "UPDATE ".$mon_tmp." SET a05='".$canti_emp."' WHERE codigo='9' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_emp=='6'){
$insert1 = "UPDATE ".$mon_tmp." SET a06='".$canti_emp."' WHERE codigo='9' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_emp=='7'){
$insert1 = "UPDATE ".$mon_tmp." SET a07='".$canti_emp."' WHERE codigo='9' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_emp=='8'){
$insert1 = "UPDATE ".$mon_tmp." SET a08='".$canti_emp."' WHERE codigo='9' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_emp=='9'){
$insert1 = "UPDATE ".$mon_tmp." SET a09='".$canti_emp."' WHERE codigo='9' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_emp=='10'){
$insert1 = "UPDATE ".$mon_tmp." SET a10='".$canti_emp."' WHERE codigo='9' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_emp=='11'){
$insert1 = "UPDATE ".$mon_tmp." SET a11='".$canti_emp."' WHERE codigo='9' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_emp=='12'){
$insert1 = "UPDATE ".$mon_tmp." SET a12='".$canti_emp."' WHERE codigo='9' "; 
$rs = $conexpg->query($insert1);
		  }
		  
		  
		  }
	  }
	  
	  //total general EMPRESAS
	   $distintoB="SELECT exportacion.fano, COUNT(DISTINCT exportacion.dnombre) as dnombre FROM exportacion WHERE exportacion.part_nandi = ".$partida1." $codex AND extract(year from exportacion.fnum) = ".$anio." GROUP BY exportacion.fano ORDER BY exportacion.fano ASC";
	/*$resu_distiB = pg_query($distintoB) or die("Error en la Consulta SQL Reporte");
	  $numReg_rB = pg_num_rows($resu_distiB);
	   if($numReg_rB > 0){
		   while ($distiB_row=pg_fetch_array($resu_distiB)) {*/
	$resu_distiB=$conexpg->query($distintoB); 
if($resu_distiB->num_rows>0){ 
while($distiB_row=$resu_distiB->fetch_array()){
		   $totax1= $distiB_row['dnombre'];
		   //actualizamos dato
		   $insert1 = "UPDATE ".$mon_tmp." SET atota='".$totax1."' WHERE codigo='9' "; 
$rs = $conexpg->query($insert1);
		   } 
		   }
	  
	  /*cosntamos mercado*/
	  $query_merca = "SELECT exportacion.fano,
extract(MONTH from exportacion.fnum) as mes,
COUNT(DISTINCT exportacion.cpaides) as cpaides
FROM exportacion
WHERE
exportacion.part_nandi = '".$partida1."' $codex AND extract(year from exportacion.fnum) = '".$anio."'
GROUP BY exportacion.fano,mes
ORDER BY exportacion.fano ASC ";
	  /*$resultado_merca = pg_query($query_merca) or die("Error en la Consulta SQL");
	  $numReg_merca = pg_num_rows($resultado_merca);
	  if($numReg_merca>0){
		  while ($fila_merca=pg_fetch_array($resultado_merca)) {*/
	$resultado_merca=$conexpg->query($query_merca); 
if($resultado_merca->num_rows>0){ 
while($fila_merca=$resultado_merca->fetch_array()){
		  $f_merca= $fila_merca['mes'];
		  $canti_merca= $fila_merca['cpaides'];
		  
		  if($f_merca=='1'){
$insert1 = "UPDATE ".$mon_tmp." SET a01='".$canti_merca."' WHERE codigo='10' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_merca=='2'){
$insert1 = "UPDATE ".$mon_tmp." SET a02='".$canti_merca."' WHERE codigo='10' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_merca=='3'){
$insert1 = "UPDATE ".$mon_tmp." SET a03='".$canti_merca."' WHERE codigo='10' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_merca=='4'){
$insert1 = "UPDATE ".$mon_tmp." SET a04='".$canti_merca."' WHERE codigo='10' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_merca=='5'){
$insert1 = "UPDATE ".$mon_tmp." SET a05='".$canti_merca."' WHERE codigo='10' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_merca=='6'){
$insert1 = "UPDATE ".$mon_tmp." SET a06='".$canti_merca."' WHERE codigo='10' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_merca=='7'){
$insert1 = "UPDATE ".$mon_tmp." SET a07='".$canti_merca."' WHERE codigo='10' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_merca=='8'){
$insert1 = "UPDATE ".$mon_tmp." SET a08='".$canti_merca."' WHERE codigo='10' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_merca=='9'){
$insert1 = "UPDATE ".$mon_tmp." SET a09='".$canti_merca."' WHERE codigo='10' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_merca=='10'){
$insert1 = "UPDATE ".$mon_tmp." SET a10='".$canti_merca."' WHERE codigo='10' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_merca=='11'){
$insert1 = "UPDATE ".$mon_tmp." SET a11='".$canti_merca."' WHERE codigo='10' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_merca=='12'){
$insert1 = "UPDATE ".$mon_tmp." SET a12='".$canti_merca."' WHERE codigo='10' "; 
$rs = $conexpg->query($insert1);
		  }
		  
		  }
	  }
	  
	  //total general MERCADO
	   $distintoC="SELECT exportacion.fano, COUNT(DISTINCT exportacion.cpaides) as cpaides FROM exportacion WHERE exportacion.part_nandi = ".$partida1." $codex AND extract(year from exportacion.fnum) = ".$anio." GROUP BY exportacion.fano ORDER BY exportacion.fano ASC";
	/*$resu_distiC = pg_query($distintoC) or die("Error en la Consulta SQL Reporte");
	  $numReg_rC = pg_num_rows($resu_distiC);
	   if($numReg_rC > 0){
		   while ($distiC_row=pg_fetch_array($resu_distiC)) {*/
	$resu_distiC=$conexpg->query($distintoC); 
if($resu_distiC->num_rows>0){ 
while($distiC_row=$resu_distiC->fetch_array()){
		   $totax1= $distiC_row['cpaides'];
		   //actualizamos dato
		   $insert1 = "UPDATE ".$mon_tmp." SET atota='".$totax1."' WHERE codigo='10' "; 
$rs = $conexpg->query($insert1);
		   } 
		   }
		  
		  /*contamos puertos*/
		  $query_puer = "SELECT exportacion.fano,
extract(MONTH from exportacion.fnum) as mes,
COUNT(DISTINCT exportacion.cpuedes) as cpuedes
FROM exportacion
WHERE
exportacion.part_nandi = '".$partida1."' $codex AND extract(year from exportacion.fnum) = '".$anio."'
GROUP BY exportacion.fano,mes
ORDER BY exportacion.fano ASC ";
	  /*$resultado_puer = pg_query($query_puer) or die("Error en la Consulta SQL");
	  $numReg_puer = pg_num_rows($resultado_puer);
	  if($numReg_puer>0){
		  while ($fila_puer=pg_fetch_array($resultado_puer)) {*/
	$resultado_puer=$conexpg->query($query_puer); 
if($resultado_puer->num_rows>0){ 
while($fila_puer=$resultado_puer->fetch_array()){
		  $f_puer= $fila_puer['mes'];
		  $canti_puer= $fila_puer['cpuedes'];
		  if($f_puer=='1'){
$insert1 = "UPDATE ".$mon_tmp." SET a01='".$canti_puer."' WHERE codigo='11' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_puer=='2'){
$insert1 = "UPDATE ".$mon_tmp." SET a02='".$canti_puer."' WHERE codigo='11' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_puer=='3'){
$insert1 = "UPDATE ".$mon_tmp." SET a03='".$canti_puer."' WHERE codigo='11' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_puer=='4'){
$insert1 = "UPDATE ".$mon_tmp." SET a04='".$canti_puer."' WHERE codigo='11' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_puer=='5'){
$insert1 = "UPDATE ".$mon_tmp." SET a05='".$canti_puer."' WHERE codigo='11' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_puer=='6'){
$insert1 = "UPDATE ".$mon_tmp." SET a06='".$canti_puer."' WHERE codigo='11' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_puer=='7'){
$insert1 = "UPDATE ".$mon_tmp." SET a07='".$canti_puer."' WHERE codigo='11' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_puer=='8'){
$insert1 = "UPDATE ".$mon_tmp." SET a08='".$canti_puer."' WHERE codigo='11' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_puer=='9'){
$insert1 = "UPDATE ".$mon_tmp." SET a09='".$canti_puer."' WHERE codigo='11' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_puer=='10'){
$insert1 = "UPDATE ".$mon_tmp." SET a10='".$canti_puer."' WHERE codigo='11' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_puer=='11'){
$insert1 = "UPDATE ".$mon_tmp." SET a11='".$canti_puer."' WHERE codigo='11' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_puer=='12'){
$insert1 = "UPDATE ".$mon_tmp." SET a12='".$canti_puer."' WHERE codigo='11' "; 
$rs = $conexpg->query($insert1);
		  }
		  
		  
		  }
	  }
	  
	  //total general PUERTOS
	   $distintoD="SELECT exportacion.fano, COUNT(DISTINCT exportacion.cpuedes) as cpuedes FROM exportacion WHERE exportacion.part_nandi = ".$partida1." $codex AND extract(year from exportacion.fnum) = ".$anio." GROUP BY exportacion.fano ORDER BY exportacion.fano ASC";
	/*$resu_distiD = pg_query($distintoD) or die("Error en la Consulta SQL Reporte");
	  $numReg_rD = pg_num_rows($resu_distiD);
	   if($numReg_rD > 0){
		   while ($distiD_row=pg_fetch_array($resu_distiD)) {*/
	$resu_distiD=$conexpg->query($distintoD); 
if($resu_distiD->num_rows>0){ 
while($distiD_row=$resu_distiD->fetch_array()){
		   $totax1= $distiD_row['cpuedes'];
		   //actualizamos dato
		   $insert1 = "UPDATE ".$mon_tmp." SET atota='".$totax1."' WHERE codigo='11' "; 
$rs = $conexpg->query($insert1);
		   } 
		   }
		  
		  /*contamos aduana*/
		  $query_aduan = "SELECT exportacion.fano,
extract(MONTH from exportacion.fnum) as mes,
COUNT(DISTINCT exportacion.cadu) as cadu
FROM exportacion
WHERE
exportacion.part_nandi = '".$partida1."' AND extract(year from exportacion.fnum) = '".$anio."'
GROUP BY exportacion.fano,mes
ORDER BY exportacion.fano ASC ";
	  /*$resultado_aduan = pg_query($query_aduan) or die("Error en la Consulta SQL");
	  $numReg_aduan = pg_num_rows($resultado_aduan);
	  if($numReg_aduan>0){
		  while ($fila_aduan=pg_fetch_array($resultado_aduan)) {*/
	$resultado_aduan=$conexpg->query($query_aduan); 
if($resultado_aduan->num_rows>0){ 
while($fila_aduan=$resultado_aduan->fetch_array()){
		  $f_aduan= $fila_aduan['mes'];
		  $canti_aduan= $fila_aduan['cadu'];
		  if($f_aduan=='1'){
$insert1 = "UPDATE ".$mon_tmp." SET a01='".$canti_aduan."' WHERE codigo='12' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_aduan=='2'){
$insert1 = "UPDATE ".$mon_tmp." SET a02='".$canti_aduan."' WHERE codigo='12' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_aduan=='3'){
$insert1 = "UPDATE ".$mon_tmp." SET a03='".$canti_aduan."' WHERE codigo='12' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_aduan=='4'){
$insert1 = "UPDATE ".$mon_tmp." SET a04='".$canti_aduan."' WHERE codigo='12' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_aduan=='5'){
$insert1 = "UPDATE ".$mon_tmp." SET a05='".$canti_aduan."' WHERE codigo='12' "; 
$rs = $conexpg->query($insert1);
		  } else  if($f_aduan=='6'){
$insert1 = "UPDATE ".$mon_tmp." SET a06='".$canti_aduan."' WHERE codigo='12' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_aduan=='7'){
$insert1 = "UPDATE ".$mon_tmp." SET a07='".$canti_aduan."' WHERE codigo='12' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_aduan=='8'){
$insert1 = "UPDATE ".$mon_tmp." SET a08='".$canti_aduan."' WHERE codigo='12' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_aduan=='9'){
$insert1 = "UPDATE ".$mon_tmp." SET a09='".$canti_aduan."' WHERE codigo='12' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_aduan=='10'){
$insert1 = "UPDATE ".$mon_tmp." SET a10='".$canti_aduan."' WHERE codigo='12' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_aduan=='11'){
$insert1 = "UPDATE ".$mon_tmp." SET a11='".$canti_aduan."' WHERE codigo='12' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_aduan=='12'){
$insert1 = "UPDATE ".$mon_tmp." SET a12='".$canti_aduan."' WHERE codigo='12' "; 
$rs = $conexpg->query($insert1);
		  }
		  
		  }
	  }
	  
	   //total general ADUANAS
	   $distintoE="SELECT exportacion.fano, COUNT(DISTINCT exportacion.cadu) as cadu FROM exportacion WHERE exportacion.part_nandi = ".$partida1." $codex AND extract(year from exportacion.fnum) = ".$anio." GROUP BY exportacion.fano ORDER BY exportacion.fano ASC";
	/*$resu_distiE = pg_query($distintoE) or die("Error en la Consulta SQL Reporte");
	  $numReg_rE = pg_num_rows($resu_distiE);
	   if($numReg_rE > 0){
		   while ($distiE_row=pg_fetch_array($resu_distiE)) {*/
	$resu_distiE=$conexpg->query($distintoE); 
if($resu_distiE->num_rows>0){ 
while($distiE_row=$resu_distiE->fetch_array()){
		   $totax1= $distiE_row['cadu'];
		   //actualizamos dato
		   $insert1 = "UPDATE ".$mon_tmp." SET atota='".$totax1."' WHERE codigo='12' "; 
$rs = $conexpg->query($insert1);
		   } 
		   }
		  
		  /*contamos departamento*/
		   $query_depa = "SELECT  exportacion.fano, extract(MONTH from exportacion.fnum) as mes,COUNT(DISTINCT SUBSTRING(exportacion.ubigeo,1,2)) as departamento 
FROM exportacion 
WHERE exportacion.part_nandi = '".$partida1."' $codex AND extract(year from exportacion.fnum) = '".$anio."'
GROUP BY exportacion.fano,mes
order BY exportacion.fano, departamento ASC";
	  /*$resultado_depa = pg_query($query_depa) or die("Error en la Consulta SQL");
	  $numReg_depa = pg_num_rows($resultado_depa);
	  if($numReg_depa>0){
		  while ($fila_depa=pg_fetch_array($resultado_depa)) {*/
	$resultado_depa=$conexpg->query($query_depa); 
if($resultado_depa->num_rows>0){ 
while($fila_depa=$resultado_depa->fetch_array()){
		  $f_depa= $fila_depa['mes'];
		  $canti_depa= $fila_depa['departamento'];
		  
		  if($f_depa=='1'){
$insert1 = "UPDATE ".$mon_tmp." SET a01='".$canti_depa."' WHERE codigo='13' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_depa=='2'){
$insert1 = "UPDATE ".$mon_tmp." SET a02='".$canti_depa."' WHERE codigo='13' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_depa=='3'){
$insert1 = "UPDATE ".$mon_tmp." SET a03='".$canti_depa."' WHERE codigo='13' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_depa=='4'){
$insert1 = "UPDATE ".$mon_tmp." SET a04='".$canti_depa."' WHERE codigo='13' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_depa=='5'){
$insert1 = "UPDATE ".$mon_tmp." SET a05='".$canti_depa."' WHERE codigo='13' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_depa=='6'){
$insert1 = "UPDATE ".$mon_tmp." SET a06='".$canti_depa."' WHERE codigo='13' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_depa=='7'){
$insert1 = "UPDATE ".$mon_tmp." SET a07='".$canti_depa."' WHERE codigo='13' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_depa=='8'){
$insert1 = "UPDATE ".$mon_tmp." SET a08='".$canti_depa."' WHERE codigo='13' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_depa=='9'){
$insert1 = "UPDATE ".$mon_tmp." SET a09='".$canti_depa."' WHERE codigo='13' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_depa=='10'){
$insert1 = "UPDATE ".$mon_tmp." SET a10='".$canti_depa."' WHERE codigo='13' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_depa=='11'){
$insert1 = "UPDATE ".$mon_tmp." SET a11='".$canti_depa."' WHERE codigo='13' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_depa=='12'){
$insert1 = "UPDATE ".$mon_tmp." SET a12='".$canti_depa."' WHERE codigo='13' "; 
$rs = $conexpg->query($insert1);
		  }
		  
		  }
	  }
	  
	  //total general DEPARTAMENTOS
	   $distintoF="SELECT  exportacion.fano,COUNT(DISTINCT SUBSTRING(exportacion.ubigeo,1,2)) as departamento FROM exportacion  WHERE exportacion.part_nandi = '".$partida1."' $codex AND extract(year from exportacion.fnum) = '".$anio."' GROUP BY exportacion.fano";
	/*$resu_distiF = pg_query($distintoF) or die("Error en la Consulta SQL Reporte");
	  $numReg_rF = pg_num_rows($resu_distiF);
	   if($numReg_rF > 0){
		   while ($distiF_row=pg_fetch_array($resu_distiF)) {*/
	$resu_distiF=$conexpg->query($distintoF); 
if($resu_distiF->num_rows>0){ 
while($distiF_row=$resu_distiF->fetch_array()){
		   $totax1= $distiF_row['departamento'];
		   //actualizamos dato
		   $insert1 = "UPDATE ".$mon_tmp." SET atota='".$totax1."' WHERE codigo='13' "; 
$rs = $conexpg->query($insert1);
		   } 
		   }
		  
		  /*contamos provincias*/
	/*$query_prov = "SELECT exportacion.fano, extract(MONTH from exportacion.fnum) as mes,count(DISTINCT provincia.nombre) as nombre
FROM exportacion LEFT JOIN departamento ON 
(((SUBSTRING(exportacion.ubigeo,1,2))= departamento.iddepartamento)) 
INNER JOIN provincia ON provincia.iddepartamento = departamento.iddepartamento 
WHERE exportacion.part_nandi = '".$partida1."' $codex AND extract(year from exportacion.fnum) = '".$anio."'
GROUP BY exportacion.fano,mes ORDER BY exportacion.fano ASC ";
	$resultado_prov=$conexpg->query($query_prov); 
if($resultado_prov->num_rows>0){ 
while($fila_prov=$resultado_prov->fetch_array()){
		  $f_prov= $fila_prov['mes'];
		  $canti_prov= $fila_prov['nombre'];
		  
		  if($f_prov=='1'){
$insert1 = "UPDATE ".$mon_tmp." SET a01='".$canti_prov."' WHERE codigo='14' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_prov=='2'){
$insert1 = "UPDATE ".$mon_tmp." SET a02='".$canti_prov."' WHERE codigo='14' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_prov=='3'){
$insert1 = "UPDATE ".$mon_tmp." SET a03='".$canti_prov."' WHERE codigo='14' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_prov=='4'){
$insert1 = "UPDATE ".$mon_tmp." SET a04='".$canti_prov."' WHERE codigo='14' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_prov=='5'){
$insert1 = "UPDATE ".$mon_tmp." SET a05='".$canti_prov."' WHERE codigo='14' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_prov=='6'){
$insert1 = "UPDATE ".$mon_tmp." SET a06='".$canti_prov."' WHERE codigo='14' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_prov=='7'){
$insert1 = "UPDATE ".$mon_tmp." SET a07='".$canti_prov."' WHERE codigo='14' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_prov=='8'){
$insert1 = "UPDATE ".$mon_tmp." SET a08='".$canti_prov."' WHERE codigo='14' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_prov=='9'){
$insert1 = "UPDATE ".$mon_tmp." SET a09='".$canti_prov."' WHERE codigo='14' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_prov=='10'){
$insert1 = "UPDATE ".$mon_tmp." SET a10='".$canti_prov."' WHERE codigo='14' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_prov=='11'){
$insert1 = "UPDATE ".$mon_tmp." SET a11='".$canti_prov."' WHERE codigo='14' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_prov=='12'){
$insert1 = "UPDATE ".$mon_tmp." SET a12='".$canti_prov."' WHERE codigo='14' "; 
$rs = $conexpg->query($insert1);
		  }
		  
		  }
	  }*/
	  
	  //total general PROVINCIAS
	/*$distintoG="SELECT exportacion.fano, count(DISTINCT provincia.nombre) as nombre FROM exportacion LEFT JOIN departamento ON  (((SUBSTRING(exportacion.ubigeo,1,2))= departamento.iddepartamento)) INNER JOIN provincia ON provincia.iddepartamento = departamento.iddepartamento  WHERE exportacion.part_nandi = '".$partida1."' $codex AND extract(year from exportacion.fnum) = '".$anio."' GROUP BY exportacion.fano";
	$resu_distiG=$conexpg->query($distintoG); 
if($resu_distiG->num_rows>0){ 
while($distiG_row=$resu_distiG->fetch_array()){
		   $totax1= $distiG_row['nombre'];
		   //actualizamos dato
		   $insert1 = "UPDATE ".$mon_tmp." SET atota='".$totax1."' WHERE codigo='14' "; 
$rs = $conexpg->query($insert1);
		   } 
		   }*/
		  
		  /*contamos distritos*/
	/*$query_dist = "SELECT
exportacion.fano, extract(MONTH from exportacion.fnum) as mes, COUNT(DISTINCT distrito.nombre) as distrito
FROM exportacion LEFT JOIN departamento ON 
((((SUBSTRING(exportacion.ubigeo,1,2))= departamento.iddepartamento))) 
INNER JOIN provincia ON provincia.iddepartamento = departamento.iddepartamento 
INNER JOIN distrito ON distrito.idprovincia = provincia.idprovincia 
WHERE exportacion.part_nandi = '".$partida1."' $codex AND extract(year from exportacion.fnum) = '".$anio."'
GROUP BY exportacion.fano,mes 
ORDER BY exportacion.fano,mes ASC ";
	$resultado_dist=$conexpg->query($query_dist); 
if($resultado_dist->num_rows>0){ 
while($fila_dist=$resultado_dist->fetch_array()){
		  $f_dist= $fila_dist['mes'];
		  $canti_dist= $fila_dist['distrito'];
		  
		  if($f_dist=='1'){
$insert1 = "UPDATE ".$mon_tmp." SET a01='".$canti_dist."' WHERE codigo='15' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_dist=='2'){
$insert1 = "UPDATE ".$mon_tmp." SET a02='".$canti_dist."' WHERE codigo='15' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_dist=='3'){
$insert1 = "UPDATE ".$mon_tmp." SET a03='".$canti_dist."' WHERE codigo='15' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_dist=='4'){
$insert1 = "UPDATE ".$mon_tmp." SET a04='".$canti_dist."' WHERE codigo='15' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_dist=='5'){
$insert1 = "UPDATE ".$mon_tmp." SET a05='".$canti_dist."' WHERE codigo='15' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_dist=='6'){
$insert1 = "UPDATE ".$mon_tmp." SET a06='".$canti_dist."' WHERE codigo='15' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_dist=='7'){
$insert1 = "UPDATE ".$mon_tmp." SET a07='".$canti_dist."' WHERE codigo='15' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_dist=='8'){
$insert1 = "UPDATE ".$mon_tmp." SET a08='".$canti_dist."' WHERE codigo='15' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_dist=='9'){
$insert1 = "UPDATE ".$mon_tmp." SET a09='".$canti_dist."' WHERE codigo='15' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_dist=='10'){
$insert1 = "UPDATE ".$mon_tmp." SET a10='".$canti_dist."' WHERE codigo='15' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_dist=='11'){
$insert1 = "UPDATE ".$mon_tmp." SET a11='".$canti_dist."' WHERE codigo='15' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_dist=='12'){
$insert1 = "UPDATE ".$mon_tmp." SET a12='".$canti_dist."' WHERE codigo='15' "; 
$rs = $conexpg->query($insert1);
		  }
		  
		  
		  }
	  }*/
	  
	  //total general DISTRITOS
	/*$distintoH="SELECT
exportacion.fano,COUNT(DISTINCT distrito.nombre) as distrito
FROM exportacion LEFT JOIN departamento ON 
((((SUBSTRING(exportacion.ubigeo,1,2))= departamento.iddepartamento))) 
INNER JOIN provincia ON provincia.iddepartamento = departamento.iddepartamento 
INNER JOIN distrito ON distrito.idprovincia = provincia.idprovincia 
WHERE exportacion.part_nandi = '".$partida1."' $codex AND extract(year from exportacion.fnum) = '".$anio."'
GROUP BY exportacion.fano";
	$resu_distiH=$conexpg->query($distintoH); 
if($resu_distiH->num_rows>0){ 
while($distiH_row=$resu_distiH->fetch_array()){
		   $totax1= $distiH_row['distrito'];
		   //actualizamos dato
		   $insert1 = "UPDATE ".$mon_tmp." SET atota='".$totax1."' WHERE codigo='15' "; 
$rs = $conexpg->query($insert1);
		   } 
		   }*/
		  
		  /*contamos agentes*/
		 $query_agen = "SELECT exportacion.fano,
extract(MONTH from exportacion.fnum) as mes,
COUNT(DISTINCT exportacion.cage) as cage
FROM exportacion
WHERE
exportacion.part_nandi = '".$partida1."' $codex AND extract(year from exportacion.fnum) = '".$anio."'
GROUP BY exportacion.fano,mes
ORDER BY exportacion.fano ASC ";
	  /*$resultado_agen = pg_query($query_agen) or die("Error en la Consulta SQL");
	  $numReg_agen = pg_num_rows($resultado_agen);
	  if($numReg_agen>0){
		  while ($fila_agen=pg_fetch_array($resultado_agen)) {*/
	$resultado_agen=$conexpg->query($query_agen); 
if($resultado_agen->num_rows>0){ 
while($fila_agen=$resultado_agen->fetch_array()){
		  $f_agen= $fila_agen['mes'];
		  $canti_agen= $fila_agen['cage'];
		   if($f_agen=='1'){
$insert1 = "UPDATE ".$mon_tmp." SET a01='".$canti_agen."' WHERE codigo='16' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_agen=='2'){
$insert1 = "UPDATE ".$mon_tmp." SET a02='".$canti_agen."' WHERE codigo='16' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_agen=='3'){
$insert1 = "UPDATE ".$mon_tmp." SET a03='".$canti_agen."' WHERE codigo='16' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_agen=='4'){
$insert1 = "UPDATE ".$mon_tmp." SET a04='".$canti_agen."' WHERE codigo='16' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_agen=='5'){
$insert1 = "UPDATE ".$mon_tmp." SET a05='".$canti_agen."' WHERE codigo='16' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_agen=='6'){
$insert1 = "UPDATE ".$mon_tmp." SET a06='".$canti_agen."' WHERE codigo='16' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_agen=='7'){
$insert1 = "UPDATE ".$mon_tmp." SET a07='".$canti_agen."' WHERE codigo='16' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_agen=='8'){
$insert1 = "UPDATE ".$mon_tmp." SET a08='".$canti_agen."' WHERE codigo='16' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_agen=='9'){
$insert1 = "UPDATE ".$mon_tmp." SET a09='".$canti_agen."' WHERE codigo='16' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_agen=='10'){
$insert1 = "UPDATE ".$mon_tmp." SET a10='".$canti_agen."' WHERE codigo='16' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_agen=='11'){
$insert1 = "UPDATE ".$mon_tmp." SET a11='".$canti_agen."' WHERE codigo='16' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_agen=='12'){
$insert1 = "UPDATE ".$mon_tmp." SET a12='".$canti_agen."' WHERE codigo='16' "; 
$rs = $conexpg->query($insert1);
		  }
		  
		  
		  }
	  }
	  
	   //total general AGENTES
	   $distintoI="SELECT exportacion.fano, COUNT(DISTINCT exportacion.cage) as cage FROM exportacion WHERE exportacion.part_nandi = ".$partida1." $codex AND extract(year from exportacion.fnum) = ".$anio." GROUP BY exportacion.fano";
	/*$resu_distiI = pg_query($distintoI) or die("Error en la Consulta SQL Reporte");
	  $numReg_rI = pg_num_rows($resu_distiI);
	   if($numReg_rI > 0){
		   while ($distiI_row=pg_fetch_array($resu_distiI)) {*/
	$resu_distiI=$conexpg->query($distintoI); 
if($resu_distiI->num_rows>0){ 
while($distiI_row=$resu_distiI->fetch_array()){
		   $totax1= $distiI_row['cage'];
		   //actualizamos dato
		   $insert1 = "UPDATE ".$mon_tmp." SET atota='".$totax1."' WHERE codigo='16' "; 
$rs = $conexpg->query($insert1);
		   } 
		   }
		  
		  /*contamos via de transporte*/
		 $query_transpo = "SELECT exportacion.fano,
extract(MONTH from exportacion.fnum) as mes,
COUNT(DISTINCT exportacion.cviatra) as cviatra
FROM exportacion
WHERE
exportacion.part_nandi = '".$partida1."' $codex AND extract(year from exportacion.fnum) = '".$anio."'
GROUP BY exportacion.fano,mes
ORDER BY exportacion.fano ASC ";
	  /*$resultado_transp = pg_query($query_transpo) or die("Error en la Consulta SQL");
	  $numReg_transp = pg_num_rows($resultado_transp);
	  if($numReg_transp>0){
		  while ($fila_transp=pg_fetch_array($resultado_transp)) {*/
	$resultado_transp=$conexpg->query($query_transpo); 
if($resultado_transp->num_rows>0){ 
while($fila_transp=$resultado_transp->fetch_array()){
		  $f_transp= $fila_transp['mes'];
		  $canti_transp= $fila_transp['cviatra'];
		  if($f_transp=='1'){
$insert1 = "UPDATE ".$mon_tmp." SET a01='".$canti_transp."' WHERE codigo='17' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_transp=='2'){
$insert1 = "UPDATE ".$mon_tmp." SET a02='".$canti_transp."' WHERE codigo='17' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_transp=='3'){
$insert1 = "UPDATE ".$mon_tmp." SET a03='".$canti_transp."' WHERE codigo='17' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_transp=='4'){
$insert1 = "UPDATE ".$mon_tmp." SET a04='".$canti_transp."' WHERE codigo='17' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_transp=='5'){
$insert1 = "UPDATE ".$mon_tmp." SET a05='".$canti_transp."' WHERE codigo='17' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_transp=='6'){
$insert1 = "UPDATE ".$mon_tmp." SET a06='".$canti_transp."' WHERE codigo='17' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_transp=='7'){
$insert1 = "UPDATE ".$mon_tmp." SET a07='".$canti_transp."' WHERE codigo='17' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_transp=='8'){
$insert1 = "UPDATE ".$mon_tmp." SET a08='".$canti_transp."' WHERE codigo='17' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_transp=='9'){
$insert1 = "UPDATE ".$mon_tmp." SET a09='".$canti_transp."' WHERE codigo='17' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_transp=='10'){
$insert1 = "UPDATE ".$mon_tmp." SET a10='".$canti_transp."' WHERE codigo='17' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_transp=='11'){
$insert1 = "UPDATE ".$mon_tmp." SET a11='".$canti_transp."' WHERE codigo='17' "; 
$rs = $conexpg->query($insert1);
		  } else if($f_transp=='12'){
$insert1 = "UPDATE ".$mon_tmp." SET a12='".$canti_transp."' WHERE codigo='17' "; 
$rs = $conexpg->query($insert1);
		  }
		  
		  }
	  }
	  
	  //total general AGENTES
	   $distintoJ="SELECT exportacion.fano, COUNT(DISTINCT exportacion.cviatra) as cviatra FROM exportacion WHERE exportacion.part_nandi = ".$partida1." $codex AND extract(year from exportacion.fnum) = ".$anio." GROUP BY exportacion.fano";
	/*$resu_distiJ = pg_query($distintoJ) or die("Error en la Consulta SQL Reporte");
	  $numReg_rJ = pg_num_rows($resu_distiJ);
	   if($numReg_rJ > 0){
		   while ($distiJ_row=pg_fetch_array($resu_distiJ)) {*/
	$resu_distiJ=$conexpg->query($distintoJ); 
if($resu_distiJ->num_rows>0){ 
while($distiJ_row=$resu_distiJ->fetch_array()){
		   $totax1= $distiJ_row['cviatra'];
		   //actualizamos dato
		   $insert1 = "UPDATE ".$mon_tmp." SET atota='".$totax1."' WHERE codigo='17' "; 
$rs = $conexpg->query($insert1);
		   } 
		   }
  
  /*visualizamos datos en el reporte*/
  $query_resultado = "SELECT
".$mon_tmp.".codigo,
".$mon_tmp.".nomvariable,
".$mon_tmp.".a01,
".$mon_tmp.".a02,
".$mon_tmp.".a03,
".$mon_tmp.".a04,
".$mon_tmp.".a05,
".$mon_tmp.".a06,
".$mon_tmp.".a07,
".$mon_tmp.".a08,
".$mon_tmp.".a09,
".$mon_tmp.".a10,
".$mon_tmp.".a11,
".$mon_tmp.".a12,
".$mon_tmp.".atota
FROM
".$mon_tmp."
ORDER BY
".$mon_tmp.".codigo ASC";
	  /*$resultado_rpt = pg_query($query_resultado) or die("Error en la Consulta SQL Reporte");
	  $numReg_rpt = pg_num_rows($resultado_rpt);*/
	$resultado_rpt=$conexpg->query($query_resultado); 
if($resultado_rpt->num_rows>0){ 
echo"<div class='col-md-12'>";
        echo"<div class='card'>";
	echo"<div class='card-header card-header-info card-header-icon'>
              <div class='card-icon'>
                <i class='material-icons'>assignment</i>
              </div>
              <h4 class='card-title'><b>Reporte Mensual de Indicadores - Exportaciones</b><br> Partida #: $partida1 │ Departamento: $namedepa1 │ Fecha Numeracion │ Periodo $anio </b> </h4>
            </div>";
		echo"<div class='card-body'>";
		echo"<div class='toolbar'>
                  </div>";
         echo"<div class='material-datatables'>";
		echo"<table id='datatablese' class='table table-striped table-no-bordered table-hover' cellspacing='0' width='100%' style='width:100%'>";
		  echo"<thead>
                          <tr>
                              <th>Indicadores</th>
							  <th>Enero</th>
                              <th>Febrero</th>
                              <th>Marzo</th>
                              <th>Abril</th>
                              <th>Mayo</th>
							  <th>Junio</th>
							  <th>Julio</th>
							  <th>Agosto</th>
							  <th>Septiembre</th>
							  <th>Octubre</th>
							  <th>Noviembre</th>
							  <th>Diciembre</th>
							  <th>Total</th>
                          </tr>
                      </thead>";
		 echo"<tfoot>
                          <tr>
						      <th>Indicadores</th>
							  <th>Enero</th>
                              <th>Febrero</th>
                              <th>Marzo</th>
                              <th>Abril</th>
                              <th>Mayo</th>
							  <th>Junio</th>
							  <th>Julio</th>
							  <th>Agosto</th>
							  <th>Septiembre</th>
							  <th>Octubre</th>
							  <th>Noviembre</th>
							  <th>Diciembre</th>
							  <th>Total</th>
                          </tr>
                      </tfoot>";
           echo"<tbody>";
		 //while ($fila_rpt=pg_fetch_array($resultado_rpt)) {
			 while($fila_rpt=$resultado_rpt->fetch_array()){
		   $idcodi= $fila_rpt['codigo'];
		   $nombredesc= $fila_rpt['nomvariable'];
		  $mes1= $fila_rpt['a01'];
		  $mes2= $fila_rpt['a02'];
		  $mes3= $fila_rpt['a03'];
		  $mes4= $fila_rpt['a04'];
		  $mes5= $fila_rpt['a05'];
		  $mes6= $fila_rpt['a06'];
		  $mes7= $fila_rpt['a07'];
		  $mes8= $fila_rpt['a08'];
		  $mes9= $fila_rpt['a09'];
		  $mes10= $fila_rpt['a10'];
		  $mes11= $fila_rpt['a11'];
		  $mes12= $fila_rpt['a12'];
		  $tota= $mes1 + $mes2 + $mes3 + $mes4 + $mes5 + $mes6 + $mes7 + $mes8 + $mes9 + $mes10 + $mes11 + $mes12;

		  if($idcodi=="3"){
			  $valotota= $mes1 + $mes2 + $mes3 + $mes4 + $mes5 + $mes6 + $mes7 + $mes8 + $mes9 + $mes10 + $mes11 + $mes12;
			  $tota = $valotota / 12;
		  }else if($idcodi=="8" or $idcodi=="9" or $idcodi=="10" or $idcodi=="11" or $idcodi=="12" or $idcodi=="13" or $idcodi=="14" or $idcodi=="15" or $idcodi=="16" or $idcodi=="17"){
			  $tota= $fila_rpt['atota'];
			  }
			  
		  
		  
		  echo "<tr>";
echo "<td>$nombredesc</td>";
echo "<td>".number_format($mes1,2)."</td>";
echo "<td>".number_format($mes2,2)."</td>";
echo "<td>".number_format($mes3,2)."</td>";
echo "<td>".number_format($mes4,2)."</td>";
echo "<td>".number_format($mes5,2)."</td>";
echo "<td>".number_format($mes6,2)."</td>";
echo "<td>".number_format($mes7,2)."</td>";
echo "<td>".number_format($mes8,2)."</td>";
echo "<td>".number_format($mes9,2)."</td>";
echo "<td>".number_format($mes10,2)."</td>";
echo "<td>".number_format($mes11,2)."</td>";
echo "<td>".number_format($mes12,2)."</td>";
echo "<td>".number_format($tota,2)."</td>";
 echo "</tr>";
		  
		  }
		  echo"</tbody>";
		  echo"</table>";
		  echo"</div>";
		  echo"</div>";
		  echo"</div>";
		  echo"</div>";
		  
		   //echo "<a class='btn btn-success' href='rpt_excel/rpt_mdestino_Aanual_excel.php?dato=$partida1&option=$radiox&varia2=$anio'>Exportar Excel <img src='images/Excel-icon.png'></a>";
		   echo "</div></div></div>";
		   
		   ?>



<?php
		   
	  }


   }//fin si hay resultados
				?>
           
            </div>
            </div>
        </div>
        </div>
        </div>
        </div>

</div>

    </div>

</body>

    <!--   Core JS Files   -->
<script src="../../js/core/jquery.min.js"></script>
<script src="../../js/core/popper.min.js"></script>


<script src="../../js/bootstrap-material-design.min.js"></script>


<script src="../../js/plugins/perfect-scrollbar.jquery.min.js"></script>



<!--  Google Maps Plugin  -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2Yno10-YTnLjjn_Vtk0V8cdcY5lC4plU"></script>


<!--  Plugin for Date Time Picker and Full Calendar Plugin  -->
<script src="../../js/plugins/moment.min.js"></script>

<!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
<script src="../../js/plugins/bootstrap-datetimepicker.min.js"></script>

<!--	Plugin for the Sliders, full documentation here: https://refreshless.com/nouislider/ -->
<script src="../../js/plugins/nouislider.min.js"></script>



<!--	Plugin for Select, full documentation here: https://silviomoreto.github.io/bootstrap-select -->
<script src="../../js/plugins/bootstrap-selectpicker.js"></script>

<!--	Plugin for Tags, full documentation here: https://xoxco.com/projects/code/tagsinput/  -->
<script src="../../js/plugins/bootstrap-tagsinput.js"></script>

<!--	Plugin for Fileupload, full documentation here: https://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="../../js/plugins/jasny-bootstrap.min.js"></script>

<!-- Plugins for presentation and navigation  -->
<script src="../../assets-for-demo/js/modernizr.js"></script>




<!-- Material Kit Core initialisations of plugins and Bootstrap Material Design Library -->

<script src="../../js/material-dashboard.js?v=2.0.1"></script>



<!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>

<!-- Library for adding dinamically elements -->
<script src="../../js/plugins/arrive.min.js" type="text/javascript"></script>

<!-- Forms Validations Plugin -->
<script src="../../js/plugins/jquery.validate.min.js"></script>

<!--  Charts Plugin, full documentation here: https://gionkunz.github.io/chartist-js/ -->
<script src="../../js/plugins/chartist.min.js"></script>

<!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
<script src="../../js/plugins/jquery.bootstrap-wizard.js"></script>

<!--  Notifications Plugin, full documentation here: https://bootstrap-notify.remabledesigns.com/    -->
<script src="../../js/plugins/bootstrap-notify.js"></script>

<!-- Vector Map plugin, full documentation here: https://jvectormap.com/documentation/ -->
<script src="../../js/plugins/jquery-jvectormap.js"></script>

<!-- Sliders Plugin, full documentation here: https://refreshless.com/nouislider/ -->
<script src="../../js/plugins/nouislider.min.js"></script>

<!--  Plugin for Select, full documentation here: https://silviomoreto.github.io/bootstrap-select -->
<script src="../../js/plugins/jquery.select-bootstrap.js"></script>

<!--  DataTables.net Plugin, full documentation here: https://datatables.net/    -->
<script src="../../js/plugins/jquery.datatables.js"></script>

<!-- Sweet Alert 2 plugin, full documentation here: https://limonte.github.io/sweetalert2/ -->
<script src="../../js/plugins/sweetalert2.js"></script>

<!-- Plugin for Fileupload, full documentation here: https://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="../../js/plugins/jasny-bootstrap.min.js"></script>

<!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
<script src="../../js/plugins/fullcalendar.min.js"></script>

<!-- demo init -->
<script src="../../js/plugins/demo.js"></script>
 
    <!--<script type="text/javascript" src="../js/jsexport/jquery.dataTables.min.js"></script>-->
    <script type="text/javascript" src="../../js/jsexport/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="../../js/jsexport/buttons.flash.min.js"></script>
    <script type="text/javascript" src="../../js/jsexport/jszip.min.js"></script>
    <script type="text/javascript" src="../../js/jsexport/pdfmake.min.js"></script>
    <script type="text/javascript" src="../../js/jsexport/vfs_fonts.js"></script>
    <script type="text/javascript" src="../../js/jsexport/buttons.html5.min.js"></script>
    <script type="text/javascript" src="../../js/jsexport/buttons.print.min.js"></script>
  
  <script type="text/javascript">
$(document).ready(function() {
    $('#datatablese').DataTable({
		"order": [[ 0, "asc" ]],
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
    var table = $('#datatablese').DataTable();

    $('.card .material-datatablese label').addClass('form-group');
});

</script>

  <script type="text/javascript">
    $().ready(function(){
        demo.checkFullPageBackgroundImage();

        setTimeout(function(){
            // after 1000 ms we add the class animated to the login/register card
            $('.card').removeClass('card-hidden');
        }, 700)
    });
</script>

<?php
/*eliminamos tabla temporal creada*/			  
	 $delete1 = mysqli_query($conexpg, "DROP TABLE ".$mon_tmp.";");
  if (!$delete1) {
    echo "Query: Un Eerror ha Occurido al Eliminar la Tabla Temporal";
    exit;
  }else{
	   //echo "<center><b>Tabla Eliminado !! </b></center>";
  }
//cerrando conexion
	mysqli_close($conexpg);
?>
</html>