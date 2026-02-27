<?php

class Database{
    public $dbh;

    function __construct($host, $table, $user, $password){
        try {
            $this->dbh = new PDO("mysql:host=$host;dbname=$table", $user, $password);
        } catch (PDOException $e) {
            header("Location: ./503");
            exit;
        }
    } 

    function signup($userName, $userPass){
        $this->dbh->prepare();
    }
    function login($userName, $userPass) {

    }
    private function hashPass($userPass) {

    }
}