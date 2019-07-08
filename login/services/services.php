<?php
    session_start();

    if(!isset($_SESSION['user_id'])) {
        header("Location: ../login.php");
    }

    if($_SESSION['isAdmin'] == 0) {
        echo 'Not Authorized';
        exit;
    }


    require '../../includes/connect.php';

    $query = $pdo->query("SELECT * FROM services");
    $services = $query->fetchAll();

    ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <div class="container">
    <a href="add_services.php">Add a new service</a>
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>PictureLoc</th>
                    <th>Date Created</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($services as $service) : ?>
                    <tr>
                        <td><?php echo $service['title']; ?></td>
                        <td><?php echo $service['description']; ?></td>
                        <td><?php echo $service['photo']; ?></td>
                        <td><?php echo $service['date_created']; ?></td>
                        <td><a href="edit_services.php?id=<?php echo $service['id']; ?>">Edit</a></td>
                        <td><a href="delete_services.php?id=<?php echo $service['id']; ?>">Delete</a></td>
                    </tr>
                <?php endforeach; ?>
</tbody>
</table>
</div>
</body>
</html>