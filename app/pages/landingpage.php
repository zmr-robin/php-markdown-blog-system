<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PMBS - php markdown blog system</title>

    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>

    <div class="header">
        <h1><?= $sitenName ?></h1>
        <div class="breadcrumb">
            <p>><span><a href="">Home</a></span>></p>
        </div>
    </div>

    <div class="container">
        <div class="about">
            <h2>About PMBS</h2>
            <p>Open source blogging system based on PHP - converting markdown files to HTML blog pages.</p>
            <p>The Markdown conversion to HTML is done by my libary "<a href="https://github.com/zmr-robin/php-markdown">php-markdown</a>"</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi molestias, nisi quia nesciunt illo incidunt ut non dolor nemo ea, deleniti eaque sequi neque quidem, laboriosam deserunt fugiat possimus odio!</p>
        </div>
        <div class="blog-listings">
            <div class="blog-post">
                <h2>Example Blog #1</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis necessitatibus accusantium at obcaecati laborum quidem explicabo saepe. Aliquam atque earum quae quia sapiente, reprehenderit, iure aspernatur error, suscipit tenetur nihil?</p>
                <p><a href="blog.html">Read more...</a></p>
            </div>
            <?php

            $results = $blog->getAll();

            foreach($results as $result){
                $postContent=strpos($result['PostContent'], ' ', 200);
                echo "
                <div class='blog-post'>
                    <h2>" . $result['PostTitle'] . "</h2>
                    <p>" . substr($result['PostContent'],0,$postContent ) . "</p>
                    <p><a href='{$siteURL}blog\\" . $result['PostURL'] . "'>Read more...</a></p>
                </div>
                ";
            }
        

            ?>
        </div>
    </div>

</body>
</html>