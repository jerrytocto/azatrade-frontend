<?php
session_start();
if (isset($_SESSION['login_usuario'])){
	if($_SESSION['rol']<>'ADMIN'){//si no es admin
		print "<script>window.location='login/';</script>";
	}
}else{
	if(!isset($_SESSION["login_usuario"]) || $_SESSION["login_usuario"]==null){
	//print "<script>alert('Acceso invalido! - Inicia Sesion para Acceder');window.location='$enlace_actual';</script>";
	print "<script>window.location='login/';</script>";
}
}
$linkpage = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
include("incBD/inibd.php");
set_time_limit(450);
$activepadm ="active";
//$cambiaicons = "aria-expanded='true'";
$activeproce ="active";
$actibtn = "show";
$mensajeA = $_GET["by"];
$mensajeB = $_GET["val"];
$mensajeC = $_GET["fit"];
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

<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
<link rel="stylesheet" href="css/material-dashboard.min.css?v=2.0.1">
<link rel="stylesheet" href="css/buttons.dataTables.min.css">
<link href="css/demo.css" rel="stylesheet"/>

<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.1.min.js"></script>

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
      
                 <div id="carga" style="width:100%;text-align: center;">
<Center><img class="img-responsive" src="img/loading-carga.gif" width="100px"><br><p style="font-size:12px; color:#EC0D36;"> Espere un momento, la consulta puede tardar unos minutos. </p></Center>
     </div>
     
     <?php if($mensajeA=="ok"){ ?>
           <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <i class="material-icons">close</i>
            </button>
            <span>
              <b> Mensaje - </b> Se registro satisfactoriamente el resumen <b> <?=$mensajeB;?> - <?=$mensajeC;?> </b></span>
          </div>
           <?php } ?>
           
       <?php if($mensajeA=="yes"){ ?>
           <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <i class="material-icons">close</i>
            </button>
            <span>
              <b> Mensaje - </b> Se modifico el registro del usuario satisfactoriamente</span>
          </div>
           <?php } ?>
        <?php if($mensajeA=="an"){ ?>
           <div class="alert alert-warning">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <i class="material-icons">close</i>
            </button>
            <span>
              <b> Mensaje - </b> Se anulo el registro de acceso al usuario satisfactoriamente</span>
          </div>
           <?php } ?>
        <?php if($mensajeA=="del"){ ?>
           <div class="alert alert-delete">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <i class="material-icons">close</i>
            </button>
            <span>
              <b> Mensaje - </b> Se elimino el registro de acceso al usuario satisfactoriamente</span>
          </div>
           <?php } ?>
           
        <div class="col-md-12">
<div class="card ">
    <div class="card-header card-header-info card-header-icon">
    <div class="card-icon">
                          <i class="material-icons">receipt</i>
                        </div>
                        <h4 class="card-title">Procesar resumenes generales</h4>
    </div>

</div>
    </div>
        <!-- fin form busqueda -->
   <?php

		  ?>
      </div> <!-- end col-md-12 -->
  </div> <!-- end row -->
                      
                      <div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-rose card-header-icon">
              <div class="card-icon">
                <i class="material-icons">spellcheck</i>
              </div>
              <p class="card-category">Partidas</p>
              <h3 class="card-title">Partidas</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <a href="#" class="btn btn-info" data-toggle='modal' data-target='#myModalPartR'> Procesar </a>

                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">language</i>
              </div>
              <p class="card-category">Mercados</p>
              <h3 class="card-title">Mercados</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                     <a href="#" class="btn btn-info" data-toggle='modal' data-target='#myModalMER'>Procesar</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
              <div class="card-icon">
                <i class="material-icons">domain</i>
              </div>
              <p class="card-category">Empresas</p>
              <h3 class="card-title">Empresas</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                     <a href="#" class="btn btn-info" data-toggle='modal' data-target='#myModalEMP'>Procesar</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-rose card-header-icon">
              <div class="card-icon">
                <i class="material-icons">spellcheck</i>
              </div>
              <p class="card-category">Departamentos</p>
              <h3 class="card-title">Departamentos</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                     <a href="#" class="btn btn-info" data-toggle='modal' data-target='#myModalREG'>Procesar</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">language</i>
              </div>
              <p class="card-category">Sectores</p>
              <h3 class="card-title">Sectores</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                     <a href="#" class="btn btn-info" data-toggle='modal' data-target='#myModalSECT'>Procesar</a>
                </div>
            </div>
        </div>
    </div>
</div>
                     
                     <!-- modal partida -->
                   <div class='modal fade modal-mini modal-primary' id='myModalPartR' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                    		<div class='modal-dialog modal-small'>
                    			<div class='modal-content'>
                            <div class='modal-header'>
                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'><i class='material-icons'>clear</i></button>
                            </div>
                    				<div class='modal-body'>
                    				<p align="center"><b>Partidas</b></p>
                    					<p>
										<form method='post' action='resumen_procesapartidas.php'>
										<b>Selecciona variable a procesar resumen partida</b><br>
										<select name='condiciona' class='selectpicker' data-size='7' data-style='btn btn-info btn-round' required>
                <option value='vfobserdol'>Valor FOB USD</option>
                <option value='vpesnet'>Peso Neto (Kg)</option>
                <option value='diferen'>Precio FOB USD x KG</option>
                <!--<option value='vpesbru'>Peso Bruto (Kg)</option>
                <option value='qunifis'>Cantidad Exportada</option>-->
                <option value='qunicom'>Unidades Comerciales</option>
                <!--<option value='part_nandi'>Cantidad de Partidas</option>-->
                <option value='total'>Cantidad de Registros</option>
                <option value='ndcl'>Cantidad de Duas</option>
                <option value='cpaides'>Cantidad de Mercados</option>
                <option value='cpuedes'>Cantidad de Puertos</option>
                <option value='cadu'>Cantidad de Aduanas</option>
                <option value='depa'>Cantidad de Departamentos</option> 
                <option value='provi'>Cantidad de Provincias</option>
                <option value='distri'>Cantidad de Distritos</option>
                <option value='cage'>Cantidad de Agentes</option>
                <option value='cviatra'>Cantidad de vias de Transporte</option>
                                </select>
								<center><button type='submit' class='btn btn-success'>Ejecutar Proceso</button></center>
										</form>
										</p>
                    				</div>
                            <div class='modal-footer justify-content-center'>
                            </div>
                    			</div>
                    		</div>
                    	</div>
                    	
                   <!-- modal mercado -->
                    <div class='modal fade modal-mini modal-primary' id='myModalMER' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                    		<div class='modal-dialog modal-small'>
                    			<div class='modal-content'>
                            <div class='modal-header'>
                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'><i class='material-icons'>clear</i></button>
                            </div>
                    				<div class='modal-body'>
                    				<p align="center"><b>Mercados</b></p>
                    					<p>
										<form method='post' action='resumen_procesamercados.php'>
										<input type='hidden' name='namepaisR' value='$nompais' >
					                    <input type='hidden' name='codepaisR' value='$codipais' >
										<b>Selecciona variable a procesar resumen mercado</b><br>
										<select name='condiciona' class='selectpicker' data-size='7' data-style='btn btn-info btn-round' required>
                                    <option value='vfobserdol'>Valor FOB USD</option>
                                    <option value='part_nandi'>Cantidad de Partidas</option>
                                    <option value='dnombre'>Cantidad de Empresas</option>
                                    <option value='depa'>Cantidad de Departamentos</option>
                                </select>
								<center><button type='submit' class='btn btn-success'>Consultar</button></center>
										</form>
										</p>
                    				</div>
                            <div class='modal-footer justify-content-center'>
                            </div>
                    			</div>
                    		</div>
                    	</div>
                    	
                    	<!-- modal empresas -->
                      <div class='modal fade modal-mini modal-primary' id='myModalEMP' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                    		<div class='modal-dialog modal-small'>
                    			<div class='modal-content'>
                            <div class='modal-header'>
                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'><i class='material-icons'>clear</i></button>
                            </div>
                    				<div class='modal-body'>
                    				<p align="center"><b>Empresas</b></p>
                    					<p>
										<form method='post' action='resumen_procesaempresas.php'>
										<input type='hidden' name='namempE' value='$nom_empre' >
					                    <input type='hidden' name='codempE' value='$codruc' >
										<b>Selecciona variable a procesar resumen empresa</b><br>
										<select name='condiciona' class='selectpicker' data-size='7' data-style='btn btn-info btn-round' required>
                <option value='vfobserdol'>Valor FOB USD</option>
                <option value='vpesnet'>Peso Neto (Kg)</option>
                <option value='diferen'>Precio FOB USD x KG</option>
                <!--<option value='vpesbru'>Peso Bruto (Kg)</option>
                <option value='qunifis'>Cantidad Exportada</option>-->
                <option value='qunicom'>Unidades Comerciales</option>
                <option value='part_nandi'>Cantidad de Partidas</option>
                <option value='total'>Cantidad de Registros</option>
                <option value='ndcl'>Cantidad de Duas</option>
                <option value='cpaides'>Cantidad de Mercados</option>
                <option value='cpuedes'>Cantidad de Puertos</option>
                <option value='cadu'>Cantidad de Aduanas</option>
                <option value='depa'>Cantidad de Departamentos</option> 
                <option value='provi'>Cantidad de Provincias</option>
                <option value='distri'>Cantidad de Distritos</option>
                <option value='cage'>Cantidad de Agentes</option>
                <option value='cviatra'>Cantidad de vias de Transporte</option>
                                </select>
								<center><button type='submit' class='btn btn-success'>Consultar</button></center>
										</form>
										</p>
                    				</div>
                            <div class='modal-footer justify-content-center'>
                            </div>
                    			</div>
                    		</div>
                    	</div>
                    	
                    	<!-- modal regiones -->
                      <div class='modal fade modal-mini modal-primary' id='myModalREG' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                    		<div class='modal-dialog modal-small'>
                    			<div class='modal-content'>
                            <div class='modal-header'>
                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'><i class='material-icons'>clear</i></button>
                            </div>
                    				<div class='modal-body'>
                    				<p align="center"><b>Departamentos</b></p>
                    					<p>
										<form method='post' action='resumen_procesaregiones.php'>
										<input type='hidden' name='namedepaRE' value='$nomdepa' >
					                    <input type='hidden' name='codedepaRE' value='$codidepa' >
										<b>Selecciona variable a procesar resumen region</b><br>
										<select name='condiciona' class='selectpicker' data-size='7' data-style='btn btn-info btn-round' required>
                <option value='vfobserdol'>Valor FOB USD</option>
                <option value='part_nandi'>Cantidad de Partidas</option>
                <option value='dnombre'>Cantidad de Empresas</option>
                <option value='cpaides'>Cantidad de Mercados</option>
                                </select>
								<center><button type='submit' class='btn btn-success'>Consultar</button></center>
										</form>
										</p>
                    				</div>
                            <div class='modal-footer justify-content-center'>
                            </div>
                    			</div>
                    		</div>
                    	</div>
                    	
                    	<!-- modal sectores -->
                    	<div class='modal fade modal-mini modal-primary' id='myModalSECT' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                    		<div class='modal-dialog modal-small'>
                    			<div class='modal-content'>
                            <div class='modal-header'>
                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'><i class='material-icons'>clear</i></button>
                            </div>
                    				<div class='modal-body'>
                    				<p align="center"><b>Sectores</b></p>
                    					<p>
										<form method='post' action='resumen_procesasectores.php'>
										<input type='hidden' name='namesectRES' value='$nomsec' >
										<b>Selecciona variable a procesar resumen sector</b><br>
										<select name='condiciona' class='selectpicker' data-size='7' data-style='btn btn-info btn-round' required>
                <option value='vfobserdol'>Valor FOB USD</option>
                <option value='part_nandi'>Cantidad de Partidas</option>
                <option value='dnombre'>Cantidad de Empresas</option>
                <option value='depa'>Cantidad de Regiones</option>
                                </select>
								<center><button type='submit' class='btn btn-success'>Consultar</button></center>
										</form>
										</p>
                    				</div>
                            <div class='modal-footer justify-content-center'>
                            </div>
                    			</div>
                    		</div>
                    	</div>
                    	
                      

                      </div>
                    </div>
   
                    <?php include("footer.php"); ?>

            </div>
        </div>
    </body>

<?php include("js.php"); ?>

<!-- mensaje de anulacion de registro -->
<script>
function confirmar()
{
	if(confirm('¿Estas seguro que desea ANULAR registro?'))
		return true;
	else
		return false;
}
</script>

<!-- mensaje de anulacion de registro -->
<script>
function confirmar2()
{
	if(confirm('¿Estas seguro que desea ELIMINAR registro?'))
		return true;
	else
		return false;
}
</script>

<script type="text/javascript" src="js/jsexport/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="js/jsexport/buttons.flash.min.js"></script>
    <script type="text/javascript" src="js/jsexport/jszip.min.js"></script>
    <script type="text/javascript" src="js/jsexport/pdfmake.min.js"></script>
    <script type="text/javascript" src="js/jsexport/vfs_fonts.js"></script>
    <script type="text/javascript" src="js/jsexport/buttons.html5.min.js"></script>
    <script type="text/javascript" src="js/jsexport/buttons.print.min.js"></script>
    
<script type="text/javascript">
$(document).ready(function() {
    $('#datatables').DataTable({
		"order": [[ 3, "desc" ]],
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
	mysqli_close($conexpg); ?>
</html>
