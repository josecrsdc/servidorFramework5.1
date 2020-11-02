<?php
    namespace core;
    use core\db\Db;
    
    class Model {

        protected $table;

        protected function getAll() {
            $result = Db::select($this->table);
            
            return $result;
        }

        protected function getById($id) {
            $rows = Db::select($this->table);
            $expression = "[?id == '$id']";
            $result = \JmesPath\search($expression, $rows)[0];
            
            return $result;
        }

        public static function __callStatic($name, $arguments) {
            return (new static)->$name(...$arguments);
        }
    }