<?php

class PMBS
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    //----------------------
    // Upload a new blog post
    //----------------------
    public function upload()
    {

        $allowedExts = ['txt', 'md'];
        $results = [];

        $tmpNames = (array) $_FILES['fileInput']['tmp_name'];
        $names = (array) $_FILES['fileInput']['name'];
        $errors = (array) $_FILES['fileInput']['error'];

        foreach ($tmpNames as $index => $tmpName) {
            $originalName = $names[$index];
            $error = $errors[$index];
            $ext = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));

            if ($error !== UPLOAD_ERR_OK)
                continue;
            if (!in_array($ext, $allowedExts))
                continue;

            $lines = file($tmpName);

            $markdown = new PHPMarkdown();
            $html = $markdown->convertFileToHtml($lines);

            $results[] = ['html' => $html];
        }

        $stmt = $this->conn->dbh->prepare("INSERT INTO post (PostURL, PostTitle, PostContent, PostAuthor, PostDate) VALUES (?,?,?,?,?);");
        $stmt->execute([
            $_POST["postBreadcrumb"],
            $_POST["postTitle"],
            $results[0]["html"],
            $_POST["postAuthor"],
            $_POST["postDate"]
        ]);
    }

    //--------------------
    // Update a blog post
    //--------------------
    public function update(){
        $stmt = $this->conn->dbh->prepare("UPDATE post SET PostTitle = ?, PostURL = ?, PostAuthor = ? WHERE PostID = ?;");
        $stmt->execute([$_POST["postTitle"], $_POST["postBreadcrumb"], $_POST["postAuthor"], $_POST["postID"]]); 
    } 
}