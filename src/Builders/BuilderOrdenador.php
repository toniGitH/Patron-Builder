<?php

namespace App\Builders;

use App\Products\Ordenador;

class BuilderOrdenador implements Builder
{
    // Primero debemos crear un objeto vacío sobre el que ir aplicando los pasos de la construcción
    // Es como crear un soporte incial sobre el que actuar para contener el producto final
    private Ordenador $ordenador;
    
    // Necesitamos un array para ir guardando los extras (esto no es algo intrínseco de este patrón)
    private array $extras = [];

    public function obtenerPreOrdenador(): void
    {
        $this->ordenador = new Ordenador();
        $this->extras = []; // IMPORTANTE: Reiniciar extras para que no se hereden entre construcciones
    }

    public function construirSoporte(string $tipo): void
    {
        $this->ordenador->setTipo($tipo);
    }

    public function asignarMarca(string $marca): void
    {
        $this->ordenador->setMarca($marca);
    }

    public function asignarModelo(string $modelo): void
    {
        $this->ordenador->setModelo($modelo);
    }

    public function instalarProcesador(string $procesador): void
    {
        $this->ordenador->setProcesador($procesador);
    }

    public function instalarRam(string $ram): void
    {
        $this->ordenador->setRam((int)$ram);
    }

    public function instalarSsd(string $ssd): void
    {
        $this->ordenador->setSsd((int)$ssd);
    }

    public function instalarGpu(bool $gpu): void
    {
        $this->ordenador->setGpu($gpu);
    }

    public function instalarExtra(string $extra): void
    {
        $this->extras[] = $extra;
        $this->ordenador->setExtras($this->extras);
    }

    public function instalarSistemaOperativo(string $sistemaOperativo): void
    {
        $this->ordenador->setSistemaOperativo($sistemaOperativo);
    }

    // Método típico de un patrón Builder para obtener el producto final
    public function obtenerOrdenadorFabricado(): Ordenador
    {
        return $this->ordenador;
    }
}