<?php
// session_start();
include 'includes/sesiones.php';
// echo "<pre>";
// var_dump($_SESSION);
// echo "</pre>";
include 'includes/funciones.php';
include 'includes/templates/header.php';
?>
<div class="container-main">
	<div class="container-box">
		<div class="box-container">
			<div class="contenedor-index">
				<div class="nav-logo">
					<div class="logo graduate-logo">
						<div class="caja">
							<a href="index.php">
								<div class="back">
									<img src="images/icons/arrow-left.svg" alt="">
									<p style="margin-left:5px;">Regresar a Menú</p>
								</div>
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="contenedor-index">
				<div class="content-home">
					<div class="content-home1">
						<div class="input-mes">
							<div class="caja-nuevo">
								<div class="img">
									<img src="images/icons/birthday-cake.svg" alt="">
									<h3>Exportar <br>Cumpleañeros</h3>
								</div>
							</div>
							<div class="caja-input-mes">
								<div class="formulario">
									<form id="" method="POST" action="exportar/exportar.php">
										<div class="colum-second">
											<input type="hidden" class="nombre" name="nombres" id="nombres" placeholder="Nombres">
											<input type="hidden" class="apellidos" name="apellidos" id="apellidos" placeholder="Apellidos">
											<!-- <div class="input">
												<div class="campo">
													<div class="icon">
														<img src="images/icons/profile.svg" alt="">
													</div>
													<input type="number" class="clase" name="clase" id="clase" placeholder="Clase" min="1946" max="2021">
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
												<button type="submit" id="export_csv_data" name='export_csv_data' value="Export to CSV" class="boton nuevo-registro">Exportar CSV</button>
											</div>
										</div>
										<div class="campo enviar registro">
											<div class="boton-registro">
												<button type="submit" id="export_xls_data" name='export_xls_data' value="Export to XLS" class="boton nuevo-registro">Exportar XLS</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
include 'includes/templates/footer.php';
?>