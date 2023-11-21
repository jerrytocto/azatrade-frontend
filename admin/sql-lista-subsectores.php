<?php
include("incBD/inibd.php");
$query=$conexpg->query("select subsector from sectores where sector='$_GET[sector]' GROUP BY subsector");
$states = array();
while($r=$query->fetch_object()){ $states[]=$r; }
if(count($states)>0){
print "<option value=''>Seleccione Subsector</option>";
foreach ($states as $s) {
	print "<option value='$s->subsector'>$s->subsector</option>";
}
}else{
print "<option value=''>-- NO HAY DATOS --</option>";
}
?>