<?php

class User {

    private $conn;
    private $siteURL;

    public function __construct($conn, $siteURL){
        $this->conn = $conn;
        $this->siteURL = $siteURL;
    }

    public function checkSession(){
        if(!isset($_SESSION["username"])){
            header("Location: {$this->siteURL}login");
            exit();
        }
    }

    public function create(){
        $stmt = $this->conn->dbh->prepare("INSERT INTO user (userName, userPassword) VALUES (?,?);");
        $stmt->execute([$_POST["userName"], password_hash($_POST["userPassword"], PASSWORD_BCRYPT)]);
        if(file_exists(__DIR__ . "/first.txt")){
            unlink(__DIR__ . "/first.txt");
        }
        header("Location: {$this->siteURL}login");
    }

    public function login(){
        $stmt = $this->conn->dbh->prepare("SELECT * FROM user WHERE userName = ?;");
        $stmt->execute([$_POST["userName"]]);
        $result = $stmt->fetch();

        if($result !== false && password_verify($_POST["userPassword"], $result["userPassword"])){
            $_SESSION["username"] = $result["userName"];
        } else {
            header("Location: {$this->siteURL}login?error");
        }
    }
}