<?php
include 'includes/funciones.php';
include 'includes/sesiones.php';
include 'includes/conexion.php';
include 'includes/templates/header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/mapa.css">
	<title>Document</title>
</head>

<body>
	<div class="contenedor">
		<div class="contenedor-index">
			<div class="nav-logo">
				<div class="logo graduate-logo">
					<div class="caja">
						<a href="index.php">
							<div class="back">
								<img src="images/icons/arrow-left.svg" alt="">
								<p style="margin-left:5px;">Regresar a Inicio</p>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="contenedor">
		<div class="contenedor-index">
			<div class="title">
				<div style="text-align: center">
					<?php
					if (isset($_GET['lote'])) {
						$id_lote = $_GET['lote'];
						$consulta = $conn->query("SELECT * FROM `lotes` WHERE `id_lote` = $id_lote");
						$contador = 0;
						// CONDICIÓN FALLECIDO
						while ($row = $consulta->fetch_array()) {
							$contador++;
							$v2 = $row['areav2'];
							$bloque = $row['bloque'];
							$estado = $row['estado'];
							$preciovra = 750;

							if ($estado == 'v') {
								$estado = 'Vendido';
							} elseif ($estado == 'd') {
								$estado = 'Disponible';
							} elseif ($estado == 'r') {
								$estado = 'Reservado';
							}
							echo '<p><strong>Estado: ' . $estado . '<br>Lote: ' . $bloque . '-' . $id_lote . '</p></strong>';
					?>
				</div>
				<table style="width:90%">
					<tr>
						<th>Área:</th>
						<th>
							<?php
							echo $v2 . ' vr2';
							?>
						</th>
					</tr>
					<tr>
						<th>Precio:</th>
						<th>
							<?php
							echo 'L. ' . number_format($v2 * $preciovra);
							?>
						</th>
					</tr>
					<tr>
						<th>Prima 10%:</th>
						<th>
							<?php
							echo 'L. ' . number_format(($v2 * $preciovra) * 0.1, 2);
							?>
						</th>
					</tr>
					<tr>
						<th>Cuota 5 años:</th>
						<th>
							<?php
							echo 'L. ' . number_format((($v2 * $preciovra) - (($v2 * $preciovra) * 0.1)) / 60, 2);
							?>
						</th>
					</tr>
					<tr>
						<th>Cuota 10 años:</th>
						<th>
							<?php
							echo 'L. ' . number_format((($v2 * $preciovra) - (($v2 * $preciovra) * 0.1)) / 120, 2);
							?>
						</th>
					</tr>
				</table>

		<?php

						}
					}
		?>
			</div>
			<div class="container">
				<?php
				include 'lotes/chorreritas.php';
				$consulta = $conn->query("SELECT * FROM lotes");
				$contador = 0;
				// CONDICIÓN FALLECIDO
				while ($row = $consulta->fetch_array()) {
					$contador++;
					$id = $row['id_lote'];
					$nombres = $row['bloque'];
					$path = $row['path_lote'];
					$bloqueN = $row['bloque'];
					$estado = $row['estado'];
				?>

					
					<a href="mapa.php?lote=<?php echo $id ?>">
						<path id="<?php echo $bloque . $id ?>" class="cls-1 
					<?php
					if ($estado == 'v') {
						echo 'occupied';
					} elseif ($estado == 'r') {
						echo 'reserved';
					} elseif ($estado == 'd') {
						echo 'enable';
					}
					?>" d="<?php echo $path ?>" transform="translate(-1069.07 -138.44)"></path>

						</path>
					</a>
					<text  dy="17" x="3" y="20" font-family="Verdana" font-size="5" style="fill:#425b8e;">
						<textPath xlink:href="#<?php echo $bloque . $id ?>"><?php echo  $bloque . $id ?></textPath>
					</text>
				<?php
				echo $bloqueN . $id;
				}
				?>
				</svg>
				<?php
				echo $bloqueN . $id;
				
				?>
			</div>
		</div>
	</div>
</body>

</html>