
<style>
	.container{
    margin-top:0px;
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
    <div class="container">
		<div class="center">
			<div class="col-md-4"></div>
				<div class="col-md-8">
                <form accept-charset="UTF-8" action="?page=product_save" method="post" enctype="multipart/form-data">
					
				<div class="form-group row">
					<div class="col-sm-5">
                  		<input class="form-control animated" cols="25" id="product_name" name="product_name" placeholder="ชื่อสินค้า" rows="3" required="required" maxlength="40">
					</div>
				</div>
				<div class="form-group row">
					<div class="col-sm-5">
                  <textarea class="form-control animated" cols="25" id="product_detail" name="product_detail" placeholder="รายละเอียด" rows="3" required="required" maxlength="23"></textarea>
					</div>
				</div>
				<div class="form-group row">
				<div class="col-sm-3">
                  <input class="form-control animated" cols="25" id="product_price" name="product_price" placeholder="ราคา" rows="3" pattern="^[0-9]+$" required="required" maxlength="10">
					</div>
				</div>
					<div class="form-group row">
					<div class="col-sm-3">
                  <input class="form-control animated" cols="25" id="product_unit" name="product_unit" pattern="^[0-9]+$" placeholder="จำนวน" rows="3" required="required" maxlength="4">
						</div>
				</div>
						<div class="form-group row">
					<div class="col-sm-5">
					<input class="form-control animated" cols="25" id="product_fb" name="product_fb" placeholder="FACEBOOK" rows="3" maxlength="50">
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
                  <input name="product_img" id="product_img"type="file" required="required"/> <!-- rename it -->
                  </div>
                  </span>
                  </div><!-- /input-group image-preview [TO HERE]-->
                  <div class="text-center"><br>
                        <button class="btn btn-success btn-lg" type="submit">เพิ่มสินค้า</button>
	<input type="hidden" name="member_id" id="member_id" value="<?=$_GET['member_id']?>" />
						</div>
					</div>
					</div>
                        <div ><br></div>
                  
                </form>
              </div>
  			</div>
		</div>

<?php } ?>
