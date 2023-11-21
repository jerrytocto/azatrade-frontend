<?php
$hostloca="localhost";
$usuarioloca="root";
$passwordloca="jopedis";
$dbloca="azatradeexpo";
$linkaz = new mysqli($hostloca,$usuarioloca,$passwordloca,$dbloca);

if($linkaz === false) { 
 echo 'Ha habido un error <br>'.mysqli_connect_error(); 
}
?>