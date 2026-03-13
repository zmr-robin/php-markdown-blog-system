<?php


// Load environment variables  
use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(__DIR__ . "");
$dotenv->load();


// Database configuration
$host = $_ENV["DB"];
$table = $_ENV["DB_TABLE"];
$user = $_ENV["DB_USER"];
$pass = $_ENV["DB_PASS"];

//Site config
$siteURL = "http://localhost/php-markdown-blog-system/";
$sitenName = "PMBS";
$copyRight = "copyright © PMBS";

