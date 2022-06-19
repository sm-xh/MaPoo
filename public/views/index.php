<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="public/css/style.css" type="text/css" rel="stylesheet">

    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v2.8.1/mapbox-gl.js'></script>
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v2.8.1/mapbox-gl.css' rel='stylesheet' />

    <link href="public/css/map.css" type="text/css" rel="stylesheet">
    <script src="public/js/map.js" defer></script>

    <title>MaPoo</title>
</head>
<body>
<header>
    <?php
    include "public/common/navbar.php";
    ?>
</header>
    <main>
        <section>
            <div id='map'>
            </div>
        </section>
    </main>
</html>