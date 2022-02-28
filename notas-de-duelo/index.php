<?php
date_default_timezone_set('America/Tegucigalpa');

require_once __DIR__ . '/vendor/autoload.php';
require_once 'model.php';
$stylesheet = file_get_contents('css/style.css');

if (isset($_GET['ID'])) {
	$user_id = $_GET['ID'];
	$solicitudes = getAll($user_id);
	if ($solicitudes->num_rows > 0) {
		while ($row = $solicitudes->fetch_assoc()) {
			$id = $row['ID'];
			$nacionalidad = $row['nacionalidad'];
			$sexo = $row['genero'];
			if ($sexo == 'M') {
				$a = 'o';
			} else {
				$a = 'a';
			}

			if ($nacionalidad == 'ALEMANIA' && $sexo == 'M') {
				$nacion = 'Alemán';
			} elseif ($nacionalidad == 'ALEMANIA' && $sexo == 'F') {
				$nacion = 'Alemana';
			}
			if ($nacionalidad == 'ARGENTINA' && $sexo == 'M') {
				$nacion = 'Argentino';
			} elseif ($nacionalidad == 'ARGENTINA' && $sexo == 'F') {
				$nacion = 'Argentina';
			}
			if ($nacionalidad == 'AUSTRIA' && $sexo == 'M') {
				$nacion = 'Austriaco';
			} elseif ($nacionalidad == 'AUSTRIA' && $sexo == 'F') {
				$nacion = 'Austriaca';
			}
			if ($nacionalidad == 'BELGICA' && $sexo == 'M') {
				$nacion = 'Belga';
			}
			if ($nacionalidad == 'BELICE' && $sexo == 'M') {
				$nacion = 'Beliceño';
			} elseif ($nacionalidad == 'BELICE' && $sexo == 'F') {
				$nacion = 'Beliceña';
			}
			if ($nacionalidad == 'BOLIVIA' && $sexo == 'M') {
				$nacion = 'Boliviano';
			} elseif ($nacionalidad == 'BOLIVIA' && $sexo == 'F') {
				$nacion = 'Boliviana';
			}
			if ($nacionalidad == 'BRASIL' && $sexo == 'M') {
				$nacion = 'Brasileño';
			} elseif ($nacionalidad == 'BRASIL' && $sexo == 'F') {
				$nacion = 'Brasileña';
			}
			if ($nacionalidad == 'CANADÁ' && $sexo == 'M') {
				$nacion = 'Canadiense';
			} elseif ($nacionalidad == 'CANADÁ' && $sexo == 'F') {
				$nacion = 'Canadiense';
			}
			if ($nacionalidad == 'CHILE' && $sexo == 'M') {
				$nacion = 'Chileno';
			} elseif ($nacionalidad == 'CHILE' && $sexo == 'F') {
				$nacion = 'Chilena';
			}
			if ($nacionalidad == 'COLOMBIA' && $sexo == 'M') {
				$nacion = 'Colombiano';
			} elseif ($nacionalidad == 'COLOMBIA' && $sexo == 'F') {
				$nacion = 'Colombiana';
			}
			if ($nacionalidad == 'COSTA RICA') {
				$nacion = 'costarricense';
			}
			if ($nacionalidad == 'CUBA' && $sexo == 'M') {
				$nacion = 'Cubano';
			} elseif ($nacionalidad == 'CUBA' && $sexo == 'F') {
				$nacion = 'Cubana';
			}
			if ($nacionalidad == 'ECUADOR' && $sexo == 'M') {
				$nacion = 'Ecuatoriano';
			} elseif ($nacionalidad == 'ECUADOR' && $sexo == 'F') {
				$nacion = 'Ecuatoriana';
			}
			if ($nacionalidad == 'EL SALVADOR' && $sexo == 'M') {
				$nacion = 'Salvadoreño';
			} elseif ($nacionalidad == 'EL SALVADOR' && $sexo == 'F') {
				$nacion = 'Salvadoreña';
			}
			if ($nacionalidad == 'ESPAÑA' && $sexo == 'M') {
				$nacion = 'Español';
			} elseif ($nacionalidad == 'ESPAÑA' && $sexo == 'F') {
				$nacion = 'Española';
			}
			if ($nacionalidad == 'ESTADOS UNIDOS') {
				$nacion = 'Estadounidense';
			}
			if ($nacionalidad == 'GUATEMALA' && $sexo == 'M') {
				$nacion = 'Guatemalteco';
			} elseif ($nacionalidad == 'GUATEMALA' && $sexo == 'F') {
				$nacion = 'Guatemalteca';
			}
			if ($nacionalidad == 'PERU' && $sexo == 'M') {
				$nacion = 'Perueano';
			} elseif ($nacionalidad == 'PERU' && $sexo == 'F') {
				$nacion = 'Perueana';
			}
			if ($nacionalidad == 'HONDURAS' && $sexo == 'M') {
				$nacion = 'Hondureño';
			} elseif ($nacionalidad == 'HONDURAS' && $sexo == 'F') {
				$nacion = 'Hondureña';
			}
			if ($nacionalidad == 'MEXICO' && $sexo == 'M') {
				$nacion = 'Mexicano';
			} elseif ($nacionalidad == 'MEXICO' && $sexo == 'F') {
				$nacion = 'Mexicana';
			}
			if ($nacionalidad == 'NICARAGUA') {
				$nacion = 'Nicaragüense';
			}
			if ($nacionalidad == 'PANAMA' && $sexo == 'M') {
				$nacion = 'Panameño';
			} elseif ($nacionalidad == 'PANAMA' && $sexo == 'F') {
				$nacion = 'Panameña';
			}
			if ($nacionalidad == 'PERU' && $sexo == 'M') {
				$nacion = 'Peruano';
			} elseif ($nacionalidad == 'PERU' && $sexo == 'F') {
				$nacion = 'Peruana';
			}
			if ($nacionalidad == 'REPUBLICA DOMINICANA' && $sexo == 'M') {
				$nacion = 'Dominicano';
			} elseif ($nacionalidad == 'GUATEMALA' && $sexo == 'F') {
				$nacion = 'Dominicana';
			}
			if ($nacionalidad == 'VENEZUELA' && $sexo == 'M') {
				$nacion = 'Venezolano';
			} elseif ($nacionalidad == 'VENEZUELA' && $sexo == 'F') {
				$nacion = 'Venezolana';
			}
			if ($nacionalidad == 'HAITI' && $sexo == 'M') {
				$nacion = 'Haitiano';
			} elseif ($nacionalidad == 'HAITI' && $sexo == 'F') {
				$nacion = 'Haitiano';
			}
			if ($nacionalidad == 'ISRAEL' && $sexo == 'M') {
				$nacion = 'Israelí';
			}
			if ($nacionalidad == 'ITALIA' && $sexo == 'M') {
				$nacion = 'Italiano';
			} elseif ($nacionalidad == 'ITALIA' && $sexo == 'F') {
				$nacion = 'Italiana';
			}
			if ($nacionalidad == 'JAMAICA' && $sexo == 'M') {
				$nacion = 'Jamaicano';
			} elseif ($nacionalidad == 'JAMAICA' && $sexo == 'F') {
				$nacion = 'Jamaicana';
			}
			if ($nacionalidad == 'PARAGUAY' && $sexo == 'M') {
				$nacion = 'Paraguayo';
			} elseif ($nacionalidad == 'PARAGUAY' && $sexo == 'F') {
				$nacion = 'Paraguaya';
			}
			if ($nacionalidad == 'URUGUAY' && $sexo == 'M') {
				$nacion = 'Uruguayo';
			} elseif ($nacionalidad == 'URUGUAY' && $sexo == 'F') {
				$nacion = 'Uruguaya';
			}

			$html .= '<h1 class="nombre">ING. ' . $row['nombres'] . ' ' . $row['apellidos'] . '</h1>';
			$html .= '<h1 class="qddg">(Q.D.D.G.)</h1>';
			$fechaFallecido = $row['date_deceased'];
			$fechaNota = $row['fechaNotaDuelo'];
			setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish');
			$newDate = date("d-m-Y", strtotime($fechaFallecido));
			$fechaND = date("d-m-Y", strtotime($fechaNota));
			$fechaF = strftime("%d de %B de %Y", strtotime($newDate));
			$fechaNDF = strftime("%d de %B de %Y", strtotime($fechaND));
			$hoy = strftime("%d de %B de %Y");


			$html .= '
			<div class="main">
			<div class="main-container">
				<div class="container">
					<p class="fecha">Hecho acaecido el ' . $fechaF . '</p>
					<p class="parrafo">' . $nacion . ', graduad' . $a . ' de la clase ' . $row['clase'] . '</p>
					<p class="parrafo mensaje">Expresamos nuestras más sinceras condolencias a sus familiares y amigos. Elevamos nuestras plegarias al Todopoderoso para que reciba el alma de su amad' . $a . ' hij' . $a . '.</p>
					<p class="parrafo fechaCreacion">Campus Zamorano, ' . $fechaNDF . '</p>
				</div>
				</div>
			</div>';
			try {
				$mpdf = new \Mpdf\Mpdf();
				// $mpdf->debug = true;
				// ob_end_clean();
				$mpdf->WriteHTML($stylesheet, 1);
				$mpdf->WriteHTML($html);
				$mpdf->Output("galeria/Nota de Duelo " . ucwords(strtolower($row['nombres'] . ' ' . $row['apellidos'])) . ".pdf", "I");
				$mpdf->Output("galeria/Nota de Duelo " . ucwords(strtolower($row['nombres'] . ' ' . $row['apellidos'])) . ".pdf", "F");
			} catch (\Mpdf\MpdfException $e) { // Note: safer fully qualified exception 
				//       name used for catch
				// Process the exception, log, print etc.
				echo $e->getMessage();
			}
			//convertir pdf a jpg
			// $im = imagecreatefromjpeg('galería/Nota de Duelo '.ucwords(strtolower($row['nombres'].' '.$row['apellidos'])).'.jpg');
			// $mpdf->Output("galería/Nota de Duelo ".ucwords(strtolower($row['nombres'].' '.$row['apellidos'])).".jpg", "F");

		}
	}
}