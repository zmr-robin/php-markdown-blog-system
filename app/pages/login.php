<?php
if(isset($_SESSION["username"])){
    Header("Location: {$siteURL}pmbs");
}
if(isset($_POST["userName"]) && isset($_POST["userPassword"])){
    $user->login();
} 
require_once __DIR__ . "/../elements/breadcrumb.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PMBS - login</title>

    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>

    <?= breadcrumb($siteURL , "Login", "login") ?>

    <div class="container">
        <div class="setup">
            <h2>Login</h2>
            <form action="" method="post">
                <label for="userName">Username:</label><br>
                <input type="text" name="userName"><br>
                <label for="userPassword">Password</label><br>
                <input type="password" name="userPassword"><br><br>
                <input type="submit" value="Login">
            </form>
        </div>
    </div>

    <script src="./assets/js/upload.js"></script>

</body>

</html>