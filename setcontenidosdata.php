<?php 
//(ESTABLECER PUNTAJES EN 0)

header("Access-Control-Allow-Origin: *");
require_once __DIR__ . '/vendor/autoload.php';

// Crear Cliente---------------------------------------------------------------------

$client = new MongoDB\Client('mongodb+srv://miguel:22699@cluster0.amgor.mongodb.net/?retryWrites=true&w=majority');

// Traer Base de datos---------------------------------------------------------------

$database = $client->MultimediaS;

// Crear o Traer coleccion-----------------------------------------------------------

$collection = $database->contenidos;
$collection2 = $database->entrenamiento;

$datoContenidoid = $_GET['contenidoid'];

$contenidoid = new MongoDB\BSON\ObjectId($datoContenidoid);

$Datos = $collection->find();
$Datos2 = $collection2->find();

if ($datoContenidoid != null) {

    if($Datos != null)
    {

        $arregloContenido = array();
        $arregloEntrenamiento = array();
        // $arreglofinal = array();

        foreach($Datos as $doc) 
        {
            /// Buscar datos id y establecer parametros title -----------------------------

            array_push($arregloContenido, $doc -> _id);  
            $tituloContenido =  $doc -> entrenamiento;

            /// Buscar por medio de entrenamientoID y Userid si existe en la tabla puntaje------------
            $filtro = ['entrenamiento' => $tituloContenido];
            print_r($filtro);

        }
        print_r($arregloContenido);
    }
   // print_r($arregloContenido);



    if($Datos2 != null)
    {
        foreach($Datos2 as $doc2) 
        {
            /// Buscar datos id y establecer parametros id y title -----------------------------

            array_push($arregloEntrenamiento, $doc2 -> _id);  
            $tituloEntrenamiento =  $doc2 -> title;
            /// Buscar por medio de entrenamientoID y Userid si existe en la tabla puntaje------------
            $filtro2 = ['title' => $tituloEntrenamiento];
            print_r($filtro2);
   

            /// Buscar por medio de entrenamientoID y Userid si existe en la tabla puntaje------------
            // $filtro = ['entrenamiento' => $b];
            // $filtro2 = ['entrenamientoID' => $a];
            // $Busqueda = $collection2->findOne(array(
            //     '$and' => array($filtro2,$filtro))
            // );
            
            // $var = json_encode($Busqueda);
            

            // if ($Busqueda == NULL) 
            // {
            //     print("agregó");
            //     $collection2->insertOne(

            //         [
            //             'userID' => new MongoDB\BSON\ObjectId($usuarioid),
            //             'entrenamientoID' => new MongoDB\BSON\ObjectId($a),
            //             'puntaje' => 0,
            //             'entrenamientoTitle' => $b,
            //             'meta' => $c,
            //         ]

            //     );
            // }
        } 
    } 
    
}
else 
{
    $var = json_encode(null);
    die($var);
}



?>



