<?php

require_once 'vendor/autoload.php';

use App\Domain\Computer\ComputerBuilder;
use App\Domain\UserManual\UserManualBuilder;
use App\Domain\Invoice\InvoiceBuilder;
use App\Director\Director;

/**
 * Lógica de fabricación de productos
 */
$productos = [];
$modelos = ['macBookPro', 'gamingPro', 'acerEconomy'];

foreach ($modelos as $modeloName) {
    $bundle = [
        'name' => $modeloName,
        'computer' => null,
        'manual' => null,
        'invoice' => null
    ];

    // 1. Computer
    $builder = new ComputerBuilder();
    $director = new Director($builder);
    $director->$modeloName();
    $bundle['computer'] = $builder->getComputer();

    // 2. UserManual
    $builder = new UserManualBuilder();
    $director->changeBuilder($builder);
    $director->$modeloName();
    $bundle['manual'] = $builder->getUserManual();

    // 3. Invoice
    $builder = new InvoiceBuilder();
    $director->changeBuilder($builder);
    $director->$modeloName();
    $bundle['invoice'] = $builder->getInvoice();

    $productos[] = $bundle;
}

/**
 * Lógica de visualización por terminal (CLI)
 */
if (php_sapi_name() === 'cli' && count(debug_backtrace()) === 0) {
    echo "============================================================\n";
    echo "       EJEMPLO DEL PATRÓN BUILDER: FABRICACIÓN PRO          \n";
    echo "============================================================\n";

    foreach ($productos as $bundle) {
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

// Nota: La variable $productos queda disponible si este archivo es incluido (ej. en index.php)
