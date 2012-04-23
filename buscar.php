<?php
if($login==false) header('Location: login.php');
?>

<html>
<head>
<title>Search resource</title>
<link href="Estilos.css" rel="stylesheet" type="text/css" />
<LINK REL="SHORTCUT ICON" HREF="CESGA.ico">
</head>
<body>
<h2>Search</h2>

<form action="resultado_buscar.php" method="get">
Name:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp;
<input type="text" name="nombre" />
<input type="submit" value="Search">
<input type="reset">
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
	<a href="altarecurso.php">New Source</a>
	&nbsp&nbsp&nbsp&nbsp;
	|&nbsp&nbsp&nbsp&nbsp;
	<a href="logout.php">Log Out</a>
</body>
</html>