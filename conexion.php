<?php

    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATH, OPTIONS');
    header('Access-Control-Allow-Headers: token, Content-type');
    header('Access-Control-Max-Age: 1728000');
    header('Content.Length: 0');
    header("Content-type: text/plain");

    class connection{
        private $conn;

        public function __construct(){
            $this->conn = new mysqli("186.4.146.197:5353", "support", "Soporte@2022", "lista_servidores");
        }

        public function getConnection(){
            return $this->conn;
        }
    }
?>