<?php
    session_start();

    if(isset($_SESSION['user_id'])) {
        header("Location: index.php");
    }

    require '../includes/connect.php';

    if(isset($_POST['submit'])):
        $errors = array();
        $error = false;

        if(empty($_POST['email'])) {
            array_push($errors, 'You must type email');
            $error = true;
        } else {
            $email = test_input($_POST['email']);
        }

        if(empty($_POST['password'])) {
            array_push($errors, "You must type password");
            $error = true;
        } else {
            $password = test_input($_POST['password']);
        }

        $message = '';

        if(!$error) {
            $query = $pdo->prepare("SELECT id, name, email, password, isAdmin
            FROM users WHERE email = :email");
            $query->bindParam(":email", $email);
            $query->execute();

            $user = $query->fetch();

            if(!is_null($user) && password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['name'] = $user['name'];
                $_SESSION['isAdmin'] = $user['isAdmin'];

                header("Location: index.php");
            }else {
                $message = 'Sorry, those credentials do not match';
            }
        }

        endif;

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        ?>

<!doctype html>
<html>
<head>

</head>
<body>
    <?php if(!empty($message)): ?>
        <p><?php echo $message ?></p>
    <?php endif; ?>

    <h1>Login</h1>
    <span>or <a href="signup.php">Signup here</a> </span>
    <?php if(!empty($errors)): ?>
        <p>
            <?php foreach($errors as $err) { echo $err . '<br>'; }?>
        </p>
    <?php endif; ?>
    <form name="login" action="login.php" method="post">
        <input type="text" placeholder="Enter your email" name="email">
        <br/>
        <input type="password" placeholder="and password"
               name="password"><br/>
        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>


<script src="https://cdn.jsdelivr.net/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
	<script src="../js/login-validation.js"></script>