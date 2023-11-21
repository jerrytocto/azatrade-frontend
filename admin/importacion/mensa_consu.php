<?php
$dato1 = "<b>AÑ0: </b>".$_POST["selecanios"];
$dato2 = "<b> - MES: </b>".$_POST["selecmes"];
$dato3 = "<b> - PAIS: </b>".$_POST["pais"];
$dato4 = "<b> - ADUANA: </b>".$_POST["aduana"];
$dato5 = "<b> - RUC: </b>".$_POST["ruce"];
$dato6 = "<b> - DESCRIPCION: </b>".$_POST["descri1"];

echo "Datos Consultados $dato1 $dato2 $dato3 $dato4 $dato5 $dato6 <br>";
?>
<a href="busqueda-detallada.php" class="btn btn-primary">Nueva Consulta</a> <br>