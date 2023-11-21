<?
$link=mysql_connect("localhost", "azabusin_produ", "H6MCRokqNaA&");
mysql_select_db("azabusin_produccion",$link) OR DIE ("Error: No es posible establecer la conexión");
mysql_query ("SET NAMES 'utf8'"); 

/* CONEXION PARA LAS CONSULTA DE TABLAS
Database connection start */
$servername = "localhost";
$username = "azabusin_produ";
$password = "H6MCRokqNaA&";
$dbname = "azabusin_produccion";

$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());
?>