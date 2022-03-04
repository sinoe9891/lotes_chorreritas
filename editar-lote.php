<?php
include 'includes/funciones.php';
include 'includes/sesiones.php';
include 'includes/conexion.php';
include 'includes/templates/header.php';
?>


<div class="contenedor">
	<div class="contenedor-index">
		<div class="nav-logo">
			<div class="logo graduate-logo">
				<div class="caja">
					<a href="index.php">
						<div class="back">
							<img src="images/icons/arrow-left.svg" alt="">
							<p style="margin-left:5px;">Regresar</p>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="contenedor-formulario">
	<div class="logo">
	</div>
	<div class="contenedor-login">
		<div class="caja-register" style="padding-bottom: 0;">
			<div class="img-formulario">
				<div class="titulo-form">
					<h3>Edición de Lote</h3>
				</div>
			</div>
			<div class="formulario">
				<form id="buscador" method="get" action="">
					<div class="colum-second">
						<div class="input">
							<div class="campo">
								<div class="icon">
									<img src="images/icons/profile.svg" alt="">
								</div>
								<input type="text" class="nombre" name="bloque" id="bloque" placeholder="Bloque">
							</div>
						</div>
						<div class="input">
							<div class="campo">
								<div class="icon">
									<img src="images/icons/profile.svg" alt="">
								</div>
								<input type="text" class="apellidos" name="ID" id="ID" placeholder="N° Bloque">
							</div>
						</div>
					</div>
					<label for="all"><input type="checkbox" id="all" value="todo" name="all"> Todo el Bloque</label><br>
					<div class="campo enviar registro">
						<div class="boton-registro">
							<input type="hidden" id="tipo" value="buscar">
							<!-- <input type="submit" name='submit' class="boton nuevo-registro" value="Buscar Graduado"> -->
							<input type="submit" class="boton nuevo-registro" value="Buscar Lote">
						</div>
					</div>
				</form>
			</div>
		</div>
		<?php

		if (isset($_GET['all'])) {
			// $id = $_GET['ID'];
			$todo = $_GET['all'];
			$bloque = $_GET['bloque'];
			// echo $bloque;
			// echo $numero;

			$consulta = $conn->query("SELECT * FROM lotes WHERE bloque = '$bloque' ORDER BY id_lote ASC");

			// $consulta = $conn->query("SELECT * FROM lotes WHERE bloque = 'A' AND id_lote = '1' ORDER BY id_lote ASC;");

			// obtiene las información del graduado
			// $busqueda = obtenerBusqueda($nombres);
		?>
			<div class="contenedor-login">
				<div class="caja-register" style="padding-top: 3px;">
					<div class="img-formulario">
						<div class="titulo-form">
							<?php
							$resultado = $consulta->num_rows;
							if ($consulta->num_rows > 1 || $consulta->num_rows <= 0) {
								echo '<h3>' . $resultado . ' resultados encontrados</h3>';
							} else {
								echo '<h3>' . $resultado . ' resultado encontrado</h3>';
							}
							?>
						</div>
					</div>
					<table style="width:100%">
						<tr>
							<th>No.</th>
							<th>Bloque</th>
							<th>Estado</th>
							<th>Acciones</th>
						</tr>
						<?php
						$contador = 0;
						// CONDICIÓN FALLECIDO
						while ($row = $consulta->fetch_array()) {
							$contador++;
							$id = $row['id_lote'];
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
							<tr id="idestudiante:<?php echo $id ?>">
								<td>
									<p><strong><?php echo $contador ?></strong></p>
								</td>
								<td>
									<div class="caj">
										<div class="bola" style="background:<?php echo $color ?>"></div>
										<div class="tect">
											<p><?php echo $bloque . $id ?></p>
										</div>
									</div>
								</td>
								<td>
									<p><?php echo $estado ?></p>
								</td>
								<td>
									<div class="acciones">
										<a href="edicion-lote.php?ID=<?php echo $id ?>&bloque=<?php echo $bloque ?>">
											<i class="fas fa-pencil-alt"></i></a>
									</div>
								</td>
							</tr>
						<?php
						}
					} elseif (isset($_GET['ID']) && isset($_GET['bloque'])) {
						# code...
						$id = $_GET['ID'];
						// $id = $_GET['ID'];
						$bloque = $_GET['bloque'];
						// echo $bloque;
						// echo $numero;

						$consulta = $conn->query("SELECT * FROM lotes WHERE bloque = '$bloque' AND id_lote = '$id' ORDER BY id_lote ASC");

						// $consulta = $conn->query("SELECT * FROM lotes WHERE bloque = 'A' AND id_lote = '1' ORDER BY id_lote ASC;");

						// obtiene las información del graduado
						// $busqueda = obtenerBusqueda($nombres);
						?>
						<div class="contenedor-login">
							<div class="caja-register" style="padding-top: 3px;">
								<div class="img-formulario">
									<div class="titulo-form">
										<?php
										$resultado = $consulta->num_rows;
										if ($consulta->num_rows > 1 || $consulta->num_rows <= 0) {
											echo '<h3>' . $resultado . ' resultados encontrados</h3>';
										} else {
											echo '<h3>' . $resultado . ' resultado encontrado</h3>';
										}
										?>
									</div>
								</div>
								<table style="width:100%">
									<tr>
										<th>No.</th>
										<th>Bloque</th>
										<th>Estado</th>
										<th>Acciones</th>
									</tr>
									<?php
									$contador = 0;
									// CONDICIÓN FALLECIDO
									while ($row = $consulta->fetch_array()) {
										$contador++;
										$id = $row['id_lote'];
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
										<tr id="idestudiante:<?php echo $id ?>">
											<td>
												<p><strong><?php echo $contador ?></strong></p>
											</td>
											<td>
												<div class="caj">
													<div class="bola" style="background:<?php echo $color ?>"></div>
													<div class="tect">
														<p><?php echo $bloque . $id ?></p>
													</div>
												</div>
											</td>
											<td>
												<p><?php echo $estado ?></p>
											</td>
											<td>
												<div class="acciones">
													<a href="edicion-lote.php?ID=<?php echo $id ?>&bloque=<?php echo $bloque ?>">
														<i class="fas fa-pencil-alt"></i></a>
												</div>
											</td>
										</tr>
								<?php
									}
								} elseif (isset($_GET['all']) == 'false') {
									echo '<div class="contenedor-login">
											<div class="caja-register" style="padding-top: 3px;">
												<div class="img-formulario">
													<div class="titulo-form">
														<h3>Seleccione una opción valida</h3>
													</div>
												</div>
											</div>
										</div>';
								}
								?>
								</table>
							</div>
						</div>
				</div>
			</div>
	</div>
</div>

<?php
include 'includes/templates/footer.php';
?>