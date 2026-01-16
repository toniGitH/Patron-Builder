<?php

namespace App\Domain\Invoice;

use App\Contracts\Builder;

/**
 * El InvoiceBuilder se encarga de traducir los componentes del ordenador
 * en costes monetarios para generar la factura.
 */
class InvoiceBuilder implements Builder
{
    private Invoice $invoice;
    private array $extras = [];

    public function resetComputerProduct(): void
    {
        $this->invoice = new Invoice();
        $this->extras = [];
    }

    public function CaseType(string $tipo): void
    {
        $this->invoice->setCasePrice($tipo);
    }

    public function Processor(string $procesador): void
    {
        $this->invoice->setProcessorPrice($procesador);
    }

    public function Brand(string $marca): void
    {
        $this->invoice->setBrandFactor($marca);
    }

    public function Model(string $modelo): void
    {
        $this->invoice->setModel($modelo);
    }

    public function Ram(string $ram): void
    {
        // Extraemos el número de la cadena (ej: "16GB" -> 16)
        $val = (int) filter_var($ram, FILTER_SANITIZE_NUMBER_INT);
        $this->invoice->setRamPrice($val);
    }

    public function Ssd(string $ssd): void
    {
        // Extraemos el número de la cadena (ej: "2TB" -> 2)
        $val = (int) filter_var($ssd, FILTER_SANITIZE_NUMBER_INT);
        $this->invoice->setSsdPrice($val);
    }

    public function Gpu(bool $gpu): void
    {
        $this->invoice->setGpuPrice($gpu);
    }

    public function Extra(string $extra): void
    {
        $price = 0;
        if (stripos($extra, 'Mouse') !== false) {
            $price = 10;
        } elseif (stripos($extra, 'Keyboard') !== false) {
            $price = 25;
        } elseif (stripos($extra, 'Monitor') !== false) {
            $price = 150;
        }
        
        $this->extras[$extra] = $price;
        $this->invoice->setExtrasPrice($this->extras);
    }

    public function OperatingSystem(string $sistemaOperativo): void
    {
        $this->invoice->setOperatingSystemPrice($sistemaOperativo);
    }

    public function getInvoice(): Invoice
    {
        return $this->invoice;
    }
}
