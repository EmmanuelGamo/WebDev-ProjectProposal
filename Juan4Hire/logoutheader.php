<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href="header.css">
    <title>Homepage</title>
</head>
<body>
    <div class = "navbar">
        <a class="logo" href="Home.php"><img src="J4Hlogo.png" alt="logo"></a>
        <form method="get" action="search.php">
        <input class="search" name="find" placeholder="Search" type="text">
        </form>
        <nav>
            <ul class="nav_links">
                <li><a href="Home.php">Home</a></li>
                <li>
                    <a href="#">Categories</a>
                     <ul>
                        <li><a href="category.php?id=000">Arts & Design</a></li>
                        <li><a href="category.php?id=001">Electronics</a></li>
                        <li><a href="category.php?id=010">Handcraft</a></li>
                        <li><a href="category.php?id=011">Support</a></li>
                    </ul>
                </li>
                <li><a href="messages.php">Messages</a></li>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </div>
</body>
</html>