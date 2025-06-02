<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Transbank\Webpay\Options;
use Transbank\Webpay\WebpayPlus\Transaction;

// Configura tus credenciales (usa las de integración)
$commerceCode = '597055555532';
$apiKey = '123456789';
$integrationType = 'TEST';

$options = new Options($commerceCode, $apiKey, $integrationType);
$transaction = new Transaction($options);
