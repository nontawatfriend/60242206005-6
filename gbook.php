<!doctype html>

<head>
<meta charset="utf-8">
<title>gbook</title>
</head>
<script type="text/javascript">
function fncSubmit()
{
    if(document.getElementById('gbook_name').value == "")
    {
        alert('กรุณากรอกชื่อด้วยครับ');
        return false;
    }
	if(document.getElementById('gbook_text').value == "")
    {
        alert('กรุณากรอกข้อความด้วยครับ');
        return false;
    }
}
</script>
<body>

	<section id="about" class="section-bg wow fadeInUp">
	
<?php
$strKeyword=null;
if(isset($_POST["txtKeyword"])){
$strKeyword=$_POST["txtKeyword"];
}
?>
<form class="form-inline" id="form2" name="formSearch" method="post" action="?page=gbook_save">
	<div class="col-md-7"></div>
	<div class="col-md-5">
 <label>
 <input class="form-control"placeholder="ชื่อ-ข้อความ"type="text" name="txtKeyword" id="txtKeyword" value="<?=$strKeyword?>" />
 </label>
 <label>
 <input class="btn btn-primary"type="submit" name="button" id="button" value="ค้นหา" />
 </label>
	</div>
</form>
		<h2 style="font-family: 'Kanit', sans-serif;">สมุดเยี่ยม</h2>
	<br>
				  <?php
 if(@$_SESSION["sess_username"]){
?>
<form onSubmit="JavaScript:return fncSubmit();"name="form1" method="post" action="?page=gbook_save">
 <div align="center">

                    <div class="col-md-8 col-md-push-4 col-sm-12 col-sm-push-0 col-xs-12 col-xs-push-0">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
									
                                    <?=$row["member_name"]?> <!--required="required"โปรดกรอกฟิวนี้-->
                                </div>
                            </div>
					  </div>
						<div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea name="gbook_text" class="form-control"  id="gbook_text" cols="8" rows="5" placeholder="ข้อความ"></textarea>
                                </div>
							</div>
					  </div>


	</div>
  </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input value="Save" class="btn btn-primary" type="submit">

									<button class="btn btn-primary"type="reset" name="button2" id="button2" value="Reset"><img src=img/reset.png width="25" height="19" align="absmiddle"value="Reset"abbr title="Reset"></button>
									<!--onclick="javascript:location.reload();-->


                              </div>
	 	 </div>
	

</form>
<?php }?>
<table class="table table-striped">
	<thead>
<tr>
 <td><h4>ID</h4></td>
 <td><h4>ชื่อผู้เขียน</h4></td>
 <td><h4>ข้อความ</h4></td>
 <td><h4>วันที่เขียน</h4></td>
	<?php
 if(@$_SESSION["sess_username"]){
?>

 <td><h4>แก้ไข</h4></td>
 <td><h4>ลบ</h4></td><?php } ?>
 </tr>
</thead>

<?php
$sql="select * from tb_gbook inner join tb_member on tb_gbook.member_id=tb_member.member_id where gbook_name LIKE '%".$strKeyword."%' or
gbook_text LIKE '%".$strKeyword."%' " ;
$result=$db->query($sql);
while($row=$result->fetch_array(MYSQLI_BOTH)){
?>

 <tr>
 <td><?=$row["gbook_id"]?></td>
 <td><?=$row["member_name"]?></td>
 <td><?=$row["gbook_text"]?></td>
 <td><?=$row["gbook_date"]?></td>
 
 <td><?php
if(@$_SESSION["sess_username"]==$row["member_username"] or @$_SESSION["sess_status"]=="A"){?>
<a href="?page=gbook_edit&gbook_id=<?=$row["gbook_id"];?>"
onclick="return confirm('คุณแน่ใจจะแก้ไขจริงหรือไม่')"><img src="img/edit.png" width="43" height="41" alt=""/></a><?php } ?></td>
 <td><?php
if(@$_SESSION["sess_username"]==$row["member_username"] or @$_SESSION["sess_status"]=="A"){?><a href="?page=gbook_delete&gbook_id=<?=$row["gbook_id"]?>" onClick="return confirm('คุณแน่ใจจะลบใช่หรือไม่')"><img src="img/delete.png" width="50" height="41" alt=""/></a><?php } ?></td>

 </tr>
<?php

 }
?>

</table>
</section>
	</body>
