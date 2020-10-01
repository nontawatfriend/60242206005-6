<!doctype html><head>
<meta charset="utf-8">
<title>book update</title>
</head>

<?php
$today=date("Y-m-d");
$sql="update tb_book set book_update='$today',book_name='$_POST[book_name]',book_price='$_POST[book_price]' where book_id='$_POST[book_id]'";
$result=$db->query($sql);

if($result){?>
<script type="text/javascript">
		Swal.fire({
  position: 'Top-center',
  type: 'success',
  title: 'แก้ไขหนังสือ สำเร็จ',
  showConfirmButton: false,
  timer: 2500
})
	</script>	


<meta http-equiv="refresh" content="1;url=?page=book">
<?php
	}
	else
	{?>
<script type="text/javascript">
		Swal.fire({
  type: 'error',
  title: 'Oops...',
  text: 'แก้ไขหนังสือ ไม่สำเร็จ!',
  footer: '<a href>Why do I have this issue?</a>'
})
	</script>
<meta http-equiv="refresh" content="2;url=?page=book" />
<?php
	}
?>
