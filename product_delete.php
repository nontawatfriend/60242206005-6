<!doctype html>

<head>
<meta charset="utf-8">
<title>product_delete</title>
</head>

<body>
<?php
$sql_photo="select product_img from tb_product where product_id='$_GET[product_id]'";
$result_photo=$db->query($sql_photo);
$record_photo=$result_photo->fetch_array(MYSQLI_BOTH);
$sql="delete from tb_product where product_id='$_GET[product_id]'";
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
<meta http-equiv="refresh" content="1;url=?page=product">
<?php unlink("product_img/".$record_photo["product_img"]);
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
<meta http-equiv="refresh" content="2;url=?page=product" />
<?php
	}
?>