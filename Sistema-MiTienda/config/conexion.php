<?php

#region
    /*define("SERVIDOR", "localhost");
    define("USUARIO", "root");
    define("PASSWORD", "");
    define("BD", "db-MiTienda");

    $servidor = "mysql:dbname=".BD.";host=".SERVIDOR;

    $usuario = `usuario`;
    try{
        $pdo = new PDO($servidor, USUARIO, PASSWORD,
        array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8")
        );
    }
    catch(PDOException $e){*/
        
#end region

    class Conexion{
        private $host = "localhost";
        private $database = "db-MiTienda";
        private $usuario = "root";
        private $clave = "";
        public $conect;

        function __construct()
        {
            $this -> conexion();
        }

        public function conexion(){
            $this->conect = mysqli_connect($this->host, $this->usuario, $this->clave, $this->database);
            if(mysqli_connect_error()){
                die("Fallo inesperado de conexion ". mysqli_connect_error() . mysqli_connect_errno());
            }
        }
    }
?>