<a name="top"></a>

# 🏗️ El patrón Builder - Guía Completa

Repositorio creado para explicar el patrón **Builder** y su implementación mediante un ejemplo práctico en **PHP** (Tienda de ordenadores).

<br>

## 📖 Tabla de contenidos

<details>
  <summary>Mostrar contenidos</summary>
  <br>
  <ul>
    <li>🏭 <a href="#-el-patrón-abstract-factory">El patrón Builder</a>
      <ul>
        <li>💡 <a href="#-entendiendo-la-definición">Entendiendo la definición</a></li>
        <li>👨🏼‍🔧 <a href="#-aplicando-la-definición-a-un-caso-práctico-tienda-de-muebles">Aplicando la definición a un caso práctico: Tienda de Ordenadores</a></li>
        <li>🛂 <a href="#-elementos-obligatorios-que-debe-tener-un-patrón-abstract-factory">Elementos obligatorios que debe tener un patrón Builder</a></li>
        <li>🎯 <a href="#-qué-objetivos-se-buscan-al-aplicar-el-patrón-abstract-factory">¿Qué objetivos se buscan al aplicar el patrón Builder?</a></li>
        <li>👍🏼 <a href="#-aplicabilidad-del-patrón-abstract-factory">Aplicabilidad del patrón Builder</a></li>
      </ul>
    </li>
    <li>🧪 <a href="#-ejemplo-de-implementación-tienda-de-muebles">Ejemplo de implementación: Tienda de ordenadores</a>
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



<br>

### 💡 Entendiendo la definición

#### 🧩 Elementos principales

📌 

📌 

📌 

📌 

📌 

📌 

<br>

### 👨🏼‍🔧 Aplicando la definición a un caso práctico: Tienda de ordenadores



<br>

### 🛂 Elementos obligatorios que debe tener un patrón Builder

1️⃣ 

2️⃣ 

3️⃣ 

4️⃣ 

<br>

### 🎯 ¿Qué objetivos se buscan al aplicar el patrón Builder?

**📌 

**📌 

**📌 

<br>

### 👍🏼 Aplicabilidad del patrón Builder


<br>

[🔝](#top)

---

<br>

## 🧪 Ejemplo de implementación: Tienda de ordenadores

### 🎡 ¿Qué hace esta aplicación de ejemplo?


### 🔄 Flujo completo de esta aplicación de ejemplo


### 👉🏼 Identificación de los principales archivos del ejemplo

Debido a la complejidad del patrón y al número de clases, la estructura de archivos se ha organizado por carpetas (ver sección siguiente).

#### ➡️ Builder (Interface)
Ubicado en `src/Contracts`. Definen las "reglas del juego":
- `Builder.php`:

#### ➡️ Director
Ubicado en `src/Director`.

#### ➡️ Domain
Ubicado en `src/Domain`.

#### ➡️ Cliente
Ubicado en ...................


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
