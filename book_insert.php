<?php
	$today=date("Y-m-d");
	$sql="insert into tb_book(book_update,book_name,book_price)
	values('$today','$_POST[book_name]','$_POST[book_price]')";
	$result=$db->query($sql);
	if($result){?>
<script type="text/javascript">
		Swal.fire({
  position: 'Top-center',
  type: 'success',
  title: 'บันทึกหนังสือ สำเร็จ',
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
  text: 'บันทึกหนังสือ ไม่สำเร็จ!',
  footer: '<a href>Why do I have this issue?</a>'
})
	</script>
<meta http-equiv="refresh" content="2;url=?page=book" />
<?php
	}
?>
