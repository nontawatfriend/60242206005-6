<?php
	$today=date("Y-m-d");
	$sql="insert into tb_gbook(gbook_date,gbook_text,member_id)
	values('$today','$_POST[gbook_text]','$row[member_id]')";
	$result=$db->query($sql);
	if($result){?>
<script type="text/javascript">
		Swal.fire({
  position: 'Top-center',
  type: 'success',
  title: 'บันทึกข้อมูล สำเร็จ',
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
  text: 'บันทึกข้อมูล ไม่สำเร็จ!',
  footer: '<a href>Why do I have this issue?</a>'
})
	</script>
<meta http-equiv="refresh" content="2;url=?page=gbook" />
<?php
	}
?>
