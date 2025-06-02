<?php
require_once '../../conf/transbank_config.php';

use Transbank\Webpay\WebpayPlus\Transaction;

$token = $_GET['token_ws'] ?? null;

if ($token) {
    $response = (new Transaction)->commit($token);
    echo "<h2>Pago recibido</h2>";
    echo "<p>Estado: " . $response->getStatus() . "</p>";
    echo "<p>Orden: " . $response->getBuyOrder() . "</p>";
    echo "<p>Monto: $" . $response->getAmount() . "</p>";
} else {
    echo "Token no recibido.";
}
