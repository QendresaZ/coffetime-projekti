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

    $sql = 'SELECT * FROM about WHERE id = :id';
    $query = $pdo->prepare($sql);
    $query->execute(['id' => $id]);

    $article = $query->fetch();

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if(isset($_POST['submit'])) {
        $errors = array();
        $error = false;

        if(empty($_POST['title'])) {
            array_push($errors, 'You must type title');
            $error = true;
        } else {
            $title = test_input($_POST['title']);
        }

        if(empty($_POST['content'])) {
            array_push($errors, 'You must type content');
            $error = true;
        }else {
            $content = test_input($_POST['content']);
        }

        if(!errors) {
            $sql = 'UPDATE about SET title = :title, content = :content
            WHERE id = :id ';
            $query = $pdo->prepare($sql);
            $query->bindParam(":id", $id);
            $query->bindParam(':title', $title);
            $query->bindParam(':content', $content);

            $query->execute();

            header("Location: about.php");
        }
    }
    ?>

<div class="">
    <div class="container">
        <form action="edit_about.php" method="post" >
            <input type="hidden" name="id" value="?php echo $_GET
                ['id'] ?>"/>
            <input type="text" name="title" placeholder="Enter
                Article Title" value="<?= $article['title'] ?>"<br>
            <textarea name="content"><?= $article['content'] ?>
            </textarea><br>
            <input type="submit" name="submit" value="Submit">
        </form>
    </div>
</div>

