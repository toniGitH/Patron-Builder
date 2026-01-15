<?php

    namespace App\Products\Ordenador;

    class Ordenador 
    {
        private string $tipo; // sobremesa o portátil
        private string $marca;
        private string $modelo;
        private string $procesador; // Intel, AMD o M4
        private int $ram; // en GB
        private int $ssd; // en TB
        private bool $gpu;
        private array $extras = [];
        private string $sistemaOperativo; // Windows, Linux o macOS


    public function setTipo(string $tipo): void
    {
        $this->tipo = $tipo;
    }

    public function setMarca(string $marca): void
    {
        $this->marca = $marca;
    }

    public function setModelo(string $modelo): void
    {
        $this->modelo = $modelo;
    }

    public function setProcesador(string $procesador): void
    {
        $this->procesador = $procesador;
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

    public function setSistemaOperativo(string $sistemaOperativo): void
    {
        $this->sistemaOperativo = $sistemaOperativo;
    }

    // --- GETTERS ---
    // En un proyecto real, no sería necesario implementar los getters.

    public function getTipo(): string { return $this->tipo; }
    public function getMarca(): string { return $this->marca; }
    public function getModelo(): string { return $this->modelo; }
    public function getProcesador(): string { return $this->procesador; }
    public function getRam(): int { return $this->ram; }
    public function getSsd(): int { return $this->ssd; }
    public function getGpu(): bool { return $this->gpu; }
    public function getExtras(): array { return $this->extras; }
    public function getSistemaOperativo(): string { return $this->sistemaOperativo; }
}
