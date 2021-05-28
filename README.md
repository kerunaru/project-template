# project-template

Plantilla base para nuevos proyectos

## Requisitos

- PHP en, al menos, su versión 7.4.
- [Composer](https://www.getcomposer.com).

## Construcción

```
$ make build
```

Esto ejecutará el comando `composer install`.

## Levantar el sitio web

```
$ make server
```

Esto ejecutará el comando `php -S 0.0.0.0:8888 -t public`.
El sitio web estará disponible en [0.0.0.0:8888](http://0.0.0.0:8888)

## Pruebas

```
$ make tests
```

Esto lanzará todas las pruebas ubicadas en la carpeta `test`.

## Despliegues

Antes de intentar ejecutar un despliegue de la aplicación, debes configurar el archivo `deploy.php`.
Para más información visita [la web de deployer](https://deployer.org).

```
$ make deploy
```
