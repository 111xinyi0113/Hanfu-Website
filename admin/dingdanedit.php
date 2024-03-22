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
   <div class="title_right"><strong>Order management</strong></div>
   <?php
$id = !empty($_GET['id']) ? intval($_GET['id']) : '';
$sql=mysqli_query($conn,"select * from dingdan where id='".$id."'");
 $info=mysqli_fetch_array($sql)
	  ?>
<table width="100%" cellPadding="6" bgcolor="#cecece" class="table table-bordered">
     <form name="form1" method="post" action="saveorder.php?id=<?php echo $info['id'];?>">
	  <tr>
        <td width="70" height="35" align="right">Order number: </td>
        <td width="271"><?php echo $info['dingdanhao'];
		?></td>
        <td width="100">Payment Received
          <input type="checkbox" value="Payment Received" name="ysk" <?php if($info['zt']=="Payment Received") {?>checked<?php }?>></td>
        <td width="101">Shipped
          <input name="yfh" type="checkbox" value="Shipped" <?php if($info['zt']=="Shipped") {?>checked<?php }?>>
        </td>
        <td width="100">Received
          <input name="ysh" type="checkbox" value="Received" <?php if($info['zt']=="Received") {?>checked<?php }?>>
        </td>
        <td width="101"><input type="submit" value="Submit" class="buttoncss"></td>
	  </tr>
	  </form>
    </table>
    <table width="100%" cellPadding="6" bgcolor="#cecece" class="table table-bordered">
      <tr bgcolor="#b48c94">
        <td height="35" align="center">Product Name</td>
        <td width="106" align="center">Inventory</td>
        <td width="106" align="center">Original Price</td>
        <td width="106" align="center">Current Price</td>
        <td width="106" height="20" align="center">Transaction Price</td>
        <td width="106" align="center">Discount</td>
        <td width="10%">Total</td>
      </tr>
	 <?php
	   $array=explode("@",$info['spc']);
	   $arraysl=explode("@",$info['slc']);
	   $total=0;
	   for($i=0;$i<count($array)-1;$i++)
	    {
		  if($array[$i]!="")
		  {
	       $sql1=mysqli_query($conn,"select * from shangpin where id='".$array[$i]."'");
		   $info1=mysqli_fetch_array($sql1);
		   $total=$total+$info1['huiyuanjia']*$arraysl[$i];
	 ?>
      <tr>
        <td height="35" align="center"> &nbsp;<?php echo $info1['mingcheng'];?></td>
        <td height="25" align="center"><?php if($info1['shuliang']<0) echo "Sold Out"; else echo $arraysl[$i];?></td>
        <td height="25" align="center"><?php echo $info1['shichangjia'];?></td>
        <td height="25" align="center"><?php echo $info1['huiyuanjia'];?></td>
        <td height="25" align="center"><?php echo $info1['huiyuanjia'];?></td>
        <td height="25" align="center"><?php echo ceil(($info1['huiyuanjia']/$info1['shichangjia'])*100);?>%</td>
        <td height="25"><?php echo $info1['huiyuanjia']*$arraysl[$i];?></td>
      </tr>
	 <?php
	     }
	   }
	 ?> 
    </table>
<table width="100%" cellPadding="6" bgcolor="#cecece" class="table table-bordered">
  <tr>
    <td height="35" align="center">Total: <?php echo $total;?>&nbsp;¥&nbsp;</td>
  </tr>
</table>
<table width="100%" cellPadding="6" bgcolor="#cecece" class="table table-bordered">
      <tr bgcolor="#b48c94">
        <td height="35" colspan="2" align="center">Recipient Information</td>
      </tr>
      <tr>
        <td width="120" height="25" align="right">Recipient's Name: </td>
        <td width="627"><?php echo $info['shouhuoren'];?></td>
      </tr>
      <tr>
        <td height="25" align="right">Address: </td>
        <td height="25"><?php echo $info['dizhi'];?></td>
      </tr>
      <tr>
        <td height="25" align="right">Phone Number: </td>
        <td height="25"><?php echo $info['tel'];?></td>
      </tr>
      <tr>
        <td height="25" align="right">E-Mail: </td>
        <td height="25"><?php echo $info['email'];?></td>
      </tr>
      
      <?php if($info['kuaidi']){?>
      <tr>
        <td height="25" align="right">Courier Information: </td>
        <td height="25"><?php echo $info['kuaidi'];?>-<?php echo $info['bianhao'];?></td>
      </tr>
      <?php }?>
      <tr>
        <td height="25" align="right">Payment Method: </td>
        <td height="25"><?php echo $info['zfff'];?></td>
      </tr>
	  <tr>
        <td height="25" align="right">User Remarks: </td>
        <td height="25"><?php echo $info['leaveword'];?></td>
      </tr>
    </table>
<table width="100%" cellPadding="6" bgcolor="#cecece" class="table table-bordered">
  <tr>
    <td height="20" align="center">      
      <input name="button" type="button" class="buttoncss" onClick="javascript:history.back();" value="Back">    </td>
  </tr>
</table>
 
     </div>     
     </div>
    </div>
    
<!-- 底部 -->
<?php
include_once("foot.php");
?>
</body>
</html>