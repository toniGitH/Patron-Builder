<?php

    require_once 'vendor/autoload.php';

    use App\Domain\Computer\ComputerBuilder;
    use App\Director\Director;

    // 1. FABRICACIÓN DE UN ORDENADOR FÍSICO (MacBook Pro)

    // Instanciamos el Builder específico que crea orednadores físicos (el ComputerBuilder)
    $builder = new ComputerBuilder();

    // Creamos un director (opcional) y le asignamos el builder que necesitamos
    $director = new Director($builder);

    // Fabricamos un ordenador MacBook Pro
    $director->macBookPro();

    // Obtenemos el ordenador fabricado
    $macBookProComputer = $builder->getComputer();

    // 2. ELABORACIÓN DEL MANUAL DE USUARIO DE UN ORDENADOR FÍSICO (del MacBook Pro)
    // Instanciamos el Builder específico que crea manuals de usuario (el ManualBuilder)
    //$builder = new ManualBuilder();
    // Creamos un director (opcional) y le asignamos el builder que necesitamos
    //$director = new Director($builder);
    // Fabricamos un manual de usuario para el MacBook Pro
    //$director->macBookPro();
    // Obtenemos el manual de usuario fabricado
    //$macBookProManual = $builder->getManual();
    
    // 3. EMISIÓN DE LA FACTURA DEL COSTE DE FABRICACIÓN DE UN ORDENADOR FÍSICO (del MacBook Pro)
    // Instanciamos el Builder específico que crea facturas (el InvoiceBuilder)
    //$builder = new InvoiceBuilder();
    // Creamos un director (opcional) y le asignamos el builder que necesitamos
    //$director = new Director($builder);
    // Fabricamos una factura para el MacBook Pro
    //$director->macBookPro();
    // Obtenemos la factura fabricada
    //$macBookProInvoice = $builder->getInvoice();

    // 4. FABRICACIÓN DE UN ORDENADOR FÍSICO (GamerPro)
    // Instanciamos el Builder específico que crea orednadores físicos (el ComputerBuilder)
    $builder = new ComputerBuilder();
    // Creamos un director (opcional) y le asignamos el builder que necesitamos
    $director = new Director($builder);
    // Fabricamos un ordenador GamerPro
    $director->gamingPro();
    // Obtenemos el ordenador fabricado
    $gamingProComputer = $builder->getComputer();

    // 5. ELABORACIÓN DEL MANUAL DE USUARIO DE UN ORDENADOR FÍSICO (del GamerPro)
    // Instanciamos el Builder específico que crea manuals de usuario (el ManualBuilder)
    //$builder = new ManualBuilder();
    // Creamos un director (opcional) y le asignamos el builder que necesitamos
    //$director = new Director($builder);
    // Fabricamos un manual de usuario para el GamerPro
    //$director->gamingPro();
    // Obtenemos el manual de usuario fabricado
    //$gamingProManual = $builder->getManual();
    
    // 6. EMISIÓN DE LA FACTURA DEL COSTE DE FABRICACIÓN DE UN ORDENADOR FÍSICO (del GamerPro)
    // Instanciamos el Builder específico que crea facturas (el InvoiceBuilder)
    //$builder = new InvoiceBuilder();
    // Creamos un director (opcional) y le asignamos el builder que necesitamos
    //$director = new Director($builder);
    // Fabricamos una factura para el GamerPro
    //$director->gamingPro();
    // Obtenemos la factura fabricada
    //$gamingProInvoice = $builder->getInvoice();

    // 7. FABRICACIÓN DE UN ORDENADOR FÍSICO (Acer Economy)
    // Instanciamos el Builder específico que crea orednadores físicos (el ComputerBuilder)
    $builder = new ComputerBuilder();
    // Creamos un director (opcional) y le asignamos el builder que necesitamos
    $director = new Director($builder);
    // Fabricamos un ordenador Acer Economy
    $director->acerEconomy();
    // Obtenemos el ordenador fabricado
    $acerEconomyComputer = $builder->getComputer();

    // 8. ELABORACIÓN DEL MANUAL DE USUARIO DE UN ORDENADOR FÍSICO (del Acer Economy)
    // Instanciamos el Builder específico que crea manuals de usuario (el ManualBuilder)
    //$builder = new ManualBuilder();
    // Creamos un director (opcional) y le asignamos el builder que necesitamos
    //$director = new Director($builder);
    // Fabricamos un manual de usuario para el Acer Economy
    //$director->acerEconomy();
    // Obtenemos el manual de usuario fabricado
    //$acerEconomyManual = $builder->getManual();
    
    // 9. EMISIÓN DE LA FACTURA DEL COSTE DE FABRICACIÓN DE UN ORDENADOR FÍSICO (del Acer Economy)
    // Instanciamos el Builder específico que crea facturas (el InvoiceBuilder)
    //$builder = new InvoiceBuilder();
    // Creamos un director (opcional) y le asignamos el builder que necesitamos
    //$director = new Director($builder);
    // Fabricamos una factura para el Acer Economy
    //$director->acerEconomy();
    // Obtenemos la factura fabricada
    //$acerEconomyInvoice = $builder->getInvoice();

    // Mostrar los resultados: ordenadores, manuales y facturas
    var_dump($macBookProComputer);
    //var_dump($macBookProManual);
    //var_dump($macBookProInvoice);
    var_dump($gamingProComputer);
    //var_dump($gamingProManual);
    //var_dump($gamingProInvoice);
    var_dump($acerEconomyComputer);
    //var_dump($acerEconomyManual);
    //var_dump($acerEconomyInvoice);