
<style>
	.container{
    margin-top:20px;
}
.image-preview-input {
    position: relative;
	overflow: hidden;
	margin: 0px;
    color: #333;
    background-color: #fff;
    border-color: #ccc;
}
.image-preview-input input[type=file] {
	position: absolute;
	top: 0;
	right: 0;
	margin: 0;
	padding: 0;
	font-size: 20px;
	cursor: pointer;
	opacity: 0;
	filter: alpha(opacity=0);
}
.image-preview-input-title {
    margin-left:2px;
}
</style>
<?php
  if(@$_SESSION["sess_username"]){
 ?>
<div class="container">
<div class="right">
  <h3 style="font-family: 'Kanit', sans-serif;">เพิ่มสินค้า</h3><br>
</div>
</div>
  <?php
	
    $sql="select * from tb_product where product_id='$_GET[product_id]'";
	$result=$db->query($sql);
	$row=$result->fetch_array(MYSQLI_ASSOC);
	
	?>
    <div class="container">
		<div class="center">
			<div class="col-md-4"></div>
				<div class="col-md-8">
                <form accept-charset="UTF-8" action="?page=product_update" method="post" enctype="multipart/form-data">
					
				<div class="form-group row">
					<div class="col-sm-5">
                  		<input class="form-control animated" cols="25" id="product_name" name="product_name" placeholder="ชื่อสินค้า" maxlength="40" rows="3"required="required" value="<?=$row["product_name"]?>">
					</div>
				</div>
				<div class="form-group row">
					<div class="col-sm-5">
                  <textarea name="product_detail" class="form-control animated"  id="product_detail" cols="8" rows="3" maxlength="23" placeholder="รายละเอียด"><?=$row['product_detail']?></textarea>
					</div>
				</div>
				<div class="form-group row">
				<div class="col-sm-3">
                  <input class="form-control animated" cols="25" id="product_price" name="product_price" placeholder="ราคา" rows="3"required="required" value="<?=$row["product_price"]?>" pattern="^[0-9]+$" maxlength="10">
					</div>
				</div>
					<div class="form-group row">
					<div class="col-sm-3">
                  <input class="form-control animated" cols="25" id="product_unit" name="product_unit" placeholder="จำนวน" rows="3"required="required" value="<?=$row["product_unit"]?>" pattern="^[0-9]+$" maxlength="4">
						</div>
				</div>
						<div class="form-group row">
					<div class="col-sm-5">
					<input class="form-control animated" cols="25" id="product_fb" name="product_fb" placeholder="FACEBOOK" rows="3" maxlength="50" value="<?=$row["product_fb"]?>">
						</div>
				</div>
				<div class="form-group row">
					<div class="col-sm-5">
                  <div class="input-group image-preview">
                  <!-- <input type="text" class="form-control image-preview" disabled="disabled">--><!--don't give a name === doesn't send on POST/GET -->
                  <span class="input-group-btn">
                  <!-- image-preview-clear button -->
                  <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                  <span class="glyphicon glyphicon-remove"></span> Clear</button>
                  <!-- image-preview-input -->
                  <div class="btn btn-default image-preview-input">
                  <span class="glyphicon glyphicon-folder-open"></span>
                  <span class="image-preview-input-title">เลือกรูปภาพ</span>
                  <input type="file" name="product_img" id="product_img" /> <!-- rename it -->
                  </div>
                  </span>
                  </div><!-- /input-group image-preview [TO HERE]-->
                  <div class="text-center">
                        <button class="btn btn-success btn-lg" type="submit">แก้ไขสินค้า</button>
						</div>
					</div>
					</div>
                        <div ><br></div>
                  <input type="hidden" name="product_id" value="<?=$row['product_id']?>" />
                </form>
              </div>
  			</div>
		</div>

<?php } ?>
