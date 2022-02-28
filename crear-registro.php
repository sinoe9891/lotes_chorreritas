<?php
include 'includes/funciones.php';
include 'includes/sesiones.php';
include 'includes/conexion.php';
include 'includes/templates/header.php';
?>


<div class="contenedor">
    <div class="contenedor-index">
        <?php
                include 'includes/templates/nav.php';
            ?>
    </div>
</div>
<div class="contenedor-formulario">
    <div class="logo">
        <!-- <img src="images/logo-direccion-02.png" alt=""> -->
    </div>
    <div class="contenedor-login">
        <div class="caja-register">
            <div class="img-formulario">
                <img src="images/icons/perfil.svg" alt="">
                <div class="titulo-form">
                    <h3>Información de Registro</h3>
                </div>
            </div>
            <div class="formulario">
                <form id="formulario" method="post">
                    <div class="colum-second">
                        <div class="input">
                            <div class="campo">
                                <div class="icon">
                                    <img src="images/icons/profile.svg" alt="">
                                </div>
                                <input type="text" class="nombre" name="nombre" id="nombre" placeholder="Nombres">
                            </div>
                        </div>
                        <div class="input">
                            <div class="campo">
                                <div class="icon">
                                    <img src="images/icons/profile.svg" alt="">
                                </div>
                                <input type="text" class="apellidos" name="apellidos" id="apellidos"
                                    placeholder="Apellidos">
                            </div>
                        </div>
                    </div>
                    <div class="colum-second">
                        <div class="input">
                            <div class="campo">
                                <div class="icon">
                                    <img src="images/icons/profile.svg" alt="">
                                </div>
                                <input type="number" class="clase" name="clase" id="clase" placeholder="Clase"
                                    min="1946" max="2021">
                            </div>
                        </div>
                        <div class="input">
                            <div class="campo">
                                <div class="icon">
                                    <img src="images/icons/profile.svg" alt="">
                                </div>
                                <input type="text" class="codigo" name="codigo" id="codigo" placeholder="Código">
                            </div>
                        </div>
                    </div>
                    <div class="colum-second">
                        <div class="input">
                            <div class="campo">
                                <div class="icon">
                                    <img src="images/icons/profile.svg" alt="">
                                </div>
                                <input type="text" class="apodo" name="apodo" id="apodo" placeholder="Apodo">
                            </div>
                        </div>
                        <div class="input">
                            <div class="campo">
                                <div class="icon">
                                    <img src="images/icons/profile.svg" alt="">
                                </div>
                                <input type="text" class="nacionalidad" name="nacionalidad" id="nacionalidad"
                                    placeholder="Nacionalidad">
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
                                    <option value="M">Masculino</option>
                                    <option value="F">Femenino</option>
                                </select>
                            </div>
                        </div>
                        <!-- <div class="input">
                            <div class="campo">
                                <div class="icon">
                                    <img src="images/icons/profile.svg" alt="">
                                </div>
                                <input type="text" class="orientacion" name="orientacion" id="orientacion"
                                    placeholder="Orientación">
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
                                <input type="date" class="fechaNacimiento" name="fechaNacimiento" id="fechaNacimiento"
                                    placeholder="21/03/2000">
                            </div>
                        </div>
                        <div class="input">
                            <div class="campo">
                                <div class="icon">
                                    <i class="fas fa-flag"></i>
                                </div>
                                <input type="text" class="pais" name="pais" id="pais" placeholder="País donde vive">
                            </div>
                        </div>
                    </div>


                    <div class="colum-second">
                        <div class="input">
                            <div class="campo">
                                <div class="icon">
                                    <i class="fas fa-city"></i>
                                </div>
                                <input type="text" class="ciudad" name="ciudad" id="ciudad"
                                    placeholder="Ciudad donde vive">
                            </div>
                        </div>
                        <div class="input">
                            <div class="campo">
                                <div class="icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <input type="text" class="direccion" name="direccion" id="direccion"
                                    placeholder="Dirección">
                            </div>
                        </div>
                    </div>

                    <div class="colum-second">
                        <div class="input">
                            <div class="campo">
                                <div class="icon">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <input type="email" class="correo" name="correo" id="correo" placeholder="Email">
                            </div>
                        </div>
                        <div class="input">
                            <div class="campo">
                                <div class="icon">
                                    <i class="fas fa-mobile-alt"></i>
                                </div>
                                <input type="tel" class="celular" name="celular" id="celular" placeholder="Celular">
                            </div>
                        </div>
                    </div>

                    <div class="colum-second">
                        <div class="input">
                            <div class="campo">
                                <div class="icon">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <input type="tel" class="telefono" name="telefono" id="telefono" placeholder="Teléfono">
                            </div>
                        </div>
                        <div class="input">
                            <div class="campo">
                                <div class="icon">
                                    <i class="fas fa-building"></i>
                                </div>
                                <input type="text" class="empresaLabora" name="empresaLabora" id="empresaLabora"
                                    placeholder="Empresa donde labora">
                            </div>
                        </div>
                    </div>

                    <div class="colum-second">
                        <div class="input">
                            <div class="campo">
                                <div class="icon">
                                    <i class="fas fa-briefcase"></i>
                                </div>
                                <input type="text" class="rubroEmpresaLabora" name="rubroEmpresaLabora"
                                    id="rubroEmpresaLabora" placeholder="Rubro de la empresa donde labora">
                            </div>
                        </div>
                        <div class="input">
                            <div class="campo">
                                <div class="icon">
                                    <i class="fas fa-atom"></i>
                                </div>
                                <input type="text" class="areasInteres" name="areasInteres"
                                    id="areasInteres" placeholder="Área de interés">
                            </div>
                        </div>

                    </div>

                    <div class="colum-second">
                        <div class="input" style="width: 100% !important;">
                            <div class="campo" style="width: 100% !important;margin-bottom: 0;">
                                <div class="icon">
                                    <i class="fab fa-linkedin"></i>
                                </div>
                                <input type="url" class="linkedin" name="linkedin" id="linkedin"
                                    placeholder="Enlace Linkedin">
                            </div>
                        </div>
                    </div>

                    <div class="img-formulario">
                        <div class="titulo-form">
                            <h3>Información Académica</h3>
                        </div>
                    </div>
                    <div class="colum-second">
                        <div class="input" style="width: 100% !important;">
                            <div class="campo" style="width: 100% !important">
                                <div class="icon">
                                    <i class="fas fa-graduation-cap"></i>
                                </div>
                                <!-- <input type="text" class="titulo" name="titulo" id="titulo"
                                    placeholder="Título Obtenido"> -->
                                <select name="programa" id="programa">
                                    <option value="1">INGENIERO AGRÓNOMO 4X4 2002-<?php anoActual(); ?></option>
                                    <option value="2">INGENIERO EN AGROINDUSTRIA ALIMENTARIA 4X4
                                        2007-<?php anoActual(); ?></option>
                                    <option value="3">INGENIERO EN ADMINISTRACIÓN DE AGRONEGOCIOS 4X4
                                        2007-<?php anoActual(); ?></option>
                                    <option value="4">INGENIERO EN AMBIENTE Y DESARROLLO 4X4
                                        2013-<?php anoActual(); ?></option>
                                    <option value="5" disabled>INGENIERO EN DESARROLLO SOCIOECONÓMICO Y AMBIENTE 4X4 2002-2012
                                    </option>
                                    <option value="6" disabled>INGENIERO EN AGROINDUSTRIA 4X4 2002-2006</option>
                                    <option value="7" disabled>INGENIERO EN GESTIÓN DE AGRONEGOCIOS 4X4 2002-2006</option>
                                    <option value="8" disabled>AGRÓNOMO - PPIA</option>
                                    <option value="9" disabled>AGRÓNOMO - PIA</option>
                                    <option value="10" disabled>AGRÓNOMO 1946-2000</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="colum-second">
                        <div class="input">
                            <div class="campo">
                                <div class="icon">
                                    <i class="fas fa-building"></i>
                                </div>
                                <input type="text" class="empresaPasantia" name="empresaPasantia" id="empresaPasantia"
                                    placeholder="Empresa Pasantía">
                            </div>
                        </div>
                        <div class="input">
                            <div class="campo">
                                <div class="icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <input type="text" class="direccionEmpresaPasantia" name="direccionEmpresaPasantia"
                                    id="direccionEmpresaPasantia" placeholder="Dirección de Empresa">
                            </div>
                        </div>
                    </div>

                    <div class="colum-second">
                        <div class="input">
                            <div class="campo">
                                <div class="icon">
                                    <i class="fas fa-briefcase"></i>
                                </div>
                                <input type="text" class="rubroEmpresaPasantia" name="rubroEmpresaPasantia"
                                    id="rubroEmpresaPasantia" placeholder="Rubro de la empresa donde labora">
                            </div>
                        </div>
                        <div class="input">
                            <div class="campo">
                                <div class="icon">
                                    <i class="fas fa-align-left"></i>
                                </div>
                                <input type="text" class="experienciaPasantia" name="experienciaPasantia" min="50"
                                    id="experienciaPasantia" placeholder="Experiencia en Pasantía">
                            </div>
                        </div>
                    </div>

                    <div class="colum-second">
                        <div class="input">
                            <div class="campo">
                                <div class="icon">
                                    <i class="fas fa-atom"></i>
                                </div>
                                <input type="text" class="areaInvestigacionPasantia" name="areaInvestigacionPasantia"
                                    id="areaInvestigacionPasantia" placeholder="Área de investigación pasantía">
                            </div>
                        </div>
                        <div class="input">
                            <div class="campo">
                                <div class="icon">
                                    <i class="fas fa-user"></i>
                                </div>
                                <input type="text" class="asesorTesis" name="asesorTesis" id="asesorTesis"
                                    placeholder="Asesor de Tesis">
                            </div>
                        </div>

                    </div>

                    <div class="colum-second">
                        <div class="input" style="width: 100% !important;">
                            <div class="campo" style="width: 100% !important;margin-bottom: 0;">
                                <div class="icon">
                                    <i class="fas fa-file-alt"></i>
                                </div>
                                <input type="text" class="tituloTesis" name="tituloTesis" id="tituloTesis"
                                    placeholder="Título de Tesis">
                            </div>
                        </div>
                        <div class="input" style="width: 100% !important">
                            <p>
                                Buscar Tesis aquí <a
                                    href="https://bdigital.zamorano.edu/simple-search?location=%2F&query=<?php echo $primer_apellido; ?>+<?php echo $primer_nombre; ?>&rpp=10&sort_by=score&order=desc"
                                    target="_blank"> Bdigital:</a><br>
                            </p>
                            <div class="campo" style="width: 100% !important;margin-bottom: 0;">
                                <div class="icon">
                                    <i class="fas fa-link"></i>
                                </div>
                                <input type="url" class="urlTesis" name="urlTesis" id="urlTesis"
                                    placeholder="URL Tesis">
                            </div>
                        </div>
                    </div>
                    <div class="colum-second">
                        <div class="input" style="width: 100% !important;">
                            <p>
                                Estudios en ZAMORANO Financiados por:<br>
                            </p>
                            <div class="campo">
                                <div class="icon">
                                    <i class="fas fa-hand-holding-usd"></i>
                                </div>
                                <input type="text" class="financiado" name="financiado" id="financiado"
                                    placeholder="Financiado por">
                            </div>
                        </div>
                    </div>
                    <div class="campo enviar registro">
                        <div class="boton-registro">
                            <input type="hidden" id="tipo" value="crear">
                            <input type="submit" class="boton nuevo-registro" value="Crear Cuenta">
                        </div>
                    </div>
                    <!-- <i class="fab fa-accessible-icon"></i> -->
                    <!-- <div class="campo">
                                <a href="crear-cuenta.html">Crea una cuenta nueva</a>
                            </div> -->
                </form>
            </div>
        </div>
    </div>
</div>
<?php
        include 'includes/templates/footer.php';
?>