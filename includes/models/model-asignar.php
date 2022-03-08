<?php
include '../funciones.php';
date_default_timezone_set('America/Tegucigalpa');
$asignar = $_POST['asignar'];
$id_user = $_POST['id_user'];
$bloque = $_POST['bloque'];
$lote = $_POST['lote'];
$estado = 'r';

//Código para crear administradores
if ($asignar === 'asignar') {
    //Importar la conexión
    include '../conexion.php';

    try {
        $stmt = $conn->prepare("UPDATE lotes SET id_registro = ?, estado = ? WHERE id_lote = ? and bloque LIKE ?");
		$stmt->bind_param('ssss', $id_user, $estado, $lote, $bloque);
		$stmt->execute();

        if ($stmt->affected_rows > 0) {
            $respuesta = array(
                //Esto es lo que se muestra en
                //JSON.parse(xhr.responseText); console.log(respuesta);
                'respuesta' => 'correcto',
				'id_user' => $id_user,
				'lote' => $lote,
				'bloque' => $bloque,
				'tipo' => $asignar,

            );
        } else {
            $respuesta = array(
                'respuesta' => 'error',
				'id_user' => $id_user,
				'lote' => $lote,
				'bloque' => $bloque,
				'tipo' => $asignar,
            );
        }
        $stmt->close();
        // $stmt_counter->close();
        $conn->close();
    } catch (Exception $e) {
//En caso de un error, tomar la exepción
        $respuesta = array(
//Arreglo asociativo
            'pass' => $e->getMessage(),
// 'pass' => $hash_password
        );
    }
    echo json_encode($respuesta);
}
