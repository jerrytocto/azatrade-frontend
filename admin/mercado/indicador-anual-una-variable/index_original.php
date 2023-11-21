<?php
session_start();
if (isset($_SESSION['login_usuario'])){//si es logeado
	if($_SESSION['rol']=='ADMIN'){//si es admin no hace nada
		
	}else{//si es usuario
		if($_SESSION['acceso_pago']=='NO'){
			//print "<script>alert('Acceso Denegado! - Para tener acceso adquiere uno de nuestros planes');window.location='../../planes/';</script>";
		}
		
	}
}else{//si no esta logeado
	if(!isset($_SESSION["login_usuario"]) || $_SESSION["login_usuario"]==null){
	//print "<script>alert('Acceso invalido! - Inicia Sesion para Acceder');window.location='$enlace_actual';</script>";
	print "<script>window.location='../../';</script>";
		exit();
}
}
date_default_timezone_set("America/Lima");
$fechahoy = date("Y-m-d");

set_time_limit(500);
$paisname = $_POST["namepaisC"];
$paiscode = $_POST["codepaisC"];
$onevar = $_POST["unavari"];

$namedepa1 = $_POST["namedepa"];
$ubicod1 = $_POST["codubi"];
if($ubicod1!=""){
	$flatcod = $ubicod1;
}else{
	$flatcod = "";
}

if($onevar=="vfobserdol"){
	 $combo = "Valor FOB USD";
 }else if($onevar=="vpesnet"){
	  $combo = "Peso Neto (Kg)";
 }else if($onevar=="diferen"){
	  $combo = "Precio FOB USD x KG";
 }else if($onevar=="vpesbru"){
	  $combo = "Peso Bruto (Kg)";
 }else if($onevar=="qunifis"){
	  $combo = "Cantidad Exportada";
 }else if($onevar=="qunicom"){
	  $combo = "Unidades Comerciales";
 }else if($onevar=="part_nandi"){
	  $combo = "Cantidad de Partidas";
}else if($onevar=="total"){
	  $combo = "Cantidad de Registros";
 }else if($onevar=="ndcl"){
	  $combo = "Cantidad de Duas";
 }else if($onevar=="dnombre"){
	  $combo = "Cantidad de Empresas";
 }else if($onevar=="cpaides"){
	  $combo = "Cantidad de Mercados";
 }else if($onevar=="cpuedes"){
	  $combo = "Cantidad de Puertos";
 }else if($onevar=="cadu"){
	  $combo = "Cantidad de Aduanas";
 }else if($onevar=="depa"){
	  $combo = "Cantidad de Departamentos";
 }else if($onevar=="provi"){
	  $combo = "Cantidad de Provincias";
 }else if($onevar=="distri"){
	  $combo = "Cantidad de Distritos";
 }else if($onevar=="cage"){
	  $combo = "Cantidad de Agentes";
 }else if($onevar=="cviatra"){
	  $combo = "Cantidad de vias de Transporte";
 }

$condi = $_SESSION['acceso_pago'];
if($condi=='SI' or $condi=='NO' and $_SESSION['rol']=='ADMIN'){//tiene o no pago y es admin visualiza
	$axe = "SI";
}else if($condi=='NO' and $_SESSION['rol']<>'ADMIN'){//no tiene pago y no es admin limita 5 registros
	$axe = "NO";
}else if($condi=='SI' and $_SESSION['rol']<>'ADMIN'){//si tiene pago y no es admin visualiza todo
	$axe = "SI";
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
      <style>
		.loader {
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background: url('../../img/loading-carga.gif') 50% 50% no-repeat rgb(249,249,249);
    opacity: .8;
}
	</style>
      <script type="text/javascript">
$(window).load(function() {
    $(".loader").fadeOut("slow");
});
</script>
       
        </head>
        <body class="off-canvas-sidebar register-page" style="background-image: url('../../img/plan.jpg'); background-size: cover; background-position: top center;">
     
<div class="loader"></div>
   
    <!--<div class="wrapper wrapper-full-page">-->
          <div class="wrapper">
           <div class="content">
                      <div class="container-fluid">
                            <div class="row"> 
                            
            <div class='col-md-12'>
          
          <?php if($axe=='NO'){ ?>
          <div class="alert alert-warning alert-with-icon" data-notify="container">
            <i class="material-icons" data-notify="icon">notifications</i>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <i class="material-icons">info</i>
            </button>
            <span data-notify="message"><h3>Versión GRATUITA!. Limitada en solo los 5 primeros registros, si quieres ver toda la información consultada adquiere uno de nuestros <a href="../../planes/" target="_blank">PLANES AQUI</a></h3></span>
          </div>
           <?php } ?>
           
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
a2012 numeric(30,2),
a2013 numeric(30,2),
a2014 numeric(30,2),
a2015 numeric(30,2),
a2016 numeric(30,2),
a2017 numeric(30,2),
a2018 numeric(30,2),
a2019 numeric(30,2))"; 
				$rscrea = $conexpg->query($createsql);
 //$rscrea = pg_query($createsql)or die("Error en la Consulta SQL Crear Tabla Temporal"); 
 if (!$rscrea) {
    echo "Query: Un error ha occurido al crear tabla Temporal";
    exit;
  }else{
	   //echo "<center><b>Data Actualizado hasta Marzo-2016 </b></center>";
  }

/*insertamos registro*/
  $sqlinsert1="INSERT INTO ".$mon_tmp."  (codigo,nomvariable,a2012,a2013,a2014,a2015,a2016,a2017,a2018,a2019) VALUES ('1','Enero','0','0','0','0','0','0','0','0'),
  ('2','Febrero','0','0','0','0','0','0','0','0'),
  ('3','Marzo','0','0','0','0','0','0','0','0'),
  ('4','Abril','0','0','0','0','0','0','0','0'),
  ('5','Mayo','0','0','0','0','0','0','0','0'),
  ('6','Junio','0','0','0','0','0','0','0','0'),
  ('7','Julio','0','0','0','0','0','0','0','0'),
  ('8','Agosto','0','0','0','0','0','0','0','0'),
  ('9','Septiembre','0','0','0','0','0','0','0','0'),
  ('10','Octubre','0','0','0','0','0','0','0','0'),
  ('11','Noviembre','0','0','0','0','0','0','0','0'),
  ('12','Diciembre','0','0','0','0','0','0','0','0'); ";
				$rscrea2 = $conexpg->query($sqlinsert1);
//$rscrea2 = pg_query($sqlinsert1)or die("Error en la Consulta SQL Insertar Registro Tabla Temporal");
if (!$rscrea2) {
    echo "Query: Un error ha occurido al crear insercion  tabla Temporal";
    exit;
  }else{
	   //echo "<center><b>Datos Insertados !! </b></center>";
  } 
				
/*realizamos conusulta del reporte selecionado y  actualizamos en la tabla temporal crada*/
  if($onevar=="vfobserdol"){
   $query1 = "SELECT exportacion.fano, extract(MONTH from exportacion.fnum) as mes,
 Sum(exportacion.vfobserdol) as resultado FROM exportacion 
 WHERE exportacion.cpaides='".$paiscode."' AND SUBSTRING(exportacion.ubigeo,1,2) like '%$flatcod' AND extract(year from exportacion.fnum) >= '2012' AND
extract(year from exportacion.fnum) <= '2019' GROUP BY exportacion.fano,mes ORDER BY exportacion.fano,mes";
  }
  if($onevar=="vpesnet"){
  $query1 = "SELECT exportacion.fano, extract(MONTH from exportacion.fnum) as mes, Sum(exportacion.vpesnet) as resultado FROM exportacion WHERE exportacion.cpaides = '".$paiscode."' AND SUBSTRING(exportacion.ubigeo,1,2) like '%$flatcod' AND extract(year from exportacion.fnum) >= '2012' AND extract(year from exportacion.fnum) <= '2019' GROUP BY exportacion.fano,mes ORDER BY exportacion.fano,mes";
  }
  if($onevar=="diferen"){
  $query1 = "SELECT exportacion.fano, extract(MONTH from exportacion.fnum) as mes, Sum(exportacion.vfobserdol) / Sum(exportacion.vpesnet) as resultado FROM exportacion WHERE exportacion.cpaides = '".$paiscode."' AND SUBSTRING(exportacion.ubigeo,1,2) like '%$flatcod' AND extract(year from exportacion.fnum) >= '2012' AND
extract(year from exportacion.fnum) <= '2019' GROUP BY exportacion.fano,mes ORDER BY exportacion.fano,mes";
  }
  if($onevar=="vpesbru"){
  $query1 = "SELECT exportacion.fano, extract(MONTH from exportacion.fnum) as mes, Sum(exportacion.vpesbru) as resultado FROM exportacion WHERE exportacion.cpaides = '".$paiscode."' AND SUBSTRING(exportacion.ubigeo,1,2) like '%$flatcod' AND extract(year from exportacion.fnum) >= '2012' AND
extract(year from exportacion.fnum) <= '2019' GROUP BY exportacion.fano,mes ORDER BY exportacion.fano,mes";
  }
   if($onevar=="qunifis"){
  $query1 = "SELECT exportacion.fano, extract(MONTH from exportacion.fnum) as mes, Sum(exportacion.qunifis) as resultado FROM exportacion WHERE exportacion.cpaides = '".$paiscode."' AND SUBSTRING(exportacion.ubigeo,1,2) like '%$flatcod' AND extract(year from exportacion.fnum) >= '2012' AND
extract(year from exportacion.fnum) <= '2019' GROUP BY exportacion.fano,mes ORDER BY exportacion.fano,mes";
  }
  if($onevar=="qunicom"){
  $query1 = "SELECT exportacion.fano, extract(MONTH from exportacion.fnum) as mes, Sum(exportacion.qunicom) as resultado FROM exportacion WHERE exportacion.cpaides = '".$paiscode."' AND SUBSTRING(exportacion.ubigeo,1,2) like '%$flatcod' AND extract(year from exportacion.fnum) >= '2012' AND
extract(year from exportacion.fnum) <= '2019' GROUP BY exportacion.fano,mes ORDER BY exportacion.fano,mes";
  }
  if($onevar=="part_nandi"){
	  $query1 = "SELECT exportacion.fano, extract(MONTH from exportacion.fnum) as mes,COUNT(DISTINCT exportacion.part_nandi) as resultado FROM exportacion WHERE exportacion.cpaides = '".$paiscode."' AND SUBSTRING(exportacion.ubigeo,1,2) like '%$flatcod' AND extract(year from exportacion.fnum) >= '2012' AND
extract(year from exportacion.fnum) <= '2019' GROUP BY exportacion.fano,mes ORDER BY exportacion.fano,mes";
  }
  if($onevar=="total"){
  $query1 = "SELECT exportacion.fano, extract(MONTH from exportacion.fnum) as mes, count(*) as resultado FROM exportacion WHERE exportacion.cpaides = '".$paiscode."' AND SUBSTRING(exportacion.ubigeo,1,2) like '%$flatcod' AND extract(year from exportacion.fnum) >= '2012' AND
extract(year from exportacion.fnum) <= '2019' GROUP BY exportacion.fano,mes ORDER BY exportacion.fano,mes";
  }
  if($onevar=="ndcl"){
  $query1 = "SELECT exportacion.fano, extract(MONTH from exportacion.fnum) as mes,COUNT(DISTINCT exportacion.ndcl) as resultado FROM exportacion WHERE exportacion.cpaides = '".$paiscode."' AND SUBSTRING(exportacion.ubigeo,1,2) like '%$flatcod' AND extract(year from exportacion.fnum) >= '2012' AND
extract(year from exportacion.fnum) <= '2019' GROUP BY exportacion.fano,mes ORDER BY exportacion.fano,mes";
  }
  if($onevar=="dnombre"){
  $query1 = "SELECT exportacion.fano, extract(MONTH from exportacion.fnum) as mes,COUNT(DISTINCT exportacion.dnombre) as resultado FROM exportacion WHERE exportacion.cpaides = '".$paiscode."' AND SUBSTRING(exportacion.ubigeo,1,2) like '%$flatcod' AND extract(year from exportacion.fnum) >= '2012' AND
extract(year from exportacion.fnum) <= '2019' GROUP BY exportacion.fano,mes ORDER BY exportacion.fano,mes";
  }
  if($onevar=="cpaides"){
  $query1 = "SELECT exportacion.fano, extract(MONTH from exportacion.fnum) as mes,COUNT(DISTINCT exportacion.cpaides) as resultado FROM exportacion WHERE exportacion.cpaides = '".$paiscode."' AND SUBSTRING(exportacion.ubigeo,1,2) like '%$flatcod' AND extract(year from exportacion.fnum) >= '2012' AND
extract(year from exportacion.fnum) <= '2019' GROUP BY exportacion.fano,mes ORDER BY exportacion.fano,mes";
  }
  if($onevar=="cpuedes"){
  $query1 = "SELECT exportacion.fano, extract(MONTH from exportacion.fnum) as mes,COUNT(DISTINCT exportacion.cpuedes) as resultado FROM exportacion WHERE exportacion.cpaides = '".$paiscode."' AND SUBSTRING(exportacion.ubigeo,1,2) like '%$flatcod' AND extract(year from exportacion.fnum) >= '2012' AND
extract(year from exportacion.fnum) <= '2019' GROUP BY exportacion.fano,mes ORDER BY exportacion.fano,mes";
  }
  if($onevar=="cadu"){
  $query1 = "SELECT exportacion.fano, extract(MONTH from exportacion.fnum) as mes,COUNT(DISTINCT exportacion.cadu) as resultado FROM exportacion WHERE exportacion.cpaides = '".$paiscode."' AND SUBSTRING(exportacion.ubigeo,1,2) like '%$flatcod' AND extract(year from exportacion.fnum) >= '2012' AND
extract(year from exportacion.fnum) <= '2019' GROUP BY exportacion.fano,mes ORDER BY exportacion.fano,mes";
  }
   if($onevar=="depa"){
  $query1 = "SELECT exportacion.fano, extract(MONTH from exportacion.fnum) as mes,COUNT(DISTINCT departamento.nombre) as resultado FROM exportacion LEFT JOIN departamento ON ((((SUBSTRING(exportacion.ubigeo,1,2))= departamento.iddepartamento))) WHERE  exportacion.cpaides = '".$paiscode."' AND SUBSTRING(exportacion.ubigeo,1,2) like '%$flatcod' AND extract(year from exportacion.fnum) >= '2012' AND
extract(year from exportacion.fnum) <= '2019'
GROUP BY exportacion.fano,mes order BY exportacion.fano, resultado ASC";
  }
  if($onevar=="provi"){
  $query1 = "SELECT exportacion.fano , extract(MONTH from exportacion.fnum) as mes, count(DISTINCT provincia.nombre) as resultado FROM exportacion LEFT JOIN departamento ON  (((SUBSTRING(exportacion.ubigeo,1,2))= departamento.iddepartamento))  INNER JOIN provincia ON provincia.iddepartamento = departamento.iddepartamento  WHERE  exportacion.cpaides =  '".$paiscode."' AND SUBSTRING(exportacion.ubigeo,1,2) like '%$flatcod' AND extract(year from exportacion.fnum) >= '2012' AND
extract(year from exportacion.fnum) <= '2019' GROUP BY exportacion.fano,mes ORDER BY exportacion.fano ASC";
  }
  
  if($onevar=="distri"){
  $query1 = "SELECT exportacion.fano, extract(MONTH from exportacion.fnum) as mes,COUNT(DISTINCT distrito.nombre) as resultado FROM exportacion LEFT JOIN departamento ON ((((SUBSTRING(exportacion.ubigeo,1,2))= departamento.iddepartamento))) INNER JOIN provincia ON provincia.iddepartamento = departamento.iddepartamento  INNER JOIN distrito ON distrito.idprovincia = provincia.idprovincia WHERE exportacion.cpaides = '".$paiscode."' AND SUBSTRING(exportacion.ubigeo,1,2) like '%$flatcod' AND extract(year from exportacion.fnum) >= '2012' AND
extract(year from exportacion.fnum) <= '2019' GROUP BY exportacion.fano,mes ORDER BY exportacion.fano ASC ";
  }
   if($onevar=="cage"){
  $query1 = "SELECT exportacion.fano, extract(MONTH from exportacion.fnum) as mes,COUNT(DISTINCT exportacion.cage) as resultado FROM exportacion WHERE  exportacion.cpaides = '".$paiscode."' AND SUBSTRING(exportacion.ubigeo,1,2) like '%$flatcod' AND extract(year from exportacion.fnum) >= '2012' AND
extract(year from exportacion.fnum) <= '2019' GROUP BY exportacion.fano,mes ORDER BY exportacion.fano,mes";
  }
  if($onevar=="cviatra"){
  $query1 = "SELECT exportacion.fano, extract(MONTH from exportacion.fnum) as mes,COUNT(DISTINCT exportacion.cviatra) as resultado FROM exportacion WHERE exportacion.cpaides = '".$paiscode."' AND SUBSTRING(exportacion.ubigeo,1,2) like '%$flatcod' AND extract(year from exportacion.fnum) >= '2012' AND
extract(year from exportacion.fnum) <= '2019' GROUP BY exportacion.fano,mes ORDER BY exportacion.fano,mes";
  }
				
	  /*$resultado1 = pg_query($query1) or die("Error en la Consulta SQL");
	  $numReg = pg_num_rows($resultado1);
	  if($numReg>0){
		  while ($fila1=pg_fetch_array($resultado1)) {*/
				$resultado1=$conexpg->query($query1); 
if($resultado1->num_rows>0){ 
while($fila1=$resultado1->fetch_array()){
		  $val1= $fila1['fano'];
		  $val2= $fila1['mes'];
		  $val3= $fila1['resultado'];

		 if($val1=='2012'){
  $insert1 = "UPDATE ".$mon_tmp." SET a2012='".$val3."' WHERE codigo='$val2' "; 
 $rs = $conexpg->query($insert1);
		 }
		 if($val1=='2013'){
  $insert1 = "UPDATE ".$mon_tmp." SET a2013='".$val3."' WHERE codigo='$val2' "; 
 $rs = $conexpg->query($insert1);
		 }
		 if($val1=='2014'){
  $insert1 = "UPDATE ".$mon_tmp." SET a2014='".$val3."' WHERE codigo='$val2' "; 
 $rs = $conexpg->query($insert1);
		 }
		 if($val1=='2015'){
  $insert1 = "UPDATE ".$mon_tmp." SET a2015='".$val3."' WHERE codigo='$val2' "; 
 $rs = $conexpg->query($insert1);
		 }
		 if($val1=='2016'){
  $insert1 = "UPDATE ".$mon_tmp." SET a2016='".$val3."' WHERE codigo='$val2' "; 
 $rs = $conexpg->query($insert1);
		 }
		 if($val1=='2017'){
  $insert1 = "UPDATE ".$mon_tmp." SET a2017='".$val3."' WHERE codigo='$val2' "; 
 $rs = $conexpg->query($insert1);
		 }
		if($val1=='2018'){
  $insert1 = "UPDATE ".$mon_tmp." SET a2018='".$val3."' WHERE codigo='$val2' "; 
 $rs = $conexpg->query($insert1);
		 }
			  if($val1=='2019'){
  $insert1 = "UPDATE ".$mon_tmp." SET a2019='".$val3."' WHERE codigo='$val2' "; 
 $rs = $conexpg->query($insert1);
		 }

		  }
	  }else{
		   echo"<center><h4><font color='#EC0D36'>No hay Resultados<br>El Numero de Partida $nombres o seleccion $combo Incorrectos</font></h4></center>";
			 /*eliminamos tabla temporal creada*/			  
	 $delete1 = mysqli_query($conexpg, "DROP TABLE ".$mon_tmp.";");
  if (!$delete1) {
    echo "Query: Un Eerror ha Occurido al Eliminar la Tabla Temporal";
  }else{
	  
  }
	  }

if($resultado1!=0){//inicia si hay resultados
	
	if($onevar=="diferen"){//precio general total
	  /*sumamos valorfob*/
		   $query_vfob = "SELECT 'vfobserdol' as VALOR, 
		   SUM(CASE extract(year from exportacion.fnum) WHEN '2012' THEN exportacion.vfobserdol ELSE 0 END) AS ".vfob2012.", 
		   SUM(CASE extract(year from exportacion.fnum) WHEN '2013' THEN exportacion.vfobserdol ELSE 0 END) AS ".vfob2013.", 
		   SUM(CASE extract(year from exportacion.fnum) WHEN '2014' THEN exportacion.vfobserdol ELSE 0 END) AS ".vfob2014.", 
		   SUM(CASE extract(year from exportacion.fnum) WHEN '2015' THEN exportacion.vfobserdol ELSE 0 END) AS ".vfob2015.", 
		   SUM(CASE extract(year from exportacion.fnum) WHEN '2016' THEN exportacion.vfobserdol ELSE 0 END) AS ".vfob2016.",
		   SUM(CASE extract(year from exportacion.fnum) WHEN '2017' THEN exportacion.vfobserdol ELSE 0 END) AS ".vfob2017.",
		   SUM(CASE extract(year from exportacion.fnum) WHEN '2018' THEN exportacion.vfobserdol ELSE 0 END) AS ".vfob2018." ,
		   SUM(CASE extract(year from exportacion.fnum) WHEN '2019' THEN exportacion.vfobserdol ELSE 0 END) AS ".vfob2019."
		   FROM exportacion WHERE extract(year from exportacion.fnum) >= '2012' AND
extract(year from exportacion.fnum) <= '2019' AND SUBSTRING(exportacion.ubigeo,1,2) like '%$flatcod' AND exportacion.cpaides ='".$paiscode."'";
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
extract(year from exportacion.fnum) <= '2019' AND SUBSTRING(exportacion.ubigeo,1,2) like '%$flatcod' AND exportacion.cpaides ='".$paiscode."'";
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

	  }//fin precio
	
		  	  if($onevar=="part_nandi"){//consulta conteo unico total partida
	  /*cuenta cantidad de partidas*/
	  $query_tota = "SELECT Count(DISTINCT exportacion.part_nandi) as cant_total, extract(year from exportacion.fnum) as anio FROM exportacion WHERE extract(year from exportacion.fnum) >= '2012' AND
extract(year from exportacion.fnum) <= '2019' AND SUBSTRING(exportacion.ubigeo,1,2) like '%$flatcod' AND exportacion.cpaides ='".$paiscode."' GROUP BY anio order BY anio ASC";
	   //$resultado_tota = pg_query($query_tota) or die("Error en la Consulta SQL");
				  $resultado_tota=$conexpg->query($query_tota); 
	    }//fin consulta conteo unico total partida
	 if($onevar=="ndcl"){//duas
	$query_tota = "SELECT Count(DISTINCT exportacion.ndcl) as cant_total, extract(year from exportacion.fnum) as anio FROM exportacion WHERE extract(year from exportacion.fnum) >= '2012' AND
extract(year from exportacion.fnum) <= '2019' AND SUBSTRING(exportacion.ubigeo,1,2) like '%$flatcod' AND exportacion.cpaides ='".$paiscode."' GROUP BY anio order BY anio ASC";
	$resultado_tota=$conexpg->query($query_tota); 
	 }
	 if($onevar=="dnombre"){//empresas
	 $query_tota = "SELECT Count(DISTINCT exportacion.dnombre) as cant_total, extract(year from exportacion.fnum) as anio FROM exportacion WHERE extract(year from exportacion.fnum) >= '2012' AND
extract(year from exportacion.fnum) <= '2019' AND SUBSTRING(exportacion.ubigeo,1,2) like '%$flatcod' AND exportacion.cpaides ='".$paiscode."' GROUP BY anio order BY anio ASC";
	  $resultado_tota=$conexpg->query($query_tota); 
	 }
	 if($onevar=="cpuedes"){//puertos
	  $query_tota = "SELECT Count(DISTINCT exportacion.cpuedes) as cant_total, extract(year from exportacion.fnum) as anio FROM exportacion WHERE extract(year from exportacion.fnum) >= '2012' AND
extract(year from exportacion.fnum) <= '2019' AND SUBSTRING(exportacion.ubigeo,1,2) like '%$flatcod' AND exportacion.cpaides ='".$paiscode."' GROUP BY anio order BY anio ASC";
	  $resultado_tota=$conexpg->query($query_tota); 
	 }
	 if($onevar=="cadu"){//aduanas
	 $query_tota = "SELECT Count(DISTINCT exportacion.cadu) as cant_total, extract(year from exportacion.fnum) as anio FROM exportacion WHERE extract(year from exportacion.fnum) >= '2012' AND
extract(year from exportacion.fnum) <= '2019' AND SUBSTRING(exportacion.ubigeo,1,2) like '%$flatcod' AND exportacion.cpaides ='".$paiscode."' GROUP BY anio order BY anio ASC";
	  $resultado_tota=$conexpg->query($query_tota); 
	 }
	 if($onevar=="depa"){//departamento
	 $query_tota = "SELECT COUNT(DISTINCT departamento.nombre) as cant_total, extract(year from exportacion.fnum) as anio FROM exportacion LEFT JOIN departamento ON  ((((SUBSTRING(exportacion.ubigeo,1,2))= departamento.iddepartamento))) WHERE extract(year from exportacion.fnum) >= '2012' AND
extract(year from exportacion.fnum) <= '2019' AND SUBSTRING(exportacion.ubigeo,1,2) like '%$flatcod' AND exportacion.cpaides='".$paiscode."' GROUP BY anio ORDER BY anio ASC";
	  $resultado_tota=$conexpg->query($query_tota); 
	 }
	 if($onevar=="provi"){//provincia
     $query_tota = "SELECT count(DISTINCT provincia.nombre) as cant_total, extract(year from exportacion.fnum) as anio FROM exportacion LEFT JOIN departamento ON  (((SUBSTRING(exportacion.ubigeo,1,2))= departamento.iddepartamento))  INNER JOIN provincia ON provincia.iddepartamento = departamento.iddepartamento WHERE extract(year from exportacion.fnum) >= '2012' AND
extract(year from exportacion.fnum) <= '2019' AND SUBSTRING(exportacion.ubigeo,1,2) like '%$flatcod' AND exportacion.cpaides='".$paiscode."' GROUP BY anio ORDER BY anio ASC";
	  $resultado_tota=$conexpg->query($query_tota); 
	 }
	 if($onevar=="distri"){//distrito
	  $query_tota = "SELECT count(DISTINCT distrito.nombre) AS cant_total, extract(year from exportacion.fnum) AS anio FROM exportacion LEFT JOIN distrito ON exportacion.ubigeo= distrito.iddistrito WHERE extract(year from exportacion.fnum) >= '2012' AND
extract(year from exportacion.fnum) <= '2019' AND SUBSTRING(exportacion.ubigeo,1,2) like '%$flatcod' AND exportacion.cpaides = '".$paiscode."' GROUP BY anio ORDER BY anio ASC";
	  $resultado_tota=$conexpg->query($query_tota); 
	 }
	 if($onevar=="cage"){//agentes
	 $query_tota = "SELECT Count(DISTINCT exportacion.cage) as cant_total, extract(year from exportacion.fnum) as anio FROM exportacion WHERE extract(year from exportacion.fnum) >= '2012' AND
extract(year from exportacion.fnum) <= '2019' AND SUBSTRING(exportacion.ubigeo,1,2) like '%$flatcod' AND exportacion.cpaides ='".$paiscode."' GROUP BY anio order BY anio ASC";
	  $resultado_tota=$conexpg->query($query_tota); 
	 }
	 if($onevar=="cviatra"){//via transportes
	  $query_tota = "SELECT Count(DISTINCT exportacion.cviatra) as cant_total, extract(year from exportacion.fnum) as anio FROM exportacion WHERE extract(year from exportacion.fnum) >= '2012' AND
extract(year from exportacion.fnum) <= '2019' AND SUBSTRING(exportacion.ubigeo,1,2) like '%$flatcod' AND exportacion.cpaides ='".$paiscode."' GROUP BY anio order BY anio ASC";
	  $resultado_tota=$conexpg->query($query_tota); 
	 }
	 if($onevar=="part_nandi" or $onevar=="ndcl" or $onevar=="dnombre" or $onevar=="cpaides" or $onevar=="cpuedes" or $onevar=="cadu" or $onevar=="depa" or $onevar=="provi" or $onevar=="distri" or $onevar=="cage" or $onevar=="cviatra"){ 
	  //$numReg_tota = pg_num_rows($resultado_tota);
		 $numReg_tota = mysqli_num_rows($resultado_tota);
	  if($numReg_tota>0){
		  //while ($fila_tota=pg_fetch_array($resultado_tota)) {
		  while($fila_tota=$resultado_tota->fetch_array()){
		  $anioparti= $fila_tota['anio'];
		  
		  if($anioparti=='2012'){
			  $sumatotal2012=$fila_tota['cant_total'];
		  }
		  if($anioparti=='2013'){
			  $sumatotal2013=$fila_tota['cant_total'];
		  }
		  if($anioparti=='2014'){
			  $sumatotal2014=$fila_tota['cant_total'];
		  }
		  if($anioparti=='2015'){
			  $sumatotal2015=$fila_tota['cant_total'];
		  }
		  if($anioparti=='2016'){
			  $sumatotal2016=$fila_tota['cant_total'];
		  }
		  if($anioparti=='2017'){
			  $sumatotal2017=$fila_tota['cant_total'];
		  }
		  if($anioparti=='2018'){
			  $sumatotal2018=$fila_tota['cant_total'];
		  }
			  if($anioparti=='2019'){
			  $sumatotal2019=$fila_tota['cant_total'];
		  }
		  
		  }
	  }else{
		  $sumatotal2012= "0.00";
		  $sumatotal2013= "0.00";
		  $sumatotal2014= "0.00";
		  $sumatotal2015= "0.00";
		  $sumatotal2016= "0.00";
		  $sumatotal2017= "0.00";
		  $sumatotal2018= "0.00";
		  $sumatotal2019= "0.00";
	  }
	  }

	  
	  /*primero consultamos la suma total general de cada ano*/
	  $sqlyear="SELECT
Sum(".$mon_tmp.".a2012) AS a2012,
Sum(".$mon_tmp.".a2013) AS a2013,
Sum(".$mon_tmp.".a2014) AS a2014,
Sum(".$mon_tmp.".a2015) AS a2015,
Sum(".$mon_tmp.".a2016) AS a2016,
Sum(".$mon_tmp.".a2017) AS a2017,
Sum(".$mon_tmp.".a2018) AS a2018,
Sum(".$mon_tmp.".a2019) AS a2019
FROM
".$mon_tmp." ";
	  /*$result_year= pg_query($sqlyear) or die("Error en la Consulta SQL Sumatoria Total");
	  $numReg_year = pg_num_rows($result_year);
	  if($numReg_year>0){
		   while ($fila_year=pg_fetch_array($result_year)) {*/
	$result_year=$conexpg->query($sqlyear); 
if($result_year->num_rows>0){ 
while($fila_year=$result_year->fetch_array()){
			   if($onevar=="diferen"){//precio general total
			   if($vpes_2012=='0'){
		$sumatotal2012 = "0.00";
		}else{
		$sumatotal2012 = $vfob_2012 / $vpes_2012;
		}
		
		if($vpes_2013=='0'){
		$sumatotal2013 = "0.00";
		}else{
		$sumatotal2013 = $vfob_2013 / $vpes_2013;
		}
		
		if($vpes_2014=='0'){
		$sumatotal2014 = "0.00";
		}else{
		$sumatotal2014 = $vfob_2014 / $vpes_2014;
		}
		
		if($vpes_2015=='0'){
		$sumatotal2015 = "0.00";
		}else{
		$sumatotal2015 = $vfob_2015 / $vpes_2015;
		}
		
		if($vpes_2016=='0'){
		$sumatotal2016 = "0.00";
		}else{
		$sumatotal2016 = $vfob_2016 / $vpes_2016;
		}
		
		if($vpes_2017=='0'){
		$sumatotal2017 = "0.00";
		}else{
		$sumatotal2017 = $vfob_2017/ $vpes_2017;
		}
				   
		if($vpes_2018=='0'){
		$sumatotal2018 = "0.00";
		}else{
		$sumatotal2018 = $vfob_2018/ $vpes_2018;
		}
				   if($vpes_2019=='0'){
		$sumatotal2019 = "0.00";
		}else{
		$sumatotal2019 = $vfob_2019/ $vpes_2018;
		}
		
		if($sumatotal2012=='0'){
			  $ca1_1 ='0';
		      }else{
		      $ca1_1 = (($sumatotal2013 / $sumatotal2012) - 1) * 100;
		      }
			   if($sumatotal2013=='0'){
			  $ca2_1 ='0';
		      }else{
		      $ca2_1 = (($sumatotal2014 / $sumatotal2013) - 1) * 100;
		      }
			   if($sumatotal2014=='0'){
			  $ca3_1 ='0';
		      }else{
		      $ca3_1 = (($sumatotal2015 / $sumatotal2014) - 1) * 100;
		      }
			   if($sumatotal2015=='0'){
			  $ca4_1 ='0';
		      }else{
		      $ca4_1 = (($sumatotal2016 / $sumatotal2015) - 1) * 100;
		      }
			  if($sumatotal2016=='0'){
			  $ca5_1 ='0';
		      }else{
		      $ca5_1 = (($sumatotal2017 / $sumatotal2016) - 1) * 100;
		      }
				   if($sumatotal2017=='0'){
			  $ca6_1 ='0';
		      }else{
		      $ca6_1 = (($sumatotal2018 / $sumatotal2017) - 1) * 100;
		      }
			   
			  $varitota= number_format((($sumatotal2018 / $sumatotal2017) - 1) * 100,2);
			  $parti= number_format(($ca1_1 + $ca2_1 + $ca3_1 + $ca4_1 + $ca5_1 + $ca6_1)/6,2) ;//divide entre 5;porque solo suma 5 años del 2012 al 2016
			   }else if($onevar=="part_nandi"){
				   
				   if($sumatotal2012=='0' or $sumatotal2012=="" or  $sumatotal2012==null){
			  $parti_1 ='0';
		      }else{
		      $parti_1 = (($sumatotal2013 / $sumatotal2012) - 1) * 100;
		      }
			   if($sumatotal2013=='0' or $sumatotal2013 == null){
			  $parti_2 ='0';
		      }else{
		      $parti_2 = (($sumatotal2014 / $sumatotal2013) - 1) * 100;
		      }
			   if($sumatotal2014=='0' or $sumatotal2014 == null){
			  $parti_3 ='0';
		      }else{
		      $parti_3 = (($sumatotal2015 / $sumatotal2014) - 1) * 100;
		      }
			   if($sumatotal2015=='0' or $sumatotal2015 == null){
			  $parti_4 ='0';
		      }else{
		      $parti_4 = (($sumatotal2016 / $sumatotal2015) - 1) * 100;
		      }
			  if($sumatotal2016=='0' or $sumatotal2016 == null){
			  $parti_5 ='0';
		      }else{
		      $parti_5 = (($sumatotal2017 / $sumatotal2016) - 1) * 100;
		      }
				   if($sumatotal2017=='0' or $sumatotal2017 == null){
			  $parti_6 ='0';
		      }else{
		      $parti_6 = (($sumatotal2018 / $sumatotal2017) - 1) * 100;
		      }
			 
			  $varitota= number_format((($sumatotal2018 / $sumatotal2017) - 1) * 100,2);
		      $parti= number_format(($parti_1 + $parti_2 + $parti_3 + $parti_4 + $parti_5 + $parti_6)/6,2) ;
			  
			   }else if($onevar=="ndcl"){//duas
			   
			   if($sumatotal2012=='0' or $sumatotal2012==null){
			  $ca1_5 ='0';
		      }else{
		      $ca1_5 = (($sumatotal2013 / $sumatotal2012) - 1) * 100;
		      }
			   if($sumatotal2013=='0' or $sumatotal2013 == null){
			  $ca2_5 ='0';
		      }else{
		      $ca2_5 = (($sumatotal2014 / $sumatotal2013) - 1) * 100;
		      }
			   if($sumatotal2014=='0' or $sumatotal2014 == null){
			  $ca3_5 ='0';
		      }else{
		      $ca3_5 = (($sumatotal2015 / $sumatotal2014) - 1) * 100;
		      }
			   if($sumatotal2015=='0' or $sumatotal2015 == null){
			  $ca4_5 ='0';
		      }else{
		      $ca4_5 = (($sumatotal2016 / $sumatotal2015) - 1) * 100;
		      }
			  if($sumatotal2016=='0' or $sumatotal2016 == null){
			  $ca5_5 ='0';
		      }else{
		      $ca5_5 = (($sumatotal2017 / $sumatotal2016) - 1) * 100;
		      }
				   if($sumatotal2017=='0' or $sumatotal2017 == null){
			  $ca6_5 ='0';
		      }else{
		      $ca6_5 = (($sumatotal2018 / $sumatotal2017) - 1) * 100;
		      }
			 
			  $varitota= number_format((($sumatotal2018 / $sumatotal2017) - 1) * 100,2);
			  $parti= number_format(($ca1_5 + $ca2_5 + $ca3_5 + $ca4_5 + $ca5_5 + $ca6_5)/6,2) ;
			   }else if($onevar=="dnombre"){//empresas
			   if($sumatotal2012=='0' or $sumatotal2012 == null){
			  $ca1_6 ='0';
		      }else{
		      $ca1_6 = (($sumatotal2013 / $sumatotal2012) - 1) * 100;
		      }
			   if($sumatotal2013=='0' or $sumatotal2013 == null){
			  $ca2_6 ='0';
		      }else{
		      $ca2_6 = (($sumatotal2014 / $sumatotal2013) - 1) * 100;
		      }
			   if($sumatotal2014=='0' or $sumatotal2014 == null){
			  $ca3_6 ='0';
		      }else{
		      $ca3_6 = (($sumatotal2015 / $sumatotal2014) - 1) * 100;
		      }
			   if($sumatotal2015=='0' or $sumatotal2015 == null){
			  $ca4_6 ='0';
		      }else{
		      $ca4_6 = (($sumatotal2016 / $sumatotal2015) - 1) * 100;
		      }
			  if($sumatotal2016=='0' or $sumatotal2016 == null){
			  $ca5_6 ='0';
		      }else{
		      $ca5_6 = (($sumatotal2017 / $sumatotal2016) - 1) * 100;
		      }
				 if($sumatotal2017=='0' or $sumatotal2017 == null){
			  $ca6_6 ='0';
		      }else{
		      $ca6_6 = (($sumatotal2018 / $sumatotal2017) - 1) * 100;
		      }  
			  
			  $varitota= number_format((($sumatotal2018 / $sumatotal2017) - 1) * 100,2);
			  $parti= number_format(($ca1_6 + $ca2_6 + $ca3_6 + $ca4_6 + $ca5_6 + $ca6_6)/6,2) ;
			   }else if($onevar=="cpuedes"){//puertos
			    if($sumatotal2012=='0' or $sumatotal2012 == null){
			  $ca1_8 ='0';
		      }else{
		      $ca1_8 = (($sumatotal2013 / $sumatotal2012) - 1) * 100;
		      }
			   if($sumatotal2013=='0' or $sumatotal2013 == null){
			  $ca2_8 ='0';
		      }else{
		      $ca2_8 = (($sumatotal2014 / $sumatotal2013) - 1) * 100;
		      }
			   if($sumatotal2014=='0' or $sumatotal2014 == null){
			  $ca3_8 ='0';
		      }else{
		      $ca3_8 = (($sumatotal2015 / $sumatotal2014) - 1) * 100;
		      }
			   if($sumatotal2015=='0' or $sumatotal2015 == null){
			  $ca4_8 ='0';
		      }else{
		      $ca4_8 = (($sumatotal2016 / $sumatotal2015) - 1) * 100;
		      }
			  if($sumatotal2016=='0' or $sumatotal2016 == null){
			  $ca5_8 ='0';
		      }else{
		      $ca5_8 = (($sumatotal2017 / $sumatotal2016) - 1) * 100;
		      }
				   if($sumatotal2017=='0' or $sumatotal2017 == null){
			  $ca6_8 ='0';
		      }else{
		      $ca6_8 = (($sumatotal2018 / $sumatotal2017) - 1) * 100;
		      }
			 
			  $varitota= number_format((($sumatotal2018 / $sumatotal2017) - 1) * 100,2);
			  $parti= number_format(($ca1_8 + $ca2_8 + $ca3_8 + $ca4_8 + $ca5_8 + $ca6_8)/6,2) ;
			   }else if($onevar=="cadu"){//aduanas
			   if($sumatotal2012=='0' or $sumatotal2012 == null){
			  $ca1_8 ='0';
		      }else{
		      $ca1_8 = (($sumatotal2013 / $sumatotal2012) - 1) * 100;
		      }
			   if($sumatotal2013=='0' or $sumatotal2013 == null){
			  $ca2_8 ='0';
		      }else{
		      $ca2_8 = (($sumatotal2014 / $sumatotal2013) - 1) * 100;
		      }
			   if($sumatotal2014=='0' or $sumatotal2014 == null){
			  $ca3_8 ='0';
		      }else{
		      $ca3_8 = (($sumatotal2015 / $sumatotal2014) - 1) * 100;
		      }
			   if($sumatotal2015=='0' or $sumatotal2015 == null){
			  $ca4_8 ='0';
		      }else{
		      $ca4_8 = (($sumatotal2016 / $sumatotal2015) - 1) * 100;
		      }
			  if($sumatotal2016=='0' or $sumatotal2016 == null){
			  $ca5_8 ='0';
		      }else{
		      $ca5_8 = (($sumatotal2016 / $sumatotal2016) - 1) * 100;
		      }
				   if($sumatotal2017=='0' or $sumatotal2017 == null){
			  $ca6_8 ='0';
		      }else{
		      $ca6_8 = (($sumatotal2017 / $sumatotal2017) - 1) * 100;
		      }
			  
			  $varitota= number_format((($sumatotal2018 / $sumatotal2017) - 1) * 100,2);
			  $parti= number_format(($ca1_8 + $ca2_8 + $ca3_8 + $ca4_8 + $ca5_8 + $ca6_8)/6,2) ;
			   }else if($onevar=="depa"){//departamento
			   if($sumatotal2012=='0' or $sumatotal2012 == null){
			  $ca1_9 ='0';
		      }else{
		      $ca1_9 = (($sumatotal2013 / $sumatotal2012) - 1) * 100;
		      }
			   if($sumatotal2013=='0' or $sumatotal2013 == null){
			  $ca2_9 ='0';
		      }else{
		      $ca2_9 = (($sumatotal2014 / $sumatotal2013) - 1) * 100;
		      }
			   if($sumatotal2014=='0' or $sumatotal2014 == null){
			  $ca3_9 ='0';
		      }else{
		      $ca3_9 = (($sumatotal2015 / $sumatotal2014) - 1) * 100;
		      }
			   if($sumatotal2015=='0' or $sumatotal2015 == null){
			  $ca4_9 ='0';
		      }else{
		      $ca4_9 = (($sumatotal2016 / $sumatotal2015) - 1) * 100;
		      }
			  if($sumatotal2016=='0' or $sumatotal2016 == null){
			  $ca5_9 ='0';
		      }else{
		      $ca5_9 = (($sumatotal2017 / $sumatotal2016) - 1) * 100;
		      }
				   if($sumatotal2017=='0' or $sumatotal2017 == null){
			  $ca6_9 ='0';
		      }else{
		      $ca6_9 = (($sumatotal2018 / $sumatotal2017) - 1) * 100;
		      }
			 
			  $varitota= number_format((($sumatotal2018 / $sumatotal2017) - 1) * 100,2);
			  $parti= number_format(($ca1_9 + $ca2_9 + $ca3_9 + $ca4_9 + $ca5_9 + $ca6_9)/6,2) ;
			   }else if($onevar=="provi"){//provincia
			   if($sumatotal2012=='0' or $sumatotal2012 == null){
			  $ca1_9x ='0';
		      }else{
		      $ca1_9x = (($sumatotal2013 / $sumatotal2012) - 1) * 100;
		      }
			   if($sumatotal2013=='0' or $sumatotal2013 == null){
			  $ca2_9x ='0';
		      }else{
		      $ca2_9x = (($sumatotal2014 / $sumatotal2013) - 1) * 100;
		      }
			   if($sumatotal2014=='0' or $sumatotal2014 == null){
			  $ca3_9x ='0';
		      }else{
		      $ca3_9x = (($sumatotal2015 / $sumatotal2014) - 1) * 100;
		      }
			   if($sumatotal2015=='0' or $sumatotal2015 == null){
			  $ca4_9x ='0';
		      }else{
		      $ca4_9x = (($sumatotal2016 / $sumatotal2015) - 1) * 100;
		      }
			  if($sumatotal2016=='0' or $sumatotal2016 == null){
			  $ca5_9x ='0';
		      }else{
		      $ca5_9x = (($sumatotal2017 / $sumatotal2016) - 1) * 100;
		      }
				   if($sumatotal2017=='0' or $sumatotal2017 == null){
			  $ca6_9x ='0';
		      }else{
		      $ca6_9x = (($sumatotal2018 / $sumatotal2017) - 1) * 100;
		      }
			 
			  $varitota= number_format((($sumatotal2017 / $sumatotal2016) - 1) * 100,2);
			  $parti= number_format(($ca1_9x + $ca2_9x + $ca3_9x + $ca4_9x + $ca5_9x + $ca6_9x)/6,2) ;
			   }else if($onevar=="distri"){//distrito
			   if($sumatotal2012=='0' or $sumatotal2012 == null){
		$ca1_dis ='0';
		  }else{
		  $ca1_dis = (($sumatotal2013 / $sumatotal2012) - 1) * 100;
		  }
	     if($sumatotal2013=='0' or $sumatotal2013 == null){
		$ca2_dis ='0';
		}else{
		$ca2_dis = (($sumatotal2014 / $sumatotal2013) - 1) * 100;
		}
		 if($sumatotal2014=='0' or $sumatotal2014 == null){
		$ca3_dis ='0';
		 }else{
		$ca3_dis = (($sumatotal2015 / $sumatotal2014) - 1) * 100;
		}
		if($sumatotal2015=='0' or $sumatotal2015 == null){
		$ca4_dis ='0';
		}else{
		$ca4_dis = (($sumatotal2016 / $sumatotal2015) - 1) * 100;
		}
		if($sumatotal2016=='0' or $sumatotal2016 == null){
		$ca5_dis ='0';
		}else{
		$ca5_dis = (($sumatotal2017 / $sumatotal2016) - 1) * 100;
		}
				   if($sumatotal2017=='0' or $sumatotal2017 == null){
		$ca6_dis ='0';
		}else{
		$ca6_dis = (($sumatotal2018 / $sumatotal2017) - 1) * 100;
		}
		 
		$varitota= number_format((($sumatotal2018 / $sumatotal2017) - 1) * 100,2);
	    $parti= number_format(($ca1_dis + $ca2_dis + $ca3_dis + $ca4_dis + $ca5_dis + $ca6_dis)/6,2) ;
			   }else if($onevar=="cage"){//agentes
			   if($sumatotal2012=='0' or $sumatotal2012 == null){
			  $ca1_10 ='0';
		      }else{
		      $ca1_10 = (($sumatotal2013 / $sumatotal2012) - 1) * 100;
		      }
			   if($sumatotal2013=='0' or $sumatotal2013 == null){
			  $ca2_10 ='0';
		      }else{
		      $ca2_10 = (($sumatotal2014 / $sumatotal2013) - 1) * 100;
		      }
			   if($sumatotal2014=='0' or $sumatotal2014 == null){
			  $ca3_10='0';
		      }else{
		      $ca3_10 = (($sumatotal2015 / $sumatotal2014) - 1) * 100;
		      }
			   if($sumatotal2015=='0' or $sumatotal2015 == null){
			  $ca4_10 ='0';
		      }else{
		      $ca4_10 = (($sumatotal2016 / $sumatotal2015) - 1) * 100;
		      }
				   if($sumatotal2016=='0' or $sumatotal2016 == null){
			  $ca5_10 ='0';
		      }else{
		      $ca5_10 = (($sumatotal2017 / $sumatotal2016) - 1) * 100;
		      }
				   if($sumatotal2017=='0' or $sumatotal2017 == null){
			  $ca6_10 ='0';
		      }else{
		      $ca6_10 = (($sumatotal2018 / $sumatotal2017) - 1) * 100;
		      }
			 
			  $varitota= number_format((($sumatotal2018 / $sumatotal2017) - 1) * 100,2);
			  $parti= number_format(($ca1_10 + $ca2_10 + $ca3_10 + $ca4_10 + $ca5_10 + $ca6_10)/6,2) ;
			   }else if($onevar=="cviatra"){//via transportes
			    if($sumatotal2012=='0' or $sumatotal2012 == null){
			  $ca1_11 ='0';
		      }else{
		      $ca1_11 = (($sumatotal2013 / $sumatotal2012) - 1) * 100;
		      }
			   if($sumatotal2013=='0' or $sumatotal2013 == null){
			  $ca2_11 ='0';
		      }else{
		      $ca2_11 = (($sumatotal2014 / $sumatotal2013) - 1) * 100;
		      }
			   if($sumatotal2014=='0' or $sumatotal2014 == null){
			  $ca3_11='0';
		      }else{
		      $ca3_11 = (($sumatotal2015 / $sumatotal2014) - 1) * 100;
		      }
			   if($sumatotal2015=='0' or $sumatotal2015 == null){
			  $ca4_11 ='0';
		      }else{
		      $ca4_11 = (($sumatotal2016 / $sumatotal2015) - 1) * 100;
		      }
			   if($sumatotal2016=='0' or $sumatotal2016 == null){
			  $ca5_11 ='0';
		      }else{
		      $ca5_11 = (($sumatotal2017 / $sumatotal2016) - 1) * 100;
		      }
				   if($sumatotal2017=='0' or $sumatotal2017 == null){
			  $ca6_11 ='0';
		      }else{
		      $ca6_11 = (($sumatotal2018 / $sumatotal2017) - 1) * 100;
		      }
			 
			  $varitota= number_format((($sumatotal2018 / $sumatotal2017) - 1) * 100,2);
			  $parti= number_format(($ca1_11 + $ca2_11 + $ca3_11 + $ca4_11 + $ca5_11 + $ca6_11)/6,2) ;
			   }else{
		   $sumatotal2012= $fila_year['a2012'];
		   $sumatotal2013= $fila_year['a2013'];
		   $sumatotal2014= $fila_year['a2014'];
		   $sumatotal2015= $fila_year['a2015'];
		   $sumatotal2016= $fila_year['a2016'];
		   $sumatotal2017= $fila_year['a2017'];
		   $sumatotal2018= $fila_year['a2018'];
				   $sumatotal2019= $fila_year['a2019'];
		   $varitota= number_format((($sumatotal2018 / $sumatotal2019) - 1) * 100,2);
		   $parti='100 %';
			   }
		   }
	  }else{
		  $sumatotal2012="0";
		  $sumatotal2013="0";
		  $sumatotal2014="0";
		  $sumatotal2015="0";
		  $sumatotal2016="0";
		  $sumatotal2017="0";
		  $sumatotal2018="0";
		  $sumatotal2019="0";
		  $varitota="0.00";
		  $parti="0.00";
	  }
	
 /*visualizamos datos en el reporte*/
   $query_resultado = "SELECT
".$mon_tmp.".codigo,
".$mon_tmp.".nomvariable,
".$mon_tmp.".a2012,
".$mon_tmp.".a2013,
".$mon_tmp.".a2014,
".$mon_tmp.".a2015,
".$mon_tmp.".a2016,
".$mon_tmp.".a2017,
".$mon_tmp.".a2018,
".$mon_tmp.".a2019
FROM
".$mon_tmp."
ORDER BY
".$mon_tmp.".codigo ASC";
	  /*$resultado_rpt = pg_query($query_resultado) or die("Error en la Consulta SQL Reporte");
	  $numReg_rpt = pg_num_rows($resultado_rpt);*/
	$resultado_rpt=$conexpg->query($query_resultado); 
if($resultado_rpt->num_rows>0){ 
	  //if($numReg_rpt>0){
		  
echo"<div class='col-md-12'>";
        echo"<div class='card'>";
	echo"<div class='card-header card-header-info card-header-icon'>
              <div class='card-icon'>
                <i class='material-icons'>assignment</i>
              </div>
              <h4 class='card-title'><b>Reporte Mercado Evolucion Anual de Exportaciones</b><br> Mercado: $paisname │ Departamento: $namedepa1 │ Variable: $combo │ Fecha Numeracion │ Periodo 2012 - 2019 </b> </h4>
            </div>";
		echo"<div class='card-body'>";
		echo"<div class='toolbar'>
		<a href='#mer'><button class='btn btn-info btn-sm'> Ver Cuadro Estadístico </button></a>
                  </div>";
         echo"<div class='material-datatables'>";
		echo"<table id='datatablese' class='table table-striped table-no-bordered table-hover' cellspacing='0' width='100%' style='width:100%'>";
		  echo"<thead>
                          <tr>
                              <th>#</th>
							  <th>Mes</th>
							  <th>2012</th>
                              <th>2013</th>
                              <th>2014</th>
                              <th>2015</th>
                              <th>2016</th>
							  <th>2017</th>
							  <th>2018</th>
							  <th>2019</th>
							  <th>Var.%18/17</th>
                          </tr>
                      </thead>";
		 echo"<tfoot>
                          <tr>
						      <th>#</th>
							  <th>Mes</th>
							  <th>2012</th>
                              <th>2013</th>
                              <th>2014</th>
                              <th>2015</th>
                              <th>2016</th>
							  <th>2017</th>
							  <th>2018</th>
							  <th>2019</th>
							  <th>Var.%18/17</th>
                          </tr>
                      </tfoot>";
           echo"<tbody>";

//while ($fila_rpt=pg_fetch_array($resultado_rpt)) {
while($fila_rpt=$resultado_rpt->fetch_array()){
	$cuentaF = $cuentaF + 1;
			 $codi= $fila_rpt['codigo'];
		   $nombredesc= $fila_rpt['nomvariable'];

		  $year3= $fila_rpt['a2012'];
		  $year4= $fila_rpt['a2013'];
		  $year5= $fila_rpt['a2014'];
		  $year6= $fila_rpt['a2015'];
		  $year7= $fila_rpt['a2016'];
		  $year8= $fila_rpt['a2017'];
	      $year9= $fila_rpt['a2018'];
	$year10= $fila_rpt['a2019'];
		  
		  if($year8=='0'){
		  $var11 ='0';
		  }else{
		  $var11 = number_format((($year9 / $year8) - 1) * 100,2);
		  }
	
if($axe=='SI' and $_SESSION['rol']=='ADMIN'){//si es administrador
		  echo "<tr>";
echo "<td>$codi</td>";
echo "<td>$nombredesc</td>";
echo "<td>$year3</td>";
echo "<td>$year4</td>";
echo "<td>$year5</td>";
echo "<td>$year6</td>";
echo "<td>$year7</td>";
echo "<td>$year8</td>";
echo "<td>$year9</td>";
	echo "<td>$year10</td>";
echo "<td>$var11%</td>";
 echo "</tr>";
}else if($axe=='NO' and $_SESSION['rol']<>'ADMIN'){//No tiene pago y no es admin
	if($cuentaF<='5'){
		echo "<tr>";
echo "<td>$codi</td>";
echo "<td>$nombredesc</td>";
echo "<td>$year3</td>";
echo "<td>$year4</td>";
echo "<td>$year5</td>";
echo "<td>$year6</td>";
echo "<td>$year7</td>";
echo "<td>$year8</td>";
echo "<td>$year9</td>";
		echo "<td>$year10</td>";
echo "<td>$var11%</td>";
 echo "</tr>";
	}
}else if($axe=='SI' and $_SESSION['rol']<>'ADMIN'){//Si tiene pago y no es admin
	echo "<tr>";
echo "<td>$codi</td>";
echo "<td>$nombredesc</td>";
echo "<td>$year3</td>";
echo "<td>$year4</td>";
echo "<td>$year5</td>";
echo "<td>$year6</td>";
echo "<td>$year7</td>";
echo "<td>$year8</td>";
echo "<td>$year9</td>";
	echo "<td>$year10</td>";
echo "<td>$var11%</td>";
 echo "</tr>";
}
		  
		  }
		  if($axe=='SI'){
		  echo"<thead>";
		  echo "<tr>";
		   echo "<th align='center' colspan='2'><b>Total:</b></th>";
		  echo "<th><b>".number_format($sumatotal2012,2)."</b></th>";
		   echo "<th><b>".number_format($sumatotal2013,2)."</b></th>";
		    echo "<th><b>".number_format($sumatotal2014,2)."</b></th>";
			 echo "<th><b>".number_format($sumatotal2015,2)."</b></th>";
			  echo "<th><b>".number_format($sumatotal2016,2)."</b></th>";
			  echo "<th><b>".number_format($sumatotal2017,2)."</b></th>";
		       echo "<th><b>".number_format($sumatotal2018,2)."</b></th>";
			  echo "<th><b>".number_format($sumatotal2019,2)."</b></th>";
			  echo "<th><b>$varitota %</b></th>";
		  echo "</tr>";
		  echo"</thead>";
		  }
	
		  echo"</tbody>";
		  echo"</table>";
		  echo"</div>";
		  echo"</div>";
		  echo"</div>";
		  echo"</div>";
		   echo "</div></div></div>";
		   
		   ?>



<?php
		   
	  }

   }//fin si hay resultados
				?>
          
<style>
.chart {
  width: 100%; 
  min-height: 450px;
}
</style>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', '2012', '2013', '2014', '2015', '2016', '2017', '2018' , '2019'],
		  <?php 
		   $query_resultadox = "SELECT
".$mon_tmp.".codigo,
".$mon_tmp.".nomvariable,
".$mon_tmp.".a2012,
".$mon_tmp.".a2013,
".$mon_tmp.".a2014,
".$mon_tmp.".a2015,
".$mon_tmp.".a2016,
".$mon_tmp.".a2017,
".$mon_tmp.".a2018,
".$mon_tmp.".a2019
FROM
".$mon_tmp."
ORDER BY
".$mon_tmp.".codigo ASC";
	  /*$resultado_rptx = pg_query($query_resultadox) or die("Error en la Consulta SQL Reporte");
	  $numReg_rptx = pg_num_rows($resultado_rptx);
	  if($numReg_rptx>0){
		  while ($fila_rptx=pg_fetch_array($resultado_rptx)) {*/
			$resultado_rptx=$conexpg->query($query_resultadox); 
if($resultado_rptx->num_rows>0){ 
while($fila_rptx=$resultado_rptx->fetch_array()){
			 $codix= $fila_rptx['codigo'];
		   $nombredescx= $fila_rptx['nomvariable'];
		   if($nombredescx=="Enero"){
			   $nombredescx2="Ene";
		   }else if($nombredescx=="Febrero"){
			   $nombredescx2="Feb";
		   }else if($nombredescx=="Marzo"){
			   $nombredescx2="Mar";
		   }else if($nombredescx=="Abril"){
			   $nombredescx2="Abr";
		   }else if($nombredescx=="Mayo"){
			   $nombredescx2="May";
		   }else if($nombredescx=="Junio"){
			   $nombredescx2="Jun";
		   }else if($nombredescx=="Julio"){
			   $nombredescx2="Jul";
		   }else if($nombredescx=="Agosto"){
			   $nombredescx2="Ago";
		   }else if($nombredescx=="Septiembre"){
			   $nombredescx2="Sept";
		   }else if($nombredescx=="Octubre"){
			   $nombredescx2="Oct";
		   }else if($nombredescx=="Noviembre"){
			   $nombredescx2="Nov";
		   }elseif($nombredescx=="Diciembre"){
			   $nombredescx2="Dic";
		   }
		  $year3x= $fila_rptx['a2012'];
		  $year4x= $fila_rptx['a2013'];
		  $year5x= $fila_rptx['a2014'];
		  $year6x= $fila_rptx['a2015'];
		  $year7x= $fila_rptx['a2016'];
		  $year8x= $fila_rptx['a2017'];
		  $year9x= $fila_rptx['a2018'];
			  $year10x= $fila_rptx['a2019'];
		  ?>
		  ['<?php echo $nombredescx2; ?>',  <?php echo $year3x; ?>, <?php echo $year4x; ?>, <?php echo $year5x; ?>, <?php echo $year6x; ?>, <?php echo $year7x; ?>, <?php echo $year8x; ?>, <?php echo $year9x; ?>, <?php echo $year10x; ?>],
		  <?php
		  }
	  }
		  ?>
        ]);

        var options = {
          title: 'Mercado <?php echo $paisname ?> - Departamento: <?=$namedepa1;?> - Evolucion Anual de Exportaciones / <?php echo $combo ?> / 2012 - 2019',
          /*curveType: 'function',
          legend: { position: 'bottom' }*/
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
          
          <div class="col-md-12 ml-auto mr-auto" id="mer">
          <div id="curve_chart" class="chart"></div>
           <br>
          <?php include("../../footer_pie.php"); ?>
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