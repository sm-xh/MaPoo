<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <title>LOGIN PAGE</title>
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
                <li><a href="#">Search for toilets</a></li>
                <li><a href="#">Add new toilet</a></li>
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
            <div class="login-container">
                <form class="login" action="login" method="POST">
                    <div class="messages">
                        <?php
                        if(isset($messages)){
                            foreach($messages as $message) {
                                echo $message;
                            }
                        }
                        ?>
                    </div>
                    <input name="email" type="text" placeholder="email@email.com">
                    <input name="password" type="password" placeholder="password">
                    <button type="submit">LOGIN</button>
                </form>
            </div>
        </div>
    </section>
</main>
</body>