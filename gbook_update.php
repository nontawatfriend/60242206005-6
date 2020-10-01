<!doctype html><head>
<meta charset="utf-8">
<title>gbook update</title>
</head>

<?php
$today=date("Y-m-d");
$sql="update tb_gbook set
gbook_date='$today',gbook_text='$_POST[gbook_text]' where gbook_id='$_POST[gbook_id]'";
$result=$db->query($sql);
if($result){?>
<script type="text/javascript">
		Swal.fire({
  position: 'Top-center',
  type: 'success',
  title: 'แก้ไขข้อมูล สำเร็จ',
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
  text: 'แก้ไขข้อมูล ไม่สำเร็จ!',
  footer: '<a href>Why do I have this issue?</a>'
})
	</script>
<meta http-equiv="refresh" content="2;url=?page=gbook" />
<?php
	}
?>
