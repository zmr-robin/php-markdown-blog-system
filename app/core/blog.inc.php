<?php

class Blog {

    private $conn;

    function __construct($conn){
        // Connect Database object with Blog object
        $this->conn = $conn;
    }

    //---------------------
    // Returns all Blog posts 
    //---------------------
    function getAll(){   
        $sql = "SELECT * FROM post";
        $stmt = $this->conn->dbh->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    //---------------------
    // Returns data for one specific post 
    //---------------------
    function getPostDataByURL($postURL){
        $sql = "SELECT * FROM post WHERE PostURL = ?";
        $stmt = $this->conn->dbh->prepare($sql);
        $stmt->execute([$postURL]);
        return $stmt->fetch();
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
        $pos = strpos($postDescription, ' ', $cap);
        $postDescription = substr($postDescription,0,$pos );
        // Append dots at the end of the description.
        $postDescriptionDots = ($postDescription[strlen($postDescription) - 1] == ".") ? ".." : "...";
        return (strlen($postDescription >= 1)) ? $postDescription . $postDescriptionDots : "";
    }
}