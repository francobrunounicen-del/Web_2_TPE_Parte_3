<?php
require_once __DIR__ . '/../models/video.model.php';

class VideoApiController {
    private $model;

    public function  __construct() {
        $this->model = new VideoModel();
        // no hay vista en la API REST
    }

    public function getVideo($req, $res) {
        $categoria = $req->query->categoria ?? null;
        $sort = $req->query->sort ?? null;
        $order = $req->query->order ?? 'ASC';
        if ($categoria) {
            $videos = $this->model->getByCategoria($categoria);
        }
        elseif ($sort) {
            $videos = $this->model->getOrdered($sort, $order);
        }
        else {
            $videos = $this->model->getAll();
        }
        return $res->json($videos, 200);
    }

    public function getVideoById($req, $res) {
        // obtengo el ID que viene como parámetro del endpoint
        $id_video = $req->params->id;
        $video = $this->model->get($id_video);
        if (!$video) {
            return $res->json("El video no existe", 404);
        }
        return $res->json($video, 200);
    }

    public function insertVideo($req, $res) {
        $titulo = $req->body->titulo ?? null;
        $autor = $req->body->autor ?? null;
        $descripcion = $req->body->descripcion ?? null;
        $duracion = $req->body->duracion ?? null;
        $fecha_publicacion = $req->body->fecha_publicacion ?? null;
        $url = $req->body->url ?? null;
        $id_categoria = $req->body->id_categoria ?? null;
        // Valida que vengan todos los datos necesarios en el body
        // Si falta alguno, devolvemos un error 400 (Bad Request)
        if (empty($titulo) ||
            empty($autor) ||
            empty($descripcion) ||
            empty($duracion) ||
            empty($fecha_publicacion) ||
            empty($url) ||
            empty($id_categoria)) {
            return $res->json('Falta completar datos', 400);
        }
        $id = $this->model->insert(
                $titulo,
                $autor,
                $descripcion,
                $duracion,
                $fecha_publicacion,
                $url,
                $id_categoria
                );
        // si el modelo devuelve false, algo falló al guardar (por ejemplo, error en la base de datos)
        if (!$id) {
                return $res->json('Error al insertar video', 500);
        }
        // se considera una buena práctica devolver la entidad creada que contiene
        // todos los datos que el modelo agregó automaticamente
        $video = $this->model->get($id);
        return $res->json($video, 201);
    }

    public function updateVideo($req, $res) {
        $id_video = $req->params->id;
        $video = $this->model->get($id_video);
        if (!$video) {
            return $res->json("El video con el id=$id_video no existe", 404);
        }
        $titulo = $req->body->titulo ?? null;
        $autor = $req->body->autor ?? null;
        $descripcion = $req->body->descripcion ?? null;
        $duracion = $req->body->duracion ?? null;
        $fecha_publicacion = $req->body->fecha_publicacion ?? null;
        $url = $req->body->url ?? null;
        $id_categoria = $req->body->id_categoria ?? null;

        // Valida que vengan todos los datos necesarios en el body
        // Si falta alguno, devolvemos un error 400 (Bad Request)
        if (empty($titulo) ||
            empty($autor) ||
            empty($descripcion) ||
            empty($duracion) ||
            empty($fecha_publicacion) ||
            empty($url) ||
            empty($id_categoria)) {
            return $res->json('Falta completar datos', 400);
        }

        $this->model->update($id_video,
            $titulo,
            $autor,
            $descripcion,
            $duracion,
            $fecha_publicacion,
            $url,
            $id_categoria);
        $video = $this->model->get($id_video);
        return $res->json($video, 200);
    }
}
