<?php require('../../includes/connect.php'); ?>

<?php
session_start();

if(!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
}

if($_SESSION['isAdmin'] == 0) {
    echo 'Not Authorized';
    exit;
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if(isset($_POST['submit'])) {
    $errors = array();
    $error = false;

    if(empty($_POST['title'])){
        array_push($errors, 'You must type title');
        $error = true;
    } else {
        $title = test_input($_POST['title']);
    }

    if(empty($_POST['content'])) {
        array_push($errors, "You must type content");
        $error = true;
    }else {
        $content = test_input($_POST['content']);
    }

    if(!$error) {
        $sql = 'INSERT INTO about (title, content) VALUES 
            (:title, :content)';
        $query = $pdo->prepare($sql);
        $query->bindParam(':title', $title);
        $query->bindParam(':content', $content);

        $query->execute();
        header("Location: about.php");
    }
}
?>

<div class="">
    <div class="container">
        <form action="add_about.php" method="post">
            <input type="text" name="title" placeholder="Enter Article Title"><br>
            <textarea name="content">Enter Article Content</textarea><br>
            <input type="submit" name="submit" value="Submit">
        </form>
    </div>
</div>

