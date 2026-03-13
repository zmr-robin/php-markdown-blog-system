<?php 

session_start();

// Require Composer autoload
require_once __DIR__ . "/vendor/autoload.php";

require_once __DIR__ . "/app/config/config.inc.php";
require_once __DIR__ . "/app/core/database.inc.php";
require_once __DIR__ . "/app/core/blog.inc.php";
require_once __DIR__ . "/app/core/pmbs.inc.php";
require_once __DIR__ . "/app/core/phpmarkdown.php";
require_once __DIR__ . "/app/core/user.inc.php";

$conn = new Database($host, $table, $user, $pass);
$blog = new Blog($conn, $siteURL);
$pmbs = new PMBS($conn);
$user = new User($conn, $siteURL);

if(isset($_GET['url'])){
    $pagePath = './app/pages/' . $_GET['url'] . '.php';
    if(file_exists($pagePath)){
        require_once($pagePath);
    } elseif(str_contains($_GET['url'], "blog/")){
        $_GET['url'] = str_replace("blog/", "", $_GET['url']);
        require_once('./app/pages/blog.page.php');
    } else {
        header('Location: ./404');
    }
} else {
    // If no specific page was requested, include the landing page
    require_once('./app/pages/landingpage.php');
}