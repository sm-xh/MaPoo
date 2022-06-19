<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link href="public/css/login.css" type="text/css" rel="stylesheet">
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
        <div class="blurContainer">        </div>

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
                <form class="login" action="login" method="POST">

                    <p>email</p>
                    <input name="email" type="text" placeholder="email@email.com">
                    <p>login</p>
                    <input name="password" type="password" placeholder="password">
                    <button type="submit">LOGIN</button>
                </form>
            </div>
    </section>
</main>
</body>