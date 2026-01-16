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

        public function changeBuilder(Builder $otherBuilder): void
        {
            $this->builder = $otherBuilder;
        }

        // Portatil MacBook Pro, con procesador M4, 16GB de RAM y 2TB de SSD, sin GPU, con extra de capturadora de video y sistema operativo Windows.
        // Método valido para generar tanto ordenador, como manual de usuario y factura de fabricación.
        public function macBookPro(): void
        {
            $this->builder->resetComputerProduct();
            $this->builder->caseType('Laptop');
            $this->builder->brand('Apple');
            $this->builder->model('MacBook Pro');
            $this->builder->processor('M4');
            $this->builder->ram('16GB');
            $this->builder->ssd('2TB');
            $this->builder->gpu(true);
            $this->builder->extra('Video capture device');
            $this->builder->operatingSystem('Windows 11');
        }
        
        // Ordenador de sobremesa GamerPro, de la marca HP, con procesador Intel Core i9, 32GB de RAM y 4TB de SSD, con GPU, con extras de teclado gamer y ratón gamer y sistema operativo Windows
        // Método valido para generar tanto ordenador, como manual de usuario y factura de fabricación.
        public function gamingPro(): void
        {
            $this->builder->resetComputerProduct();
            $this->builder->caseType('Desktop');
            $this->builder->brand('HP');
            $this->builder->model('GamerPro');
            $this->builder->processor('Intel Core i9');
            $this->builder->ram('32GB');
            $this->builder->ssd('4TB');
            $this->builder->gpu(true);
            $this->builder->extra('Gaming keyboard');
            $this->builder->extra('Gaming mouse');
            $this->builder->operatingSystem('Windows 11');
        }

        // Portátil Economy, de la marca Acer, con procesador AMD Ryzen 3, 8GB de RAM y 1TB de SSD, sin GPU, sin extras y con sistema operativo Linux Mint
        // Método valido para generar tanto ordenador, como manual de usuario y factura de fabricación.
        public function acerEconomy(): void
        {
            $this->builder->resetComputerProduct();
            $this->builder->caseType('Laptop');
            $this->builder->brand('Acer');
            $this->builder->model('Economy');
            $this->builder->processor('AMD Ryzen 3');
            $this->builder->ram('8GB');
            $this->builder->ssd('1TB');
            $this->builder->gpu(false);
            $this->builder->operatingSystem('Linux Mint');
        }
    }