<a name="top"></a>

# 🏗️ El patrón Builder - Guía Completa

Repositorio creado para explicar el patrón **Builder** y su implementación mediante un ejemplo práctico en **PHP** (Tienda de ordenadores).

<br>

## 📖 Tabla de contenidos

<details>
  <summary>Mostrar contenidos</summary>
  <br>
  <ul>
    <li>🏭 <a href="#-el-patrón-builder">El patrón Builder</a>
      <ul>
        <li>💡 <a href="#-entendiendo-la-definición">Entendiendo la definición</a></li>
        <li>🛂 <a href="#-elementos-típicos-que-encontramos-en-un-patrón-builder">Elementos típicos que encontramos en un patrón Builder</a></li>
        <li>✅ <a href="#-aplicando-la-definición-a-un-caso-práctico-tienda-de-ordenadores">Aplicando la definición a un caso práctico: Tienda de Ordenadores</a></li>
        <li>👍🏼 <a href="#-cuándo-usar-el-patrón-builder">¿Cuándo usar el patrón Builder?</a></li>
        <li>🎯 <a href="#-qué-objetivos-se-buscan-al-aplicar-el-patrón-builder"> ¿Qué objetivos se buscan al aplicar el patrón Builder?</a></li>
      </ul>
    </li>
    <li>🧪 <a href="#-ejemplo-de-implementación-tienda-de-ordenadores">Ejemplo de implementación: Tienda de ordenadores</a>
      <ul>
        <li>🎡 <a href="#-qué-hace-esta-aplicación-de-ejemplo">¿Qué hace esta aplicación de ejemplo?</a></li>
        <li>🔄 <a href="#-flujo-completo-de-esta-aplicación-de-ejemplo">Flujo completo de esta aplicación de ejemplo</a></li>
        <li>👉🏼 <a href="#-identificación-de-los-principales-archivos-del-ejemplo">Identificación de los principales archivos del ejemplo</a></li>
      </ul>
    </li>
    <li>📂 <a href="#-estructura-del-proyecto-y-composer">Estructura del Proyecto y Composer</a></li>
    <li>📋 <a href="#-requisitos">Requisitos</a></li>
    <li>🚀 <a href="#-instalación-y-ejecución">Instalación y Ejecución</a></li>
  </ul>
</details>

---

<br>

## 🏭 El patrón Builder

**Builder** es un patrón de diseño **creacional** que externaliza la lógica de construcción de un **objeto complejo** fuera de su propia clase, sustituyendo la instanciación directa convencional por un **proceso de creación por pasos o fases**. Bajo este enfoque, la clase del producto deja de ser responsable de su propia fabricación detallada, delegando dicha tarea a una **entidad externa dedicada**.

Para ello, define una **interfaz o clase abstracta** `Builder` que declara los requisitos necesarios para construir un producto, delegando en las **clases que la implementan** `Builders Concretos` la responsabilidad de ejecutar cada fase y producir el **resultado final** `Producto concreto`.

Dicho resultado final puede ser tanto **productos complejos de la misma naturaleza** (de la misma clase), como **productos de naturalezas totalmente distintas** (clases diferentes). El único requisito es que todos ellos **compartan un mismo proceso de fabricación**, es decir, que todos ellos requieran de los mismos pasos o fases para ser construidos.

Este patrón permite crear objetos complejos paso a paso de forma organizada, evitando constructores con múltiples parámetros, utilizando una misma secuencia de órdenes, la cual puede **estar orquestada por una clase dedicada opcional** (`Director`) para **independizar** al `Cliente` de los detalles específicos de fabricación.

<br>

### 💡 Entendiendo la definición

Dado que este patrón es de tipo **creacional**, lo primero a tener en cuenta para comprenderlo bien es que se enfoca en la **creación de objetos** (producto concreto), al igual que otros patrones como el *Singleton*, el *Factory Method* o el *Abstract Factory*.

En el caso del patrón Builder, otro detalle fundamental que es los objetos en los que se enfoca son **objetos complejos**, es decir, objetos que requieren de **múltiples pasos para ser creados**. Suelen **tener muchas propiedades que pueden tomar diversos valores**, así como un **proceso de fabricación que implica varios métodos o pasos**.

Para objetos simples, lo normal es que ese objeto (producto concreto) se cree directamente desde el constructor de su propia clase `ProductoConcreto`, pasándole todos los parámetros necesarios para su creación. Sin embargo, cuando un objeto es muy complejo, con muchas propiedades y un proceso de fabricación largo y complicado, el constructor puede volverse muy grande y difícil de manejar.

En esos casos puede ser útil la aplicación del patrón Builder, para **extraer toda esa lógica de construcción fuera de la clase del objeto** `ProductoConcreto` y colocarla en una **clase dedicada** a ello, en un `BuilderConcreto`.

La creación del objeto como tal, sigue en manos del **constructor de la clase** `ProductoConcreto`, pero el patrón Builder nos permite recuperar ese objeto y aplicarle, externamente, todos los pasos necesarios para convertirlo en el objeto complejo final que necesitamos.

El objeto (producto concreto) se sigue basándose en una instrución de tipo new `ProductoConcreto()`, pero en lugar de que ésta produzca el producto final, generará una especie de *"producto concreto en bruto"*, al que posteriormente se le aplicarán todos los pasos necesarios para convertirlo en el *"producto concreto final"* que necesitamos.

Opcionalmente, la orquestación de todos esos pasos o fases del proceso de fabricación aplicadas al producto en bruto, puede estar a cargo de una **clase dedicada opcional* `Director` para independizar al `Cliente` de los detalles específicos de fabricación.

En este caso, suele ser habitual que el `Director` cuente con una serie de métodos que representan diferentes recetas o procesos de fabricación, cada uno de los cuales está compuesto por una secuencia específica de pasos que se aplican al producto en bruto para obtener un producto final diferente.

### 🧩 Elementos típicos que encontramos en un patrón Builder

1️⃣  **Interface Builder**

Es el contrato genérico que define los pasos de fabricación y que contiene todos los métodos que definen los pasos de fabricación y que deben ser implementados por los Builders concretos.

Entre los métodos que incluye, típicamente suele contener un método `reset()`, que sirve para:
- que cada Builder concreto pueda inicializar ese objeto bruto sobre el que se está construyendo (el ordenador, el manual de usuario o la factura), y para
- resetear o reiniciar cualquier otra propiedad que nos interese en el objeto bruto (como es el caso del array de extras en el ejemplo de la tienda de ordenadores).

2️⃣ **BuilderConcreto**

Son **clases** que **implementan la interfaz Builder** y que definen los pasos de fabricación de los objetos del tipo a que corresponde ese builder concreto.

Es muy importante advertir dos cosas importantes:

- los **tipos de retorno de los métodos** que definen esos pasos de fabricación son **void**, porque lo que hacen es modificar el objeto bruto sobre el que se está construyendo (el ordenador, el manual de usuario o la factura)
- cada builder concreto **debe implementar un método que retorne el objeto final** que se está construyendo (el ordenador, el manual de usuario o la factura), pero **este método no suele estar declarado en la interfaz Builder**, porque si fuera así, allí tendría un tipo de retorno, pero en cada implementación de la interfaz Builder, el tipo de retorno sería diferente.

3️⃣ **Producto concreto**

Son **clases** que **representan los objetos concretos a construir**.

La aplicación de este patrón permite que **se puedan crear productos de naturalezas totalmente distintas (clases diferentes)**, siempre y cuando dichos objetos que pertenecen a esas clases diferentes compartan un **proceso de creación común**, definido por los métodos declarados en la interfaz Builder.

Por tanto, las diferentes clases que representan a esos productos concretos, **no tienen por qué tener nada en común entre sí** (pueden tener propiedades totalmente diferentes, incluso ninguna en común) excepto ese proceso de creación común.

> **Aclaración importante sobre la idea de lo que es un proceso de creación común o compartido**
>
> La interfaz Builder declara una serie de métodos o pasos de fabricación, y TODOS esos pasos o métodos DEBEN ser **útiles o relevantes para la creación de TODOS los objetos concretos** que se quieren crear con este patrón, pero eso no significa que para construir todos y cada uno de dichos objetos siempre haya que llamarlos a todos.
>
> Cada método debe ser susceptible de ser utilizado para cada objeto concreto, pero según cada caso, tal vez un objeto concreto no necesite llamar a alguno de ellos.
>
> Por ejemplo, en el caso de la tienda de ordenadores, no todos los ordenadores necesitan tarjeta gráfica (gpu), por lo que no todos los ordenadores necesitarán llamar al método `gpu()`, pero ese método, aunque en un determinado caso no se use, es relevante en general (no es un método inútil que NUNCA es necesario).
>
> Y esto se debe cumplir, sea cual sea la naturaleza de los objetos a construir. Si algún tipo de objeto no necesita NUNCA alguno de los métodos declarados en la interfaz Builder, pero otros objetos de otra naturaleza sí, entonces ese tipo de objeto no debería ser creado con este patrón.


4️⃣ **Director**

Esta es una clase opcional que define el orden de ejecución de los pasos para crear modelos predefinidos o predeterminados.

5️⃣ **Cliente**

Es la entidad que orquesta el uso del patrón para obtener los productos.

<br>

### ✅ Aplicando la definición a un caso práctico: Tienda de ordenadores

Imagina este patrón como la fabiración de un ordenador. La clase del objeto podría ser una clase `Computer`, que contendría todos los atributos o propiedades del ordenador, pero con este patrón Builder, esta clase sólo sería capaz de crear una especie de ordenador en bruto, mientras que todos los pasos para montarlo serían extraidos a una clase dedicada a ello `ComputerBuilder`, incluido un método para retornar el objeto final.

De esta manera, podríamos tener una clase `Computer` y una clase `ComputerBuilder`, con las que podríamos crear fácilmente diferentes ordenadores, es decir, diferentes objetos complejos de la misma naturaleza de la misma clase, `Computer`, siempre que todos ellos se creen mediante los mismos pasos, aunque haya una infinidad de variaciones de procesadores, RAM, SSD, etc.

Pero, además de esto, el patrón Builder nos permite crear productos de naturalezas totalmente distintas (clases diferentes), siempre y cuando dichos objetos que pertenecen a esas clases diferentes, compartan una misma secuencia de órdenes.

Por ejemplo, imagina que, además de fabricar ese ordenador, queramos crear un manual de cómo usar ese ordenador, destinado al usuario final o al departamento de soporte técnico, y/o una factura que refleje el coste de fabricación de dicho ordenador, destinada al departamento de contabilidad. Evidentemente, un ordenador, un manual de instrucciones o una factura, son objetos de naturaleza completamente diferentes, pero si comparten la misma secuencia de creación, el patrón Builder nos permitirá crearlos todos a partir de la misma secuencia de órdenes.

Así, tendríamos diferentes clases que representarían objetos de diferentes naturalezas, como `Computer`, `UserManual` e `Invoice`, cuya secuencia de creación sería la misma, la interface `Builder`, aunque con propiedades diferentes y con una implementación diferente de esos pasos comunes de fabricación, concretada cada una de ellas en cada uno de los builders concretos `ComputerBuilder`, `UserManualBuilder` y `InvoiceBuilder`.

<br>

### 👍🏼 ¿Cuándo usar el patrón Builder?

Los escenarios más típicos en los que nos puede interesar aplicar el patrón Builder son:

📌 **Constructores "telescópicos"**: cuando empiezas a tener constructores con demasiados parámetros opcionales que te obligan a pasar muchos null o crear múltiples versiones del constructor.

📌 **Procesos de creación por fases**: cuando el objeto no se puede (o no se debe) crear en un solo instante, sino que requiere obtener datos en distintos momentos (ej: un formulario web de varios pasos).

📌 **Necesidad de diferentes representaciones**: cuando el mismo conjunto de datos debe convertirse en objetos de clases distintas (ej: un objeto Pedido que debe generar un JSON para una API, un PDF para el cliente y un Registro para la DB).

📌 **Construcción de estructuras complejas**: cuando el producto final es un "árbol" de objetos donde unas piezas dependen de otras y el orden de montaje es crítico.

<br>

### 🎯 ¿Qué objetivos se buscan al aplicar el patrón Builder?

📌 **Evitar constructores gigantescos** con muchos parámetros cuando se trata de la creación de objetos complejos.

📌 **Legibilidad y semántica**: transformamos un constructor "mudo" con 10 parámetros en una secuencia de métodos con nombre que explican qué estamos haciendo.

📌 **Encapsulamiento de la complejidad**: la lógica de "cómo se monta" un objeto complejo no ensucia la clase del producto ni el código del cliente.

📌 **Flexibilidad de resultados**: permite obtener productos de naturalezas muy distintas (como el ordenador y su manual) manteniendo el mismo control sobre el proceso.

📌 **Integridad del objeto**: podemos validar que todas las piezas encajan correctamente antes de entregar el producto final, evitando objetos en "estado inconsistente".

<br>

[🔝](#top)

---

<br>

## 🧪 Ejemplo de implementación: Tienda de ordenadores

### 🎡 ¿Qué hace esta aplicación de ejemplo?

Simula el proceso de fabricación y venta en una tienda de informática.

El script principal `main.php` utiliza el cliente `ComputerShop` para procesar diferentes pedidos, demostrando cómo el patrón **Builder** permite gestionar la construcción de objetos complejos y sus diversas representaciones (objetos de distinta naturaleza o clases) de forma limpia y organizada:

- **Construcción de modelos predefinidos**: Solicita la fabricación de equipos con configuraciones específicas (ej: `macBookPro`, `gamingPro`) delegando el orden de los pasos en el `Director`.
- **Generación de productos de distinta naturaleza**: Muestra cómo el mismo proceso de construcción puede producir un objeto `Computer`, un `UserManual` o una `Invoice` simplemente cambiando el `Builder` utilizado, manteniendo intacta la lógica de orquestación.
- **Abstracción del proceso**: El cliente solicita los productos finales sin conocer los detalles internos de montaje ni las clases concretas de cada pieza, interactuando únicamente con el `Director` y la interfaz del `Builder`.

La aplicación refleja la utilidad del patrón **Builder** al separar el **proceso de construcción** de la **representación final** del objeto, permitiendo que un mismo algoritmo de fabricación, en el `Director`, sirva para crear productos de tipos totalmente distintos.

### 🔄 Flujo completo de esta aplicación de ejemplo

1.  **Instanciación del Cliente**: En `main.php` se crea una instancia de la `ComputerShop`, que actúa como una capa de abstracción (*Facade*) que encapsula la interacción entre el Director y los Builders, ofreciendo una interfaz sencilla al usuario final."
    ```php
    $shop = new ComputerShop();
    ```
2.  **Petición del Producto**: El script principal solicita un producto específico (ej. un ordenador, un manual o una factura) indicando el modelo.
    ```php
    $computerMac = $shop->sellComputer('macBookPro');
    $manualMac   = $shop->generateManual('macBookPro');
    $invoiceMac  = $shop->generateInvoice('macBookPro');
    ```
3.  **Selección de Builder e Inyección**: Internamente, `ComputerShop` selecciona el `Builder` adecuado (ej. `ComputerBuilder`) y lo inyecta en el `Director`.
    ```php
    $builder = new ComputerBuilder();
    $director = new Director($builder);
    ```
4.  **Orquestación de la construcción**: El cliente solicita al `Director` que ejecute el proceso de fabricación correspondiente al modelo. Para ello, se utiliza un recurso de PHP llamado **"Métodos de variable"**, que permite invocar dinámicamente el método del `Director` que coincide con el nombre del modelo.
    ```php
    $director->$model(); // El valor de $model determina qué método se ejecuta
    ```
Por ejemplo, para el caso del modelo `macBookPro`, se invocaría el método `macBookPro()` del `Director`, con lo que la instrucción anterior equivaldría a:
    ```php
    $director->macBookPro();
    ```
5.  **Resultado final**: `ComputerShop` recupera el producto terminado desde el `Builder` y lo entrega al script principal, totalmente configurado.
    ```php
    return $builder->getComputer();
    ```
### 👉🏼 Identificación de los principales archivos del ejemplo

Debido a la complejidad del patrón y al número de clases, la estructura de archivos se ha organizado por carpetas (ver sección siguiente).

#### ➡️ Builder (Interface)
Ubicado en `src/Contracts`.
- `Builder.php`

#### ➡️ Builder concretos
Ubicado en `src/Domain`.
- `ComputerBuilder.php`
- `UserManualBuilder.php`
- `InvoiceBuilder.php`

#### ➡️ Productos concretos
Ubicado en `src/Domain`.
- `Computer.php`
- `UserManual.php`
- `Invoice.php`

#### ➡️ Director
Ubicado en `src/Director`.
- `Director.php`

#### ➡️ Cliente
Ubicado en `src/Client`.
- `Client.php`

<br>

[🔝](#top)

---

<br>

## 📂 Estructura del Proyecto y Composer

A diferencia de ejemplos más simples donde todos los archivos están en la raíz, aquí hemos dado avanzado paso hacia una estructura profesional de PHP moderna.

### 1. Organización del código en `src/`

Para mantener el orden, ya que el patrón Builder genera muchas clases, hemos movido todo el código fuente a la carpeta `src/`.
Dentro, hemos agrupado las clases por su función o dominio:
- `src/Contracts`: 
- `src/Director`: 
- `src/Domain`: 
- `src/Client`: 

### 2. Autocarga con Composer (PSR-4)

En lugar de tener una lista interminable de `require "archivo.php"` en nuestro `main.php`, utilizamos **Composer** para la carga automática de clases.

El archivo `composer.json` define el mapeo:
```json
"autoload": {
    "psr-4": {
        "App\\": "src/"
    }
}
```
Esto significa que cualquier clase con el namespace que empiece por `App\` será buscada automáticamente por PHP dentro de la carpeta `src/`. Por ejemplo, la clase `App\Domain\Computer\Computer.php` se buscará en `src/Domain/Computer/Computer.php`.

Gracias a esto, en nuestro `main.php` solo necesitamos una línea para cargar TODO el proyecto:
```php
require "vendor/autoload.php";
```

<br>

[🔝](#top)

---

<br>

## 📋 Requisitos

- **PHP 8.0** o superior.
- **[Composer](https://getcomposer.org/)**: Necesario para generar el mapa de clases (autoload).

<br>

## 🚀 Instalación y Ejecución

### 1. Instalación

1.  Clona este repositorio o descarga los archivos.
2.  Abre una terminal en la carpeta raíz del proyecto.
3.  Ejecuta el siguiente comando para generar la carpeta `vendor` y el autoloader:

    ```bash
    composer dump-autoload
    ```
    > 💡 **Nota**: Como este proyecto no tiene dependencias de librerías externas (solo usamos Composer para el autoload), basta con `composer dump-autoload`. Si hubiera librerías en `require`, usaríamos `composer install`.

### 2. Ejecución

Tienes dos alternativas para visualizar el resultado de la aplicación:
- visualizando los resultados mediante el **navegador** (con XAMPP o con un servidor web local).
- directamente desde la **terminal**, en texto plano, ejecutando el archivo principal, `main.php`.

#### 🖥️ Para ejecutarlo mediante la Terminal:

1. Abre la terminal y navega a la carpeta de tu proyecto, por ejemplo:

```bash
cd ~/Documentos/Proyectos/patrones/builder
```

2. Ejecuta, desde esa ubicación, el archivo main.php:

```bash
php main.php
```

#### 🌐 Para ejecutarlo mediante XAMPP:

1. Mueve la carpeta del proyecto a la carpeta htdocs (o equivalente según la versión de XAMPP y sistema operativo que uses).
2. Arranca XAMPP.
3. Accede a index.php desde tu navegador (por ejemplo: http://localhost/patrones/builder/index.php)

#### 🌐 Para ejecutarlo usando el servidor web interno de PHP

PHP trae un servidor web ligero que sirve para desarrollo. No necesitas instalar Apache ni XAMPP.

1. Abre la terminal y navega a la carpeta de tu proyecto:

```bash
cd ~/Documentos/.../patrones/builder
```
2. Dentro de esa ubicación, ejecuta:

```bash
php -S localhost:8000
```

>💡 No es obligatorio usar el puerto 8000, puedes usar el que desees, por ejemplo, el 8001.

Con esto, lo que estás haciendo es crear un servidor web php (cuya carpeta raíz es la carpeta seleccionada), que está escuchando en el puerto 8000 (o en el que hayas elegido).

>💡 Si quisieras, podrías crear simultáneamente tantos servidores como proyectos tengas en tu ordenador, siempre y cuando cada uno estuviera escuchando en un puerto diferente (8001, 8002, ...).

3. Ahora, abre tu navegador y accede a http://localhost:8000

Ya podrás visualizar el documento index.php con toda la información del ejemplo.

>💡 No es necesario indicar `http://localhost:8000/index.php` porque el servidor va a buscar dentro de la carpeta raíz (en este caso, en Documentos/.../patrones/builder), un archivo index.php o index.html de forma automática. Si existe, lo sirve como página principal.
>
> Por eso, estas dos URLs funcionan igual:
>
> http://localhost:8000
>
> http://localhost:8000/index.php


<br>

[🔝](#top)
