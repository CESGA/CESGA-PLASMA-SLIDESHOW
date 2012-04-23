<?php
session_start();

if($_SESSION[$sessionvar]==NULL)
	{
	header('Location: login.php');
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Delete resource</title>
<link href="Estilos.css" rel="stylesheet" type="text/css" />
<LINK REL="SHORTCUT ICON" HREF="CESGA.ico">
</head>
<body>
<h2>Delete page</h2>
<h4>Once you clicked on a "delete" link the resource will be removed automatically and it can't be restored.</h4>
<content id="ContentPlaceHolder1">
<form action="resultado_borrar.php" method="get">
<div>
</div>

<?php
$archivo="recurso.js";
$file=fopen($archivo, "r") or die("Fatal error");
$i=0;
$lineas = (count(file($archivo)));

//echo "<table align=center>" . "<br>";
for($i=0; $i<$lineas; $i++)
	{
	$listado=explode(",", fgets($file));
	echo $listado[1];
	$nombre_send=explode("\"", $listado[1]);
	//hyperlink to delete
	// ******************************
	// I write in "a" label the address to the deleting page
	// with the name of resource to delete
	// ******************************
	echo "&nbsp&nbsp&nbsp&nbsp;";
	echo "<a href=\"";
	echo "resultado_borrar.php?name=";
	echo $nombre_send[1];
	echo "\"";
	echo ">Delete</a>";
	echo "<br>";
	print_r($url);
	}
fclose($file);
echo "</table>";
?>
</form>
<br />
	<a href="borrar.php">Delete</a>
	&nbsp&nbsp&nbsp&nbsp;
	|&nbsp&nbsp&nbsp&nbsp;
    <!--<a href="buscar.php">New search</a>
	&nbsp&nbsp&nbsp&nbsp;
	|&nbsp&nbsp&nbsp&nbsp;-->
	<a href="gallery.php">Play</a>
	&nbsp&nbsp&nbsp&nbsp;
	|&nbsp&nbsp&nbsp&nbsp;
	<a href="altarecurso.php">New source</a>
	&nbsp&nbsp&nbsp&nbsp;
	|&nbsp&nbsp&nbsp&nbsp;
	<a href="logout.php">Log Out</a>
	</content>
</body>
</html>