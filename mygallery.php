<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>My photo gallery</title>
</head>
<style>
	img:hover {
  animation: shake 0.5s;
  animation-iteration-count: infinite;
}

@keyframes shake {
  0% { transform: translate(1px, 1px) rotate(0deg); }
  10% { transform: translate(-1px, -2px) rotate(-1deg); }
  20% { transform: translate(-3px, 0px) rotate(1deg); }
  30% { transform: translate(3px, 2px) rotate(0deg); }
  40% { transform: translate(1px, -1px) rotate(1deg); }
  50% { transform: translate(-1px, 2px) rotate(-1deg); }
  60% { transform: translate(-3px, 1px) rotate(0deg); }
  70% { transform: translate(3px, 1px) rotate(-1deg); }
  80% { transform: translate(-1px, -1px) rotate(1deg); }
  90% { transform: translate(1px, 2px) rotate(0deg); }
  100% { transform: translate(1px, -2px) rotate(-1deg); }
}
		#myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}

/* Caption of Modal Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation */
.modal-content, #caption {  
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)} 
  to {-webkit-transform:scale(1)}
}

@keyframes zoom {
  from {transform:scale(0)} 
  to {transform:scale(1)}
}

/* The Close Button */
.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}
	</style>
<body>
	<!-- Section: gallery -->
  <section id="about" class="section-bg wow fadeInUp">

    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
          <div class="wow bounceInDown" data-wow-delay="0.4s">
            <div class="section-heading">
				<h2><font color="d43076">อัลบั้มของฉัน</font></h2>
            </div>
          </div>
        </div>
      </div>
    </div>
	  <div align="center">
		  <?php
if(@$_SESSION["sess_status"]=="A"){?>
<form method="post" enctype="multipart/form-data" name="form1" id="about"action="?page=myphoto_save">
  <p>
    <label for="fileField">PHOTO</label>
    <input type="file" name="photo" id="photo"class="btn btn-primary"required="required">
  </p>
  <p>
    <input class="btn btn-primary" type="submit" name="button" id="button" value="เพิ่มรูปภาพ">
    <input type="hidden" name="myphoto_id" id="myphoto_id"/>
  </p>
</form>
		  <?php } ?>
	</div>

	 
      <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
          <div class="wow bounceInUp" data-wow-delay="0.4s">
            	 <?php
$sql="select * from tb_myphoto";
$result=$db->query($sql);
while($row=$result->fetch_array(MYSQLI_BOTH)){
?>
              <div id="myImg"class="img-thumbnail" width="auto" height="300">
				  <a href="myphoto/<?=$row['myphoto_photo'];?>" title="NONTAWAT " >	 
				  <img src="myphoto/<?=$row['myphoto_photo'];?>" id="myImg"width="300" height="auto" alt="img"></a><?php
if(@$_SESSION["sess_status"]=="A"){?><br><a href="?page=myphoto_delete&myphoto_id=<?=$row["myphoto_id"]?>" onClick="return confirm('ต้องการลบรูปภาพใช่ไหม')"><img src="img/delete.png" width="45" height="36" alt=""/></a><?php } ?></div>
			  <?php } ?>
              
			 
			  </div>
			</div>
		  </div>
		

  </section>
  
<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("myImg");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}
</script>
		
</body>
</html>