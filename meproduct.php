<link href="css/post.css" rel="stylesheet">
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
    <!-- ---- Include the above in your HEAD tag ---------->
    <!-- Google Fonts-->
		</head>

	<br>
	<h2>คลังสินค้าของคุณ</h2><br>
	<div class="container">
<?php
$sql="select * from tb_product inner join tb_member on tb_product.member_id=tb_member.member_id where member_username='$_SESSION[sess_username]'";
$result=$db->query($sql);
while($row=$result->fetch_array(MYSQLI_BOTH)){
?>
	<div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-body">
               <section class="post-heading">
                    <div class="row">
                        <div class="col-md-11">
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
 						if(@$_SESSION["sess_username"]==$row["member_username"]){?>
                         <div class="col-md-0">
                             <p>
								<a href="?page=product_edit&product_id=<?=$row["product_id"];?>" onclick="return confirm('คุณแน่ใจจะแก้ไขจริงหรือไม่')"><i class="glyphicon glyphicon-pencil"></i></a>
								<a href="?page=product_delete&product_id=<?=$row["product_id"];?>" onClick="return confirm('คุณแน่ใจจะลบใช่หรือไม่')"><i class="glyphicon glyphicon-trash"></i></a>
							</p>
                         </div>
                         <?php } ?>
                    </div>
               </section>
			   <img src="product_img/<?=$row["product_img"]?>" width="250" height="190">
               <section class="post-body"><br>
                   <h4>:: <?=$row["product_name"]?> ::</h4>
					<!--<p>ชื่อสินค้า : <?=$row["product_name"]?></p>-->
					<p>ข้อมูลสินค้า : <?=$row["product_detail"]?></p>
					<p>จำนวนสินค้า : <?=$row["product_unit"]?> ชิ้น</p>
					<p>ราคา : <?=$row["product_price"]?> บาท</p>
               </section>
               <section class="post-footer">
                   <hr>
                   <div class="post-footer-option container">
                        <ul class="list-unstyled">
<?php
$sqli="select * from tb_comment where product_id='$row[product_id]'";
$resulti=$db->query($sqli);
$rowi=$resulti->fetch_array(MYSQLI_BOTH);
$num=$resulti->num_rows;?>
                            <li><a href="#" class="btn btn-primary"><i class="glyphicon glyphicon-thumbs-up"></i> Like 0 คน</a> </li>
                            <li><a href="#" class="btn btn-primary"><i class="glyphicon glyphicon-comment"></i> Comment <?=$num?>  คน</a></li>
                        </ul>
                   </div>
				   </section>
				<button type="button" class="btn btn-success" data-toggle="modal" data-target="#basicExampleModal"><a href="?page=product_comment&product_id=<?=$row["product_id"];?>">ดูรายละเอียดสินค้า</a></button>
            </div>
        </div>
	</div>
		<?php } ?>
		
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
