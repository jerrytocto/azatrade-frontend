<?php
include("incBD/inibd.php");
set_time_limit(150);

$cod = $_GET["log"];
$condi = $_GET["action"];
  
  if($condi=="A"){/*Anula Registro*/
 $Sql="update pagos_acceso Set estado='Anulado' where id_acceso ='$cod' ";
// strtoupper convierte a mayusculas
	  $rs = $conexpg->query($Sql);
   //pg_query($Sql); 
	  $ale="an";
   echo"<script>location.href='rpt-acceso.php?by=$ale'</script>";
  }
  
   if($condi=="E"){/*Elimina Registro*/
 $Sql="DELETE from pagos_acceso where id_acceso ='$cod' ";
// strtoupper convierte a mayusculas
	   $rs = $conexpg->query($Sql);
   //pg_query($Sql); 
	   $ale="del";
   echo"<script>location.href='rpt-acceso.php?by=$ale'</script>";
  }
  ?>
