<html>
<head>
<!--<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">-->
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
<link rel="stylesheet" href="../css/material-dashboard.min.css?v=2.1.1">
<link rel="stylesheet" href="../css/buttons.dataTables.min.css">
<link href="../css/demo.css?w=654" rel="stylesheet"/>


</head>
<body>
<?php
$dato1 = "<b>AÑ0: </b>".$_GET["id"];//año
$dato2 = "<b> - MES: </b>".$_POST["selecmes"];
$dato3 = "<b> - PAIS: </b>".$_POST["pais"];
$dato4 = "<b> - ADUANA: </b>".$_POST["aduana"];
$dato5 = "<b> - RUC: </b>".$_GET["ruce"];
$dato5 = "<b> - PARTIDA: </b>".$_GET["partida"];
$dato6 = "<b> - DESCRIPCION: </b>".$_GET["descri1"];
$dato7 = "<b> - DESCRIPCION PARTIDA: </b>".$_GET["nomparti"];


echo "Datos Consultados $dato1 $dato5 $dato7 $dato6 <br>";
?>
<a href="#" class="btn btn-primary">Atras</a> <br>

 <div class="table-responsive" id="divconsdos">
                           <div class='material-datatables'>
                            <table id='example' class="table table-striped table-bordered table-sm">
                             <thead>
                             	<tr>
                             		<th>#</th>
                             		<th>PAIS</th>
                             		<th>ADUANA</th>
                             		<th>MES</th>
                             		<th>FOB USD</th>
                             		<th>PESO NETO</th>
                             		<th>PRECIO</th>
                             		<th>ACCION</th>
                             	</tr>
                             	<thead>
                             	<tbody>
                             	<?php
									
	$id = $_GET["id"];
	$dat2 = $_GET["mes"];
	$dat3 = $_GET["pais"];
	$dat4 = $_GET["adua"];
	$dat5 = $_GET["ruc"];
	$dat6 = $_GET["descri1"];
	$dat7 = $_GET["partida"];
									
	include("../incBD/inibd.php");
	$sqlespact="SELECT
i.codi_aduan,
a.descripcion,
i.pais_adqui,
p.espanol,
MONTH(i.fech_ingsi) AS mes,
Sum(i.fob_dolpol) AS fob,
Sum(i.peso_neto) AS pneto,
Sum(i.fob_dolpol)/Sum(peso_neto) AS precio
FROM
importacion AS i
LEFT JOIN paises AS p ON i.pais_adqui = p.idpaises
LEFT JOIN aduana AS a ON i.codi_aduan = a.codadu
WHERE
YEAR(i.fech_ingsi) = '$id' AND
i.part_nandi = '$dat7' AND
CONCAT(i.desc_comer, i.desc_matco, i.desc_usoap, i.desc_fopre, i.desc_otros, i.part_nandi) LIKE '%$dat6%'
GROUP BY
i.codi_aduan,
i.pais_adqui
ORDER BY
fob DESC";
	$resultado_creg=$conexpg->query($sqlespact); 
if($resultado_creg->num_rows>0){ 
while($fila_creg=$resultado_creg->fetch_array()){
	  $iteespact = $iteespact + 1;
	  $id_esac = $fila_creg["espanol"];
	  $esac1 = $fila_creg["descripcion"];
	  $esac2 = number_format($fila_creg["fob"],2);
	  $esac3 = number_format($fila_creg["pneto"],2);
	  $esac4 = number_format($fila_creg["precio"],2);
	  $esac5 = $fila_creg["mes"];
	  echo"<tr>";
	  echo"<td>$iteespact</td>";
	  echo"<td>$id_esac</td>";
	  echo"<td>$esac1</td>";
	  echo"<td>$esac5</td>";
	  echo"<td>$esac2</td>";
	  echo"<td>$esac3</td>";
	  echo"<td>$esac4</td>";
	  echo"<td><a href='#'>Listar</a></td>";
	  
	  echo"</tr>";
  }
}else{
	echo"<tr>";
	  echo"<td colspan='8' align='center'><b>No Hay Datos Consultados</b></td>";
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
<!--<script src="../js/core/jquery.min.js"></script>
<script src="../js/core/popper.min.js"></script>
<script src="../js/bootstrap-material-design.min.js"></script>
<script src="../js/plugins/perfect-scrollbar.jquery.min.js"></script>
<script src="../js/plugins/moment.min.js"></script>
<script src="../js/plugins/bootstrap-datetimepicker.min.js"></script>
<script src="../js/plugins/nouislider.min.js"></script>
<script src="../js/plugins/bootstrap-selectpicker.js"></script>
<script src="../js/plugins/bootstrap-tagsinput.js"></script>
<script src="../js/plugins/jasny-bootstrap.min.js"></script>
<script src="../assets-for-demo/js/modernizr.js"></script>
<script src="../js/material-dashboard.js?v=2.0.1"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
<script src="../js/plugins/arrive.min.js" type="text/javascript"></script>
<script src="../js/plugins/jquery.validate.min.js"></script>
<script src="../js/plugins/chartist.min.js"></script>
<script src="../js/plugins/jquery.bootstrap-wizard.js"></script>
<script src="../js/plugins/bootstrap-notify.js"></script>
<script src="../js/plugins/jquery-jvectormap.js"></script>
<script src="../js/plugins/nouislider.min.js"></script>
<script src="../js/plugins/jquery.select-bootstrap.js"></script>
<script src="../js/plugins/jquery.datatables.js"></script>
<script src="../js/plugins/sweetalert2.js"></script>
<script src="../js/plugins/jasny-bootstrap.min.js"></script>
<script src="../js/plugins/fullcalendar.min.js"></script>
<script src="../js/plugins/demo.js"></script>-->
    
<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable({
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
    var table = $('#example').DataTable();

    $('.card .material-datatables label').addClass('form-group');
});

</script>

</body>
</html>
