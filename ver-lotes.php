<?php
include 'includes/funciones.php';
include 'includes/sesiones.php';
include 'includes/conexion.php';
include 'includes/templates/header.php';
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
		<div class="caja-ficha">
			<div class="img-formulario">
				<!-- <img src="images/icons/perfil.svg" alt=""> -->
				<div class="titulo-form">
					<h3>Todos los Lotes</h3>
					<?php
					$solicitudes = obtenerListaLote();
					?>
				</div>

			</div>
			<?php
			if ($solicitudes) {
				$consulta = $conn->query("SELECT * FROM lotes ORDER BY bloque ASC");
			?>
				<div class="img-formulario">
					<div class="titulo-form">
						<?php
						if ($consulta->num_rows > 1 || $consulta->num_rows == 0) {
							echo '<h3>' . $solicitudes->num_rows . ' total de solicitudes sin revisión</h3>';
						} else {
							echo '<h3>' . $solicitudes->num_rows . ' solicitud</h3>';
						}
						?>
					</div>
				</div>
				<table style="width:100%" id="tabla">
					<tr>
						<th>No.</th>
						<th>Bloque</th>
						<th  class="nover">Estado</th>
						<th>Reservado o Vendido</th>
						<th>Gestionar</th>
					</tr>
					<?php
					// CONDICIÓN FALLECIDO
					// $numero = $consulta->num_rows;
					$numero = 1;
					while ($row = $consulta->fetch_array()) {
						$id = $row['numero'];
						$bloque = $row['bloque'];
						$estado = $row['estado'];
						if ($estado == 'v') {
							$estado = 'Vendido';
							$color = '#a5a5a5';
						} elseif ($estado == 'd') {
							$estado = 'Disponible';
							$color = '#0f0';
						} elseif ($estado == 'r') {
							$estado = 'Reservado';
							$color = '#00bcd4';
						}
					?>
						<tr id="solicitud:<?php echo $id ?>">
							<!-- <td><p><?php echo $id; ?></p></td> -->
							<td>
								<p><?php echo $numero++; ?></p>
							</td>
							<td>
								<div class="caj">
									<div class="bola" style="background:<?php echo $color ?>"></div>
									<div class="tect">
										<p><?php echo $bloque . $id ?></p>
									</div>
								</div>
							</td>
							<td  class="nover">
								<p><?php
									if ($row['estado'] == 'r') {
										echo 'Reservado';
									} elseif ($row['estado'] == 'd') {
										echo 'Disponible';
									} elseif ($row['estado'] == 'v') {
										echo 'Vendido';
									} ?>
								</p>
							</td>
							<td>
								<p><?php $idregister = $row['id_registro'];
									$consult = obtenerInfoSolicitud($idregister);
									if ($consult->num_rows > 0){
										$row = $consult->fetch_array();
										echo $row['nombre_completo'].'<a href="ver-perfil-ficha.php?ID='.$idregister.'" target="_self"> [Ver <i class="fas fa-eye"></i>]</a>';
									} else {
										echo 'Sin asignar';
									}
								?>
								</p>
							</td>
							<td>
								<div class="acciones">
									<a href="edicion-lote.php?ID=<?php echo $id?>&bloque=<?php echo $bloque ?>" target="_self"><i class="fas fa-pencil-alt"></i></a>
									<!-- <i class="far fa-check-circle <?php echo ($row['estado'] === '1' ? 'completo' : '') ?>"></i> -->
									<!-- <i class="fas fa-trash"></i> -->
								</div>
							</td>
						</tr>
					<?php
					}
				} else if ($mesSolicitado < 13) {
					$mes = $_GET['mesSolicitud'];
					$mesSolicitud = ($mes - (1));
					$meses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
					$consulta = $conn->query("SELECT * FROM lotes WHERE MONTH(fecha_solicitud) = '$mes' AND YEAR(NOW()) ORDER BY fecha_solicitud DESC, hora_solicitud DESC");

					?>
					<div class="img-formulario">
						<div class="titulo-form">
							<?php

							$resultado = $consulta->num_rows;
							if ($consulta->num_rows > 1 || $consulta->num_rows <= 0) {
								echo '<h3>' . $resultado . ' resultados del mes de <br> ' . strtolower($meses[$mesSolicitud]) . ' de ' . $solicitudes->num_rows . ' solicitudes en total</h3>';
							} else {
								echo '<h3>' . $resultado . ' resultado del mes de <br> ' . strtolower($meses[$mesSolicitud]) . ' de ' . $solicitudes->num_rows . ' solicitudes total</h3>';
							}
							?>
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
						<?php
						// CONDICIÓN FALLECIDO
						$numero = 1;
						while ($solicitud = $consulta->fetch_array()) {
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
									<p><?php echo $solicitud['clase'] ?></p>
								</td>
								<td>
									<p><?php echo $solicitud['nombre_completo'] ?></p>
								</td>
								<td>
									<div class="acciones">
										<a href="ver-perfil-ficha.php?ID=<?php echo $solicitud['id'] ?>" target="_self"><i class="fas fa-eye"></i></a>
										<i class="far fa-check-circle <?php echo ($solicitud['estado'] === '1' ? 'completo' : '') ?>"></i>
										<i class="fas fa-trash"></i>
									</div>
								</td>
							</tr>
						<?php
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