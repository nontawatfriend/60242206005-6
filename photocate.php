<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Photocate</title>
</head>


<body>
	<br>
	<br>


	<form  id="form1" name="form1" method="post" action="?page=photocate_save">

				<div align="center">
	<div class="row">
		<div class="col-md-7 col-md-push-4">
                            <div class="col-md-7">
                                <div class="form-group">
	  <input  name="photocate_name" type="text"required="required"class="form-control" id="photocate_name" placeholder="ชื่ออัลบั้ม" >
									</div>
							</div>
					  </div>
				</div>


		</div><br>
	<p>
	  <input type="Submit"class="btn btn-primary"name="button" id="button" value="สร้างอัลบั้ม">
	</p>


	</form>



	<table class="table table-striped">
 <thead>
 <tr>
 <th scope="col">Photocate_id</th>
 <td scope="col">ชื่ออัลบั้ม</td>
 <td scope="col">ลบอัลบั้ม</td>
 </tr>
 </thead>
 <tbody>
<?php
$sql="select * from tb_photocate";
$result=$db->query($sql);
while($row=$result->fetch_array(MYSQLI_BOTH)){
?>

 <tr>
 <th scope="row"><?=$row['photocate_id']?></th>
 <td>
<a href="?page=photo&photocate_id=<?=$row['photocate_id']?>"><?=$row['photocate_name']?></a>
</td>
<td><a href="?page=photocate_delete&photocate_id=<?=$row["photocate_id"]?>" onClick="return confirm('คุณแน่ใจจะลบอัลบั้มใช่หรือไม่')"><img src="img/delete.png" width="50" height="41" alt=""/></a></td>
 </tr>
		</div>
<?php
}
?>
 </tbody>
</table>

</body>
</html>
