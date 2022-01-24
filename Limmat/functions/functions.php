<?php


function formulario(){
	echo "
	
	<form name='formulario' action='functions/view.php' method='post' enctype='multipart/form-data'>
  
        
    <h1>Subir CSV</h1>
	
	<input type='hidden' name='MAX_FILE_SIZE' value='30000' />
    <input name='csvfile' type='file' />
    <input type='submit' value='Enviar fichero' />
    
    </form>
	
	
	";
	
}



function GetCSV($file, $delimiter = ","){

	if(!empty($file) && !empty($delimiter) && is_file($file)):
	
	$array_total = array();
	
	$fp = fopen($file,"r");
	
	while ($data = fgetcsv($fp, 10000, $delimiter)){

			$num = count($data);

			$array_total[] = array_map("utf8_encode",$data);

		}

		fclose($fp);

		return $array_total;

	else:

		return false;

	endif;
}

function recorrerArray($arraycsv){

    foreach($arraycsv as $i =>  $c){
        foreach($c as $ii => $cc){
            echo $i." y en ".$ii." hay ".$cc."</br>";
        }
    }
}

function personaConMasEdad($arraycsv){
	$mayorEdad = 0;
	$nombre = 0;
	foreach($arraycsv as $i =>  $c){
        foreach($c as $ii => $cc){
            if($ii==2){
				if($cc>	$mayorEdad){
						$mayorEdad=$cc;
						$nombre=$i;
				}
			}
        }
    }

	echo "</br>La persona con más edad es: ",$arraycsv[$nombre][0], " con: ", $mayorEdad, " años.";

}

function numeroHombresMujeres($arraycsv){
	$hombres = 0;
	$mujeres = 0;
	foreach($arraycsv as $i =>  $c){
        foreach($c as $ii => $cc){
            if($ii==1){
				if($cc=="M")$hombres++;	//else no, xk contaría la 1ª columna	
				if($cc=="F")$mujeres++;
			}
        }
    }

	echo "</br>Hay ",$hombres," hombres y ",$mujeres, " mujeres.</br>";

}

error_reporting(1);		// comentar esta linea para mostrar el error
// Notice: Undefined offset: 3 line 102 

function top5personasAltas($arraycsv){
	
	
	foreach($arraycsv as $i =>  $c){
		$aux[$i] = $c[3];
		
    }
	array_multisort($aux, SORT_DESC, $arraycsv);
	
	for($i=1;$i<6;$i++){
		echo $arraycsv[$i][0]," con ",$arraycsv[$i][3]," in</br>";
	}
	


}

function csvEnTabla($arraycsv){
	
	
	echo "<table>";
		
		foreach($arraycsv as $i =>  $c){
			echo "<tr>";
        foreach($c as $ii => $cc){
			echo "<td>",$cc,"</td>";
        } 
		echo "</tr>";
    }
	
	
	echo "</table>";
}






?>