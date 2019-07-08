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

    $sql = 'SELECT * FROM services WHERE id = :id';
    $query = $pdo->prepare($sql);
    $query->execute(['id' => $id]);

    $service = $query->fetch();

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
            array_push($errors, 'You must type content');
            $error = true;
        } else {
            $content = test_input($_POST['content']);
        }

        $file = rand(1000,100000)."-".$_FILES['file']['name'];
        $file_loc = $_FILES['file']['tmp_name'];
        $folder = "../../uploads";

        $imageFileType = strtolower(pathinfo($folder.$file, PATHINFO_EXTENSION));

        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType
        !="jpeg" && $imageFileType != "gif") {
            array_push($errors, 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.');
            $error = true;
        }

        if(!$error) {
            move_uploaded_file($file_loc, $folder.$file);
            $sql = 'UPDATE services SET title = :title, description = 
            :description, photo = :photo WHERE id = :id';
            $query = $pdo->prepare($sql);
            $query->bindParam(":id", $id);
            $query->binParam(":title", $title);
            $query->bindParam(":description", $content);
            $query->bindParam(":photo", $file);

            $query->execute();

            header("Location: services.php");
        }
    }
?>

<div class="">
    <div class="container">
        <?php if(!empty($errors)): ?>
        <p>
            <?php foreach ($errors as $err) { echo $err . '<br>'; }?>
        </p>
            <?php endif; ?>
        
        <form action="edit_services.php" name="edit-service"
                method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>"/>
                <input type="text" name="title" placeholder="Enter Article Title" 
                value="<?= $service['title']; ?>"><br>
                <textarea name="content"><?= $service['description']; ?>
                </textarea><br>
                <input type="file" name="file"/><br>
                <input type="submit" name="submit" value="Submit">
        </form>   
    </div>
</div>