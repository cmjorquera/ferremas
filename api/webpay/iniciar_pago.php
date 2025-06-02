<?php
require_once(__DIR__ . '/../../conf/transbank_config.php');

use Transbank\Webpay\WebpayPlus\Transaction;

$transaction = new Transaction($options);

// Parámetros mínimos: orderId, sessionId, amount, returnUrl
$response = $transaction->create(
    'ORDEN123456',                   // orderId
    uniqid(),                        // sessionId
    10000,                           // amount en pesos
    'https://qa.seduc.cl/FERREMAS/opcion3/api/webpay/respuesta.php' // returnUrl (ajústalo)

);

// Muestra la URL de redirección de Webpay
echo "Redirige al cliente a: " . $response->getUrl() . " con token: " . $response->getToken();



