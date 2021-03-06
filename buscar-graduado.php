<?php
include 'includes/funciones.php';
// include 'includes/sesiones.php';
include 'includes/conexion.php';
include 'includes/templates/header-graduate.php';
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
				<h2>Buscar Graduado</h2>
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
					<h3>Listado de Graduados</h3>
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
								<input type="text" class="apellidos" name="apellidos" id="apellidos" placeholder="Apellidos">
							</div>
						</div>
					</div>
					<div class="colum-second">
						<div class="input">
							<div class="campo">
								<div class="icon">
									<img src="images/icons/profile.svg" alt="">
								</div>
								<input type="number" class="clase" name="clase" id="clase" placeholder="Clase" min="1946" max="2021">
							</div>
						</div>
						<div class="input">
							<div class="campo">
								<div class="icon">
									<img src="images/icons/profile.svg" alt="">
								</div>
								<input type="text" class="codigo" name="codigo" id="codigo" placeholder="C??digo">
							</div>
						</div>
					</div>
					<div class="colum-second">
						<div class="input">
							<div class="campo">
								<div class="icon">
									<img src="images/icons/profile.svg" alt="">
								</div>
								<?php
								echo '<select class="nacionalidad" name="nacionalidad" id="nacionalidad" ><option value="">Selecciona un pa??s</option>';
								$numero_paises = 0;
								while ($f = $resultado1->fetch_assoc()) {
									$paises = $f['nacionalidad'];
									echo '<option ';
									if (isset($_GET['paisInput'])) {
										if ($_GET['paisInput'] == $paises) {
											echo "selected";
										}
									}
									echo ' value="' . $paises . '">' . $paises . '</option>';
								}
								echo '</select>'
								?>
								<!-- <input type="text" class="nacionalidad" name="nacionalidad" id="nacionalidad" placeholder="Nacionalidad"> -->
							</div>
						</div>
						<div class="input">
							<div class="campo">
								<div class="icon">
									<img src="images/icons/profile.svg" alt="">
								</div>
								<select name="genero" id="genero">
									<option value="">Seleccione G??nero</option>
									<option value="M">Masculino</option>
									<option value="F">Femenino</option>
								</select>
							</div>
						</div>
					</div>
					<div class="campo enviar registro">
						<div class="boton-registro">
							<input type="hidden" id="fondos_entidades" value="buscar">
							<input type="hidden" id="tipo" value="buscar">
							<!-- <input type="submit" name='submit' class="boton nuevo-registro" value="Buscar Graduado"> -->
							<input type="submit" class="boton nuevo-registro" value="Buscar Graduado">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<?php
	if (isset($_GET['nombres']) || isset($_GET['clase']) || isset($_GET['apellidos']) || isset($_GET['genero']) || isset($_GET['nacionalidad'])) {
		// $id = $_GET['ID'];
		$codigo = $_GET['codigo'];
		$clase = $_GET['clase'];
		$nombres = $_GET['nombres'];
		$lastname = $_GET['apellidos'];
		$nacionalidad  = $_GET['nacionalidad'];
		$genero = $_GET['genero'];
		$consulta = $conn->query("SELECT * FROM graduat3s WHERE nombres LIKE '%$nombres%' AND apellidos LIKE '%$lastname%' AND codigo LIKE '%$codigo%' AND genero LIKE '%$genero%' AND clase LIKE '%$clase%' AND nacionalidad LIKE '%$nacionalidad%' ORDER BY nombres ASC");
		// obtiene las informaci??n del graduado
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
					<th>Clase</th>
					<th>Nombre Completo</th>
					<th>G??nero</th>
					<th>Nacionalidad</th>
					<th>Ver</th>
				</tr>
				<?php
				$contador = 0;
				// CONDICI??N FALLECIDO
				while ($row = $consulta->fetch_array()) {
					$fallecido = $row['deceased'];
					$fechaFallecido = $row['date_deceased'];
					$img_fallecido = '';
					$textofallecido = '';
					if ($fallecido == '1') {
						$img_fallecido = '<img src="images/cruz_fallecido.svg" alt="" width="10">';
						$textofallecido = '<p>Fecha en que Falleci??: <strong>' . $fechaFallecido . '</strong></p>';
					} elseif ($fallecido == '0') {
						$fallecido = 'NO';
						$textofallecido = ' ';
					};
					$contador++;
					$id = $row['ID'];
					$nombres = $row['nombres'];
					$apellidos = $row['apellidos'];
					$clase = $row['clase'];
					$nacionalidad = $row['nacionalidad'];
					$genero = $row['genero'];
				?>
					<tr id="idestudiante:<?php echo $id ?>">
						<td>
							<p><strong><?php echo $contador ?></strong></p>
						</td>
						<td>
							<p><?php echo $clase ?></p>
						</td>
						<td>
							<p><?php echo $img_fallecido . " " . $nombres ?> <?php echo $apellidos ?></p>
						</td>
						<td>
							<p><?php echo $genero ?></p>
						</td>
						<td>
							<p><?php echo $nacionalidad ?></p>
						</td>
						<td>
							<div class="acciones">
								<a href="resultado-busqueda.php?ID=<?php echo $id ?>">
									<i class="fas fa-eye"></i></a>
							</div>
						</td>
					</tr>
			<?php
				}
			}
			?>
			</table>
		</div>
	</div>
</div>
<?php
include 'includes/templates/footer.php';
?>