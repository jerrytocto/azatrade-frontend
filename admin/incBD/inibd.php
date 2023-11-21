<?php
/*$user = "azatrade";
$password = "trade/*2015";
$dbname = "negocios";
$port = "5432";
$host = "www.azatrade.info";
$cadenaConexion = "host=$host port=$port dbname=$dbname user=$user password=$password";
$conexpg = pg_connect($cadenaConexion) or die("Error en la Conexión: ".pg_last_error());*/
$hostloca="localhost";
$usuarioloca="root";
$passwordloca="jopedis1";
$dbloca="azatradeexpo";
$conexpg = new mysqli($hostloca,$usuarioloca,$passwordloca,$dbloca);
$conexpg->query("SET NAMES 'utf8'");
if($conexpg === false) { 
 echo 'Ha habido un error <br>'.mysqli_connect_error(); 
}
?>