<?php

class VideoModel {
   private $db;

   public function __construct() {
      // 1. abre conexión con DB
      $this->db = new PDO('mysql:host=localhost;dbname=catalogo_bbva;charset=utf8', 'root', '');
   }

   public function getAll() {
      // 2. prepara y ejecuta la consulta
      $query = $this->db->prepare('SELECT v.*, c.nombre FROM video v JOIN categoria c ON v.id_categoria = c.id_categoria');
      $query->execute();
      // 3. obtiene los resultados
      return $query->fetchAll(PDO::FETCH_OBJ);
   }

   public function getByCategoria($id_categoria) {
      $query = $this->db->prepare("SELECT v.*, c.nombre
                                    FROM video v
                                    JOIN categoria c
                                    ON v.id_categoria = c.id_categoria
                                    WHERE v.id_categoria = ?");
      $query->execute([$id_categoria]);
      return $query->fetchAll(PDO::FETCH_OBJ);
   }

   public function getOrdered($atributo, $orden) {
      if ($orden != 'ASC' && $orden != 'DESC') {
         $orden = 'ASC';}
      $query = $this->db->prepare("SELECT v.*, c.nombre
                                    FROM video v
                                    JOIN categoria c
                                    ON v.id_categoria = c.id_categoria
                                    ORDER BY $atributo $orden");
      $query->execute();
      return $query->fetchAll(PDO::FETCH_OBJ);
   }

   public function get($id) {
      $query = $this->db->prepare("SELECT v.*, c.nombre
                                    FROM video v
                                    JOIN categoria c
                                    ON v.id_categoria = c.id_categoria
                                    WHERE v.id_video = ?");
      $query->execute([$id]);
      return $query->fetch(PDO::FETCH_OBJ);
   }

   public function insert($titulo,$autor,$descripcion,$duracion,$fecha_publicacion,$url,$id_categoria) {
        $query = $this->db->prepare("INSERT INTO video
            (titulo,autor,descripcion,duracion,fecha_publicacion,url,id_categoria)
            VALUES (?, ?, ?, ?, ?, ?, ?)");
        $query->execute([
            $titulo,
            $autor,
            $descripcion,
            $duracion,
            $fecha_publicacion,
            $url,
            $id_categoria
        ]);

      // devuelve el ID de la issue recién creada
      return $this->db->lastInsertId();
   }

    public function update($id,$titulo,$autor,$descripcion,$duracion,$fecha_publicacion,$url,$id_categoria) {
        $query = $this->db->prepare("UPDATE video
                                    SET titulo = ?,
                                       autor = ?,
                                       descripcion = ?,
                                       duracion = ?,
                                       fecha_publicacion = ?,
                                       url = ?,
                                       id_categoria = ?
                                    WHERE id_video = ?");
        $query->execute([$titulo,$autor,$descripcion,$duracion,$fecha_publicacion,$url,$id_categoria,$id]);
    }
}