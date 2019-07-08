

<?php 
    include('includes/connect.php');
    
    $query = $pdo->query("SELECT * FROM about");
    $about = $query->fetchAll();

?>


 <!DOCTYPE html>
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

       
        <div class="aboutUS">

            <?php foreach($about as $aboutarticle): ?>
            <h2><?= $aboutarticle['title'] ?></h2>
            <p><?= $aboutarticle['content'] ?></p>
            <?php endforeach; ?>

            
            <!-- <h2>WHO WE ARE?</h2>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed rhoncus placerat dolor. Sed enim sapien, aliquam quis metus quis, laoreet placerat nibh. Cras vitae orci eu sem lobortis convallis at in mauris. Nunc maximus, sem egestas maximus mollis, lorem lorem congue libero, vel iaculis est velit at dui. Vestibulum sed dolor convallis, feugiat magna in, facilisis neque. Mauris hendrerit finibus velit luctus lobortis. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Mauris mattis, libero ac molestie porttitor, odio mauris vulputate dui, eget ullamcorper turpis ligula id sem. Suspendisse malesuada placerat lacus vel gravida. In lacinia, urna id molestie ullamcorper, nibh nunc sodales lectus, quis rhoncus turpis sapien nec dolor. Pellentesque a tincidunt ante. Cras id lacinia sapien, nec vulputate arcu. Integer a pharetra tellus. Donec gravida nisl sed lacus pretium, at tempus augue cursus.
            </p>
            <h2>OUR GOALS</h2>
            <p>
                Nulla et posuere augue, scelerisque pellentesque sapien. Phasellus at viverra velit. In nulla dolor, commodo vitae dolor et, placerat pulvinar mauris. Nunc vel lorem eu elit vehicula finibus. Praesent ullamcorper nibh nec nisl pulvinar, at pellentesque mi iaculis. Nullam sodales ligula id tellus ullamcorper pulvinar. Aliquam sodales metus ut urna tempor pellentesque. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
            </p>
            <h2>WHAT WE DO?</h2>
            <p>
                Curabitur convallis massa a dui dignissim, a fringilla ligula dignissim. Praesent id metus quis mi accumsan accumsan. Aenean vel vehicula enim. Duis vitae nunc eu nibh pharetra congue. Vestibulum tristique nisi urna, sed ultricies risus rhoncus et. In posuere turpis eu metus hendrerit volutpat. Vestibulum massa massa, semper ac fermentum id, dapibus at metus. Suspendisse finibus, metus finibus pulvinar placerat, dolor ex ullamcorper lorem, sit amet vulputate nisi nisi sed erat. Nulla et posuere augue, scelerisque pellentesque sapien. Phasellus at viverra velit. In nulla dolor, commodo vitae dolor et, placerat pulvinar mauris. Nunc vel lorem eu elit vehicula finibus. Praesent ullamcorper nibh nec nisl pulvinar, at pellentesque mi iaculis. Nullam sodales ligula id tellus ullamcorper pulvinar. Aliquam sodales metus ut urna tempor pellentesque. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
            </p> -->
        </div>

        <!-- End of Content Section -->

	<?php include('includes/footer.php'); ?>
        
</body>
</html>