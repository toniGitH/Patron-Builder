<?php

namespace App\Contracts;

/* Este el el Builder propiamente dicho. Es el constructor GENÉRICO.
   En este ejemplo, representa los diferentes pasos que se tienen que ejecutar para construir determinados objetos
   que comparten una misma estructura de creación (podría ser un ordenador, su manual de instrucciones, la factura
   de su coste de fabricación, etc...).
   Por tanto, un Builder no es necesariamente específico de un solo tipo concreto de producto, pero sí es obligatorio
   que los objetos que construya compartan la misma estructura de creación declarada en esta interfaz. 
*/

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
