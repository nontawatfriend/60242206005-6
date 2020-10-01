<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<body>
<?php
$_POST["member_password"]=sha1($_POST["member_password"]);
$member_photo=$_FILES["member_photo"]["tmp_name"];
$member_photo_name=$_FILES["member_photo"]["name"];
$array_lastname=explode(".",$member_photo_name);
$c=count($array_lastname)-1;
$lastname=strtolower($array_lastname[$c]);
if(!$member_photo){
	$sql="update tb_member set member_name='$_POST[member_name]',member_lastname='$_POST[member_lastname]',member_username='$_POST[member_username]',member_password='$_POST[member_password]' where member_id='$_POST[member_id]'";
	$result=$db->query($sql);
}
else{
if($lastname=='jpg' or $lastname=='gif' or $lastname=='png'){
$member_photo_name="member_".time().".".$lastname;copy($member_photo,"photo_upload/".$member_photo_name); unlink($member_photo);
}
$sql="update tb_member set member_name='$_POST[member_name]',member_lastname='$_POST[member_lastname]',member_username='$_POST[member_username]',member_password='$_POST[member_password]',member_photo='$member_photo_name' where member_id='$_POST[member_id]'";$result=$db->query($sql);
}
if($result){?>
<script type="text/javascript">
		Swal.fire({
  position: 'Top-center',
  type: 'success',
  title: 'แก้ไขข้อมูล สำเร็จ',
  showConfirmButton: false,
  timer: 2500
})
	</script>	
<meta http-equiv="refresh" content="1;url=?page=member">
<?php
	}
	else
	{?>
<script type="text/javascript">
		Swal.fire({
  type: 'error',
  title: 'Oops...',
  text: 'แก้ไขข้อมูล ไม่สำเร็จ!',
  footer: '<a href>Why do I have this issue?</a>'
})
	</script>
<meta http-equiv="refresh" content="2;url=?page=member" />
<?php
	}
?>
</body>
</html>