<?php

namespace App\Clients;

use App\Domain\Computer\ComputerBuilder;
use App\Domain\UserManual\UserManualBuilder;
use App\Domain\Invoice\InvoiceBuilder;
use App\Director\Director;
use App\Domain\Computer\Computer;
use App\Domain\UserManual\UserManual;
use App\Domain\Invoice\Invoice;

/**
 * Clase ComputerShop (Cliente)
 * 
 * Esta clase actúa como cliente que consume el patrón Builder.
 * Encapsula la lógica de fabricación para que el main no tenga que conocer
 * los detalles de los builders ni del director.
 */
class ComputerShop
{
    /**
     * Entrega un ordenador fabricado según el modelo indicado.
     */
    public function sellComputer(string $model): Computer
    {
        // Instanciamos el Builder concreto que fabrica ordenadores
        $builder = new ComputerBuilder();
        // Instanciamos el Director que conoce el proceso de fabricación
        // El Director conoce el proceso de fabricación de determinados modelos que hemos codificado exprresamente en la clase Director
        $director = new Director($builder);
        // Utilizamos el Variable Method de PHP para llamar al método que corresponde al modelo indicado
        // Es una especie de método mágico que crea dinámicamente un método a partir del parámetro que le pasamos
        // Por ejemplo, si $model = 'macBookPro', se llama al método $director->macBookPro()
        $director->$model();
        // Devolvemos el ordenador fabricado
        return $builder->getComputer();
    }

    /**
     * Genera el manual de usuario para el modelo indicado.
     */
    public function generateManual(string $model): UserManual
    {
        $builder = new UserManualBuilder();
        $director = new Director($builder);
        $director->$model();
        return $builder->getUserManual();
    }

    /**
     * Genera la factura para el modelo indicado.
     */
    public function generateInvoice(string $model): Invoice
    {
        $builder = new InvoiceBuilder();
        $director = new Director($builder);
        $director->$model();
        return $builder->getInvoice();
    }
}
