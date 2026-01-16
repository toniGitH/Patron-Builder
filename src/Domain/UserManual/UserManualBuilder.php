<?php

    namespace App\Domain\UserManual;

    use App\Contracts\Builder;

    /**
     * La implementación de esta clase es la concreción de una abstracción (interface Builder).
     * El creador de un ordenador físico (class ComputerBuilder) es una concreción del Builder genérico (interface Builder).
     * El Builder genérico actúa como referencia común para ordenador, manual y factura, mientras que el ComputerBuilder
     * sólo crea ordenadores físicos.
     * Esta clase implementa, además de todos los métodos declarados en la interfaz Builder, el método getUserManual()
     * que es el que retorna el objeto final (un manual de usuario).
     */
    class UserManualBuilder implements Builder
    {
        // Primero debemos crear un objeto vacío sobre el que ir aplicando los pasos de la construcción
        // Es como crear un soporte incial sobre el que actuar para contener el producto final
        private UserManual $userManual;
        
        // Necesitamos un array para ir guardando los extras (esto no es algo intrínseco de este patrón)
        private array $extras = [];

        public function resetComputerProduct(): void
        {
            $this->userManual = new UserManual();
            $this->extras = []; // IMPORTANTE: Reiniciar extras para que no se hereden entre construcciones
        }

        public function caseType(string $tipo): void
        {
            $this->userManual->setCaseType($tipo);
        }

        public function brand(string $marca): void
        {
            $this->userManual->setBrand($marca);
        }

        public function model(string $modelo): void
        {
            $this->userManual->setModel($modelo);
        }

        public function processor(string $procesador): void
        {
            $this->userManual->setProcessor($procesador);
        }

        public function ram(int $ram): void
        {
            $this->userManual->setRam($ram);
        }

        public function ssd(int $ssd): void
        {
            $this->userManual->setSsd($ssd);
        }

        public function gpu(bool $gpu): void
        {
            $this->userManual->setGpu($gpu);
        }

        public function extra(string $extra): void
        {
            $this->extras[] = $extra;
            $this->userManual->setExtras($this->extras);
        }

        public function operatingSystem(string $sistemaOperativo): void
        {
            $this->userManual->setOperatingSystem($sistemaOperativo);
        }

        // Método típico de un patrón Builder para obtener el producto final
        // Este método normalmente no está declarado en la interfaz Builder, porque si fuera así, allí tendría un tipo de retorno, pero en cada implementación
        // de la interfaz Builder, el tipo de retorno sería diferente.
        public function getUserManual(): UserManual
        {
            return $this->userManual;
        }
    }