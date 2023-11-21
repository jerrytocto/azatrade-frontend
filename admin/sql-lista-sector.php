<?php
include("incBD/inibd.php");
$query=$conexpg->query("select sector from sectores where tipo='$_GET[tiposec]' GROUP BY sector");
$states = array();
while($r=$query->fetch_object()){ $states[]=$r; }
if(count($states)>0){
print "<option value=''>Seleccione Sector</option>";
foreach ($states as $s) {
	print "<option value='$s->sector'>$s->sector</option>";
}
}else{
print "<option value=''>-- NO HAY DATOS --</option>";
}
?>