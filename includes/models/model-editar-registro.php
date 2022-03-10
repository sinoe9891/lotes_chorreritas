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

$nombre_referencia_1 = $_POST['nombre_referencia_1'];
$direccion_referencia_1 = $_POST['direccion_referencia_1'];
$celular_referencia_1 = $_POST['celular_referencia_1'];
$telefono_referencia_1 = $_POST['telefono_referencia_1'];
$empresa_labora_referencia_1 = $_POST['empresa_labora_referencia_1'];
$telefono_empleo_referencia_1 = $_POST['telefono_empleo_referencia_1'];
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

// if ($estado == 'd') {
// 	$estado = 'd';
// 	$id_register = 0;
// } elseif ($estado == 'v') {
// 	$estado = 'v';
// 	$id_register = $_POST['id_register'];
// } elseif ($estado == 'r') {
// 	$estado = 'r';
// 	$id_register = $_POST['id_register'];
// }

//Código para crear administradores
if ($accion === 'solicitud') {
	//Importar la conexión
	include '../conexion.php';
	//nombre_completo, fecha_nacimiento, nacionalidad, identidad, genero, estado_civil, direccion, ciudad, departamento, telefono, celular, dependientes, correo, profesion, lugar_empleo, direccion_empleo, cargo, tiempo_laborando, telefono_empleo
	try {
		$stmt = $conn->prepare("UPDATE ficha_directorio a, conyugue b, beneficiario c, financiera d SET a.nombre_completo= ?, a.fecha_nacimiento= ?, a.nacionalidad= ?, a.identidad= ?, a.genero= ?, a.estado_civil= ?, a.direccion= ?, a.ciudad= ?, a.departamento= ?, a.telefono= ?, a.celular= ?, a.dependientes= ?, a.correo= ?, a.profesion= ?, a.lugar_empleo= ?, a.direccion_empleo= ?, a.cargo= ?, a.tiempo_laborando= ?, a.telefono_empleo = ?, a.pais_reside = ?, b.nombre_conyugue= ?, b.identidad_conyugue= ?, b.fechnac_conyugue= ?, b.celular_conyugue= ?, b.empresa_labora_conyugue= ?, b.telefono_empleo_conyugue= ?, b.cargo_conyugue= ?, b.tiempo_laborando_conyugue= ?, c.nombre_beneficiario = ?, c.identidad_beneficiario = ?, c.genero_beneficiario = ?, c.direccion_beneficiario = ?, c.ciudad_beneficiario = ?, c.departamento_beneficiario = ?, c.celular_beneficiario= ?, d.id_financiera= ?, d.sueldos=?, d.remesas=?, d.otros_ingresos=?, d.prestamos=?, d.alquiler=?, d.otros_egresos=? WHERE a.id = ? and b.id_registro = ? and c.id_registro = ? and d.id_registro = ?");
		$stmt->bind_param('ssssssssssssssssssssssssssssssssssssssssssssss', $nombres, $fechanac, $nacionalidad, $identidad, $genero, $estado_civil, $direccion, $ciudad, $departamento, $telefono, $celular, $dependientes, $email, $profesion, $empresa_labora, $direccion_empleo, $cargo, $tiempo_laborando, $telefono_empleo, $pais_reside, $nombre_conyugue, $identidad_conyugue, $fechnac_conyugue,  $celular_conyugue, $empresa_labora_conyugue, $telefono_empleo_conyugue, $cargo_conyugue, $tiempo_laborando_conyugue, $nombre_beneficiario, $identidad_beneficiario, $genero_beneficiario, $direccion_beneficiario, $ciudad_beneficiario, $departamento_beneficiario, $celular_beneficiario, $id_financiera, $sueldos, $remesas, $otros_ingresos, $prestamos, $alquiler, $otros_egresos, $id_user, $id_user, $id_user, $id_user);
		$stmt->execute();
		
				
// id_financiera	
// id_registro	
// sueldos	
// remesas	
// otros_ingresos	
// prestamos	
// alquiler	
// otros_egresos

		// $smtp1 =$conn->prepare("UPDATE financiera d SET d.id_financiera= ?, d.sueldos=?, d.remesas=?, d.otros_ingresos=?, d.prestamos=?, d.alquiler=?, d.otros_egresos=? WHERE d.id_registro = ?");
		// $smtp1->bind_param('ssssssssss', $id_financiera, $sueldos, $remesas, $otros_ingresos, $prestamos, $alquiler, $otros_egresos, $id_user);
		// $smtp1->bind_param('sss', d.$nombre_conyugue, $identidad_conyugue, $id_user);
		// $smtp1->execute();

		if ($stmt->affected_rows > 0) {
			$respuesta = array(
				//Esto es lo que se muestra en
				//JSON.parse(xhr.responseText); console.log(respuesta);
				'respuesta' => 'correcto',
				// 'id_insertado' => $stmt->insert_id,
				'user_id' => $id_user,
				'nombre_completo' => $nombres,
				'telefono' => $telefono,
				'nacionalidad' => $nacionalidad,
				'profesion' => $profesion,
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
				'telefono' => $telefono,
				'nacionalidad' => $nacionalidad,
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
		//En caso de un error, tomar la exepción
		$respuesta = array(
			//Arreglo asociativo
			'pass' => $e->getMessage(),
			// 'pass' => $hash_password
		);
	}
	echo json_encode($respuesta);
}
