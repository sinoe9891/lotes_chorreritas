<?php
include 'includes/funciones.php';
include 'includes/sesiones.php';
include 'includes/conexion.php';
include 'includes/templates/header.php';
// Obtener el ID de la URL
if (isset($_GET['ID'])) {
	$user_id = $_GET['ID'];
}
date_default_timezone_set('America/Tegucigalpa');
?>

<div class="contenedor">
	<div class="contenedor-index">
		<div class="nav-logo">
			<div class="logo graduate-logo">
				<div class="caja">
					<?php
					$mes = date("m");
					echo '<a href="solicitudes.php?mesSolicitud=' . $mes . '">';
					?>
					<div class="back">
						<img src="images/icons/arrow-left.svg" alt="">
						<p style="margin-left:5px;">Regresar a Solicitudes</p>
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
			<div class="img-formulario">
				<img src="images/icons/perfil.svg" alt="">
				<div class="titulo-form">
					<h3>Información de Registro</h3>
				</div>
			</div>
			<?php
			// obtiene las información del graduado
			if ($_GET) {
				$solicitudes = obtenerInfoSolicitud($user_id);
			} else {
				header('Location: solicitudes.php?mesSolicitud=13');
			}
			if ($solicitudes->num_rows > 0) {
				while ($row = $solicitudes->fetch_assoc()) {
					$id = $row['id'];
					$estado = $row['estado'];
					$nombres = $row['nombre_completo'];
					$gender = $row['genero'];
					$fechaN = $row['fecha_nacimiento'];

					if ($gender == 'M') {
						$g = 'O';
					} elseif ($gender == 'F') {
						$g = 'A';
					}

					//Datos Actuales
					$infoActual = obtenerInfoGraduadoActual($id);
					if ($infoActual) {
						if ($infoActual->num_rows > 0) {
							while ($fila = $infoActual->fetch_assoc()) {
								$id = $fila['id'];
								$estado = $fila['estado'];
								$nombres = $fila['nombre_completo'];
								$identidad = $fila['identidad'];
								$estado_civil = $fila['estado_civil'];
								$gender = $fila['genero'];
								$direccion = $fila['direccion'];
								$ciudad = $fila['ciudad'];
								$departamento = $fila['departamento'];
								$telefono = $fila['telefono'];
								$celular = $fila['celular'];
								$dependientes = $fila['dependientes'];
								$correo = $fila['correo'];
								$profesion = $fila['profesion'];
								$lugar_empleo = $fila['lugar_empleo'];
								$direccion_empleo = $fila['direccion_empleo'];
								$cargo = $fila['cargo'];
								$tiempo_laborando = $fila['tiempo_laborando'];
								$telefono_empleo = $fila['telefono_empleo'];
							}

			?>
							<div class="formulario">
								<form id="formulario-aprobacion" method="post">
									<div class="colum-second">
										<div class="input">
											<div class="campo">
												<div class="icon">
													<img src="images/icons/profile.svg" alt="">
												</div>
												<input type="hidden" id="estado" name="estado" value="<?php echo $estado; ?>">
												<input type="hidden" id="fechaSolicitud" name="fechaSolicitud" value="<?php echo date('Y-m-d'); ?>">
												<input type="hidden" id="horaSolicitud" name="horaSolicitud" value="<?php echo date('H:i:s'); ?>">
												<input type="hidden" id="user_id" name="user_id" value="<?php echo $id; ?>">
												<input type="text" id="nombre" name="nombre" value="<?php echo $nombres; ?>">
											</div>
										</div>
										<div class="input">
											<div class="campo">
												<div class="icon">
													<img src="images/icons/profile.svg" alt="">
												</div>
												<input type="text" id="identidad" name="identidad" value="<?php echo $identidad; ?>">
											</div>
										</div>
										<div class="input">
											<div class="campo">
												<div class="icon">
													<img src="images/icons/profile.svg" alt="">
												</div>
												<input type="text" id="estado_civil" name="estado_civil" value="<?php
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
												}?>">
											</div>
										</div>
										<div class="input">
											<div class="campo">
												<div class="icon">
													<img src="images/icons/profile.svg" alt="">
												</div>
												<select name="genero" id="genero">
													<?php
													if ($gender == 'M') {
														echo "<option name='gender' value='M' readonly='readonly' selected>Masculino</option>";
													} else
														echo "<option name='gender' value='F' readonly='readonly' selected>Femenino</option>"
													?>
												</select>
											</div>
										</div>
										<div class="input">
											<div class="campo">
												<div class="icon">
													<i class="fas fa-mobile-alt"></i>
												</div>
												<input type="text" id="telefono" name="telefono" value="<?php echo $telefono; ?>" Placeholder="Teléfono">
											</div>
										</div>
										<div class="input">
											<div class="campo">
												<div class="icon">
													<i class="fas fa-phone"></i>
												</div>
												<input type="text" id="celular" name="celular" value="<?php echo $celular; ?>" Placeholder="Celular">
											</div>
										</div>
									</div>
									<div class="img-formulario">
										<div class="titulo-form">
											<h3>Información Personal</h3>
										</div>
									</div>
									<div class="colum-second">
										<div class="input1">
											<div class="titulos">
												<p>Fecha de nacimiento:</p>
											</div>
											<div class="campo campo2">
												<div class="icon">
													<i class="fas fa-birthday-cake"></i>
												</div>
												<input type="date" class="fecha_nacimiento" name="fecha_nacimiento" id="fecha_nacimiento" value="<?php echo $fechaN; ?>">
											</div>
										</div>
										<div class="input1">
											<div class="titulos">
												<p>Dirección:</p>
											</div>
											<div class="campo campo2">
												<div class="icon">
													<i class="fas fa-map-marker-alt"></i>
												</div>
												<input type="text" name="direccion" id="direccion" value="<?php echo $direccion; ?>" placeholder="Dirección">
											</div>
										</div>
										<div class="input1">
											<div class="titulos">
												<p>Ciudad:</p>
											</div>
											<div class="campo campo2">
												<div class="icon">
													<i class="fas fa-map-marker-alt"></i>
												</div>
												<input type="text" name="ciudad" id="ciudad" value="<?php echo $ciudad; ?>" placeholder="Ciudad">
											</div>
										</div>
										<div class="input1">
											<div class="titulos">
												<p>Departamento / Estado:</p>
											</div>
											<div class="campo campo2">
												<div class="icon">
													<i class="fas fa-map-marker-alt"></i>
												</div>
												<input type="text" name="departamento" id="departamento" value="<?php echo $departamento; ?>" placeholder="Departament / Estado">
											</div>
										</div>
										<div class="input1">
											<div class="titulos">
												<p>Dependientes</p>
											</div>
											<div class="campo campo2">
												<div class="icon">
													<i class="fa fa-users" aria-hidden="true"></i>
												</div>
												<input type="number" name="dependientes" id="correo" value="<?php echo $dependientes; ?>" placeholder="Dependientes">
											</div>
										</div>
										<div class="input1">
											<div class="titulos">
												<p>Correo</p>
											</div>
											<div class="campo campo2">
												<div class="icon">
													<i class="fas fa-envelope"></i>
												</div>
												<input type="email" name="correo" id="correo" value="<?php echo $correo; ?>" placeholder="Correo">
											</div>
										</div>
									</div>
									<div class="img-formulario">
										<div class="titulo-form">
											<h3>Información Laboral</h3>
										</div>
									</div>
									<div class="colum-second">
										<div class="input1">
											<div class="titulos">
												<p>Profesión u Oficio</p>
											</div>
											<div class="campo campo2">
												<div class="icon">
													<i class="fas fa-briefcase"></i>
												</div>
												<input type="text" name="profesion" id="profesion" value="<?php echo $profesion; ?>" placeholder="Profesión">
											</div>
										</div>
										<div class="input1">
											<div class="titulos">
												<p>Lugar de empleo</p>
											</div>
											<div class="campo campo2">
												<div class="icon">
													<i class="fas fa-building"></i>
												</div>
												<input type="text" name="lugar_empleo" id="lugar_empleo" value="<?php echo $lugar_empleo; ?>" placeholder="Lugar de Empleo">
											</div>
										</div>
										<div class="input1">
											<div class="titulos">
												<p>Dirección de Empleo</p>
											</div>
											<div class="campo campo2">
												<div class="icon">
													<i class="fas fa-building"></i>
												</div>
												<input type="text" name="direccion_empleo" id="direccion_empleo" value="<?php echo $direccion_empleo; ?>" placeholder="Dirección de empleo">
											</div>
										</div>
										<div class="input1">
											<div class="titulos">
												<p>Cargo</p>
											</div>
											<div class="campo campo2">
												<div class="icon">
													<i class="fas fa-building"></i>
												</div>
												<input type="text" name="cargo" id="cargo" value="<?php echo $cargo; ?>" placeholder="Cargo">
											</div>
										</div>
										<div class="input1">
											<div class="titulos">
												<p>Tiempo Laborando</p>
											</div>
											<div class="campo campo2">
												<div class="icon">
													<i class="fas fa-building"></i>
												</div>
												<input type="text" name="tiempo_laborando" id="tiempo_laborando" value="<?php echo $tiempo_laborando; ?>" placeholder="Tiempo Laborando">
											</div>
										</div>
										<div class="input1">
											<div class="titulos">
												<p>Teléfono de Empleo</p>
											</div>
											<div class="campo campo2">
												<div class="icon">
													<i class="fas fa-building"></i>
												</div>
												<input type="text" name="telefono_empleo" id="telefono_empleo" value="<?php echo $telefono_empleo; ?>" placeholder="Teléfono Empleo">
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
				}
			}
			?>
		</div>
	</div>
</div>
<?php
include 'includes/templates/footer.php';
?>