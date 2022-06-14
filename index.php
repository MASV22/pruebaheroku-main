<?php 
    //  (COMPARAR)
    header("Access-Control-Allow-Origin: *");
    require_once __DIR__ . '/vendor/autoload.php';
    // Crear Cliente---------------------------------------------------------------------
    $client = new MongoDB\Client('mongodb+srv://TBBLuxari:DMc53jwH5CIQAryP@prueba-puntos.veb9sop.mongodb.net/?retryWrites=true&w=majority');
    // Traet Base de datos-----------------------------------------------------------------
    // $database = $client->Allers;
    // // Crear o Traer coleccion-----------------------------------------------------------
    // $collection = $database->Usuarios;
    // $collection2 = $database->UsuariosHeroku;
    // // Logica de Login -------------------------------------------------------------------------------------

    // //Variables que necesito 
    // $Usuario = $_GET['Usuario'];
    // $Clave = $_GET['Clave'];
    // $Tiempo =$_GET['Tiempo'];
    // $Puntaje =0;
    // //-----------
    // $stringCorreo = $Usuario;
    // $stringclave = $Clave;
    //----------
    //$filtroCorreo =['CORREO' => $stringCorreo];
    //$CORREO = $collection->findOne($filtroCorreo);
    //$datosCorreo = $CORREO->jsonSerialize();


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
    // $document=[

    //     'CORREO' => $stringCorreo,
    //     'PUNTAJE' => 0,
    //     'INTENTO' => $Tiempo,
    // ];

    // Comprobar 
    // if($datosCorreo->CORREO != null && $datosCorreo->PASSWORD != null)
    // {
    //     if( $stringCorreo == $datosCorreo->CORREO && $stringclave == $datosCorreo->PASSWORD )
    //     {
    //         $existe = $collection2->findOne($filtroCorreo);
    //         if($stringclave == $datosCorreo->PASSWORD)
    //         {
    //             if(!empty($existe))
    //             {  
    //                 //-----------
    //                 $filtro =['CORREO' => $stringCorreo];
    //                 $document = $collection2->findOne($filtro);
    //                 $datosPuntaje = $document->jsonSerialize();
    //                 //echo $datosPuntaje->PUNTAJE;
    //                 $Puntaje = $datosPuntaje->PUNTAJE;
    //                 //Enviar a unity
    //                 $enviar->PUNTAJE = $Puntaje;
    //                 echo json_encode($enviar);
    //             } else 
    //             {
    //                 //$insertOneResult = $collection2->insertOne($document); 
    //                 //echo 'Se agrego el campo correctamente';
    //             } 
    //         }                      
    //     }
    //     elseif($stringCorreo == $datosCorreo->CORREO && $stringclave != $datosCorreo->PASSWORD)
    //     {
    //         //echo 'Contraseña incorrecta';
    //         //echo 'La contraseña ingresada fue  '.$stringclave;
    //     }
    //     elseif($stringCorreo != $datosCorreo->CORREO && $stringclave == $datosCorreo->PASSWORD)
    //     {
    //         //echo 'Correo incorrecto';
    //         //echo 'El correo ingresado fue ' .$stringCorreo;
    //     }else
    //     {
    //         //echo 'Todos los datos estan incorrectos';
    //         //echo 'La contraseña ingresada fue  '.$stringclave;
    //         //echo 'El correo ingresado fue ' .$stringCorreo;
    //     }
    // }else
    // {
    //     //echo 'Falta llenar los campos';
    // }
?>


