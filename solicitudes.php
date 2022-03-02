<?php
include 'includes/funciones.php';
include 'includes/sesiones.php';
include 'includes/conexion.php';
include 'includes/templates/header.php';
// Obtener el ID de la URL
// if(isset($_GET['id_proyecto'])) {
//     $id_proyecto = $_GET['id_proyecto'];
// }
// 
?>
<style>
	@media (max-width: 768px) {
		#tabla>tbody>tr th {
			line-height: 17px;
			/* padding: 0 7px; */
		}

		td p {
			font-size: 12px;
		}

		.acciones {
			display: flex;
			align-items: center;
		}

		.acciones>a>.fas,
		.far,
		.fa-trash {
			font-size: 11px;
		}

	}
</style>

<div class="contenedor">
	<div class="contenedor-index">
		<div class="nav-logo">
			<div class="logo graduate-logo">
				<div class="caja">
					<a href="index.php">
						<div class="back">
							<img src="images/icons/arrow-left.svg" alt="">
							<p style="margin-left:5px;">Regresar a Inicio</p>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="contenedor-formulario">
	<div class="logo">
		<!-- <img src="images/logo-direccion-02.png" alt=""> -->
	</div>
	<div class="contenedor-login">
		<!-- AQUI VA EL CODIGO  -->
		<div class="caja-solicitud">
			<div class="img-formulario">
				<!-- <img src="images/icons/perfil.svg" alt=""> -->
				<div class="titulo-form">
					<h3>Precontratos de Compra Venta de Lote</h3>
					<?php
					$solicitudes = obtenerSolicitudes('id_temp');
					?>
				</div>
				<div style="display: flex;justify-content: space-around;flex-wrap: wrap;">
					<form id="solicitudes" method="get" action="solicitudes.php">
						<div class="titulo-form">
							<div class="inputs-search">
								<div class="input">
									<div class="campo">
										<div class="icon">
											<img src="images/icons/profile.svg" alt="">
										</div>
										<select name="mesSolicitud" id="mesSolicitud" required>
											<option value="13">Todos</option>
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
							</div>
							<div class="campo">
								<input type="submit" class="boton" value="Buscar solicitudes por mes">
							</div>
						</div>
					</form>
					<form id="solicitudes" method="get" action="exportar/exportar-solicitudes.php">
						<div class="titulo-form">
							<div class="inputs-search">
								<div class="input">
									<div class="campo">
										<div class="icon">
											<img src="images/icons/profile.svg" alt="">
										</div>
										<select name="mesSolicitud" id="mesSolicitud" required>
											<option value="13">Todas</option>
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
							</div>
							<div class="campo">
								<input type="submit" id="export_csv_data" name='export_csv_data' class="boton" value="Exportar a CSV">
							</div>
						</div>
					</form>
				</div>
			</div>
			<?php
			if (isset($_GET['mesSolicitud'])) {
				$mesSolicitado = $_GET['mesSolicitud'];
				if ($mesSolicitado == 13) {
					$mes = $_GET['mesSolicitud'];
					$mesSolicitud = ($mes - (1));
					$meses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
					$consulta = $conn->query("SELECT * FROM ficha_directorio ORDER BY fecha_solicitud DESC, hora_solicitud DESC");
			?>
					<div class="img-formulario">
						<div class="titulo-form">
							<?php
							if ($consulta->num_rows > 1 || $consulta->num_rows <= 0) {
								echo '<h3>' . $consulta->num_rows . ' total de precontratos</h3>';
							} else {
								echo '<h3>' . $consulta->num_rows . ' solicitud</h3>';
							}
							?>
						</div>
					</div>
					<table style="width:100%" id="tabla">
						<tr>
							<th>No.</th>
							<th>Fecha Solicitud</th>
							<th>Nombre Completo</th>
							<th>Gestionar</th>
						</tr>
						<?php
						// CONDICIÓN FALLECIDO
						$numero = 1;
						while ($solicitud = $consulta->fetch_array()) {
							// $fallecido = $row['deceased'];
							// $notaDuelo = $row['fechaNotaDuelo'];
							// $hora_solicitud = $row['hora_solicitud'];
						?>
							<tr id="solicitud:<?php echo $solicitud['id'] ?>">
								<!-- <td><p><?php echo $solicitud['id']; ?></p></td> -->
								<td>
									<p><?php echo $numero++; ?></p>
								</td>
								<td>
									<p><?php echo $solicitud['hora_solicitud'] . " | " . date("d-m-Y", strtotime($solicitud['fecha_solicitud'])); ?></p>
								</td>
								<td>
									<p><?php echo $solicitud['nombre_completo'] ?></p>
								</td>
								<td>
									<div class="acciones">
										<a href="ver-solicitud.php?ID=<?php echo $solicitud['id'] ?>" target="_self"><i class="fas fa-eye"></i></a>
										<i class="far fa-check-circle <?php echo ($solicitud['estado'] === '1' ? 'completo' : '') ?>"></i>
										<i class="fas fa-trash"></i>
									</div>
								</td>
							</tr>
						<?php
						}
					} else if ($mesSolicitado < 13) {
						$mes = $_GET['mesSolicitud'];
						$mesSolicitud = ($mes - (1));
						$meses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
						$consulta = $conn->query("SELECT * FROM ficha_directorio WHERE MONTH(fecha_solicitud) = '$mes' AND YEAR(NOW()) ORDER BY fecha_solicitud DESC, hora_solicitud DESC");

						?>
						<div class="img-formulario">
							<div class="titulo-form">
								<?php

								$resultado = $consulta->num_rows;
								if ($consulta->num_rows > 1 || $consulta->num_rows <= 0) {
									echo '<h3>' . $resultado . ' resultados del mes de <br> ' . strtolower($meses[$mesSolicitud]) . ' de ' . $consulta->num_rows . ' solicitudes en total</h3>';
								} else {
									echo '<h3>' . $resultado . ' resultado del mes de <br> ' . strtolower($meses[$mesSolicitud]) . ' de ' . $consulta->num_rows . ' solicitudes total</h3>';
								}
								?>
							</div>
						</div>
						<table style="width:100%" id="tabla">
							<tr>
								<th>No.</th>
								<th>Fecha Solicitud</th>
								<th>Nombre Completo</th>
								<th>Gestionar</th>
							</tr>
							<?php
							// CONDICIÓN FALLECIDO
							$numero = 1;
							while ($solicitud = $consulta->fetch_array()) {
								// $fallecido = $row['deceased'];
								// $notaDuelo = $row['fechaNotaDuelo'];
								// $hora_solicitud = $row['hora_solicitud'];
							?>
								<tr id="solicitud:<?php echo $solicitud['id_temp'] ?>">
									<!-- <td><p><?php echo $solicitud['id_temp']; ?></p></td> -->
									<td>
										<p><?php echo $numero++; ?></p>
									</td>
									<td>
										<p><?php echo $solicitud['hora_solicitud'] . " | " . date("d-m-Y", strtotime($solicitud['fecha_solicitud'])); ?></p>
									</td>
									<td>
										<p><?php echo $solicitud['nombre_completo'] ?></p>
									</td>
									<td>
										<div class="acciones">
											<a href="ver-solicitud.php?ID=<?php echo $solicitud['id'] ?>" target="_self"><i class="fas fa-eye"></i></a>
											<i class="far fa-check-circle <?php echo ($solicitud['estado'] === '1' ? 'completo' : '') ?>"></i>
											<i class="fas fa-trash"></i>
										</div>
									</td>
								</tr>
						<?php
							}
						}
					} else {
						?>
						<div class="img-formulario">
							<div class="titulo-form">
								<h3>Aún no has seleccionado un mes</h3>
							</div>
						</div>
						<table style="width:100%" id="tabla">
							<tr>
								<th>No.</th>
								<th>Fecha Solicitud</th>
								<th>Clase</th>
								<th>Nombre Completo</th>
								<th>Gestionar</th>
							</tr>
						</table>
					<?php
					}

					?>
						</table>
		</div>
	</div>
</div>
<?php
include 'includes/templates/footer.php';
?>