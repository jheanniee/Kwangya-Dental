<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'dcms') or die("could not connect to database");
if (isset($_GET['logout'])) {

    session_destroy();
    unset($_SESSION['username']);
    unset($_SESSION['role']);
    //unset($_COOKIE['remember']);
    header("location: login.php");
}

?>

<!DOCTYPE HTML>
<html>

<head>
    <title>Kwangya Dental | Home</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="assets/css/landingpage.css">
    <link rel="stylesheet" href="assets/css/main.css">
    
    <link rel="icon" href="assets/images/icon.png">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>

<body>
    <br><br>
    <?php require_once("header.php"); ?>
    <section class="home" id="home">

        <div class="image">
            <img src="assets/images/home.png" alt="">
        </div>

        <div class=" content">
            <h3>Healthy Smiles Everyday</h3>
            <p>We improve your looks and confidence.</p>
            <a href="login.php" class="btn"> BOOK NOW <span class="fas fa-chevron-right"></span> </a><br>
        </div>

    </section>

    <section class="about" id="about">

        <h1 class="heading"> <span>About</span></h1>

        <div class="row">

            <div class="image">
                <img src="assets/images/about.png" alt="">
            </div>

            <div class="content">
                <h3>We Keep Your Smile Clean</h3>
                <p>Yes! Kwanga Dental provides a comprehensive range of specialized dental care services, state-of-the-art facility with more treatment plans that suits your Smile, Face and Skin. Our priority is to provide the highest standards of evidence-based dental care and In addition to that Beyond a Beautiful Smile.
                </p>
                <p>You can trust the dentists at the Kwangya Dental to ensure your comfort and provide you with excellent services. You have nothing to worry about. Our team of dentists have undergone intensive trainings and experience to provide the best dental treatment. </p>
            </div>

        </div>

    </section>

    <section class="services" id="clinics">

        <h1 class="heading"> <span>Clinics</span> </h1>

        <div class="box-container">

            <div class="box">
                <i class="fa-solid fa-house-chimney-medical"></i>
                <h3>Urban Smiles Manila</h3>
                <p>Manila City, Philippines</p>
                <!-- <a href="#" class="btn"> learn more <span class="fas fa-chevron-right"></span> </a> -->
            </div>

            <div class="box">
                <i class="fa-solid fa-house-chimney-medical"></i>
                <h3>ALC Cllinic Quezon</h3>
                <p>Quezon City, Philippines</p>
            </div>

            <div class="box">
                <i class="fa-solid fa-house-chimney-medical"></i>
                <h3>Dental World Manila</h3>
                <p>Pasay City, Philippines</p>
            </div>

            <div class="box">
                <i class="fa-solid fa-house-chimney-medical"></i>
                <h3>Cavite Dental Clinic</h3>
                <p>Cavite City, Philippines</p>
            </div>

        </div>

    </section>

    <section class="services" id="dentist">

        <h1 class="heading"> <span>Dentists</span> </h1>

        <div class="box-container">

            <div class="box">
                <i class="fa-solid fa-user-doctor"></i>
                <h3>Dr. R. Garcia</h3>
                <p>Orthodontics and Dentofacial Orthopedics</p>
            </div>

            <div class="box">
                <i class="fa-solid fa-user-doctor"></i>
                <h3>Dr. D. Olivares</h3>
                <p>Oral and Maxillofacial Radiology</p>
            </div>

            <div class="box">
                <i class="fa-solid fa-user-doctor"></i>
                <h3>Dr. J Santos</h3>
                <p>Endodontics</p>
            </div>

            <div class="box">
                <i class="fa-solid fa-user-doctor"></i>
                <h3>Dr. C. Dela Cruz</h3>
                <p>Oral and Maxillofacial Surgery</p>
            </div>

        </div>

    </section>

    <section class="footer">

        <div class="box-container">

            <div class="box">
                <a href="#"> <i class="fas fa-chevron-right"></i> Antoinette Funtanilla </a>
                <a href="#"> <i class="fas fa-chevron-right"></i> Cristopher Avanzado </a>
                <a href="#"> <i class="fas fa-chevron-right"></i> Jheanne Rona Aguilar </a>
            </div>

            <div class="box">
                <a href="#"> <i class="fas fa-chevron-right"></i> Kenlord Pamatian </a>
                <a href="#"> <i class="fas fa-chevron-right"></i> Rosario Imelda Cuevas </a>
            </div>

            <div class="box">
                <a href="#"> <i class="fas fa-phone"></i> +639202128787 </a>
                <a href="#"> <i class="fas fa-envelope"></i> kwangyadental@gmail.com </a>
            </div>

        </div>

        <!-- <div class="credit"> all rights reserved </div> -->

    </section>

    <script src="assets/js/script.js"></script>

</body>

</html>