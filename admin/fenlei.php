<?php
include_once("top.php");
?>
<!-- 顶部 --> 
<div id="middle">
     <?php
include_once("left.php");
?>
     <div class="right"  id="mainFrame">
     <div class="right_cont">
   <div class="title_right"><strong>Category Management</strong></div>
   <TABLE width="100%" cellPadding="6" bgcolor="#ffffff" class="table table-bordered">
  <TBODY>
  <TR bgcolor="#b48c94">
    <TH width="50%" height="24">Category List</TH>
    <TH width="50%">Action</TH>
    </TR>
<?php
$sql=mysqli_query($conn,"select * from fenlei order by id desc");
$info=mysqli_fetch_array($sql);
 if($info==false)
  {
    echo "No categories available!";
   }
  else
  {
		  do
		  {
?>
   <tr align="middle" bgcolor="#FFFFFF" onMouseOut="mOut(this,'#FFFFFF');" onMouseOver="mOvr(this,'#DCF9B9');" style="cursor: default;">
    <td height="25" align="left">&nbsp;
      <SPAN> <strong><?=$info['fenleiname']?></strong></SPAN>   
    </td>
    <td align="center">
      <a href="fenleiedit.php?id=<?=$info['id']?>">Modify</a>&nbsp;
      <a href="?id=<?=$info['id']?>&action=del" onClick="return confirm('Are you sure you want to delete this category?')">Delete</a>
    </td>
   </tr>
<?php
	}
		 while($info=mysqli_fetch_array($sql));
	}
?>     
    </TBODY></TABLE>
     </div>     
     </div>
    </div>
    
<!-- 底部 -->
<?php

$action = !empty($_GET['action']) ? trim($_GET['action']) : '';
if($action == 'del')
{
	$id = !empty($_GET['id']) ? intval($_GET['id']) : '';
	mysqli_query($conn,"delete from fenlei where id='".$id."'");
	mysqli_query($conn,"delete from shangpin where typeid='".$id."'");
	echo "<script>alert('Deletion successful!');location.href='fenlei.php';</script>";
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