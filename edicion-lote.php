<?php
include 'includes/funciones.php';
include 'includes/sesiones.php';
include 'includes/conexion.php';
include 'includes/templates/header.php';
// Obtener el ID de la URL
if (isset($_GET['ID'])) {
	$user_id = $_GET['ID'];
	$number = $_GET['bloque'];
}

$registroLote = "SELECT ficha_directorio.nombre_completo, lotes.id_registro FROM lotes, ficha_directorio WHERE lotes.id_lote = '$user_id' and lotes.id_registro = ficha_directorio.id ORDER BY id_lote ASC;";
$resultRegistro = $conn->query($registroLote);

date_default_timezone_set('America/Tegucigalpa');
?>

<div class="contenedor">
	<div class="contenedor-index">
		<div class="nav-logo">
			<div class="logo graduate-logo">
				<div class="caja">
					<a href="editar-lote.php<?php echo '?ID=' . $user_id . '&bloque=' . $number ?>">
						<div class="back">
							<img src="images/icons/arrow-left.svg" alt="">
							<p style="margin-left:5px;">Regresar a Buscar</p>
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
		<div class="caja-register">
			<?php
			// obtiene las información del graduado
			if ($_GET) {
				$solicitudes = obtenerInfoLote($user_id);
			} else {
				header('Location: editar-lote.php');
			}
			if ($solicitudes->num_rows > 0) {
				while ($row = $solicitudes->fetch_assoc()) {
					$id = $row['id_lote'];
					$bloque = $row['bloque'];
					$areav2 = $row['areav2'];
					$path = $row['path_lote'];
					$id_registro = $row['id_registro'];
					$estado = $row['estado'];
			?>
					<div class="img-formulario">
						<div class="titulo-form">
							<h3>Edición de Lote <?php echo $bloque . '-' . $id; ?></h3>
						</div>
					</div>
					<div class="formulario">
						<form id="editarLote" method="post">
							<div class="colum-second">
								<div class="input">
									<p class="parr">Bloque</p>
									<div class="campo">
										<div class="icon">
											<img src="images/icons/profile.svg" alt="">
										</div>
										<input type="text" id="bloque" name="bloque" value="<?php echo $bloque; ?>" readonly="readonly">
									</div>
								</div>
								<div class="input">
									<p class="parr">Número</p>
									<div class="campo">
										<div class="icon">
											<img src="images/icons/profile.svg" alt="">
										</div>
										<input type="text" id="user_id" name="user_id" value="<?php echo $id; ?>" readonly="readonly">
									</div>
								</div>
							</div>
							<div class="colum-second">
								<div class="input">
									<p class="parr">Varas2</p>
									<div class="campo">
										<div class="icon">
											<img src="images/icons/profile.svg" alt="">
										</div>
										<input type="text" id="areav2" name="areav2" value="<?php echo $areav2; ?>">
									</div>
								</div>
								<div class="input">
									<p class="parr">Comprador</p>
									<div class="campo">
										<div class="icon">
											<img src="images/icons/profile.svg" alt="">
										</div>
										<?php
										$numero_paises = 0;
										if ($resultRegistro->num_rows > 0) {
											while ($f = $resultRegistro->fetch_assoc()) {
												$nombre = $f['nombre_completo'];
												$id_register = $f['id_registro'];
												echo '<input type="hidden" id="id_register" name="id_register" value="' . $id_register . '" readonly="readonly">';
												echo '<input type="text" id="nombreRegistro" name="nombreRegistro" value="' . $nombre . '" readonly="readonly">';
											}
										} else {
											$nombre = 'No hay comprador';
											echo '<input type="hidden" id="id_register" name="id_register" value="0" readonly="readonly">';
											echo '<input type="text" id="nombreRegistro" name="nombreRegistro" value="' . $nombre . '" readonly="readonly">';
										}
										?>
									</div>
								</div>
							</div>
							<div class="colum-second">
								<div class="input">
									<p class="parr">Estado</p>
									<div class="campo">
										<div class="icon">
											<img src="images/icons/profile.svg" alt="">
										</div>
										<select name="estado" id="estado">
											<?php
											if ($estado == 'v') {
												echo "<option name='estado' value='v' selected>Vendido</option>";
												echo "<option name='estado' value='r'>Reservado</option>";
												echo "<option name='estado' value='d'>Disponible</option>";
											} elseif ($estado == 'd') {
												echo "<option name='estado' value='d' selected>Disponible</option>";
												echo "<option name='estado' value='r'>Reservado</option>";
												echo "<option name='estado' value='v'>Vendido</option>";
												$estado = 'Disponible';
											} elseif ($estado == 'r') {
												echo "<option name='estado' value='r' selected>Reservado</option>";
												echo "<option name='estado' value='d'>Disponible</option>";
												echo "<option name='estado' value='v'>Vendido</option>";
											}

											?>
										</select>
									</div>
								</div>
							</div>
							<div class="colum-second">
								<div class="input" style="width: 100% !important;">
									<p class="parr">Path o Plano</p>
									<div class="campo" style="width: 100% !important;margin-bottom: 0;">
										<textarea rows="5" cols="33" class="cajas-texto" name="path" id="path" value="<?php echo $path; ?>" placeholder="Path" readonly><?php echo $path; ?></textarea>
									</div>
								</div>
							</div>
							<div class="campo enviar registro">
								<div class="boton-registro">
									<input type="hidden" id="tipo" value="solicitud">
									<input type="submit" value="Actualizar" name="update">
								</div>
							</div>
						</form>
					</div>
			<?php
				}
			}
			?>
		</div>
	</div>
</div>
<?php
include 'includes/templates/footer.php';
?>