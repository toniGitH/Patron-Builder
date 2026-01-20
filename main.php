<?php

require_once 'vendor/autoload.php';

use App\Client\ComputerShop;

/**
 * Lógica de fabricación de products (Cliente ComputerShop)
 */
$shop = new ComputerShop();
$products = [];

// --- PEDIDO 1: MacBook Pro ---
// Venta del ordenador al cliente
$computerMac = $shop->sellComputer('macBookPro');
// Generación del manual del usuario
$manualMac   = $shop->generateManual('macBookPro');
// Generación de la factura
$invoiceMac  = $shop->generateInvoice('macBookPro');

// Guardamos para el visualizador (sólo para visualización de resultados)
$products[] = [
    'name'     => 'macBookPro',
    'computer' => $computerMac,
    'manual'   => $manualMac,
    'invoice'  => $invoiceMac
];

// --- PEDIDO 2: Gaming Pro ---
// Venta del ordenador a un cliente
$computerGaming = $shop->sellComputer('gamingPro');
// Generación del manual del usuario
$manualGaming   = $shop->generateManual('gamingPro');
// Generación de la factura
$invoiceGaming  = $shop->generateInvoice('gamingPro');

// Guardamos para el visualizador (sólo para visualización de resultados)
$products[] = [
    'name'     => 'gamingPro',
    'computer' => $computerGaming,
    'manual'   => $manualGaming,
    'invoice'  => $invoiceGaming
];

// --- PEDIDO 3: Acer Economy ---
// Venta del ordenador a un cliente
$computerAcer = $shop->sellComputer('acerEconomy');
// Generación del manual del usuario
$manualAcer   = $shop->generateManual('acerEconomy');
// Generación de la factura
$invoiceAcer  = $shop->generateInvoice('acerEconomy');

// Guardamos para el visualizador (sólo para visualización de resultados)
$products[] = [
    'name'     => 'acerEconomy',
    'computer' => $computerAcer,
    'manual'   => $manualAcer,
    'invoice'  => $invoiceAcer
];


/**
 * Lógica de visualización por terminal (CLI)
 */
if (php_sapi_name() === 'cli' && count(debug_backtrace()) === 0) {
    echo "============================================================\n";
    echo "       EJEMPLO DEL PATRÓN BUILDER: FABRICACIÓN PRO          \n";
    echo "============================================================\n";

    foreach ($products as $bundle) {
        echo "\n" . str_repeat("=", 60) . "\n";
        echo " MODELO: " . strtoupper($bundle['name']) . "\n";
        echo str_repeat("=", 60) . "\n\n";

        echo "--- [1] OBJETO COMPUTER ---\n";
        var_dump($bundle['computer']);

        echo "\n--- [2] MANUAL DE USUARIO ---\n";
        if ($bundle['manual']) {
            echo $bundle['manual']->printDescription() . "\n";
        }

        echo "--- [3] FACTURA ---\n";
        if ($bundle['invoice']) {
            echo $bundle['invoice']->printInvoice() . "\n";
        }
        echo str_repeat("-", 60) . "\n";
    }

    echo "============================================================\n";
    echo "VENTAJAS DEL PATRÓN BUILDER:\n";
    echo "============================================================\n";
    $ventajas = [
        "Permite crear objetos complejos paso a paso.",
        "Mismo proceso de construcción para diferentes representaciones.",
        "Aísla el código de construcción de la lógica del negocio.",
        "Facilita el cumplimiento del principio de responsabilidad única."
    ];
    foreach ($ventajas as $ventaja) {
        echo " ✓ " . $ventaja . "\n";
    }
    echo "\n";
}

// Nota: La variable $products queda disponible si este archivo es incluido (ej. en index.php)
