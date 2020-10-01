<head>
<meta charset="utf-8">
<title>product</title>
	<meta charset="utf-8">
<link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <link href="product.css" rel="stylesheet" >
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.1/js/bootstrap.min.js"></script>
	<link href="css/post.css" rel="stylesheet">
<link href="css/comment.css" rel="stylesheet" >
    <!-- ---- Include the above in your HEAD tag ---------->
    <!-- Google Fonts-->
		</head>
<br>
	<h2>รายละเอียดของสินค้า</h2><br>

<div class="container">
	
		 <?php
$sql="select * from tb_product inner join tb_member on tb_product.member_id=tb_member.member_id  where product_id='$_GET[product_id]'";
$result=$db->query($sql);
while($row=$result->fetch_array(MYSQLI_ASSOC)){
?>
	<div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
               <section class="post-heading">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="media">
                              <div class="media-left">
                                <a href="#">
                                  <img class="media-object photo-profile" src="photo_upload/<?=$row["member_photo"]?>" width="40" height="auto" alt="...">
                                </a>
                              </div>
                              <div class="media-body">
                                <a href="#" class="anchor-username"><h4 class="media-heading"><?=$row["member_username"]?> </h4></a>
                                <a href="#" class="anchor-time"><?=$row["product_date"]?></a>
                              </div>
                            </div>
                        </div>
						<?php
 						if(@$_SESSION["sess_username"]==$row["member_username"] or @$_SESSION["sess_status"]=="A"){?>
                         <div class="col-md-12">
                             <p>
								<a href="?page=product_edit&product_id=<?=$row["product_id"];?>" onclick="return confirm('คุณแน่ใจจะแก้ไขจริงหรือไม่')"><i class="glyphicon glyphicon-pencil" title="แก้ไขสินค้า"></i></a>
								<a href="?page=product_delete&product_id=<?=$row["product_id"];?>" onClick="return confirm('คุณแน่ใจจะลบใช่หรือไม่')" ><i class="glyphicon glyphicon-trash" title="ลบสินค้า"></i></a>
							</p>
                         </div>
                         <?php } ?>
                    </div>
               </section>
			   <img src="product_img/<?=$row["product_img"]?>" width="auto" height="190">
               <section class="">
                   <h4>:: <?=$row["product_name"]?> ::</h4>
					<p>ข้อมูลสินค้า : <?=$row["product_detail"]?></p>
					<p>จำนวนสินค้า : <?=$row["product_unit"]?> ชิ้น</p>
					<p>ราคา : <?=$row["product_price"]?> บาท</p>
               </section>
               <section class="post-footer">
                   <hr><div align="center">
                        <ul class="list-unstyled">
<!--comment-->
<?php
$sqli="select * from tb_comment where product_id='$row[product_id]'";
$resulti=$db->query($sqli);
$rowi=$resulti->fetch_array(MYSQLI_BOTH);
$num=$resulti->num_rows;?>
                            <li><a href="#" class="btn btn-primary"><i class="glyphicon glyphicon-thumbs-up"></i> Like 0 คน</a> </li><br>
                            <li><a href="#" class="btn btn-primary"><i class="glyphicon glyphicon-comment"></i> Comment <?=$num?> คน</a></li>
                        </ul>
                   
				   </div>
<!-- Button trigger modal --> 
               </section>
            </div>
        </div>
	</div>
	<?php
if(@$_SESSION["sess_userid"]){
?>
    	<div class="row" style="margin-top:0px;">
    		<div class="col-md-12">
                    <div class="col-md-12">
                        <form accept-charset="UTF-8" action="?page=comment_save" method="post">
                            <input type="hidden" name="comment_id" id="comment_id" value="<?=$_GET['comment_id']; ?>" />
                            <textarea class="form-control animated" cols="20)" id="comment" name="comment" placeholder="comment" rows="5" required="required"></textarea>
                            <div class="text-right"><br>
                             <p><button class="btn btn-success btn-lg" type="submit">คอมเม้น</button></p>
                            </div>
							<input type="hidden" name="product_id" id="product_id" value="<?=$_GET['product_id']?>" />
                        </form>
                    </div>
    		</div>
    	</div>
		  <?php
				}
				   ?>

<h2 class="text-center"><h2>ความคิดเห็นทั้งหมด</h2><br>
			
<?php
$sql_g="select * from tb_member inner join tb_comment on tb_member.member_id=tb_comment.member_id where product_id=$_GET[product_id]";
$result_g=$db->query($sql_g);
while($row_g=$result_g->fetch_array(MYSQLI_ASSOC)){
?> 
  <div class="container">	
    <div class="panel panel-default">
      <div class="panel-body">
      	<div class="row">
          <div class="col-md-2">
             <img src="photo_upload/<?=$row_g["member_photo"]?>" class="img img-rounded img-fluid" width="auto" height="70">
             <p class="text-secondary text-center"><?=$row_g["member_name"]?></p>
			 <p><?=$row_g["comment_dt"]?></p>
             </div>
<?php
if(@$_SESSION["sess_username"]==$row_g["member_username"] or @$_SESSION["sess_status"]=="A"){?>
			<div align="right">
<a href="?page=comment_delete&comment_id=<?=$row_g["comment_id"]?>&product_id=<?=$row_g["product_id"]?>" onclick="return confirm('คุณแน่ใจจะลบคอมเม้นใช่หรือไม่')"><img src="img/delete.png" width="50" height="41" alt=""/></a>
			</div>
<?php } ?> 
			<div class="col-md-8"><p><?=$row_g["comment"]?></p></div>
			 <br>
            
      	</div>
      </div>
    </div>
  </div>
 
		<?php }} ?>
	
</div>



	<script>$(document).on('click', '#close-preview', function(){
    $('.image-preview').popover('hide');
    // Hover befor close the preview
    $('.image-preview').hover(
        function () {
           $('.image-preview').popover('show');
        },
         function () {
           $('.image-preview').popover('hide');
        }
    );
});

$(function() {
    // Create the close button
    var closebtn = $('<button/>', {
        type:"button",
        text: 'x',
        id: 'close-preview',
        style: 'font-size: initial;',
    });
    closebtn.attr("class","close pull-right");
    // Set the popover default content
    $('.image-preview').popover({
        trigger:'manual',
        html:true,
        title: "<strong>Preview</strong>"+$(closebtn)[0].outerHTML,
        content: "There's no image",
        placement:'bottom'
    });
    // Clear event
    $('.image-preview-clear').click(function(){
        $('.image-preview').attr("data-content","").popover('hide');
        $('.image-preview-filename').val("");
        $('.image-preview-clear').hide();
        $('.image-preview-input input:file').val("");
        $(".image-preview-input-title").text("Browse");
    });
    // Create the preview image
    $(".image-preview-input input:file").change(function (){
        var img = $('<img/>', {
            id: 'dynamic',
            width:250,
            height:200
        });
        var file = this.files[0];
        var reader = new FileReader();
        // Set preview image into the popover data-content
        reader.onload = function (e) {
            $(".image-preview-input-title").text("Change");
            $(".image-preview-clear").show();
            $(".image-preview-filename").val(file.name);
            img.attr('src', e.target.result);
            $(".image-preview").attr("data-content",$(img)[0].outerHTML).popover("show");
        }
        reader.readAsDataURL(file);
    });
});
</script>
 <script src="js/comment.js"></script>