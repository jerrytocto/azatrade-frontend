<?php
session_start();
if (isset($_SESSION['login_usuario'])){
}else{
	if(!isset($_SESSION["login_usuario"]) || $_SESSION["login_usuario"]==null){
		//print "<script>alert('Acceso invalido! - Inicia Sesion para ver los resumenes');window.location='../../';</script>";
}
}
set_time_limit(750);
include("../../incBD/inibd.php");

//si es un usuario basico y no tiene acceso
if($_SESSION['rol']=="BASICO"){
if($_SESSION['acceso_pago']=="No"){
	//print "<script>alert('Acceso invalido! - Para ver los resumenes adquiere uno de nuestros planes Premiun');window.location='../../planes/';</script>";
}
	}

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
<link href="../css/demo.css" rel="stylesheet"/>
       <script>
      window.onload = detectarCarga;
      function detectarCarga(){
         document.getElementById("carga").style.display="none";
      }
    </script>
<script src="include/buscador.js" type="text/javascript" language="javascript"></script>
       <style>
	table.registros{
		border:0;
		width:100%;
	}
table.registros td{
		border:0;
	}	
table.registros tr.titulos{
		background:#d0d0d0;
		text-align:center;
		text-transform:uppercase;
	}
table.registros tr.row0{
		background:#e0e0e0;
	}
table.registros tr.row1{
		background:#f7f7f7;
	</style>
      
      
       <style>
.pagination {
  display: inline-block;
}

.pagination a {
  color: black;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
  border: 1px solid #ddd;
}

.pagination a.active {
  background-color: #4CAF50;
  color: white;
  border: 1px solid #4CAF50;
}

.pagination a:hover:not(.active) {background-color: #ddd;}

.pagination a:first-child {
  border-top-left-radius: 5px;
  border-bottom-left-radius: 5px;
}

.pagination a:last-child {
  border-top-right-radius: 5px;
  border-bottom-right-radius: 5px;
}
	</style>
        </head>
<body>
<?php
	//paginador
require('include/funciones.php');
require('include/pagination.class.php');
$items = 50;
$page = 1;

if(isset($_GET['page']) and is_numeric($_GET['page']) and $page = $_GET['page'])
		$limit = " LIMIT ".(($page-1)*$items).",$items";
	else
		$limit = " LIMIT $items";

if(isset($_GET['q']) and !eregi('^ *$',$_GET['q'])){
		$q = sql_quote($_GET['q']); //para ejecutar consulta
	    $c = sql_quote($_GET[$nombres2]); //para ejecutar consulta
		//$busqueda = htmlentities($q); //para mostrar en pantalla
	    $busqueda = $q; //para mostrar en pantalla

		//$sqlStr = "SELECT * FROM resumen_partidas WHERE concat(codigo,descripcion) LIKE '%$q%' AND varia_filtro = '$nombres2' AND codigo <> 'Total'";
		//$sqlStrAux = "SELECT count(*) as total FROM resumen_partidas WHERE concat(codigo,descripcion) LIKE '%$q%' AND varia_filtro = '$nombres2' AND codigo <> 'Total'";
	
	$sqlStr = "SELECT
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
and CONCAT(e.DCOM,' ',e.DMER2,' ',e.DMER3,' ',e.DMER4,' ',e.DMER5) like '%$q%'
	and e.cpaides like '$pais'
	and e.cpuedes like '$value'
	and e.cunitra like '$unitransp'
	and e.cviatra like '$vtransp'
	and e.cage like '$value2'
	and e.tunifis like '$unidmed'
	and e.tunicom like '$unidmedcomer'";
	
	$sqlStrAux = "SELECT
count (*) as total 
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
and CONCAT(e.DCOM,' ',e.DMER2,' ',e.DMER3,' ',e.DMER4,' ',e.DMER5) like '%$q%'
	and e.cpaides like '$pais'
	and e.cpuedes like '$value'
	and e.cunitra like '$unitransp'
	and e.cviatra like '$vtransp'
	and e.cage like '$value2'
	and e.tunifis like '$unidmed'
	and e.tunicom like '$unidmedcomer'";
	
	}else{
		//$sqlStr = "SELECT * FROM resumen_partidas WHERE varia_filtro = '$nombres2' AND codigo <> 'Total' ";
		//$sqlStrAux = "SELECT count(*) as total FROM resumen_partidas WHERE varia_filtro = '$nombres2' AND codigo <> 'Total' ";
	
	$sqlStr = "SELECT
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
	and e.tunicom like '$unidmedcomer'";
	
	$sqlStrAux = "SELECT count(*) as total FROM
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
	and e.tunicom like '$unidmedcomer'";
	
	}

$aux = Mysqli_Fetch_Assoc(mysqli_query($conexpg,$sqlStrAux));
$query = mysqli_query($conexpg,$sqlStr.$limit);
	?>
	
	<div id="carga" style="width:100%;text-align: center;">
<Center><img class="img-responsive" src="../../img/loading-carga.gif" width="100px"><br><p style="font-size:12px; color:#EC0D36;"> Espere un momento, la consulta puede tardar unos minutos. </p></Center>
     </div>
</body>
        <body class="off-canvas-sidebar register-page" style="background-image: url('../../img/plan.jpg'); background-size: cover; background-position: top center;">

    <div class="wrapper wrapper-full-page">
            <div class='col-md-12'>
            
            <?php
				echo"<div class='card'>";
	echo"<div class='card-header card-header-info card-header-icon'>
              <div class='card-icon'>
                <i class='material-icons'>assignment</i>
              </div>
               <h4 class='card-title'><b>Consulta Avanzada desde una Partida de Bolsa (Detalle) - Exportaciones </b><br> Producto: $destodo │ Departamento: $nonloca │ Partida #: $partida1 │ Fecha Numeración │ Periodo $year │  </b> </h4>
            </div>";
		echo"<div class='card-body'>";
		echo"<div class='toolbar'>";
        echo"</div>";
         echo"<div class='material-datatables'>";
				?>
				
				<div class='row'>
				<div class="col-md-6">
				 <a href="descarga_excel.php?anio=<?=$year;?>&partida=<?=$partida1;?>&descri1=<?=$descri1;?>&ubi=<?=$ubige;?>&local=<?=$nonloca;?>" target="_blank"><button class="btn btn-round btn-info">Descargar Excel</button></a>
				</div>
<div class="col-md-6" align="right">
           <!--<form action="index.php" onsubmit="return buscar()">
      <label>Buscar</label>
      <input type="text" id="q" name="q" value="<?php if(isset($q)) echo $busqueda;?>" onKeyUp="return buscar()">
      <input type="hidden" id="c" name="condiciona" value="<?=$nombres2;?>">
      <input type="submit" value="Buscar" id="boton">
    </form>-->
				</div>
         </div>
          
          <center><span id="loading"></span></center>
           
          <div id="resultados">
	<p><?php
		if($aux['total'] and isset($busqueda)){
				echo "<b>{$aux['total']}</b> Resultado".($aux['total']>1?'s':'')." que coinciden con tu b&uacute;squeda \"<strong>$busqueda</strong>\".";
			}elseif($aux['total'] and !isset($q)){
				echo "Total de registros: <b> {$aux['total']} </b> │ <b>$items</b> registros por pagina";
			}elseif(!$aux['total'] and isset($q)){
				echo"No hay registros que coincidan con tu b&uacute;squeda \"<strong>$busqueda</strong>\"";
			}
	?></p>

	<?php 
		if($aux['total']>0){
			$p = new pagination;
			$p->Items($aux['total']);
			$p->limit($items);
			if(isset($q))
					//$p->target("index.php?q=".urlencode($q));
			        //$p->target("index.php?condiciona=$nombres2&q=".urlencode($q));
			$p->target("./?anio=$year&partida=$partida1&descri1=$descri1&ubi=$ubige&local=$nonloca&q=".urlencode($q));
				else
					//$p->target("index.php");
			        //$p->target("index.php?condiciona=$nombres2");
			$p->target("./?anio=$year&partida=$partida1&descri1=$descri1&ubi=$ubige&local=$nonloca");
			$p->currentPage($page);
			$p->show();
			//echo "\t<table class=\"registros\">\n";
			//echo "<tr class=\"titulos\"><td>Titulo</td></tr>\n";
			
			
			
			echo"<div class='table-responsive'>";
			echo "<table id='datatablese' class='table table-striped table-no-bordered table-hover registros'>";
			echo"<thead>";
			echo "<tr class='titulos'>
			                   <!--<th>A&ntilde;o</th>-->
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
			</tr>";
			echo"<thead>";
			echo"<tbody>";
			$r=0;
			while($row = mysqli_fetch_assoc($query)){
				$pasa = $pasa + 1;
				
				$annio = $row['anio'];
	  $fecha = $row['FNUM'];
	   $adua = $row['aduana'];
		$numdua = $row['NDCL'];
	    $numdoc = $row['NDOC'];
		 $nomempresa = $row['DNOMBRE'];
		 $direempresa = $row['DDIRPRO'];
		 //$ubigeoempresa = row['ubigeo2'];
	$ubigeoempresa = $row['nombredepartamento'].' - '.$row['nombreprov'].' - '.$row['nombredistrito'];
		 $num_partida = $row['PART_NANDI'];
		 $descri_produ = $row['dcom'];
		 $pais_des = $row['paisdestino'];
		 $puerto_descri = $row['puerto'];
		 $via_transp = $row['viatransporte'];
		 $uni_transp = $row['unidadtransporte'];
		 
		 $descri_mat = $row['DMAT'];
	$cod_agente = $row['CAGE'];
		 //$nom_agente = row['agente'];
		 $nom_aduanero = $row['recinto_aduanero'];
		 $nom_banco = $row['banco'];
		 $valor_fob = number_format($row['VFOBSERDOL'],2); 
		 $valor_net = number_format($row['VPESNET'],2);
		 $valor_bru = number_format($row['VPESBRU'],2);
		 $valor_A = number_format($row['QUNIFIS'],2);
		 $nom_unidad = $row['undmedida'];
		 $valor_B = number_format($row['QUNICOM'],2);
		 $unid_comer = $row['TUNIFIS'];
		 $peso_unit = number_format($row['pesounitkg'],2);
		 $precio_unitmed = number_format($row['preciounitxundmedida'],2);
		 $precio_unitcomerc = number_format($row['preciounitxunidcomercial'],2);
		 $peso_envemb = number_format($row['pesoenvaseyembalaje'],2);
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
				
				echo "<tr class='row$r'>";
				
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
				
				echo"</tr>";
          if($r%2==0)++$r;else--$r;
        }
			echo"</tbody>";
			echo "</table>";
			echo "</div>";
			$p->show();
		}
	?>
    </div>
    
    <?php
				echo "</div>";
			echo "</div>";
			echo "</div>";
				?>

<?php include("../../footer_pie.php"); ?>
          <!-- fin grafico -->
           
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
<!--<script src="../../js/core/popper.min.js"></script>-->

<script src="../../js/bootstrap-material-design.min.js"></script>

<script src="../../js/plugins/perfect-scrollbar.jquery.min.js"></script>

<!--	Plugin for Tags, full documentation here: https://xoxco.com/projects/code/tagsinput/  -->
<script src="../../js/plugins/bootstrap-tagsinput.js"></script>

<!-- Plugins for presentation and navigation  -->
<script src="../../assets-for-demo/js/modernizr.js"></script>

<!-- Material Kit Core initialisations of plugins and Bootstrap Material Design Library -->
<script src="../../js/material-dashboard.js?v=2.0.1"></script>

<script type="text/javascript" src="jquery.tablesorter.js"></script> 

<!-- demo init -->
<script src="../../js/plugins/demo.js"></script>
  
  <script type="text/javascript">
  $(document).ready(function() 
    { 
        $("#datatablese").tablesorter(); 
    } 
);
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

</html>