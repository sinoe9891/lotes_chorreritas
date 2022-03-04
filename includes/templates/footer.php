<footer>


</footer>
    <script src="js/sweetalert2.all.min.js"></script>
    <a href="#0" class="cd-top js-cd-top">Top</a>
    <script src="js/back-to-top.js"></script>

<?php  
    $actual = obtenerPaginaActual();
    if ($actual === 'register' || $actual === 'login') {
        echo '<script src="js/formulario.js"></script>';
    }elseif ($actual === 'index' || $actual === 'solicitudes' || $actual === 'graduates-list' || $actual === 'actualiza-tus-datos' || $actual === 'actualizar-graduado' || $actual === 'editar-bloque' || $actual === 'contrato' || $actual === 'birthday' || $actual === 'ver-notas-de-duelo' || $actual === 'exportar' || $actual === 'buscar-graduado' || $actual === 'graduandos' || $actual === 'graduandos-solicitudes' || $actual === 'ver-fichas') {
        echo '<script> console.log("No accede porque la ruta actual no corresponde");</script>';
        echo '<script src="js/validaciones.js"></script>';
    }else{
        echo '<script src="js/scripts.js"></script>';
    }
?>
</body>

</html>