<?php
include 'includes/funciones.php';
include 'includes/sesiones.php';
include 'includes/conexion.php';
include 'includes/templates/header.php';
// Obtener el ID de la URL
// if(isset($_GET['id_proyecto'])) {
//     $id_proyecto = $_GET['id_proyecto'];
// }
// 
?>
<style>
	@media (max-width: 768px) {
		#tabla>tbody>tr th {
			line-height: 17px;
		}

		td p {
			font-size: 12px;
		}

		.acciones {
			display: flex;
			align-items: center;
		}

		.acciones>a>.fas,
		.far,
		.fa-trash {
			font-size: 11px;
		}
	}
</style>

<div class="contenedor">
	<div class="contenedor-index">
		<div class="nav-logo">
			<div class="logo graduate-logo">
				<div class="caja">
					<a href="graduandos-solicitudes.php?mesSolicitud=13">
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
		<!-- <img src="images/logo-direccion-02.png" alt=""> -->
	</div>
	<div class="contenedor-login">
		<!-- AQUI VA EL CODIGO  -->
		<div class="caja-solicitud-graduandos">
			<div class="img-formulario">
				<!-- <img src="images/icons/perfil.svg" alt=""> -->
				<div class="titulo-form">

					<h3>Graduandos Faltantes <?php echo $ano = date('Y'); ?></h3>
					<?php
					$solicitudes = obtenerSolicitudesGraduandos('id_temp');
					$solicitudes1 = obtenerGraduandosFaltantes();
					?>
				</div>
			</div>
			<?php
			$consulta = $conn->query("SELECT * FROM graduates.graduandos t1 WHERE NOT EXISTS (SELECT NULL FROM graduates.temporal_graduandos t2 WHERE t2.nombres = t1.nombres) order by t1.nombres");
			?>
			<div class="img-formulario">
				<div class="titulo-form">
					<?php
					if ($consulta->num_rows > 1 || $consulta->num_rows == 0) {
						echo '<h3>' . $solicitudes1->num_rows . ' total de faltantes</h3>';
					} else {
						echo '<h3>' . $solicitudes1->num_rows . ' faltantes</h3>';
					}
					?>
				</div>
			</div>
			<table style="width:100%" id="tabla">
				<tr>
					<th>No.</th>
					<th>Clase</th>
					<th>Nombre Completo</th>
					<th>Fecha de Graduación</th>
				</tr>
				<?php
				// CONDICIÓN FALLECIDO
				$numero = 1;
				while ($solicitudes1 = $consulta->fetch_array()) {
					// $fallecido = $row['deceased'];
					// $notaDuelo = $row['fechaNotaDuelo'];
					// $hora_solicitud = $row['hora_solicitud'];
				?>
					<tr id="solicitud:<?php echo $solicitudes1['ID'] ?>">
						<!-- <td><p><?php echo $solicitudes1['ID']; ?></p></td> -->
						<td>
							<p><?php echo $numero++; ?></p>
						</td>
						<td>
							<p><?php echo $solicitudes1['clase'] ?></p>
						</td>
						<td>
							<p><?php echo $solicitudes1['nombres'] . " " . $solicitudes1['apellidos'] ?></p>
						</td>
						<td>
							<p><?php echo $solicitudes1['dia_graduacion'] . "/" . $solicitudes1['mes_graduacion'] ?></p>
						</td>
					</tr>
				<?php
					}
				?>
			</table>
		</div>
	</div>
</div>
<?php
include 'includes/templates/footer.php';
?>