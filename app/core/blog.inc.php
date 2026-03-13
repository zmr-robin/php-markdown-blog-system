<?php

class Blog {

    private $conn;
    private $siteURL;

    function __construct($conn, $siteURL){
        // Connect Database object with Blog object
        $this->conn = $conn;
        $this->siteURL = $siteURL;
    }

    //---------------------
    // Returns all Blog posts 
    //---------------------
    function getAll(){   

        $sql = "SELECT * FROM post";
        $stmt = $this->conn->dbh->prepare($sql);
        $stmt->execute();
        
        // If first time navigate to setup
        if(file_exists(__DIR__ . "/first.txt")){
            Header("Location: {$this->siteURL}setup");
        }

        return $stmt->fetchAll();
    }

    //---------------------
    // Returns data for one specific post 
    //---------------------
    function getPostDataByURL($postURL, $siteURL){
        $sql = "SELECT * FROM post WHERE PostURL = ?";
        $stmt = $this->conn->dbh->prepare($sql);
        $stmt->execute([$postURL]);
        $result = $stmt->fetch();
        if ($result !== false){
            $this->countView($result["PostID"]);
            return $result;
        } else {
            Header("Location: $this->siteURL/404");
        }
    }

    //---------------------
    // Returns the description of a post 
    // -> content of first <p> tag capped to $cap symbols 
    //---------------------
    function getPostDescription($postContent, $cap = 200){
        $postDescription =  "";
        for($i = 0; $i < strlen($postContent); $i++){
            if (($postContent[$i] . $postContent[$i + 1] . $postContent[$i + 2]) == "<p>"){
                for($x = ($i + 3); $x < strlen($postContent); $x++){
                    if (($postContent[$x] . $postContent[$x + 1] . $postContent[$x + 2] . $postContent[$x + 3]) != "</p>"){
                        // Skip image tags
                        if(($postContent[$x] . $postContent[$x + 1] . $postContent[$x + 2] . $postContent[$x + 3]) == "<img"){
                            while($postContent[$x] != ">"){
                                $x++;
                            }
                        } else {
                            $postDescription .= $postContent[$x];
                        }
                    } else {
                        $x = strlen($postContent) + 1;
                        $i = strlen($postContent) + 1;
                    }
                }
            }
        }
        // Remove HTML Tags
        $tagBlackList = [
            "<b>", "</b>",
            "<i>", "</i>",
            "<mark>", "</mark>",
            "<u>", "</u>"
        ];
        foreach($tagBlackList as $tag){
            $postDescription = str_replace($tag, "", $postDescription);
        }
        // Returns $cap = 200 symbols + symbols until a space comes 
        $pos = strlen($postDescription) > $cap ? strpos($postDescription, ' ', $cap) : strlen($postDescription);
        $postDescription = substr($postDescription, 0, $pos);
        // Append dots at the end of the description.
        $postDescriptionDots = ($postDescription[strlen($postDescription) - 1] == ".") ? ".." : "...";
        return (strlen($postDescription) >= 1) ? $postDescription . $postDescriptionDots : "";
    }

    // Log view (View ID has to be unique) View ID = sha256 of ip + blog id
    private function countView($blogID){
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        $stmt = $this->conn->dbh->prepare("SELECT * FROM views WHERE ID = ? AND PostID = ?");
        $stmt->execute([hash("sha256", $ip . $blogID), $blogID]);
        if($stmt->fetch() == false){
            $stmt = $this->conn->dbh->prepare("INSERT INTO views (ID, PostID) VALUES (?,?);");
            $stmt->execute([hash("sha256", $ip . $blogID), $blogID]);
        }
    }

    // Get blog views
    function getViews($blogID){
        $stmt = $this->conn->dbh->prepare("SELECT count(*) AS viewscounted FROM views WHERE PostID = ?");
        $stmt->execute([$blogID]);
        $result = $stmt->fetch();
        $result = ($result !== false) ? $result : 0;
        return $result["viewscounted"];
    }
}