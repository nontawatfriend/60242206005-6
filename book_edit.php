<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Book_edit</title>
</head>

<body>
	<?php
 $sql="select * from tb_book where book_id=$_GET[book_id]";
 $result=$db->query($sql);
 $row=$result->fetch_array(MYSQLI_BOTH);
 ?>
<br>
		
<form name="form" method="post" action="?page=book_update">
 <div align="center">
 
                    <div class="col-md-8 col-md-push-4 col-sm-12 col-sm-push-0 col-xs-12 col-xs-push-0">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" placeholder=" ชื่อ" type="text" name="book_name" id="book_name" value="<?=$row['book_name']?>"/>
									<!--required="required"โปรดกรอกฟิวนี้-->
                                </div>
                            </div>
					  </div>
						<div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
									<input type="text" name="book_price" class="form-control" placeholder="ราคา" required="required" pattern="^[0-9]+$" value="<?=$row['book_price']?>">
                                </div>
							</div>
					  </div>
								
							
	</div>
  </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input value="update" class="btn btn-primary" type="submit">
									<!--onclick="javascript:location.reload();-->

                              </div>
	 	 </div>
   <input type="hidden" name="book_id" value="<?=$row['book_id']?>" />
</form>

<table class="table table-striped">
	
		
</table>
</body>
</html>