<?php 
//(ACTUALIZAR)
header("Access-Control-Allow-Origin: *");
require_once __DIR__ . '/vendor/autoload.php';
// Crear Cliente---------------------------------------------------------------------
$client = new MongoDB\Client('mongodb+srv://TBBLuxari:DMc53jwH5CIQAryP@prueba-puntos.veb9sop.mongodb.net/?retryWrites=true&w=majority');

// Traer Base de datos---------------------------------------------------------------
$database = $client->Allers;
// Crear o Traer coleccion-----------------------------------------------------------
$collection2 = $database->UsuariosHeroku;

$PuntajeUnity = $_GET['PuntajeUnity'];
$CorreoUnity = $_GET['CorreoUnity'];
$TiempoUnity = $_GET['TiempoUnity'];

// Actualizar un dato ---------------------------------------------------------------

// $filtro = ['CORREO' => $CorreoUnity];
// $update = ['$set' => ['PUNTAJE' => intval($PuntajeUnity) , 'INTENTO' => $TiempoUnity]];

// $Actualizar = $collection2->updateOne($filtro,$update);


$document=[

    'CORREO' => $CorreoUnity,
    'PUNTAJE' => $PuntajeUnity,
    'INTENTO' => $TiempoUnity,
];


$insertOneResult = $collection2->insertOne($document); 



echo 'Actualizado'


?>



