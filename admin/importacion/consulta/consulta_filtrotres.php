<?php
set_time_limit(750);
ini_set("memory_limit", "150M");
?>
                          <div class="table-responsive">
                           <div class='material-datatables'>
                            <table id='datatablesetres' class="table table-striped table-bordered table-sm">
                             <thead>
                             	<tr>
                             		<th>Nª</th>
   <th>C&Oacute;DIGO</th>
   <th>ADUANA</th>
   <th>ANO&nbsp;DUI</th>
   <th>N&Uacute;MERO&nbsp;DUI</th>
   <th>FECHA&nbsp;NUM.&nbsp;DUI</th>
   <th>TIPO&nbsp;DOCU.&nbsp;M.</th>
   <th>RUC</th>
   <th>RAZON&nbsp;SOCIAL&nbsp;IMPORTADOR</th>
   <th>C&Oacute;DIGO</th>
   <th>AGENTE&nbsp;ADUANA</th>
   <th>FECHA&nbsp;LLEGADA DE&nbsp;NAVE</th>
   <th>C&Oacute;DIGO V&Iacute;A&Oacute;TRANSP.</th>
   <th>V&Iacute;A&nbsp;DE&nbsp;TRANSP.</th>
   <th>C&Oacute;DIGO&nbsp;EMPRESA DE&nbsp;TRANSPORTE</th>
   <th>C&Oacute;DIGO&nbsp;ALMAC&Eacute;N</th>
   <th>ADUANA&nbsp;MANIFIESTO</th>
   <th>AÑO&nbsp;MANIFIESTO</th>
   <th>N&Uacute;MERO.&nbsp;MANIFIESTO</th>
   <th>FECHA&nbsp;RECEPCI&Oacute;N DE&nbsp;DUI</th>
   <th>FECHA&nbsp;CANCELACI&Oacute;N</th>
   <th>TIPO&nbsp;CANCELACI&Oacute;N</th>
   <th>C&Oacute;DIGO&nbsp;BANCO CANCELACI&Oacute;N</th>
   <th>C&Oacute;DIGO&nbsp;ENTIDAD FINANCIERA</th>
   <th>INDICADOR&nbsp;TELEDESPACHO</th>
   <th>C&Oacute;DIGO&nbsp;PA&Iacute;S ORIGEN</th>
   <th>PA&Iacute;S&nbsp;ORIGEN</th>
   <th>C&Oacute;DIGO&nbsp;PAIS&nbsp;ADQ</th>
   <th>PA&Iacute;S&nbsp;ADQUISICI&Oacute;N</th>
   <th>C&Oacute;DIGO&nbsp;PUERTO</th>
   <th>PUERTO&nbsp;EMBARQUE</th>
   <th>N&Uacute;MERO&nbsp;SERIE</th>
   <th>PARTIDA</th>
   <!--<th>Descripcion&nbsp;Comercial</th>-->
   <th>DESCRIPCI&Oacute;N&nbsp;COMERCIAL</th>
   <th>MATERIAL&nbsp;DE ELABORACI&Oacute;N</th>
   <th>USO</th>
   <th>PRESENTACI&Oacute;N</th>
   <th>DESCRIPCI&Oacute;N&nbsp;OTROS</th>
   <th>VALOR&nbsp;FOB USD</th>
   <th>VALOR&nbsp;FLETE USD</th>
   <th>VALOR&nbsp;SEGURO USD</th>
   <th>PESO&nbsp;NETO KG</th>
   <th>Peso&nbsp;BRUTO KG</th>
   <th>CANTIDAD IMPORTADA</th>
   <th>UNIDAD DE&nbsp;MEDIDA</th>
   <th>CANTIDAD COMERCIAL</th>
   <th>UNIDAD COMERCIAL</th>
   <th>ESTADO&nbsp;MERCADER&Iacute;A</th>
   <th>ADV&nbsp;USD</th>
   <th>IGV&nbsp;USD</th>
   <th>ISC&nbsp;USD</th>
   <th>IPM&nbsp;USD</th>
   <th>DERECHO&nbsp;ESPEC&Iacute;FICO USD</th>
   <th>IMPUESTO&nbsp;ADICIONAL USD</th>
   <th>SOBRETASA&nbsp;USD</th>
   <th>DERECHO&nbsp;ANTIDUMPING USD</th>
   <th>COMMODITIES</th>
   <th>FECHA&nbsp;MODIFICACI&Oacute;N DUI</th>
   <th>CANTIDAD&nbsp;DE BULTOS</th>
   <th>CLASE&nbsp;DE BULTOS</th>
   <th>TRATO&nbsp;PREFERENCIAL</th>
   <th>TIPO&nbsp;TRATAMIENTO</th>
   <th>C&Oacute;DIGO&nbsp;LIBERTORIO</th>
   <th>INDICADOR&nbsp;DE RELIQUIDACI&Oacute;N</th>
                             	</tr>
                             	</thead>
   <tfoot>
                          <tr>
   <th>Nª</th>
   <th>C&Oacute;DIGO</th>
   <th>ADUANA</th>
   <th>ANO&nbsp;DUI</th>
   <th>N&Uacute;MERO&nbsp;DUI</th>
   <th>FECHA&nbsp;NUM.&nbsp;DUI</th>
   <th>TIPO&nbsp;DOCU.&nbsp;M.</th>
   <th>RUC</th>
   <th>RAZON&nbsp;SOCIAL&nbsp;IMPORTADOR</th>
   <th>C&Oacute;DIGO</th>
   <th>AGENTE&nbsp;ADUANA</th>
   <th>FECHA&nbsp;LLEGADA DE&nbsp;NAVE</th>
   <th>C&Oacute;DIGO V&Iacute;A&Oacute;TRANSP.</th>
   <th>V&Iacute;A&nbsp;DE&nbsp;TRANSP.</th>
   <th>C&Oacute;DIGO&nbsp;EMPRESA DE&nbsp;TRANSPORTE</th>
   <th>C&Oacute;DIGO&nbsp;ALMAC&Eacute;N</th>
   <th>ADUANA&nbsp;MANIFIESTO</th>
   <th>AÑO&nbsp;MANIFIESTO</th>
   <th>N&Uacute;MERO.&nbsp;MANIFIESTO</th>
   <th>FECHA&nbsp;RECEPCI&Oacute;N DE&nbsp;DUI</th>
   <th>FECHA&nbsp;CANCELACI&Oacute;N</th>
   <th>TIPO&nbsp;CANCELACI&Oacute;N</th>
   <th>C&Oacute;DIGO&nbsp;BANCO CANCELACI&Oacute;N</th>
   <th>C&Oacute;DIGO&nbsp;ENTIDAD FINANCIERA</th>
   <th>INDICADOR&nbsp;TELEDESPACHO</th>
   <th>C&Oacute;DIGO&nbsp;PA&Iacute;S ORIGEN</th>
   <th>PA&Iacute;S&nbsp;ORIGEN</th>
   <th>C&Oacute;DIGO&nbsp;PAIS&nbsp;ADQ</th>
   <th>PA&Iacute;S&nbsp;ADQUISICI&Oacute;N</th>
   <th>C&Oacute;DIGO&nbsp;PUERTO</th>
   <th>PUERTO&nbsp;EMBARQUE</th>
   <th>N&Uacute;MERO&nbsp;SERIE</th>
   <th>PARTIDA</th>
   <!--<th>Descripcion&nbsp;Comercial</th>-->
   <th>DESCRIPCI&Oacute;N&nbsp;COMERCIAL</th>
   <th>MATERIAL&nbsp;DE ELABORACI&Oacute;N</th>
   <th>USO</th>
   <th>PRESENTACI&Oacute;N</th>
   <th>DESCRIPCI&Oacute;N&nbsp;OTROS</th>
   <th>VALOR&nbsp;FOB USD</th>
   <th>VALOR&nbsp;FLETE USD</th>
   <th>VALOR&nbsp;SEGURO USD</th>
   <th>PESO&nbsp;NETO KG</th>
   <th>Peso&nbsp;BRUTO KG</th>
   <th>CANTIDAD IMPORTADA</th>
   <th>UNIDAD DE&nbsp;MEDIDA</th>
   <th>CANTIDAD COMERCIAL</th>
   <th>UNIDAD COMERCIAL</th>
   <th>ESTADO&nbsp;MERCADER&Iacute;A</th>
   <th>ADV&nbsp;USD</th>
   <th>IGV&nbsp;USD</th>
   <th>ISC&nbsp;USD</th>
   <th>IPM&nbsp;USD</th>
   <th>DERECHO&nbsp;ESPEC&Iacute;FICO USD</th>
   <th>IMPUESTO&nbsp;ADICIONAL USD</th>
   <th>SOBRETASA&nbsp;USD</th>
   <th>DERECHO&nbsp;ANTIDUMPING USD</th>
   <th>COMMODITIES</th>
   <th>FECHA&nbsp;MODIFICACI&Oacute;N DUI</th>
   <th>CANTIDAD&nbsp;DE BULTOS</th>
   <th>CLASE&nbsp;DE BULTOS</th>
   <th>TRATO&nbsp;PREFERENCIAL</th>
   <th>TIPO&nbsp;TRATAMIENTO</th>
   <th>C&Oacute;DIGO&nbsp;LIBERTORIO</th>
   <th>INDICADOR&nbsp;DE RELIQUIDACI&Oacute;N</th>
                          </tr>
                      </tfoot>
                             	<tbody>
                             	<?php
									
	$id = trim($_GET["codigo"]);
	$dat2 = trim($_GET["mes"]);
	$dat3 = trim($_GET["pais"]);
	$dat4 = trim($_GET["adua"]);
	$dat5 = trim($_GET["ruc"]);
	$dat6 = trim($_GET["desc"]);
	$dat7 = trim($_GET["partida"]);
	$dat8 = trim($_GET["nomparti"]);
	$dat9 = trim($_GET["paistres"]);
	$dat10 = trim($_GET["aduatres"]);
	$da11 = trim($_GET["mestres"]);
									
	include("../../incBD/inibd.php");
	$sqlespact="SELECT i.*
FROM importacion AS i
WHERE
YEAR(i.fech_ingsi) = '$id' AND
MONTH(i.fech_ingsi) = '$da11' AND
i.part_nandi = '$dat7' AND
i.pais_adqui = '$dat9' AND
i.codi_aduan = '$dat10' AND
CONCAT(i.desc_comer,' ',i.desc_matco,' ',i.desc_usoap,' ',i.desc_fopre,' ',i.desc_otros,' ',i.part_nandi) LIKE '%$dat6%'";
	$resultado_creg=$conexpg->query($sqlespact); 
if($resultado_creg->num_rows>0){ 
while($fila_creg=$resultado_creg->fetch_array()){
	  $iteespact = $iteespact + 1;
	  $impor1 = $fila_creg['codi_aduan'];
		   $impor2 = $fila_creg['descripcion'];
	       $impor3 = $fila_creg['ano_prese'];
	       $impor4 = $fila_creg['nume_corre'];
	       $impor5 = $fila_creg['fech_ingsi'];
		   $impor6 = $fila_creg['tipo_docum'];
		   $impor7 = $fila_creg['libr_tribu'];
		   $impor8 = $fila_creg['dnombre'];
		   $impor9 = $fila_creg['codi_agent']; //consutar el codigo en la tabla agente
		   $impor10 = $fila_creg['fech_llega'];
		   $impor11 = $fila_creg['via_transp'];
		   $impor12 = $fila_creg['viatransp'];
		   $impor13 = $fila_creg['empr_trans'];
		   $impor14 = $fila_creg['codi_alma'];
		   $impor15 = $fila_creg['cadu_manif'];
		   $impor16 = $fila_creg['fech_manif'];
		   $impor17 = $fila_creg['nume_manif'];
	       $impor18 = $fila_creg['fech_recep'];
		   $impor19 = $fila_creg['fech_cance'];
		   $impor20 = $fila_creg['tipo_cance'];
		 /*$valor_fob = number_format($fila_creg['VFOBSERDOL'],2); 
		 $valor_net = number_format($fila_creg['VPESNET'],2);
		 $valor_bru = number_format($fila_creg['VPESBRU'],2);
		 $valor_A = number_format($fila_creg['QUNIFIS'],2);*/
		  $impor21 = $fila_creg['banc_cance'];
		  $impor22 = $fila_creg['codi_enfin'];
		  $impor23 = $fila_creg['dk'];
		  $impor24 = $fila_creg['pais_orige'];
		  $impor25 = $fila_creg['pais1'];
	      $impor26 = $fila_creg['pais_adqui'];
		  $impor27 = $fila_creg['pais2'];
		  $impor28 = $fila_creg['puer_embar'];
		  $impor29 = $fila_creg['puerto'];
		  $impor30 = $fila_creg['nume_serie'];
			 $impor31 = $fila_creg['part_nandi'];
	if(strlen($impor31)=='9'){
		$tpartd = '0'.$impor31;
	}else{
		$tpartd = $impor31;
	}
			 $impor32 = $fila_creg['desc_comer'];
			 $impor33 = $fila_creg['desc_matco'];
			 $impor34 = $fila_creg['desc_usoap'];
			 $impor35 = $fila_creg['desc_fopre'];
			 $impor36 = $fila_creg['desc_otros'];
			 $impor37 = number_format($fila_creg['fob_dolpol'],2);
			 $impor38 = number_format($fila_creg['fle_dolar'],2);
			 $impor39 = number_format($fila_creg['seg_dolar'],2);
			 $impor40 = number_format($fila_creg['peso_neto'],2);
			 $impor41 = number_format($fila_creg['peso_bruto'],2);
			 $impor42 = number_format($fila_creg['unid_fiqty'],2);
			 $impor43 = $fila_creg['unid_fides'];
			 $impor44 = number_format($fila_creg['qunicom'],2);//CANTIDAD DE UNIDAD COMERCIAL
			 $impor45 = $fila_creg['tunicom'];
			 $impor46 = $fila_creg['sest_merca'];
			 $impor47 = number_format($fila_creg['adv_dolar'],2);
			 $impor48 = number_format($fila_creg['igv_dolar'],2);
			 $impor49 = number_format($fila_creg['isc_dolar'],2);
			 $impor50 = number_format($fila_creg['ipm_dolar'],2);
			 $impor51 = number_format($fila_creg['des_dolar'],2);
			 $impor52 = number_format($fila_creg['ipa_dolar'],2);
			 $impor53 = number_format($fila_creg['sad_dolar'],2);
			 $impor54 = number_format($fila_creg['der_adum'],2);
			 $impor55 = number_format($fila_creg['comm'],2);
			 $impor56 = $fila_creg['fmod'];
			 $impor57 = number_format($fila_creg['cant_bulto'],2);
			 $impor58 = $fila_creg['clase'];
			 $impor59 = $fila_creg['trat_prefe'];
			 $impor60 = $fila_creg['tipo_trat'];
			 $impor61 = $fila_creg['codi_liber'];
			 $impor62 = $fila_creg['impr_reliq'];
	
	
	//consultanos agente
	$sqlage = "select aa.agencia from agente aa where aa.idagente = '$impor9' limit 1";
	$rsage=$conexpg->query($sqlage); 
if($rsage->num_rows>0){ 
while($rwage=$rsage->fetch_array()){ 
	$nom_agente = $rwage['agencia'];
}
}else{
	$nom_agente = "---";
}
	
	  echo"<tr>";
	  echo"<td>$iteespact</td>";
	  echo '<td>'.$impor1.'</td>';
   echo '<td>'.$impor2.'</td>';
   echo '<td>'.$impor3.'</td>';
   echo '<td>'.$impor4.'</td>';
   echo '<td>'.$impor5.'</td>';
   echo '<td>'.$impor6.'</td>';
   echo '<td>'.$impor7.'</td>';
   echo '<td>'.$impor8.'</td>';
   echo '<td>'.$impor9.'</td>';
   echo '<td>'.$nom_agente.'</td>';
   echo '<td>'.$impor10.'</td>';
   echo '<td>'.$impor11.'</td>';
   echo '<td>'.$impor12.'</td>';
   echo '<td>'.$impor13.'</td>';
   echo '<td>'.$impor14.'</td>';
   echo '<td>'.$impor15.'</td>';
   echo '<td>'.$impor16.'</td>';
   echo '<td>'.$impor17.'</td>';
   echo '<td>'.$impor18.'</td>';
   echo '<td>'.$impor19.'</td>';
   echo '<td>'.$impor20.'</td>';
   echo '<td>'.$impor21.'</td>';
   echo '<td>'.$impor22.'</td>';
   echo '<td>'.$impor23.'</td>';
   echo '<td>'.$impor24.'</td>';
   echo '<td>'.$impor25.'</td>';
   echo '<td>'.$impor26.'</td>';
   echo '<td>'.$impor27.'</td>';
   echo '<td>'.$impor28.'</td>';
   echo '<td>'.$impor29.'</td>';
   echo '<td>'.$impor30.'</td>';
			 echo '<td>'.$tpartd.'</td>';
			 echo '<td>'.$impor32.'</td>';
			 echo '<td>'.$impor33.'</td>';
			 echo '<td>'.$impor34.'</td>';
			 echo '<td>'.$impor35.'</td>';
			 echo '<td>'.$impor36.'</td>';
			 echo '<td>'.$impor37.'</td>';
			 echo '<td>'.$impor38.'</td>';
			 echo '<td>'.$impor39.'</td>';
			 echo '<td>'.$impor40.'</td>';
			 echo '<td>'.$impor41.'</td>';
			 echo '<td>'.$impor42.'</td>';
			 echo '<td>'.$impor43.'</td>';
			 echo '<td>'.$impor44.'</td>';
			 echo '<td>'.$impor45.'</td>';
			 echo '<td>'.$impor46.'</td>';
			 echo '<td>'.$impor47.'</td>';
			 echo '<td>'.$impor48.'</td>';
			 echo '<td>'.$impor49.'</td>';
			 echo '<td>'.$impor50.'</td>';
			 echo '<td>'.$impor51.'</td>';
			 echo '<td>'.$impor52.'</td>';
			 echo '<td>'.$impor53.'</td>';
			 echo '<td>'.$impor54.'</td>';
			 echo '<td>'.$impor55.'</td>';
			 echo '<td>'.$impor56.'</td>';
			 echo '<td>'.$impor57.'</td>';
			 echo '<td>'.$impor58.'</td>';
			 echo '<td>'.$impor59.'</td>';
			 echo '<td>'.$impor60.'</td>';
			 echo '<td>'.$impor61.'</td>';
			 echo '<td>'.$impor62.'</td>'; 
	  echo"</tr>";
  }
}else{
	echo"<tr>";
	  echo"<td colspan='60'><b>No Hay Datos</b></td>";
	  echo"</tr>";
}
mysqli_close($conexpg);
?>
                             	</tbody>
                             </table>
</div>
   </div>
    
<!--<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>-->
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
    
<script type="text/javascript">
$(document).ready(function() {
    $('#datatablesetres').DataTable({
		"order": [[ 0, "asc" ]],
		dom: 'Bfrtip',
        buttons: [
			'csv', 'excel'
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
			"info":           "Mostrando _START_ a _END_ de _TOTAL_ registros",
			"infoEmpty":      "Mostrando 0 a 0 de 0 registros",
			"infoFiltered":   "(Filtro de _MAX_ total registros)",
			"loadingRecords": "Cargando...",
			"processing":     "Procesando...",
			"zeroRecords":    "No se encontraron coincidencias",
			"paginate": {
				"first":      "Primero",
				"last":       "Ultimo",
				"next":       "Próximo",
				"previous":   "Anterior"
    },
        }

    });
    var table = $('#datatablesetres').DataTable();

    $('.card .material-datatablese label').addClass('form-group');
});

</script>