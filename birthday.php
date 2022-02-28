<?php
include 'includes/funciones.php';
include 'includes/conexion.php';
include 'includes/templates/header.php';
$nacionalidad1 = "SELECT nacionalidad FROM graduat3s GROUP BY nacionalidad ORDER BY nacionalidad ASC";
$resultado1 = $conn->query($nacionalidad1);
?>
<style>
	th {
		text-align: center !important;
	}

	td p {
		text-align: center !important;
	}

	.active-birthday a {
		color: #DDAD4E;
	}
</style>

<div class="container-main">
	<div class="container-box">
		<div class="box-container">
			<div class="contenedor-index">
				<div class="nav-logo">
					<div class="logo graduate-logo">
						<div class="caja">
							<a href="https://www.zamorano.edu/graduados/">
								<div class="back">
									<img src="images/icons/arrow-left.svg" alt="">
									<p style="margin-left:5px;">Regresar a Graduados</p>
								</div>
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="contenedor-index">
				<div class="">
					<div class="logo" style="padding: 20px 33px 0px 33px">
						<img style="width:30px !important; margin-bottom:10px;" src="images/icons/birthday-cake.svg" alt="">
						<h2 style="color: #008341 !important;font-size: 25px;font-weight: 400;">Cumpleañeros ZAMORANO</h2>
					</div>
				</div>
			</div>
			<div class="contenedor-formulario">
				<div class="contenedor-login">
					<div class="caja-register" style="padding-bottom: 0;">
						<div class="img-formulario">
							<div class="titulo-form">
								<h3>Buscar por mes</h3>
							</div>
						</div>
						<div class="formulario">
							<form id="buscarCumpleanos" method="get" action="">
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
									<!-- <div class="input">
							<div class="campo">
								<div class="icon">
									<img src="images/icons/profile.svg" alt="">
								</div>
								<?php
								echo '<select class="nacionalidad" name="nacionalidad" id="nacionalidad" ><option value="">Selecciona un país</option>';
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
							</div>
						</div> -->
									<!-- <div class="input">
							<div class="campo">
								<div class="icon">
									<img src="images/icons/profile.svg" alt="">
								</div>
								<select name="genero" id="genero">
									<option value="">Seleccione Género</option>
									<option value="M">Masculino</option>
									<option value="F">Femenino</option>
								</select>
							</div>
						</div> -->
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
						<?php
						if (isset($_GET['nombres']) || isset($_GET['mesNacimiento']) || isset($_GET['anoFallecido']) | isset($_GET['genero'])) {
							$clase = $_GET['clase'];
							$nombres = $_GET['nombres'];
							$lastname = $_GET['apellidos'];
							$mes = $_GET['mesNacimiento'];
							$mesNacimiento = ($mes - (1));
							$meses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
							// $consulta = $conn->query("SELECT * FROM graduat3s WHERE MONTH(fecha_nacimiento) = '$mes' AND nombres LIKE '%$nombres%' AND apellidos LIKE '%$lastname%' AND deceased = 0 ORDER BY clase ASC");
							$consulta = $conn->query("SELECT * FROM graduat3s WHERE MONTH(fecha_nacimiento) = '$mes' AND nombres LIKE '%$nombres%' AND apellidos LIKE '%$lastname%'  AND clase LIKE '%$clase%' AND deceased = 0 ORDER BY clase, DAY(fecha_nacimiento) ASC");
							// obtiene las información del graduado
							// $busqueda = obtenerBusqueda($nombres);
						?>
							<div class="img-formulario">
								<div class="titulo-form">
									<?php

									$resultado = $consulta->num_rows;
									if ($consulta->num_rows > 1 || $consulta->num_rows <= 0) {
										echo '<h3>' . $resultado . ' resultados encontrados del mes de ' . $meses[$mesNacimiento] . '</h3>';
									} else {
										echo '<h3>' . $resultado . ' resultados encontrados del mes de ' . $meses[$mesNacimiento] . '</h3>';
									}
									?>
								</div>
							</div>
							<table style="width:100%">
								<tr>
									<th>Clase</th>
									<th>Nombre Completo</th>
									<th>Fecha Nacimiento</th>
								</tr>
								<?php
								// CONDICIÓN FALLECIDO
								while ($row = $consulta->fetch_array()) {
									// $fallecido = $row['deceased'];
									// $notaDuelo = $row['fechaNotaDuelo'];
									$fecha_nacimiento = strtotime($row['fecha_nacimiento']);
									$img_fallecido = '';
									$textofallecido = '';
									$id = $row['ID'];
									$nombres = $row['nombres'];
									$apellidos = $row['apellidos'];
									$clase = $row['clase'];
									$genero = $row['genero'];
								?>
									<tr id="idestudiante:<?php echo $id ?>">
										<td>
											<p><?php echo $clase ?></p>
										</td>
										<td>
											<p><?php echo $img_fallecido . " " . $nombres ?> <?php echo $apellidos ?></p>
										</td>
										<td>
											<p style="text-align: center;"><?php echo date('d/m', $fecha_nacimiento); ?></p>
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
		</div>
		<?php
		include 'includes/templates/sidebar.php';
		?>
	</div>
</div>
<?php
include 'includes/templates/footer.php';
?>
<!-- Mustra Imagenes -->
<!-- <?php
		$folder_path = 'notas-de-duelo/galeria/';
		$num_files = glob($folder_path . "*.{JPG,jpeg,gif,png,bmp}", GLOB_BRACE);
		$folder = opendir($folder_path);
		if ($num_files > 0) {
			while (false !== ($file = readdir($folder))) {
				$file_path = $folder_path . $file;
				$extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
				if ($extension == 'jpg' || $extension == 'png' || $extension == 'gif' || $extension == 'bmp') {
		?>
					<img class="tfoto" src="<?php echo $file_path; ?>" alt="Imagen de ejemplo" title="Imagen de ejemplo">
		<?php
				}
			}
		}
		closedir($folder);
		?> -->