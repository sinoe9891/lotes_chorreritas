<?php
date_default_timezone_set('America/Tegucigalpa');
//Obtener página actual remplazando .php por vacio.
function obtenerPaginaActual(){
    $archivo = basename($_SERVER['PHP_SELF']);
    $pagina = str_replace(".php", "", $archivo);
    return $pagina;
}
function back(){
    // header('Location:'.$_SERVER['HTTP_REFERER']);
	$back = basename($_SERVER['HTTP_REFERER']);
    $pagina = str_replace(".php", "", $back);
    return $pagina;
}
function anoActual(){
    $year = date("Y");
    echo $year;
}
//quitar acentos
function quitar_acentos($cadena){
	$originales = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿ';
	$modificadas = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyyby';
	$cadena = utf8_decode($cadena);
	$cadena = strtr($cadena, utf8_decode($originales), $modificadas);
	return utf8_encode($cadena);
}

/* Obtener todos las solicitudes */
function obtenerSolicitudes() {
    include 'conexion.php';
    try {
        return $conn->query("SELECT id_temp, fecha_solicitud, hora_solicitud, estado, clase, nombres, apellidos FROM temporal_update_210618 ORDER BY fecha_solicitud DESC");
    } catch(Exception $e) {
        echo "Error! : " . $e->getMessage();
        return false;
    }
}

/* Obtener todos las solicitudes */
function obtenerNumeroSolicitudes() {
	include 'conexion.php';
    try {
		return $conn->query("SELECT * FROM ficha_directorio WHERE estado = 0 ORDER BY id DESC");
    } catch(Exception $e) {
		echo "Error! : " . $e->getMessage();
        return false;
    }
}
/* Obtener todos las solicitudes Graduandos*/
function obtenerSolicitudesGraduandos() {
	include 'conexion.php';
	try {
		return $conn->query("SELECT id_temp, fecha_solicitud, hora_solicitud, estado, clase, nombres, apellidos FROM temporal_graduandos ORDER BY fecha_solicitud DESC");
	} catch(Exception $e) {
		echo "Error! : " . $e->getMessage();
		return false;
	}
}
/* Obtener todos los perfiles de graduandos */
function obtenerNumeroGraduandos() {
    include 'conexion.php';
    try {
        return $conn->query("SELECT * FROM temporal_graduandos WHERE estado = 0 ORDER BY id_temp DESC");
    } catch(Exception $e) {
        echo "Error! : " . $e->getMessage();
        return false;
    }
}
/* Obtener todos los perfiles de graduandos */
function obtenerFichas() {
    include 'conexion.php';
    try {
        return $conn->query("SELECT * FROM ficha_directorio WHERE estado = 0 ORDER BY id DESC");
    } catch(Exception $e) {
        echo "Error! : " . $e->getMessage();
        return false;
    }
}

function obtenerGraduandosFaltantes() {
    include 'conexion.php';
    try {
        return $conn->query("SELECT * FROM graduates.graduandos t1 WHERE NOT EXISTS (SELECT NULL FROM graduates.temporal_graduandos t2 WHERE t2.nombres = t1.nombres) order by t1.mes_graduacion");
    } catch(Exception $e) {
        echo "Error! : " . $e->getMessage();
        return false;
    }
}

/* Obtener todos las solicitudes de actualización */
function obtenerInfoLote($id = null) {
    include 'conexion.php';
    try {
        return $conn->query("SELECT * FROM lotes WHERE id_lote = {$id}");

    } catch(Exception $e) {
        echo "Error! : " . $e->getMessage();
        return false;
    }
}
/* Obtener todos las solicitudes de actualización */
function obtenerListaLote() {
    include 'conexion.php';
    try {
        return $conn->query("SELECT * FROM lotes");

    } catch(Exception $e) {
        echo "Error! : " . $e->getMessage();
        return false;
    }
}
/* Obtener todos las solicitudes de actualización */
function obtenerInfoLoteCliente($id = null) {
    include 'conexion.php';
    try {
        return $conn->query("SELECT * FROM lotes WHERE id_registro = {$id}");

    } catch(Exception $e) {
        echo "Error! : " . $e->getMessage();
        return false;
    }
}

/* Obtener todos las solicitudes de actualización */
function obtenerInfoSolicitud($id = null) {
    include 'conexion.php';
    try {
        return $conn->query("SELECT * FROM ficha_directorio WHERE id = {$id}");

    } catch(Exception $e) {
        echo "Error! : " . $e->getMessage();
        return false;
    }
}
function obtenerInfoFichaPerfil($id = null) {
    include 'conexion.php';
    try {
        return $conn->query("SELECT * FROM ficha_directorio a, conyugue b, financiera c WHERE a.id = {$id} and b.id_registro = {$id} and c.id_registro = {$id}");

    } catch(Exception $e) {
        echo "Error! : " . $e->getMessage();
        return false;
    }
}
function obtenerRerferencias($id = null) {
    include 'conexion.php';
    try {
        return $conn->query("SELECT * FROM ficha_directorio a, referencias b WHERE a.id = {$id} and b.id_registro = {$id}");

    } catch(Exception $e) {
        echo "Error! : " . $e->getMessage();
        return false;
    }
}
function obtenerFinanciera($id = null) {
    include 'conexion.php';
    try {
        return $conn->query("SELECT * FROM ficha_directorio a, financiera b WHERE a.id = {$id} and b.id_registro = {$id}");

    } catch(Exception $e) {
        echo "Error! : " . $e->getMessage();
        return false;
    }
}
function obtenerBeneficiario($id = null) {
    include 'conexion.php';
    try {
        return $conn->query("SELECT * FROM ficha_directorio a, beneficiario b WHERE a.id = {$id} and b.id_registro = {$id}");

    } catch(Exception $e) {
        echo "Error! : " . $e->getMessage();
        return false;
    }
}
/* Obtener todos las solicitudes de actualización */
function obtenerInfoSolicitudGraduando($id = null) {
    include 'conexion.php';
    try {
        return $conn->query("SELECT * FROM temporal_graduandos WHERE id_temp = {$id}");

    } catch(Exception $e) {
        echo "Error! : " . $e->getMessage();
        return false;
    }
}
/* Obtener toda la información actual de GRADUANDOSy compararla*/
function obtenerInfoGraduandosActual($id = null) {
    include 'conexion.php';
    try {
        return $conn->query("SELECT * FROM graduandos WHERE ID = {$id}");

    } catch(Exception $e) {
        echo "Error! : " . $e->getMessage();
        return false;
    }
}
/* Obtener toda la información actual y compararla*/
function obtenerInfoGraduadoActual($id = null) {
    include 'conexion.php';
    try {
        return $conn->query("SELECT * FROM ficha_directorio WHERE id = {$id}");

    } catch(Exception $e) {
        echo "Error! : " . $e->getMessage();
        return false;
    }
}

/* Obtener información de graduandos */
function obtenerInfoGraduandos($id = null) {
    include 'conexion.php';
    try {
        return $conn->query("SELECT * FROM graduandos WHERE ID = {$id}");

    } catch(Exception $e) {
        echo "Error! : " . $e->getMessage();
        return false;
    }
}