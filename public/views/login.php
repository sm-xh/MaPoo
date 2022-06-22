<?php
require_once __DIR__."/../../src/controllers/SiteContentController.php";
?>

<!DOCTYPE html>

<head>
    <?php include __DIR__."/../common/head.php"?>

    <link href="public/css/login.css" type="text/css" rel="stylesheet">
    <title>Login page</title>
</head>

<body>
<header>
    <?php
    SiteContentController::NavbarSelector();
    ?>
</header>

<main>
    <section>
        <div class="blurContainer">        </div>

        <div class="login-container">
            <p>You don't have an account? <a href="register">Register now!</a></p>

            <div class="messages">
                <?php
                if(isset($messages)){
                    foreach($messages as $message) {
                        echo $message;
                    }
                }
                ?>
            </div>
            <hr>
                <form class="login" action="login" method="POST">

                    <p>email</p>
                    <input name="email" type="text" placeholder="email@email.com">
                    <p>login</p>
                    <input name="password" type="password" placeholder="password">
                    <button type="submit">Login</button>
                </form>

        </div>
    </section>
</main>
</body>