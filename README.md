# Tienda de una Consultoría Informática

En este proyecto se ha desarrollado una web para un comercio electrónico, en este caso una consultoría informática.

## Características del sitio (Nivel usuario)
- [x] Crear una página web con un diseño atractivo.
- [x] Facilitar al usuario login y registro.
- [x] La compra de productos, añadiendo al carrito y procesando el pago.
- [x] Mostrar los productos disponibles.
- [x] Filtrar los productos por categorías.
- [x] Mostrar información detallada de los productos.
- [ ] Almacenar los productos del carrito en la base de datos, para sincronizar el carrito entre diferentes dispositivos.
- [ ] Mostrar productos relacionados con el producto que se está viendo.
- [ ] Microblog para publicar noticias y novedades.
## Características del sitio (Nivel administrador)
- [x] Añadir, modificar y eliminar productos desde el panel de administración.
  - [x] Subir imágenes de los productos.
- [x] Añadir, modificar y eliminar categorías desde el panel de administración.
- [x] Modificar y eliminar usuarios desde el panel de administración.
- [x] Controlar el rol de acceso de los usuarios al panel de administración. 
- [ ] Otros roles de acceso al panel de administración, como encargado de posts, administrador o superadministrador.

## Requisitos

- Docker: [Instalación de Docker](https://docs.docker.com/get-docker/)
- XAMPP, LAMP o similares (necesitamos PHP y MySQL).

## Configuración
1. Crea los archivos docker-compose.yml y Dockerfile en un directorio vacío con el siguiente contenido:

- docker-compose.yml:
    ```yaml
    services:
      apache-php:
        build: .
          ports:
            - 8080:80
          depends_on:
            - db
          volumes:
            - ./src:/var/www/html
      db:
        image: mariadb
        environment:
          MARIADB_ROOT_PASSWORD: nerja123
          ports:
            - 3306:3306
          volumes:
            - ./db:/var/lib/mysql
      phpmyadmin:
        image: phpmyadmin
        ports:
          - 8081:80
    ```
- Dockerfile:
    ```Dockerfile
    FROM php:8.2-apache
    RUN docker-php-ext-install pdo pdo_mysql mysqli
    ```
2. Monta los contenedores de Docker:

    ```bash
    docker-compose up -d
    ```
3. Clona el repositorio:

    ```bash
    git clone https://github.com/Juan-A/Proyecto-Final-Entorno-Servidor.git
    ```
4. Mueve el contenido del directorio que acabas de clonar al directorio src:
    
        ```bash
        mv Proyecto-Final-Entorno-Servidor/* ./src/
        ```
5. Configura el acceso a la base de datos en el archivo inc/modules/database.php. Deberás modificar las siguientes líneas con tus datos de acceso a la base de datos:

    ```php
    $db_user = "root";
    $db_password = "nerja123";
    $db_host = "db";
    $db_name = "proyectodef";
    ```
6. Importa la base de datos contenida en el archivo ``proyectodef.sql`` (situado en la raíz del proyecto) a la base de datos. Puedes hacerlo accediendo a la base de datos con phpMyAdmin o utilizando gestores como [DBBeaver](https://dbeaver.io/) (Recomendable) o MySQL Workbench. Los datos de acceso por defecto para el contenedor son los siguientes:
    - **Usuario:** root
    - **Contraseña:** nerja123

    ## Configuraciones Adicionales
    ### Correo Electrónico
     Puedes configurar el servicio de correo electrónico en el archivo ``processOrder.php``. Deberás modificar las siguientes líneas con tus datos de acceso al servicio de correo electrónico:

    ```php
    //Configuración de correo
    $from = returnSiteName();
    $server = "smtp.freesmtpservers.com";
    $port = 25;
    $user = returnSiteName() . "@shop.es";
    $password = "nerja123";
    $encType = "tls";
    $useEnc = false;
    ```
    *Por defecto, esta configuración de correo nos permite comprobar el funcionamiento de la web entrando a [WPOven](https://www.wpoven.com/tools/free-smtp-server-for-testing) accediendo con ``dotservices@shop.es`` sin necesidad de configurar un servicio de correo electrónico real. Si deseas configurar un servicio de correo electrónico, deberás modificar las líneas anteriores.*
### Rol de acceso al área de administración
Si deseas cambiar el rol mínimo para acceder al panel de administración, modifica la variable ``MINIMUM_ROLE`` en el archivo ``adminZone/adminConfig.php``:


## Uso

Para acceder a la web, abre un navegador y escribe la siguiente dirección:

```bash
http://localhost:8080
```
Puedes utilizar las siguientes credenciales para probar la web:
- **Usuario:** juanhcxd
- **Contraseña:** nerja123

## Licencia

Este proyecto está bajo la Licencia Pública General de GNU versión 3.0. Puedes encontrar una copia de la licencia en:
- [https://www.gnu.org/licenses/gpl-3.0.en.html](https://www.gnu.org/licenses/gpl-3.0.en.html)
