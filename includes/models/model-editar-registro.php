<?php
date_default_timezone_set('America/Tegucigalpa');
$id_user = $_POST['id_user'];
$nombres = $_POST['nombres'];
$fechanac = $_POST['fechanac'];
$nacionalidad = $_POST['nacionalidad'];
$identidad = $_POST['identidad'];
$genero = $_POST['genero'];
$estado_civil = $_POST['estado_civil'];
$direccion = $_POST['direccion'];
$ciudad = $_POST['ciudad'];
$departamento = $_POST['departamento'];
$telefono = $_POST['telefono'];
$celular = $_POST['celular'];
$dependientes = $_POST['dependientes'];
$email = $_POST['email'];
$profesion = $_POST['profesion'];
$empresa_labora = $_POST['empresa_labora'];
$direccion_empleo = $_POST['direccion_empleo'];
$cargo = $_POST['cargo'];
$tiempo_laborando = $_POST['tiempo_laborando'];
$telefono_empleo = $_POST['telefono_empleo'];
$pais_reside = $_POST['pais_reside'];

$sueldos = $_POST['sueldos'];
$remesas = $_POST['remesas'];
$otros_ingresos = $_POST['otros_ingresos'];
$prestamos = $_POST['prestamos'];
$alquiler = $_POST['alquiler'];
$otros_egresos = $_POST['otros_egresos'];

$nombre_conyugue = $_POST['nombre_conyugue'];
$fechnac_conyugue = $_POST['fechnac_conyugue'];
$identidad_conyugue = $_POST['identidad_conyugue'];
$celular_conyugue = $_POST['celular_conyugue'];
$empresa_labora_conyugue = $_POST['empresa_labora_conyugue'];
$telefono_empleo_conyugue = $_POST['telefono_empleo_conyugue'];
$cargo_conyugue = $_POST['cargo_conyugue'];
$tiempo_laborando_conyugue = $_POST['tiempo_laborando_conyugue'];

$id_referencia_1 = $_POST['id_referencia_1'];
$nombre_referencia_1 = $_POST['nombre_referencia_1'];
$direccion_referencia_1 = $_POST['direccion_referencia_1'];
$celular_referencia_1 = $_POST['celular_referencia_1'];
$telefono_referencia_1 = $_POST['telefono_referencia_1'];
$empresa_labora_referencia_1 = $_POST['empresa_labora_referencia_1'];
$telefono_empleo_referencia_1 = $_POST['telefono_empleo_referencia_1'];

$id_referencia_2 = $_POST['id_referencia_2'];
$nombre_referencia_2 = $_POST['nombre_referencia_2'];
$direccion_referencia_2 = $_POST['direccion_referencia_2'];
$celular_referencia_2 = $_POST['celular_referencia_2'];
$telefono_referencia_2 = $_POST['telefono_referencia_2'];
$empresa_labora_referencia_2 = $_POST['empresa_labora_referencia_2'];
$telefono_empleo_referencia_2 = $_POST['telefono_empleo_referencia_2'];

$nombre_beneficiario = $_POST['nombre_beneficiario'];
$genero_beneficiario = $_POST['genero_beneficiario'];
$identidad_beneficiario = $_POST['identidad_beneficiario'];
$direccion_beneficiario = $_POST['direccion_beneficiario'];
$ciudad_beneficiario = $_POST['ciudad_beneficiario'];
$departamento_beneficiario = $_POST['departamento_beneficiario'];
$celular_beneficiario = $_POST['celular_beneficiario'];
$accion = $_POST['accion'];

//C??digo para crear administradores
if ($accion === 'solicitud') {
	//Importar la conexi??n
	include '../conexion.php';
	//nombre_completo, fecha_nacimiento, nacionalidad, identidad, genero, estado_civil, direccion, ciudad, departamento, telefono, celular, dependientes, correo, profesion, lugar_empleo, direccion_empleo, cargo, tiempo_laborando, telefono_empleo
	try {
		$stmt = $conn->prepare("UPDATE ficha_directorio a, conyugue b, beneficiario c, financiera d, referencias e SET a.nombre_completo= ?, a.fecha_nacimiento= ?, a.nacionalidad= ?, a.identidad= ?, a.genero= ?, a.estado_civil= ?, a.direccion= ?, a.ciudad= ?, a.departamento= ?, a.telefono= ?, a.celular= ?, a.dependientes= ?, a.correo= ?, a.profesion= ?, a.lugar_empleo= ?, a.direccion_empleo= ?, a.cargo= ?, a.tiempo_laborando= ?, a.telefono_empleo = ?, a.pais_reside = ?, b.nombre_conyugue= ?, b.identidad_conyugue= ?, b.fechnac_conyugue= ?, b.celular_conyugue= ?, b.empresa_labora_conyugue= ?, b.telefono_empleo_conyugue= ?, b.cargo_conyugue= ?, b.tiempo_laborando_conyugue= ?, c.nombre_beneficiario = ?, c.identidad_beneficiario = ?, c.genero_beneficiario = ?, c.direccion_beneficiario = ?, c.ciudad_beneficiario = ?, c.departamento_beneficiario = ?, c.celular_beneficiario= ?, d.sueldos=?, d.remesas=?, d.otros_ingresos=?, d.prestamos=?, d.alquiler=?, d.otros_egresos=?, e.nombre_referencia = ?, e.direccion_referencia = ?, e.celular_referencia = ?, e.telefono_referencia= ?, e.empresa_labora_referencia=?, e.telefono_empleo_referencia=?  WHERE a.id = ? and b.id_registro = ? and c.id_registro = ? and d.id_registro = ? and e.id_referencia = ? and e.id_registro = ?");
		$stmt->bind_param('sssssssssssssssssssssssssssssssssssssssssssssssssssss', $nombres, $fechanac, $nacionalidad, $identidad, $genero, $estado_civil, $direccion, $ciudad, $departamento, $telefono, $celular, $dependientes, $email, $profesion, $empresa_labora, $direccion_empleo, $cargo, $tiempo_laborando, $telefono_empleo, $pais_reside, $nombre_conyugue, $identidad_conyugue, $fechnac_conyugue,  $celular_conyugue, $empresa_labora_conyugue, $telefono_empleo_conyugue, $cargo_conyugue, $tiempo_laborando_conyugue, $nombre_beneficiario, $identidad_beneficiario, $genero_beneficiario, $direccion_beneficiario, $ciudad_beneficiario, $departamento_beneficiario, $celular_beneficiario, $sueldos, $remesas, $otros_ingresos, $prestamos, $alquiler, $otros_egresos, $nombre_referencia_1, $direccion_referencia_1, $celular_referencia_1, $telefono_referencia_1, $empresa_labora_referencia_1, $telefono_empleo_referencia_1, $id_user, $id_user, $id_user, $id_user, $id_referencia_1, $id_user);
		$stmt->execute();

		$stmt1 = $conn->prepare("UPDATE referencias SET nombre_referencia = ?, direccion_referencia = ?, celular_referencia = ?, telefono_referencia= ?, empresa_labora_referencia=?, telefono_empleo_referencia=? WHERE id_referencia = ? and id_registro = ?");
		$stmt1->bind_param('ssssssss', $nombre_referencia_2, $direccion_referencia_2, $celular_referencia_2, $telefono_referencia_2, $empresa_labora_referencia_2, $telefono_empleo_referencia_2, $id_referencia_2, $id_user);
		$stmt1->execute();

		if ($stmt->affected_rows > 0 || $stmt1->affected_rows > 0 || $stmt1->affected_rows = 0 || $stmt->affected_rows = 0) {
			$respuesta = array(
				//Esto es lo que se muestra en
				//JSON.parse(xhr.responseText); console.log(respuesta);
				'respuesta' => 'correcto',
				// 'id_insertado' => $stmt->insert_id,
				'user_id' => $id_user,
				'nombre_completo' => $nombres,
				'telefono' => $telefono,
				'id_referencia_1' => $id_referencia_1,
				'nombre_referencia' => $nombre_referencia_1,
				'estado_civil' => $estado_civil,
				'pais_reside' => $pais_reside,
				'genero' => $genero,
				'tipo' => $accion
			);
		} else {
			$respuesta = array(
				'respuesta' => 'error',
				'user_id' => $id_user,
				'nombre_completo' => $nombres,
				'id_referencia_1' => $id_referencia_1,
				'nombre_referencia_1' => $nombre_referencia_1,
				'profesion' => $profesion,
				'estado_civil' => $estado_civil,
				'genero' => $genero,
				'tipo' => $accion
			);
		}
		$stmt->close();
		// $stmt_counter->close();
		$conn->close();
	} catch (Exception $e) {
		//En caso de un error, tomar la exepci??n
		$respuesta = array(
			//Arreglo asociativo
			'pass' => $e->getMessage(),
			// 'pass' => $hash_password
		);
	}
	echo json_encode($respuesta);
}
