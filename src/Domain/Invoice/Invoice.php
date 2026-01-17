<?php

namespace App\Domain\Invoice;

class Invoice 
{
    /**
     * PROPIEDADES: en este caso, algunas propiedades del objeto Invoice son las mismas que las del objeto Computer,
     * pero no todas, ya que la factura (Invoice) es un documento diferente de un manual de usuario (UserManual) y 
     * un ordenador físico (Computer).
     */

    private int $casePrice;
    private string $caseType;
    private float $brandFactor;
    private string $model;
    private int $processorPrice;
    private string $processor;
    private int $ramPrice;
    private int $ram;
    private int $ssdPrice;
    private int $ssd;
    private int $gpuPrice;
    private bool $hasGpu;
    private array $extrasPrice = [];
    private int $operatingSystemPrice;
    private string $operatingSystem;

    /**
     * MÉTODOS SETTERS: Los "setters" esta clase también cambian respecto a los de la clase Computer y los de la
     * clase UserManual, ya que la esta clase Invoice tiene diferentes propiedades que las de Computer y UserManual.
     */

    public function setCasePrice(string $caseType): void 
    {
        $this->caseType = $caseType;
        if ($caseType === 'Laptop') {
            $this->casePrice = 50;
        } elseif ($caseType === 'Desktop') {
            $this->casePrice = 75;
        } else {
            $this->casePrice = 0;
        }
    }

    public function setBrandFactor(string $brand): void
    {
        if ($brand === 'Apple') {
            $this->brandFactor = 2;
        } elseif ($brand === 'HP') {
            $this->brandFactor = 1.8;
        } elseif ($brand === 'Acer') {
            $this->brandFactor = 1.4;
        } elseif ($brand === 'Asus') {
            $this->brandFactor = 1.2;
        } elseif ($brand === 'Lenovo') {
            $this->brandFactor = 1;
        } else {
            $this->brandFactor = 0;
        }
    }

    public function setModel(string $model): void
    {
        $this->model = $model;
    }

    public function setProcessorPrice(string $processor): void
    {
        $this->processor = $processor;
        if (stripos($processor, 'M4') !== false) {
            $this->processorPrice = 150;
        } elseif (stripos($processor, 'AMD') !== false) {
            $this->processorPrice = 100;
        } elseif (stripos($processor, 'Intel') !== false) {
            $this->processorPrice = 125;
        } else {
            $this->processorPrice = 0;
        }
    }

    public function setRamPrice(int $ram): void
    {
        $this->ram = $ram;
        $this->ramPrice = $ram * 5;
    }

    public function setSsdPrice(int $ssd): void
    {
        $this->ssd = $ssd;
        $this->ssdPrice = $ssd * 60;
    }

    public function setGpuPrice(bool $gpu): void
    {
        $this->hasGpu = $gpu;
        $this->gpuPrice = $gpu ? 100 : 0;
    }
    
    public function setExtrasPrice(array $extrasPrice): void
    {
        $this->extrasPrice = $extrasPrice;
    }

    public function setOperatingSystemPrice(string $operatingSystem): void
    {
        $this->operatingSystem = $operatingSystem;
        if (stripos($operatingSystem, 'Windows') !== false) {
            $this->operatingSystemPrice = 100;
        } elseif (stripos($operatingSystem, 'Linux') !== false) {
            $this->operatingSystemPrice = 10;
        } elseif (stripos($operatingSystem, 'macOS') !== false) {
            $this->operatingSystemPrice = 80;
        } else {
            $this->operatingSystemPrice = 0;
        }
    }

    /**
     * DIFERENCIA IMPORTANTE RESPECTO A LA CLASE Computer:
     * Este método transforma los datos "crudos" en algo visual para el usuario.
     */
    public function printInvoice(): string 
    {
        // Sumamos todos los elementos individuales para obtener el coste bruto total
        $costeBrutoTotal = $this->casePrice + $this->processorPrice + $this->ramPrice + $this->ssdPrice + $this->gpuPrice + $this->operatingSystemPrice;
        
        foreach ($this->extrasPrice as $price) {
            $costeBrutoTotal += $price;
        }

        // Una vez sumados todos en bruto, aplicamos el multiplicador de marca
        $total = $costeBrutoTotal * $this->brandFactor;

        $invoice = "====================================================\n";
        $invoice .= "       FACTURA PROFORMA: " . strtoupper($this->model) . "       \n";
        $invoice .= "====================================================\n\n";

        $invoice .= mb_str_pad("Componente", 25) . " " . mb_str_pad("Cantidad/Tipo", 15) . " " . mb_str_pad("Coste", 12, " ", STR_PAD_LEFT) . "\n";
        $invoice .= "------------------------------------------------------------\n";
        $invoice .= mb_str_pad("Chasis y montaje base", 25) . " " . mb_str_pad($this->caseType, 15) . " " . mb_str_pad($this->casePrice . " €", 12, " ", STR_PAD_LEFT) . "\n";
        $invoice .= mb_str_pad("Procesador", 25) . " " . mb_str_pad($this->processor, 15) . " " . mb_str_pad($this->processorPrice . " €", 12, " ", STR_PAD_LEFT) . "\n";
        $invoice .= mb_str_pad("Memoria RAM", 25) . " " . mb_str_pad($this->ram . " GB", 15) . " " . mb_str_pad($this->ramPrice . " €", 12, " ", STR_PAD_LEFT) . "\n";
        $invoice .= mb_str_pad("Almacenamiento SSD", 25) . " " . mb_str_pad($this->ssd . " TB", 15) . " " . mb_str_pad($this->ssdPrice . " €", 12, " ", STR_PAD_LEFT) . "\n";
        $invoice .= mb_str_pad("Tarjeta Gráfica (GPU)", 25) . " " . mb_str_pad($this->hasGpu ? "Sí" : "No", 15) . " " . mb_str_pad($this->gpuPrice . " €", 12, " ", STR_PAD_LEFT) . "\n";
        $invoice .= mb_str_pad("Sistema Operativo", 25) . " " . mb_str_pad($this->operatingSystem, 15) . " " . mb_str_pad($this->operatingSystemPrice . " €", 12, " ", STR_PAD_LEFT) . "\n";

        if (!empty($this->extrasPrice)) {
            $invoice .= "------------------------------------------------------------\n";
            $invoice .= "EXTRAS:\n";
            foreach ($this->extrasPrice as $name => $price) {
                $invoice .= " [+] " . mb_str_pad($name, 20) . " " . mb_str_pad("", 15) . " " . mb_str_pad($price . " €", 12, " ", STR_PAD_LEFT) . "\n";
            }
        }

        $invoice .= "------------------------------------------------------------\n";
        $invoice .= mb_str_pad("COSTE BRUTO TOTAL", 41) . " " . mb_str_pad($costeBrutoTotal . " €", 12, " ", STR_PAD_LEFT) . "\n";
        $invoice .= mb_str_pad("Multiplicador de Marca", 41) . " " . mb_str_pad($this->brandFactor . " x", 12, " ", STR_PAD_LEFT) . "\n";
        $invoice .= "============================================================\n";
        $invoice .= mb_str_pad("TOTAL NETO A PAGAR", 41) . " " . mb_str_pad(number_format($total, 2) . " €", 12, " ", STR_PAD_LEFT) . "\n";
        $invoice .= "============================================================\n";

        return $invoice;
    }
}