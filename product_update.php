<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Update</title>
<body>
<?php
$product_img=$_FILES["product_img"]["tmp_name"];
$product_img_name=$_FILES["product_img"]["name"];
$array_lastname=explode(".",$product_img_name);
$c=count($array_lastname)-1;
$lastname=strtolower($array_lastname[$c]);
if(!$product_img){
	$sql="update tb_product set product_name='$_POST[product_name]',product_detail='$_POST[product_detail]',product_price='$_POST[product_price]',product_unit='$_POST[product_unit]',product_fb='$_POST[product_fb]' where product_id='$_POST[product_id]'";
	$result=$db->query($sql);
}
else{
if($lastname=='jpg' or $lastname=='gif' or $lastname=='png'){
$product_img_name="product_".time().".".$lastname;copy($product_img,"product_img/".$product_img_name); unlink($product_img);
}
$sql="update tb_product set product_name='$_POST[product_name]',product_detail='$_POST[product_detail]',product_price='$_POST[product_price]',product_unit='$_POST[product_unit]',product_fb='$_POST[product_fb]',product_img='$product_img_name' where product_id='$_POST[product_id]'";$result=$db->query($sql);
}
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
<meta http-equiv="refresh" content="1;url=?page=product">
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
<meta http-equiv="refresh" content="2;url=?page=product" />
<?php
	}
?>
</body>
</html>