<?
$link=mysql_connect("localhost", "root", "jopedis");
mysql_select_db("produccion",$link) OR DIE ("Error: No es posible establecer la conexión");
mysql_query ("SET NAMES 'utf8'"); 

/* Database connection start */
$servername = "localhost";
$username = "root";
$password = "jopedis";
$dbname = "produccion";

$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());
?>