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
						<div class="row">
							<a href="total-graduados.php">
								<div class="caja-buscar">
									<div class="img">
										<img src="images/icons/buscar.svg" alt="">
										<h3>Total Graduados</h3>
									</div>
								</div>
							</a>
							<a href="genero.php">
								<div class="caja-buscar">
									<div class="img">
										<img src="images/icons/buscar.svg" alt="">
										<h3>Por Género</h3>
									</div>
								</div>
							</a>
							<a href="nacionalidad.php">
								<div class="caja-buscar">
									<div class="img">
										<img src="images/icons/buscar.svg" alt="">
										<h3>Por Nacionalidad</h3>
									</div>
								</div>
							</a>
							<a href="carreras.php">
								<div class="caja-buscar">
									<div class="img">
										<img src="images/icons/buscar.svg" alt="">
										<h3>Por Carreras</h3>
									</div>
								</div>
							</a>
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