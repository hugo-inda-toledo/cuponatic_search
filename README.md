# Cuponatic Search

Servicio de búsqueda básico, el cual recibe una búsqueda como string y devuelve un json con los productos encontrados.

#Funciones

1. Busqueda: Web Service que al recibir una solicitud POST debe mostrar solo con HTML + Javascript el resultado de la busqueda
y debe devolver la información de los productos. Detalles: Al buscar con el servicio web, este autoincrementa el conteo cada véz que un cupón fue buscado, además incrementa el conteo de la palabra que fue buscada en una tabla llamada "search_stats" asociada al cupón correspondiente; en caso de no existir, genera una nueva fila con la palabra buscada e incrementa el conteo.

2. Estaditicas: Muestra los 20 productos más buscados y por cada producto las 5 palabras más usadas que hicieron aparecer dicho producto.

#Instalacion de la APP

1. Se debe montar la base de datos en el archivo .sql que se encuentra en la carpeta "sql" dentro de la raíz del proyecto.
2. Ingresar correctamente los parametros de conexión a la base de datos (De acuerdo al motor, host, usuario, password, puerto, etc) en el archivo "config/app.php"
3. Ingresar al servidor local por el navegador web (EJ: http://localhost:8888/cuponatic_search)

# CakePHP Application Skeleton

[![Build Status](https://img.shields.io/travis/cakephp/app/master.svg?style=flat-square)](https://travis-ci.org/cakephp/app)
[![License](https://img.shields.io/packagist/l/cakephp/app.svg?style=flat-square)](https://packagist.org/packages/cakephp/app)

A skeleton for creating applications with [CakePHP](https://cakephp.org) 3.x.

The framework source code can be found here: [cakephp/cakephp](https://github.com/cakephp/cakephp).

## Installation

1. Download [Composer](https://getcomposer.org/doc/00-intro.md) or update `composer self-update`.
2. Run `php composer.phar create-project --prefer-dist cakephp/app [app_name]`.

If Composer is installed globally, run

```bash
composer create-project --prefer-dist cakephp/app
```

In case you want to use a custom app dir name (e.g. `/myapp/`):

```bash
composer create-project --prefer-dist cakephp/app myapp
```

You can now either use your machine's webserver to view the default home page, or start
up the built-in webserver with:

```bash
bin/cake server -p 8765
```

Then visit `http://localhost:8765` to see the welcome page.

## Update

Since this skeleton is a starting point for your application and various files
would have been modified as per your needs, there isn't a way to provide
automated upgrades, so you have to do any updates manually.

## Configuration

Read and edit `config/app.php` and setup the `'Datasources'` and any other
configuration relevant for your application.

## Layout

The app skeleton uses a subset of [Foundation](http://foundation.zurb.com/) CSS
framework by default. You can, however, replace it with any other library or
custom styles.
