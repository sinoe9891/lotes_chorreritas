<?php
/* Obtener todos las solicitudes de actualización */
function getAll($id = null) {
    include '../includes/conexion.php'; 
    try {
        return $conn->query("SELECT * FROM graduat3s WHERE ID = {$id} AND deceased = 1");

    } catch(Exception $e) {
        echo "Error! : " . $e->getMessage();
        return false;
    }
}