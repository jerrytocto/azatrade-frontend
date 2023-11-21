<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['geochart']});
      google.charts.setOnLoadCallback(drawRegionsMap);

      function drawRegionsMap() {

        var data = google.visualization.arrayToDataTable([
          ['Country', 'Valor FOB USD'],
<?php
		
		 $query_resultado = "SELECT
".$mon_tmp.".codigo,
".$mon_tmp.".nomvariable,
".$mon_tmp.".a2012,
".$mon_tmp.".a2013,
".$mon_tmp.".a2014,
".$mon_tmp.".a2015,
".$mon_tmp.".a2016,
".$mon_tmp.".a2017,
".$mon_tmp.".a2018
FROM
".$mon_tmp."
ORDER BY
".$mon_tmp.".nomvariable ASC";
	  $resultado_rpt = pg_query($query_resultado) or die("Error en la Consulta SQL Reporte");
	  $numReg_rpt = pg_num_rows($resultado_rpt);
	  if($numReg_rpt>0){
		   while ($fila_rpt=pg_fetch_array($resultado_rpt)) {
		   $nombredesc= $fila_rpt['nomvariable'];
		  /*$year3= $fila_rpt['a2012'];
		  $year4= $fila_rpt['a2013'];
		  $year5= $fila_rpt['a2014'];*/
		  $year6= $fila_rpt['a2017'];
		 /* $year7= $fila_rpt['a2016']; */   
	?>	
	['<?php echo $nombredesc; ?>', <?php echo $year6; ?>],
	<?php
		   }
	  }
	?>
	  /*['Country', 'Popularity'],
          ['Germany', 200],
          ['United States', 300],
          ['Brazil', 400],
          ['Canada', 500],
          ['France', 600],
          ['RU', 700]*/
        ]);

        var options = {};
        var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="regions_div" style="width: 900px; height: 500px;"></div>
  </body>
</html>