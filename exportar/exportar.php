<?php
include '../includes/conexion.php';
$mes = $_POST["mesNacimiento"];
$mesNacimiento = ($mes - (1));
$meses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
$query = "SELECT `nombres`, `apellidos`, `email`, `email_2`, `genero`, `fecha_nacimiento` FROM graduat3s WHERE MONTH(fecha_nacimiento) = $mes ORDER BY `nombres`, `apellidos`, `email`, `email_2` ASC";
$result = mysqli_query($conn, $query) or die("database error:" . mysqli_error($conn));
$records = array();
while ($rows = mysqli_fetch_assoc($result)) {
	$records[] = $rows;
}
if (isset($_POST["export_csv_data"])) {
	header('Content-Encoding: UTF-8');
	header("Content-Type: text/csv");
	header("Content-Disposition: attachment; filename=cumpleañeros_$meses[$mesNacimiento].csv");
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

//Exportar en XLS
if (isset($_POST["export_xls_data"])) {
	header("Content-Type: application/vnd.ms-excel");
	header("Content-Disposition: attachment; filename=cumpleañeros_$meses[$mesNacimiento].xls");
	?>
<style>
	th, td{
		outline: thin solid
	}
</style>
<table id="" class="table table-striped table-bordered">
	<tr>
		<th>Nombres</th>
		<th>Apellidos</th>
		<th>Email</th>
		<th>Email_2</th>
		<th>Género</th>
		<th>Birthdate</th>
	</tr>
	<tbody>
		<?php foreach ($records as $record) { 
			?>
			<tr>
				<td><?php echo utf8_encode($record['nombres']); ?></td>
				<td><?php echo utf8_encode($record['apellidos']); ?></td>
				<td><?php echo utf8_encode($record['email']); ?></td>
				<td><?php echo utf8_encode($record['email_2']); ?></td>
				<td><?php echo utf8_encode($record['genero']); ?></td>
				<td><?php echo utf8_encode($record['fecha_nacimiento']); ?></td>
			</tr>
		<?php } ?>
	</tbody>
</table>

<?php
	;

	exit;
}
?>
<?php
	
?>
// <?php
// include 'conexion.php';
// $query = "SELECT name, gender, address, designation, age FROM developers LIMIT 10";
// $result = mysqli_query($conn, $query) or die("database error:" . mysqli_error($conn));

// $records = array();
// if(isset($_POST["export_csv_data"])){
// 	while ($r = $result->fetch_object()) {
// 		echo $r->name.",";
// 		echo $r->gender.",";
// 		echo $r->age.",";
// 		echo $r->designation.",";
// 		echo $r->address."\n";
// 	}
// }

// header("Content-Type: text/csv");
// header("Content-Disposition: attachment; filename=cumpleñeros_.csv");

