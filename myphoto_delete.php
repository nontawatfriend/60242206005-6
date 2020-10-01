<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>MyPhoto_Delete</title>
</head>

<body>
<?php
$sql_photo="select * from tb_myphoto where myphoto_id='$_GET[myphoto_id]'";
$result_photo=$db->query($sql_photo);
$record_photo=$result_photo->fetch_array(MYSQLI_BOTH);
$sql="delete from tb_myphoto where myphoto_id='$_GET[myphoto_id]'";
$result=$db->query($sql);
if($result){ ?>
<script type="text/javascript">
		Swal.fire({
  position: 'Top-center',
  type: 'success',
  title: 'ลบรูปภาพ สำเร็จ',
  showConfirmButton: false,
  timer: 2500
})
  </script>

<?php unlink("myphoto/".$record_photo["myphoto_photo"]);
		   }
else{
  ?>
<script type="text/javascript">
		Swal.fire({
  position: 'Top-center',
  type: 'success',
  title: 'ลบรูปภาพ สำเร็จ',
  showConfirmButton: false,
  timer: 2500
})
    </script>
    <?php
}
?>
<meta http-equiv="refresh" content="555;url=?page=gallery">
</body>
</html>