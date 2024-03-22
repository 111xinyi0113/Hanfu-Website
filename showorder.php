<?php
include_once("sessionuser.php");
include_once("top.php");
?>
<?php
$act = !empty($_GET['act']) ? trim($_GET['act']) : '';
if($act == 'zhifu')
{
	$dingdanhao=!empty($_GET['dingdanhao']) ? trim($_GET['dingdanhao']) : '';
	$sqlss=mysqli_query($conn,"update dingdan set zt='Payment Received' where dingdanhao='".$dingdanhao."'");
	echo "<script>alert('支付成功！');location.href='orders.php';</script>";
}
  $dingdanhao=!empty($_GET['dd']) ? trim($_GET['dd']) : '';
  $sql2=mysqli_query($conn,"select * from dingdan where dingdanhao='".$dingdanhao."'");
  $info2=mysqli_fetch_array($sql2);
  $spc=$info2['spc'];
  $slc=$info2['slc'];
  $arraysp=explode("@",$spc);
  $arraysl=explode("@",$slc);
?>
<link href="css/page.css" rel='stylesheet' type='text/css' />
<div class="height2"></div>
<div class="container">
	<div class="row">
		<div class="col-md-9">
			<ul class="breadcrumb">
				<li><span class="glyphicon glyphicon-home"></span> <a href="/"> Home</a></li>
				<li>View Order</li>
			</ul>
			<div class="panel panel-default">
				<div class="panel-body">
                    <table class="table table-bordered">
                      <caption><?php echo $_SESSION['username'];?>, your order number is: <font color="#FF0000">
                        <?php echo $dingdanhao;?></font>! Here are the details: </caption>
                      <thead>
                        <tr bgcolor="#FFEDBF">
                          <th height="35" align="center">Name</th>
                          <th height="35" align="center">Quantity</th>
                          <th height="35" align="center">Price</th>
                          <th height="35" align="center">Member Price</th>
                          <th height="35" align="center">Subtotal</th>
                        </tr>
                      </thead>
                      <tbody>
                     <?php
					  $total=0;
					  for($i=0;$i<count($arraysp)-1;$i++){
						 if($arraysp[$i]!=""){
						 $sql1=mysqli_query($conn,"select * from shangpin where id='".$arraysp[$i]."'");
						 $info1=mysqli_fetch_array($sql1);
						 $total=$total+=$arraysl[$i]*$info1['huiyuanjia'];
					  ?>
                      	<tr>
                          <td height="35"><?php echo $info1['mingcheng'];?></td>
                          <td height="35"><?php echo $arraysl[$i];?></td>
                          <td height="35"><?php echo $info1['shichangjia'];?>¥</td>
                          <td height="35"><?php echo $info1['huiyuanjia'];?>¥</td>
                          <td height="35"><?php echo $arraysl[$i]*$info1['huiyuanjia'];?>¥</td>
                        </tr>
                     <?php
						  }
						 }
					 ?>
                      </tbody>
                     <tbody>
                      	<tr>
                          <td align="center" colspan="5">Total: <?php echo $total;?>元</td>
                        </td>
                       </tr>
                      </tbody>
                    </table>
                    <div class="height1"></div>
                    <table class="table table-bordered">
                      <tbody>
                      	<tr>
                          <td height="35">Orderer</td>
                          <td height="35"><?php echo $_SESSION['username'];?></td>
                        </tr>
                        <tr>
                          <td height="35">Recipient</td>
                          <td height="35"><?php echo $info2['shouhuoren'];?></td>
                        </tr>
                        <tr>
                          <td height="35">Delivery Address</td>
                          <td height="35"><?php echo $info2['dizhi'];?></td>
                        </tr>
                        <tr>
                          <td height="35">Phone Number</td>
                          <td height="35"><?php echo $info2['tel'];?></td>
                        </tr>
                        <tr>
                          <td height="35">E-mail</td>
                          <td height="35"><?php echo $info2['email'];?></td>
                        </tr>
                     	
                        <tr>
                          <td height="35">Payment Method</td>
                          <td height="35"><?php echo $info2['zfff'];?></td>
                        </tr>
                      </tbody>
                     <tbody>
                      	<tr>
                          <td align="center" colspan="5">Creation Time: <?php echo $info2['time'];?></td>
                        </td>
                       </tr>
                       <?php
					   $_SESSION['producelist']="";
						$_SESSION['quatity']="";
					    ?>
                       <tr>
                          <td align="center" colspan="5"><a href="?act=zhifu&dingdanhao=<?=$dingdanhao?>" class="details">
                          <button type="button" class="btn btn-danger">Buy</button></a></td>
                        </td>
                       </tr>
                      </tbody>
                    </table>
				</div>
			</div>
		</div>
<?php
include_once("left.php");
?>
	</div>
</div>
