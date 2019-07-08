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

    $query = $pdo->query("SELECT * FROM users");
    $users = $query->fetchAll();

    ?>

<!doctype html>
<head>
</head>
<body>
    <div class="container">
        <a href="add_users.php">Add a new user</a>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>isAdmin</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($users as $user): ?>
                    <tr>
                        <td><?php echo $user['name']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td><?php echo $user['isAdmin']; ?></td>
                        <td><a href="edit_user.php?id=<?php echo $user['id'
                        ]; ?> ">Edit</a></td>
                        <td><a href="delete_user.php?id=<?php echo $user[
                            'id']; ?>">Delete</a></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </body>
        </html>
