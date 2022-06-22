<?php
require_once __DIR__."/../../src/controllers/SiteContentController.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include __DIR__."/../common/head.php"?>

    <link href="public/css/search-box.css" type="text/css" rel="stylesheet">

    <title>MaPoo</title>
</head>
<body>
<header>
    <?php
    SiteContentController::NavbarSelector();
    ?>
</header>
<main>
    <section>
        <div id='map'>
        </div>
    </section>
</main>
</html>