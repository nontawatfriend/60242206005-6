<!DOCTYPE html>
<link rel="shortcut icon" href="img/friend.png" />
<link href="css/style.css" rel="stylesheet">
<link href="css/main.css" rel="stylesheet">
<html lang="en">
<?php
include("config.php");
	session_start();
?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no">
  <meta name="description" content="">
  <meta name="author" content="">
<meta content="เฟรน,เฟรนด์,นนทวัฒน์ ปัญญาเครือ,nontawat panyakruea" name="keywords">
<meta content="เว็บไซต์ส่วนตัว ยินดีต้อนรับเข้าสู่เว็บไซต์นนทวัฒน์" name="description">

  <title>nontawat panyakruea</title>

  <!-- CSS -->
 <!-- <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">-->
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="css/nivo-lightbox.css" rel="stylesheet" />
  <link href="css/nivo-lightbox-theme/default/default.css" rel="stylesheet" type="text/css" />
  <link href="css/owl.carousel.css" rel="stylesheet" media="screen" />
  <link href="css/owl.theme.css" rel="stylesheet" media="screen" />
  <link href="css/animate.css" rel="stylesheet" />
  <link href="color/default.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">
  <link href="addproduct.css" rel="stylesheet">
  <link href="css/dropdown.css" rel="stylesheet">


</head>
	<style>

body {font-family: Arial, Helvetica, sans-serif;}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */


/* Extra styles for the cancel button */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer2 {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container2 {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)}
  to {-webkit-transform: scale(1)}
}

@keyframes animatezoom {
  from {transform: scale(0)}
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}

	</style>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<body style="font-family: 'Kanit', sans-serif;"id="page-top" data-spy="scroll" data-target=".navbar-custom">

  <!-- Preloader -->
<!--<div id="preloader">
    <div id="load"></div>
</div>-->
  <!-- Section: intro -->
<marquee><span class="ตัวใหญ่"><h3 style="font-family: 'Kanit', sans-serif;"><font color="#2434ed">ยินดีต้อนรับเข้าสู่เว็ปไซต์ นนทวัฒน์ ปัญญาเครือ <font></h3></span></marquee>
	
<section id="intro" class="intro">
	<header id="header">
		<h4 style="background-color:#4CAF50"><a class="btn btn-success btn-lg" href="index.php">Home</a></h4>
<nav>
<div class="slogan" style="color: black">
	<div id="id01" class="modal">
  	<form class="modal-content animate" method="post" action="?page=chkmember">
    	<div class="imgcontainer2">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
    	</div>
				<div class="container2">
      		<label for="uname"><b>Username</b></label>
      		<input type="text" placeholder="Enter Username" name="member_username" required>
					<label for="psw"><b>Password</b></label>
      		<input type="password" placeholder="Enter Password" name="member_password"  required>
					<button type="submit" class="btn btn-success">Login</button>
    		</div>
	  		<div class="text-center w-full">
						<a class="txt1" href="?page=member">
							Create new account
							<i class="fa fa-long-arrow-right"></i>
						</a>
				</div>
    <div class="container2" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="btn btn-danger">Cancel</button>
    </div>
  	</form>
	</div>
</div>

<div class="btn btn-primary">
	<?php
	if(@$_SESSION["sess_username"]){
		echo "ยินดีต้อนรับ คุณ ".$_SESSION["sess_username"]." ";
		$sql="select * from tb_member where member_username='$_SESSION[sess_username]'";
		$result=$db->query($sql);
		$row=$result->fetch_array(MYSQLI_BOTH);
		echo "<img src='photo_upload/$row[member_photo]' width='auto' height='30' />";
	}
	else{
		echo "คุณยังไม่ได้เข้าสู่ระบบ";
	}?>
		<?php
		if(@!$_SESSION["sess_username"]){
?>
	<a onclick="document.getElementById('id01').style.display='block'" class="btn btn-success">Login</a>
<?php
 }
else{
?>
	<a href="?page=logout" onclick="return confirm('คุณต้องการออกจากระบบ ใช่ หรือ ไม่');" class="btn btn-danger">Logout</a>
<?php
 }
?>
</div>
</nav>
	</header>
<div class="slogan">
  <a href="index.php"><h2 style="font-family: 'Kanit', sans-serif;">
	  <font color="#DD2FA6">NONTAWAT PANYAKRUEA</font></h2></a>
    <div class="page-scroll">
      <a href="#about">
	  	<i class="fa fa-angle-down fa-5x animated"></i></a>
    </div>
		</div>
  </section>
  <!-- /Section: intro -->

  <!-- Navigation -->
  <div id="navigation">
    <nav class="navbar navbar-custom" role="navigation">
			<div class="container">
        <div class="row">
          <div class="col-md-12">

            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
               <i class="fa fa-bars"></i></button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            	<div class="collapse navbar-collapse" id="menu">
              <ul class="nav navbar-nav">
				 				<div class="dropdown">
				  				<li><a class="dropbtn">เกี่ยวกับฉัน <i class="fa fa-caret-down"></i></a></li>
					 					<div class="dropdown-content">
					   				<a href="?page=aboutme">ประวัติส่วนตัว</a>
    								<a href="?page=education">การศึกษา</a>
    								<a href="?page=myskills">ทักษะของฉัน</a>
										<a href="?page=mygallery">อัลบั้มของฉัน</a>
	  								<a href="?page=whatilike">สิ่งที่ฉันชอบ</a>
  									</div>
								</div>
				  <!--<li><a href="?page=education">การศึกษา</a></li>
				  <li><a href="?page=myskills">ทักษะของฉัน</a></li>
                <li><a href="?page=mygallery">อัลบั้มของฉัน</a></li>
				  <li><a href="?page=whatilike">สิ่งที่ฉันชอบ</a></li>-->
               		<li><a href="?page=gbook">สมุดเยี่ยม</a></li>
				  				<li><a href="?page=member">สมัครสมาชิก</a></li>
				  				<li><a href="?page=photocate">อัลบั้มรูปภาพ</a></li>
				   				<li><a href="?page=contacts">ติดต่อ</a></li>
				  				<li><a href="?page=game">เกม</a></li>
				  				<li><a href="?page=product">คลังสินค้า</a></li>
				  <?php
 if(@$_SESSION["sess_username"]){
?>
								<li><a href="?page=addproduct">เพิ่มสินค้า</a></li>
				  				<li><a href="?page=meproduct">สินค้าของคุณ</a></li>
				  <?php }?>
				  				<li><a href="?page=book">Book</a></li>
              </ul>
            	</div><!-- /.Navbar-collapse -->
          </div>
        </div>
			</div>



      <!--</div>-->
      <!-- /.container -->

			<?php
			if(@$_GET['fd'])
			$file=$_GET['fd']."/".$_GET['page'].".php";
			else
			$file=@$_GET['page'].".php";
			if(is_file($file)){
			require_once("$file");
			}
			else{
			require_once("aboutme.php");
			}
			?>
<center><IFRAME name='flash' src='https://www.userpanel.net/radio/player.php?bgcolor=&fontcolor=&player=1&dj=yes&listener=yes&bitrate=yes&song=yes&ipaddress=5&port=7040&encoding=utf8' width="420" height="200" frameborder="0" scrolling="no" ></IFRAME></center>

<footer>
      <div class="row col-xs-pull-2">
        <div class="col-md-12 col-lg-12">
          <p>&copy; <!--<a href="https://www.facebook.com/nontawat.friend/"target="_blank"-->NONTAWAT PANYAKRUEA</p>
          <div class="credits">Designed by <a href="https://bootstrapmade.com/"target="_blank">BootstrapMade</a>
          </div>
        </div>
      </div>
</footer>
		</nav>
	</div>


  <!-- /Navigation -->
    <!-- Section: separator -->
<script>
		// Get the modal
		var modal = document.getElementById('id01');
		// When the user clicks anywhere outside of the modal, close it
		window.onclick = function(event) {
		    if (event.target == modal) {
		        modal.style.display = "none";
		    }
		}
</script>

  <!-- Core JavaScript Files -->
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.min.js"></script>
  <script src="js/jquery.sticky.js"></script>
  <script src="js/jquery.scrollTo.js"></script>
  <script src="js/stellar.js"></script>
  <script src="js/wow.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/nivo-lightbox.min.js"></script>
  <!-- Custom Theme JavaScript -->
  <script src="js/custom.js"></script>
  <script src="contactform/contactform.js"></script>
  <script src="addproduct.js"></script>

</body>

</html>
