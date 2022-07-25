<?php 
//(ACTUALIZAR PUNJATES)

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

$filtro = ['userID' => new MongoDB\BSON\ObjectId($usuarioid)];
$filtro2 = ['entrenamientoID' => new MongoDB\BSON\ObjectId($trainingid)];
$Busqueda = $collection->findOne(array(
    '$and' => array($filtro,$filtro2))
);

if($Busqueda != null)
{
    $datosMundo = $Busqueda->jsonSerialize();  
    $var = json_encode($datosMundo); 
    print($var);     
         
    $update = ['$set' => ['puntaje' => intval($puntaje)]];
    $Actualizar = $collection->updateOne($datosMundo,$update);     
}
else{
    print("NO");
}


?>



