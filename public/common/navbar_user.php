<nav class="navbar">
    <div class="mapoo-title"><a href="index">MapPoo</a></div>
    <a href="#" class="toggle-button">
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
    </a>
    <div class="toilet-options">
        <ul>
            <li id="search-toilet"><a href="map">Search for toilets</a></li>
            <li id="add-toilet"><a href="add_pin">Add new toilet</a></li>
        </ul>
    </div>
    <div class="user-options">
        <ul>
            <li>Logged as:
                <?php
                $cookie = json_decode($_COOKIE['user'], true);
                echo $cookie['email'];
                ?></li>
            <li><a href="logout">Logout</a></li>
        </ul>
    </div>
</nav>