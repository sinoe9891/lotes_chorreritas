<?php
include '../includes/conexion.php';
$mes = $_GET['mesSolicitud'];
$mesSolicitud = ($mes - (1));
$ano = date('Y');
$meses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre', 'Todo');
if ($_GET['mesSolicitud'] === '13') {
	$query = "SELECT * FROM temporal_update_210618 ORDER BY fecha_solicitud DESC";
	$result = mysqli_query($conn, $query) or die("database error:" . mysqli_error($conn));
	$records = array();
}else{
	$query = "SELECT * FROM temporal_update_210618 WHERE MONTH(fecha_solicitud) = '$mes' AND YEAR(NOW()) ORDER BY fecha_solicitud DESC";
	$result = mysqli_query($conn, $query) or die("database error:" . mysqli_error($conn));
	$records = array();
}
while ($rows = mysqli_fetch_assoc($result)) {
	$records[] = $rows;
}
if (isset($_GET["export_csv_data"])) {
	header('Content-Encoding: UTF-8');
	header("Content-Type: text/csv");
	header("Content-Disposition: attachment; filename=solicitudes_".strtolower($meses[$mesSolicitud])."_$ano.csv");
	$fh = fopen('php://output', 'w');
	$is_coloumn = true;
	if (!empty($records)) {
		foreach ($records as $record) {
			if ($is_coloumn) {
				fputcsv($fh, array_keys($record));
				$is_coloumn = false;
			}
			fputcsv($fh, array_values($record));
		}
		fclose($fh);
	} 
	exit;
}
