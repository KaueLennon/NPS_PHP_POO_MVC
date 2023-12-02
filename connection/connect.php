<!-- Conexão com o banco de dados -->

<?php

    define('HOST','localhost');
    define('DATABASENAME','formulario-kaue');
    define('USER','root');
    define('PASSWORD','Tesla193');

class Connect {
    protected $connection;

    function __construct()
    {
        $this->connectDatabase();
    }

    function connectDatabase(){
        try
        {
            $this->connection = new PDO('mysql:host='.HOST.';dbname='.DATABASENAME, USER, PASSWORD);
        }
        catch (PDOException $e)
        {
            echo "Erro de conexão".$e->getMessage();
            die();
        }
    }
}

?>