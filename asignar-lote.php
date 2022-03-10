<?php
include 'includes/funciones.php';
include 'includes/sesiones.php';
include 'includes/conexion.php';
include 'includes/templates/header.php';
$id_user = $_GET["ID"];
$bloquestodos = "SELECT id_lote, bloque FROM lotes GROUP BY bloque ORDER BY bloque ASC";
$bloquesAll = $conn->query($bloquestodos);

$asignacion = "SELECT nombre_completo FROM ficha_directorio WHERE ID = $id_user";
$asignar = $conn->query($asignacion);

if (isset($_GET['bloque'])) {
	$bloquenum = $_GET["bloque"];
	$bloques = "SELECT id_lote, bloque FROM `lotes` WHERE `bloque` LIKE $bloquenum";
	// echo "<script>alert('Entró')</script>";
} else {
	// echo "<script>alert('Entró a todo')</script>";
	$bloques = "SELECT id_lote, bloque FROM lotes GROUP BY bloque ORDER BY bloque ASC";
}

$bloquesQuery = $conn->query($bloques);

if (isset($_GET['bloque'])) {
	if (isset($_GET['lote'])) {
		$bloquenum = $_GET["bloque"];
		$lotenum = $_GET["lote"];
		$lotes = "SELECT * FROM `lotes` WHERE `bloque` LIKE '$bloquenum' AND `estado` = 'd'";
		echo "<script>alert('Entró)</script>";
		// $lotesQuery = $conn->query($lotes);
	} else {
		$lotes = "SELECT * FROM `lotes` WHERE `bloque` LIKE '$bloquenum' AND `estado` = 'd'";
		echo "<script>alert('Entró NADA)</script>";
	}
	$lotesQuery = $conn->query($lotes);
}

?>


<div class="contenedor">
	<div class="contenedor-index">
		<div class="nav-logo">
			<div class="logo graduate-logo">
				<div class="caja">
					<a href="ver-perfil-ficha.php?ID=<?php echo $id_user ?>">
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
					<h3>Edición de Lote
						<?php
						if (isset($_GET['bloque'])) {
							echo $_GET['bloque'];
						} else {
							echo "Todos";
						}
						?>
						para asignar a <br>
						<?php
							while ($row = $asignar->fetch_assoc()) {
								$nombre = $row['nombre_completo'];
								echo $nombre;
							};
						?>
					</h3>
				</div>
			</div>
			<div class="formulario">
				<form id="asignar_lote" method="" action="">
					<div class="colum">
						<div class="input">
							<div class="campo">
								<div class="icon">
									<img src="images/icons/profile.svg" alt="">
								</div>
								<input type="hidden" id="ID" name="ID" value="<?php echo $id_user ?>">
								<?php
									$readonly = "";
								if (isset($_GET['bloque'])) {
									$ver = "none";
									$readonly = 'disabled="disabled"';
								}
								echo '<select required class="bloque" name="bloque" id="bloque" ><option value="" '.$readonly. '>Selecciona Bloque</option>';
								$numero_paises = 0;
								if (isset($_GET['ID'])) {
									if ($bloquesAll->num_rows > 0) {
										while ($row = $bloquesAll->fetch_assoc()) {
											$bloqueselected = $row['bloque'];
											echo '<option value="' . $row['bloque'] . '"';
											if (isset($_GET['bloque'])) {
												if ($_GET['bloque'] == $bloqueselected) {
													echo "selected";
												}
											}
											echo ' '. $readonly .' >' . $row['bloque'] . '</option>';
										}

										echo '</select>';
								?>
							</div>
						</div>
						<div class="campo enviar registro" style="display:<?php echo $ver ?>">
							<div class="boton-registro">
								<!-- <input type="hidden" id="tipo" value="cargar"> -->
								<input type="submit" class="boton nuevo-registro" value="Cargar Lote">
							</div>
						</div>
				<?php

									}
								} elseif (isset($_GET['ID']) && isset($row['bloque']) && isset($row['id_lote'])) {
									echo '<script>alert("Entró a todo")</script>';
								}
				?>

				<div class="input">
					<?php
					if (isset($_GET['bloque'])) {
						echo '<div class="campo">';
						echo '<div class="icon">';
						echo '<img src="images/icons/profile.svg" alt="">';
						echo '</div>';
						echo '<select required class="lote" name="lote" id="lote" ><option value="">Selecciona N° Lote</option>';
						if ($lotesQuery->num_rows > 0) {
							while ($f = $lotesQuery->fetch_assoc()) {
								$id_lote = $f['id_lote'];
								echo '<option ';
								echo ' value="' . $id_lote . '" ';

								if (isset($_GET['lote'])) {
									if ($_GET['lote'] == $id_lote) {
										echo "selected";
									}
								}
								echo '>' . $id_lote . '</option>';
							}
							if (isset($_GET['bloque'])) {
								$ver = "initial";
							}
							echo '</select>';
							echo '</div>';
							echo '</div>';
							echo '</div>';
					?>
							<div class="campo enviar registro" style="display:<?php echo $ver ?>">
								<div class="boton-registro">
									<input type="hidden" id="tipo" value="asignar">
									<!-- <input type="hidden" id="tipo" value="<?php echo $_GET['bloque'] ?>" name="bloque" id="bloque" > -->
									<?php
									echo '<input type="submit" class="boton nuevo-registro" value="Asignar Lote">';
									?>
								</div>
							</div>
					<?php
						}
					}
					?>
				</div>
				</form>
			</div>
		</div>

		<div class="contenedor-login">
			<div class="caja-register" style="padding-top: 3px;">


			</div>
		</div>
	</div>
</div>

<?php
include 'includes/templates/footer.php';
?>