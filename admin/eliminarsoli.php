<?php
include("incBD/inibd.php");
set_time_limit(150);

$cod = $_GET["log"];
$condi = $_GET["action"];

$Sql="update solicitudes Set estado='E' where idsoli ='$cod' ";
// strtoupper convierte a mayusculas
	  $rs = $conexpg->query($Sql);
$ale="del";

	echo"<script>location.href='solicitudes.php?var=$ale'</script>";
  ?>
