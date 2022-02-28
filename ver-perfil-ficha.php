<?php
ob_start();
include 'includes/funciones.php';
include 'includes/sesiones.php';
include 'includes/conexion.php';
include_once 'includes/templates/header-graduate.php';
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

				if ($solicitudes->num_rows > 0) {
					while ($row = $solicitudes->fetch_assoc()) {
						$id = $row['id'];
						$clase = $row['clase'];
						$nombres = $row['nombre_completo'];
						$email = $row['correo'];
						$empresa_labora = $row['empleo'];
						$cargo = $row['cargo'];
						$area_profesional = $row['area_profesional'];
						$pais_reside = $row['residencia'];
						$url_linkedin = $row['url_linkedin'];
						$biografia = $row['biografia'];
						// $hddate = date("d-m-Y", strtotime($fechaN)); 
			?>

						<div class="formulario">
							<form id="resultadoBusqueda" method="post">
								<h4 style="margin:10px 0;"><?php echo $nombres; ?></h4>
								<h4 style="margin:10px 0;">Clase <?php echo $clase; ?></h4>
								<hr>
								<p>Lugar de Empleo: <strong><?php echo $empresa_labora; ?></strong></p>
								<p>Cargo: <strong><?php echo $cargo; ?></strong></p>
								<p>Área profesional: <strong><?php echo $area_profesional; ?></strong></p>
								<p>Correo: <strong><?php echo $email; ?></strong></p>
								<p>Residencia: <strong><?php echo $pais_reside; ?></strong></p>
								<?php
									if ($url_linkedin != "") {
										echo '<p>URL LinkedIn: <strong><a href="' . $url_linkedin . '" target="_blank">' . $url_linkedin . '</a></strong></p>';
									}else{
										echo '<p>URL LinkedIn: <strong>No se agregó</strong></p>';
									}

									if ($biografia != "") {
										echo '<p>Biografía: <strong>' . $biografia . '</strong></p>';
									}else{
										echo '<p>Biografía: <strong>No se agregó</strong></p>';
									}
								?>
								<div class="files">
									<hr>
									<div class="img-formulario">
										<div class="titulo-form">
											<h3>Documentos Adjuntos</h3>
											<hr>
											<?php
											// function mostrar_imagenes($ruta){
											// 	// Se comprueba que realmente sea la ruta de un directorio
											// 	if (is_dir($ruta)){
											// 		// Abre un gestor de directorios para la ruta indicada
											// 		$gestor = opendir($ruta);

											// 		// Recorre todos los archivos del directorio
											// 		while (($archivo = readdir($gestor)) !== false)  {
											// 			// Solo buscamos archivos sin entrar en subdirectorios
											// 			if (is_file($ruta."/".$archivo)) {
											// 				echo "<img src='".$ruta."/".$archivo."' width='200px' alt='".$archivo."' title='".$archivo."'>";
											// 			}            
											// 		}
											// 		// Cierra el gestor de directorios
											// 		closedir($gestor);
											// 	} else {
											// 		echo "No es una ruta de directorio valida<br/>";
											// 	}
											// };
											//$ruta = "src/upload/".$id;
											// echo $ruta;
											// echo "<img src='".$ruta."/".$id."/gary_0.png"."' width='200px'>";
											// mostrar_imagenes($ruta);
											function obtener_estructura_directorios($ruta)
											{
												// Se comprueba que realmente sea la ruta de un directorio
												if (is_dir($ruta)) {
													// Abre un gestor de directorios para la ruta indicada
													$gestor = opendir($ruta);
													echo "<div class='documentos'>
												<table>
													<tr>
														<th>No.</th>
														<th>Tipo</th>
														<th>Nombre</th>
														<th>Acciones.</th>
													</tr>";
													// Recorre todos los elementos del directorio
													$i = 0;
													while (($archivo = readdir($gestor)) !== false) {


														$ext = pathinfo($archivo, PATHINFO_EXTENSION);

														if ($ext == "png" || $ext == "jpg" || $ext == "jpeg" || $ext == "gif" || $ext == "JPG" || $ext == "PNG" || $ext == "JPEG" || $ext == "GIF") {
															$icon = "<i class='fas fa-images'></i>";
														} else if ($ext == "docx" || $ext == "doc") {
															$icon = "<i class='fas fa-file-word'></i>";
														} else if ($ext == "pdf") {
															$icon = "<i class='fas fa-file-pdf'></i>";
														} else {
															$icon = "<i class='fas fa-file'></i>";
														}
														$ruta_completa = $ruta . "/" . $archivo;

														// Se muestran todos los archivos y carpetas excepto "." y ".."
														if ($archivo != "." && $archivo != "..") {
															$i++;
															// Si es un directorio se recorre recursivamente
															if (is_dir($ruta_completa)) {
																echo "<tr><td>" . $i . ".- " . $icon . "<a href='$ruta_completa' target='_blank'>" . $archivo . "</a><i class='fas fa-download'></i></td>";
																obtener_estructura_directorios($ruta_completa);
															} else {
																echo "<td>" . $i . "</td>";
																echo "<td>" . $icon . "</td>";
																echo "<td><a href='$ruta_completa' target='_blank'>" . $archivo . "</a></td>";
																echo "<td><a href='$ruta_completa' download='$archivo' ><i class='fas fa-download'></i>Descargar</a></td>";
																echo "</tr>";
															}
														}
													}

													// Cierra el gestor de directorios
													closedir($gestor);
													echo "</table></div>";
												} else {
													echo "No se adjuntaron archivos<br/>";
												}
											}
											$ruta = "src/upload/" . $id;
											obtener_estructura_directorios($ruta);
											$dir = 'src/upload/' . $id . '/';

											// //ruta donde guardar los archivos zip, ya debe existir
											$rutaFinal = "src/upload/zip";

											if (!file_exists($rutaFinal)) {
												mkdir($rutaFinal);
												chmod($rutaFinal, 0777);
											}

											$searchString = " ";
											$replaceString = "";
											$namefile = strtolower(quitar_acentos(str_replace($searchString, $replaceString, $nombres)));
											$archivoZip = "$namefile.zip";

											$zip_file = "src/upload/zip/$archivoZip";
											touch($zip_file); // just create a zip file

											
											$zip = new ZipArchive;
											$this_zip = $zip->open($zip_file);
											if (file_exists($dir)) {
												if ($this_zip) {
													$folder = opendir('src/upload/' . $id);
													if ($folder) {
														while (false !== ($image = readdir($folder))) {
															if ($image !== "." && $image !== "..") {
																$file_with_path = "src/upload/" . $id . "/" . $image;
																$zip->addFile($file_with_path, $image);
															}
														}
														closedir($folder);
													}
												}
												if (isset($_GET['descargar'])) {
													 if (file_exists($zip_file)) {
														 header('Content-type: application/zip');
														 header('Content-Disposition: attachment; filename="' . $archivoZip . '"');
														ob_end_flush();
														 readfile($zip_file); // auto download
														 //if you wnat to delete this zip file after download
														 unlink($zip_file);
													 }
													// unlink($zip_file);
												}
												echo "<br><a href='ver-perfil-ficha.php?ID=$id&descargar=true' target='_blank'>Descargar todo: <i class='fas fa-download'></i></a>";
												//echo "<br><a href='$zip_file' target='_blank'>Descargar todo: <i class='fas fa-download'></i></a>";
											}else{
												echo "o el directorio no existe";
											}
											
											?>
											<hr>

										</div>
									</div>
								</div>
							</form>
						</div>
			<?php
					}
				}
			}
			?>
		</div>
	</div>
</div>
