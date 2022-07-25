<?php 
//(OBTENER ENTRENAMIENTOS)
header("Access-Control-Allow-Origin: *");
require_once __DIR__ . '/vendor/autoload.php';
// Crear Cliente---------------------------------------------------------------------
$client = new MongoDB\Client('mongodb+srv://miguel:22699@cluster0.amgor.mongodb.net/?retryWrites=true&w=majority');

// Traer Base de datos---------------------------------------------------------------
$database = $client->MultimediaS;
// Crear o Traer coleccion-----------------------------------------------------------
$collection = $database->entrenamiento;

$Datos = $collection->find();


if($Datos != null){

    $arreglo = array();
    $arreglo2 = array();
    $arreglofinal = array();

    $showDetails = [ // (3)
        '$project' => ['_id' => 1]
        ];

        $result = $collection->aggregate([ $showDetails]);

   foreach($result as $doc) 
   {

        // $datosMundo = $doc->jsonSerialize();
        // array_push($arreglo, $datosMundo);   

        $datos2 = $doc->jsonSerialize();
        // print_r($datos2->_id);
        array_push($arreglo2, $datos2->_id); 

        
   }

//    $var = json_encode($arreglo2);
   $array = json_decode(json_encode($arreglo2), true);
//    print_r((string)$arreglo2[1]);
// echo json_encode($array[2]);

//var_dump($array[2]['$oid']);

for ($i=0; $i < count($array); $i++) { 
    $prueba = $array[$i]['$oid'];
    array_push($arreglofinal, $prueba);
}

print_r ($arreglofinal[1]);





//    var_dump($arreglo);
    // $var = json_encode($arreglo);
//    echo gettype($var);
//     echo($var);

}
else 
{
    $var = json_encode(null);
    die($var);
}



?>



