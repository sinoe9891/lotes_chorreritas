<?php  
    die(json_encode($_POST));

    $accion = $_POST['tipo'];
    $bloque = $_POST['bloque'];
    $numero = $_POST['numero'];

    //Código hacer la búsqueda
    if ($accion === 'buscar') {
        
        include '../conexion.php';

        // 'respuesta' => 'correcto',
        try {
            //Seleccionaremos al administrador de la base de datos
            $stmt = $conn->prepare('SELECT * FROM lotes WHERE bloque like ?  AND id_lote like ?');
            $stmt->bind_param('ss', $bloque, $numero);
            $stmt->execute();
            $result = $stmt->get_result();
            //Loguear el usuario
            if($result->num_rows > 0) {
                while($row = $result->fetch_array()) {
                  $respuesta = array(
                    'nombre' => $row['id_lote'],
                    'apellidos' => $row['bloque'],
                    // 'tipo' => $accion,
                );
              
                }
              }
            // $stmt->fetch();
            // if ($nombres || $apellidos || $genero) {
            //     //Si el usuario existe verificar el password
            //     $respuesta = array(
            //         'respuesta' => 'correcto',
            //         'nombre' => $nombres,
            //         'apellidos' => $apellidos,
            //         'genero' => $genero,
            //         'tipo' => $accion
            //     );
            
            // } 
            else{
                $respuesta = array(
                    'error' => 'Usuario no existe!'
                );
            }
            $stmt->close();
            $conn->close();

        } catch (Exception $e) {
            //En caso de un error, tomar la exepción
            $respuesta = array(
                //Arreglo asociativo
                'pass' => $e->getMessage()
                // 'pass' => $hash_password
            );
        }
        echo json_encode($respuesta);
    }

?>