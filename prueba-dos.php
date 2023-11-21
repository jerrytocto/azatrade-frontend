<?php
include("conex/inibd.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Paginador con JSON</title>
</head>

<body>
	<div class="row">
<div class="col-xs-12">
          <h3> Listado de Países </h3>
          <div id="loader" class="text-center"><img src="img/loader.gif"></div>

          <!-- AJAX -->
          <div id="outer_div"></div>
          <!-- END AJAX -->

        </div>
    </div>

	
<script 
src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script 
src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script>
      $(document).ready(function(){
        load(1);
      });
      function load(page){
        var parametros = {"action" : "ajax", "page" : page};
        $("#loader").fadeIn();
        $.ajax({
          url : 'listadetalle.php?dat=palta',
          data : parametros,
          beforeSend:function(objeto){
            $("#loader").fadeIn();
          },
          success:function(data){
            $("#loader").fadeOut();
            $("#outer_div").html(data).fadeIn();
          }
        });
      }
    </script>
	<?php $conexpg = null;//cierra conexion  ?>
</body>
</html>


    