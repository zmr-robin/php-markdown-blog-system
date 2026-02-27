<?php

class Blog {

    private $conn;
    function __construct($conn){
        $this->conn = $conn;
    }

    function getAll(){
        $sql = "SELECT * FROM post";
        $stmt = $this->conn->dbh->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function getPostData(){

    }
}