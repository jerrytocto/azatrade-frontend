<?php
session_start();
if (isset($_SESSION['usuario'])){
}else{
	if(!isset($_SESSION["usuario"]) || $_SESSION["usuario"]==null){
	//print "<script>alert('Acceso invalido! - Inicia Sesion para Acceder');window.location='$enlace_actual';</script>";
}
}
set_time_limit(500);
$partida1 = $_POST["varipartidamerca"];
$filtro = $_POST["unavaria"];
$namedepa1 = $_POST["namedepa"];
$ubicod1 = $_POST["codubi"];
if($ubicod1!=""){
	$flatcod = $ubicod1;
	//$query1 = "AND SUBSTRING(exportacion.ubigeo,1,2) LIKE '%$flatcod'";
	$query1var = "AND SUBSTRING(exportacion.ubigeo,1,2) = '$flatcod'";
}else{
	$flatcod = "";
	$query1var = "";
}

?>
<!doctype html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<!-- Favicons -->
<link rel="apple-touch-icon" href="../img/logo.png">
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
        <!--<div class="page-header register-page header-filter" filter-color="black" style="background-image: url('../../img/plan.jpg'); background-size: cover; background-position: top center;">-->
  <!--<div class="container">-->
           <!--<div class="content">
                      <div class="container-fluid">
            <div class="row">-->
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
//creamos tabla temporal				
$createsql = "CREATE TABLE $mon_tmp (
codigo varchar(5) NOT NULL,
nomvariable varchar(300),
paisvar varchar(300),
a2012 numeric(30,2),
a2013 numeric(30,2),
a2014 numeric(30,2),
a2015 numeric(30,2),
a2016 numeric(30,2),
a2017 numeric(30,2),
a2018 numeric(30,2),
a2019 numeric(30,2),
a2020 numeric(30,2),
a2021 numeric(30,2))"; 
				$rscrea = $conexpg->query($createsql);
 //$rscrea = pg_query($conexpg,$createsql)or die("Error en la Consulta SQL Crear Tabla Temporal"); 
 if (!$rscrea) {
    echo "Query: Un error ha occurido al crear tabla Temporal";
    exit;
  }else{
	   //echo "<center><b>Data Actualizado hasta Marzo-2016 </b></center>";
  }
//seleccionamos y del resultado insertamos a la tabla temporal*/
   $query_insercons = "SELECT
exportacion.cpaides,
paises.espanol,
paises.descripcion
FROM
exportacion
LEFT JOIN paises ON exportacion.cpaides = paises.idpaises
WHERE
extract(year from exportacion.fnum) >= '2012' AND
extract(year from exportacion.fnum) <= '2021' $query1var AND
exportacion.cpaides <> '' AND exportacion.part_nandi = ".$partida1."
GROUP BY
exportacion.cpaides,paises.espanol,paises.descripcion
";
				$resultado_insercons=$conexpg->query($query_insercons); 
if($resultado_insercons->num_rows>0){ 
while($fila_insercon=$resultado_insercons->fetch_array()){
		  $cod_pais= $fila_insercon['cpaides'];
		  $descri_pais= $fila_insercon['espanol'];
			  $despaisvar= $fila_insercon['descripcion'];
		  
		  if($descri_pais==""){
			  $descri_pais = $cod_pais;
		  }
		  
		  /*insertamos registro*/
  $sqlinsert1="INSERT INTO ".$mon_tmp."  (codigo,nomvariable,paisvar,a2012,a2013,a2014,a2015,a2016,a2017,a2018,a2019,a2020,a2021) VALUES ('$cod_pais','$descri_pais','$despaisvar','0','0','0','0','0','0','0','0','0','0')";
	$rscrea2 = $conexpg->query($sqlinsert1);
//$rscrea2 = pg_query($conexpg,$sqlinsert1)or die("Error en SQL Insertar Registro Tabla Temporal");
if (!$rscrea2) {
    echo "Query: Un error ha occurido al crear insercion  tabla Temporal";
    exit;
  }else{
	  // echo "<center><b>Datos Insertados !! </b></center>";
  } //fin codigo inserta
		  }
	//insertamos un registro registro total de precio
	$sqlinsertt1="INSERT INTO ".$mon_tmp."  (codigo,nomvariable,paisvar,a2012,a2013,a2014,a2015,a2016,a2017,a2018,a2019,a2020,a2021) VALUES ('dife','precio','precio','0','0','0','0','0','0','0','0','0','0')";
	$rscrea2t = $conexpg->query($sqlinsertt1);
//$rscrea2 = pg_query($conexpg,$sqlinsert1)or die("Error en SQL Insertar Registro Tabla Temporal");
if (!$rscrea2t) {
    echo "Query: Un error ha occurido al crear insercion  tabla Temporal";
    exit;
  }else{
	  // echo "<center><b>Datos Insertados !! </b></center>";
  }
	  }
				
				if($filtro=="vfobserdol"){
					$nomfiltro ="Valor FOB USD";
				}else if($filtro=="vpesnet"){
					$nomfiltro ="Peso Neto (Kg)";
				}else{
					$nomfiltro ="Precio FOB USD x KG";
				}
				
if($filtro=="vfobserdol"){
$query1 = "SELECT exportacion.fano, exportacion.cpaides, paises.espanol, Sum(exportacion.vfobserdol) AS resultado FROM exportacion LEFT JOIN paises ON exportacion.cpaides = paises.idpaises WHERE exportacion.part_nandi = ".$partida1." $query1var AND extract(year from exportacion.fnum) >= '2012' AND extract(year from exportacion.fnum) <= '2021' GROUP BY exportacion.cpaides,paises.espanol,exportacion.fano ORDER BY exportacion.fano,paises.espanol ASC";
}
if($filtro=="vpesnet"){
	$query1 = "SELECT exportacion.fano, exportacion.cpaides, paises.espanol, Sum(exportacion.vpesnet) AS resultado FROM exportacion LEFT JOIN paises ON exportacion.cpaides = paises.idpaises WHERE exportacion.part_nandi = ".$partida1." $query1var AND extract(year from exportacion.fnum) >= '2012' AND extract(year from exportacion.fnum) <= '2021' GROUP BY exportacion.cpaides,paises.espanol,exportacion.fano ORDER BY exportacion.fano,paises.espanol ASC";
}
if($filtro=="diferen"){
	$query1 = "SELECT exportacion.fano, exportacion.cpaides, paises.espanol, sum(exportacion.vfobserdol)/sum(exportacion.vpesnet) AS resultado FROM exportacion LEFT JOIN paises ON exportacion.cpaides = paises.idpaises WHERE exportacion.part_nandi = ".$partida1." $query1var AND extract(year from exportacion.fnum) >= '2012' AND extract(year from exportacion.fnum) <= '2021' GROUP BY exportacion.cpaides,paises.espanol,exportacion.fano ORDER BY exportacion.fano,paises.espanol ASC";
}
				$resultado1=$conexpg->query($query1); 
if($resultado1->num_rows>0){ 
while($fila1=$resultado1->fetch_array()){
		  $val1= $fila1['fano'];
		  $val2= $fila1['cpaides'];
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
	if($val1=='2020'){
  $insert1 = "UPDATE ".$mon_tmp." SET a2020='".$val3."' WHERE codigo='$val2' "; 
 $rs = $conexpg->query($insert1);
		 }
	if($val1=='2021'){
  $insert1 = "UPDATE ".$mon_tmp." SET a2021='".$val3."' WHERE codigo='$val2' "; 
 $rs = $conexpg->query($insert1);
		 }
		 
		 
		  }
	if($filtro=="diferen"){//precio suma totales por año
	$preciosqlxx = "SELECT exportacion.fano, sum(exportacion.vfobserdol)/sum(exportacion.vpesnet) AS resultado  FROM exportacion LEFT JOIN paises ON exportacion.cpaides = paises.idpaises  WHERE exportacion.part_nandi = ".$partida1." $query1var AND  extract(year from exportacion.fnum) >= '2012' AND  extract(year from exportacion.fnum) <= '2021'  GROUP BY exportacion.fano  ORDER BY exportacion.fano ASC";
	$rsqlprexx=$conexpg->query($preciosqlxx); 
if($rsqlprexx->num_rows>0){ 
while($rwpreci=$rsqlprexx->fetch_array()){
          $pret1= $rwpreci['fano'];
		  $pret2= $rwpreci['resultado'];
	if($pret1=='2012'){
  $instotpre = "UPDATE ".$mon_tmp." SET a2012='".$pret2."' WHERE codigo='dife' "; 
 $tprs = $conexpg->query($instotpre);
		 }
	if($pret1=='2013'){
  $instotpre = "UPDATE ".$mon_tmp." SET a2013='".$pret2."' WHERE codigo='dife' "; 
 $tprs = $conexpg->query($instotpre);
		 }
	if($pret1=='2014'){
  $instotpre = "UPDATE ".$mon_tmp." SET a2014='".$pret2."' WHERE codigo='dife' "; 
 $tprs = $conexpg->query($instotpre);
		 }
	if($pret1=='2015'){
  $instotpre = "UPDATE ".$mon_tmp." SET a2015='".$pret2."' WHERE codigo='dife' "; 
 $tprs = $conexpg->query($instotpre);
		 }
	if($pret1=='2016'){
  $instotpre = "UPDATE ".$mon_tmp." SET a2016='".$pret2."' WHERE codigo='dife' "; 
 $tprs = $conexpg->query($instotpre);
		 }
	if($pret1=='2017'){
  $instotpre = "UPDATE ".$mon_tmp." SET a2017='".$pret2."' WHERE codigo='dife' "; 
 $tprs = $conexpg->query($instotpre);
		 }
	if($pret1=='2018'){
  $instotpre = "UPDATE ".$mon_tmp." SET a2018='".$pret2."' WHERE codigo='dife' "; 
 $tprs = $conexpg->query($instotpre);
		 }
	if($pret1=='2019'){
  $instotpre = "UPDATE ".$mon_tmp." SET a2019='".$pret2."' WHERE codigo='dife' "; 
 $tprs = $conexpg->query($instotpre);
		 }
	if($pret1=='2020'){
  $instotpre = "UPDATE ".$mon_tmp." SET a2020='".$pret2."' WHERE codigo='dife' "; 
 $tprs = $conexpg->query($instotpre);
		 }
	if($pret1=='2021'){
  $instotpre = "UPDATE ".$mon_tmp." SET a2021='".$pret2."' WHERE codigo='dife' "; 
 $tprs = $conexpg->query($instotpre);
		 }

}
}else{ }
}
	
	  }else{
		  
		   echo"<center><h4><font color='#EC0D36'>No hay Resultados<br>El Numero de Partida $nombres o seleccion $combo Incorrectos</font></h4></center>";
			 
			 /*eliminamos tabla temporal creada*/			  
	 $delete1 = mysqli_query($conexpg, "DROP TABLE ".$mon_tmp.";");
  if (!$delete1) {
    echo "Query: Un error ha ocurido al Eliminar la Tabla Temporal";
  }else{
	  
  }
  
}

if($resultado1!=0){//inicia si hay resultados
	  if($filtro=="diferen"){//precio suma totales por año
		$capta ="WHERE codigo='dife' ";
	}else{ $capta ="";}
	  /*sumamos resultados globales*/
	   $sqlyear="SELECT
Sum(".$mon_tmp.".a2012) AS a2012,
Sum(".$mon_tmp.".a2013) AS a2013,
Sum(".$mon_tmp.".a2014) AS a2014,
Sum(".$mon_tmp.".a2015) AS a2015,
Sum(".$mon_tmp.".a2016) AS a2016,
Sum(".$mon_tmp.".a2017) AS a2017,
Sum(".$mon_tmp.".a2018) AS a2018,
Sum(".$mon_tmp.".a2019) AS a2019,
Sum(".$mon_tmp.".a2020) AS a2020,
Sum(".$mon_tmp.".a2020) AS a2021
FROM ".$mon_tmp." $capta ";
	$result_year=$conexpg->query($sqlyear); 
if($result_year->num_rows>0){ 
while($fila_year=$result_year->fetch_array()){
		   $sumatotal2012= $fila_year['a2012'];
		   $sumatotal2013= $fila_year['a2013'];
		   $sumatotal2014= $fila_year['a2014'];
		   $sumatotal2015= $fila_year['a2015'];
		   $sumatotal2016= $fila_year['a2016'];
		   $sumatotal2017= $fila_year['a2017'];
		   $sumatotal2018= $fila_year['a2018'];
		   $sumatotal2019= $fila_year['a2019'];
	$sumatotal2020= $fila_year['a2020'];
	$sumatotal2021= $fila_year['a2021'];
			   
		   if($sumatotal2019=='0.00'){
			   $varitota='0';
		   }else{
		   $varitota= number_format((($sumatotal2020 / $sumatotal2019) - 1) * 100,2);
			   }
		   $parti='100 %';
	
		   if($sumatotal2019=='0'){
			  $tota6 ="0"; 
		   }else{
		   $tota6 =number_format((( $sumatotal2020 / $sumatotal2019) - 1) * 100,2);
			   }
		   $xx=$sumatotal2012 + $sumatotal2013 + $sumatotal2014 + $sumatotal2015 + $sumatotal2016 + $sumatotal2017 + $sumatotal2018 + $sumatotal2019 + $sumatotal2020 + $sumatotal2021;
		  $tota7 = number_format($xx / $sumatotal2020,2);
		  $tota8 = "100.00";
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
	$sumatotal2020="0";
	$sumatotal2021="0";
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
".$mon_tmp.".a2019,
".$mon_tmp.".a2020,
".$mon_tmp.".a2021
FROM ".$mon_tmp." WHERE codigo<>'dife'
ORDER BY ".$mon_tmp.".nomvariable ASC";
	$resultado_rpt=$conexpg->query($query_resultado); 
if($resultado_rpt->num_rows>0){ 

echo"<div class='col-md-12'>";
        echo"<div class='card'>";
	echo"<div class='card-header card-header-info card-header-icon'>
              <div class='card-icon'>
                <i class='material-icons'>assignment</i>
              </div>
              <h4 class='card-title'><b>Reporte Anual de Mercado de Destino para las Exportaciones</b><br> Partida #: $partida1 │ Departamento: $namedepa1 │ Fecha Numeracion │ $nomfiltro │ Periodo 2012 - 2021 </b> </h4>
            </div>";
		echo"<div class='card-body'>";
		echo"<div class='toolbar'>";
		echo"<a href='#mapa'><button class='btn btn-info btn-sm'> Ver Mapa Estadístico </button></a>";
                  echo"</div>";
         echo"<div class='material-datatables'>";
		echo"<table id='datatables' class='table table-striped table-no-bordered table-hover' cellspacing='0' width='100%' style='width:100%'>";
		  echo"<thead>
                          <tr>
                              <th>#</th>
							  <th>Paises</th>
                              <th>2012</th>
                              <th>2013</th>
                              <th>2014</th>
                              <th>2015</th>
							  <th>2016</th>
							  <th>2017</th>
							  <th>2018</th>
							  <th>2019</th>
							  <th>2020</th>
							  <th>2021</th>
							  <th>Var.%20/19</th>
							  <th>Var.% Total</th>
							  <th>Par.%20</th>
                          </tr>
                      </thead>";
		 echo"<tfoot>
                          <tr>
                               <th>#</th>
							   <th>Paises</th>
                              <th>2012</th>
                              <th>2013</th>
                              <th>2014</th>
                              <th>2015</th>
							  <th>2016</th>
							  <th>2017</th>
							  <th>2018</th>
							  <th>2019</th>
							  <th>2020</th>
							  <th>2021</th>
							  <th>Var.%20/19</th>
							  <th>Var.% Total</th>
							  <th>Par.%20</th>
                          </tr>
                      </tfoot>";
           echo"<tbody>";
		  //while ($fila_rpt=pg_fetch_array($resultado_rpt)) {
			  while($fila_rpt=$resultado_rpt->fetch_array()){
		   $nombredesc= $fila_rpt['nomvariable'];
				  $cuen = $cuen + 1;
		  $year3= $fila_rpt['a2012'];
		  $year4= $fila_rpt['a2013'];
		  $year5= $fila_rpt['a2014'];
		  $year6= $fila_rpt['a2015'];
		  $year7= $fila_rpt['a2016'];
		  $year8= $fila_rpt['a2017'];
		  $year9= $fila_rpt['a2018'];
		  $year10= $fila_rpt['a2019'];
				  $year11= $fila_rpt['a2020'];
				  $year12= $fila_rpt['a2021'];
		  
		  if($year10=='0'){
		  $var11 ='0';
		  }else{
		  $var11 = number_format((($year11 / $year10) - 1) * 100,2);
		  }
		  
		  
		  if($year3=='0'){
			  $ca3 ='0';
		  }else{
		  $ca3 = (($year4 / $year3) - 1) * 100;
		  }
		  if($year4=='0'){
			  $ca4 ='0';
		  }else{
		  $ca4 = (($year5 / $year4) - 1) * 100;
		  }
		  if($year5=='0'){
			  $ca5 ='0';
		  }else{
		  $ca5 = (($year6 / $year5) - 1) * 100;
		  }
		  if($year6=='0'){
			  $ca6 ='0';
		  }else{
		  $ca6 = (($year7 / $year6) - 1) * 100;
		  }
		  if($year7=='0'){
			  $ca7 ='0';
		  }else{
		  $ca7 = (($year8 / $year7) - 1) * 100;
		  }
		  if($year8=='0'){
			  $ca8 ='0';
		  }else{
		  $ca8 = (($year9 / $year8) - 1) * 100;
		  }
			  if($year9=='0'){
			  $ca9 ='0';
		  }else{
		  $ca9 = (($year10 / $year9) - 1) * 100;
		  }
				  if($year10=='0'){
			  $ca10 ='0';
		  }else{
		  $ca10 = (($year11 / $year10) - 1) * 100;
		  }
				  if($year11=='0'){
			  $ca11 ='0';
		  }else{
		  $ca11 = (($year12 / $year11) - 1) * 100;
		  }
		  $catot = $ca3 + $ca4 + $ca5 + $ca6 + $ca7 + $ca8 + $ca9 + $ca10;
				  if($catot!="0" and $ca8!="0"){
		  $var22 = number_format($catot / $ca8,2);
					  }else{
					 $var22 = "0.00"; 
				  }
		  
		  $var33= number_format(($year11 / $sumatotal2020)*100,2);
		  
		  echo "<tr>";
echo"<td>$cuen</td>";
echo "<td>$nombredesc</td>";
echo "<td>".number_format($year3,2)."</td>";
echo "<td>".number_format($year4,2)."</td>";
echo "<td>".number_format($year5,2)."</td>";
echo "<td>".number_format($year6,2)."</td>";
echo "<td>".number_format($year7,2)."</td>";
echo "<td>".number_format($year8,2)."</td>";
echo "<td>".number_format($year9,2)."</td>";
echo "<td>".number_format($year10,2)."</td>";
echo "<td>".number_format($year11,2)."</td>";
echo "<td>".number_format($year12,2)."</td>";
echo "<td>$var11%</td>";
echo "<td>$var22%</td>";
echo "<td>$var33%</td>";
 echo "</tr>";
		  
		  }
		  
		  echo"<thead>";
		  echo "<tr>";
	echo"<td></td>";
		  echo "<th><b>Total</b></th>";
		   echo "<th><b>".number_format($sumatotal2012,2)."</b></th>";
		    echo "<th><b>".number_format($sumatotal2013,2)."</b></th>";
			echo "<th><b>".number_format($sumatotal2014,2)."</b></th>";
			echo "<th><b>".number_format($sumatotal2015,2)."</b></th>";
			echo "<th><b>".number_format($sumatotal2016,2)."</b></th>";
			echo "<th><b>".number_format($sumatotal2017,2)."</b></th>";
		    echo "<th><b>".number_format($sumatotal2018,2)."</b></th>";
		    echo "<th><b>".number_format($sumatotal2019,2)."</b></th>";
	 echo "<th><b>".number_format($sumatotal2020,2)."</b></th>";
	echo "<th><b>".number_format($sumatotal2021,2)."</b></th>";
			 echo "<th><b>$tota6</b></th>";
			 echo "<th><b>$tota7</b></th>";
			 echo "<th><b>$tota8</b></th>";
		  echo "</tr>";
		  echo"</thead>";
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
				
<!-- ******* -->
<style>
.chart {
  width: 100%; 
  min-height: 450px;
}
</style>
          <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['geochart']});
      google.charts.setOnLoadCallback(drawRegionsMap);

      function drawRegionsMap() {

        var data = google.visualization.arrayToDataTable([
          ['Country', 'Valor FOB USD'],
<?php
		
		 $query_mapa = "SELECT
".$mon_tmp.".codigo,
".$mon_tmp.".paisvar,
".$mon_tmp.".a2012,
".$mon_tmp.".a2013,
".$mon_tmp.".a2014,
".$mon_tmp.".a2015,
".$mon_tmp.".a2016,
".$mon_tmp.".a2017,
".$mon_tmp.".a2018,
".$mon_tmp.".a2019,
".$mon_tmp.".a2020,
".$mon_tmp.".a2021
FROM ".$mon_tmp." WHERE codigo<>'dife' ORDER BY
".$mon_tmp.".nomvariable ASC";
			$mapa_rpt=$conexpg->query($query_mapa); 
if($mapa_rpt->num_rows>0){ 
while($fila_ma=$mapa_rpt->fetch_array()){
		   $nombredesc= $fila_ma['paisvar'];
		  $year8= $fila_ma['a2020']; 
	?>	
	['<?php echo $nombredesc; ?>', <?php echo $year8; ?>],
	<?php
		   }
	  }
	?>
        ]);

        var options = {};
        var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));

        chart.draw(data, options);
      }
    </script>
       <center>
        <h3 class="title" id="mapa"><font color="#FFFFFF">Mapa Geografico │ Partida <?=$partida1;?> │ Departamento: <?=$namedepa1;?> │ Evolucion Anual de Exportaciones │ <?=$nomfiltro;?> │ Periodo 2020</font></h3></center>
         <div class="col-md-12 ml-auto mr-auto">
          <div id="regions_div" class="chart"></div>
          <br>
          <?php include("../../footer_pie.php"); ?>
         
          </div>
          <!-- ******* -->

            </div>
            
            </div>
            
        <!--</div>
        </div>
        </div>
        
       
        
        </div>
</div>-->

 </body>   
   
    <!--   Core JS Files   -->
<script src="../../js/core/jquery.min.js"></script>
<script src="../../js/core/popper.min.js"></script>


<script src="../../js/bootstrap-material-design.min.js"></script>


<script src="../../js/plugins/perfect-scrollbar.jquery.min.js"></script>



<!--  Google Maps Plugin  -->
<!--<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2Yno10-YTnLjjn_Vtk0V8cdcY5lC4plU"></script>-->


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
    $('#datatables').DataTable({
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
    var table = $('#datatables').DataTable();

    $('.card .material-datatables label').addClass('form-group');
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