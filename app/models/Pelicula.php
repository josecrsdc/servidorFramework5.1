<?php

    namespace app\models;
    
    use core\Model;

    class Pelicula extends Model{
        
        protected $table = 'peliculas';

        function getDirectores($id_pelicula) {
            $directores = include('./bbdd/directores.php');
            $pelicula_director = include('./bbdd/pelicula_director.php');
            $respuesta = "";
            $expression = "[?id_pelicula == `".$id_pelicula."`].id_director";
            $result = \JmesPath\search($expression, $pelicula_director);
            foreach ($result as $id) {
                $respuesta .= '"'.$id.'",';
            }
            $respuesta = trim($respuesta, ',');

            $expression = "[?contains(`[$respuesta]`,id)].{id: id, nombre: nombre}";
            $result = \JmesPath\search($expression,$directores);
            
            return $result;
        }
        
        function getActores($id_pelicula) {
            $actores = include('./bbdd/actores.php');
            $pelicula_actor = include('./bbdd/pelicula_actor.php');
            $respuesta = "";
            $expression = "[?id_pelicula == `".$id_pelicula."`].id_actor";
            $result = \JmesPath\search($expression, $pelicula_actor);
            foreach ($result as $id) {
                $respuesta .= '"'.$id.'",';
            }
            $respuesta = trim($respuesta, ',');

            $expression = "[?contains(`[$respuesta]`,id)].{id: id, nombre: nombre}";
            $result = \JmesPath\search($expression,$actores);

            return $result;
        }

    }