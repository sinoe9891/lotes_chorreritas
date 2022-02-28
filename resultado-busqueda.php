<?php
include 'includes/funciones.php';
include 'includes/sesiones.php';
include 'includes/conexion.php';
include 'includes/templates/header-graduate.php';
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
					<a href="buscar-graduado.php">
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
			// obtiene las información del graduado
			if($_GET){
				$solicitudes = obtenerInfoGraduado($user_id);
			}else{
				header('Location: buscar-graduado.php');
			}
			if ($solicitudes->num_rows > 0) {
				while ($row = $solicitudes->fetch_assoc()) {
					$id = $row['ID'];
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
					$telefono = $row['telefono'];
					$movil = $row['movil'];
					$empresa_labora = $row['empresa_labora'];
					$rubro_empresa_labora = $row['rubros'];
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
					$area_interes = $row['area_interes'];
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
					$estatus = $row['estatus'];
					$pa = $row['pa'];
					$anioIA = $row['anioIA'];
					$dia_graduacion = $row['dia_graduacion'];
					$mes_graduacion = $row['mes_graduacion'];
					$codigoIA = $row['codigoIA'];
					// $hddate = date("d-m-Y", strtotime($fechaN)); 
			?>
					<div class="img-formulario">

						<?php
						//    validación Fotografía
						if (file_exists("images/profile_pictures/" . $id . ".jpg")) {
							$img = "images/profile_pictures/" . $id . ".jpg";
						} elseif (!file_exists("img/profile_pictures/" . $id . ".jpg")) {
							if ($gender == 'M') {
								$img = "images/MASCULINO.jpg";
							} elseif ($gender == 'F') {
								$img = "images/FEMENINO.jpg";
							}
						}
						//Validación Fecha de nacimiento
						if ($fechaN == '0000-00-00') {
							$date = '<strong style="color:#b9b9b9;">Fecha no actualizada</strong>';
						} else {
							$date = date('d-m', strtotime($fechaN));
						}
						// CONDICIÓN FALLECIDO
						$img_fallecido = '';
						$dateFallecido = date('d-m-Y', strtotime($fechaFallecido));
						$textofallecido = '';
						if ($fallecido == '1') {
							$img_fallecido = '<i class="fas fa-cross"></i>';
							$textofallecido = '<p><i class="fas fa-cross" style="padding-right:2px;"></i>Fecha en que Falleció: <strong>' . $dateFallecido . '</strong></p>';
							$viewUpdate = 'style="display:none"';
						} elseif ($fallecido == '0') {
							$fallecido = 'NO';
							$textofallecido = ' ';
							$viewUpdate = '';
						};

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
							$tituloPrograma = '<p><i class="fas fa-graduation-cap" style="padding-right:2px;"></i> Título PIA: <strong>INGENIERO AGRÓNOMO (' . $anioIA . ')</strong>';
						}
						// CONDICIÓN PPIA
						if ($programa == '0707') {
							$titulo = 'PPIA: INGENIERO AGRÓNOMO ' . $anioIA;
							$view = 'style="display:initial;"';
							$viewinfo = 'style="display:none;"';
							$tituloPrograma = '<p><i class="fas fa-graduation-cap" style="padding-right:2px;"></i> Título PPIA: <strong>INGENIERO AGRÓNOMO (' . $anioIA . ')</strong>';
						}
						if ($programa == '0007') {
							$titulo = 'AGRÓNOMO';
							$view = 'style="display:none;"';
							$viewinfo = 'style="display:initial;"';
						}
						//CONDICIÓN TÍTULO 4X4
						if ($programa == '0777') {
							$view = 'style="display:initial;"';
							$viewinfo = 'style="display:initial;"';
							if ($orientacion == 'GESTION DE AGRONEGOCIOS') {
								$titulo = 'INGENIER' . $g . ' EN GESTION DE AGRONEGOCIOS';
							}
							if ($orientacion == 'AGROINDUSTRIA') {
								$titulo = 'INGENIER' . $g . ' EN AGROINDUSTRIA';
							}
							if ($orientacion == 'INGENIERIA AGRONÓMICA') {
								$titulo = 'INGENIER' . $g . ' AGRÓNOM' . $g;
							}
							if ($orientacion == 'INGENIERÍA AGRONÓMICA') {
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
						?>
						<img id="img-profile" src="<?php echo $img; ?>" alt="">
					</div>
					<div class="formulario">
						<form id="resultadoBusqueda" method="post">
							<h4 style="margin:10px 0;"><?php echo $nombres; ?> <?php echo $lastname; ?> <?php echo $img_fallecido; ?></h4>
							<h4 style="margin:10px 0;">Clase <?php echo $clase; ?></h4>
							<hr>
							<p>Título Obtenido: <strong><?php echo $titulo; ?></strong></p>
							<p>Código: <strong><?php echo $codigo; ?></strong></p>
							<p>Género: <strong><?php if ($gender == 'M') {
													echo "Masculino";
												} else {
													echo "Femenino";
												} ?></strong></p>
							<p>Nacionalidad: <strong><?php echo $nacionalidad; ?></strong></p>
							<p>Fecha de Nacimiento: <strong><?php echo $date; ?></strong></p>
							<p><?php echo $textofallecido; ?></strong></p>
							<?php if ($linkedin == '0') {
								echo "";
							} else {
								// <a href=" . $url_linkedin . " target='_blank'><strong style='color:red'><strong>
								echo "<p><i class='fab fa-linkedin' style='padding-right:2px;color:#0E76A8'></i>LinkedIn: <a href='$url_linkedin' target='_blank'>  <strong style='color:red'> VER PERFIL</strong> </a></p>";
							}; ?>
							<div class="infoAcadamica" <?php echo $view; ?>>
								<hr>
								<div class="img-formulario">
									<div class="titulo-form">
										<h3>Información Académica</h3>
									</div>
								</div>
								<?php echo $tituloPrograma; ?>
								<?php
								$tituloOrientacion = '';
								if ($orientacion == '') {
									$tituloOrientacion = '';
								} else {
									$tituloOrientacion = "<p><i class='fas fa-graduation-cap' style='padding-right:2px;'></i> Orientación:  <strong>" . $orientacion . "</strong></p>";
								};
								?>
								<?php echo $tituloOrientacion; ?>
								<!-- <?php echo $programa; ?> -->

								<?php if ($titulo_tesis == '') {
									echo "<p><i class='fas fa-file-alt' style='padding-right:2px;'></i>Título proyecto de graduación:<br>  <strong style='color:#b9b9b9;'>Dato no actualizado</strong></p>";
								} else {
									echo "<p><i class='fas fa-file-alt' style='padding-right:2px;'></i>Título proyecto de graduación:<br>  <strong>" . $titulo_tesis . "</strong></p>";
								}; ?>
								<div class="ppia" <?php echo $viewinfo; ?>>
									<?php if ($lugar_pasantia == '') {
										echo "<p><i class='fas fa-building' style='padding-right:2px;'></i>Empresa donde realizó su pasantía:<br>  <strong style='color:#b9b9b9;'>Dato no actualizado</strong></p>";
									} else {
										echo "<p><i class='fas fa-building' style='padding-right:2px;'></i>Empresa donde realizó su pasantía:<br>  <strong>" . $lugar_pasantia . "</strong></p>";
									}; ?>
									<?php if ($direccion_pasantia == '') {
										echo "<p><i class='fas fa-map-marker-alt' style='padding-right:2px;'></i>Dirección de Pasantía:<br> <strong style='color:#b9b9b9;'>Dato no actualizado</strong></p>";
									} else {
										echo "<p><i class='fas fa-map-marker-alt' style='padding-right:2px;'></i>Dirección de Pasantía:<br> <strong>" . $direccion_pasantia . "</strong></p>";
									}; ?>
									<?php if ($rubro_empresa_pasantia == '') {
										echo "<p><i class='fas fa-briefcase' style='padding-right:2px;'></i>Rubro de la empresa de pasantía:<br>  <strong style='color:#b9b9b9;'>Dato no actualizado</strong></p>";
									} else {
										echo "<p><i class='fas fa-briefcase' style='padding-right:2px;'></i>Rubro de la empresa de pasantía:<br>  <strong>" . $rubro_empresa_pasantia . "</strong></p>";
									}; ?>
									<?php if ($exp_pasantia == '') {
										echo "<p><i class='fas fa-align-left' style='padding-right:2px;'></i>Experiencia en Pasantía:<br>  <strong style='color:#b9b9b9;'>Dato no actualizado</strong></p>";
									} else {
										echo "<p><i class='fas fa-align-left' style='padding-right:2px;'></i>Experiencia en Pasantía:<br>  <strong>" . $exp_pasantia . "</strong></p>";
									}; ?>
									<?php if ($asesor_tesis == '') {
										echo "<p><i class='fas fa-user' style='padding-right:2px;'></i>Asesor de Tesis:<br>  <strong style='color:#b9b9b9;'>Dato no actualizado</strong></p>";
									} else {
										echo "<p><i class='fas fa-user' style='padding-right:2px;'></i>Asesor de Tesis:<br>  <strong>" . $asesor_tesis . "</strong></p>";
									}; ?>
								</div>
								<?php if ($area_interes == '') {
									echo "<p><i class='fas fa-atom' style='padding-right:2px;'></i>Área de intéres:<br>  <strong style='color:#b9b9b9;'>Dato no actualizado</strong></p>";
								} else {
									echo "<p><i class='fas fa-atom' style='padding-right:2px;'></i>Área de intéres:<br>  <strong>" . $area_interes . "</strong></p>";
								}; ?>
								<p><i class='fas fa-link' style='padding-right:2px;'></i>Buscar proyecto de graduación: <a href="https://bdigital.zamorano.edu/simple-search?location=%2F&query='<?php echo $first_name, '+', $primer_apellido, '+', $clase ?>'&rpp=10&sort_by=score&order=desc" target='_blank'><strong style='color:red'> AQUÍ</strong></a></p>
							</div>
							<hr>
							<div class="campo enviar registro" <?php echo $viewUpdate ?>>
								<div class="boton-registro">
									<a href="edicion-perfil.php?ID=<?php echo $id ?> ">
										<div class="boton buscar">Editar Graduado</div>
									</a>
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
<!-- <?php
		include 'includes/templates/footer.php';
		?> -->