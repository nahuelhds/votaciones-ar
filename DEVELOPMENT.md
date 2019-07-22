# Notas de desarrollo

## Docker

Se utiliza [Laradock](https://laradock.io). Para ver cómo interactuar con el container, ver la [sección Usage](https://laradock.io/getting-started/#Usage)

## API Query builder

Para el filtrado de recursos del API, se utiliza [Spatie Laravel Query Builder](https://github.com/spatie/laravel-query-builder).

## Generación de la documentación

Para la generación de la documentación del API, se utiliza se utiliza [Laravel API Documentation Generator](https://laravel-apidoc-generator.readthedocs.io/en/latest/).

## Despliegue del proyecto

### MacOs

El proyecto utiliza Dinghy para que Docker funcione más rápido. Por ende antes de empezar es necesario:

```bash
# 1. Iniciar Docker desde la app
# 2. Iniciar Dinghy
dinghy up

# 3. Iniciar Laradock
cd .laradock-votaciones-ar
docker-compose up -d caddy mariadb
```

#### Si falla alguna imagen

Se recomienda recomponer la imagen viendo el ouput (sin el parámetro `-d`).

```bash
docker-compuse up --build [imagen]
```

## Comandos útiles

```bash
# Stop / remove all Docker containers
docker stop $(docker ps -a -q)
docker rm $(docker ps -a -q)

# Remove all images
docker rmi $(docker images -q) --force
```
