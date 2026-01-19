<?php

require_once 'vendor/autoload.php';

use App\Clients\ComputerShop;

/**
 * Lógica de fabricación de products (Cliente ComputerShop)
 */
$shop = new ComputerShop();
$products = [];

// --- PEDIDO 1: MacBook Pro ---
// El cliente entra en la tienda...
$computerMac = $shop->sellComputer('macBookPro');
$manualMac   = $shop->generateManual('macBookPro');
$invoiceMac  = $shop->generateInvoice('macBookPro');

// Guardamos para el visualizador
$products[] = [
    'name'     => 'macBookPro',
    'computer' => $computerMac,
    'manual'   => $manualMac,
    'invoice'  => $invoiceMac
];

// --- PEDIDO 2: Gaming Pro ---
// Otro cliente pide un equipo Gaming...
$computerGaming = $shop->sellComputer('gamingPro');
$manualGaming   = $shop->generateManual('gamingPro');
$invoiceGaming  = $shop->generateInvoice('gamingPro');

// Guardamos para el visualizador
$products[] = [
    'name'     => 'gamingPro',
    'computer' => $computerGaming,
    'manual'   => $manualGaming,
    'invoice'  => $invoiceGaming
];

// --- PEDIDO 3: Acer Economy ---
// Un tercer cliente busca algo económico...
$computerAcer = $shop->sellComputer('acerEconomy');
$manualAcer   = $shop->generateManual('acerEconomy');
$invoiceAcer  = $shop->generateInvoice('acerEconomy');

// Guardamos para el visualizador
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
