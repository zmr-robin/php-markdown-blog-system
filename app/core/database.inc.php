<?php

class Database{
    public $host = "";
    public $table = "";
    public $user = "";
    public $password = "";

    function __construct($host, $table, $user, $password){
        $this->host = $host;
        $this->table = $table;
        $this->user = $user;
        $this->password = $password;
        try {
            $this->dbh = new PDO("mysql:host=$this->host;dbname=$this->table", $this->user, $this->password);
        } catch (PDOException $e) {
            header("Location: ./503");
            exit;
        }
    } 
}