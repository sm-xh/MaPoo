<?php
require_once __DIR__."/../../src/controllers/SiteContentController.php";
require_once __DIR__."/../../src/controllers/PermissionController.php";
(new PermissionController)->checkIfLoggedIn($_COOKIE['user']);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <?php include __DIR__."/../common/head.php"?>

    <link href="public/css/adding-box.css" type="text/css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js">
        var elements = $("body").find("[aria-controls='Search']");
        $(elements).attr('name', 'location-from-search');
    </script>

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
                                    <input type="checkbox" name="free" checked>
                                    <span class="slider round"></span>
                                    <span class="toggle-label"><b>Free</b></span>
                                </label>
                            </td>
                            <td>
                                <label class="switch">
                                    <input type="checkbox" name="disabled" >
                                    <span class="slider round"></span>
                                    <span class="toggle-label">Disabled</span>
                                </label>
                            </td>

                        </tr>
                        <tr>

                            <td>
                                <label class="switch">
                                    <input type="checkbox" name="unisex">
                                    <span class="slider round"></span>
                                    <span class="toggle-label">Unisex</span>
                                </label>
                            </td>
                            <td>
                                <label class="switch">
                                    <input type="checkbox" name="baby_change">
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