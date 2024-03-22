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
   <div class="title_right"><strong>User management</strong></div>
   <?php
$id = !empty($_GET['id']) ? intval($_GET['id']) : '';
$sql=mysqli_query($conn,"select * from usermember where id=".$id."");
$info=mysqli_fetch_array($sql);
	  ?>
<table width="100%" cellPadding="6" bgcolor="#ffffff" class="table table-bordered">
<tr>
        <td height="35" colspan="4" align="center" bgcolor="#ffffff"用户状态修改</td>
        </tr>
      <tr>
        <td width="99" height="30" align="right">User Name: </td>
        <td width="180"><?php echo $info['name'];?></td>
        <td width="100" align="right">User Status: </td>
        <td width="266"><?php
	 if($info['dongjie']==0)
	  {
	    echo "Non-frozen status";
	  }
	  else
	  { 
	   echo "Frozen status"; 
	  }
		?></td>
      </tr>
      <tr>
        <td height="30" align="right">Nickname: </td>
        <td colspan="3"><?php echo $info['truename'];?></td>
      </tr>
	  <tr>
        <td height="30" align="right">E-mail: </td>
        <td colspan="3"><?php echo $info['email'];?></td>
      </tr>
	  <tr>
        <td height="30" align="right">Phone Number: </td>
        <td colspan="3"><?php echo $info['tel'];?></td>
      </tr>
	  <tr>
        <td height="30" align="right">Registration Time: </td>
        <td colspan="3"><?php echo $info['regtime'];?></td>
      </tr>
      <tr>
        <td height="30" colspan="4" align="center"><a href="dongjieuser.php?id=<?php echo $id;?>">
	<?php
	 $sql=mysqli_query($conn,"select * from usermember where id=".$id."");
	 $info=mysqli_fetch_array($sql);
	 if($info['dongjie']==0)
	  {
	    echo "Freeze this user";
	  }
	  else
	  {
	    echo "Unfreeze";
	  }
	?></a></td>
        </tr>
    </table>
 
     </div>     
     </div>
    </div>
    
<!-- 底部 -->
<?php

$action = !empty($_GET['action']) ? trim($_GET['action']) : '';
if($action == 'del')
{
	$id = !empty($_GET['id']) ? intval($_GET['id']) : '';
	mysqli_query($conn,"delete from usermember where id='".$id."'");
	echo "<script>alert('Delete Successfully!');location.href='usermember.php';</script>";
}
include_once("foot.php");
?>
</body>
</html>