<?php
session_start();
if ($_SESSION['rol'] !== 'estudiante') {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head><title>Estudiante</title></head>
<body>
<h2>Hola <?php echo $_SESSION['nombre'] . ' (' . $_SESSION['rol'] . ')'; ?></h2>
<a href="../cerrar.php">Cerrar sesión</a>
</body>
</html>
