<?php

include __DIR__ . '/../vendor/autoload.php';

use kapitanluffy\Paymuna\Paymuna;

$id = "aff31ffe69075180533cd0f078004f4e";
$secret = "c581dbb29c41c84d85a9a9bac851f2b8";
$api = new Paymuna($id, $secret);

try {
    $template = $api->getCheckoutTemplate("W71FTMVIY95B2371AF0DA3B");
    var_dump($template);
} catch (\Exception $e) {
    var_dump($e->getMessage());
}

