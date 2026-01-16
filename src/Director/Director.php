<?php

    namespace App\Director;

    use App\Contracts\Builder;

    // La clase Director en un patrón Builder es la que conoce el proceso de fabricación de uno o varios producos diferentes.
    // Es una clase OPCIONAL dentro del patrón Builder. 
    class Director
    {
        private Builder $builder;

        public function __construct(Builder $builder)
        {
            $this->builder = $builder;
        }

        public function cambiarBuilder(Builder $otherBuilder): void
        {
            $this->builder = $otherBuilder;
        }

        // Portatil MacBook Pro, con procesador M4, 16GB de RAM y 2TB de SSD, sin GPU, con extra de capturadora de video y sistema operativo Windows
        // Método valido para ordenador, manual de usuario y factura de fabricación
        public function macBookPro(): void
        {
            $this->builder->resetComputerProduct();
            $this->builder->selectCaseType('Laptop');
            $this->builder->assignBrand('Apple');
            $this->builder->assignModel('MacBook Pro');
            $this->builder->installProcessor('M4');
            $this->builder->installRam('16GB');
            $this->builder->installSsd('2TB');
            $this->builder->installGpu(false);
            $this->builder->assignExtra('Video capture device');
            $this->builder->installOperatingSystem('Windows 11');
        }
        
        // Ordenador de sobremesa GamerPro, de la marca HP, con procesador Intel Core i9, 32GB de RAM y 4TB de SSD, con GPU, con extras de teclado gamer y ratón gamer y sistema operativo Windows
        // Método válido para ordenador, manual de usuario y factura de fabricación
        public function gamingPro(): void
        {
            $this->builder->resetComputerProduct();
            $this->builder->selectCaseType('Desktop');
            $this->builder->assignBrand('HP');
            $this->builder->assignModel('GamerPro');
            $this->builder->installProcessor('Intel Core i9');
            $this->builder->installRam('32GB');
            $this->builder->installSsd('4TB');
            $this->builder->installGpu(true);
            $this->builder->assignExtra('Gaming keyboard');
            $this->builder->assignExtra('Gaming mouse');
            $this->builder->installOperatingSystem('Windows 11');
        }

        // Portátil Economy, de la marca Acer, con procesador AMD Ryzen 3, 8GB de RAM y 1TB de SSD, sin GPU, sin extras y con sistema operativo Linux Mint
        // Método válido para ordenador, manual de usuario y factura de fabricación
        public function acerEconomy(): void
        {
            $this->builder->resetComputerProduct();
            $this->builder->selectCaseType('Laptop');
            $this->builder->assignBrand('Acer');
            $this->builder->assignModel('Economy');
            $this->builder->installProcessor('AMD Ryzen 3');
            $this->builder->installRam('8GB');
            $this->builder->installSsd('1TB');
            $this->builder->installGpu(false);
            $this->builder->installOperatingSystem('Linux Mint');
        }
    }