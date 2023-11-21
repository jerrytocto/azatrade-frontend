<?php
session_start();
if (isset($_SESSION['login_usuario'])){
}else{
	if(!isset($_SESSION["login_usuario"]) || $_SESSION["login_usuario"]==null){
	//print "<script>alert('Acceso invalido! - Inicia Sesion para Acceder');window.location='$enlace_actual';</script>";
	//print "<script>window.location='index.php';</script>";
}
}
$linkpage = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
//include("incBD/inibd.php");
set_time_limit(250);
$activeprodu ="active";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<!-- Favicons -->
<link rel="apple-touch-icon" href="../img/logo.png">
<link rel="icon" href="img/logo.png">
<?php include("title.php"); ?>
<?php //require("../css.php"); ?>

<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
<link rel="stylesheet" href="css/material-dashboard.min.css?v=2.0.1">
<link rel="stylesheet" href="css/buttons.dataTables.min.css">
<link href="css/demo.css" rel="stylesheet"/>

  <script>
      window.onload = detectarCarga;
      function detectarCarga(){
         document.getElementById("carga").style.display="none";
      }
    </script>
       
        </head>
        <body >
        <div class="wrapper">
      <?php include("menuizquierdo.php"); ?>
            <div class="main-panel">
                <!-- Navbar -->
<?php include("menusuperior.php"); ?>
<!-- End Navbar -->
                    <div class="content">
                      <div class="container-fluid">
                            <div class="row">   
      <div class="col-md-12">  
      
                <?php if(isset($_POST['btnsearch'])){ ?>
                 <div id="carga" style="width:100%;text-align: center;">
<Center><img class="img-responsive" src="img/loading-carga.gif" width="100px"><br><p style="font-size:12px; color:#EC0D36;"> Espere un momento, la consulta puede tardar unos minutos. </p></Center>
     </div>
               <?php } ?>
                
        <!-- form busqueda -->
        <div class="col-md-12">
<div class="card ">
    <div class="card-header card-header-info card-header-icon">
    <div class="card-icon">
                          <i class="material-icons">search</i>
                        </div>
                        <h4 class="card-title">Seleccionar Año e ingresa descripci&oacute;n del producto</h4>
    </div>
    <!--<form method="post" action="<?php //echo $_SERVER['PHP_SELF']; ?>">-->
    <form method="post" action="<?php echo "$linkpage"; ?>">
    <div class="card-body "> 
                              <div class="col-sm-10">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
<select name='selecyear' class='selectpicker' data-size='7' data-style='btn btn-info btn-round' title='Selecionar Año' required>";
                <option value="2018" <?php if($_POST['selecyear']=="2018"){echo "selected";}?>>2018</option>
                <option value="2017" <?php if($_POST['selecyear']=="2017"){echo "selected";}?>>2017</option>
                <option value="2016" <?php if($_POST['selecyear']=="2016"){echo "selected";}?>>2016</option>
                <option value="2015" <?php if($_POST['selecyear']=="2015"){echo "selected";}?>>2015</option>
                <option value="2014" <?php if($_POST['selecyear']=="2014"){echo "selected";}?>>2014</option>
                <option value="2013" <?php if($_POST['selecyear']=="2013"){echo "selected";}?>>2013</option>
                <option value="2012" <?php if($_POST['selecyear']=="2012"){echo "selected";}?>>2012</option>
                    </select>
                   
                                               
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                               <?php $daa=$_POST['dato']; ?>
                                                <div class="form-group">
                                                    <input type="text" name="dato" class="form-control" placeholder="Ingrese Nombre del Producto" value="<?php echo"$daa";?>" required />
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-2">
                                            <button type="submit" name="btnsearch" class="btn btn-fill btn-success">Consultar <i class="material-icons">search</i></button>
											</div>
                                       
                                        </div>
                                    </div>  
    </div>
    <!--<div class="card-footer ">
       <center>
        <button type="submit" name="btnsearch" class="btn btn-fill btn-success">Consultar <i class="material-icons">search</i></button>
        </center>
    </div>-->
    </form>
</div>
    </div>
        <!-- fin form busqueda -->
   <?php
if(isset($_REQUEST['btnsearch'])){
	
	include("incBD/inibd.php");
	
	$bus1=trim($_REQUEST['selecyear']);
	$bus2=trim($_REQUEST['dato']);
	
	echo"<p align='center'>¿ Que deseas conocer de un producto ?</p>";
		
	if($bus1!="" and $bus2!=""){//si ambos tienen datos realiza la consulta
		/*$sqlparti="SELECT
date_part('year',e.fnum)::integer AS anio,
e.part_nandi,
to_char(SUM(e.vfobserdol),'999G999G999G999D99') as vfob,
to_char(SUM(e.vpesnet),'999G999G999G999D99') as pneto,
to_char(SUM(e.vfobserdol)/SUM(e.vpesnet),'999G999G999G999D99') as preciofob,
e.part_nandi as partioriginal,
(CASE char_length(e.part_nandi::TEXT) WHEN '9' THEN '0' || e.part_nandi ELSE e.part_nandi::TEXT END) as parti_arancel,
arancel.descripcion as nomarancel
FROM
exportacion e
LEFT JOIN arancel ON (CASE char_length(e.part_nandi::TEXT) WHEN '9' THEN '0' || e.part_nandi ELSE e.part_nandi::TEXT END) = arancel.idarancel
WHERE
date_part('year',e.fnum)::integer='$bus1' AND coalesce(e.dcom,'') ||' '|| coalesce(e.dmer2,'') ||' '|| coalesce(e.dmer3,'') ||' '|| coalesce(e.dmer4,'') ||' '|| coalesce(e.dmer5,'') ilike '%$bus2%'
GROUP BY
anio,e.part_nandi,nomarancel";*/
		
		$sqlparti="SELECT
date_part('year',e.fnum)::integer AS anio,
e.part_nandi,
to_char(SUM(e.vfobserdol),'999G999G999G999D99') as vfobx1,
to_char(SUM(e.vpesnet),'999G999G999G999D99') as pnetox1,
SUM(e.vfobserdol) as vfob,
SUM(e.vpesnet) as pneto,
e.part_nandi as partioriginal,
(CASE char_length(e.part_nandi::TEXT) WHEN '9' THEN '0' || e.part_nandi ELSE e.part_nandi::TEXT END) as parti_arancel,
arancel.descripcion as nomarancel
FROM
exportacion e
LEFT JOIN arancel ON (CASE char_length(e.part_nandi::TEXT) WHEN '9' THEN '0' || e.part_nandi ELSE e.part_nandi::TEXT END) = arancel.idarancel
WHERE
date_part('year',e.fnum)::integer='$bus1' AND coalesce(e.dcom,'') ||' '|| coalesce(e.dmer2,'') ||' '|| coalesce(e.dmer3,'') ||' '|| coalesce(e.dmer4,'') ||' '|| coalesce(e.dmer5,'') ilike '%$bus2%'
GROUP BY
anio,e.part_nandi,nomarancel";
		$result_parti= pg_query($conexpg,$sqlparti) or die("Error en la Consulta SQL Sumatoria Total");
	  $numReg_parti = pg_num_rows($result_parti);
	  if($numReg_parti>0){
		  echo"<div class='card'>";
		  echo"<div class='card-header card-header-info card-header-icon'>
              <div class='card-icon'>
                <i class='material-icons'>assignment</i>
              </div>
              <h4 class='card-title badge-info'><font color='#ffffff'>..:: <b>Año Consultado:</b> $bus1 | <b>Producto:</b> $bus2 ::.. </font></h4>
            </div>";
		  echo"<div class='card-body'>
                  <div class='toolbar'>
                      <!--  Aquí puede escribir botones / acciones adicionales para la barra de herramientas  -->
                  </div>";
		  echo"<div class='material-datatables'>";
		  echo"<table id='datatables' class='table table-striped table-no-bordered table-hover' cellspacing='0' width='100%' style='width:100%'>";
		  echo"<thead>
                          <tr>
                              <th>Partida</th>
                              <th>Descripcion</th>
                              <th class='text-right'>Valor Fob</th>
                              <th class='text-right'>Peso Neto(Kg)</th>
                              <th class='text-right'>Precio Fob</th>
                              <th class='disabled-sorting text-right'>Acciones</th>
                          </tr>
                      </thead>";
		  echo"<tfoot>
                          <tr>
                              <th>Partida</th>
                              <th>Descripcion</th>
                              <th class='text-right'>Valor Fob</th>
                              <th class='text-right'>Peso Neto(Kg)</th>
                              <th class='text-right'>Precio Fob</th>
                              <th class='text-right'>Acciones</th>
                          </tr>
                      </tfoot>";
		  echo"<tbody>";
		  while ($fila_parti=pg_fetch_array($result_parti)) {
			  $itte = $itte + 1;
		   $originalpartida= $fila_parti['partioriginal'];
		   $partida= $fila_parti['parti_arancel'];
		   $descri_partida= $fila_parti['nomarancel'];
		   //$total_vfobxx= number_format($fila_parti['vfob'],2,",",".");
		   //$total_pesoxx= number_format($fila_parti['pneto'],2,",",".");
		   $total_vfobxx= $fila_parti['vfobx1'];
		   $total_pesoxx= $fila_parti['pnetox1'];
			  
		   $total_vfob= $fila_parti['vfob'];
		   $total_peso= $fila_parti['pneto'];
		   //$preciovfob= number_format($fila_parti['preciofob'],2);
			  if($total_peso == "0"){
				  $preciovfob="0.00";
				  }else{
				  $preciovfob= number_format($total_vfob/$total_peso,2);
			  }
		   $year = $fila_parti['anio'];
		   $codpartida = $fila_parti['part_nandi'];
		echo"<tr>";
	    echo"<td data-valor='$partida' class='click'>$partida</td>";
		echo"<td>$descri_partida</td>";
		echo "<td align='right'>$total_vfobxx</td>";
        echo "<td align='right'>$total_pesoxx</td>";
        echo "<td align='right'>$preciovfob</td>";
			  
			  if (isset($_SESSION['login_usuario'])){
				  $columnaBu = "<a href='producto/detalle/?anio=$bus1&partida=$originalpartida&descri1=$bus2' target='_blank' class='btn btn-link btn-info btn-just-icon' rel='tooltip' title='Ver Detalle'><i class='material-icons'>find_in_page</i></a>";

				   $columnoption = "<a href='#' class='btn btn-link btn-warning btn-just-icon' rel='tooltip' title='Mas Opciones' data-toggle='modal' data-target='#myModalopciones$itte'><i class='material-icons'>group_work</i></a>";
				  
			  }else{
				  
				  $columnaBu = "<a href='#' class='btn btn-link btn-info btn-just-icon' rel='tooltip' title='Ver Detalle' data-toggle='modal' data-target='#myModalsesionplan'><i class='material-icons'>find_in_page</i></a>";
				  $columnoption = "<a href='#' class='btn btn-link btn-warning btn-just-icon' rel='tooltip' title='Mas Opciones' data-toggle='modal' data-target='#myModalopciones$itte'><i class='material-icons'>group_work</i></a>";
				  }
			  
		echo "<td class='text-right'>
		$columnaBu
		<a href='#' rel='tooltip' title='Ver Arancel' class='btn btn-link btn-success btn-just-icon' data-toggle='modal' data-target='#myModalarancel$itte'><i class='material-icons'>spellcheck</i></a>
		$columnoption
		
		<!--<a href='#' class='btn btn-link btn-info btn-just-icon like' rel='tooltip' title='Ver Detalle'><i class='material-icons'>favorite</i></a>
         <a href='#' class='btn btn-link btn-warning btn-just-icon edit' rel='tooltip' title='Ver Detalle'><i class='material-icons'>find_in_page</i></a>
                                  <a href='#' class='btn btn-link btn-danger btn-just-icon remove' rel='tooltip' title='Ver Detalle'><i class='material-icons'>find_in_page</i></a>-->
		</td>";
				  
		echo"</tr>";
			  //modal arancel
			  echo"<div class='modal fade' id='myModalarancel$itte' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                          <div class='modal-dialog'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                  <h4 class='modal-title'>Partida Arancel: <b>$partida</b></h4>
                                  <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>
                                      <i class='material-icons'>clear</i>
                                  </button>
                                </div>
                                <div class='modal-body'>
                                    <center>Datos Gestión de Partida #$partida</center>
									<p>Para ver mas detalle de esta partida, <a href='http://www.azatrade.info/arancel/viewpartidas.php?data=$partida&t=$partida&d1=' target='_blank'><button type='button' class='btn btn-info btn-link'>dale click aqui</button></a>.</p>
									
                                </div>
                                <div class='modal-footer'>
                                    <button type='button'' class='btn btn-danger btn-link' data-dismiss='modal'>Cerrar</button>
                                </div>
                            </div>
                        </div>
                    	</div>";
			  
			  //modal mas opciones
			  echo"<div class='modal fade' id='myModalopciones$itte' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                          <div class='modal-dialog'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                  <h4 class='modal-title'>¿ Que deseas conocer mas de este producto ?</h4>
                                  <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>
                                      <i class='material-icons'>clear</i>
                                  </button>
                                </div>
                                <div class='modal-body'>
                                    <center>Partida #$partida</center>	
	<center>
                <form method='post' action='producto/indicadores-anuales/' target='_blank'>
				<input type='hidden' name='varipartidanalipart' value='$partida'>
                <button type='submit' class='btn btn-warning'>
                    <span class='btn-label'>
                        <i class='material-icons'>spellcheck</i>
                    </span>
                    INDICADORES ANUALES
                </button>
				</form>
                
                <form method='post' action='producto/mercados/' target='_blank'>
				<input type='hidden' name='varipartidamerca' value='$partida'>
				<button type='submit' class='btn btn-rose'>
                    <span class='btn-label'>
                        <i class='material-icons'>language</i>
                    </span>
                    MERCADOS
                </button>
				</form>
                
				<form method='post' action='producto/empresas/' target='_blank'>
				<input type='hidden' name='varipartidaempre' value='$partida'>
				<button type='submit' class='btn btn-success'>
                    <span class='btn-label'>
                        <i class='material-icons'>domain</i>
                    </span>
                    EMPRESAS
                </button>
				</form>
                
                <form method='post' action='producto/departamentos/' target='_blank'>
				<input type='hidden' name='varipartidaregion' value='$partida'>
				<button type='submit' class='btn btn-info'>
                    <span class='btn-label'>
                        <i class='material-icons'>location_on</i>
                    </span>
                    REGIONES
                </button>
				</form>
                
				<!--<form method='post' action='producto/' target='_blank'>
				<input type='hidden' name='varipartidasector' value='$partida'>
                <button class='btn btn-warning'>
                    <span class='btn-label'>
                        <i class='material-icons'>flight</i>
                    </span>
                    SECTORES
                </button>
				</form>-->
				</center>
									
                                </div>
                                <div class='modal-footer'>
                                    <button type='button'' class='btn btn-danger btn-link' data-dismiss='modal'>Cerrar</button>
                                </div>
                            </div>
                        </div>
                    	</div>";
			  
		  }
		  echo"</tbody>";
		  echo"</table>";
		  echo"</div>";
		  echo"</div>";
		  echo"</div>";
		  
	  }else{//si no encuentra datos en la busqueda muestra mensaje
echo"<div class='alert alert-danger alert-with-icon' data-notify='container'>
                    <i class='material-icons' data-notify='icon'>notifications</i>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <i class='material-icons'>close</i>
                    </button>
                    <span data-notify='message'>No se encontraron datos en la busqueda realizada. Vuelva a consultar.</span>
                </div>";
	  }
		
	}else{//fin si ambos tienen datos realiza la consulta, si no tiene datos de busqueda muestra mensaje
		echo"<div class='alert alert-warning alert-with-icon' data-notify='container'>
                    <i class='material-icons' data-notify='icon'>notifications</i>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <i class='material-icons'>close</i>
                    </button>
                    <span data-notify='message'>Campos Vacios. Para realizar una busqueda ingrese datos en los campos de consulta.</span>
                </div>";
		}
	
		  }
		  ?>
      </div> <!-- end col-md-12 -->
  </div> <!-- end row -->

                      </div>
                    </div>
<!-- small modal -->
                        <div class="modal fade modal-mini modal-primary" id="myModalalertproduc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    		<div class="modal-dialog modal-small">
                    			<div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
                            </div>
                    				<div class="modal-body">
                    					<p>Para mostrar informacion debes de realiza una consulta y luego selecciona una partida</p>
                    				</div>
                            <div class="modal-footer justify-content-center">
                            </div>
                    			</div>
                    		</div>
                    	</div>
                        <!--    end small modal -->
                        
                        
                        <div class='modal fade' id='myModalsesionplan' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                          <div class='modal-dialog'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                  <h4 class='modal-title'>Alerta !</h4>
                                  <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>
                                      <i class='material-icons'>clear</i>
                                  </button>
                                </div>
                                <div class='modal-body'>
								<center><i class='material-icons banger-info' style="font-size: 56px;color:#FB8C00;">info</i></center>
                                    <!--Para ver el detalle adquiere uno de nuestros <a href='planes/' target='_blank'><button type='button' class='btn btn-info btn-link'>planes aqui</button></a>-->
                                    Para ver el detalle <a href="registro/">registrate AQUI</a>, si ya estas registrado <a href="login/">ingresa AQUI</a>.
									
                                </div>
                                <div class='modal-footer'>
                                    <button type='button' class='btn btn-danger btn-link' data-dismiss='modal'>Cerrar</button>
                                </div>
                            </div>
                        </div>
                    	</div>

                        
                    <?php include("footer.php"); ?>

            </div>
        </div>
    </body>

<?php include("js.php"); ?>

<script type="text/javascript">
$(document).ready(function() {
    $('#datatables').DataTable({
		"order": [[ 2, "desc" ]],
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

    // Edit record
    table.on('click', '.edit', function() {
        $tr = $(this).closest('tr');

        var data = table.row($tr).data();
        alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
    });

    // Delete a record
    table.on('click', '.remove', function(e) {
        $tr = $(this).closest('tr');
        table.row($tr).remove().draw();
        e.preventDefault();
    });

    //Like record
    table.on('click', '.like', function() {
        alert('You clicked on Like button');
    });

    $('.card .material-datatables label').addClass('form-group');
});

</script>
<script>
	$(function(){
    $(".click").click(function(e) {
        e.preventDefault();
        var data = $(this).attr("data-valor");
        //alert(data);    
		var pasa1 = document.getElementById("idfilpart").value = data;
    });
});
</script>

  
<?php //cerrando conexion
	//pg_close($conexpg); ?>
</html>
