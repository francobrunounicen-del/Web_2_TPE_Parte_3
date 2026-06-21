# Web_2_TPE_Parte_3

Esta API REST permite consultar y administrar videos pertenecientes a distintas categorías de un catálogo educativo.

# Endpoints

## Obtener todos los videos [Obtiene la colección completa de videos.]

Método>>GET>>/video
Ejemplo
GET /api/video
Respuesta exitosa (200 OK)
[
  {
    "id_video": 1,
    "titulo": "Aprender a aprender",
    "autor": "Mario Alonso Puig",
    "descripcion": "Claves para mejorar el aprendizaje",
    "duracion": 28,
    "fecha_publicacion": "2024-01-10",
    "URL": "https://youtube.com/watch?v=bbva001",
    "id_categoria": 1,
    "nombre": "Educacion"
  }
]

## Obtener un video por ID [Obtiene la información de un video específico.]

Método>>GET>>/video/
Ejemplo
GET /api/video/1
Respuesta exitosa (200 OK)
{
  "id_video": 1,
  "titulo": "Aprender a aprender",
  "autor": "Mario Alonso Puig",
  "descripcion": "Claves para mejorar el aprendizaje",
  "duracion": 28,
  "fecha_publicacion": "2024-01-10",
  "URL": "https://youtube.com/watch?v=bbva001",
  "id_categoria": 1,
  "nombre": "Educacion"
}
Respuesta de error (404 Not Found)
"El video no existe"

## Filtrar videos por categoría [Permite obtener únicamente los videos pertenecientes a una categoría determinada.]

Método>>GET>>/video?categoria=id_categoria

Ejemplo
GET /api/video?categoria=1
Respuesta exitosa (200 OK)
[
  {
    "id_video": 1,
    "titulo": "Aprender a aprender",
    "autor": "Mario Alonso Puig"
  }
]

## Ordenar videos [Permite ordenar la colección de videos por un atributo determinado.]

Método>>GET>>/video?sort=campo&order=ASC|DESC

Ejemplo
GET /api/video?sort=titulo&order=ASC
GET /api/video?sort=fecha_publicacion&order=DESC
Parámetros
Parámetro	Descripción
sort	Campo por el cual ordenar
order	ASC o DESC

## Crear un video [Permite agregar un nuevo video al catálogo.]

Método>>POST>>/video
Body (JSON)
{
  "titulo": "Nuevo Video",
  "autor": "Autor",
  "descripcion": "Descripción",
  "duracion": 20,
  "fecha_publicacion": "2026-06-21",
  "url": "https://youtube.com/video",
  "id_categoria": 1
}
Respuesta exitosa (201 Created)
Devuelve el video recién creado.
Respuesta de error (400 Bad Request)
"Falta completar datos"

## Modificar un video [Permite actualizar un video existente.]

Método>>PUT>>/video/

Ejemplo
PUT /api/video/1
Body (JSON)
{
  "titulo": "Video actualizado",
  "autor": "Autor actualizado",
  "descripcion": "Nueva descripción",
  "duracion": 25,
  "fecha_publicacion": "2026-06-21",
  "url": "https://youtube.com/nuevo",
  "id_categoria": 1
}
Respuesta exitosa (200 OK)
Devuelve el video actualizado.
Respuesta de error (404 Not Found)
"El video con el id=1 no existe"
