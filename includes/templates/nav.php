<div class="nav-logo">
	<div class="logo">
		<!-- <a href="index.php"> <img src="images/logo-direccion-02.png" alt=""></a> -->
		<h2>Control de Lotes</h2>
		<div class="caja">
			<!-- <a href="buscar-graduado.php">
				<div class="back">
					<img src="images/icons/arrow-left.svg" alt="">
					<p style="margin-left:5px;">Regresar a Buscar</p>
				</div>
			</a> -->
			<?php
			if ((obtenerPaginaActual()) == 'index') {
				echo '';
			}elseif((obtenerPaginaActual()) == 'editar-perfil'){
				echo '<a href="index.php">
						<div class="back">
							<img src="images/icons/arrow-left.svg" alt="">
							<p style="margin-left:5px;">Regresar a Buscar</p>
						</div>
					</a>';
			}
			// }else{
			// 	// obtenerPaginaActual();
			// 	if ((obtenerPaginaActual()) != 'index') {
			// 		echo '<a href="';
			// 		echo $_SERVER['HTTP_REFERER'];
			// 		echo '">';
			// 		echo '<div class="back">
			// 				<img src="images/icons/arrow-left.svg" alt="">
			// 				<p style="margin-left:5px;">Regresar</p>
			// 			</div>';
			// 		echo '</a>';
			// 	};
			// }
			?>
		</div>
	</div>

	<div class="name logout">
		<div class="name-user">
			<h3>Bienvenid@ <?php echo $_SESSION["nombre_usuario"]; ?> </h3>
			<img src="images/icons/perfil.svg" alt="">
		</div>

		<div class="logout-user">
			<a href="login.php?cerrar_sesion=true">
				<p>Cerrar Sesión</p>
			</a>
			<img src="images/icons/logout.svg" alt="">
		</div>
	</div>
</div>