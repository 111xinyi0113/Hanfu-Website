<?php
include("sessionuser.php");
include_once("top.php");
?>
<link href="css/page.css" rel='stylesheet' type='text/css' />
<div class="height2"></div>
<div class="container">
	<div class="row">
		<div class="col-md-9">
			<ul class="breadcrumb">
				<li><span class="glyphicon glyphicon-home"></span> My Order</li>
				
			</ul>
			<div class="panel panel-default">
				<div class="panel-body">
                    <table class="table table-bordered">
                      <caption>My Order</caption>
                      <?php
						  $username=$_SESSION['username'];
						  $sql=mysqli_query($conn,"select * from dingdan where xiadanren='".$username."'");
						  $info=mysqli_fetch_array($sql);
						  if($info==false)
						   {
							  echo "<div algin='center'>No orders found for this query!</div>";    
						   }
						   else
						   {
					  ?>
                      <thead>
                        <tr bgcolor="#5d98a6">
                          <th height="35" align="center">Order ID</th>
                          <th height="35" align="center">Order Time</th>
                          <th height="35" align="center">Purchaser</th>
                          <th height="35" align="center">Total</th>
                          <th height="35" align="center">Payment Method</th>
                       
                          <th height="35" align="center">Order Status</th>
                        </tr>
                      </thead>
                      <tbody>
                    <?php
						  do
						  {
						?>
                      	<tr>
                          <td height="35"><a href="orderlook.php?dd=<?php echo $info['dingdanhao'];?>"><?php echo $info['dingdanhao'];?></a></td>
                          <td height="35"><?php echo $info['time'];?></td>
                          <td height="35"><?php echo $info['shouhuoren'];?></td>
                          <td height="35"><?php echo $info['total'];?></td>
                          <td height="35"><?php echo $info['zfff'];?></td>
                         
                          <td height="35"><?php echo $info['zt'];?></td>
                        </tr>
                      <?php
						   }while($info=mysqli_fetch_array($sql));
						?>
                      </tbody>
                     <?php
						 }
						?>
                    </table>
				</div>
			</div>
		</div>
<?php
include_once("left.php");
?>
	</div>
</div>
