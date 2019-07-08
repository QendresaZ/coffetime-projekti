<?php
    require '../../includes/connect.php';
    session_start();
    if(!isset($_SESSION['user_id'])) {
        header("Location: ../login.php");
    }

    if($_SESSION['isAdmin'] == 0) {
        echo 'Not Authorized';
        exit;
    }

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
    }

    if(isset($_POST['id'])) {
        $id = $_POST['id'];
    }

    $sql = 'SELECT * FROM users WHERE id = :id';
    $query = $pdo->prepare($sql);
    $query->execute(['id' => $id]);

    $user = $query->fetch();

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $isAdmin = 0;
        $isAdmin = $_POST['isAdmin'];
        if(isset($isAdmin)) {
            $isAdmin = 1;
        }

        $sql = 'UPDATE users SET name = :name, email = :email, isAdmin = :isAdmin WHERE id = :id ';
        $query = $pdo->prepare($sql);
        $query->bindParam(':name', $name);
        $query->bindParam(':email', $email);
        $query->bindParam(':id', $id);
        $query->bindParam(":isAdmin", $isAdmin);

        $query->execute();

		
        header("Location: users.php");

    }

?>

<div class="mt-2">
    <div class="container">
        <form method="post" method="post">
            <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
            <input type="text" name="name" value="<?php echo $user['name']; ?>" placeholder="Enter your name"><br>
            <input type="text" name="email" value="<?php echo $user['email']; ?>" placeholder="Enter your email"><br>
            <input type="checkbox" name="isAdmin" <?php if($user['isAdmin'] == 1): ?> checked <?php endif; ?>>isAdmin<br/>
            <input type="submit" name="submit" value="Submit">
        </form>
    </div>
</div>