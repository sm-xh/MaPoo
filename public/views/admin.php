<?php
require_once __DIR__ . "/../../src/controllers/SiteContentController.php";
require_once __DIR__ . "/../../src/controllers/PermissionController.php";
(new PermissionController)->checkIfLoggedIn($_COOKIE['user']);
(new PermissionController)->checkIfIsAdmin($_COOKIE['user']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include __DIR__."/../common/head.php"?>
    <link href="public/css/admin.css" type="text/css" rel="stylesheet">

    <title>MaPoo</title>
</head>
<body>
<header>
    <?php
        include __DIR__."/../common/navbar-admin.php"
    ?>
</header>
<main>

</main>
</html>