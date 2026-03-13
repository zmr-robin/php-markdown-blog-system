<?php
$user->checkSession();
if(isset($_POST["postBreadcrumb"]) && isset($_POST["postTitle"]) && isset($_POST["postAuthor"]) && isset($_POST["postDate"]) && !isset($_POST["postID"])){
    $pmbs->upload();
} else if(isset($_POST["postBreadcrumb"]) && isset($_POST["postTitle"]) && isset($_POST["postAuthor"]) && isset($_POST["postID"])){
    $pmbs->update();
}
require_once __DIR__ . "/../elements/breadcrumb.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PMBS - Admin panel</title>

    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>

    <?= breadcrumb($siteURL , "PMBS", "pmbs") ?>

    <div class="container">
        <div class="upload-post">
            <h2>Upload a Post</h2>
            <form action="" method="Post" enctype="multipart/form-data">
                <div class="postData">
                    <label for="postTitle">Post title:</label><br>
                    <input type="text" name="postTitle"><br>
                    <label for="postTitle">Post breadcrumb:</label><br>
                    <input type="text" name="postBreadcrumb"><br>
                    <label for="postAuthor">Post author:</label><br>
                    <input type="text" name="postAuthor"><br>
                    <label for="postDate">Post date:</label><br>
                    <input type="date" name="postDate" id=""><br>
                </div>
                <div class="postFile">
                    <label id="drop-zone">
                        Drop .txt or .md file here,<br>
                        or click to upload.
                        <input type="file" id="fileInput" name="fileInput" accept=".txt,.md,text/plain,text/markdown" multiple>
                    </label>
                    <div class="preview-section">
                        <ul id="preview"></ul>
                    </div>
                    <input type="submit" value="Submit">
                </div>
            </form>
        </div>

        <div class="blog-overview">
            <div class="blog-tree" style="height: 100%;">
                <h2>Blog posts</h2>
                <div class="blog-listings">
                    <?php

                    $results = $blog->getAll();

                    foreach($results as $result){
                        echo '
                    <div class="blog-post">
                        <div class="blog-name-stats">
                            <h3>' . $result['PostTitle'] . '<span>/<i> Views: ' . $blog->getViews($result['PostID']) . '</i></span></h3>
                        </div>
                        <div class="blog-controlls">
                            <a href="'. $siteURL . "blog/"  . $result['PostURL'] . '"><button>View</button></a>
                            <a href="'. $siteURL . 'pmbs?edit=' . $result['PostURL'] . '"><button>Edit</button></a>
                            <a href="'. $siteURL . 'pmbs?archive=' . $result['PostID'] . '"><button>Archive</button></a>
                        </div>
                    </div>
                        ';
                    }
        

            ?>
                </div>
            </div>
            <?php
            if(isset($_GET["edit"])){
                $blogData = $blog->getPostDataByURL($_GET["edit"], $siteURL);
                echo "
                <div class='blog-post-settings' style='display: block;'>
                    <h2>Settings - Example 1</h2>
                    <form action='' method='post'>
                        <input type='text' name='postID' style='display: none;' value=" . $blogData["PostID"] . ">
                        <label for='postTitle'>Post title:</label><br>
                        <input type='text' name='postTitle' value='" . $blogData["PostTitle"] . "'><br>
                        <label for='postTitle'>Post breadcrumb:</label><br>
                        <input type='text' name='postBreadcrumb' value='" . $blogData["PostURL"] . "'><br>
                        <label for='postAuthor'>Post author:</label><br>
                        <input type='text' name='postAuthor' value='" . $blogData["PostAuthor"] . "'><br>
                        <input type='submit' value='Submit'>
                    </form>
                </div>
                ";
            }

            ?>
        </div>


    </div>



    <script src="./assets/js/upload.js"></script>

</body>

</html>