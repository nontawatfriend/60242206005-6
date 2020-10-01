<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Photocate_delete</title>
</head>

<body>
	<?php
$sql="delete from tb_photo where photocate_id='$_GET[photocate_id]'";
$result=$db->query($sql);
$sql_photo="select photo from tb_photo where photocate_id='$_GET[photocate_id]'";
$result_photo=$db->query($sql_photo);
$record_photo=$result_photo->fetch_array(MYSQLI_BOTH);
$sql="delete from tb_photocate where photocate_id='$_GET[photocate_id]'";
$result=$db->query($sql);
if($result){ ?>
<script type="text/javascript">
		Swal.fire({
  position: 'Top-center',
  type: 'success',
  title: 'ลบอัลบั้ม สำเร็จ',
  showConfirmButton: false,
  timer: 2500
})
  </script>
<meta http-equiv="refresh" content="3;url=?page=photocate">
<?php }
else{
  ?>
<script type="text/javascript">
		Swal.fire({
  position: 'Top-center',
  type: 'success',
  title: 'ลบอัลบั้ม ไม่สำเร็จ',
  showConfirmButton: false,
  timer: 2500
})
    </script>
    <meta http-equiv="refresh" content="2;url=?page=photocate">
    <?php
}
?>
</body>
</html>