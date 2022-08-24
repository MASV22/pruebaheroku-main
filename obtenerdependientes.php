<?php 
//(OBTENER DEPENDIENTES)

header("Access-Control-Allow-Origin: *");
require_once __DIR__ . '/vendor/autoload.php';

// Crear Cliente---------------------------------------------------------------------

$client = new MongoDB\Client('mongodb+srv://miguel:22699@cluster0.amgor.mongodb.net/?retryWrites=true&w=majority');

// Traer Base de datos---------------------------------------------------------------

$database = $client->MultimediaS;

// Crear o Traer coleccion-----------------------------------------------------------

$collection = $database->usuario;

$filtro = ['rol' => 1];

$Datos = $collection->find($filtro);

if($Datos != null)
{
    foreach ($Datos as $doc) {
        $datosDependiente = $doc->jsonSerialize();
        $var = json_encode($datosDependiente);
        echo($var);
    }


}



?>



