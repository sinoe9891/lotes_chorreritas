<?php  
    //die(json_encode($_POST));

    $accion = $_POST['tipo'];
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $genero = $_POST['sex'];
    $codigo = $_POST['codigo'];
    $clase = $_POST['clase'];
    $nacionality = $_POST['nationality'];

    //Código hacer la búsqueda
    if ($accion === 'buscar') {
        
        include '../conexion.php';

        // 'respuesta' => 'correcto',
        try {
            //Seleccionaremos al administrador de la base de datos
            $stmt = $conn->prepare('SELECT * FROM graduat3s WHERE nombres like ?  AND apellidos like ? AND genero like ?');
            $stmt->bind_param('sss', $nombres, $apellidos, $genero);
            $stmt->execute();
            $result = $stmt->get_result();
            //Loguear el usuario
            if($result->num_rows > 0) {
                while($row = $result->fetch_array()) {
                  $respuesta = array(
                    'nombre' => $row[$nombres],
                    'apellidos' => $row[$apellidos],
                    'genero' => $row[$genero],
                    'tipo' => $row[$accion],
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