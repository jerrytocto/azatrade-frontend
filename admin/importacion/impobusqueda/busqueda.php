<?php
include("../../incBD/inibd.php");
require('include/funciones.php');
require('include/pagination.class.php');

/*if($nombres2==""){
	$nombres2 = $_GET['condiciona'];
}else{
	$nombres2 = $_POST['condiciona'];
}*/

$q = $_GET['q'];

$items = 10;
$page = 1;

if(isset($_GET['page']) and is_numeric($_GET['page']) and $page = $_GET['page'])
		$limit = " LIMIT ".(($page-1)*$items).",$items";
	else
		$limit = " LIMIT $items";

if(isset($_GET['q']) and !eregi('^ *$',$_GET['q'])){
		$q = sql_quote($_GET['q']); //para ejecutar consulta
		//$busqueda = htmlentities($q); //para mostrar en pantalla
	    $busqueda = $q; //para mostrar en pantalla

		$sqlStr = "SELECT dnombre,part_nandi,desc_comer,desc_matco,desc_usoap,desc_fopre,desc_otros,pais_orige,puer_embar,fob_dolpol,fle_dolar,seg_dolar,fech_ingsi FROM importacion WHERE concat(desc_comer,desc_matco,desc_usoap,desc_fopre,desc_otros) LIKE '%celular%' AND year(fech_ingsi) = '2021' ORDER BY fob_dolpol DESC ";
		$sqlStrAux = "SELECT count(*) as total FROM importacion WHERE concat(desc_comer,desc_matco,desc_usoap,desc_fopre,desc_otros) LIKE '%celular%' AND year(fech_ingsi) = '2021' ";
	}else{
		$sqlStr = "SELECT dnombre,part_nandi,desc_comer,desc_matco,desc_usoap,desc_fopre,desc_otros,pais_orige,puer_embar,fob_dolpol,fle_dolar,seg_dolar,fech_ingsi FROM importacion WHERE concat(desc_comer,desc_matco,desc_usoap,desc_fopre,desc_otros) LIKE '%celular%' AND year(fech_ingsi) = '2021' ORDER BY fob_dolpol DESC ";
		$sqlStrAux = "SELECT count(*) as total FROM importacion WHERE concat(desc_comer,desc_matco,desc_usoap,desc_fopre,desc_otros) LIKE '%celular%' AND year(fech_ingsi) = '2021' ";
	}

$aux = Mysqli_Fetch_Assoc(mysqli_query($conexpg,$sqlStrAux));
$query = mysqli_query($conexpg,$sqlStr.$limit);
?>	<p><?php
		if($aux['total'] and isset($busqueda)){
				echo "<b>{$aux['total']} </b> Resultado".($aux['total']>1?'s':'')." que coinciden con tu b&uacute;squeda \"<strong>$busqueda</strong>\".";
			}elseif($aux['total'] and !isset($q)){
				echo "Total de registros: <b> {$aux['total']} </b>";
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
			        $p->target("index.php?condiciona=$nombres2&q=".urlencode($q));
				else
					//$p->target("index.php");
					$p->target("index.php?condiciona=$nombres2");
			$p->currentPage($page);
			$p->show();
			//echo "\t<table class=\"registros\">\n";
			//echo "<tr class=\"titulos\"><td>Titulo</td></tr>\n";
			echo "<table id='datatablese' class='table table-striped table-no-bordered table-hover registros'>";
			echo"<thead>";
			echo "<tr class='titulos'>
			<th><b> Detalle </b></th>
			                  <!--<th><b> Empresa </b></th>
							  <th><b>Partida</b></th>
							  <th><b>Descripcion</b></th>
                              <th><b>Destino</b></th>
                              <th><b>Puerto</b></th>
                              <th><b>Fob</b></th>
                              <th><b>Flete</b></th>
							  <th><b>Seguro</b></th>
							  <th><b>Fecha</b></th>-->
			</tr>";
			echo"</thead>";
			echo"<tbody>";
			$r=0;
			while($row = mysqli_fetch_assoc($query)){
          //echo "\t\t<tr class=\"row$r\"><td><a href=\"http://www.mis-algoritmos.com/?p={$row['id']}\" target=\"_blank\">".htmlentities($row['pregunta'])."</a></td></tr>\n";
				$pasa = $pasa + 1;
				$dateza1= $row['dnombre'];
				$dateza2 = $row['part_nandi'];
				$dateza3 = $row['desc_comer'];
				$dateza4 = $row['desc_matco'];
				$dateza5 = $row['desc_usoap'];
				$dateza6 = $row['desc_fopre'];
				$dateza7 = $row['desc_otros'];
				$dateza8 = $row['pais_orige'];
				$dateza9 = $row['puer_embar'];
				$dateza10 = number_format($row['fob_dolpol'],2);
				$dateza11 = number_format($row['fle_dolar'],2);
				$dateza12 = number_format($row['seg_dolar'],2);
				$dateza13 = $row['fech_ingsi'];
				
				echo "<tr class='row$r'>";
				echo"<td>
				<div class='row'>
				<div class='col-lg-8'>
				<b>Empresa</b>: $dateza1
				</div>
				<div class='col-lg-4'>
				<b>Partida</b>: $dateza2
				</div>
				<div class='col-lg-12'>
				<b>Descripcion</b>: $dateza4 $dateza5 $dateza6 $dateza7
				</div>
				<div class='col-lg-4'>
				<b>Destino</b>: $dateza8
				</div>
				<div class='col-lg-4'>
				<b>Puerto</b>: $dateza9
				</div>
				<div class='col-lg-4'>
				<b>Fecha</b>: $dateza13
				</div>
				<div class='col-lg-4'>
				<b>Fob</b>: $dateza10
				</div>
				<div class='col-lg-4'>
				<b>Flete</b>: $dateza11
				</div>
				<div class='col-lg-4'>
				<b>Seguro</b>: $dateza12
				</div>
				</div>
				</td>";
				echo"</tr>";
				
				/*echo "<tr class='row$r'>
				
				<td>".$row['dnombre']."</td>
				<td>".$row['part_nandi']."</td>
				<td>".$row['desc_comer']." ".$row['desc_matco']." ".$row['desc_usoap']." ".$row['desc_fopre']." ".$row['desc_otros']."</td>
				<td>".$row['pais_orige']."</td>
				<td>".$row['puer_embar']."</td>
				<td>".number_format($row['fob_dolpol'],2)."</td>
				<td>".number_format($row['fle_dolar'],2)."</td>
				<td>".number_format($row['seg_dolar'],2)."</td>
				<td>".$row['fech_ingsi']."</td>
				</tr>";*/
				
          if($r%2==0)++$r;else--$r;
        }
			echo"</tbody>";
			echo "</table>";
			$p->show();
		}
	?>