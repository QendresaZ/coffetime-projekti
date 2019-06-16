<?php
session_start();

if( isset($_SESSION['user_id']) ){
    header("Location: /");
}

require '../includes/connect.php';

if(isset($_POST['submit'])){
    $errors = array();
    $error = false;

    if(empty($_POST['name'])) {
        array_push($errors, 'You must type a name');
        $error = true;
    } else {
        $name = $_POST['name'];
    }

    if(empty($_POST['email'])) {
        array_push($errors, 'You must type an email');
        $error = true;
    } else {
        $email = $_POST['email'];
    }

    if(empty($_POST['password'])) {
        array_push($errors, 'You must type a password');
        $error = true;
    } else {
        $password = $_POST['password'];
    }

    $isAdmin = 0;

    if(isset($_POST['isAdmin'])) {
        $isAdmin = 1;
    }

    if(!$error){
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $message = '';

        $sql = 'INSERT INTO users (name, email, password, isAdmin) VALUES (:name, :email, :password, :isAdmin)';
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        $query = $pdo->prepare($sql);
        $query->bindParam(':name', $name);
        $query->bindParam(':email', $email);
        $query->bindParam(':password', $password);
        $query->bindParam(':isAdmin',$isAdmin);

        $regStatus = $query->execute();

        if($regStatus) {
            $message = "Successfully created your account";
        } else {
            $message = "A problem occurred creating your account";
            echo "\PDO::errorInfo():\n";
            print_r($pdo->errorInfo());
        }
    }
}
?>

<div class="">
    <div class="container">
        <?php
        if(!empty($message)) {
            echo "<p>$message</p>";
        }
        ?>
        <h1>Register</h1>
        <span>or <a href="login.php">login here</a></span>
        <?php if(!empty($errors)): ?>
            <p>
                <?php foreach ($errors as $err) { echo $err . '<br>'; }?>
            </p>
        <?php endif; ?>
        <form name="signup-form" action="signup.php" method="post">
            <input type="text" name="name" placeholder="Enter your name"><br>
            <input type="text" name="email" placeholder="Enter your email"><br>
            <input type="password" name="password" id="password" placeholder="Enter your password"><br>
            <input type="checkbox" name="isAdmin">isAdmin<br/>
            <input type="submit" name="submit" value="Submit">
        </form>
    </div>
</div>