<?php

namespace App\Director;

use App\Builders\Builder;

// La clase Director en un patrón Builder es la que conoce el proceso de fabricación de uno o varios producos diferentes.
// Es una clase OPCIONAL dentro del patrón Builder. 
class Director
{
    private Builder $builder;

    public function __construct(Builder $builder)
    {
        $this->builder = $builder;
    }

    public function cambiarBuilder(Builder $nuevoBuilder): void
    {
        $this->builder = $nuevoBuilder;
    }

    // Proceso de fabricación de un portátil MacBook Pro, con procesador M4, 16GB de RAM y 2TB de SSD, sin GPU, con extra de capturadora de video y sistema operativo Windows
    public function fabricarMacBookPro(): void
    {
        $this->builder->obtenerPreOrdenador();
        $this->builder->construirSoporte('Portátil');
        $this->builder->asignarMarca('Apple');
        $this->builder->asignarModelo('MacBook Pro');
        $this->builder->instalarProcesador('M4');
        $this->builder->instalarRam('16GB');
        $this->builder->instalarSsd('2TB');
        $this->builder->instalarGpu(false);
        $this->builder->instalarExtra('Capturadora de video');
        $this->builder->instalarSistemaOperativo('Windows 11');
    }
    
    // Proceso de fabricación de un ordenador de sobremesa GamerPro, de la marca HP, con procesador Intel Core i9, 32GB de RAM y 4TB de SSD, con GPU, con extras de teclado gamer y ratón gamer y sistema operativo Windows
    public function fabricarGamerPro(): void
    {
        $this->builder->obtenerPreOrdenador();
        $this->builder->construirSoporte('Sobremesa');
        $this->builder->asignarMarca('HP');
        $this->builder->asignarModelo('GamerPro');
        $this->builder->instalarProcesador('Intel Core i9');
        $this->builder->instalarRam('32GB');
        $this->builder->instalarSsd('4TB');
        $this->builder->instalarGpu(true);
        $this->builder->instalarExtra('Teclado gamer');
        $this->builder->instalarExtra('Ratón gamer');
        $this->builder->instalarSistemaOperativo('Windows 11');
    }

    // Proceso de fabricación de un portatil Economy, de la marca Acer, con procesador AMD Ryzen 3, 8GB de RAM y 1TB de SSD, sin GPU, sin extras y con sistema operativo Linux Mint
    public function fabricarEconomy(): void
    {
        $this->builder->obtenerPreOrdenador();
        $this->builder->construirSoporte('Portátil');
        $this->builder->asignarMarca('Acer');
        $this->builder->asignarModelo('Economy');
        $this->builder->instalarProcesador('AMD Ryzen 3');
        $this->builder->instalarRam('8GB');
        $this->builder->instalarSsd('1TB');
        $this->builder->instalarGpu(false);
        $this->builder->instalarSistemaOperativo('Linux Mint');
    }
}