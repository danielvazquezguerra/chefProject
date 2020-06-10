# Final Project Social Network .

Esta es mi primera red social, que fue diseñada para chefs y amantes de la cocina, donde pueden tener una base de datos de sus recetas y compartirla con otros usuarios. 

## Table of Content

- [Built With](##-Built-With)
- [Knowledge](##-Knowledge)
- [Getting Started](##-Getting-Started)
- [Partes](##-Partes)
- [Documentation](##-Documentation)
- [Author](##-Author)

## Built With 🛠️

* .Laravel
* MYSQLi
* JavaScript
* PHP

## Knowledge 🧠 

* React
* Typescript
* .Laravel
* PHP

## Getting Started 🚀 


### Clonando repositorio

```js
https://github.com/danielvazquezguerra/chefProject.git
```


### Instalación dependencias



COMPOSER
PHP
NODE

### Comenzando proyecto con Laravel

```php
laravel new yourprojectname
```
### Configuración Composer

```php
composer global require laravel/installer
```

### Arrancar el servidor

Para arrancar el servidor tienes que introducir el comando:

```
php artisan serve
``

**Tablas**

Schema::create('users', function (Blueprint  $table) {

$table->id(); 
$table->string('name'); 
$table->string('username')->nullable();
$table->string('password');
$table->string('imagen')->nullable()->default('icon.png');
$table->string('email')->unique();
$table->timestamps();
});

## Documentation 📚 

- [Laravel] [https://laravel.com/docs/7.x](https://laravel.com/docs/7.x)


## Author 👨🏼‍💻 

* **Daniel Vazquez Guerra** - [danielvazquezguerra](https://github.com/danielvazquezguerra)






