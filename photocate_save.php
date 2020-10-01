<?php
	$sql="insert into tb_photocate(photocate_name) values('$_POST[photocate_name]')";
	$result=$db->query($sql);
	if($result){?>
<script type="text/javascript">
		Swal.fire({
  position: 'Top-center',
  type: 'success',
  title: 'บันทึกอัลบั้ม สำเร็จ',
  showConfirmButton: false,
  timer: 2500
})
	</script>	
<meta http-equiv="refresh" content="3;url=?page=photocate">
<?php
	}
	else{?>
<script type="text/javascript">
		Swal.fire({
  type: 'error',
  title: 'Oops...',
  text: 'บันทึกอัลบั้ม ไม่สำเร็จ!',
  footer: '<a href>Why do I have this issue?</a>'
})
	</script>
<meta http-equiv="refresh" content="2;url=?page=photocate" />
<?php
	}
?>
