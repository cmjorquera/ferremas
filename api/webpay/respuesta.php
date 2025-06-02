<?php
require_once(__DIR__ . '/../conf/transbank_config.php');

use Transbank\Webpay\WebpayPlus\Transaction;

if (!isset($_POST['token_ws'])) {
    echo "Error: token_ws no recibido.";
    exit;
}

$token = $_POST['token_ws'];

try {
    $response = (new Transaction())->commit($token);

    echo "<h2>Pago exitoso</h2>";
    echo "<p>Monto: {$response->getAmount()}</p>";
    echo "<p>Orden de compra: {$response->getBuyOrder()}</p>";
    echo "<p>Código de autorización: {$response->getAuthorizationCode()}</p>";
    echo "<p>Tipo de pago: {$response->getPaymentTypeCode()}</p>";
    echo "<p>Últimos dígitos tarjeta: {$response->getCardDetail()['card_number']}</p>";

} catch (Exception $e) {
    echo "<h2>Error al procesar la transacción</h2>";
    echo "<p>{$e->getMessage()}</p>";
}
