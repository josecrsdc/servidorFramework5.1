<?php

namespace core\db;

    class Connection {
        
        //Propiedades
        static private $instance;
        private $pdo;


        //Constructor
        function __construct() {
            try {
                $this->pdo = new \PDO('mysql:host=localhost;dbname=cine', 'root', 'admin');
                $this->pdo->exec("set names utf8");
                $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                } catch (\PDOException $e) {
                    echo "Error al conectar con la bbdd";
                }
        }

        //Metodos
        public function getPdo() {
            return $this->pdo;
        }

        protected function getInstance() {
            if(self::$instance == null) {
                self::$instance = new Connection();
            }
                return self::$instance;
        }

        public static function __callStatic($name, $arguments) {
            return (new static)->$name(...$arguments);
        }
            
    
        
            
    }