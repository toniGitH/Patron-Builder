<?php

    namespace App\Domain\Computer;

    use App\Contracts\Builder;

    // La implementación de esta clase es la concreción de una abstracción (interface Builder.
    // El creador de un ordenador físico (class ComputerBuilder) es una concreción del Builder genérico (interface Builder).
    // El Builder genérico actúa como referencia común para ordenador, manual y factura, mientras que el ComputerBuilder sólo crea ordenadores físicos.
    class ComputerBuilder implements Builder
    {
        // Primero debemos crear un objeto vacío sobre el que ir aplicando los pasos de la construcción
        // Es como crear un soporte incial sobre el que actuar para contener el producto final
        private Computer $computer;
        
        // Necesitamos un array para ir guardando los extras (esto no es algo intrínseco de este patrón)
        private array $extras = [];

        public function resetComputerProduct(): void
        {
            $this->computer = new Computer();
            $this->extras = []; // IMPORTANTE: Reiniciar extras para que no se hereden entre construcciones
        }

        public function selectCaseType(string $tipo): void
        {
            $this->computer->setCaseType($tipo);
        }

        public function assignBrand(string $marca): void
        {
            $this->computer->setBrand($marca);
        }

        public function assignModel(string $modelo): void
        {
            $this->computer->setModel($modelo);
        }

        public function installProcessor(string $procesador): void
        {
            $this->computer->setProcessor($procesador);
        }

        public function installRam(string $ram): void
        {
            $this->computer->setRam((int)$ram);
        }

        public function installSsd(string $ssd): void
        {
            $this->computer->setSsd((int)$ssd);
        }

        public function installGpu(bool $gpu): void
        {
            $this->computer->setGpu($gpu);
        }

        public function assignExtra(string $extra): void
        {
            $this->extras[] = $extra;
            $this->computer->setExtras($this->extras);
        }

        public function installOperatingSystem(string $sistemaOperativo): void
        {
            $this->computer->setOperatingSystem($sistemaOperativo);
        }

        // Método típico de un patrón Builder para obtener el producto final
        // Este método normalmente no está declarado en la interfaz Builder, porque si fuera así, allí tendría un tipo de retorno, pero en cada implementación
        // de la interfaz Builder, el tipo de retorno sería diferente.
        public function getComputer(): Computer
        {
            return $this->computer;
        }
    }