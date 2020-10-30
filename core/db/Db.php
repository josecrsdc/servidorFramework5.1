<?php

namespace core\db;

    class Bd {
        

        //Metodos

        private function execute($sql, $params) {
            $pdo = Connection::getInstance()::getPdo();
            $ps = $pdo->prepare($sql);
            $ps->execute($params);
            return $ps->fetchAll(\PDO::FETCH_ASSOC);
        }
            
        public function select($tabla, $campos, $condiciones, $parametros) {
            # code...
        }

        
        
        public static function __callStatic($name, $arguments) {
            return (new static)->$name(...$arguments);
        }

    }
    