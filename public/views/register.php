<?php
require_once __DIR__."/../../src/controllers/SiteContentController.php";
?>

<!DOCTYPE html>

<head>
    <?php include __DIR__."/../common/head.php"?>

    <link href="public/css/login.css" type="text/css" rel="stylesheet">
    <link href="public/css/register.css" type="text/css" rel="stylesheet">

    <script src="public/js/form_validator.js"></script>

    <title>Login Page</title>
</head>

<body>
<header>
    <?php
    SiteContentController::NavbarSelector();
    ?>
</header>

<main>
    <section>
        <div class="blurContainer"></div>

        <div class="login-container">
            <div class="messages" id="mess">
                <?php
                if(isset($messages)){
                    foreach($messages as $message) {
                        echo $message;
                    }
                }
                ?>
            </div>
            <hr>
            <form class="register" onsubmit="return validateForm()" name="signup" action="register" method="POST">
                <p>name</p>
                <input name="name" id="user_name" type="text" placeholder="name">
                <p>email</p>
                <input name="email" id="email" type="text" placeholder="email@email.com">
                <p>password</p>
                <input name="password" id="password" type="password" placeholder="password">
                <button type="submit">Register</button>
            </form>
        </div>
    </section>
</main>
</body>