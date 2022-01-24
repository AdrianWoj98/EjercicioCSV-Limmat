<!DOCTYPE html>
<html>
<head>
  <title>Inicio</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php
include_once('functions/functions.php');

$nombre_fichero = 'files/biostats.csv';

if (file_exists($nombre_fichero)) {
	
    $arraycsv = GetCSV("files/biostats.csv");
	echo "Archivo CSV cargado";
	//print_r($arraycsv); 
	//echo recorrerArray($arraycsv) ;
	
	
	
	echo "<h3> Persona con mayor Edad </h3>";
	echo personaConMasEdad($arraycsv);
	
	echo "<h3> Numero de Hombres y Mujeres </h3>";
	echo numeroHombresMujeres($arraycsv);
	
	echo "<h3> Las 5 personas más altas</h3>";
	echo top5personasAltas($arraycsv);
	
	echo "<h3> Tabla en HTML del CSV </h3>";
	echo csvEnTabla($arraycsv);
	
	
	
	
	
} else {
    formulario();
}


?>






</body>
</html>
