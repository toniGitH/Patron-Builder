<?php
require_once 'main.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patrón Builder - Visualizador Pro</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&family=Fira+Code&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <h1>Patrón Builder</h1>
        <p class="subtitle">Ejemplo: creación dinámica de Ordenadores, Manuales y Facturas</p>
    </header>

    <main class="products-grid">
        <?php foreach ($products as $bundle): ?>
            <section class="product-row">
                <h2 class="row-title">MODELO: <?= strtoupper($bundle['name']) ?></h2>

                <!-- Columna 1: Objeto Computer (Detalles raw) -->
                <div class="column">
                    <h3>💻 Objeto Computer</h3>
                    <div class="card">
                        <div class="object-inspector">
                            <?php $obj = $bundle['computer']; ?>
                            <div class="obj-header">
                                <span class="obj-type">App\Domain\Computer\Computer</span>#<?= spl_object_id($obj) ?> {
                            </div>
                            
                            <div class="obj-prop">
                                <span class="obj-visibility">private</span><span class="obj-key">$caseType</span>: 
                                <span class="obj-type">string(<?= strlen($obj->getCaseType()) ?>)</span> 
                                <span class="obj-value-string">"<?= $obj->getCaseType() ?>"</span>
                            </div>
                            <div class="obj-prop">
                                <span class="obj-visibility">private</span><span class="obj-key">$brand</span>: 
                                <span class="obj-type">string(<?= strlen($obj->getBrand()) ?>)</span> 
                                <span class="obj-value-string">"<?= $obj->getBrand() ?>"</span>
                            </div>
                            <div class="obj-prop">
                                <span class="obj-visibility">private</span><span class="obj-key">$model</span>: 
                                <span class="obj-type">string(<?= strlen($obj->getModel()) ?>)</span> 
                                <span class="obj-value-string">"<?= $obj->getModel() ?>"</span>
                            </div>
                            <div class="obj-prop">
                                <span class="obj-visibility">private</span><span class="obj-key">$processor</span>: 
                                <span class="obj-type">string(<?= strlen($obj->getProcessor()) ?>)</span> 
                                <span class="obj-value-string">"<?= $obj->getProcessor() ?>"</span>
                            </div>
                            <div class="obj-prop">
                                <span class="obj-visibility">private</span><span class="obj-key">$ram</span>: 
                                <span class="obj-type">int</span> 
                                <span class="obj-value-int"><?= $obj->getRam() ?></span>
                            </div>
                            <div class="obj-prop">
                                <span class="obj-visibility">private</span><span class="obj-key">$ssd</span>: 
                                <span class="obj-type">int</span> 
                                <span class="obj-value-int"><?= $obj->getSsd() ?></span>
                            </div>
                            <div class="obj-prop">
                                <span class="obj-visibility">private</span><span class="obj-key">$gpu</span>: 
                                <span class="obj-type">bool</span> 
                                <span class="obj-value-bool"><?= $obj->getGpu() ? 'true' : 'false' ?></span>
                            </div>
                            <div class="obj-prop">
                                <span class="obj-visibility">private</span><span class="obj-key">$extras</span>: 
                                <span class="obj-type">array(<?= count($obj->getExtras()) ?>)</span> {
                                <div class="obj-nested">
                                    <?php foreach ($obj->getExtras() as $i => $extra): ?>
                                        <div class="obj-array-item">
                                            [<?= $i ?>] => <span class="obj-type">string(<?= strlen($extra) ?>)</span> 
                                            <span class="obj-value-string">"<?= $extra ?>"</span>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                }
                            </div>
                            <div class="obj-prop">
                                <span class="obj-visibility">private</span><span class="obj-key">$operatingSystem</span>: 
                                <span class="obj-type">string(<?= strlen($obj->getOperatingSystem()) ?>)</span> 
                                <span class="obj-value-string">"<?= $obj->getOperatingSystem() ?>"</span>
                            </div>

                            <div class="obj-header">}</div>
                        </div>
                    </div>
                </div>

                <!-- Columna 2: Manual de Usuario -->
                <div class="column">
                    <h3>📚 Objeto User Manual</h3>
                    <div class="card">
                        <pre><?= htmlspecialchars($bundle['manual']->printDescription()) ?></pre>
                    </div>
                </div>

                <!-- Columna 3: Factura -->
                <div class="column">
                    <h3>🧾 Objeto Invoice</h3>
                    <div class="card">
                        <pre><?= htmlspecialchars($bundle['invoice']->printInvoice()) ?></pre>
                    </div>
                </div>
            </section>
        <?php endforeach; ?>
    </main>

    <footer style="text-align: center; margin-top: 4rem; color: var(--text-muted); font-size: 0.8rem; padding-bottom: 2rem;">
        <p>Patrones de Diseño: Builder - Implementado con PHP 8.3</p>
    </footer>
</body>
</html>
