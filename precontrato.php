<?php
include 'includes/funciones.php';
// include 'includes/sesiones.php';
include 'includes/conexion.php';
include 'includes/templates/header.php';
// Obtener el ID de la URL
if (isset($_GET['ID'])) {
	$user_id = $_GET['ID'];
}
date_default_timezone_set('America/Tegucigalpa');
?>

<!-- <div class="contenedor">
	<div class="contenedor-index">
		<div class="nav-logo">
			<div class="logo graduate-logo">
				<div class="caja">
					<a href="https://www.zamorano.edu/graduados/">
						<div class="back">
							<img src="images/icons/arrow-left.svg" alt="">
							<p style="margin-left:5px;">Ir a Graduados Zamorano</p>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
</div> -->
<div class="contenedor">
	<div class="contenedor-index">
		<div class="titulo-ficha">
			<div class="logo">
				<h2>Precontrato de Compra Ventra de Lote</h2>
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
					<h3>Datos Personales <br>de el Comprador</h3>
				</div>
			</div>
			<div class="formulario ficha-formulario">
				<form id="formulario-ficha" name="formficha" method="post" enctype="multipart/form-data">
					<div class="colum-second">
						<div class="full-width input">
							<p>Nombre Completo</p>
							<div class="full-width-field campo-ficha">
								<div class="icon">
									<img src="images/icons/profile.svg" alt="">
								</div>
								<input type="hidden" id="fechaSolicitud" name="fechaSolicitud" value="<?php echo date('Y-m-d'); ?>">
								<input type="hidden" id="horaSolicitud" name="horaSolicitud" value="<?php echo date('H:i:s'); ?>">
								<input type="text" id="nombre_completo" name="nombre_completo" placeholder="Nombre completo">
							</div>
						</div>
						<div class="full-width input">
							<p>Fecha de Nacimiento</p>
							<div class="full-width-field campo-ficha">
								<div class="icon">
									<i class="fas fa-birthday-cake"></i>
								</div>

								<input type="date" id="fechanac" name="fechanac" placeholder="">
							</div>
						</div>
						<div class="full-width input">
							<p>Nacionalidad</p>
							<div class="full-width-field campo-ficha">
								<div class="icon">
									<img src="images/icons/profile.svg" alt="">
								</div>
								<input type="text" name="nacionalidad" id="nacionalidad" value="" placeholder="Ej. hondureña en mínuscula">
							</div>
						</div>
						<div class="full-width input">
							<p>Identidad</p>
							<div class="full-width-field campo-ficha">
								<div class="icon">
									<img src="images/icons/profile.svg" alt="">
								</div>
								<input type="text" name="identidad" max="15" id="identidad" value="" placeholder="0801-1989-07380">
							</div>
						</div>
						<div class="full-width input">
							<p>Género</p>
							<div class="full-width-field campo-ficha">
								<div class="icon">
									<img src="images/icons/profile.svg" alt="">
								</div>
								<select name="genero" id="genero">
									<option value="F">Femenino</option>
									<option value="M">Masculino</option>
								</select>
							</div>
						</div>
						<div class="full-width input">
							<div class="titulos">
								<p>Estado Civil</p>
							</div>
							<div class="full-width-field campo-ficha">
								<div class="icon">
									<img src="images/icons/profile.svg" alt="">
								</div>
								<select name="estado_civil" id="estado_civil">
									<option value="1">Soltero(a)</option>
									<option value="2">Casado(a)</option>
									<option value="3">Divorciado(a)</option>
									<option value="4">Viudo(a)</option>
									<option value="5">Unión Libre</option>
								</select>
							</div>
						</div>
						<div class="full-width input">
							<p>Lugar de residencia actual</p>
							<div class="full-width-field campo-ficha">
								<div class="icon">
									<i class="fas fa-city"></i>
								</div>
								<input type="text" name="direccion" id="direccion" value="" placeholder="Ej. Col. Los Robles, Bloque #, Casa #, …">
							</div>
						</div>
						<div class="full-width input">
							<p>Ciudad</p>
							<div class="full-width-field campo-ficha">
								<div class="icon">
									<i class="fas fa-city"></i>
								</div>
								<input type="text" name="ciudad" id="ciudad" value="" placeholder="Ej. Tegucigalpa …">
							</div>
						</div>
						<div class="full-width input">
							<p>Departamento / Estado</p>
							<div class="full-width-field campo-ficha">
								<div class="icon">
									<i class="fas fa-city"></i>
								</div>
								<input type="text" name="departamento" id="departamento" value="" placeholder="Ej. Francisco Morazán …">
							</div>
						</div>
						<div class="full-width input">
							<p>Correo electrónico</p>
							<div class="full-width-field campo-ficha">
								<div class="icon">
									<i class="fas fa-envelope"></i>
								</div>
								<input type="email" name="correo" id="correo" value="" placeholder="Correo Electrónico">
							</div>
						</div>
						<div class="full-width input">
							<p>Celular</p>
							<div class="full-width-field campo-ficha">
								<div class="icon">
									<i class="fas fa-phone"></i>
								</div>
								<input type="tel" name="celular" id="celular" value="" placeholder="94500123">
							</div>
						</div>
						<div class="full-width input">
							<p>Teléfono</p>
							<div class="full-width-field campo-ficha">
								<div class="icon">
									<i class="fas fa-phone"></i>
								</div>
								<input type="tel" name="telefono" id="telefono" value="" placeholder="22872000">
							</div>
						</div>
						<div class="full-width input">
							<p>Dependientes</p>
							<div class="full-width-field campo-ficha">
								<div class="icon">
									<img src="images/icons/profile.svg" alt="">
								</div>
								<input type="number" name="dependientes" id="dependientes" value="" placeholder="1">
							</div>
						</div>
						<div class="full-width input">
							<p>Profesión y Oficio</p>
							<div class="full-width-field campo-ficha">
								<div class="icon">
									<i class="fas fa-building"></i>
								</div>
								<input type="text" name="profesion" id="profesion" value="" placeholder="Comerciante, Ingeniero, Ama de Casa">
							</div>
						</div>
						<div class="titulo-form">
							<h3>Datos Laborales del Comprador</h3>
						</div>
						<div class="full-width input">
							<p>Lugar de empleo</p>
							<div class="full-width-field campo-ficha">
								<div class="icon">
									<i class="fas fa-building"></i>
								</div>
								<input type="text" name="empresa_labora" id="empresa_labora" value="" placeholder="Nombre Empresa, …">
							</div>
						</div>
						<div class="full-width input">
							<p>Dirección de Empleo</p>
							<div class="full-width-field campo-ficha">
								<div class="icon">
									<i class="fas fa-building"></i>
								</div>
								<input type="text" name="direccion_empleo" id="direccion_empleo" value="" placeholder="Ej. Col. Ruben Darío, Tegucigalpa, …">
							</div>
						</div>
						<div class="full-width input">
							<p>Teléfono Empleo</p>
							<div class="full-width-field campo-ficha">
								<div class="icon">
									<i class="fas fa-phone"></i>
								</div>
								<input type="tel" name="telefono_empleo" id="telefono_empleo" value="" placeholder="22872000">
							</div>
						</div>
						<div class="full-width input">
							<p>Posición que desempeña</p>
							<div class="full-width-field campo-ficha">
								<div class="icon">
									<i class="fas fa-building"></i>
								</div>
								<input type="text" name="cargo" id="cargo" value="" placeholder="Posición que desempeña">
							</div>
						</div>
						<div class="full-width input">
							<p>Tiempo Laborando</p>
							<div class="full-width-field campo-ficha">
								<div class="icon">
									<i class="fas fa-briefcase"></i>
								</div>
								<input type="text" name="tiempo_laborando" value="" id="tiempo_laborando" placeholder="Ej. 3 Años, 2 meses">
							</div>
						</div>
						<div class="titulo-form">
							<h3>Datos Personales del Conyuge</h3>
						</div>
						<div class="full-width input">
							<p>Nombre Completo</p>
							<div class="full-width-field campo-ficha">
								<div class="icon">
									<img src="images/icons/profile.svg" alt="">
								</div>
								<input type="text" id="nombre_conyugue" name="nombre_conyugue" placeholder="Nombre completo">
							</div>
						</div>
						<div class="full-width input">
							<p>Fecha de Nacimiento</p>
							<div class="full-width-field campo-ficha">
								<div class="icon">
									<i class="fas fa-birthday-cake"></i>
								</div>
								<input type="date" id="fechnac_conyugue" name="fechnac_conyugue" placeholder="2021" min="1946" max="2021">
							</div>
						</div>
						<div class="full-width input">
							<p>Identidad</p>
							<div class="full-width-field campo-ficha">
								<div class="icon">
									<img src="images/icons/profile.svg" alt="">
								</div>
								<input type="text" name="identidad_conyugue" max="15" id="identidad_conyugue" value="" placeholder="0801-1989-07380">
							</div>
						</div>
						<div class="full-width input">
							<p>Celular</p>
							<div class="full-width-field campo-ficha">
								<div class="icon">
									<i class="fas fa-phone"></i>
								</div>
								<input type="tel" name="celular_conyugue" id="celular_conyugue" value="" placeholder="94500123">
							</div>
						</div>
						<div class="full-width input">
							<p>Lugar de empleo</p>
							<div class="full-width-field campo-ficha">
								<div class="icon">
									<i class="fas fa-building"></i>
								</div>
								<input type="text" name="empresa_labora_conyugue" id="empresa_labora_conyugue" value="" placeholder="Ej. Col. Ruben Darío, Tegucigalpa, …">
							</div>
						</div>
						<div class="full-width input">
							<p>Teléfono Empleo</p>
							<div class="full-width-field campo-ficha">
								<div class="icon">
									<i class="fas fa-phone"></i>
								</div>
								<input type="tel" name="telefono_empleo_conyugue" id="telefono_empleo_conyugue" value="" placeholder="22872000">
							</div>
						</div>
						<div class="full-width input">
							<p>Posición que desempeña</p>
							<div class="full-width-field campo-ficha">
								<div class="icon">
									<i class="fas fa-building"></i>
								</div>
								<input type="text" name="cargo_conyugue" id="cargo_conyugue" value="" placeholder="Posición que desempeña">
							</div>
						</div>
						<div class="full-width input">
							<p>Tiempo Laborando</p>
							<div class="full-width-field campo-ficha">
								<div class="icon">
									<i class="fas fa-briefcase"></i>
								</div>
								<input type="text" name="tiempo_laborando_conyugue" value="" id="tiempo_laborando_conyugue" placeholder="Ej. 3 Años, 2 meses">
							</div>
						</div>

						<div class="titulo-form">
							<h3>Beneficiario</h3>
						</div>
						<div class="full-width input">
							<p>Nombre Completo</p>
							<div class="full-width-field campo-ficha">
								<div class="icon">
									<img src="images/icons/profile.svg" alt="">
								</div>
								<input type="text" id="nombre_beneficiario" name="nombre_beneficiario" placeholder="Nombre completo">
							</div>
						</div>
						<div class="full-width input">
							<p>Género</p>
							<div class="full-width-field campo-ficha">
								<div class="icon">
									<img src="images/icons/profile.svg" alt="">
								</div>
								<select name="genero_beneficiario" id="genero_beneficiario">
									<option value="F">Femenino</option>
									<option value="M">Masculino</option>
								</select>
							</div>
						</div>
						<div class="full-width input">
							<p>Identidad</p>
							<div class="full-width-field campo-ficha">
								<div class="icon">
									<img src="images/icons/profile.svg" alt="">
								</div>
								<input type="text" name="identidad_beneficiario" max="15" id="identidad_beneficiario" value="" placeholder="0801-1989-07380">
							</div>
						</div>
						<div class="full-width input">
							<p>Lugar de residencia actual</p>
							<div class="full-width-field campo-ficha">
								<div class="icon">
									<i class="fas fa-city"></i>
								</div>
								<input type="text" name="direccion_beneficiario" id="direccion_beneficiario" value="" placeholder="Ej. Los Robles, Tegucigalpa, Honduras, …">
							</div>
						</div>
						<div class="full-width input">
							<p>Ciudad</p>
							<div class="full-width-field campo-ficha">
								<div class="icon">
									<i class="fas fa-city"></i>
								</div>
								<input type="text" name="ciudad_beneficiario" id="ciudad_beneficiario" value="" placeholder="Ej. Los Robles, Tegucigalpa …">
							</div>
						</div>
						<div class="full-width input">
							<p>Departamento / Estado</p>
							<div class="full-width-field campo-ficha">
								<div class="icon">
									<i class="fas fa-city"></i>
								</div>
								<input type="text" name="departamento_beneficiario" id="departamento_beneficiario" value="" placeholder="Ej. Francisco Morazán …">
							</div>
						</div>
						<div class="full-width input">
							<p>Celular</p>
							<div class="full-width-field campo-ficha">
								<div class="icon">
									<i class="fas fa-phone"></i>
								</div>
								<input type="tel" name="celular_beneficiario" id="celular_beneficiario" value="" placeholder="94500123">
							</div>
						</div>
						<div class="titulo-form">
							<h3>Información Financiera</h3>
						</div>
						<div class="full-width input">
							<p class="bold">Ingresos Mensuales</p>
							<p>Sueldos</p>
							<div class="full-width-field campo-ficha">
								<div class="icon">
									<img src="images/icons/profile.svg" alt="">
								</div>
								<input type="number" name="sueldos" id="sueldos" value="" placeholder="L. 10,000.00">
							</div>
						</div>
						<div class="full-width input">
							<p>Remesas/Comisiones</p>
							<div class="full-width-field campo-ficha">
								<div class="icon">
									<img src="images/icons/profile.svg" alt="">
								</div>
								<input type="number" name="remesas" id="remesas" value="" placeholder="L. 10,000.00">
							</div>
						</div>
						<div class="full-width input">
							<p>Otros</p>
							<div class="full-width-field campo-ficha">
								<div class="icon">
									<img src="images/icons/profile.svg" alt="">
								</div>
								<input type="number" name="otros_ingresos" id="otros_ingresos" value="" placeholder="L. 10,000.00">
							</div>
						</div>
						<div class="full-width input">
							<p class="bold">Egresos Mensuales</p>
							<p>Prestamos</p>
							<div class="full-width-field campo-ficha">
								<div class="icon">
									<img src="images/icons/profile.svg" alt="">
								</div>
								<input type="number" name="prestamos" id="prestamos" value="" placeholder="L. 10,000.00">
							</div>
						</div>
						<div class="full-width input">
							<p>Alquiler/Alimentación</p>
							<div class="full-width-field campo-ficha">
								<div class="icon">
									<img src="images/icons/profile.svg" alt="">
								</div>
								<input type="number" name="alquiler" id="alquiler" value="" placeholder="L. 10,000.00">
							</div>
						</div>
						<div class="full-width input">
							<p>Otros</p>
							<div class="full-width-field campo-ficha">
								<div class="icon">
									<img src="images/icons/profile.svg" alt="">
								</div>
								<input type="number" name="otros_egresos" id="otros_egresos" value="" placeholder="L. 10,000.00">
							</div>
						</div>
						<div class="titulo-form">
							<h3>Referencias Personales</h3>
						</div>
						<div class="full-width input">
							<p class="bold">Referencia 1</p>
							<p>Nombre Completo</p>
							<div class="full-width-field campo-ficha">
								<div class="icon">
									<img src="images/icons/profile.svg" alt="">
								</div>
								<input type="text" id="nombre_referencia_1" name="nombre_referencia_1" placeholder="Nombre completo">
							</div>
						</div>
						<div class="full-width input">
							<p>Lugar de residencia actual</p>
							<div class="full-width-field campo-ficha">
								<div class="icon">
									<i class="fas fa-city"></i>
								</div>
								<input type="text" name="direccion_referencia_1" id="direccion_referencia_1" value="" placeholder="Ej. Los Robles, Tegucigalpa, Honduras, …">
							</div>
						</div>
						<div class="full-width input">
							<p>Celular</p>
							<div class="full-width-field campo-ficha">
								<div class="icon">
									<i class="fas fa-phone"></i>
								</div>
								<input type="tel" name="celular_referencia_1" id="celular_referencia_1" value="" placeholder="94500123">
							</div>
						</div>
						<div class="full-width input">
							<p>Teléfono Vivienda</p>
							<div class="full-width-field campo-ficha">
								<div class="icon">
									<i class="fas fa-phone"></i>
								</div>
								<input type="tel" name="telefono_referencia_1" id="telefono_referencia_1" value="" placeholder="94500123">
							</div>
						</div>
						<div class="full-width input">
							<p>Lugar de empleo</p>
							<div class="full-width-field campo-ficha">
								<div class="icon">
									<i class="fas fa-building"></i>
								</div>
								<input type="text" name="empresa_labora_referencia_1" id="empresa_labora_referencia_1" value="" placeholder="Ej. Col. Ruben Darío, Tegucigalpa, …">
							</div>
						</div>
						<div class="full-width input">
							<p>Teléfono Empleo</p>
							<div class="full-width-field campo-ficha">
								<div class="icon">
									<i class="fas fa-phone"></i>
								</div>
								<input type="tel" name="telefono_empleo_referencia_1" id="telefono_empleo_referencia_1" value="" placeholder="22872000">
							</div>
						</div>
						<div class="full-width input">
							<p class="bold">Referencia 2</p>
							<p>Nombre Completo</p>
							<div class="full-width-field campo-ficha">
								<div class="icon">
									<img src="images/icons/profile.svg" alt="">
								</div>
								<input type="text" id="nombre_referencia_2" name="nombre_referencia_2" placeholder="Nombre completo">
							</div>
						</div>
						<div class="full-width input">
							<p>Lugar de residencia actual</p>
							<div class="full-width-field campo-ficha">
								<div class="icon">
									<i class="fas fa-city"></i>
								</div>
								<input type="text" name="direccion_referencia_2" id="direccion_referencia_2" value="" placeholder="Ej. Los Robles, Tegucigalpa, Honduras, …">
							</div>
						</div>
						<div class="full-width input">
							<p>Celular</p>
							<div class="full-width-field campo-ficha">
								<div class="icon">
									<i class="fas fa-phone"></i>
								</div>
								<input type="tel" name="celular_referencia_2" id="celular_referencia_2" value="" placeholder="94500123">
							</div>
						</div>
						<div class="full-width input">
							<p>Teléfono Vivienda</p>
							<div class="full-width-field campo-ficha">
								<div class="icon">
									<i class="fas fa-phone"></i>
								</div>
								<input type="tel" name="telefono_referencia_2" id="telefono_referencia_2" value="" placeholder="22872000">
							</div>
						</div>
						<div class="full-width input">
							<p>Lugar de empleo</p>
							<div class="full-width-field campo-ficha">
								<div class="icon">
									<i class="fas fa-building"></i>
								</div> 
								<input type="text" id="empresa_labora_referencia_2" value="" placeholder="Ej. Col. Ruben Darío, Tegucigalpa, …">
							</div>
						</div>
						<div class="full-width input">
							<p>Teléfono Empleo</p>
							<div class="full-width-field campo-ficha">
								<div class="icon">
									<i class="fas fa-phone"></i>
								</div>
								<input type="tel" name="telefono_empleo_referencia_2" id="telefono_empleo_referencia_2" value="" placeholder="22872000">
							</div>
						</div>
						<div class="titulo-form">
							<h3>Tipo de Venta</h3>
						</div>
						<div class="full-width input">
							<p>Día de Pago</p>
							<div class="full-width-field campo-ficha">
								<div class="icon">
									<i class="fa fa-calendar" aria-hidden="true"></i>
								</div>
								<input type="number" id="fecha_pago" name="fecha_pago" placeholder="15 o 30" max="30" min="1">
							</div>
						</div>
						<div class="full-width input">
							<p>Fecha Primera Cuota</p>
							<div class="full-width-field campo-ficha">
								<div class="icon">
									<i class="fa fa-calendar" aria-hidden="true"></i>
								</div>
								<input type="date" id="fecha_cuota" name="fecha_cuota" placeholder="" >
							</div>
						</div>
						<div class="full-width input">
							<p>Plazo en Años</p>
							<div class="full-width-field campo-ficha">
								<div class="icon">
									<i class="fa fa-calendar" aria-hidden="true"></i>
								</div>
								<input type="number" id="plazo_pago" name="plazo_pago" placeholder="10 Años" max="10" min="1">
							</div>
						</div>
					</div>
					<div class="barra">
						<div class="barra_azul" id="barra_estado">
							<span></span>
						</div>
					</div>
					<div class="campo enviar registro">
						<div class="boton-registro">
							<input type="hidden" id="tipo" value="solicitud">
							<input type="submit" class="boton" value="Enviar Datos" name="update">
						</div>
					</div>
			</div>
			</form>
		</div>
	</div>
</div>
</div>
<?php
include 'includes/templates/footer.php';
?>