<?php
require_once 'clases/conexion.php';
class Usuario {
    public static function autenticar($nombre, $apellido) {
        $db = Conexion::getConexion();
        $stmt = $db->prepare("SELECT * FROM roles WHERE nombre = ? AND apellido = ?");
        $stmt->execute([$nombre, $apellido]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>