<?php
date_default_timezone_set('America/Tegucigalpa');
$accion = $_POST['accion'];
$user_id = $_POST['user_id'];
$id_register = $_POST['id_register'];
$bloque = $_POST['bloque'];
$areav2 = $_POST['areav2'];
$estado = $_POST['estado'];
$path = $_POST['path'];

if ($estado == 'd') {
	$estado = 'd';
	$id_register = 0;
}elseif ($estado == 'v') {
	$estado = 'v';
	$id_register = $_POST['id_register'];
}elseif($estado == 'r'){
	$estado = 'r';
	$id_register = $_POST['id_register'];
}

//Código para crear administradores
if ($accion === 'solicitud') {
    //Importar la conexión
    include '../conexion.php';

    try {
        $stmt = $conn->prepare("UPDATE lotes SET  bloque = ?, areav2 = ?, estado = ?, path_lote = ?, id_registro = ? WHERE id_lote = ?");
		$stmt->bind_param('ssssss', $bloque, $areav2, $estado, $path, $id_register, $user_id);
		$stmt->execute();

        if ($stmt->affected_rows > 0) {
            $respuesta = array(
                //Esto es lo que se muestra en
                //JSON.parse(xhr.responseText); console.log(respuesta);
                'respuesta' => 'correcto',
                // 'id_insertado' => $stmt->insert_id,
                'user_id' => $user_id,
                'estado' => $estado,
                'area' => $areav2,
				'tipo' => $accion,
				'bloque' => $bloque,
				'path' => $path,
				'id_registro' => $id_register
            );
        } else {
            $respuesta = array(
                'respuesta' => 'error',
                'user_id' => $user_id,
                'estado' => $estado,
                'area' => $areav2,
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
