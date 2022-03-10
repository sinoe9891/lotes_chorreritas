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
				$referenciasQuery = obtenerRerferencias($user_id);
				$financieraQuery = obtenerFinanciera($user_id);
				$beneficiarioQuery = obtenerBeneficiario($user_id);
				$loteClienteQuery = obtenerInfoLoteCliente($user_id);

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

						<div class="formulario">
							<form id="resultadoBusqueda" method="post">
								<h4 style="margin:10px 0;"><?php echo $nombres; ?></h4>
								<h4 style="margin:10px 0;">Id. <?php echo $identidad; ?></h4>
								<div style="display:flex;justify-content:center">
									<a href="edicion-perfil.php?ID=<?php echo $id ?>" class="campo">
										<div style="display: flex;justify-content: center;align-items:center;" class="boton">
											Editar Registro
										</div>
									</a>
								</div>
								<div style="display:flex;justify-content:center">
									<a href="asignar-lote.php?ID=<?php echo $id ?>" class="campo">
										<div style="display: flex;justify-content: center;align-items:center;" class="boton">
											Asignar Lote
										</div>
									</a>
								</div>
								<p>Lotes Asignados:<br><strong>
										<?php
										if ($loteClienteQuery->num_rows > 0) {
											$sep = '';
											while ($row = $loteClienteQuery->fetch_assoc()) {
												$lote = $row['numero'];
												$bloque = $row['bloque'];
												$lotes = $bloque . '-' . $lote;
												$text = $lotes;
												echo $sep . $text;
												$sep = ', ';
											};
										} else {
											echo 'No tiene lotes asignados';
										}
										echo '</strong></p>';
										?>
										<hr>
										<p>Género: <strong><?php
															if ($gender == 'M') {
																echo 'Masculino';
																$sex = 'o';
															} else {
																echo 'Femenino';
																$sex = 'a';
															}
															?></strong></p>
										<p>Estado Civil: <strong><?php
																	if ($estado_civil == '1') {
																		echo $estado_civil = 'Solter' . $sex;
																	} elseif ($estado_civil == '2') {
																		echo $estado_civil = 'Casad' . $sex;
																	} elseif ($estado_civil == '3') {
																		echo $estado_civil = 'Divorciad' . $sex;
																	} elseif ($estado_civil == '4') {
																		echo $estado_civil = 'Viud' . $sex;
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
										<hr>
										<p class="bold">Datos Laborales del Comprador</p>
										<p>Profesión u Oficio: <strong><?php echo $profesion; ?></strong></p>
										<p>Lugar de Empleo: <strong><?php echo $lugar_empleo; ?></strong></p>
										<p>Dirección Empleo: <strong><?php echo $direccion_empleo; ?></strong></p>
										<p>Cargo: <strong><?php echo $cargo; ?></strong></p>
										<p>Tiempo Laborando: <strong><?php echo $tiempo_laborando; ?></strong></p>
										<p>Teléfono Empleo: <strong><?php echo $telefono_empleo; ?></strong></p>

										<hr>
										<?php
										if ($financieraQuery->num_rows > 0) {
											$sep = '';
											while ($row = $loteClienteQuery->fetch_assoc()) {
												$sueldos = $row['sueldos'];
												$remesas = $row['remesas'];
												$otros_ingresos = $row['otros_ingresos'];
												$prestamos = $row['prestamos'];
												$alquiler = $row['alquiler'];
												$otros_egresos = $row['otros_egresos'];
											};
										} else {
											echo 'No tiene lotes asignados';
										}

										?>
										<p class="bold">Ingresos Mensuales</p>
										<p>Sueldos: <strong>L.<?php echo number_format($sueldos, 2); ?></strong></p>
										<p>Remesas/Comisiones: <strong>L.<?php echo number_format($remesas, 2); ?></strong></p>
										<p>Otros: <strong>L.<?php echo number_format($otros_ingresos, 2); ?></strong></p>
										<p class="bold">Egresos Mensuales</p>
										<p>Prestamos: <strong>L.<?php echo number_format($prestamos, 2); ?></strong></p>
										<p>Alquiler/Alimentación: <strong>L.<?php echo number_format($alquiler, 2); ?></strong></p>
										<p>Otros: <strong>L.<?php echo number_format($otros_egresos, 2); ?></strong></p>
										<hr>
										<p class="bold">Conyugue</p>
										<?php

										if ($estado_civil == 'Soltero') {
											echo "<p>No hay registro por ser Soltero</p><hr>";
										} else {
										?>
											<hr>
											<p>Nombres: <strong><?php echo $nombre_conyugue; ?></strong></p>
											<p>Identidad: <strong><?php echo $identidad_conyugue; ?></strong></p>
											<p>Celular: <strong><?php echo $celular_conyugue; ?></strong></p>
											<p>Fecha de Nacimiento: <strong><?php echo $fechanac_conyugue; ?></strong></p>
											<p>Empresa donde Labora: <strong><?php echo $empresa_labora_conyugue; ?></strong></p>
											<p>Teléfono Empleo: <strong><?php echo $telefono_empleo_conyugue; ?></strong></p>
											<p>Cargo: <strong><?php echo $cargo_conyugue; ?></strong></p>
											<p>Tiempo Laborando: <strong><?php echo $tiempo_laborando_conyugue; ?></strong></p>
											<hr>
										<?php
										}
									}

									if ($beneficiarioQuery->num_rows > 0) {
										$contador = 0;
										while ($row = $beneficiarioQuery->fetch_assoc()) {
											//Referencias
											$nombre_beneficiario = $row['nombre_beneficiario'];
											$identidad_beneficiario = $row['identidad_beneficiario'];
											$direccion_beneficiario = $row['direccion_beneficiario'];
											$ciudad_beneficiario = $row['ciudad_beneficiario'];
											$departamento_beneficiario = $row['departamento_beneficiario'];
											$celular_beneficiario = $row['celular_beneficiario'];

											// $hddate = date("d-m-Y", strtotime($fechaN)); 
										?>

											<p class="bold">Beneficiario(a)</p>
											<p>Nombres: <strong><?php echo $nombre_beneficiario; ?></strong></p>
											<p>Identidad: <strong><?php echo $identidad_beneficiario; ?></strong></p>
											<p>Dirección: <strong><?php echo $direccion_beneficiario; ?></strong></p>
											<p>Ciudad: <strong><?php echo $ciudad_beneficiario; ?></strong></p>
											<p>Departamento: <strong><?php echo $departamento_beneficiario; ?></strong></p>
											<p>Celular: <strong><?php echo $celular_beneficiario; ?></strong></p>
											<hr>
										<?php
										}
									}

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

											<p class="bold">Referencia Personal <?php echo $contador ?> </p>
											<p>Nombres: <strong><?php echo $nombre_referencia; ?></strong></p>
											<p>Dirección: <strong><?php echo $direccion_referencia; ?></strong></p>
											<p>Celular: <strong><?php echo $celular_referencia; ?></strong></p>
											<p>Teléfono: <strong><?php echo $telefono_referencia; ?></strong></p>
											<p>Empresa donde Labora: <strong><?php echo $empresa_labora_referencia; ?></strong></p>
											<p>Teléfono Empleo: <strong><?php echo $telefono_empleo_referencia; ?></strong></p>
									<?php
										}
									}

									?>
									<hr>

						</div>
		</div>
		</form>
	</div>
<?php

				}
			}
?>