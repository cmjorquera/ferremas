<?php
$host = "localhost";
$user = "qaseduc_usuarioFerreteria";
$pass = "Ingeniero86#";
$dbname = "qaseduc_ferreteria";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Error de conexi��n: " . $conn->connect_error);
}

// Muy importante para acentos y �0�9
$conn->set_charset("utf8");
?>
