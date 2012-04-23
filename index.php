<?php
session_start();

if($_SESSION[$sessionvar]==NULL)
	{
	header('Location: login.php');
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>Manage</title>
<link href="Estilos.css" rel="stylesheet" type="text/css" />
<LINK REL="SHORTCUT ICON" HREF="CESGA.ico">
</head>
<body>

<h1>Main page</h1>
<a href="borrar.php">Delete</a>
&nbsp&nbsp&nbsp&nbsp;
|&nbsp&nbsp&nbsp&nbsp;
<!--<a href="buscar.php">New search</a>
&nbsp&nbsp&nbsp&nbsp;
|&nbsp&nbsp&nbsp&nbsp;-->
<a href="gallery.php">Play</a>
&nbsp&nbsp&nbsp&nbsp;
|&nbsp&nbsp&nbsp&nbsp;
<a href="altarecurso.php">New Source</a>
&nbsp&nbsp&nbsp&nbsp;
|&nbsp&nbsp&nbsp&nbsp;
<a href="logout.php">Log Out</a>
</body>
</html>