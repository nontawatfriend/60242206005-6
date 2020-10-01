<?php
	date_default_timezone_set('Asia/Bangkok');
	$dates=date("Y-m-d H:i:s");
	$sql="insert into tb_comment(comment_dt,comment,product_id,member_id)values('$dates','$_POST[comment]','$_POST[product_id]','$row[member_id]')";
	$result=$db->query($sql);
if($result){?>
<script type="text/javascript">
		Swal.fire({
  position: 'Top-center',
  type: 'success',
  title: 'คอมเม้น สำเร็จ',
  showConfirmButton: false,
  timer: 2500
})
	</script>	
<meta http-equiv="refresh" content="1;url=?page=product_comment&product_id=<?=$_POST['product_id']?>">
<?php
	}
	else
	{?>
<script type="text/javascript">
		Swal.fire({
  type: 'error',
  title: 'Oops...',
  text: 'คอมเม้น ไม่สำเร็จ!',
  footer: '<a href>Why do I have this issue?</a>'
})
	</script>
<meta http-equiv="refresh" content="2;url=?page=product_comment&product_id=<?=$_POST['product_id']?>"/>
<?php
	}
?>
