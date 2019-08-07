<?php
session_start();
if (isset($_SESSION['u_id']  )){
?><!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Untitled</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/Pretty-Header.css">
    <link rel="stylesheet" href="assets/css/Pretty-Footer.css">
    <link rel="stylesheet" href="assets/css/Hero-Technology.css">
    <link rel="stylesheet" href="assets/css/Mockup-MacBook-Pro.css">
    <link rel="stylesheet" href="assets/css/Pretty-Registration-Form.css">
    <link rel="stylesheet" href="assets/css/Google-Style-Login.css">
    <link rel="stylesheet" href="assets/css/Google-Style-Login-1.css">
    <link rel="stylesheet" href="assets/css/Pretty-Registration-Form-1.css">
    <link rel="stylesheet" href="assets/css/Material-Card.css">
    <link rel="stylesheet" href="assets/css/Google-Style-Login-2.css">
</head>

<body>
    <div>
        <nav class="navbar navbar-default custom-header">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand navbar-link" href="Home.html">Searchmy<span><strong>City</strong> </span> </a>
                    <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                </div>
                <div class="collapse navbar-collapse" id="navbar-collapse">
                    <ul class="nav navbar-nav navbar-right links">
                        <li role="presentation"><a href="Home.html">Home </a></li>
                        <li role="presentation"><a href="about.html">About </a></li>
                        <li role="presentation"><a href="pyp.html" class="custom-navbar"> Publish Your Place!<span class="badge">new</span></a></li>
                        <li role="presentation"><a href="fap.html">Find A Place</a></li>
                        <li role="presentation"><a href="faqs.html">FAQs </a></li>
                        <li role="presentation"><a href="contact.html">Contact Us</a></li>
                        <li class="dropdown open"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true" href="#">Account </a>
                            <ul class="dropdown-menu" role="menu">
                                <li role="presentation"><a href="profile.html">My Profile </a></li>
                                <li role="presentation"><a href="surelgt.html">Log Out</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right"></ul>
                </div>
            </div>
        </nav>
    </div>
   <form action="assets/upload.php" method="POST" enctype="multipart/form-data">
<input type="file" name="file">
<button type="submit" name="submit_image">Upload</button>
    <div>
        <footer>
            <div class="row">
                <div class="col-md-4 col-sm-6 footer-navigation">
                    <h3><a href="#">Searchmy<span>City </span></a></h3>
                    <p class="links">.<a href="Home.html">Home</a><strong> · </strong><a href="about.html">About </a><strong> · </strong><a href="pyp.html">Publish Your Place!</a><strong> . </strong><a href="fap.html">Find a Place</a><strong> · </strong><a href="faqs.html">FAQs </a><strong> · </strong>
                        <a
                        href="contact.html">Contact Us</a><a href="login.html"> . Log In </a><a href="signup.html">. Sign Up</a></p>
                    <p class="company-name">SearchmyCity© 2018 </p>
                </div>
                <div class="col-md-4 col-sm-6 footer-contacts">
                    <div><span class="fa fa-map-marker footer-contacts-icon"> </span>
                        <p><span class="new-line-span">Thapar University</span> Patiala, Punjab.</p>
                    </div>
                    <div><i class="fa fa-phone footer-contacts-icon"></i>
                        <p class="footer-center-info email text-left"> +91 (869) 707-7367.</p>
                    </div>
                    <div><i class="fa fa-envelope footer-contacts-icon"></i>
                        <p> <a href="#" target="_blank">support@searchmycity.com</a></p>
                    </div>
                </div>
                <div class="clearfix visible-sm-block"></div>
                <div class="col-md-4 footer-about">
                    <h4>About SearchmyCity</h4>
                    <p> SearchmyCity helps you to explore each and every conrner of your city by providing you a list of all the places or locations ofyour city. So, that you find it the earliest.
                    </p>
                    <div class="social-links social-icons"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-linkedin"></i></a><a href="#"><i class="fa fa-github"></i></a></div>
                </div>
            </div>
        </footer>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/selects.js"></script>
</body>

</html><?php
}
else{
    header("Location: login.html?Please sign in again");
}
?>

