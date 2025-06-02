<?php
session_start();
require_once('../../conf/database.php');

// Validar que se recibieron los datos
if (empty($_POST['email']) || empty($_POST['clave'])) {
    header("Location: ../../views/login.php?error=Debes ingresar correo y contraseña");
    exit;
}

$email = $_POST['email'];
$clave = $_POST['clave'];

// Consultar si el usuario existe
$stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = ? AND estado = 1 LIMIT 1");
$stmt->bind_param("s", $email);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows === 0) {
    header("Location: ../../views/login.php?error=El usuario no existe o está inactivo");
    exit;
}

$usuario = $resultado->fetch_assoc();

// Compara contraseña directamente (o usa password_verify si están encriptadas)
if ($clave !== $usuario['clave']) {
    header("Location: ../../views/login.php?error=Contraseña incorrecta");
    exit;
}

// Inicio de sesión correcto
$_SESSION['usuario'] = $usuario['usuario']; // o cualquier campo útil
header("Location: ../../views/dashboard.php");
exit;
?>
