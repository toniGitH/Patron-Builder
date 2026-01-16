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
    private float $brandFactor;
    private string $model;
    private int $processorPrice;
    private int $ramPrice;
    private int $ssdPrice;
    private int $gpuPrice;
    private array $extrasPrice = [];
    private int $operatingSystemPrice;

    /**
     * MÉTODOS SETTERS: Los "setters" esta clase también cambian respecto a los de la clase Computer y los de la
     * clase UserManual, ya que la esta clase Invoice tiene diferentes propiedades que las de Computer y UserManual.
     */

    public function setCasePrice(string $caseType): void 
    {
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
        $this->ramPrice = $ram * 5;
    }

    public function setSsdPrice(int $ssd): void
    {
        $this->ssdPrice = $ssd * 60;
    }

    public function setGpuPrice(bool $gpu): void
    {
        $this->gpuPrice = $gpu ? 100 : 0;
    }
    
    public function setExtrasPrice(array $extrasPrice): void
    {
        $this->extrasPrice = $extrasPrice;
    }

    public function setOperatingSystemPrice(string $operatingSystem): void
    {
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

        $invoice .= sprintf("%-35s %12s\n", "Componente", "Coste");
        $invoice .= "----------------------------------------------------\n";
        $invoice .= sprintf("%-35s %10d €\n", "Chasis y montaje base", $this->casePrice);
        $invoice .= sprintf("%-35s %10d €\n", "Procesador", $this->processorPrice);
        $invoice .= sprintf("%-35s %10d €\n", "Memoria RAM", $this->ramPrice);
        $invoice .= sprintf("%-35s %10d €\n", "Almacenamiento SSD", $this->ssdPrice);
        $invoice .= sprintf("%-35s %10d €\n", "Tarjeta Gráfica (GPU)", $this->gpuPrice);
        $invoice .= sprintf("%-35s %10d €\n", "Sistema Operativo", $this->operatingSystemPrice);

        if (!empty($this->extrasPrice)) {
            $invoice .= "----------------------------------------------------\n";
            $invoice .= "EXTRAS:\n";
            foreach ($this->extrasPrice as $name => $price) {
                $invoice .= sprintf(" [+] %-30s %10d €\n", $name, $price);
            }
        }

        $invoice .= "----------------------------------------------------\n";
        $invoice .= sprintf("%-35s %10d €\n", "COSTE BRUTO TOTAL", $costeBrutoTotal);
        $invoice .= sprintf("%-35s %10.1f x\n", "Multiplicador de Marca", $this->brandFactor);
        $invoice .= "====================================================\n";
        $invoice .= sprintf("%-35s %10.2f €\n", "TOTAL NETO A PAGAR", $total);
        $invoice .= "====================================================\n";

        return $invoice;
    }
}