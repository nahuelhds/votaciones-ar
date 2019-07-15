# API de Votaciones de Argentina

REST API para consulta de votaciones de Argentina.

## Motivaciones

Diversión. Porque sí a los [Datos Abiertos](https://es.wikipedia.org/wiki/Datos_abiertos) y porque me interesa realizar minería de datos respecto de cómo vota cada legislador/a, los bloques, entre otras ideas. Sé que existen muchos blogs, analistas, consultoras, pero tenía ganas de poder responder a mis propias preguntas y sacar conclusiones a través del cruce de datos que me habilita tener toda esta información sistematizada.

## Sobre el proyecto

### Estado actual

Actualmente el API contiene información normalizada de las votaciones de la [Cámara de Diputados](https://votaciones.hcdn.gob.ar/). Dicha información fue obtenida a través de un bot generado exclusivamente para descargar, normalizar y sistematizar toda esa información en el proyecto [Votaciones de Diputados Argentina](https://github.com/nahuelhds/votaciones-diputados-argentina).

La idea es ir integrando otras fuentes de información y generar una web de consulta general, aunque desde otra perspectiva y con otros objetivos a los que actualmente ofrece el [buscador oficial de la Cámara de Diputados](https://votaciones.hcdn.gob.ar/).

### Roadmap

* Integrar otras fuentes de información de actividad parlamentaria, como ser las votaciones de la Cámara de Senadores, actividad por legislador/a (presentación de proyectos, actividad en comisiones, etc, etc).
* Análisis y minería de datos.
* Estadísticas y proyecciones.
* Web para humanos.
* Gamification.

### Sumate a codear

Si te interesa colaborar, contactate conmigo a través de [mi cuenta en Twitter](http://medium.com/@nahuelhds).

## Notas de desarrollo

Para el filtrado de recursos del API, se utiliza [Spatie Laravel Query Builder](https://github.com/spatie/laravel-query-builder).

Para la generación de la documentación del API, se utiliza se utiliza [Laravel API Documentation Generator](https://laravel-apidoc-generator.readthedocs.io/en/latest/).

---

## Apoyá el proyecto

Podés colaborar de formas muy sencillas.

* [Invitándome un café](https://ko-fi.com/nahuelhds)
* [Haciendo una pequeña donación a través PayPal](https://paypal.me/nahuelhds)
* [Conviertiéndote en Patreon del proyecto](https://www.patreon.com/nahuelhds)

## nahuelhds

Seguí mi actividad en:

* [Twitter](https://twitter.com/nahuelhds)
* [Instagram](https://www.instagram.com/programming.geek/)
* [Mi blog](https://nahuelhds.dev)

Comparto lo que escribo en:

* [DEV](https://dev.to/nahuelhds/)
* [Medium](http://medium.com/@nahuelhds)
