<?php
session_start();
if (isset($_SESSION['usuario'])){
}else{
	if(!isset($_SESSION["usuario"]) || $_SESSION["usuario"]==null){
	//print "<script>alert('Acceso invalido! - Inicia Sesion para Acceder');window.location='$enlace_actual';</script>";
}
}
ini_set("memory_limit", "850M");
set_time_limit(950);
$partida1 = $_GET["partida"];
$year=$_GET['anio'];
$descri1 = $_GET['descri1'];
if($descri1==""){
	$destodo ="Todos";
}else{
	$destodo ="$descri1";
}
$ubige = $_GET['ubi'];
$nonloca = $_GET['local'];

$mexcon = $_GET['mes'];
if($mexcon==""){
	$cnsmes = "";
}else{
$cnsmes = "and MONTH(e.fnum) = '$mexcon'";
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
$aduana = "%";
$empresa = "%";
if($ubige!=""){
$depa = $ubige;
}else{
$depa = "%";
	}
$provincias = "%";
$distrito = "%";
$pais = "%";
$value = "%";
$unitransp = "%";
$vtransp = "%";
$value2 = "%";
$unidmed = "%";
$unidmedcomer = "%";			
	 //consultamos los datos
				$sqlgen = "SELECT
YEAR(e.FNUM) AS anio,
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
e.part_nandi like '$partida1'
  and year(e.fnum) like '$year'
  $cnsmes
	and e.cadu like '$aduana'
	and e.ndoc like '$empresa'
	and substring(e.ubigeo,1,2) like '$depa'
	and substring(e.ubigeo,3,2) like '$provincias'
	and substring(e.ubigeo,5,2) like '$distrito'
and CONCAT(e.DCOM,' ',e.DMER2,' ',e.DMER3,' ',e.DMER4,' ',e.DMER5) like '%$descri1%'	
	and e.cpaides like '$pais'
	and e.cpuedes like '$value'
	and e.cunitra like '$unitransp'
	and e.cviatra like '$vtransp'
	and e.cage like '$value2'
	and e.tunifis like '$unidmed'
	and e.tunicom like '$unidmedcomer' ";
 /*$sqlgen ="SELECT 
  date_part('year',e.fnum)::integer as anio,
	e.ndcl,
	e.cadu,
	a.descripcion as aduana,
	e.fnum,
	e.femb,
	e.ndoc,
	e.dnombre,
	e.ddirpro,
	e.ubigeo,
	substring(e.ubigeo,1,2),
	substring(e.ubigeo,3,2),
	substring(e.ubigeo,5,2),
	ubigeo.ubigeo as ubigeo2,
	e.part_nandi,
	e.nser,
	(coalesce(e.dcom,'') ||' '|| coalesce(e.dmer2,'') ||' '|| coalesce(e.dmer3,'') ||' '|| coalesce(e.dmer4,'') ||' '|| coalesce(e.dmer5,''))::varchar(200) as dcom,
	em.descripcion as estmercancia,
	e.cpaides,
	p.espanol as paisdestino,
	e.cpuedes,
	pu.puerto,
	e.cviatra,
	vt.descripcion as viatransporte,
	(case e.cunitra 
		when '1' then 'BARCO' 
		when '4' then 'AVION' 
		when '6' then 'FERROCARRIL' 
		when '7' then 'CAMION' 
		when '8' then 'POR TUBERIAS' 
	else 'OTRAS' end)::varchar(15) as unidadtransporte,
	e.dmat,
	e.ncon,
	e.cage,
	(select aa.agencia from agente aa where aa.idagente = e.cage limit 1)::varchar(80) as agente,
	e.calm,
	recint_aduaner.razon_social as recinto_aduanero,
	ba.banco,
	e.vfobserdol,
	e.vpesnet,
	e.vpesbru,
	e.qunifis,
	e.tunifis,
	uu.descripcion as undmedida,
	e.qunicom,
	e.tunicom,
	(case e.vpesnet when 0 then 0 else (e.vfobserdol/e.vpesnet) end)::numeric(12,2) as pesounitkg,
	(case e.qunifis when 0 then 0 else (e.vfobserdol/e.qunifis) end)::numeric(12,2) as preciounitxundmedida,
	(case e.qunicom when 0 then 0 else (e.vfobserdol/e.qunicom) end)::numeric(12,2) as preciounitxunidcomercial,
	(case e.vpesnet when 0 then 0 else (e.vpesbru/e.vpesnet) end)::numeric(12,2) as pesoenvaseyembalaje,
	coalesce(sector.sector,'')::varchar(80) as sector
from 
	exportacion e 
	left outer join aduana a On (e.cadu=a.codadu)
	left outer join estmercancia em ON (em.idestmercancia=e.cest)
	left outer join paises p ON (p.idpaises=e.cpaides)
	left outer join puerto pu ON (pu.idcodigo=e.cpuedes)
	left outer join viastransporte vt on (vt.idviastransporte=e.cviatra)
	left outer join banco ba on (ba.idbanco=substring(e.centfin,2,2))
	left outer join (select idrecintaduaner, razon_social from recintaduaner group by idrecintaduaner, razon_social)as recint_aduaner On (recint_aduaner.idrecintaduaner=e.calm)

	left outer join sector ON (sector.partida=(CASE char_length(e.part_nandi::TEXT) WHEN '9' THEN '0' || e.part_nandi ELSE e.part_nandi::TEXT END))
	left outer join unidmedida uu ON (uu.idunidmedida=e.tunifis)
	left outer join
	(

	SELECT
ubigeo.cubigeo as iddistrito,
(trim(nombredepartamento) ||' / '|| trim(nombreprov) ||' / '|| trim(nombredistrito))::varchar(80)as ubigeo
FROM
ubigeo
order by ubigeo ASC
	)as ubigeo ON (ubigeo.iddistrito = e.ubigeo)
where
	e.part_nandi::varchar like '$partida1'
  and date_part('year',e.fnum)::TEXT like '$year'
	and e.cadu like '$aduana'
	and e.ndoc like '$empresa'
	and substring(e.ubigeo,1,2) like '$depa'
	and substring(e.ubigeo,3,2) like '$provincias'
	and substring(e.ubigeo,5,2) like '$distrito'
	and (coalesce(e.dcom,'') ||' '|| coalesce(e.dmer2,'') ||' '|| coalesce(e.dmer3,'') ||' '|| coalesce(e.dmer4,'') ||' '|| coalesce(e.dmer5,'') ilike '%$descri1%')		
	and e.cpaides like '$pais'
	and e.cpuedes like '$value'
	and e.cunitra like '$unitransp'
	and e.cviatra like '$vtransp'
	and e.cage like '$value2'
	and e.tunifis like '$unidmed'
	and e.tunicom like '$unidmedcomer'";*/
				
//if($numReg!=0){//inicia si hay resultados
  
  /*visualizamos datos en el reporte*/
  /*$query_resultado = "SELECT
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
	  $resultado_rpt = pg_query($query_resultado) or die("Error en la Consulta SQL Reporte");
	  $numReg_rpt = pg_num_rows($resultado_rpt);
	  if($numReg_rpt>0){*/
echo"<div class='col-md-12'>";
        echo"<div class='card'>";
	echo"<div class='card-header card-header-info card-header-icon'>
              <div class='card-icon'>
                <i class='material-icons'>assignment</i>
              </div>
              <h4 class='card-title'><b>Consulta Avanzada desde una Partida de Bolsa (Detalle) - Exportaciones </b><br> Producto: $destodo │ Departamento: $nonloca │ Partida #: $partida1 │ Fecha Numeración │ Periodo $year │  </b> </h4>
            </div>";
		echo"<div class='card-body'>";
		echo"<div class='toolbar'>
                  </div>";
         echo"<div class='material-datatables'>";
		echo"<table id='datatablese' class='table table-striped table-no-bordered table-hover' cellspacing='0' width='100%' style='width:100%'>";
		  echo"<thead>
                          <tr>
                              <!--<th>A&ntilde;o</th>-->
							  <th>#</th>
							  <th>Fecha</th>
                              <th>Aduanas</th>";
				if($axe == "SI"){
					     echo"<th>DUA</th>";
								  }
                         echo"<th>N#. Doc.</th>
                              <th>Empresa</th>
                              <th>Direccion</th>
							  <th>Ubigeo</th>
							  <th>Partida</th>
							  <th>Descripcion&nbsp;Prod.</th>
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
							  <th>Precio FOB x Kg</th>
							  <th>Precio Unit. (Unid.Med.)</th>
							  <th>Precio Unit. (Unid.Med.Comerc.)</th>
							  <th>Peso (Envase/Embalaje)</th>
							  <th>Sector</th>
                          </tr>
                      </thead>";
		 echo"<tfoot>
                          <tr>
						      <!--<th>A&ntilde;o</th>-->
							  <th>#</th>
							  <th>Fecha</th>
                              <th>Aduanas</th>";
				if($axe == "SI"){
					     echo"<th>DUA</th>";
				}
                         echo"<th>N#. Doc.</th>
                              <th>Empresa</th>
                              <th>Direccion</th>
							  <th>Ubigeo</th>
							  <th>Partida</th>
							  <th>Descripcion&nbsp;Prod.</th>
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
							  <th>Precio FOB x Kg</th>
							  <th>Precio Unit. (Unid.Med.)</th>
							  <th>Precio Unit. (Unid.Med.Comerc.)</th>
							  <th>Peso (Envase/Embalaje)</th>
							  <th>Sector</th>
                          </tr>
                      </tfoot>";
           echo"<tbody>";
				$resultado_rpt=$conexpg->query($sqlgen); 
if($resultado_rpt->num_rows>0){ 
while($filas=$resultado_rpt->fetch_array()){ 

	
	
			$annio = $filas['anio'];
	  $fecha = $filas['FNUM'];
	   $adua = $filas['aduana'];
		$numdua = $filas['NDCL'];
	    $numdoc = $filas['NDOC'];
		 $nomempresa = $filas['DNOMBRE'];
		 $direempresa = $filas['DDIRPRO'];
		 //$ubigeoempresa = $filas['ubigeo2'];
	$ubigeoempresa = $filas['nombredepartamento'].' - '.$filas['nombreprov'].' - '.$filas['nombredistrito'];
		 $num_partida = $filas['PART_NANDI'];
		 $descri_produ = $filas['dcom'];
		 $pais_des = $filas['paisdestino'];
		 $puerto_descri = $filas['puerto'];
		 $via_transp = $filas['viatransporte'];
		 $uni_transp = $filas['unidadtransporte'];
		 
		 $descri_mat = $filas['DMAT'];
	$cod_agente = $filas['CAGE'];
		 //$nom_agente = $filas['agente'];
		 $nom_aduanero = $filas['recinto_aduanero'];
		 $nom_banco = $filas['banco'];
		 $valor_fob = number_format($filas['VFOBSERDOL'],2); 
		 $valor_net = number_format($filas['VPESNET'],2);
		 $valor_bru = number_format($filas['VPESBRU'],2);
		 $valor_A = number_format($filas['QUNIFIS'],2);
		 $nom_unidad = $filas['undmedida'];
		 $valor_B = number_format($filas['QUNICOM'],2);
		 $unid_comer = $filas['TUNIFIS'];
		 $peso_unit = number_format($filas['pesounitkg'],2);
		 $precio_unitmed = number_format($filas['preciounitxundmedida'],2);
		 $precio_unitcomerc = number_format($filas['preciounitxunidcomercial'],2);
		 $peso_envemb = number_format($filas['pesoenvaseyembalaje'],2);
		 //$nom_sector = $filas['sector'];
	  date_default_timezone_set("America/Lima");
		 $fechaformate = date('d/m/Y',strtotime($fecha));
	//consultanos sector
	$sqlsecto = "SELECT partida, sector FROM sector where partida ='$num_partida' ";
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
	$nom_agente = $rwage['agencia'];
}
}else{
	$nom_agente = "---";
}
  
   echo '<tr>';
   //echo '<td>'.$annio.'</td>';
   echo '<td>&nbsp;</td>';
   echo '<td>'.$fechaformate.'</td>';
   echo '<td>'.$adua.'</td>';
			 if($axe == "SI"){
   echo '<td>'.$numdua.'</td>';
			 }
   echo '<td>'.$numdoc.'</td>';
   echo '<td>'.$nomempresa.'</td>';
   echo '<td>'.$direempresa.'</td>';
   echo '<td>'.$ubigeoempresa.'</td>';
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
   echo '</tr>';
		  
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

   //}//fin si hay resultados
				?>
           
            </div>
            </div>
        </div>
        </div>
        </div>
        </div>
    <!--<footer class="footer ">
    <div class="container">
        <nav class="pull-left">
             <ul>
                <li>
                    <a href="#">
                        Azatrade Business Intelligence
                    </a>
                </li>
            </ul>
        </nav>
        <div class="copyright pull-right">
            &copy; <script>document.write(new Date().getFullYear())</script> | Desarrollado por <a href="https://www.azasof.com" target="_blank"><font color="#2C1BC1">Azasof</font></a>.
        </div>
    </div>
</footer>-->
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
//cerrando conexion
	mysqli_close($conexpg);
?>
</html>