<!doctype html><head>
<meta charset="utf-8">
<title>member_save</title>
</head>

<body>
	<?php
$_POST["member_password"]=sha1($_POST["member_password"]); //แปลรหัสให้เป็น 40 ตัวอักษร
$member_photo=$_FILES["member_photo"]["tmp_name"];
$member_photo_name=$_FILES["member_photo"]["name"];
$array_lastname=explode(".",$member_photo_name);
$c=count($array_lastname)-1;
$lastname=strtolower($array_lastname[$c]);
if(!$member_photo){
$member_photo_name="nophoto.png";
}
else{
if($lastname=='jpg' or $lastname=='gif' or $lastname=='png'){
$member_photo_name="member_".time().".".$lastname;
copy($member_photo,"photo_upload/".$member_photo_name);
unlink($member_photo);
}
}
	
$sql="insert into
tb_member(member_name,member_lastname,member_username,member_password,member_photo,member_phone,member_status) values('$_POST[member_name]','$_POST[member_lastname]','$_POST[member_username]','$_POST[member_password]','$member_photo_name','$_POST[member_phone]','M')";
$result=$db->query($sql);
if($result){?>
<script type="text/javascript">
		Swal.fire({
  position: 'Top-center',
  type: 'success',
  title: 'บันทึกข้อมูล สำเร็จ',
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
  text: 'บันทึกข้อมูล ไม่สำเร็จ!',
  footer: '<a href>Why do I have this issue?</a>'
})
	</script>
<meta http-equiv="refresh" content="2;url=?page=member" />
<?php
	}
?>