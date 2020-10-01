<!doctype html><head>
<meta charset="utf-8">
<title>photo_save</title>

<body>
	<?php
$photo=$_FILES["photo"]["tmp_name"];
$photo_name=$_FILES["photo"]["name"];
$array_lastname=explode(".",$photo_name);
$c=count($array_lastname)-1;
$lastname=strtolower($array_lastname[$c]);
if(!$photo){
$photo_name="nophoto.png";
}
else{
if($lastname=='jpg' or $lastname=='gif' or $lastname=='png' ){
$photo_name="member_".time().".".$lastname;
copy($photo,"photo_upload/".$photo_name);
unlink($photo);
}
}
	
$sql="insert into tb_photo(photo,photocate_id) values('$photo_name','$_POST[photocate_id]')";
$result=$db->query($sql);
if($result){?>
<script type="text/javascript">
		Swal.fire({
  position: 'Top-center',
  type: 'success',
  title: 'บันทึกรูปภาพ สำเร็จ',
  showConfirmButton: false,
  timer: 2500
})
	</script>	
<meta http-equiv="refresh" content="2;url=?page=photo&photocate_id=<?=$_POST['photocate_id']?>" />
<?php
	}
else{?>
<script type="text/javascript">
		Swal.fire({
  type: 'error',
  title: 'Oops...',
  text: 'บันทึกรูปภาพ ไม่สำเร็จ!',
  footer: '<a href>Why do I have this issue?</a>'
})
	</script>
<meta http-equiv="refresh" content="2;url=?page=photo&photocate_id=<?=$_POST['photocate_id']?>" />
<?php
	}
?>