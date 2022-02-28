<?php
$accion = $_POST['accion'];
$estado = $_POST['estado'];
$id_foto = $_POST['id_foto'];
$ruta = '../../images/profile_pictures/' . $id_foto . '.jpg';
//codigo eliminar solicitud
if($accion === 'eliminarFoto') {
    if (isset($_POST)) {
		if (is_file($ruta)) {
			echo 'Existe';
			// chmod($ruta, 0777);
			if (!unlink($ruta)) {
				echo false;
				echo 'Existe';
			}
		} else {
			echo 'No se eliminó porque no éxiste';
		}
	};
}