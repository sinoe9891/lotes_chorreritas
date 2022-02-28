<?php
include 'includes/funciones.php';
include 'includes/conexion.php';
include 'includes/templates/header-graduate.php';
$nacionalidad1 = "SELECT nacionalidad FROM graduandos GROUP BY nacionalidad ORDER BY nacionalidad ASC";
$resultado1 = $conn->query($nacionalidad1);
?>
<style>
	.active-update-data a {
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
						<h2 style="color: #008341 !important;font-size: 25px;font-weight: 400;">Comunidad de zamoranos en el mundo.</h2>
						<h2 style="color: #008341 !important;font-size: 27px;margin-top: 5px">Creación de Perfil de Graduado</h2>
						<p style="text-align:left;">Es necesario que incluyas todos los datos solicitados. Esta información será el perfil oficial Zamorano y estará expuesto en el listado de graduados para que puedan visualizarlo empresas y otros colegas que deseen conocerte y evaluar tu área de expertis.<br><br>
						Si tus datos <span style="color:#931919; font-weight:bold;">NO están completos y cuentas con errores ortográficos, no se brindará un correo de confirmación valido para tu hoja de salida.</span></p>
						</p>
						<p style="text-align:left;"> A continuación busca por tu nombre para poder crear tu perfil.</p>
					</div>
				</div>
			</div>
			<div class="contenedor-formulario">
				<div class="contenedor-login">
					<div class="caja-register" style="padding-bottom: 0;">
						<div class="img-formulario">
							<div class="titulo-form">
								<h3>Busca tu nombre para crear <br>tu de Perfil de Graduado</h3>
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
											<input type="hidden" class="mesNacimiento" name="mesNacimiento" id="mesNacimiento" placeholder="mesNacimiento">
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
								<div class="campo enviar registro">
									<div class="boton-registro">
										<input type="hidden" id="fondos_entidades" value="buscar">
										<input type="hidden" id="tipo" value="buscar">
										<!-- <input type="submit" name='submit' class="boton nuevo-registro" value="Buscar Graduado"> -->
										<input type="submit" class="boton nuevo-registro" value="Buscar">
									</div>
								</div>
							</form>
						</div>
						<?php
						if (isset($_GET['nombres']) || isset($_GET['apellidos'])) {
							// $id = $_GET['ID'];
							$nombres = $_GET['nombres'];
							$lastname = $_GET['apellidos'];
							$consulta = $conn->query("SELECT * FROM graduandos WHERE nombres LIKE '%$nombres%' AND apellidos LIKE '%$lastname%' ORDER BY nombres ASC");
							// obtiene las información del graduado
							// $busqueda = obtenerBusqueda($nombres);
						?>
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
									<th class="nacionality">Nacionalidad</th>
									<th>Acciones</th>
								</tr>
								<?php
								$contador = 0;
								// CONDICIÓN FALLECIDO
								while ($row = $consulta->fetch_array()) {
									$fallecido = $row['deceased'];
									$fechaFallecido = $row['date_deceased'];
									$img_fallecido = '';
									$textofallecido = '';
									if ($fallecido == '1') {
										$img_fallecido = '<img src="images/cruz_fallecido.svg" alt="" width="10">';
										$textofallecido = '<p>Fecha en que Falleció: <strong>' . $fechaFallecido . '</strong></p>';
										$update = 'style="display:none"';
									} elseif ($fallecido == '0') {
										$fallecido = 'NO';
										$textofallecido = ' ';
										$update = '';
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
											<p><?php echo $clase ?></p>
										</td>
										<td>
											<p><?php echo $img_fallecido . " " . $nombres ?> <?php echo $apellidos ?></p>
										</td>
										<td class="nacionality">
											<p><?php echo $nacionalidad ?></p>
										</td>
										<td>
											<div class="acciones" <?php echo $update ?>>
												<a href="graduandos-datos.php?ID=<?php echo $id ?>">
													<input type="submit" class="boton actualizar nuevo-registro" value="Crear Perfil"></a>
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
		</div>
		<?php
		include 'includes/templates/sidebar.php';
		?>
	</div>
</div>
<?php
include 'includes/templates/footer.php';
?>