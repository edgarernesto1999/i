<?php
class Conexion {
    private static $conexion;

    public static function getConexion() {
        if (!self::$conexion) {
            self::$conexion = new PDO('mysql:host=localhost;dbname=usuarios', 'root', '');
            self::$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$conexion;
    }
}
?>
