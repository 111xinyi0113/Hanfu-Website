<?php
include_once("top.php");
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
   <div class="title_right"><strong>Add Product Category</strong></div>
   <table width="100%" border="0" cellpadding="6" cellspacing="0" bgcolor="#BCE8B5" class="table table-bordered">
             <form name="form1" method="post" action="?act=update" onSubmit="return check(this)">
			<tr bgcolor="#b48c94">
              <td height="25" colspan="2" align="center" bgcolor="#b48c94"><strong>
                
              Add Category</strong></td>
              </tr> <tr bgcolor="#FFFFFF">
              <td width="180" height="35" align="right"><b>Category Name:</b> </td>
             
              <td><input type="text" name="fenleiname" class="span1-1"/></td>
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
$act = !empty($_GET['act']) ? trim($_GET['act']) : '';
if($act == 'update')
{
	$fenleiname = !empty($_POST['fenleiname']) ? trim($_POST['fenleiname']) : '';
	mysqli_query($conn,"insert into fenlei(fenleiname) values('$fenleiname')");
	echo "<script>alert('Add Successfully!');location.href='fenlei.php';</script>";
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