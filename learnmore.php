<?php  require_once 'backtohome.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Eclipse Fitness Gym</title>
    <link rel="stylesheet" href="style/learnmore.css">
    <script src="https://kit.fontawesome.com/e525f445a9.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&family=Rajdhani:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/e525f445a9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0">
    <link href="https://fonts.googleapis.com/css2?family=Bokor&family=Cairo:wght@200..1000&family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=League+Spartan:wght@100..900&family=Rajdhani:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <h1>Eclipse Fitness Gym</h1>
        <a href="<?php echo $is_logged_in ? 'useraccess.php' : 'index.html';?>">HOME</a>
    </header>
   
    <div class="container">
        <div class="section ">
            <h3>Our Mission</h3>
            <p>To empower individuals to achieve their fitness goals by providing an accessible, engaging, and supportive online platform that enhances their fitness journey. The website will promote a healthy lifestyle, foster a sense of community, and simplify the process of staying active and informed.</p>
        </div>
        <div class="section">
            <h3>Our Vision</h3>
            <p>To become a leading digital fitness platform that bridges the gap between physical and virtual fitness services, inspiring a healthier and happier community. The website will reflect the gym's commitment to innovation, inclusivity, and excellence in fitness and wellness.</p>
        </div>
        <div class="images">
            <img src="img/about1.jpg" alt="Gym Image 1" class="img1">
            <img src="img/about2.jpg" alt="Gym Image 2" class="img2">
        </div>
        <img src="img/Picsart_24-12-14_10-27-51-524.png" alt="" class="logo">
    </div>
</body>
</html>