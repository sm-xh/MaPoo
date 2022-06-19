<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="public/css/style.css" type="text/css" rel="stylesheet">

    <script src='public/js/mapbox-gl.js'></script>
    <link href='public/css/mapbox-gl.css' rel='stylesheet' />

    <link href="public/css/map.css" type="text/css" rel="stylesheet">
    <script src="public/js/map.js" defer></script>
    <script src="public/js/map-custom-search.js" defer></script>

    <meta name='viewport' content='width=device-width, initial-scale=1' />
    <script src='public/js/mapbox-gl-geocoder.min.js'></script>

    <link href="public/css/adding-box.css" type="text/css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js">
        var elements = $("body").find("[aria-controls='Search']");
        console.log(elements);
        $(elements).attr('name', 'location-from-search');
    </script>

    <title>MaPoo</title>
</head>
<body>
<header>
    <nav class="navbar">
        <div class="mapoo-title"><a href="index">MapPoo</a></div>
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
                <div class="container-header">Adding new toilet pin</div>
                <form class="add_pin" action="add_pin" method="POST">
                    <input name="coordinates" id="hidden-coordinates" type="text" hidden>
                    <p>Comment</p><hr>
                    <input name="comment" type="text" placeholder="Enter the e.g. tips">
                    <p>Address Information</p><hr>
                    <div id="autocomplete-placeholder"></div>
                    <input name="select_from_map" class="map_select" type="text" placeholder="Select from the map - COMING SOON!" disabled>
                    <p>Detail</p><hr>

                    <table class="sliders-table">

                        <tr>
                            <td>
                                <label class="switch">
                                    <input type="checkbox" checked>
                                    <span class="slider round"></span>
                                    <span class="toggle-label">Unisex</span>

                                </label>
                            </td>
                            <td>
                                <label class="switch">
                                    <input type="checkbox" checked>
                                    <span class="slider round"></span>
                                    <span class="toggle-label">Disabled</span>
                                </label>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <label class="switch">
                                    <input type="checkbox" checked>
                                    <span class="slider round"></span>
                                    <span class="toggle-label"><b>Free</b></span>
                                </label>
                            </td>
                            <td>
                                <label class="switch">
                                    <input type="checkbox" checked>
                                    <span class="slider round"></span>
                                    <span class="toggle-label">Baby change</span>
                                </label>
                            </td>

                        </tr>

                    </table>

                    <button type="submit" class="submit-add">CONFIRM</button>

                </form>
            </div>
        </div>
    </section>
</main>
</html>