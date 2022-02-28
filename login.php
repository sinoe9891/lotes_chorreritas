<?php

session_start();
// echo session_id();

include 'includes/funciones.php';
include 'includes/templates/header.php';

if (isset($_GET['cerrar_sesion'])) {
    $_SESSION = array();
}

?>

    <div class="contenedor-formulario">
        <div class="logo">
            <img src="images/logo-direccion-02.png" alt="">
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
                        <div class="column-one">
                            <div class="input">
                                <div class="campo">
                                    <input type="hidden" name="nombre" id="nombre" placeholder="Nombre Completo">
                                </div>
                            </div>
                            <div class="input">
                                <div class="campo">
                                    <div class="icon">
                                        <img src="images/icons/profile.svg" alt="">
                                    </div>
                                    <input type="email" name="correo" id="correo" placeholder="Email">
                                </div>
                            </div>
                            <div class="input">
                                <div class="campo">
                                    <div class="icon">
                                        <img class="candado" id="candado" onclick="changeImage()"
                                        src="images/icons/candado.svg" alt="">
                                    </div>
                                    <input type="password" name="password" id="password" placeholder="Password">
                                </div>
                                <a href="#">
                                    <p>¿Has olvidado tu contraseña?</p>
                                </a>
                            </div>
                            <!-- <div class="campo">
                                <a href="crear-cuenta.html">Crea una cuenta nueva</a>
                            </div> -->
                        </div>
                        <div class="campo enviar">
                            <div class="boton-login">
                                <input type="hidden" id="tipo" value="login">
                                <input type="submit" class="boton" value="Ingresar">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php  
        include 'includes/templates/footer.php'; 
    ?>