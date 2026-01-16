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

    public function caseType(string $tipo): void
    {
        $this->invoice->setCasePrice($tipo);
    }

    public function processor(string $procesador): void
    {
        $this->invoice->setProcessorPrice($procesador);
    }

    public function brand(string $marca): void
    {
        $this->invoice->setBrandFactor($marca);
    }

    public function model(string $modelo): void
    {
        $this->invoice->setModel($modelo);
    }

    public function ram(int $ram): void
    {
        $this->invoice->setRamPrice($ram);
    }

    public function ssd(int $ssd): void
    {
        $this->invoice->setSsdPrice($ssd);
    }

    public function gpu(bool $gpu): void
    {
        $this->invoice->setGpuPrice($gpu);
    }

    public function extra(string $extra): void
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

    public function operatingSystem(string $sistemaOperativo): void
    {
        $this->invoice->setOperatingSystemPrice($sistemaOperativo);
    }

    public function getInvoice(): Invoice
    {
        return $this->invoice;
    }
}
