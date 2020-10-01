<!doctype html><head>
<meta charset="utf-8">
<title>myphoto_save</title>

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
/*?>$photo_name="myphoto_".time().".".$lastname;<?php */
copy($photo,"myphoto/".$photo_name);
unlink($photo);
}
}
	
$sql="insert into tb_myphoto(myphoto_photo) values('$photo_name')";
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
<meta http-equiv="refresh" content="1;url=?page=mygallery" />
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
<meta http-equiv="refresh" content="1;url=?page=mygallery" />
<?php
	}
?>