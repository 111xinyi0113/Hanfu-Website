<?php
include_once("sessionuser.php");
include_once("top.php");
?>
<?php
$act = !empty($_GET['act']) ? trim($_GET['act']) : '';

	if($act == 'shouhuo')
	{
		$dingdanhao=!empty($_GET['dingdanhao']) ? trim($_GET['dingdanhao']) : '';
		$sqlss=mysqli_query($conn,"update dingdan set zt='Received' where dingdanhao='".$dingdanhao."'");
		echo "<script>alert('Delivery Successful!');location.href='orders.php';</script>";
	}
  $dingdanhao=$_GET['dd'];
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
                      <caption><?php echo $_SESSION['username'];?>, Your order number is: <font color="#FF0000">
                        <?php echo $dingdanhao;?></font>! Details are as follows: </caption>
                      <thead>
                        <tr bgcolor="#FFEDBF">
                          <th height="35" align="center">Product Name</th>
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
                          <td align="center" colspan="5">Total: <?php echo $total;?>¥</td>
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
                         <?php if($info2['kuaidi']){?>
                          <tr>
                            <td height="35">Courier Information: </td>
                            <td height="35"><?php echo $info2['kuaidi'];?>-<?php echo $info2['bianhao'];?></td>
                          </tr>
                          <?php }?>
                        
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
                       <tr>
                          <td align="center" colspan="5">Order Status: <?php if($info2['zt']=="Received"&&$info2['th']==1)
                          {
                        echo "Returned";
                          }
                          elseif($info2['zt']=="Shipped" )
                          {?>
                            <a href="?act=shouhuo&dingdanhao=<?=$dingdanhao?>" class="details">
                            <button type="button" class="btn btn-danger">Confirm Receipt</button></a>
                            <?php }
							else
							{echo $info2['zt'];}
					   ?></td>
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
