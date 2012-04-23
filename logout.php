<?php
session_start();
$_SESSION[$sessionvar]=NULL;
?>

<html>
<head>
<link href="Estilos.css" rel="stylesheet" type="text/css" />
<LINK REL="SHORTCUT ICON" HREF="CESGA.ico">
<title>Logging out</title>
<meta http-equiv="Refresh" content="1;url=gallery.php">
</head>
<body>
<h4>You are logging out</h4>
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
	<a href="login.php">Log in</a>
</body>
</html>