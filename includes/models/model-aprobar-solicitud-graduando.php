<?php
date_default_timezone_set('America/Tegucigalpa');
$accion = $_POST['accion'];
$estado = $_POST['estado'];
$id_temp = $_POST['id_temp'];
$user_id = $_POST['user_id'];
$horaSolicitud = $_POST['horaSolicitud'];
$fechaSolicitud = $_POST['fechaSolicitud'];
$name = $_POST['nombres'];
$firstname = $_POST['firstname'];
$secondname = $_POST['secondname'];
$lastname = $_POST['apellidos'];
$primer_apellido = $_POST['primerapellido'];
$segundo_apellido = $_POST['segundoapellido'];
$class = $_POST['clase'];
$codigo = $_POST['codigo'];
$nickname = $_POST['nickname'];
$nationality = $_POST['nationality'];
$sex = $_POST['sex'];
//Información Personal
$dateHB = $_POST['dateHB'];
$hddate = date("Y-m-d", strtotime($dateHB));
$country = $_POST['country'];
$city = $_POST['city'];
$address = $_POST['address'];
$correo = $_POST['correo'];
$correo1 = $_POST['correo1'];
$correo2 = $_POST['correo2'];
$mobile = $_POST['mobile'];
$phone = $_POST['phone'];
$empresaLabora = $_POST['empresaLabora'];
$rubroEmpresaLabora = $_POST['rubroEmpresaLabora'];
$areasInteres = $_POST['areasInteres'];
$url_linkedin = $_POST['url_linkedin'];
$linkedin = $_POST['linkedin'];
$orientation = $_POST['orientation'];
//Información Académica
$programa = $_POST['programa'];
$empresaPasantia = $_POST['empresaPasantia'];
$direccionEmpresaPasantia = $_POST['direccionEmpresaPasantia'];
$rubroEmpresaPasantia = $_POST['rubroEmpresaPasantia'];
$experienciaPasantia = $_POST['experienciaPasantia'];
$areaInvestigacionPasantia = $_POST['areaInvestigacionPasantia'];
$asesorTesis = $_POST['asesorTesis'];
$tituloTesis = $_POST['tituloTesis'];
$urlTesis = $_POST['urlTesis'];
$financiado = $_POST['financiado'];
$fondos_zamorano = $_POST['fondos_zamorano'];
$fondos_propios = $_POST['fondos_propios'];
$fondos_entidades = $_POST['fondos_entidades'];
$otras_entidades = $_POST['otras_entidades'];

$linkedin = $_POST['linkedin'];
$fallecido = $_POST['fallecido'];
$fechaFallecido = $_POST['fechaFallecido'];
$fechaNotaDuelo = $_POST['fechaNotaDuelo'];
$estatus = $_POST['estatus'];
$pa = $_POST['pa'];
$anioIA = $_POST['anioIA'];
$dia_graduacion = $_POST['dia_graduacion'];
$mes_graduacion = $_POST['mes_graduacion'];
$codigoIA = $_POST['codigoIA'];

//Código para crear administradores
if ($accion === 'solicitud') {
    //Importar la conexión
    include '../conexion.php';

    try {
		$stmt_counter= $conn->prepare("UPDATE temporal_graduandos SET estado = ? WHERE id_temp = ?");
		$stmt_counter->bind_param('ss', $estado, $id_temp); 

        $stmt = $conn->prepare("UPDATE graduandos SET clase = ?, codigo = ?, nombres = ?, primer_nombre = ?, segundo_nombre = ?, apellidos = ?, primer_apellido = ?, segundo_apellido = ?, nickname = ?, nacionalidad = ?, genero = ?, fecha_nacimiento = ?, pais_reside = ?, ciudad = ?, direccion = ?, email = ?, email_2 = ?, email_3 = ?, telefono = ?, movil = ?, empresa_labora = ?, rubros = ?, programa = ?, orientacion = ?, lugar_pasantia = ?, direccion_pasantia = ?, rubro_empresa = ?, exp_pasantia = ?, area_investigacion = ?, titulo_tesis = ?, asesor_tesis = ?, url_tesis = ?, area_interes = ?, financiado_por = ?, linkedin = ?, url_linkedin = ?, otras_entidades = ?, fondos_zamorano = ?, fondos_propios = ?,fondos_entidades = ?,deceased = ?, date_deceased = ?,  fechaNotaDuelo = ?, estatus = ?, pa = ?, anioIA = ?, dia_graduacion = ?, mes_graduacion = ?, codigoIA = ? WHERE ID = ?");
		$stmt->bind_param("ssssssssssssssssssssssssssssssssssssssssssssssssss", $class, $codigo, $name, $firstname, $secondname, $lastname, $primer_apellido, $segundo_apellido, $nickname, $nationality, $sex, $hddate, $country, $city, $address, $correo, $correo1,$correo2, $phone, $mobile, $empresaLabora, $rubroEmpresaLabora, $programa, $orientation, $empresaPasantia, $direccionEmpresaPasantia, $rubroEmpresaPasantia, $experienciaPasantia, $areaInvestigacionPasantia, $tituloTesis, $asesorTesis, $urlTesis, $areasInteres, $financiado, $linkedin,$url_linkedin, $otras_entidades, $fondos_zamorano, $fondos_propios, $fondos_entidades, $fallecido, $fechaFallecido, $fechaNotaDuelo, $estatus, $pa, $anioIA, $dia_graduacion, $mes_graduacion, $codigoIA, $user_id);

		$stmt->execute();
		$stmt_counter->execute();
        if ($stmt->affected_rows > 0) {
            $respuesta = array(
                //Esto es lo que se muestra en
                //JSON.parse(xhr.responseText); console.log(respuesta);
                'respuesta' => 'correcto',
                'id_insertado' => $stmt->insert_id,
                'clase' => $class,
                'user_id' => $user_id,
                'lastname' => $lastname,
                'class' => $class,
                'codigo' => $codigo,
                'nickname' => $nickname,
                'nationality' => $nationality,
                'sex' => $sex,
                'dateHB' => $hddate,
                'country' => $country,
                'city' => $city,
                'address' => $address,
                'email' => $correo,
                'mobile' => $mobile,
                'phone' => $phone,
                'url_linkedin' => $url_linkedin,
                'areasInteres,' => $areasInteres,
                'programa' => $programa,
                'tipo' => $accion,
                'fondoz' => $fondos_zamorano,
                'fondop' => $fondos_propios,
                'fondoe' => $fondos_entidades,
                'fechaNotaDuelo' => $fechaNotaDuelo,
            );
        } else {
            $respuesta = array(
                'respuesta' => 'error',
            );
        }
        $stmt->close();
        $stmt_counter->close();
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
