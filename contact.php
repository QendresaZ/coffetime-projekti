<?php
    require 'includes/connect.php';

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if(isset($_POST['submit'])){
        $errors = array();
        $error = false;
    
        if(empty($_POST['name'])) {
            array_push($errors, 'You must type your name');
            $error = true;
        } else {
            $name = $_POST['name'];
        }
    
        if(empty($_POST['surname'])) {
            array_push($errors, 'You must type your surname');
            $error = true;
        } else {
            $surname = $_POST['surname'];
        }
    
        if(!empty($gender) && $gender != "Male" && $gender != "Female"){
            $error[] = "Gender not valid";
        } else {
            $gender = $_POST['gender'];
        }

        if(empty($_POST['phone'])) {
            array_push($errors, 'You must type a phone number');
            $error = true;
        } else {
            $phone = test_input($_POST['phone']);
        }

        if(empty($_POST['email'])) {
            array_push($errors, 'You must type an email');
            $error = true;
        } else {
            $email = test_input($_POST['email']);
        }

        if(empty($_POST['fac_coffee'])) {
            array_push($errors, 'You must check a favorite coffee');
            $error = true;
        } else {
            $fac_coffee = $_POST['fac_coffee'];
        }

        if(empty($_POST['age'])) {
            array_push($errors, 'You must check an age');
            $error = true;
        } else {
            $age = $_POST['age'];
        }

        $fav = implode("|", $fac_coffee);


        if(!$error){
            $message = '';
            
            $sql = 'INSERT INTO contacts (name, surname, gender, phone, email, fav_coffee, age) 
            VALUES (:name, :surname, :gender, :phone, :email, :fav_coffee, :age)';
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            $query = $pdo->prepare($sql);
            $query->bindParam(':name', $name);
            $query->bindParam(':surname', $surname);
            $query->bindParam(':gender', $gender);
            $query->bindParam(':phone',$phone);
            $query->bindParam(':email',$email);
            $query->bindParam(':fav_coffee',$fav);
            $query->bindParam(':age',$age);
    
            $contact = $query->execute();
    
            if($contact) {
                $message = "Successfully send your data";
            } else {
                $message = "A problem occurred sending your data";
                echo "\PDO::errorInfo():\n";
                print_r($pdo->errorInfo());
            }
        }
    }
?>


<!DOCTYPE  html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CoffeeTime</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
    <link rel="stylesheet" href="css/jquery.bxslider.css">
</head>
<body>
    <div id="container">
      <?php include('includes/header.php'); ?>
        <!-- Content Section -->

       <div class="contactUs">
           <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2934.6700195047606!2d21.150935315616!3d42.6471549791686!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x13549e8d5d607f25%3A0xa31dd05b21bd09de!2sUniversiteti+p%C3%ABr+Biznes+dhe+Teknologji!5e0!3m2!1sen!2s!4v1526808952688"
             width="500" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
           </div>

           <div class="form">
               <form action="contact.php" method="POST" id="form" name="form-registration">
               <label for="name">Name: </label><br/>
               <input name="name" type="text" required minlength="2"
               class="input-text" id="name" placeholder="Enter your name" /><br/>
               <label for="surname">Surname: </label><br/>
               <input name="surname" type="text" required class="input-text"
               id="surname" placeholder="Enter your surname" /><br/>
               <label for="gender">Gender: </label><br/>
               <select name="gender" class="input-text" id="gender">
                   <option value="male">Male</option>
                   <option value="female">Female</option>
               </select><br/>
               <label for="phone">Phone:</label><br/>
               <input name="phone" type="tel" class="input-text" id="phone"><br/>
               <label for="email">Email:</label><br/>
               <input name="email" type="email" class="input-text" id="email">
               
               <p>Choose your favorite cooffee:</p>
               <input type="checkbox" name="fac_coffee[]" value="Espresso">Espresso<br>
               <input type="checkbox" name="fac_coffee[]" value="Macchiato">Macchiato<br>
               <input type="checkbox" name="fac_coffee[]" value="Latte">Cafe Latte<br>
               <p>Please select your age:</p>
               <input type="radio" name="age" value="30"> 0 - 30<br>
                <input type="radio" name="age" value="60"> 31 - 60<br>
                <input type="radio" name="age" value="100"> 61 - 100<br>
               <input name="submit" type="submit" value="Submit">
            </form>
           
       </div>
        
        <!-- End of Content Section -->

       <?php include('includes/footer.php'); ?>
    
    
    </body>
</html>