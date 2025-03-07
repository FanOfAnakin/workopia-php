<?php

class Database
{
    public $conn;

    public function __construct($config)
    {
        $dsn = "mysql:host={$config['host']};dbname={$config['dbname']}";

        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];


        try {
            $this->conn = new PDO($dsn, $config['username'], $config['password'], $options);
        } catch (PDOException $e) {
            throw new Exception("Database Conncection Failed: {$e->getMessage()}");
        }
    }
    public function query($query){
        try{
            $sth = $this->conn->prepare($query);
            $sth->execute();
            return $sth;
        } catch(PDOException $e){
            throw new Exception("Query Failed To Execute: {$e->getMessage()}");
        }
    }
}
