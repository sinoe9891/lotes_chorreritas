<?php
ob_start();
include 'includes/funciones.php';
include 'includes/sesiones.php';
include 'includes/conexion.php';
include_once 'includes/templates/header.php';

// Obtener el ID de la URL
if (isset($_GET['ID'])) {
	$user_id = $_GET['ID'];
}
?>

<div class="contenedor">
	<div class="contenedor-index">
		<div class="nav-logo">
			<div class="logo graduate-logo">
				<div class="caja">
					<a href="ver-fichas.php?mesSolicitud=13">
						<div class="back">
							<img src="images/icons/arrow-left.svg" alt="">
							<p style="margin-left:5px;">Regresar a Fichas</p>
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
				<h2>Vista de Resultado</h2>
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
			if (isset($_GET['ID'])) {
				// obtiene las información del graduado
				$solicitudes = obtenerInfoFichaPerfil($user_id);

				if ($solicitudes->num_rows > 0) {
					while ($row = $solicitudes->fetch_assoc()) {
						$id = $row['id'];
						$estado = $row['estado'];
						$nombres = $row['nombre_completo'];
						$fechaN = $row['fecha_nacimiento'];
						setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish');
						$newDate = date("F j, Y", strtotime($fechaN));
						$fechaNac = strftime("%d de %B de %Y", strtotime($newDate));
						$identidad = $row['identidad'];
						$estado_civil = $row['estado_civil'];
						$gender = $row['genero'];
						$direccion = $row['direccion'];
						$telefono = $row['telefono'];
						$celular = $row['celular'];
						$dependientes = $row['dependientes'];
						$correo = $row['correo'];
						$profesion = $row['profesion'];
						$lugar_empleo = $row['lugar_empleo'];
						$direccion_empleo = $row['direccion_empleo'];
						$cargo = $row['cargo'];
						$tiempo_laborando = $row['tiempo_laborando'];
						$telefono_empleo = $row['telefono_empleo'];
						// $hddate = date("d-m-Y", strtotime($fechaN)); 
			?>

						<div class="formulario">
							<form id="resultadoBusqueda" method="post">
								<h4 style="margin:10px 0;"><?php echo $nombres; ?></h4>
								<h4 style="margin:10px 0;">Id. <?php echo $identidad; ?></h4>
								<hr>
								<p>Género: <strong><?php
													if ($gender == 'M') {
														echo "Masculino";
													} else {
														echo "Femenino";
													}
													?></strong></p>
								<p>Estado Civil: <strong><?php
															if ($estado_civil == '1') {
																echo $estado_civil = 'Soltero';
															} elseif ($estado_civil == '2') {
																echo $estado_civil = 'Casado';
															} elseif ($estado_civil == '3') {
																echo $estado_civil = 'Divorciado';
															} elseif ($estado_civil == '4') {
																echo $estado_civil = 'Viudo';
															} elseif ($estado_civil == '5') {
																echo $estado_civil = 'Unión Libre';
															}
															?></strong></p>

								<?php
								if ($telefono != '') {
									echo "<p>Teléfono: <strong>$telefono</strong></p>";
								} else {
									echo "<p>Teléfono: <strong>No registrado</strong></p>";
								}
								if ($celular != '') {
									echo "<p>Celular: <strong>$celular</strong></p>";
								} else {
									echo "<p>Celular: <strong>No registrado</strong></p>";
								};
								?>
								<p>Fecha de Nacimiento: <strong><?php echo $fechaNac; ?></strong></p>
								<p>Residencia: <strong><?php echo $direccion; ?></strong></p>
								<p>Dependientes: <strong><?php echo $dependientes; ?></strong></p>
								<p>Correo: <strong><?php echo $correo; ?></strong></p>
								<p>Profesión u Oficio: <strong><?php echo $profesion; ?></strong></p>
								<p>Lugar de Empleo: <strong><?php echo $lugar_empleo; ?></strong></p>
								<p>Dirección Empleo: <strong><?php echo $direccion_empleo; ?></strong></p>
								<p>Cargo: <strong><?php echo $cargo; ?></strong></p>
								<p>Tiempo Laborando: <strong><?php echo $tiempo_laborando; ?></strong></p>
								<p>Teléfono Empleo: <strong><?php echo $telefono_empleo; ?></strong></p>

								<hr>

						</div>
		</div>
	</div>
	</form>
</div>
<?php
					}
				}
			}
?>