<?php
session_start();
include_once("top.php");
?>
<?php
$id = !empty($_GET['id']) ? intval($_GET['id']) : '';
$typeid=!empty($_GET['typeid']) ? intval($_GET['typeid']) : '';
$sqlss=mysqli_query($conn, "update shangpin set dianji=dianji+1 where id='$id'");
$sql=mysqli_query($conn, "select * from shangpin where id='$id'");
$row=mysqli_fetch_object($sql);
?>
<link href="css/page.css" rel='stylesheet' type='text/css' />
<script type="text/javascript"> 
function check(){
    if(document.form1.content_desc.value==""){
		alert("Please enter your comment");
		document.form1.content_desc.focus();
		return false;}
}
</script>
<div class="height2"></div>
<div class="container">
	<div class="row">
		<div class="col-md-9">
			<ul class="breadcrumb">
				<li><span class="glyphicon glyphicon-home"></span> My Shopping Cart</li>
				<li></li>
			</ul>
			<div class="panel panel-default">
				<div class="panel-body">
                    <table class="table table-bordered">
                    <form name="form1" method="post" action="gouwu1.php">
                      <caption></caption>
                      <?php
					  $_SESSION['total'] = null;
					  $qk = !empty($_GET['qk']) ? trim($_GET['qk']) : '';
					  if($qk=="yes"){
						 $_SESSION['producelist']="";
						 $_SESSION['quatity']=""; 
					  }
					  $sessionproducelist = !empty($_SESSION['producelist']) ? trim($_SESSION['producelist']) : '';
					  if(!isset($_SESSION['producelist'])){
						echo "<tr>";
							echo" <td height='25' colspan='6' bgcolor='#FFFFFF' align='center'>Your current shopping cart is empty~</td>";
							echo"</tr>";
					}else{
						$arraygwc=explode("@",$_SESSION['producelist']);
						$s=0;
						for($i=0;$i<count($arraygwc);$i++){
							$s+=intval($arraygwc[$i]);
						}
						if($s==0 ){
							echo "<tr>";
							echo" <td height='25' colspan='6' bgcolor='#FFFFFF' align='center'>Your current shopping cart is empty~</td>";
							echo"</tr>";
							}
						else{ 
						?>
                      <thead>
                        <tr bgcolor="#5d98a6">
                          <th height="35" align="center" style="color: #fff;">Name</th>
                          <th height="35" align="center" style="color: #fff;">Quantity</th>
                         
                          <th height="35" align="center" style="color: #fff;">Price</th>
                          
                          <th height="35" align="center" style="color: #fff;">Subtotal</th>
                          <th height="35" align="center" style="color: #fff;">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                    <?php
						$total=0;
						$array=explode("@",$_SESSION['producelist']);
						$arrayquatity=explode("@",$_SESSION['quatity']);
						 foreach($_POST as $name => $value){
							  for($i=0;$i<count($array)-1;$i++){
								if(($array[$i])==$name){
								  $arrayquatity[$i]=$value;  
								}
							}
						}
						$_SESSION['quatity']=implode("@",$arrayquatity);
						
						for($i=0;$i<count($array)-1;$i++){ 
						   $id=$array[$i];
						   $num=$arrayquatity[$i];
						  
						  if($id!=""){
						   $sql=mysqli_query($conn, "select * from shangpin where id='".$id."'");
						   $info=mysqli_fetch_array($sql);
						   $total1=$num*$info['huiyuanjia'];
						   $total+=$total1;
						   $_SESSION["total"]=$total;
					?>
                      	<tr>
                          <td height="35"><?php echo $info['mingcheng'];?></td>
                          <td height="35"><input type="text" name="<?php echo $info['id'];?>" size="2" class="inputcss" value=<?php echo $num;?>></td>
                          
                          <td height="35"><?php echo $info['huiyuanjia'];?>¥</td>
                         
                          <td height="35"><?php echo $info['huiyuanjia']*$num."¥";?></td>
                          <td height="35"><a href="removegwc.php?id=<?php echo $info['id']?>"
						  style="background-color: #5d98a6; color: white; padding: 8px 15px; text-decoration: none; display: inline-block; border: none; border-radius: 5px;" 
						  >Delete</a></td>
                        </tr>
                     <?php
						  }
						 }
					 ?>
                      </tbody>
                     <tbody>
                      	<tr>
                      	  <td colspan="7" align="center">
                        <table class="table" style="margin-bottom: 0px;" height="25" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          
                          <td align="center"><a href="gouwu2.php"
						  style="background-color: #5d98a6; color: white; padding: 8px 15px; display: inline-block;  border-radius: 5px;" 
						  >Buy</a></td>
                         
                          <td align="center">Total:  <?php echo $total;?>¥</td>
                        </tr>
                      </table>
                        </td>
                       </tr>
                      </tbody>
                     <?php
						 }}
						?></form>
                    </table>
				</div>
			</div>
		</div>
<?php

?>
	</div>
</div>
