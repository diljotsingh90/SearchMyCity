<?php
include 'header.php'
?>
			
	
		<?php
		$id = mysqli_real_escape_string($conn2,$_GET['id']);
			$sql = "SELECT * FROM posts WHERE id = '$id'";
			$result = mysqli_query($conn2,$sql);
			$queryRes = mysqli_num_rows($result);
			if($queryRes > 0){
				while($row = mysqli_fetch_assoc($result)){
					echo"<div class = 'articlepagebox'><div class='image-div'>";
                        if($row['imagepath']=='none.jpg'){
                            echo"<img class='article-img' src='assets/none.jpg' alt='HTML5 Icon' >";
                        }
                        else{
                            echo"<img class='article-img' src= 'assets/".$row['imagepath']."' alt='HTML5 Icon' >";
                        }
                        echo"
                        <br>
						<p><b>Working Hours:</b> ".$row['t_open']." to ".$row['t_close']."</p>
						<hr>
						<p><b>Owner:</b><br>".$row['spname']."</p>
						
						<p>".$row['mobile']."</p>
						<hr>
						<p class='small-s'><b>Last Updated On:</b><br>".$row['u_date']."</p>
						
						</div>
						<div class='article-data1'>
						<h3 class = 'title'>".$row['title']."</h3>
						<p class='small-s' id='s-left'>#".$row['id']." </p>
						
						<hr>
						<p><b>Category:".$row['category']."/".$row['s_category']."</b></p>
						<hr>
						<p>  ".$row['description']."</p>
						<hr>
						<p><b>Address:</b><br>".$row['address']."</p>
						<p>".$row['area'].",".$row['city'].",".$row['state']."</p>
						</div>
						
						
						
					</div>";
				}
			}
		?>
<div>
        <footer>
            <div class="row">
                <div class="col-md-4 col-sm-6 footer-navigation">
                    <h3><a href="#">Searchmy<span>City </span></a></h3>
                    <p class="links"><a href="Home.html">Home</a><strong> · </strong><a href="about.html">About </a><strong> · </strong><a href="pyp.html">Publish Your Place!</a><strong> · </strong><a href="fap.html">Find a Place</a><strong> · </strong><a href="faqs.html">FAQs </a><strong> · </strong>
                        <a
                        href="contact.html">Contact Us</a>
                    </p>
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
</body>

</html>
</html>