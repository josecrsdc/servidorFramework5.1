<?php

namespace core\db;
use core\db\Connection;

    class Db {
        
        //Metodos

        private function execute($sql) {
            $pdo = Connection::getInstance()::getPdo();
            $ps = $pdo->prepare($sql);
            $ps->execute();
            return $ps->fetchAll(\PDO::FETCH_ASSOC);
        }
            
        public function select($table) {
            $sql = "SELECT * FROM $table";
            return Db::execute($sql);
            
        }

        
        
        public static function __callStatic($name, $arguments) {
            return (new static)->$name(...$arguments);
        }

    }
    