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
               <form action="contact.html" id="form" name="form-registration">
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
               <input name="submit" type="submit" value="Submit">
            </form>
           </div>
       </div>
        
        <!-- End of Content Section -->

       <?php include('includes/footer.php'); ?>
</body>
</html>