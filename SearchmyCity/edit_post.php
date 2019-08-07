<?php
session_start();
include_once 'assets/conn2.php';
if (isset($_SESSION['u_id'])){
    $id = mysqli_real_escape_string($conn2,$_GET['id']);
    $_SESSION['post_id'] = $id;
    $sql = "SELECT * FROM posts WHERE id = '$id'";
        $result = mysqli_query($conn2,$sql);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck < 1){
    header( "refresh:0; url=/wall.php?try again" );
            //exit()
        }
        else{
            if($row = mysqli_fetch_assoc($result)){
                   
?><?php
include 'assets/conn2.php'
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
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
<link rel="stylesheet" type="text/css" href="assets/css/stylej.css">
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
                        <li role="presentation"><a href="faqs.html">FAQs </a></li>
                        <li role="presentation"><a href="contact.html">Contact Us</a></li>
                        <li class="dropdown open"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true" href="#">Post Your Place!<span class="badge">new</span><span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li role="presentation"><a href="pyp.html">New Post</a></li>
                                <li role="presentation"><a href="wall.php">My Posts</a></li>
                            </ul>
                        </li>
                        <li role="presentation"><a href="fap.html">Find A Place</a></li>
                        
                        <li class="dropdown open"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true" href="#">Account<span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li role="presentation"><a href="surelgt.html">Log Out</a></li>
                                <li role="presentation"><a href="profile.php">Profile </a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right"></ul>
                </div>
            </div>
        </nav>
    </div>
     
    <div id="dform">
        <div id="fdiv">
            <h1 class="whiteheadings">Edit Post</h1>
            <form action="assets/editpost.php" method="post" class="bootstrap-form-with-validation">
                <div class="form-group">
                    <input class="form-control formfield" type="text" name="title" placeholder="Title" id="text-input" value="<?php echo $row['title']; ?>">
                </div>
                <div class="form-group">
                      <select class="form-control selectfield" id="cat" name="category" onchange="catscat(this.id,'subcat')"> 
                      <option value="<?php echo $row['category']; ?>" selected="selected"><?php echo $row['category']; ?></option>
                        
                        <option value="Religious">Religious</option>
                        <option value="Business">Business</option>
                        <option value="Educational">Educational</option>
                        <option value="Industry">Industry</option>
                        <option value="Medical">Medical</option>
                        <option value="Public">Public Sector</option>
                        <option value="Travel">Travel</option>
                    </select>
                </div>
                <div class="form-group">
                    <select class="form-control selectfield" id="subcat" name="sub_category">
                        <option value="<?php echo $row['category']; ?>" selected="selected"><?php echo $row['s_category']; ?></option>
                    </select>
                </div>
                <div class="form-group">
                    <input class="form-control formfield" type="text" name="sp_name" placeholder="Name of owner/manager" id="text-input" value="<?php echo $row['spname']; ?>">
                </div>
                <div class="form-group">
                    <input class="form-control formfield" type="text" name="mobile" placeholder="Mobile" id="text-input" value="<?php echo $row['mobile']; ?>">
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input class="form-control formfield" type="time" name="t_open" placeholder="Opening hours" id="text-input"
                            value="<?php echo $row['t_open']; ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input class="form-control formfield" type="time" name="t_close" placeholder="Closing hours" id="text-input" value="<?php echo $row['t_close']; ?>">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <textarea class="form-control input-lg formta" rows="7" cols="50" name="description" placeholder="Short Description about your place..." id="textarea-input"><?php echo $row['description']; ?></textarea>
                </div>
                <div class="form-group">
                    <textarea class="form-control input-lg formta" rows="3" cols="50" name="address" placeholder="Address" id="textarea-input" ><?php echo $row['address']; ?></textarea>
                </div>
                <div class="form-group">
                    <input class="form-control formfield" type="text" name="area" placeholder="Area of Locality" id="text-input" value="<?php echo $row['area']; ?>">
                </div>
                <div class="form-group">
                     <select class="form-control selectfield" id="state" name="state" onchange="statecity(this.id,'City')">
                       <option value="<?php echo $row['category']; ?>" selected="selected"><?php echo $row['state']; ?></option>
                        <option value="UT">Union Territories(UTs)</option>
                        <option value="Arunachal">Arunachal Pradesh</option>
                        <option value="Assam">Assam</option>
                        <option value="Bihar">Bihar</option>
                        <option value="Chhattisgarh">Chhattisgarh</option>
                    </select>
                </div>
                <div class="form-group">
                    <select class="form-control selectfield" id="City" name="city">
                        <option value="<?php echo $row['category']; ?>" selected="selected"><?php echo $row['city']; ?></option>
                    </select>
                </div>
                <button class="btn btn-primary" type="submit" id="next" name="submit">Next </button>
            </form>
        </div>
    </div>
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
}
}
else{
    header("Location: wall.php?error");
}
?>

