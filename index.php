<?php 

require_once __DIR__ . "/app/core/config.inc.php";
require_once __DIR__ . "/app/core/database.inc.php";


if(isset($_GET['url'])){
    $pagePath = './app/pages/' . $_GET['url'] . '.php';
    if(file_exists($pagePath)){
        require_once($pagePath);
    } elseif(str_contains($_GET['url'], "blog/")){
        $_GET['url'] = str_replace("blog/", "", $_GET['url']);
        require_once('./app/pages/blog-post.php');
        echo $_GET['url'];
    } else {
        header('Location: ./404');
    }
} else {
    // If no specific page was requested, include the landing page
    require_once('./app/pages/landingpage.php');
}