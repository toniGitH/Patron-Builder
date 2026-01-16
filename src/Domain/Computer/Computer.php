<?php

    namespace App\Domain\Computer;

    class Computer 
    {
        private string $caseType; // Desktop or Laptop
        private string $brand; // Apple, HP, Acer, Asus and Lenovo
        private string $model;
        private string $processor; // Intel, AMD or M4
        private int $ram; // in GB
        private int $ssd; // in TB
        private bool $gpu;
        private array $extras = []; // Array of extras (mouse, keyboard and monitor)
        private string $operatingSystem; // Windows, Linux or macOS


        public function setCaseType(string $caseType): void
        {
            $this->caseType = $caseType;
        }

        public function setBrand(string $brand): void
        {
            $this->brand = $brand;
        }

        public function setModel(string $model): void
        {
            $this->model = $model;
        }

        public function setProcessor(string $processor): void
        {
            $this->processor = $processor;
        }

        public function setRam(int $ram): void
        {
            $this->ram = $ram;
        }

        public function setSsd(int $ssd): void
        {
            $this->ssd = $ssd;
        }

        public function setGpu(bool $gpu): void
        {
            $this->gpu = $gpu;
        }

        public function setExtras(array $extras): void
        {
            $this->extras = $extras;
        }

        public function setOperatingSystem(string $operatingSystem): void
        {
            $this->operatingSystem = $operatingSystem;
        }

        // --- GETTERS ---
        // En un proyecto real, no sería necesario implementar los getters.

        public function getCaseType(): string { return $this->caseType; }
        public function getBrand(): string { return $this->brand; }
        public function getModel(): string { return $this->model; }
        public function getProcessor(): string { return $this->processor; }
        public function getRam(): int { return $this->ram; }
        public function getSsd(): int { return $this->ssd; }
        public function getGpu(): bool { return $this->gpu; }
        public function getExtras(): array { return $this->extras; }
        public function getOperatingSystem(): string { return $this->operatingSystem; }
    }
