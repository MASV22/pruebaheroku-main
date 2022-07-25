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
    $arreglofinal = array();

    $showDetails = [ // (3)
        '$project' => ['_id' => 1]
        ];

        $result = $collection->aggregate([ $showDetails]);

   foreach($result as $doc) 
   {
        /// Buscar datos id -----------------------------

        $datos2 = $doc->jsonSerialize();
        array_push($arreglo, $datos2->_id);     
   }

$array = json_decode(json_encode($arreglo), true);


for ($i=0; $i < count($array); $i++) { 
    $prueba = $array[$i]['$oid'];
    array_push($arreglofinal, $prueba);
}

print_r ($arreglofinal[1]);

}
else 
{
    $var = json_encode(null);
    die($var);
}



?>



