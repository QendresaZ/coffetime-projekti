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

    if(empty($_POST['title'])) {
        array_push($errors, "You must type title");
        $error = true;
    }else {
        $title = test_input($_POST['title']);
    }

    if(empty($_POST['content'])) {
        array_push($errors, "You must type content");
        $error = true;
    }else {
        $content = test_input($_POST['content']);
    }

    $file = rand(1000,100000)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
    $folder = "../../uploads/";

    $imageFileType = strtolower(pathinfo($folder.$file,
    PATHINFO_EXTENSION));

    if($imageFileType != "jpg" && $imageFileType != "png" &&
        $imageFileType !="jpeg"
        && $imageFileType != "gif") {
            array_push($errors, 'Sorry, only JPG, JPEG, PNG & GIF files
            are allowed.');
            $error = true;
        }

        if(!$error) {
            move_uploaded_file($file_loc, $folder
            .$file);
            $sql = 'INSERT INTO services (title, description, photo) VALUES
                (:title, :description, :photo)';
                $query = $pdo->prepare($sql);
                $query->bindParam(':title', $title);
                $query->bindParam(':description', $content);
                $query->bindParam(':photo',$file);

                $query->execute();

                header("Location: services.php");
        }
}
?>

<div class="">
    <div class="container">
        <?php if(!empty($errors)) :?>
        <p>
            <?php foreach($errors as $err) { echo $err . '<br>';}?>
        </p>
    <?php endif; ?>
    <form name="add-service" action="add_services.php" method="post"
    enctype="multipart/form-data">
    <input type="text" name="title" placeholder="Enter Service Title"><br>
    <textarea name="content">Enter Service Description</textarea><br>
    <input type="file" name="file"/><br>
    <input type="submit" name="submit" value="Submit">
    </form>
    </div>
</div>

