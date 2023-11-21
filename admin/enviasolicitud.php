<?php
include("incBD/inibd.php");
set_time_limit(450);
date_default_timezone_set("America/Lima");

$dato1 = $_POST["idusu"];
$dato2 = $_POST["baseorigen"];
$dato3 = trim($_POST["asunto"]);
$dato4 = trim($_POST["detalle"]);

$Sql_inser="insert into solicitudes (idusu, asunto, detalle, fechareg, atendido, estado, archivo, respuesta, fecharespu, origendata) values ('$dato1','$dato3','$dato4',now(),'P','A','','','','$dato2')";
	$rscrea2 = $conexpg->query($Sql_inser);

$regale="sms";

if($dato2=="Expo"){
   echo"<script>location.href='pb?var=$regale'</script>";
}else{
	echo"<script>location.href='importacion/pb?var=$regale'</script>";
}
?>