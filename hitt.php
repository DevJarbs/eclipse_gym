<?php require_once 'backtohome.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HIIT Training</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/e525f445a9.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&family=Rajdhani:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/e525f445a9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0">
    <link href="https://fonts.googleapis.com/css2?family=Bokor&family=Cairo:wght@200..1000&family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=League+Spartan:wght@100..900&family=Rajdhani:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        .hero-section {
            background-image: url(img/train.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            min-height: 100vh;
            position: relative;
            overflow: hidden;
        }
        .logo{
            width: 90px;
        }

        .hero-content {
            color: white;
            padding: 3rem;
            position: relative;
            left: 100%;
            top: 250px;
        }

        .hero-content h1 {
            font-family: "League Spartan",sans-serif;
            font-weight: 800;
            font-size: 6rem;
            text-align: center;
            color: black;
        }

        .hero-content button {
            font-family: "Cairo",sans-serif;
            border: none;
            padding: 0.75rem 2rem;
            transition: all 0.3s ease;
            position: relative;
            left: 35%;
            background-image: linear-gradient(to right, #E95576, #9952EB);
        }

        .btn-exercises:hover {
            background-color: #ff3377;
            transform: translateY(-2px);
        }

        .content-section {
            padding: 4rem 0;
        }

        .exercise-card {
            margin-bottom: 1.5rem;
        }
        .modal-content{
            background-color: #5d80f2e5;
        }
        .modal-title{
            font-family: "League Spartan",sans-serif;
            font-weight: bold;
            font-size: 2rem;
            text-align: center;
            position: relative;
            left: 32%;
        }
        hr{
            color: white;
        }
        .img-fluid{
            width: 400px;
        }
        .push{
            font-family: "League Spartan",sans-serif;
            font-size: 1.5rem;
            font-weight: bold;
            position: absolute;
            top: 6%;
            left: 70%;
        }
       .section-title{
        font-family: "League Spartan";
        font-weight: bold;
       }
        .climb{
            font-family: "League Spartan",sans-serif;
            font-size: 1.5rem;
            font-weight: bold;
            position: absolute;
            top: 40%;
            left: 62%;
        }
        .crunch{
            font-family: "League Spartan",sans-serif;
            font-size: 1.5rem;
            font-weight: bold;
            position: absolute;
            top: 72%;
            left: 62%;
        }
        .intensity{
            font-family: "League Spartan",sans-serif;
            font-size: 1.5rem;
            position: absolute;
            top: 12%;
            left: 60%;

        }
        .duration{
            font-family: "League Spartan",sans-serif;
            font-size: 1.5rem;
            position: absolute;
            top: 15%;
            left: 60%;
        }
        .intensity1{
            font-family: "League Spartan",sans-serif;
            font-size: 1.5rem;
            position: absolute;
            top: 47%;
            left: 60%;

        }
        .duration1{
            font-family: "League Spartan",sans-serif;
            font-size: 1.5rem;
            position: absolute;
            top:50%;
            left: 60%;
        }
        .intensity2{
            font-family: "League Spartan",sans-serif;
            font-size: 1.5rem;
            position: absolute;
            top: 77%;
            left: 60%;

        }
        .duration2{
            font-family: "League Spartan",sans-serif;
            font-size: 1.5rem;
            position: absolute;
            top: 80%;
            left: 60%;
        }
        .exercise-card .stmt{
            font-family: "League Spartan",sans-serif;
            font-weight: 400;
            text-align: center;
            font-size: 1.5rem;
            position: relative;
            left: 2%;
        }
        @media (max-width: 678px){
            .hero-section{
                background-image: url(img/train1.jpg);
                opacity: 0.8;
            }
            .hero-content{
                position: relative;
            left: 5%;
            top: 190px;
            }
            .hero-content h1 {
                font-size: 3rem;
            }

            .hero-content button {
                font-size: 0.9rem;
                padding: 0.5rem 1.5rem;
            }

            .modal-title {
                font-size: 1rem;
            }
            .modal-title {
                font-size: 1rem;
                text-align: center;
            }
            .exercise-card .stmt{
                font-size: 1rem;
                position: relative;
                top: 20px;
            }
            .intensity ,.intensity1,.intensity2{
                font-size: 1rem;
                position: relative;
                top: 20%;
                left: 30%;
            }
            .duration,.duration1,.duration2{
                font-size: 1rem;
                position: relative;
                top: 30%;
                left: 30%;
            }
            .push{
                font-size: 1.5rem;
                position: relative;
                top: 23%;
                left: 32%;
            }
            .crunch{
                font-size: 1.5rem;
                position: relative;
                top: 23%;
                left: 32%;
            }
            .climb{
                font-size: 1.5rem;
                position: relative;
                top: 23%;
                left: 37%;
            }
        }
    </style>
</head>
<body>
    <section class="hero-section">
        <img src="img/Picsart_24-12-14_10-27-51-524.png" alt="" class="logo">
        <a href="<?php echo $is_logged_in ? 'useraccess.php' : 'index.html';?>" class="text-light position-absolute top-0 end-0 p-3">
        <i class="fa-solid fa-arrow-left" style="color: rgb(255, 250, 250);"> BACK</i>
    </a>
        <div class="container">
            <div class="row align-items-center min-vh-80">
                <div class="col-lg-6 order-lg-1">
                    <div class="hero-content">
                        <h1 class="display-4 fw-bold mb-4 text-white">HIIT TRAINING</h1>

                        <button class="btn btn-exercises text-white" data-bs-toggle="modal" data-bs-target="#exercisesModal">Exercises</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Exercises Modal -->
    <div class="modal fade" id="exercisesModal" tabindex="-1" aria-labelledby="exercisesModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exercisesModalLabel">HIIT EXERCISES</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Exercise Cards -->
                    <div class="exercise-card">
                        <img src="img/pushup.jpg" alt="Push-ups demonstration" class="img-fluid">
                        <h3 class="push">Push-ups</h3>  
                        <p class="intensity"><strong>Intensity  :  </strong>  High</p>
                        <p class="duration"><strong>Duration  :  </strong>  60 seconds</p>
                        <br>
                        <p class="stmt">
                            A compound exercise that targets the chest, shoulders, and <br> triceps, while also engaging the core, back, and lower body.
                        </p>

                    </div>
                    <hr>
                    <div class="exercise-card">
                        <img src="img/mclimbers.jpg" alt="Mountain climbers demonstration" class="img-fluid">
                        <h3 class="climb">Mountain Climbers</h3>
                        <p class="intensity1"><strong>Intensity : </strong>High</p>
                        <p class="duration1"><strong>Duration : </strong>60 seconds</p>
                        <br>
                        <p class="stmt">
                            Engage many major muscle groups, and can improve cardiovascular and muscular fitness, flexibility, and strength.
                        </p>
                    </div>
                    <hr>
                    <div class="exercise-card">
                        <img src="img/crunches.jpg" alt="Bicycle crunches demonstration" class="img-fluid">
                        <h3 class="crunch">Bicycle Crunches</h3>
                        <p class="intensity2"><strong>Intensity : </strong>High</p>
                        <p class="duration2"><strong>Duration : </strong>60 seconds</p>
                        <br>
                        <p class="stmt">
                            Develops muscular endurance and strength in the abdominal muscles.
                        </p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <section class="content-section" >
        <div class="container">
            <h1 class="section-title text-center">About</h1>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <p class="text-center ">
                        HIIT (High-Intensity Interval Training) is a form of exercise that alternates between short bursts of intense activity and periods of lower-intensity recovery or rest. It's designed to maximize efficiency by providing a highly effective workout in a shorter time compared to traditional steady-state cardio.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="content-section bg-light" >
        <div class="container">
            <h1 class="section-title text-center">Benefits of HIIT:</h1>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <ul class="benefits-list">
                        <li>Improves Cardiovascular Health</li>
                        <li>Boosts heart health and endurance in a shorter time</li>
                        <li>Burns More Calories</li>
                        <li>Higher calorie burn during and after the workout due to the "afterburn effect" (EPOC - Excess Post-Exercise Oxygen Consumption)</li>
                        <li>Builds Strength and Endurance</li>
                        <li>Combines strength and cardio elements</li>
                        <li>Convenient</li>
                        <li>Can be done without equipment and in small spaces</li>
                        <li>Enhances Metabolism</li>
                        <li>May boost metabolism for hours post-workout</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="content-section" >
        <div class="container">
            <h1 class="section-title text-center">Why Should You Try HIIT?</h1>
            <p class="text-center">
                Unlock your potential and achieve your fitness goals! Join now and experience the transformative power of HIIT training. Take the first step toward a healthier, stronger you—start today!
            </p>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>