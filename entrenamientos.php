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

//Variables que necesito ------------------------------------------------------------

$Mundo = $_GET['Mundo'];

// Actualizar un dato ---------------------------------------------------------------

$filtro = ['mundo' => $Mundo];
$Datos = $collection->findOne($filtro);


if($Datos != null){

//    foreach($Datos as $doc) 
//    {

//         $datosMundo = $doc->jsonSerialize();
//         $var = json_encode($datosMundo);
//         echo($var);
        
//    }

    $datosMundo = $Datos->jsonSerialize();
    $arreglo = array($datosMundo,$datosMundo);
    $var = json_encode($arreglo);
    echo($var);

}
else 
{
    $var = json_encode(null);
    die($var);
}



?>



