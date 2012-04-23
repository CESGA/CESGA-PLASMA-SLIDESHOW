<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<link href="Estilos.css" rel="stylesheet" type="text/css" />
	<LINK REL="SHORTCUT ICON" HREF="CESGA.ico">
	<title>Action completed</title>
	<link href="Estilos.css" rel="stylesheet" type="text/css" />
	<LINK REL="SHORTCUT ICON" HREF="CESGA.ico">
    
	</head>
	<body>
	<Content ID="Content1" ContentPlaceHolderID="ContentPlaceHolder1">

	<h3>Finished</h1>
	<br />

<?php
$archivo="recurso.js";
$file=fopen($archivo, "a");
$lines = (count(file($archivo))+1);
fclose($file);
//if ($lines === 0) $lines=1;
$archivo="recurso.js";
$file=fopen($archivo, "a");
$time=$_GET['time'];
$nombre=$_GET['name'];
$srecurso=$_GET['resource'];

if(is_numeric($time)) {
	{
	if(stristr($srecurso, 'http://')===FALSE)
		{
		echo "error";
		}else
		{
		/*The data is save in the array correctly
		the first part of array is the time in second that the resource is on screen
		the second part is the name of resource
		the ttird part is the URL resource.*/

		fwrite($file, 'slides[');
		fwrite($file, $lines);
		fwrite($file, '] = new Array(');
		fwrite($file, $time);
		fwrite($file, ' , "');
		fwrite($file, $nombre);
		fwrite($file, '" , "');
		fwrite($file, $srecurso);
		fwrite($file, '");');
		fwrite($file, "\r\n");
		fclose($file);
		echo "The resource has been added successfully.";
		}
	}
} else echo "error";
?>

</Content>
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
</body>
</html>