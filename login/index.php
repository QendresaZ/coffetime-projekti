<?php
session_start();

if(!isset($_SESSION['user_id'])) {
    header("Location: login.php");
}

?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CoffeeTime</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
</head>
<body>

    <ul class="nav-text">
        <li><a href="login.php">Home</a> </li>
        <li><a href="services/services.php">Services</a> </li>
        <?php if($_SESSION['isAdmin'] == 1): ?>
            <li><a href="users/users.php">Users</a> </li>
        <?php endif; ?>
        <li><a href="about/about.php">About</a> </li>
        <?php if(isset($_SESSION['name'])): ?>
            <li><a href="logout.php">Logout</a> </li>
        <?php else: ?>
            <li><a href="login/php">Login</a> </li>
            <li><a href="signup.php">Signup</a> </li>
        <?php endif; ?>

    </ul>
    <h2>Welcome, <a href="#"><?php echo $_SESSION['name']; ?></a> </h2>
    </ul>
    </ul>
</body>
</html>
