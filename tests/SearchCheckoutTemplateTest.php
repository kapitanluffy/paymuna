<?php

include __DIR__ . '/../vendor/autoload.php';

use kapitanluffy\Paymuna\Paymuna;

$id = "aff31ffe69075180533cd0f078004f4e";
$secret = "c581dbb29c41c84d85a9a9bac851f2b8";
$api = new Paymuna($id, $secret);

try {
    $templates = $api->searchCheckoutTemplate(['checkout_default' => 1]);

    foreach ($templates as $tpl) {
        echo $tpl->reference() . "\n";
    }
} catch (\Exception $e) {
    var_dump($e->getMessage());
}

