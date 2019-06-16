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

    $query = $pdo->query("SELECT * FROM about");
    if($query) {
        $aboutarticles = $query->fetchAll();
    }

    ?>

<!DOCTYPE html>
<html>
    <head>

    </head>
<body>
    <div class="container">
        <a href="add_about.php">Add a new article</a>
        <table>
            <thead>
            <tr>
                <th>Title</th>
                <th>Contact</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                <?php foreach ($aboutarticles as $article) : ?>
                    <tr>
                        <td><?php echo $article['title']; ?></td>
                        <td><?php echo $article['content']; ?></td>
                        <td><a href="edit_about.php?id=<?php echo
                            $article['id']; ?>">Edit</a> </td>
                        <td><a href="delete_about.php?id=<?php echo
                            $article['id']; ?>">Delete</a> </td>
                    </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
