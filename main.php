<?php

require_once 'vendor/autoload.php';

use App\Products\Ordenador\BuilderOrdenador;
use App\Director\Director;

// Crear un builder
$builder = new BuilderOrdenador();

// Crear un director (opcional) y asignarle el builder
$director = new Director($builder);

// Fabricar un ordenador MacBook Pro
$director->fabricarMacBookPro();
$ordenadorMacBookPro = $builder->obtenerOrdenadorFabricado();

// Fabricar un ordenador GamerPro
$director->fabricarGamerPro();
$ordenadorGamerPro = $builder->obtenerOrdenadorFabricado();

// Fabricar un ordenador Economy
$director->fabricarEconomy();
$ordenadorEconomy = $builder->obtenerOrdenadorFabricado();

// Mostrar los ordenadores fabricados
var_dump($ordenadorMacBookPro);
var_dump($ordenadorGamerPro);
var_dump($ordenadorEconomy);