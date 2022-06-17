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

    <meta name='viewport' content='width=device-width, initial-scale=1' />
    <script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.min.js'></script>
    <link href="public/css/search-box.css" type="text/css" rel="stylesheet">

    <link href="public/css/adding-box.css" type="text/css" rel="stylesheet">

    <title>MaPoo</title>
</head>
<body>
<header>
    <nav class="navbar">
        <div class="mapoo-title"><a href="">MapPoo</a></div>
        <a href="#" class="toggle-button">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </a>
        <div class="toilet-options">
            <ul>
                <li><a href="map">Search for toilets</a></li>
                <li><a href="add">Add new toilet</a></li>
            </ul>
        </div>
        <div class="user-options">
            <ul>
                <li><a href="login">Login</a></li>
                <li><a href="register">Register</a></li>
                <li><a href="#">About</a></li>
            </ul>
        </div>
    </nav>
</header>
<main>
    <section>
        <div id='map'>
            <div class="add-container">
                enter data
            </div>
        </div>
    </section>
</main>
</html>