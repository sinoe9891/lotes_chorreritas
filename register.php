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
            <div class="caja-login">
                <div class="img-formulario">
                    <img src="images/icons/perfil.svg" alt="">
                    <div class="titulo-form">
                        <h3>Mi Cuenta</h3>
                    </div>
                </div>
                <div class="formulario">
                    <form id="formulario" method="post">
                        <div class="input">
                            <div class="campo">
                                <div class="icon">
                                    <img src="images/icons/profile.svg" alt="">
                                </div>
                                <input type="text" name="nombre" id="nombre" placeholder="Nombre Completo" required>
                            </div>
                        </div>
                        <div class="input">
                            <div class="campo">
                                <div class="icon">
                                    <img src="images/icons/email.svg" alt="">
                                </div>
                                <input type="email" name="correo" id="correo" placeholder="Email">
                            </div>
                        </div>
                        <div class="input">
                            <div class="campo">
                                <div class="icon">
                                    <img class="candado" id="candado" onclick="changeImage()" src="images/icons/candado.svg"
                                        alt="">
                                </div>
                                <input type="password" name="password" id="password" placeholder="Password" required>
                            </div>
                            <a href="login.php?cerrar_sesion=true">
                                <p>Iniciar sesión aquí</p>
                            </a>
                        </div>
                        <div class="campo enviar">
                            <input type="hidden" id="tipo" value="crear">
                            <input type="submit" class="boton" value="Crear Cuenta">
                        </div>
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
