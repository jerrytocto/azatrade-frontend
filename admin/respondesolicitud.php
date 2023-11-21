<?php
include("incBD/inibd.php");
set_time_limit(450);
date_default_timezone_set("America/Lima");

$dato1 = $_POST["idsoli"];
$dato3 = $_POST["responde"];
$dato4 = $_POST["archi"];
$dato2 = $_FILES["file"]["name"];

/*
echo "archivo: $dato4 <br>";
echo "detalle: $dato3 <br>";
echo "idreg: $dato1 <br>";
*/
	
if($dato2!=""){//si adjunta archivo
    $directorio = "archive/";
    if (!file_exists($directorio))
        mkdir($directorio, 0777, true);
    $tipoArchivo = strtolower(pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION));
	$id = substr(md5(time()), 0, 16);
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $adjunto = $directorio . $id . "." . $tipoArchivo)) {
           // echo "archivo subido con exito";
			$adjuntoar = $id . "." . $tipoArchivo;
        } else {
            //echo "error en la subida del archivo";
        }

}else{
	$adjuntoar = $dato4;
}


$Sql="UPDATE solicitudes 
			SET 
			atendido='A',
			archivo='$adjuntoar',
			respuesta='$dato3',
			fecharespu= now()
            WHERE idsoli ='$dato1' ";
// strtoupper convierte a mayusculas
	 $rscrea2 = $conexpg->query($Sql) or die(mysqli_error($conexpg));
	 if (!$rscrea2) {
    echo "Query: Un error al actualizar el registro";
  }


$regale="yes";

   echo"<script>location.href='solicitudes.php?var=$regale'</script>";
?>