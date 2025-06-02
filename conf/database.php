<?php
$host = "localhost";
$user = "qaseduc_usuarioFerreteria";
$pass = "Ingeniero86#";
$dbname = "qaseduc_ferreteria";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Muy importante para acentos y ñ
$conn->set_charset("utf8");
?>
