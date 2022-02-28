<div class="nav-logo">
	<div class="logo graduate-logo">
		<div class="caja">
			<!-- <a href="javascript: history.go(-1)">Volver</a> -->
			<?php
			$anterior = back();
			$solicitudes = "solicitud-graduados";
			$findme   = 'solicitud-graduados';
			$findme1   = 'actualiza-tus-datos';
			$findme2   = 'resultado';
			$pos = strpos($anterior, $findme);
			$pos1 = strpos($anterior, $findme1);
			$pos2 = strpos($anterior, $findme2);
			
			if (($anterior) == '') {
				echo '<a href="https://www.zamorano.edu/graduados/">
						<div class="back">
							<img src="images/icons/arrow-left.svg" alt="">
							<p style="margin-left:5px;">Regresar a Graduados</p>
						</div>
					</a>';
			}elseif ($pos === false && ($anterior) != 'graduados' && $pos1 === false && $pos2 === false) {
				echo '<a href="';
				echo $_SERVER['HTTP_REFERER'];
				echo '">';
				echo '<div class="back">
							<img src="images/icons/arrow-left.svg" alt="">
							<p style="margin-left:5px;">Regresar</p>
						</div>';
				echo '</a>';
			}elseif (($anterior) == 'index') {
				echo '<a href="';
				echo $_SERVER['HTTP_REFERER'];
				echo '">';
				echo '<div class="back">
							<img src="images/icons/arrow-left.svg" alt="">
							<p style="margin-left:5px;">Regresar</p>
						</div>';
				echo '</a>';
			 } else {
				echo '<a href="https://www.zamorano.edu/graduados/">
						<div class="back">
							<img src="images/icons/arrow-left.svg" alt="">
							<p style="margin-left:5px;">Regresar a Graduados</p>
						</div>
					</a>';
			};
			?>

		</div>
	</div>
</div>