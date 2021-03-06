<?php
include '../funciones.php';
date_default_timezone_set('America/Tegucigalpa');
$horaSolicitud = $_POST['horaSolicitud'];
$fechaSolicitud = $_POST['fechaSolicitud'];
$name = $_POST['nombres'];
$fechanac = $_POST['fechanac'];
$identidad = $_POST['identidad'];
$nacionalidad = $_POST['nacionalidad'];
$genero = $_POST['genero'];
$estado_civil = $_POST['estado_civil'];
$pais_reside = $_POST['pais_reside'];
$direccion = $_POST['direccion'];
$ciudad = $_POST['ciudad'];
$departamento = $_POST['departamento'];
$email = $_POST['email'];
$celular = $_POST['celular'];
$telefono = $_POST['telefono'];
$dependientes = $_POST['dependientes'];

$profesion = $_POST['profesion'];
$empresa_labora = $_POST['empresa_labora'];
$direccion_empleo = $_POST['direccion_empleo'];
$telefono_empleo = $_POST['telefono_empleo'];
$cargo = $_POST['cargo'];
$tiempo_laborando = $_POST['tiempo_laborando'];

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

$fecha_pago = $_POST['fecha_pago'];
$fecha_primer_cuota = $_POST['fecha_cuota'];
$plazo_anio = $_POST['plazo_pago'];




$accion = $_POST['accion'];

//funcion insertar documento
function insertar_documento($id, $ruta)
{
	include '../conexion.php';
	$statement = $conn->prepare("INSERT INTO ficha_documentos (id_ficha, ruta_documentos) VALUES (?,?)");
	$statement->bind_param('ss', $id, $ruta);
	$statement->execute();
	return;
}


//C??digo para crear administradores
if ($accion === 'solicitud') {
	//Importar la conexi??n
	include '../conexion.php';
	try {
		$statement = $conn->prepare("INSERT INTO ficha_directorio (fecha_solicitud, hora_solicitud, nombre_completo, fecha_nacimiento, nacionalidad, identidad, genero, estado_civil, direccion, telefono, celular, dependientes, correo, ciudad, departamento, profesion, lugar_empleo, direccion_empleo, cargo, tiempo_laborando, telefono_empleo, fecha_primer_cuota, plazo_anio, dia_pago) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
		$statement->bind_param('ssssssssssssssssssssssss', $fechaSolicitud, $horaSolicitud, $name, $fechanac, $nacionalidad, $identidad, $genero, $estado_civil, $direccion, $telefono, $celular, $dependientes, $email, $ciudad, $departamento, $profesion, $empresa_labora, $direccion_empleo, $cargo, $tiempo_laborando, $telefono_empleo, $fecha_primer_cuota, $plazo_anio, $fecha_pago);
		$statement->execute();
		$last_id = mysqli_insert_id($conn);

		// Conyugue
		$statement = $conn->prepare("INSERT INTO conyugue (id_registro, identidad_conyugue, fechnac_conyugue, nombre_conyugue, celular_conyugue, empresa_labora_conyugue, telefono_empleo_conyugue, cargo_conyugue, tiempo_laborando_conyugue) VALUES (?,?,?,?,?,?,?,?,?)");
		$statement->bind_param('sssssssss',$last_id, $identidad_conyugue, $fechnac_conyugue, $nombre_conyugue, $celular_conyugue, $empresa_labora_conyugue, $telefono_empleo_conyugue, $cargo_conyugue,  $tiempo_laborando_conyugue);
		$statement->execute();
		
		//Financiero
		$statement = $conn->prepare("INSERT INTO financiera (id_registro, sueldos, remesas, otros_ingresos, prestamos, alquiler, otros_egresos) VALUES (?,?,?,?,?,?,?)");
		$statement->bind_param('sssssss', $last_id, $sueldos, $remesas, $otros_ingresos, $prestamos, $alquiler, $otros_egresos);
		$statement->execute();
		
		//Referencias
		$statement = $conn->prepare("INSERT INTO referencias (id_registro, nombre_referencia, direccion_referencia, celular_referencia, telefono_referencia, empresa_labora_referencia, telefono_empleo_referencia) VALUES (?,?,?,?,?,?,?)");
		$statement->bind_param('sssssss', $last_id, $nombre_referencia_1, $direccion_referencia_1, $celular_referencia_1, $telefono_referencia_1, $empresa_labora_referencia_1, $telefono_empleo_referencia_1);
		$statement->execute();

		$statement = $conn->prepare("INSERT INTO referencias (id_registro, nombre_referencia, direccion_referencia, celular_referencia, telefono_referencia, empresa_labora_referencia, telefono_empleo_referencia) VALUES (?,?,?,?,?,?,?)");
		$statement->bind_param('sssssss', $last_id, $nombre_referencia_2, $direccion_referencia_2, $celular_referencia_2, $telefono_referencia_2, $empresa_labora_referencia_2, $telefono_empleo_referencia_2);
		$statement->execute();
		
		$statement = $conn->prepare("INSERT INTO beneficiario (id_registro, nombre_beneficiario, identidad_beneficiario, genero_beneficiario, direccion_beneficiario, ciudad_beneficiario, departamento_beneficiario, celular_beneficiario) VALUES (?,?,?,?,?,?,?,?)");
		$statement->bind_param('ssssssss', $last_id, $nombre_beneficiario, $identidad_beneficiario, $genero_beneficiario, $direccion_beneficiario, $ciudad_beneficiario, $departamento_beneficiario, $celular_beneficiario);
		$statement->execute();

		if ($statement->affected_rows > 0) {
			$respuesta = array(
				//Esto es lo que se muestra en
				//JSON.parse(xhr.responseText); console.log(respuesta);
				'respuesta' => 'correcto',
				'name' => $name,
				'tipo' => $accion,
				'id_agregado' => $last_id
			);
		} else {
			$respuesta = array(
				'respuesta' => 'error',
			);
		}
		$statement->close();
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
