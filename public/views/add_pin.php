<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="public/css/style.css" type="text/css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <script src='public/js/mapbox-gl.js'></script>
    <link href='public/css/mapbox-gl.css' rel='stylesheet' />

    <link href="public/css/map.css" type="text/css" rel="stylesheet">
    <script src="public/js/map.js" defer></script>
    <script src="public/js/map-custom-search.js" defer></script>

    <meta name='viewport' content='width=device-width, initial-scale=1' />
    <script src='public/js/mapbox-gl-geocoder.min.js'></script>

    <link href="public/css/adding-box.css" type="text/css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <link href="public/css/popup.css" type="text/css" rel="stylesheet">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js">
        var elements = $("body").find("[aria-controls='Search']");
        console.log(elements);
        $(elements).attr('name', 'location-from-search');
    </script>

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
                    <?php
                    if(isset($messages)){
                        echo "<div class='alert-box show'>";
                        echo "<span class='fas fa-exclamation-circle'></span>";
                        echo "<span class='msg' id='message'>";
                        foreach($messages as $message) {
                            echo $message;
                        }
                        echo "</span>";
                        echo "<div class='close-btn'>";
                        echo "<span class='fas fa-times''></span>";
                        echo "</div>";
                        echo "</div>";
                    }
                    if(isset($error)){
                        echo "<div class='alert-box show'>";
                        echo "<span class='fas fa-exclamation-circle'></span>";
                        echo "<span class='msg' id='message'>";
                        foreach($messages as $message) {
                            echo $message;
                        }
                        echo "</span>";
                        echo "<div class='close-btn'>";
                        echo "<span class='fas fa-times''></span>";
                        echo "</div>";
                        echo "</div>";
                    }
                    ?>
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

                    <button type="submit" class="submit-add">Confirm</button>

                </form>
            </div>
        </div>
    </section>
</main>


<script>

    $('.close-btn').click(function(){
        $('.alert-box').removeClass("show");
        $('.alert-box').addClass("hide");
    });
</script>

</html>