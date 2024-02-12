<?php
include("handler/config.php");
if(isset($_COOKIE["userId"])){
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/owl.carousel.min.css">
    <link rel="stylesheet" href="./css/owl.theme.default.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="font-awesome-6/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Heebo:wght@100;200;300;400;500;600;700;800;900&family=Lobster+Two:ital,wght@0,400;0,700;1,400&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <title>Madrasah</title>    <link rel="icon" type="image/png" href="./img/logo-mad.jpg" />
    <link rel="stylesheet" type="text/css" href="css/sweetalert.css">
    <script src="js/sweetalert.min.js"></script>
    <script type="text/javascript" src="js/validation.min.js"></script>
    <title>Madrasah</title></head>
<body>
    
<div class="navbar">
    <div class="navbar-center">
        <div class="logo">
            <a href="index.php">
                <img width="60px" src="img/logo-mad.png" alt=""> <span> Digital Madrasah</span>
            </a>
        </div>
        <!-- <div class="navbar-links">
            <a href="index.php" class="active-links">Home</a>
            <a href="#">About Us</a>
            <a href="#">Features</a>
            <a href="#">Contact Us</a>
         </div> -->
         <div class="donate-btn">
            <a href="signIn.php" class="sign-btn">Sign In</a>
            <a href="signUp.php" class="sign-up">Sign Up</a>
         </div>
         <!-- <div class="toggle">
            <i class="fa fa-bars"></i>
         </div> -->
    </div>
</div>
<!-- <div class="navbar-overlay">
    <div class="navbar-details">   
        <span class="close-nav">
            <i class="fas fa-window-close"></i>
        </span>
        <div class="overlay-links">
            <a href="index.php" class="active-links">Home</a>
            <a href="#">About Us</a>
            <a href="#">Features</a>
            <a href="#">Contact Us</a>
        </div>
    </div>
</div> -->

<section class="contact">
    <div class="contact-details">
      
        <div class="form"> 
            <div class="title" style="margin-bottom: 1rem;">
                <h1>Create new account</h1>
            </div>
             <p style="margin-bottom: 2rem;">Already A Member? <span style="color: #2E7D32; cursor:pointer"><a href="signIn.php">Sign in</a></span></p>
            <form id="signupForm" action="">
                <label for="">First Name</label>
                <input type="text" name="firstname" id="firstname" placeholder="Enter your first name">
                <label for="">Last Name</label>
                <input type="text" name="lastname" id="lastname" placeholder="Enter your last name">
                <label for="">Email</label>
                <input type="email" name="email" id="email" placeholder="Enter your Email">
                <label for="">Password</label>
                <input type="password" name="password" id="password" placeholder="Enter your password">
                 <button><a>Sign Up</a></button>
            </form>
        </div>
        <div class="location">
            <img  src="./img/masjid-3.png" alt="">
         </div>
    </div>
</section>

<script src="./js/jquery.min.js"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script src="./js/owl.carousel.min.js"></script>
<script src="js/carousel.js"></script>
    <script src="./js/app.js"></script>
    <script>
        $(document).ready(function() {
            $('#signupForm').submit(function(e) {
                e.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    type: 'POST',
                    url: 'handler/signupHandler.php',
                    data: formData,
                    dataType: 'json',
                    success: function(response) {
                        console.log(response);
                        if(response.status == 201) {
                            window.location.href = 'signInSuccess.php';
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>
  </body>
</body>
</html>