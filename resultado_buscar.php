<html>
<head>
<title>Result</title>
</head>
<body>

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
<br />
<h4>Result of search:</h4>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp;
</body>
</html>

<?php
$comillas="\"";
$i=0;
$nombre=$_GET['nombre'];
$archivo="recurso.js";
$file=fopen($archivo, "r") or die("Fatal error");
$imprimir;w

while(!feof($file))  
{
$cadena=fgets($file);
$aux=explode("\"", $cadena);

if(strstr($cadena, $nombre)==FALSE)
	{
	$imprimir[] = "$nombre was not found";
	}else
	{
	$imprimir[] = $aux[1] . " - " . $aux[3];
	}
}

print_r($imprimir);

fclose($file);
?>