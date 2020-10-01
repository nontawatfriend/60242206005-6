<!doctype html>

<head>
<meta charset="utf-8">
<title>gbook edit</title>
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
	<h2 style="font-family: 'Kanit', sans-serif;">สมุดเยี่ยม</h2>
<?php
 $sql="select * from tb_gbook where gbook_id=$_GET[gbook_id]";
 $result=$db->query($sql);
 $row=$result->fetch_array(MYSQLI_BOTH);
 ?>
<br>
		
<form onSubmit="JavaScript:return fncSubmit();"name="form1" method="post" action="?page=gbook_update">
 <div align="center">
 
                    <div class="col-md-8 col-md-push-4 col-sm-12 col-sm-push-0 col-xs-12 col-xs-push-0">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <!--<input class="form-control" placeholder=" ชื่อ" type="text" name="gbook_name" id="gbook_name"value="<?=$row['gbook_name']?>"/>-->
									
									
									<!--required="required"โปรดกรอกฟิวนี้-->
									
                                </div>
                            </div>
					  </div>
						<div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea name="gbook_text" class="form-control"  id="gbook_text" cols="8" rows="5" placeholder="ข้อความ"><?=$row['gbook_text']?></textarea>
                                </div>
							</div>
					  </div>
								
							
	</div>
  </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input value="update" class="btn btn-primary" type="submit">
									
									<button class="btn btn-primary"type="reset" name="button2" id="button2" value="Reset"><img src=img/reset.png width="26" height="20" align="absmiddle"value="Reset"abbr title="Reset"></button>
									<!--onclick="javascript:location.reload();-->

								
                              </div>
	 	 </div>
   <input type="hidden" name="gbook_id" value="<?=$row['gbook_id']?>" />
</form>

<table class="table table-striped">
	
		
</table>
</section>
	</body>
