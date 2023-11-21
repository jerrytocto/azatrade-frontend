<?php
session_start();
ini_set("memory_limit", "150M");
set_time_limit(750);
$id = trim($_GET["codigo"]);
	$dat2 = trim($_GET["mes"]);
	$dat3 = trim($_GET["pais"]);
	$dat4 = trim($_GET["adua"]);
	$dat5 = trim($_GET["ruc"]);
	$dat6 = trim($_GET["desc"]);

$condi = $_SESSION['acceso_pago'];
if($condi=='SI' or $condi=='NO' and $_SESSION['rol']=='ADMIN'){//tiene o no pago y es admin visualiza
	$axe = "SI";
}else if($condi=='NO' and $_SESSION['rol']<>'ADMIN'){//no tiene pago y no es admin limita 5 registros
	$axe = "NO";
}else if($condi=='SI' and $_SESSION['rol']<>'ADMIN'){//si tiene pago y no es admin visualiza todo
	$axe = "SI";
}

if($dat2!=""){ $filmes = " AND MONTH(i.fech_ingsi) like '%$dat2%' "; }else{ $filmes = ""; }
if($dat3!=""){ $filpais = " AND i.pais_orige LIKE '%$dat3%' "; }else{ $filpais =""; }
if($dat4!=""){ $filadu = " AND i.codi_aduan LIKE '%$dat4%' "; }else{ $filadu =""; }
if($dat5!=""){ $filruc = " AND i.libr_tribu LIKE '%$dat5%' "; }else{ $filruc =""; }
if($dat6!=""){ $fildeta = " AND CONCAT(i.desc_comer,' ',i.desc_matco,' ',i.desc_usoap,' ',i.desc_fopre,' ',i.desc_otros,' ',i.part_nandi) LIKE '%$dat6%' "; }else{ $fildeta =""; }
?>
                          <div class="table-responsive" id="divconsuno">
                           <div class='material-datatables'>
                            <table id='datatableseuno' class="table table-striped table-bordered table-sm">
                             <thead>
                             	<tr>
                             		<th>#</th>
                             		<th>PARTIDA</th>
                             		<th>DESCRIPCIÓN</th>
                             		<th>FOB USD</th>
                             		<th>PESO NETO</th>
                             		<th>PRECIO</th>
                             		<th>ACCION</th>
                             	</tr>
                             	<thead>
                             	<tbody>
                             	<?php
	
	include("../../incBD/inibd.php");
	//$sqlespact="SELECT i.part_nandi, '' as descripcion, Sum(i.fob_dolpol) AS fob, Sum(i.peso_neto) AS pneto, Sum(i.fob_dolpol)/Sum(peso_neto) AS precio FROM importacion AS i /*LEFT JOIN arancel AS a ON i.part_nandi = a.idarancel*/ WHERE YEAR(i.fech_ingsi) = '$id' $filmes $filruc $filpais $filadu $fildeta  GROUP BY i.part_nandi ORDER BY fob DESC";
	$sqlespact="SELECT COUNT(i.id) as regitotal, i.part_nandi, '' as descripcion, Sum(i.fob_dolpol) AS fob, Sum(i.peso_neto) AS pneto, Sum(i.fob_dolpol)/Sum(peso_neto) AS precio FROM importacion AS i WHERE YEAR(i.fech_ingsi) = '$id' $filmes $filruc $filpais $filadu $fildeta GROUP BY i.part_nandi ORDER BY fob DESC";
	$resultado_creg=$conexpg->query($sqlespact); 
if($resultado_creg->num_rows>0){ 
while($fila_creg=$resultado_creg->fetch_array()){
	  $iteespact = $iteespact + 1;
	  $id_esac = $fila_creg["part_nandi"];
	if(strlen($id_esac)=='9'){
		$tparti = '0'.$id_esac;
	}else{
		$tparti = $id_esac;
	}
	  $esac1 = $fila_creg["descripcion"];
	  $esac2 = number_format($fila_creg["fob"],2);
	  $esac3 = number_format($fila_creg["pneto"],2);
	  $esac4 = number_format($fila_creg["precio"],2);
	
	$esac5 = $fila_creg["regitotal"];

	//consultanos agente
	$sqlage = "select descripcion from arancel where idarancel = '$tparti' limit 1";
	$rsage=$conexpg->query($sqlage); 
if($rsage->num_rows>0){ 
while($rwage=$rsage->fetch_array()){ 
	$esac1 = $rwage['descripcion'];
}
}else{
	$esac1 = "---";
}
	
	//cuenta cantidad de registros por todo los años
	/*$sqlcuxt="select COUNT(i.id) AS idtol from ((((importacion i left join aduana a on((i.codi_aduan = a.codadu))) left join paises p1 on((i.pais_orige = p1.idpaises))) left join paises p2 on((i.pais_adqui = p2.idpaises))) left join puerto pu on((i.puer_embar = pu.idcodigo))) WHERE i.part_nandi = '$tparti' AND CONCAT(i.desc_comer, i.desc_matco, i.desc_usoap, i.desc_fopre, i.desc_otros, i.part_nandi) LIKE '%$dat6%' LIMIT 300000";
	$rsxcvt=$conexpg->query($sqlcuxt); 
if($rsxcvt->num_rows>0){ 
while($fila_cvfg=$rsxcvt->fetch_array()){
	$txtol = $fila_cvfg['idtol'];
}
}else{
	$txtol = "0";
}*/
	
	  echo"<tr>";
	  echo"<td>$iteespact</td>";
	  //echo"<td><a href='#' data-toggle='modal' data-target='#myModaldetalle$iteespact'>$tparti</a></td>";
	  echo"<td><a href='http://www.azatrade.info/arancel/viewpartida.php?data=$tparti&t=$tparti&d1=' target='_blank'>$tparti</a></td>";
	  echo"<td>$esac1</td>";
	  echo"<td>$esac2</td>";
	  echo"<td>$esac3</td>";
	  echo"<td>$esac4</td>";
	  echo"<td>";
		  
		  ?>
		  <!--<div class="btn-group">-->
		  <div class="dropdown show">
  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Acciones
  </a>
	  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
		  <?php if (isset($_SESSION['login_usuario']) and $axe=='SI' ) { ?>
	  <a href="busqueda-detallada_dos.php?selecanios=<?=$id;?>&selecmes=<?=$dat2;?>&pais=<?=$dat3;?>&aduana=<?=$dat4;?>&ruce=<?=$dat5;?>&descri1=<?=$dat6;?>&partida=<?=$id_esac;?>&nomparti=<?=$esac1;?>" class="dropdown-item text-info" ><i class="material-icons">reorder</i>Listar</a>
	  <a href="descarga_detallado.php?dat1=<?=$id;?>&dat2=<?=$dat6;?>&dat3=<?=$tparti;?>" target="_blank" title="Descargar Año en Consulta" class="dropdown-item text-success"><i class="material-icons">cloud_download</i> Descargar</a>
	  
	  <?php if($esac5<'300000'){ ?>
	  <a href="descarga_detalladotodo.php?dat1=<?=$id;?>&dat2=<?=$dat6;?>&dat3=<?=$tparti;?>" target="_blank" title="Descargar Todo los Años" class="dropdown-item text-primary"><i class="material-icons">cloud_download</i> Descargar Todo los Años</a>
	  <?php }else{ ?>
	  <a href="#" data-toggle='modal' data-target='#myModallimita<?=$iteespact;?>' title="Descargar Todo los Años" class="dropdown-item text-primary"><i class="material-icons">cloud_download</i> Descargar Todo los Años</a>
	  <?php } ?>
	  
		<?php }else if (isset($_SESSION['login_usuario']) and $axe=='NO' ) { ?>
                                            <a href="#" data-toggle='modal' data-target='#myModalPlan' class="dropdown-item text-info"><i class="material-icons">reorder</i>Listar</a>
                                            <a href="#" title="Descargar" data-toggle='modal' data-target='#myModalPlan' class="dropdown-item text-success"><i class="material-icons">cloud_download</i></a>
                                            <?php }else{ ?>
                                            <a href="#" data-toggle='modal' data-target='#myModalA' class="dropdown-item text-info"><i class="material-icons">reorder</i>Listar</a>
                                            <a href="#" title="Descargar" data-toggle='modal' data-target='#myModalA' class="dropdown-item text-success"><i class="material-icons">cloud_download</i></a>
                                            <?php } ?>
                                            </div>
                                            </div>
									<!--</div>-->
	  <?php
	echo"</td>";
	
	echo"<div class='modal fade' id='myModaldetalle$iteespact' role='dialog'>
    <div class='modal-dialog'>
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' class='close' data-dismiss='modal'>&times;</button>
          <h4 class='modal-title'>Seleccione mes a consultar</h4>
        </div>
        <div class='modal-body'>
          <p><b> Año:$id | Partida: $id_esac </b></p>
		  ";
		  
		//consultamos los meses de la partida seleccionada
	/*$sqlmesx = "SELECT MONTH(m.fech_ingsi) AS mes FROM importacion AS m WHERE YEAR(m.fech_ingsi) = '$id' AND m.part_nandi = '$id_esac' AND CONCAT(m.desc_comer, m.desc_matco, m.desc_usoap, m.desc_fopre, m.desc_otros, m.part_nandi) LIKE '%$dat6%' GROUP BY mes ORDER BY mes ASC";
	$rsmesx=$conexpg->query($sqlmesx); 
if($rsmesx->num_rows>0){ 
while($rwmesx=$rsmesx->fetch_array()){ 
	$mesx1 = $rwmesx['mes'];
	if($mesx1=="1"){
		$titumes ="Enero";
	}else if($mesx1=="2"){
		$titumes ="Febrero";
	}else if($mesx1=="3"){
		$titumes ="Marzo";
	}else if($mesx1=="4"){
		$titumes ="Abril";
	}else if($mesx1=="5"){
		$titumes ="Mayo";
	}else if($mesx1=="6"){
		$titumes ="Junio";
	}else if($mesx1=="7"){
		$titumes ="Julio";
	}else if($mesx1=="8"){
		$titumes ="Agosto";
	}else if($mesx1=="9"){
		$titumes ="Septiembre";
	}else if($mesx1=="10"){
		$titumes ="Octubre";
	}else if($mesx1=="11"){
		$titumes ="Noviembre";
	}else{
		$titumes ="Diciembre";
	}
	
	echo"<a href='detalle/?getA=$id&getB=$mesx1&getC=$id_esac&getD=$dat6' class='btn btn-info' target='_blank'>$titumes</a>";
}
}else{
	$mesx1 = "No tiene meses";
	echo"$mesx1";
}*/
	echo"
	<a href='detalle/?getA=$id&getB=1&getC=$id_esac&getD=$dat6' class='btn btn-info' target='_blank'>Enero</a>
	<a href='detalle/?getA=$id&getB=2&getC=$id_esac&getD=$dat6' class='btn btn-info' target='_blank'>Febrero</a>
	<a href='detalle/?getA=$id&getB=3&getC=$id_esac&getD=$dat6' class='btn btn-info' target='_blank'>Marzo</a>
	<a href='detalle/?getA=$id&getB=4&getC=$id_esac&getD=$dat6' class='btn btn-info' target='_blank'>Abril</a>
	<a href='detalle/?getA=$id&getB=5&getC=$id_esac&getD=$dat6' class='btn btn-info' target='_blank'>Mayo</a>
	<a href='detalle/?getA=$id&getB=6&getC=$id_esac&getD=$dat6' class='btn btn-info' target='_blank'>Junio</a>
	<a href='detalle/?getA=$id&getB=7&getC=$id_esac&getD=$dat6' class='btn btn-info' target='_blank'>Julio</a>
	<a href='detalle/?getA=$id&getB=8&getC=$id_esac&getD=$dat6' class='btn btn-info' target='_blank'>Agosto</a>
	<a href='detalle/?getA=$id&getB=9&getC=$id_esac&getD=$dat6' class='btn btn-info' target='_blank'>Septiembre</a>
	<a href='detalle/?getA=$id&getB=10&getC=$id_esac&getD=$dat6' class='btn btn-info' target='_blank'>Octubre</a>
	<a href='detalle/?getA=$id&getB=11&getC=$id_esac&getD=$dat6' class='btn btn-info' target='_blank'>Noviembre</a>
	<a href='detalle/?getA=$id&getB=12&getC=$id_esac&getD=$dat6' class='btn btn-info' target='_blank'>Diciembre</a>
	";
		  
        echo"</div>
        <div class='modal-footer'>
          <button type='button' class='btn btn-danger' data-dismiss='modal'>Cerrar</button>
        </div>
      </div>
      
    </div>";
	
	  echo"</tr>";
	
	//modal limite de descarga
	echo"<div class='modal fade' id='myModallimita$iteespact' role='dialog'>
		<div class='modal-dialog'>
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' class='close' data-dismiss='modal'>&times;</button>
          <h4 class='modal-title'>Descargar Data</h4>
        </div>
        <div class='modal-body'>
                    					<p>Esta descarga contiene mas de 300,000 mil registros; se limitara solo a descargar su limite m&aacute;ximo que es los 300,000 mil registros maximos permitidos</p>
                    					<p><a href='descarga_detalladotodo.php?dat1=$id&dat2=$dat6&dat3=$tparti' target='_blank' title='Descargar Todo los Años' class='text-primary'><i class='material-icons'>cloud_download</i> Descargar Todo los Años</a></p>
                    				</div>
                            <div class='modal-footer'>
          <button type='button' class='btn btn-danger' data-dismiss='modal'>Cerrar</button>
        </div>
      </div>
    </div>";
	
  }
}else{
	echo"<tr>";
	  echo"<td colspan='7' align='center'><b>No Hay Datos</b></td>";
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
    $('#datatableseuno').DataTable({
		"order": [[ 0, "asc" ]],
		dom: 'Bfrtip',
        buttons: [
            /*'copy', 'csv', 'excel', 'pdf', 'print'*/
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
    var table = $('#datatableseuno').DataTable();

    $('.card .material-datatablese label').addClass('form-group');
});

</script>


<?php
mysqli_close($conexpg);
?>