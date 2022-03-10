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
					<h3>Registros de Clientes</h3>
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
								<input type="text" class="nombre" name="nombres" id="nombres" placeholder="Nombres">
							</div>
						</div>
						<div class="input">
							<div class="campo">
								<div class="icon">
									<img src="images/icons/profile.svg" alt="">
								</div>
								<input type="text" class="identidad" name="identidad" id="identidad" max="15" placeholder="0801-1989-07280">
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
	if (isset($_GET['nombres']) || isset($_GET['identidad'])) {
		// $id = $_GET['ID'];
		$nombres = $_GET['nombres'];
		$identidad = $_GET['identidad'];
		$consulta = $conn->query("SELECT * FROM ficha_directorio WHERE nombre_completo LIKE '%$nombres%' AND identidad LIKE '%$identidad%' ORDER BY nombre_completo ASC");
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
						<th>Identidad</th>
						<th>Nacionalidad</th>
						<th>Acciones</th>
					</tr>
					<?php
					$contador = 0;
					// CONDICIÓN FALLECIDO
					while ($row = $consulta->fetch_array()) {
						$contador++;
						$id = $row['id'];
						$nombres = $row['nombre_completo'];
						$identidad = $row['identidad'];
						$nacionalidad = $row['nacionalidad'];
						$genero = $row['genero'];
					?>
						<tr id="idestudiante:<?php echo $id ?>">
							<td>
								<p><strong><?php echo $contador ?></strong></p>
							</td>
							<td>
								<p><?php echo $nombres ?></p>
							</td>
							<td>
								<p><?php echo $identidad ?></p>
							</td>
							<td>
								<p><?php echo $nacionalidad ?></p>
							</td>
							<td>
								<div class="acciones">
									<a href="edicion-perfil.php?ID=<?php echo $id ?>">
									<i class="fas fa-pencil-alt"></i></a>
								</div>
							</td>
						</tr>



				<?php
					}
				}
				?>
				</table>
			</div>
			<?php
			include 'includes/templates/footer.php';
			?>