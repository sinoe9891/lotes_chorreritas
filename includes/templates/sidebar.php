<div class="sidebar-box">
	<div class="sidebar">
		<div class="sidebar-box-title">
			<h3>Menú</h3>
		</div>
		<div>
			<ul class="items">
				<li class="title-items">
					<?php if (!isset($_SESSION['correo'])) { ?>
				<li class="title-items"><a href="index.php">Log in</a></li>
			<?php } elseif (isset($_SESSION['correo'])) { ?>
				<li class="title-items"><a href="index.php">Log out: <?php echo "Usuario: " . $_SESSION['perfiles_user']; ?></a></li>
			<?php } ?>
			</li>
			<hr>
			<li class="title-items"><a href="https://www.zamorano.edu/graduados/">Graduados</a></li>

			<ul>
				<li><a href="https://www.zamorano.edu/graduados/noticias-de-graduados/"> Noticias de Graduados</a></li>
			</ul>
			<hr>
			<li class="title-items"><a href="#">Vuelve a casa</a></li>
			<ul>
				<li><a href="https://www.zamorano.edu/graduados/vuelve-a-casa/aniversario-de-clases/"> Aniversario de Clases</a></li>
				<li><a href="https://www.zamorano.edu/graduados/vuelve-a-casa/protocolo-de-visitas-al-campus/"> Protocolo de Visitas al Campus</a></li>
			</ul>
			<hr>
			<li class="title-items active-update-data"><a href="https://www.zamorano.edu/alumni/actualiza-tus-datos.php">Actualiza tus Datos</a></li>
			<ul>
				<li><a class="active-graduates" href="https://www.zamorano.edu/alumni/graduates-list.php"> Graduados Pregrado</a></li>
				<li><a href="https://www.zamorano.edu/graduados-posgrado/"> Graduados Posgrado</a></li>
				<li><a href="https://www.zamorano.edu/alumni/ver-notas-de-duelo.php?anoFallecido=2021"> In Memoriam</a></li>
				<li class="active-birthday"><a  href="https://www.zamorano.edu/alumni/birthday.php"> Cumpleañeros</a></li>
				<li><a href="http://www.zamorano.edu/alumni/total/"> Total Graduados</a></li>
			</ul>
			<hr>
			<li class="title-items"><a href="https://www.zamorano.edu/graduados/servicios-para-graduados/">Servicios para Graduados</a></li>
			<hr>
			<li class="title-items"><a href="https://www.zamorano.edu/servicios-para-graduados/faqs-servicios-de-graduados/">FAQ’s</a></li>
			<hr>
			<li class="title-items"><a href="#">Apóyanos</a></li>
			<ul>
				<li><a href="https://www.zamorano.edu/graduados/debes-apoyar-alma-mater/"> Como un Zamorano, ¿por qué deberías aportar?</a></li>
				<li><a href="https://www.zamorano.edu/honor-roll-graduates/"> Cuadro de Honor</a></li>
				<li><a href="https://www.zamorano.edu/cultiva-su-futuro/"> Cultiva Su Futuro</a></li>
				<li><a href="https://www.zamorano.edu/apoyanos/clase-1984"> Donantes de Clase 84</a></li>
			</ul>
			<hr>
			<li class="title-items"><a href="#">AGEAP</a></li>
			<ul>
				<li><a href="https://www.zamorano.edu/directiva-de-ageap/"> Directiva de AGEAPs</a></li>
				<li><a href="https://www.zamorano.edu/graduados/capitulos-nacionales/"> Capítulos Nacionales</a></li>
			</ul>
			</ul>
		</div>
	</div>
</div>