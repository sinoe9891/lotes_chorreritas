<?php
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
								<p>Biografía Profesional: <strong><?php echo $biografia; ?></strong></p>
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

														if ($ext == "png" || $ext == "jpg" || $ext == "jpeg" || $ext == "gif") {
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
																echo "<tr><td>" . $i . ".- " . $icon . "<a href='$ruta_completa'>" . $archivo . "</a><i class='fas fa-download'></i></td>";
																obtener_estructura_directorios($ruta_completa);
															} else {
																echo "<td>" . $i . "</td>";
																echo "<td>" . $icon . "</td>";
																echo "<td><a href='$ruta_completa' download='$archivo' >" . $archivo . "</a></td>";
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

											/* primero creamos la función que hace la magia
										* esta funcion recorre carpetas y subcarpetas
										* añadiendo todo archivo que encuentre a su paso
										* recibe el directorio y el zip a utilizar 
										*/
											// function agregar_zip($dir, $zip)
											// {
											// 	//verificamos si $dir es un directorio
											// 	if (is_dir($dir)) {
											// 		//abrimos el directorio y lo asignamos a $da
											// 		if ($da = opendir($dir)) {
											// 			//leemos del directorio hasta que termine
											// 			while (($archivo = readdir($da)) !== false) {
											// 				/*Si es un directorio imprimimos la ruta
											// 				* y llamamos recursivamente esta función
											// 				* para que verifique dentro del nuevo directorio
											// 				* por mas directorios o archivos
											// 				*/
											// 				if (is_dir($dir . $archivo) && $archivo != "." && $archivo != "..") {
											// 					echo "<strong>Creando directorio: $dir$archivo</strong><br/>";
											// 					agregar_zip($dir . $archivo . "/", $zip);

											// 					/*si encuentra un archivo imprimimos la ruta donde se encuentra
											// 					* y agregamos el archivo al zip junto con su ruta 
											// 					*/
											// 				} elseif (is_file($dir . $archivo) && $archivo != "." && $archivo != "..") {
											// 					echo "<br/>Agregando archivo: $dir$archivo <br/>";
											// 					$zip->addFile($dir . $archivo, $archivo);
											// 				}
											// 			}
											// 			//cerramos el directorio abierto en el momento
											// 			closedir($da);
											// 		}
											// 	}
											// }
											//fin de la función

											//creamos una instancia de ZipArchive
											// $zip = new ZipArchive();
											// /*directorio a comprimir
											// * la barra inclinada al final es importante
											// * la ruta debe ser relativa no absoluta
											// */
											$dir = 'src/upload/' . $id . '/';

											// //ruta donde guardar los archivos zip, ya debe existir
											$rutaFinal = "src/upload/zip";

											// if (!file_exists($rutaFinal)) {
											// 	mkdir($rutaFinal);
											// }
											$searchString = " ";
											$replaceString = "";
											$namefile = strtolower(quitar_acentos(str_replace($searchString, $replaceString, $nombres)));
											$archivoZip = "$namefile.zip";

											// if ($zip->open($archivoZip, ZIPARCHIVE::CREATE) === true) {
											// 	agregar_zip($dir, $zip);
											// 	$zip->close();
											// 	//Muevo el archivo a una ruta
											// 	//donde no se mezcle los zip con los demas archivos
											// 	rename($archivoZip, "$rutaFinal/$archivoZip");
											// 	//Hasta aqui el archivo zip ya esta creado
											// 	//Verifico si el archivo ha sido creado
											// 	if (file_exists($rutaFinal . "/" . $archivoZip)) {
											// 		echo "<br><a href='$rutaFinal/$archivoZip'>Descargar todo: <i class='fas fa-download'></i></a>";
											// 		// unlink("$rutaFinal/$archivoZip");
											// 	} else {
											// 		echo $rutaFinal . "/" . $archivoZip;
											// 		echo "<br>Error, archivo zip no ha sido creado!!<br>";
											// 	}
											// }


											// $zip_file = 'src/upload/' . $id . '/';
											// touch($zip_file); // just create a zip file

											// $zip = new ZipArchive;
											// $this_zip = $zip->open($zip_file);

											// if ($this_zip) {
											// 	$folder = opendir('src/upload/' . $id);
											// 	if ($folder) {
											// 		while (false !== ($image = readdir($folder))) {
											// 			if ($image !== "." && $image !== "..") {
											// 				echo $image;
											// 				$file_with_path = "src/upload/". $id."/". $image;
											// 				$zip->addFile($file_with_path, $image);
											// 			}
											// 		}
											// 		closedir($folder);
											// 	}

											// 	$searchString = " ";
											// 	$replaceString = "";
											// 	$namefile = strtolower(quitar_acentos(str_replace($searchString, $replaceString, $nombres)));
											// 	$archivoZip = "$namefile.zip";

											// 	if (file_exists($zip_file)) {
											// 		header('Content-type: application/zip');
											// 		header('Content-Disposition: attachment; filename="' . $archivoZip . '"');
											// 		readfile($zip_file); // auto download
											// 		//if you wnat to delete this zip file after download
											// 		unlink($zip_file);
											// 	}
											// }
											
											$zip_file = "src/upload/zip/$archivoZip";
											touch($zip_file); // just create a zip file

											
											$zip = new ZipArchive;
											$this_zip = $zip->open($zip_file);
											if ($this_zip) {
												// 	$file_with_path = "src/upload/'.$id.'/dannysinoevelasquezcadena_2.jpeg";
												// 	$name = "1.jpg";
												// 	$zip->addFile($file_with_path,$name);
												
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
													readfile($zip_file); // auto download
													//if you wnat to delete this zip file after download
													unlink($zip_file);
												}
											}
											echo "<br><a href='prueba2.php?ID=$id&descargar=true' target='_blank'>Descargar todo: <i class='fas fa-download'></i></a>";
											echo "<br><a href='$zip_file' target='_blank'>Descargar todo: <i class='fas fa-download'></i></a>";
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

