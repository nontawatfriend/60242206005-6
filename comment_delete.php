<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>comment_delete</title>
</head>

<body>
	<?php
$sql="delete from tb_comment where comment_id='$_GET[comment_id]'";
$result=$db->query($sql);
if($result){?>
	<script type="text/javascript">
		Swal.fire({
  position: 'Top-center',
  type: 'success',
  title: 'ลบคอมเม้น สำเร็จ',
  showConfirmButton: false,
  timer: 2500
})
	</script>

<?php
	}
	else
	{?>
<script type="text/javascript">
		Swal.fire({
  type: 'error',
  title: 'Oops...',
  text: 'ลบคอมเม้น ไม่สำเร็จ!',
  footer: '<a href>Why do I have this issue?</a>'
})
	</script>
<?php
	}
?>
<meta http-equiv="refresh" content="1;url=?page=product_comment&product_id=<?=$_GET['product_id']?>">
</body>
</html>