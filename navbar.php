<?php
// Start a session if none exists
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<nav class="navbar navbar-expand-md navbar-dark bg-dark sticky-top">
    <!-- Favicon -->
    <a href="home.php">
        <img class="img-responsive" width="50px" src="./images/logo.png" alt="Logo">
    </a>

    <!-- Toggler button for collapsing navbar in smaller screens -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent"
        aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarContent">
        
        <!-- Navbar links -->
        <ul class="navbar-nav mr-auto">
            <!-- Home Link -->
            <li class="nav-item">
                <a class="nav-link" href="home.php">Home</a>
            </li>

            <!-- Official Merch & Kits Dropdown -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="kitsDropdown" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">Official Merch & Kits</a>
                <div class="dropdown-menu" aria-labelledby="kitsDropdown">
                    <a class="dropdown-item" href="kit.php?type=home">Home Kit</a>
                    <a class="dropdown-item" href="kit.php?type=away">Away Kit</a>
                </div>
            </li>

            <!-- Players Link -->
            <li class="nav-item">
                <a class="nav-link" href="playergallery.php">Players</a>
            </li>

            <!-- Gallery Link -->
            <li class="nav-item">
                <a class="nav-link" href="gallery.php">Gallery</a>
            </li>

            <!-- Trophies Link -->
            <li class="nav-item">
                <a class="nav-link" href="trophies.php">Trophies</a>
            </li>

            <!-- News Link -->
            <li class="nav-item">
                <a class="nav-link" href="articlegallery.php">News</a>
            </li>

            <!-- About Link -->
            <li class="nav-item">
                <a class="nav-link" href="about.php">About</a>
            </li>

            <!-- Contact Us Dropdown -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="contactDropdown" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">Contact Us</a>
                <div class="dropdown-menu" aria-labelledby="contactDropdown">
                    <a class="dropdown-item" href="https://www.instagram.com/realmadrid/" target="_blank">Instagram</a>
                    <a class="dropdown-item" href="https://twitter.com/realmadrid" target="_blank">Twitter</a>
                    <a class="dropdown-item" href="https://www.facebook.com/RealMadrid" target="_blank">Facebook</a>
                </div>
            </li>
        </ul>

        <!-- Search form -->
        <form class="form-inline my-2 my-lg-0 mr-3" action="search.php" method="get">
            <input type="text" name="query" placeholder="Search" class="form-control mr-sm-2" id="searchInput" required>
            <button type="submit" class="btn btn-outline-success my-2 my-sm-0">Submit</button>
        </form>

        <!-- Logout form (visible only if user is logged in) -->
        <?php if (isset($_SESSION['username'])): ?>
            <form action="logout.php" method="post" class="form-inline my-2 my-lg-0">
                <button type="submit" class="btn btn-outline-danger">Logout</button>
            </form>
        <?php endif; ?>
    </div>
</nav>