<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link href="public/css/login.css" type="text/css" rel="stylesheet">
    <link href="public/css/register.css" type="text/css" rel="stylesheet">
    <title>LOGIN PAGE</title>
</head>

<body>
<header>
    <?php
      include "public/common/navbar.php";
    ?>
</header>

<main>
    <section>
        <div class="blurContainer"></div>

        <div class="login-container">
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
            <form class="register" action="register" method="POST">
                <p>name</p>
                <input name="name" type="text" placeholder="name">
                <p>email</p>
                <input name="email" type="text" placeholder="email@email.com">
                <p>password</p>
                <input name="password" type="password" placeholder="password">
                <button type="submit">Register</button>
            </form>
        </div>
    </section>
</main>
</body>