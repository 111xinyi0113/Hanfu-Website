<?php
include_once("top.php");
$id = !empty($_GET['id']) ? intval($_GET['id']) : '';
$sql=mysqli_query($conn,"select * from fenlei where id=".$id."");
$info=mysqli_fetch_array($sql);
?>
<!-- 顶部 -->
<script type="text/javascript"> 
function check(){   
        if(document.form1.fenleiname.value==""){
		alert("Please enter the category name");
		document.form1.fenleiname.focus();
		return false;}
}
</script> 
<div id="middle">
     <?php
include_once("left.php");
?>
     <div class="right"  id="mainFrame">
     <div class="right_cont">
   <div class="title_right"><strong>Modify Category</strong></div>
   <table width="100%" border="0" cellpadding="6" cellspacing="0" bgcolor="#BCE8B5" class="table table-bordered">
             <form name="form1" method="post" action="?action=update&id=<?php echo $info['id'];?>" onSubmit="return check(this)">
			<tr bgcolor="#FFFFFF">
              <td height="25" colspan="2" align="center" bgcolor="#ffffff"><strong>
                
              Modify Category</strong></td>
              </tr> <tr bgcolor="#FFFFFF">
              <td width="180" height="35" align="right"><b>Category Name: </b> </td>
             
              <td><input type="text" name="fenleiname" class="span1-1" value="<?php echo $info['fenleiname'];?>"/></td>
            </tr> <tr bgcolor="#FFFFFF">
              <td align="right"> </td>
             
              <td><input type="submit" value="Submit" class="btn btn-info " style="width:80px;"></td>
            </tr></form>
          </table>
     </div>     
     </div>
    </div>
    
<!-- 底部 -->
<?php
$action = !empty($_GET['action']) ? trim($_GET['action']) : '';
if($action == 'update')
{
	$id = !empty($_GET['id']) ? intval($_GET['id']) : '';
	$fenleiname = !empty($_POST['fenleiname']) ? trim($_POST['fenleiname']) : '';
	mysqli_query($conn,"update fenlei set fenleiname='$fenleiname' where id=".$id);
	echo "<script>alert('Modification successful!');location.href='fenlei.php';</script>";
}
include_once("foot.php");
?>
 <script>
!function(){
laydate.skin('molv');
laydate({elem: '#Calendar'});
}();
 
</script>
</body>
</html>