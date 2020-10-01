<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>gbook_delete</title>
</head>

<body>
<?php
$sql="delete from tb_gbook where gbook_id='$_GET[gbook_id]'";
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
<meta http-equiv="refresh" content="1;url=?page=gbook">
<?php
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
<meta http-equiv="refresh" content="1;url=?page=gbook" />
<?php
	}
?>