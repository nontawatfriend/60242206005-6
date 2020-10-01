<!doctype html>

<head>
<meta charset="utf-8">
<title>member_delete</title>
</head>

<body>
<?php
$sql_photo="select member_photo from tb_member where member_id='$_GET[member_id]'";
$result_photo=$db->query($sql_photo);
$record_photo=$result_photo->fetch_array(MYSQLI_BOTH);
$sql="delete from tb_member where member_id='$_GET[member_id]'";
$result=$db->query($sql);
if($result){?>
	
	<script type="text/javascript">
		Swal.fire({
  position: 'Top-center',
  type: 'success',
  title: 'ลบข้อมูล สำเร็จ',
  showConfirmButton: false,
  timer: 2500
})
	</script>	
<meta http-equiv="refresh" content="1;url=?page=member">
<?php unlink("photo_upload/".$record_photo["member_photo"]);
	}
	else
	{?>
<script type="text/javascript">
		Swal.fire({
  type: 'error',
  title: 'Oops...',
  text: 'ลบข้อมูล ไม่สำเร็จ!',
  footer: '<a href>Why do I have this issue?</a>'
})
	</script>
<meta http-equiv="refresh" content="0;url=?page=member" />
<?php
	}
?>