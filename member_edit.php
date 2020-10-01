<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>member</title>
</head>
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
<body>
    <?php
    $sql="select*from tb_member where member_id=$_GET[member_id]";
	$result=$db->query($sql);
	$row=$result->fetch_array(MYSQLI_BOTH);
	?>
	
	<section id="about" class="section-bg wow fadeInUp">
	<h2 style="font-family: 'Kanit', sans-serif;">สมัครสมาชิก</h2>
		
		
	<br>
<form action="?page=member_update" onSubmit="JavaScript:return fncSubmit(); "method="post" enctype="multipart/form-data" name="form1" id="form1">
<div class="col-md-8 col-md-push-4">
	<div class="row">
         <div class="col-md-3">
            <div class="form-group">				
  <label for="textfield">ชื่อ</label>
  <input class="form-control " type="text" placeholder="ชื่อ"name="member_name" id="member_name" value="<?=$row['member_name']?>">
			</div>
		</div>
		<div class="row">
           <div class="col-md-4">
              <div class="form-group">
  <label for="textfield2">นามสกุล</label>
  <input class="form-control" type="text" placeholder="นามสกุล"name="member_lastname" id="member_lastname" value="<?=$row['member_lastname']?>">
		 	  </div>
            </div>
		</div>
	  </div>
		<div class="row">
           <div class="col-md-7">
               <div class="form-group">
  <label for="textfield3">Username</label>
  <input class="form-control" type="text" name="member_username" id="member_username"pattern="^[a-zA-Z0-9]+$" minlength="2"placeholder="ใส่ a-z A-Z 0-9 เท่านั้น" value="<?=$row['member_username']?>">
		 		</div>
           </div>
		</div>
		<div class="row">
            <div class="col-md-7">
                 <div class="form-group">
  <label for="textfield4">Password</label>
  <input class="form-control" type="password" name="member_password" id="member_password" value="<?=$row['member_password']?>">
  <label for="textfield4">เบอร์โทรศัพท์</label>
  <input class="form-control" type="phone" name="member_phone" id="member_phone" value="<?=$row['member_phone']?>">
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
                  <input name="member_photo" id="member_photo"type="file"  name="input-file-preview"/> <!-- rename it -->
                  </div>
			</div>
			</div><br><br><br>
		<div class="row">
          <div class="col-md-7">
              <div class="form-group">						                         
  <input type="submit" name="button" id="button" value="แก้ไขสมาชิก"class="btn btn-primary">
  <button class="btn btn-primary"type="reset" name="button2" id="button2" value="Reset"><img src=img/reset.png width="26" height="20" align="absmiddle"value="Reset"abbr title="Reset"></button>
		 	  </div>
           </div>
		</div>
</div>
		</div>	

		<input type="hidden" name="member_id" value="<?=$row['member_id']?>" />
	</form> 
<table class="table table-striped">
	</table>
</section>		
</body>
</html>