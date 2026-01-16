<?php

    namespace App\Contracts;

    /**
     * Este el el Builder propiamente dicho. Es el constructor GENÉRICO.
     * En este ejemplo, representa los diferentes pasos que se tienen que ejecutar para construir determinados objetos
     * que comparten una misma estructura de creación (podría ser un ordenador, su manual de instrucciones, la factura
     * de su coste de fabricación, etc...).
     * Por tanto, un Builder no es necesariamente específico de un solo tipo concreto de producto, pero sí es obligatorio
     * que los objetos que construya compartan la misma estructura de creación declarada en esta interfaz. 
    */

    interface Builder
    {
        // Método típico de un patrón Builder para resetear el objeto sobre el que se está construyendo (el ordenador, el manual o la factura)
        public function resetComputerProduct(): void;
        
        // Métodos específicos para construir el ordenador, manual de usuario o factura
        public function caseType(string $tipo): void;
        public function processor(string $procesador): void;
        public function brand(string $marca): void;
        public function model(string $modelo): void;
        public function ram(int $ram): void;
        public function ssd(int $ssd): void;
        public function gpu(bool $gpu): void;
        public function extra(string $extra): void;
        public function operatingSystem(string $sistemaOperativo): void;
    
        /** 
         * La interfaz Builder, por lo general, no declara ningún método para obtener el producto final, porque
         * si fuera así, tendría que ser implementado por diferentes builders concretos, y eso obligaría a que 
         * todos ellos retornaran el mismo tipo de objeto, lo cual no es lo que buscamos, sino que necesitamos
         * que cada builder concreto pueda retornar el tipo de objeto que corresponda.
         * En este ejemplo, los 3 builders concretos que tenemos, en la práctica, van a devolver 3 objetos que
         * aunque correspondan cada uno a su clase (Computer, UserManual e Invoice), en realidad son objetos con
         * una misma estructura (perecen idénticos con diferente nombre), pero en la práctica, el tipo de objeto
         * que retornan suele ser completamente diferente, porque no es lo mismo un ordenador físico, que un manual
         * de usuario o una factura.
         */
    }
