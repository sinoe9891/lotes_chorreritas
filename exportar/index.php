<?php
include '../includes/conexion.php';
$query = "SELECT `nombres`, `apellidos`, `email`, `email_2`, `genero`, `fecha_nacimiento` FROM graduat3s WHERE MONTH(fecha_nacimiento) = 03 ORDER BY `nombres`, `apellidos`, `email`, `email_2` ASC";
$result = mysqli_query($conn, $query) or die("database error:" . mysqli_error($conn));
$records = array();
while ($rows = mysqli_fetch_assoc($result)) {
	$records[] = $rows;
}
?>
<style>
	th, td{
		outline: thin solid
	}
</style>
<div class="well-sm col-sm-12">
	<div class="btn-group pull-right">
		<form action="exportar.php" method="post">
			<div class="input">
				<div class="campo">
					<div class="icon">
						<img src="images/icons/profile.svg" alt="">
					</div>
					<select name="mesNacimiento" id="mesNacimiento" required>
						<option value="">Seleccionar mes</option>
						<option value="1">ENERO</option>
						<option value="2">FEBRERO</option>
						<option value="3">MARZO</option>
						<option value="4">ABRIL</option>
						<option value="5">MAYO</option>
						<option value="6">JUNIO</option>
						<option value="7">JULIO</option>
						<option value="8">AGOSTO</option>
						<option value="9">SEPTIEMBRE</option>
						<option value="10">OCTUBRE</option>
						<option value="11">NOVIEMBRE</option>
						<option value="12">DICIEMBRE</option>
					</select>
				</div>
			</div>
			<button type="submit" id="export_csv_data" name='export_csv_data' value="Export to CSV" class="btn btn-info">Export to CSV</button>
			<button type="submit" id="export_xls_data" name='export_xls_data' value="Export to XLS" class="btn btn-info">Export to XLS</button>
		</form>
	</div>
</div>
<table id="" class="table table-striped table-bordered">
<tr style="border: 1px;background: #84ffc6;">
		<th>Name</th>
		<th>Gender</th>
		<th>Age</th>
		<th>Designation</th>
		<th>Address</th>
		<th>Address</th>
	</tr>
	<tbody>
		<?php foreach ($records as $record) { ?>
			<tr>
				<td><?php echo $record['nombres']; ?></td>
				<td><?php echo $record['apellidos']; ?></td>
				<td><?php echo $record['email']; ?></td>
				<td><?php echo $record['email_2']; ?></td>
				<td><?php echo $record['genero']; ?></td>
				<td><?php echo $record['fecha_nacimiento']; ?></td>
			</tr>
		<?php } ?>
	</tbody>
</table>