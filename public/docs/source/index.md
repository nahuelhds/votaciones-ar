---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost/docs/collection.json)

<!-- END_INFO -->

#general
<!-- START_91aeb85daa7d2136e84c4e9e1ef3475e -->
## Listado de legisladores

> Example request:

```bash
curl -X GET -G "/api/v1/legislators" 
```

```javascript
const url = new URL("/api/v1/legislators");

    let params = {
            "filter[last_name]": "",
            "filter[name]": "",
            "filter[original_id]": "",
            "filter[party_id]": "",
            "filter[region_id]": "",
            "filter[type]": "",
            "include": "",
            "sort": "",
            "page": "",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 1,
            "name": "Néstor Carlos",
            "last_name": "KIRCHNER",
            "type": "deputy",
            "party_id": 1,
            "region_id": 1,
            "first_activity_at": "2010-08-11 21:09:14",
            "last_activity_at": "2010-10-13 20:32:06",
            "profile_url": "https:\/\/votaciones.hcdn.gob.ar\/diputado\/893",
            "photo_url": "https:\/\/votaciones.hcdn.gob.ar\/public\/diputados\/images\/A4815.jpg",
            "original_id": 893,
            "created_at": "2019-03-21 03:08:28",
            "updated_at": "2019-07-09 11:15:37",
            "deleted_at": null
        },
        {
            "id": 2,
            "name": "Cristina",
            "last_name": "FERNANDEZ de KIRCHNER",
            "type": "deputy",
            "party_id": 2,
            "region_id": 20,
            "first_activity_at": "1997-12-17 21:09:00",
            "last_activity_at": "2001-11-29 01:09:00",
            "profile_url": "https:\/\/votaciones.hcdn.gob.ar\/diputado\/794",
            "photo_url": "https:\/\/votaciones.hcdn.gob.ar\/public\/diputados\/images\/A3774.jpg",
            "original_id": 794,
            "created_at": "2019-03-21 03:08:28",
            "updated_at": "2019-07-08 19:16:37",
            "deleted_at": null
        },
        {
            "id": 3,
            "name": "Angel Leonidas",
            "last_name": "ABASTO",
            "type": "deputy",
            "party_id": 2,
            "region_id": 1,
            "first_activity_at": "1993-12-22 05:36:00",
            "last_activity_at": "2001-11-29 01:09:00",
            "profile_url": "https:\/\/votaciones.hcdn.gob.ar\/diputado\/597",
            "photo_url": "https:\/\/votaciones.hcdn.gob.ar\/public\/diputados\/images\/A2965.jpg",
            "original_id": 597,
            "created_at": "2019-03-21 03:09:25",
            "updated_at": "2019-07-08 19:16:35",
            "deleted_at": null
        },
        {
            "id": 4,
            "name": "Carlos Enrique",
            "last_name": "ABIHAGGLE",
            "type": "deputy",
            "party_id": 2,
            "region_id": 13,
            "first_activity_at": "1993-12-22 05:36:00",
            "last_activity_at": "1997-03-20 01:21:00",
            "profile_url": "https:\/\/votaciones.hcdn.gob.ar\/diputado\/1414",
            "photo_url": "https:\/\/votaciones.hcdn.gob.ar\/public\/diputados\/images\/G230.jpg",
            "original_id": 1414,
            "created_at": "2019-03-21 03:09:25",
            "updated_at": "2019-07-08 19:15:43",
            "deleted_at": null
        },
        {
            "id": 5,
            "name": "Florencio G.",
            "last_name": "ACEÑOLAZA",
            "type": "deputy",
            "party_id": 2,
            "region_id": 24,
            "first_activity_at": "1993-06-23 21:26:00",
            "last_activity_at": "1995-12-08 08:14:00",
            "profile_url": "https:\/\/votaciones.hcdn.gob.ar\/diputado\/1198",
            "photo_url": "https:\/\/votaciones.hcdn.gob.ar\/public\/diputados\/images\/G14.jpg",
            "original_id": 1198,
            "created_at": "2019-03-21 03:09:25",
            "updated_at": "2019-07-08 19:09:50",
            "deleted_at": null
        },
        {
            "id": 6,
            "name": "Antonio",
            "last_name": "ACHEM",
            "type": "deputy",
            "party_id": 3,
            "region_id": 18,
            "first_activity_at": "1993-06-23 21:26:00",
            "last_activity_at": "1995-12-08 08:14:00",
            "profile_url": "https:\/\/votaciones.hcdn.gob.ar\/diputado\/1309",
            "photo_url": "https:\/\/votaciones.hcdn.gob.ar\/public\/diputados\/images\/G125.jpg",
            "original_id": 1309,
            "created_at": "2019-03-21 03:09:25",
            "updated_at": "2019-07-08 19:09:50",
            "deleted_at": null
        },
        {
            "id": 7,
            "name": "Felipe Teófilo",
            "last_name": "ADAIME",
            "type": "deputy",
            "party_id": 4,
            "region_id": 7,
            "first_activity_at": "1993-06-23 21:26:00",
            "last_activity_at": "1999-09-22 22:49:00",
            "profile_url": "https:\/\/votaciones.hcdn.gob.ar\/diputado\/1245",
            "photo_url": "https:\/\/votaciones.hcdn.gob.ar\/public\/diputados\/images\/G61.jpg",
            "original_id": 1245,
            "created_at": "2019-03-21 03:09:25",
            "updated_at": "2019-07-08 19:18:43",
            "deleted_at": null
        },
        {
            "id": 8,
            "name": "Alberto Gustavo",
            "last_name": "ALBAMONTE",
            "type": "deputy",
            "party_id": 2,
            "region_id": 1,
            "first_activity_at": "1993-06-23 21:26:00",
            "last_activity_at": "1995-12-08 08:14:00",
            "profile_url": "https:\/\/votaciones.hcdn.gob.ar\/diputado\/1311",
            "photo_url": "https:\/\/votaciones.hcdn.gob.ar\/public\/diputados\/images\/G127.jpg",
            "original_id": 1311,
            "created_at": "2019-03-21 03:09:25",
            "updated_at": "2019-07-08 19:09:50",
            "deleted_at": null
        },
        {
            "id": 9,
            "name": "Juan Carlos",
            "last_name": "ALBERTI",
            "type": "deputy",
            "party_id": 6,
            "region_id": 1,
            "first_activity_at": "1993-06-23 21:26:00",
            "last_activity_at": "1995-12-08 08:14:00",
            "profile_url": "https:\/\/votaciones.hcdn.gob.ar\/diputado\/1248",
            "photo_url": "https:\/\/votaciones.hcdn.gob.ar\/public\/diputados\/images\/G64.jpg",
            "original_id": 1248,
            "created_at": "2019-03-21 03:09:25",
            "updated_at": "2019-07-08 19:09:50",
            "deleted_at": null
        },
        {
            "id": 10,
            "name": "Nestor Ricardo",
            "last_name": "ALCALA",
            "type": "deputy",
            "party_id": 2,
            "region_id": 11,
            "first_activity_at": "1993-06-23 21:26:00",
            "last_activity_at": "1995-12-08 08:14:00",
            "profile_url": "https:\/\/votaciones.hcdn.gob.ar\/diputado\/1199",
            "photo_url": "https:\/\/votaciones.hcdn.gob.ar\/public\/diputados\/images\/G15.jpg",
            "original_id": 1199,
            "created_at": "2019-03-21 03:09:25",
            "updated_at": "2019-07-08 19:09:50",
            "deleted_at": null
        },
        {
            "id": 11,
            "name": "Oscar Eduardo",
            "last_name": "ALENDE",
            "type": "deputy",
            "party_id": 7,
            "region_id": 1,
            "first_activity_at": "1993-06-23 21:26:00",
            "last_activity_at": "1996-12-13 00:49:00",
            "profile_url": "https:\/\/votaciones.hcdn.gob.ar\/diputado\/1249",
            "photo_url": "https:\/\/votaciones.hcdn.gob.ar\/public\/diputados\/images\/G65.jpg",
            "original_id": 1249,
            "created_at": "2019-03-21 03:09:25",
            "updated_at": "2019-07-08 19:13:00",
            "deleted_at": null
        },
        {
            "id": 12,
            "name": "Ernesto Pedro",
            "last_name": "ALGABA",
            "type": "deputy",
            "party_id": 6,
            "region_id": 21,
            "first_activity_at": "1993-06-23 21:26:00",
            "last_activity_at": "1995-12-08 08:14:00",
            "profile_url": "https:\/\/votaciones.hcdn.gob.ar\/diputado\/1250",
            "photo_url": "https:\/\/votaciones.hcdn.gob.ar\/public\/diputados\/images\/G66.jpg",
            "original_id": 1250,
            "created_at": "2019-03-21 03:09:25",
            "updated_at": "2019-07-08 19:09:50",
            "deleted_at": null
        },
        {
            "id": 13,
            "name": "Albaro Carlos",
            "last_name": "ALSOGARAY",
            "type": "deputy",
            "party_id": 5,
            "region_id": 2,
            "first_activity_at": "1993-06-23 21:26:00",
            "last_activity_at": "1999-09-22 22:49:00",
            "profile_url": "https:\/\/votaciones.hcdn.gob.ar\/diputado\/1243",
            "photo_url": "https:\/\/votaciones.hcdn.gob.ar\/public\/diputados\/images\/G59.jpg",
            "original_id": 1243,
            "created_at": "2019-03-21 03:09:25",
            "updated_at": "2019-07-08 19:18:43",
            "deleted_at": null
        },
        {
            "id": 14,
            "name": "Raul A.",
            "last_name": "ALVAREZ ECHAGUE",
            "type": "deputy",
            "party_id": 2,
            "region_id": 1,
            "first_activity_at": "1993-06-23 21:26:00",
            "last_activity_at": "1999-09-22 22:49:00",
            "profile_url": "https:\/\/votaciones.hcdn.gob.ar\/diputado\/1314",
            "photo_url": "https:\/\/votaciones.hcdn.gob.ar\/public\/diputados\/images\/G130.jpg",
            "original_id": 1314,
            "created_at": "2019-03-21 03:09:25",
            "updated_at": "2019-07-08 19:18:43",
            "deleted_at": null
        },
        {
            "id": 15,
            "name": "Normando",
            "last_name": "ALVAREZ GARCIA",
            "type": "deputy",
            "party_id": 6,
            "region_id": 10,
            "first_activity_at": "1993-06-23 21:26:00",
            "last_activity_at": "1999-09-22 22:49:00",
            "profile_url": "https:\/\/votaciones.hcdn.gob.ar\/diputado\/1251",
            "photo_url": "https:\/\/votaciones.hcdn.gob.ar\/public\/diputados\/images\/G67.jpg",
            "original_id": 1251,
            "created_at": "2019-03-21 03:09:25",
            "updated_at": "2019-07-08 19:18:43",
            "deleted_at": null
        }
    ],
    "links": {
        "first": "http:\/\/localhost\/api\/v1\/legislators?page=1",
        "last": "http:\/\/localhost\/api\/v1\/legislators?page=118",
        "prev": null,
        "next": "http:\/\/localhost\/api\/v1\/legislators?page=2"
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 118,
        "path": "http:\/\/localhost\/api\/v1\/legislators",
        "per_page": 15,
        "to": 15,
        "total": 1757
    }
}
```

### HTTP Request
`GET api/v1/legislators`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    filter[last_name] |  optional  | Parcial. Apellido del legislador.
    filter[name] |  optional  | Parcial. Nombre del legislador.
    filter[original_id] |  optional  | Exacto. ID con el cual figura en la página oficial.
    filter[party_id] |  optional  | Exacto. ID del bloque al que pertenece actualmente.
    filter[region_id] |  optional  | Exacto. ID de la región a la que pertenece actualmente.
    filter[type] |  optional  | Exacto. Cargo actual. Valores: deputy, senator.
    include |  optional  | Entidades: party, region.
    sort |  optional  | Campo de ordenamiento. Por defecto ASC. Si se antepone "-" se ordena DESC.
    page |  optional  | Número de página.

<!-- END_91aeb85daa7d2136e84c4e9e1ef3475e -->

<!-- START_6c1cc684eb8408e56f36cc76f78ca353 -->
## Legislador

> Example request:

```bash
curl -X GET -G "/api/v1/legislators/1" 
```

```javascript
const url = new URL("/api/v1/legislators/1");

    let params = {
            "include": "",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "id": 1,
    "name": "Néstor Carlos",
    "last_name": "KIRCHNER",
    "type": "deputy",
    "party_id": 1,
    "region_id": 1,
    "first_activity_at": "2010-08-11 21:09:14",
    "last_activity_at": "2010-10-13 20:32:06",
    "profile_url": "https:\/\/votaciones.hcdn.gob.ar\/diputado\/893",
    "photo_url": "https:\/\/votaciones.hcdn.gob.ar\/public\/diputados\/images\/A4815.jpg",
    "original_id": 893,
    "created_at": "2019-03-21 03:08:28",
    "updated_at": "2019-07-09 11:15:37",
    "deleted_at": null
}
```

### HTTP Request
`GET api/v1/legislators/{legislator}`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    include |  optional  | Entidades: party, region.

<!-- END_6c1cc684eb8408e56f36cc76f78ca353 -->

<!-- START_ae7e81f8093dc7280ff0c2c2930d2c1f -->
## Listado de votos

> Example request:

```bash
curl -X GET -G "/api/v1/legislators/1/votes" 
```

```javascript
const url = new URL("/api/v1/legislators/1/votes");

    let params = {
            "filter[legislator_id]": "",
            "filter[party_id]": "",
            "filter[region_id]": "",
            "filter[video_url]": "",
            "filter[vote]": "",
            "filter[vote_raw]": "",
            "filter[voting_id]": "",
            "include": "",
            "sort": "",
            "page": "",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 345525,
            "voting_id": 1345,
            "legislator_id": 1,
            "party_id": 1,
            "region_id": 1,
            "vote": null,
            "vote_raw": "AUSENTE",
            "video_url": null,
            "created_at": "2019-03-21 14:22:36",
            "updated_at": "2019-03-21 14:22:36",
            "deleted_at": null
        },
        {
            "id": 345782,
            "voting_id": 1346,
            "legislator_id": 1,
            "party_id": 1,
            "region_id": 1,
            "vote": null,
            "vote_raw": "AUSENTE",
            "video_url": null,
            "created_at": "2019-03-21 14:22:40",
            "updated_at": "2019-03-21 14:22:40",
            "deleted_at": null
        },
        {
            "id": 346039,
            "voting_id": 1347,
            "legislator_id": 1,
            "party_id": 1,
            "region_id": 1,
            "vote": null,
            "vote_raw": "AUSENTE",
            "video_url": null,
            "created_at": "2019-03-21 14:22:43",
            "updated_at": "2019-03-21 14:22:43",
            "deleted_at": null
        },
        {
            "id": 346296,
            "voting_id": 1348,
            "legislator_id": 1,
            "party_id": 1,
            "region_id": 1,
            "vote": null,
            "vote_raw": "AUSENTE",
            "video_url": null,
            "created_at": "2019-03-21 14:22:47",
            "updated_at": "2019-03-21 14:22:47",
            "deleted_at": null
        },
        {
            "id": 346553,
            "voting_id": 1349,
            "legislator_id": 1,
            "party_id": 1,
            "region_id": 1,
            "vote": null,
            "vote_raw": "AUSENTE",
            "video_url": null,
            "created_at": "2019-03-21 14:22:50",
            "updated_at": "2019-03-21 14:22:50",
            "deleted_at": null
        },
        {
            "id": 346810,
            "voting_id": 1350,
            "legislator_id": 1,
            "party_id": 1,
            "region_id": 1,
            "vote": null,
            "vote_raw": "AUSENTE",
            "video_url": null,
            "created_at": "2019-03-21 14:22:54",
            "updated_at": "2019-03-21 14:22:54",
            "deleted_at": null
        },
        {
            "id": 347068,
            "voting_id": 1351,
            "legislator_id": 1,
            "party_id": 1,
            "region_id": 1,
            "vote": null,
            "vote_raw": "AUSENTE",
            "video_url": null,
            "created_at": "2019-03-21 14:22:57",
            "updated_at": "2019-03-21 14:22:57",
            "deleted_at": null
        },
        {
            "id": 347325,
            "voting_id": 1352,
            "legislator_id": 1,
            "party_id": 1,
            "region_id": 1,
            "vote": null,
            "vote_raw": "AUSENTE",
            "video_url": null,
            "created_at": "2019-03-21 14:23:00",
            "updated_at": "2019-03-21 14:23:00",
            "deleted_at": null
        },
        {
            "id": 347582,
            "voting_id": 1353,
            "legislator_id": 1,
            "party_id": 1,
            "region_id": 1,
            "vote": null,
            "vote_raw": "AUSENTE",
            "video_url": null,
            "created_at": "2019-03-21 14:23:04",
            "updated_at": "2019-03-21 14:23:04",
            "deleted_at": null
        },
        {
            "id": 347839,
            "voting_id": 1354,
            "legislator_id": 1,
            "party_id": 1,
            "region_id": 1,
            "vote": null,
            "vote_raw": "AUSENTE",
            "video_url": null,
            "created_at": "2019-03-21 14:23:08",
            "updated_at": "2019-03-21 14:23:08",
            "deleted_at": null
        },
        {
            "id": 348096,
            "voting_id": 1355,
            "legislator_id": 1,
            "party_id": 1,
            "region_id": 1,
            "vote": null,
            "vote_raw": "AUSENTE",
            "video_url": null,
            "created_at": "2019-03-21 14:23:11",
            "updated_at": "2019-03-21 14:23:11",
            "deleted_at": null
        },
        {
            "id": 348353,
            "voting_id": 1356,
            "legislator_id": 1,
            "party_id": 1,
            "region_id": 1,
            "vote": null,
            "vote_raw": "AUSENTE",
            "video_url": null,
            "created_at": "2019-03-21 14:23:15",
            "updated_at": "2019-03-21 14:23:15",
            "deleted_at": null
        },
        {
            "id": 348610,
            "voting_id": 1357,
            "legislator_id": 1,
            "party_id": 1,
            "region_id": 1,
            "vote": null,
            "vote_raw": "AUSENTE",
            "video_url": null,
            "created_at": "2019-03-21 14:23:18",
            "updated_at": "2019-03-21 14:23:18",
            "deleted_at": null
        },
        {
            "id": 348867,
            "voting_id": 1358,
            "legislator_id": 1,
            "party_id": 1,
            "region_id": 1,
            "vote": null,
            "vote_raw": "AUSENTE",
            "video_url": null,
            "created_at": "2019-03-21 14:23:22",
            "updated_at": "2019-03-21 14:23:22",
            "deleted_at": null
        },
        {
            "id": 349124,
            "voting_id": 1359,
            "legislator_id": 1,
            "party_id": 1,
            "region_id": 1,
            "vote": null,
            "vote_raw": "AUSENTE",
            "video_url": null,
            "created_at": "2019-03-21 14:23:25",
            "updated_at": "2019-03-21 14:23:25",
            "deleted_at": null
        }
    ],
    "links": {
        "first": "http:\/\/localhost\/api\/v1\/legislators\/1\/votes?page=1",
        "last": "http:\/\/localhost\/api\/v1\/legislators\/1\/votes?page=4",
        "prev": null,
        "next": "http:\/\/localhost\/api\/v1\/legislators\/1\/votes?page=2"
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 4,
        "path": "http:\/\/localhost\/api\/v1\/legislators\/1\/votes",
        "per_page": 15,
        "to": 15,
        "total": 51
    }
}
```

### HTTP Request
`GET api/v1/legislators/{legislator}/votes`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    filter[legislator_id] |  optional  | Exacto. ID del legislador que votó.
    filter[party_id] |  optional  | Exacto. ID del bloque por el cual votó.
    filter[region_id] |  optional  | Exacto. ID de la región por la cual votó.
    filter[video_url] |  optional  | Parcial. URL del video provisto por el sitio oficial.
    filter[vote] |  optional  | Parcial. Voto. Valores: "affirmative", "negative", "abstention" o `null`.
    filter[vote_raw] |  optional  | Parcial. Voto en texto crudo tal como figura en el sitio oficial.
    filter[voting_id] |  optional  | Exacto. ID de la votación.
    include |  optional  | Entidades: legislator, party, region, voting.
    sort |  optional  | Campo de ordenamiento. Por defecto ASC. Si se antepone "-" se ordena DESC.
    page |  optional  | Número de página.

<!-- END_ae7e81f8093dc7280ff0c2c2930d2c1f -->

<!-- START_a225d65d2502b0e5edd7b66a4715148f -->
## Voto

> Example request:

```bash
curl -X GET -G "/api/v1/legislators/1/votes/345525" 
```

```javascript
const url = new URL("/api/v1/legislators/1/votes/345525");

    let params = {
            "include": "",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "id": 345525,
    "voting_id": 1345,
    "legislator_id": 1,
    "party_id": 1,
    "region_id": 1,
    "vote": null,
    "vote_raw": "AUSENTE",
    "video_url": null,
    "created_at": "2019-03-21 14:22:36",
    "updated_at": "2019-03-21 14:22:36",
    "deleted_at": null
}
```

### HTTP Request
`GET api/v1/legislators/{legislator}/votes/{vote}`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    include |  optional  | Entidades: legislator, party, region, voting.

<!-- END_a225d65d2502b0e5edd7b66a4715148f -->

<!-- START_376e7ef8a9d5b602e19b713fb35c2e95 -->
## Listado de bloques

> Example request:

```bash
curl -X GET -G "/api/v1/parties" 
```

```javascript
const url = new URL("/api/v1/parties");

    let params = {
            "filter[name]": "",
            "include": "",
            "sort": "",
            "page": "",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 1,
            "name": "Frente para la Victoria - PJ",
            "first_activity_at": "2005-12-06 16:16:00",
            "last_activity_at": "2019-05-22 00:00:00",
            "created_at": "2019-03-21 03:08:28",
            "updated_at": "2019-07-09 19:31:14",
            "deleted_at": null
        },
        {
            "id": 2,
            "name": "Justicialista",
            "first_activity_at": "1993-06-23 21:26:00",
            "last_activity_at": "2019-05-22 00:00:00",
            "created_at": "2019-03-21 03:08:28",
            "updated_at": "2019-07-08 17:47:16",
            "deleted_at": null
        },
        {
            "id": 3,
            "name": "Cruzada Renovadora",
            "first_activity_at": "1993-06-23 21:26:00",
            "last_activity_at": "2006-12-07 02:05:00",
            "created_at": "2019-03-21 03:09:25",
            "updated_at": "2019-07-09 19:30:39",
            "deleted_at": null
        },
        {
            "id": 4,
            "name": "Autonomista de Corrientes",
            "first_activity_at": "1993-06-23 21:26:00",
            "last_activity_at": "2003-12-04 17:47:00",
            "created_at": "2019-03-21 03:09:25",
            "updated_at": "2019-07-08 19:21:53",
            "deleted_at": null
        },
        {
            "id": 5,
            "name": "Unión Centro Democrático",
            "first_activity_at": "1993-06-23 21:26:00",
            "last_activity_at": "1999-09-22 22:49:00",
            "created_at": "2019-03-21 03:09:25",
            "updated_at": "2019-07-08 19:18:43",
            "deleted_at": null
        },
        {
            "id": 6,
            "name": "Unión Cívica Radical",
            "first_activity_at": "1993-06-23 21:26:00",
            "last_activity_at": "2019-05-22 00:00:00",
            "created_at": "2019-03-21 03:09:25",
            "updated_at": "2019-07-08 17:47:16",
            "deleted_at": null
        },
        {
            "id": 7,
            "name": "Intransigente",
            "first_activity_at": "1993-06-23 21:26:00",
            "last_activity_at": "1997-12-04 21:05:00",
            "created_at": "2019-03-21 03:09:25",
            "updated_at": "2019-07-08 19:13:33",
            "deleted_at": null
        },
        {
            "id": 8,
            "name": "Frente Grande",
            "first_activity_at": "1993-12-22 05:36:00",
            "last_activity_at": "2003-12-18 02:07:00",
            "created_at": "2019-03-21 03:09:25",
            "updated_at": "2019-07-08 19:21:43",
            "deleted_at": null
        },
        {
            "id": 9,
            "name": "Demócrata Progresista",
            "first_activity_at": "1993-06-23 21:26:00",
            "last_activity_at": "2013-11-28 06:34:20",
            "created_at": "2019-03-21 03:09:25",
            "updated_at": "2019-07-09 02:03:45",
            "deleted_at": null
        },
        {
            "id": 10,
            "name": "MODIN",
            "first_activity_at": "1993-06-23 21:26:00",
            "last_activity_at": "1997-12-04 21:05:00",
            "created_at": "2019-03-21 03:09:26",
            "updated_at": "2019-07-08 19:13:30",
            "deleted_at": null
        },
        {
            "id": 11,
            "name": "Demócrata de Mendoza",
            "first_activity_at": "1993-06-23 21:26:00",
            "last_activity_at": "2015-11-26 21:38:22",
            "created_at": "2019-03-21 03:09:26",
            "updated_at": "2019-07-09 14:07:48",
            "deleted_at": null
        },
        {
            "id": 12,
            "name": "Alianza Acción Chaqueña",
            "first_activity_at": "1993-06-23 21:26:00",
            "last_activity_at": "1993-12-22 09:06:00",
            "created_at": "2019-03-21 03:09:26",
            "updated_at": "2019-07-08 17:47:16",
            "deleted_at": null
        },
        {
            "id": 13,
            "name": "Movimiento Popular Fueguino",
            "first_activity_at": "1993-06-23 21:26:00",
            "last_activity_at": "2019-05-22 00:00:00",
            "created_at": "2019-03-21 03:09:26",
            "updated_at": "2019-07-08 17:47:16",
            "deleted_at": null
        },
        {
            "id": 14,
            "name": "AL. H. T. E. (Socialista)",
            "first_activity_at": "1993-06-23 21:26:00",
            "last_activity_at": "1997-12-04 21:05:00",
            "created_at": "2019-03-21 03:09:26",
            "updated_at": "2019-07-08 19:13:30",
            "deleted_at": null
        },
        {
            "id": 15,
            "name": "Fuerza Republicana",
            "first_activity_at": "1993-06-23 21:26:00",
            "last_activity_at": "2007-12-04 22:18:21",
            "created_at": "2019-03-21 03:09:26",
            "updated_at": "2019-07-08 19:26:26",
            "deleted_at": null
        }
    ],
    "links": {
        "first": "http:\/\/localhost\/api\/v1\/parties?page=1",
        "last": "http:\/\/localhost\/api\/v1\/parties?page=19",
        "prev": null,
        "next": "http:\/\/localhost\/api\/v1\/parties?page=2"
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 19,
        "path": "http:\/\/localhost\/api\/v1\/parties",
        "per_page": 15,
        "to": 15,
        "total": 272
    }
}
```

### HTTP Request
`GET api/v1/parties`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    filter[name] |  optional  | Parcial. Nombre del bloque.
    include |  optional  | Entidades: legislators.
    sort |  optional  | Campo de ordenamiento. Por defecto ASC. Si se antepone "-" se ordena DESC.
    page |  optional  | Número de página.

<!-- END_376e7ef8a9d5b602e19b713fb35c2e95 -->

<!-- START_fb016173185b7735350f8d3308073d7d -->
## Bloque

> Example request:

```bash
curl -X GET -G "/api/v1/parties/1" 
```

```javascript
const url = new URL("/api/v1/parties/1");

    let params = {
            "include": "",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "id": 1,
    "name": "Frente para la Victoria - PJ",
    "first_activity_at": "2005-12-06 16:16:00",
    "last_activity_at": "2019-05-22 00:00:00",
    "created_at": "2019-03-21 03:08:28",
    "updated_at": "2019-07-09 19:31:14",
    "deleted_at": null
}
```

### HTTP Request
`GET api/v1/parties/{party}`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    include |  optional  | Entidades: legislators.

<!-- END_fb016173185b7735350f8d3308073d7d -->

<!-- START_9f8b25db943f4986cb344335635be033 -->
## Listado de regiones

> Example request:

```bash
curl -X GET -G "/api/v1/regions" 
```

```javascript
const url = new URL("/api/v1/regions");

    let params = {
            "filter[name]": "",
            "include": "",
            "sort": "",
            "page": "",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 1,
            "name": "Buenos Aires",
            "created_at": "2019-03-21 03:08:28",
            "updated_at": "2019-03-21 03:08:28",
            "deleted_at": null
        },
        {
            "id": 2,
            "name": "C.A.B.A.",
            "created_at": "2019-03-21 03:08:28",
            "updated_at": "2019-03-21 03:08:28",
            "deleted_at": null
        },
        {
            "id": 3,
            "name": "Córdoba",
            "created_at": "2019-03-21 03:08:28",
            "updated_at": "2019-03-21 03:08:28",
            "deleted_at": null
        },
        {
            "id": 4,
            "name": "Catamarca",
            "created_at": "2019-03-21 03:08:28",
            "updated_at": "2019-03-21 03:08:28",
            "deleted_at": null
        },
        {
            "id": 5,
            "name": "Chaco",
            "created_at": "2019-03-21 03:08:28",
            "updated_at": "2019-03-21 03:08:28",
            "deleted_at": null
        },
        {
            "id": 6,
            "name": "Chubut",
            "created_at": "2019-03-21 03:08:28",
            "updated_at": "2019-03-21 03:08:28",
            "deleted_at": null
        },
        {
            "id": 7,
            "name": "Corrientes",
            "created_at": "2019-03-21 03:08:28",
            "updated_at": "2019-03-21 03:08:28",
            "deleted_at": null
        },
        {
            "id": 8,
            "name": "Entre Ríos",
            "created_at": "2019-03-21 03:08:28",
            "updated_at": "2019-03-21 03:08:28",
            "deleted_at": null
        },
        {
            "id": 9,
            "name": "Formosa",
            "created_at": "2019-03-21 03:08:28",
            "updated_at": "2019-03-21 03:08:28",
            "deleted_at": null
        },
        {
            "id": 10,
            "name": "Jujuy",
            "created_at": "2019-03-21 03:08:28",
            "updated_at": "2019-03-21 03:08:28",
            "deleted_at": null
        },
        {
            "id": 11,
            "name": "La Pampa",
            "created_at": "2019-03-21 03:08:28",
            "updated_at": "2019-03-21 03:08:28",
            "deleted_at": null
        },
        {
            "id": 12,
            "name": "La Rioja",
            "created_at": "2019-03-21 03:08:28",
            "updated_at": "2019-03-21 03:08:28",
            "deleted_at": null
        },
        {
            "id": 13,
            "name": "Mendoza",
            "created_at": "2019-03-21 03:08:28",
            "updated_at": "2019-03-21 03:08:28",
            "deleted_at": null
        },
        {
            "id": 14,
            "name": "Misiones",
            "created_at": "2019-03-21 03:08:28",
            "updated_at": "2019-03-21 03:08:28",
            "deleted_at": null
        },
        {
            "id": 15,
            "name": "Neuquén",
            "created_at": "2019-03-21 03:08:28",
            "updated_at": "2019-03-21 03:08:28",
            "deleted_at": null
        }
    ],
    "links": {
        "first": "http:\/\/localhost\/api\/v1\/regions?page=1",
        "last": "http:\/\/localhost\/api\/v1\/regions?page=2",
        "prev": null,
        "next": "http:\/\/localhost\/api\/v1\/regions?page=2"
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 2,
        "path": "http:\/\/localhost\/api\/v1\/regions",
        "per_page": 15,
        "to": 15,
        "total": 25
    }
}
```

### HTTP Request
`GET api/v1/regions`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    filter[name] |  optional  | Parcial. Nombre de la región.
    include |  optional  | Entidades: legislators.
    sort |  optional  | Campo de ordenamiento. Por defecto ASC. Si se antepone "-" se ordena DESC.
    page |  optional  | Número de página.

<!-- END_9f8b25db943f4986cb344335635be033 -->

<!-- START_151445cf5ffee34219bcb2dd6fe7e6a6 -->
## Región

> Example request:

```bash
curl -X GET -G "/api/v1/regions/1" 
```

```javascript
const url = new URL("/api/v1/regions/1");

    let params = {
            "include": "",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "id": 1,
    "name": "Buenos Aires",
    "created_at": "2019-03-21 03:08:28",
    "updated_at": "2019-03-21 03:08:28",
    "deleted_at": null
}
```

### HTTP Request
`GET api/v1/regions/{region}`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    include |  optional  | Entidades: legislators.

<!-- END_151445cf5ffee34219bcb2dd6fe7e6a6 -->

<!-- START_8d990fbcac399511b255f14ae63b39b5 -->
## Listado de votaciones

> Example request:

```bash
curl -X GET -G "/api/v1/votings" 
```

```javascript
const url = new URL("/api/v1/votings");

    let params = {
            "filter[chamber]": "",
            "filter[document_url]": "",
            "filter[file_url]": "",
            "filter[meeting]": "",
            "filter[original_id]": "",
            "filter[period]": "",
            "filter[president_id]": "",
            "filter[record]": "",
            "filter[result]": "",
            "filter[result_raw]": "",
            "filter[source_url]": "",
            "filter[title]": "",
            "filter[type]": "",
            "include": "",
            "sort": "",
            "page": "",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 1,
            "chamber": "deputies",
            "original_id": 3641,
            "voted_at": "1993-12-22 08:07:00",
            "period": 111,
            "meeting": 31,
            "record": 31,
            "title": "Declarar la necesidad de la Reforma Parcial de la Constitución de 1853, con las reformas de 1860, 1866, 1898 y 1957 - Reconsideración de la votación del Artículo 5º",
            "type": "Votación Nominal",
            "president_id": 201,
            "affirmative_count": 175,
            "negative_count": 64,
            "abstention_count": 0,
            "absent_count": 17,
            "result": true,
            "result_raw": "AFIRMATIVO",
            "document_url": "https:\/\/votaciones.hcdn.gob.ar\/proxy\/pdf\/1993\/111PO06_31_R31.pdf",
            "file_url": null,
            "video_url": null,
            "source_url": "https:\/\/votaciones.hcdn.gob.ar\/votacion\/3641",
            "created_at": "2019-03-21 03:09:25",
            "updated_at": "2019-03-23 17:42:36",
            "deleted_at": null
        },
        {
            "id": 2,
            "chamber": "deputies",
            "original_id": 3652,
            "voted_at": "1993-12-22 09:06:00",
            "period": 111,
            "meeting": 31,
            "record": 20,
            "title": "Declarar la necesidad de la Reforma Parcial de la Constitución de 1853, con las reformas de 1860, 1866, 1898 y 1957 - Artículo 16º",
            "type": "Votación Nominal",
            "president_id": 201,
            "affirmative_count": 194,
            "negative_count": 24,
            "abstention_count": 14,
            "absent_count": 24,
            "result": true,
            "result_raw": "AFIRMATIVO",
            "document_url": "https:\/\/votaciones.hcdn.gob.ar\/proxy\/pdf\/1993\/111PO06_20_R31.pdf",
            "file_url": null,
            "video_url": null,
            "source_url": "https:\/\/votaciones.hcdn.gob.ar\/votacion\/3652",
            "created_at": "2019-03-21 03:09:29",
            "updated_at": "2019-03-23 17:42:31",
            "deleted_at": null
        },
        {
            "id": 3,
            "chamber": "deputies",
            "original_id": 3651,
            "voted_at": "1993-12-22 09:06:00",
            "period": 111,
            "meeting": 31,
            "record": 19,
            "title": "Declarar la necesidad de la Reforma Parcial de la Constitución de 1853, con las reformas de 1860, 1866, 1898 y 1957 - Artículo 15º",
            "type": "Votación Nominal",
            "president_id": 201,
            "affirmative_count": 194,
            "negative_count": 27,
            "abstention_count": 11,
            "absent_count": 24,
            "result": true,
            "result_raw": "AFIRMATIVO",
            "document_url": "https:\/\/votaciones.hcdn.gob.ar\/proxy\/pdf\/1993\/111PO06_19_R31.pdf",
            "file_url": null,
            "video_url": null,
            "source_url": "https:\/\/votaciones.hcdn.gob.ar\/votacion\/3651",
            "created_at": "2019-03-21 03:09:32",
            "updated_at": "2019-03-23 17:42:31",
            "deleted_at": null
        },
        {
            "id": 4,
            "chamber": "deputies",
            "original_id": 3650,
            "voted_at": "1993-12-22 09:04:00",
            "period": 111,
            "meeting": 31,
            "record": 18,
            "title": "Declarar la necesidad de la Reforma Parcial de la Constitución de 1853, con las reformas de 1860, 1866, 1898 y 1957 - Artículo 14º",
            "type": "Votación Nominal",
            "president_id": 201,
            "affirmative_count": 190,
            "negative_count": 23,
            "abstention_count": 19,
            "absent_count": 24,
            "result": true,
            "result_raw": "AFIRMATIVO",
            "document_url": "https:\/\/votaciones.hcdn.gob.ar\/proxy\/pdf\/1993\/111PO06_18_R31.pdf",
            "file_url": null,
            "video_url": null,
            "source_url": "https:\/\/votaciones.hcdn.gob.ar\/votacion\/3650",
            "created_at": "2019-03-21 03:09:35",
            "updated_at": "2019-03-23 17:42:31",
            "deleted_at": null
        },
        {
            "id": 5,
            "chamber": "deputies",
            "original_id": 3649,
            "voted_at": "1993-12-22 09:03:00",
            "period": 111,
            "meeting": 31,
            "record": 17,
            "title": "Declarar la necesidad de la Reforma Parcial de la Constitución de 1853, con las reformas de 1860, 1866, 1898 y 1957 - Artículo 13º",
            "type": "Votación Nominal",
            "president_id": 201,
            "affirmative_count": 197,
            "negative_count": 25,
            "abstention_count": 9,
            "absent_count": 25,
            "result": true,
            "result_raw": "AFIRMATIVO",
            "document_url": "https:\/\/votaciones.hcdn.gob.ar\/proxy\/pdf\/1993\/111PO06_17_R31.pdf",
            "file_url": null,
            "video_url": null,
            "source_url": "https:\/\/votaciones.hcdn.gob.ar\/votacion\/3649",
            "created_at": "2019-03-21 03:09:39",
            "updated_at": "2019-03-23 17:42:31",
            "deleted_at": null
        },
        {
            "id": 6,
            "chamber": "deputies",
            "original_id": 3648,
            "voted_at": "1993-12-22 09:03:00",
            "period": 111,
            "meeting": 31,
            "record": 16,
            "title": "Declarar la necesidad de la Reforma Parcial de la Constitución de 1853, con las reformas de 1860, 1866, 1898 y 1957 - Artículo 12º",
            "type": "Votación Nominal",
            "president_id": 201,
            "affirmative_count": 190,
            "negative_count": 29,
            "abstention_count": 12,
            "absent_count": 25,
            "result": true,
            "result_raw": "AFIRMATIVO",
            "document_url": "https:\/\/votaciones.hcdn.gob.ar\/proxy\/pdf\/1993\/111PO06_16_R31.pdf",
            "file_url": null,
            "video_url": null,
            "source_url": "https:\/\/votaciones.hcdn.gob.ar\/votacion\/3648",
            "created_at": "2019-03-21 03:09:42",
            "updated_at": "2019-03-23 17:42:31",
            "deleted_at": null
        },
        {
            "id": 7,
            "chamber": "deputies",
            "original_id": 3647,
            "voted_at": "1993-12-22 08:54:00",
            "period": 111,
            "meeting": 31,
            "record": 15,
            "title": "Declarar la necesidad de la Reforma Parcial de la Constitución de 1853, con las reformas de 1860, 1866, 1898 y 1957 - Artículo 11º",
            "type": "Votación Nominal",
            "president_id": 201,
            "affirmative_count": 203,
            "negative_count": 24,
            "abstention_count": 7,
            "absent_count": 22,
            "result": true,
            "result_raw": "AFIRMATIVO",
            "document_url": "https:\/\/votaciones.hcdn.gob.ar\/proxy\/pdf\/1993\/111PO06_15_R31.pdf",
            "file_url": null,
            "video_url": null,
            "source_url": "https:\/\/votaciones.hcdn.gob.ar\/votacion\/3647",
            "created_at": "2019-03-21 03:09:45",
            "updated_at": "2019-03-23 17:42:32",
            "deleted_at": null
        },
        {
            "id": 8,
            "chamber": "deputies",
            "original_id": 3646,
            "voted_at": "1993-12-22 08:53:00",
            "period": 111,
            "meeting": 31,
            "record": 14,
            "title": "Declarar la necesidad de la Reforma Parcial de la Constitución de 1853, con las reformas de 1860, 1866, 1898 y 1957 - Artículo 10º",
            "type": "Votación Nominal",
            "president_id": 201,
            "affirmative_count": 204,
            "negative_count": 27,
            "abstention_count": 3,
            "absent_count": 22,
            "result": true,
            "result_raw": "AFIRMATIVO",
            "document_url": "https:\/\/votaciones.hcdn.gob.ar\/proxy\/pdf\/1993\/111PO06_14_R31.pdf",
            "file_url": null,
            "video_url": null,
            "source_url": "https:\/\/votaciones.hcdn.gob.ar\/votacion\/3646",
            "created_at": "2019-03-21 03:09:48",
            "updated_at": "2019-03-23 17:42:32",
            "deleted_at": null
        },
        {
            "id": 9,
            "chamber": "deputies",
            "original_id": 3645,
            "voted_at": "1993-12-22 08:25:00",
            "period": 111,
            "meeting": 31,
            "record": 13,
            "title": "Declarar la necesidad de la Reforma Parcial de la Constitución de 1853, con las reformas de 1860, 1866, 1898 y 1957 - Artículo 9º",
            "type": "Votación Nominal",
            "president_id": 201,
            "affirmative_count": 188,
            "negative_count": 43,
            "abstention_count": 7,
            "absent_count": 18,
            "result": true,
            "result_raw": "AFIRMATIVO",
            "document_url": "https:\/\/votaciones.hcdn.gob.ar\/proxy\/pdf\/1993\/111PO06_13_R31.pdf",
            "file_url": null,
            "video_url": null,
            "source_url": "https:\/\/votaciones.hcdn.gob.ar\/votacion\/3645",
            "created_at": "2019-03-21 03:09:51",
            "updated_at": "2019-03-23 17:42:32",
            "deleted_at": null
        },
        {
            "id": 10,
            "chamber": "deputies",
            "original_id": 3644,
            "voted_at": "1993-12-22 08:15:00",
            "period": 111,
            "meeting": 31,
            "record": 12,
            "title": "Declarar la necesidad de la Reforma Parcial de la Constitución de 1853, con las reformas de 1860, 1866, 1898 y 1957 - Artículo 8º",
            "type": "Votación Nominal",
            "president_id": 201,
            "affirmative_count": 196,
            "negative_count": 37,
            "abstention_count": 4,
            "absent_count": 19,
            "result": true,
            "result_raw": "AFIRMATIVO",
            "document_url": "https:\/\/votaciones.hcdn.gob.ar\/proxy\/pdf\/1993\/111PO06_12_R31.pdf",
            "file_url": null,
            "video_url": null,
            "source_url": "https:\/\/votaciones.hcdn.gob.ar\/votacion\/3644",
            "created_at": "2019-03-21 03:09:55",
            "updated_at": "2019-03-23 17:42:32",
            "deleted_at": null
        },
        {
            "id": 11,
            "chamber": "deputies",
            "original_id": 3643,
            "voted_at": "1993-12-22 08:15:00",
            "period": 111,
            "meeting": 31,
            "record": 11,
            "title": "Declarar la necesidad de la Reforma Parcial de la Constitución de 1853, con las reformas de 1860, 1866, 1898 y 1957 - Artículo 7º",
            "type": "Votación Nominal",
            "president_id": 201,
            "affirmative_count": 193,
            "negative_count": 43,
            "abstention_count": 3,
            "absent_count": 17,
            "result": true,
            "result_raw": "AFIRMATIVO",
            "document_url": "https:\/\/votaciones.hcdn.gob.ar\/proxy\/pdf\/1993\/111PO06_11_R31.pdf",
            "file_url": null,
            "video_url": null,
            "source_url": "https:\/\/votaciones.hcdn.gob.ar\/votacion\/3643",
            "created_at": "2019-03-21 03:09:58",
            "updated_at": "2019-03-23 17:42:32",
            "deleted_at": null
        },
        {
            "id": 12,
            "chamber": "deputies",
            "original_id": 3642,
            "voted_at": "1993-12-22 08:12:00",
            "period": 111,
            "meeting": 31,
            "record": 10,
            "title": "Declarar la necesidad de la Reforma Parcial de la Constitución de 1853, con las reformas de 1860, 1866, 1898 y 1957 - Artículo 6º",
            "type": "Votación Nominal",
            "president_id": 201,
            "affirmative_count": 187,
            "negative_count": 53,
            "abstention_count": 0,
            "absent_count": 16,
            "result": true,
            "result_raw": "AFIRMATIVO",
            "document_url": "https:\/\/votaciones.hcdn.gob.ar\/proxy\/pdf\/1993\/111PO06_10_R31.pdf",
            "file_url": null,
            "video_url": null,
            "source_url": "https:\/\/votaciones.hcdn.gob.ar\/votacion\/3642",
            "created_at": "2019-03-21 03:10:01",
            "updated_at": "2019-03-23 17:42:32",
            "deleted_at": null
        },
        {
            "id": 13,
            "chamber": "deputies",
            "original_id": 3640,
            "voted_at": "1993-12-22 07:33:00",
            "period": 111,
            "meeting": 31,
            "record": 6,
            "title": "Declarar la necesidad de la Reforma Parcial de la Constitución de 1853, con las reformas de 1860, 1866, 1898 y 1957 - Artículo 4º",
            "type": "Votación Nominal",
            "president_id": 201,
            "affirmative_count": 186,
            "negative_count": 53,
            "abstention_count": 0,
            "absent_count": 17,
            "result": true,
            "result_raw": "AFIRMATIVO",
            "document_url": "https:\/\/votaciones.hcdn.gob.ar\/proxy\/pdf\/1993\/111PO06_06_R31.pdf",
            "file_url": null,
            "video_url": null,
            "source_url": "https:\/\/votaciones.hcdn.gob.ar\/votacion\/3640",
            "created_at": "2019-03-21 03:10:04",
            "updated_at": "2019-03-23 17:42:32",
            "deleted_at": null
        },
        {
            "id": 14,
            "chamber": "deputies",
            "original_id": 3639,
            "voted_at": "1993-12-22 07:24:00",
            "period": 111,
            "meeting": 31,
            "record": 5,
            "title": "Declarar la necesidad de la Reforma Parcial de la Constitución de 1853, con las reformas de 1860, 1866, 1898 y 1957 - Artículo 3º",
            "type": "Votación Nominal",
            "president_id": 201,
            "affirmative_count": 186,
            "negative_count": 50,
            "abstention_count": 4,
            "absent_count": 16,
            "result": true,
            "result_raw": "AFIRMATIVO",
            "document_url": "https:\/\/votaciones.hcdn.gob.ar\/proxy\/pdf\/1993\/111PO06_05_R31.pdf",
            "file_url": null,
            "video_url": null,
            "source_url": "https:\/\/votaciones.hcdn.gob.ar\/votacion\/3639",
            "created_at": "2019-03-21 03:10:08",
            "updated_at": "2019-03-23 17:42:32",
            "deleted_at": null
        },
        {
            "id": 15,
            "chamber": "deputies",
            "original_id": 3638,
            "voted_at": "1993-12-22 06:15:00",
            "period": 111,
            "meeting": 31,
            "record": 3,
            "title": "Declarar la necesidad de la Reforma Parcial de la Constitución de 1853, con las reformas de 1860, 1866, 1898 y 1957 - Artículo 2º",
            "type": "Votación Nominal",
            "president_id": 201,
            "affirmative_count": 183,
            "negative_count": 61,
            "abstention_count": 0,
            "absent_count": 12,
            "result": true,
            "result_raw": "AFIRMATIVO",
            "document_url": "https:\/\/votaciones.hcdn.gob.ar\/proxy\/pdf\/1993\/111PO06_03_R31.pdf",
            "file_url": null,
            "video_url": null,
            "source_url": "https:\/\/votaciones.hcdn.gob.ar\/votacion\/3638",
            "created_at": "2019-03-21 03:10:11",
            "updated_at": "2019-03-23 17:42:32",
            "deleted_at": null
        }
    ],
    "links": {
        "first": "http:\/\/localhost\/api\/v1\/votings?page=1",
        "last": "http:\/\/localhost\/api\/v1\/votings?page=227",
        "prev": null,
        "next": "http:\/\/localhost\/api\/v1\/votings?page=2"
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 227,
        "path": "http:\/\/localhost\/api\/v1\/votings",
        "per_page": 15,
        "to": 15,
        "total": 3395
    }
}
```

### HTTP Request
`GET api/v1/votings`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    filter[chamber] |  optional  | Exacto. Cámara. Valores: deputies, senators.
    filter[document_url] |  optional  | Parcial. URL del documento PDF relacionado.
    filter[file_url] |  optional  | Parcial. URL del expediente relacionado.
    filter[meeting] |  optional  | Exacto. Sesión/Reunión.
    filter[original_id] |  optional  | Exacto. ID con el cual figura en la página oficial.
    filter[period] |  optional  | Exacto. Período.
    filter[president_id] |  optional  | Exacto. ID del legislador presidente de la sesión.
    filter[record] |  optional  | Exacto. Acta.
    filter[result] |  optional  | Exacto. Resultado de la votación. Valores: true, false, null.
    filter[result_raw] |  optional  | Parcial. Resultado crudo tal como figura en el sitio oficial.
    filter[source_url] |  optional  | Parcial. URL fuente del sitio oficial.
    filter[title] |  optional  | Parcial. Título de la votación.
    filter[type] |  optional  | Parcial. Tipo de votacion.
    include |  optional  | Entidades: president, records.
    sort |  optional  | Campo de ordenamiento. Por defecto ASC. Si se antepone "-" se ordena DESC.
    page |  optional  | Número de página.

<!-- END_8d990fbcac399511b255f14ae63b39b5 -->

<!-- START_b532eb6e166e7fdd3d95dcebae28551e -->
## Votación

> Example request:

```bash
curl -X GET -G "/api/v1/votings/1" 
```

```javascript
const url = new URL("/api/v1/votings/1");

    let params = {
            "include": "",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "id": 1,
    "chamber": "deputies",
    "original_id": 3641,
    "voted_at": "1993-12-22 08:07:00",
    "period": 111,
    "meeting": 31,
    "record": 31,
    "title": "Declarar la necesidad de la Reforma Parcial de la Constitución de 1853, con las reformas de 1860, 1866, 1898 y 1957 - Reconsideración de la votación del Artículo 5º",
    "type": "Votación Nominal",
    "president_id": 201,
    "affirmative_count": 175,
    "negative_count": 64,
    "abstention_count": 0,
    "absent_count": 17,
    "result": true,
    "result_raw": "AFIRMATIVO",
    "document_url": "https:\/\/votaciones.hcdn.gob.ar\/proxy\/pdf\/1993\/111PO06_31_R31.pdf",
    "file_url": null,
    "video_url": null,
    "source_url": "https:\/\/votaciones.hcdn.gob.ar\/votacion\/3641",
    "created_at": "2019-03-21 03:09:25",
    "updated_at": "2019-03-23 17:42:36",
    "deleted_at": null
}
```

### HTTP Request
`GET api/v1/votings/{voting}`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    include |  optional  | Entidades: president, records.

<!-- END_b532eb6e166e7fdd3d95dcebae28551e -->

<!-- START_c87e5d8b04e9bb9a9c2092e998cd8ad3 -->
## Listado de votos

> Example request:

```bash
curl -X GET -G "/api/v1/votings/1/votes" 
```

```javascript
const url = new URL("/api/v1/votings/1/votes");

    let params = {
            "filter[legislator_id]": "",
            "filter[party_id]": "",
            "filter[region_id]": "",
            "filter[video_url]": "",
            "filter[vote]": "",
            "filter[vote_raw]": "",
            "filter[voting_id]": "",
            "include": "",
            "sort": "",
            "page": "",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 1,
            "voting_id": 1,
            "legislator_id": 3,
            "party_id": 2,
            "region_id": 1,
            "vote": "affirmative",
            "vote_raw": "AFIRMATIVO",
            "video_url": null,
            "created_at": "2019-03-21 03:09:25",
            "updated_at": "2019-03-21 03:09:25",
            "deleted_at": null
        },
        {
            "id": 2,
            "voting_id": 1,
            "legislator_id": 4,
            "party_id": 2,
            "region_id": 13,
            "vote": "affirmative",
            "vote_raw": "AFIRMATIVO",
            "video_url": null,
            "created_at": "2019-03-21 03:09:25",
            "updated_at": "2019-03-21 03:09:25",
            "deleted_at": null
        },
        {
            "id": 3,
            "voting_id": 1,
            "legislator_id": 5,
            "party_id": 2,
            "region_id": 24,
            "vote": "affirmative",
            "vote_raw": "AFIRMATIVO",
            "video_url": null,
            "created_at": "2019-03-21 03:09:25",
            "updated_at": "2019-03-21 03:09:25",
            "deleted_at": null
        },
        {
            "id": 4,
            "voting_id": 1,
            "legislator_id": 6,
            "party_id": 3,
            "region_id": 18,
            "vote": "negative",
            "vote_raw": "NEGATIVO",
            "video_url": null,
            "created_at": "2019-03-21 03:09:25",
            "updated_at": "2019-03-21 03:09:25",
            "deleted_at": null
        },
        {
            "id": 5,
            "voting_id": 1,
            "legislator_id": 7,
            "party_id": 4,
            "region_id": 7,
            "vote": "negative",
            "vote_raw": "NEGATIVO",
            "video_url": null,
            "created_at": "2019-03-21 03:09:25",
            "updated_at": "2019-03-21 03:09:25",
            "deleted_at": null
        },
        {
            "id": 6,
            "voting_id": 1,
            "legislator_id": 8,
            "party_id": 5,
            "region_id": 1,
            "vote": "affirmative",
            "vote_raw": "AFIRMATIVO",
            "video_url": null,
            "created_at": "2019-03-21 03:09:25",
            "updated_at": "2019-03-21 03:09:25",
            "deleted_at": null
        },
        {
            "id": 7,
            "voting_id": 1,
            "legislator_id": 9,
            "party_id": 6,
            "region_id": 1,
            "vote": "affirmative",
            "vote_raw": "AFIRMATIVO",
            "video_url": null,
            "created_at": "2019-03-21 03:09:25",
            "updated_at": "2019-03-21 03:09:25",
            "deleted_at": null
        },
        {
            "id": 8,
            "voting_id": 1,
            "legislator_id": 10,
            "party_id": 2,
            "region_id": 11,
            "vote": "affirmative",
            "vote_raw": "AFIRMATIVO",
            "video_url": null,
            "created_at": "2019-03-21 03:09:25",
            "updated_at": "2019-03-21 03:09:25",
            "deleted_at": null
        },
        {
            "id": 9,
            "voting_id": 1,
            "legislator_id": 11,
            "party_id": 7,
            "region_id": 1,
            "vote": null,
            "vote_raw": "AUSENTE",
            "video_url": null,
            "created_at": "2019-03-21 03:09:25",
            "updated_at": "2019-03-21 03:09:25",
            "deleted_at": null
        },
        {
            "id": 10,
            "voting_id": 1,
            "legislator_id": 12,
            "party_id": 6,
            "region_id": 21,
            "vote": "negative",
            "vote_raw": "NEGATIVO",
            "video_url": null,
            "created_at": "2019-03-21 03:09:25",
            "updated_at": "2019-03-21 03:09:25",
            "deleted_at": null
        },
        {
            "id": 11,
            "voting_id": 1,
            "legislator_id": 13,
            "party_id": 5,
            "region_id": 2,
            "vote": "negative",
            "vote_raw": "NEGATIVO",
            "video_url": null,
            "created_at": "2019-03-21 03:09:25",
            "updated_at": "2019-07-08 17:38:17",
            "deleted_at": null
        },
        {
            "id": 12,
            "voting_id": 1,
            "legislator_id": 14,
            "party_id": 2,
            "region_id": 1,
            "vote": "affirmative",
            "vote_raw": "AFIRMATIVO",
            "video_url": null,
            "created_at": "2019-03-21 03:09:25",
            "updated_at": "2019-03-21 03:09:25",
            "deleted_at": null
        },
        {
            "id": 13,
            "voting_id": 1,
            "legislator_id": 15,
            "party_id": 6,
            "region_id": 10,
            "vote": "affirmative",
            "vote_raw": "AFIRMATIVO",
            "video_url": null,
            "created_at": "2019-03-21 03:09:25",
            "updated_at": "2019-03-21 03:09:25",
            "deleted_at": null
        },
        {
            "id": 14,
            "voting_id": 1,
            "legislator_id": 16,
            "party_id": 8,
            "region_id": 2,
            "vote": "negative",
            "vote_raw": "NEGATIVO",
            "video_url": null,
            "created_at": "2019-03-21 03:09:25",
            "updated_at": "2019-07-08 17:38:17",
            "deleted_at": null
        },
        {
            "id": 15,
            "voting_id": 1,
            "legislator_id": 17,
            "party_id": 2,
            "region_id": 1,
            "vote": "affirmative",
            "vote_raw": "AFIRMATIVO",
            "video_url": null,
            "created_at": "2019-03-21 03:09:25",
            "updated_at": "2019-03-21 03:09:25",
            "deleted_at": null
        }
    ],
    "links": {
        "first": "http:\/\/localhost\/api\/v1\/votings\/1\/votes?page=1",
        "last": "http:\/\/localhost\/api\/v1\/votings\/1\/votes?page=18",
        "prev": null,
        "next": "http:\/\/localhost\/api\/v1\/votings\/1\/votes?page=2"
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 18,
        "path": "http:\/\/localhost\/api\/v1\/votings\/1\/votes",
        "per_page": 15,
        "to": 15,
        "total": 257
    }
}
```

### HTTP Request
`GET api/v1/votings/{voting}/votes`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    filter[legislator_id] |  optional  | Exacto. ID del legislador que votó.
    filter[party_id] |  optional  | Exacto. ID del bloque por el cual votó.
    filter[region_id] |  optional  | Exacto. ID de la región por la cual votó.
    filter[video_url] |  optional  | Parcial. URL del video provisto por el sitio oficial.
    filter[vote] |  optional  | Parcial. Voto. Valores: "affirmative", "negative", "abstention" o `null`.
    filter[vote_raw] |  optional  | Parcial. Voto en texto crudo tal como figura en el sitio oficial.
    filter[voting_id] |  optional  | Exacto. ID de la votación.
    include |  optional  | Entidades: legislator, party, region, voting.
    sort |  optional  | Campo de ordenamiento. Por defecto ASC. Si se antepone "-" se ordena DESC.
    page |  optional  | Número de página.

<!-- END_c87e5d8b04e9bb9a9c2092e998cd8ad3 -->

<!-- START_79bf43f9195fe81465d288210bfb0898 -->
## Voto

> Example request:

```bash
curl -X GET -G "/api/v1/votings/1/votes/1" 
```

```javascript
const url = new URL("/api/v1/votings/1/votes/1");

    let params = {
            "include": "",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "id": 1,
    "voting_id": 1,
    "legislator_id": 3,
    "party_id": 2,
    "region_id": 1,
    "vote": "affirmative",
    "vote_raw": "AFIRMATIVO",
    "video_url": null,
    "created_at": "2019-03-21 03:09:25",
    "updated_at": "2019-03-21 03:09:25",
    "deleted_at": null
}
```

### HTTP Request
`GET api/v1/votings/{voting}/votes/{vote}`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    include |  optional  | Entidades: legislator, party, region, voting.

<!-- END_79bf43f9195fe81465d288210bfb0898 -->

<!-- START_17e5a62dc41c242ac93d2d5e2b718045 -->
## Listado de votos

> Example request:

```bash
curl -X GET -G "/api/v1/votes" 
```

```javascript
const url = new URL("/api/v1/votes");

    let params = {
            "filter[legislator_id]": "",
            "filter[party_id]": "",
            "filter[region_id]": "",
            "filter[video_url]": "",
            "filter[vote]": "",
            "filter[vote_raw]": "",
            "filter[voting_id]": "",
            "include": "",
            "sort": "",
            "page": "",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 1,
            "voting_id": 1,
            "legislator_id": 3,
            "party_id": 2,
            "region_id": 1,
            "vote": "affirmative",
            "vote_raw": "AFIRMATIVO",
            "video_url": null,
            "created_at": "2019-03-21 03:09:25",
            "updated_at": "2019-03-21 03:09:25",
            "deleted_at": null
        },
        {
            "id": 2,
            "voting_id": 1,
            "legislator_id": 4,
            "party_id": 2,
            "region_id": 13,
            "vote": "affirmative",
            "vote_raw": "AFIRMATIVO",
            "video_url": null,
            "created_at": "2019-03-21 03:09:25",
            "updated_at": "2019-03-21 03:09:25",
            "deleted_at": null
        },
        {
            "id": 3,
            "voting_id": 1,
            "legislator_id": 5,
            "party_id": 2,
            "region_id": 24,
            "vote": "affirmative",
            "vote_raw": "AFIRMATIVO",
            "video_url": null,
            "created_at": "2019-03-21 03:09:25",
            "updated_at": "2019-03-21 03:09:25",
            "deleted_at": null
        },
        {
            "id": 4,
            "voting_id": 1,
            "legislator_id": 6,
            "party_id": 3,
            "region_id": 18,
            "vote": "negative",
            "vote_raw": "NEGATIVO",
            "video_url": null,
            "created_at": "2019-03-21 03:09:25",
            "updated_at": "2019-03-21 03:09:25",
            "deleted_at": null
        },
        {
            "id": 5,
            "voting_id": 1,
            "legislator_id": 7,
            "party_id": 4,
            "region_id": 7,
            "vote": "negative",
            "vote_raw": "NEGATIVO",
            "video_url": null,
            "created_at": "2019-03-21 03:09:25",
            "updated_at": "2019-03-21 03:09:25",
            "deleted_at": null
        },
        {
            "id": 6,
            "voting_id": 1,
            "legislator_id": 8,
            "party_id": 5,
            "region_id": 1,
            "vote": "affirmative",
            "vote_raw": "AFIRMATIVO",
            "video_url": null,
            "created_at": "2019-03-21 03:09:25",
            "updated_at": "2019-03-21 03:09:25",
            "deleted_at": null
        },
        {
            "id": 7,
            "voting_id": 1,
            "legislator_id": 9,
            "party_id": 6,
            "region_id": 1,
            "vote": "affirmative",
            "vote_raw": "AFIRMATIVO",
            "video_url": null,
            "created_at": "2019-03-21 03:09:25",
            "updated_at": "2019-03-21 03:09:25",
            "deleted_at": null
        },
        {
            "id": 8,
            "voting_id": 1,
            "legislator_id": 10,
            "party_id": 2,
            "region_id": 11,
            "vote": "affirmative",
            "vote_raw": "AFIRMATIVO",
            "video_url": null,
            "created_at": "2019-03-21 03:09:25",
            "updated_at": "2019-03-21 03:09:25",
            "deleted_at": null
        },
        {
            "id": 9,
            "voting_id": 1,
            "legislator_id": 11,
            "party_id": 7,
            "region_id": 1,
            "vote": null,
            "vote_raw": "AUSENTE",
            "video_url": null,
            "created_at": "2019-03-21 03:09:25",
            "updated_at": "2019-03-21 03:09:25",
            "deleted_at": null
        },
        {
            "id": 10,
            "voting_id": 1,
            "legislator_id": 12,
            "party_id": 6,
            "region_id": 21,
            "vote": "negative",
            "vote_raw": "NEGATIVO",
            "video_url": null,
            "created_at": "2019-03-21 03:09:25",
            "updated_at": "2019-03-21 03:09:25",
            "deleted_at": null
        },
        {
            "id": 11,
            "voting_id": 1,
            "legislator_id": 13,
            "party_id": 5,
            "region_id": 2,
            "vote": "negative",
            "vote_raw": "NEGATIVO",
            "video_url": null,
            "created_at": "2019-03-21 03:09:25",
            "updated_at": "2019-07-08 17:38:17",
            "deleted_at": null
        },
        {
            "id": 12,
            "voting_id": 1,
            "legislator_id": 14,
            "party_id": 2,
            "region_id": 1,
            "vote": "affirmative",
            "vote_raw": "AFIRMATIVO",
            "video_url": null,
            "created_at": "2019-03-21 03:09:25",
            "updated_at": "2019-03-21 03:09:25",
            "deleted_at": null
        },
        {
            "id": 13,
            "voting_id": 1,
            "legislator_id": 15,
            "party_id": 6,
            "region_id": 10,
            "vote": "affirmative",
            "vote_raw": "AFIRMATIVO",
            "video_url": null,
            "created_at": "2019-03-21 03:09:25",
            "updated_at": "2019-03-21 03:09:25",
            "deleted_at": null
        },
        {
            "id": 14,
            "voting_id": 1,
            "legislator_id": 16,
            "party_id": 8,
            "region_id": 2,
            "vote": "negative",
            "vote_raw": "NEGATIVO",
            "video_url": null,
            "created_at": "2019-03-21 03:09:25",
            "updated_at": "2019-07-08 17:38:17",
            "deleted_at": null
        },
        {
            "id": 15,
            "voting_id": 1,
            "legislator_id": 17,
            "party_id": 2,
            "region_id": 1,
            "vote": "affirmative",
            "vote_raw": "AFIRMATIVO",
            "video_url": null,
            "created_at": "2019-03-21 03:09:25",
            "updated_at": "2019-03-21 03:09:25",
            "deleted_at": null
        }
    ],
    "links": {
        "first": "http:\/\/localhost\/api\/v1\/votes?page=1",
        "last": "http:\/\/localhost\/api\/v1\/votes?page=45001",
        "prev": null,
        "next": "http:\/\/localhost\/api\/v1\/votes?page=2"
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 45001,
        "path": "http:\/\/localhost\/api\/v1\/votes",
        "per_page": 15,
        "to": 15,
        "total": 675010
    }
}
```

### HTTP Request
`GET api/v1/votes`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    filter[legislator_id] |  optional  | Exacto. ID del legislador que votó.
    filter[party_id] |  optional  | Exacto. ID del bloque por el cual votó.
    filter[region_id] |  optional  | Exacto. ID de la región por la cual votó.
    filter[video_url] |  optional  | Parcial. URL del video provisto por el sitio oficial.
    filter[vote] |  optional  | Parcial. Voto. Valores: "affirmative", "negative", "abstention" o `null`.
    filter[vote_raw] |  optional  | Parcial. Voto en texto crudo tal como figura en el sitio oficial.
    filter[voting_id] |  optional  | Exacto. ID de la votación.
    include |  optional  | Entidades: legislator, party, region, voting.
    sort |  optional  | Campo de ordenamiento. Por defecto ASC. Si se antepone "-" se ordena DESC.
    page |  optional  | Número de página.

<!-- END_17e5a62dc41c242ac93d2d5e2b718045 -->

<!-- START_49c12486174874310d1d5c5724de2a5f -->
## Voto

> Example request:

```bash
curl -X GET -G "/api/v1/votes/1" 
```

```javascript
const url = new URL("/api/v1/votes/1");

    let params = {
            "include": "",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "id": 1,
    "voting_id": 1,
    "legislator_id": 3,
    "party_id": 2,
    "region_id": 1,
    "vote": "affirmative",
    "vote_raw": "AFIRMATIVO",
    "video_url": null,
    "created_at": "2019-03-21 03:09:25",
    "updated_at": "2019-03-21 03:09:25",
    "deleted_at": null
}
```

### HTTP Request
`GET api/v1/votes/{vote}`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    include |  optional  | Entidades: legislator, party, region, voting.

<!-- END_49c12486174874310d1d5c5724de2a5f -->


