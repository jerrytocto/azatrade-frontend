<?php
session_start();
if (isset($_SESSION['usuario'])){
}else{
	if(!isset($_SESSION["usuario"]) || $_SESSION["usuario"]==null){
	//print "<script>alert('Acceso invalido! - Inicia Sesion para Acceder');window.location='$enlace_actual';</script>";
}
}
set_time_limit(500);
$partida1 = $_POST["varipartidaregion"];
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
codigo varchar(5) NOT NULL,
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
				
$query_insercons = "SELECT departamento.iddepartamento, departamento.nombre
FROM departamento 
INNER JOIN exportacion ON departamento.iddepartamento = substring(exportacion.ubigeo,1,2) 
WHERE exportacion.part_nandi = ".$partida1." 
GROUP BY departamento.iddepartamento, departamento.nombre
ORDER BY departamento.nombre ASC
";
	  /*$resultado_insercons = pg_query($query_insercons) or die("Error en la Consulta SQL");
	  $numReg_insercons = pg_num_rows($resultado_insercons);
	  if($numReg_insercons>0){
		  while ($fila_insercon=pg_fetch_array($resultado_insercons)) {*/
				$resultado_insercons=$conexpg->query($query_insercons); 
if($resultado_insercons->num_rows>0){ 
while($fila_insercon=$resultado_insercons->fetch_array()){
		  $cod_pais= $fila_insercon['iddepartamento'];
		  $descri_pais= $fila_insercon['nombre'];
		  
		  
		  /*insertamos registro*/
  $sqlinsert1="INSERT INTO ".$mon_tmp."  (codigo,nomvariable,a2012,a2013,a2014,a2015,a2016,a2017,a2018,a2019) VALUES ('$cod_pais','$descri_pais','0','0','0','0','0','0','0','0')";
	$rscrea2 = $conexpg->query($sqlinsert1);
//$rscrea2 = pg_query($sqlinsert1)or die("Error en la Consulta SQL Insertar Registro Tabla Temporal");
if (!$rscrea2) {
    echo "Query: Un error ha occurido al crear insercion  tabla Temporal";
    exit;
  }else{
	  // echo "<center><b>Datos Insertados !! </b></center>";
  } //fin codigo inserta
		  
		  }
	  }

$query1 = "SELECT extract(YEAR from exportacion.fnum) AS anio, substring(exportacion.ubigeo,1,2) as ubi1, departamento.nombre, Sum(exportacion.vfobserdol) AS resultado FROM exportacion LEFT JOIN departamento ON   ((((SUBSTRING(exportacion.ubigeo,1,2))= departamento.iddepartamento))) WHERE exportacion.part_nandi = ".$partida1." AND extract(YEAR from exportacion.fnum) >= '2012' AND
extract(year from exportacion.fnum) <= '2019' GROUP BY anio,departamento.nombre,ubi1 ORDER BY anio,nombre ASC";
	  /*$resultado1 = pg_query($query1) or die("Error en la Consulta SQL");
	  $numReg = pg_num_rows($resultado1);
	  if($numReg>0){
		  while ($fila1=pg_fetch_array($resultado1)) {*/
				$resultado1=$conexpg->query($query1); 
if($resultado1->num_rows>0){ 
while($fila1=$resultado1->fetch_array()){
		  $val1= $fila1['anio'];
		  $val2= $fila1['ubi1'];
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
		  
		   echo"<br><br><center><h4><font color='#EC0D36'>No hay Resultados<br>El Numero de Partida $nombres o seleccion $combo Incorrectos</font></h4></center>";
			 
			 			  
	 $delete1 = mysql_query($conex, "DROP TABLE ".$mon_tmp.";");
  if (!$delete1) {
    echo "Query: Un Eerror ha Occurido al Eliminar la Tabla Temporal";
  }else{
	  
  }
  
}
				
if($resultado1!=0){//inicia si hay resultados
	$queryr = "SELECT extract(YEAR from exportacion.fnum) AS anio, Sum(exportacion.vfobserdol) AS resultado FROM exportacion LEFT JOIN departamento ON   ((((SUBSTRING(exportacion.ubigeo,1,2))= departamento.iddepartamento))) WHERE exportacion.part_nandi = ".$partida1." AND extract(year from exportacion.fnum) = '2018' GROUP BY anio order BY anio ASC";
	$resultado_r=$conexpg->query($queryr); 
if($resultado_r->num_rows>0){ 
while($fila_rx=$resultado_r->fetch_array()){
	/* $resultado_r = pg_query($queryr) or die("Error en la Consulta SQL Reporte");
	  $numReg_r = pg_num_rows($resultado_r);
	  if($numReg_r>0){
 while ($fila_rx=pg_fetch_array($resultado_r)) { */
	 
		   $calculo= $fila_rx['resultado'];
		 
 }
 }else{
	 $calculo=='0.00';
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
".$mon_tmp.".nomvariable ASC";
	  /*$resultado_rpt = pg_query($query_resultado) or die("Error en la Consulta SQL Reporte");
	  $numReg_rpt = pg_num_rows($resultado_rpt);
	  if($numReg_rpt>0){*/
	$resultado_rpt=$conexpg->query($query_resultado); 
if($resultado_rpt->num_rows>0){ 
		  
		  echo"<div class='col-md-12'>";
        echo"<div class='card'>";
	echo"<div class='card-header card-header-info card-header-icon'>
              <div class='card-icon'>
                <i class='material-icons'>assignment</i>
              </div>
              <h4 class='card-title'><b>Reporte de Ubigeo Anual de Exportaciones</b><br> Partida #: $partida1 │ Fecha Numeracion │ Valor FOB USD │ Periodo 2012 - 2019 </b> </h4>
            </div>";
		echo"<div class='card-body'>";
		echo"<div class='toolbar'>
		<a href='#mapa'><button class='btn btn-info btn-sm'> Ver Ubigeo Estadístico </button></a>
                  </div>";
         echo"<div class='material-datatables'>";
		echo"<table id='datatables' class='table table-striped table-no-bordered table-hover' cellspacing='0' width='100%' style='width:100%'>";
		  echo"<thead>
                          <tr>
                              <th>Departamentos</th>
                              <th>2012</th>
                              <th>2013</th>
                              <th>2014</th>
                              <th>2015</th>
							  <th>2016</th>
							  <th>2017</th>
							  <th>2018</th>
							  <th>2019</th>
							  <th>Var.%18/17</th>
							  <th>Var.% Total</th>
							  <th>Par.%18</th>
                          </tr>
                      </thead>";
		 echo"<tfoot>
                          <tr>
                              <th>Departamentos</th>
                              <th>2012</th>
                              <th>2013</th>
                              <th>2014</th>
                              <th>2015</th>
							  <th>2016</th>
							  <th>2017</th>
							  <th>2018</th>
							  <th>2019</th>
							  <th>Var.%18/17</th>
							  <th>Var.% Total</th>
							  <th>Par.%18</th>
                          </tr>
                      </tfoot>";
           echo"<tbody>";
		  
		  //while ($fila_rpt=pg_fetch_array($resultado_rpt)) {
			  while($fila_rpt=$resultado_rpt->fetch_array()){
		   $nombredesc= $fila_rpt['nomvariable'];
		  $mes1= $fila_rpt['a2012'];
		  $mes2= $fila_rpt['a2013'];
		  $mes3= $fila_rpt['a2014'];
		  $mes4= $fila_rpt['a2015'];
		  $mes5= $fila_rpt['a2016'];
		  $mes6= $fila_rpt['a2017'];
		  $mes7= $fila_rpt['a2018'];
		  $mes8= $fila_rpt['a2019'];
		  
		  if($mes6=='0' or $mes6 == isnull or $mes6 ==''){
		  $var11 ='0';
		  }else{
		  $var11 = number_format((($mes7 / $mes6) - 1) * 100,2);
		  }
		  if($mes1=='0' or $mes1 == isnull or $mes1 ==''){
			  $ca1 ='0';
		  }else{
		  $ca1 = (($mes2 / $mes1) - 1) * 100;
		  }
		  if($mes2=='0' or $mes2 == isnull or $mes2 ==''){
			  $ca2 ='0';
		  }else{
		  $ca2 = (($mes3 / $mes2) - 1) * 100;
		  }
		  if($mes3=='0' or $mes3 == isnull or $mes3 ==''){
			  $ca3 ='0';
		  }else{
		  $ca3 = (($mes4 / $mes3) - 1) * 100;
		  }
		  if($mes4=='0' or $mes4 == isnull or $mes4 ==''){
			  $ca4 ='0';
		  }else{
		  $ca4 = (($mes5 / $mes4) - 1) * 100;
		  }
		  if($mes5=='0' or $mes5 == isnull or $mes5 ==''){
			  $ca5 ='0';
		  }else{
		  $ca5 = (($mes6 / $mes5) - 1) * 100;
		  }
		  if($mes6=='0' or $mes6 == isnull or $mes6 ==''){
			  $ca6 ='0';
		  }else{
		  $ca6 = (($mes7 / $mes6) - 1) * 100;
		  }
			  if($mes7=='0' or $mes7 == isnull or $mes7 ==''){
			  $ca7 ='0';
		  }else{
		  $ca7 = (($mes8 / $mes7) - 1) * 100;
		  }
		  
		  $ca12 = $ca1 + $ca2 + $ca3 + $ca4 + $ca5 + $ca6 ;
		  $var22 = number_format($ca12 / 6,2);
		  
		  $tota1=$tota1 + $mes1;
		  $tota2=$tota2 + $mes2;
		  $tota3=$tota3 + $mes3;
		  $tota4=$tota4 + $mes4;
		  $tota5=$tota5 + $mes5;
		  $tota6=$tota6 + $mes6;
		  $tota7=$tota7 + $mes7;
		  $tota8=$tota8 + $mes8;
		  
		  
		  if($tota7=='0'){
		   $tota13 = "0";
		  }else{
		  $tota13 = number_format((($tota8 / $tota7) - 1) * 100,2);
		  }
		  
			  if($tota1=='0'){
			  $cato1 ='0';
		  }else{
		  $cato1 = (($tota2 / $tota1) - 1) * 100;
		  }
			  if($tota2=='0'){
			  $cato2 ='0';
		  }else{
		  $cato2 = (($tota3 / $tota2) - 1) * 100;
		  }
			  if($tota3=='0'){
			  $cato3 ='0';
		  }else{
		  $cato3 = (($tota4 / $tota3) - 1) * 100;
		  }
			  if($tota4=='0'){
			  $cato4 ='0';
		  }else{
		  $cato4 = (($tota5 / $tota4) - 1) * 100;
		  }
			  if($tota5=='0'){
			  $cato5 ='0';
		  }else{
		  $cato5 = (($tota6 / $tota5) - 1) * 100;
		  }
			  if($tota6=='0'){
			  $cato6 ='0';
		  }else{
		  $cato6 = (($tota7 / $tota6) - 1) * 100;
		  }
			  if($tota7=='0'){
			  $cato7 ='0';
		  }else{
		  $cato7 = (($tota8 / $tota7) - 1) * 100;
		  }
			  
		  //$xx=(($tota1 + $tota2) + ($tota3 + $tota4)) + ($tota5 + $tota6 + $tota7 + $tota8);
		  $xx=(($cato1 + $cato2) + ($cato3 + $cato5)) + ($cato5 + $cato6);
		  $tota14 = number_format($xx / 6,2);
		  
		  if($tota7=='0'){
			  $parti15="0";
		  }else{
			  
			  if($nombres2=="provi" or $nombres2=="distri"){
				  $parti15= number_format(($mes7 / $tota7)*100,2);
			  }else{
		  $parti15=number_format(($mes7 / $calculo) * 100,2);
			  }
		  }
		  
		  $tota15="100.00";
		  
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
echo "<td>$var11%</td>";
echo "<td>$var22%</td>";
echo "<td>$parti15%</td>";
echo "</tr>";
		  
		  }

 echo"<thead>";
		  echo "<tr>";
		  echo "<th><b>Total</b></th>";
		   echo "<th><b>".number_format($tota1,2)."</b></th>";
		    echo "<th><b>".number_format($tota2,2)."</b></th>";
			 echo "<th><b>".number_format($tota3,2)."</b></th>";
			 echo "<th><b>".number_format($tota4,2)."</b></th>"; 
			 echo "<th><b>".number_format($tota5,2)."</b></th>";
			 echo "<th><b>".number_format($tota6,2)."</b></th>";
		     echo "<th><b>".number_format($tota7,2)."</b></th>";
		     echo "<th><b>".number_format($tota8,2)."</b></th>";
			 echo "<th><b>$tota13</b></th>";
			 echo "<th><b>$tota14</b></th>";
			 echo "<th><b>$tota15</b></th>";
		  echo "</tr>";
		  echo"</thead>";
		  echo"</tbody>";
		  echo "</table>";
		  echo"</div>";
		  echo"</div>";
		  echo"</div>";
		  echo"</div>";
		  echo "</div></div></div>";
		  
	  }
	
}

?>

<style>
.chart {
  width: 100%; 
  min-height: 450px;
}
</style>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
google.charts.load('current', {
        'packages':['geochart'],
        // Note: you will need to get a mapsApiKey for your project.
        // See: https://developers.google.com/chart/interactive/docs/basic_load_libs#load-settings
        'mapsApiKey': 'AIzaSyD-9tSrke72PouQMnMX-a7eZSW0jkFMBWY'
      });
      google.charts.setOnLoadCallback(drawRegionsMap);

      function drawRegionsMap() {
        var data = google.visualization.arrayToDataTable([
          ['Country',   'Valor FOB USD'],
			
			<?php
			$mapubi="SELECT
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
".$mon_tmp.".nomvariable ASC";
			/* $mapa_rpt = pg_query($mapubi) or die("Error en la Consulta SQL Reporte");
	  $numReg_mapa = pg_num_rows($mapa_rpt);
	  if($numReg_mapa>0){
		   while ($fila_ma=pg_fetch_array($mapa_rpt)) { */
			$mapa_rpt=$conexpg->query($mapubi); 
if($mapa_rpt->num_rows>0){ 
while($fila_ma=$mapa_rpt->fetch_array()){
			   $nombredesc= $fila_ma['nomvariable'];
		  $year8= $fila_ma['a2018']; 
			   ?>
			['<?=$nombredesc;?>', <?=$year8;?>],
			<?php
			}
			}
			?>
        ]);

        var options = {
          region: 'PE', // Peru
			resolution: 'provinces',
          colorAxis: {colors: ['#00853f', 'yellow', '#e31b23']},
          backgroundColor: '#ffffff',
          datalessRegionColor: '#ffffff',
          defaultColor: '#f5f5f5',
        };

        var chart = new google.visualization.GeoChart(document.getElementById('geochart-colors'));
        chart.draw(data, options);
      };
				</script>
        <center>
        <h3 class="title" id="mapa"><font color="#FFFFFF">Mapa Geografico │ Partida <?=$partida1;?> │ Ubigeo Anual de Exportaciones │ Valor FOB USD │ Periodo 2018</font></h3></center>
         <div class="col-md-12 ml-auto mr-auto">
          <div id="geochart-colors" class="chart"></div>
          </div>
           <br>
          <?php include("../../footer_pie.php"); ?>
            </div>
            </div>
            
        <!--</div>
        </div>
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

<!--<div class="container">
  <h4>Mapa Geografico │ Partida <?php echo $partida1; ?> │ Evolucion Anual de Exportaciones  │ Valor FOB USD │ Periodo 2017</h4>
  <ul class="nav nav-pills">
    <li class="active"><a data-toggle="pill" href="#home">2017</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <div class="text-center table-responsive">
            <?php
       //include("graficos/grafi_mercado_destino_pais.php");
	   ?>
       </div>
    </div>
  </div>
</div>-->
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