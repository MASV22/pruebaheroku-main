<?php 
//(OBTENER ENTRENAMIENTOS PROGRESO)
header("Access-Control-Allow-Origin: *");
require_once __DIR__ . '/vendor/autoload.php';

// Crear Cliente---------------------------------------------------------------------

$client = new MongoDB\Client('mongodb+srv://miguel:22699@cluster0.amgor.mongodb.net/?retryWrites=true&w=majority');

// Traer Base de datos---------------------------------------------------------------

$database = $client->MultimediaS;

// Crear o Traer coleccion-----------------------------------------------------------

$collection = $database->puntaje;

//Variables que necesito ------------------------------------------------------------

$usuarioid = $_GET['userid'];
$trainingid = $_GET['trainingid'];
$puntaje = $_GET['puntaje'];

// Actualizar un dato ---------------------------------------------------------------



// $filtro = ['email' => $Usuarioid];
$filtro = ['userID' => new MongoDB\BSON\ObjectId($usuarioid)];
$filtro2 = ['entrenamientoID' => new MongoDB\BSON\ObjectId($trainingid)];
$Busqueda = $collection->findOne(array(
    '$and' => array($filtro,$filtro2))
);



if($Busqueda != null)
{
    print("siiiii");

 
    $datosMundo = $Busqueda->jsonSerialize();  
    $var = json_encode($datosMundo); 
    print($var);     
         
    

    $update = ['$set' => ['puntaje' => $puntaje]];
    $Actualizar = $collection->updateOne($datosMundo,$update);
         


    // $datosCorreo = $Busqueda->jsonSerialize();
    // $var = json_encode($datosCorreo);
    // print($var);
    
    // $idEntrenamiento = 1;
    // $filtro2 = ['ID' => $idEntrenamiento];
    // $Busqueda2 = $collection->findOne($filtro2);
    // if ($Busqueda2 != null) 
    // {
    //     $datosCorreo = $Busqueda->jsonSerialize();
    //     $update = ['$set' => ['entrenamientos.'.$idEntrenamiento.'.progreso' => 55]];
    //     $Actualizar = $collection->updateOne($filtro,$update);
    // } 
    // else {
    //     print("NO encontró entrenamiento");
    // } 

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



