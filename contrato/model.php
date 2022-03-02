<?php
/* Obtener todos las solicitudes de actualización */
function getAll($id = null) {
    include '../includes/conexion.php'; 
    try {
        return $conn->query("SELECT * FROM ficha_directorio WHERE id = {$id}");

    } catch(Exception $e) {
        echo "Error! : " . $e->getMessage();
        return false;
    }
}