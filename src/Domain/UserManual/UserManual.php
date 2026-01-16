<?php

namespace App\Domain\UserManual;

class UserManual 
{
    /**
     * PROPIEDADES: Las propiedades del objeto UserManual hemos dedicido que sean las mismas que las del objeto Computer,
     * ya que el Manual de usuario es un documento que describe el ordenador, pero no es obligatorio que las propiedades
     * del Manual sean las mismas que las del ordenador => PODRÍAN SER TOTALMENTE DIFERENTES!!.
     */

    private string $caseType;
    private string $brand;
    private string $model;
    private string $processor;
    private int $ram;
    private int $ssd;
    private bool $gpu;
    private array $extras = [];
    private string $operatingSystem;

    /**
     * MÉTODOS SETTERS: Los "setters" esta clase son iguales para que los de ComputerBuilder, pero sólo porque hemos
     * dedicido que las propiedades de ambos objetos sean las mismas. Si fueran diferentes, los setters también lo 
     * serían
     */

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

    /**
     * DIFERENCIA IMPORTANTE RESPECTO A LA CLASE Computer:
     * Este método transforma los datos "crudos" en algo visual para el usuario.
     * Es un método que sólo tiene sentido en un Manual, no en un Ordenador físico.
     */
    public function printDescription(): string 
    {
        // Lógica interna que solo tiene sentido en un Manual, no en un Ordenador físico
        $tipoChasis = ($this->caseType === 'Laptop') ? 'equipo portátil' : 'ordenador de sobremesa';
        $graficos = $this->gpu ? "una potente tarjeta gráfica dedicada" : "gráficos integrados en placa";
        
        $texto = "****************************************************\n";
        $texto .= "   GUÍA RÁPIDA DE USUARIO: " . strtoupper($this->brand) . " " . $this->model . "\n";
        $texto .= "****************************************************\n\n";
        
        $texto .= "¡Enhorabuena! Acaba de adquirir un " . $tipoChasis . " diseñado \n";
        $texto .= "especialmente para trabajar con " . $this->operatingSystem . ".\n\n";

        $texto .= "DETALLES DE SU CONFIGURACIÓN:\n";
        $texto .= "-----------------------------\n";
        $texto .= "> PROCESADOR: Su sistema late gracias a un " . $this->processor . ".\n";
        $texto .= "> MEMORIA: Dispone de " . $this->ram . "GB de RAM para que todo vuele.\n";
        $texto .= "> DISCO: " . $this->ssd . "TB de almacenamiento ultra-rápido SSD.\n";
        $texto .= "> VÍDEO: Para la imagen, contamos con " . $graficos . ".\n\n";

        if (!empty($this->extras)) {
            $texto .= "EXTRAS SOLICITADOS:\n";
            foreach ($this->extras as $extra) {
                $texto .= " [+] " . $extra . "\n";
            }
            $texto .= "\n";
        }

        $texto .= "Disfrute de su " . $this->model . ".\n";
        $texto .= "****************************************************\n";
        
        return $texto;
    }
}