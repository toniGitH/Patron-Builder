<?php

    require_once 'vendor/autoload.php';

    use App\Domain\Computer\ComputerBuilder;
    use App\Domain\UserManual\UserManualBuilder;
    use App\Director\Director;

    // 1. FABRICACIÓN DE UN ORDENADOR FÍSICO (MacBook Pro)

    // Instanciamos el Builder específico que crea orednadores físicos (el ComputerBuilder)
    $builder = new ComputerBuilder();

    // Instanciamos un director y le asignamos el builder anterior, que es el que necesitamos
    $director = new Director($builder);

    // Fabricamos un ordenador MacBook Pro
    $director->macBookPro();

    // Obtenemos el ordenador fabricado
    $macBookProComputer = $builder->getComputer();

    // Mostramos el ordenador fabricado
    var_dump($macBookProComputer);

    // 2. ELABORACIÓN DEL MANUAL DE USUARIO DE UN ORDENADOR FÍSICO (del MacBook Pro)

    // Instanciamos el Builder específico que crea manuales de usuario (el UserManualBuilder)
    $builder = new UserManualBuilder();

    // Al director le asignamos el nuevo builder que acabamos de instanciar que es el que necesitamos ahora
    $director->changeBuilder($builder);

    // Fabricamos un manual de usuario para el MacBook Pro
    $director->macBookPro();

    // Obtenemos el objeto manual de usuario fabricado
    $macBookProManual = $builder->getUserManual();

    // Imprimimos el manual de usuario fabricado
    echo $macBookProManual->printDescription() . PHP_EOL;

    // 3. EMISIÓN DE LA FACTURA DEL COSTE DE FABRICACIÓN DE UN ORDENADOR FÍSICO (del MacBook Pro)
    // Instanciamos el Builder específico que crea facturas (el InvoiceBuilder)
    //$builder = new InvoiceBuilder();
    // Creamos un director (opcional) y le asignamos el builder que necesitamos
    //$director = new Director($builder);
    // Fabricamos una factura para el MacBook Pro
    //$director->macBookPro();
    // Obtenemos la factura fabricada
    //$macBookProInvoice = $builder->getInvoice();

    // 4. FABRICACIÓN DE UN ORDENADOR FÍSICO (Gaming Pro)

    // Instanciamos el Builder específico que crea ordenadores físicos (el ComputerBuilder)
    $builder = new ComputerBuilder();

    // Al director le asignamos el nuevo builder que acabamos de instanciar, que es el que necesitamos ahora
    $director->changeBuilder($builder);

    // Fabricamos un ordenador GamerPro
    $director->gamingPro();

    // Obtenemos el ordenador fabricado
    $gamingProComputer = $builder->getComputer();

    // Mostramos el ordenador fabricado
    var_dump($gamingProComputer);

    // 5. ELABORACIÓN DEL MANUAL DE USUARIO DE UN ORDENADOR FÍSICO (del GamerPro)
    // Instanciamos el Builder específico que crea manuales de usuario (el UserManualBuilder)
    $builder = new UserManualBuilder();

    // Al director le asignamos el nuevo builder
    $director->changeBuilder($builder);

    // Fabricamos un manual de usuario para el GamerPro
    $director->gamingPro();

    // Obtenemos el manual de usuario fabricado
    $gamingProManual = $builder->getUserManual();

    // Imprimimos el manual
    echo $gamingProManual->printDescription() . PHP_EOL;
    
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

    // Instanciamos el Builder específico que crea ordenadores físicos (el ComputerBuilder)
    $builder = new ComputerBuilder();

    // Al director le asignamos el nuevo builder que acabamos de instanciar, que es el que necesitamos ahora
    $director->changeBuilder($builder);

    // Fabricamos un ordenador Acer Economy
    $director->acerEconomy();

    // Obtenemos el ordenador fabricado
    $acerEconomyComputer = $builder->getComputer();

    // Mostramos el ordenador fabricado
    var_dump($acerEconomyComputer);

    // 8. ELABORACIÓN DEL MANUAL DE USUARIO DE UN ORDENADOR FÍSICO (del Acer Economy)
    // Instanciamos el Builder específico que crea manuales de usuario (el UserManualBuilder)
    $builder = new UserManualBuilder();

    // Al director le asignamos el nuevo builder
    $director->changeBuilder($builder);

    // Fabricamos un manual de usuario para el Acer Economy
    $director->acerEconomy();

    // Obtenemos el manual de usuario fabricado
    $acerEconomyManual = $builder->getUserManual();

    // Imprimimos el manual
    echo $acerEconomyManual->printDescription() . PHP_EOL;
    
    // 9. EMISIÓN DE LA FACTURA DEL COSTE DE FABRICACIÓN DE UN ORDENADOR FÍSICO (del Acer Economy)
    // Instanciamos el Builder específico que crea facturas (el InvoiceBuilder)
    //$builder = new InvoiceBuilder();
    // Creamos un director (opcional) y le asignamos el builder que necesitamos
    //$director = new Director($builder);
    // Fabricamos una factura para el Acer Economy
    //$director->acerEconomy();
    // Obtenemos la factura fabricada
    //$acerEconomyInvoice = $builder->getInvoice();
