<?php
include 'includes/funciones.php';
// include 'includes/sesiones.php';
include 'includes/conexion.php';
include 'includes/templates/header.php';
// Obtener el ID de la URL
if (isset($_GET['ID'])) {
	$user_id = $_GET['ID'];
}
date_default_timezone_set('America/Tegucigalpa');
?>

<div class="contenedor">
	<div class="contenedor-index">
		<div class="nav-logo">
			<div class="logo graduate-logo">
				<div class="caja">
					<a href="graduandos.php">
						<div class="back">
							<img src="images/icons/arrow-left.svg" alt="">
							<p style="margin-left:5px;">Regresar a actualizar datos</p>
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
			<div class="logo" style="padding: 20px 33px 0px 33px">
				<h2 style="color: #008341 !important;font-size: 25px;font-weight: 400;">Comunidad de zamoranos en el mundo.</h2>
				<h2 style="color: #008341 !important;font-size: 27px;margin-top: 5px">Creación de Perfil de Graduado</h2>
				<p style="text-align:left;">Es necesario que incluyas todos los datos solicitados. Esta información será el perfil oficial Zamorano y estará expuesto en el listado de graduados para que puedan visualizarlo empresas y otros colegas que deseen conocerte y evaluar tu área de expertis.<br><br>
				Si tus datos <span style="color:#931919; font-weight:bold;">NO están completos y cuentas con errores ortográficos, no se brindará un correo de confirmación valido para tu hoja de salida.</span></p>
				</p>
				<p style="text-align:left;"> A continuación busca por tu nombre para poder crear tu perfil.</p>
			</div>
		</div>
	</div>
</div>
<div class="contenedor-formulario">
	<div class="logo">
	</div>
	<div class="contenedor-login">
		<div class="caja-register">
			<div class="img-formulario">
				<img src="images/icons/perfil.svg" alt="">
				<div class="titulo-form">
					<h3>Información de Registro</h3>
				</div>
			</div>
			<?php
			// obtiene las información del graduado
			if($_GET){
				$solicitudes = obtenerInfoGraduandos($user_id);
			}else{
				header('Location: graduandos-solicitudes.php?mesSolicitud=13');
			}
			if ($solicitudes->num_rows > 0) {
				while ($row = $solicitudes->fetch_assoc()) {
					$id = $row['ID'];
					$codigo = $row['codigo'];
					$clase = $row['clase'];
					$nombres = $row['nombres'];
					$first_name = $row['primer_nombre'];
					$secondname = $row['segundo_nombre'];
					$lastname = $row['apellidos'];
					$primer_apellido = $row['primer_apellido'];
					$segundo_apellido = $row['segundo_apellido'];
					$apodo = $row['nickname'];
					$nacionalidad  = $row['nacionalidad'];
					$gender = $row['genero'];
					$fechaN = $row['fecha_nacimiento'];
					$pais_reside = $row['pais_reside'];
					$ciudad = $row['ciudad'];
					$direccion = $row['direccion'];
					$email = $row['email'];
					$telefono = $row['telefono'];
					$movil = $row['movil'];
					$empresa_labora = $row['empresa_labora'];
					$rubro_empresa_labora = $row['rubros'];
					$url_linkedin = $row['url_linkedin'];
					$programa = $row['programa'];
					$orientacion = $row['orientacion'];
					$lugar_pasantia = $row['lugar_pasantia'];
					$direccion_pasantia = $row['direccion_pasantia'];
					$rubro_empresa_pasantia = $row['rubro_empresa'];
					$exp_pasantia = $row['exp_pasantia'];
					$area_investigacion = $row['area_investigacion'];
					$titulo_tesis = $row['titulo_tesis'];
					$asesor_tesis = $row['asesor_tesis'];
					$url_tesis = $row['url_tesis'];
					$area_interes = $row['area_interes'];
					$financiado_por = $row['financiado_por'];
					$otras_entidades = $row['otras_entidades'];
					$fondos_zamorano = $row['fondos_zamorano'];
					$fondos_propios = $row['fondos_propios'];
					$fondos_entidades = $row['fondos_entidades'];
					$correo1 = $row['email_2'];
					$correo2 = $row['email_3'];
					$linkedin = $row['linkedin'];
					$fallecido = $row['deceased'];
					$fechaFallecido = $row['date_deceased'];
					$fechaNotaDuelo = $row['fechaNotaDuelo'];
					$estatus = $row['estatus'];
					$pa = $row['pa'];
					$anioIA = $row['anioIA'];
					$dia_graduacion = $row['dia_graduacion'];
					$mes_graduacion = $row['mes_graduacion'];
					$codigoIA = $row['codigoIA'];
					if ($gender == 'M') {
						$g = 'O';
					} elseif ($gender == 'F') {
						$g = 'A';
					}

					//CONDICIÓN TÍTULO
					$tituloPrograma = '';
					if ($programa == '0077') {
						$titulo = 'AGRÓNOMO';
						$view = 'style="display:initial;"';
						$viewinfo = 'style="display:initial;"';
						if ($orientacion == '') {
							$viewOrientation = 'style="display:none;"';
						} else {
							$viewOrientation = '';
						}
						$tituloPrograma = '<p><i class="fas fa-graduation-cap" style="padding-right:2px;"></i> Título PIA: <strong>INGENIERO AGRÓNOMO (' . $anioIA . ')</strong>';
					}
					// CONDICIÓN PPIA
					if ($programa == '0707') {
						$titulo = 'PPIA: INGENIERO AGRÓNOMO ' . $anioIA;
						$view = 'style="display:initial;"';
						$viewinfo = 'style="display:none;"';
						if ($orientacion == '') {
							$viewOrientation = 'style="display:none;"';
						} else {
							$viewOrientation = '';
						}
						$tituloPrograma = '<p><i class="fas fa-graduation-cap" style="padding-right:2px;"></i> Título PPIA: <strong>INGENIERO AGRÓNOMO (' . $anioIA . ')</strong>';
					}
					if ($programa == '0007') {
						$titulo = 'AGRÓNOMO';
						$view = 'style="display:none;"';
						$viewinfo = 'style="display:initial;"';
						if ($orientacion == '') {
							$viewOrientation = 'style="display:none;"';
						} else {
							$viewOrientation = '';
						}
					}
					//CONDICIÓN TÍTULO 4X4
					if ($programa == '0777') {
						$view = 'style="display:initial;"';
						$viewinfo = 'style="display:initial;"';
						if ($orientacion == '') {
							$viewOrientation = 'style="display:none;"';
						} else {
							$viewOrientation = '';
						}
						if ($orientacion == 'GESTION DE AGRONEGOCIOS' || $orientacion == 'GESTIÓN DE AGRONEGOCIOS') {
							$titulo = 'INGENIER' . $g . ' EN GESTION DE AGRONEGOCIOS';
						}
						if ($orientacion == 'AGROINDUSTRIA') {
							$titulo = 'INGENIER' . $g . ' EN AGROINDUSTRIA';
						}
						if ($orientacion == 'INGENIERIA AGRONÓMICA' || $orientacion == 'INGENIERÍA AGRONÓMICA') {
							$titulo = 'INGENIER' . $g . ' AGRÓNOM' . $g;
						}
						if ($orientacion == 'AGROINDUSTRIA ALIMENTARIA') {
							$titulo = 'INGENIER' . $g . ' EN AGROINDUSTRIA ALIMENTARIA';
						}
						if ($orientacion == 'ADMINISTRACION DE AGRONEGOCIOS' || $orientacion == 'ADMINISTRACIÓN DE AGRONEGOCIOS') {
							$titulo = 'INGENIER' . $g . ' EN ADMINISTRACION DE AGRONEGOCIOS';
						}
						if ($orientacion == 'DESARROLLO SOCIOECONOMICO Y AMBIENTE') {
							$titulo = 'INGENIER' . $g . ' EN DESARROLLO SOCIOECONOMICO Y AMBIENTE';
						}
						if ($orientacion == 'AMBIENTE Y DESARROLLO') {
							$titulo = 'INGENIER' . $g . ' EN AMBIENTE Y DESARROLLO';
						}
					}
			?>
					<div class="formulario">
						<form id="form-graduandos" method="post">
							<div class="colum-second">
								<div class="input">
									<div class="campo">
										<div class="icon">
											<img src="images/icons/profile.svg" alt="">
										</div>
										<input type="hidden" id="linkedin" name="linkedin" value="<?php echo $linkedin; ?>">
										<input type="hidden" id="fallecido" name="fallecido" value="<?php echo $fallecido; ?>">
										<input type="hidden" id="fechaFallecido" name="fechaFallecido" value="<?php echo $fechaFallecido; ?>">
										<input type="hidden" id="fechaNotaDuelo" name="fechaNotaDuelo" value="<?php echo $fechaNotaDuelo; ?>">
										<input type="hidden" id="estatus" name="estatus" value="<?php echo $estatus; ?>">
										<input type="hidden" id="pa" name="pa" value="<?php echo $pa; ?>">
										<input type="hidden" id="anioIA" name="anioIA" value="<?php echo $anioIA; ?>">
										<input type="hidden" id="dia_graduacion" name="dia_graduacion" value="<?php echo $dia_graduacion; ?>">
										<input type="hidden" id="mes_graduacion" name="mes_graduacion" value="<?php echo $mes_graduacion; ?>">
										<input type="hidden" id="codigoIA" name="codigoIA" value="<?php echo $codigoIA; ?>">


										<input type="hidden" id="fechaSolicitud" name="fechaSolicitud" value="<?php echo date('Y-m-d'); ?>">
										<input type="hidden" id="horaSolicitud" name="horaSolicitud" value="<?php echo date('H:i:s'); ?>">
										<input type="hidden" id="user_id" name="user_id" value="<?php echo $id; ?>">
										<input type="hidden" id="firstname" name="firstname" value="<?php echo $first_name; ?>">
										<input type="hidden" id="secondname" name="secondname" value="<?php echo $secondname; ?>">
										<input type="text" id="nombre" name="nombre" value="<?php echo $nombres; ?>" readonly="readonly">
									</div>
								</div>
								<div class="input">
									<div class="campo">
										<div class="icon">
											<img src="images/icons/profile.svg" alt="">
										</div>
										<input type="hidden" id="primerapellido" name="primerapellido" value="<?php echo $primer_apellido; ?>" readonly="readonly">
										<input type="hidden" id="segundoapellido" name="segundoapellido" value="<?php echo $segundo_apellido; ?>" readonly="readonly">
										<input type="text" id="apellidos" name="apellidos" value="<?php echo $lastname; ?>" readonly="readonly">
									</div>
								</div>
							</div>
							<div class="colum-second">
								<div class="input">
									<div class="campo">
										<div class="icon">
											<img src="images/icons/profile.svg" alt="">
										</div>
										<input type="text" id="clase" name="clase" value="<?php echo $clase; ?>" readonly="readonly">
									</div>
								</div>
								<div class="input">
									<div class="campo">
										<div class="icon">
											<img src="images/icons/profile.svg" alt="">
										</div>
										<?php
										if ($codigo == '') {
											$codigo = 'N/A';
										} else {
											$codigo;
										};
										?>
										<input type="text" id="codigo" name="codigo" value="<?php echo $codigo; ?>" readonly="readonly">
									</div>
								</div>
							</div>
							<div class="colum-second">
								<div class="input">
									<div class="campo">
										<div class="icon">
											<img src="images/icons/profile.svg" alt="">
										</div>
										<input type="text" id="apodo" name="apodo" value="<?php echo $apodo; ?>" placeholder="Apodo">
									</div>
								</div>
								<div class="input">
									<div class="campo">
										<div class="icon">
											<img src="images/icons/profile.svg" alt="">
										</div>
										<input type="text" id="nacionalidad" name="nacionalidad" value="<?php echo $nacionalidad; ?>" readonly="readonly">
									</div>
								</div>
							</div>
							<div class="colum-second">
								<div class="input">
									<div class="campo">
										<div class="icon">
											<img src="images/icons/profile.svg" alt="">
										</div>
										<select name="genero" id="genero">
											<?php
											if ($gender == 'M') {
												echo "<option name='gender' value='M' readonly='readonly' selected>Masculino</option>";
											} else
												echo "<option name='gender' value='F' readonly='readonly' selected>Femenino</option>"
											?>
										</select>
									</div>
								</div>
								<!-- <div class="input">
                            <div class="campo">
                                <div class="icon">
                                    <img src="images/icons/profile.svg" alt="">
                                </div>
                                <input type="text" name="nacionalidad" value="<?php echo $nacionalidad; ?>"
                                readonly="readonly">
                            </div>
                        </div> -->
							</div>
							<div class="img-formulario">
								<div class="titulo-form">
									<h3>Información Personal</h3>
								</div>
							</div>
							<div class="colum-second">
								<div class="input">
									<div class="campo">
										<div class="icon">
											<i class="fas fa-birthday-cake"></i>
										</div>
										<input type="date" class="fecha_nacimiento" name="fecha_nacimiento" id="fecha_nacimiento" value="" required>
									</div>
								</div>
								<div class="input">
									<div class="campo">
										<div class="icon">
											<i class="fas fa-flag"></i>
										</div>
										<!-- <input type="text" name="pais_reside" id="pais" value="" placeholder="País donde vive" > -->
										<select name="pais_reside" id="pais" required>
											<option value="" id="AF">PAÍS DONDE VIVE</option>
                                            <option value="AFGANISTÁN" id="AF">AFGANISTÁN</option>
                                            <option value="ALBANIA" id="AL">ALBANIA</option>
                                            <option value="ALEMANIA" id="DE">ALEMANIA</option>
                                            <option value="ANDORRA" id="AD">ANDORRA</option>
                                            <option value="ANGOLA" id="AO">ANGOLA</option>
                                            <option value="ANGUILA" id="AI">ANGUILA</option>
                                            <option value="ANTÁRTidA" id="AQ">ANTÁRTidA</option>
                                            <option value="ANTIGUA Y BARBUDA" id="AG">ANTIGUA Y BARBUDA</option>
                                            <option value="ANTILLAS HOLANDESAS" id="AN">ANTILLAS HOLANDESAS</option>
                                            <option value="ARABIA SAUDÍ" id="SA">ARABIA SAUDÍ</option>
                                            <option value="ARGELIA" id="DZ">ARGELIA</option>
                                            <option value="ARGENTINA" id="AR">ARGENTINA</option>
                                            <option value="ARMENIA" id="AM">ARMENIA</option>
                                            <option value="ARUBA" id="AW">ARUBA</option>
                                            <option value="AUSTRALIA" id="AU">AUSTRALIA</option>
                                            <option value="AUSTRIA" id="AT">AUSTRIA</option>
                                            <option value="AZERBAIYÁN" id="AZ">AZERBAIYÁN</option>
                                            <option value="BAHAMAS" id="BS">BAHAMAS</option>
                                            <option value="BAHREIN" id="BH">BAHREIN</option>
                                            <option value="BANGLADESH" id="BD">BANGLADESH</option>
                                            <option value="BARBADOS" id="BB">BARBADOS</option>
                                            <option value="BÉLGICA" id="BE">BÉLGICA</option>
                                            <option value="BELICE" id="BZ">BELICE</option>
                                            <option value="BENÍN" id="BJ">BENÍN</option>
                                            <option value="BERMUDAS" id="BM">BERMUDAS</option>
                                            <option value="BHUTÁN" id="BT">BHUTÁN</option>
                                            <option value="BIELORRUSIA" id="BY">BIELORRUSIA</option>
                                            <option value="BIRMANIA" id="MM">BIRMANIA</option>
                                            <option value="BOLIVIA" id="BO">BOLIVIA</option>
                                            <option value="BOSNIA Y HERZEGOVINA" id="BA">BOSNIA Y HERZEGOVINA</option>
                                            <option value="BOTSUANA" id="BW">BOTSUANA</option>
                                            <option value="BRASIL" id="BR">BRASIL</option>
                                            <option value="BRUNEI" id="BN">BRUNEI</option>
                                            <option value="BULGARIA" id="BG">BULGARIA</option>
                                            <option value="BURKINA FASO" id="BF">BURKINA FASO</option>
                                            <option value="BURUNDI" id="BI">BURUNDI</option>
                                            <option value="CABO VERDE" id="CV">CABO VERDE</option>
                                            <option value="CAMBOYA" id="KH">CAMBOYA</option>
                                            <option value="CAMERÚN" id="CM">CAMERÚN</option>
                                            <option value="CANADÁ" id="CA">CANADÁ</option>
                                            <option value="CHAD" id="TD">CHAD</option>
                                            <option value="CHILE" id="CL">CHILE</option>
                                            <option value="CHINA" id="CN">CHINA</option>
                                            <option value="CHIPRE" id="CY">CHIPRE</option>
                                            <option value="CIUDAD DEL VATICANO" id="VA">CIUDAD DEL VATICANO</option>
                                            <option value="COLOMBIA" id="CO">COLOMBIA</option>
                                            <option value="COMORES" id="KM">COMORES</option>
                                            <option value="CONGO" id="CG">CONGO</option>
                                            <option value="COREA" id="KR">COREA</option>
                                            <option value="COREA DEL NORTE" id="KP">COREA DEL NORTE</option>
                                            <option value="COSTA DEL MARFÍL" id="CI">COSTA DEL MARFÍL</option>
                                            <option value="COSTA RICA" id="CR">COSTA RICA</option>
                                            <option value="CROACIA" id="HR">CROACIA</option>
                                            <option value="CUBA" id="CU">CUBA</option>
                                            <option value="DINAMARCA" id="DK">DINAMARCA</option>
                                            <option value="DJIBOURI" id="DJ">DJIBOURI</option>
                                            <option value="DOMINICA" id="DM">DOMINICA</option>
                                            <option value="ECUADOR" id="EC">ECUADOR</option>
                                            <option value="EGIPTO" id="EG">EGIPTO</option>
                                            <option value="EL SALVADOR" id="SV">EL SALVADOR</option>
                                            <option value="EMIRATOS ARABES UNidOS" id="AE">EMIRATOS ARABES UNidOS</option>
                                            <option value="ERITREA" id="ER">ERITREA</option>
                                            <option value="ESLOVAQUIA" id="SK">ESLOVAQUIA</option>
                                            <option value="ESLOVENIA" id="SI">ESLOVENIA</option>
                                            <option value="ESPAÑA" id="ES">ESPAÑA</option>
                                            <option value="ESTADOS UNidOS" id="US">ESTADOS UNidOS</option>
                                            <option value="ESTONIA" id="EE">ESTONIA</option>
                                            <option value="C" id="ET">ETIOPÍA</option>
                                            <!-- <option value="EX-REP. YUGOSLAVA DE MACEDONIA" id="MK">EX-REP. YUGOSLAVA DE MACEDONIA</option> -->
                                            <option value="FILIPINAS" id="PH">FILIPINAS</option>
                                            <option value="FINLANDIA" id="FI">FINLANDIA</option>
                                            <option value="FRANCIA" id="FR">FRANCIA</option>
                                            <option value="GABÓN" id="GA">GABÓN</option>
                                            <option value="GAMBIA" id="GM">GAMBIA</option>
                                            <option value="GEORGIA" id="GE">GEORGIA</option>
                                            <!-- <option value="GEORGIA DEL SUR Y LAS ISLAS SANDWICH DEL SUR" id="GS">GEORGIA DEL SUR Y LAS ISLAS SANDWICH DEL SUR</option> -->
                                            <option value="GHANA" id="GH">GHANA</option>
                                            <option value="GIBRALTAR" id="GI">GIBRALTAR</option>
                                            <option value="GRANADA" id="GD">GRANADA</option>
                                            <option value="GRECIA" id="GR">GRECIA</option>
                                            <option value="GROENLANDIA" id="GL">GROENLANDIA</option>
                                            <option value="GUADALUPE" id="GP">GUADALUPE</option>
                                            <option value="GUAM" id="GU">GUAM</option>
                                            <option value="GUATEMALA" id="GT">GUATEMALA</option>
                                            <option value="GUAYANA" id="GY">GUAYANA</option>
                                            <option value="GUAYANA FRANCESA" id="GF">GUAYANA FRANCESA</option>
                                            <option value="GUINEA" id="GN">GUINEA</option>
                                            <option value="GUINEA ECUATORIAL" id="GQ">GUINEA ECUATORIAL</option>
                                            <option value="GUINEA-BISSAU" id="GW">GUINEA-BISSAU</option>
                                            <option value="HAITÍ" id="HT">HAITÍ</option>
                                            <option value="HOLANDA" id="NL">HOLANDA</option>
                                            <option value="HONDURAS" id="HN">HONDURAS</option>
                                            <option value="HONG KONG R. A. E" id="HK">HONG KONG R. A. E</option>
                                            <option value="HUNGRÍA" id="HU">HUNGRÍA</option>
                                            <option value="INDIA" id="IN">INDIA</option>
                                            <option value="INDONESIA" id="id">INDONESIA</option>
                                            <option value="IRAK" id="IQ">IRAK</option>
                                            <option value="IRÁN" id="IR">IRÁN</option>
                                            <option value="IRLANDA" id="IE">IRLANDA</option>
                                            <option value="ISLA BOUVET" id="BV">ISLA BOUVET</option>
                                            <option value="ISLA CHRISTMAS" id="CX">ISLA CHRISTMAS</option>
                                            <!-- <option value="ISLA HEARD E ISLAS MCDONALD" id="HM">ISLA HEARD E ISLAS MCDONALD</option> -->
                                            <option value="ISLANDIA" id="IS">ISLANDIA</option>
                                            <option value="ISLAS CAIMÁN" id="KY">ISLAS CAIMÁN</option>
                                            <option value="ISLAS COOK" id="CK">ISLAS COOK</option>
                                            <option value="ISLAS DE COCOS O KEELING" id="CC">ISLAS DE COCOS O KEELING</option>
                                            <option value="ISLAS FAROE" id="FO">ISLAS FAROE</option>
                                            <option value="ISLAS FIYI" id="FJ">ISLAS FIYI</option>
                                            <!-- <option value="ISLAS MALVINAS ISLAS FALKLAND" id="FK">ISLAS MALVINAS ISLAS FALKLAND</option> -->
                                            <option value="ISLAS MARIANAS DEL NORTE" id="MP">ISLAS MARIANAS DEL NORTE</option>
                                            <option value="ISLAS MARSHALL" id="MH">ISLAS MARSHALL</option>
                                            <option value="ISLAS MENORES DE ESTADOS UNidOS" id="UM">ISLAS MENORES DE USA</option>
                                            <option value="ISLAS PALAU" id="PW">ISLAS PALAU</option>
                                            <option value="ISLAS SALOMÓN" D="SB">ISLAS SALOMÓN</option>
                                            <option value="ISLAS TOKELAU" id="TK">ISLAS TOKELAU</option>
                                            <option value="ISLAS TURKS Y CAICOS" id="TC">ISLAS TURKS Y CAICOS</option>
                                            <option value="ISLAS VÍRGENES EE.UU." id="VI">ISLAS VÍRGENES EE.UU.</option>
                                            <option value="ISLAS VÍRGENES REINO UNidO" id="VG">ISLAS VÍRGENES UK</option>
                                            <option value="ISRAEL" id="IL">ISRAEL</option>
                                            <option value="ITALIA" id="IT">ITALIA</option>
                                            <option value="JAMAICA" id="JM">JAMAICA</option>
                                            <option value="JAPÓN" id="JP">JAPÓN</option>
                                            <option value="JORDANIA" id="JO">JORDANIA</option>
                                            <option value="KAZAJISTÁN" id="KZ">KAZAJISTÁN</option>
                                            <option value="KENIA" id="KE">KENIA</option>
                                            <option value="KIRGUIZISTÁN" id="KG">KIRGUIZISTÁN</option>
                                            <option value="KIRIBATI" id="KI">KIRIBATI</option>
                                            <option value="KUWAIT" id="KW">KUWAIT</option>
                                            <option value="LAOS" id="LA">LAOS</option>
                                            <option value="LESOTO" id="LS">LESOTO</option>
                                            <option value="LETONIA" id="LV">LETONIA</option>
                                            <option value="LÍBANO" id="LB">LÍBANO</option>
                                            <option value="LIBERIA" id="LR">LIBERIA</option>
                                            <option value="LIBIA" id="LY">LIBIA</option>
                                            <option value="LIECHTENSTEIN" id="LI">LIECHTENSTEIN</option>
                                            <option value="LITUANIA" id="LT">LITUANIA</option>
                                            <option value="LUXEMBURGO" id="LU">LUXEMBURGO</option>
                                            <option value="MACAO R. A. E" id="MO">MACAO R. A. E</option>
                                            <option value="MADAGASCAR" id="MG">MADAGASCAR</option>
                                            <option value="MALASIA" id="MY">MALASIA</option>
                                            <option value="MALAWI" id="MW">MALAWI</option>
                                            <option value="MALDIVAS" id="MV">MALDIVAS</option>
                                            <option value="MALÍ" id="ML">MALÍ</option>
                                            <option value="MALTA" id="MT">MALTA</option>
                                            <option value="MARRUECOS" id="MA">MARRUECOS</option>
                                            <option value="MARTINICA" id="MQ">MARTINICA</option>
                                            <option value="MAURICIO" id="MU">MAURICIO</option>
                                            <option value="MAURITANIA" id="MR">MAURITANIA</option>
                                            <option value="MAYOTTE" id="YT">MAYOTTE</option>
                                            <option value="MÉXICO" id="MX">MÉXICO</option>
                                            <option value="MICRONESIA" id="FM">MICRONESIA</option>
                                            <option value="MOLDAVIA" id="MD">MOLDAVIA</option>
                                            <option value="MÓNACO" id="MC">MÓNACO</option>
                                            <option value="MONGOLIA" id="MN">MONGOLIA</option>
                                            <option value="MONTSERRAT" id="MS">MONTSERRAT</option>
                                            <option value="MOZAMBIQUE" id="MZ">MOZAMBIQUE</option>
                                            <option value="NAMIBIA" id="NA">NAMIBIA</option>
                                            <option value="NAURU" id="NR">NAURU</option>
                                            <option value="NEPAL" id="NP">NEPAL</option>
                                            <option value="NICARAGUA" id="NI">NICARAGUA</option>
                                            <option value="NÍGER" id="NE">NÍGER</option>
                                            <option value="NIGERIA" id="NG">NIGERIA</option>
                                            <option value="NIUE" id="NU">NIUE</option>
                                            <option value="NORFOLK" id="NF">NORFOLK</option>
                                            <option value="NORUEGA" id="NO">NORUEGA</option>
                                            <option value="NUEVA CALEDONIA" id="NC">NUEVA CALEDONIA</option>
                                            <option value="NUEVA ZELANDA" id="NZ">NUEVA ZELANDA</option>
                                            <option value="OMÁN" id="OM">OMÁN</option>
                                            <option value="PANAMÁ" id="PA">PANAMÁ</option>
                                            <option value="PAPUA NUEVA GUINEA" id="PG">PAPUA NUEVA GUINEA</option>
                                            <option value="PAQUISTÁN" id="PK">PAQUISTÁN</option>
                                            <option value="PARAGUAY" id="PY">PARAGUAY</option>
                                            <option value="PERÚ" id="PE">PERÚ</option>
                                            <option value="PITCAIRN" id="PN">PITCAIRN</option>
                                            <option value="POLINESIA FRANCESA" id="PF">POLINESIA FRANCESA</option>
                                            <option value="POLONIA" id="PL">POLONIA</option>
                                            <option value="PORTUGAL" id="PT">PORTUGAL</option>
                                            <option value="PUERTO RICO" id="PR">PUERTO RICO</option>
                                            <option value="QATAR" id="QA">QATAR</option>
                                            <option value="REINO UNidO" id="UK">REINO UNidO</option>
                                            <option value="REPUBLICA CENTROAFRICANA" id="CF">REP. CENTROAFRICANA</option>
                                            <option value="REPUBLICA CHECA" id="CZ">REP. CHECA</option>
                                            <option value="REPUBLICA DE SUDÁFRICA" id="ZA">REP. DE SUDÁFRICA</option>
                                            <!-- <option value="REPUBLICA DEMOCRÁTICA DEL CONGO ZAIRE" id="CD">REP. DEMOCRÁTICA DEL CONGO ZAIRE</option> -->
                                            <option value="REPUBLICA DOMINICANA" id="DO">REP. DOMINICANA</option>
                                            <option value="REUNIÓN" id="RE">REUNIÓN</option>
                                            <option value="RUANDA" id="RW">RUANDA</option>
                                            <option value="RUMANIA" id="RO">RUMANIA</option>
                                            <option value="RUSIA" id="RU">RUSIA</option>
                                            <option value="SAMOA" id="WS">SAMOA</option>
                                            <option value="SAMOA OCCidENTAL" id="AS">SAMOA OCCidENTAL</option>
                                            <option value="SAN KITTS Y NEVIS" id="KN">SAN KITTS Y NEVIS</option>
                                            <option value="SAN MARINO" id="SM">SAN MARINO</option>
                                            <option value="SAN PIERRE Y MIQUELON" id="PM">SAN PIERRE Y MIQUELON</option>
                                            <!-- <option value="SAN VICENTE E ISLAS GRANADINAS" id="VC">SAN VICENTE E ISLAS GRANADINAS</option> -->
                                            <option value="SANTA HELENA" id="SH">SANTA HELENA</option>
                                            <option value="SANTA LUCÍA" id="LC">SANTA LUCÍA</option>
                                            <option value="SANTO TOMÉ Y PRÍNCIPE" id="ST">SANTO TOMÉ Y PRÍNCIPE</option>
                                            <option value="SENEGAL" id="SN">SENEGAL</option>
                                            <option value="SERBIA Y MONTENEGRO" id="YU">SERBIA Y MONTENEGRO</option>
                                            <option value="SYCHELLES" id="SC">SEYCHELLES</option>
                                            <option value="SIERRA LEONA" id="SL">SIERRA LEONA</option>
                                            <option value="SINGAPUR" id="SG">SINGAPUR</option>
                                            <option value="SIRIA" id="SY">SIRIA</option>
                                            <option value="SOMALIA" id="SO">SOMALIA</option>
                                            <option value="SRI LANKA" id="LK">SRI LANKA</option>
                                            <option value="SUAZILANDIA" id="SZ">SUAZILANDIA</option>
                                            <option value="SUDÁN" id="SD">SUDÁN</option>
                                            <option value="SUECIA" id="SE">SUECIA</option>
                                            <option value="SUIZA" id="CH">SUIZA</option>
                                            <option value="SURINAM" id="SR">SURINAM</option>
                                            <option value="SVALBARD" id="SJ">SVALBARD</option>
                                            <option value="TAILANDIA" id="TH">TAILANDIA</option>
                                            <option value="TAIWÁN" id="TW">TAIWÁN</option>
                                            <option value="TANZANIA" id="TZ">TANZANIA</option>
                                            <option value="TAYIKISTÁN" id="TJ">TAYIKISTÁN</option>
                                            <!-- <option value="TERRITORIOS BRITÁNICOS DEL OCÉANO INDICO" id="IO">TERRITORIOS BRITÁNICOS DEL OCÉANO INDICO</option>
                                            <option value="TERRITORIOS FRANCESES DEL SUR" id="TF">TERRITORIOS FRANCESES DEL SUR</option> -->
                                            <option value="TIMOR ORIENTAL" id="TP">TIMOR ORIENTAL</option>
                                            <option value="TOGO" id="TG">TOGO</option>
                                            <option value="TONGA" id="TO">TONGA</option>
                                            <option value="TRINidAD Y TOBAGO" id="TT">TRINidAD Y TOBAGO</option>
                                            <option value="TÚNEZ" id="TN">TÚNEZ</option>
                                            <option value="TURKMENISTÁN" id="TM">TURKMENISTÁN</option>
                                            <option value="TURQUÍA" id="TR">TURQUÍA</option>
                                            <option value="TUVALU" id="TV">TUVALU</option>
                                            <option value="UCRANIA" id="UA">UCRANIA</option>
                                            <option value="UGANDA" id="UG">UGANDA</option>
                                            <option value="URUGUAY" id="UY">URUGUAY</option>
                                            <option value="UZBEKISTÁN" id="UZ">UZBEKISTÁN</option>
                                            <option value="VANUATU" id="VU">VANUATU</option>
                                            <option value="VENEZUELA" id="VE">VENEZUELA</option>
                                            <option value="VIETNAM" id="VN">VIETNAM</option>
                                            <option value="WALLIS Y FUTUNA" id="WF">WALLIS Y FUTUNA</option>
                                            <option value="YEMEN" id="YE">YEMEN</option>
                                            <option value="ZAMBIA" id="ZM">ZAMBIA</option>
                                            <option value="ZIMBABUE" id="ZW">ZIMBABUE</option>
										</select>
									</div>
								</div>
							</div>
							<div class="colum-second">
								<div class="input">
									<div class="campo">
										<div class="icon">
											<i class="fas fa-city"></i>
										</div>
										<input type="text" name="ciudad" id="ciudad" value="" placeholder="Ciudad donde vive o vivirá" required>
									</div>
								</div>
								<div class="input">
									<div class="campo">
										<div class="icon">
											<i class="fas fa-map-marker-alt"></i>
										</div>
										<input type="text" name="direccion" id="direccion" value="" placeholder="Dirección" required>
									</div>
								</div>
							</div>

							<div class="colum-second">
								<div class="input">
									<div class="campo">
										<div class="icon">
											<i class="fas fa-envelope"></i>
										</div>
										<input type="email" name="email" id="correo" value="" placeholder="Email" required>
									</div>
								</div>
								<div class="input">
									<div class="campo">
										<div class="icon">

											<i class="fas fa-envelope"></i>
										</div>
										<input type="email" name="correo1" id="correo1" value="" placeholder="Email">
									</div>
								</div>
							</div>
							<div class="colum-second">
								<div class="input">
									<div class="campo">
										<div class="icon">
											<i class="fas fa-envelope"></i>
										</div>
										<input type="email" name="correo2" id="correo2" value="" placeholder="Email">
									</div>
								</div>
								<div class="input">
									<div class="campo">
										<div class="icon">
											<i class="fas fa-mobile-alt"></i>
										</div>
										<input type="tel" name="movil" id="celular" value="" placeholder="Ej. +504.." required>
									</div>
								</div>
							</div>

							<div class="colum-second">
								<div class="input">
									<div class="campo">
										<div class="icon">

											<i class="fas fa-phone"></i>
										</div>
										<input type="tel" name="telefono" id="telefono" value="" placeholder="Teléfono">
									</div>
								</div>
								<div class="input">
									<div class="campo">
										<div class="icon">
											<i class="fas fa-building"></i>
										</div>
										<input type="tel" name="empresa_labora" id="empresaLabora" value="" placeholder="Empresa donde laborará">
									</div>
								</div>
							</div>

							<div class="colum-second">
								<div class="input">
									<div class="campo">
										<div class="icon">
											<i class="fas fa-briefcase"></i>
										</div>
										<input type="text" name="rubros" value="" id="rubroEmpresaLabora" placeholder="Rubro de la empresa donde labora">
									</div>
								</div>
								<div class="input">
									<div class="campo">
										<div class="icon">
											<i class="fas fa-atom"></i>
										</div>
										<input type="text" name="area_interes" value="" id="areasInteres" placeholder="Área de su interés">
									</div>
								</div>
							</div>
							<div class="colum-second">
								<div class="input" style="width: 100% !important;">
									<div class="campo" style="width: 100% !important;margin-bottom: 0;">
										<div class="icon">
											<i class="fab fa-linkedin"></i>
										</div>
										<input type="url" name="url_linkedin" id="url_linkedin" value="" placeholder="https://www.linkedin.com/">
									</div>
								</div>
							</div>

							<div class="img-formulario">
								<div class="titulo-form">
									<h3>Información Académica</h3>
								</div>
							</div>
							<div class="titulos">
								<p>Título Obtenido: <strong><?php echo $titulo; ?></strong></p>
								<?php echo $tituloPrograma; ?>
								<p <?php echo $viewOrientation ?>>Orientación: <strong><?php echo $orientacion; ?></strong></p>
								<input type="hidden" name="programa" id="programa" value="<?php echo $programa; ?>">
								<input type="hidden" name="orientacion" id="orientacion" value="<?php echo $orientacion; ?>" readonly="readonly">
							</div>
							<div class="colum-second">
								<div class="input">
									<div class="campo">
										<div class="icon">
											<i class="fas fa-building"></i>
										</div>
										<input type="text" name="lugar_pasantia" value="<?php echo $lugar_pasantia; ?>" id="empresaPasantia" placeholder="Empresa Pasantía" required>
									</div>
								</div>
								<div class="input">
									<div class="campo">
										<div class="icon">
											<i class="fas fa-map-marker-alt"></i>
										</div>
										<input type="text" name="direccion_pasantia" value="<?php echo $direccion_pasantia; ?>" id="direccionEmpresaPasantia" placeholder="Dirección de Empresa" required>
									</div>
								</div>
							</div>

							<div class="colum-second">
								<div class="input">
									<div class="campo">
										<div class="icon">
											<i class="fas fa-briefcase"></i>
										</div>
										<input type="text" name="rubro_empresa_pasantia" value="<?php echo $rubro_empresa_pasantia; ?>" id="rubroEmpresaPasantia" placeholder="Rubro de la empresa de pasantía" required>
									</div>
								</div>
								<div class="input">
									<div class="campo">
										<div class="icon">
											<i class="fas fa-align-left"></i>
										</div>
										<input type="text" name="exp_pasantia" minlength="15" value="<?php echo $exp_pasantia; ?>" id="experienciaPasantia" placeholder="Experiencia en Pasantía" required>
									</div>
								</div>
							</div>

							<div class="colum-second">
								<div class="input">
									<div class="campo">
										<div class="icon">
											<i class="fas fa-atom"></i>
										</div>
										<input type="text" name="area_investigacion" value="<?php echo $area_investigacion; ?>" id="areaInvestigacionPasantia" placeholder=" Área de investigación pasantía" required>
									</div>
								</div>
								<div class="input">
									<div class="campo">
										<div class="icon">
											<i class="fas fa-user"></i>
										</div>
										<input type="text" name="asesor_tesis" value="<?php echo $asesor_tesis; ?>" id="asesorTesis" placeholder="Asesor de Tesis" required>
									</div>
								</div>
							</div>
							<div class="colum-second">
								<div class="input" style="width: 100% !important;">
									<div class="campo" style="width: 100% !important;margin-bottom: 0;">
										<div class="icon">
											<i class="fas fa-file-alt"></i>
										</div>
										<input type="text" name="titulo_tesis" value="<?php echo $titulo_tesis; ?>" id="tituloTesis" placeholder="Título del proyecto de graduación" required>
									</div>
								</div>
								<div class="input" style="width: 100% !important">
									<!-- <p>
										Buscar URL de Tesis aquí <a href="https://bdigital.zamorano.edu/simple-search?location=%2F&query=<?php echo $primer_apellido; ?>+<?php echo $first_name; ?>&rpp=10&sort_by=score&order=desc" target="_blank"> Bdigital:</a><br>
									</p> -->
									<div class="campo" style="width: 100% !important;margin-bottom: 0;">
										<!-- <div class="icon">
											<i class="fas fa-link"></i>
										</div> -->
										<input type="hidden" name="url_tesis" value="<?php echo $url_tesis; ?>" id="urlTesis" placeholder="URL Tesis">
									</div>
								</div>
							</div>
							<div class="colum-second">
								<div class="input" style="width: 100% !important">
									<p>
										*Estudios Zamorano Financiados por:
									</p>
									<div class="campo" style="width: 100% !important;">
										<!-- <div class="icon">
											<i class="fas fa-hand-holding-usd"></i>
										</div> -->
										<input type="hidden" name="financiado_por" value="<?php echo $financiado_por; ?>" id="financiado" readonly='readonly' placeholder="Financiado por">
									</div>
								</div>
							</div>
							<div class="colum-second">
								<div class="input" style="width: 100% !important">
									<div class="campo" style="width: 100% !important;width: 100% !important;display:flex;justify-content: center;flex-wrap: wrap;">
										<?php
										$fondozamo = $fondos_zamorano == 1 ? 'checked' : ''; ?>
										<input type='checkbox' name='fondos_zamorano' id="fondos_zamorano" onclick="chequeado('fondos_zamorano')" value='<?php echo $fondos_zamorano; ?>' <?php echo $fondozamo; ?> checked>
										<label for='fondos_zamorano'>ZAMORANO</label>
										<?php
										$fondopropio = $fondos_propios == 1 ? 'checked' : ''; ?>
										<input type='checkbox' name='fondos_propios' id="fondos_propios" onclick="chequeado('fondos_propios')" value='<?php echo $fondos_propios; ?>' <?php echo $fondopropio; ?>>
										<label for='fondos_propios'>Fondos Propios</label>

										<?php
										$fondoenti = $fondos_entidades ? 'checked' : '';
										?>
										<input type='checkbox' name='fondos_entidades' id='fondos_entidades' value='<?php echo $fondos_entidades; ?>' onclick='entidades()'>
										<label for='fondos_entidades'>Otras Entidades</label>
									</div>
								</div>
								<div class='input' style='width: 100% !important;display:none;' id='endidades'>
									<div class='campo' style='width: 100% !important;'>
										<div class='icon'>
											<i class='fas fa-hand-holding-usd'></i>
										</div>
										<input type='text' name='otras_entidades' id='otras_entidades' value='<?php echo $otras_entidades; ?>' placeholder='Mencione que Entidades'>
									</div>
								</div>
							</div>
							<div class="campo enviar registro">
								<div class="boton-registro">
									<input type="hidden" id="tipo" value="solicitud">
									<input type="submit" value="Crear Perfil" name="update">
								</div>

							</div>
							<div class="colum-second">
								
									<p>
										( * )Campos Obligatorios
									</p>
								
							</div>
						</form>
					</div>
			<?php
				}
			}
			?>
		</div>
	</div>
</div>
<?php
include 'includes/templates/footer.php';
?>
