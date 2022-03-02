<?php
include 'includes/funciones.php';
include 'includes/sesiones.php';
include 'includes/conexion.php';
include 'includes/templates/header.php';
$nacionalidad1 = "SELECT nacionalidad FROM graduat3s GROUP BY nacionalidad ORDER BY nacionalidad ASC";
$resultado1 = $conn->query($nacionalidad1);
?>


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
<div class="contenedor">
	<div class="contenedor-index">
		<div class="">
			<div class="logo">
				<!-- <img style="width:30px !important; margin-bottom:10px;" src="images/icons/luto.svg" alt=""> -->
				<h2>Generar Contrato</h2>
			</div>
		</div>
	</div>
</div>
<div class="contenedor-formulario">
	<div class="logo">
	</div>
	<div class="contenedor-login">
		<div class="caja-register" style="padding-bottom: 0;">
			<div class="formulario">
				<form id="buscador" method="get" action="">
					<div class="colum-second">
						<div class="input">
							<div class="campo">
								<div class="icon">
									<img src="images/icons/profile.svg" alt="">
								</div>
								<input type="text" class="nombre" name="nombres" id="nombres" placeholder="Nombres">
							</div>
						</div>
					</div>
					<div class="campo enviar registro">
						<div class="boton-registro">
							<input type="hidden" id="fondos_entidades" value="buscar">
							<input type="hidden" id="tipo" value="buscar">
							<!-- <input type="submit" name='submit' class="boton nuevo-registro" value="Buscar Graduado"> -->
							<input type="submit" class="boton nuevo-registro" value="Buscar Registro">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<?php
	if (isset($_GET['nombres'])) {
		// $id = $_GET['ID'];
		$nombres = $_GET['nombres'];
		$consulta = $conn->query("SELECT * FROM ficha_directorio WHERE nombre_completo LIKE '%$nombres%' ORDER BY nombre_completo ASC");
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
						<th>Nombre Completo</th>
						<th>Generar</th>
					</tr>
					<?php
					$contador = 0;
					// CONDICIÓN FALLECIDO
					while ($row = $consulta->fetch_array()) {
						$contador++;
						$id = $row['id'];
						$nombres = $row['nombre_completo'];
					?>
						<tr id="idestudiante:<?php echo $id ?>">
							<td>
								<p><strong><?php echo $contador ?></strong></p>
							</td>
							<td>
								<p><?php echo $nombres ?></p>
							</td>
							<td>
								<?php
								if ($nombres == '') {
									echo '<div class="acciones notas"><p>No se puede generar<p></div>';
								} else {
									echo "<div class='acciones notas'>
										<a href='contrato/index.php?ID=" . $id . "' target='_blank'>
										<input type='submit' class='boton nuevo-registro' value='[pdf]'></a>
									</div>";
									// echo "<a href='".$link_address."'>Link</a>";
								};
								?>
							</td>
						</tr>
				<?php
					}
				}
				?>
				</table>
			</div>
		</div>
		<?php
		include 'includes/templates/footer.php';
		?>