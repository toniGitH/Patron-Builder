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
        // Método típico de un patrón Builder para resetear el objeto sobre el que se está construyendo (el ordenador, el manual o la factura)
        public function resetComputerProduct(): void;
        
        // Métodos específicos para construir el ordenador, manual de usuario o factura
        public function selectCaseType(string $tipo): void;
        public function installProcessor(string $procesador): void;
        public function assignBrand(string $marca): void;
        public function assignModel(string $modelo): void;
        public function installRam(string $ram): void;
        public function installSsd(string $ssd): void;
        public function installGpu(bool $gpu): void;
        public function assignExtra(string $extra): void;
        public function installOperatingSystem(string $sistemaOperativo): void;
    }
