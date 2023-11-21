<?php
session_start();
if (isset($_SESSION['login_usuario'])){
	if($_SESSION['rol']<>'ADMIN'){//si no es admin
		print "<script>window.location='./';</script>";
		//print "<script>window.location='https://www.azatrade.info/';</script>";
	}
}else{
	if(!isset($_SESSION["login_usuario"]) || $_SESSION["login_usuario"]==null){
	//print "<script>alert('Acceso invalido! - Inicia Sesion para Acceder');window.location='$enlace_actual';</script>";
		print "<script>window.location='login/';</script>";
	//print "<script>window.location='https://www.azatrade.info/';</script>";
}
}
$linkpage = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
include("incBD/inibd.php");
set_time_limit(450);
$activepadm ="active";
$cambiaicons = "aria-expanded='true'";
$activerptadm ="active";
$actibtn = "show";
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

<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.1.min.js"></script>

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
        
        <!-- form busqueda -->
        <div class="col-md-12">
<div class="card ">
    <div class="card-header card-header-info card-header-icon">
    <div class="card-icon">
                          <i class="material-icons">search</i>
                        </div>
                        <h4 class="card-title">Reporte de Usuarios Inscritos a la Web Azatrade</h4>
                        <p><a href="rpt-apro-user.php"><b><i class='material-icons'>done_all</i> Aprobar Accesos Pendientes</b></a></p>
    </div>

</div>
    </div>
        <!-- fin form busqueda -->
   <?php
//if(isset($_REQUEST['btnsearchbd']) and $siejecuta=="si"){

		//$sqlgral="Select * from usuario where very='1'";
		  $sqlgral="Select * from usuario where estado='A'";
		  $res_gral=$conexpg->query($sqlgral); 
if($res_gral->num_rows>0){
		  echo"<div class='card'>";
		  echo"<div class='card-header card-header-info card-header-icon'>
              <div class='card-icon'>
                <i class='material-icons'>assignment</i>
              </div>
              <h4 class='card-title badge-info'><font color='#ffffff'>..:: <b>Resultado de la Busqueda</b>  ::.. </font></h4>
            </div>";
		  echo"<div class='card-body'>
                  <div class='toolbar'>
                      <!--  Aquí puede escribir botones / acciones adicionales para la barra de herramientas  -->
                  </div>";
		  echo"<div class='material-datatables'>";
		  echo"<table id='datatables' class='table table-striped table-no-bordered table-hover' cellspacing='0' width='100%' style='width:100%'>";
		  echo"<thead>
                          <tr>
   <th>#</th>
   <th>Codigo</th>
   <th>Nombres</th>
   <th>Apellidos</th>
   <th>Email</th>
   <th>Login</th>
   <th>Clave</th>
   <th>Nivel</th>
   <th>Celular</th>
   <th>Direccion</th>
   <th>Empresa</th>
   <th>Profesion</th>
   <th>Inst. Laboral</th>
   <th>Tipo Inst.</th>
   <th>Cargo</th>
   <th>Fecha Reg.</th>
   <th>Estado</th>
                          </tr>
                      </thead>";
		  echo"<tfoot>
                          <tr>
   <th>#</th>
   <th>Codigo</th>
   <th>Nombres</th>
   <th>Apellidos</th>
   <th>Email</th>
   <th>Login</th>
   <th>Clave</th>
   <th>Nivel</th>
   <th>Celular</th>
   <th>Direccion</th>
   <th>Empresa</th>
   <th>Profesion</th>
   <th>Inst. Laboral</th>
   <th>Tipo Inst.</th>
   <th>Cargo</th>
   <th>Fecha Reg.</th>
   <th>Estado</th>
                          </tr>
                      </tfoot>";
		  echo"<tbody>";
		  //while ($fila_uu=pg_fetch_array($res_gral)) {
			  while($fila_uu=$res_gral->fetch_array()){
			  $itte = $itte + 1;
		   $dato1= $fila_uu['codusuario'];
		   $dato2= $fila_uu['nombre'];
		   $dato3= $fila_uu['apellido'];
		   $dato4= $fila_uu['mail'];
		   $dato5= $fila_uu['login_usuario'];
		   $dato6= $fila_uu['password_usuario'];
		   $dato7= $fila_uu['rol'];
		   $dato8= $fila_uu['estado'];
			  
			  $dato9= $fila_uu['celular'];
			  $dato10= $fila_uu['direccion'];
			  $dato11= $fila_uu['empresa'];
			  $dato12= $fila_uu['profesion'];
			  $dato13= $fila_uu['institucion_laboral'];
			  $dato14= $fila_uu['tipo_institucion'];
			  $dato15= $fila_uu['cargo'];
			  $dato16= $fila_uu['fecha'];
				  $dato17= $fila_uu['very'];
				  
				  if($dato17=="1"){
				  $apro ="<label class='text-success'><i class='material-icons'>done_all</i> Aprobabado</label>";
				  }else{
					  $apro ="<label class='text-warning'><i class='material-icons'>done</i> Aprobar</label>";
				  }

		echo"<tr>";
echo "<td>&nbsp;</td>";
echo "<td>$dato1</td>";
echo "<td>$dato2</td>";
echo "<td>$dato3</td>";
echo "<td>$dato4</td>";
echo "<td>$dato5</td>";
echo "<td>$dato6</td>";
echo "<td>$dato7</td>";
echo "<td>$dato9</td>";
echo "<td>$dato10</td>";
echo "<td>$dato11</td>";
echo "<td>$dato12</td>";
echo "<td>$dato13</td>";
echo "<td>$dato14</td>";
echo "<td>$dato15</td>";
echo "<td>$dato16</td>";
echo "<td>$apro</td>";
		echo"</tr>";  
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
		
	/*}else{//fin si ambos tienen datos realiza la consulta, si no tiene datos de busqueda muestra mensaje
		echo"<div class='alert alert-warning alert-with-icon' data-notify='container'>
                    <i class='material-icons' data-notify='icon'>notifications</i>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <i class='material-icons'>close</i>
                    </button>
                    <span data-notify='message'>Campos Vacios. Para realizar una busqueda ingrese datos en los campos de consulta.</span>
                </div>";
		}*/
	
		 // }
		  ?>
      </div> <!-- end col-md-12 -->
  </div> <!-- end row -->

                      </div>
                    </div>
   
                    <?php include("footer.php"); ?>

            </div>
        </div>
    </body>

<?php include("js.php"); ?>

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
		"order": [[ 15, "desc" ]],
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
