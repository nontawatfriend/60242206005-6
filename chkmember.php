<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>chkmember</title>
</head>

<body>
	<?php
$member_password=sha1($_POST["member_password"]);
if($_POST["member_username"]){
$sql="select * from tb_member where member_username='$_POST[member_username]' and member_password='$member_password'";
$result=$db->query($sql);
$row=$result->fetch_array(MYSQLI_BOTH);
$num=$result->num_rows;
if($num<=0){?>
	<script type="text/javascript">
		Swal.fire({
  position: 'Top-center',
  type: 'error',
  title: 'Username หรือ Password ไม่ถูกต้อง',
  showConfirmButton: false,
  timer: 5000
})</script>
	<?php
echo "<meta http-equiv='refresh' content='1;url=?page=aboutme' />";
}
else{?>
	<script type="text/javascript">
		Swal.fire({
  position: 'Top-center',
  type: 'success',
  title: 'login สำเร็จ',
  showConfirmButton: false,
  timer: 1000
})
	</script>
	<?php
@session_start();
$_SESSION["sess_userid"]=session_id();
$_SESSION["sess_username"]=$_POST["member_username"];
$_SESSION["sess_status"]=$row["member_status"];
echo "<meta http-equiv='refresh' content='1;url=?page=aboutme' />";
}
}
?>
</body>
</html>