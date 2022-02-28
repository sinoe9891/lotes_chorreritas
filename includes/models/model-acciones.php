<?php
$accion = $_POST['accion'];
$estado = $_POST['estado'];
$id_solicitud = $_POST['id'];

//codigo eliminar solicitud
if($accion === 'eliminar') {
    // importar la conexion
    include '../conexion.php';
    try {
        // Realizar la consulta a la base de datos
        $stmt = $conn->prepare("DELETE FROM temporal_update_210618 WHERE id_temp = ? ");
        $stmt->bind_param('s', $id_solicitud);
        $stmt->execute();
        if($stmt->affected_rows > 0) {
            $respuesta = array(
                'respuesta' => 'correcto'
            );
        }  else {
            $respuesta = array(
                'respuesta' => 'error'
            );
        }
        $stmt->close();
        $conn->close();
    } catch(Exception $e) {
        // En caso de un error, tomar la exepcion
        $respuesta = array(
            'error' => $e->getMessage()
        );
    }
    
    echo json_encode($respuesta);
}


//Actualizar Estado
if ($accion === 'actualizar') {
	// importar la conexion
    include '../conexion.php';

    try {
        // Realizar la consulta a la base de datos
        $stmt = $conn->prepare("UPDATE temporal_update_210618 set estado = ? WHERE id_temp = ? ");
        $stmt->bind_param('ss', $estado, $id_solicitud);
        $stmt->execute();
        if($stmt->affected_rows > 0) {
            $respuesta = array(
                'respuesta' => 'correcto'
            );
        }  else {
            $respuesta = array(
                'respuesta' => 'error'
            );
        }
        $stmt->close();
        $conn->close();
    } catch(Exception $e) {
        // En caso de un error, tomar la exepcion
        $respuesta = array(
            'error' => $e->getMessage()
        );
    }
    
    echo json_encode($respuesta);
}

