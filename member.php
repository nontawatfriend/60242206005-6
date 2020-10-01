<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>member</title>
</head>
	<style>
	.container{
    margin-top:0px;
}
.image-preview-input {
    position: relative;
	overflow: hidden;
	margin: 0px;
    color: #333;
    background-color: #fff;
    border-color: #ccc;
}
.image-preview-input input[type=file] {
	position: absolute;
	top: 0;
	right: 0;
	margin: 0;
	padding: 0;
	font-size: 20px;
	cursor: pointer;
	opacity: 0;
	filter: alpha(opacity=0);
}
.image-preview-input-title {
    margin-left:2px;
}
</style>
<script type="text/javascript">
function fncSubmit()
{
    if(document.getElementById('member_name').value == "")
    {
        alert('กรุณากรอกชื่อด้วยครับ');
        return false;
    }
	if(document.getElementById('member_lastname').value == "")
    {
        alert('กรุณากรอกนามสกุลด้วยครับ');
        return false;
    }
	if(document.getElementById('member_username').value == "")
    {
        alert('กรุณากรอก username ด้วยครับ');
        return false;
    }
	if(document.getElementById('member_password').value == "")
    {
        alert('กรุณากรอก password ด้วยครับ');
        return false;
    }
}
</script>
<body><?php
$strKeyword=null;
if(isset($_POST["txtKeyword"])){
$strKeyword=$_POST["txtKeyword"];
}
?>
<form class="row" id="form2" name="formSearch" method="post" action="">
<div class="col-md-7"></div>
<div class="col-md-5">
 <label>
 <input class="form-control" type="text" name="txtKeyword" id="txtKeyword" value="<?=$strKeyword?>" />
 </label>
 <label>
 <input class="btn btn-primary"type="submit" name="button" id="button" value="ค้นหา" />
 </label>
</div>
</form>
	<section id="about" class="section-bg wow fadeInUp">
	<h2 style="font-family: 'Kanit', sans-serif;">สมัครสมาชิก</h2>
	<!--<form class="form-inline">
	
            
  <div class="form-group">
    <label for="textfield">ชื่อ</label>
  <input class="form-control " type="text" placeholder="ชื่อ"name="member_name" id="member_name">
      </div>
		
</form> -->

		
	<br>
<form onSubmit="JavaScript:return fncSubmit();"action="?page=member_save" method="post" enctype="multipart/form-data" name="form1" id="form1">	
<div class="col-md-8 col-md-push-4">
	<div class="row">
         <div class="col-md-3">
            <div class="form-group">				
  <label for="textfield">ชื่อ</label>
  <input class="form-control " type="text" placeholder="ชื่อ"name="member_name" id="member_name" >
			</div>
		</div>
		<div class="row">
           <div class="col-md-4">
              <div class="form-group">
  <label for="textfield2">นามสกุล</label>
  <input class="form-control" type="text" placeholder="นามสกุล"name="member_lastname" id="member_lastname">
		 	  </div>
            </div>
		</div>
	  </div>
		<div class="row">
           <div class="col-md-7">
               <div class="form-group">
  <label for="textfield3">Username</label>
  <input class="form-control" type="text" name="member_username" id="member_username" pattern="^[a-zA-Z0-9]+$" minlength="2"placeholder="ใส่ a-z A-Z 0-9 เท่านั้น">
		 		</div>
           </div>
		</div>
		<div class="row">
            <div class="col-md-7">
                 <div class="form-group">
  <label for="textfield4">Password</label>
  <input class="form-control" type="password" name="member_password" id="member_password">
  <label for="textfield4">เบอร์โทรศัพท์</label>
  <input class="form-control" type="phone" name="member_phone" id="member_phone" pattern="^[0-9]+$">
		 		 </div>
			</div>
		</div>
	<div class="row">
            <div class="col-md-7">
		<div class="input-group image-preview">
                  <!-- <input type="text" class="form-control image-preview" disabled="disabled">--><!--don't give a name === doesn't send on POST/GET -->
                  <span class="input-group-btn">
                  <!-- image-preview-clear button -->
                  <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                  <span class="glyphicon glyphicon-remove"></span> Clear</button>
                  <!-- image-preview-input -->
                  <div class="btn btn-default image-preview-input">
                  <span class="glyphicon glyphicon-folder-open"></span>
                  <span class="image-preview-input-title">เลือกรูปภาพ</span>
                  <input name="member_photo" id="member_photo" type="file" required="required"/> <!-- rename it -->
                  </div>
			</div>
			</div><br><br><br>
		<div class="row">
          <div class="col-md-7">
              <div class="form-group">						                         
  <input type="submit" name="button" id="button" value="สมัครสมาชิก"class="btn btn-primary">
  <button class="btn btn-primary"type="reset" name="button2" id="button2" value="Reset"><img src=img/reset.png width="26" height="20" align="absmiddle"value="Reset"abbr title="Reset"></button>
		 	  </div>
           </div>
		</div>
</div>
		</div>
		<input type="hidden" name="member_id" id="member_id" value="<?=$_GET['member_id']?>" />
	</form>
		
	<table class="table table-striped">
<thead>
 <tr>
 <td><h4>ID</h4></td>
 <td><h4>ชื่อ</h4></td>
 <td><h4>นามสกุล</h4></td>
 <td><h4>username</h4></td>
 <td><h4>รูปภาพ</h4></td>
	 <?php
 if(@$_SESSION["sess_username"]){
?>
	 <td><h4>แก้ไข</h4></td>
	 <td><h4>ลบ</h4></td><?php } ?>
 </tr>
</thead>
<tbody>
<?php
$sql="select * from tb_member where member_name LIKE '%".$strKeyword."%' or
member_lastname LIKE '%".$strKeyword."%'or member_username LIKE '%".$strKeyword."%'";
$result=$db->query($sql);
while($row=$result->fetch_array(MYSQLI_BOTH)){
?>
 <tr>
 <td><?=$row["member_id"]?></td>
 <td><?=$row["member_name"]?></td>
 <td><?=$row["member_lastname"]?></td>
 <td><?=$row["member_username"]?></td>
	 	 
 <td>
<img src="photo_upload/<?=$row["member_photo"]?>" class="img-thumbnail" height="150"width="150" >
</td>
<td><?php
if(@$_SESSION["sess_username"]==$row["member_username"] or @$_SESSION["sess_status"]=="A"){?><a href="?page=member_edit&member_id=<?=$row["member_id"];?>"onclick="return confirm('คุณแน่ใจจะแก้ไขจริงหรือไม่')"><img src="img/edit.png" width="43" height="41" alt=""/></a><?php } ?></td>
<td>
<?php
if(@$_SESSION["sess_username"]==$row["member_username"] or @$_SESSION["sess_status"]=="A"){?><a href="?page=member_delete&member_id=<?=$row["member_id"]?>" onclick="return confirm('คุณแน่ใจจะลบใช่หรือไม่')"><img src="img/delete.png" width="50" height="41" alt=""/></a><?php } ?></td>
 </tr>
<?php
}
?>
</tbody>
</table>
</section>		
</body>
</html>