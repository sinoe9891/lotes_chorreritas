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
					<a href="editar-perfil.php">
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
				// $solicitudes = obtenerInfoSolicitud($user_id);
				$solicitudes = obtenerInfoFichaPerfil($user_id);
				$referenciasQuery = obtenerRerferencias($user_id);
				$beneficiarioQuery = obtenerBeneficiario($user_id);
				$financieraQuery = obtenerFinanciera($user_id);
			} else {
				header('Location: editar-perfil.php');
			}
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
					$nacionalidad = $row['nacionalidad'];
					$estado_civil = $row['estado_civil'];
					$gender = $row['genero'];
					$pais_reside = $row['pais_reside'];
					$direccion = $row['direccion'];
					$ciudad = $row['ciudad'];
					$departamento = $row['departamento'];
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

					$sueldos = $row['sueldos'];
					$remesas = $row['remesas'];
					$otros_ingresos = $row['otros_ingresos'];
					$prestamos = $row['prestamos'];
					$alquiler = $row['alquiler'];
					$otros_egresos = $row['otros_egresos'];
					//Conyugue
					$nombre_conyugue = $row['nombre_conyugue'];
					$identidad_conyugue = $row['identidad_conyugue'];
					$celular_conyugue = $row['celular_conyugue'];
					$fechanac_conyugue = $row['fechnac_conyugue'];
					$empresa_labora_conyugue = $row['empresa_labora_conyugue'];
					$telefono_empleo_conyugue = $row['telefono_empleo_conyugue'];
					$cargo_conyugue = $row['cargo_conyugue'];
					$tiempo_laborando_conyugue = $row['tiempo_laborando_conyugue'];

			?>
					<div class="img-formulario">
						<!-- <img id="img-profile" src="<?php echo $img; ?>" alt="img-profile"> -->
						<form id="eliminarImagen" method="get">
							<div class="titulo-form">
								<!-- <input type="hidden" id="id_foto" name="<?php echo $id; ?>" value="<?php echo $id; ?>"> -->
								<i class="fas fa-trash"></i>
							</div>
						</form>
						<div class="titulo-form">
							<h3>Información de Registro</h3>
						</div>
					</div>
					<div class="formulario">
						<form id="editarRegistro" method="post">
							<div class="colum-second">
								<div class="input">
									<div class="campo">
										<div class="icon">
											<img src="images/icons/profile.svg" alt="">
										</div>
										<input type="hidden" id="user_id" name="user_id" value="<?php echo $user_id; ?>">
										<input type="text" id="nombre" name="nombre" value="<?php echo $nombres; ?>">
									</div>
								</div>
								<div class="input">
									<div class="campo">
										<div class="icon">
											<img src="images/icons/profile.svg" alt="">
										</div>
										<input type="text" id="nacionalidad" name="nacionalidad" value="<?php echo $nacionalidad; ?>">
									</div>
								</div>
							</div>
							<div class="colum-second">
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
										<select name="estado_civil" id="estado_civil">
											<?php
											if ($estado_civil == "1") {
												echo "<option value='1' selected>Soltero</option>
													<option value='2'>Casado</option>;
													<option value='3'>Divorciado</option>;
													<option value='4'>Viudo</option>
													<option value='5'>Unión Libre</option>";
											} elseif ($estado_civil == "2") {
												echo "<option value='1'>Soltero(a)</option>
													<option value='2' selected>Casado(a)</option>
													<option value='3'>Divorciado(a)</option>
													<option value='4'>Viudo(a)</option>
													<option value='5'>Unión Libre</option>";
											} elseif ($estado_civil == "3") {
												echo "<option value='1'>Soltero(a)</option>
													<option value='2'>Casado(a)</option>
													<option value='3' selected>Divorciado(a)</option>
													<option value='4'>Viudo(a)</option>
													<option value='5'>Unión Libre</option>";
											} elseif ($estado_civil == "4") {
												echo "<option value='1'>Soltero(a)</option>
												<option value='2'>Casado(a)</option>
												<option value='3'>Divorciado(a)</option>
												<option value='4' selected>Viudo(a)</option>
												<option value='5'>Unión Libre</option>";
											} elseif ($estado_civil == "5") {
												echo "<option value='1'>Soltero(a)</option>
												<option value='2'>Casado(a)</option>
												<option value='3'>Divorciado(a)</option>
												<option value='4'>Viudo(a)</option>
												<option value='5' selected>Unión Libre</option>";
											}
											?>
										</select>
									</div>
								</div>
							</div>
							<div class="colum-second">
								<div class="input">
									<div class="campo">
										<div class="icon">
											<img src="images/icons/profile.svg" alt="">
										</div>
										<select name="genero" id="genero">
											<?php
											if ($gender == 'M') {
												echo "<option name='gender' value='M'selected>Masculino</option>";
												echo "<option name='gender' value='F'>Femenino</option>";
											} else {
												echo "<option name='gender' value='F' selected>Femenino</option>";
												echo "<option name='gender' value='M'>Masculino</option>";
											} ?>
										</select>
									</div>
								</div>
								<div class="input">
									<div class="campo">
										<div class="campo">
											<div class="icon">
												<img src="images/icons/profile.svg" alt="">
											</div>
											<input type="number" name="dependientes" id="dependientes" value="<?php echo $dependientes; ?>" placeholder="1">
										</div>
									</div>
								</div>
								<div class="input">
									<div class="campo">
										<div class="campo">
											<div class="icon">
												<i class="fas fa-building"></i>
											</div>
											<input type="text" name="profesion" id="profesion" value="<?php echo $profesion; ?>" placeholder="Comerciante, Ingeniero, Ama de Casa">
										</div>
									</div>
								</div>
							</div>
							<div class="img-formulario">
								<div class="titulo-form">
									<h3>Información Personal</h3>
								</div>
							</div>
							<div class="colum-second">
								<div class="input">
									<div class="campo">
										<div class="icon">
											<i class="fas fa-birthday-cake"></i>
										</div>
										<input type="date" class="fecha_nacimiento" name="fecha_nacimiento" id="fecha_nacimiento" value="<?php echo $fechaN; ?>">
									</div>
								</div>
								<div class="input">
									<div class="campo">
										<div class="icon">
											<i class="fas fa-flag"></i>
										</div>
										<input type="text" name="pais_reside" id="pais_reside" value="<?php echo $pais_reside; ?>" placeholder="País donde vive">
									</div>
								</div>
							</div>

							<div class="colum-second">
								<div class="input">
									<div class="campo">
										<div class="icon">
											<i class="fas fa-map-marker-alt"></i>
										</div>
										<input type="text" name="direccion" id="direccion" value="<?php echo $direccion; ?>" placeholder="Dirección">
									</div>
								</div>
								<div class="input">
									<div class="campo">
										<div class="icon">
											<i class="fas fa-city"></i>
										</div>
										<input type="text" name="ciudad" id="ciudad" value="<?php echo $ciudad; ?>" placeholder="Ciudad donde vive">
									</div>
								</div>
							</div>

							<div class="colum-second">
								<div class="input">
									<div class="campo">
										<div class="icon">
											<i class="fas fa-map-marker-alt"></i>
										</div>
										<input type="text" name="departamento" id="departamento" value="<?php echo $departamento; ?>" placeholder="Departamento">
									</div>
								</div>
								<div class="input">
									<div class="campo">
										<div class="icon">
											<i class="fas fa-envelope"></i>
										</div>
										<input type="email" name="correo" id="correo" value="<?php echo $correo; ?>" placeholder="Email">
									</div>
								</div>
							</div>
							<div class="colum-second">
								<div class="input">
									<div class="campo">
										<div class="icon">
											<i class="fas fa-mobile-alt"></i>
										</div>
										<input type="tel" name="celular" id="celular" value="<?php echo $celular; ?>" placeholder="Celular">
									</div>
								</div>
								<div class="input">
									<div class="campo">
										<div class="icon">

											<i class="fas fa-phone"></i>
										</div>
										<input type="tel" name="telefono" id="telefono" value="<?php echo $telefono; ?>" placeholder="Teléfono">
									</div>
								</div>
							</div>
							<div class="img-formulario">
								<div class="titulo-form">
									<h3>Información Laboral</h3>
								</div>
							</div>
							<div class="colum-second">
								<div class="input">
									<div class="campo">
										<div class="icon">
											<i class="fas fa-building"></i>
										</div>
										<input type="tel" name="lugar_empleo" id="lugar_empleo" value="<?php echo $lugar_empleo; ?>" placeholder="Empresa donde labora">
									</div>
								</div>
								<div class="input">
									<div class="campo">
										<div class="icon">
											<i class="fas fa-briefcase"></i>
										</div>
										<input type="text" name="direccion_empleo" value="<?php echo $direccion_empleo; ?>" id="direccion_empleo" placeholder="Dirección Empleo">
									</div>
								</div>
							</div>
							<div class="colum-second">
								<div class="input">
									<div class="campo">
										<div class="icon">
											<i class="fas fa-briefcase"></i>
										</div>
										<input type="text" name="cargo" value="<?php echo $cargo; ?>" id="cargo" placeholder="Cargo que desempeña">
									</div>
								</div>
								<div class="input">
									<div class="campo">
										<div class="icon">
											<i class="fas fa-calendar"></i>
										</div>
										<input type="text" name="tiempo_laborando" value="<?php echo $tiempo_laborando; ?>" id="tiempo_laborando" placeholder="Eje. 5 años">
									</div>
								</div>
							</div>
							<div class="colum-second">
								<div class="input">
									<div class="campo">
										<div class="icon">
											<i class="fas fa-phone"></i>
										</div>
										<input type="tel" name="telefono_empleo" id="telefono_empleo" value="<?php echo $telefono_empleo; ?>" placeholder="Teléfono Empleo">
									</div>
								</div>
							</div>
							<!-- <div class="colum-second">
								<div class="input" style="width: 100% !important;">
									<div class="campo" style="width: 100% !important;margin-bottom: 0;">
										<div class="icon">
											<i class="fab fa-linkedin"></i>
										</div>
										<input type="url" name="url_linkedin" id="url_linkedin" value="<?php echo $url_linkedin; ?>" placeholder="https://www.linkedin.com/">
									</div>
								</div>
							</div> -->
							<div class="img-formulario">
								<div class="titulo-form">
									<h3>Datos Personales del Conyuge</h3>
								</div>
							</div>
							<div class="colum-second">
								<div class="input">
									<div class="campo">
										<div class="icon">
											<i class="fas fa-user"></i>
										</div>
										<input type="text" name="nombre_conyugue" id="nombre_conyugue" value="<?php echo $nombre_conyugue; ?>" placeholder="Nombre">
									</div>
								</div>
								<div class="input">
									<div class="campo">
										<div class="icon">
											<i class="fas fa-user"></i>
										</div>
										<input type="text" name="identidad_conyugue" id="identidad_conyugue" value="<?php echo $identidad_conyugue; ?>" placeholder="Identidad">
									</div>
								</div>
							</div>
							<div class="colum-second">
								<div class="input">
									<div class="campo">
										<div class="icon">
											<i class="fas fa-mobile-alt"></i>
										</div>
										<input type="tel" name="celular_conyugue" id="celular_conyugue" value="<?php echo $celular_conyugue; ?>" placeholder="Celular">
									</div>
								</div>
								<div class="input">
									<div class="campo">
										<div class="icon">
											<i class="fas fa-birthday-cake"></i>
										</div>
										<input type="date" class="fechanac_conyugue" name="fechanac_conyugue" id="fechanac_conyugue" value="<?php echo $fechanac_conyugue; ?>">
									</div>
								</div>
								<div class="input">
									<div class="campo">
										<div class="icon">
											<i class="fas fa-building"></i>
										</div>
										<input type="tel" name="empresa_labora_conyugue" id="empresa_labora_conyugue" value="<?php echo $empresa_labora_conyugue; ?>" placeholder="Empresa donde labora">
									</div>
								</div>
								<div class="input">
									<div class="campo">
										<div class="icon">

											<i class="fas fa-phone"></i>
										</div>
										<input type="tel" name="telefono_empleo_conyugue" id="telefono_empleo_conyugue" value="<?php echo $telefono_empleo_conyugue; ?>" placeholder="Teléfono">
									</div>
								</div>
							</div>
							<div class="colum-second">
								<div class="input">
									<div class="campo">
										<div class="icon">
											<i class="fas fa-briefcase"></i>
										</div>
										<input type="text" name="cargo_conyugue" value="<?php echo $cargo_conyugue; ?>" id="cargo_conyugue" placeholder="Cargo que desempeña">
									</div>
								</div>
								<div class="input">
									<div class="campo">
										<div class="icon">
											<i class="fas fa-calendar"></i>
										</div>
										<input type="text" name="tiempo_laborando_conyugue" value="<?php echo $tiempo_laborando_conyugue; ?>" id="tiempo_laborando_conyugue" placeholder="Eje. 5 años">
									</div>
								</div>
							</div>
							<div class="img-formulario">
								<div class="titulo-form">
									<h3>Beneficiario</h3>
								</div>
							</div>
							<?php
							if ($beneficiarioQuery->num_rows > 0) {
								$contador = 0;
								while ($row = $beneficiarioQuery->fetch_assoc()) {
									//Referencias
									$nombre_beneficiario = $row['nombre_beneficiario'];
									$identidad_beneficiario = $row['identidad_beneficiario'];
									$genero_beneficiario = $row['genero_beneficiario'];
									$direccion_beneficiario = $row['direccion_beneficiario'];
									$ciudad_beneficiario = $row['ciudad_beneficiario'];
									$departamento_beneficiario = $row['departamento_beneficiario'];
									$celular_beneficiario = $row['celular_beneficiario'];

									// $hddate = date("d-m-Y", strtotime($fechaN)); 
							?>

									<div class="colum-second">
										<div class="input">
											<div class="campo">
												<div class="icon">
													<img src="images/icons/profile.svg" alt="">
												</div>
												<input type="text" id="nombre_beneficiario" name="nombre_beneficiario" value="<?php echo $nombre_beneficiario; ?>">
											</div>
										</div>
										<div class="input">
											<div class="campo">
												<div class="icon">
													<img src="images/icons/profile.svg" alt="">
												</div>
												<input type="text" id="identidad_beneficiario" name="identidad_beneficiario" value="<?php echo $identidad_beneficiario; ?>">
											</div>
										</div>
									</div>
									<div class="colum-second">
										<div class="input">
											<div class="campo">
												<div class="icon">
													<img src="images/icons/profile.svg" alt="">
												</div>
												<select name="genero_beneficiario" id="genero_beneficiario">
													<?php
													if ($genero_beneficiario == 'M') {
														echo "<option name='gender' value='M'selected>Masculino</option>";
														echo "<option name='gender' value='F'>Femenino</option>";
													} else {
														echo "<option name='gender' value='F' selected>Femenino</option>";
														echo "<option name='gender' value='M'>Masculino</option>";
													} ?>
												</select>
											</div>
										</div>
										<div class="input">
											<div class="campo">
												<div class="icon">
													<i class="fas fa-map-marker-alt"></i>
												</div>
												<input type="text" name="direccion_beneficiario" id="direccion_beneficiario" value="<?php echo $direccion_beneficiario; ?>" placeholder="Dirección">
											</div>
										</div>
									</div>
									<div class="colum-second">
										<div class="input">
											<div class="campo">
												<div class="icon">
													<i class="fas fa-city"></i>
												</div>
												<input type="text" name="ciudad_beneficiario" id="ciudad_beneficiario" value="<?php echo $ciudad_beneficiario; ?>" placeholder="Ciudad donde vive">
											</div>
										</div>
										<div class="input">
											<div class="campo">
												<div class="icon">
													<i class="fas fa-city"></i>
												</div>
												<input type="text" name="departamento_beneficiario" id="departamento_beneficiario" value="<?php echo $departamento_beneficiario; ?>" placeholder="Departamento donde vive">
											</div>
										</div>
									</div>
									<div class="colum-second">
										<div class="input">
											<div class="campo">
												<div class="icon">
													<i class="fas fa-mobile-alt"></i>
												</div>
												<input type="tel" name="celular_beneficiario" id="celular_beneficiario" value="<?php echo $celular_beneficiario; ?>" placeholder="Celular">
											</div>
										</div>
									</div>
							<?php
								}
							};
							?>
							<div class="img-formulario">
								<div class="titulo-form">
									<h3>Información Financiera</h3>
								</div>
							</div>
							<?php
							if ($financieraQuery->num_rows > 0) {
								$contador = 0;
								while ($row = $financieraQuery->fetch_assoc()) {
									//Referencias
									$contador++;
									$sueldos = $row['sueldos'];
									$remesas = $row['remesas'];
									$otros_ingresos = $row['otros_ingresos'];
									$prestamos = $row['prestamos'];
									$alquiler = $row['alquiler'];
									$otros_egresos = $row['otros_egresos'];

									// $hddate = date("d-m-Y", strtotime($fechaN)); 
							?>
							<p class="bold">Ingresos Mensuales</p>
							<div class="colum-second">
								<div class="input">
									<div class="campo">
										<div class="icon">
											<img src="images/icons/profile.svg" alt="">
										</div>
										<input type="number" name="sueldos" id="sueldos" value="<?php echo $sueldos; ?>" placeholder="Sueldo">
									</div>
								</div>
								<div class="input">
									<div class="campo">
										<div class="icon">
											<img src="images/icons/profile.svg" alt="">
										</div>
										<input type="number" name="remesas" id="remesas" value="<?php echo $remesas; ?>" placeholder="Remesas/Comisiones">
									</div>
								</div>
								<div class="input">
									<div class="campo">
										<div class="icon">
											<img src="images/icons/profile.svg" alt="">
										</div>
										<input type="number" name="otros_ingresos" id="otros_ingresos" value="<?php echo $otros_ingresos; ?>" placeholder="Otros">
									</div>
								</div>
							</div>
							<p class="bold">Egresos Mensuales</p>
							<div class="colum-second">
								<div class="input">
									<div class="campo">
										<div class="icon">
											<img src="images/icons/profile.svg" alt="">
										</div>
										<input type="number" name="prestamos" id="prestamos" value="<?php echo $prestamos; ?>" placeholder="Prestamos">
									</div>
								</div>
								<div class="input">
									<div class="campo">
										<div class="icon">
											<img src="images/icons/profile.svg" alt="">
										</div>
										<input type="number" name="alquiler" id="alquiler" value="<?php echo $alquiler; ?>" placeholder="Alquiler/Alimentación">
									</div>
								</div>
								<div class="input">
									<div class="campo">
										<div class="icon">
											<img src="images/icons/profile.svg" alt="">
										</div>
										<input type="number" name="otros_egresos" id="otros_egresos" value="<?php echo $otros_egresos; ?>" placeholder="Otros">
									</div>
								</div>
							</div>
							<div class="img-formulario">
								<div class="titulo-form">
									<h3>Referencias Personales</h3>
								</div>
							</div>
							<?php
								}
							};
							?>
							<?php
							if ($referenciasQuery->num_rows > 0) {
								$contador = 0;
								while ($row = $referenciasQuery->fetch_assoc()) {
									//Referencias
									$contador++;
									$nombre_referencia = $row['nombre_referencia'];
									$direccion_referencia = $row['direccion_referencia'];
									$celular_referencia = $row['celular_referencia'];
									$telefono_referencia = $row['telefono_referencia'];
									$empresa_labora_referencia = $row['empresa_labora_referencia'];
									$telefono_empleo_referencia = $row['telefono_empleo_referencia'];

									// $hddate = date("d-m-Y", strtotime($fechaN)); 
							?>
									<p> Referencia <?php echo $contador; ?></p>
									<div class="colum-second">
										<div class="input">
											<div class="campo">
												<div class="icon">
													<i class="fas fa-user"></i>
												</div>
												<input type="text" name="nombre_referencia_<?php echo $contador; ?>" id="nombre_referencia_<?php echo $contador; ?>" value="<?php echo $nombre_referencia; ?>" placeholder="Nombre">
											</div>
										</div>
										<div class="input">
											<div class="campo">
												<div class="icon">
													<i class="fas fa-map-marker-alt"></i>
												</div>
												<input type="text" name="direccion_referencia_<?php echo $contador; ?>" id="direccion_referencia_<?php echo $contador; ?>" value="<?php echo $direccion_referencia; ?>" placeholder="Dirección">
											</div>
										</div>
									</div>
									<div class="colum-second">
										<div class="input">
											<div class="campo">
												<div class="icon">
													<i class="fas fa-mobile-alt"></i>
												</div>
												<input type="tel" name="celular_referencia_<?php echo $contador; ?>" id="celular_referencia_<?php echo $contador; ?>" value="<?php echo $celular_referencia; ?>" placeholder="Celular">
											</div>
										</div>
										<div class="input">
											<div class="campo">
												<div class="icon">
													<i class="fas fa-phone"></i>
												</div>
												<input type="tel" name="telefono_referencia_<?php echo $contador; ?>" id="telefono_referencia_<?php echo $contador; ?>" value="<?php echo $telefono_referencia; ?>" placeholder="Teléfono">
											</div>
										</div>
									</div>
									<div class="colum-second">
										<div class="input">
											<div class="campo">
												<div class="icon">
													<i class="fas fa-building"></i>
												</div>
												<input type="tel" name="empresa_labora_referencia_<?php echo $contador; ?>" id="empresa_labora_referencia_<?php echo $contador; ?>" value="<?php echo $empresa_labora_referencia; ?>" placeholder="Empresa donde labora">
											</div>
										</div>
										<div class="input">
											<div class="campo">
												<div class="icon">

													<i class="fas fa-phone"></i>
												</div>
												<input type="tel" name="telefono_empleo_referencia_<?php echo $contador; ?>" id="telefono_empleo_referencia_<?php echo $contador; ?>" value="<?php echo $telefono_empleo_referencia; ?>" placeholder="Teléfono Empleo">
											</div>
										</div>
									</div>
							<?php
								}
							};
							?>
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