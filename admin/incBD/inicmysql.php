<?php
$linkmysql=mysql_connect("www.azatrade.info", "adminazatrade", "trade7x");
mysql_select_db("produccion",$linkmysql) OR DIE ("Error: No es posible establecer la conexion");
mysql_query ("SET NAMES 'utf8'");
?>