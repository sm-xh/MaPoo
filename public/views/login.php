<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link href="public/css/login.css" type="text/css" rel="stylesheet">
    <title>LOGIN PAGE</title>
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