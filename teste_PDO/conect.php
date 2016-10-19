<?php
class Conexao{

    private $host;
    private $dbName;
    private $user;
    private $password;


    public function __construct($host, $port, $dbName, $user, $password)
    {
        $this->host 	= "localhost";
        $this->dbName 	= "teste_selecao";
        $this->user 	= "root";
        $this->password = "";
    }

    public function conectar()
    {
        try {
            return  $pdo = new PDO("mysql:host=$this->host;dbname=$this->dbName", $this->user, $this->password);

        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }
}