<?php

// Configurações de conexão do banco mysql
define('HOST', 'localhost');
define('USERNAME', 'root');
define('PASSWORD', '');
define('DATABASE', 'my_database');

class Connect{
    protected $conn;

    function __construct() 
    {
        $this->connectDatabase();
    }

    function connectDatabase()
    {
        try
        {
            $this->conn = new PDO('mysql:host='.HOST.';dbname='.DATABASE, USERNAME, PASSWORD);
        }
        catch(PDOException $error)
        {
            echo "Error: " . $error->getMessage();
            die();
        }
    }
}

?>