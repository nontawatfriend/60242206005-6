 <?php
$product_img=$_FILES["product_img"]["tmp_name"];
$product_img_name=$_FILES["product_img"]["name"];
$array_lastname=explode(".",$product_img_name);
$c=count($array_lastname)-1;
$lastname=strtolower($array_lastname[$c]);
if(!$product_img){
$product_img_name="nophoto.png";
}
else{
if($lastname=='jpg' or $lastname=='gif' or $lastname=='png' ){
$product_img_name="product_".time().".".$lastname;
copy($product_img,"product_img/".$product_img_name);
unlink($product_img);
}
}

$today=date("Y-m-d");
 $sql="insert into tb_product(product_name,product_date,product_detail,product_price,product_unit,product_img,product_fb,member_id)values('$_POST[product_name]','$today','$_POST[product_detail]','$_POST[product_price]','$_POST[product_unit]','$product_img_name','$_POST[product_fb]','$row[member_id]')";
$result=$db->query($sql);
if($result){?>
<script type="text/javascript">
		Swal.fire({
  position: 'Top-center',
  type: 'success',
  title: 'บันทึกสินค้า สำเร็จ',
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
  text: 'บันทึกสินค้า ไม่สำเร็จ!',
  footer: '<a href>Why do I have this issue?</a>'
})
	</script>
<meta http-equiv="refresh" content="3;url=?page=product" />
<?php
	}
?>