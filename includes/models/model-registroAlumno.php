<?php
//die(json_encode($_POST));
//Var = POST(datos.append(nombre, var))
$accion = $_POST['accion'];
// $password = $_POST['password'];
$class = $_POST['clase'];
$codigo = $_POST['codigo'];
$name = $_POST['nombres'];
$lastname = $_POST['apellidos'];
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
$mobile = $_POST['mobile'];
$phone = $_POST['phone'];
$empresaLabora = $_POST['empresaLabora'];
$rubroEmpresaLabora = $_POST['rubroEmpresaLabora'];
$areasInteres = $_POST['areasInteres'];
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

//Código para crear administradores
if ($accion === 'crear') {
//Hashear Password
    $opciones = array(
        'cost' => 12,
    );

    //Necesitamos 3 paramentros, Contraseña, algoritmo de encriptación, opciones(arreglo)
    // $hash_password = password_hash($password, PASSWORD_BCRYPT, $opciones);
    //Importar la conexión
    include '../conexion.php';

    try {
        //Realizar la consulta a la base de datos
        $stmt = $conn->prepare("INSERT INTO temporal_update_21 (clase, codigo, nombres, apellidos, nickname, nacionalidad,
            genero, fecha_nacimiento, pais_reside, ciudad, direccion, email, movil, telefono, empresa_labora, rubros, programa, orientacion, url_linkedin, lugar_pasantia, direccion_pasantia,rubro_empresa, exp_pasantia, area_investigacion, asesor_tesis, titulo_tesis, url_tesis, area_interes, financiado_por) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param('sssssssssssssssssssssssssssss', $class, $codigo, $name, $lastname, $nickname, $nationality, $sex,
            $hddate, $country, $city, $address, $correo, $mobile, $phone, $empresaLabora, $rubroEmpresaLabora, $programa, $orientation, $linkedin, $empresaPasantia, $direccionEmpresaPasantia, $rubroEmpresaPasantia, $experienciaPasantia, $areaInvestigacionPasantia, $asesorTesis, $tituloTesis, $urlTesis, $areasInteres, $financiado);
        $stmt->execute();
        if ($stmt->affected_rows > 0) {
            $respuesta = array(
                //Esto es lo que se muestra en
                //JSON.parse(xhr.responseText); console.log(respuesta);
                'respuesta' => 'correcto',
                'id_insertado' => $stmt->insert_id,
                'name' => $name,
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
                'areasInteres,' => $areasInteres,
                'programa' => $programa,
                'tipo' => $accion,
            );
        } else {
            $respuesta = array(
                'respuesta' => 'error',
            );
        }
        $stmt->close();
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
