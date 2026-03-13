<?php
require_once __DIR__ . "/../elements/breadcrumb.php";
$blogData = $blog->getPostDataByURL($_GET["url"], $siteURL);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PMBS - Example Blog #1</title>

    <link rel="stylesheet" href="<?= $siteURL ?>/assets/css/style.css">
</head>
<body>

    <?= breadcrumb($siteURL , $blogData["PostTitle"], $blogData["PostURL"]) ?>
    <div class="container">
        <div class="content">
            <?php
            echo $blogData["PostContent"];
            ?>
        </div>
    </div>

</body>
</html>