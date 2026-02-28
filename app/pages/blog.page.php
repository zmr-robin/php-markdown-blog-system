<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PMBS - Example Blog #1</title>

    <link rel="stylesheet" href="<?= $siteURL ?>/assets/css/style.css">
</head>
<body>

    <div class="header">
        <h1>PMBS</h1>
        <div class="breadcrumb">
            <p>><span><a href="./index.html">Home</a></span>><span><a href="">Blog</a></span>><span><a href="">Example Blog #1</a></span></p>
        </div>
    </div>

    <div class="container">
        <div class="content">
            <?php
            $blogData = $blog->getPostDataByURL($_GET["url"]);
            echo $blogData["PostContent"];
            ?>
        </div>
    </div>

</body>
</html>