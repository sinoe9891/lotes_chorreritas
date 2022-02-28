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
			if($_GET){
				$solicitudes = obtenerInfoSolicitud($user_id);
			}else{
				header('Location: solicitudes.php?mesSolicitud=13');
			}
			if ($solicitudes->num_rows > 0) {
				while ($row = $solicitudes->fetch_assoc()) {
					$id_temp = $row['id_temp'];
					$id = $row['ID'];
					$estado = $row['estado'];
					$codigo = $row['codigo'];
					$clase = $row['clase'];
					$nombres = $row['nombres'];
					$first_name = $row['primer_nombre'];
					$secondname = $row['segundo_nombre'];
					$lastname = $row['apellidos'];
					$primer_apellido = $row['primer_apellido'];
					$segundo_apellido = $row['segundo_apellido'];
					$apodo = $row['nickname'];
					$nacionalidad  = $row['nacionalidad'];
					$gender = $row['genero'];
					$fechaN = $row['fecha_nacimiento'];
					$pais_reside = $row['pais_reside'];
					$ciudad = $row['ciudad'];
					$direccion = $row['direccion'];
					$email = $row['email'];
					$email2 = $row['email_2'];
					$email3 = $row['email_3'];
					$telefono = $row['telefono'];
					$movil = $row['movil'];
					$empresa_labora = $row['empresa_labora'];
					$rubro_empresa_labora = $row['rubros'];
					$area_interes = $row['area_interes'];
					$url_linkedin = $row['url_linkedin'];

					$programa = $row['programa'];
					$orientacion = $row['orientacion'];
					$lugar_pasantia = $row['lugar_pasantia'];
					$direccion_pasantia = $row['direccion_pasantia'];
					$rubro_empresa_pasantia = $row['rubro_empresa'];
					$exp_pasantia = $row['exp_pasantia'];
					$area_investigacion = $row['area_investigacion'];
					$titulo_tesis = $row['titulo_tesis'];
					$asesor_tesis = $row['asesor_tesis'];
					$url_tesis = $row['url_tesis'];
					$financiado_por = $row['financiado_por'];
					$otras_entidades = $row['otras_entidades'];
					$fondos_zamorano = $row['fondos_zamorano'];
					$fondos_propios = $row['fondos_propios'];
					$fondos_entidades = $row['fondos_entidades'];
					$correo1 = $row['email_2'];
					$correo2 = $row['email_3'];
					$linkedin = $row['linkedin'];
					$fallecido = $row['deceased'];
					$fechaFallecido = $row['date_deceased'];
					$fechaNotaDuelo = $row['fechaNotaDuelo'];
					$estatus = $row['estatus'];
					$pa = $row['pa'];
					$anioIA = $row['anioIA'];
					$dia_graduacion = $row['dia_graduacion'];
					$mes_graduacion = $row['mes_graduacion'];
					$codigoIA = $row['codigoIA'];
					if ($gender == 'M') {
						$g = 'O';
					} elseif ($gender == 'F') {
						$g = 'A';
					}
					//CONDICIÓN TÍTULO
					$tituloPrograma = '';
					if ($programa == '0077') {
						$titulo = 'AGRÓNOMO';
						$view = 'style="display:initial;"';
						$viewinfo = 'style="display:initial;"';
						if ($orientacion == '') {
							$viewOrientation = 'style="display:none;"';
						} else {
							$viewOrientation = '';
						}
						$tituloPrograma = '<p><i class="fas fa-graduation-cap" style="padding-right:2px;"></i> Título PIA: <strong>INGENIERO AGRÓNOMO (' . $anioIA . ')</strong>';
					}
					// CONDICIÓN PPIA
					if ($programa == '0707') {
						$titulo = 'PPIA: INGENIERO AGRÓNOMO ' . $anioIA;
						$view = 'style="display:initial;"';
						$viewinfo = 'style="display:none;"';
						if ($orientacion == '') {
							$viewOrientation = 'style="display:none;"';
						} else {
							$viewOrientation = '';
						}
						$tituloPrograma = '<p><i class="fas fa-graduation-cap" style="padding-right:2px;"></i> Título PPIA: <strong>INGENIERO AGRÓNOMO (' . $anioIA . ')</strong>';
					}
					if ($programa == '0007') {
						$titulo = 'AGRÓNOMO';
						$view = 'style="display:none;"';
						$viewinfo = 'style="display:initial;"';
						if ($orientacion == '') {
							$viewOrientation = 'style="display:none;"';
						} else {
							$viewOrientation = '';
						}
					}
					//CONDICIÓN TÍTULO 4X4
					if ($programa == '0777') {
						$view = 'style="display:initial;"';
						$viewinfo = 'style="display:initial;"';
						if ($orientacion == '') {
							$viewOrientation = 'style="display:none;"';
						} else {
							$viewOrientation = '';
						}
						if ($orientacion == 'GESTION DE AGRONEGOCIOS') {
							$titulo = 'INGENIER' . $g . ' EN GESTION DE AGRONEGOCIOS';
						}
						if ($orientacion == 'AGROINDUSTRIA') {
							$titulo = 'INGENIER' . $g . ' EN AGROINDUSTRIA';
						}
						if ($orientacion == 'INGENIERIA AGRONÓMICA') {
							$titulo = 'INGENIER' . $g . ' AGRÓNOM' . $g;
						}
						if ($orientacion == 'AGROINDUSTRIA ALIMENTARIA') {
							$titulo = 'INGENIER' . $g . ' EN AGROINDUSTRIA ALIMENTARIA';
						}
						if ($orientacion == 'ADMINISTRACION DE AGRONEGOCIOS') {
							$titulo = 'INGENIER' . $g . ' EN ADMINISTRACION DE AGRONEGOCIOS';
						}
						if ($orientacion == 'DESARROLLO SOCIOECONOMICO Y AMBIENTE') {
							$titulo = 'INGENIER' . $g . ' EN DESARROLLO SOCIOECONOMICO Y AMBIENTE';
						}
						if ($orientacion == 'AMBIENTE Y DESARROLLO') {
							$titulo = 'INGENIER' . $g . ' EN AMBIENTE Y DESARROLLO';
						}
					}
					//Datos Actuales
					$infoActual = obtenerInfoGraduadoActual($id);
					if ($infoActual) {
						if ($infoActual->num_rows > 0) {
							while ($fila = $infoActual->fetch_assoc()) {
								$codigo_actu = $fila['codigo'];
								$clase_actu = $fila['clase'];
								$nombres_actu = $fila['nombres'];
								$first_name_actu = $fila['primer_nombre'];
								$secondname_actu = $fila['segundo_nombre'];
								$lastname_actu = $fila['apellidos'];
								$primer_apellido_actu = $fila['primer_apellido'];
								$segundo_apellido_actu = $fila['segundo_apellido'];
								$apodo_actu = $fila['nickname'];
								$nacionalidad_actu = $fila['nacionalidad'];
								$gender_actu = $fila['genero'];
								$fechaN_ac = new DateTime($fila['fecha_nacimiento']);
								$fechaN_actu = date_format($fechaN_ac, "Y-m-d");
								$pais_reside_actu = $fila['pais_reside'];
								$ciudad_actu = $fila['ciudad'];
								$direccion_actu = $fila['direccion'];
								$email_actu = $fila['email'];
								$correo1_actu = $fila['email_2'];
								$correo2_actu = $fila['email_3'];
								$telefono_actu = $fila['telefono'];
								$movil_actu = $fila['movil'];
								$empresa_labora_actu = $fila['empresa_labora'];
								$rubro_empresa_labora_actu = $fila['rubros'];
								$area_interes_actu = $fila['area_interes'];
								$url_linkedin_actu = $fila['url_linkedin'];
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
												<input type="hidden" id="linkedin" name="linkedin" value="<?php echo $linkedin; ?>">
												<input type="hidden" id="fallecido" name="fallecido" value="<?php echo $fallecido; ?>">
												<input type="hidden" id="fechaFallecido" name="fechaFallecido" value="<?php echo $fechaFallecido; ?>">
												<input type="hidden" id="fechaNotaDuelo" name="fechaNotaDuelo" value="<?php echo $fechaNotaDuelo; ?>">
												<input type="hidden" id="estatus" name="estatus" value="<?php echo $estatus; ?>">
												<input type="hidden" id="pa" name="pa" value="<?php echo $pa; ?>">
												<input type="hidden" id="anioIA" name="anioIA" value="<?php echo $anioIA; ?>">
												<input type="hidden" id="dia_graduacion" name="dia_graduacion" value="<?php echo $dia_graduacion; ?>">
												<input type="hidden" id="mes_graduacion" name="mes_graduacion" value="<?php echo $mes_graduacion; ?>">
												<input type="hidden" id="codigoIA" name="codigoIA" value="<?php echo $codigoIA; ?>">

												<input type="hidden" id="estado" name="estado" value="<?php echo $estado; ?>" readonly="readonly">
												<input type="hidden" id="id_temp" name="id_temp" value="<?php echo $id_temp; ?>" readonly="readonly">
												<input type="hidden" id="fechaSolicitud" name="fechaSolicitud" value="<?php echo date('Y-m-d'); ?>">
												<input type="hidden" id="horaSolicitud" name="horaSolicitud" value="<?php echo date('H:i:s'); ?>">
												<input type="hidden" id="user_id" name="user_id" value="<?php echo $id; ?>">
												<input type="hidden" id="firstname" name="firstname" value="<?php echo $first_name; ?>">
												<input type="hidden" id="secondname" name="secondname" value="<?php echo $secondname; ?>">
												<input type="text" id="nombre" name="nombre" value="<?php echo $nombres; ?>" readonly="readonly">
											</div>
										</div>
										<div class="input">
											<div class="campo">
												<div class="icon">
													<img src="images/icons/profile.svg" alt="">
												</div>
												<input type="hidden" id="primerapellido" name="primerapellido" value="<?php echo $primer_apellido; ?>" readonly="readonly">
												<input type="hidden" id="segundoapellido" name="segundoapellido" value="<?php echo $segundo_apellido; ?>" readonly="readonly">
												<input type="text" id="apellidos" name="apellidos" value="<?php echo $lastname; ?>" readonly="readonly">
											</div>
										</div>
									</div>
									<div class="colum-second">
										<div class="input">
											<div class="campo">
												<div class="icon">
													<img src="images/icons/profile.svg" alt="">
												</div>
												<input type="text" id="clase" name="clase" value="<?php echo $clase; ?>" readonly="readonly">
											</div>
										</div>
										<div class="input">
											<div class="campo">
												<div class="icon">
													<img src="images/icons/profile.svg" alt="">
												</div>
												<input type="text" id="codigo" name="codigo" value="<?php echo $codigo; ?>" readonly="readonly">
											</div>
										</div>
									</div>
									<div class="colum-second">
										<div class="input">
											<div class="campo">
												<div class="icon">
													<img src="images/icons/profile.svg" alt="">
												</div>
												<input type="text" id="nacionalidad" name="nacionalidad" value="<?php echo $nacionalidad; ?>" readonly="readonly">
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
									</div>
									<div class="colum-second">
										<hr>
										<div class="input1">
											<div class="titulos">
												<p>Apodo actual: <i class="far fa-copy" id="copiarApodo" onclick=""> <span>Copiar</span> </i> <i class="fas fa-undo"> <span>Deshacer</span></i></p>
											</div>
											<div class="campo campo2">
												<div class="icon">
													<img src="images/icons/profile.svg" alt="">
												</div>
												<input type="text" id="apodo_actu" name="apodo_actu" value="<?php echo $apodo_actu; ?>" placeholder="Apodo" readonly='readonly'>
											</div>
											<div class="titulos">
												<p><strong>Actualización Solicitada:</strong></p>
											</div>
											<div class="campo campo2">
												<div class="icon">
													<img src="images/icons/profile.svg" alt="">
												</div>
												<input type="text" id="apodo" name="apodo" value="<?php echo $apodo; ?>" placeholder="Apodo">
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
												<p>Fecha de nacimiento actual: <i class="far fa-copy" id="copiarFNacimiento" onclick=""> <span>Copiar</span> </i> <i class="fas fa-undo"> <span>Deshacer</span></i></p>
											</div>
											<div class="campo campo2">
												<div class="icon">
													<i class="fas fa-birthday-cake"></i>
												</div>
												<input type="date" class="fecha_nacimiento2" name="fecha_nacimiento2" id="fecha_nacimiento2" value="<?php echo $fechaN_actu; ?>" readonly='readonly'>
											</div>
											<div class="titulos">
												<p><strong>Actualización Solicitada:</strong></p>
											</div>
											<div class="campo campo2">
												<div class="icon">
													<i class="fas fa-birthday-cake"></i>
												</div>
												<input type="date" class="fecha_nacimiento" name="fecha_nacimiento" id="fecha_nacimiento" value="<?php echo $fechaN; ?>" readonly="readonly">
											</div>
										</div>
										<hr>
										<div class="input1">
											<div class="titulos">
												<p>Dato actual: <i class="far fa-copy" id="copiarPais" onclick=""> <span>Copiar</span> </i> <i class="fas fa-undo"> <span>Deshacer</span></i></p>
											</div>
											<div class="campo campo2">
												<div class="icon">
													<i class="fas fa-flag"></i>
												</div>
												<input type="text" name="pais_reside2" id="pais_reside2" value="<?php echo $pais_reside_actu; ?>" placeholder="País donde vive" readonly='readonly'>
											</div>
											<div class="titulos">
												<p><strong>Actualización Solicitada:</strong></p>
											</div>
											<div class="campo campo2">
												<div class="icon">
													<i class="fas fa-flag"></i>
												</div>
												<input type="text" name="pais_reside" id="pais" value="<?php echo $pais_reside; ?>" placeholder="País donde vive">
											</div>
										</div>
										<hr>
									</div>
									<div class="colum-second">
										<div class="input1">
											<div class="titulos">
												<p>Dato actual: <i class="far fa-copy" id="copiarCiudad" onclick=""> <span>Copiar</span> </i> <i class="fas fa-undo"> <span>Deshacer</span></i></p>
											</div>
											<div class="campo campo2">
												<div class="icon">
													<i class="fas fa-city"></i>
												</div>
												<input type="text" name="ciudad2" id="ciudad2" value="<?php echo $ciudad_actu; ?>" placeholder="Ciudad donde vive">
											</div>
											<div class="titulos">
												<p><strong>Actualización Solicitada:</strong></p>
											</div>
											<div class="campo campo2">
												<div class="icon">
													<i class="fas fa-city"></i>
												</div>
												<input type="text" name="ciudad" id="ciudad" value="<?php echo $ciudad; ?>" placeholder="Ciudad donde vive">
											</div>
										</div>
										<hr>
										<div class="input1">
											<div class="titulos">
												<p>Dato actual: <i class="far fa-copy" id="copiarDireccion" onclick=""> <span>Copiar</span> </i> <i class="fas fa-undo"> <span>Deshacer</span></i></p>
											</div>
											<div class="campo campo2">
												<div class="icon">
													<i class="fas fa-map-marker-alt"></i>
												</div>
												<input type="text" name="direccion2" id="direccion2" value="<?php echo $direccion_actu; ?>" placeholder="Dirección">
											</div>
											<div class="titulos">
												<p><strong>Actualización Solicitada:</strong></p>
											</div>
											<div class="campo campo2">
												<div class="icon">
													<i class="fas fa-map-marker-alt"></i>
												</div>
												<input type="text" name="direccion" id="direccion" value="<?php echo $direccion; ?>" placeholder="Dirección">
											</div>
										</div>
										<hr>
									</div>

									<div class="colum-second">
										<div class="input1">
											<div class="titulos">
												<p>Dato actual: <i class="far fa-copy" id="copiarCorreo" onclick=""> <span>Copiar</span> </i> <i class="fas fa-undo"> <span>Deshacer</span></i></p>
											</div>
											<div class="campo campo2">
												<div class="icon">
													<i class="fas fa-envelope"></i>
												</div>
												<input type="email" name="email" id="email2" value="<?php echo $email_actu; ?>" placeholder="Email" readonly="readonly">
											</div>
											<div class="titulos">
												<p><strong>Actualización Solicitada:</strong></p>
											</div>
											<div class="campo campo2">
												<div class="icon">
													<i class="fas fa-envelope"></i>
												</div>
												<input type="email" name="email" id="correo" value="<?php echo $email; ?>" placeholder="Email">
											</div>
										</div>
										<hr>
										<div class="input1">
											<div class="titulos">
												<p>Dato actual: <i class="far fa-copy" id="copiarCorreo2" onclick=""> <span>Copiar</span> </i> <i class="fas fa-undo"> <span>Deshacer</span></i></p>
											</div>
											<div class="campo campo2">
												<div class="icon">
													<i class="fas fa-envelope"></i>
												</div>
												<input type="email" name="correo1_actu" id="correo1_actu" value="<?php echo $correo1_actu; ?>" placeholder="Correo 2">
											</div>
											<div class="titulos">
												<p><strong>Actualización Solicitada:</strong></p>
											</div>
											<div class="campo campo2">
												<div class="icon">
													<i class="fas fa-envelope"></i>
												</div>
												<input type="email" name="correo1" id="correo1" value="<?php echo $correo1; ?>" placeholder="Correo 2">
											</div>
										</div>
										<hr>
									</div>
									<div class="colum-second">
										<div class="input1">
											<div class="titulos">
												<p>Dato actual: <i class="far fa-copy" id="copiarCorreo3" onclick=""> <span>Copiar</span> </i> <i class="fas fa-undo"> <span>Deshacer</span></i></p>
											</div>
											<div class="campo campo2">
												<div class="icon">
													<i class="fas fa-envelope"></i>
												</div>
												<input type="email" name="correo2_actu" id="correo2_actu" value="<?php echo $correo2_actu; ?>" placeholder="correo 3">
											</div>
											<div class="titulos">
												<p><strong>Actualización Solicitada:</strong></p>
											</div>
											<div class="campo campo2">
												<div class="icon">
													<i class="fas fa-envelope"></i>
												</div>
												<input type="email" name="correo2" id="correo2" value="<?php echo $correo2; ?>" placeholder="correo 3">
											</div>
										</div>
										<hr>
										<div class="input1">
											<div class="titulos">
												<p>Dato actual: <i class="far fa-copy" id="copiarCelular" onclick=""> <span>Copiar</span> </i> <i class="fas fa-undo"> <span>Deshacer</span></i></p>
											</div>
											<div class="campo campo2">
												<div class="icon">
													<i class="fas fa-mobile-alt"></i>
												</div>
												<input type="tel" name="movil" id="celular2" value="<?php echo $movil_actu; ?>" placeholder="Celular" readonly="readonly">
											</div>
											<div class="titulos">
												<p><strong>Actualización Solicitada:</strong></p>
											</div>
											<div class="campo campo2">
												<div class="icon">
													<i class="fas fa-mobile-alt"></i>
												</div>
												<input type="tel" name="movil" id="celular" value="<?php echo $movil; ?>" placeholder="Celular">
											</div>
										</div>
										<hr>
									</div>

									<div class="colum-second">
										<div class="titulos">
											<p>Dato actual: <i class="far fa-copy" id="copiarTelefono" onclick=""> <span>Copiar</span> </i> <i class="fas fa-undo"> <span>Deshacer</span></i></p>
										</div>
										<div class="input1">
											<div class="campo campo2">
												<div class="icon">
													<i class="fas fa-phone"></i>
												</div>
												<input type="tel" name="telefono" id="telefono_actu" value="<?php echo $telefono_actu; ?>" placeholder="Teléfono">
											</div>
											<div class="titulos">
												<p><strong>Actualización Solicitada:</strong></p>
											</div>
											<div class="campo campo2">
												<div class="icon">
													<i class="fas fa-phone"></i>
												</div>
												<input type="tel" name="telefono" id="telefono" value="<?php echo $telefono; ?>" placeholder="Teléfono">
											</div>
										</div>
										<hr>
										<div class="input1">
											<div class="titulos">
												<p>Dato actual: <i class="far fa-copy" id="copiarEmpresaLaboral" onclick=""> <span>Copiar</span> </i> <i class="fas fa-undo"> <span>Deshacer</span></i></p>
											</div>
											<div class="campo campo2">
												<div class="icon">
													<i class="fas fa-building"></i>
												</div>
												<input type="text" name="empresa_labora_actu" id="empresa_labora_actu" value="<?php echo $empresa_labora_actu; ?>" placeholder="Empresa donde labora">
											</div>
											<div class="titulos">
												<p><strong>Actualización Solicitada:</strong></p>
											</div>
											<div class="campo campo2">
												<div class="icon">
													<i class="fas fa-building"></i>
												</div>
												<input type="text" name="empresa_labora" id="empresaLabora" value="<?php echo $empresa_labora; ?>" placeholder="Empresa donde labora">
											</div>
										</div>
										<hr>
									</div>

									<div class="colum-second">
										<div class="input1">
											<div class="titulos">
												<p>Dato actual: <i class="far fa-copy" id="copiarRubroEmpresaLaboral" onclick=""> <span>Copiar</span> </i> <i class="fas fa-undo"> <span>Deshacer</span></i></p>
											</div>
											<div class="campo campo2">
												<div class="icon">
													<i class="fas fa-briefcase"></i>
												</div>
												<input type="text" name="rubros" value="<?php echo $rubro_empresa_labora_actu; ?>" id="rubro_empresa_labora_actu" placeholder="Rubro de la empresa donde labora">
											</div>
											<div class="titulos">
												<p><strong>Actualización Solicitada:</strong></p>
											</div>
											<div class="campo campo2">
												<div class="icon">
													<i class="fas fa-briefcase"></i>
												</div>
												<input type="text" name="rubros" value="<?php echo $rubro_empresa_labora; ?>" id="rubroEmpresaLabora" placeholder="Rubro de la empresa donde labora">
											</div>
										</div>
										<hr>
										<div class="input1">
											<div class="titulos">
												<p>Dato actual: <i class="far fa-copy" id="copiarArea_interes_actu" onclick=""> <span>Copiar</span> </i> <i class="fas fa-undo"> <span>Deshacer</span></i></p>
											</div>
											<div class="campo campo2">
												<div class="icon">
													<i class="fas fa-atom"></i>
												</div>
												<input type="text" name="area_interes_actu" value="<?php echo $area_interes_actu; ?>" id="area_interes_actu" placeholder="Área de su interés">
											</div>
											<div class="titulos">
												<p><strong>Actualización Solicitada:</strong></p>
											</div>
											<div class="campo campo2">
												<div class="icon">
													<i class="fas fa-atom"></i>
												</div>
												<input type="text" name="area_interes" value="<?php echo $area_interes; ?>" id="areasInteres" placeholder="Área de su interés">
											</div>
										</div>
										<hr>
									</div>
									<div class="colum-second">
										<div class="titulos">
											<p>Dato actual: <i class="far fa-copy" id="copiarUrl_linkedin_actu" onclick=""> <span>Copiar</span> </i> <i class="fas fa-undo"> <span>Deshacer</span></i></p>
										</div>
										<div class="input1">
											<div class="campo campo2">
												<div class="icon">
													<i class="fab fa-linkedin"></i>
												</div>
												<input type="url" name="url_linkedin_actu" id="url_linkedin_actu" value="<?php echo $url_linkedin_actu; ?>" placeholder="https://www.linkedin.com/">
											</div>
										</div>
										<div class="titulos">
											<p><strong>Actualización Solicitada:</strong></p>
										</div>
										<div class="input1">
											<div class="campo campo2">
												<div class="icon">
													<i class="fab fa-linkedin"></i>
												</div>
												<input type="url" name="url_linkedin" id="url_linkedin" value="<?php echo $url_linkedin; ?>" placeholder="https://www.linkedin.com/">
											</div>
										</div>
									</div>

									<div class="img-formulario">
										<div class="titulo-form">
											<h3>Información Académica</h3>
										</div>
									</div>
									<div class="titulos">
										<p>Título Obtenido: <strong><?php echo $titulo; ?></strong></p>
										<?php echo $tituloPrograma; ?>
										<p <?php echo $viewOrientation ?>>Orientación: <strong><?php echo $orientacion; ?></strong></p>
										<input type="hidden" name="programa" id="programa" value="<?php echo $programa; ?>">
										<input type="hidden" name="orientacion" id="orientacion" value="<?php echo $orientacion; ?>" readonly="readonly">
									</div>
									<div class="colum-second">
										<div class="input1">
											<div class="campo campo2">
												<div class="icon">
													<i class="fas fa-building"></i>
												</div>
												<input type="text" name="lugar_pasantia" value="<?php echo $lugar_pasantia; ?>" id="empresaPasantia" placeholder="Empresa Pasantía">
											</div>
										</div>
										<div class="input1">
											<div class="campo campo2">
												<div class="icon">
													<i class="fas fa-map-marker-alt"></i>
												</div>
												<input type="text" name="direccion_pasantia" value="<?php echo $direccion_pasantia; ?>" id="direccionEmpresaPasantia" placeholder="Dirección de Empresa">
											</div>
										</div>
									</div>

									<div class="colum-second">
										<div class="input1">
											<div class="campo campo2">
												<div class="icon">
													<i class="fas fa-briefcase"></i>
												</div>
												<input type="text" name="rubro_empresa_pasantia" value="<?php echo $rubro_empresa_pasantia; ?>" id="rubroEmpresaPasantia" placeholder="Rubro de la empresa donde labora">
											</div>
										</div>
										<div class="input1">
											<div class="campo campo2">
												<div class="icon">
													<i class="fas fa-align-left"></i>
												</div>
												<input type="text" name="exp_pasantia" minlength="50" value="<?php echo $exp_pasantia; ?>" id="experienciaPasantia" placeholder="Experiencia en Pasantía">
											</div>
										</div>
									</div>

									<div class="colum-second">
										<div class="input1">
											<div class="campo campo2">
												<div class="icon">
													<i class="fas fa-atom"></i>
												</div>
												<input type="text" name="area_investigacion" value="<?php echo $area_investigacion; ?>" id="areaInvestigacionPasantia" placeholder=" Área de investigación pasantía">
											</div>
										</div>
										<div class="input1">
											<div class="campo campo2">
												<div class="icon">
													<i class="fas fa-user"></i>
												</div>
												<input type="text" name="asesor_tesis" value="<?php echo $asesor_tesis; ?>" id="asesorTesis" placeholder="Asesor de Tesis">
											</div>
										</div>
									</div>

									<div class="colum-second">
										<div class="input1" style="width: 100% !important;">
											<div class="campo campo2" style="width: 100% !important;margin-bottom: 0;">
												<div class="icon">
													<i class="fas fa-file-alt"></i>
												</div>
												<input type="text" name="titulo_tesis" value="<?php echo $titulo_tesis; ?>" id="tituloTesis" placeholder="Título del proyecto de graduación">
											</div>
										</div>
										<div class="input1" style="width: 100% !important">
											<p>
												Buscar URL de Tesis aquí <a href="https://bdigital.zamorano.edu/simple-search?location=%2F&query=<?php echo $primer_apellido; ?>+<?php echo $first_name; ?>&rpp=10&sort_by=score&order=desc" target="_blank"> Bdigital:</a><br>
											</p>
											<div class="campo campo2" style="width: 100% !important;margin-bottom: 0;">
												<div class="icon">
													<i class="fas fa-link"></i>
												</div>
												<input type="text" name="url_tesis" value="<?php echo $url_tesis; ?>" id="urlTesis" placeholder="URL Tesis">
											</div>
										</div>
									</div>
									<div class="colum-second">
										<div class="input1" style="width: 100% !important">
											<p>
												Financiado por:
											</p>
											<div class="campo campo2" style="width: 100% !important;">
												<div class="icon">
													<i class="fas fa-hand-holding-usd"></i>
												</div>
												<input type="text" name="financiado_por" value="<?php echo $financiado_por; ?>" id="financiado" readonly='readonly' placeholder="Financiado por">
											</div>
										</div>
									</div>
									<div class="colum-second">
										<div class="input1" style="width: 100% !important">
											<div class="campo campo2" style="width: 100% !important;width: 100% !important;display:flex;justify-content: center;">
												<?php
												$fondozamo = $fondos_zamorano == 1 ? 'checked' : ''; ?>
												<input type='checkbox' name='fondos_zamorano' id="fondos_zamorano" onclick="chequeado('fondos_zamorano')" value='<?php echo $fondos_zamorano; ?>' <?php echo $fondozamo; ?>>
												<label for='fondos_zamorano'>ZAMORANO</label>
												<?php
												$fondopropio = $fondos_propios == 1 ? 'checked' : ''; ?>
												<input type='checkbox' name='fondos_propios' id="fondos_propios" onclick="chequeado('fondos_propios')" value='<?php echo $fondos_propios; ?>' <?php echo $fondopropio; ?>>
												<label for='fondos_propios'>Fondos Propios</label>

												<?php
												$fondoenti = $fondos_entidades ? 'checked' : '';
												?>
												<input type='checkbox' name='fondos_entidades' id='fondos_entidades' value='<?php echo $fondos_entidades; ?>' onclick='entidades()'>
												<label for='fondos_entidades'>Otras Entidades</label>
											</div>
										</div>
										<div class="input" style="width: 100% !important;display:none;" id="endidades">
											<div class="campo" style="width: 100% !important;">
												<div class="icon">
													<i class="fas fa-hand-holding-usd"></i>
												</div>
												<input type="text" name="otras_entidades" id="otras_entidades" value="<?php echo $otras_entidades; ?>" placeholder="Mencione que Entidades">
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