<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Carter+One&family=Cinzel:wght@500;700&family=EB+Garamond:wght@500&family=El+Messiri:wght@700&family=IBM+Plex+Serif&family=League+Spartan:wght@100..900&family=Montserrat+Alternates:wght@600&family=Patua+One&family=Rajdhani:wght@500&family=Righteous&family=Sigmar&family=Titan+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&family=Carter+One&family=Cinzel:wght@500;700&family=EB+Garamond:wght@500&family=El+Messiri:wght@700&family=IBM+Plex+Serif&family=League+Spartan:wght@100..900&family=Montserrat+Alternates:wght@600&family=Patua+One&family=Rajdhani:wght@500&family=Righteous&family=Sigmar&family=Titan+One&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<section class="home-section" id="home">
<div class="overlay"></div>
<nav class="navbar navbar-expand-lg ">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="img/Picsart_24-12-14_10-27-51-524.png" alt="logo" style="width: 75px;" class="rounded-pill">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center me-5">
                    <li class="nav-item">
                        <a class="nav-link" href="#">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">ABOUT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#training">TRAININGS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">CONTACT</a>
                    </li>
                    <div class="dropdown dropstart">
                     <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown">SETTINGS</button>
                      <ul class="dropdown-menu">
                         <li class="nav-item">
                            <a class="dropdown-item" href="user_profile.php">
                            <i class="fa-solid fa-user"></i> Manage Profile</a></li>
                         <li class="nav-item">
                            <a class="dropdown-item" href="bookings.php"><i class="fa-solid fa-clipboard-list">
                            </i> View Bookings</a></li>
                        <li class="nav-item">
                            <a class="dropdown-item" href="user_changepass.php">
                            <i class="fa-solid fa-user-lock"></i> Change Password</a>
                        </li>
                      </ul>
                    </div>
                    <li class="nav-item">
                        <a href="logout.php" onclick="logout()" class="btn btn-login">LOG OUT</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="sideTextCont">
        <div class="container">
            <div class="sideText">
                <h1>Where Fitness<br>Becomes Your <br>Lifestyle.</h1>
                <div class="button-group">
                    <a href="hirecoach.html" class="btn btn-hire text-white">HIRE A COACH <i class="icon1 fa-solid fa-arrow-up-right-from-square"></i></a>
                    <a href="macro_and_cal.html" class="btn btn-track bg-white">TRACK MARCOS & CALORIES<i class="fa-solid fa-arrow-up-right-from-square"></i></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="about-section container-fluid" id="about">
        <div class="row">
            <div class="col-md-6 custom-container-left">
                <h1>About Eclipse Fitness Gym.</h1>
                <h2>Get to know us</h2>
                <div class="link-group">
                <a href="learnmore.php">Learn More <i class="fas fa-info-circle"></i></a>
                <a href="aboutvid.html">Watch Video <i class="fa-solid fa-circle-play" style="color: black;"></i></a>
                </div>
            </div>
            <div class="col-md-6 custom-container-right">
                <h1>Join Eclipse and Transform <br>
                    Your Body and Mind</h1> <br>
                <h2>Community</h2>
                <p>At Eclipse Fitness, we believe fitness is more than just a workout—it's a journey best shared with a supportive community. 
                    Our members come together to inspire, challenge, 
                    and celebrate each other's progress every step of the way.  
                    Join us to experience the power of teamwork, encouragement, and shared success on your path to achieving your fitness goals. 
                    Together, we're stronger.</p> <br>
                <h2 class="motivation">Motivation</h2>
                <p>At Eclipse Fitness, we know that staying motivated is key to reaching your fitness goals. 
                    That's why we're here to keep you inspired every step of the way. 
                    From energizing classes and expert trainers to progress tracking and success stories, we provide the tools and encouragement you need to push past limits and achieve your best self.
                    Let us help you turn your drive into results—you've got this!</p>
            </div>
        </div>
<section class="training-section" id="training">
        <h2>DON'T KNOW HOW TO START?<br>
        TRY OUT OUR TRAININGS.</h2>
        <p>Step by step challenges to keep you strong and motivated.</p>
<div class="container">
    <div class="row justify-content-center">
       <div class="col-md-3 training p-5">
           <h4>HITT</h4>
            <a href="hitt.php">View Details</a>
        </div>
        <div class="col-sm-1"></div>
        <div class="col-md-3 training p-5">
            <h4>STRENGTH</h4>
            <a href="strength.php">View Details</a>
        </div>
        <div class="col-sm-1"></div>
        <div class="col-md-3 training p-5">
           <h4>ENDURANCE</h4>
           <a href="endurance.php">View Details</a>
        </div>
    </div>
</div>
</section>
<section class="contact-section" id="contact">
        <h2 class="p-4">Get in touch</h2>
<div class="container">
    <div class="row justify-content-center">
       <div class="col-md-3 contact">
           <i class="fa-solid fa-location-dot"></i>
           <p>Gym Address</p>
           <p>Datag, Buagsong Cordova</p>
        </div>
        <div class="col-md-3 contact">
        <i class="fa-solid fa-phone"></i>
           <p>Phone number</p>
           <p>0932-415-0079</p>
        </div>
        <div class="col-md-3 contact">
        <i class="fa-solid fa-envelope"></i>
           <p>Email</p>
           <p><a href="+" style="text-decoration: none;">eclipsefitnessofficial@gmail.com</a></p>
        </div>
        <div class="col-md-3 contact">
        <i class="fa-brands fa-facebook"></i>   
           <p>Facebook</p>
           <p><a href="" style="text-decoration: none;">@eclipsefitness</a></p>
        </div>
    </div> <br> <br> <br> <br>
    <div class="contact-info">
        <img src="img/Picsart_24-12-14_10-27-51-524.png" alt="gym-logo" class="rounded-pill">
        <br><p><b style="font-weight: bold;">©</b> 2024 - Eclipse Fitness . All Rights Reserved</p>
        <p><b style="font-weight: bold;">Website Design & Development:</b> Eclipse IT Department</p>
        <p><b style="font-weight: bold;">Management Team:</b> Eclipse Fitness Operations Team</p> 
        <br> <br> <br>
    </div>
</div>
</section>
</section>
<script src="JS/notif.js"></script>
<script src="https://kit.fontawesome.com/e083c3d576.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>