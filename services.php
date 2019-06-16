<?php
include('includes/connect.php');

$query = $pdo->query("SELECT * FROM services");
$services = $query->fetchAll();

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>CoffeeTime</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
        <link rel="stylesheet" href="css/jquery.bxslider.css">
    </head>

    <body>
        <div id="container">
            <?php include('includes/header.php'); ?>
            <div class="services">

                <?php foreach($services as $service): ?>
                <?endforeach; ?>

            </div>
            <?php include('includes/footer.php'); ?>
        </div>
    </body>
</html>