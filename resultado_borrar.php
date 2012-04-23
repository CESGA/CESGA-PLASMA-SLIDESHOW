<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Resource deleted</title>

</head>
<body>
<h4>Result of process:</h4>&nbsp;
<br />

<?php
$nombre="\"".$_GET['name']."\"";
$archivo="recurso.js";
$file=fopen($archivo, "r+") or die("Fatal error");
$arch_temporal="recurso.tmp";
$file_tmp=fopen($arch_temporal, "w") or die("Error opening/creating temporary file");
$contador=1;

while(!feof($file))  
{
$cadena=("\"".fgets($file,4096));
$aux=explode(",", $cadena);

if (strstr($cadena, $nombre)==FALSE)
	{
	$principio=explode("(", $aux[0]);
	$aux[0]=("slides[" . $contador . "]");
	$contador++;
	if ($principio[1])
		{
		fwrite($file_tmp, $aux[0] . ' = new Array(' . $principio[1] . ',' . $aux[1] .','. $aux[2]);
		}
	}
}
echo "<br>Deleted process ended successfully";
echo "<br>";
fclose($file_tmp);
fclose($file);
$file=fopen($archivo, "w") or die("Fatal error");
$file_tmp=fopen($arch_temporal, "r") or die("Error opening/creating temporary file");
while(!feof($file_tmp)) fwrite($file, fgets($file_tmp));
fclose($file_tmp);
fclose($file);
unlink('recurso.tmp');
?>

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