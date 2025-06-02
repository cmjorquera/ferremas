<?php
require 'vendor/autoload.php';

use Transbank\Webpay\WebpayPlus\Options;

$options = new Options('597055555532', '123456789', 'TEST');
var_dump($options);
