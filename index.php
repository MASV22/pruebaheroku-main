<?php 
    //  (COMPARAR)
    header("Access-Control-Allow-Origin: *");
    require_once __DIR__ . '/vendor/autoload.php';
    // Crear Cliente---------------------------------------------------------------------
    $client = new MongoDB\Client('mongodb+srv://miguel:22699@cluster0.amgor.mongodb.net/?retryWrites=true&w=majority');
    // Traer Base de datos-----------------------------------------------------------------
    $database = $client->MultimediaS;
    // Crear o Traer coleccion-----------------------------------------------------------
    $collection = $database->usuario;
    // Logica de Login -------------------------------------------------------------------------------------

    //Variables que necesito -----------
    $Usuario = $_GET['Correo'];
    $Clave = $_GET['Clave'];
    $Puntaje =0;
    //-----------
    $stringCorreo = $Usuario;
    $stringclave = $Clave;
    //----------
    $filtroCorreo =['user' => $stringCorreo];
    $CORREO = $collection->findOne($filtroCorreo);
    if($CORREO != null){
       
        $datosCorreo = $CORREO->jsonSerialize();
       
        //echo "usuario: " . $CORREO[user] . " clave: " . $CORREO[password].".";

        // despues de jsonSerialize queda asi 
            /*
                {
                    _id : id de mongo ,
                    ID_USER : id del usuario ,
                    ID: id,
                    CORREO :Correo,
                    PASSWORD: Contraseña
                }
            */ 
            // Documento para instertar
            $document=[

                'user' => $stringCorreo,
                'password' => $stringclave,
            ];

            // Comprobar 
            if($datosCorreo->user != null && $datosCorreo->password != null)
            {
                if( $stringCorreo == $datosCorreo->user && $stringclave == $datosCorreo->password )
                {
                    $var = json_encode($datosCorreo);
                    die($var);




                // $existe = $collection2->findOne($filtroCorreo);
                    // if(!empty($existe) && $stringclave == $datosCorreo->PASSWORD)
                    // {  
                    //     //-----------
                    //   //  $filtro =['CORREO' => $stringCorreo];
                    //    // $document = $collection2->findOne($filtro);
                    //    // $datosPuntaje = $document->jsonSerialize();
                    //     //echo $datosPuntaje->PUNTAJE;
                    //    // $Puntaje = $datosPuntaje->PUNTAJE;
                    //     //Enviar a unity
                    //     //$enviar->PUNTAJE = $Puntaje;
                    //     //echo json_encode($enviar);
                    // } else 
                    // {
                    //     //$insertOneResult = $collection2->insertOne($document); 
                    //     echo 'Se agrego el campo correctamente';
                    // }                       
                }
                elseif($stringCorreo == $datosCorreo->user && $stringclave != $datosCorreo->password)
                {
                    echo 'Contraseña incorrecta';
                    echo 'La contraseña ingresada fue  '.$stringclave;
                }
                elseif($stringCorreo != $datosCorreo->user && $stringclave == $datosCorreo->password)
                {
                    echo 'Correo incorrecto';
                    echo 'El correo ingresado fue ' .$stringCorreo;
                }else
                {
                    echo 'Todos los datos estan incorrectos';
                    echo 'La contraseña ingresada fue  '.$stringclave;
                    echo 'El correo ingresado fue ' .$stringCorreo;
                }
            }else
            {
                echo 'Falta llenar los campos';
            }

    }else{
        echo("usuario no encontrado");
    }

    
?>


