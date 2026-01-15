<?php

namespace App\Contracts;

// Este el el Builder propiamente dicho. Es el constructor GENÉRICO
interface Builder
{
    // Método típico de un patrón Builder para resetear el estado
    public function obtenerPreOrdenador(): void;
    
    // Métodos específicos para construir el ordenador
    public function construirSoporte(string $tipo): void;
    public function instalarProcesador(string $procesador): void;
    public function asignarMarca(string $marca): void;
    public function asignarModelo(string $modelo): void;
    public function instalarRam(string $ram): void;
    public function instalarSsd(string $ssd): void;
    public function instalarGpu(bool $gpu): void;
    public function instalarExtra(string $extra): void;
    public function instalarSistemaOperativo(string $sistemaOperativo): void;
}
