<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Photo_Delete</title>
</head>

<body>
<?php
$sql_photo="select photo from tb_photo where photo_id='$_GET[photo_id]'";
$result_photo=$db->query($sql_photo);
$record_photo=$result_photo->fetch_array(MYSQLI_BOTH);
$sql="delete from tb_photo where photo_id='$_GET[photo_id]'";
$result=$db->query($sql);
$a=$_GET['photocate_id'];
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

<?php unlink("photo_upload/".$record_photo["photo"]);
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
<?php
$sqli="select from tb_photocate where photocate_id='$_GET[photocate_id]'";
$resulti=$db->query($sqli);?>
<meta http-equiv="refresh" content="2;url=?page=photo&photocate_id=<?=$_GET['photocate_id']?>">
</body>
</html>