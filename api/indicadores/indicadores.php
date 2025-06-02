<?php
header('Content-Type: application/json');
error_reporting(E_ALL);
ini_set('display_errors', 1);

try {
    $url = "https://mindicador.cl/api";
    
    // Usamos cURL
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    
    $json = curl_exec($ch);

    if (curl_errno($ch)) {
        throw new Exception("Error al llamar a la API: " . curl_error($ch));
    }

    curl_close($ch);

    $datos = json_decode($json, true);

    $resultado = [
        'dolar' => $datos['dolar']['valor'],
        'uf'    => $datos['uf']['valor'],
        'utm'   => $datos['utm']['valor'],
        'euro'  => $datos['euro']['valor'],
    ];

    echo json_encode($resultado, JSON_UNESCAPED_UNICODE);

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'estado' => 'error',
        'mensaje' => $e->getMessage()
    ]);
}