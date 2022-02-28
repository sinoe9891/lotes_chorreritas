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
				<img style="width:30px !important; margin-bottom:10px;" src="images/icons/luto.svg" alt="">
				<h2>Notas de Duelo</h2>
			</div>
		</div>
	</div>
</div>
<div class="contenedor-formulario">
	<div class="logo">
	</div>
	<div class="contenedor-login">
		<div class="caja-register" style="padding-bottom: 0;max-width: 950px;">
			<div class="img-formulario">
				<div class="titulo-form">
					<h3>Buscar por año</h3>
				</div>
			</div>
			<div class="formulario">
				<form id="buscadorFallecido" method="get" action="">
					<!-- <div class="colum-second">
						<div class="input">
							<div class="campo">
								 <div class="icon">
									<img src="images/icons/profile.svg" alt="">
								</div> 
								<input type="text" hidden class="nombre" name="nombres" id="nombres" placeholder="Nombres">
							</div>
						</div>
						<div class="input">
							<div class="campo">
								 <div class="icon">
									<img src="images/icons/profile.svg" alt="">
								</div> 
								<input type="text" hidden class="apellidos" name="apellidos" id="apellidos" placeholder="Apellidos">
							</div>
						</div>
					</div> -->
					<!-- <div class="colum-second">
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
								<input type="text" class="codigo" name="codigo" id="codigo" placeholder="Código">
							</div>
						</div>
					</div> -->
					<!-- <div class="colum-second">
						<div class="input">
							<div class="campo">
								<div class="icon">
									<img src="images/icons/profile.svg" alt="">
								</div>
								<input type="number" class="anoFallecido" name="anoFallecido" id="anoFallecido" placeholder="Año Fallecido" min="1946" max="2021">
							</div>
						</div>
						<div class="input">
							<div class="campo">
								<div class="icon">
									<img src="images/icons/profile.svg" alt="">
								</div>
								<input type="text" class="nacionalidad" name="nacionalidad" id="nacionalidad" placeholder="Nacionalidad">
							</div>
						</div>
						<div class="input">
							<div class="campo">
								<div class="icon">
									<img src="images/icons/profile.svg" alt="">
								</div>
								<select name="genero" id="genero">
									<option>Seleccione Género</option>
									<option value="M">Masculino</option>
									<option value="F">Femenino</option>
								</select>
							</div>
						</div>
					</div> -->
					<div class="colum-second" style="display: flex;justify-content: center;">
						<div class="input" >
							<div class="campo">
								<div class="icon">
									<img src="images/icons/profile.svg" alt="">
								</div>
								<input type="number" class="anoFallecido" name="anoFallecido" required id="anoFallecido" placeholder="Año en que Fallecido" min="1979" max="<?php echo date('Y');?>" value="<?php echo $_GET['anoFallecido'];?>">
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
	if (isset($_GET['nombres']) || isset($_GET['apellidos']) || isset($_GET['anoFallecido'])) {
		// $id = $_GET['ID'];
		// $codigo = $_GET['codigo'];
		// $clase = $_GET['clase'];
		// $nombres = $_GET['nombres'];
		// $lastname = $_GET['apellidos'];
		// $nacionalidad  = $_GET['nacionalidad'];
		// $genero = $_GET['genero'];
		$anoFallecido = $_GET['anoFallecido'];
		$consulta = $conn->query("SELECT * FROM graduat3s WHERE deceased = 1 AND YEAR(date_deceased) = '$anoFallecido' ORDER BY date_deceased DESC");
		
								 
		// obtiene las información del graduado
		// $busqueda = obtenerBusqueda($nombres);
	?>
		<div class="contenedor-login">
			<div class="caja-register" style="padding-top: 3px;max-width: 950px;">
				<div class="img-formulario">
					<div class="titulo-form">
						<?php
						$resultado = $consulta->num_rows;
						if ($consulta->num_rows > 1 || $consulta->num_rows <= 0) {
							echo '<h3>' . $resultado . ' resultados encontrados del año '.$anoFallecido.'</h3>';
						} else {
							echo '<h3>' . $resultado . ' resultados encontrados del año '.$anoFallecido.'</h3>';
						}
						?>
					</div>
				</div>
				<table style="width:100%">
					<tr>
						<th>No.</th>
						<th>Falleció</th>
						<th>Clase</th>
						<th>Nombre Completo</th>
						<th>Nacionalidad</th>
						<th>Acciones</th>
					</tr>
					<?php
					$contador = 0;
					// CONDICIÓN FALLECIDO
					while ($row = $consulta->fetch_array()) {
						$fallecido = $row['deceased'];
						$notaDuelo = $row['fechaNotaDuelo'];
						$fechaFallecido = $row['date_deceased'];
						$img_fallecido = '';
						$textofallecido = '';
						if ($fallecido == '1') {
							$img_fallecido = '<img src="images/cruz_fallecido.svg" alt="" width="10">';
							$textofallecido = '<p>Fecha en que Falleció: <strong>' . $fechaFallecido . '</strong></p>';
							$generarNotaDuelo = '';
						} elseif ($fallecido == '0') {
							$fallecido = 'NO';
							$textofallecido = ' ';
							$generarNotaDuelo = 'style="display:none"';
						};
						$contador++;
						$id = $row['ID'];
						$nombres = $row['nombres'];
						$apellidos = $row['apellidos'];
						$clase = $row['clase'];
						$nacionalidad = $row['nacionalidad'];
					?>
						<tr id="idestudiante:<?php echo $id ?>">
							<td>
								<p><strong><?php echo $contador ?></strong></p>
							</td>
							<td>
								<p><?php echo $fechaFallecido ?></p>
							</td>
							<td>
								<p><?php echo $clase ?></p>
							</td>
							<td>
								<p><?php echo $img_fallecido . " " . $nombres ?> <?php echo $apellidos ?></p>
							</td>
							<td>
								<p><?php echo $nacionalidad ?></p>
							</td>
							<td>
								<div class="acciones notas" <?php echo $generarNotaDuelo ?>>
									<a href="notas-de-duelo/index.php?ID=<?php echo $id ?>" target="_blank">
										<input type="submit" class="boton nuevo-registro" value="[pdf]"></a>
									<a href="notas-de-duelo/duelo-jpg.php?ID=<?php echo $id ?>" S target="_blank">
										<input type="submit" class="boton nuevo-registro" value="[jpg]"></a>
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
		<!-- Footer -->
		<?php
		include 'includes/templates/footer.php';
		?>