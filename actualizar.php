<?php 
//(ACTUALIZAR)
header("Access-Control-Allow-Origin: *");
require_once __DIR__ . '/vendor/autoload.php';
// Crear Cliente---------------------------------------------------------------------
$client = new MongoDB\Client('mongodb+srv://miguel:22699@cluster0.amgor.mongodb.net/?retryWrites=true&w=majority');

// Traer Base de datos---------------------------------------------------------------
$database = $client->MultimediaS;
// Crear o Traer coleccion-----------------------------------------------------------
$collection = $database->usuario;

//Variables que necesito ------------------------------------------------------------

$Usuario = $_GET['Usuario'];
$ClaveActual = $_GET['Clave0'];
$ClaveNueva = $_GET['Clave1'];
$ClaveNuevaConfirm = $_GET['Clave2'];

// Actualizar un dato ---------------------------------------------------------------

$filtro = ['user' => $Usuario];
$CORREO = $collection->findOne($filtro);

if($CORREO != null){

    $datosCorreo = $CORREO->jsonSerialize();

    if($ClaveActual == $datosCorreo->password)
    {
        if($ClaveNueva == $ClaveNuevaConfirm)
        {
            $update = ['$set' => ['password' => $ClaveNueva]];
            $Actualizar = $collection->updateOne($filtro,$update);
        }
        else 
        {
            $var = json_encode(null);
            die($var);
        }

    }
    else 
    {
        $var = json_encode(null);
        die($var);
    }

}
else 
{
    $var = json_encode(null);
    die($var);
}

// $document=[

//     'CORREO' => $CorreoUnity,
//     'PUNTAJE' => $PuntajeUnity,
//     'INTENTO' => $TiempoUnity,
// ];


// $insertOneResult = $collection2->insertOne($document); 



?>



