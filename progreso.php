<?php 
//(OBTENER ENTRENAMIENTOS PROGRESO)
header("Access-Control-Allow-Origin: *");
require_once __DIR__ . '/vendor/autoload.php';

// Crear Cliente---------------------------------------------------------------------

$client = new MongoDB\Client('mongodb+srv://miguel:22699@cluster0.amgor.mongodb.net/?retryWrites=true&w=majority');

// Traer Base de datos---------------------------------------------------------------

$database = $client->MultimediaS;

// Crear o Traer coleccion-----------------------------------------------------------

$collection = $database->usuario2;

//Variables que necesito ------------------------------------------------------------

$Usuarioid = $_GET['correo'];

// Actualizar un dato ---------------------------------------------------------------



$filtro = ['email' => $Usuarioid];
$Busqueda = $collection->findOne($filtro);



if($Busqueda != null)
{
    $datosCorreo = $Busqueda->jsonSerialize();
    $update = ['$set' => ['entrenamientos.0.progreso' => 5]];
    $Actualizar = $collection->updateOne($filtro,$update);

}
else{
    print("NO");
}

// $varlook = ['$lookup' => [
//     'from' => 'entrenamiento',
//     'localField' => 'entrenamientoID',
//     'foreignField' => '_id',
//     'as' => 'progreso']];

// $varmatch = [ // (2)
//     '$match'=>['entrenamientoID'=> '_id']
//     ];

// $showDetails = [ // (3)
//         '$project' => ['user' => 1, 'password' => 1, 'rol'=>1]
//         ];

// $result = $collection->aggregate([ $showDetails, $varlook, ]);
// $update = ['$set' => ['contenido' => $result]];
// $collection->aggregate([ $update ]);






// foreach ($result as $row){
//     echo "Page Name : " . $row['user']."
//     ";
//     echo "Content : " . $row['password']."
//     ";
//     echo "Subject ID: " . $row['rol']."
//     ";

//     var_dump($row['progreso']);
// }














?>



