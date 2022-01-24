<!DOCTYPE html>
<html>
<head>
  <title>Inicio</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>


<?php

		$dir_subida = '../files/';
		$fichero_subido = $dir_subida . basename($_FILES['csvfile']['name']);

		echo '<pre>';
		if (move_uploaded_file($_FILES['csvfile']['tmp_name'], $fichero_subido)) {
			echo "El fichero es válido y se subió con éxito.\n";
		} else {
			echo "Error en la subida";
		}

		//print_r($_FILES);

		print "</pre>";


?>


<a class="btn btn-primary" href="../index.php"> VOLVER </a>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>
