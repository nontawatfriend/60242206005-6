<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Book</title>
</head>

<body>
	<br>
	<form name="form" method="post" action="?page=book_insert">
		<div class="col-md-5"></div>
		<div class="container">
                        <div class="center">
                            <div class="col-md-3">
                                <div class="form-group">
									<input type="text" name="book_name" class="form-control" placeholder="ชื่อหนังสือ" required="required">
                                     <!--required="required"โปรดกรอกฟิวนี้-->
                                </div>
                            </div>
					  </div>
			</div>
		<div class="col-md-5"></div>
					  <div class="center">
                            <div class="col-md-2">
                                <div class="form-group">
									<input type="text" name="book_price" class="form-control" placeholder="ราคา" required="required" pattern="^[0-9]+$">
                                </div>
                            </div>
					  </div>
		<div class="col-md-5"></div>
					  <div class="center">
                            <div class="col-md-12">
                                <div class="form-group">
									<input value="บันทึก" class="btn btn-primary" type="submit">
                                </div>
                            </div>
					  </div>
	
	
	</form>
	<table class="table table-striped">
	<thead>
<tr>
 <td><h4>ID</h4></td>
 <td><h4>ชื่อหนังสือ</h4></td>
 <td><h4>ราคา</h4></td>
 <td><h4>วันที่</h4></td>
 <td><h4>แก้ไข</h4></td>
 <td><h4>ลบ</h4></td>
 </tr>
</thead>
<?php
$sql="select * from tb_book" ;
$result=$db->query($sql);
while($row=$result->fetch_array(MYSQLI_BOTH)){
?>

 <tr>
 <td><?=$row["book_id"]?></td>
 <td><?=$row["book_name"]?></td>
 <td><?=$row["book_price"]?></td>
 <td><?=$row["book_update"]?></td>
<td>
<a href="?page=book_edit&book_id=<?=$row["book_id"];?>"
onclick="return confirm('คุณแน่ใจจะแก้ไขจริงหรือไม่')"><img src="img/edit.png" width="43" height="41" alt=""/></a>
</td>
<td>
<a href="?page=book_delete&book_id=<?=$row["book_id"]?>" onClick="return confirm('คุณแน่ใจจะลบใช่หรือไม่')"><img src="img/delete.png" width="50" height="41" alt=""/></a>
</td>

 </tr>
<?php
 }
?>

</table>
		
	
</body>
</html>