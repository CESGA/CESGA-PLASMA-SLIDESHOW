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
<link href="Estilos.css" rel="stylesheet" type="text/css" />
<LINK REL="SHORTCUT ICON" HREF="CESGA.ico">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>New Resource</title>
</head>
<body>

<?php
$realm = 'Restricted area';
include 'config.php';
//echo $pass;
?>

<FORM ACTION="guardar_datos.php" METHOD="GET">
<h1>New resource</h1>
Time:&nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp;
<input type="text" name="time" style="font-family:comic sans MS;">
<br />
Name:&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp;
<input type="text" name="name" style="font-family:comic sans MS;">
<br />
Resource URL:&nbsp &nbsp &nbsp &nbsp;
<input type="text" columns="200" name="resource" style="font-family:comic sans MS;">
<br />
<input type="submit" value="Send">
<input type="reset">
<br />
<br />
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
</html>
<?php
//}
?>