<?php
$accion = $_POST['accion'];
$estado = $_POST['estado'];
$id_solicitud = $_POST['id'];
$archivoZip = $_POST['archivoZip'];

// Elimianar carpeta
function rmDir_rf($carpeta)
{
	foreach (glob($carpeta . "/*") as $archivos_carpeta) {
		if (is_dir($archivos_carpeta)) {
			rmDir_rf($archivos_carpeta);
		} else {
			unlink($archivos_carpeta);
		}
	}
	rmdir($carpeta);
}


//codigo eliminar solicitud
if ($accion === 'eliminar') {
	rmDir_rf('../../src/upload/' . $id_solicitud);
	unlink('../../src/upload/zip/'.$archivoZip.'.zip');
	// importar la conexion
	include '../conexion.php';
	try {
		// Realizar la consulta a la base de datos
		$stmt = $conn->prepare("DELETE FROM ficha_directorio WHERE id = ? ");
		$stmt->bind_param('s', $id_solicitud);
		$stmt->execute();
		if ($stmt->affected_rows > 0) {
			$respuesta = array(
				'respuesta' => 'correcto',
				'ruta' => $id_solicitud,
				'archivoZip' => $archivoZip
			);
		} else {
			$respuesta = array(
				'respuesta' => 'error'
			);
		}
		$stmt->close();
		$conn->close();
	} catch (Exception $e) {
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
		$stmt = $conn->prepare("UPDATE ficha_directorio set estado = ? WHERE id = ? ");
		$stmt->bind_param('ss', $estado, $id_solicitud);
		$stmt->execute();
		if ($stmt->affected_rows > 0) {
			$respuesta = array(
				'respuesta' => 'correcto'
			);
		} else {
			$respuesta = array(
				'respuesta' => 'error'
			);
		}
		$stmt->close();
		$conn->close();
	} catch (Exception $e) {
		// En caso de un error, tomar la exepcion
		$respuesta = array(
			'error' => $e->getMessage()
		);
	}

	echo json_encode($respuesta);
}
